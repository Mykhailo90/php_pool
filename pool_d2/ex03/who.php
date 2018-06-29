#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/Kiev');
    $file = fopen("/var/run/utmpx", "r"); // Директория где хранится информация о запущенных процессах
    while ($utmpx = fread($file, 628)){   // Информация хранится в зашифрованном массиве, каждый блок которого равен магическому числу
        $unpack = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $utmpx); // Переводим данные из двоичной системы.
        $array[$unpack['c']] = $unpack;
    }
    ksort($array); // Сортируем массив по ключам - сохраняя зависимость от значений
    foreach ($array as $res){
        if ($res['e'] == 7) { // Смотри unpack группа 7!
            echo str_pad(substr(trim($res['a']), 0, 8), 8, " ")." ";
            echo str_pad(substr(trim($res['c']), 0, 8), 8, " ")." ";
            echo date("M", $res["f1"]);
            echo str_pad(date("j", $res["f1"]), 3, " ", STR_PAD_LEFT)." ".date("H:i", $res["f1"]);
            echo "\n";
        }
    }
?>
