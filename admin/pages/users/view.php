<?php
$userID = $_GET["id"]; // get the user id from url parameter
$data = $d->getall("users", "ID = ?", [$userID], fetch:"details");
// require_once "include/ini-users.php";
?>
<!-- Content Wrapper. Contains page content -->
<diV class="content-wrapper">
 
  <!-- Main content -->
  <section class="content">
    <!-- START ACCORDION & CAROUSEL-->
    <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
<!-- Main content -->
<!-- <section class="content">
    <div class="container-fluid" id="content">
        <div class="row">
            <div class="col-md-3"> -->

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../upload/profile/<?= $data['upload_image'] ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $data['first_name'] . ' ' . $data['last_name']; ?></h3>
                        <p class="text-muted text-center"><a href="mailto:<?= $data['email'] ?>"><?= $data['email'] ?></a></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li id="e<?= $data['ID'] ?>" data-url="users/followers" data-id="<?= $data['ID']; ?>" data-title="Users following <?= $data['first_name'] ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="list-group-item btn">
                                <b>Followers</b> <a class="float-right"><?= number_format($fu->totalfollowers($userid)); ?></a>
                            </li>
                            <li id="f<?= $user['ID'] ?>" data-url="users/following" data-id="<?= $data['ID']; ?>" data-title="<?= $data['first_name'] ?> following" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="list-group-item btn">
                                <b>Following</b> <a class="float-right"><?= number_format($fu->totalfollowing($userid)); ?></a>
                            </li>
                            <!-- <li class="list-group-item">
                                <b>Ads</b> <a class="float-right"></a>
                            </li> -->
                        </ul>
                        <?php if ($_GET['a'] != "view") { ?>
                            <a href="users.php?a=view&id=<?= $user['ID']; ?>" class="btn btn-default btn-block"><b>Overview</b></a>
                        <?php } else { ?>
                            <a href="users.php?a=post&id=<?= $user['ID']; ?>" class="btn btn-dark btn-block"><b>Post Ads</b></a>

                        <?php } ?>
                    </div>
                    <!-- /.card-body -->


                </div>
                <!-- /.card -->

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Contact </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">
                        <address>
                            <?php echo $user['street'] . ' ' . $d->getaddress(["cities" => $user['city'], "states" => $user['state'], "countries" => $user['country']]); ?>
                        </address>
                        </p>

                        <hr>

                        <strong><i class="fa fa-phone mr-1"></i> Phone Number</strong>

                        <p class="text-muted">
                            <a href="tel:+<?= $user['phone_number'] ?>"><?= $user['phone_number'] ?></a>
                        </p>

                        <hr>

                        <strong><i class="fa fa-inbox mr-1"></i> Email</strong>

                        <p class="text-muted"> <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a> </p>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- About Me Box -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9 p-3">
                <?php
                switch (htmlspecialchars($_GET['p'])) {
                    case 'post':
                        require "content/ads/post.php";
                        break;

                    default:
                ?>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link <?php if (!isset($_GET['userads'])) {
                                                                                echo 'active';
                                                                            } ?>" href="#activity" data-toggle="tab">Overview</a></li>

                                    <?php if (isset($_GET['userads'])) { ?>
                                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Ads</a></li>
                                    <?php } else { ?>
                                        <li class="nav-item"><a class="nav-link " href="users.php?a=view&id=<?= $user['ID'] ?>&userads=show">Ads</a></li>
                                    <?php } ?>

                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="<?php if (!isset($_GET['userads'])) {
                                                    echo 'active';
                                                } ?> tab-pane" id="activity">
                                        <!-- user content -->
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Total ADS posted</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?= number_format($p->totalads($userid)); ?></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Active Ads</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?= number_format($p->totalads($userid, 1)); ?></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Soldout</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?= number_format($p->totalads($userid, 2)); ?></span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>


                                        <hr>
                                        <!-- Table row -->
                                        <div class="row" style="box-shadow: none!important;">
                                            <div class="d-flex align-items-center mb-3">
                                                <h5 class="m-0">Recent Ads <small> <a href="">see all</a> </small>
                                                </h5>
                                            </div>
                                            <div class="row">
                                                <?php
                                                foreach ($ads as $row) {
                                                    $c->getproduct($row, "col-md-4 card");
                                                }
                                                ?>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->


                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane <?php if (isset($_GET['userads'])) {
                                                                echo 'active';
                                                            } ?>" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline-inverse">
                                            <div>
                                                <div class="timeline-item" style="display:none">
                                                    <h3 class="timeline-header" style="display:none"><a href="#"></a></h3>
                                                </div>
                                            </div>
                                            <!-- <div style="display: none;" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content"> </div> -->
                                            <div id="adstable">
                                                <?php require_once "content/ads/list.php"; ?>
                                            </div>

                                            <!-- END timeline item -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <?php // require_once "content/users/edit.php"; 
                                        ?>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                <?php
                        break;
                }
                ?>

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
    </div><!-- /.container-fluid -->
</section>
</diV>
<!-- /.content -->