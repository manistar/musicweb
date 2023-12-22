<?php
    class payment extends content {
        function freetrialpayment($planid){
            if(isset($_SESSION['userSession'])){

            }else{
                $_SESSION['redirct'] = "ini-payment.php?plan=".$planid;
                echo $this->message("Error: Please you need to <a href='signin.php'> signin </a> or  <a href='signup.php'> create an account </a> if you don't have one yet", "error");
                // return  "";
            }


        }

        function newpayment($session = true){
            $d = new database;
            $_POST['ID'] = uniqid("PAY-");
            $_POST['userID'] = htmlspecialchars($_SESSION['userSession']);
            $data = $d->checkmessage(['ID', 'payfor', 'payforID', 'userID', 'ref', 'price', 'title_null', 'description_null']);
            if(is_array($data)){
                if($session){
                    session_start();
                    $_SESSION['pendingpayID'] = $data['ref'];
                }
                return $insert = $this->quick_insert("payment", "", $data);
                
            }
            
        }

        function debitcard($cardid){
            $d = new database;
            $pay = new payment;
            $user = new fontusers;
            $userID = htmlspecialchars($_SESSION['userSession']);
            $_POST['userID'] = $userID;
            $data = $d->checkmessage(['payfor', 'payforID', 'userID', 'price', 'title_null', 'description_null']);
            echo $data['payfor'];
            if(!is_array($data)){
                exit();
            }
            // verify card with userid
            $card = $d->multiplegetwhere("cards", "ID = ? and userID = ?", [$cardid, $userID], "details");
            if(is_array($card)){
                 // create new payment
                $token = $card['token'];
                $_POST['ref'] = uniqid("PAY-");
                $ref = $_POST['ref'];
                
                $newpay = $pay->newpayment(false);
                if(!$newpay){
                    $d->message("Error making payment.", "error");
                    exit();
                }
            // charge card
               $charge = $pay->charge_with_token($token, $ref, $data['price'], $userID, $data['description']);
               if($charge && $charge->status == "success"){
               // update payment with return status    
               $where = "ref = '$ref'";
               $update = $d->update("payment", "", $where, ["transaction_id"=>"$ref"]);
               // if return status is success give fund
               if($update){
               $sub = $user->newsub($userID, $ref, $data['payforID'], $type = "card");
               if($sub){
                return "<a href='account.php?a=post' >Start Posting</a>";
               }
               }else{
                  // error
               }
               }else{
                   $d->message("Sorry we can not bill this card at the moment", "error");
               }
            }else{
                $d->message("This card do not belong to you", "error");
                exit();
            }
        }

        function updatepayment($userID, $txref, $id){
            $d = new database;
            $userID = htmlspecialchars($_SESSION['userSession']);
            $verify = payment::verifypayment($userID, $txref, $id);
            // print_r($verify);
            $where = "ref = '$id'";
            if($verify['status'] == "success"){
                $update = $d->update("payment", "", $where, ["transaction_id"=>"$txref", "status"=>$verify['status']], "Payment Updated");
                if($update){
                    return true;
                }else{
                    return false;
                }
            }else{
                $update = $d->update("payment", "", $where, ["transaction_id"=>"$txref", "status"=>$verify['status']], "Payment Updated");
            }
        }

        function oldnewpayment(){
            $d = new database;
           $data = $d->checkmessage(['userID', 'name', 'email', 'amount', 'payment_options', 'des']);
           if(is_array($data)){
                //* Prepare our rave request
                $request = [
                    'tx_ref' => time(),
                    'amount' => $data['amount'],
                    'currency' => 'NGN',
                    'payment_options' => $data['payment_options'],
                    'redirect_url' => $d->geturl(),
                    'customer' => [
                        'email' => $data['email'],
                        'name' => $data['name'],
                    ],
                    'meta' => [
                        'price' => $data['amount'],
                    
                    ],
                    'customizations' => [
                        'title' => $data['des'],
                        'description' =>  $data['des'],
                    ]
                ];

                //* Ca;; f;iterwave emdpoint
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($request),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.flutterwave_secret_key['meta_value'],
                    'Content-Type: application/json'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);

                $res = json_decode($response);
                if($res->status == 'success')
                {
                    $link = $res->data->link;
                    header('Location: '.$link);
                }
                else
                {
                    echo 'We can not process your payment';
                }

           }       
        }


        function charge_with_token($token, $ref, $amount, $userID, $dis){
            $d = new database;
            $amount = (int)$amount;
            $user = $d->fastgetwhere("users", "ID = ?", $userID, "details");
            if(is_array($user)){
                $first_name = $user['first_name'];
                $last_name = $user['last_name'];
                $email = $user['email'];
                 $ip = $_SERVER['REMOTE_ADDR'];
            }
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/tokenized-charges",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n    \"token\": \"$token\",\n    \"currency\": \"NGN\",\n    \"country\": \"NG\",\n    \"amount\": $amount,\n    \"email\": \"$email\",\n    \"first_name\": \"$first_name\",\n    \"last_name\": \"$last_name\",\n    \"ip\": \"$ip\",\n    \"narration\": \"$dis\",\n    \"tx_ref\": \"$ref\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer ".flutterwave_secret_key['meta_value'],
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $res = json_decode($response);
            return $res;
        }

        
        function newpayment2(){
            $email = $_POST['email'];
            $amount = $_POST['amount'];
        
            //* Prepare our rave request
            $request = [
                'tx_ref' => time(),
                'amount' => $amount,
                'currency' => 'NGN',
                'payment_options' => 'card',
                'redirect_url' => 'http://localhost/yt/rave/process.php',
                'customer' => [
                    'email' => $email,
                    'name' => 'Zubdev'
                ],
                'meta' => [
                    'price' => $amount
                ],
                'customizations' => [
                    'title' => 'Paying for a sample product',
                    'description' => 'sample'
                ]
            ];
        
            //* Ca;; f;iterwave emdpoint
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.flutterwave_secret_key['meta_value'],
                'Content-Type: application/json'
            ),
            ));
        
            $response = curl_exec($curl);
        
            curl_close($curl);
            
            $res = json_decode($response);
            if($res->status == 'success')
            {
                $link = $res->data->link;
                header('Location: '.$link);
            }
            else
            {
                echo 'We can not process your payment';
            }
        }

        function verifypayment($userID, $txref, $id){
            $d = new database;
            $data = $d->multiplegetwhere("payment", "userID = ? and ref = ?", [$userID, $id], "details");
            if(is_array($data)){
                if($data['userID'] == $_SESSION['userSession']){
                    $amount = $data['price'];
                   return $verify = payment::verifyrav($txref, $amount);
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        function verifyravold($txref, $amount){
            $txref = "PAY-6126a82dca635";
            // $ref = htmlspecialchars($_SESSION['atmid']);
            //$amount = "50"; //Correct Amount from Server
            $currency = "NGN"; //Correct Currency from Server

            $query = array(
                "SECKEY" => flutterwave_secret_key['meta_value'],
                "txref" => "$txref"
            );
        
            $data_string = json_encode($query);
                    
            $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify ');                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
            $response = curl_exec($ch);
        
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
        
            curl_close($ch);
        
            $resp = json_decode($response, true);
              $chargeResponsecode = $resp['data']['chargecode'];
              $chargeAmount = $resp['data']['amount'];
                $chargeCurrency = $resp['data']['currency']; 
        
            if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
               
                //Give Value and return to Success page
                  return $resp;
            } else {
                //Dont Give Value and return to Failure page
                return false;
            }
        }

        function verifyrav($txref, $amount){
            // $txref = "2437528";
            $d = new database;
            $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$txref/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$d->settings("flutterwave_secret_key")['meta_value'],
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return  json_decode($response, true);
        }

    }
?>