<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="classList.css">

    <title>Computer Science Class List</title>
	<script>
		//this prevents users on the results page from going back, credit to https://www.irt.org/script/311.htm
		window.history.forward(1);
	</script>
	<script type="text/javascript" src="./classDictionary.js"></script>
  </head>
  <body>
   <div class="header"> <a href="http://umbc.edu"><img src="./img/umbclogo.png"></a></div>

     <form action="formProcess.php" id="classlist" method="POST">
    
     <div id="userinfo">
      <label for="name">Name: </label>
      <input type="text" name="name" id="name" required>
      <label for="email">Best Email: </label>
      <input type="email" name="email" id="email" required>
      <label for="contactnum">Best Contact Number: </label>
      <input type="text" name="contactnum" id="connectnum" required>
      <label for="campusid">Best Campus ID: </label>
      <input type="text" name="campusid" id="campusid" required>
     </div>

    <h1>Computer Science Undergraduate Course Advising</h1>
	<p>Click on the courses you've taken to expand available courses.</p>
<div id="container">
      <!-- class path tree -->
      <div id="classtree"> 

	<!-- computer science path trees -->
	<div id="compsci">
	  <div id="cs200"> 
	    <!-- CMSC 200 level courses -->
	    <h2> CMSC 200 Level Courses</h2>
		<p> Note: MATH 150 is a prereq for CMSC 201</p>
            <?php
	       $lvl200 = array(array("cmsc201label","cmsc201","CMSC 201"), array("cmsc202label", "cmsc202", "CMSC 202"), array("cmsc203label","cmsc203","CMSC 203"), 
                         array("cmsc232label","cmsc232","CMSC 232"), array("cmsc291label","cmsc291","CMSC 291"), array("cmsc299label","cmsc299","CMSC 299"));

	       foreach($lvl200 as $values){
	         echo "<label class='course' id=$values[0] for=$values[1] onclick='labelOnClick(this)' onmouseover='labelOnMouseover(this)' >$values[2]</label>";
	         echo "<input type='checkbox' class='' name='course[]' id=$values[1] value=$values[1]>";
	       }
	    ?>
	  </div>
	  <br>
	  
	  <div id="cs300"> 
	    <!-- CMSC 300 level courses -->
	    <h2>CMSC 300 Level Courses</h2>
            <?php
	       $lvl300 = array(array("cmsc304label","cmsc304","CMSC 304"), array("cmsc313label", "cmsc313", "CMSC 313"), array("cmsc331label","cmsc331","CMSC 331"), 
                         array("cmsc341label","cmsc341","CMSC 341"), array("cmsc352label","cmsc352","CMSC 352"), array("cmsc391label","cmsc391","CMSC 391"));

	       foreach($lvl300 as $values){
	         echo "<label class='course' id=$values[0] for=$values[1] onclick='labelOnClick(this)' onmouseover='labelOnMouseover(this)' >$values[2]</label>";
	         echo "<input type='checkbox' class='' name='course[]' id=$values[1] value=$values[1]>";
	       }
	    ?>
	  </div>
          <br>

	  <div id="cs400"> 
	    <!-- CMSC 400 level courses -->
	    <h2>CMSC 400 Level Courses</h2>
            <?php
	       $lvl400 = array(array("cmsc404label","cmsc404","CMSC 404"), array("cmsc411label", "cmsc411","CMSC 411"), array("cmsc421label","cmsc421","CMSC 421"),
	                       array("cmsc426label","cmsc426","CMSC 426"), array("cmsc427label","cmsc427","CMSC 427"), array("cmsc431label","cmsc431","CMSC 431"),
	                       array("cmsc432label","cmsc432","CMSC 432"), array("cmsc433label","cmsc433","CMSC 433"), array("cmsc435label","cmsc435","CMSC 435"),
	                       array("cmsc436label","cmsc436","CMSC 436"), array("cmsc437label","cmsc437","CMSC 437"), array("cmsc441label","cmsc441","CMSC 441"),
	                       array("cmsc442label","cmsc442","CMSC 442"), array("cmsc443label","cmsc443","CMSC 443"), array("cmsc446label","cmsc446","CMSC 446"),
	                       array("cmsc447label","cmsc447","CMSC 447"), array("cmsc448label","cmsc448","CMSC 448"), array("cmsc451label","cmsc451","CMSC 451"),
	                       array("cmsc452label","cmsc452","CMSC 452"), array("cmsc453label","cmsc453","CMSC 453"), array("cmsc455label","cmsc455","CMSC 455"),
	                       array("cmsc456label","cmsc456","CMSC 456"), array("cmsc457label","cmsc457","CMSC 457"), array("cmsc461label","cmsc461","CMSC 461"),
	                       array("cmsc465label","cmsc465","CMSC 465"), array("cmsc466label","cmsc466","CMSC 466"), array("cmsc471label","cmsc471","CMSC 471"),
	                       array("cmsc473label","cmsc473","CMSC 473"), array("cmsc475label","cmsc475","CMSC 475"), array("cmsc476label","cmsc476","CMSC 476"),
	                       array("cmsc477label","cmsc477","CMSC 477"), array("cmsc478label","cmsc478","CMSC 478"), array("cmsc479label","cmsc479","CMSC 479"),array("cmsc481label","cmsc481","CMSC 481"),
	                       array("cmsc483label","cmsc483","CMSC 483"), array("cmsc484label","cmsc484","CMSC 484"), array("cmsc486label","cmsc486","CMSC 486"),
	                       array("cmsc487label","cmsc487","CMSC 487"), array("cmsc491label","cmsc491","CMSC 491"), array("cmsc493label","cmsc493","CMSC 493"),
	                       array("cmsc495label","cmsc495","CMSC 495"), array("cmsc498label","cmsc498","CMSC 498"), array("cmsc499label","cmsc499","CMSC 499"));

	       foreach($lvl400 as $values){
	         echo "<label class='course' id=$values[0] for=$values[1] onclick='labelOnClick(this)' onmouseover='labelOnMouseover(this)' >$values[2]</label>";
	         echo "<input type='checkbox' class='' name='course[]' id=$values[1] value=$values[1]>";
	       }
	    ?>

	  </div>
	<div id="math">
	  <h2>MATH and STAT Courses</h2>
	  <?php
	    $lvlMath = array(array("math150label","math150","MATH 150"),array("math151label","math151","MATH 151"), array("math152label","math152","MATH 152"), array("math221label","math221","MATH 221"),
			     array("math225label","math225","MATH 225"),array("math251label","math251","MATH 251"), array("stat355label","stat355","STAT 355"));
	    foreach($lvlMath as $values){
		 echo "<label class='course' id=$values[0] for=$values[1] onclick='labelOnClick(this)' onmouseover='labelOnMouseover(this)' >$values[2]</label>";
	         echo "<input type='checkbox' class='' name='course[]' id=$values[1] value=$values[1]>";
	    }

	  ?>
	</div>
	</div>
			
	<!-- path trees for the suggested science courses -->
	<div id="sciences">
	  <div id="path1"> 
	    <!-- chem101 -> chem102 -> chem102L -> GES110 -->  
	  </div>
	  <div id="path2">
	    <!-- chem101 -> chem102 -> biol141 -> any lab -->
	  </div>
	  <div id="path3">
	    <!-- biol 141 -> biol142 -> biol Lab -> phys121 -->
	  </div>
	  <div id="path4">
	    <!-- phys121 -> phsy122 -> ges286 -->
	  </div>
	  <div id="path5">
	    <!-- phys121 -> phys122 -> phys 122L -> math251  -->
	  </div>
	  <div id="path6">
	    <!-- sci -> sci -> ges110/120 -> sci101L -->
	  </div>
	</div>
<input type="submit" id="submitbutton" value="SUBMIT">
      </div>
    <!-- Credit Counter -->
    <div id="credcounter">
	<h3>Academic Record</h3>
	<table>
	<tr><td class="leftTable"><b>Total Credits Taken:</b></td><td><span id="takencredits">0</span></td></tr>
	<tr><td class="leftTable"><b>Writing Intensive:</b></td><td><span id="writingintensive">Not Taken</span></td></tr>
	<tr><td class="leftTable"><b>Required CS Classes:</b></td><td><span id="reqcs">201, 202, 203, 304, 313, 331, 341, 411, 421, 441, 447</td></tr>
	</table>
    </div>
    <div id="courseinfo">
	<h3>Course Information</h3>
	<p>Hover over a course for more information.</p>
	<table>
	<tr><td class="leftTable"><b>Title:</td><td><span id="coursetitle"></span></td></tr>
	<tr><td class="leftTable"><b>Credits:</td><td><span id="coursecredits"></span></td></tr>
	<tr><td class="leftTable"><b>Description:</td><td><span id="coursedescription"></span></td></tr>
	</table>
    </div>

</div>
      </form>
      <script type="text/javascript"  src="./classList.js"></script>
  </body>
</html>
