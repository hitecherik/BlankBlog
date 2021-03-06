<?php
	include "settings.php";
	include "common.php";
	
	$db = getDB();
	
	$id = 1;
	
	if ((int) $db->querySingle("SELECT COUNT(*) FROM {$sql['table-name']}") > 0) {
		$ids = [];
		$id_results = $db->query("SELECT ID FROM {$sql['table-name']}");
		
		while ($row = $id_results->fetchArray()) {
			array_push($ids, (int) $row["ID"]);
		}
		
		rsort($ids);
		
		$id = $ids[0] + 1;
	}
	
	$title = str_replace("'", "''", $_POST["title"]);
	$content = str_replace("'", "''", $_POST["content"]);
	$date = date($dateformat);
	
	if ($_POST["password"] == $password) {
		$result = $db->exec("INSERT INTO {$sql['table-name']} (ID, Title, Content, Date) VALUES ($id, '$title', '$content', '$date')");
	} else {
		$result = false;
	}
	
	echo getHeader("{$title} :: {$blogtitle}");
?>
	<h2>"<?php echo str_replace("\'", "'", $title); ?>" - post creation</h2>
	<p>
		<?php
			if($result){
				echo "The post was successful.";
			} else {
				echo "The post was not successful.</p><p>Ty reloading this page and trying again, or check if you have entered your password correctly.";
			}
		?>
	</p>
<?php echo getFooter(); ?>
