<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
@header('Content-Type: text/html;charset=UTF-8');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') && 
	isset($_POST['do']) && ($_POST['do'] == 'add_param')){
	
	// переменные	
	$id			= intval(@$_POST['id']);
	$val		= $ob->pr(@$_POST["value"]);
		
	mysql_query("update i_params set value='".$val."' where id=".$id."");	
	
exit;	
}
exit;