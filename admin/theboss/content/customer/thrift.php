<table id="example1" class="table table-bordered table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>PayID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Balance</th>
    <th>Paid</th>
    <th>Task</th>
    <th>Date to pay</th>
    <th>Status</th>
    <th>Date</th>
    <th>Pay: </th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
      <?php 
            $cu->fetchadmincooperativeaccount();
      ?>
</tbody>
</table>