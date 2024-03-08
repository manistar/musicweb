<?php
if (isset($_GET['id'])) {
    // Sanitize the input
    $userID = htmlspecialchars($_GET['id']);
    // Fetch user details based on the user ID
    $data = $d->getall("users", "ID = ?", [$userID], fetch: "details");

$edit = [
    "userID" => ["input_type"=>"hidden", "is_required"=>false],
    "first_name" => [
        "title" => "First Name",
        "global_class" => "col-md-12",
        "name"=> "first_name",
        "placeholder" => "Enter your First Name",
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

    "phone_number" => [
        "title" => "Phone Number",
        "global_class" => "col-md-12",
        "name"=> "phone_number",
        "placeholder" => "Enter phone number",
        "is_required" => true,
        "input_type"=>"number",
        "type" => "input",
        "unique"=>""
    ],

    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12",
        "name"=> "email",
        "placeholder" => "Example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input",
        "unique"=>""
    ],
    "input_data"=>$data,
];
}
?>