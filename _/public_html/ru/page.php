<? if ($_SERVER['REQUEST_URI'] === '/ru/page/stoimost-gostinicy-na-sutki-cena-nomera-v-gostinice-uyut-v-almaty-foto-otzyvy13')
{
        header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://www.hotel-uyut.kz/ru/page/price-list-13"); 
	exit(); 
} 
elseif ($_SERVER['REQUEST_URI'] === '/ru/page/informaciya-o-gostinice-uyut-v-almaty-registraciya-v-gostinice-vozle-zhd-vokzala12')
{
header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://www.hotel-uyut.kz/ru/page/about-us-12"); 
	exit(); 

}
elseif ($_SERVER['REQUEST_URI'] === '/ru/page/konferenc-zaly-v-arendu-v-gostinice-uyut-v-centre-almaty-ceny-foto-otzyvy23')
{
header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://www.hotel-uyut.kz/ru/page/konference-hall-23"); 
	exit(); 

}
elseif ($_SERVER['REQUEST_URI'] === '/ru/page/akcii-i-specialnye-predlozheniya-ot-gostinicy-uyut-v-almaty309')
{
header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://www.hotel-uyut.kz/ru/page/actions-309"); 
	exit(); 

}
elseif ($_SERVER['REQUEST_URI'] === '/ru/page/uslugi-gostinicy-uyut-v-almaty14')
{
header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://www.hotel-uyut.kz/ru/page/services-14"); 
	exit(); 

}



$cat787 = explode('?',$_SERVER['REQUEST_URI']);
$massArrr = explode('/', $cat787[0]);
if (isset($massArrr[3])) {

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /".$massArrr[1].'/');

}

 






//echo $ip;
?>
<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
//
$incom->page->lang='ru';

$incom->page->get_params();
if ($incom->page->show_comment==1)
{
	$incom->comment->lang='ru';
    $incom->comment->get_params();
}
// вывод
$incom->page->index();