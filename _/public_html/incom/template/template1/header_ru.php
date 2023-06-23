<?php







$catalogCheckBr = explode('?',$_SERVER['REQUEST_URI']);

$arrrr = explode('/', $catalogCheckBr[0]);

if (($arrrr[1] == 'catalog') && ($arrrr[3])) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /".$arrrr[1].'/'.$arrrr[3].'/');
}




$actionsCheckBr = explode('?',$_SERVER['REQUEST_URI']);
$arrrr2 = explode('/', $actionsCheckBr[0]);
if (($arrrr2[1] == 'actions') && ($arrrr2[3])) {
echo 'Red';
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /".$arrrr2[1].'/'.$arrrr2[3].'/');
}





if ($_SERVER['REQUEST_URI'] == '/guest/?p=1')  {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /guest/");
}

//header('Last-Modified: '. @$LastModified);
function check_smartphone()
{
	$phone_array = array('iphone', 'android', 'ipod', 'samsung', 'htc_', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
	$agent = strtolower( @$_SERVER['HTTP_USER_AGENT'] );
	foreach ($phone_array as $value) {
		if ( strpos($agent, $value) !== false ) return true;
	}
	return false;
}
if (check_smartphone() == true)
{
	
$mobeli_redirect = explode('?',$_SERVER['REQUEST_URI']);
$linkEndif = $mobeli_redirect[0];


	
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: https://m.hotel-uyut.kz".$linkEndif);
	exit();
}
$LastModified_unix = strtotime(date("D, d M Y H:i:s", filectime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
$IfModifiedSince = false;

if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
	$IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
	$IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
	exit;
}

// $_SESSION['title'] =$title;
// $ob->alert($h1title);

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NR5BGTL');</script>
<!-- End Google Tag Manager -->



	<meta name="yandex-verification" content="8fe011c7e977cbfb" />
	<meta name="google-site-verification" content="gOYhO_J2VuZc9E4InNgHAZZfUcL8QZYi6CYBs2DiGj8" />
	<?php include_once($_SERVER['DOCUMENT_ROOT']."/incom/seo/seo_ru.php"); ?>
	
	
	<title><?
		$uri = $_SERVER['REQUEST_URI'];
		

		
		$lastSymbol = substr($uri, -1);
		if(substr($uri, 0, 10) == '/guest/?p='){
			echo "Отзывы гостей, посетивших гостиницу &quot;Уют&quot; в Алматы - Страница №$lastSymbol";
		}else{
			echo htmlspecialchars($title);
		}
		?></title>
		<?php 
		if(substr($uri, 0, 16) == '/ru/guest.php?p=' && isset($_GET['p']) && !empty($_GET['p'])){
			echo '<meta name="description" content="Отзывы гостей, посетивших гостиницу “Уют” в Алматы. Обращайтесь в самый современный гостиничный комплекс с высоким уровнем сервиса. Отель “Уют“ ждет Вас! Звоните: (727) 279-51-11 – Страница '.$_GET['p'].'" />';
		}else{
		?>
	<meta name="description" content="<?

		if(substr($uri, 0, 10) == '/guest/?p='){
			echo "Отзывы гостей, посетивших гостиницу &amp;laquo;Уют&amp;laquo; в Алматы. Обращайтесь в самый современный гостиничный комплекс с высоким уровнем сервиса. Отель &amp;laquo;Уют&amp;laquo; ждет Вас! Звоните: (727) 279-51-11. Страница №$lastSymbol";
		}else{
			echo htmlspecialchars($description);
		}
																		?> " />
		<?php } ?>
	<meta name="keywords" content="<?

		if(substr($uri, 0, 10) == '/guest/?p='){
			echo "отзывы гостей посетивших гостиницу уют алматы  cтраница $lastSymbol";
		}else{
                echo htmlspecialchars($keywords);
		}
																		?>" />
	<meta http-equiv = "X-UA-Compatible" content="IE=11" />
	<meta name="autor" content="Umit" />
	<link rel="alternate" <?=@$hreflang1?> />
	<link rel="alternate" <?=@$hreflang2?> />
	<link rel="alternate" <?=@$hreflang3?> />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link href="/incom/template/template1/css/style.css?v=1.0.1" rel="stylesheet" type="text/css" />
	<link href="/incom/template/template1/css/superfish.css" rel="stylesheet" type="text/css" />

<style>

    #reviewStars-input input:checked ~ label, #reviewStars-input label, #reviewStars-input label:hover, #reviewStars-input label:hover ~ label {
      background: url('/upload/stars.png') no-repeat;
      background-size: 80% !important;
    }

    #reviewStars-input {

      overflow: hidden;
      *zoom: 1;

      position: relative;
      float: left;
    }

    #reviewStars-input input {
      filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
      opacity: 0;

      width: 30px;
      height: 22px;

      position: absolute;
      top: 0;
      z-index: 0;
    }

    #reviewStars-input input:checked ~ label {
      background-position: 0 -45px !important;
      height: 22px;
      width: 30px;
    }

    #reviewStars-input label {
      background-position: 0 0;
      background-size: 80%;
      height: 22px;
      width: 30px;
      float: right;
      cursor: pointer;
      margin-right: 4px;

      position: relative;
      z-index: 1;
    }

    #reviewStars-input label:hover, #reviewStars-input label:hover ~ label {
      background-position: 0 -45px !important;
      height: 22px;
      width: 30px;
    }

    .tooltip {
      position: relative;
      display: inline-block;
      border-bottom: 1px dotted black;
    }

    .tooltip + .tooltiptext {
      visibility: hidden;
      top: -9999px;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      padding: 5px 0;
      border-radius: 6px;
      position: absolute;
      z-index: 1;
    }


    .tooltip:hover + .tooltiptext {
      visibility: visible;
    }



  </style>

	<style type="text/css">
	body { color: #e8e8e8; }
	#content { background-color:#4b3317 }
	#dop_menu ul li a:hover { color:#000 !important }
	#dop_menu { background-color:#3d210c }
	#footer { background-color:#3d210c }
	#content div.index div#right { background-color:#331400 }
	#weather, #langs, #langs a { color:#c1835c }
	#slide_name { background:none rgba(63, 32, 12, 0.75); }
	#sp{cursor:pointer;}
</style>
<? 
$urlvr = explode('?', $_SERVER['REQUEST_URI']);
if ($urlvr[0] == '/') { ?>
<?
$s=mysql_query("SELECT * FROM i_block_elements WHERE id_section=11 AND slide_show=1 AND slide_img!='' AND version='".$lang."' ORDER BY slide_sort ASC");
if (mysql_num_rows($s)>0)
{
	$i=1;
	?>
	<script type="text/javascript" src="/incom/template/template1/js/script.js"></script>
	<script type="text/javascript">
		var photos = [
		<?
		while($r=mysql_fetch_array($s))
		{
			?>
			{
				"image" : "<?=stripslashes($r["slide_img"])?>",
				"url" : "/about-us-12/",
				"firstline" : "<?=stripslashes($r["slide_name1"])?>",
				"secondline" : "<?=stripslashes($r["slide_name2"])?>"
			}
			<?
			if ($i!=mysql_num_rows($s))	 { echo ','; }
			$i++;
		}
		?>
		];

	</script>
	<?
}
?>
<? } ?>


	<?
//==============================================END===================================================BANNER
	?>


		<style type="text/css">
		.close_x {
			background: url(/incom/template/template1/images/close_x.png) no-repeat scroll 0 0 transparent;
			cursor: pointer;
			height: 20px;
			position: absolute;
			right: 10px;
			top: 10px;
			width: 20px;
			z-index: 99;
		}

	.soc_links{text-align: center; margin-right: 7%;float: right;color: #fff;}
	.soc_links img{margin-bottom: -8px;}
</style>
	
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '267463834696353');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=267463834696353&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91683926-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-91683926-1');
</script>

<!-- start TL head script -->
    <script type='text/javascript'>
        function getParameterByName(name, url) {
            if (!url) {
                url = window.location.href;
            }
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[#&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        var tldate = getParameterByName('date');
        var tlnights = getParameterByName('nights');
        var tladults = getParameterByName('adults');
        var tlroomtype = getParameterByName('room-type');
        var tlchildren = getParameterByName('children-age');
        var tlaccesscode = getParameterByName('access-code');
        var tlspecialoffer = getParameterByName('special-offer');

        (function(w) {
            var q = [
                ['setContext', 'TL-INT-uyut-almati.new-form', 'ru'],
                ['embed', 'search-form', {container: 'tl-search-form'}],
                ['embed', 'booking-form', {container: 'tl-booking-form',
                    date: tldate,
                    nights: tlnights,
                    adults: tladults,
                    roomType: tlroomtype,
                    childrenAge: tlchildren,
                    accessCode: tlaccesscode,
                    specialOffer: tlspecialoffer
                }]
            ];
            var h=["kz-ibe.tlintegration-as.com","ibe.tlintegration-as.com","ibe.tlintegrationfb-as.com"];
            var t = w.travelline = (w.travelline || {}),
                ti = t.integration = (t.integration || {});
            ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
            if (!ti.__loader) {
                ti.__loader = true;
                var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
                function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
                (function l(h) {
                    if (0===h.length) return; var s=d.createElement("script");
                    s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
                    s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
                })(h);
            }
        })(window);
    </script>
    <!-- end TL head script -->

    <link href="/incom/travelline-style.css" rel="stylesheet" type="text/css" />

    <!-- start reputation form 2.0 -->
    <script type="text/javascript">
        (function (w) {
            var q = [
                ['setContext', 'TL-INT-uyut-almati', 'ru'],
                ['embed', 'reputation-widget', {container: 'tl-reputation-widget'}]
            ];
            var h=["kz-ibe.tlintegration-as.com","ibe.tlintegration-as.com","ibe.tlintegrationfb-as.com"];
            var t = w.travelline = (w.travelline || {}),
                ti = t.integration = (t.integration || {});
            ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
            if (!ti.__loader) {
                ti.__loader = true;
                var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
                function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
                (function l(h) {
                    if (0===h.length) return; var s=d.createElement("script");
                    s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
                    s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
                })(h);
            }
        })(window);
    </script>
    <!-- end reputation form 2.0 -->

</head>
<body<?php if ($_SERVER['REQUEST_URI'] == '/booking/') { ?> class="booking-page"<?php } ?>>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
ym(42688734, "init", {
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true
});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42688734" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<style>
body {
  background: #3F220E !important;
}
</style>


 <!--<div id="banner"><img src="/upload/new_banner.jpg"></div>

<div>


</div>-->
<?
$urlvr = explode('?', $_SERVER['REQUEST_URI']);
//============================ СПЛЫВАЮЩИЙ БАНЕР НА ГЛАВНОЙ СТРАНИЦЕ ============================ BANNER
if ($urlvr[0]=='/')
{
	?>
	<script type="text/javascript">

		$(function(){
			if($.browser.msie)
			{
				$('#opaco2').height($(document).height()).toggleClass('hidden');
			}
			else
			{
				$('#opaco2').height($(document).height()).toggleClass('hidden').fadeTo('slow', 0.7);
			}
			<? if (@$_SESSION["iin"]!=1){ ?>
				$('#pr').show();
				<? } ?>
		//	закрытие окна
		//	закрытие окна
		$("#opaco2").click(function()

		{
			$.post('/ru/feedback.php',{do:'iin', x:'secure'}, function(){

			})
			$('#opaco2').toggleClass('hidden').removeAttr('style');
			$.cookie('inn', '1', { expires: 1, path: '/' });
			$('#pr').hide();
		});
	});
		function cl_pr(){
			$('#opaco2').toggleClass('hidden').removeAttr('style');
			$.cookie('inn', '1', { expires: 1, path: '/' });
			$('#pr').hide();
			$.post('/ru/feedback.php',{do:'iin', x:'secure'}, function(){

			})
		}
		function go_to(){
			$.cookie('inn', '1', { expires: 1, path: '/' });
			$.post('/ru/feedback.php',{do:'iin', x:'secure'}, function(){

			})
			location.href='/ru/page/goryachie-predlozheniya';
		}
	</script>
	<?
	$s=mysql_query("SELECT * FROM i_block_elements WHERE rec_act1=1 AND id_section=130 AND version='".$lang."' LIMIT 1");
	if (mysql_num_rows($s)>0)
	{
		?>
		<!-- <div id="pr"  style="  width:310px; background:#fff; height:259px; position:fixed; top:52%; left:50%;  margin-left:-145px; margin-top:-177px; display:none; z-index:2147483647; border-radius:15px; -moz-border-radius:15px; -webkit-border-radius:15px; "> -->
		<div id="pr"  style="  width:415px; background:#fff; height:334px; position:fixed; top:50%; left:50%;  margin-left:-225px; margin-top:-177px; display:none; z-index:2147483647; border-radius:15px; -moz-border-radius:15px; -webkit-border-radius:15px; ">
		<!-- <div id="pr"  style="  width:448px; background:#fff; height:344px; position:fixed; top:50%; left:50%;  margin-left:-225px; margin-top:-177px; display:none; z-index:2147483647; border-radius:15px; -moz-border-radius:15px; -webkit-border-radius:15px; "> -->
			<a href="javascript:cl_pr()" style="right:-7px; z-index:999; position: absolute; top: -7px;"><img alt="" src="/incom/template/template1/images/pr_cl.png" /></a>

			<div id="slideholder" style="margin:5px 5px">
				<div id="slide_holder" >
					<?
			//echo '<a></a>';
					while($r=mysql_fetch_array($s))
					{
						echo '
						<a style="width:auto; height:auto;" '.(trim($r["banner_link1"]) !='' ? 'href="'.$r["banner_link1"].'"' : '').'>
						<img src="/upload/images/'.$r["rec_img1"].'" style="width:100%;" alt="" />
						</a>
						';
						echo '
						<a style="width:auto; height:auto;" '.(trim($r["banner_link1"]) !='' ? 'href="'.$r["banner_link1"].'"' : '').'>
						<img src="/upload/images/'.$r["rec_img1"].'" style="width:100%;" alt="" />
						</a>
						';
						$i++;
					}
					?>
				</div>
			</div>
			<script type="text/javascript" src="/incom/template/template1/js/jquery.slideshow.lite-0.5.3.js"></script>
			<script type="text/javascript">
				$('#slide_holder').slideshow({width:440, height:335, pauseSeconds:7, caption:false});
			</script>
		</div>
		<?
	}
	?>

	<?
}

?>
<?


if (!isset($_COOKIE['andr'])||$_COOKIE['andr'] != '1')
{
	if(strstr(@$_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr(@$_SERVER['HTTP_USER_AGENT'],'iPad')  || strstr(@$_SERVER['HTTP_USER_AGENT'],'Android'))
	{
		if(strstr(@$_SERVER['HTTP_USER_AGENT'],'iPhone'))
		{

		}
		else if(strstr($_SERVER['HTTP_USER_AGENT'],'Android'))
		{
			?>
			<div style="margin:20px auto; width:700px; border:1px solid #ccc; padding:15px 0; box-shadow: 0 0 10px 0 #000000; background:none rgba(255, 255, 255, 1); color:#000; position:relative" id="androidinstall">
				<a class="close_x" onclick="javascript: close_android_window();"></a>
				<div style="width:600px; margin:0 auto;">
					<div style="float:left; width:200px">
						<a href="https://play.google.com/store/apps/details?id=com.app_hoteluyut.layout" style=""><img height="88" width="176" title="" alt="App-store" src="/upload/iPd-app_dl3.png" style=""></a>
					</div>
					<div style="float:left; width:400px;">
						<h1 style="margin:5px 0 5px; line-height:15px">Отель Уют <span style="text-transform:none">для Android</span></h1>
						<p style="margin:5px 0; padding:0">
							<a href="https://play.google.com/store/apps/details?id=com.app_hoteluyut.layout" >Установите</a> бесплатное приложение <?=$_SERVER["HTTP_HOST"]?>.
						</p>
					</div>
					<div style="clear:both; overflow:hidden; width:1px; height:1px;"></div>
				</div>
			</div>
			<script type="text/javascript">
				function close_android_window() { jQuery.cookie('andr', '1', { expires: 1, path: '/' }); jQuery('#androidinstall').slideToggle("slow"); }
			</script>
			<?
		}
		else if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))
		{

		}
	}
}
?>

<div id="main">
	<div id="header"<?

     $urlvr = explode('?', $_SERVER['REQUEST_URI']);
	 //$urlvr[0] = $_SERVER['REQUEST_URI'];
	if ($urlvr[0] != '/') { ?> class="head"<? } ?>>
		<? if ($urlvr[0] == '/') { ?>
		<div id="headerimgs">
			<div id="headerimg1" class="headerimg"></div>
			<div id="headerimg2" class="headerimg"></div>
		</div>
		<? } ?>
		<div class="top">
			<div class="main">
				<div class="head_address" style="margin-top: -5px;">
					<span class="head_address_text" style="vertical-align: top;"><a href="/kontakty613/"> г. Алматы, ул.Гоголя, 127/1, уг.пр.Сейфуллина</a></span>
					<span class="booking_phone">Бронирование: <a href="tel:+77272795111">+7 (727) 279-51-11</a><br>
						почта: <a href="mailto:reservation@hotel-uyut.kz">reservation@hotel-uyut.kz</a></span>
				</div>
				<a class="logo" href="/">ОТЕЛЬ УЮТ</a>
				<div id="menu">
					<?
					echo $incom->menu->get_main_menu($lang,10,'block');
					if($ob->check_admin())
						$incom->menu->edit($lang,10,'block');
					?>
				</div>
				<?
				function extractParams($str)
				{
					$out = array();
					if(preg_match_all("/(\S+)=\"(.+?)\"(\s|$)/sm", $str, $ok))

						for($i=0; $i<count($ok[0]); $i++){
							$out[$ok[1][$i]] = $ok[2][$i];
						}

						return $out;
					}

					function parseWeather($str)
					{
						if(preg_match_all("/<FORECAST\s([^>]+)>(.+?)<\/FORECAST>/sm", $str, $ok))
						{
							$out = array();
							foreach($ok[2] as $key=>$value)
							{
								$out[$key]['_params_'] = extractParams($ok[1][$key]);
								if(preg_match_all("/<(\S+)\s([^\/]+)\/>/sm", $value, $params))
								{
									foreach($params[1] as $k => $v)
									{
										$out[$key]['_inc_'][$v]=extractParams($params[2][$k]);
									}
								}
								else echo "GO AWAY MAN!";
							}
							return $out;
						}
					}

					function getWeather(){
						return @parseWeather( file_get_contents("http://informer.gismeteo.ru/xml/36870_1.xml") );
					}

					function parseCurrency($xml)
					{
						if(!$xml) return null;
						$out = array();
						if( preg_match_all("/<item>(.+?)<\/item>/sm", $xml, $ok) )
						{
							foreach($ok[1] as $key=>$value)
							{
								$temp = array();
								if(preg_match_all("/<(\S+)>(.+?)<\/\\1>/sm", $value, $params))
								{
									foreach($params[1] as $k => $v)
									{
										$temp[$v]=$params[2][$k];
									}
									$out[ $temp['title'] ] = $temp;
								}
							}
						}
						return $out;
					}

					function getCurrency(){
						return @parseCurrency( file_get_contents("https://www.nationalbank.kz/rss/rates_all.xml") );
					}

					$w_al = getWeather();
					$currency = getCurrency();
					$time = time();
					$days = array("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота");
					$months = array(1=>'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
					$p_icons = array('<img src="/w/sun.png" alt="" />', '<img src="/w/clouds.png" alt="" />', '<img src="/w/clouds.png" alt="" />', '<img src="/w/dojd.png" alt="" />');

					$usd = '';
					$rub = '';
					$eur = '';
					if(is_array($currency))
					{
						$usd = $currency['USD']['description'];
						$rub = $currency['RUB']['description'];
						$eur = $currency['EUR']['description'];
					}
					?>
					<div id="weather">
						<? if(is_array($w_al)) { ?>
						Погода  в Алматы<br />
						<?=(array_key_exists($w_al[1]['_inc_']['PHENOMENA']['cloudiness'], $p_icons) ? $p_icons[$w_al[1]['_inc_']['PHENOMENA']['cloudiness']] : '<img alt="" src="/w/sun.png" alt="" style=" vertical-align:middle;margin-bottom:-7px;" />')?>&nbsp<?=($w_al[1]['_inc_']['TEMPERATURE']['min']>0 ? "+" : "").$w_al[1]['_inc_']['TEMPERATURE']['min'].($w_al[1]['_inc_']['TEMPERATURE']['max']>0 ? "&nbsp;+" : "&nbsp;").$w_al[1]['_inc_']['TEMPERATURE']['max']?>&nbsp;C<sup>0</sup>&nbsp;
						<? } ?>
					</div>
					<div id="langs">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td onclick="changecurrency('USD')">USD</td>
								<td onclick="changecurrency('RUB')">RUB</td>
								<td onclick="changecurrency('EUR')">EUR</td>
							</tr>
							<tr>
								<td><span><?=$usd?></span></td>
								<td><span><?=$rub?></span></td>
								<td><span><?=$eur?></span></td>
							</tr>
						</table>
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td><a href="/en/" class="lang"><img alt="" src="/incom/template/template1/images/en.png" /></a></td>
								<td><a class="lang active"><img alt="" src="/incom/template/template1/images/ru.png" /></a></td>
								<td><a href="/kz/" class="lang"><img alt="" src="/incom/template/template1/images/kz.png" /></a></td>
								<td><a href="/zh/" class="lang"><img alt="" src="/incom/template/template1/images/zh.png" /></a></td>
							</tr>
							<tr>
								<td><a href="/en/">eng</a></td>
								<td><span>рус</span></td>
								<td><a href="/kz/">каз</a></td>
								<td><a href="/zh/">zho</a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function changecurrency(to){
					document.cookie = "currency="+to;
					location.reload();
					// alert(document.cookie);
				}
			</script>
			
			<?php $urlvr = explode('?', $_SERVER['REQUEST_URI']);
				
				

			?>
			
			<? if ($urlvr[0] == '/') { ?>
            <!-- start TL Search form -->
            <div id='block-search' class='block-search-main'>
                <div id='tl-search-form' class='tl-container'></div>
            </div>
            <!-- end TL Search form -->
			<div class="bottom">
				<div class="main">
					<div id="tl-reputation-widget"></div>

					<div id="slide_name">
						<div class="caption">
							<a href="#" id="firstline"></a>
							<a href="#" id="secondline"></a>
						</div>
					</div>
					<div id="headernav-outer">
						<div id="back" class="btn"></div>
						<div id="next" class="btn"></div>
					</div>
				</div>
			</div>
			<? } ?>
		</div>
		<div id="content">
			<div id="dop_menu">
				<div class="main">
					<?
					echo $incom->menu->get_simple_menu_li($lang,18,'block');
					if($ob->check_admin())
						$incom->menu->edit($lang,18,'block');
					?>
				</div>
			</div>
			<?

			$urlvr = explode('?', $_SERVER['REQUEST_URI']);
			if ($urlvr[0] != '/' && $urlvr[0] != '/booking/') { ?>
            <!-- start TL Search form -->
            <div id='block-search'>
                <div id='tl-search-form' class='tl-container'></div>
            </div>
            <!-- end TL Search form -->
			<? } ?>
			<div class="main">
				<? 
				$urlvr = explode('?', $_SERVER['REQUEST_URI']);
				if ($urlvr[0] == '/') { ?>
				<div class="soc_links">
					<div  style="right: 360px; position: absolute; margin-top: 0px;">
						<!--noindex-->

							<!--<!<a href="https://www.booking.com/hotel/kz/uyut.html" target="_blank"><img alt="" src="/incom/template/template1/images/booking.png" style="margin-right: 20px; height: 32px; "/></a>-->

							<img alt="" src="/incom/template/template1/images/booking.png" style="margin-right: 20px; height: 32px; "/>


						<!--/noindex-->
<!--						<a href="https://www.tripadvisor.ru/Hotel_Review-g298251-d1151086-Reviews-Uyut_Hotel-Almaty.html" target="_blank"><img alt="" src="/incom/template/template1/images/tripadvisor.png" style="height: 32px; "/></a>-->
						<a><img alt="" src="/incom/template/template1/images/tripadvisor.png" style="height: 32px; "/></a>
					</div>
					Подписывайтесь:&nbsp;
					<a href="https://www.instagram.com/uyut_hotel/" target="_blank"><img alt="" src="/incom/template/template1_en/images/insta.png" /></a>
					<a href="https://www.facebook.com/uyuthotel" target="_blank"><img alt="" src="/incom/template/template1_en/images/fc.png" /></a>
					<a href="https://vk.com/uyut_hotel" target="_blank"><img alt="" src="/incom/template/template1_en/images/vk.png" /></a>
				</div>

				<div class="clear"></div>
				<? } ?>

				<? 
				$urlvr = explode('?', $_SERVER['REQUEST_URI']);
				if ($urlvr[0] != '/') { ?>

				<?php } ?>
				<div id="wraper"<?

				$urlvr = explode('?', $_SERVER['REQUEST_URI']);
				if ($urlvr[0] != '/') { ?> class="margT40"<? }?>>
					<? if ($urlvr[0] == '/') { ?>
					<div class="index">
						<div id="left">

							<?
							$s=mysql_query("select * from i_block_elements where id=1");
							$r=mysql_fetch_array($s);
							$seo_h1_title = stripslashes($r["h1title"]);
							
							$text = explode('{rooms}', $r["page_text"]);
							  
							$sql = "select * from i_block_elements where id_section=2 and version='$lang' and catalog_act=1 order by catalog_sort asc limit 6";
							$s = mysql_query($sql);
							if ($s && mysql_num_rows($s)>0){
								$i=1;
								echo '<div  style="padding:0px 20px 0px 0px;">';
								while ($r = mysql_fetch_array($s)) {
									?>
									<div class="room_cat" style="<?=($i==2?'margin-right:0px;':'')?>">
										<div class="name"><a href="/catalog/<?=$r["translit_name"]?>/" style="font-size: 18px;"><?=$r["catalog_name"]?></a></div>
										<div class="image"><a class="linknoindex1" data-href="/catalog/<?=$r["translit_name"]?>/"><img src="/upload/images/big/<?=$r["catalog_img"]?>" alt="забронировать отель, снять гостиницу в алматы, снять номер в гостинице алматы, забронировать гостиницу в алматы, забронировать номер в отеле, забронировать отель в алматы, снять отель в алматы, бронирование отелей сайты, бронирование отель онлайн, бронь отелей сайты, забронировать гостиницу алматы, забронировать гостиницу онлайн, забронировать номер в гостинице, забронировать отель онлайн, отели забронировать онлайн, отель алматы официальный сайт, снять номер в алматы, снять номер в гостинице, снять номер в гостинице в алматы, снять номер в отеле, снять номер в отеле на месяц, снять номер в отеле на сутки" /></a></div>
										<div class="anounce"><?=$r["catalog_anounce"]?></div>

									</div>
									<?
									if ($i==2) $i=0;
									$i++;
								}
								echo '</div>';
							}
							
							
							echo '<h1 class="title1">'.$seo_h1_title.'</h1>';
							echo stripslashes($text[0]); 	
							
							
							$s=mysql_query("select * from i_block_elements where id=11111");
							$r=mysql_fetch_array($s);
							$text = explode('{rooms}', $r["page_text"]);
							echo stripslashes($text[0]);
							echo stripslashes(@$text[1]);
							if ($ob->check_admin()) { $incom->page->edit($lang, 'element', $r["id"]); }
							?>
						</div>
						<div id="right">

							<span style="font-size: 26px; display: block;
							line-height: 30px;
							text-transform: uppercase;
							padding: 0 0 30px;
							font-weight: 300;">Акции <a href="/actions/" style="text-decoration:underline; font-size: 14px; margin-top: 5px; float:right;">Все акции</a></span>
							<?
							$sql = "select * from i_block_elements where id_section=113 and version='$lang' and cat_act=1 order by cat_sort asc limit 1";
							$s = mysql_query($sql);
							if ($s && mysql_num_rows($s)>0){
								while ($r = mysql_fetch_array($s)) {
									?>
									<div class="room_cat" style="width: 100%; text-align: left;">
										<a  data-href="/actions/<?=$r["translit_name"]?>/" class="linknoindex1"><span class="name" style="display: block;"><?=$r["cat_name"]?></span>
											<? if ($r["cat_img"]!=''){ ?>
											<span class="image" style="display: block;"><img src="/upload/images/small/<?=$r["cat_img"]?>" alt="" /></span>
											<? } ?></a>
										</div>
										<?
									}
								}

								?>

								<img style="margin-bottom: 23px;" width="240" src="/upload/images/Триподвизор 2021 год награда УЮТ.png" alt="" />
								<img style="margin-bottom: 23px;" width="240" src="/upload/images/social_media.png" alt="" />
								<img style="margin-bottom: 23px;" width="240" src="/upload/images/2019_COE_Logos_Green-bkg_translations_ru_RU.png" alt="" />

								<img style="margin-bottom: 23px;" width="240" src="/upload/images/2018_COE_Logos_Green-bkg_translations_ru_RU.png" alt="" />
								<img style="margin-bottom: 23px;" width="235" src="/upload/images/uyut_new2.png" alt="" />



							<?

							$s=mysql_query("SELECT * FROM i_block_elements WHERE id=715");
								if (mysql_num_rows($s)>0)
								{
									$r=mysql_fetch_array($s);
									echo $r["page_text"];
								}

							?>


							</div>
							<div class="clear"></div>
						</div>
						<? } else { ?>
						<?
						
						$urlvr = explode('?', $_SERVER['REQUEST_URI']);
					if($urlvr[0] =='/sertifikaty.php'){
						$h1title = 'Сертификаты';
					}
if($urlvr[0]=='/vacancies/'){
						$h1title = 'Вакансии';
					}

					?>
						<?=$incom->breadcrumb($lang, $h1title)?>

						<table width="99%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left"><h1 class="title" style="width: 100%;"> <!-- seo  width: 60%;-->
									<?=$h1title;?>
								<?
								if(substr($uri, 0, 10) == '/guest/?p='){
									echo "- Страница $lastSymbol";
								}
								
								
								?>
								</h1></td>

							</tr>
						</table>

 <!-- <h1>Сертификаты</h1> -->
						<div style="position: absolute; top: 19px; right: 30px;">

   <!--noindex-->
    <!--<a href="https://www.booking.com/hotel/kz/uyut.html" target="_blank"><img src="/incom/template/template1/images/booking.png" style="height: 32px; "/></a>-->

 	<img src="/incom/template/template1/images/booking.png" style="height: 32px; "/>

    <!--/noindex-->

<!--    <a href="https://www.tripadvisor.ru/Hotel_Review-g298251-d1151086-Reviews-Uyut_Hotel-Almaty.html" target="_blank"><img src="/incom/template/template1/images/tripadvisor.png" style="height: 32px;"/></a>-->
    <a><img src="/incom/template/template1/images/tripadvisor.png" style="height: 32px;"/></a>

    <a href="https://www.instagram.com/uyut_hotel/" target="_blank"><img src="/incom/template/template1/images/insta.png" /></a>

    <a href="https://www.facebook.com/uyuthotel" target="_blank"><img src="/incom/template/template1/images/fc.png" /></a>

    <a href="https://vk.com/uyut_hotel" target="_blank"><img src="/incom/template/template1_en/images/vk.png" /></a>

</div>

						<? } ?>
						<!-- <h1 style="margin-left: 380px">Карта сайта</h1>  -->
