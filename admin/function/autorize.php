<?php

class validate extends database
{
    public function signin($user_validating)
    {
        $d    = new database;
        $data = $this->validate_form($user_validating);
        if (!is_array($data)) {
            return null;
        }
        $value = $this->getall("admins", "email = ?", [$data['email']], fetch: "details");
        if (is_array($value)) {
            if (password_verify($data['password'], $value['password'])) {
                 $_SESSION['adminSession'] = htmlspecialchars($value['ID']);
                   return $this->loadpage("index.php", "json");
            } else {
                $this->message("Password Incorrect", "error");
            }
        } else {
            $this->message("Email doesn't exist.", "error");
        }
    }

  

    public function signup($user_registration)
    {
        $d    = new database;
        $data = $this->validate_form($user_registration, 'users');
        if (is_array($data)) {
            $data['ID'] = uniqid();
            $data['userID'] = uniqid();
      
                if ($data['password'] != "") {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    unset($data['confirm_password']);
                    $insert = $this->quick_insert("users", $data, "User created successfully",);
                    $_SESSION['userSession'] = htmlspecialchars($data['userID']);
                    if ($insert) {
                           return $this->loadpage("index.php", "json");
                        
                    }
                }
        }
    }

    function upload_data($play_track){
        $data = $_POST['ID'] = uniqid();
        $data = $this->validate_form($play_track, "playlist");
        if(is_array($data)){
            $data['userID'] = $_SESSION['userSession']; 
            $insert = $this->quick_insert("playlist", $data, "Data uploaded Successfully");
        }
    }

   
    // function PlayedMoreThan5x($userID) {
    //     $data = $this->validate_form($userID, "playlist", "insert");
    //     if($data == NULL) {
    //     $_SESSION['userSession'] = htmlspecialchars($data['userID']); 
    //     $this->update("playlist", $data, "play_count = play_count + 1", "ID = ?", [$userID]);
    //     }
    // }

    function PlayedMoreThan5x($userID) {
        $d = new Database;  
    
        // Validate the form data (modify the parameters based on your actual validation logic)
        $data = $this->validate_form(["userID" => $userID]);
    
        // Check if validation is successful
        if ($data !== false) {
            // Update the playlist with play_count + 1 where userID equals $userID
            $uID = $data['userID'];
            $this->update("playlist", ["play_count" => "play_count + 1"], "userID = '$uID'");
    
            // Optionally, update the user session
            $_SESSION['userSession'] = htmlspecialchars($data['userID']);
        }
    }

 

    function add_to_cart($add_cart) {
        $data = $this->validate_form($add_cart, "cart", "insert");
        if($data == NULL) {
            $data =  $this->validate_form($add_cart);
            if(!is_array($data)) { return null; }
            $pID = $data['productID'];
            $uID = $data['userID'];
            $this->update("cart", $data, "productID = '$pID' and userID = '$uID'");
        }
        $json = ["function"=>["changetext", "data"=>["cat_no", $this->no_products($data['userID'])]]];
        return json_encode($json);
    }
}
?>

 