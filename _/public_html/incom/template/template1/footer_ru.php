<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NR5BGTL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</div></div></div>
<div itemscope itemtype="http://schema.org/Organization" id="footer">
    <div class="main">
        <div class="foot">
            <div class="menu_footer">
                <?
                    echo $incom->menu->get_simple_menu_li_sitemap($lang,10,'block');
                ?>
            </div><div class="copy"><? if($_SERVER['PHP_SELF']=='/index.php'){?><?=date('Y', time())?> © Гостиница в Алматы:<br /> Отель «УЮТ» - уютные гостиничные<br /> номера бизнес класса по недорогой<br /> цене в центре города Алматы<br /><? }else{?><a href="https://www.hotel-uyut.kz/">Гостиничный комплекс «УЮТ»<br />гостиницы Алматы.</a><br /><?=date('Y', time())?><? }?></div>
            <div class="phones">
                <span itemprop="telephone">+7 (727) <strong style='color:#FFFFFF'>279-51-11</strong></span><br/>
                <span itemprop="telephone">+7 (727) <strong style='color:#FFFFFF'>279-55-11</strong></span><br/>
                моб. <span itemprop="telephone">+7 (777) <strong style='color:#FFFFFF'>218-31-32</strong></span>
                <div style="padding: 5px 0 0 0;">
                    <script type="text/javascript">
                        var _tmr = _tmr || [];
                        _tmr.push({id: "2159123", type: "pageView", start: (new Date()).getTime()});
                        (function (d, w) {
                            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
                            ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
                            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
                            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
                        })(document, window);
                    </script><noscript><div style="position:absolute;left:-10000px;">
                        <img src="//top-fwz1.mail.ru/counter?id=2159123;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
                    </div></noscript>
                    <!--noindex--><a href="https://top.mail.ru/jump?from=2159123"><!--/noindex-->
                        <img src="//top-fwz1.mail.ru/counter?id=2159123;t=471;l=1" 
                        style="border:0;" height="31" width="88" alt="Рейтинг@Mail.ru" /></a><script type="text/javascript"><!--
                        document.write("<a href='http://www.liveinternet.ru/click' "+
                            "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r"+
                            escape(document.referrer)+((typeof(screen)=="undefined")?"":
                                ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                                    screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
                            ";"+Math.random()+
                            "' alt='' title='LiveInternet: показано число просмотров и"+
                            " посетителей за 24 часа' "+
                            "border='0' width='88' height='31'><\/a>")
                            //--></script><!--/LiveInternet-->

                            <script type="text/javascript">
                                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                                ga('create', 'UA-50172116-1', 'hotel-uyut.kz');
                                ga('send', 'pageview');
                            </script>

                </div> 
            </div>				
            <div class="adress">
                <span itemprop="name">Гостиничный комплекс «Уют»</span><br />
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="addressLocality">г.Алматы</span>, <span itemprop="streetAddress">ул.Гоголя, 127/1, уг.пр.Сейфуллина</span><br />
                    <?php /* if($_SERVER['REQUEST_URI']=='/'){?>WebProjects -<a href="https://webprojects.ru/"> раскрутка сайтов</a> в поисковых системах<br />
                        <? }else{?> <? }*/?></span></div>
                        
                        <div class="soc_links">
                            Мы принимаем оплату:<br>
                            <img src="/upload/visa_footer.jpg" alt="" />
                        </div>
                        <br><br>
                        <div style="font-size: 12px;">Продвижение сайта <a href="https://seoexpert.kz/">SEOEXPERT</a></div>                      
<div class="clear"></div></div></div></div></div>


<div class="topinfo rel" id="cookiesBar" style="<?=@$_COOKIE["ckk"]==1?'display: none;':''?>">
    <a href="javascript:cl_ckk();" class="cookiesBarClose abs close" data-icon="close">+</a>
    <p class="normal cfff">
        Мы используем файлы типа "<a href="/informaciya-ob-ispolzovanii-cookie-saytom-hotel-uyutkz688/">cookies</a>" для управления, улучшения и персонализации настроек веб-сайта. Продолжая просматривать сайт, вы соглашаетесь с использованием файлов  типа "cookies"
    </p>
</div>
<script>
    $(document).ready(function(){ 
                $(".order-but-action a").click(function(){
                   <?$_SESSION["action"]=$_SESSION['title'];?>
                   window.location.href = "/booking/";

                });


                $(".order-but a").click(function(){
                    $("#order-form-view").css("display","block");

                });
                $("#order-sub").click(function(){
                    alert("Ваша заявка отправлена");
                    $("#order-form-view").css("display","none");
                    //$("#mess-order").submit();

                    var count='name='+$('#form-name').val()+'&phone='+$('#form-phone').val()+'&email='+$('#form-email').val()+'&data='+$('#form-data').val()+'&page='+$('#form-page').val()+'';

                    var req = new XMLHttpRequest();
 
 
                    req.onreadystatechange = function(){
                    if (req.readyState != 4) return;
                    var responseText = String(req.responseText);
                  
                    
                    };
 
                
                // Метод POST
                    req.open("POST", '/ru/ajax.php', true);
 
                // Установка заголовков
                    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                //req.setRequestHeader("Content-Length", searchString.length);
            
                // Отправка данных
                    req.send(count);    


                });
                $("#close-form-sms").click(function(){                    
                    $("#order-form-view").css("display","none");

                });

});

                </script>
                <div id="order-form-view" style="display:none;">
                <div class="order-but" >
                    <a id="close-form-sms" style=" padding: 0.2em 0.4em;">x</a>
                </div>
                <form action="" method="" id="mess-order">
                <label style="text-align:center;">Отправить сообщение
                </label>
                <label>ФИО:
                </label>
                <input type="text" name="name" id="form-name" style="width:90%;">
                <label>Телефон:
                </label>
                <input type="text" name="phone" id="form-phone" style="width:90%;">
                <label>E-mail:
                </label>
                <input type="text" name="email" id="form-email" style="width:90%;">
                <label>Дата заезда в отель:
                </label>
                <input type="date" name="data" id="form-data" style="width:90%;">
                <input type="hidden" name="page" id="form-page" value="<?=$_SESSION['title']?>">

                <div style="    margin-top: 20px;">
                    <a id="order-sub" href="javascript:">Отправить</a>
                </div>

                </form>
                <div>
                <style>
                #order-form-view
                {
                        position: absolute;
    width: 280px;
    height: 300px;
    margin-left: 40%;
    border-radius: 7px;
    margin-top: -40%;
    padding: 10px;
    background: #25190A;
    border: 2px solid #ea9103;
                }
                #order-form-view label{
                display: block;
    margin-top: 5px;
            }

            #order-sub{
                        text-transform: uppercase;
                        padding: 0.8em;
                        color: #3b2400;
                        background: #eb9001;
                        
                        border-left: 1px solid #b56f00;
                        border-right: 1px solid #f0980f;
                        margin-top: 20px;
    border-top: none;
    border-bottom: none;}
#order-sub:hover {
    background: #b56f00;
    color: #fff !important;
}



                </style>
<link rel="stylesheet" type="text/css" href="/incom/template/template1/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link rel="stylesheet" href="/incom/template/template1/js/flexslider/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/incom/template/template1/slideshow.css" />
    <script type="text/javascript" src="/incom/template/template1/js/superfish.js" ></script>
    <script type="text/javascript" src="/incom/template/template1/js/fancybox/jquery.fancybox-1.3.4.pack.js" ></script>
    <script type="text/javascript" src="/incom/template/template1/js/flexslider/jquery.flexslider.js" ></script>
    <script type="text/javascript" src="/incom/template/template1/js/spoiler.js" ></script>
    <script type="text/javascript" src="/incom/template/template1/js/noindex.js" ></script>
    <script type="text/javascript"><!--
$(document).ready(function() {

    var a=$('.b_img').parent();

    a.fancybox();


/*  $("a[rel=image]").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {return '';}
    });*/
});
$(document).ready(function(){
        //$(".paidOffers").paidTicker();
    });

    //-->   </script>
        <script type="text/javascript">
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
};
</script>
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
#cookiesBar {
    padding: 20px 70px 20px 40px;
    position: fixed;
    bottom: 0;
    left: 50%;
    background: rgba(0,0,0,.7);
    z-index: 100;
    width: 960px;
    margin-left: -480px;
    box-sizing: border-box;

}
#cookiesBar .close {
    top: 50%;
    right: 30px;
    margin-top: -8px;
    color: #fff;
    transform: rotate(-45deg);
    font-size: 48px;
    position: absolute;
}
.cfff {
    color: #fff;
}

.normal {
    font-size: 12px;
    line-height: 16px;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
    padding: 0px;
}
	
	table{
		border-color: white !important;
	}	
</style>
<script>
    function cl_ckk(){
        $.cookie('ckk', '1', { expires: 1, path: '/' });
        $('#cookiesBar').hide();
    }
</script>
</body>
</html>