<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->gallery->lang='ru';
$incom->gallery->get_params();
if ($incom->gallery->show_comment==1)
{
	$incom->comment->lang='ru';
    $incom->comment->get_params();
}
// вывод
$incom->gallery->index();