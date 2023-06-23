<?
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /kz/virtual-tour/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}
$lang="kz";
$title="АЛМАТЫДА ҚОНАҚ YЙI<br /> КЕШЕНI «УЮТ» - БІЗДІҢ<br /> КЕШЕНIН ВИРТУАЛДЫ ТУР";
$keywords="";
$description="Алматыдағы «Уют» қонақ үйімен танысу үшін виртуалды саяхат. Қызмет көрсетудің ең жоғары деңгейдегі заманауи қонақ үй кешеніне хабарласыңыз.";
$h1title = 'Виртуалдық айналым';
$hreflang1 = 'hreflang="en" href="http://www.hotel-uyut.kz/en/virtual_tour.php"';

 $hreflang2 = 'hreflang="ru" href="http://www.hotel-uyut.kz/ru/virtual_tour.php"';

 $hreflang3 = 'hreflang="zh" href="http://www.hotel-uyut.kz/zh/virtual_tour.php"';
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
<iframe style="width: 100%; height: 100%; min-height:660px;"  src="/uyut240619/kz.html"  frameborder="0"></iframe>
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>
