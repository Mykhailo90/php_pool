<?php
if ($_GET[login] && $_GET[passwd] && $_GET[submit]){
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
?>
<html><body>
<form method="$POST">
Username: <input type="text" name="login" value="<?php echo($_SESSION[login]) ?>" />
<br />
Password: <input type="text" name="passwd" value="<?php echo($_SESSION[passwd]) ?>" />
<input type="submit" name="submit" value="OK" />
</form>
</body></html>
