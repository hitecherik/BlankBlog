<?php
	include "settings.php";
	include "parsedown/Parsedown.php";
	include "common.php";
		
	$id = false;
	$db = getDB();
	$query_string = "SELECT * from {$sql['table-name']}";
	$hnum = 3;
	
	if (isset($_GET["p"])) {
		preg_match("/^\d+/", $_GET["p"], $matches);
		$id = $matches[0];
		
		if ($id) {
			if((int) $db->querySingle("SELECT COUNT(*) FROM {$sql['table-name']} WHERE ID = $id") == 0) {
				$id = false;
			} else {
				$query_string .= " WHERE ID = {$id}";
				$hnum = 2;
			}
		}
	}
	
	$result = $db->query("{$query_string} ORDER BY ID DESC") or die("Trouble connecting to database.");
	
	echo getHeader($blogtitle);
?>	
	<p><a href="post-form.php">Create a post</a></p>
	
	<div id="posts">
		<?php
			if (((bool) $id) == false) {
				echo "<h2>Posts</h2>";
			}
			
			while ($row = $result->fetchArray()) {
				$content = Parsedown::instance()->text($row["Content"]);
				
				echo "<div class=\"post\">
	<h{$hnum} class=\"post-title\">";
				
				if (((bool) $id) == false) {
					echo "<a href=\"{$blogurl}/?p={$row['ID']}\">{$row['Title']}</a>";
				} else {
					echo $row["Title"];
				}
				
				echo "</h{$hnum}>";
				
				if ($id) {
					echo "<p class=\"update-post\"><a href=\"{$blogurl}/update-form.php?p={$id}\">Update Post</a> | <a href=\"{$blogurl}/delete-form.php?p={$id}\">Delete Post</a></p>";
				}
				
				echo "<div class=\"post-date\">{$row['Date']}</div>
	<div class=\"post-content\">{$content}</div>
</div>";
			}
		?>
	</div>
<?php echo getFooter((bool) $id); ?>
