<?php
define("ROOT", "http://localhost/invest2/app/");
define("ROOTFILE", "C:/xampp2/htdocs/invest2/");
define("currency", $d->get_settings("default_currency"));
define("company_name", $d->get_settings("company_name"));
$dark_logo = ROOT."assets/images/logos/".$d->get_settings("dark_logo");
$light_logo = ROOT."assets/images/logos/".$d->get_settings("light_logo");
$favicon = ROOT."assets/images/logos/".$d->get_settings("favicon");
$tranfer_from = [
    "userID"=>["input_type"=>"hidden"],
    "move_from"=>["type"=>"select", "options"=>["trading_account"=>"Balance to Trading Account", "balance"=>"Trading Account to Balance"], "global_class" => "w-100 input-simple"],
    "amount" => ["atb"=>"autofocus", "input_type" => "number", "global_class" => "w-100 input-simple", "placeholder" => "100", "description" => "Enter amount you want to transfer into your trading balance (" . currency . ")"],
];
if(isset($_GET['funds_to'])) {
    $tranfer_from['input_data'] = ["move_from"=>htmlspecialchars($_GET['funds_to'])];
}

define("notification_from",   [
    "userID"=>[],
    "n_for"=>["is_required"=>false],
    "forID"=>["is_required"=>false],
    "url"=>["is_required"=>false],
    "title"=>[],
    "description"=>[],
    "exclude"=>["is_required"=>false],
    "time_set"=>["is_required"=>false],
]);