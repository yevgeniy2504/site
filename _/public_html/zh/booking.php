<? 
$exp = explode('?', $_SERVER['REQUEST_URI']);
if (mb_substr($exp[0], -1) != '/' ) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /zh/booking/' . (!empty($exp[1]) ? '?' . $exp[1] : ''));
  exit();
}

$lang="zh";
	$title="预定";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
    <p id="tl-anchor">通过下列方式，您可以在我店在线预定房间，并获得有保障的预定。

        <img style="margin-bottom: 20px; margin-top: 20px;" width="900" src="/upload/images/img-booking11-en.png" alt="" />

    </p>
    <!-- start TL Booking form -->
    <div id='tl-booking-form'>&nbsp;</div>
    <!-- end TL Booking form -->
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>