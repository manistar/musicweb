<?php
 $cat =   $d->fastget("categories", "name DESC", ";")
?>
<form id="foo">
    <input type="text" name="name" class="form-control" id="catname" placeholder="Enter Name"> <br>
    <select name="catID" id="" class="form-control">
        <option value="">Select Category</option>
        <?php foreach($cat as $row){ ?>
            <option value="<?= $row['ID'] ?>"><?= $row['name'] ?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="new_sub_cat" id="new_cat"> <hr>
    <div id="custommessage"></div>
    <button class="btn btn-primary">Add Category</button>
</form>  