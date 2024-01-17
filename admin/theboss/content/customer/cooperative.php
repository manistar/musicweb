<?php
require_once "include/ini-coperate.php";
?>
<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Overview</a></li>
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Payment</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Loan</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <div class="row">
              <div class="col-md-6">
                <h5>ID: <?= $data['ID']; ?> </h5>
                <h5>Created By: <?php echo $d->getadminname($data['created_by']) ?></h5>
                <h5>Name: <a class="name" href="customer.php?a=view&id=<?= $data['userID'] ?>"><?php echo $d->getusername($data['userID']) ?></a></h5>
                <h5>Loan Eligibility: <?php if ($checkloan > 0) {
                                        echo number_format($checkloan);
                                      } else {
                                        echo "No";
                                      } ?></h5>
              </div>

              <div class="col-md-6">
                <h5>Amount: <?= number_format($data['amount']); ?> </h5>
                <h5>Total Contributed: <?php $total = $d->cooperativetotal($data['ID']);
                                        echo number_format($total); ?></h5>
                <h5>Total Interest: <?php $int = $d->moneyintrest($data['amount'], $data['interest']);
                                    echo number_format($int); ?>(<?= $data['interest'] ?>)</h5>
                <hr>
                <!-- <h5> Balance: <?php echo number_format($total - $int);  ?></h5> -->
                <h5> Balance: <?php echo $d->getbalance($data['ID'], "cooperative")  ?></h5>
                <a href="withdraw.php?withform=cooperative&id=<?= $data['ID'] ?>">Withdraw</a>

              </div>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <?php require_once 'content/customers/tasks.php'; ?>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
            <?php
            if ($checkloan == 0) {
              echo "<h5>This account is not eligible for a loan</h5>";
            } else {
              $checkloanfiles = $cu->checkloan($data['userID']);
              if ($checkloanfiles) {
                echo "<hr><h5>Please update the above information and <a href='customer.php?a=view_cooperative&id=" . $data['ID'] . "'> Reload </a> the page</h5>";
              } else {
                echo '<a data-toggle="modal" data-target="#modal-lg" onclick="updateinfo(\'apply-for-ocloan\', \'' . $data['ID'] . '\')" class=\'btn btn-success m-1\'" >Apply for a loan</a>';
                require_once "content/loans/loan-list.php";
                // echo "<a class='btn btn-success' href='customer.php?a=apply_loan&id=".$data['ID']."&type=cooperative'>  </a>";
              }
            ?>

            <?php }
            ?>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>