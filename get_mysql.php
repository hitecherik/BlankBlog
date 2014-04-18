<?php
	function get_mysql(){
		mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]) or die("Unable to connect to MySQL server.");
		@mysql_select_db($mysql["database-name"]) or die("Unable to select database.");
	}
?>