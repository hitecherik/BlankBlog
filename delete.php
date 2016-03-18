<?php 
	include "settings.php";
	include "common.php";

	preg_match("/^\d+/", $_GET["p"], $matches);

	$id = $matches[0];
	$pass = $_POST["password"];

	if ($password == $pass) {
		$db = new SQLite3($sql["database-file"]);
		$result = $db->exec("DELETE FROM {$sql['table-name']} WHERE ID = $id");
	} else {
		$result = false;
	}

	$pagetitle = "Delete Post :: $blogtitle";
	
	echo getHeader("Delete Post :: {$blogtitle}");
?>
	<h2>Delete Post (ID: <?php echo $id; ?>)</h2>
	<p>
		<?php 
			if ($result) {
				echo "Post successfully deleted.";
			} else {
				echo "Post was not deleted. This may be due to either a database connection error or an incorrect password. Please reload the page and try again.";
			}
			
		?>
	</p>
<?php
	echo getFooter();
?>
