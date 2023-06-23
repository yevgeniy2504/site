<?

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");

// версия

$incom->catalog->lang='zh';

$incom->catalog->get_params();

if ($incom->catalog->show_comment==1)

{

	$incom->comment->lang='zh';

    $incom->comment->get_params();

}

// вывод
// die("hello");

$incom->catalog->index();