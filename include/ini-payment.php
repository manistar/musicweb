<?php
if (isset($_GET['p'])) {
    $variable = htmlspecialchars($_GET['p']);
    switch ($variable) {
        case 'add_card':
            if (isset($_GET['transaction_id'])) {
                $data = $pay->verifypayment(htmlspecialchars($_SESSION['userSession']), htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_SESSION['pendingpayID']));
                if ($data['status'] == "success" && isset($_SESSION['pendingpayID'])) {
                    $updatep = $pay->updatepayment(htmlspecialchars($_SESSION['userSession']), htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_SESSION['pendingpayID']));
                    if ($variable == "add_card") {
                        $insertcard = $u->newcard(htmlspecialchars($_SESSION['userSession']), htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_SESSION['pendingpayID']));
                        if ($insertcard) {
                            $url = "account.php?a=cards";
                            echo "<script language=\"Javascript\" type=\"text/javascript\">
                                window.location=\"$url\";
                                </script>";
                        }
                    }
                }
            }
            $payfor = "card testing";
            $amount = $d->gettrialamount();
            $total = $d->gettrialamount();
            $des = "Payment for atm card testing";
            $status = "pending";
            $options = "card";
            $payforid = $userID;
            $payment_method = $d->getpaymetmethod("flutterwave");
            $date = date("Y-m-d");
            break;

        case 'subscription':
            if (isset($_GET['transaction_id'])) {
                $updatep = $pay->updatepayment(htmlspecialchars($_SESSION['userSession']), htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_SESSION['pendingpayID']));
                $newsub = $u->newsub(htmlspecialchars($_SESSION['userSession']), htmlspecialchars($_GET['transaction_id']), htmlspecialchars($_GET['id']));
                if ($newsub) {
                    // $url = "account.php?a=post";
                    // echo "<script language=\"Javascript\" type=\"text/javascript\">
                    // window.location=\"$url\";
                    // </script>"; 
                }
            }
            $plan = $d->getall("plans", "ID = ?", $data($_GET['id']), fetch: "details");
            if (is_array($plan)) {
                $long = $d->getlong($plan['plan_type']);
                $amount = $d->calculateplan($plan['ID'], $plan['price'], htmlspecialchars($_GET['duration']));
                $total = $amount;
                $payfor = "Plan: " . $plan['name'];
                $des = $plan['plan_type'] . " subscription payment for " . $plan['name'] . " plan. Duration: " . htmlspecialchars($_GET['duration']) . $long;
                $status = "pending";
                $payforid = htmlspecialchars($_GET['id']);
                $payment_method = $d->getpaymetmethod(htmlspecialchars($_GET['paymentmethod']));
                $option = $payment_method;
                $date = date("Y-m-d");
            } else {
                echo "Plan not found";
            }
            break;

        default:
            # invoice code here
            break;
    }
}
