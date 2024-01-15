<?php
// $userID = $data= "";
$d = new database;
    $userID = $data = [];
    if (isset($_SESSION['userSession'])) {
        $userID = htmlspecialchars($_SESSION['userSession']);
        $data = $d->getall("users", "ID = ?", [$userID], fetch:"details");
    } 
    $checkout = [
        // $data["first_name"].' '.$data["last_name"],
        "first_name" => [
            "title" => "First Name",
            "global_class" => "col-md-12",        
            "placeholder" => "first name",
            "is_required" => true,
            "input_type" => "text",
            "type" => "input",
        ],
       
    
        "email" => [
            "title" => "Email",
            "global_class" => "col-md-12",
            "name"=> "email",
            "placeholder" => "Example@email.com",
            "is_required" => true,
            "input_type" => "email",
            "type" => "input",
        ],
        "phone_number" => [
            "title" => "Phone Number",
            "global_class" => "col-md-12",
            "name"=> "phone_number",
            "placeholder" => "Enter phone number",
            "is_required" => true,
            "input_type"=>"number",
            "type" => "input",
        ],

        // "amount" => [
        //     "title" => "Total Amount",
        //     "global_class" => "col-md-12",        
        //     // "placeholder" => "number_format($total_cat);",
        //     "is_required" => true,
        //     "input_type" => "text",
        //     "type" => "input",
        // ],
       
        "payment"=>["options"=>["flutterwave"=>"Pay with Card", "Stripe"=>"Pay with Stripe"], "type"=>"select"],
        // "payment"=>[
        // "placeholder"=>"Select your payment Method", 
        // "is_required"=>true,
        // "options"=>[
        // "flutterwave"=>"Pay with Card",
        // "Stripe"=>"Pay with Stripe"], 
        // "type"=>"input"
        // ],
       
        "input_data"=>$data,
    ];

    // <div class="custom-control custom-radio">
    //                             <input type="radio" id="pay3" name="payment" class="custom-control-input">
    //                             <label class="custom-control-label" for="pay3">Flutter Wave</label>
    //                         </div>
?>    