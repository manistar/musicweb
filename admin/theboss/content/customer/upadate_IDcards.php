<?php 
$id = htmlspecialchars($_POST['id']);
$card = $d->fastgetwhere("idcards", "userID = ?", $id, "details");
$c->createform([$card['IDtype']=>$card['IDtype'], "National ID card"=>"National ID card", "Voters Card"=>"Voters Card", "Drivers License"=>"Drivers License", "International Passport"], "select", "IDtype"); ?>
<h6>Change image</h6>
<input type="file" name="uploaded_file" id="">
<h6>Current Image</h6>
<img src="upload/IDcards/<?= $card['image'] ?>" alt="" style="width:200px">
<input type="hidden" name="update_IDcard" value="<?= $card['userID']; ?>">
<div id="custommessage"> </div>
<br><button type="button" onclick="submitform()" value="Submit" id="submit-button"  name="upadate_IDcards" class="btn btn-success">Submit</button>        
