<?php
if (isset($_POST['userLogin'])) {
    require_once "include/auth-ini.php";
    // $loadpass = "Admin111@@@!.";
    // $admincheck2 = password_hash($loadpass, PASSWORD_BCRYPT);
    // echo $admincheck2;
    echo $v->signin($user_validating);
    return null;
}
// create account
if (isset($_POST['userRegister'])) {
    // var_dump($data);
    require_once "include/auth-ini.php";
    echo $v->signup($user_registration);
    return null;
}
// Upload Music
if (isset($_POST['upload_music'])) {
    require_once "pages/upload-music/ini.php";
    echo $v->upload_data($play_track);
    return null;
}

if (isset($_POST['update_profile_settings'])) {
    require_once "pages/profile-settings/ini.php";
    echo $s->profile_setings_update($profile_settings);
    return null;
}

if (isset($_POST['update_password'])) {
    require_once "pages/profile-settings/ini.php";
    echo $s->profile_password_update($change_password);
    return null;
}

if (isset($_POST['play_to_add'])) {
    require_once "include/auth-ini.php";
    echo $v->PlayedMoreThan5x($userID);
}

// Search Key
require_once "include/database.php";
$d = new database;
if (isset($_POST['searchkey'])) {
    $key  = htmlspecialchars($_POST['searchkey']);
    $data = $d->getall("playlist", "music_title like '%$key%' or artist_name like '%$key%'", fetch: "moredetails");
    if (!empty($data)) {
        foreach ($data as $row) {
            $user_id = $row['userID'];
            echo "<a href='view-user.php?p=$user_id'>";
            $img_src = $row['music_thumnail'];
            echo "<img  style='width:25%' src='upload/$img_src' alt='img'><br>";
            echo $row['music_title'] . "<br>";
            echo $row['userID'] . "<br />" . "<hr />";
            echo '</a>';
        }
    } else {
        echo "No user found with the key " . $key;
    }
}


?>