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
        $value = $this->getall("users", "email = ?", [$data['email']], fetch: "details");
        if (is_array($value)) {
            if (password_verify($data['password'], $value['password'])) {
                 $_SESSION['userSession'] = htmlspecialchars($value['ID']);
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
    //    function upload_data($play_track){
    //     $d    = new database;
    //     $data = $_POST['ID'] = uniqid();
    //     $data = $_POST['userID'];
    //     $info = $this->validate_form($play_track, "playlist");
    //     if(is_array($info)){
    //         $insert = $this->quick_insert("playlist", $info, "Data uploaded Successfully");
    //     }
    // }   

    function upload_data($play_track){
        $data = $_POST['ID'] = uniqid();
        $data = $this->validate_form($play_track, "playlist");
        if(is_array($data)){
            $data['userID'] = $_SESSION['userSession']; 
            $insert = $this->quick_insert("playlist", $data, "Data uploaded Successfully");
        }
    }
}
?>

 