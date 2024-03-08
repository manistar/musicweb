<?php
    if(isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id']); 
        $data = $d->fastgetwhere("products", "ID = ?", $id, "details");
        if(!is_array($data)){
            return $d->message("Ads not found", "error");
        }
        $id = $data['ID'];
        ?>
            <h5>Current Status: <?= $a->adsstatus("$id"); ?></h5>
            <label for="status">Select Status</label>
            <select name="status" class="form-control" id="status">
                <option value="1">Active</option>
                <option value="2">Soldout</option>
                <option value="3">Set to Draft</option>
                <option value="0" style="color: red;">Block</option>
            </select>
            <input type="hidden" name="userID" value="<?= $data['userID']; ?>">
            <input type="hidden" name="adsID" value="<?= $data['ID']; ?>">
            <input type="hidden" name="updateadsstatus" value="true"> 
            <div id="custommessage"></div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        <?php
    }else{
        echo "<h4>No Ads Selected</h4>";
    }
?>