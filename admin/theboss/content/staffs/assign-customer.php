<?php require_once "include/ini-staff.php";  
if(is_array($staff)){
?>
<form id="foo">
<select class="select2" multiple="multiple" data-placeholder="Select a customer" style="width: 100%;" data-dropdown-css-class="select2-purple" name="customer[]">
                        <?php $cu->loadallcustomers(htmlspecialchars($_GET['id'])); ?>
                  </select>
                  <input type="hidden" name="assigncustomer" value="<?= $id; ?>">
                  <div id="custommessage"></div>
<button class="btn btn-primary">Assign Customer</button>
</form>

<?php }else{
    echo "No user selected or user not found";
} ?>