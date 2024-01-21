<?php
    if(isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id']);
        if($u->basicuserstatus($id)){
            $user = $d->fastgetwhere("users", "ID = ?", $id, "details"); ?>
            <p>If you deactive this account: <br> <?= $user['first_name'] ?> will not have access to this account and all <?= $user['first_name']; ?> ads will not be visible on your website.</p>
           <label for="why">Tell <?= $user['first_name'] ?> why you deactivate his/her account. </label> <br>
            <small class="p-0 m-0">You can leave it empty if you don't have a reason</small>
            <textarea name="why_block" class="form-control" id="why" cols="10" rows="3" placeholder="Why are you deactivating this account?"></textarea>
            <input type="hidden" name="userID" value="<?= $id ?>">
            <input type="hidden" name="deactivate">
            <br>
            <div id="custommessage"></div>
            <button type="submit" class="btn btn-danger"> Deactivate</button>
            <?php 
        }else{
            $user = $d->fastgetwhere("users", "ID = ?", $id, "details"); ?>
            <p>Are you sure you want to activate <?= $user['first_name'] ?>'s account now?</p>
            <input type="hidden" name="userID" value="<?= $id ?>">
            <input type="hidden" name="activate">
            <br>
            <div id="custommessage"></div>
            <button type="submit" class="btn btn-success"> Yes Activate</button>  
        <?php  //echo  $u->activateuser($id);
        }
    }
?>