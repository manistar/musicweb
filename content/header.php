<!DOCTYPE html>

<!-- <html class="loading" lang="en" data-textdirection="ltr"> -->



    <?php require_once "content/head.php";
    
    //  if(!$d->verifytoken($adminID, "admin")){
//   session_destroy();
//   header("Location: login.php");
//   $d->loadpage("login.php");
//   exit();
// }

    ?>

    <!-- BEGIN: Body-->

    <body>
        <header class="header">
            <div class="header__content">

                <div class="header__logo">
                    <a href="?p=dashboard.php">
                    
                        <?php 
                        if (is_array($data)) { 
                            echo '<img src="musica/assets/img/small-logo.png" alt>';
                            }?>
                    </a>
                </div>

                <!-- <button onclick="getBrowserTheme()">Get Browser Theme</button> -->
                <form action="" class="header__search" >
                    <input type="text" oninput="search(this.value, 'showresult')"  placeholder="Search here...">
                    <button type="button"><i class="far fa-search"></i></button>
                    <button type="button" class="close"><i class="fal fa-times"></i></button>
                    <div id="showresult"></div>
                </form>

                
                <nav class="header__nav">
           
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="header__nav-drop">
                            <a href="#">Pages</a>
                            <div class="header__drop">
                                <a href="artists.php"> <i class="far fa-music"></i> Artist</a>
                                <a href="event.php"> <i class="far fa-music"></i> Event</a>
                                <a href="release.php"> <i class="far fa-music"></i> Release</a>
                                <a href="product.php"> <i class="far fa-music"></i> Product</a>
                                <a href="news.php"> <i class="far fa-music"></i> News</a>
                                <a href="faq.php"> <i class="far fa-music"></i> Faq</a>
                                <a href="pricing.php"> <i class="far fa-music"></i> Pricing plans</a>
                                <a href="term-condition.php"> <i class="far fa-music"></i> Terms & Conditions</a>
                                <a href="privacy.php"> <i class="far fa-music"></i> Privacy policy</a>
                                <a href="login.php"> <i class="far fa-music"></i> Login</a>
                                <a href="register.php"> <i class="far fa-music"></i> Register</a>
                                <a href="forgot.php"> <i class="far fa-music"></i> Forgot password</a>
                                <a href="404.php"> <i class="far fa-music"></i> 404 Page</a>
                            </div>
                        </li>
                    </ul>

                    <ul>
                        <li>
                            <a href="?p=upload-music" class="btn-upload"> <i class="far fa-cloud-upload"></i> Upload
                                Music</a>
                        </li>
                    </ul>

                </nav>


                <div class="header__actions">

                    <div class="header__action header__action--search">
                        <button class="header__action-btn" type="button"><i class="far fa-search"></i></button>
                    </div>


                    <div class="header__action header__action--note">
                        <span>09</span>
                        <a href="#" class="header__action-btn"><i class="far fa-bell"></i></a>
                        <div class="header__drop">
                            <div class="header__note header__note--succ">
                                <div class="d-flex">
                                    <i class="far fa-check-circle"></i>
                                    <div>
                                        <p><a href="#">You just created a playlist! </a></p>
                                        <span>5 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="header__note header__note--fail">
                                <div class="d-flex">
                                    <i class="far fa-times-circle"></i>
                                    <div>
                                        <p><a href="#">You can't remove the playlist! </a></p>
                                        <span>2 hour ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="header__note header__note--info">
                                <div class="d-flex">
                                    <i class="far fa-exclamation-circle"></i>
                                    <div>
                                        <p><a href="#">Your upload successfully done</a></p>
                                        <span>10 Min ago</span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="header__all">View all <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i></a>
                        </div>
                    </div>

                    <div class="header__action header__action--cart"> 
                        <span id="cat_no"><?= $s->no_products($userID) ?></span>
                        <a class="header__action-btn" href="?p=cart"><i class="far fa-shopping-cart"></i></a>
                        <!-- modal hear but now inside cart, header -->
                    </div>

                                     

   

<?php 
                    if (is_array($data)) { 
                  // if (isset($_SESSION['userSession'])) {
                        echo '<div class="header__action header__action--signin">';
                        echo '<a class="header__action-btn" href="#">';
                        echo '    <a class="header__action-btn" href="#">';
                        echo '        <img src="upload/profile/'. $data['upload_image'] .'" alt>';
                        echo '    </a>';
                        echo '<div class="header__drop">';
                        echo '<a href="#">Welcome '.$data['first_name'].' !</a>';
                            echo '<a href="?p=profile.php"><i class="far fa-user"></i> My Profile</a>';
                            echo '<a href="?p=profile-settings"><i class="fal fa-cog"></i> Profile Settings</a>';
                            echo '<a href="?p=favourites.php"><i class="fal fa-heart"></i> My Favourites</a>';
                            echo '<a href="?p=orders.php"><i class="fal fa-shopping-cart"></i> My Orders</a>';
                            echo '<a href="index?logout"><i class="far fa-lock"></i> Logout</a>';
                            echo $userID;
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div class="header__action header__action--signin">';
                        echo '<a class="header__action-btn" href="#">';
                        echo '    <a class="header__action-btn" href="#">';
                        echo '        <img src="musica/assets/img/avatar2.png" alt>';
                        echo '    </a>';
                        echo '<div class="header__drop">';
                        echo '<a href="#">Please Login to Continue!</a>';
                        echo '<a href="login.php"><i class="far fa-lock"></i>Login</a>';
                        echo '</div>';
                        echo '</div>';
                    }  
                    

                    ?>

                    
                    
            </div>

                    <!-- <div class="header__action header__action--signin">
                        <a class="header__action-btn" href="#">
                            <img src="musica/assets/img/avatar.jpg" alt>
                        </a>
                        <div class="header__drop">
                            <a href="#">Welcome !</a>
                            <a href="?p=profile.php"><i class="far fa-user"></i> My Profile</a>
                            <a href="?p=profile-setting.php"><i class="fal fa-cog"></i> Profile Settings</a>
                            <a href="?p=favourites.php"><i class="fal fa-heart"></i> My Favourites</a>
                            <a href="?p=orders.php"><i class="fal fa-shopping-cart"></i> My Orders</a>
                            <a href="#"><i class="far fa-lock"></i> Logout</a>
                        </div>
                    </div>
                </div> -->


                <button class="header__btn" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>
        </header>

<!-- Side Bar -->
        <div class="sidebar">

            <div class="sidebar__logo">
                <a href="?p=dashboard"><img src="musica/assets/img/logo.png" alt></a>
            </div>


            <ul class="sidebar__nav">
                <li class="sidebar__nav-item">
                    <a href="?p=dashboard" class="sidebar__nav-link sidebar__nav-link--active"> <i
                            class="far fa-home"></i> <span>Home</span></a>
                </li>
                <li class="sidebar__nav-item">
                    <a href="?p=profile" class="sidebar__nav-link"> <i class="far fa-user"></i> <span>My
                            Profile</span></a>
                </li>
                <li class="sidebar__nav-item">
                    <a href="?p=profile-settings" class="sidebar__nav-link"> <i class="far fa-cog"></i> <span>Profile
                            Settings</span></a>
                </li>
                <li class="sidebar__nav-item">
                    <a href="?p=favourites" class="sidebar__nav-link"> <i class="far fa-heart"></i> <span>My
                            Favourites</span></a>
                </li>
                <li class="?p=sidebar__nav-item">
                    <a href="?p=orders" class="sidebar__nav-link"> <i class="far fa-shopping-cart"></i> <span>My
                            Orders</span></a>
                </li>
                <li>
                    <span class="sidebar-title">Music</span>
                </li>
                <li class="sidebar__nav-item">
                    <a href="?p=free-music" class="sidebar__nav-link"> <i class="far fa-headphones"></i> <span>Free
                            Music</span></a>
                </li>
                <li class="sidebar__nav-item">
                    <a href="?p=artists" class="sidebar__nav-link"> <i class="far fa-user-friends"></i>
                        <span>Artists</span></a>
                </li>
                <!-- <li class="sidebar__nav-item">
                    <a href="?p=release" class="sidebar__nav-link"> <i class="far fa-music"></i>
                        <span>Release</span></a>
                </li> -->
                <!-- <li class="sidebar__nav-item">
                    <a href="?p=albums" class="sidebar__nav-link"> <i class="far fa-microphone"></i>
                        <span>Albums</span></a>
                </li> -->
                <li class="sidebar__nav-item">
                    <a href="?p=trending-now" class="sidebar__nav-link"> <i class="far fa-gem"></i> <span>Genres</span></a>
                </li>
                <!-- <li class="sidebar__nav-item">
                    <a href="?p=event" class="sidebar__nav-link"> <i class="far fa-calendar-alt"></i>
                        <span>Events</span></a>
                </li> -->
                <li>
                    <span class="sidebar-title">Others</span>
                </li>
<!-- 
                <li class="sidebar__nav-item">
                    <a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu1" role="button"
                        aria-expanded="false" aria-controls="collapseMenu1"> <i class="far fa-folder-open"></i>
                        <span>All Pages</span> <i class="far fa-angle-down ml-2 mt-1"></i></a>
                    <div class="collapse" id="collapseMenu1">
                        <ul class="sidebar__menu">
                            <li><a href="?p=dashboard.php"> <i class="far fa-music"></i> Dashboard</a></li>
                            <li><a href="?p=profile.php"> <i class="far fa-music"></i> Profile</a></li>
                            <li><a href="?p=profile-settings"> <i class="far fa-music"></i> Profile Setting</a></li>
                            <li><a href="?p=favourites.php"> <i class="far fa-music"></i> Favouites</a></li>
                            <li><a href="?p=orders.php"> <i class="far fa-music"></i> Orders</a></li>
                            <li><a href="?p=playlist.php"> <i class="far fa-music"></i> Playlist</a></li>
                            <li><a href="?p=create-playlist.php"> <i class="far fa-music"></i> Create Playlist</a></li>
                            <li><a href="?p=playlist-single.php"> <i class="far fa-music"></i> Playlist Single</a></li>
                            <li><a href="?p=upload-music"> <i class="far fa-music"></i> Upload Music</a></li>
                            <li><a href="?p=free-music.php"> <i class="far fa-music"></i> Free Music</a></li>
                            <li><a href="?p=artists"> <i class="far fa-music"></i> Artist</a></li>
                            <li><a href="?p=artist-single.php"> <i class="far fa-music"></i> Artist Single</a></li>
                            <li><a href="?p=event.php"> <i class="far fa-music"></i> Event</a></li>
                            <li><a href="?p=event-single.php"> <i class="far fa-music"></i> Event Single</a></li>
                            <li><a href="?p=release.php"> <i class="far fa-music"></i> Release</a></li>
                            <li><a href="?p=release-single.php"> <i class="far fa-music"></i> Release Single</a></li>
                            <li><a href="?p=live.php"> <i class="far fa-music"></i> Live</a></li>
                            <li><a href="?p=albums.php"> <i class="far fa-music"></i> Albums</a></li>
                            <li><a href="?p=genres.php"> <i class="far fa-music"></i> Genres</a></li>
                            <li><a href="?p=product.php"> <i class="far fa-music"></i> Product</a></li>
                            <li><a href="?p=store.php"> <i class="far fa-music"></i> Store</a></li>
                            <li><a href="?p=news.php"> <i class="far fa-music"></i> News</a></li>
                            <li><a href="?p=news-single.php"> <i class="far fa-music"></i> News Single</a></li>
                            <li><a href="?p=cart.php"> <i class="far fa-music"></i> Cart</a></li>
                            <li><a href="?p=about.php"> <i class="far fa-music"></i> About Us</a></li>
                            <li><a href="?p=contact.php"> <i class="far fa-music"></i> Contact Us</a></li>
                            <li><a href="?p=pricing.php"> <i class="far fa-music"></i> Pricing plans</a></li>
                            <li><a href="?p=faq.php"> <i class="far fa-music"></i> Faq</a></li>
                            <li><a href="?p=privacy.php"> <i class="far fa-music"></i> Privacy policy</a></li>
                            <li><a href="?p=term-condition.php"> <i class="far fa-music"></i> Terms & Conditions</a></li>
                            <li><a href="?p=login.php"> <i class="far fa-music"></i> Login</a></li>
                            <li><a href="?p=register.php"> <i class="far fa-music"></i> Register</a></li>
                            <li><a href="?p=forgot.php"> <i class="far fa-music"></i> Forgot password</a></li>
                            <li><a href="?p=404.php"> <i class="far fa-music"></i> 404 Page</a></li>
                        </ul>
                    </div>
                </li> --> 

                <li class="sidebar__nav-item">
                    <a href="?p=store" class="sidebar__nav-link"> <i class="far fa-shopping-cart"></i>
                        <span>Store</span></a>
                </li>
                <!-- <li class="sidebar__nav-item">
                    <a href="news.php" class="sidebar__nav-link"> <i class="far fa-rss"></i> <span>News</span></a>
                </li> -->
                <!-- <li class="sidebar__nav-item">
                    <a href="news-single.php" class="sidebar__nav-link"> <i class="far fa-rss-square"></i> <span>News
                            Single</span></a>
                </li> -->
                <li>
                    <span class="sidebar-title">Playlist</span>
                </li>
                <li class="sidebar__nav-item">
                    <a href="playlist.php" class="sidebar__nav-link"> <i class="far fa-list-ul"></i>
                        <span>Playlist</span></a>
                </li>
                <!-- <li class="sidebar__nav-item">
                    <a href="create-playlist.php" class="sidebar__nav-link"> <i class="far fa-layer-plus"></i>
                        <span>Create Playlist</span></a>
                </li> -->
                <li class="sidebar__nav-item">
                    <a href="index?logout" class="sidebar__nav-link"> <i class="far fa-lock"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>