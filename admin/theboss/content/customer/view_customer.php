        <?php
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = htmlspecialchars($_GET['id']);
                $user = $d->fastgetwhere("customers", "ID = ?", $id, "details");
                if(is_array($user)){
                    require_once 'include/ini-customers.php';
                    ?>
                <h5 class="mt-4 mb-2"> <?= $name = $user['first_name'].' '.$user['last_name']; ?></h5>
                <?php  $checkloanfiles = $cu->checkloan($user['ID']); ?>
                <div class="row">
                        
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-primary">
                                <span class="info-box-icon"><i class="fa fa-user"></i></span>

                                <div class="info-box-content">
                                <span class="info-box-text"><?= $user['email'] ?></span>
                                <span class="info-box-text"><?= $user['phone_number'] ?></span>
                                <a href="customer.php?a=edit&id=<?php echo $user['ID']; ?>" class="btn btn-default">Edit</a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fa fa-wallet"></i></span>

                                <div class="info-box-content">
                                <span class="info-box-text">Contribution</span>
                                <span class="info-box-number">N <?= number_format($tcontributed); ?></span>

                                <!-- <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div> -->
                                <span class="progress-description">
                                  Total amount Contributed</b> 
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fa fa-envelope"></i></span>

                                <div class="info-box-content">
                                <span class="info-box-text">Loan</span>
                                <span class="info-box-number"><?= $tloans ?></span>

                                <!-- <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div> -->
                                <span class="progress-description">
                                    Total loan taken <?= $tloans ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                                <div class="info-box-content">
                                <span class="info-box-text">Tasks</span>
                                <span class="info-box-number"><?= $totalpending ?></span>

                                <!-- <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div> -->
                                <span class="progress-description">
                                    Pending task  <?= $totalpending ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            
                        </div>


                          <!-- SELECT2 EXAMPLE -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Pending task(s)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php if(!empty($pendingtask)){ 
                require_once "content/customers/tasks-list.php";
                ?>

                <?php }else{ echo "No pending task(s)."; } ?>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           The task(s) here are pending task for <?= $name ?>, <a href="customers.php?a=tasks">Click here</a> to see all your pending task(s)
          </div>
        </div>
        <!-- /.card -->


        
                          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Thrift</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php if($nothrift > 0){ ?>
          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <!-- <th><input type="checkbox" onClick="checkall('foos')" /><br/></th> -->
                      <th>ID</th>
                      <th>Created By</th>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Duration From</th>
                      <th>Duration To</th>
                      <th>Payment Plan</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php $c->thrifttable($thrift); ?>
                  </tbody>

                  <tfoot>
                  <tr>
                  <!-- <th><input type="checkbox" onClick="checkall('foos')" /><br/></th> -->
                      <th>ID</th>
                      <th>Created By</th>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Duration From</th>
                      <th>Duration To</th>
                      <th>Payment Plan</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                <?php }else{ echo "No thrift."; } ?>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <!-- <div class="card-footer">
           The task(s) here are pending task for <?= $name ?> <a href="task.php">Click here</a> to see all your pending task(s)
          </div> -->
        </div>
        <!-- /.card -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Co-operatives Account(s)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?php require_once "content/customers/cooperatives.php"; ?>
          <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <!-- <div class="card-footer">
           The task(s) here are pending task for <?= $name ?> <a href="task.php">Click here</a> to see all your pending task(s)
          </div> -->
        </div>
                <?php    
                }else{
                    echo "Customer Not found";
                }
            }else{
                echo "No Customer Selected";
            }
        ?>
        
      