<?php
require_once('auth.php');
session_start();

if (auth($_POST[login], $_POST["passwd"]) == FALSE)
{
	$_SESSION["loggued_on_user"] = "";
  header('Location: create.html');
}
else
{
	$_SESSION[loggued_on_user] = $_POST["login"];

}
?>
	<!DOCTYPE html>
	<html>
		<head>
			<style media="screen">
				body{
					background-color: #FFE4C4;
				}
				.but{
					width: 100%;
					text-align: center;
				}

			</style>
		</head>
		<body>

		</body>
	</html>

	<h1 style="color: #800000; text-align: center;" >Добро пожаловать в 42chat</h1>
	<iframe  id="main" name="chat" src="chat.php" width="100%" height="550px"></iframe>
	<iframe name="speak" src="speak.html" width="100%" height="50px"></iframe>
	<div class="but">
		<form class="exit" action="logout.php" method="POST"><input type="submit" name="submit" value="Выйти" /></form>
		<form class="modif" action="modif.html" method="POST"><input class="submit" type="submit" name="submit" value="Изменить пароль" /></form>
	</div>
</body>
</html>
