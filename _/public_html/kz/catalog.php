<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->catalog->lang='kz';
$incom->catalog->get_params();
if ($incom->catalog->show_comment==1)
{
	$incom->comment->lang='kz';
    $incom->comment->get_params();
}
// вывод
$incom->catalog->index();