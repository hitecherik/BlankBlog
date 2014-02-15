<?php
	include "settings.php";

	$id = $_GET["p"];

	$query = "SELECT * from " . $mysql["table-name"] . " WHERE ID = $id";

	mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]);

	@mysql_select_db($mysql["database-name"]) or die("Unable to select database.");

	$qresult = mysql_query($query);

	if(mysql_numrows($qresult) == 0) {
		header("Location: $blogurl");
	}

	$title = mysql_result($qresult, 0, "Title");
	$content = mysql_result($qresult, 0, "Content");
	$date = mysql_result($qresult, 0, "Date");

	$pagetitle = "Update Post :: $blogtitle";

	include "header.php";
?>
	<h2>Update Post</h2>

	<form action="update.php?id=<?php echo $id; ?>" id="update-form" method="post">
		<p><label for="title">Post Title: </label><input type="text" name="title" id="title" value="<?php echo $title; ?>"></p>	
		<p><label for="content">Post Content: </label><textarea name="content" id="content"><?php echo $content; ?></textarea></p>
		<p><label for="date">Post Date: </label><input type="text" name="date" id="date" value="<?php echo $date; ?>"></p>
		<p><label for="password">Password: </label><input type="password" name="password" id="password"></p>
		<p><button type="submit">Update</button></p>
	</form>
<?php include "footer.php"; ?>