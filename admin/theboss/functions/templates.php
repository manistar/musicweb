<?php 
class template extends database {
    function create_cat(){
        $database = new database;
        $name = htmlspecialchars($_POST['create_cat']);
        $userID = htmlspecialchars($_SESSION['userSession']);
        if(empty($name)){
            echo $database->message("Please Enter a name", "error");
        }else{
            $check = $database->multiplegetwhere("categories", "name = ? and userID = ?", [$name, $userID], "");
            if($check > 0){
                echo $database->message("$name exist.", "error");
            }else{
                $id = mt_rand();
                $data = array("ID"=>"$id","userID"=>"$userID", "name"=>"$name");
                $insert = $database->quick_insert("categories", "", $data);
                return $id;
            }
        }
    }
 
    function update_sub_cat($id, $name){
            $database = new database;
            $set = 'name = ?';
            $where = "ID ='$id'";
            $data = array($name);
            $database->update("sub_categories", $set, $where, $data);
    }

    function createsubcat($name, $catid){
                $database = new database;
                $id = mt_rand();
                $data = array("ID"=>"$id","catID"=>"$catid", "name"=>"$name");
                $insert = $database->quick_insert("sub_categories", "", $data);
                return $id;
    }

    function editcat($id, $name){
            $database = new database;
            $set = 'name = ?';
            $where = "ID ='$id'";
            $data = array($name);
            $database->update("categories", $set, $where, $data);
    }
}

?>