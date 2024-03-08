<?php 
//This is for pagination 
$start = 0;
if(isset($_GET['s'])) {
  $start = (int)htmlspecialchars($_GET['s']);
}
$ads = $d->getall("products", "date != ? order by date desc LIMIT $start, 5", [""], fetch: "moredetails");;?>

<style>
  input[type="checkbox"] {
    display: none !important;
  }
  tbody tr td {
    padding-left: 20px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $Tusers ?></h3>

              <p>All Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="?p=users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3><?= $Tproducts ?></h3>

              <p>Total ADS Posted</p>
            </div>
            <div class="icon">
              <i class="fas fa-bullhorn"></i>
            </div>
            <a href="?p=ads.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $Tsucessp; ?></h3>

              <p>Total Success Payment</p>
            </div>
            <div class="icon">
              <i class="far fa-check-circle"></i>
            </div>
            <a href="?p=payment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <h3><?= $Tadmins ?></h3>

              <p>All Admins</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-check"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <hr>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Payment
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="piechart" style="position: relative; height: 300px;">

                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->



          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                ADS
              </h3>

            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="chart_div" style="position: relative; height: 300px;">

                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- recent payment card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recent Payment <a href="payment.php?a=list">See all</a></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>Amount</th>
                      <th>User</th>
                      <th>For</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($rpayment as $row) { ?>
                      <a href="payment.php?a=invoice&id=<?= $row['ID'] ?>">
                        <tr>
                          <td><a href="#"><?= currency['symbol'] . number_format($row['price']) ?></a></td>
                          <td><?= $d->getusername($row['userID']) ?></td>
                          <td><?= $row['payfor'] ?></td>
                          <td><span class="badge badge-<?php if ($row['status'] == "success") {
                                                          echo "success";
                                                        } else {
                                                          echo "danger";
                                                        } ?>"><?= $row['status'] ?></span></td>
                          <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                        </tr>
                      </a>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->






        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- recent Users card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recent Users <a href="users.php">See all</a></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <ul class="users-list clearfix">
                <?php foreach ($rusers as $row) { ?>
                  <li>
                    <img src="../upload/profile/<?= $row['upload_image']; ?>" alt="User Image">
                    <a class="users-list-name" title="<?= $row['first_name'] . '.' . $row['last_name']; ?>" href="users.php?a=view&id=<?= $row['ID'] ?>"><?= $row['first_name'] . ' ' . $row['last_name']; ?></a>
                    <span class="users-list-date"><?php echo date("F d, Y", strtotime($row['date'])); ?></span>
                  </li>
                <?php }  ?>
              </ul>

            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="users.php">View All Users</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

          <!-- recent ADS card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">New ADS Added<a href="ads.php">See all</a></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <table class="table-responsive">
                  <tbody>

                <?php 
                if(is_array($ads) || $ads->rowCount() > 0) {
                  require_once "function/products.php";
                  $p = new products;
                  foreach ($ads as $row) {
                  // var_dump($ads->rowCount());
                  $c->adstable($row);
                    } } ?>
                  </tbody>
                </table>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="?p=ads.php">View All Users</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>


</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
  
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['success', <?= $Tsucessp; ?>],
      ['Error/Failed', <?= $Terrorp; ?>],
    ]);

    var options = {
      // is3D: true,
      pieHole: 0.4,
      // title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }




  // ads 
  google.charts.load("current", {
    packages: ['corechart']
  });
  google.charts.setOnLoadCallback(drawChartAds);

  function drawChartAds() {
    var data = google.visualization.arrayToDataTable([
      ["Element", "Density", {
        role: "style"
      }],
      ["Active", <?= $activeADS ?>, "#007bff"],
      ["Souldout", <?= $soldoutADS ?>, "#007bff"],
      ["Draft", <?= $draftADS ?>, "#007bff"],
      ["Blocked", <?= $blockedADS ?>, "color: red "]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
      {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation"
      },
      2
    ]);

    var options = {
      title: "ADS Status Chart",
      width: 500,
      height: 300,
      bar: {
        groupWidth: "80%"
      },
      legend: {
        position: "none"
      },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
    chart.draw(view, options);
  }
</script>
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