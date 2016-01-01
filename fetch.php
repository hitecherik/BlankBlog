<?php
	include "settings.php";
	
	$output = "";
	
	$db = new SQLite3($sql["database-file"]);
	$result = $db->query("SELECT * from {$sql['table-name']}") or die("It doesn't look like you've run <a href='$blogurl/setup.php'>setup.php</a> yet!");
	
	while ($row = $result->fetchArray()) {
		$output = "<article class='post'><h3 class='post-title'><a href='$blogurl/posts.php?p={$row['ID']}'>{$row['Title']}</a></h3><div class='post-date'>{$row['Date']}</div><div class='post-content'>{$row['Content']}</div></article>$output";
	}
?>
