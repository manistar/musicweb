<?php require_once "ini.php";?>
<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Profile Settings</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Profile Settings</h2>
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
                                <a href="?p=dashboard" class="nav-link"><i class="far fa-layer-group"></i>
                                    Dashboard</a>
                                <a href="?p=profile" class="nav-link"><i class="far fa-user"></i> Profile</a>
                                <a href="?p=profile-settings" class="nav-link active"><i class="far fa-cog"></i>
                                    Profile Settings</a>
                              
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="row row--grid">

                            <div class="col-12 col-lg-6">
                                <div class="profile-setting common-form">
                                    <h4 class="mb-4">Update Profile Info</h4>

                                    <form action="passer" id="foo" onsubmit="return false">
                                    <?php echo $c->create_form($profile_settings);?>
                                        <!-- <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter name"
                                                value="Ava Cornish">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Enter email"
                                                value="test@domain.com">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" placeholder="Enter phone"
                                                value="1236547894">
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control custom-select">
                                                <option value>Select Country</option>
                                                <option selected value="USA">USA</option>
                                                <option value="CANADA">CANADA</option>
                                                <option value="GERMANY">GERMANY</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" placeholder="Enter address"
                                                value="New York,USA">
                                        </div> -->
                                        <input type="hidden" name="update_profile_settings" value="">
                                        <div id="custommessage"></div>
                                        <button type="submit" class="btn theme-btn">Save Changes</button>
                                    </form>
                                </div>
                            </div>


                            <div class="col-12 col-lg-6">
                                <div class="profile-setting common-form">
                                    <h4 class="mb-4">Change Password</h4>
                                    <form action="passer" id="foo" onsubmit="return false">
                                    <?php echo $c->create_form($change_password);?>
                                        <!-- <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control"
                                                placeholder="Enter new password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Re-type password">
                                        </div> -->
                                        <input type="hidden" name="update_password" value="">
                                        <div id="custommessage"></div>
                                        <button type="submit" class="btn theme-btn" value="submit">Save Changes</button>
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