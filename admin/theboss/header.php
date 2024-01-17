<?php
require_once 'include/ini.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= website_name ?> | Admin Area</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="css/notification.css">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script> -->

  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: right;
      padding-right: .75rem;
    }

    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }

    .card-title .btn {
      color: white !important;
    }

    .catinput {
      background-color: transparent !important;
      color: white !important;
      border: none;
    }

    iframe {
      width: 100%;
      height: 600px;
    }

    .danger {
      color: red !important;
    }

    .success {
      color: green !important;
    }

    ::-webkit-input-placeholder {
      text-transform: capitalize;
    }

    :-moz-placeholder {
      text-transform: capitalize;
    }

    ::-moz-placeholder {
      text-transform: capitalize;
    }

    :-ms-input-placeholder {
      text-transform: capitalize;
    }

    label,
    .name {
      text-transform: capitalize;
    }

    .box {
      display: none;
    }

    .overflow {
      height: 400px;
      overflow: scroll;

    }

    /* width */
    ::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      </ul>

      <!-- <form action="report.php" method="post" class="row" style="display:flex;">
      
        <input type="datetime-local" class="form-control col-4" name="datefrom" value="<?php if (isset($_POST['datefrom'])) {
                                                                                          echo $_POST['datefrom'];
                                                                                        } ?>" id=""> <input type="datetime-local" class="form-control col-4 ml-1" value="<?php if (isset($_POST['dateto'])) {
                                                                                                                                                                            echo $_POST['dateto'];
                                                                                                                                                                          } ?>" name="dateto" id=""> <input type="submit" class="btn btn-dark ml-1" name="report" value="Report">
      </form> -->

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../img /logo.png" alt="Besttimelive logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= website_name ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $user['first_name'] . ' ' . $user['last_name'] . ' <br> [' . $user['ID'] . ']'; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- <li class="nav-item">
                <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                    Templates
                </p>
                </a>
            </li> -->

            <!-- tasks  -->
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon  fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-warning"><?= $count ?></span> -->
                </p>
              </a>
            </li>
            <!-- end of tasks  -->

            <!-- customer start  -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Manage your Users
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="users.php?a=add" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Create new user</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="users.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All users</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- customer end  -->

            <!-- thrift start  -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                  Ads
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="ads.php?a=search" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Post ads</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="ads.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Ads</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- thrift end  -->

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-check"></i>
                <p>
                  Plans
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="plans.php?a=add" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Create Plan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="plans.php?a=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All plans</p>
                  </a>
                </li>
              </ul>
            </li>


            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Manage Admins
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="staff.php?a=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add new Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="staff.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All admins</p>
                  </a>
                </li>
              </ul>
            </li> -->


            <li class="nav-item">
              <a href="categories.php?a=main" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Manage Categories
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="payment.php" class="nav-link">
                <i class="nav-icon fas fa-money-check"></i>
                <p>
                  Payment
                </p>
              </a>
            </li>
            <!-- co-operateive end -->

            <li class="nav-item">
              <a href="settings.php" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings

                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info"></i>
                <p>
                  Web Content
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="content.php?a=general" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact & General Info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="content.php?a=terms" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Terms, Privacy & Policy</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="password.php" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                  Password
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?logout" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>