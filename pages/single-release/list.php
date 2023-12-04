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

                       
                      <?php  
                        if ($single_release->rowCount() > 0) {
                            foreach ($single_release as $row) {
                            ?>

                                <?= $c->trending_list($row);?>

                            <?php
                                }
                            } else {
                                echo "No data found";
                            }
                        ?>
                            
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