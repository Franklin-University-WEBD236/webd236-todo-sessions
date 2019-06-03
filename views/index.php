%% views/header.html %%

<div class="row">
  <div class="col-lg-8 offset-2">

    <h1>{{$title}}</h1>
    <form action="@@todo/add@@" method="post">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" />
        <input type="submit" value="Add" />
    </form>

<div class="row">
  <div class="col-lg-8 offset-2">
    <h2>Current To Do:</h2>
    <ol>
        [[ foreach ($todos as $todo) : ]]
        <li>
            <a href="@@todo/view/{{$todo['id']}}@@">[View]</a> <a href="@@todo/edit/{{$todo['id']}}@@">[Edit]</a> <a href="@@todo/delete/{{$todo['id']}}@@">[Del]</a> {{$todo['description']}}
        </li>
        [[ endforeach; ]]
    </ol>

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