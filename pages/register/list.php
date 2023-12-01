<?php require_once "include/auth-ini.php"; ?>
<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Register</li>
                </ul>
            </div>


            <div class="col-lg-4 mx-auto">
                <div class="login">
                    <div class>

                        <div class="login__form">
                            <h3>Register</h3>
                            <p>Create Your Account</p>
                            <form action="passer" id="foo" onsubmit="return false">
                                <?php echo $c->create_form($user_registration); ?>
    
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember">I agree with this <a
                                            href="#">terms & conditions</a>.</label>
                                </div>
                                <input type="hidden" name="userRegister" value="">
                                <div id="custommessage"></div>
                                <button type="submit" class="btn btn-block login__btn" value="submit"><i class="fal fa-user mr-2"></i>
                                    Register</button>
                            </form>
                            <p class="login__account">
                                Already have an account? <a href="?p=login">Login</a>.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>