<?php require "header.php";
require "include/ini-users.php";
?> 
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <!-- Main content -->
  <section class="content">
    <!-- START ACCORDION & CAROUSEL-->
    <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users | </h3> <button id="adduser" data-url="users/add" data-id="adduser" data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Add new user</button>
          </div>
          <!-- ./card-header -->
          <div class="card-body">
            <?php
            switch (htmlspecialchars($_GET['a'])) {
              case 'list':
                require "content/users/list.php";
                break;
                case 'post':
                  require "content/users/view.php";
                  break;
              case 'add':
                require "content/users/add.php";
                break;
              case 'view':
                require "content/users/view.php";
                break;
              case 'edit':
                require "content/users/edit.php";
                break;

              default:
                require "content/users/list.php";
                break;
            }
            ?>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
  </section>

  <?php require "footer.php"; ?>