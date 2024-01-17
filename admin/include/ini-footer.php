<!--  modal content -->
<?php if (in_array("modal", $script)) {
    require_once "content/modal.php";
} ?>

<?php if(in_array('showme', $script)){ ?>
<script>document.getElementById("showme").click();</script>
<?php } ?>
<?php if(in_array('chat', $script)){ ?>
    <script src="dist/js/apps/chat.js?n=43"></script>
<?php } ?>
<!-- wizard js -->
<?php if (in_array("wizard", $script)) { ?>
    <script src="dist/libs/jquery-steps/build/jquery.steps.min.js?n=10"></script>
    <script src="dist/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="dist/js/forms/form-wizard.js?n=1"></script>
<?php } ?>
<!-- Dashboard3 -->
<?php if (in_array("dashboard3", $script)) { ?>
    <script src="dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="dist/js/dashboard3.js?n=01"></script>
<?php } ?>
<!-- qr code js -->
<?php if (in_array("qrcode", $script)) { ?>
    <script src="qrcodejs/qrcode.min.js"></script>
    <script src="dist/js/qrcode.js?n=1"></script>
    <script>
        const qrcodelist = document.querySelectorAll('#genqr');

        qrcodelist.forEach(element => {
            console.log(element);
            data = element.getAttribute("data-info");
            showhere = element.getAttribute("data-id");
            // Get the container element
            var container = document.getElementById(showhere);
            // Text or data you want to encode in the QR code
            // QR code options (optional)
            var options = {
                // width: 200, // Width of the QR code (pixels)
                // height: 200, // Height of the QR code (pixels)
            };

            // Generate the QR code
            var qrcode = new QRCode(container, options);

            qrcode.makeCode(data);

        });
    </script>
<?php } ?>
<!-- fetch data -->
<?php if (in_array("fetcher", $script)) { ?>
    <script src="dist/js/fetcher.js"></script>
<?php } ?>
<!-- sweetalert -->
<?php if (in_array("sweetalert", $script)) { ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php } ?>

<!-- switch  -->
<?php if (in_array("switch", $script)) { ?>
    <h1>Switch</h1>
    <script src="dist/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
    <script src="dist/js/forms/bootstrap-switch.js"></script>
<?php } ?>
<!--  chart -->
<?php if (in_array("chart", $script)) { ?>
    <script src="dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="dist/js/charts.js?n=30"></script>
    <?php
    //  include chart data for this pahe if exists.
    if (isset($page) && file_exists("pages/$page/chart.php")) {
        require_once "pages/$page/chart.php";
    }
    ?>
<?php } ?>