<?php
	include "settings.php";
	include "parsedown/Parsedown.php";
	include "common.php";
	
	$output = "";
	
	$db = new SQLite3($sql["database-file"]);
	$result = $db->query("SELECT * from {$sql['table-name']} ORDER BY ID DESC") or die("It doesn't look like you've run <a href='$blogurl/setup.php'>setup.php</a> yet!");
	
	echo getHeader($blogtitle);
?>	
	<p><a href="post-form.php">Create a post</a></p>
	
	<div id="posts">
		<h2>Posts</h2>
		<?php echo $output; ?>
		<?php
			while ($row = $result->fetchArray()) {
				$content = Parsedown::instance()->text($row["Content"]);
				
				echo "<div class=\"post\">
	<h3 class=\"post-title\">
		<a href=\"{$blogurl}/posts.php?p={$row['ID']}\">{$row['Title']}</a>
	</h3>
	
	<div class=\"post-date\">{$row['Date']}</div>
	<div class=\"post-content\">{$content}</div>
</div>";
			}
		?>
	</div>
<?php echo getFooter(); ?>
