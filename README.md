# BlankBlog

*BlankBlog* is a blogging platform built with PHP without all the hassle of a complicated one with many features.

The main aims of BlankBlog are:

- Keep it simple
- Make it easy to build upon

To do this, I haven't included any stylesheets or external libraries and there are only two necessary settings: your password and blog title. You don't even need a MySQL database.

## Installing BlankBlog

First, open the `settings.php` file (if there isn't one, rename `settings-sample.php` to `settings.php`). Change these settings:

- Password - `$password` variable
- Blog Title - `$blogtitle` variable

Changing the `$sql` and `$dateformat` variables is optional, but **don't** delete them from the file.

Once you've saved these, open the homepage and try to create a post. If it works, then you're good to go!

## Building on BlankBlog

BlankBlog is very easy to build on. There are 9 main PHP files:

- `common.php` - contains the header, footer and the blog's root url
- `index.php` - blog home page (contains list of posts or individual post)
- `post-form.php` - form to create post
- `post.php` - submits post and displays error/success message
- `update-form.php` - form to edit individual post
- `update.php` - updates post and displays error/success message
- `delete-form.php` - enter password to delete individual post
- `delete.php` - deletes post and displays error/success message
- `settings.php` - all of the blog settings, used for every page.

There's also a `settings-sample.php` file in your BlankBlog download. Change the settings in this file and rename it to `settings.php`.

## Licence

Copyright (c) 2014-2016, Alexander Nielsen. Licenced under the MIT Licence *(see `LICENCE.md` for more details)*.

BlankBlog uses [Parsedown](http://parsedown.org) for Markdown parsing. See `parsedown/LICENCE.txt` for the Parsedown licence.
