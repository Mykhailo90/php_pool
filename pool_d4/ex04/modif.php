<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("Внимание! Попытка взлома приложения!!!\n");
	return (0);
}
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] !== "Изменить")
{
	echo ("ERROR\n");
	return (0);
}
if (!file_exists("../private/passwd"))
{
	echo ("Ошибка подключения к файлу!\n");
	return (0);
}
$data = file_get_contents("../private/passwd");
$accounts = unserialize($data);

for ($i = 0; $i < count($accounts); $i++)
{
	if ($accounts[$i]['login'] == $_POST['login'])
	{
    if (password_verify($_POST['oldpw'], $accounts[$i]['passwd']))
		{
			$accounts[$i]['passwd'] = password_hash($_POST['newpw'], PASSWORD_DEFAULT);
			file_put_contents("../private/passwd", serialize($accounts));
			echo "OK\n";
			header('Location: index.html');
		}
	}
}
header('Location: create.html');
return (0);
?>
