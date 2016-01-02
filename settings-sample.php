<?php
	// Rename this file to settings.php and add your data to the variables
	
	/* change the $password and $blogtitle */
	
	$password = "myblogpass"; // password for posting/updating/deleting
	$blogtitle = "The Blog of the Century"; // blog title
	
	
	/* $dateformat and $sql changes are optional - but don't delete these variables */
	
	$dateformat = "d M Y"; // date format - see table in http://php.net/manual/en/function.date.php
	$sql = array(
		"table-name" => "posts", // table name (doesn't have to exist)
		"database-file" => "posts.db", // database file (doesn't have to exist)
	);
?>
