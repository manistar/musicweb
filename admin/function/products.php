<?php
class products extends database
{
    public $error;
    function getsubcategory($id)
    {
        $d = new database;
        $sub = $d->getall("sub_categories", "catID = ?", [$id], fetch: "moredetails");
        echo '<option style="color:black!important" value="">Select a Sub category</option>';
        foreach ($sub as $row) {
            echo '<option style="color:black!important" value="' . $row['ID'] . '">' . $row['name'] . '</option>';
        }
    }

    function totalads($userid, $status = "total")
    {
        $d = new database;
        if($status != "total"){
            return $d->getall("products", "userID = ? and status = ?", [$userid, $status], fetch: "");
        }else{
            return $d->getall("products", "userID = ?", [$userid], fetch: "");
        }
    }

    function postads()
    {
        $d = new database;
        $_POST['ID'] = uniqid();
        $userID = htmlspecialchars($_SESSION['userSession']);
        $_POST['userID'] = $userID;
        $value = $d->checkmessage(["ID", "userID", "product name", "category", "sub category", "tags_null", "product_condition_null", "price", "last price_null", "description"]);
        if (is_array($value)) {
            $product_name = $value['product_name'];
            $productID = $value['ID'];
            $check = $d->multiplegetwhere("products", "userID = ? and product_name = ?", [$userID, $product_name], "");
            if ($check > 0) {
                $this->err = true;
                $d->message("Duplicate Product", "error");
            }

            $this->err = products::checkprice($value);

            if (!$this->err) {
                $insert = $d->quick_insert("products", "", $value); //$message = "Ads saved successfully <a href='account.php?a=upload&id=$productID' style='color:blue'>click to Upload product Image </a>"
                if ($insert) {
                    // related product here...
                     $return = [
                            "message" => ["ADS saved successfully", "Please wait to add ADS image", "success"],
                            "function" => ["loadpage", "data"=>["account.php?a=upload&id=$productID", $productID]],
                        ];
                        return json_encode($return);
                }
            }
        }
    }

    // remove ads

    function removeads($id){
        $p = new products;
        $d = new database;
        $userID = htmlspecialchars($_SESSION['userSession']);
        $ads = $d->multiplegetwhere("products", "ID = ? and userID = ?", [$id, $userID], "details");
        if(is_array($ads)){
            if($d->delete("ID", "products", $id, "no")){
                $image = $d->multiplegetwhere("image_upload", "forID = ? and userID = ?", [$id, $userID], "moredetails");
                if($image != ""){
                    foreach($image as $row){
                        $p->removeimage($row['ID']);
                    }
                }
                $return = [
                    "message" => ["Success", "Status Deleted", "success"],
                    "function" => ["removediv", "data"=>[$id, "null"]],
                    // "closemodal" => true
                ];
                return json_encode($return);
            }

        }else{
            $return = [
                "message" => ["Error", "ADS not found", "error"],
                // "function" => ["removediv", "data"=>[$id, "null"]],
                // "closemodal" => true
            ];  
            return json_encode($return);
        }
    }

    function fliterads()
    {
        $d = new database;
        $data = array();
        $status = "";
        $sort = htmlspecialchars($_POST['sort']);
        if ($sort != "") {
            if ($_POST['min'] != "") {
                $min = htmlspecialchars($_POST['min']);
            } else {
                $min = 0;
            }

            if ($_POST['max'] != "") {
                $max = htmlspecialchars($_POST['max']);
            } else {
                $max = $d->getmaxprice();
                $max = $max['maxprice'];
            }

            $data[0] = $min;
            $data[1] = $max;
            $i = 2;
            if (isset($_POST['search']) && $_POST['search'] != "") {
                $search = htmlspecialchars($_POST['search']);
                switch ($search) {
                    case 'cat':
                        $status = "and category = ?";
                        $data[$i++] = htmlspecialchars($_POST['searchid']);
                        break;
                    case 'subcat':
                        $status = "and sub_category = ?";
                        $data[$i++] = htmlspecialchars($_POST['searchid']);
                        break;
                    default:
                        # code...
                        break;
                }
            }

            if (isset($_POST['status']) && $_POST['status'] != "") {
                $status .= "and product_condition = ?";
                $data[$i++] =  htmlspecialchars($_POST['status']);
            }
            $data[$i++] = "1";
            return $d->multiplegetwhere("products", "price >= ? and price <= ? $status and status = ? order by $sort", $data, "moredetails");
        }
    }

    function checklocation($userID, $type = "search", $locate_id = "")
    {
        $p = new products;
        $d = new database;
        switch ($type) {
            case 'search':
                if (isset($_POST['locationinput']) && isset($_POST['searchlocation']) && $_POST['searchlocation'] != "" && isset($_POST['locationame']) && $_POST['locationame'] != "") {
                    $locate_id  = htmlspecialchars($_POST['searchlocation']);
                    $location = htmlspecialchars($_POST['locationame']);
                } else {
                    return true;
                }
                break;
            case 'home':
                if (strlen($locate_id) == 5) {
                    $location = 'cities';
                } else {
                    $location = 'state';
                }
                break;
        }

        return $p->confrimlocation($location, $locate_id, $userID);
    }

    function confrimlocation($location, $locate_id, $userID)
    {
        $d = new database;
        switch ($location) {
            case 'state':
                $check = $d->multiplegetwhere("users", "ID = ? and state = ?", [$userID, $locate_id], "");
                break;
            case 'cities':
                $check = $d->multiplegetwhere("users", "ID = ? and city = ?", [$userID, $locate_id], "");
                break;
            default:
                $check = 0;
                break;
        }
        if ($check > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkprice($value)
    {
        $d = new database;
        if ($value['price'] == 0) {
            $d->message("Price can not be zero", "error");
            return true;
        } elseif ($value['last_price'] >= $value['price']) {
            $d->message("last price can not be greater or equal to price", "error");
            return true;
        }
    }

    function editads()
    {
        $d = new database;
        $userID = htmlspecialchars($_SESSION['userSession']);
        $id = htmlspecialchars($_POST['ID']);
        if (!empty($id)) {
            $value = $d->checkmessage(["product name", "category", "sub category", "tags_null", "product_condition_null", "price", "last price_null", "description"]);
            if (is_array($value)) {
                $data = $d->multiplegetwhere("products", "ID = ? and userID = ?", [$id, $userID], "details");
                if (is_array($data)) {
                    if (products::checkpname($data['product_name'], $value['product_name'], $userID)) {
                        if (!products::checkprice($value)) {
                            $where = "ID ='$id'";
                            $update = $d->update("products", "", $where, $value, "Product updated successfully");
                        }
                    }
                } else {
                    $d->message("Product not found please check and try again", "error");
                }
            }
        } else {
            $d->message("No product selected", "error");
        }
    }

    function removeimage($id)
    {
        $d = new database;
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $d->multiplegetwhere("image_upload", "ID = ? and userID = ?", [$id, $userID], "details");
        if ($check > 0) {
            $img = $check['name'];
            $forID = $check['forID'];
            if ($d->delete("ID", "image_upload", $id)) {
                if (file_exists("upload/products/$img")) {
                    if (unlink("upload/products/$img")) {
                        $data = $d->multiplegetwhere("image_upload", "forID = ? and userID = ?", [$forID, $userID], "moredetails");
                        return $data;
                    }
                }
            }
        } else {
            echo "no image";
        }
    }

    function checkpname($oldname, $newname, $id)
    {
        $d = new database;
        if ($oldname != $newname) {
            if ($d->multiplegetwhere("products", "userID = ? and product_name = ?", [$id, $newname], "") > 0) {
                $d->message("Duplicate Product", "error");
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
    function getcategory($id, $type)
    {
        $d = new database;
        return $d->fastgetwhere("$type", "ID = ?", $id, "details");
    }

    function updatestaus($userID, $adsID, $status)
    {
        $d = new database;
        if ($status == "1" || $status == "2" || $status == "3") {
            $check = $d->multiplegetwhere("products", "ID = ? and userID = ?", [$adsID, $userID], "");
            if ($check > 0) {
                $where  = "ID = '$adsID'";
                $update = $d->update("products", "", $where, ["status" => $status], "Status Updated successfully");
                if ($update) {
                    return true;
                }
            } else {
                $d->message("Err: Not found", "error");
            }
        }
    }

    function saveproduct($id){
        $d = new database;
         $userID = htmlspecialchars($_SESSION['userSession']);
         if($userID != ""){
             $data = $d->multiplegetwhere("bookmark", "userID = ? and adsID = ?", [$userID, $id], "details");  
            if(is_array($data)){
                $bookmarkid = $data['ID'];
                $d->delete("ID", "bookmark", $bookmarkid, "no");
                return "bookmark_border";
            }else{
                $d->quick_insert("bookmark", "", ["userID"=>$userID, "adsID"=>$id]);
                return "bookmark";
            }
         }else{
            $return = [
                            "message" => ["No account Found", "Please you need to login first", "warning"],
                        ];
                        return json_encode($return);
         }
    }

    function getfollowersproduct($no)
    {
        $d = new database;
        $i = 0;
        $ads = $d->fastgetwhere("products", "status = ? order by date", "1", "moredetails");
        if ($ads != "") {
            foreach ($ads as $row) {
                $u = new fontusers;
                if ($u->checkfollow($row['userID']) == "Unollow" && $i <= $no) {
                    $c = new content;
                    $c->getproduct($row, "col-10");
                    $i++;
                }
            }
        } else {
            // echo "I'm the problem";
            return "";
        }
    }


    function uploadproductimage()
    {
        $d = new database;
        $id = htmlspecialchars($_GET['transid']);
        $userID = htmlspecialchars($_SESSION['userSession']);
        $check = $d->multiplegetwhere("products", "ID = ? and userID = ?", [$id, $userID], "");
        if ($check > 0) {
            $path = "../../upload/products/";
            $title = uniqid("img");
            $upload = $d->process_image($title, $path);
            if (!empty($upload)) {
                $d->quick_insert("image_upload", "", ["forID" => $id, "userID" => $userID, "name" => $upload, "imagefor" => "products"]);
            }
        } else {
            $d->message("Error: Product not found", "error");
        }
    }

    function getproductimage($id, $type = "")
    {
        $d = new database;
        if ($type == "") {
            $data = $d->fastgetwhere("image_upload", "forID = ?", $id, "details");
            if (is_array($data)) {
                echo $data['name'];
            } else {
                echo "preview.jpg";
            }
        } else {
            $data = $d->fastgetwhere("image_upload", "forID = ?", $id, "moredetails");
            if (!empty($data)) {
                echo $data;
            } else {
                echo "preview.jpg";
            }
        }
    }
}