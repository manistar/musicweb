<!DOCTYPE html>
<html lang="en

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
    <?php
    if (isset($_GET['transaction_id'])) {
        $ref = $_GET['transaction_id'];
        $amount = 600;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$ref/verify",
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
        if($data->status == "success") {
           $data = $data->data;
           if($data->charged_amount >= $amount && $data->currency == "NGN") {
                echo "Success";
           }
        }else{
            echo "Error";
        }
        // var_dump($data->status);
    }

?>
        <button id="payment" onclick='makePayment()'>Make payment</button>
    </body>

 
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script>

        function makePayment() {
            // ajax 
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-9b9efaabfbb3b031e6a9fba2f9dafb60-X",
                tx_ref: "titanic-errer345454",
                amount: 600,
                currency: "NGN",
                payment_options: "card, account, banktransfer, ussd",
                redirect_url: "payment.php",
                meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                },
                customer: {
                    email: "rose@unsinkableship.com",
                    phone_number: "08102909304",
                    name: "Rose DeWitt Bukater",
                },
                customizations: {
                    title: "The Titanic Store",
                    description: "Payment for an awesome cruise",
                    logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
                },
            });
        }
    </script>

</html>