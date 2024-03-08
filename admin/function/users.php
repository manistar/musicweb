<?php
class users extends database {
    function getadminusers($userID , $type="users", $datefrom = "", $dateto = ""){
        $d = new database;
        $user = array();
        $user = $this->getall("admins", "ID = ?", [$userID], fetch: "details");
        
        // Get user assign to user
        if($user['type'] == "admin"){
            
            if($datefrom != "" && $dateto != ""){
                $users = $this->getall("$type", "date >= ? and date <= ?", [$datefrom, $dateto], fetch: "moredetails");
            }else{
                
                   $users = $this->getall("$type", "date", fetch: "moredetails");
                // $users = $this->getall("$type", "date", fetch: "moredetails");
            }
            
        }else{
            if($datefrom != "" && $dateto != ""){
                $asign = $d->getall("people_assign", "adminID = ? and type = ? and date >= ? and date <= ?", [$userID, $type, $datefrom, $dateto], fetch: "moredetails");
            }else{
                $asign = $d->getall("people_assign", "adminID = ? and type = ?", [$userID, $type], fetch: "moredetails");
            }
            
            if(!empty($asign)){
                foreach($asign as $row){
                    $user_id = $row['userID'];
                    $user = $d->getall("$type", "ID = ?", [$user_id], fetch: "details");
                    if(is_array($user)){
                        $users[] = $user;
                    }
                }
            }
        }
        // var_dump($user);
        return $users;
    }


    
    function newfollow($userid){
        if(!isset($_SESSION['userSession'])){
            echo "<a href='signin.php' style='color:black'>Login first</a>";
            exit();
        }
        if($_SESSION['userSession'] == $userid){
            echo "error";
            exit();
        }
        // echo "no";
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], "");
        if($check > 0){
           $unfollow = $this->unfollow($userid);
           if($unfollow){
            echo "Follow";
            }
        }else{
           $follow =  $this->follower($userid);
           if($follow){
               echo "Unfollow";
           }
        }
    }        
    
    function totalfollowers($userid){
        return $this->getall("followers", "followID = ?", [$userid], fetch: "details");
    }

    function totalfollowing($userid){
        return $this->getall("followers", "userID = ?", [$userid], fetch: "");
    }

    function follower($userid){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], fetch: "moredetails");
       if($check == 0){
            if($this->quick_insert("followers", "", ["userID"=>$userID, "followID"=>$userid])){
                return true;
            }
       }else{
           return false;
       }
    }

    function unfollow($userid){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], fetch: "moredetails");
       if(is_array($check)){
            if($this->delete("ID", "followers", $check['ID'], "no")){
                return true;
            }
       }else{
           return false;
       }
    }

    function checkfollow($userid){
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $this->getall("followers", "userID = ? and followID = ?", [$userID, $userid], fetch: "moredetails");
        if($check > 0){
            return "Unfollow";
        }else{
            return "Follow";
        }
    }

    public function deactivateuser(){
        $id = htmlspecialchars($_POST['userID']);
        $reason = htmlspecialchars($_POST['why_block']);
        if($this->basicuserstatus($id)){
            // check if admin can perfrom and role and check if user is assigned to admin
            if($this->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $id)){
                // if above condition is true then update user's status to block
                $update = $this->update("users", "status = ?, reason = ?", "ID = '$id'", [0, $reason]);
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
        $id = htmlspecialchars($_POST['userID']);
        if(!$this->basicuserstatus($id)){
            // check if admin can perfrom and role and check if user is assigned to admin
            if($this->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $id)){
                // if above condition is true then update user's status to block
                $update = $this->update("users", "status = ?", "ID = '$id'", [1]);
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