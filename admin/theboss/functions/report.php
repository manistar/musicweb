<?php 
class reports extends database {
    function collectreport(){
        $d = new database;
        $userID = $_SESSION['userSession'];
        $cats = $d->fastgetwhere("categories", "userID = ?", $userID, "moredetails");
        foreach($cats as $row){
            $catid = $row['ID'];
            $name = "<b>".$row['name']."</b>";
            $check = reports::subcat($catid, $name);
            if($check != ""){
                $subcat .= $check;
            }
        }
        $apID = htmlspecialchars($_GET['apID']);
        $applicant = $d->fastgetwhere("applicants", "ID = ?", $apID, "details");
        $email = $applicant['email'];
        $message = "<h4>Your Information</h4><hr>";
        $message .= "<b>Name: </b>".$applicant['name'];
        $message .= "<br><b>Email: </b>".$applicant['email'];
        $message .= "<br><b>Phone Number: </b>".$applicant['phone_number'];
        $message .= "<br><b>Position applied for: </b>".$applicant['position_apply'];
        $message .= "<h4>Our Report.</h4> <hr>";
        $message .= $subcat;
        $message .= "<b>Other Comment</b><br>";
        $message .= $_POST['comment'];
        $subject = "Our Report on your CV ";
        echo $message;
      echo  $d->smtpmailer("$email", $name = "Happy Tech" ,$subject, $message);
    }

    private function subcat($catid, $name){
        $d = new database;
        $subc = $d->fastgetwhere("sub_categories", "catID = ?", $catid, "moredetails");
        if($subc != ""){
            foreach($subc as $row){
               $id = $row['ID'];
                if(isset($_POST["$id"])){
                    $rep .= "<li>".$_POST["subcat$id"]."</li>";
                }else{
                    $rep = "";
                }
            }
            if($rep != ""){
                return $name.$rep;
            }else{
                return "";
            }
        }
    }
}

?>