<?php
	include "settings.php";
	include "get_mysql.php";

	preg_match("/^\d+/", $_GET["p"], $matches);
	$id = $matches[0];
	
	get_mysql();
	$query = "SELECT * from " . $mysql["table-name"] . " WHERE ID = $id";
	$qresult = mysql_query($query);
	
	if(mysql_numrows($qresult) == 0) {
		header("Location: $blogurl");
	}
	
	$title = mysql_result($qresult, 0, "Title");
	$content = mysql_result($qresult, 0, "Content");
	$date = mysql_result($qresult, 0, "Date");

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