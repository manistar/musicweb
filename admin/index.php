<?php
    // if(!isset($_GET['p'])) {
    //     $exclude_session = "";
    // }
    require_once "inis/ini.php";
    require_once "content/header.php";
        echo '<div class="hold-transition sidebar-mini">';
            if ($page != "") {
                require_once "pages/page-ini.php";
            }
        echo "</div>";
    require_once "content/footer.php";
?>

