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


    $userID = htmlspecialchars($_SESSION['userSession']);
    $data = $d->getall("users", "ID = ?", [$userID], fetch:"details");


$profile_settings = [
 "ID" => ["input_type"=>"hidden", "is_required"=>false],
//  "userID" => ["input_type"=>"hidden", "is_required"=>false],
 "first_name" => [
     "title" => "First Name",
     "global_class" => "col-md-12",
     "name"=> "first_name",
     "placeholder" => "",
     "is_required" => true,
     "input_type" => "text",
     "type" => "input"
 ],
 "last_name" => [
    "title" => "Last Name",
    "global_class" => "col-md-12",
    "name"=> "last_name",
    "placeholder" => "Enter your Last Name",
    "is_required" => true,
    "input_type" => "text",
    "type" => "input"
],
"email" => [
    "title" => "Email",
    "global_class" => "col-lg-12", 
    "name" => "email",
    "placeholder" => "Enter Email",
    "is_required" => true,
    "input_type" => "email",
    "type" => "input",
    "input_class" => ""
],
"phone_number" => [
    "title" => "Phone Number",
    "global_class" => "col-md-12",
    "name"=> "phone_number",
    "placeholder" => "Enter phone number",
    "is_required" => true,
    "input_type" => "number",
    "type" => "input"
],
"Country" => [
    "global_class" => "col-md-12",
    "placeholder" => "Select Country", 
    "is_required" => true, 
    "options" => ["USA" => "USA", "NIGERIA" => "NIGERIA", "CANADA" => "CANADA"], 
    "type" => "select"
],
"state" => [
    "title" => "State",
    "global_class" => "col-md-12",
    "name"=> "state",
    "placeholder" => "Enter State",
    "is_required" => true,
    "input_type" => "text",
    "type" => "input"
],
"input_data"=>$data,
];

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
    // "input_data"=>$data,
];

?>