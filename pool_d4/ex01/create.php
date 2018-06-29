<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}
if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
{
	echo ("ERROR\n");
	return (0);
}
$acc = array('login' => $_POST['login'], 'passwd' => password_hash($_POST[passwd], PASSWORD_DEFAULT));
//$acc = array('login' => $_POST['login'], 'passwd' => hash("sha512", $_POST[passwd]));
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
	if ($val['login'] == $_POST['login'])
	{
		echo ("ERROR\n");
		return (0);
	}
}
$accounts[] = $acc;
file_put_contents("../private/passwd", serialize($accounts));
echo "OK\n";
return(1);
?>
