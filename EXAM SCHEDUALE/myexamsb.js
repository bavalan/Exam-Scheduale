/*
Bavalan Thangarajah
Student# 1002194564
These lines of code allow the fuctionallity of the webpage.
The code will create functionallity when the button and
drop down menu is clicked. This code allows one to search by instructor name.
*/

// Allows functionallity to be active in code
$(document).ready(function() {
	//When the button is clicked
	$("#searchb").click (function(event){
		event.preventDefault();
		// Stores users entry from search box
		var instructors = $("#searchboxb").val();
		$.getJSON("examsb.php?instructor=" + instructors,function(result){	
			// Adds the searched instructors too the scroll menu.
			var scroll = document.getElementById("scroll");
			$.each(result, function(i){
				var option = document.createElement("option");
				//Adds in the format of course,section, instructor
				option.text = result[i].course + " " + result[i].section + " " + result[i].instructor;
				scroll.add(option);
			});
		});
	});

	// Code needed for search.php
	//Allows user to move freely within scroll bar
	$("#scroll").change (function(event){
		// Store the chosen exam from the drop down menu
		var choice = document.getElementById("scroll").selectedIndex;
		//Find the info of the chosen drop down menu option
		var course = document.getElementsByTagName("option")[choice].value;
		location.href = "search.php?course=" + course;
	});
});