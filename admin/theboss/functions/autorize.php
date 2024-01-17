<?php
class autorize extends database {
    public function signup(){
        $d = new database;
        $_POST['ID'] = uniqid();
        $data = $d->checkmessage(["ID","first name", "last name", "email", "phone number", "password", "confirm password"]);
        if(is_array($data)){
          $checkemail = $d->fastgetwhere("users", "email = ?", $data['email'], "");
          if($checkemail > 0){
              $email = $data['email'];
              $d->message("Account with $email aleady exist. <a href='index.php'>login here</a>", "error");
          }else{
              if($data['password'] != ""){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                unset($data['confirm_password']);      
                $insert = $d->quick_insert("users", "", $data, $message = "Account Created successfully <a href='index.php'>Login here</a>");
              }
          }
        }
    }

    public function forgetpassword(){
        $d = new database;
        $email = htmlspecialchars($_POST['email']);
        if(isset($_POST['email'])){
            $checkemail = $d->fastgetwhere("admins", "email = ?", $email, "");
            if($checkemail){
                $data = $d->fastgetwhere("admins", "email = ?", $email, "details");
                $id = $data['ID'];
                $password =  $d->radmomstring(6);
                $newpassword = password_hash($password, PASSWORD_DEFAULT);
                $where = "ID ='$id'";
                $update = $d->update("admins", "", $where, ["password"=>$newpassword], "Password reset check your email for instructions");
                if($update){
                    $sendmail = $d->smtpmailer($to = $data['email'], "Auto Message", "Your new admin password Reset.", "Hello ".$email.", <br>"."You just changed your password on Besttimeliveseedmicrofinance.com.ng <br> login with the information bellow: <br> Link: https://Besttimeliveseedmicrofinance.com.ng/admin <br> Username: (use your email or phone number) <br> Password: $password <hr> <small>Do not reply because this email is not monitored by anyone <br> if you have a complain click https://Besttimeliveseedmicrofinance.com.ng/contact-us.html</small>", "");
                }else{
                $d->message("Error", "error");
                    
                }
            }else{
                $d->message("Email not found by check and try again", "error");
            } 
        }else{
            $d->message("Please enter email address", "error");
        }
    }

    public function signin(){
        $d = new database;
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        if(!empty($email) && !empty($password)){
            $value = $d->fastgetwhere("admins", "email = ?", $email, "details");
            if(is_array($value)){
                if(password_verify($password, $value['password'])){
                    session_start();
                    $d->updateadmintoken($value['ID'], "admins");
                    $_SESSION['adminSession'] = htmlspecialchars($value['ID']);
                    header("Location:index.php");
                }else{
                    $d->message("Password Incorrect", "error");
                }
            }else{
                $d->message("Email doesn't exist.", "error");
            }
        }else{
            $d->message("Make sure you enter your email and password", "error");
        }
    }
}
?>