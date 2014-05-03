<?php
	include 'settings.php';
	include 'get_mysql.php';
	
	$ids = array("blank");
	$titles = array("blank");
	$contents = array("blank");
	$dates = array("00/00/00");
	$output = "";
	
	get_mysql();
	$query = "SELECT * from " . $mysql["table-name"];
	$qresult = mysql_query($query) or die("It doesn't likook le you've run <a href='$blogurl/setup.php'>setup.php</a> yet!");
	$numrows = mysql_numrows($qresult);
	
	for($i=0;$i<$numrows;$i++){
		array_push($ids, mysql_result($qresult, $i, "ID"));
		array_push($titles,mysql_result($qresult,$i,"Title"));
		array_push($contents,mysql_result($qresult,$i,"Content"));
		array_push($dates,mysql_result($qresult,$i,"Date"));
	}
	
	for($i=$numrows;$i>0;$i--){
		$id = $ids[$i];
		$title = $titles[$i];
		$date = $dates[$i];
		$content = $contents[$i];
		$output .= "<article class='post'><h3 class='post-title'><a href='$blogurl/posts.php?p=$id'>$title</a></h3><div class='post-date'>$date</div><div class='post-content'>$content</div></article>";
	}
?>