<?php
session_start();
    define("Regex", []);
    require_once "include/session.php";
    require_once "include/database.php";
    $d = new database; 
    require_once "content/content.php";
    $c = new content;
    require_once "function/autorize.php";
    $v = new validate;  

    $data = "";
    $script = [];
    $meta_tag = 'Music Platform';

    $page = "dashboard";
        if(isset($_GET['p'])) {
            $page = htmlspecialchars($_GET['p']);
        }

    // $d->create_table("users", $users_form);

    if(isset($_SESSION['userSession'])){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $data = $d->getall("users", "ID = ?", [$userID], fetch:"details");
    }

    $single_release = $d->getall("playlist", "userID = ?", [$userID], fetch: "moredetails");//To fecth each uploaded data      
    $recent_play = $d->getall("playlist", "label = ?", ['recent'], fetch: "moredetails");
    $latest_play = $d->getall("playlist", "label = ?", ['latest'], fetch: "moredetails");
    $artist = $d->getall("playlist", "status = ?", ['1'], fetch: "moredetails");
    $live_stream = $d->getall("streaming", fetch: "moredetails");
    $blog = $d->getall("news", fetch: "moredetails");
    $products_data = $d->getall("products", fetch: "moredetails");
   
    if(isset($_GET['ID'])){
        $product_id = $_GET['ID'];
        $single_data = $d->getall("playlist", "ID = ?", [$product_id], fetch: "details");
    }    
?>