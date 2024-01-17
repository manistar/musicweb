<?php $plans = $d->fastget("plans", "date", ";");
if (isset($_GET['tablename'])) {
  $table = htmlspecialchars($_GET['tablename']);
} else {
  $table = "example1";
}
?>
<div class='card bg-success p-3'>
  <div class="custom-control custom-switch">
    <input type="checkbox" value="1" name="status" class="custom-control-input" id="free_for_all" onclick="updatestaus(this.id, 'settings')" <?php if(free_for_all == 1){ echo "checked"; } ?> />
    <label class="custom-control-label" for="free_for_all">Turn on/off website Pricing</label> <br>
    <small>If you turn off this button all website features will be free for all registered users.</small>
  </div> 
</div>
<table id="<?= $table; ?>" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Status</th>
      <th>Name</th>
      <!-- <th>ID</th> -->
      <th>Added By</th>
      <th>Price</th>
      <th>Plan Type</th>
      <th>Free Trial</th>
      <th>Duration</th>
      <th>No of ADS</th>
      <th>Image/ADS</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $c->planstable($plans);
    ?>
  </tbody>
</table>