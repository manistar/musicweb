<form id="foo" method="POST">
<?php $c->createform(["group name"=>"text"], "input"); ?>
<div class="form-group">
                  <label>Select Customers</label>
                  <br><a href="#" onclick='updateinfo("customer-instructions", "0")' data-toggle="modal" data-target="#modal-lg">Can't find all customers?</a>
                  <select class="select2" multiple="multiple" data-placeholder="Select a customer" style="width: 100%;" data-dropdown-css-class="select2-purple" name="customer[]">
                        <?php $cu->customerloanoptions(); ?>
                  </select>
                </div>
                <input type="hidden" name="create_group">
                <div id="custommessage"></div>
<button class="btn btn-success" type="submit">Create Group</button>
</form>