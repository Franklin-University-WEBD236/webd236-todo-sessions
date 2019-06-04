<!DOCTYPE html>
<html>
  <head>
    <title><?php echo($title); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/static/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="static/custom.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-2">
          <h1 class="display-4"><?php echo($title); ?> model 2</h1>
          <p class="lead">Keep track of things that you need to do.</p>
          <p><em>Author: <a href="https://www.franklin.edu/about-us/faculty-staff/faculty-profiles/whittakt">Todd Whittaker</a></em></p>
          <hr>
        </div>
      </div>

<div class="row">
  <div class="col-lg-8 offset-2">

    <form action="/todo/edit" method="post">
      <div class="form-group">
        <label for="description">Make your changes below</label>
        <input type="text" min="1" id="description" name="description" class="form-control" placeholder="Enter description" value="<?php echo($todo['description']); ?>" />
        <input type="hidden" id="done" name="done" value="<?php echo($todo['done']); ?>" />
        <input type="hidden" id="id" name="id" value="<?php echo($todo['id']); ?>" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary">Cancel</button>
      </div>
    </form>
    <p><a href="/index"><< Back</a></p>
  </div>
</div>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>.</span>
      </div>
    </footer>
  </body>
</html>
