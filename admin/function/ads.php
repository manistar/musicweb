<?php 
class ads extends database {

    // post new ads

    function postads() 
    {
        $d = new database;
        $_POST['ID'] = uniqid();
        $userID = htmlspecialchars($_POST['userID']);
        $value = $d->checkmessage(["ID", "userID", "product name", "category", "sub category", "tags_null", "product_condition_null", "price", "last price_null", "description"]);
        if (is_array($value)) {
            $product_name = $value['product_name'];
            $productID = $value['ID'];
            $check = $d->getall("products", "userID = ? and product_name = ?", [$userID, $product_name], fetch: "");
            if ($check > 0) {
                $this->err = true;
                $d->message("Duplicate Product", "error");
            }else{
                $this->err = ads::checkprice($value);
            }

            if (!$this->err) {
                $insert = $d->quick_insert("products", "", $value, $message = "Ads saved successfully <a href='users.php?a=post&upload=$productID&id=$userID' style='color:blue'>ckick to Upload product Image </a>");
                if ($insert) {
                    // related product here...
                }
            }
        }
    }

    // new category 
    function newcategory(){
        $d = new database;
        $value = $d->checkmessage(["name"]);
        if(is_array($value)){
            $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "managecategories");
               if ($verify) {
                    if($d->getall("categories", "name = ?", $value['name'], "") == 0){
                        $insert = $d->quick_insert("categories", "", $value, $message = $value['name']." added successfully");
                    }else{
                        $d->message("This look like a duplicate category", "error");
                    }
            } 
        }
    }


    function newsubcategory(){
        $d = new database;
        $value = $d->checkmessage(["name", "catID"]);
        if(is_array($value)){
            $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "managecategories");
               if ($verify) {
                    if($d->getall("sub_categories", "name = ? and catID = ?", [$value['name'], $value['catID']], fetch: "") == 0){
                        $insert =   "";   
                    }else{
                        $d->message("This look like a duplicate sub category", "error");
                    }
            } 
        }
    }

    // upload image 
    function uploadproductimage()
    {
        $d = new database;
        $id = htmlspecialchars($_GET['transid']);
        $userID = htmlspecialchars($_GET['userID']);
        $check = $d->getall("products", "ID = ? and userID = ?", [$id, $userID], fetch: "");
        if ($check > 0) {
            $path = "../upload/products/";
            $title = uniqid("img");
            $upload = $d->process_image($title, $path);
            if (!empty($upload)) {
                $d->quick_insert("image_upload", "", ["forID" => $id, "userID" => $userID, "name" => $upload, "imagefor" => "products"]);
            }
        } else {
            $d->message("Error: Product not found", "error");
        }
    }

    // edit ads 
    function editads(){
        $d = new database;
        $c = new content;
        $id = htmlspecialchars($_POST['ID']);
        if(!empty($id)){
            $value = $d->checkmessage(["product name", "category", "sub category", "tags_null", "product_condition_null", "price", "last price_null", "description"]);
            if(is_array($value)){
                $data = $d->getall("products", "ID = ?", [$id], "details");
                if(is_array($data)){
                    $userID = $data['userID'];
                    if($d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $id)){
                    if(ads::checkpname($data['product_name'], $value['product_name'], $userID)){
                        if(!ads::checkprice($value)){
                            $where = "ID ='$id'";
                            $update = $d->update("products", "", $where, $value);
                            if($update){
                                $ads = $d->getall("products", "ID = ?", [$id], fetch: "details");
                                $return = [
                                    "message" => ["Account Updated", "You have successfully update this user's account", "success"],
                                    "function" => ["updatetable", "data"=>["adstable", $userID]],
                                    "closemodal" => true
                                ];
                                return json_encode($return);
                            }
                        }
                    }
                }
                }else{
                    $d->message("Product not found please check and try again", "error");
                }
            }
        }else{
            $d->message("No product selected", "error");
        }
    }
  
    // update ads status
    function updateadsstatus()
    {
        $passid = "";
        $d = new database;
        $userID = htmlspecialchars($_POST['userID']);
        $adsID = htmlspecialchars($_POST['adsID']);
        $status = htmlspecialchars($_POST['status']);
        if($d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "deactivateusers") && $d->verifyassign($d->userID(), $userID)){
            if ($status == "1" || $status == "2" || $status == "3" || $status == "0") {
                $check = $d->getall("products", "ID = ? and userID = ?", [$adsID, $userID], fetch: "");
                if ($check > 0) {
                    $where  = "ID = '$adsID'";
                    $update = $d->update("products", "", $where, ["status" => $status]);
                    if ($update) {
                        // echo $_GET['a'];
                        if(isset($_POST['a']) && $_POST['a'] != "list"){
                            $passid = $userID;
                        }
                        $ads = $d->getall("products", "ID = ?", [$adsID], fetch: "details");
                        $return = [
                            "message" => ["Ads Updated", "Ads status updated successfully", "success"],
                            "function" => ["updatetable", "data"=>["adstable", "$passid"]],
                            "closemodal" => true
                        ];
                        return json_encode($return);
                    }
                } else {
                    $d->message("Err: Not found", "error");
                }
            }
        }else{
            $d->message("Sorry you can not perform this action", "error");
        }
    }


    // remove ads image 

    function removeimage($id)
    {
        $d = new database;
        // $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $d->getall("image_upload", "ID = ?", [$id], fetch: "details");
        if ($check > 0) {
            $img = $check['name'];
            $forID = $check['forID'];
            if ($d->delete("ID", "image_upload", $id)) {
                if (file_exists("../upload/products/$img")) {
                    if (unlink("../upload/products/$img")) {
                        $data = $d->getall("image_upload", "forID = ?", [$forID], fetch: "moredetails");
                        return $data;
                    }
                }
            }
        } else {
            echo "no image";
        }
    }


    // check status
    function adsstatus($id, $no = false)
    {
        $d = new database;
        if ($id != "") {
            $data = $d->getall("products", "ID = ?", [$id], fetch: "details");
            $status = $data['status'];
            if ($no) {
                return $status;
            }
            switch ($status) {
                case '0':
                    return "Blocked";
                    break;

                case '1':
                    return "Active";
                    break;
                case '2':
                    return "Sold-out";
                    break;
                case '3':
                    return "Draft";
                    break;

                default:
                    return "Removed";
                    break;
            }
        }
    } 


    // check if product name already exist
    function checkpname($oldname, $newname, $id){
        $d = new database;
        if($oldname != $newname){
            if($d->getall("products", "userID = ? and product_name = ?", [$id, $newname], "") > 0){
                $d->message("Duplicate Product", "error");
                return false;
            }else{
                return true;
            }

        }else{
            return true;
        }
    }

    // check if the price is not zero or last price is not greater than the actual price
    function checkprice($value){
        $d = new database;
        if($value['price'] == 0){
                $d->message("Price can not be zero", "error");
                return true;
           }elseif($value['last_price'] >= $value['price']){
                $d->message("last price can not be greater or equal to price", "error");
                return true;
           }
    } 
}
