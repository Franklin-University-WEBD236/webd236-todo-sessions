%% views/header.html %%

<div class="row">
  <div class="col-lg-12">

    <form action="@@login@@" method="post">
      <div class="form-group">
        <label for="email">email address</label>
        <input type="text" min="1" id="email" name="email" class="form-control" placeholder="Enter email address" value="{{$todo['description']}}" />
        <input type="hidden" id="done" name="done" value="{{$todo['done']}}" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" onclick="return get('@@index@@')">Cancel</button>
      </div>
    </form>
  </div>
</div>

%% views/footer.html %%
