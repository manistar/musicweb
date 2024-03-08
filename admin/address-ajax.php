<?php 

//Include database configuration file
require_once "include/database.php";
// error_reporting(0);
$d = new database;
require_once "../functions/address.php";
$address = new address;
if(isset($_POST['getcountry'])){
    echo $address->getcountries();
}

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    echo $address->getstates(htmlspecialchars($_POST["country_id"]));
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    echo $address->getcities(htmlspecialchars($_POST["state_id"]));
}

?>