#!usr/bin/python27

def get_the_data():
	"""Retrieves blog data from user."""

	# define variables
	mysql_settings = {}
	password = ""
	blogtitle = ""
	blogurl = ""
	
	# mysql settings
	print "MySQL Settings"
	print "--------------"
	print
	
	mysql_settings = {
		"username": raw_input("MySQL Username: "),
		"password": raw_input("MySQL Password: "),
		"database-name": raw_input("MySQL Database Name: "),
		"table-name": raw_input("MySQL Desired Table Name: "),
		"host": raw_input("MySQL Host: ")
	}
	
	print
	
	# password
	print "Blog Password"
	print "-------------"
	print
	
	password = raw_input("Blog Password: ")
	
	print
	
	# title
	print "Blog Title"
	print "----------"
	print
	
	blogtitle = raw_input("Blog Title: ")
	
	print
	
	# url
	print "Blog URL"
	print "--------"
	print
	
	blogurl = raw_input("Blog URL: ")
	
	if blogurl[-1] != "/":
		blogurl += "/"
	
	return {
		"mysql_settings": mysql_settings,
		"password": password,
		"blogtitle": blogtitle,
		"blogurl": blogurl
	}


def write_to_file(mysql_settings, password, blogtitle, blogurl):
	"""Writes retrieved blog data to settings.php"""
	
	# start off
	file_contents = "<?php\n\n"
	
	# mysql settings
	file_contents += "$mysql = array(\n"
	for setting in mysql_settings.keys():
		file_contents += "\t\"%s\" => \"%s\",\n" % (setting, mysql_settings[setting])
	file_contents += ");\n\n"
	
	# password
	file_contents += "$password = \"%s\";\n\n" % (password)
	
	# blog title
	file_contents += "$blogtitle = \"%s\";\n\n" % (blogtitle)
	
	# blog url
	file_contents += "$blogurl = \"%s\";\n\n" % (blogurl)
	
	# finish off
	file_contents += "?>"
	
	# write to settings.php
	f = open("settings.php", "w")
	f.write(file_contents)
	f.close
	
	# tell main() that no errors occured
	return True;


def main():
	"""Calls all the functions."""

	# get blog data
	blog_data = get_the_data()
		
	print
	
	# write to file
	if write_to_file(**blog_data):
		print "File written to settings.php! You're good to go!"
	else:
		print "Failed. Please try again."


if __name__ == "__main__":
	main()
	
	print
	raw_input("Press return to exit.")
	exit()