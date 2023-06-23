<? 
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /booking/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}

$lang="ru";
$title="Бронирование";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<style>h1{font-weight:bold!important;}</style>
    <p id="tl-anchor">С помощью приведенной ниже формы вы можете забронировать наши номера в режиме онлайн и получить гарантированную бронь.</b>
    
      <img style="margin-bottom: 20px; margin-top: 20px;" width="945" src="/upload/images/img-booking11-ru.png" alt="" />

    </p>
    <!-- start TL Booking form -->
    <div id='tl-booking-form'>&nbsp;</div>
    <!-- end TL Booking form -->
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>