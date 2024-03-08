<?php
$settings = $d->getall("settings", fetch: "moredetails");
?>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-2">
        <!-- START ACCORDION & CAROUSEL-->
        <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
        <!-- /.row -->
        <div class="row">
                <div class="card col-md-7 p-3 ml-2">
                    <h4>Settings</h4>
                    <hr>
                    <?php
                    foreach ($settings as $row) {
                        switch ($row['meta_name']) {
                            case 'flutterwave_public_key': ?>
                                <label for="">Flutterwave Public Key</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="flutterwave_public_key" value="<?= $row['meta_value']; ?>" class="form-control" placeholder="Paste key here">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary btn" onclick="updatestaus('flutterwave_public_key', 'settings')">Save</i></span>
                                    </div>
                                </div><hr>
                            <?php break;
                            case 'flutterwave_secret_key': ?>
                                <label for="">Flutterwave Secret Key</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="flutterwave_secret_key" value="<?= $row['meta_value']; ?>" class="form-control" placeholder="Paste key here">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary btn" onclick="updatestaus('flutterwave_secret_key', 'settings')">Save</i></span>
                                    </div>
                                </div>
                            <?php break;

                            case 'free_trial_duration': ?>
                                <label for="">Free trial duration</label>
                                <small>How many days do you want plans available for free trial to last? </small> <br>
                                <div class="input-group mb-3">
                                    <input type="text" id="free_trial_duration" value="<?= $row['meta_value']; ?>" class="form-control" placeholder="Enter days">
                                    <div class="input-group-append">
                                    <span class="input-group-text">Days</i></span>
                                        <span class="input-group-text bg-primary btn" onclick="updatestaus('free_trial_duration', 'settings')">Save</i></span>
                                    </div>
                                </div><hr>
                            <?php break;
                            case 'free_for_all': ?>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" value="1" name="status" class="custom-control-input" id="free_for_all" onclick="updatestaus(this.id, 'settings')" <?php if (free_for_all == 1) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?>>
                                    <label class="custom-control-label" for="free_for_all">Turn on/off website Pricing</label> <br>
                                    <small>If you turn off this button all website features will be free for all registered users.</small>
                                </div>
                                <hr>
                            <?php
                                break;
                            case 'free_trial': ?>
                                <label for="">ATM Card Test</label>
                                <small>How much should the system charge for ATM card test? <br> Reason: This is to verify the card is active.</small> <br>
                                <div class="input-group mb-3">
                                    <input type="text" id="free_trial" value="<?= $row['meta_value']; ?>" class="form-control" placeholder="Amount">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><?= currency['symbol'] ?></i></span>
                                        <span class="input-group-text bg-primary btn" onclick="updatestaus('free_trial', 'settings')">Save</i></span>
                                    </div>
                                </div><hr>
                    <?php
                                break;
                                case 'default_currency': 
                                $currencies = $d->getall("currencies", "country", fetch: "");
                                ?>
                                    <label for="">System Default Currency</label>
                                    <small>This currency will be use across the system</small> <br>
                                    <div class="input-group mb-3">
                                        <select name="default_currency" id="default_currency" class="form-control">
                                                <option value="<?= currency['id'] ?>"><?= currency['country'].': '.currency['currency'].'('.currency['symbol'].')' ?></option>
                                                <?php foreach($currencies as $row){ ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['country'].': '.$row['currency'].'('.$row['symbol'].')' ?></option>

                                              <?php  } ?>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-primary btn" onclick="updatestaus('default_currency', 'settings')">Save</i></span>
                                        </div>
                                    </div>
                        <?php
                            default:
                                # code...
                                break;
                        }
                    }
                    ?>
                  
            </div>
            <div class="col-md-4">
                        <?php require "content/content/logo.php"; ?>

                        <div class="card p-3">
                            <label for="live_chat_widget">Live Chat Widget</label>
                            <small>You don't know where to get your live chat widget? <a target="_BLANK" href="https://www.tawk.to/">Click Here</a></small>
                            <textarea name="" id="live_chat_widget" class="form-control" cols="20" rows="10" placeholder="Paste your Live chat widget script here"></textarea> <br>
                            <button class="btn btn-dark" onclick="updatestaus('live_chat_widget', 'settings')">Save Info</button>
                        </div>
                </div>
        </div>
            <!-- /.row -->
    </section>