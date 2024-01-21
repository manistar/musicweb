<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Status</th>
      <th>ID</th>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Email</th>
      <th>Address</th>
      <th>Joined on</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $c->userstable($users);
    ?>
  </tbody>
</table>