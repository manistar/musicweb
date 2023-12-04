<?php 
class shop extends database {
    function add_to_cart($add_cart) {
        $data = $this->validate_form($add_cart, "cart", "insert");
        if($data == NULL) {
            $data =  $this->validate_form($add_cart);
            if(!is_array($data)) { return null; }
            $pID = $data['productID'];
            $uID = $data['userID'];
            $this->update("cart", $data, "productID = '$pID' and userID = '$uID'");
        }
        $json = ["function"=>["changetext", "data"=>["cat_no", $this->no_products($data['userID'])]]];
        return json_encode($json);
    }

    function no_products($userID) {
        return $this->getall("cart", "userID = ? and no_product > ?", [$userID, 0], fetch: "");
    } 

    function get_no_of_product_in_cart($userID, $productID) {
        $data =  $this->getall("cart", "productID = ? and userID = ?", [$productID, $userID], "no_product");
        if(!is_array($data)) { return 1; }
        return $data['no_product'];
    }
}