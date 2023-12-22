<div class="col-lg-12 p-4 bg-white rounded shadow-sm">
                    <div class="osahan-my_address">
                    <div class="d-flex align-items-center mb-2">
                                <h5 class="m-0">Your Card(s)</h5>
                                <a href="payment.php?a=add_card" class="ml-auto text-success btn btn-success" style="color:white!important">New Card</a>
                            </div>
                        <?php 
                        if($cards != ""){
                        foreach($cards as $row){ ?>
                        <div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio" id="<?= $row['ID'] ?>">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label w-100" for="customRadioInline1">
                                <div>
                                    <div class="p-3 bg-white rounded shadow-sm w-100">
                                        <div class="d-flex align-items-center mb-2">
                                            <p class="mb-0 h6"> <?= $row['first_6digits']; ?> ****** <?= $row['last_4digits']; ?></p>
                                            <!-- <p class="mb-0 badge badge-success ml-auto">Default</p> -->
                                        </div>
                                        <p class="small text-muted m-0"><?= $row['issuer'] ?> - <?= $row['country'] ?></p>
                                        <p class="small text-muted m-0"> <i class="fa fa-credit-card text-success"></i> <b><?= $row['type'] ?></b></p>
                                        <p class="pt-2 m-0 text-right">
                                        <?php if(isset($_GET['id'])){ ?>    
                                        <span onclick="activeplan('<?= htmlspecialchars($_GET['id']) ?>', 'free_trial')" class="small"><a href="#"
                                                    data-toggle="modal" data-target="#loadmessage"
                                                    class="text-decoration-none text-success"><i
                                                        class="icofont-check"></i> use card</a></span>
                                        <?php } ?>
                                    <button onclick="removethis('<?= $row['ID'] ?>', 'card')" class="text-decoration-none btn btn-default text-danger"><i class="icofont-trash"></i> Remove</button>
                                        </p>
                                        <div id="message<?= $row['ID'] ?>"></div>
                                    </div>
                                </div>
                            </label>
                        
                        
                        
                        </div>
                        <?php } }else{ ?>
                            <div class="my-5 py-5 px-3 text-center">
                                        <h1 class="fa fa-credit-card text-danger" style="font-size:50px"></h1>
                                        <h4>No card added</h4>
                                        <div class="p-0">
                                            <p class="text-muted">You don't have any card added yet</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <form>
                                                <a href="payment.php?a=add_card"
                                                    class="btn btn-success mt-3 btn-block">Add a card now</a>
                                                    <hr>
                                                    <b>Note: we will charge your card <?= currency['symbol'] ?> <?php echo $d->gettrialamount(); ?> to confirm your card is active. 
                                                    <br> You can remove card added anytime.
                                                </b>
                                            </form>
                                        </div>
                                    </div>
                            <?php } ?>
                    </div>
                </div>
     