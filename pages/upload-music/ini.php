<?php
session_start();
require_once 'include/session.php';
require_once 'consts/Regex.php';
require_once 'include/database.php';
$d = new database;
require_once 'content/content.php';
$c = new content;
require_once 'consts/user.php';
require_once 'function/autorize.php';
$v = new validate;

$play_track = [
    "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "userID" => ["input_type"=>"hidden", "is_required"=>false],

    "music_title" => [
        "title" => "Music Title",
        "global_class" => "col-md-12",
        "name"=> "music_title",
        "placeholder" => "Enter Music Title",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
        "unique"=>""
    ],
    "artist_name" => [
        "title" => "Artist Name",
        "global_class" => "col-md-12",
        "name"=> "artist_name",
        "placeholder" => "Enter Artist Name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
    ],
    "album_desc" => [
        "title" => "Description",
        "global_class" => "col-lg-12",
        "name" => "album_desc",
        "placeholder" => "Enter Description",
        "is_required" => true,
        "input_type" => "textarea",  // Change to "textarea"
        "type" => "textarea", 
        "unique"=>""    
    ],
    "label" => ["placeholder" => "Make your selection", "global_class" => "col-md-4", "is_required" => true, "options" => ["latest" => "New Track", "old" => "Oldies"], "type" => "select"],
    "music_thumnail"=>["input_type"=>"file", "global_class" => "col-lg-12", "path"=>"upload/", "file_name"=>"thumbnail_" .uniqid(), "formart"=>["jpg", "png"]],
    "music_file"=>["input_type"=>"file", "global_class" => "col-lg-12", "path"=>"upload/", "file_name"=>"audio_" .uniqid(), "formart"=>["mp3"]],
];

if(isset($_SESSION['userSession'])){
    $userID = htmlspecialchars($_SESSION['userSession']);
    $data = $d->getall("users", "ID = ?", [$userID], fetch:"details");
}
// $carting = $d->getall("products", "ID = ?", [$row['productID']]);
// $d->create_table("playlist", $play_track); 
?>