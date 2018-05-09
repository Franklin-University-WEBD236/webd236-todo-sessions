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
<div class='display'>
    <label>Description:</label>
    <div class='value'><?php echo($todo['description']); ?></div>
    <label>Done?:</label>
    <div class='value'><?php echo($todo['done'] ? 'yes' : 'no'); ?></div>
</div>
<p><a href="/index"><< Back</a></p>
        <div class="footer">
            Copyright &copy; 2012 Todd Whittaker <a href="https://glitch.com/edit/#!/remix/tart-cemetery">Remix on Glitch</a>
        </div>
        </div><!-- content div -->
    </body>
</html>
