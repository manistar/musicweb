<?php require "header.php";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="textarea/examples/css/site.css">
    <link rel="stylesheet" href="textarea/src/richtext.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="textarea/src/jquery.richtext.js"></script>
<div class="content-wrapper">

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
                        switch (htmlspecialchars($_GET['a'])) {
                            case 'general':
                                require "content/content/general.php";
                                break;
                            case 'terms':
                                require "content/content/terms.php";
                                break;
                            case 'view':
                                require "content/ads/view.php";
                                break;
                            case 'edit':
                                require "content/ads/edit.php";
                                break;
                                case 'search':
                                    require "content/ads/searchuser.php";
                                    break;

                            default:
                                require "content/ads/list.php";
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
    <!-- Summernote -->
    <!-- jQuery -->