<?php
function auth($login, $passwd)
{
	if (!file_exists("../private/passwd"))    //Здесь лучше разместить запрос к БД и проверять подключение к БД и наличие данной таблицы!
	{
		return FALSE;
	}
	$data = file_get_contents("../private/passwd"); //Внести в блок обработки исключений! Может вернуть предупреждения
	$accounts = unserialize($data);
	foreach ($accounts as $value)
	{
		if ($value['login'] == $login)
		{
      if (password_verify($passwd, $value['passwd']))
			{
				return TRUE;
			}
		}
	}
	return FALSE;
}
?>
