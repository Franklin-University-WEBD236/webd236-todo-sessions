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
<form action="/todo/add" method="post">
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" />
    <input type="submit" value="Add" />
</form>
<h2>Current To Do:</h2>
<ol>
    <?php  foreach ($todos as $todo) : ?>
    <li>
        <a href="/todo/view/<?php echo($todo['id']); ?>">[View]</a> <a href="/todo/edit/<?php echo($todo['id']); ?>">[Edit]</a> <a href="/todo/delete/<?php echo($todo['id']); ?>">[Del]</a> <?php echo($todo['description']); ?>
    </li>
    <?php  endforeach; ?>
</ol>

<h2>Past To Do:</h2>
<ol>
    <?php  foreach ($dones as $todo) : ?>
    <li>
        <a href="/todo/view/<?php echo($todo['id']); ?>">[View]</a> <a href="/todo/edit/<?php echo($todo['id']); ?>">[Edit]</a> <a href="/todo/delete/<?php echo($todo['id']); ?>">[Del]</a> <?php echo($todo['description']); ?>
    </li>
    <?php  endforeach; ?>
</ol>

        <div class="footer">
            Copyright &copy; 2012 Todd Whittaker <a href="https://glitch.com/edit/#!/remix/tart-cemetery">Remix on Glitch</a>
        </div>
        </div><!-- content div -->
    </body>
</html> 