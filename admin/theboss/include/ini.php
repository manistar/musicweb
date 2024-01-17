<?php
    require 'include/session.php';
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require "include/phpmailer/PHPMailerAutoload.php";
    require 'include/database.php';
    $d = new database;
    if(!$d->verifytoken("$userID","admins")){
    echo "Error Please try and login again <a href='?logout'>Login again</a>";
    exit;
    }
    require 'content/content.php';
    $c = new content;
    require_once 'functions/staffs.php';
    $staff = new staffs;
    require 'functions/users.php'; 
    require '../functions/payment.php';
    require '../functions/users.php';
    require '../functions/products.php';
    require 'functions/ads.php';
    $a = new ads; 
    $u = new users;
    $p = new products;
    $fu = new fontusers;
    require 'functions/plans.php';
    $plan = new plans;
    $pay = new payment;
    require 'functions/content.php';
    $content = new web_content;
    require 'include/getall.php';
    //default values
    define("currency", $d->getcurrency($d->getsettings("default_currency")['meta_value']));
    define("content", $d->fastgetwhere("content", "ID = ?", "1", "details"));
    define("website_name", content['website_name']);
    define("free_for_all", $d->fastgetwhere("settings", "meta_name = ?", "free_for_all", "details")['meta_value']);
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