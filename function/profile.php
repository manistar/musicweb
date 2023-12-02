<?php
class settings extends database{
    public function profile_setings_update($profile_settings) {
        $d = new database;
        $data = $this->validate_form($profile_settings, "users");
        // var_dump($data);
        if (is_array($data)) {
            $ID = $data['ID'];
          $update =  $this->update("users", $data, "ID = '$ID'");
        }
        if($update){
            $d->message("Data has been Updated Successfully", "success");
        }
    }

    function profile_password_update($change_password) {
        $d = new database;
        $data = $this->validate_form($change_password, "users");
        var_dump($data);
        if (is_array($data) && isset($data['ID']) && !empty($data['ID'])) {
            $uID = $data['ID'];
            $password = $data['password'];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->update("users", ["password" => $hashedPassword], "ID = ?", [$uID]);
        }
    }
    
}
// if($data == NULL) {
//     $data =  $this->validate_form($add_cart);
//     if(!is_array($data)) { return null; }
//     $pID = $data['productID'];
//     $uID = $data['userID'];
//     $this->update("cart", $data, "productID = '$pID' and userID = '$uID'");
// }
?>