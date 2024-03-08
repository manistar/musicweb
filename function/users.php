
<?php 
    class fontusers extends database {
        public $err = false;

        function updateaddress($id){
            $d = new database;
            $u = new fontusers;
            $id = htmlspecialchars($_SESSION['userSession']);
            $data = $d->checkmessage(["country", "state", "city", "street"]);
            if(is_array($data)){
                $where = "ID = '$id'";
                $update = $d->update("users", "", $where, $data);
                if($update){
                echo "Address updated!";
                }
            }else{
            echo "error";
            }
        }
        // 

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

        function changepassword(){
            $d = new database;
            $id = htmlspecialchars($_SESSION['userSession']);
            $value = $d->checkmessage(["current_password", "password", "confirm_password"]);
            if(is_array($value)){
                $data = $d->fastgetwhere("users", "ID = ?", $id, "details");
                if(password_verify($value['current_password'], $data['password'])){
                    $newpassword = password_hash($value['password'], PASSWORD_DEFAULT);
                    $where = "ID ='$id'";
                    $update = $d->update("users", "", $where, ["password"=>$newpassword], "Password changed successfully");
                }else{
                    $d->message("Password Incorrect", "error");
                }
            }
        }

        function updateprofile(){
            $d = new database;
            $u = new fontusers;
            $id = htmlspecialchars($_SESSION['userSession']);
            $data = $d->checkmessage(["first name", "last name", "phone number", "email"]);
            $user = $d->fastgetwhere("users", "ID = ?", $id, "details");
            if(is_array($user)){
                // check if new email exist
                if($user['email'] != $data['email']){
                    $email = $data['email'];
                    $checkemail = $d->fastgetwhere("users", "email = ?", $email, "");
                    if($checkemail > 0){
                        $this->err = true;
                        $d->message("$email already exist", "error");
                    }
                }
                // check if new phone number exist
                if($user['phone_number'] != $data['phone_number']){
                    $phone_number = $data['phone_number'];
                    $checkphone_number = $d->fastgetwhere("users", "phone_number = ?", $phone_number, "");
                    if($checkphone_number > 0){
                        $this->err = true;
                        $d->message("$phone_number already exist", "error");
                    }
                }
                // if now err update user
                if(!$this->err){
                    $where = "ID = '$id'";
                    $update = $d->update("users", "", $where, $data, "Profile updated successfully.");
                }

            }

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
            return $this->getall("followers", "followID = ?", [$userid], fetch: "");
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

        
        function newcard($userID, $txref, $id){
      
            $pay = new payment;
            $verify = $pay->verifypayment($userID, $txref, $id);
            if($verify && $verify['status'] == "success"){
                if($verify['data']['payment_type'] == "card"){
                    if($verify['data']['card']['type'] != "VISA" && $verify['data']['card']['type'] != "MASTERCARD"){
                        $this->message("Error: This card can not be added you can only add your MASTER CARD or VISA CARD", "error");
                    }else{
                        $check = $this->multiplegetwhere("cards", "first_6digits = ? and last_4digits =?", [$verify['data']['card']['first_6digits'], $verify['data']['card']['last_4digits']], "");
                        if($check > 0){
                            $this->message("This is a duplicate card", "error");
                        }else{
                            $data = ["userID"=>"$userID", "token"=>$verify['data']['card']['token'], "issuer"=>$verify['data']['card']['issuer'], "country"=>$verify['data']['card']['country'], "first_6digits"=>$verify['data']['card']['first_6digits'], "last_4digits"=>$verify['data']['card']['last_4digits'], "expire_date"=>$verify['data']['card']['expiry'], "type"=>$verify['data']['card']['type']];
                            $insert = $this->quick_insert("cards", "", $data, "Card added successfully");
                            if($insert){
                                return true;
                            }else{
                                $this->message("Error: sorry something went wrong. You can reload page to try again", "error");
                            }
                        }
                    }
                }else{
                    $this->message("Error: Payment was successful but seems you changed the payment method to ".$verify['data']['payment_type']." please try again and only pay with your ATM master card or VISA card", "error");
                }
            }
        }

        function removecard($id){
            $userID = htmlspecialchars($_SESSION['userSession']);
            $card = $this->getall("cards", "ID = ? and userID = ?", [$id, $userID], fetch: "details");
            if(is_array($card)){
                if($this->delete("ID", "cards", $id, "no")){
                    $return = [
                        "message" => ["Success", "Card Removed", "success"],
                        "function" => ["removediv", "data"=>[$id, "null"]],
                    ];
                    return json_encode($return);
                }
            }
        }

        function userstatus($userid){
          
            $checkuserstatus = $this->getall("users", "ID = ? and status = ?", [$userid, "1"], fetch: "moredetails");
            if($checkuserstatus > 0){
                $checkplan = $this->getall("subscriptions", "userID = ? and status = ?", [$userid, "1"], fetch: "moredetails");
                if($checkplan > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        function free_trial($id){
           
            $userID = htmlspecialchars($_SESSION['userSession']);
            $plan = $this->getall("plans", "ID = ? and free_trial = ? and status = ?", [$id, "yes", "1"], "details");
            if(is_array($plan)){
                $card = $this->getall("cards", "userID = ? and token != ? and status = ?", [$userID, "", "1"], "details");
                if(is_array($card)){
                    $free = $this->getall("settings", "meta_name = ?", ["free_trial_duration"], fetch: "details");
                    if(is_array($free)){
                        $start_date = date('Y-m-d');
                        $end_date = $this->addupdate($free['meta_value'], $start_date);
                        $check = $this->getall("subscriptions", "userID = ? and status = ?", [$userID, "1"], "details");
                        if(is_array($check)){
                            $this->message("you have ".$check['plan_type']." active please go to your <a href='account.php?settings&plan'> plan setting </a> and deactive and try again", "error");
                        }else{
                            $data = ["ID"=>uniqid(), "userID"=>$userID, "planID"=>$plan['ID'], "plan_type"=>"free_trial", "cardID"=>$card['ID'], "token"=>$card['token'], "start_date"=>$start_date, "end_date"=>$end_date];
                            $insert = $this->quick_insert("subscriptions", "", $data, $free['meta_value']." day(s) free trial for ".$plan['name']." is now active. Enjoy!!");
                            if($insert){
                                return true;
                            }
                        }
                    }
                }else{
                    $this->message("Sorry this card is not active", "error");
                }
            }else{
                $this->message("Plan not found or may not be active.", "error");
            }
        }

        function newsub($userID, $transid, $id, $type = "normal"){
                $check = 1;
                // verify payment
                $pay = new payment;
                // $userID = htmlspecialchars($_SESSION['userSession']);
                if($type == "card"){
                    $paydata = $this->getall("payment", "ref = ?", $transid, fetch: "details");
                    $data = array("status"=>"success", "price"=>$paydata['price']);
                    $ref = $paydata['ref'];
                }else{
                    $paydata = $this->getall("payment", "transaction_id = ?", $transid, fetch: "details");
                    $ref = $paydata['ref'];
                    $data = $pay->verifypayment($userID, $transid, $ref);
                }
                
                $plan = $this->getall("plans", "ID = ?", $paydata['payforID'], fetch: "details");
                // check if payment for is for this plan
                // print_r($data);

                if($data['status'] == "success" && $paydata['payforID'] == $id){
                    $check++;
                }
                 $paydata['payforID']."/".$id;
                // check if no sub with is transaction id
                if($this->getall("subscriptions", "userID = ? and planID = ? and token = ?", [$userID, $id, $transid], "") == 0){
                    $check++;
                }
                if($check == 3){
                    $duration = $data['price'] / $plan['price'];
                    $start_date = date('Y-m-d');
                    $end_date = $this->addupdate($duration, $start_date);
                    $data = ["ID"=>uniqid(), "userID"=>$userID, "planID"=>$plan['ID'], "plan_type"=>"subscription", "cardID"=>"null", "token"=>"$transid", "start_date"=>$start_date, "end_date"=>$end_date];
                    $insert = $this->quick_insert("subscriptions", "", $data, "Your ".$plan['name']." subscription is now activated");
                            if($insert){
                                return true;
                            }
                }
                //stop all sub 
                // insert in sub
        }

        function confrimexdate(){

        }

        // function getaddress($id, $what){
        //     $d = new database;
        //     $data = $d->fastgetwhere("$what", "ID = ?", $id, "details");
        //     return $data['name'];
        // }

        function getuser($id, $what){
            $data = $this->getall("users", "ID = ?", [$id], fetch: "details");
            return $data["$what"];
        }
    }


