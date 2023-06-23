<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->action->lang='ru';
$incom->action->get_params();
if ($incom->action->show_comment==1)
{
	$incom->comment->lang='ru';
    $incom->comment->get_params();
}
// вывод
$incom->action->index();