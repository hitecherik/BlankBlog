<?php
	preg_match("/^(?P<path>.+)\//", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}", $blogurl_matches);
	
	$blogurl = $blogurl_matches["path"];
?>
