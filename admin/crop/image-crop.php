<?php
  $img_r = imagecreatefromjpeg($_GET['img']);
  $dst_r = ImageCreateTrueColor( $_GET['w'], $_GET['h'] );
 
  $image = imagecopyresampled($dst_r, $img_r, 0, 0, $_GET['x'], $_GET['y'], $_GET['w'], $_GET['h'], $_GET['w'],$_GET['h']);
  
  header('Content-type: image/jpeg');
  echo $image['img']['name'];
  echo "no sir";
  imagejpeg($dst_r);

 
  exit;
?>