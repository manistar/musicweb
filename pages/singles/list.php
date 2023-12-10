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

                            <img src="upload/<?= $single_data['music_thumnail']; ?>" alt>
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
                                    <?= $c->music_display($row); ?>
                                    <!-- <li class="single-item">
                                        <a data-link data-title="<?= $row["music_title"]; ?>" data-artist="<?= $single_data_array["artist_name"]; ?>"
                                            data-img="upload/<?= $row["music_thumnail"]; ?>" href="upload/<?= $single_data_array["music_file"]; ?>"
                                            class="single-item__cover">
                                            <img src="upload/<?= $row["music_thumnail"]; ?>" alt>
                                            <i class="far fa-play"></i>
                                            <i class="far fa-pause"></i>
                                        </a>
                                        <div class="single-item__title">
                                            <h4><a href="#"><?= $row["music_title"]; ?></a></h4>
                                            <span><a href="artist.html"><?= $singlrowe_release["artist_name"]; ?></a></span>
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
                                    </li> -->

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
                        <p>
                            <?= $single_data['album_desc']; ?>
                        </p>

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
                    <!--  -->
                    <?php
                    if ($single_release->rowCount() > 0) {
                        foreach ($single_release as $row) {
                            ?>
                            <div class="col-6 col-sm-4 col-lg-6">
                                <div class="album album--sidebar">
                                    <div class="album__cover">
                                        <img src="upload/<?= $row['music_thumnail']; ?>" alt>
                                        <a href="release-single.html"><i class="far fa-play"></i></a>
                                        <span class="album__stat">
                                            <span><i class="far fa-heart"></i> 10</span>
                                            <span><i class="far fa-music"></i> 20k</span>
                                        </span>
                                    </div>
                                    <div class="album__title">
                                        <h3><a href="?p=singles&ID=<?= $single_data_array['userID']; ?>">
                                                <?= $row['music_title']; ?>
                                            </a></h3>
                                        <span><a href="?p=artist">
                                                <?= $row['artist_name']; ?>
                                            </a></span>
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
                </div>

            </div>
        </div>
    </div>
</section>

<?php

echo '<a href="' . $file_url . '">Download</a>';
?>

