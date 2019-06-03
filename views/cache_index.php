<!DOCTYPE html>
<html>
  <head>
    <title>To do list model 2</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/static/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="parts/custom.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-2">
          <h1 class="display-4">To do list model 2</h1>
          <p class="lead">Keep track of things that you need to do.</p>
          <p><em>Author: <a href="https://www.franklin.edu/about-us/faculty-staff/faculty-profiles/whittakt">Todd Whittaker</a></em></p>
          <hr>
        </div>
      </div>

<div class="row">
  <div class="col-lg-8 offset-2">
    <h1><?php echo($title); ?></h1>

      <form action="/todo/add" method="post">
      <div class="form-group">
        <label for="description">Add a new todo.</label>
        <input type="text" min="1" id="description" name="description" class="form-control" placeholder="Enter description" value=""/>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
</div>

<div class="row">
  <div class="col-lg-8 offset-2">
    <h2>Current To Do:</h2>
      
    <table class="table table-striped" frame="box">
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
<?php  foreach ($todos as $todo) : ?>
        <tr>
          <td class="align-middle"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar align-middle float-right">
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-success mr-1 addclickhandler" action="done.php" todo_id="<?php echo "{$todo['id']}"?> onclick="alert('hello')"><span class="material-icons">done</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-primary mr-1 addclickhandler" action="edit.php" todo_id="<?php echo "{$todo['id']}"?>"><span class="material-icons">mode_edit</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-danger addclickhandler" action="delete.php" todo_id="<?php echo "{$todo['id']}"?>"><span class="material-icons">delete</span></button>
            </div>
          </td>
        </tr>
<?php  endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-lg-8 offset-2">
    <h2>Past To Do:</h2>
    <table class="table table-striped" frame="box">
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
<?php  foreach ($dones as $todo) : ?>
        <tr>
          <td class="align-middle"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar align-middle float-right">
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-success mr-1 addclickhandler" action="done.php" todo_id="<?php echo "{$todo['id']}"?>"><span class="material-icons">done</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-primary mr-1 addclickhandler" action="edit.php" todo_id="<?php echo "{$todo['id']}"?>"><span class="material-icons">mode_edit</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-danger addclickhandler" action="delete.php" todo_id="<?php echo "{$todo['id']}"?>"><span class="material-icons">delete</span></button>
            </div>
          </td>
        </tr>
<?php  endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<form action="this_is_replaced_by_javascript" method="post" id="todoaction">
  <input type="hidden" id="id" name="id" value="">
</form>
          
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>.</span>
      </div>
    </footer>
  </body>
</html> 