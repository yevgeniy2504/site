<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->news->lang='zh';
$incom->news->get_params();
if ($incom->news->show_comment==1)
{
	$incom->comment->lang='zh';
    $incom->comment->get_params();
}
// вывод
$incom->news->index();