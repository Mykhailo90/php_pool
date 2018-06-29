<?php
session_start();
if ($_SESSION["loggued_on_user"] && $_SESSION["loggued_on_user"] != "")
{
	echo $_SESSION["loggued_on_user"], "\n";
	return (1);
}
else
{
	echo "ERROR\n";
	return (0);
}
?>
