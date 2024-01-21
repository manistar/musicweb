<?php
// tx_ref
// require_once "function/payment.php";
// $p = new payment;

// if (isset($_GET['transaction_id']) && isset($_GET['tx_ref'])) {
//     $transaction_id = htmlspecialchars($_GET['transaction_id']);
//     $tx_ref = htmlspecialchars($_GET['tx_ref']);

//     // Assuming $userID is defined somewhere in your code
//     if ($p->update_new_payment($transaction_id, $tx_ref, $userID)) {
//         $id = ''; // Assuming $id needs to be defined; adjust this according to your code
//         $d->loadpage("index?payment&action=invoice&id=" . $id);
//         exit();
//     } else {
//         $d->loadpage("index?payment&action=failed");
//         exit();
//     }
// } else {
//     echo "<center><h4>No transaction ID or ref passed.</h4></center>";
// }


// tx_ref
require_once "function/payment.php";
$p = new payment;
    if (isset($_GET['transaction_id']) && isset($_GET['tx_ref'])) {
        if($p->update_new_payment(htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_GET['tx_ref']),  $userID)) {
            $id = $ID;
            $d->loadpage("index?payment&action=invoice&id=" . $id);
            exit();
        }else{
            $d->loadpage("index?payment&action=failed");
            exit();
        } }else{
            echo "<center><h4>No transaction ID or ref passed.</h4></center>";
        }
     
?>
<!-- <center><h4>No transaction ID or ref passed.</h4></center> -->

