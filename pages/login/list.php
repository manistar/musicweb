<?php
require_once "include/auth-ini.php";
?>
<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Login</li>
                </ul>
            </div>


            <div class="col-lg-4 mx-auto">
                <div class="login">
                    <div class>

                        <div class="login__form">
                            <h3>Login</h3>
                            <p>Welcome back!</p>

                            <form action="passer" id="foo" onsubmit="return false">
                                <?php echo $c->create_form($user_validating); ?>

<!-- <input type="email" class="form-control" placeholder="Email">
</div>
<div class="form-group text-right">
<a href="forgot.html">Forgot Password ?</a>
<input type="password" class="form-control" placeholder="Password">
</div> -->



                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                </div>

                                <input type="hidden" name="userLogin" value="">
                                <div id="custommessage"></div>
                                <button type="submit" class="btn btn-block login__btn" value="submit"><i
                                        class="fal fa-sign-in mr-2"></i> Login</button>
                            </form>
                            <p class="login__divider">or</p>
                            <div class="login__social d-flex justify-content-between">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-google"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                            <p class="login__account">
                                Don't have an account? <a href="register.html">Register</a>.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>