<?
include_once($_SERVER["DOCUMENT_ROOT"].'/incom/modules/general/api.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/incom/modules/general/mysql.php');
$incom->feedback->lang = 'zh';
$incom->feedback->get_params();
# Если посланы AJAX данные
if (
	isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') && 
	isset($_POST['do']) && ($_POST['do'] == 'send') &&
	isset($_POST['fio']) && ($_POST['fio'] != '') &&
	isset($_POST['theme']) && ($_POST['theme'] != '') &&
	isset($_POST['text']) && ($_POST['text'] != '') &&	
	isset($_POST['x']) && ($_POST['x']=='secure')
	)
{
	header('Content-Type: text/html; charset=utf-8');
	
	include_once($_SERVER["DOCUMENT_ROOT"].'/incom/modules/general/api.php');
	
	# Переменные
	$feedback_fio 	= strip_tags($_POST['fio']);
	$feedback_theme = strip_tags($_POST['theme']);
	$feedback_theme1 = strip_tags($_POST['theme1']);
	$feedback_text 	= nl2br(strip_tags($_POST['text']));
	
	# Составляем письмо
	$headers  = "Content-type: text/html; charset=utf-8\n"; 
	$headers .= "From: ".$_SERVER['HTTP_HOST']." <admin@".$_SERVER['HTTP_HOST'].">\n";
	$message = '<html>
				<body>
				Отправлено: '.date('d.m.Y').' в '.date('h:i').' с IP '.$_SERVER['REMOTE_ADDR'].'<br/>
				<br/>
				<b>'.$incom->feedback->feed_name.':</b><br/>
				'.$feedback_fio.'<br/>
				<br/>
				<b>'.$incom->feedback->feed_mail.':</b><br/>
				'.$feedback_theme.'<br/>
				<br/>
				<b>'.$incom->feedback->feed_theme.':</b><br/>
				'.$feedback_theme1.'<br/>
				<br/>
				<b>'.$incom->feedback->feed_text.':</b><br/>
				'.$feedback_text.'<br/>
				<br/>
				</body>
				</html>';
	# E-Mail'ы куда отправлять
	$mail_to   =  Array();
	$mail_to[]=$incom->feedback->email;	
	
	# Отправляем письмо подписчикам
	for($i=0; $i<sizeof($mail_to); $i++)
	{
		$send = mail($mail_to[$i], $api->Strings->mime('Сообщение с сайта '.$_SERVER['HTTP_HOST']), $message, $headers);
	}

	echo  '<script type="text/javascript">';
	# Если отправлено
	if ($send)
	{
		echo'jQuery(".feed_input").val("").css("border", "1px solid #ccc");
			 jQuery("#feedback_protocol").html("<span style=\"color:green;\">'.$incom->feedback->feed_success.'</span>").slideDown(700);';
	}
	else
	{
		echo'jQuery("#feedback_protocol").html("<span style=\"color:red;\">'.$incom->feedback->feed_error.'</span>").slideDown(700);';
	}
	echo '</script>';
	exit;
}

$incom->feedback->index();