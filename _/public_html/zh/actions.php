<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->actions->lang='zh';
$incom->actions->get_params();
if ($incom->actions->show_comment==1)
{
	$incom->comment->lang=$lang;
    $incom->comment->get_params();
}


// die("hello");

// вывод
$incom->actions->index();

