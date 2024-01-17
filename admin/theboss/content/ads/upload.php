<?php if (isset($_GET['upload'])) {
    $id = htmlspecialchars($_GET['upload']);
    $ads = $d->fastgetwhere("products", "ID = ?", $id, "details");
    if (is_array($ads)) {
        $images = $d->fastgetwhere("image_upload", "forID = ?", $ads['ID'], "moredetails");
?>
        <link rel="stylesheet" type="text/css" href="../css2/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="../css2/style.css" />
        <script type="text/javascript" src="../upload/files/js/dropzone.js"></script>
        <div class="container">
            <h5>Upload image for <?= $ads['product_name'] ?></h5>
            <hr>
                 <!-- image slider end  -->
                 <div class="file_upload">
                    <form action="file_upload.php?transid=<?= $id ?>&userID=<?= htmlspecialchars($_GET['id']); ?>" method="get" class="dropzone" style="background-color:transparent!important; border: 1px soild white">
                        <div class="dz-message needsclick">
                            <strong>Drop files here or click to upload.</strong><br />
                            <span class="note needsclick">Can drop folder also</span> <br>
                        </div>
                    </form>
                    <br>
                    <a href="<?= $d->geturl(); ?>" class="btn btn-primary">Refresh</a>
                </div>
            <!-- image slider start  -->
            <?php if ($images != "") { ?>
                <div class="fresh-vegan pb-2">
                    <!-- <div class="d-flex align-items-center mb-2">
                        <h5 class="m-0">Product Image</h5>
                        <a onclick="switchtab('edit', 'upload')" class="ml-auto text-success btn btn-success" style="color:white!important">Edit Ads</a>
                    </div> -->
                    <div class="trending-slider row" id="imageslider">
                        <?php foreach ($images as $img) { ?>
                            <div class="osahan-slider-item m-2 col-4" id="image<?= $img['ID']; ?>">
                                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-osahan-2 p-3 w-30">
                                        <div class="member-plan position-absolute"><a class="badge badge-danger" style="background-color:red; color:white;" onclick="removeimage('<?= $img['ID'] ?>')"><b class="fa fa-times"></b></a></div>
                                        <span href="#" class="text-decoration-none text-dark">
                                            <img src="../upload/products/<?= $img['name'] ?>" class="img" style="width:200px">
                                        </span>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                <?php  } ?>

           
                </div>
                <div class="insert-post-ads1" style="margin-top:20px;">
                </div>
        <?php
    } else {
        echo "Product not found";
    }
} else {
    echo "No product or ads selected";
} ?>