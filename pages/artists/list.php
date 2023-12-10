<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Artists</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Artists</h2>
                </div>
                
                <div class="row row--grid">
                <?php
                if ($artist_rows->rowCount() > 0) {
                    foreach ($artist_rows as $row) {
                ?>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <a href="?p=artist-single&ID=<?=$row['ID'];?>" class="artist">
                            <div class="artist__cover">
                                <img src="upload/profile/<?=$row['upload_image']?>" alt>
                            </div>
                            <h3 class="artist__title"><?php echo $row['first_name'].' '. $row['last_name'];?></h3>
                        </a>
                    </div>
                    <?php
                    }
                } else {
                    echo "No data found";
                } ?>
                   <!--  -->

                    
                    
                   
                  <!-- Ends here -->
                </div>
                <button class="main__load" type="button">Load more <i
                        class="fal fa-long-arrow-alt-right fa-lg ml-2"></i></button>
            </div>

        </div>
    </div>
</section>