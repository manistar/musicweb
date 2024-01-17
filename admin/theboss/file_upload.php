<?php 
session_start();
if($_FILES['uploaded_file']['name']){
    include 'include/session.php';
    include 'include/database.php';
    include 'content/content.php';
    include '../functions/payment.php';
    include '../functions/users.php';
    require 'functions/ads.php';
    $a = new ads;
    $a->uploadproductimage();
}
