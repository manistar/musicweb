<?php 
$id = $_POST['id'];
$user = $d->fastgetwhere("customers", "ID = ?", $id, "details");
$name = $user['first_name'].' '.$user['last_name'];
echo "<h4>Sponsor's Information for <b class='name'> $name </b></h4> <hr>";
$data = $d->fastgetwhere("next_of_kin", "userID = ?", $id, "details");
$c->createform(["kin full name"=>"text","kin phone number"=>"number", "kin relationship"=>"text", "kin contact address"=>"text", ], "input", "", $data); ?>
<div id="custommessage"></div>
<input type="hidden" name="update_next_of_kin" value="<?= $id ?>">
<br><button type="button" onclick="submitform()" value="Submit" id="submit-button"  name="update_next_of_kin" class="btn btn-success">Submit</button>        