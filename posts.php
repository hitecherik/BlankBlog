<?php
	include 'settings.php';

	$id = $_GET["p"];
	
	$query = "SELECT * from " . $mysql["table-name"] . " WHERE ID = $id";
	
	mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]);
		
	@mysql_select_db($mysql["database-name"]) or die("Unable to select database");
	
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

		<p class="update-post"><a href="<?php echo "$blogurl/update-form.php?p=$id"; ?>">Update Post</a></p>
		
		<div class="post-date">
			<?php echo $date; ?>
		</div>
		
		<div class="post-content">
			<?php echo $content; ?>
		</div>
	</article>
<?php include "footer.php"; ?>