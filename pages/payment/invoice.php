<?php 
if(isset($_GET['a']) && $_GET['p'] == "invoice" && isset($_GET['id']) && $_GET['id'] != ""){
    $id = htmlspecialchars($_GET['id']);
    $data = $d->getall("payment", "ID = ?", [$id], fetch: "details");
    if($userID && $userID == $data['userID']){
    $user = $d->getall("users", "ID = ?", $data['userID'], fetch: "details");
    $verify = $pay->verifyrav($data['transaction_id'], $data['price']);
    // print_r($verify);

?>

<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Register</li>
                </ul>
            </div>

<!-- <section class="content bg-white osahan-main-body rounded shadow-sm overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"> -->
                <!-- <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div> -->


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img style="width: 100px;" src="img/logo.png" alt="Logo" srcset="">
                                <span class="float-right" style="font-size: 13px;">Date/Time: <?= $data['date']; ?></span>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong><?= website_name ?></strong><br>
                                <?= content['address']; ?><br>
                                Phone: <?= content['phone_number']; ?><br>
                                Email: <?= content['email']; ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?= $user['first_name'].' '.$user['last_name']; ?></strong><br>
                                Phone: <?= $user['phone_number'] ?><br>
                                Email: <?= $user['email'] ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Gatway ID: <?= $data['transaction_id'] ?></b><br>
                            <br>
                            <b>Payment ID:</b> <?= $data['ID'] ?><br>
                            <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                            <!-- <b>Account:</b> 968-34567 -->
                            <?php  if($verify['status'] == "success"){ echo "<h2 class='text-success m-0'>PAID</h2>"; }else{ echo "<h2 class='text-danger m-0'>".$verify['status']."</h2> <small>Gateway: ".$verify['message']."</small>"; } ?>
                        </div>
                       
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Amount</th>
                                    <!-- <th>User</th> -->
                                    <th>For</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= currency['symbol'].''.number_format($data['price']); ?></td>
                                        <td><?= $data['payfor']; ?></td>
                                        <td><?= $verify['status'] ?></td>
                                        <td><?= $data['description'] ?></td>
                                        <td><?=  date("F d, Y", strtotime($data['date'])); ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php } }?>