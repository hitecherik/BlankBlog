<?php
	include "settings.php";
	include "get_mysql.php";
	
	$title = str_replace("'", "\'", $_POST["title"]);
	$content = str_replace("'", "\'", $_POST["content"]);
	$date = date("d/m/y");
	
	if($_POST["password"]==$password){
		get_mysql();
		$id = mysql_result(mysql_query("SELECT MAX(`ID`) FROM `" . $mysql["table-name"] . "`"), 0, "MAX(`ID`)") + 1;
		$query = "INSERT INTO " . $mysql["table-name"] . "(ID,Title,Content,Date)VALUES('$id','$title','$content','$date')";
		
		$qresult = mysql_query($query);
	} else {
		$qresult = false;
	}

	$pagetitle = "$title :: $blogtitle";
	include "header.php";
?>
	<h2>"<?php echo str_replace("\'", "'", $title); ?>" - post creation</h2>
	<p>
		<?php
			if($qresult){
				echo "The post was successful.";
			} else {
				echo "The post was not successful.</p><p>Ty reloading this page and trying again, or check if you have entered your password correctly.";
			}
		?>
	</p>
<?php include "footer.php"; ?>
