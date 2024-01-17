<?php
// tx_ref
    if (isset($_GET['transaction_id']) && isset($_GET['tx_ref'])) {
        if($p->update_new_payment(htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_GET['tx_ref']),  $userID)) {
            $d->loadpage("index?payment&action=success");
            exit();
        }else{
            $d->loadpage("index?payment&action=success");
            exit();
        }
    }
?>
<center><h4>No transaction ID or ref passed.</h4></center>