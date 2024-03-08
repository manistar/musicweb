<?php 
require_once "function/users.php";

 $u = new users;
 // echo $id;
 $users = $u->getadminusers($d->userID());
//  print_r($users);
 if(isset($_GET['id']) && !empty($_GET['id'])){
     if($d->verifyassign(htmlspecialchars($_SESSION['adminSession']), $userid = htmlspecialchars($_GET['id']))){
         $user = $d->getall("users", "ID = ?", [$userid], fetch: "moredetails");
        //    var_dump($users);
         $userid = 'ID';
        $ads = $d->getall("products", "date != ? order by date desc", [""], fetch: "moredetails");
     }
 } 

?>