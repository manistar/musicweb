<?php
// $d = new database;
$data = [];
if (isset($_SESSION['userSession'])) {
    $userID = htmlspecialchars($_SESSION['userSession']);
}else{
    $userID = "";
}
// $userID = htmlspecialchars($_SESSION['userSession']);
$add_cart  = [
    // "ID"=>["input_type"=>"number"],
    "productID"=>["input_type"=>"hidden"],
    "userID"=>["input_type"=>"hidden", "unique"=>"productID"],
    "no_product"=>["input_type"=>"hidden", "title"=>"", "placeholder"=>"No of product", "is_required"=>false, "global_class"=>"col-12 w-100"],
    "input_data"=>["no_product"=>1, "userID"=>$userID],
];
// echo $add_cart['no_product']['input_type'];
// $d->create_table("cart", $add_cart); 
?>