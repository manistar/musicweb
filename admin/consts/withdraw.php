<?php 
    $withdraw_form = [
        "ID"=>["input_type"=>"hidden"],
        "userID"=>["input_type"=>"hidden"],
        "amount"=>["input_type"=>"number"],
        "wallet"=>["options"=>$d->get_wallet($userID),"type"=>"select", "atb"=>"onChange=\"getwalletinfo(this.value)\"",],
        "input_data"=>["ID"=>uniqid(), "userID"=>$userID,"prove_image"=>""]
    ];
// $d->create_table("withdraw", $withdraw_form);