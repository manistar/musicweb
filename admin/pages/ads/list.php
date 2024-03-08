<?php 
// require "include/ini-ads.php";
?>
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- hjdfhfdj -->
    <!-- Main content --> 
    <section class="content pt-2">
        <!-- START ACCORDION & CAROUSEL-->
        <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card"> 
                    <!-- <div class="card-header">
                        <h3 class="card-title">Users | </h3> <a href="staff.php?a=add" class="btn btn-primary">Add new user</a>
                    </div> -->
                    <!-- ./card-header -->
                    <div class="card-body" id="adstable">
                        <?php
                        switch (htmlspecialchars($_GET['p'])) {
                            case 'list':
                                require "consts/ads/list.php";
                                break;
                            case 'add':
                                require "consts/ads/add.php";
                                break;
                            case 'view':
                                require "consts/ads/view.php";
                                break;
                            case 'edit':
                                require "consts/ads/edit.php";
                                break;
                                case 'search':
                                    require "consts/ads/searchuser.php";
                                    break;

                            default:
                                require "consts/ads/list.php";
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
