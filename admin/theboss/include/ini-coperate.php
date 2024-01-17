<?php
$id = htmlspecialchars($_GET['id']);
$data = $d->fastgetwhere("cooperative", "ID = ?", $id, "details");
$cid = $data['userID'];
$verify = $d->verifyassign(htmlspecialchars($_SESSION['adminSession']), "$cid");
if($verify){
    // check if loan
   $checkloan = $cu->checkcooperateloan($id);
}else{
    echo "This Customer is not assign to you";
    exit();
}
?>