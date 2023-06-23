<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия


// die("hello");
$incom->page->lang='zh';
$incom->page->get_params();
if ($incom->page->show_comment==1)
{
	$incom->comment->lang='zh';
    $incom->comment->get_params();
}
// вывод
$incom->page->index();