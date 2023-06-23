<?
$uri = substr($_SERVER['REQUEST_URI'], 0, 13);

// if($uri == '/ru/guest.php'){
// 	require_once $_SERVER['DOCUMENT_ROOT'] . '/404.php';
// 	exit;
// }

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
// die($_GET['p'].' b');
$incom->guest->lang='ru';
// echo $_GET['p'].' h hello';
$incom->guest->get_params();
// добавление отзывов
if (isset($_POST["name"]) && $_POST["name"]!='' && isset($_POST["token"]) && $_SESSION["token"]==$_POST["token"])
{

	if ($incom->guest->add_guest($_POST["name"], $_POST["mail"], $_POST["text"], $_POST["star"]))
	{
		echo '<script>';
		echo 'jQuery(".guest_field").val("");';
		echo 'jQuery("#guest_info").html("'.$incom->guest->text_success.'").css("color","green").slideDown("slow");';
		echo '</script>';


		$link = $_SERVER['HTTP_REFERER'].'#guest';

		if ($incom->guest->send_mail==1)
		$incom->guest->send_mail($link, $_POST["name"], $_POST["text"]);

	}
	else
	{
		echo '<script>';
		echo 'jQuery("#guest_info").html("Ошибка отправки отзыва. Попробуйте позже").css("color","red").slideDown("slow");';
		echo '</script>';
	}

	exit;
}

// модерация комментариев

if ($ob->check_admin())
{
	if (isset($_POST["guest_act"]) && isset($_POST["id"]))
	{
		mysql_query("update i_block_elements set guest_act=".intval($_POST["guest_act"])." where id=".intval($_POST["id"])."");
	}
}

// вывод
$incom->guest->get_guest();
