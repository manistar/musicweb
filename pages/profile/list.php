<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Profile</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Profile</h2>
                </div>

                <div class="row row--grid">
                    <div class="col-lg-3">
                        <div class="profile">
                            <div class="profile__user">
                                <div class="profile__avatar">
                                    <img src="upload/profile/<?= $data['upload_image'];?>" alt>
                                </div>
                                <div class="profile__meta">
                                    <h3><?= $data['first_name'].' '.$data['last_name'];?></h3>
                                    <span>User ID: <?= $data['userID'];?></span>
                                </div>
                            </div>

                            <div class="nav flex-column nav-pills">
                           
                                <a href="?p=profile" class="nav-link active"><i class="far fa-user"></i> Profile</a>
                                <!-- <a href="profile-setting.html" class="nav-link"><i class="far fa-cog"></i> Profile
                                    Settings</a>
                                <a href="favourites.html" class="nav-link"><i class="far fa-heart"></i> My
                                    Favourites</a>
                                <a href="orders.html" class="nav-link"><i class="far fa-shopping-cart"></i> My
                                    Orders</a>
                                <a href="playlist.html" class="nav-link"><i class="far fa-list-ul"></i> My Playlist</a>
                                <a href="create-playlist.html" class="nav-link"><i class="far fa-layer-plus"></i> Create
                                    Playlist</a>
                                <a href="upload-music.html" class="nav-link"><i class="far fa-cloud-upload"></i> Upload
                                    Music</a> -->
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="row row--grid">
                            <div class="col-lg-8">
                                <div class="profile-info">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Name</th>
                                            <td>:</td>
                                            <td><?= $data['first_name'].' '.$data['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><?= $data['email'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>:</td>
                                            <td><?= $data['phone_number'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if($data['country'] == "") {
                                                    echo 'Please insert your Country';
                                                } else {
                                                    echo $data['country'];
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>:</td>
                                            <td> <?php
                                                if($data['state'] == "") {
                                                    echo 'Please insert your State';
                                                } else {
                                                    echo $data['state'].', '.$data['country'];
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <th>Join At</th>
                                            <td>:</td>
                                            <td><?=  $date = date('Y-m-d', strtotime($data['date']));?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>