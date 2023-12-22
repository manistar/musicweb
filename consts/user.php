<?php
$user_form = [
    "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "first_name" => [],
    "last_name" => [],
    "email" => ["input_type"=>"email"],
    "phone_number" => ["input_type"=>"number"],
    "gender" => ["placeholder" => "Select your gender", "is_required" => true, "options" => ["Male" => "Male", "Female" => "Female"], "type" => "select"],
    "password" => ["input_type"=>"password"],
    "confirm_password" => ["input_type"=>"password"],
    "Referral_code" => ["placeholder" => "UX920", "is_required" => false,],  
    // "input_data" => ["full_name" => "seriki gbenga", "gender"=>"Male"],
];

$user_validating = [
    "email" => [
        "title" => "Email",
        "global_class" => "col-md-12",
        "name"=> "email",
        // "class" => "form-control",
        "placeholder" => "example@email.com",
        "is_required" => true,
        "input_type" => "email",
        "type" => "input"
        
    ],

    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12",
        "id" => "user-password",
        "name"=> "password",
        "description"=>"<a href='forgot.html'>Forgot Password ?</a>",
        "placeholder" => "Enter Password",
        "is_required" => true,
        "input_type" => "password",
        "type" => "input"
    ],
    
];

$user_registration = [
    // "ID" => ["input_type"=>"hidden", "is_required"=>false],
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

    "upload_image"=>[
        "input_type"=>"file", 
        "path"=>"upload/",
         "file_name"=>"profile_" .uniqid(), 
         "formart"=>["jpeg", "jpg", "png"]
        ],

    "gender" => [
        "global_class" => "col-md-12",
        "placeholder" => "Select your gender", 
        "is_required" => true,
         "options" => ["Male" => "Male", "Female" => "Female"], 
         "type" => "select"
        ],

    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12",
        "name"=> "password",
        "placeholder" => "Enter your password",
        "is_required" => true,
        "input_type"=>"password",
        "type" => "input"
    ],
    // "confirm_password" => [
    //     "title" => "Password",
    //     "global_class" => "col-md-12",
    //     "name"=> "password",
    //     "placeholder" => "Confirm your password",
    //     "is_required" => true,
    //     "input_type"=>"password",
    //     "type" => "input"
    // ],
    // "input_data"=>["userID"=>uniqid()],
];


// $d->create_table("users", $user_registration);
// $d->quick_insert("users", "ID, userID, first_name, last_name, password", [uniqid(), uniqid(),  "Tunde", "Ajayi", "tundeajayi@gmail.com", "userPassword"], "Account Created Successfully");
?>