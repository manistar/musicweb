<form id="foo" method="POST" onsubmit="return false">
                                <?php $c = new content; $c->createform(["first name"=>"text", "last name"=>"text", "phone number"=>"number", "email"=>"email"], "input"); ?>
                                <input type="hidden" name="create_account" id="create_account">
                                <div id="custommessage"></div>
                                <button class="btn btn-success rounded btn-lg btn-block">Create
                                    Account</button>
                            </form>