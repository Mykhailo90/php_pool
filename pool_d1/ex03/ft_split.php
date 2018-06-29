<?php
  function ft_split($s){
    $ar = preg_split('/\s+/', trim($s));
    sort($ar);
    return ($ar);
  }
?>
