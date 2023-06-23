<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->quest->lang='kz';
$incom->quest->get_params();
// добавление вопросов
if (isset($_POST["name"]) && $_POST["name"]!='' && isset($_POST["token"]) && $_SESSION["token"]==$_POST["token"])
{
	
	if ($incom->quest->add_quest($_POST["name"], $_POST["mail"], $_POST["text"]))
	{
		echo '<script>';
		echo 'jQuery(".quest_field").val("");';
		echo 'jQuery("#quest_info").html("'.$incom->quest->text_success.'").css("color","green").slideDown("slow");';
		echo '</script>';
		
		
		$link = $_SERVER['HTTP_REFERER'].'#quest';
		
		if ($incom->quest->send_mail==1)
		$incom->quest->send_mail($link, $_POST["name"], $_POST["text"]);
		
	}
	else
	{
		echo '<script>';
		echo 'jQuery("#quest_info").html("Ошибка отправки вопроса. Попробуйте позже").css("color","red").slideDown("slow");';
		echo '</script>';
	}
	
	exit;
}

// модерация вопросов

if ($ob->check_admin())
{
	if (isset($_POST["quest_act"]) && isset($_POST["id"]))	
	{
		mysql_query("update i_block_elements set quest_act=".intval($_POST["quest_act"])." where id=".intval($_POST["id"])."");	
		
		exit;
	}
}

// сохранение ответов

if ($ob->check_admin())
{
	if (isset($_POST["id"]) && isset($_POST["value"]))	
	{
		mysql_query("update i_block_elements set quest_answer='".urldecode($ob->pr($_POST["value"]))."' where id=".intval($_POST["id"])."");	
		
		exit;
	}
}

// вывод
$incom->quest->get_quest();