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
          <thead class="thead-dark">
            <tr>
              <th>Description</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
[[ foreach ($todos as $todo) : ]]
  <tr>
    <td><?php echo "{$row['STU_LNAME']}, {$row['STU_FNAME']}" ?></td>
    <td>
      <div class="btn-toolbar">
        <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="view.php" stu_num="<?php echo "{$row['STU_NUM']}"?>"><span class="material-icons">visibility</span>&nbsp;View</button>
        <button class="btn btn-secondary d-flex justify-content-center align-content-between mr-1 addclickhandler" action="edit.php" stu_num="<?php echo "{$row['STU_NUM']}"?>"><span class="material-icons">mode_edit</span>&nbsp; Edit</button>
        <button class="btn btn-secondary d-flex justify-content-center align-content-between addclickhandler" action="delete.php" stu_num="<?php echo "{$row['STU_NUM']}"?>"><span class="material-icons">delete</span>&nbsp;Delete</button>
      </div>
    </td>
  </tr>
<?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <ol>
      [[ foreach ($todos as $todo) : ]]
      <li>
        <a href="@@todo/view/{{$todo['id']}}@@">[View]</a> <a href="@@todo/edit/{{$todo['id']}}@@">[Edit]</a> <a href="@@todo/delete/{{$todo['id']}}@@">[Del]</a> {{$todo['description']}}
      </li>
      [[ endforeach; ]]
    </ol>

  </div>
</div>

<div class="row">
  <div class="col-lg-8 offset-2">
    <h2>Past To Do:</h2>
    <ol>
      [[ foreach ($dones as $todo) : ]]
      <li>
        <a href="@@todo/view/{{$todo['id']}}@@">[View]</a> <a href="@@todo/edit/{{$todo['id']}}@@">[Edit]</a> <a href="@@todo/delete/{{$todo['id']}}@@">[Del]</a> {{$todo['description']}}
      </li>
      [[ endforeach; ]]
    </ol>
  </div>
</div>
          
%% views/footer.html %% 