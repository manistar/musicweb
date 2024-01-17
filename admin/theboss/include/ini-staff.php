<?php
if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $staff = $d->fastgetwhere("admins", "ID = ?", $id, "details");
}
$staffs = staffs::getadminstaffs($d->userID());
?>