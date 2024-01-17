<?php 
//header("Location:customers.php");
include 'header.php';
?>
<style>
  input[type="checkbox"]{
    display:none!important;
  }
</style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <br>
           <!-- START ACCORDION & CAROUSEL-->
           <div class="card">
          <div class="col-md-12">
          <div class="tab-pane" id="timeline">
                    <!-- password here  -->
                    <h4>Change Password</h4>
                    <form action="password.php" method="post">
                        <?php 
                        if(isset($_POST['update_password'])){
                            $staff->changepassword();
                        }
                        $c->createform(["current password"=>"password", "password"=>"password", "confirm password"=>"password"], "input"); ?>
                        <input name="update_password" type="submit" class="btn btn-primary" value="Change Password">
                    </form>
                  </div>
        </div>
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