<?php require_once "header.php"; ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->



    <?php 
    $from_date = "2021-07-14";
    $i = 0;
    while (10 > $i) {
      echo  $to_date = date("Y-m-d", strtotime("$from_date +$i week"))."<br>";
      $i++;
    }
  
    ?>
    </div>

    </body>

<footer>
  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/myjs.js"></script>
</footer>
</html>