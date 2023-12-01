<?php
session_start();
// require_once 'include/session.php';
require_once 'consts/Regex.php';
require_once 'include/database.php';
$d = new database;
require_once 'content/content.php';
$c = new content;
require_once 'consts/user.php';
require_once 'function/autorize.php';
$v = new validate;

// if(isset($_SESSION['userSession'])){
//     $userID = htmlspecialchars($_SESSION['userSession']);
//     $data = $d->getall("users", "ID = ?", [$userID], fetch:"details");
// }
?>