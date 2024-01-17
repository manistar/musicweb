<?php 
    $deposit_form = [
        "ID"=>["input_type"=>"hidden"],
        "userID"=>["input_type"=>"hidden"],
        "amount"=>["input_type"=>"number"],
        "wallet"=>["options"=>$d->get_wallet(),"type"=>"select", "atb"=>"onChange=\"getwalletinfo(this.value)\"",],
        "prove_image"=>["input_type"=>"file","file_name"=>uniqid(""), "global_class"=>"w-100", "path"=>"assets/images/deposit/"],
        "input_data"=>["ID"=>uniqid(), "userID"=>$userID,"prove_image"=>""]
    ];
