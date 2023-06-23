<?

$arr = explode('?',$_SERVER['REQUEST_URI']);
if ($arr[1]) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$arr[0]);	
}

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
//echo "select * from i_block_elements where url1='".$_SERVER['REQUEST_URI']."' limit 1";
$s = mysql_query("select * from i_block_elements where url1='".$_SERVER['REQUEST_URI']."' limit 1");
if ($s && mysql_num_rows($s)>0){
    $r = mysql_fetch_array($s);
    header('Location: '.$r["url2"], true, 301) ;
    exit;
}

 
$exp = explode('?', $_SERVER['REQUEST_URI']);



$vers = 'ru';

if (strstr($_SERVER["REQUEST_URI"], '/zh/')){
    $vers = 'zh';
}
if (strstr($_SERVER["REQUEST_URI"], '/en/')){
    $vers = 'en';
}
if (strstr($_SERVER["REQUEST_URI"], '/kz/')){
    $vers = 'kz';
}


// 404 нужно
$link = explode('/', $exp[0]);









if (strlen(@$link[1])==2){
    $vers = @$link[1];
}

if (@$link[sizeof($link)-1]!='') $current = @$link[sizeof($link)-1];
else if (@$link[sizeof($link)-2]!='') $current = @$link[sizeof($link)-2];

$sql = "select * from i_block_elements where translit_name='".$current."' and version='".$vers."'";

if ($current!='actions' && $current!='services' && $current!='page' && $current!='catalog' && $current!='guest' && $current!='booking' && $current!='virtual-tour'){
    $s = mysql_query($sql);
    if ($s && mysql_num_rows($s)>0){

    }else{
        $sql = "select * from i_block where translit_name='".$current."' and version='".$vers."'";
        $s = mysql_query($sql);
        if ($s && mysql_num_rows($s)>0){

        }else{ 
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: https://www.hotel-uyut.kz/404.php/"); 
            //header('Location: /404.php');
			//echo file_get_contents('https://'.$_SERVER['HTTP_HOST'].'/ru/404.php');
            //die();
			//exit(); 
			
        }
    }
}


//var_dump($exp);
if (@$exp[1]=='route=home/u4adm/uyut.4u.kz/index.php/'){
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: /about-us-12/');
    exit();
}

/*
if (@$exp[1]=='/'){
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: /');
    exit();
}
*/

if (@$exp[1] && @$exp[0]!='/guest/' && @$exp[0]!='/kz/guest/' && @$exp[0]!='/zh/guest/' && @$exp[0]!='/en/guest/'){
   //header('HTTP/1.1 301 Moved Permanently');
   //header('Location: '.$exp[0]);  // что бы не терять гет параметры
   //exit(); 
}

if ($_SERVER['REQUEST_URI'] == '/ru/guest/?p=1')  {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /guest/");
    exit;
}

if ($_SERVER['REQUEST_URI'] == '/en/guest/?p=1')  {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /en/guest/");
    exit;
}

if ($_SERVER['REQUEST_URI'] == '/kz/guest/?p=1')  {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /kz/guest/");
    exit;
}

if ($_SERVER['REQUEST_URI'] == '/zh/guest/?p=1')  {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /zh/guest/");
    exit;
}



$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);



$blocks = explode('/', $url[0]);
//vd($blocks);
if ($blocks[1]=='ru' && $blocks[2]=='page'){
    $new_url = [];
    unset($blocks[1]);
    unset($blocks[2]);
    $new_url = array_values($blocks);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . str_replace('//', '/', join('/', $new_url) . '/' . (!empty($url[1]) ? '?' . $url[1] : '')));
    exit;
}else if ($blocks[1]=='ru'){
    $new_url = [];
    unset($blocks[1]);
    $new_url = array_values($blocks);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . str_replace('//', '/',join('/', $new_url) . '/' . (!empty($url[1]) ? '?' . $url[1] : '')));
    exit;
}


$lang="ru";

if ($blocks[1]=='en') $lang = 'en';
if ($blocks[1]=='kz') $lang = 'kz';
if ($blocks[1]=='zh') $lang = 'zh';

if ($blocks[1]==$lang && $blocks[2]=='page'){
    $new_url = [];
    unset($blocks[2]);
    $new_url = array_values($blocks);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . str_replace('//', '/',join('/', $new_url) . '/' . (!empty($url[1]) ? '?' . $url[1] : '')));
    exit;
}

if ( preg_match('!/{2,}!', $_SERVER['REQUEST_URI']) ){
  $url = preg_replace('!/{2,}!', '/', $_SERVER['REQUEST_URI']);
  header('Location: ' . $url , false, 301);
  exit;
}




if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: ' . $exp[0] . '/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}

$array_mods = array(

    'catalog'=>'catalog',

    'news'=>'news',

    'page'=>'page',

    'gallery'=>'gallery',

    'guest'=>'guest',

    'actions'=>'actions',



);

$m = $incom->pr_page;

//vd($m);



if ($m->url["module"]!=''){



    if (array_key_exists($m->url["module"], $array_mods)){

        include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/'.$array_mods[$m->url["module"]].'.php');
        exit;

    }else if ($m->url["module"]=='404'){

        include_once($_SERVER['DOCUMENT_ROOT'].'/404.php');

    }else{
        if ($m->url["module"]=='booking'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/booking.php');
            exit;

        }else if ($m->url["module"]=='virtual-tour'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/virtual_tour.php');
            exit;

        }else if ($m->url["module"]=='poisk'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/search.php');
            exit;

        }else if ($m->url["module"]=='korzina'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/basket.php');
            exit;

        }else if ($m->url["module"]=='thankyou'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/thankyou.php');
            exit;

        }else if ($m->url["module"]=='faq'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/quest.php');
            exit;

        }else if ($m->url["module"]=='produkt'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/view_product.php');
            exit;

        }else if ($m->url["module"]=='produkciya'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/view_category.php');
            exit;

        /*}else if ($m->url["module"]=='sertifikaty629'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/sertifikaty.php');
            exit;  */

        }else if ($m->url["module"]=='sitemap'){

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/sitemap.php');
            exit;

        }else if ($m->url["module"]=='index.html'){

            header("HTTP/1.1 301 Moved Permanently");
            header('Location: http://'.$_SERVER['SERVER_NAME']);

        }else if ($m->url["module"]=='home'){

            header("HTTP/1.1 301 Moved Permanently");
            header('Location: http://'.$_SERVER['SERVER_NAME']);

        }else if ($m->url["module"]=='index.php'){

            header("HTTP/1.1 301 Moved Permanently");
            header('Location: http://'.$_SERVER['SERVER_NAME']);

        }else{

            include_once($_SERVER['DOCUMENT_ROOT'].'/'.$lang.'/page.php');
            exit;

        }

    }


    exit;

}else{


    $id_page = 1;

    $s=mysql_query("select * from i_block_elements where id=$id_page");
    $r=mysql_fetch_array($s);

    if ($r["page_name"]!='') $title=$r["page_name"];
    if ($r["page_keyw"]!='') $keywords=$r["page_keyw"];
    if ($r["page_desc"]!='') $description=$r["page_desc"];
    require($_SERVER["DOCUMENT_ROOT"]."/incom/template/last.php");
    require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");

    ?>
    <br style="clear: both" />
    <?
    $s=mysql_query("select * from i_block_elements where id=$id_page");
    $r=mysql_fetch_array($s);
    if ($ob->check_admin())
    {
	//$incom->page->edit($lang, 'element', $r["id"]);
    }

$incom->guest->lang='ru';
$incom->guest->get_params();
// добавление отзывов
if (isset($_POST["name"]) && $_POST["name"]!='' && isset($_POST["token"]) && $_SESSION["token"]==$_POST["token"])
{

    if ($incom->guest->add_guest($_POST["name"], $_POST["mail"], $_POST["text"], $_POST["star"]))
    {
        echo '<script>';
        echo 'jQuery(".guest_field").val("");';
        echo 'jQuery("#guest_info").html("'.$incom->guest->text_success.'").css("color","green").slideDown("slow");';
        echo '</script>';


        $link = $_SERVER['HTTP_REFERER'].'#guest';

        if ($incom->guest->send_mail==1)
        $incom->guest->send_mail($link, $_POST["name"], $_POST["text"]);

    }
    else
    {
        echo '<script>';
        echo 'jQuery("#guest_info").html("Ошибка отправки отзыва. Попробуйте позже").css("color","red").slideDown("slow");';
        echo '</script>';
    }

    exit;
}



    //$incom->guest->get_guest();
    ?>
    <!--<div> <p>asdfjasfa</p> </div>-->

    <? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");
}
?>
