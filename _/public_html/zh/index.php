<? 
// die("hello");
$lang="zh";
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
$id_page = 94;
// die($_SERVER['REQUEST_URI']);

$s=mysql_query("select * from i_block_elements where id=$id_page");
$r=mysql_fetch_array($s);

if ($r["page_name"]!='') $title=$r["page_name"]; 
if ($r["page_keyw"]!='') $keywords=$r["page_keyw"]; 
if ($r["page_desc"]!='') $description=$r["page_desc"]; 
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<br style="clear: both">
<?
$s=mysql_query("select * from i_block_elements where id=$id_page");
$r=mysql_fetch_array($s);
//echo stripslashes($r["page_text"]);
// редактирование если авторизован
if ($ob->check_admin())
{
	//$incom->page->edit($lang, 'element', $r["id"]);
}

?>

<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>