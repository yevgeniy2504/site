<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
if( !isset($_GET['print']) )
{
	include_once($_SERVER['DOCUMENT_ROOT']."/incom/template/".$res_template['folders']."/footer_".$lang.".php");
	if ($ob->check_admin())
	{
?>
<script src="/admin_script.js" type="text/javascript"></script>
<link href="/admin_css.css" rel="stylesheet" type="text/css" />
<div id="admin_opaco" class="admin_hidden"></div>
<div id="admin_window" style="display:none;">
	<div id="admin_windowTop">
		<div id="admin_windowTopContent"></div>
		<img src="/incom/images/window_close.jpg" id="admin_windowClose" />
	</div>
	<div id="admin_windowBottom"><div id="admin_windowBottomContent">&nbsp;</div></div>
	<div id="admin_windowContent"></div>
</div>
<div id="admin_opaco1" class="admin_hidden"></div>
<div id="admin_window1">
<div id="admin_windowContent1"></div>
</div>
<?	
	}
}
else echo '</body></html>';
?>