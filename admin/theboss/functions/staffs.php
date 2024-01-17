<?php 
    class staffs extends database {
        public $staffs;
        function newstaff(){
            $d = new database;
            $id = htmlspecialchars($_SESSION['adminSession']);
            $_POST['ID'] = uniqid();
            $data = $d->checkmessage(['ID', 'first name', 'last name', 'phone number', 'email', 'address']);
            if(is_array($data)){
                if($d->verifyrole($id, "createstaff")){
                $userid = $data['ID'];
                $checkemail = $d->multiplegetwhere("admins", "email = ? or phone_number = ?", [$data['email'], $data['phone_number']], "");
                if($checkemail > 0){
                    $d->message("Email or phone number taken, please check and try again later", "error");
                }else{
                    $password = $d->radmomstring(6);
                    $data['password'] = password_hash($password, PASSWORD_DEFAULT);
                    $sendmail = $d->smtpmailer($to = $data['email'], "Auto Message", "Your new admin password.", "Hello ".$data['first_name'].", <br>"."Admin just added you as a staff on Besttimeliveseedmicrofinance.com.ng <br> login with the information bellow: <br> Link: https://Besttimeliveseedmicrofinance.com.ng/admin <br> Username: (use your email or phone number) <br> Password: $password <hr> <small>Do not reply because this email is not monitored by anyone <br> if you have a complain click https://Besttimeliveseedmicrofinance.com.ng/contact-us.html</small>", "Just sent password to $to");
                    if($sendmail){
                        $insert = $d->quick_insert("admins", "", $data, "Staff account created successfully <a href='staff.php?a=assign&id=$userid'>Start Assigning </a>");
                        if($insert){
                            $insert = $d->quick_insert("people_assign", "", ["adminID"=>$id, "userID"=>$userid, "type"=>"staff"], "Staff assign to you successfully");
                        }
                    }
                }
            }else{
                $d->message("Sorry you can not perform this action", "error");
            }
            }
        }

        function getadminstaffs($staffid, $datefrom = "", $dateto = ""){
            if($dateto == ""){
                $dateto = date("Y-m-d h:i:s");
            }
            $d = new database;
            $staffs = array();
            $user = $d->fastgetwhere("admins", "ID = ?", $staffid, "details");
            // Get staff assign to staff
            if($user['type'] == "admin"){
                $staffs = $d->multiplegetwhere("admins", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");
            }else{
                if($datefrom == ""){
                    $asign = $d->multiplegetwhere("people_assign", "adminID = ? and type = ?", [$staffid, "staff"], "moredetails");
                }else{
                    $asign = $d->multiplegetwhere("people_assign", "adminID = ? and type = ? and date >= ? and date <= ?", [$staffid, "staff", $datefrom, $dateto], "moredetails");
                }
                if(!empty($asign)){
                    foreach($asign as $row){
                        $id = $row['userID'];
                        $staff = $d->fastgetwhere("admins", "ID = ?", $id, "details");
                        if(is_array($staff)){
                            $staffs[] = $staff;
                        }
                    }
                }
            }
            return $staffs;
        }
        

        function assignrole(){
            $d = new database;
            $delete = true;
            $id = htmlspecialchars($_SESSION['adminSession']);
            $userid = htmlspecialchars($_POST['saverole']); 
            $admin = $d->multiplegetwhere("admins", "ID = ? and type = ?", [$id, "admin"], "");
            if($admin > 0){
                $check = $d->fastgetwhere("roles", "userID = ?", $userid, "");
                if($check > 0){
                    $delete = $d->delete("userID", "roles", $userid);
                }
               if($delete){
                $data = $_POST['role'];
                foreach($data as $row => $value){
                   $insert = $d->quick_insert("roles", "", ["userID"=>$userid, "therole"=>$value], "$value updated");
                }
               }
            }else{
                $d->message("Sorry you can not perform this action", "error");
            }
        }

        function assigncustomer(){
            $d = new database;
            $delete = true;
            $i = 0;
            $id = htmlspecialchars($_SESSION['adminSession']);
            $userid = htmlspecialchars($_POST['assigncustomer']); 
            $admin = $d->multiplegetwhere("admins", "ID = ? and type = ?", [$id, "admin"], "");
            if($admin > 0){
                $check = $d->fastgetwhere("people_assign", "adminID = ?", $userid, "");
                if($check > 0){
                    $delete = $d->delete("adminID", "people_assign", $userid);
                }
               if($delete){
                $data = $_POST['customer'];
                foreach($data as $row => $value){
                   $insert = $d->quick_insert("people_assign", "", ["adminID"=>$userid, "userID"=>$value]);
                   $i++;
                }
                if($i > 0){
                    $d->message("Updated successfully", "success");
                }
               }
            }else{
                $d->message("Sorry you can not perform this action", "error");
            }
        }

        function changepassword(){
            $d = new database;
            $id = htmlspecialchars($_SESSION['adminSession']);
            $value = $d->checkmessage(["current_password", "password", "confirm_password"]);
            if(is_array($value)){
                $data = $d->fastgetwhere("admins", "ID = ?", $id, "details");
                if(password_verify($value['current_password'], $data['password'])){
                    $newpassword = password_hash($value['password'], PASSWORD_DEFAULT);
                    $where = "ID ='$id'";
                    $update = $d->update("admins", "", $where, ["password"=>$newpassword], "Password changed successfully");
                }else{
                    $d->message("Password Incorrect", "error");
                }
            }
        }

        // function adminloan($)
    }
?>