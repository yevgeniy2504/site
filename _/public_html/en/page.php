<? if ($_SERVER['REQUEST_URI'] === '/en/page/conference-halls')
{
        header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://www.hotel-uyut.kz/en/page/conference-halls117"); 
	exit(); 
} 
elseif ($_SERVER['REQUEST_URI'] === '')
{} ?>
<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
// версия
$incom->page->lang='en';
$incom->page->get_params();
if ($incom->page->show_comment==1)
{
	$incom->comment->lang='en';
    $incom->comment->get_params();
}
// вывод
$incom->page->index();