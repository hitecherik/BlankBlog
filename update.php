<?php 
	include "settings.php";
	include "get_mysql.php";
	
	$title = str_replace("'", "\'", $_POST["title"]);
	$content = str_replace("'", "\'", $_POST["content"]);
	$date = $_POST["date"];
	
	preg_match("/^\d+/", $_GET["id"], $matches);

	$id = $matches[0];
	
	if($_POST["password"] == $password) {
		get_mysql();		
		$query = "UPDATE " . $mysql["table-name"] . " SET `Title` = '$title', `Content` = '$content', `Date` = '$date' WHERE `ID` = $id";
		$qresult = mysql_query($query);
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