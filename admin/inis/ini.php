<?php
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
require "include/ini-users.php";
// $a = new ads; 
$d = new database; 
$v = new validate;
$s = new shop;
$c = new content;
$staff = new staffs;
$plan = new plans;
$content = new web_content;

// $userID = "";
$date = date('Y-m-d');

$page = "dashboard";
        if(isset($_GET['p'])) {
            $page = htmlspecialchars($_GET['p']);
        }

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


// if(isset($_SESSION['userSession'])){
//     $userID = htmlspecialchars($_SESSION['userSession'] ?? "");
//     $user = $d->getall("admins", "ID = ?", [$userID], fetch:"details");
// }else{
//     $userID = "";
// }

// Get admin Info
$userID = htmlspecialchars($_SESSION['adminSession']);
$adminID = $userID; 
$data = $d->getall("admins", "ID = ?", [$adminID], fetch: "details");
//var_dump($data); // Check the type and content of $user


// This pages trows an error of :  Trying to access array offset on value of type bool in , use the one above
// $data = $d->getall("admins", "ID = ?", [$email], fetch: "details");
// var_dump($data); // Check the type and content of $data

// Total values
// $totals = ["users", "products", "admins"];
// foreach ($totals as $key => $value) {
//     // ${"T".$value} = $d->getall("$value", "date >= ? and date <= ?", [$datefrom, $dateto], "", fetch: "moredetails");
//     ${"T".$value} = $d->getall("$value", "date >= ? and date <= ?", [$datefrom, $dateto], fetch: "moredetails");
// }

// charts info 
$Tsucessp = $d->getall("payment", "date >= ? AND date <= ? AND status = ?", [$datefrom, $dateto, "success"], fetch: "");
$Terrorp =  $d->getall("payment", "date >= ? and date <= ? and status != ?", [$datefrom, $dateto, "success"], fetch: "");
$activeADS = $d->getall("products", "status = ?", ["1"], fetch: "");
$soldoutADS = $d->getall("products", "status = ?", ["2"], fetch: "");
$draftADS = $d->getall("products", "status = ?", ["3"], fetch: "");
$blockedADS = $d->getall("products", "status = ?", ["0"], fetch: "");

// $payments = $d->getall("payment", "date DESC", fetch: "");
// recent tabs 
$rpayment = $d->getall("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["",""], fetch: "moredetails");
// $rads = $d->getall("products", "date DESC LIMIT 8");
$rads = $d->getall("products", "userID = ? order by date DESC LIMIT 8", [$userID], fetch: "moredetails");
$rusers = $d->getall("users", "", [], fetch: "moredetails");


// To get total registered users
$Tusers = $d->getall("users", fetch: "");
$Tadmins = $d->getall("admins", fetch: "");
$Tproducts = $d->getall("products", fetch: "");


//default values
define("currency", $d->getcurrency($d->getsettings("default_currency")['meta_value']));
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

