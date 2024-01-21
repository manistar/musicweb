<?php 

$v = new validate;
    // echo $id;
    $users = $v->signin($d->userID());
    // print_r($users);
    if(isset($_GET['id']) && !empty($_GET['id'])){
        if($d->verifyassign(htmlspecialchars($_SESSION['adminSession']), $userid = htmlspecialchars($_GET['id']))){
            $user = $d->getall("users", "ID = ?", [$userid], fetch: "details");
            $userid = $user['ID'];
            $ads = $d->getall("products", "userID = ? order by date LIMIT 3", $userid, fetch: "moredetails");
        }
    }
?>