<?php require_once "include/auth-ini.php"; ?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from themes.themewild.com/musica/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 21:13:42 GMT -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content>
        <meta name="keywords" content>
        <title>Musica – Music streaming & Record HTML5 Template</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">

        <link rel="stylesheet" href="musica/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="musica/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="musica/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="musica/assets/css/select2.min.css">
        <link rel="stylesheet" href="musica/assets/css/fontawesome.min.css">
        <link rel="stylesheet" href="musica/assets/css/slider-radio.css">
        <link rel="stylesheet" href="musica/assets/css/plyr.css">
        <link rel="stylesheet" href="musica/assets/css/style.css">
    </head>

    <body>
        <!--  -->
        <div class="preloader">
            <div id="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>




        <!--  -->
        <section class="">
            <div class="container-fluid">
                <div class="row row--grid">

                    <div class="col-lg-4 mt-5 mx-auto">
                        <div class="login">
                            <div class="">

                                <div class="login__form">
                                    <h3>Login</h3>
                                    <p>Welcome back!</p>
                                    <form action="passer" id="foo" onsubmit="return false">
                                        <?php echo $c->create_form($user_validating); ?>
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
                                        Don't have an account? <a href="account">Register</a>.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Search JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/my.js"></script>
        <!-- Search JS End -->
       
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="musica/assets/js/bootstrap.bundle.min.js"></script>
        <script src="musica/assets/js/owl.carousel.min.js"></script>
        <script src="musica/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="musica/assets/js/smooth-scrollbar.js"></script>
        <script src="musica/assets/js/select2.min.js"></script>
        <script src="musica/assets/js/slider-radio.js"></script>
        <script src="musica/assets/js/jquery.inputmask.min.js"></script>
        <script src="musica/assets/js/plyr.min.js"></script>
        <script src="musica/assets/js/main.js"></script>
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
        <!-- <script src="js/my.js"></script> -->
    </body>

    <!-- Mirrored from themes.themewild.com/musica/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 21:13:42 GMT -->

</html>