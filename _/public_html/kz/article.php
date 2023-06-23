<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->article->lang='kz';
$incom->article->get_params();
if ($incom->article->show_comment==1)
{
	$incom->comment->lang='kz';
    $incom->comment->get_params();
}
// вывод
$incom->article->index();