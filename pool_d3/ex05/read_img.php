<?php
header("Content-Type: image/png");
$file = "../img/42.png";
if (file_exists($file))
  readfile($file);
?>
