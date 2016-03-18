<?php
	include "settings.php";
	include "common.php";

	preg_match("/^\d+/", $_GET["p"], $matches);

	$id = $matches[0];
	
	$db = new SQLite3($sql["database-file"]);

	if((int) $db->querySingle("SELECT COUNT(*) FROM {$sql['table-name']} WHERE ID = $id") == 0) {
		header("Location: $blogurl");
	}
	
	$result = $db->querySingle("SELECT * from {$sql['table-name']} WHERE ID = $id", true);

	$title = $result["Title"];
	$content = $result["Content"];
	$date = $result["Date"];

	echo getHeader("Update Post :: $blogtitle");
?>
	<h2>Update Post</h2>

	<form action="update.php?id=<?php echo $id; ?>" id="update-form" method="post">
		<p><label for="title">Post Title: </label><input type="text" name="title" id="title" value="<?php echo $title; ?>"></p>	
		<p><label for="content">Post Content: </label><textarea name="content" id="content"><?php echo $content; ?></textarea></p>
		<p><label for="date">Post Date: </label><input type="text" name="date" id="date" value="<?php echo $date; ?>"></p>
		<p><label for="password">Password: </label><input type="password" name="password" id="password"></p>
		<p><button type="submit">Update</button></p>
	</form>
<?php echo getFooter(); ?>
