<?php 
	include "settings.php";

	$id = $_GET["p"];
	$pass = $_POST["password"];

	if ($password == $pass) {
		mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]);
		@mysql_select_db($mysql["database-name"]) or die("Unable to select database.");
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