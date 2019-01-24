<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title><?php echo($title); ?></title>
        <link rel="stylesheet" href="/static/style.css" />
    </head>
    <body>
        <div class="content">
<h1><?php echo($title); ?></h1>
<div class='inputs'>
    <form action="/todo/update" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo($todo['id']); ?>" />
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo($todo['description']); ?>" />
        <label for="done">Done?:</label>
        <input type="text" id="done" name="done" value="<?php echo($todo['done']); ?>" />
        <input type="submit" value="Update" />
    <form>
</div>
<p><a href="/index"><< Back</a></p>
        <div class="footer">
            Copyright &copy; 2012 Todd Whittaker <a href="https://glitch.com/edit/#!/remix/tart-cemetery">Remix on Glitch</a> <a href="phpliteadmin.php">Edit database</a>
        </div>
        </div><!-- content div -->
    </body>
</html>
