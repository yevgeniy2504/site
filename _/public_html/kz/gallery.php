<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->gallery->lang='kz';
$incom->gallery->get_params();
if ($incom->gallery->show_comment==1)
{
	$incom->comment->lang='kz';
    $incom->comment->get_params();
}
// вывод
$incom->gallery->index();