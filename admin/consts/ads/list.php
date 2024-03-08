<?php 
// require_once "inis/ini.php";
    require_once "include/ini-ads.php"; 

?>


 <?php
    if(isset($_GET['inner'])){
        $tableid = "example4";
    }else{
        $tableid = "example1";
    }
    ?>

<table id="<?= $tableid ?>" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Status</th>
      <th>ID</th>
      <th>Posted by</th>
      <th>Name</th>
      <th>Category</th>
      <th>Sub Category</th>
      <th>Tags</th>
      <th>Condition</th>
      <th>Price</th>
      <th>Last Price</th>
      <th>Description</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

    // || is_object($ads)
    if (is_array($ads) || $ads->rowCount() > 0) {
      foreach ($ads as $row) {
          $c->adstable($row);
      }
  } else {
      echo "No ads found";
  }

    ?>
  </tbody>
</table>