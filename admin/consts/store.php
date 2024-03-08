<?php
$store_insert = [
    "userID" => ["input_type" => "hidden", "is_required" => false],
    "title" => [
        "title" => "Title",
        "global_class" => "col-md-6", // Change this line to "col-md-6"
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],



    "description" => [
        "title" => "Description",
        "global_class" => "col-md-6",
        "name" => "content_text",
        "placeholder" => "Enter Product description",
        "is_required" => true,
        "input_type" => "txtarea",
        "type" => "textarea"
    ],


    "amount" => [
        "title" => "Price",
        "global_class" => "col-md-4",
        "name" => "amount",
        "placeholder" => "Enter Price",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],

    "availability" => ["options" => ["in stock" => "In Stock", "out of stock" => "Out of Stock"], "type" => "select"],
    // avalability label
    // brand label
    "category" => [
        "title" => "Categories",
        "global_class" => "col-md-4",
        "name" => "categories",
        "placeholder" => "Enter Categories",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
    // categories label
    // avalability label
    "upload_image" => [
        "global_class" => "col-md-4",
        "input_type" => "file",
        "path" => "upload/",
        "file_name" => "profile_" . uniqid(),
        "formart" => ["jpeg", "jpg", "png"]
    ],

    "shipment" => [
        "title" => "Shippment Day",
        "global_class" => "col-md-6",
        // "input_class" => "form-control", // Add this line
        "name" => "first_name",
        "placeholder" => "Enter Shipment Day",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
    ],
];
?>