<?php
	include "settings.php";
	include "blogurl.php";

	$id = $_GET["p"];

	$pagetitle = "Delete Post :: $blogtitle";
	include "header.php";
?>
	<h2>Delete Post</h2>

	<form action="<?php echo "$blogurl/delete.php?p=$id"; ?>" id="delete-form" method="post">
		<p><label for="password">Password: </label><input type="password" name="password" id="password"></p>
		<p><button type="submit">Delete Post</button></p>
	</form>
<?php include "footer.php"; ?>
