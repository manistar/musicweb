<div class="bottom__to-top" id="bottom__to-top">
            <a href="#"><i class="fal fa-long-arrow-alt-up"></i></a>
        </div>

        <!-- Player -->
        <div>
            <div class="audio_player">
                <div class="player__cover">
                    <img src="musica/assets/img/covers/cover.svg">
                    <div class="my-auto audio-title-box">
                        <div class="audio-title player__title">Until I Met You</div>
                        <div class="audio-subtitle player__artist"> - Ava Cornish</div>
                    </div>
                </div>
                <div>
                    <audio src="musica/assets/audio/preview1.mp3" id="audio" controls></audio>
                </div>
            </div>
            <button class="player__btn" type="button"><i class="far fa-music"></i></button>
        </div>

        <!-- Search JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/my.js"></script>
        <!-- Search JS End -->

        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="musica/assets/js/jquery-3.5.1.min.js"></script>
        <script src="musica/assets/js/bootstrap.bundle.min.js"></script>
        <script src="musica/assets/js/owl.carousel.min.js"></script>
        <script src="musica/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="musica/assets/js/smooth-scrollbar.js"></script>
        <script src="musica/assets/js/select2.min.js"></script>
        <script src="musica/assets/js/slider-radio.js"></script>
        <script src="musica/assets/js/jquery.inputmask.min.js"></script>
        <script src="musica/assets/js/plyr.min.js"></script>
        <script src="musica/assets/js/main.js?m=89998"></script>
        
    
        
<script>
// Add an event listener to the button.
var button = document.getElementById('download-button');
button.addEventListener('click', function() {
  // Read the file contents.
  var xhr = new XMLHttpRequest();
  xhr.open('GET', '<?= $file_url; ?>', true);
  xhr.responseType = 'blob';

  xhr.onload = function() {
    if (this.status === 200) {
      // Create a download link with the file contents.
      var downloadUrl = URL.createObjectURL(this.response);
      var link = document.createElement('a');
      link.href = downloadUrl;
      link.download = '<?= $file_name; ?>';
      link.click();
      URL.revokeObjectURL(downloadUrl);
    }
  };

  xhr.send();
});
</script>

<script src="https://checkout.flutterwave.com/v3.js></script>
<!--  -->

<!--  -->
<script>
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
                    consumer_id: "<?php echo $data['ID'] ?>",
                    consumer_mac: "<?php echo $ipaddress ?>",
                },
                customer: {
                    email: "<?php echo $data['email'] ?>",
                    phone_number: "<?php echo $data['phone_number'] ?>",
                    name: "<?php echo $data['first_name'] . ' ' . $data['last_name']; ?>",
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



      <script>
        function myFunction() {
            let element = document.body;
            element.classList.toggle("dark");
        }
      </script>