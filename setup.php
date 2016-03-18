<?php
	include "settings.php";
	include "common.php";
	
	$db = new SQLite3($sql["database-file"]);
	$result = $db->exec("CREATE TABLE IF NOT EXISTS {$sql['table-name']} (ID INT UNIQUE, Title VARCHAR(255), Content LONGTEXT, Date VARCHAR(255));") or die("Unable to set up database.");

	echo getHeader("Setup :: $blogtitle");
?>
	<h2>Setup</h2>
	
	<?php
		if($result){
	?>
	<p>Success!</p>
	<?php
		} else {
	?>
	<p>Sorry - setup failed. Please check all of the settings in <code>settings.php</code> and try again!</p>
	<?php
		}
	?>
<?php echo getFooter(); ?>
