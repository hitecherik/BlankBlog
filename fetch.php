<?php
	include 'settings.php';
	
	$query = "SELECT * from " . $mysql["table-name"];
	$titles = array("blank");
	$contents = array("blank");
	$dates = array("00/00/00");
	$output = "";
	
	if($mysql["host"]=="localhost"){
		mysql_connect(localhost, $mysql["username"], $mysql["password"]);
	} else {
		mysql_connect($mysql["host"], $mysql["username"], $mysql["password"]);
	}
	
	@mysql_select_db($mysql["database-name"]) or die("Unable to select database");
		
	$qresult = mysql_query($query);
	$numrows = mysql_numrows($qresult);
	
	for($i=0;$i<$numrows;$i++){
		array_push($titles,mysql_result($qresult,$i,"Title"));
		array_push($contents,mysql_result($qresult,$i,"Content"));
		array_push($dates,mysql_result($qresult,$i,"Date"));
	}
	
	for($i=$numrows+1;$i>0;$i--){
		$output .= "<article class='post'><h3 class='post-title'><a href='$blogurl/posts.php?p=" . $i . "'>" . $titles[$i] . "</a></h3><div class='post-date'>" . $dates[$i] . "</div><div class='post-content'>" . $contents[$i] . "</div></article>";
	}
?>