<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] !== "OK")
{
	echo ("ERROR\n");
	return (0);
}
if (!file_exists("../private/passwd"))
{
	echo ("ERROR\n");
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
			return(1);
		}
	}
}
echo ("ERROR\n");
return (0);
?>
