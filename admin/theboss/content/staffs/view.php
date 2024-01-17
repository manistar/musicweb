<?php require_once "include/ini-staff.php"; ?>
  <!-- ./card-header -->
  <div class="card-body">
      <!-- /.col -->
      <div class="col-md-12">

          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Overview</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Customers</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Loan</a></li>
              <li class="nav-item"><a class="nav-link" href="#withdraw" data-toggle="tab">Withdraw</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <div class="row">
                  <div class="col-md-6">
                    <h5>ID: <?= $staff['ID']; ?> </h5>
                    <h5>Name: <?= $staff['first_name']." ".$staff['last_name']; ?></h5>
                    <h5>Phone Number: <a href="tel:<?= $staff['phone_number'] ?>"><?= $staff['phone_number'] ?></a></h5>
                    <h5>Email: <a href="mailto:<?= $staff['email'] ?>"><?= $staff['email'] ?></a></h5>
                    <h5>Address: <?= $staff['address']; ?></h5>
                  </div>

                  <div class="col-md-6">
                    <h5>Amount: 80,000 </h5>
                    <h5>Total Contributed: 1,050,000</h5>
                    <h5>Total Interest: 16,000(20%)</h5>
                    <hr>
                    <!-- <h5> Balance: 1,034,000</h5> -->
                    <h5> Balance: 391900</h5>
                    <a href="withdraw.php?withform=cooperative&amp;id=60da627db631d">Withdraw</a>

                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <?php require_once "content/customers/list.php"; ?>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <h5>Co-operative Loan</h5> <hr>
                <?php require_once "content/loans/loan-list.php"; ?>

                <h5>Thrift Loan</h5> <hr>
                <?php require_once "content/loans/thriftloan.php"; ?>
              </div>

              <div class="tab-pane" id="withdraw">
              <h5>Withdraw</h5> <hr>
                <?php require_once "content/customers/withdraw.php"; ?>
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
    
        <!-- /.card -->
      </div>
      <!-- /.col -->
  </div>