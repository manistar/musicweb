<?php
// /^([a-zA-Z' ]+)$/

    define("Regex", [
        // "full_name"=>["value"=>"/^([a-zA-Z' ]+)$/", "error_message"=>"Enter first name and last name"],
        "email"=>["value"=>"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", "error_message"=>"This is an invalid email."],
        // "password"=>["value"=>"/^(?=.*?[0-9])(?=.*[A-Z]).{6,12}$/", "error_message"=>"Password should be at least 4 characters in length and should include at least one upper case letter and one number."],
        "phone_number"=>["value"=>"/^[0-9]{10}+$/", "error_message"=>"Invalid Phone Number"],
        "url"=>["value"=>"((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*", "error_message"=>"Invalid Url"],
    ]);