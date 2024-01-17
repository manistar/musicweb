<?php 
include 'header.php';
include 'include/ini-report.php';
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
           <!-- START ACCORDION & CAROUSEL-->
           <h5 class="mt-4 mb-2">Report (From: <?= date("F d, Y", strtotime($datefrom)) ?> - To: <?= date("F d, Y", strtotime($dateto)) ?>)</h5>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">General Figures</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"> <?php echo number_format($d->getnumber($customers)); ?> </h5>
                      <span class="description-text">Customers</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo number_format($d->getnumber($staffs)); // echo number_format($staffs->rowCount()); ?></h5>
                      <span class="description-text">Staff</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo number_format($d->getnumber($thrift)); // echo $thrift->rowCount(); ?></h5>
                      <span class="description-text">Thrift</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo number_format($d->getnumber($cooperative)); // echo $cooperative->rowCount(); ?></h5>
                      <span class="description-text">Co-operative</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo number_format($d->getnumber($cloan) + $d->getnumber($tloan)); ?></h5>
                      <span class="description-text">Loan</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo number_format($d->getnumber($withdraw)); ?></h5>
                      <span class="description-text">Withdraw</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

    
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Amount</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div class="card-footer">
                <div class="row">

                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $totalloan ?></h5>
                      <span class="description-text">Loan</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $totalwithdraw ?></h5>
                      <span class="description-text">Withdraw</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $totalpayin ?></h5>
                      <span class="description-text">Payin</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

    
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
                
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Customers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Frist Name</th>
                      <th>Last Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Address</th>
                      <!-- <th>Type</th> -->
                      <!-- <th>Status</th> -->
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($customers as $row){ ?> 
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $id = $row['ID']; ?></td>
                      <td><?php echo $row['first_name']; ?></td>
                      <td><?php echo $row['last_name']; ?></td>
                      <td><?php echo $row['phone_number']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <!-- <td><?php echo $row['type']; ?></td> -->
                      <!-- <th><?php echo $row['status']; ?></th> -->
                    </tr>
                    <?php } ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Thrift</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <!-- <th><input type="checkbox" onClick="checkall('foos')" /><br/></th> -->
                      <th>ID</th>
                      <th>Created By</th>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Balance</th>
                      <th>Duration From</th>
                      <th>Duration To</th>
                      <th>Payment Plan</th>
                      <th>Status</th>
                      <th>Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                        <?php $c->thrifttable($thrift, "yes"); ?>
                  </tbody>
                </table>
                <h5>Loan</h5>

                <table id="example1" class="table table-bordered table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Created by</th>
    <th>Loan Type</th>
    <th>Payment Plan</th>
    <th>Amount</th>
    <th>Duration</th>
    <th>Date Borrowed</th>
    <th>Interest Rate</th>
    <!-- <th>userID</th> -->
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
      <?php 
       
        $c->thriftloantable($tloan); 
      
      ?>
</tbody>
</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->



          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Co-operative</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Created by</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Interest</th>
                    <th>Total Contributed</th>
                    <th>Status</th>
                    <th>Date</th>
              
                  </tr>
                </thead>
                <tbody>
                      <?php 
                            $c->cooperativetable($cooperative, "yes");
                      ?>
                </tbody>
                </table>

                <h4>Loan</h4>
                <table id="example1" class="table table-bordered table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Created by</th>
    <th>Amount</th>
    <th>Interest Rate</th>
    <th>Purpose</th>
    <th>Loan Type</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
      <?php 
        $c->loantable($cloan); 
      ?>
</tbody>
</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Withdraw</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>From</th>
                    <th>For</th>
                    <th>Withdraw by</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                      <?php 
                    //   $c = new content;
                        $c->withdrawtable($withdraw); 
                      ?>
                      
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Staffs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                    </tr>
                    <?php } ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
<!-- /.row -->
<!-- END ACCORDION & CAROUSEL-->
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

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="subcustommessage"></div>
              <p>
              <input type="hidden" value="" id="catid">  
              <input type="text" id="subcatname" class="form-control" id="">
              <!-- <button type="submit" >Submit</button> -->
            </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="addsubcat()">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

       
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
var doc = new jsPDF();

 function saveDiv(divId, title) {
 doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
 doc.save('div.pdf');
}

function printDiv(divId,
  title) {

  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}
</script>
