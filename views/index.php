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
      
    <table class="table table-striped">
      <colgroup>
        <col class="col-md-1">
        <col class="col-md-7">
      </colgroup>
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
[[ foreach ($todos as $todo) : ]]
        <tr>
          <td><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar">
              <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="view.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">visibility</span>&nbsp;View</button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="edit.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">mode_edit</span>&nbsp; Edit</button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between addclickhandler" action="delete.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">delete</span>&nbsp;Delete</button>
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
          <td class="col-md-2"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar">
              <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="view.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">visibility</span>&nbsp;View</button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="edit.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">mode_edit</span>&nbsp; Edit</button>
              <button class="btn btn-secondary d-flex justify-content-center align-content-between addclickhandler" action="delete.php" stu_num="<?php echo "{$todo['id']}"?>"><span class="material-icons">delete</span>&nbsp;Delete</button>
            </div>
          </td>
        </tr>
[[ endforeach; ]]
      </tbody>
    </table>
  </div>
</div>
          
%% views/footer.html %% 