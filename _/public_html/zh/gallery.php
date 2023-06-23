<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->gallery->lang='zh';
$incom->gallery->get_params();
if ($incom->gallery->show_comment==1)
{
	$incom->comment->lang='zh';
    $incom->comment->get_params();
}
// вывод
$incom->gallery->index();