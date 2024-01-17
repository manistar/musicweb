<?php 
    require_once "include/ini-staff.php"; 
    if($staffs != ""){ ?>
      <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Frist Name</th>
                      <th>Last Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($staffs as $row){ ?> 
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $id = $row['ID']; ?></td>
                      <td><?php echo $row['first_name']; ?></td>
                      <td><?php echo $row['last_name']; ?></td>
                      <td><?php echo $row['phone_number']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['type']; ?></td>
                     <th><?php echo $row['status']; ?></th>
                      <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="staff.php?a=assign&id=<?= $id ?>">Assign Role</a>
                        <a class="dropdown-item" href="staff.php?a=assigncustomer&id=<?= $id; ?>">Assign Customer</a>
                        <!-- <a class="dropdown-item" href="#"></a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="staff.php?a=view&id=<?= $id; ?>&staffID=<?= $id ?>">View Account</a>
                        </div>
                     </div>
                      </td>
                    </tr>
                    <?php } ?>
                    
                    
                  </tbody>
                </table>
   <?php }else{
        echo "No Staff assign to you";
    }
?>