<?php 
class users extends database {
    function getadminusers($userID , $type="users", $datefrom = "", $dateto = ""){
        $d = new database;
        $user = array();
        $user = $d->fastgetwhere("admins", "ID = ?", $userID, "details");
        // Get user assign to user
        if($user['type'] == "admin"){
            if($datefrom != "" && $dateto != ""){
                $users = $d->multiplegetwhere("$type", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");
            }else{
                $users = $d->fastget("$type", "date", ";");
            }
        }else{
            if($datefrom != "" && $dateto != ""){
                $asign = $d->multiplegetwhere("people_assign", "adminID = ? and type = ? and date >= ? and date <= ?", [$userID, $type, $datefrom, $dateto], "moredetails");
            }else{
                $asign = $d->multiplegetwhere("people_assign", "adminID = ? and type = ?", [$userID, $type], "moredetails");
            }
            
            if(!empty($asign)){
                foreach($asign as $row){
                    $user_id = $row['userID'];
                    $user = $d->fastgetwhere("$type", "ID = ?", $user_id, "details");
                    if(is_array($user)){
                        $users[] = $user;
                    }
                }
            }
        }
        return $users;
    }

    public function deactivateuser(){
        $d = new database;
        $id = htmlspecialchars($_POST['userID']);
        $reason = htmlspecialchars($_POST['why_block']);
        if($d->basicuserstatus($id)){
            // check if admin can perfrom and role and check if user is assigned to admin
            if($d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $id)){
                // if above condition is true then update user's status to block
                $update = $d->update("users", "status = ?, reason = ?", "ID = '$id'", [0, $reason]);
                if($update){
                    $return = [
                        "message" => ["Account Deactivated", "You have successfully deactivated this user's account", "success"],
                        "function" => ["statusswitch", "data"=>[$id, "danger"]],
                        "closemodal" => true
                    ];
                    return json_encode($return);
                }
            }
        }
    }

    public function activateuser(){
        $d = new database;
        $id = htmlspecialchars($_POST['userID']);
        if(!$d->basicuserstatus($id)){
            // check if admin can perfrom and role and check if user is assigned to admin
            if($d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $id)){
                // if above condition is true then update user's status to block
                $update = $d->update("users", "status = ?", "ID = '$id'", [1]);
                if($update){
                    $return = [
                        "message" => ["Account activated", "You have successfully activated this user's account", "success"],
                        "function" => ["statusswitch", "data"=>[$id, "success"]],
                        "closemodal" => true
                    ];
                    return json_encode($return);
                }
            }
        }
    }

    static public function d($value){
        return new $value;
    }

    public function createuser(){
        $d = new database;
        $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "createuser");
        if($verify){
            $_POST['ID'] = uniqid();
            $data = $d->checkmessage(["ID","first name", "last name", "phone number", "email"]);
            if(is_array($data)){
              $checkemail = $d->multiplegetwhere("users", "phone_number = ? and email = ?", [$data['phone_number'], $data['email']], "");
              if($checkemail > 0){
                  $email = $data['email'];
                  $d->message("Account with email or phone number aleady exist. <a href='../signin.php'>login here</a>", "error");
              }else{
                $password = $d->radmomstring(6);
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
                $id = $data['ID'];
                $insert = $d->quick_insert("users", "", $data, $message = "Account Created successfully <a href='ads.php?a=new&id=$id'>Post Ads</a>");     
                    if($insert){
                $sendmail = $d->smtpmailer($to = $data['email'], "Auto Password Message", "Your new password.", "Hello ".$data['first_name'].", <br>"."Mstarz Mall just added you as a customer on shop.mstarztech.com <br> login with the information bellow: <br> Link: https://Besttimelive.com/signin.php <br> Username: (use your email or phone number) <br> Password: $password <hr> <small>Do not reply because this email is not monitored by anyone <br> if you have a complain click https://shop.mstarztech.com/contact-us.php</small>", "Just sent password to $to");
                        
                    }
              }
            }
        }else{
            $d->message("You can not perform this action", "error");
        }
    }
}
?>