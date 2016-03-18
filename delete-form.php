<?php
	include "settings.php";
	include "common.php";

	$id = $_GET["p"];

	echo getHeader("Delete Post :: {$blogtitle}");
?>
	<h2>Delete Post</h2>

	<form action="<?php echo "$blogurl/delete.php?p=$id"; ?>" id="delete-form" method="post">
		<p><label for="password">Password: </label><input type="password" name="password" id="password"></p>
		<p><button type="submit">Delete Post</button></p>
	</form>
<?php echo getFooter(); ?>
