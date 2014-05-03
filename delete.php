<?php 
	include "settings.php";
	include "get_mysql.php";

	preg_match("/^\d+/", $_GET["p"], $matches);

	$id = $matches[0];
	$pass = $_POST["password"];

	if ($password == $pass) {
		get_mysql();
		$query = "DELETE FROM `" . $mysql["table-name"] . "` WHERE `ID` = $id";
		$qresult = mysql_query($query);
	} else {
		$qresult = false;
	}

	$pagetitle = "Delete Post :: $blogtitle";
	include "header.php";
?>
	<h2>Delete Post (ID: <?php echo $id; ?>)</h2>
	<p>
		<?php 
			if ($qresult) {
				echo "Post successfully deleted.";
			} else {
				echo "Post was not deleted. This may be due to either a database connection error or an incorrect password. Please reload the page and try again.";
			}
			
		?>
	</p>
<?php
	include "footer.php";
?>