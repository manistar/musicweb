<?php 
$id = $_POST['id'];
$user = $d->fastgetwhere("customers", "ID = ?", $id, "details");
$name = $user['first_name'].' '.$user['last_name'];
echo "<h4>Sponsor's Information for <b class='name'> $name </b></h4> <hr>";
$data = $d->fastgetwhere("sponsors", "userID = ?", $id, "details");
$c->createform(["sponsor full name"=>"text", "sponsor address"=>"text", "sponsor place of work"=>"textarea", "sponsor phone number"=>"number"], "input", "", $data); ?>
<div id="custommessage"></div>
<input type="hidden" name="update_sponsor" value="<?= $id ?>">
<br><button type="button" onclick="submitform()" value="Submit" id="submit-button"  name="update_sponsor" class="btn btn-success">Submit</button>        
 