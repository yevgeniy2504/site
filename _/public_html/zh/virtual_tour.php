<?
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /zh/virtual-tour/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}
$lang="zh";
$title="虚拟旅游 舒适 宾馆 (УЮТ) 阿拉木图";
$keywords="虚拟旅游 舒适 宾馆 (УЮТ) 阿拉木图";
$description="虚拟旅游 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11";
$h1title='虚拟旅游 ';
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<!--<script src="/vtour/ar-vtour.js"></script>
<div id="pano" style="width:905px; height:523px;">
	<noscript>
    	<table style="width:100%;height:100%;">
        	<tr style="valign:middle;">
            	<td><div style="text-align:center;">ERROR:<br/><br/>Javascript not activated<br/><br/></div></td>
			</tr>
		</table>
	</noscript>
</div>
<script type="text/javascript">
	embedpano({swf:"/vtour/ar-vtour.swf", xml:"/vtour/u1_ru.xml", target:"pano"});
</script>-->
<iframe style="width: 100%; height: 100%; min-height:660px;"  src="/uyut240619/ch.html"  frameborder="0"></iframe>
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>
