<? 
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /en/booking/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}

$lang="en";
	$title="Booking";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<style>h1{font-weight:bold!important;}</style>
    <p id="tl-anchor">Use the form below you can book our rooms online and receive a guaranteed reservation.

        <img style="margin-bottom: 20px; margin-top: 20px;" width="900" src="/upload/images/img-booking11-en.png" alt="" />

    </p>
    <!-- start TL Booking form -->
    <div id='tl-booking-form'>&nbsp;</div>
    <!-- end TL Booking form -->
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>