<?php
// require 'include/session.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// define("Regex", []);
require_once "include/session.php";
require "include/phpmailer/PHPMailerAutoload.php";
require_once "include/database.php";
require_once "content/content.php";
require_once 'consts/shop.php';
require_once 'consts/checkout.php';
require_once "function/shop.php";
require_once "function/autorize.php";
require_once 'function/staffs.php';
// require 'function/ads.php';
require 'function/content.php';
require 'function/plans.php';
// $a = new ads; 
$s = new shop;
$c = new content;
$d = new database; 
$v = new validate;
$staff = new staffs;
$plan = new plans;
$content = new web_content;
// $userID = "";
$date = date('Y-m-d');


// if(!$d->verifytoken("$userID","admins")){
// echo "Error Please try and login again <a href='?logout'>Login again</a>";
// exit;
// }


// require 'function/users.php'; 
// require 'function/payment.php';
// require 'function/users.php';
// require 'function/products.php';

// $u = new users;
// $p = new products;
// $fu = new fontusers;
// require 'function/plans.php';
// $plan = new plans;
// $pay = new payment;

// require 'include/getall.php';

if(isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])){
    $datefrom =  date("Y-m-d", strtotime($_POST['datefrom']))." 12:00:00"; 
    $dateto = date("Y-m-d", strtotime($_POST['dateto']))." 12:00:00"; 
}else{
    $datefrom = "";
    $dateto = $dateto = date("Y-m-d h:i:s");
}


// Get admin Info
$user = $d->getall("admins", "ID = ?", [$userID], fetch: "details"); 

// Total values
$totals = ["users", "products", "admins"];
foreach ($totals as $key => $value) {
    // ${"T".$value} = $d->getall("$value", "date >= ? and date <= ?", [$datefrom, $dateto], "", fetch: "moredetails");
    ${"T".$value} = $d->getall("$value", "date >= ? and date <= ?", [$datefrom, $dateto], fetch: "moredetails");
}

// charts info 
// $Tsucessp =  $d->getall("payment", "date >= ? and date <= ? and status = ?", [$datefrom, $dateto, "success"], "");
// $Terrorp =  $d->getall("payment", "date >= ? and date <= ? and status != ?", [$datefrom, $dateto, "success"], "");
// $activeADS = $d->getall("products", "status = ?", ["1"], "");
// $soldoutADS = $d->getall("products", "status = ?", ["2"], "");
// $draftADS = $d->getall("products", "status = ?", ["3"], "");
// $blockedADS = $d->getall("products", "status = ?", ["0"], "");


// recent tabs
$rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["",""], fetch: "moredetails");
// $rads = $d->getall("products", "date DESC", ["LIMIT 8"]);
// $rusers = $d->getall("users", "date DESC", ["LIMIT 8"]);



//default values
// define("currency", $d->getcurrency($d->getsettings("default_currency")['meta_value']));
define("content", $d->getall("content", "ID = ?", ["1"], fetch: "details"));
define("website_name", content['website_name']);
// define("free_for_all", $d->getall("settings", "meta_name = ?", ["free_for_all"], fetch: "details")['meta_value']);
// $settings = $d->fastget("settings", "ID", ";");
// if($settings != ""){
//     foreach ($settings as $row) {
//         if(!define($row['meta_name'])){
//             define($row['meta_name'], $row);
//         }
//     }
// }
// define("website_settings", $d->fastget("settings", "meta_name", ";"));
// print_r(getWeekDays('2021-06-01','2021-06-30', 6)); 
?>