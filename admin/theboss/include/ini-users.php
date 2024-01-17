<?php 
    // echo $id;
    $users = $u->getadminusers($d->userID());
    // print_r($users);
    if(isset($_GET['id']) && !empty($_GET['id'])){
        if($d->verifyassign(htmlspecialchars($_SESSION['adminSession']), $userid = htmlspecialchars($_GET['id']))){
            $user = $d->fastgetwhere("users", "ID = ?", $userid, "details");
            $userid = $user['ID'];
            $ads = $d->fastgetwhere("products", "userID = ? order by date LIMIT 3", $userid, "moredetails");
        }
    }
?>