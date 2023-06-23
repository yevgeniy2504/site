<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->catalog3->lang='ru';
$incom->catalog3->get_params();

if ($incom->catalog3->show_comment==1)
{
	$incom->comment->lang='ru';
    $incom->comment->get_params();
}
// вывод
$incom->catalog3->index();