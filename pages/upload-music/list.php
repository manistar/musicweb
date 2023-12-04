<?php require_once "ini.php";?>
<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Upload Music</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Upload Music</h2>
                </div>

                <div class="row row--grid">
                    <div class="col-lg-3">
                        <div class="profile">
                            <div class="profile__user">
                                <div class="profile__avatar">
                                    <img src="upload/profile/<?=$data['upload_image'];?>" alt>
                                </div>
                                <div class="profile__meta">
                                    <h3><?=$data['first_name'].' '.$data['last_name'];?></h3>
                                    <span>User ID: <?=$data['userID'];?></span>
                                </div>
                            </div>

                            <div class="nav flex-column nav-pills">
                                
                                <a href="upload-music.html" class="nav-link active"><i class="far fa-cloud-upload"></i>
                                    Upload Music</a>
                               
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="row row--grid">
                            <div class="col-lg-8">
                                <div class="upload-music common-form">
                                    <h4 class="mb-4">Upload Music</h4>
                                    <form action="passer" id="foo" onsubmit="return false">
                                        <?php echo $c->create_form($play_track); ?>
                                        <!-- <div class="form-group">
                                            <label>Music Title</label>
                                            <input type="text" class="form-control" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label>Artist Name</label>
                                            <input type="text" class="form-control" placeholder="Enter artist name">
                                        </div>
                                        <div class="form-group">
                                            <label>Music Duration</label>
                                            <input type="text" class="form-control" placeholder="Enter music duration">
                                        </div>
                                        <div class="form-group">
                                            <label>Music Thumnail</label>
                                            <input type="file" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Music File</label>
                                            <input type="file" class="form-control">
                                        </div> -->
                                        <input type="hidden" name="upload_music">
                                        <div id="custommessage"></div>
                                        <button type="submit" class="btn theme-btn"><i class="far fa-cloud-upload"></i> Upload
                                            Music</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>