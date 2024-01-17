<div class="col-md-6">
  <div class="card bg-dark">
    <div class="card-header">
      <h3 class="card-title">Add</h3> <br>
      <small> <b>NOTE:</b> You will need to <a href="categories.php?a=main">Reload</a> this page for what added to show on this page</small>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <button id="add_cat" data-url="categories/add_cat" data-id="add_cat" data-title="New Category" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Add category</button>
    <button id="adduser" data-url="categories/add_sub" data-id="adduser" data-title="New sub category" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="btn btn-light">Add Sub category</button>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>