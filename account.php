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

<section class="">
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
                                Already have an account? <a href="login">Login</a>.
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