<? 
$lang = 'ru';


//$to_mail="d.soldatenko@incom.kz";
$to_mail="reservation@hotel-uyut.kz";
 

$fio=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$data=$_POST["data"];
$link=$_POST["page"];
$str=$_POST;
$theme="Заказ со страницы '".$link."'";
$headers  = "Content-type: text/html; charset=utf-8\n"; 
$headers .= "From: ".$_SERVER['HTTP_HOST']." <noreply@".$_SERVER['HTTP_HOST'].">\n";
$message = '<html>
				<body>
				Отправлено: '.date('d.m.Y').' в '.date('h:i').' со страницы '.$link.'<br/>
				<br/>
				<b>ФИО:</b><br/>
				'.$fio.'<br/>
				<br/>
				<b>Телефон:</b><br/>
				'.$phone.'<br/>
				<br/>
				<b>Почта:</b><br/>
				'.$email.'<br/>
				<br/>
				<b>Дата заезда:</b><br/>
				'.$data.'<br/>
				<br/>

				</body>
				</html>';

	
$k=mail($to_mail, $theme, $message, $headers);


	
