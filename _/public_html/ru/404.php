<?
header("HTTP/1.0 404 Not Found");
header("HTTP/1.1 404 Not Found");
 
$lang="ru";
$title="Ошибка 404";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<br/>
<br/>
Уважаемый посетитель сайта!<br>
Запрашиваемая вами страница не существует, либо произошла ошибка.<br>
Если вы уверены в правильности указанного адреса, то данная страница уже не существует на сервере или была переименована.<br> 
Попробуйте следующее:<br>
1. Откройте <a href="https://www.hotel-uyut.kz"> https://www.hotel-uyut.kz </a> (главную страницу сайта) и попробуйте самостоятельно найти нужную вам страницу.<br> 
2. Кликните кнопкой "Назад" ("Back") вашего браузера, чтобы вернуться к предыдущей странице.<br>
<br/>
<br/>
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>