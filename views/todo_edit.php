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

    <div class='inputs'>
        <form action="@@todo/update@@" method="post">
            <input type="hidden" id="id" name="id" value="{{$todo['id']}}" />
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{$todo['description']}}" />
            <label for="done">Done?:</label>
            <input type="text" id="done" name="done" value="{{$todo['done']}}" />
            <input type="submit" value="Update" />
        <form>
    </div>
    <p><a href="@@index@@"><< Back</a></p>
  </div>
</div>
%% views/footer.html %%
