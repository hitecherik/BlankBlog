<?php 
	include "settings.php";
	
	$title = str_replace("'", "\'", $_POST["title"]);
	$content = str_replace("'", "\'", $_POST["content"]);
	$date = $_POST["date"];
	$id = $_GET["id"];
	
	if($_POST["password"] == $password) {
		mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]);
				
		@mysql_select_db($mysql["database-name"]) or die("Unable to select database");
		
		$query = "UPDATE " . $mysql["table-name"] . " SET `Title` = '$title', `Content` = '$content', `Date` = '$date' WHERE `ID` = $id";
		
		$qresult = mysql_query($query) or die("Post not updated!");
	} else {
		$qresult = false;
	}

	$pagetitle = "$title :: $blogtitle";
	include "header.php";
?>
	<h2>"<?php echo str_replace("\'", "'", $title); ?>" - post update</h2>
	<p>
		<?php
			if($qresult){
				echo "The update was successful.";
			} else {
				echo "The update was not successful.</p><p>Ty reloading this page and trying again, or check if you have entered your password correctly.";
			}
		?>
	</p>
<?php include "footer.php"; ?>