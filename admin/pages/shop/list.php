<?php require_once "inis/ini.php"; ?>
<!-- Select2 -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <!-- START ACCORDION & CAROUSEL-->

    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">Users | </h3> <button id="adduser" data-url="users/add" data-id="adduser" data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Add new user</button> -->
          </div>
          <!-- ./card-header -->
          <div class="card-body">
            <form action="passer" id="foo" onsubmit="return false">

              <?= $c->create_form($store_insert); ?>

              <input type="hidden" name="create_products">
              <div id="custommessage"></div>
             
              <input type="submit" value="Submit" class="btn btn-primary">
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
  </section>