<?php 
$countries = $d->getall("countries", fetch: "moredetails");
$countries_data = ["type"=>"countries", "data"=>$countries,];