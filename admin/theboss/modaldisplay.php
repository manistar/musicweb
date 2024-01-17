<?php
      require_once 'include/ini.php';
      if (isset($_POST['urlink']) && file_exists(htmlspecialchars($_POST['urlink'])) && !isset($_POST['secured'])) {
        $urlink = htmlspecialchars($_POST['urlink']);
        $id = htmlspecialchars($_POST['id']);
        require_once "$urlink";
      }

      if (isset($_POST['urlink']) && isset($_POST['secured'])) {
        $urlink = htmlspecialchars($_POST['urlink']);
        $file = "content/$urlink.php";
        if(file_exists(htmlspecialchars($file))){
          require_once "$file";
        }
      }
?>