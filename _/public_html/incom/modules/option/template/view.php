<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php")?>
<?
$select=$ob->select("i_template",array("id"=>$_GET['id']),"");
$template_res=mysql_fetch_array($select);
$lang=$template_res['version'];
$title=$template_res['title'];
if (!empty($template_res["h1title"])) $h1title=$template_res["h1title"];
else $h1title=$title;
$keywords=$template_res['keywords'];
$description=$template_res['description'];
include_once($_SERVER['DOCUMENT_ROOT']."/incom/template/".$template_res['folders']."/header_".$template_res['version'].".php");
echo "#WORKAREA#";
include_once($_SERVER['DOCUMENT_ROOT']."/incom/template/".$template_res['folders']."/footer_".$template_res['version'].".php");
?>