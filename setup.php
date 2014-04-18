<?php
	include "settings.php";
	include "get_mysql.php";
	
	get_mysql();
	$query = "CREATE TABLE `" . $mysql["table-name"] . "` (`ID` INT UNIQUE, `Title` VARCHAR(255),`Content` LONGTEXT,`Date` VARCHAR(8));";
	$qresult = mysql_query($query);

	$pagetitle = "Setup :: $blogtitle";

	include "header.php";
?>
	<h2>Setup</h2>
	
	<?php
		if($qresult){
	?>
	<p>Success!</p>
	<?php
		} else {
	?>
	<p>Sorry - setup failed. Please check all of the settings in <code>settings.php</code> and try again!</p>
	<?php
		}
	?>
<?php include "footer.php"; ?>