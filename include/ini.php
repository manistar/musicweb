<?php 
require_once "include/session.php";
if(isset($_GET['theme'])) {
    $expiration = time() + (30 * 24 * 60 * 60); // 30 days * 24 hours * 60 minutes * 60 seconds
    if($_GET['theme'] == "dark") {
        // Set the cookie
        setcookie("browser_theme", "dark");
    } else{
        setcookie("browser_theme", "light");    
    }
    // Get the previous page link
$previousPage = $_SERVER['HTTP_REFERER'];
    // Reload the current page
header("Location: $previousPage");
exit();
}
require_once "consts/Regex.php";
require_once "include/database.php"; 
$d = new database;
// require_once "consts/general.php";
require_once "content/content.php"; 
require_once "function/autorize.php"; 
$v = new validate;
$c = new content;

$page = "dashboard";
if(isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['p']);
}
$script = [];
$user = $d->getall("users", "ID = ?",  [$userID], fetch:"details");
$full_name = ucwords($user['first_name'].' '.$user['last_name']);
$user_data = $v->user_data($userID);
// $activities = $d->getall("activities", "userID = ? order by date DESC LIMIT 5", [$userID], fetch: "moredetails");
// $act_title = 'Recent Activity';
// $act_des = 'New notifications and activity on your account';
// $invest_no = $d->getall("investment", "userID = ?", [$userID], fetch: '');
// $deposit = $d->getall("deposit", "userID = ?", [$userID], fetch: '');
// if($invest_no <= 0 && $deposit <= 0) {
//     $_SESSION['newuser'] = $userID;
// }elseif(isset($_SESSION['newuser'])){
//     unset($_SESSION['newuser']);
// }