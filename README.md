# BlankBlog

*BlankBlog* is a blogging platform built with PHP without all the hassle of a complicated one with many features.

The main aims of BlankBlog are:

- Keep it simple
- Make it easy to build upon

To do this, I haven't included any stylesheets or external libraries and there are only four settings: MySQL details, password (for posting), blog name and blog URL.

## Installing BlankBlog

First, open the `settings.php` file. You can change these settings here:

- MySQL details - `$mysql` array *(you'll need a MySQL database, but not a table)*
- Password - `$password` variable
- Blog Title - `$blogtitle` variable
- Blog URL - `$blogurl` variable

Once you've saved these, open `setup.php` in the browser. If you see a success message, you're good to go!

## Building on BlankBlog

BlankBlog is very easy to build on. There are 7 main PHP files:

- `footer.php` - footer for every page
- `header.php` - header for every page
- `index.php` - blog home page
- `fetch.php` - fetches all blog posts for home page
- `post-form.php` - form to create post
- `post.php` - submits post and displays error/success message
- `posts.php` - page for individual blog posts

There are also two other files:

- `settings.php` - all of the MySQL and blog settings, used for every page
- `setup.php` - run this once to install the blog *(you can delete this later if you want)*

## Licence

Copyright (c) 2014, Alexander Nielsen, MIT Licence. See the `LICENCE.md` file for more details.