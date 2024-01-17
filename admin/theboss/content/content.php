<?php
class content extends database
{
    function createform($column, $type, $select = "", $data = "no")
    {
        // create input here 
        if ($select == "") {
            foreach ($column as $key => $value) {
                $name = str_replace(' ', '_', $key);
                if (is_array($value)) {
                    content::createselect($value, $key, $data);
                } else {
                    if ($type == "input") {
                        if ($value != "hidden") {
                            $vkey = $key;
                        } else {
                            $vkey = "";
                        }

                        $dvalue = content::getvalue($name, $data);
                        if (isset($_GET['ref']) && $name == "referral_code") {
                            $dvalue = htmlspecialchars($_GET['ref']);
                        }
                        echo "
                      <div class='form-group'>
                      <label>$vkey</label>
                      <input type='$value' name='$name' id='$name' class='form-control'  placeholder='$key' value='" . $dvalue . "'>
                     </div>
                      ";
                    } elseif ($type == "textarea") {
                        $dvalue = content::getvalue($name, $data);
                        $placeholder = str_replace("_", " ", $name);
                        echo "<div class='form-group wow fadeInUp'>
                        <textarea class='form-control' id='$name' name='$name' placeholder='Enter $placeholder' rows='3' cols='30'>$dvalue</textarea>
                   </div>
                        ";
                    }
                }
            }
        }
 
        // create select input here
        if ($type == "select") {
            content::createselect($column, $select, $data);
        }
    }


    function breakstring($s)
    {
        if ((strpos($s, ":")) !== FALSE) {
            return [strtok($s, ':'), strtok('')];
        }
    }


    function createselect($column, $select, $data)
    {
        $name = str_replace(' ', '_', $select);
        $dvalue = content::getvalue($name, $data);
        echo "
        <div id='form-group$name' class='form-group$name'>
        <label>$select</label>
        <select class='form-control' name='$name' id='$name'>";
        if ($dvalue != "") {
            echo "<option value='$dvalue'>$dvalue</option>";
        }
        foreach ($column as $key => $value) {
            echo "<option value='$value'>$key</option>";
        }
        echo " </select>
       </div>
    ";
    }

    function selectf($name, $what,  $data)
    {
        echo "
       <label>$key</label>
       <select class='form-control' name='plan' id=''>";

        if (isset($_POST["$name"])) {
            $id = htmlspecialchars($_POST["$name"]);
            $sigledata = $d->fastgetwhere("$what", "ID = ?", $id, "details");
            $name = $sigledata['name'];
            echo "<option value='$id'>$name</option>";
        }
        foreach ($data as $row) {
            $name = $row['name'];
            $id = $row['ID'];
            echo "<option value='$id'>$name</option>";
        }
        echo "</select>";
    }

    function getvalue($name, $data)
    {
        if (isset($_POST["$name"])) {
            return $dvalue = $_POST["$name"];
        } elseif ($data != "no") {
            return $dvalue = $data["$name"];
        } else {
            return $dvalue = "";
        }
    }

    function subcat($data, $type = "m")
    {
    }


    function getproduct($data, $class = "col-6 col-md-3 mb-3")
    {
        $u = new fontusers;
        $d = new database;
        $p = new products;
?>

        <div class="<?= $class ?>">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                <div class="list-card-image">
                    <a href="product.php?id=<?= $data['ID']; ?>" class="text-dark">
                        <div class="member-plan position-absolute"><span class="badge m-3 badge-success"><?= $u->getuser($data['userID'], "first_name"); ?></span></div>
                        <div class="p-3">
                            <!-- <img src="upload/products/"
                                                            class="img-fluid item-img w-100 mb-3"> -->
                            <div style="width:237px; height:200px; background-size:contain; background-position:center; background-image: url('../upload/products/<?= $p->getproductimage($data['ID']); ?>')"></div>
                            <h6><?= $data['product_name']; ?></h6>
                            <div class="d-flex align-items-center">
                                <h6 class="price m-0 text-success"><?= currency["symbol"]; ?> <?= number_format($data['price']); ?></h6>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <?php }

    function userstable($data)
    {
        $d = new database;
        if ($data != "") {
            foreach ($data as $row) { ?>
                <tr data-widget="expandable-table" aria-expanded="false">

                    <th>
                        <b id="success<?= $row['ID'] ?>" style="display:<?php if ($row['status'] == 1) {
                                                                            echo "block";
                                                                        } else {
                                                                            echo "none";
                                                                        } ?>; color:green">Active</b>
                        <b id="danger<?= $row['ID'] ?>" style="display:<?php if ($row['status'] == 1) {
                                                                            echo "none";
                                                                        } else {
                                                                            echo "block";
                                                                        } ?>; color:red">Deactivated<b>
                    </th>
                    <td><?= $row['ID']; ?></td>
                    <td><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                    <td><?= $row['phone_number'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['street'] . ' ' . $d->getaddress(["cities" => $row['city'], "states" => $row['state'], "countries" => $row['country']]); ?></td>
                    <!-- <th><?= $row['status']; ?></th> -->
                    <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" id="" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <!-- <a class="dropdown-item" href="staff.php">Assign to staff</a> -->
                                <!-- <a class="dropdown-item" href="#">Loan</a> -->
                                <a class="dropdown-item" href="users.php?a=edit&id=<?php echo $row['ID']; ?>">Edit Account</a>
                                <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="users/status" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Active/Deactive Account</button>
                                <a class="dropdown-item" href="users.php?a=post&id=<?php echo $row['ID']; ?>">Post ADS</a>

                                <!-- <a class="dropdown-item" href="#"></a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="users.php?a=view&id=<?= $row['ID'] ?>">View Account</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php  }
        } else {
            echo "User not found";
        }
    }


    function getfollowdetails($id)
    {
        $d = new database;
        $data = $d->fastgetwhere("users", "ID = ?", $id, "details");
        if (is_array($data)) {
            echo '<div class="user-block col-12 card p-1" id="target">
            <img class="img-circle img-bordered-sm" src="../upload/profile/' . $data['image'] . '" alt="' . $data['first_name'] . ' profile picture">
            <span class="username">
                <a class="targetname" href="users.php?a=view&id=' . $data['ID'] . '">' . $data['first_name'] . ' ' . $data['last_name'] . '</a>
            </span>
            <span class="description">Member since: ' . date("F d, Y", strtotime($data['date'])) . '</span>
        </div>';
        }
    }

    function planstable($data)
    {
        $d = new database;
        if ($data != "") {
            foreach ($data as $row) {
            ?>
                <tr id="row<?= $row['ID']; ?>" data-widget="expandable-table" aria-expanded="false">
                    <td><?php if ($row['status'] == "1") {
                            echo "Active";
                        } else {
                            echo "Not Active";
                        } ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $d->getadminname($row['added_by']); ?></td>
                    <td><?php echo currency['symbol'] . ' ' . number_format($row['price']); ?></td>
                    <td><?= $row['plan_type']; ?></td>
                    <td><?= $row['free_trial']; ?></td>
                    <td><?= $row['duration']; ?></td>
                    <td><?= $row['no_of_ads']; ?></td>
                    <td><?= $row['no_of_image_per_ads']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" id="" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <button class="dropdown-item" id="e<?= $row['ID'] ?>" data-url="plans/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $row['name'] ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit <?= $row['name']; ?> Plan</button>
                                <!-- <button class="dropdown-item" id="s<?= $row['ID'] ?>" data-url="plans/status" data-id="<?= $row['ID']; ?>" data-title="Update Plan Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Update status</button> -->
                                <!-- <button class="dropdown-item" id="r<?= $row['ID'] ?>" data-url="plans/status" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Remove <?= $row['name'] ?></button> -->
                                <!-- <a class="dropdown-item" href="#"></a> -->
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" id="u<?= $row['ID'] ?>" data-url="plans/users" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Users Sub to <?= $row['name'] ?></button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }
        }
    }

    function subtable($data)
    {
        $d = new database;
        if (!empty($data)) {
            foreach ($data as $row) { ?>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><?= date("F d, Y", strtotime($row['date'])); ?></td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" value="1" name="status" class="custom-control-input" id="<?= $row['ID']; ?>" onclick="updatestaus(this.id, 'subscriptions')" <?= $d->getstatus($row['status'], "check"); ?> />
                            <label class="custom-control-label" for="<?= $row['ID']; ?>"></label>
                        </div>
                    </td>
                    <td><?php echo $id = $row['ID']; ?></td>
                    <td><a href="users.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td>
                    <td><?php echo $d->fastgetwhere("plans", "ID = ?", $row['planID'], "details")['name']; ?></td>
                    <td><?php echo $row['plan_type'] ?></td>
                    <td><?php echo  date("F d, Y", strtotime($row['start_date']));  ?></td>
                    <td><?php echo date("F d, Y", strtotime($row['end_date'])); ?></td>
                </tr>
            <?php    }
        }
    }

    function adstable($row)
    {
        $d = new database;
        if (is_array($row)) { ?>
            <tr id="row<?= $row['ID']; ?>" data-widget="expandable-table" aria-expanded="false">
                <td>
                    <?php if ($row['status'] == "1") { ?>
                        <span class="badge bg-success float-right"> <span style="display:none">status:</span>Active</span>
                    <?php } else if ($row['status'] == "2") { ?>
                        <span class="badge bg-primary float-right"> <span style="display:none">status:</span>Soldout</span>
                    <?php } else if ($row['status'] == "3") { ?>
                        <span class="badge bg-dark float-right"> <span style="display:none">status:</span>Draft</span>
                    <?php } else { ?>
                        <span class="badge bg-danger float-right"> <span style="display:none">status:</span>Blocked</span>
                    <?php } ?>
                </td>
                <td><?php echo $id = $row['ID']; ?></td>
                <td><a href="users.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td>
                <td><?php echo $row['product_name'] ?></td>
                <td><?php echo $d->categoryname($row['category']); ?></td>
                <td><?php echo $d->categoryname($row['category'], "sub_categories"); ?></td>
                <td><?php echo $row['tags'] ?></td>
                <td><?php echo $row['product_condition']; ?></td>
                <td><?php echo number_format($row['price']); ?></td>
                <td><?php echo number_format($row['last_price']); ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" id="" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <!-- <a class="dropdown-item" href="staff.php">Assign to staff</a> -->
                            <!-- <a class="dropdown-item" href="#">Loan</a> -->
                            <!-- <a class="dropdown-item" href="ads.php?a=edit&id=<?php echo $row['ID']; ?>"></a> -->
                            <button class="dropdown-item" id="e<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $name ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads</button>
                            <a class="dropdown-item" href="users.php?a=post&upload=<?= $row['ID'] ?>&id=<?= $row['userID'] ?>">Manage Image</a>
                            <button class="dropdown-item" id="s<?= $row['ID'] ?>" data-url="ads/status" data-id="<?= $row['ID']; ?>" data-title="Update Ads Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Update status</button>
                            <!-- <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="users/status" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Remove</button> -->
                            <!-- <a class="dropdown-item" href="#"></a> -->
                            <div class="dropdown-divider"></div>
                            <!-- <a class="dropdown-item" href="users.php?a=view&id=<?= $row['ID'] ?>">View Ads</a> -->
                        </div>
                    </div>
                </td>
            </tr>
            <?php  }
    }

    function loantable($data)
    {
        $d = new database;
        if (!empty($data)) {
            foreach ($data as $row) { ?>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><?php echo $id = $row['ID']; ?></td>
                    <td><a href="customer.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td>
                    <td><?php echo $d->getadminname($row['created_by']) ?></td>
                    <td><?php echo $amount = $row['amount_applied_for'] ?></td>
                    <td><?php echo $row['interest_rate']; ?></td>
                    <td><?php echo $row['purpose'] ?></td>
                    <td><?php echo $row['loantype'] ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                    <td>
                        <a data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Pay</a>
                        <a href="#" class="btn btn-primary"><span class="fa fa-eye"></span></a>
                    </td>
                </tr>
<?php    }
        }
    }
}
?>