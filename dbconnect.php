<?php 
  $DBNAME   = "project1";    //Name of the database
  $HOST     = "localhost";   //Database host. In our case, the localhost
  $USERNAME = "root";        //phpMyAdmin username. Dont abuse root!
  $PASSWORD = "Lupoli#433";  //phpMyAdmin Password
  $errs = [];                //Array to hold error messages. These are printed on screen later
  $db;                       //PDO variable
  $lastQueryResult;          //The res

  try{
    //Establish a connection to the phpmyadmin database using a PDO
    $db = new PDO("mysql:host={$HOST};dbname={$DBNAME};charset=utf8", $USERNAME, $PASSWORD);
  } catch (PDOException $e){
   
    //If there is any connection problem, including invalid credentials, nullify the PDO
    $db=null;

    //add an error message describing a server problem
    $errs []= "Connection to the database could not be established. Please try submitting again later.";
 }


  /**
  * WARNING: This function has NO VALIDATION for the parameter. Be very careful using this function.
  *
  * Truncate a table. All entries in a table are deleted, leaving an empty table
  *
  * @param {String} $tableName
  *   The name of the table to truncate. 
  *
  * @return {PDOStatement}
  *  A PDOStatement which can be used to check the result of the operation
  */
  function truncateTable($tableName){
    $sql = "DELETE FROM ".$tableName." WHERE 1";
    return executeSql($sql);
  }


  /**
  * WARNING: This function is designed to execute ANY SQL that it is provided. Make sure not to nuke your own stuff accidentally.
  *
  * Consolidates mauch of the code necessary to execute a SQL query using PDO 
  *
  * @param {String} $sql
  *   A SQL statement string
  *
  * @param {Array} $params
  *   Optional - An array of values to bind to any placeholder variables in your SQL
  *   For more information on this visit the Php reference here: http://php.net/manual/en/pdo.prepare.php
  *
  * @return {PDOStatement}
  *  A PDOStatement which can be used to check the result of the operation 
  */
  function executeSql($sql, $params = NULL){
    global $db;
    global $lastQueryResult;

    //prepare the sql statement
    $stmt = $db->prepare($sql);

    //if no params were given, execute the statement by itself
    if($stmt && empty($params)){
      $lastQueryResult = $stmt->execute();
      return $stmt;
    }

    //if the $params array isnt empty, bind the params to the sql statement and execute
    $lastQueryResult = $stmt->execute($params);
    return $stmt;
  }


  /**
  * Insert a student into the database. The given data is assumed to be valid 
  *
  * @param {String} $id
  *   The student's campus id
  *
  * @param {String} $name
  *   The student's name
  *
  * @param {String} $email
  *   The student's email
  *
  * @param {String} $contactnum
  *   The student's contact number
  *
  * @return {PDOStatement}
  *  A PDOStatement which can be used to check the result of the operation 
  */
  function insertStudent($id, $name, $email, $contactnum){
    global $db;

    //create an array of the parameters so that they can be bound to the sql query
    $values = array($id, $name, $email, $contactnum);

    //create a sql query for pdo to execute
    $sql = "INSERT INTO students (campusid, name, email, contactnum) VALUES (?, ?, ?, ?)";
    
    //execute the query and return the PDOStatement
    return executeSql($sql, $values);  
  }

  function insertCourse($id, $name, $creditHours){
    global $db;
    $values = array($id, $name, $creditHours);
    $sql = "INSERT INTO courses (courseid, name, credits) VALUES (?, ?, ?)";
    return executeSql($sql, $values);  
  }

  function insertTakes($student_id, $course_id){
    global $db;
    $values = array($student_id, $course_id);
    $sql = "INSERT IGNORE INTO coursestaken (campusid, courseid) VALUES (?, ?)";
    return executeSql($sql, $values);  
  }

  function sanitize($string){
    $string = trim($string);
    $string = htmlspecialchars($string);
    return $string;
  }

  function validatePost(){
    global $errs;
    global $db;
    $valid = true;
 
    $_POST["name"] = sanitize($_POST["name"]);
    $_POST["email"] = sanitize($_POST["email"]);
    $_POST["contactnum"] = sanitize($_POST["contactnum"]);
    $_POST["campusid"] = sanitize($_POST["campusid"]);
    if(preg_match('/^[a-zA-Z]{2}[\d]{5}$/', $_POST["campusid"]) !== 1){
      $errs[]= "UMBC campus id must be two letters followed by 5 numbers";
      $valid = false;
    }
    if(preg_match('/^[\d]{10}$/', $_POST["contactnum"]) !== 1){
      $errs[]= "Phone number must consist only of 10 digits";
      $valid = false;
    }
    if(!isset($db)){
      $valid = false;
    }
    //check for duplicate entry in the database
    $select = "SELECT campusid FROM students";
    $result = executeSql($select);
    while($row = $result->fetch()){
       if($row["campusid"]==$_POST["campusid"]){
         $valid = false;
         $errs[]="User has already submitted!";
       }
    }


    return $valid;
  }

  function insertRecords(){
    //var_dump($_POST);
    insertStudent($_POST["campusid"], $_POST["name"], $_POST["email"], $_POST["contactnum"]);
    foreach($_POST["course"] as $course){
      insertTakes($_POST["campusid"], $course);
    }
    
  }

  function getSummary(){
    $result = [];
    foreach($_POST["course"] as $course){
      $sql = "SELECT name, credits FROM courses WHERE courseid = ?";
      $stmt = executeSql($sql, array($course));
      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
      $result[$course] = $row;
    }

    return $result;
  }
 ?>
