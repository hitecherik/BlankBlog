<?php
	include "settings.php";

	preg_match("/^\d+/", $_GET["p"], $matches);
	$id = $matches[0];
	
	$db = new SQLite3($sql["database-file"]);
	
	if((int) $db->querySingle("SELECT COUNT(*) FROM {$sql['table-name']} WHERE ID = $id") == 0) {
		header("Location: $blogurl");
	}
	
	$result = $db->querySingle("SELECT Title, Content, Date FROM {$sql['table-name']} WHERE ID = $id", true);
	
	$title = $result["Title"];
	$content = $result["Content"];
	$date = $result["Date"];

	$pagetitle = "$title :: $blogtitle";

	include "header.php";
?>	
	<article class="post">
		<h2 class="post-title"><?php echo $title; ?></h2>

		<p class="update-post"><a href="<?php echo "$blogurl/update-form.php?p=$id"; ?>">Update Post</a> | <a href="<?php echo "$blogurl/delete-form.php?p=$id"; ?>">Delete Post</a></p>
		
		<div class="post-date">
			<?php echo $date; ?>
		</div>
		
		<div class="post-content">
			<?php echo $content; ?>
		</div>
	</article>
<?php include "footer.php"; ?>
