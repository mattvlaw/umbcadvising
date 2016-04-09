function ClassNode(classNumber,children,prereqs){
	this.id = classNumber;
	this.children = children;
	this.parents = prereqs;
	this.taken = false;
}
ClassNode.prototype.isAvailable = function(){
	for(var i=0, len=this.parents.length; i < len; i++){
		if(parents[i].taken == false) 
			return false;
	}
	return true;

}
ClassNode.prototype.markTaken = function(){
	this.taken = true;
	//check which children are made available by taking this class
	var openedClasses = [];
	for(var i=0, len = this.children.length; i < len; i++){
		if(children[i].isAvailable()) 
			openedClasses.append(children[i].id);
	}
	return openedClasses;
}

/**
* onClick function for class labels
*
* @param [param type] param name
*   param description
*
* @return [return type]
*   return description
*/
function labelOnClick(argument) {
  // body...
}

/**
* update class prerequisites after a click on a label
*
* @param [String] class_id
*   The id of the class which was selected
*
* @return [return type]
*   return description
*/    
function updatePrereqs(class_id) {
  // body...
}

/**
* update the view of the page after 
*
* @param [param type] param name
*   param description
*
* @return [return type]
*   return description
*/
function updateDisplay(argument) {
  //body
}
function hideClasses(listToHide) {
	for(var i=0, len = listToHide.length; i < len; i++){
		document.getElementById(listToHide[i]).className = "hiddencourse";
	}
}
function restoreClasses(listToShow) {
	for(var i=0, len=listToShow.length; i < len; i++){
		document.getElementById(listToShow[i]).className = "course";
	}
}
