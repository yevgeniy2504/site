<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
$_SESSION["version"]=$_GET["lang"];
if(@$_GET['id'])
{
	$ob->del_r("i_block_elements",array("id"=>@$_GET['id']));
}
?>
<script>
window.parent.location.reload();
</script>