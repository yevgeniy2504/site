<?php





if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 97)) {
 $description = "酒店宴会厅的照片，餐厅的照片";
} 












if ($_SERVER['REQUEST_URI'] == '/zh/guest/?p=1')  {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: /zh/guest/");
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

@header('Last-Modified: '. $LastModified);

?>
<?
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
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: https://m.hotel-uyut.kz");
	exit();
}
$_SESSION['title'] =$title;

include_once($_SERVER['DOCUMENT_ROOT']."/incom/seo/seo_zh.php");
if ($_SERVER['REQUEST_URI'] == '/zh/virtual-tour/') {
  $meta_info['desc'] = "虚拟游览，酒店3D游览。";
} 

if ($_SERVER['REQUEST_URI'] == '/zh/') {
 $meta_info['desc'] = "宾馆为现代化商务级别公寓的卓越代表。游客、商人或出差的人士若预定了本宾馆（位于市中心），则无须花时间在阿拉木图长久找寻住宿的地方。宾馆所在地有发达的商业、服务基础设施，与阿拉木图国际机场（乘坐汽车需20-25分钟）、火车站（乘坐汽车需10分钟）间有便捷的交通。";
} 
if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 99)) {
 $meta_info['desc'] = "酒店相册。 我们房间，健身中心，餐厅的实际照片。";
}

if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 98)) {
 $meta_info['desc'] = "酒店的相册，大厅，酒吧，健身中心和房间的照片。 在这里您可以看到最新的照片。";
}

if ($_SERVER['REQUEST_URI'] == '/zh/guest/') {
 $meta_info['desc'] = "住客评语-真实住客和普通客户的评语。";
} 

if ($_SERVER['REQUEST_URI'] == '/zh/actions/') {
 $meta_info['desc'] = "促销和特别优惠。 所有新闻和折扣都在一页上";
} 

if ($_SERVER['REQUEST_URI'] == '/zh/actions/650/') {
 $meta_info['desc'] = "折扣和特殊服务计划/经济套餐。 有利可图的报价。";
} 

if ($_SERVER['REQUEST_URI'] == '/zh/virtual-tour/') {
 $meta_info['desc'] = "虚拟游览，酒店3D游览。";
} 


if ($_SERVER['REQUEST_URI'] == '/zh/gall.php') {
 $meta_info['desc'] = "酒店图片，套房图片，小型套房，标准和舒适的图片.";
} 



if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 97)) {
 $meta_info['desc'] = "资组合。照片会议厅  舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11";
}


if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 96)) {
 $meta_info['desc'] = "酒店的照片-餐厅，宴会厅的照片。  舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11";
}


if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 92)) {
 $meta_info['desc'] = "一间双人卧室的酒店照片。 我们可以为您提供套房，豪华，舒适，经济和标准间。";
}

if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 93)) {
$meta_info['desc'] = "酒店图片-我们为您提供舒适的客房。 灵活的价格和舒适度。 致电和预订（727）279-51-11";
}

if ($_SERVER['REQUEST_URI'] == '/zh/actions/652/') {
$meta_info['desc'] = "УЮТ宾馆愿意为您生命最重要的日子之一献上我们的特殊服务。我们乐于为新婚夫妇承担起组织婚礼和房间的问题。爱和浪漫的氛围可以彰显您第一次、也是永久结合的魅力。";
}

if ($_SERVER['REQUEST_URI'] == '/zh/actions/658/') {
$meta_info['desc'] = "常客方案 我宾馆特针对常客推出了一款套餐。依据您的入住次数，我们会有相应的折扣和优惠。:";
}


if ($_SERVER['REQUEST_URI'] == '/zh/actions/pakage-guests_1354/') {
$meta_info['desc'] = "乌尤特酒店为您提供15％ 10间以上客房的客人可享受住宿折扣。 我们还提供10％";
}


if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 208)) {
$meta_info['desc'] = "旅馆房间的照片。 我们为普通客户提供灵活的折扣系统。 电话和电话预订：（727）279-51-11";
}


if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 103)) {
$meta_info['desc'] = "这家酒店很舒适，为您提供多种关税计划的住宿。 我们有套房，豪华，舒适，标准和经济客房。";
}


if (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 100)) {
$meta_info['desc'] = "这家酒店很舒适，为您提供多种关税计划的住宿。 我们有套房，豪华，舒适，标准和经济客房。 电话和电话预订：（727）279-51-11";
}

if ($_SERVER['REQUEST_URI'] == '/zh/guest/') {
$meta_info['desc'] = "真实访客对酒店大楼的评论。 您可以直接从网站预订房间。";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>

  <!-- <meta name="yandex-verification" content="8fe011c7e977cbfb" /> -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="yandex-verification" content="8fe011c7e977cbfb" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NR5BGTL');</script>
<!-- End Google Tag Manager -->


  <title><?=htmlspecialchars($title)?></title>
  <meta name="description" content="<?=htmlspecialchars($meta_info['desc'])?> " />
  <meta name="keywords" content="<?=htmlspecialchars($meta_info['keyw'])?>" />
  <meta http-equiv = "X-UA-Compatible" content="IE=11" />
  <meta name="autor" content="Umit">
  <link rel="alternate" <?=@$hreflang1?> />
  <link rel="alternate" <?=@$hreflang2?> />
  <link rel="alternate" <?=@$hreflang3?> />
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link href="/incom/template/template1_zh/css/style.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="/incom/template/template1_zh/js/superfish.js"></script>
  <link href="/incom/template/template1_zh/css/superfish.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="/incom/template/template1_zh/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="/incom/template/template1_zh/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

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

  <link rel="stylesheet" href="/incom/template/template1/js/flexslider/flexslider.css" type="text/css" media="screen" />
  <script defer src="/incom/template/template1/js/flexslider/jquery.flexslider.js"></script>
  <script defer src="/incom/template/template1/js/spoiler.js"></script>
  <script defer src="/incom/template/template1/js/noindex.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
     $('#spshopc').hide();
     $('#sp').click(function(){
       $(this).next().toggle();
     });

     $("a[type=image1]").fancybox();

     $("a[type=image]").fancybox({
      'titlePosition' :   'over',
      'onComplete'    :   function() {
        jQuery("#fancybox-wrap").hover(function() { jQuery("#fancybox-title").show(); }, function() {
          jQuery("#fancybox-title").show();
        });
      }

    });

     $("a[rel=image]").fancybox({
      'titlePosition' :   'over',
      'onComplete'    :   function() {
        jQuery("#fancybox-wrap").hover(function() { jQuery("#fancybox-title").show(); }, function() {
          jQuery("#fancybox-title").show();
        });
      }
    });

     $('#carousel').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: 90,
      itemMargin: 10,
      asNavFor: '#slider',
      prevText: "",
      nextText: ""
    });

     $('#slider').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      sync: "#carousel",
      prevText: "",
      nextText: "",
      start: function(slider){
        $('body').removeClass('loading');
      }
    });
   });
 </script>

 <style>
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

<? if ($_SERVER['REQUEST_URI'] == '/'.$lang.'/') { ?>
<?
$s=mysql_query("SELECT * FROM i_block_elements WHERE id_section=11 AND slide_show=1 AND slide_img!='' AND version='".$lang."' ORDER BY slide_sort ASC");
if (mysql_num_rows($s)>0)
{
 $i=1;
 ?>
 <script type="text/javascript" src="/incom/template/template1_zh/js/script.js"></script>
 <script type="text/javascript">
  var photos = [
  <?
  while($r=mysql_fetch_array($s))
  {
    ?>
    {
     "image" : "<?=stripslashes($r["slide_img"])?>",
     "url" : "<?=stripslashes($r["slide_link"])?>",
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
<style>
#slide_name {display:none;}
</style>
<? } ?>


<?
//============================ СПЛЫВАЮЩИЙ БАНЕР НА ГЛАВНОЙ СТРАНИЦЕ ============================ BANNER
/*if ($_SERVER['REQUEST_URI']=='/'.$lang.'/')
{
  */?><!--
  <script>
    $(function(){
    if($.browser.msie)
     {
       $('#opaco2').height($(document).height()).toggleClass('hidden');
     }
     else
     {
       $('#opaco2').height($(document).height()).toggleClass('hidden').fadeTo('slow', 0.7);
     }
    $('#pr').show();
		//	закрытие окна
		//	закрытие окна
		$("#opaco2").click(function()

		{
			$('#opaco2').toggleClass('hidden').removeAttr('style');
			$.cookie('inn', '1', { expires: 7, path: '/' });
			$('#pr').hide();
		});
  });
    function cl_pr(){
     $('#opaco2').toggleClass('hidden').removeAttr('style');
     $.cookie('inn', '1', { expires: 1, path: '/' });
     $('#pr').hide();
   }
   function go_to(){
     $.cookie('inn', '1', { expires: 1, path: '/' });
     location.href='/ru/page/goryachie-predlozheniya';
   }
 </script>
 <?/*
  die("SELECT * FROM i_block_elements WHERE rec_act=1 AND id_section=130 AND version='".$lang."' LIMIT 1");
 $s=mysql_query("SELECT * FROM i_block_elements WHERE rec_act1=1 AND id_section=130 AND version='".$lang."' LIMIT 1");
 if (mysql_num_rows($s)>0)
 {
  */?>
  background:url(/incom/template/template1_zh/images/hot.png) no-repeat left top;
  <div id="pr"  style=" <?php /*/*?>width:603px;<?php */?> width:448px; background:#fff; height:354px; position:fixed; top:50%; left:50%; <?php /*/*?>margin-left:-317px;<?php */?> margin-left:-225px; margin-top:-177px; display:none; z-index:2147483647; border-radius:15px; -moz-border-radius:15px; -webkit-border-radius:15px; behavior:url(/PIE.php); zoom:1;">
    <div style="width:510px; position:absolute; cursor:pointer; margin:20px auto; height:300px;" onclick="go_to();"></div>
    <a href="javascript:cl_pr()" style="right:-7px; z-index:999; position: absolute; top: -7px;"><img src="/incom/template/template1_zh/images/pr_cl.png"></a>
    <link rel="stylesheet" type="text/css" href="/incom/template/template1_zh/slideshow.css">
    <div id="slideholder" style="margin:5px 5px">
     <div id="slide_holder" >
      <?/*
			echo '<a></a>';
      while($r=mysql_fetch_array($s))
      {
        echo '
        <a style="width:auto; height:auto;" '.(trim($r["banner_link1"]) !='' ? 'href="'.$r["banner_link1"].'"' : '').'>
        <img src="/upload/images/'.$r["rec_img1"].'" style="width:106%;"/>
        </a>
        ';
        $i++;
      }
      */?>
    </div>
  </div>
  <script src="/incom/template/template1_zh/js/jquery.slideshow.lite-0.5.3.js"></script>
  <script type="text/javascript">
    $('#slide_holder').slideshow({width:440, height:335, pauseSeconds:7, caption:false});
  </script>
</div>
<?/*
}
*/?>

<?/*
}
*/?>
<script type="text/javascript">
$(document).ready(function() {

 var a=$('.b_img').parent();

 a.fancybox();


/*	$("a[rel=image]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {return '';}
	});*/
});
$(document).ready(function(){
          $(".paidOffers").paidTicker();
        });

</script>-->
        <?
//==============================================END===================================================BANNER
        ?>
	
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
                ['setContext', 'TL-INT-uyut-almati.new-form', 'zh'],
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
                ['setContext', 'TL-INT-uyut-almati', 'en'],
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
      <body<?php if ($_SERVER['REQUEST_URI'] == '/'.$lang.'/booking/') { ?> class="booking-page"<?php } ?>>
        <style>
        body {
          background: #3F220E !important;
        }
      </style>

        <script>
          jQuery.cookie = function (key, value, options) {
  // key and at least value given, set cookie...
  if (arguments.length > 1 && String(value) !== "[object Object]") {
    options = jQuery.extend({}, options);
    if (value === null || value === undefined) {
      options.expires = -1;
    }
    if (typeof options.expires === 'number') {
      var days = options.expires, t = options.expires = new Date();
      t.setDate(t.getDate() + days);
    }
    value = String(value);
    return (document.cookie = [
     encodeURIComponent(key), '=',
     options.raw ? value : encodeURIComponent(value),
      options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
      options.path ? '; path=' + options.path : '',
      options.domain ? '; domain=' + options.domain : '',
      options.secure ? '; secure' : ''
      ].join(''));
  }
  // key and possibly options given, get cookie...
  options = value || {};
  var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
  return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};</script>
<style>
.close_x {
  background: url(/incom/template/template1_zh/images/close_x.png) no-repeat scroll 0 0 transparent;
  cursor: pointer;
  height: 20px;
  position: absolute;
  right: 10px;
  top: 10px;
  width: 20px;
  z-index: 99;
}
</style>
<?
if (@$_COOKIE["andr"] != '1')
{
 if(strstr(@$_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr(@$_SERVER['HTTP_USER_AGENT'],'iPad')  || strstr(@$_SERVER['HTTP_USER_AGENT'],'Android'))
 {
  if(strstr(@$_SERVER['HTTP_USER_AGENT'],'iPhone'))
  {
   ?>
			<?php /*?><div style="margin:20px auto; width:700px; border:1px solid #ccc; background:none rgba(255, 255, 255, 1); color:#000; padding:15px 0; box-shadow: 0 0 10px 0 #000000; position:relative" id="iphoneinstall">
				<a class="close_x" onclick="javascript: close_iphone_window();"></a>
				<div style="width:600px; margin:0 auto;">
					<div style="float:left; width:200px">
						<a href="https://play.google.com/store/apps/details?id=com.app_hoteluyut.layout"><img height="88" width="176" title="" alt="App-store" src="/upload/iPd-app_dl2.png" style=""></a>
					</div>
					<div style="float:left; width:400px;">
						<h1 style="margin:5px 0 5px; line-height:15px">Отель Уют <span style="text-transform:none">для iPhone и iPad</span></h1>
						<p style="margin:5px 0; padding:0">
							<a href="https://play.google.com/store/apps/details?id=com.app_hoteluyut.layout" >Установите</a> бесплатное приложение <?=$_SERVER["HTTP_HOST"]?>.
						</p>
					</div>
					<div style="clear:both; overflow:hidden; width:1px; height:1px;"></div>
				</div>
			</div>
			<script type="text/javascript">
				function close_iphone_window() { $('#iphoneinstall').slideToggle("slow"); }
			</script><?php */?>
			<?
		}
		else if(strstr(@$_SERVER['HTTP_USER_AGENT'],'Android'))
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
		else if(strstr(@$_SERVER['HTTP_USER_AGENT'],'iPad'))
		{
			?>
			<?php /*?><div style="margin:20px auto; width:700px; border:1px solid #ccc; padding:15px 0; box-shadow: 0 0 10px 0 #000000; position:relative" id="ipadinstall">
				<a class="close_x" onclick="javascript: close_ipad_window();"></a>
				<div style="width:550px; margin:0 auto;">
					<div style="float:left; width:200px">
						<a href="https://play.google.com/store/apps/details?id=com.app_hoteluyut.layout"><img height="88" width="176" title="" alt="App-store" src="/upload/iPd-app_dl2.png" style=""></a>
					</div>
					<div style="float:left; width:350px;">
						<h1 style="margin:10px 0 5px">Отель Уют <span style="text-transform:none">для iPhone и iPad</span></h1>
						<p>
							<a href="https://play.google.com/store/apps/details?id=com.app_hoteluyut.layout" >Установите</a> бесплатное приложение <?=$_SERVER["HTTP_HOST"]?>.
						</p>
					</div>
					<div style="clear:both; overflow:hidden; width:1px; height:1px;"></div>
				</div>
			</div>
			<script type="text/javascript">
				function close_ipad_window() { $('#ipadinstall').slideToggle("slow"); }
			</script><?php */?>
			<?
		}
	}
}
?>

<div id="main">
	<div id="header"<? if ($_SERVER['REQUEST_URI'] != '/'.$lang.'/') { ?> class="head"<? } ?>>
    <? if ($_SERVER['REQUEST_URI'] == '/'.$lang.'/') { ?>
    <div id="headerimgs">
      <div id="headerimg1" class="headerimg"></div>
      <div id="headerimg2" class="headerimg"></div>
    </div>
    <? } ?>
    <div class="top">
     <div class="main">
      <div class="head_address" style="margin-top: -5px;">
        <span class="head_address_text" style="vertical-align: top;"><a href="/zh/397/">阿拉木图市果戈里大街127/1号Seifullin路</a></span>
        <span class="booking_phone">预定: <a href="tel:+77272795111">+7 (727) 279-51-11</a><br>
             <a href="mailto:reservation@hotel-uyut.kz">reservation@hotel-uyut.kz</a></span>
      </div>
      <a class="logo" href="/zh/" style="font-size:18px;    font-family: 'Open Sans Condensed';
      text-align: right;
      color: #ea9103;
      margin-left:-20px;
      line-height: 140px;
      width:240px;
  ">舒适（УЮТ）</a>
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
 return @parseCurrency( file_get_contents("http://www.nationalbank.kz/rss/rates_all.xml") );
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
 <? if(is_array($w_al)) { ?>阿拉木图天气。<br />
 <?=(array_key_exists($w_al[1]['_inc_']['PHENOMENA']['cloudiness'], $p_icons) ? $p_icons[$w_al[1]['_inc_']['PHENOMENA']['cloudiness']] : '<img src="/w/sun.png" alt="" style=" vertical-align:middle;margin-bottom:-7px;" />')?>&nbsp<?=($w_al[1]['_inc_']['TEMPERATURE']['min']>0 ? "+" : "").$w_al[1]['_inc_']['TEMPERATURE']['min'].($w_al[1]['_inc_']['TEMPERATURE']['max']>0 ? "&nbsp;+" : "&nbsp;").$w_al[1]['_inc_']['TEMPERATURE']['max']?>&nbsp;C<sup>0</sup>&nbsp;
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
 <script type="text/javascript">
        function changecurrency(to){
          document.cookie = "currency="+to;
          location.reload();
          // alert(document.cookie);
        }
      </script>
 <table width="100%" cellpadding="0" cellspacing="0">
   <tr>
     <td><a href=/en/ class="lang"><img src="/incom/template/template1/images/en.png" /></a></td>
     <td><a href="/" class="lang"><img src="/incom/template/template1/images/ru.png" /></a></td>
     <td><a href=/kz/ class="lang"><img src="/incom/template/template1/images/kz.png" /></a></td>
     <td><a class="lang active"><img src="/incom/template/template1/images/zh.png" /></a></td>
   </tr>
   <tr>
     <td><a href=/en/>eng</a></td>
     <td><a href=/>рус</a></td>
     <td><a href=/kz/>каз</a></td>
     <td><span>zho</span></td>
   </tr>
 </table>
</div>
</div>
</div>
<? if ($_SERVER['REQUEST_URI'] == '/'.$lang.'/') { ?>
<!-- start TL Search form -->
<div id='block-search' class='block-search-main'>
    <div id='tl-search-form' class='tl-container'></div>
</div>
<!-- end TL Search form -->
<div class="bottom">
 <div class="main">
  <div id="tl-reputation-widget"></div>

  <!--                <a class="but_order" href="/--><?//=$lang?><!--/booking.php"></a>-->
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
<? if ($_SERVER['REQUEST_URI'] != '/'.$lang.'/' && $_SERVER['REQUEST_URI'] != '/'.$lang.'/booking/') { ?>
    <!-- start TL Search form -->
    <div id='block-search'>
        <div id='tl-search-form' class='tl-container'></div>
    </div>
    <!-- end TL Search form -->
<? } ?>
<div class="main">
 <? if ($_SERVER['REQUEST_URI'] == '/'.$lang.'/') { ?>
 <div class="soc_links">
  <div  style="right: 360px; position: absolute; margin-top: 0px;">
    <!--noindex-->
    <!--<a href="https://www.booking.com/hotel/kz/uyut.html" target="_blank"><img src="/incom/template/template1/images/booking.png" style="margin-right: 20px; height: 32px; "/></a>-->

    <img src="/incom/template/template1/images/booking.png" style="margin-right: 20px; height: 32px; "/>

    <!--/noindex-->
<!--    <a href="https://www.tripadvisor.ru/Hotel_Review-g298251-d1151086-Reviews-Uyut_Hotel-Almaty.html" target="_blank"><img src="/incom/template/template1/images/tripadvisor.png" style="height: 32px; "/></a>-->
    <a><img src="/incom/template/template1/images/tripadvisor.png" style="height: 32px; "/></a>
  </div>
  订阅:&nbsp;
  <a href="https://www.instagram.com/uyut_hotel/" target="_blank"><img src="/incom/template/template1_en/images/insta.png" /></a>
  <a href="https://www.facebook.com/uyuthotel" target="_blank"><img src="/incom/template/template1_en/images/fc.png" /></a>
  <a href="https://vk.com/uyut_hotel" target="_blank"><img src="/incom/template/template1_en/images/vk.png" /></a>
</div>
<style>
.soc_links{text-align: center; margin-right: 7%;float: right;color: #fff;margin-top: 10px;}
.soc_links img{margin-bottom: -8px;}
</style>
<div class="clear"></div>
<? } ?>

<? if ($_SERVER['REQUEST_URI'] != '/'.$lang.'/') { ?>


<?php } ?>
<div id="wraper"<? if ($_SERVER['REQUEST_URI'] != '/'.$lang.'/') { ?> class="margT40"<? }?>>
  <? if ($_SERVER['REQUEST_URI'] == '/'.$lang.'/') { ?>
  <div class="index">
   <div id="left">

    <?
    $s=mysql_query("select * from i_block_elements where id=400");
    $r=mysql_fetch_array($s);
	$seo_title_h1_zh = stripslashes($r["h1title"]);

    $text = explode('{rooms}', $r["page_text"]);
    
    $sql = "select * from i_block_elements where id_section=2 and version='$lang' and catalog_act=1 order by catalog_sort asc limit 6";
    $s = mysql_query($sql);
    if ($s && mysql_num_rows($s)>0){
      $i=1;
      echo '<div  style="padding:0px 0px 20px 0px;">';
      while ($r = mysql_fetch_array($s)) {
        ?>
        <div class="room_cat" style="<?=($i==2?'margin-right:0px;':'')?>">
          <div class="name"><a href="/zh/catalog/<?=$r["translit_name"]?>/" style="font-size: 18px;"><?=$r["catalog_name"]?></a></div>
          <div class="image"><a class="linknoindex1" data-href="/zh/catalog/<?=$r["translit_name"]?>/"><img src="/upload/images/big/<?=$r["catalog_img"]?>" alt="" /></a></div>
          <div class="anounce"><?=$r["catalog_anounce"]?></div>
        </div>
        <?
        if ($i==2) $i=0;
        $i++;
      }
      echo '</div>';
    }
	
	
    echo '<h1 class="title1">'.$seo_title_h1_zh .'</h1>';
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
    font-weight: 300;">优惠和特别服务方案 <a href="/zh/actions/" style="text-decoration:underline; font-size: 14px; margin-top: 5px; float:right;">Все акции</a></span>
    <?
    $sql = "select * from i_block_elements where id_section=113 and version='$lang' and cat_act=1 order by cat_sort asc limit 1";
    $s = mysql_query($sql);
    if ($s && mysql_num_rows($s)>0){
      while ($r = mysql_fetch_array($s)) {
        ?>
        <div class="room_cat" style="width: 100%; text-align: left;">
          <div class="name"><a href="/zh/actions/<?=$r["translit_name"]?>/" data-link="/zh/actions/<?=$r["translit_name"]?>/" class="linknoindex"><?=$r["cat_name"]?></a></div>
          <? if ($r["cat_img"]!=''){ ?>
          <div class="image"><a href="/zh/actions/<?=$r["translit_name"]?>/" data-link="/zh/actions/<?=$r["translit_name"]?>/" class="linknoindex"><img src="/upload/images/small/<?=$r["cat_img"]?>" alt="" /></a></div>
          <? } ?>
        </div>
        <?
      }
    }

    ?>
    
    <img style="margin-bottom: 23px;" width="240" src="/upload/images/Триподвизор 2021 год награда УЮТ.png" alt="" />
	<img style="margin-bottom: 23px;" width="240" src="/upload/images/social_media.png" alt="" />

    <img style="margin-bottom: 23px;" width="240" src="/upload/images/2019_COE_Logos_Green-bkg_translations_ru_RU.png" alt="" />
    <img src="/upload/images/2018_COE_Logos_Green-bkg_translations_ru_RU.png" style="width: 100%; margin-bottom: 15px;" alt="#" />
    <img width="235" src="/upload/images/uyut_new2.png" alt="" />

    <span style="font-size: 26px; margin-top: 30px; display: block;
    line-height: 30px;
    text-transform: uppercase;
    padding: 0 0 30px;
    font-weight: 300;"><a href="/<?=$lang?>/guest/" style="text-decoration:underline">客人反馈</a></span>
    <?
    $s=mysql_query("SELECT * FROM i_block_elements WHERE id_section=6 AND guest_act=1 ORDER BY guest_date DESC LIMIT 3");
    if (mysql_num_rows($s)>0)
    {
     echo '
     <div class="revievs">
     ';
     while($r=mysql_fetch_array($s))
     {
      $date = $api->Strings->date($lang, $r["guest_date"], 'sql', 'datetext');
      echo '
      <div class="rev">
      <div class="nn">'.stripslashes($r["guest_name"]).'<span>&nbsp;|&nbsp;'.$date.'</span></div>
      <div class="rr">'.stripslashes(mb_substr($r["guest_guest"],0,350)).'...</div>
      </div>
      ';
    }
    echo '
    </div>
    ';
  }
  ?>
</div>
<div class="clear"></div>
</div>
<? } else { ?>
<?if($_SERVER['REQUEST_URI']=='/zh/catalog/2393/'){
	$h1title = '2室套房';
}


if (substr($_SERVER['REQUEST_URI'], 0, 13) === '/zh/guest/?p=') {
$lastSymbol = substr($_SERVER['REQUEST_URI'], -1);
$page = ' - 页 '.$lastSymbol.'';
}

?>
<?=$incom->breadcrumb($lang, $h1title)?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
   <td align="left"><h1 class="title"><?=@$h1title;?> <?=@$page;?></h1></td>
</tr>
</table>


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
