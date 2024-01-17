    <?php 
    if(isset($_GET['datefrom']) && isset($_GET['dateto']) && !empty($_GET['datefrom']) && !empty($_GET['dateto'])){
        $datefrom =  date("Y-m-d", strtotime($_POST['datefrom']))." 12:00:00"; 
        $dateto = date("Y-m-d", strtotime($_POST['dateto']))." 12:00:00"; 
    }else{
        $datefrom = "";
        $dateto = $dateto = date("Y-m-d h:i:s");
    }
    // Get admin Info
    $user = $d->fastgetwhere("admins", "ID = ?", $userID, "details"); 

    // Total values
    $totals = ["users", "products", "admins"];
    foreach ($totals as $key => $value) {
        ${"T".$value} = $d->multiplegetwhere("$value", "date >= ? and date <= ?", [$datefrom, $dateto], "");
    }

    // charts info 
    $Tsucessp =  $d->multiplegetwhere("payment", "date >= ? and date <= ? and status = ?", [$datefrom, $dateto, "success"], "");
    $Terrorp =  $d->multiplegetwhere("payment", "date >= ? and date <= ? and status != ?", [$datefrom, $dateto, "success"], "");
    $activeADS = $d->fastgetwhere("products", "status = ?", "1", "");
    $soldoutADS = $d->fastgetwhere("products", "status = ?", "2", "");
    $draftADS = $d->fastgetwhere("products", "status = ?", "3", "");
    $blockedADS = $d->fastgetwhere("products", "status = ?", "0", "");


    // recent tabs
    $rpayment = $d->multiplegetwhere("payment", "transaction_id != ? and status != ? order by date DESC LIMIT 7", ["",""], "moredetails");
    $rads = $d->fastget("products", "date DESC", "LIMIT 8");
    $rusers = $d->fastget("users", "date DESC", "LIMIT 8");

    
