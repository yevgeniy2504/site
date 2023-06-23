<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->edit_list->lang='ru';

if ($ob->check_admin())
{
	// вывод
	$incom->edit_list->index();
}