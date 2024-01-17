<form id="foo">
    <?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if (isset($_POST['id']) && $_POST['id'] != "") {
        $id = htmlspecialchars($_POST['id']);
        $data = $d->fastgetwhere("plans", "ID = ?", $id, "details");
        if (is_array($data)) {
            $status = "";
            if($data['status'] == 1){
                $status = "checked";
            }
            $c->createform(["ID" => "hidden", "name" => "text", "price" => "number", "plan type" => ["monthly" => "monthly", "annual" => "annual"], "free trial" => ["yes" => "yes", "no" => "no"], "duration" => "number"], "input", "", $data);
    ?>

            <hr>
            <small>Enter number of ads and images that can be posted by users subscribed to this plan. <b style="color:red"> leave it empty if unlimited</b></small>
            <?php $c->createform(["no of ads" => "number"], "input", "", $data); ?>
            <?php $c->createform(["no of image per ads" => "number"], "input", "", $data); ?>
            <div class="custom-control custom-switch">
                <input type="checkbox" value="1" name="status" class="custom-control-input"  id="customSwitch1" <?= $status ?>/>
                <label class="custom-control-label" for="customSwitch1">Plan Status</label>
            </div>
            <hr>
            <div id="custommessage"></div>
            <input type="hidden" name="edit_plan">
            <input type="submit" value="Update <?php echo $data['name'] ?> plan" class="btn btn-success">
</form>
<?php
        } else {
            echo "<h2>Err: No plan found with the ID passed</h2>";
        }
    } else {
        echo "<h2>IntErr: No ID passed reload page and try again</h2>";
    }
?>