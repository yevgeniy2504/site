<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->video->lang='ru';
$incom->video->get_params();
if ($incom->video->show_comment==1)
{
	$incom->comment->lang='ru';
    $incom->comment->get_params();
}
// вывод
$incom->video->index();