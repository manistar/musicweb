<?php
require_once 'include/ini.php';
if(isset($_POST['categoryID'])){
    $p->getsubcategory(htmlspecialchars($_POST['categoryID']));
}
?>