<?php
	function get_mysql($mysql_data){
		mysql_connect($mysql_data["host"], $mysql_data["username"], $mysql_data["password"]) or die("Unable to connect to MySQL server.");
		@mysql_select_db($mysql_data["database-name"]) or die("Unable to select database.");
	}
?>