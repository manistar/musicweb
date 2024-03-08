<?php
    if (isset($_GET['id']) && isset($_GET['userads'])) {
        $id = htmlspecialchars($_GET['id']);
        $ads = $d->getall("products", "userID = ?", [$id], fetch: "moredetails");
    } else {
        $ads = $d->getall("products", "date != ? order by date desc", [""], fetch: "moredetails");
    }
    // var_dump($ads->rowCount());
?>
