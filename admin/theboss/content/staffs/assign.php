<?php require_once "include/ini-staff.php"; 
if(is_array($staff)){
    echo "<h3>Staff Information</h3>";
    echo "<p> Name: ".$staff['first_name'].' '.$staff['last_name']."</p>";
    echo "<p> Email: ".$staff['email']."</p>";
    echo "<p> Phone Number: ".$staff['phone_number']."</p>";
    ?>
    <form id="foo">
        <hr>
        <h4>Assign Role to staff</h4>
        <h5>Customer</h5>
        <div style="margin-left:4%">
        <label for="addcustomer"><input type="checkbox" name="role[]" value="addcustomer" id="" <?php if($d->verifyrole($d->userID(), "addcustomer")){ echo "checked"; }?>/>Add Customer</label><br>
        <label for="editcustomer"><input type="checkbox" name="role[]"  value="editcustomer" id="" <?php if($d->verifyrole($d->userID(), "editcustomer")){ echo "checked"; }?>>Edit Customer</label><br>
        </div>
        <h5>Thrift</h5>
        <div style="margin-left:4%">
        <label for="thrift"><input type="checkbox" name="role[]" value="thrift" id="" <?php if($d->verifyrole($d->userID(), "thrift")){ echo "checked"; }?>/>Manage Thrift</label><br>
        <label for="thriftloan"><input type="checkbox" name="role[]" value="thriftloan" id="" <?php if($d->verifyrole($d->userID(), "thriftloan")){ echo "checked"; }?>/>Thrift Loan</label><br>
        </div>
        <h5>Co-operative</h5>
        <div style="margin-left:4%">
        <label for="co-operative"><input type="checkbox" name="role[]" value="co-operative" id="" <?php if($d->verifyrole($d->userID(), "co-operative")){ echo "checked"; }?>/>Manage Co-operative</label><br>
        <label for="co-operativeloan"><input type="checkbox" name="role[]" value="co-operativeloan" id="" <?php if($d->verifyrole($d->userID(), "co-operativeloan")){ echo "checked"; }?>/>Co-operative Loan</label><br>
        </div>
        <h5>Staffs</h5>
        <div style="margin-left:4%">
        <label for="createstaff"><input type="checkbox" name="role[]" value="createstaff" id="" <?php if($d->verifyrole($d->userID(), "createstaff")){ echo "checked"; }?>/>Create Staff</label><br>
        <label for="assigncustomer"><input type="checkbox" name="role[]" value="assigncustomer" id="" <?php if($d->verifyrole($d->userID(), "assigncustomer")){ echo "checked"; }?>/>Assign Customer</label><br>
        <label for="assignrole"><input type="checkbox" name="role[]" value="assignrole" id="" <?php if($d->verifyrole($d->userID(), "assignrole")){ echo "checked"; }?>/>Assign role</label><br>
        <label for="thriftrole"><input type="checkbox" name="role[]" value="thriftrole" id="" <?php if($d->verifyrole($d->userID(), "thriftrole")){ echo "checked"; }?>/>thriftrole</label><br>
        <label for="co-operativerole"><input type="checkbox" name="role[]" value="co-operativerole" id="" <?php if($d->verifyrole($d->userID(), "co-operativerole")){ echo "checked"; }?>/>co-operativerole</label><br>
        <div id="custommessage"></div>
        </div>
        <input type="hidden" name="saverole" value="<?= $id; ?>">
        <button class="btn btn-primary">Save Changes</button>
    </form>
    <?php
}else{
    echo "No user selected or user not found";
}
?>