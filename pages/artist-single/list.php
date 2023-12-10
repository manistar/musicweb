<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Artist Single</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Artist Single</h2>
                </div>

                <div class="news__single news__single--page">
                    <div class="news__single__content">
                        <div class="news__single__artist">
                            <img src="upload/profile/<?=$data["upload_image"];?>" alt>
                            <div>
                                <h1><?=$data["first_name"].' '.$data["last_name"];?></h1>
                                <span><?=$data["profession"];?></span>
                                <p><?=$data["bio"];?> </p>
                                <ul>
                                    <li>Music: <b>100</b></li>
                                    <li>Album: <b>50</b></li>
                                    <li>Realease: <b>100</b></li>
                                    <li>New: <b>10</b></li>
                                    <li>Videos: <b>20</b></li>
                                </ul>
                            </div>
                        </div>

                        <div class="share">
                            <a href="#" class="share__link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="share__link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="share__link"><i class="fab fa-vimeo-v"></i></a>
                            <a href="#" class="share__link"><i class="fab fa-vk"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="col-12">

        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Music videos</h2>
                </div>
            </div>

            <div class="col-12">
                <div class="main__carousel-wrap">
                    <div class="main__carousel main__carousel--live owl-carousel" id="live">

                        <!-- foreach here -->
                        <?php  
                        if ($artist_single->rowCount() > 0) {
                            foreach ($artist_single as $row) {
                            ?>

                            <div class="live">
                            <a href="<?=$row["youtube"];?>" class="live__cover open-video">
                                <img src="upload/live/<?=$row["video_image"];?>" alt>
                                <i class="far fa-play"></i>
                            </a>
                            <h3 class="live__title"><a href="<?=$row["youtube"];?>"
                                    class="open-video"><?=$row["video_title"];?></a></h3>
                        </div>
                            <?php
                                }
                            } else {
                                echo "No data found";
                            }
                        ?> 
                       
                    </div>
                    <button class="main__nav main__nav--prev" data-nav="#live" type="button"> <i
                            class="fal fa-long-arrow-alt-left fa-lg mr-2"></i> </button>
                    <button class="main__nav main__nav--next" data-nav="#live" type="button"> <i
                            class="fal fa-long-arrow-alt-right fa-lg"></i> </button>
                </div>
            </div>
        </section>


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Releases</h2>
                </div>
            </div>

            <!--  -->
            <?php  
                        if ($single_release->rowCount() > 0) {
                            foreach ($single_release as $row) {
                            ?>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="album">
                    <div class="album__cover">
                        <img src="upload/<?=$row["music_thumnail"];?>" alt>
                        <a href="release-single.html"><i class="far fa-play"></i></a>
                        <span class="album__stat">
                            <span><i class="far fa-heart"></i> 10</span>
                            <span><i class="far fa-music"></i> 20k</span>
                        </span>
                    </div>
                    <div class="album__title">

                        <h3><a href="?p=singles&ID=<?=$single_data_array["userID"];?>"><?=$row["music_title"];?></a></h3>
                        <span><a href="?p=/artist"><?=$row["artist_name"];?></a></span>
                    </div>
                </div>
            </div>
            <?php
                                }
                            } else {
                                echo "No data found";
                            }
                        ?> 
  <!--  -->
        </section>


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Events</h2>
                </div>
            </div>

            <div class="col-12">
                <div class="main__carousel-wrap">
                    <div class="main__carousel main__carousel--events owl-carousel" id="events">
                        <div class="event" data-bg="assets/img/events/event1.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Apr 1, 2021</span>
                            <h3 class="event__title"><a href="event.html">Contrary to popular</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                        <div class="event" data-bg="assets/img/events/event2.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Apr 1, 2021</span>
                            <h3 class="event__title"><a href="event.html">Sed ut perspiciatis </a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                        <div class="event" data-bg="assets/img/events/event3.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Apr 1, 2021</span>
                            <h3 class="event__title"><a href="event.html">At vero eos et accusamus</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <span class="event__out">Sold out</span>
                        </div>
                        <div class="event" data-bg="assets/img/events/event4.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Apr 1, 2021</span>
                            <h3 class="event__title"><a href="event.html">Righteous indignation</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                        <div class="event" data-bg="assets/img/events/event5.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Apr 1, 2021</span>
                            <h3 class="event__title"><a href="event.html">The wise man therefore</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <span class="event__out">Sold out</span>
                        </div>
                        <div class="event" data-bg="assets/img/events/event6.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Apr 1, 2021</span>
                            <h3 class="event__title"><a href="event.html">Rejects pleasures to secure</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                    </div>
                    <button class="main__nav main__nav--prev" data-nav="#events" type="button"> <i
                            class="fal fa-long-arrow-alt-left fa-lg mr-2"></i> </button>
                    <button class="main__nav main__nav--next" data-nav="#events" type="button"> <i
                            class="fal fa-long-arrow-alt-right fa-lg"></i> </button>
                </div>
            </div>
        </section>

    </div>
    </div>
</section>