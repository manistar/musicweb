<?php 
if(isset($_POST['pay']))
{
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
        'Authorization: Bearer FLWSECK_TEST-361178a3a88e1ca118dfb907227f13b0-X',
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

?>