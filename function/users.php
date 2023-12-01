<?php class users extends database {
    function create_user($data){
        // $date = $_POST['date'] = date("l, d-m-Y H:i:sa");
        $info = $this->validate_form($data, "users", "insert");
        if(!is_array($info)){
            return ;
        }
        // $this->quick_insert("users", $info, "User created successfully");
    }
 

    // public function signup($user_registration)
    // {
    //     $d    = new database;
    //     $data = $this->validate_form($user_registration, 'users');
    //     if (is_array($data)) {
    //         $data['ID'] = uniqid();
    //         $data['userID'] = uniqid();
    //         // $checkemail = $this->getall("users", "phone_number = ? and email = ?", [$data['phone_number'], $data['email']], fetch: "moredetails");
    //         // if ($checkemail > 0) {
    //         //     $email = $data['email'];
    //         //     $d->message("Account with email or phone number already exist. <a href='?p=login'>login here</a>", "error");
    //         // } else {
                
    //             // $this->quick_insert("users", $info, "User created successfully");
    //             if ($data['password'] != "") {
    //                 $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    //                 unset($data['confirm_password']);
    //                 // $userID = uniqid();
    //                 $insert = $this->quick_insert("users", $data, "User created successfully",);
    //                 $_SESSION['userSession'] = htmlspecialchars($data['userID']);
    //                 if ($insert) {
    //                     // echo $this->message("Account created successfully. Kindly Login to proceed <a href='?p=login'>login here</a>", "error");
    //                        return $this->loadpage("index.php", "json");
                        
    //                 }
    //             }
    //         // }
    //     }
    // }
     
  
}

