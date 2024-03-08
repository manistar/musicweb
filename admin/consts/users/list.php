<?php require_once "include/ini-users.php"; ?>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Status</th>
      <th>ID</th>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Email</th>
      <th>Address</th>
      <th>Status</th>
      <th>Joined on</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(is_array($users) || $users->rowCount() > 0) {
    // require_once "../function/users.php";
    // $u = new users;
    foreach ($users as $row) {
    // var_dump($ads->rowCount());
    $c->userstable($row);
      } } ?>
  </tbody>
</table>