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
            <h5>Customer Info</h5>
            <input type="hidden" name="id" id="id" value="<?= $id ?>">
            <p>Full Name: <?= $user['first_name']." ".$user['last_name']; ?></p>
            <p>Phone Number: <?=  $user['phone_number']; ?></p>
           <div class="form-group">
                <select id="payment_plan" name="payment_plan" class="form-control" onchange="showmoreDiv('form-groupContribution_day', this)">
                    <option value="daily">daily</option>
                    <option value="weekly">weekly</option>
                </select>
           </div>
            <?php
             echo "<div id='moreinput' style='display:none!important'> 
             ".
              $c->createform(["Sunday"=>"0", "Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3", "Thursday"=>"4", "Friday"=>"5", "Saturday"=>"6"], "select", "Contribution day")
             ."
             </div>";
            $c->createform(["amount"=>"number", "duration from"=>"date", "duration to"=>"date", "add_thrift"=>"hidden", "interest"=>"text"], "input", "");
            echo "<div id='custommessage'></div>
            <input type='submit' onclick='submitform()' class='btn btn-primary' value='Start Thrift'> </form>";
        }else{
            echo "Customer Not found";
        }
    }else{
        echo "No Customer Selected";
    }
   

?>