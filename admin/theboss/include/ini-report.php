<?php
    
        //date("Y-m-d")." 12:00:00"; 
        if(isset($_POST['report']) && !empty($_POST['datefrom']) && !empty($_POST['dateto'])){
            $datefrom =  date("Y-m-d", strtotime($_POST['datefrom']))." 12:00:00"; 
            $dateto = date("Y-m-d", strtotime($_POST['dateto']))." 12:00:00"; 
        }else{
            $datefrom =  ""; 
            $dateto = date("Y-m-d h:i:s"); // 2021-07-05 12:31:48 
        }
         


        //  $staffid = ;
       // $loans = $database->multiplegetwhere($what="loans", $where="date >= ? and date <= ?", $data, $status=""); 
        $customers = $cu->getadmincustomers($d->userID(), "customers", $datefrom, $dateto);
        $staffs = staffs::getadminstaffs($d->userID(), $datefrom, $dateto);   
        $thrift = $cu->fetchadminthriftaccount("details", $datefrom, $dateto);    
        $cooperative = $cu->fetchadmincooperativeaccount("details",  $datefrom, $dateto);
        if($user['type'] == "admin"){
            $tloan = $d->multiplegetwhere("thriftloan", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");
            $cloan = $d->multiplegetwhere("loans", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");
            $withdraw = $d->multiplegetwhere("withdraw", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");    
            $payin = $d->multiplegetwhere("tasks", "status = ? and date >= ? and date <= ?", ["1", $datefrom, $dateto], "moredetails");    
            
            $totalloan = number_format($d->total($cloan) + $d->total($tloan));
            $totalwithdraw = number_format($d->total($withdraw));
            $totalpayin = number_format($d->total($payin));

            $tloan = $d->multiplegetwhere("thriftloan", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");
            $cloan = $d->multiplegetwhere("loans", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");
            $withdraw = $d->multiplegetwhere("withdraw", "date >= ? and date <= ?", [$datefrom, $dateto], "moredetails");    
       
        }else{
            $tloan = $d->multiplegetwhere("thriftloan", "added_by = ? and date >= ? and date <= ?", [$d->userID(), $datefrom, $dateto], "moredetails");
            $cloan = $d->multiplegetwhere("loans", "created_by = ? and date >= ? and date <= ?", [$d->userID(), $datefrom, $dateto], "moredetails");
            $withdraw = $d->multiplegetwhere("withdraw", "withby = ? and date >= ? and date <= ?", [$d->userID(), $datefrom, $dateto], "moredetails");
            $payin = $d->multiplegetwhere("tasks", "pay_in_by = ? and status = ? and date >= ? and date <= ?", [$d->userID(), "1", $datefrom, $dateto], "moredetails");    
            
            $totalloan = number_format($d->total($cloan) + $d->total($tloan));
            $totalwithdraw = number_format($d->total($withdraw));
            $totalpayin = number_format($d->total($payin));

            $tloan = $d->multiplegetwhere("thriftloan", "added_by = ? and date >= ? and date <= ?", [$d->userID(), $datefrom, $dateto], "moredetails");
            $cloan = $d->multiplegetwhere("loans", "created_by = ? and date >= ? and date <= ?", [$d->userID(), $datefrom, $dateto], "moredetails");
            $withdraw = $d->multiplegetwhere("withdraw", "withby = ? and date >= ? and date <= ?", [$d->userID(), $datefrom, $dateto], "moredetails");

        }
?>