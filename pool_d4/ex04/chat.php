<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Refresh" content="30">
    <title></title>
  </head>
  <body>
    <?php
    $content = file_get_contents('../private/chat');
    $str = explode("|", $content);

    foreach ($str as $string) {
        $obj = unserialize($string);
        echo "$obj[time]     ";
        echo "$obj[login]";
        echo '<br>';
        echo "$obj[msg]";
        echo '<br>';
    }
    ?>
  </body>
</html>
