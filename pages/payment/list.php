<?php //require_once "content/header.php"; ?>

<section class="main">
    <div class="container-fluid">
        <div class="row row--grid"></div>

<nav aria-label="breadcrumb" class="breadcrumb mb-0 d-none">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php" class="text-success">Home</a></li>
                <li class="breadcrumb-item"><a href="pricing.php">Pricing</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">payment</a></li>

            </ol>
        </div>
    </nav>
    <section class="py-4 osahan-main-body p-5 col-lg-8 align-items-center">
    <?php
            switch (htmlspecialchars($_GET['p'])) {
                case 'invoice':
                  require "consts/payment/invoice.php";
                  break;
              default:
                require "consts/payment/new.php"; 
                break;
            }
            ?>

        <?php 
     
        
        ?>
        </div>
            </div>
    </section>

<?php require_once "content/footer.php"; ?>
    <script>
        //    chatBox =  document.getElementById("chatdiv").innerHTML
        // if(chatbox){
        // }



        function makePayment() {
            <?php
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $tx_ref = "PAY-" . uniqid();
            ?>
            FlutterwaveCheckout({
                public_key: "<?= flutterwave_public_key['meta_value']; ?>",
                tx_ref: "<?php echo $tx_ref ?>",
                amount: <?php echo $total ?>,
                currency: "<?= currency['code'] ?>",
                country: "<?= $d->getall("countries", "name = ?", currency['country'], fetch: "details")['sort_name']; ?>",
                payment_options: "card",
                redirect_url: // specified redirect URL
                    "<?= $d->geturl(); ?>",
                meta: {
                    consumer_id: "<?php echo $user['ID'] ?>",
                    consumer_mac: "<?php echo $ipaddress ?>",
                },
                customer: {
                    email: "<?php echo $user['email'] ?>",
                    phone_number: "<?php echo $user['phone_number'] ?>",
                    name: "<?php echo $user['first_name'] . ' ' . $user['last_name']; ?>",
                },
                callback: function(data) {
                    console.log(data);
                },
                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "<?= $des ?>",
                    description: "<?= $des; ?>",
                    logo: "img/logo.png",
                },
            });

            // pass payment info to data pass 

            $.ajax({
                type: 'POST',
                url: 'passer',
                data: {
                    newpayment: "payment",
                    payfor: "<?php echo $payfor; ?>",
                    payforID: "<?php echo $payforid; ?>",
                    ref: "<?php echo $tx_ref; ?>",
                    price: "<?= $total ?>",
                    title: "<?= $des ?>",
                    description: "<?= $des ?>",
                },
                success: function(response) {
                    // document.getElementById("tabledata").innerHTML = response;

                }
            });
        }
    </script>