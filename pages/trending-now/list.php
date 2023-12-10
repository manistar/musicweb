<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Genres</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Genres</h2>
                </div>

                <div class="row row--grid">

                <?php
                if (!empty($trending_music)) {
                    foreach ($trending_music as $row) {
                        ?>
                        <div class="col-6 col-sm-4 col-lg-2">
                                <a href="#" class="artist">
                            <div class="artist__cover">
                                <img src="upload/<?=$row['music_thumnail'];?>" alt>
                            </div>
                                <h3 class="artist__title"><?=$row['music_title'];?></h3>
                                </a>
                        </div>
                                    <?php
                    }
                } else {
                    echo "No trending music found.";
                }
                ?>
                  
<!--  -->
                </div>
                <div class="row row--grid">
                    <div class="col-12">
                        <button class="main__load" type="button">Load more <i
                                class="fal fa-long-arrow-alt-right fa-lg ml-2"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>