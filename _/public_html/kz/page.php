<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->page->lang='kz';
$incom->page->get_params();
if ($incom->page->show_comment==1)
{
	$incom->comment->lang='kz';
    $incom->comment->get_params();
}
// вывод
$incom->page->index();