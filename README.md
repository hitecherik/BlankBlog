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

Once you've saved these, open `setup.php` in the browser. If you see a success message, you're good to go!

## Building on BlankBlog

BlankBlog is very easy to build on. There are 14 main PHP files:

- `footer.php` - footer for every page
- `header.php` - header for every page
- `blogurl.php` - script that finds the blog's root url, used in almost every page
- `index.php` - blog home page
- `fetch.php` - fetches all blog posts for home page
- `post-form.php` - form to create post
- `post.php` - submits post and displays error/success message
- `posts.php` - page for individual blog posts
- `update-form.php` - form to edit individual post
- `update.php` - updates post and displays error/success message
- `delete-form.php` - enter password to delete individual post
- `delete.php` - deletes post and displays error/success message
- `settings.php` - all of the blog settings, used for every page.
- `setup.php` - run this once to install the blog *(you can delete this later if you want)*

There's also a `settings-sample.php` file in your BlankBlog download. Change the settings in this file and rename it to `settings.php`.

## Licence

Copyright (c) 2014-2016, Alexander Nielsen. Licenced under the MIT Licence *(see `LICENCE.md` for more details)*.

BlankBlog uses [Parsedown](http://parsedown.org) for Markdown parsing. See `parsedown/LICENCE.txt` for the Parsedown licence.
