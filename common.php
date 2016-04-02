<?php
	include_once "settings.php";
	
	preg_match("/^(?P<path>.+)\//", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}", $blogurl_matches);
	$blogurl = $blogurl_matches["path"];
	
	function getHeader($pagetitle) {
		global $blogurl, $blogtitle;
		
		return "<!doctype html>
<html>
<head>
	<meta charset=\"utf-8\">
	<meta name=\"viewport\" content=\"width=device-width\">
	<title>{$pagetitle}</title>
</head>
<body>
	<header>
		<h1>{$blogtitle}</h1>
	</header>";
	}
	
	function getFooter($override=false) {
		global $blogurl;
		
		$footer = "<footer>";
		
		if(!preg_match("/index\.php$/", $_SERVER["SCRIPT_FILENAME"]) or $override) {
			$footer .= "<p><a href=\"{$blogurl}\">Go to homepage</a></p>";
		}
		
		$footer .= "<p>Powered by <a href=\"http://hitecherik.github.io/BlankBlog\" target=\"_blank\">BlankBlog</a>.</p>
	</footer>
</body>
</html>";
		
		return $footer;
	}
	
	function getDB() {
		global $sql;
		
		$db = new SQLite3($sql["database-file"]);
		
		$db->exec("CREATE TABLE IF NOT EXISTS {$sql['table-name']} (ID INT UNIQUE, Title VARCHAR(255), Content LONGTEXT, Date VARCHAR(255));");
		
		return $db;
	}
?>
