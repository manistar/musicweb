<?php
// tx_ref
require_once "function/payment.php";
$p = new payment;
    if (isset($_GET['transaction_id']) && isset($_GET['tx_ref'])) {
        if($p->update_new_payment(htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_GET['tx_ref']),  $userID)) {
            $d->loadpage("index?payment&action=invoice");
            exit();
        }else{
            $d->loadpage("index?payment&action=faild");
            exit();
        }
    }
?>
<center><h4>No transaction ID or ref passed.</h4></center>