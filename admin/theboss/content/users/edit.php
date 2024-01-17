<?php 
    if(!$user && isset($_POST['id'])){
        if($d->verifyassign(htmlspecialchars($_SESSION['adminSession']), $userid = htmlspecialchars($_POST['id']))){
            $user = $d->fastgetwhere("users", "ID = ?", $userid, "details");
            $userid = $user['ID'];  
        }
    }
?>
<h4 class="mb-4 profile-title">My account</h4>
<div id="edit_profile">
    <div class="p-0">
        <form id="foo" method="POST" onsubmit="return false">

            <?php $c->createform(["first name" => "text", "last name" => "text", "phone number" => "number", "email" => "email"], "input", "", $user); ?>
            <input type="hidden" name="updateprofile">
            <div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                <label class="custom-control-label w-100" for="customRadioInline1">
                    <div>
                        <div class="p-3 bg-white rounded shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                                <p class="mb-0 h6">Your Address</p>
                                <p class="mb-0 badge badge-success ml-auto">Default</p>
                            </div>
                            <p class="small text-muted m-0" id="full-address"><?php echo $user['street'] . ' ' . $d->getaddress(["cities" => $user['city'], "states" => $user['state'], "countries" => $user['country']]); ?></p>
                            <!-- <p class="small text-muted m-0"></p> -->
                            <p class="pt-2 m-0 text-right"><span class="small"><a href="#" data-toggle="modal" data-target="#exampleModal" class="text-decoration-none text-success"><i class="icofont-edit"></i> Edit</a></span>
                                <span class="small ml-3"><a href="#" data-toggle="modal" data-target="#Delete" class="text-decoration-none text-danger"><i class="icofont-trash"></i> Delete</a></span>
                            </p>
                        </div>
                    </div>
                </label>
            </div>

            <div id="custommessage"></div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-block btn-lg">Save Changes</button>
            </div>
        </form>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label class="form-label">Country</label>
                                <div class="input-group form-inline">
                                    <!-- <input placeholder="D" type="text" class="form-control"> -->
                                    <select class="form-control custom-select" name="country" id="country" data-live-search="true">
                                    </select>
                                    <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-pin"></i></button></div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group"><label class="form-label">State</label>
                                <select class="form-control" name="state" id="state" data-live-search="true">
                                    <?php if (!empty($user['state'])) {
                                        echo "<option value='" . $user['state'] . "'>" . $u->getaddress($user['state'], "states") . "</option>";
                                    } else {
                                        echo '<option value="">Select state</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group"><label class="form-label">City </label>
                                <select class="form-control" name="city" id="city" data-live-search="true">
                                    <?php if (!empty($user['city'])) {
                                        echo "<option value='" . $user['city'] . "'>" . $u->getaddress($user['city'], "cities") . "</option>";
                                    } else {
                                        echo '<option value="">Select city</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12 form-group"><label class="form-label">Street Address </label>
                                <input class="form-control" name="street" id="street" data-live-search="true" placholder="Street Address" value="<?= $user['street'] ?>">
                            </div>
                            <input type="hidden" name="updateaddress" id="updateaddress" value="">
                            <div id="addresscustommessage"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <button type="button" onclick="saveaddress('<?= $user['ID']; ?>')" class="btn btn-success btn-lg btn-block">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php // require_once "content/footer.php"; 
    ?>