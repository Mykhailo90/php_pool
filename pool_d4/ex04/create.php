<?php
session_start();
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR1\n");
	return (0);
}
if (!$_REQUEST['login'] || !$_REQUEST['passwd'] || $_REQUEST['submit'] !== "Регистрация")
{
	echo ("Недостаточно данных для входа\n");
	return (0);
}
$acc = array('login' => $_POST[login], 'passwd' => password_hash($_POST[passwd], PASSWORD_DEFAULT));

if (!file_exists("../private/passwd"))
{
	$accounts = array();
	mkdir("../private");
	file_put_contents("../private/passwd", serialize($accounts));
}
$data = file_get_contents("../private/passwd");
$accounts = unserialize($data);
foreach ($accounts as $val)
{
	if ($val['login'] == $_POST[login])
	{
		echo ("ERROR3\n");
		return (0);
	}
}
$accounts[] = $acc;
file_put_contents("../private/passwd", serialize($accounts));
echo "OK\n";
header('Location: index.html');
return(1);
?>
