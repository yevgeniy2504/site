<? 
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /kz/booking/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}

$lang="kz";
	$title="Нөмірлерді броньдау";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<style>h1{font-weight:bold!important;}</style>
    <p id="tl-anchor">Төмендегі форманың көмегімен сіз біздің нөмірлерімізді онлайн режимінде брондап, кепілдендірілген брон ала аласыз.</b>

          <!--<img style="margin-bottom: 20px; margin-top: 20px;" width="900" src="/upload/images/img-booking.png" alt="" />-->
          <img style="margin-bottom: 20px; margin-top: 20px;" width="900" src="/upload/images/img-booking11-kz.png" alt="" />

    </p>
    <!-- start TL Booking form -->
    <div id='tl-booking-form'>&nbsp;</div>
    <!-- end TL Booking form -->
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>