<?php
use infrajs\nostore\Nostore;
use infrajs\ans\Ans;
if (!is_file('autoload.php')) {
    chdir('/');
    require_once('autoload.php');
}
Nostore::pubStat();
$text = file_get_contents('https://mc.yandex.ru/metrika/watch.js');
return Ans::js($text);