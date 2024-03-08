<section class="bg-white osahan-main-body rounded shadow-sm overflow-hidden">
    <?php require "include/ini-payment.php"; ?>
    <div class="container-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="osahan-status">

                    <div class="p-3 status-order border-bottom bg-white">
                        <p class="small m-0"><i class="icofont-ui-calendar"></i> <?= $date ?>
                        </p>
                    </div>
                    <div class="p-3 border-bottom bg-white">
                        <h6 class="font-weight-bold">User Information</h6>
                        <p class="m-0">Name: <?=$data['first_name'] . " " . $data['last_name'] ?></p>
                        <p class="m-0">Email: <?=$data['email'] ?></p>
                        <p class="m-0">Phone Number: <?= $data['phone_number'] ?></p>
                        <p class="m-0">Address: <?php echo $data['street'] . ' ' . $d->getaddress(["cities" => $data['city'], "states" => $data['state'], "countries" => $data['country']]); ?></p>

                    </div>

                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold">Payment</h6>
                        <p class="m-0">Payment for: <?= $payfor ?></p>
                        <p class="m-0">Payment Description: <?= $des ?></p>
                        <p class="m-0">Amount: <?= currency['symbol'] ?> <?= number_format($amount); ?> </p>
                        <!-- <p class="m-0">Status: <div class="my-1 step active">
                                                    <span class="icon text-success"><i
                                                            class="icofont-check-circled"></i></span>
                                                    <span class="text small">Preparing order</span>
                                                </div> </p> -->
                    </div>

                    <div class="p-3 border-bottom">

                        <img src="img/<?= $payment_method ?>.png" class="img-fluid sc-osahan-logo mr-2"> <span class="small text-success font-weight-bold"><?= $payment_method; ?>
                        </span>
                    </div>


                    <div class="p-3 border-bottom bg-white">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="font-weight-bold mb-1">Total Cost</h6>
                            <h6 class="font-weight-bold ml-auto mb-1"><?= currency['symbol'] ?> <?= number_format($total); ?></h6>
                        </div>

                        <form id="foo">
                            <?php
                            if (isset($_POST['pay'])) {
                                $pay->newpayment();
                            }
                            ?>
                            <input type="hidden" name="userID" value="<?= $data['ID']; ?>">
                            <input type="hidden" name="name" value="<?= $data['first_name'] . ' ' . $data['last_name']; ?>">
                            <input type="hidden" name="email" value="<?= $data['email'] ?>">
                            <input type="hidden" name="amount" value="<?= $total ?>">
                            <input type="hidden" name="payment_options" value="<?= $options ?>">
                            <input type="hidden" name="des" value="<?= $des ?>">
                            <input type="hidden" name="pay">
                            <!-- <input type="hidden" name="redirect_url" value="<?= $d->geturl(); ?>"> -->
                            <?php if ($payment_method == "" || $payment_method == "flutterwave" && !isset($_GET['transaction_id'])) { ?>
                                <script src="https://checkout.flutterwave.com/v3.js"></script>
                                <button onclick='makePayment()' class="btn btn-success">Proccesed</button>
                            <?php  } else if ($payment_method == "card") { ?>
                                <div id="custommessage"></div>
                                <!-- <input type="hidden" name="newpayment"> -->
                                <input type="hidden" name="cardpayment" value="<?= htmlspecialchars($_GET['paymentmethod']); ?>">
                                <input type="hidden" name="payfor" value="<?= $payfor ?>">
                                <input type="hidden" name="payforID" value="<?= htmlspecialchars($_GET['id']) ?>">
                                <input type="hidden" name="price" value="<?= $total ?>">
                                <input type="hidden" name="title" value="<?= $des ?>">
                                <input type="hidden" name="description" value="<?= $des ?>">

                                <button onclick='billcard()' class="btn btn-success">Proccesed</button>
                            <?php } ?>
                        </form>

                        <!-- <a href="" class="btn btn-success"></a> -->


                        <!-- <p class="m-0 small text-muted">You can check your order detail
                                                here,<br>Thank you for order.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>