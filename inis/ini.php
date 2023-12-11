<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
define("Regex", []);
require_once "include/session.php";
require_once "include/database.php";
require_once "content/content.php";
require_once 'consts/shop.php';
require_once "function/shop.php";
require_once "function/autorize.php";
$s = new shop;
$c = new content;
$d = new database; 
$v = new validate;
$userID = "";


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

    if(isset($_GET['ID'])){
        $product_id = $_GET['ID'];
        $artist_single = $d->getall("playlist", "userID = ? and status = ?", [$product_id, 'video'], fetch: "moredetails");
    } 
     
    if(isset($_GET['ID'])){
        $product_id = $_GET['ID'];
        $single_release = $d->getall("playlist", "userID = ?", [$product_id], fetch: "moredetails");
    }  
    $d = new database; 
    $trending_music = $d->getTrendingMusic();
    $trending_music = $d->getall("playlist", "play_count > ? order by play_count DESC Limit 20", [1], fetch: "moredetails");

    // $recent_play = [
    //     ["title" => "Song 1", "label" => "recent", "timestamp" => strtotime("2023-03-12 3:02:00")],
    //     "input_data"=>$recent_play,
    // ];

    // usort($recent_play, function ($a, $b) {
    //     return $b['timestamp'] - $a['timestamp'];
    // });

    // Delete Function
    if(isset($_GET['pID'])){
        $product_id = $_GET['pID'];
        $delete_products = $d->delete("cart", "productID = ?", [$product_id]);
    }
// Echo
    $user_ID = $userID;
    $product_cart = $d->getall("cart", "userID = ?", [$user_ID], fetch: "moredetails");
    if(isset($_GET['pID'])){
        $product_id = $_GET['pID'];
        $delete_products = $d->delete("cart", "productID = ?", [$product_id]);
    }

    $artist_rows = $d->getall("users", "status = ?", ['artist'], fetch: "moredetails");
    $recent_play = $d->getall("playlist", "label = ?", ['recent'], fetch: "moredetails");
    $latest_play = $d->getall("playlist", "label = ?", ['latest'], fetch: "moredetails");
    $artist = $d->getall("playlist", "status = ?", ['1'], fetch: "moredetails");
    $live_stream = $d->getall("streaming", fetch: "moredetails");
    $blog = $d->getall("news", fetch: "moredetails");
    $products_data = $d->getall("products", fetch: "moredetails");
    
    if(isset($_GET['ID'])){
        $product_id = $_GET['ID'];
        $single_data = $d->getall("playlist", "userID = ?", [$product_id], fetch: "details");
    }    
    $single_data_array = $d->getall("playlist", "userID = ?", [$userID], fetch: "details");//To fecth each uploaded data for login users only    
?>