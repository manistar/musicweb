<?php 
class address extends database {
    function getcountries(){
        $d = new database;
        $user = address::getuserinfo();
        $countries = $d->getall("countries", "name != ? order by name", [""], fetch: "moredetails");
        if(!empty($user['country'])){
            echo "<option value='".$user['country']."'>".address::getaddress($user['country'], "countries")."</option>";
        }else{
             echo '<option value="">Select a Country</option>';
        }
        
            // print_r($countries);
            foreach ($countries as $row) {
                echo '<option style="color:black!important" value="'.$row['id'].'">'.$row['name'].' - '.$row['sortname'].'</option>';
            }
       
    }

    function getuserinfo(){
        session_start();
        $d = new database;
        if(isset($_SESSION['userSession'])){
            $id = htmlspecialchars($_SESSION['userSession']);
           return $user = $d->fastgetwhere("users", "ID = ?", $id, "details");
        }
    }

    function getstates($country_id){
        $d = new database;
        $country_id = htmlspecialchars($country_id);
        $states = $d->fastgetwhere("states", "country_id = ? order by name", "$country_id", "moredetails");
        echo'<option style="color:black!important" value="">Select a State</option>';
        
            foreach ($states as $row) {
                echo '<option style="color:black!important" value="'.$row['id'].'">'.$row['name'].'</option>';
            }
      
   
    }     


    function getcities($state_id){
        $d = new database;
        $state_id = htmlspecialchars($state_id);
        $cities = $d->fastgetwhere("cities", "state_id = ? order by name", "$state_id", "moredetails");
        echo'<option style="color:black!important" value="">Select a State</option>';
        
            foreach ($cities as $row) {
                echo '<option style="color:black!important" value="'.$row['id'].'">'.$row['name'].'</option>';
            }
}

function getaddress($id, $what){
    $d = new database;
    $data = $d->getall("$what", "ID = ?", [$id], fetch: "details");
    return $data['name'];
}
}
?>