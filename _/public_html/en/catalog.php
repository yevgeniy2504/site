<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->catalog->lang='en';
$incom->catalog->get_params();
if ($incom->catalog->show_comment==1)
{
	$incom->comment->lang='en';
    $incom->comment->get_params();
}
// вывод
$incom->catalog->index();