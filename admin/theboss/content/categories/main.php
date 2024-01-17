<?php
$maincat = $d->fastget("categories", "date DESC", ";");
if ($maincat != "") { ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lists</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                    <div id="accordion">
                        <?php foreach ($maincat as $row) { ?>
                            <div class="card card-defailt">
                                <div class="card-header" style="display:flex">
                                    <h4 class="card-title w-100">
                                        <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" value="1" name="status" class="custom-control-input" id="free_for_all" onclick="updatestaus(this.id, 'settings')" <?php if (free_for_all == 1) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?> />
                                    <label class="custom-control-label" for="free_for_all"></label> 
                                </div> -->

                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse<?= $row['ID'] ?>" aria-expanded="false">
                                            <input class="form-control p-0 m-0" style="background-color: transparent; border:none; padding:none!important" type="text" name="<?= $row['ID'] ?>" id="<?= $row['ID'] ?>" value="<?= $row['name']; ?>">
                                        </a>
                                    </h4>
                                    <button class="btn btn-primary" onclick="updatestaus('<?= $row['ID'] ?>', 'categories')"><i class="fas fa-check"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                    <!-- <div class="member-plan position-absolute"><a class="badge badge-danger" style="background-color:red; color:white;" onclick="removecat('<?= $img['ID'] ?>')"><b class="fa fa-times"></b></a></div> -->
                                    
                                </div>
                                <div id="collapse<?= $row['ID'] ?>" class="collapse" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <!-- sub cat here    -->
                                        <?php $sub = $d->fastgetwhere("sub_categories", "catID = ?", $row['ID'], "moredetails");
                                        if ($sub != "") {
                                            foreach ($sub as $row) {
                                        ?>
                                                <div class="" style="display:flex">
                                                    <h4 class="card-title w-100">
                                                        <a class="d-block w-100 ">
                                                            <input class="form-control p-0 m-0" style="background-color: transparent; border:none; padding:none!important" type="text" name="<?= $row['ID'] ?>" id="<?= $row['ID'] ?>" value="<?= $row['name']; ?>">
                                                        </a>
                                                    </h4>
                                                    <button class="btn btn-primary" onclick="updatestaus('<?= $row['ID'] ?>', 'sub_categories')"><i class="fas fa-check"></i></button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <hr>
                                        <?php }
                                        } else {
                                            echo "<p>No sub Category </p>";
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <?php require_once "content/categories/add.php"; ?>
    </div>
<?php  }else{
    require_once "content/categories/add.php";
}
?>