<?php
      require_once 'inis/ini.php';
      if (isset($_POST['urlink']) && file_exists(htmlspecialchars($_POST['urlink'])) && !isset($_POST['secured'])) {
        $urlink = htmlspecialchars($_POST['urlink']);
        $id = htmlspecialchars($_POST['id']);
        require_once "$urlink";
      }

      if (isset($_POST['urlink']) && isset($_POST['secured'])) {
        $urlink = htmlspecialchars($_POST['urlink']);
        $file = "consts/$urlink";
        if(file_exists(htmlspecialchars($file))){
          require_once "$file";
        }
      }
?>

<?php
// require_once 'inis/ini.php';

// function includeFileSafely($filePath) {
//     // Ensure that the file path is valid and secure
//     if (file_exists($filePath) && is_file($filePath) && realpath($filePath) === $filePath) {
//         require_once $filePath;
//     } else {
//         // Handle the case where the file is not valid
//         echo "Invalid file path: $filePath";
//     }
// }

// if (isset($_POST['urlink']) && isset($_POST['id']) && !isset($_POST['secured'])) {
//     $urlink = htmlspecialchars($_POST['urlink']);
//     $id = htmlspecialchars($_POST['id']);
//     $filePath = "$urlink.php";  // Assuming PHP files
//     includeFileSafely($filePath);
// }

// if (isset($_POST['urlink']) && isset($_POST['secured'])) {
//     $urlink = htmlspecialchars($_POST['urlink']);
//     $file = "consts/$urlink.php";  // Assuming PHP files
//     includeFileSafely($file);
// }
?>
