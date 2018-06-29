<?php
session_start();
date_default_timezone_set('Europe/Kiev');

if ($_POST["msg"] != "" && $_SESSION[loggued_on_user] != "")
{
  $obj["login"] = $_SESSION[loggued_on_user];
  $obj["msg"] = $_POST["msg"];
  $obj["time"] = date('G:i');
  $obj["time"] = $obj["time"]."      ";
  $str = serialize($obj);
  $str = $str."|";
  $fp = fopen('../private/chat', 'a+');
  flock($fp, LOCK_EX);
  $test = fwrite($fp, $str);
  flock($fp, LOCK_UN);
  fclose($fp);
}

header('Location: speak.html');
?>
