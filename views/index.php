%% views/header.html %%

<div class="row">
  <div class="col-lg-8 offset-2">
    <h1>{{$title}}</h1>

      <form action="@@todo/add@@" method="post">
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
      
    <table class="table table-striped" style="border:1">
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
[[ foreach ($todos as $todo) : ]]
        <tr>
          <td class="align-middle"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar align-middle float-right">
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-success mr-1 addclickhandler" action="done.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">done</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-primary mr-1 addclickhandler" action="edit.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">mode_edit</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between bg-danger addclickhandler" action="delete.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">delete</span></button>
            </div>
          </td>
        </tr>
[[ endforeach; ]]
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-lg-8 offset-2">
    <h2>Past To Do:</h2>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
[[ foreach ($dones as $todo) : ]]
        <tr>
          <td class="align-middle"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar align-middle float-right">
              <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="done.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">done</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="edit.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">mode_edit</span></button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between addclickhandler" action="delete.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">delete</span></button>
            </div>
          </td>
        </tr>
[[ endforeach; ]]
      </tbody>
    </table>
  </div>
</div>
          
%% views/footer.html %% 