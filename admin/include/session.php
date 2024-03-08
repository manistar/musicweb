<?php 

// if(!isset($_SESSION['adminSession']) ){
//     header('location: login?message=Please Sign In First.php');
// }

// if(isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['adminSession']);
//     header("location: login.php");
//     }

// if(isset($_SESSION['adminSession'])){
//      $adminID = $_SESSION['adminSession'];
//     session_regenerate_id();
// }else{
//     session_destroy();
//     header("location: login.php");
// }

// $_SESSION['usertoken'] = 
if(!isset($_SESSION['adminSession'])){
    header('location: login.php?message=Please Sign In First'); 
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['adminSession']);
    header("location: login.php");
}

if(isset($_SESSION['adminSession'])){
    $userID = $_SESSION['adminSession'];
}else{
    session_destroy();
    header("location: login.php");
} 
?>



