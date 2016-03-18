<?php
	include "settings.php";
	include "common.php";

	echo getHeader("Create Post :: $blogtitle");
?>
	<h2>Create Post</h2>

	<form action="<?php echo $blogurl; ?>/post.php" id="post-form" method="post">
		<p><label for="title">Post Title: </label><input type="text" name="title" id="title"></p>	
		<p><label for="content">Post Content: </label><textarea name="content" id="content"></textarea></p>
		<p><label for="password">Password: </label><input type="password" name="password" id="password"></p>
		<p><button type="submit">Post</button></p>
	</form>
<?php echo getFooter(); ?>
