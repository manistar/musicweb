<?php 
    class payment extends database {
        
        function makepayment() {

        }

        function checkout($userID) {
            // get all products in cart
            // total
            // productID into arrray
            $json = ["status"=>"error", "message"=>"Something went wrong, refresh and try again."];
            $user = $this->getall("users", "ID = ?", [$userID]);
            if(!is_array($user)) {
                $json['message'] = "User Not Found. Please login";
                return json_encode($json);
            }
            $payment = [
                "ID"=>uniqid("PAY-"),
                "userID"=>$userID,
                "ref"=>uniqid("ref-"),
                "price"=>0,
                "title"=>"This is a title",
                "description"=>"Change me later",
                "products"=>"",
                "address"=>"",
                "status"=>"pending",
            ];
            $carts = $this->getall("cart", "userID = ?", [$userID], fetch: "moredetails");
            if($carts->rowCount() == 0){
                $json['message'] = "Your cart is empty.";
                // $json['userID'] = $userID;
                return json_encode($json);
            }
            $data = $this->get_cart_data($carts);
            $payment['price'] = $data['total'];
            $payment['products'] = json_encode($data['products']);
            // insert the payment 
            if(!$this->quick_insert("payment", $payment)) {
                // error message 
                return json_encode($json);
            }
            // clear cart
            $this->clear_cart($userID);
            // place user info into payment
            $payment['fullname'] = $user['first_name'].' '.$user['last_name'];
            $payment['email'] = $user['email'];
            $payment['phone_number'] = $user['phone_number'];
            // get user email and fullname

            // status, message data
            $json['status'] = "ok";
            $json['message'] = "Invoice Created";
            $json['data'] = $payment;
            return json_encode($json);

        }

        function update_new_payment($transID, $ref, $userID) : bool {
        $status = "failed";
        $payment = $this->getall("payment", "userID = ? and ref = ?", [$userID, $ref]);
        if(!is_array($payment)) { return false; }
        $amount = $payment['price'];
        if($this->validate_payment($transID, $amount)) {
            $status = "success";
        }
        $update = $this->update("payment",  ["transaction_id"=>$transID, "status"=>$status], "ref = '$ref'");
        if($status == "success") { return true; }
        return false;
        }


    function validate_payment($transID,  $amount) : bool
    {
        $amount = (float)$amount;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$transID/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-47acd6b17c2263c000211a6e6027292b-X",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);
        if ($data->status == "success") {
            $data = $data->data;
            if ($data->charged_amount >= $amount && $data->currency == "NGN") {
                return true;
            }
        } else {
           return false;
        }
        return false ;
    }
        function clear_cart($userID) {
            return $this->delete("cart", "userID = ?", [$userID]);
        }
        function get_cart_data($carts) {
            $data = ["total"=>0, "products"=>[]];
            if($carts->rowCount() > 0) {
                foreach ($carts as $row) {
                    $product = $this->getall("products", "ID = ?", [$row['productID']]); 
                    $data['total'] += (float)substr($product['amount'], 1) * (float)$row['no_product'];
                    array_push($data['products'], $product['ID']);
                }
            }
            return $data;
        }

        function createpayment($userID, $price, $title, $discription) {
            // get all carts products
            $txt = uniqid("REF-");
            if($this->getall("payment", "ref = ?", [$txt], fetch: "") > 0) {
                return true;
            }
          $carts = [];
          $cart = $this->getall("cart", "userID = ? and status = ?", [$userID, "active"], "ID", "moredetails");
          if($cart->rowCount() > 0) {
            foreach($cart as $row) {
                array_push($carts, $row['ID']);
            }
          }

        $data = [
            "ID"=>uniqid(),
            "userID"=>$userID,
            "ref"=>$txt,
            "price"=>$price,
        ];

        $this->quick_insert("payment", $data);
        return $data['ref'];
        }
    }
?>