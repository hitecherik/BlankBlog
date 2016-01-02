<?php
	include_once "blogurl.php";
	
	if (isset($db)) {
		$db->close();
	}
?>
	<footer>
		<?php if(!preg_match("/index\.php$/", $_SERVER["SCRIPT_FILENAME"])) { ?>
			<p><a href="<?php echo $blogurl; ?>">Go to homepage</a></p>
		<?php } ?>
		<p>Powered by <a href="http://hitecherik.github.io/BlankBlog" target="_blank">BlankBlog</a>.</p>
	</footer>
</body>
</html>
