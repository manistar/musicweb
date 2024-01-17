<form action="" id="foo">
<?php
    $c->createform(["name"=>"text", "price"=>"number", "plan type"=>["monthly"=>"monthly", "annual"=>"annual"], "free trial"=>["yes"=>"yes", "no"=>"no"], "duration"=>"numb er"], "input");
?>
<hr>
<small>Enter number of ads and images that can be posted by users subscribed to this plan. <b style="color:red"> leave it empty if unlimited</b></small>
<?php  $c->createform(["no of ads"=>"number"], "input"); ?>
<?php  $c->createform(["no of image per ads"=>"number"], "input"); ?>
<div id="custommessage"></div>
<input type="hidden" name="create_plan">
<input type="submit" value="Create plan" class="btn btn-primary">
</form>