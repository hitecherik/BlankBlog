<?php
	include 'settings.php';
	
	$query = "SELECT * from " . $mysql["table-name"];
	$titles = array("blank");
	$contents = array("blank");
	$dates = array("00/00/00");
	$output = "";
	
	mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]);
	
	@mysql_select_db($mysql["database-name"]) or die("Unable to select database");
		
	$qresult = mysql_query($query) or die("It doesn't look like you've run <a href='$blogurl/setup.php'>setup.php</a> yet!");
	$numrows = mysql_numrows($qresult);
	
	for($i=0;$i<$numrows;$i++){
		array_push($titles,mysql_result($qresult,$i,"Title"));
		array_push($contents,mysql_result($qresult,$i,"Content"));
		array_push($dates,mysql_result($qresult,$i,"Date"));
	}
	
	for($i=$numrows;$i>0;$i--){
		$title = $titles[$i];
		$date = $dates[$i];
		$content = $contents[$i];
		$output .= "<article class='post'><h3 class='post-title'><a href='$blogurl/posts.php?p=$i'>$title</a></h3><div class='post-date'>$date</div><div class='post-content'>$content</div></article>";
	}
?>