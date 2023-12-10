<!-- <div class="main">
    <div class="container-fluid">
        <div class="col-6">
        <div id="showresult"></div>
        </div>
        
    </div>
</div> -->


<section class="main">
    <div class="container-fluid">

        <section class="row">
            <div class="col-lg-9">
                <div class="hero owl-carousel" id="hero">
                    <div class="hero__slide" data-bg="musica/assets/img/slider/slider1.jpg">
                        <h1 class="hero__title">Music template for audio platform</h1>
                        <p class="hero__text">It is a long established fact that a reader will be distracted by
                            the readable content of a page when looking at its layout.</p>
                        <div class="hero__btns">
                            <a href="#" class="hero__btn hero__btn--green">Buy Now <i
                                    class="fal fa-long-arrow-alt-right ml-2 fa-lg"></i></a>
                            <a href="#" class="hero__btn">Know more</a>
                        </div>
                    </div>
                    <div class="hero__slide" data-bg="musica/assets/img/slider/slider2.jpg">
                        <h2 class="hero__title">Enjoy your favourite music with us</h2>
                        <p class="hero__text">It is a long established fact that a reader will be distracted by
                            the readable content of a page when looking at its layout.</p>
                        <div class="hero__btns">
                            <a href="#" class="hero__btn hero__btn--green">Know more <i
                                    class="fal fa-long-arrow-alt-right ml-2 fa-lg"></i></a>
                            <a href="https://www.youtube.com/watch?v=qxjHfS0Jau8"
                                class="hero__btn hero__btn--video open-video"><i class="far fa-play fa-lg"></i>
                                WATCH NOW</a>
                        </div>
                    </div>
                    <div class="hero__slide" data-bg="musica/assets/img/slider/slider3.jpg">
                        <h2 class="hero__title">Music streaming & Record Template</h2>
                        <p class="hero__text">It is a long established fact that a reader will be distracted by
                            the readable content of a page when looking at its layout.</p>
                        <div class="hero__btns">
                            <a href="#" class="hero__btn">Know more <i
                                    class="fal fa-long-arrow-alt-right ml-2 fa-lg"></i></a>
                        </div>
                    </div>
                </div>

                <button class="main__nav main__nav--hero main__nav--prev" data-nav="#hero" type="button"><i
                        class="fal fa-long-arrow-alt-left fa-2x mr-4"></i></button>
                <button class="main__nav main__nav--hero main__nav--next" data-nav="#hero" type="button"><i
                        class="fal fa-long-arrow-alt-right fa-2x"></i></button>
            </div>

            <div class="col-lg-3">
                <div class="banner-area">
                    <img src="musica/assets/img/banner/banner1.jpg" class="mb-4" alt>
                    <img src="musica/assets/img/banner/banner2.jpg" alt>
                </div>
            </div>
        </section>


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Recently Played</h2>
                    <a href="releases.html" class="main__link">View More <i
                            class="fal fa-long-arrow-alt-right ml-2"></i></a>
                </div>
            </div>
            <?php
            if ($recent_play->rowCount() > 0) {
                foreach ($recent_play as $row) { 
                    ?>
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="album">
                            <div class="album__cover">
                                <img src="upload/<?=$row['music_thumnail'];?>" alt>
                                <a href="release.html"><i class="far fa-play"></i></a>
                                <span class="album__stat">
                                    <span><i class="far fa-heart"></i> <?=$row['heart'];?></span>
                                    <span><i class="far fa-music"></i><?=$row['listen'];?></span>
                                </span>
                            </div>
                            <div class="album__title">
                            
                                <h3><a href="?p=single-release&ID=<?= $row['ID'] ?>"><?=$row['music_title'];?></a></h3>
                                <span><a href="?p=single-release&ID=<?= $row['ID'] ?>"><?=$row['artist_name'];?></a></span>
                                <div class="timestamp">
                                    <?= date('Y-m-d H:i:s', $row['timestamp']) ?><br>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <?php
                }
            } else {
                echo "No data found";
            }
            ?>
        </section>


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Latest Release</h2>
                    <a href="releases.html" class="main__link">View More <i
                            class="fal fa-long-arrow-alt-right ml-2"></i></a>
                </div>
            </div>
            <?php
            if ($latest_play->rowCount() > 0) {
                foreach ($latest_play as $row) { ?>
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="album">
                            <div class="album__cover">
                                <img src="upload/<?=$row['music_thumnail'];?>" alt>
                                <a href="release-single.html"><i class="far fa-play"></i></a>
                                <span class="album__stat">
                                    <button id="favoriteButton" onclick="toggleFavorite()"><i class="far fa-heart"></i><?=$row['heart'];?></button>
                                    <span><i class="far fa-music"></i><?=$row['listen'];?></span>
                                </span>
                            </div>
                            <div class="album__title">
                                <h3><a href="?p=single-release&ID=<?= $row['userID'] ?>"><?=$row['music_title'];?></a></h3>
                                <span><a href="?p=single-release&ID=<?= $row['ID'] ?>"><?=$row['artist_name'];?></a></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No data found";
            }
            ?>

        </section>


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Upcoming Events</h2>
                    <a href="events.html" class="main__link">View More <i
                            class="fal fa-long-arrow-alt-right ml-2"></i></a>
                </div>
            </div>

            <div class="col-12">
                <div class="main__carousel-wrap">
                    <div class="main__carousel main__carousel--events owl-carousel" id="events">
                        <div class="event" data-bg="musica/assets/img/events/event1.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Aug 30, 2022</span>
                            <h3 class="event__title"><a href="event.html">Contrary to popular</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                        <div class="event" data-bg="musica/assets/img/events/event2.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Aug 30, 2022</span>
                            <h3 class="event__title"><a href="event.html">Sed ut perspiciatis </a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                        <div class="event" data-bg="musica/assets/img/events/event3.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Aug 30, 2022</span>
                            <h3 class="event__title"><a href="event.html">At vero eos et accusamus</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <span class="event__out">Sold out</span>
                        </div>
                        <div class="event" data-bg="musica/assets/img/events/event4.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Aug 30, 2022</span>
                            <h3 class="event__title"><a href="event.html">Righteous indignation</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <a href="#" class="event__ticket"> Buy ticket <i
                                    class="fal fa-long-arrow-alt-right ml-2"></i> </a>
                        </div>
                        <div class="event" data-bg="musica/assets/img/events/event5.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Aug 30, 2022</span>
                            <h3 class="event__title"><a href="event.html">The wise man therefore</a></h3>
                            <p class="event__address">1122 Pritchard Court,NY,USA</p>
                            <span class="event__out">Sold out</span>
                        </div>
                        <div class="event" data-bg="musica/assets/img/events/event6.jpg">
                            <span class="event__time">10:00 am</span>
                            <span class="event__date">Aug 30, 2022</span>
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


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Artists</h2>
                    <a href="artists.html" class="main__link">View More <i
                            class="fal fa-long-arrow-alt-right ml-2"></i></a>
                </div>
            </div>

            <div class="col-12">
                <div class="main__carousel-wrap">
                    <div class="main__carousel main__carousel--artists owl-carousel" id="artists">
                    <?php
                        if ($artist->rowCount() > 0) {
                            foreach ($artist as $row) { ?>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="upload/<?=$row['artist_img'];?>" alt>
                            </div>
                            <h3 class="artist__title"><?=$row['artist_name'];?></h3>
                        </a>


                        <!-- <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist2.jpg" alt>
                            </div>
                            <h3 class="artist__title">Flores</h3>
                        </a>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist3.jpg" alt>
                            </div>
                            <h3 class="artist__title">R Savage</h3>
                        </a>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist4.jpg" alt>
                            </div>
                            <h3 class="artist__title">James Swann</h3>
                        </a>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist5.jpg" alt>
                            </div>
                            <h3 class="artist__title">Sandy White</h3>
                        </a>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist6.jpg" alt>
                            </div>
                            <h3 class="artist__title">Edith Sellers</h3>
                        </a>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist7.jpg" alt>
                            </div>
                            <h3 class="artist__title">Joy Orta</h3>
                        </a>
                        <a href="artist-single.html" class="artist">
                            <div class="artist__cover">
                                <img src="musica/assets/img/artists/artist8.jpg" alt>
                            </div>
                            <h3 class="artist__title">K Allison</h3>
                        </a> -->
                        <?php
                }
            } else {
                echo "No data found";
            }
            ?>
                    </div>
                    <button class="main__nav main__nav--prev" data-nav="#artists" type="button"> <i
                            class="fal fa-long-arrow-alt-left fa-lg mr-2"></i> </button>
                    <button class="main__nav main__nav--next" data-nav="#artists" type="button"> <i
                            class="fal fa-long-arrow-alt-right fa-lg"></i> </button>
                </div>
            </div>
        </section>

        <section class="row row--grid">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="row row--grid">

                    <div class="col-12">
                        <div class="main__title">
                            <h2><i class="far fa-music"></i><a href="#">Popular</a></h2>
                        </div>
                    </div>

                    <div class="col-12">
                        <ul class="main__list">
                            <li class="single-item">
                                <a data-link data-title="Until I Met You" data-artist="Ava Cornish"
                                    data-img="musica/assets/img/covers/cover1.jpg" href="musica/assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover1.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Until I Met You</a></h4>
                                    <span><a href="artist.html">Ava Cornish</a></span>
                                </div>
                                <span class="single-item__time">3:05</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Mood Swings" data-artist="Yeaji"
                                    data-img="musica/assets/img/covers/cover2.jpg" href="musica/assets/audio/preview2.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover2.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Mood Swings</a></h4>
                                    <span><a href="artist.html">Yeaji</a></span>
                                </div>
                                <span class="single-item__time">2:05</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Something More" data-artist="Morgan"
                                    data-img="musica/assets/img/covers/cover3.jpg" href="musica/assets/audio/preview3.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover3.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Something More</a></h4>
                                    <span><a href="artist.html">Morgan</a></span>
                                </div>
                                <span class="single-item__time">4:30</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Tell Me Yu" data-artist="Mutha"
                                    data-img="musica/assets/img/covers/cover4.jpg" href="musica/assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover4.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Tell Me Yu</a></h4>
                                    <span><a href="artist.html">Mutha</a></span>
                                </div>
                                <span class="single-item__time">2:32</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Up Up Away" data-artist="Britney"
                                    data-img="musica/assets/img/covers/cover5.jpg" href="musica/assets/audio/preview2.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover5.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i></a>
                                <div class="single-item__title">
                                    <h4><a href="#">Up Up Away</a></h4>
                                    <span><a href="artist.html">Britney</a></span>
                                </div>
                                <span class="single-item__time">1:05</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="row row--grid">

                    <div class="col-12">
                        <div class="main__title">
                            <h2><i class="far fa-headphones-alt"></i><a href="#"></a>Feature</a></h2>
                        </div>
                    </div>

                    <div class="col-12">
                        <ul class="main__list">
                            <li class="single-item">
                                <a data-link data-title="Girls Of My" data-artist="Frank Li"
                                    data-img="musica/assets/img/covers/cover13.jpg" href="musica/assets/audio/preview3.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover13.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Girls Of My</a></h4>
                                    <span><a href="artist.html">Frank Li</a></span>
                                </div>
                                <span class="single-item__time">2:30</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Meant To Be" data-artist="Loky Comb"
                                    data-img="musica/assets/img/covers/cover7.jpg" href="musica/assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover7.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Meant To Be</a></h4>
                                    <span><a href="artist.html">Loky Comb</a></span>
                                </div>
                                <span class="single-item__time">2:18</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Pretty Hearts" data-artist="Niki"
                                    data-img="musica/assets/img/covers/cover8.jpg" href="musica/assets/audio/preview2.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover8.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Pretty Hearts</a></h4>
                                    <span><a href="artist.html">Niki</a></span>
                                </div>
                                <span class="single-item__time">2:20</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Enjoy Yourselft" data-artist="Cup Kakke"
                                    data-img="musica/assets/img/covers/cover9.jpg" href="musica/assets/audio/preview3.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover9.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">Enjoy Yourselft</a></h4>
                                    <span><a href="artist.html">Cup Kakke</a></span>
                                </div>
                                <span class="single-item__time">3:12</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="One Of The" data-artist="Tierra"
                                    data-img="musica/assets/img/covers/cover10.jpg" href="musica/assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="musica/assets/img/covers/cover10.jpg" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#">One Of Them</a></h4>
                                    <span><a href="artist.html">Tierra</a></span>
                                </div>
                                <span class="single-item__time">4:05</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add
                                            To Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i>
                                            Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                            Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i>
                                            Music Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="row row--grid">

                    <div class="col-12">
                        <div class="main__title">
                            <h2><i class="far fa-microphone"></i><a href="#">Trending</a></h2>
                        </div>
                    </div>
                    <!-- TRENDING -->
                    <div class="col-12">
                        <ul class="main__list">
                        
                    <?php 
                    if(!empty($trending_music)) {
                        foreach ($trending_music as $row) {
                            ?> 
                            <?= $c->music_display($row);?>
                                    <?php
                        }
                    } else {
                        echo "No trending music found.";
                    }
                    ?>

                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>Listen Live</h2>
                    <a href="live.html" class="main__link">View More <i
                            class="fal fa-long-arrow-alt-right ml-1"></i></a>
                </div>
            </div>

            <div class="col-12">
                <div class="main__carousel-wrap">
                    <div class="main__carousel main__carousel--live owl-carousel" id="live">
                        <?php
                            if ($live_stream->rowCount() > 0) {
                                foreach ($live_stream as $row) { ?>
                                    <div class="live">
                                        <a href="<?= $row['youtube']; ?>" class="live__cover open-video">
                                            <img src="musica/assets/img/live/<?= $row['img']; ?>" alt>
                                            <span class="live__status">
                                                <?= $row['status']; ?>
                                            </span>
                                            <span class="live__value">4
                                                <?= $row['watching']; ?>
                                            </span>
                                            <i class="far fa-play"></i>
                                        </a>
                                        <h3 class="live__title"><a href="<?= $row['youtube']; ?>" class="open-video">
                                                <?= $row['title']; ?>
                                            </a></h3>
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
            <h2>Products</h2>
            <a href="store.html" class="main__link">View More <i
                    class="fal fa-long-arrow-alt-right ml-2"></i></a>
        </div>
    </div>


    <div class="col-12">
        <div class="main__carousel-wrap">
            <div class="main__carousel main__carousel--store owl-carousel" id="store">
            <?php
            if ($products_data->rowCount() > 0) {
                foreach ($products_data as $row) {
                    ?>
                    <div class="product">
                        <a href="#" class="product__img">
                            <img src="musica/assets/img/store/<?= $row['img']; ?>" alt>
                        </a>
                        <h3 class="product__title">
                            <a href="product.html">
                                <?= $row['title']; ?>
                            </a>
                        </h3>
                        <span class="product__price">
                            <?= $row['amount']; ?>
                        </span>
            
                        <form action="" id="foo">
                            <?php
                            $add_cart['input_data']['productID'] = $row['ID'];
                            $add_cart['input_data']['no_product'] = $s->get_no_of_product_in_cart($userID, $row['ID']);
                            echo $c->create_form($add_cart);
                            ?>
                            <input type="hidden" name="add_to_cart" value="">
                            <input type="hidden" name="page" value="shop">
                            <div id="custommessage"></div>
                            <button type="submit" title="Add To Cart" value="submit">
                                <span class="product__cart"><i class="far fa-shopping-cart"></i></span>
                            </button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "No data found";
            }
            ?>

            </div>
            <button class="main__nav main__nav--prev" data-nav="#store" type="button"> <i
                    class="fal fa-long-arrow-alt-left fa-lg mr-2"></i> </button>
            <button class="main__nav main__nav--next" data-nav="#store" type="button"> <i
                    class="fal fa-long-arrow-alt-right fa-lg"></i> </button>
        </div>
    </div>
</section>


        <section class="row row--grid">

            <div class="col-12">
                <div class="main__title">
                    <h2>News</h2>
                    <a href="news.html" class="main__link">View More <i
                            class="fal fa-long-arrow-alt-right ml-2"></i></a>
                </div>
            </div>

            <?php
            if ($blog->rowCount() > 0) {
                foreach ($blog as $row) { ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="post">
                            <a href="<?=$row['youtube'];?>" class="post__video open-video">
                                <i class="far fa-play"></i> Watch Now
                            </a>
                            <a href="news-single.html" class="post__img">
                                <img src="musica/assets/img/posts/<?=$row['img'];?>" alt>
                            </a>
                            <div class="post__meta">
                                <span><i class="far fa-clock"></i> 2 min ago</span>
                                <span><i class="far fa-comment-alt-lines"></i> 10</span>
                            </div>
                            <div class="post__content">
                                <a href="#" class="post__category"><?=$row['status'];?></a>
                                <h3 class="post__title"><a href="news-single.html"><?=$row['title'];?></a></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No data found";
            }
            ?>
        </section>


        <div class="row">
            <div class="col-12">
                <div class="partners owl-carousel">
                    <a href="#" class="partners__img">
                        <img src="musica/assets/img/partners/01.svg" alt>
                    </a>
                    <a href="#" class="partners__img">
                        <img src="musica/assets/img/partners/01.svg" alt>
                    </a>
                    <a href="#" class="partners__img">
                        <img src="musica/assets/img/partners/01.svg" alt>
                    </a>
                    <a href="#" class="partners__img">
                        <img src="musica/assets/img/partners/01.svg" alt>
                    </a>
                    <a href="#" class="partners__img">
                        <img src="musica/assets/img/partners/01.svg" alt>
                    </a>
                    <a href="#" class="partners__img">
                        <img src="musica/assets/img/partners/01.svg" alt>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- END: Main Menu-->
<script>
    let isFavorite = false;

function toggleFavorite() {
  const favoriteButton = document.getElementById('favoriteButton');

  if (isFavorite) {
    // Remove the favorite class and change the button text
    favoriteButton.classList.remove('favorite');
    favoriteButton.textContent = 'Add to Favorites';
  } else {
    // Add the favorite class and change the button text
    favoriteButton.classList.add('favorite');
    favoriteButton.textContent = 'Remove from Favorites';
  }

  // Toggle the favorite state
  isFavorite = !isFavorite;
}
</script>