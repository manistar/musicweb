<?php
if (isset($_POST['id'])) {
  $id = htmlspecialchars($_POST['id']);
  $data = $d->fastgetwhere("products", "ID = ?", $id, "details");
  if (!is_array($data)) {
    echo "<h3>No Ads Found</h3>";
    exit();
  }
} else {
  echo "<h3>No Ads selected</h3>";
  exit();
}
?>
<div class="tab-content">
  <div class="" id="edit">
    <div class="d-flex align-items-center mb-2">
      <h5 class="m-0">Edit Ads</h5>
      <!-- <button class="dropdown-item" id="e<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="Edit Ads" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads Image</button> -->
      <a href="users.php?a=post&upload=<?= $data['ID'] ?>&id=<?= $data['userID'] ?>" class="ml-auto text-success btn btn-success" style="color:white!important">Manage Ads Images</a>
    </div>
    <?php
    $c->createform([
      "product name" => "text",
    ], "input", "", $data);

    ?>

    <div class="form-group">
      <label for="">Category</label>
      <select class="js-example-basic-multiple form-control" id="category" name="category">
        <?php
        $cat = $p->getcategory($data['category'], "categories");
        echo "<option value ='" . $cat['ID'] . "'>" . $cat['name'] . " </option>";
        foreach ($productcategories as $cat) {
          echo "<option value ='" . $cat['ID'] . "'>" . $cat['name'] . " </option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Sub category</label>
      <select class="js-example-basic-multiple form-control" id="sub_category" name="sub_category">
        <?php
        $cat = $p->getcategory($data['sub_category'], "sub_categories");
        echo "<option value ='" . $cat['ID'] . "'>" . $cat['name'] . " </option>";
        foreach ($subcategories as $cat) {
          echo "<option value ='" . $cat['ID'] . "'>" . $cat['name'] . " </option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Product Tags</label>
      <small>Seprate each tag with (,).</small>
      <input type="text" name="tags" id="tags" value="<?php echo $data['tags']; ?>" class="form-control" placeholder="tag1, tag2, tag3">
    </div>

    <div class="form-group">
      <label for="">Product Condition</label>
      <input type="text" name="product_condition" value="<?php echo $data['product_condition']; ?>" id="product_condition" class="form-control" placeholder="E.g: Good, bad, used, new">
    </div>

    <label for="">Price</label>
    <div class="input-group form-inline">
      <!-- <small>Seprate each tag with (,).</small> -->
      <input type="number" name="price" id="price" value="<?php echo $data['price']; ?>" class="form-control" placeholder="Product price">
      <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-dollar"></i></button></div>
    </div>
    <label for="">Last price</label>
    <small>leave last price to (0) if not negotiable.</small>
    <div class="input-group form-inline">

      <input type="number" name="last_price" id="last_price" value="<?php echo $data['last_price']; ?>" class="form-control" value="0" placeholder="leave last price to (0) if not negotiable.">
      <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-dollar"></i></button></div>

    </div>

    <label for="">Product Description</label>
    <div class="form-group">
      <textarea name="description" id="description" cols="20" class="form-control" placeholder="Enter product description" rows="4"><?= $data['description'] ?></textarea>
    </div>
    <!-- <input type="hidden" name="postads" id="postads"> -->
    <input type="hidden" name="ID" value="<?= $data['ID']; ?>">
    <input type="hidden" name="editads">
    <div id="custommessage"></div>
    <input type="submit" class="btn btn-success" value="Update">
    <hr>
  </div>
</div>


<!-- <div style="display:none;" id="upload">
  <?php // require_once "content/ads/upload.php"; ?>
</div> -->