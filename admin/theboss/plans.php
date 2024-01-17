<?php 
include 'header.php';
?>
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
           <!-- START ACCORDION & CAROUSEL-->
           <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
                 <!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Plans </h3> <button id="addplan" data-url="plans/add" data-id="addplan" data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Create new plan</button>
              </div>
              <!-- ./card-header -->
              <div class="card-body" id="plantable">
                <?php
                  if(isset($_GET['a'])){
                    $page = htmlspecialchars($_GET['a']);
                  }else{
                    $page = "";
                  }
                  switch ($page) {
                    case 'add':
                      # code...
                      require_once 'content/plans/add.php';
                      break;
    
                        case 'view':
                          #code...
                          require_once 'content/plans/view.php';
                          break;

                          case 'edit':
                            #code...
                            require_once 'content/plans/edit.php';
                            break;

                    default:
                      require_once 'content/plans/list.php';
                      break;
                  }
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
</section>

<?php require_once "footer.php"; ?>