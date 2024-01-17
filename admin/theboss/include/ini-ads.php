<?php
    if(isset($_GET['id']) && isset($_GET['userads'])){
        $id = htmlspecialchars($_GET['id']);
        $ads = $d->fastgetwhere("products", "userID = ?", $id, "moredetails");
        // $ads = $d->multiplegetwhere("products", "userID = ? and status = ?", [$id, 1], "moredetails");
    }else{
        // $ads = $d->fastgetwhere("products", "status = ?", , "moredetails");
        $ads = $d->fastget("products", "date", ";");
    }
?>