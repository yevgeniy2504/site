<?
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /virtual-tour/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}

$lang="ru";
$title="Виртуальный тур по нашему комплексу - Гостиничный комплекс «УЮТ» в Алмате";
$keywords="Виртуальный тур";
$description="На нашем сайте Вы сможете найти подробный виртуальный тур по нашему комплексу - Гостиничный комплекс элитного класса «УЮТ»";
$h1title='Виртуальный тур';
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
<!-- <iframe style="width: 100%; height: 100%; min-height:660px;"  src="/uyut/ru.html"  frameborder="0"></iframe> -->
<iframe style="width: 100%; height: 100%; min-height:660px;"  src="/uyut240619/ru.html"  frameborder="0"></iframe>
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>