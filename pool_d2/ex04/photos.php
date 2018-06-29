#!/usr/bin/php
<?php
  if ($argc == 2)
  {
    $adr = $argv[1];
    $ee = $adr;
    $str = file_get_contents ($adr);
    $reg_exp = '/<img.+src="(.*.(svg|png|jpg|jpeg|tif|tiff|gif|bmp))/';
    $reg_exp_name = '/^.+\/(.+)/';
    $reg_exp_clean = '/^http.+(svg|png|jpg|jpeg|tif|tiff|gif|bmp)/';
    preg_match_all ($reg_exp, $str, $ar);
    $img_urls = [];
    $img_names = [];
    $i = 0;
    $y = 0;
    foreach ($ar[1] as $key => $value) {
        $img_urls[$i] = $value;
        preg_match_all ($reg_exp_name, $img_urls[$i], $ar_tmp);
        foreach ($ar_tmp[1] as $key => $value) {
        $img_names[$y++] = $value;
        $i++;
      }
    }
     $i = 0;
     $len = count($img_urls);
     preg_match($reg_exp_name, $adr, $ar_tmp);
     $adr = $ar_tmp[1];
     $adr = __DIR__."/".$adr;
     if ($len > 0){
       if (!file_exists($adr))
          mkdir("$adr", 0777);
      while ($i < $len) {
        if (!preg_match($reg_exp_clean, $img_urls[$i]))
         {
            $img_urls[$i] = $ee.$img_urls[$i];
         }
          $test = @file_get_contents($img_urls[$i]);
          $path = $adr."/".$img_names[$i];
          file_put_contents($path, $test);
        $i++;
    }
  }
}
?>
