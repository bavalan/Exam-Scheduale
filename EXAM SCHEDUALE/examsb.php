<?php
/*
Bavalan Thangarajah
Student# 1002194564
CSCB20: My exam timtable
This assignment is for the purpose of creating an exam scheduale website. 
This php file, uses the SQL query to retrieve
the exam scheduale by instructor name and return the information to myexamsb.js, which
will then add it to the drop down menu
*/ 

	//Stores the instructor name the user types
	$input=$_REQUEST['instructor'];

	
	/*Password and info needed to connect to the database.
	Calls config.php, which contains the info*/
	include "config.php";

	
	// connect to the database
	$dbh = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	// Check connection
	if (!$dbh) {
	 die("Connection failed: " . mysqli_connect_error());
	}


	/*SQL query which chooses all the info from the database courses
	where the user $input matches the info in the instructor column*/
	$sql = "SELECT*FROM courses WHERE instructor LIKE '".$input."%';";
	$result = mysqli_query($dbh, $sql); 
	//All the info stored into an array
	$info = array();
	
	// if the query returned any tuples output each tuple
	if (mysqli_num_rows($result) > 0) {
		// as long as there is a next tuple, output
		 while($row = mysqli_fetch_assoc($result)) {
			$info[] = $row;
		} 
	} else {

		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		die();
	}?> 

	<?=json_encode($info);
	// After we are done, close the connection
	mysqli_close($dbh); 
?>