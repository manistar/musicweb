<?php
if (isset($_GET['action'])) {
    $route = htmlspecialchars($_GET['action']);
}
$data = ["status"=>"active"];
if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $data = $d->getall("wallets", "ID = ?", [$id], fetch: "details");
}
require_once "consts/wallets.php";
require_once 'functions/wallets.php';
$w = new wallets;
