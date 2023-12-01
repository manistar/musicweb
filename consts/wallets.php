<?php 
if(!isset($data)) {
    $data = [];
}
    $wallet_from = [
        "ID"=>["input_type"=>"hidden"],
        "userID"=>["input_type"=>"hidden"],
        "coin_name"=>["unique"=>"userID", "id"=>"select2", "placeholder"=>"Select Coin", "options"=>$d->coins_options(), "type"=>"select"],
        "wallet_address"=>[],
        "wallet_network"=>[],
        "status"=>["options"=>["active"=>"Active", "disable"=>"Disable"], "type"=>"select"],
        "input_data"=>$data,
    ];

    
    $coin_form = [
        "ID"=>["input_type"=>'number'],
        "coinID_null"=>[], 
        "name"=>[], 
        "short_name"=>[],
    ];
    // $d->create_table("coins", $coin_form);
    // $d->autogenerate();