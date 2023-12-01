<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Release Single</li>
                </ul>
            </div>

            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Release Single</h2>
                </div>

                <div class="release">
                    <div class="release__content">
                        <div class="release__cover">
                        <!-- <?=$data['userID'];?> -->
                            <img src="upload/<?=$single_data['music_thumnail'];?>" alt>
                        </div>
                        <div class="release__stat">
                            <span><i class="far fa-dollar-sign"></i> 2000</span>
                            <span><i class="far fa-headphones"></i> 3.40k</span>
                        </div>
                        <a href="#" class="release__buy">Buy Now <i
                                class="fal fa-long-arrow-alt-right fa-lg ml-2"></i></a>
                    </div>
                    <div class="release__list">
                        <ul class="main__list main__list--playlist main__list--dashbox">

                        <!-- foreach Code here -->
                    <?php
                    if ($single_release->rowCount() > 0) {
                        foreach ($single_release as $row) { 
                            // $user_tracks = $d->getall("playlist", "ID = ?", [$row['userID']]);
                            ?>
                            <li class="single-item">
                                <a data-link data-title="<?= $row['music_title'];?>" data-artist="Ava Cornish"
                                    data-img="upload/<?= $row['music_thumnail'];?>" href="upload/<?=$row['music_file'];?>"
                                    class="single-item__cover">
                                    <img src="upload/<?= $row['music_thumnail'];?>" alt>
                                    <i class="far fa-play"></i>
                                    <i class="far fa-pause"></i>
                                </a>
                                <div class="single-item__title">
                                    <h4><a href="#"><?=$row['music_title'];?></a></h4>
                                    <span><a href="artist.html"><?=$row['artist_name']?></a></span>
                                </div>
                                <span class="single-item__time">3:05</span>
                                <div class="dropdown moremenu dropleft">
                                    <button class="btn" type="button" data-toggle="dropdown">
                                        <i class="far fa-ellipsis-v-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="moremenu">
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <?php
                }
            } else {
                echo "No data found";
            }
            ?>
                            <!-- End of loop -->

                            <!-- <li class="single-item">
                                <a data-link data-title="Mood Swings" data-artist="Yeaji"
                                    data-img="assets/img/covers/cover2.jpg" href="assets/audio/preview2.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover2.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Something More" data-artist="Morgan"
                                    data-img="assets/img/covers/cover3.jpg" href="assets/audio/preview3.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover3.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Tell Me Yu" data-artist="Mutha"
                                    data-img="assets/img/covers/cover4.jpg" href="assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover4.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Up Up Away" data-artist="Britney"
                                    data-img="assets/img/covers/cover5.jpg" href="assets/audio/preview2.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover5.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Girls Of My" data-artist="Frank Li"
                                    data-img="assets/img/covers/cover13.jpg" href="assets/audio/preview3.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover13.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Meant To Be" data-artist="Loky Comb"
                                    data-img="assets/img/covers/cover7.jpg" href="assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover7.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Pretty Hearts" data-artist="Niki"
                                    data-img="assets/img/covers/cover8.jpg" href="assets/audio/preview2.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover8.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="Enjoy Yourselft" data-artist="Cup Kakke"
                                    data-img="assets/img/covers/cover9.jpg" href="assets/audio/preview3.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover9.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li>
                            <li class="single-item">
                                <a data-link data-title="One Of The" data-artist="Tierra"
                                    data-img="assets/img/covers/cover10.jpg" href="assets/audio/preview1.mp3"
                                    class="single-item__cover">
                                    <img src="assets/img/covers/cover10.jpg" alt>
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
                                        <a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To
                                            Playlist</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music
                                            Info</a>
                                        <a class="dropdown-item" href="#"><i class="fal fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="text-white mt-5">

                    <div>
                        <h4>Album Description</h4>
                        <p><?=$single_data['album_desc'];?></p>
                        
                    </div>


                    <div class="share">
                        <a href="#" class="share__link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="share__link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="share__link"><i class="fab fa-vimeo-v"></i></a>
                        <a href="#" class="share__link"><i class="fab fa-vk"></i></a>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-4">

                <div class="row row--sidebar mt-5">

                    <div class="col-12">
                        <div class="main__title main__title--sidebar">
                            <h3>More Albums</h3>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 col-lg-6">
                        <div class="album album--sidebar">
                            <div class="album__cover">
                                <img src="assets/img/covers/cover7.jpg" alt>
                                <a href="release-single.html"><i class="far fa-play"></i></a>
                                <span class="album__stat">
                                    <span><i class="far fa-heart"></i> 10</span>
                                    <span><i class="far fa-music"></i> 20k</span>
                                </span>
                            </div>
                            <div class="album__title">
                                <h3><a href="release-single.html">Girls Of My</a></h3>
                                <span><a href="artist.html">Frank Li</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-6">
                        <div class="album album--sidebar">
                            <div class="album__cover">
                                <img src="assets/img/covers/cover8.jpg" alt>
                                <a href="release-single.html"><i class="far fa-play"></i></a>
                                <span class="album__stat">
                                    <span><i class="far fa-heart"></i> 10</span>
                                    <span><i class="far fa-music"></i> 20k</span>
                                </span>
                            </div>
                            <div class="album__title">
                                <h3><a href="release-single.html">Meant To Be</a></h3>
                                <span><a href="artist.html">Loky Comb</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-6">
                        <div class="album album--sidebar">
                            <div class="album__cover">
                                <img src="assets/img/covers/cover9.jpg" alt>
                                <a href="release-single.html"><i class="far fa-play"></i></a>
                                <span class="album__stat">
                                    <span><i class="far fa-heart"></i> 10</span>
                                    <span><i class="far fa-music"></i> 20k</span>
                                </span>
                            </div>
                            <div class="album__title">
                                <h3><a href="release-single.html">Pretty Hearts</a></h3>
                                <span><a href="artist.html">Niki</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-6">
                        <div class="album album--sidebar">
                            <div class="album__cover">
                                <img src="assets/img/covers/cover10.jpg" alt>
                                <a href="release-single.html"><i class="far fa-play"></i></a>
                                <span class="album__stat">
                                    <span><i class="far fa-heart"></i> 10</span>
                                    <span><i class="far fa-music"></i> 20k</span>
                                </span>
                            </div>
                            <div class="album__title">
                                <h3><a href="release-single.html">Enjoy Yourselft</a></h3>
                                <span><a href="artist.html">Cup Kakke</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>