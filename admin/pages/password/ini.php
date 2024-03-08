<?php
session_start();
// require_once 'include/session.php';
// $data = "";
require_once 'consts/Regex.php';
require_once 'include/database.php';
$d = new database;
require_once 'content/content.php';
$c = new content;
require_once 'consts/user.php';
require_once 'function/autorize.php';
$v = new validate;
require_once 'function/profile.php';
$s = new settings;


// if(!isset($data)) {
//     $data = [];
// }
    // session_start();

   
    // if(isset($_SESSION['adminSession'])){
    $aID = htmlspecialchars($_SESSION['adminSession']);
    $data = $d->getall("admins", "ID = ?", [$aID], fetch:"details");
    // }

    $change_password = [
        "ID" => ["input_type"=>"hidden", "is_required"=>false],
        "password" => [
            "title" => "New Password",
            "global_class" => "col-md-12",
            "name"=> "password",
            "placeholder" => "Enter Password",
            "is_required" => true,
            "input_type" => "password",
            "type" => "input"
        ],
        "confirm_password" => [
            "title" => "Confirm Password",
            "global_class" => "col-md-12",
            "name"=> "confirm_password",
            "placeholder" => "Confirm your Password",
            "is_required" => true,
            "input_type" => "password",
            "type" => "input"
        ],
        "input_data"=>$data,
    ];
?>