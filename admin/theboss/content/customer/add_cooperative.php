<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);
        $user = $d->fastgetwhere("customers", "ID = ?", $id, "details");
        if(is_array($user)){
            echo "<form id='foo' method='POST'>";
            ?>
            <style>
                *{
                    margin:0;
                }
                .form-groupContribution_day{
                    display:none;
                }
            </style>
            <h5>Open Co-operative Account for:</h5>
            <input type="hidden" name="id" id="id" value="<?= $id ?>">
            <p class="name">Full Name: <?= $user['first_name']." ".$user['last_name']; ?></p>
            <p>Phone Number: <?=  $user['phone_number']; ?></p>
           <?php
                $c->createform(["amount"=>"number", "interest"=>"text","open_cooperative"=>"hidden"], "input", "");
                echo "<div id='custommessage'></div>
                <input type='submit' onclick='submitform()' class='btn btn-primary' value='Open Account'> </form>";
           ?>
           </div>

           <?php

}else{
    echo "Customer Not found";
}
}else{
echo "No Customer Selected";
}


?>