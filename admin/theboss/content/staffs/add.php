<form id="foo">
<?php  $c->createform(["first name"=>"text", "last name"=>"text", "phone number"=>"text", "email"=>"email", "address"=>"address"], "input"); ?>
<input type="hidden" name="add_staff">    
<div id="custommessage"></div>
<button class="btn btn-success">Add Admin</button>
</form>
