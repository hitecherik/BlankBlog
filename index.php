<?php
	include "fetch.php";

	$pagetitle = $blogtitle;

	include "header.php";
?>	
	<p><a href="post-form.php">Create a post</a></p>
	
	<div id="posts">
		<h2>Posts</h2>
		<?php echo $output; ?>
	</div>
<?php include "footer.php"; ?>
