<input class="form-control" type="search" value="" placeholder="Search" onkeyup="Searchdiv()" id="searchdiv" aria-label="Search"> <hr>
<?php 
    if(isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id']);
        $follow = $d->fastgetwhere("followers", "userID = ? ORDER BY date ASC", $id, "moredetails");
        if($follow != ""){
            echo "<div class='overflow'>";
            foreach ($follow as $row) {
              $c->getfollowdetails($row['followID']);
            }
            echo "</div>";
        }else{
            echo "<center><p>No one is following this user</p></center>";
        }
    }
?>