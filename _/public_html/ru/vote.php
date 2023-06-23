<? 
$lang="ru";
$title="Опросник";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
error_reporting(0);
if (isset($_POST["hidden"]) && $_POST["hidden"]=='vote')
{
	$v1 = $ob->pr($_POST["v1"]);
	$v2 = $ob->pr($_POST["v2"]);
	$v3 = $ob->pr($_POST["v3"]);
	$v2v = $ob->pr($_POST["v2v"]);
	$v4 = $ob->pr($_POST["v4"]);
	$v5 = $ob->pr($_POST["v5"]);
	$v6 = $ob->pr($_POST["v6"]);
	$v7 = $ob->pr($_POST["v7"]);
	$v8 = $ob->pr($_POST["v8"]);
	$v9 = $ob->pr($_POST["v9"]);
	$v10 = $ob->pr($_POST["v10"]);
	$v11 = $ob->pr($_POST["v11"]);
	$v12 = $ob->pr($_POST["v12"]);
	$v13 = $ob->pr($_POST["v13"]);
	$v14 = $ob->pr($_POST["v14"]);
	$v15 = $ob->pr($_POST["v15"]);
	$v16 = $ob->pr($_POST["v16"]);
	$v17 = $ob->pr($_POST["v17"]);
	$v18 = $ob->pr($_POST["v18"]);
	$v19 = $ob->pr($_POST["v19"]);
	$v20 = $ob->pr($_POST["v20"]);
	$v21 = $ob->pr($_POST["v21"]);
	$v22 = $ob->pr($_POST["v22"]);
	$v23 = $ob->pr($_POST["v23"]);
	$v24 = $ob->pr($_POST["v24"]);
	$v25 = $ob->pr($_POST["v25"]);
	$v26 = $ob->pr($_POST["v26"]);
	$v27 = $ob->pr($_POST["v27"]);
	$v28 = $ob->pr($_POST["v28"]);
	$v29 = $ob->pr($_POST["v29"]);
	$v30 = $ob->pr($_POST["v30"]);
	$v31 = $ob->pr($_POST["v31"]);
	
	$v33 = $ob->pr($_POST["v33"]);
	$v34 = $ob->pr($_POST["v34"]);
	$v35 = $ob->pr($_POST["v35"]);
	$v36 = $ob->pr($_POST["v36"]);
	$v37 = $ob->pr($_POST["v37"]);
	$v38 = $ob->pr($_POST["v38"]);
	$v39 = $ob->pr($_POST["v39"]);
	$v40 = $ob->pr($_POST["v40"]);
	$v41 = $ob->pr($_POST["v41"]);
	$v42 = $ob->pr($_POST["v42"]);
	$v43 = $ob->pr($_POST["v43"]);
	$v44 = $ob->pr($_POST["v44"]);
	$v45 = $ob->pr($_POST["v45"]);
	$v46 = $ob->pr($_POST["v46"]);
	$v47 = $ob->pr($_POST["v47"]);
	$v48 = $ob->pr($_POST["v48"]);
	$headers  = "Content-type: text/html; charset=utf-8\n"; 
	$headers .= "From: ".$_SERVER['HTTP_HOST']." <admin@".$_SERVER['HTTP_HOST'].">\n";
$message = '<table><tr>
			<td colspan="2" align="left" valign="top"><p><strong>1. Основная цель Вашего пребывания в гостинице?</strong></p></td>
		</tr><tr>
			<td align="left" valign="top"><p>'.$v1.'</p></td>
			<td align="left" valign="top"></td>
		</tr><tr>
			<td align="left" valign="top" ><p>
			<label for="v3">Даты Вашего пребывания в отеле:</label></p>
			<p>Дата заезда '.$v2.'</p>
			<p>Дата выезда '.$v2v.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>2. Вы путешествовали:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>'.$v3.'</p></td>
			<td align="left" valign="middle"></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>3.	Говоря о Вашем пребывании в нашем отеле, были ли Вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Вашим пребыванием в целом?</p></td>
			<td align="left" valign="middle"><p>'.$v4.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label >Качеством сервиса?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v5.'</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label>Готовность помочь и дружелюбием персонала?</label>	</p></td>
			<td align="left" valign="middle"><p>'.$v6.'</p></td>
		</tr>
		<tr>

			<td align="left" valign="top" ><p><label >Качеством размещения?</label>	</p></td>
			<td align="left" valign="middle"><p>'.$v7.'</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label >Осведомление о Вашем благополучии?</label></p></td>
			<td align="left" valign="middle"><p>'.$v8.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>4.	Как бы вы оценили соотношение качество/цена</strong></p>
				<br />
				<p>'.$v9.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>5.	Порекомендовали ли бы Вы эту гостиницу кому-либо из своих знакомых?</strong></p>
				<br />
				<p>'.$v10.'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>6.	Как вы произвели бронирование?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2"><p>'.$v11.'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>7.	Были ли Вы удовлетворены  Вашим бронированием в целом?</strong></p>
				<br />
				<p>'.$v12.'</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>8.	Ели вспомнить о Вашем прибытии в гостиницу, как бы Вы оценили?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Чистоту и состояние территории вокруг гостиницы?</p></td>
			<td align="left" valign="middle"><p>'.$v13.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Скорость регистрации?</label>
			</p></td>
			<td align="left" valign="middle"><p>'.$v14.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Вежливость и дружелюбность персонала?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v15.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Администраторы заселили Вас в номер категории, который Вы бронировали?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v16.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Общую атмосферу и дизайн гостиницы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v17.'
				</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Ощущение, что Вас ждали?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v18.'
				</p>
				<strong></strong></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Были ли вам предложены дополнительные услуги (заказ такси, ресторанов…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v19.'</p>
				<strong></strong></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>9.	При заселении вам предложили карту лояльности по программе «Постоянный гость», «Тариф «Выгодный», «С днем рождения, дорогой гость», «Скидка за отзыв», «Обратный звонок», «Тариф выходного дня» </strong></p>
				<br />
				<p>'.$v20.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>10.	Если вспомнить о Вашей ванной комнате, были ли Вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Чистотой?</p></td>
			<td align="left" valign="middle"><p>'.$v21.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Хорошим общим состоянием (пол,стены…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v22.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Хорошей работой оборудования (освещение, душ, краны…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v23.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Бытовыми продуктами (мыло, гель для душа)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v24.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Дизайн ванной комнаты?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v25.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>11.	   Оценивая Ваш номер, были ли вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Чистотой?</p></td>
			<td align="left" valign="middle"><p>'.$v26.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Хорошим общим состоянием (пол,стены…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v27.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Хорошей работой оборудования  в номере (телевизор, телефон…)? </label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v28.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Дизайном номера?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v29.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Предложением телевизионных каналов?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v30.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Удобностью кровати?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v31.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>12. В течение своего пребывания, пользовались ли Вы следующими услугами ресторана?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2"><p>'.join(',', $_POST["v32"]).'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>13. Оценивая завтрак в ресторане, были ли Вы удовлетворены: </strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Завтраком в целом?</p></td>
			<td align="left" valign="middle"><p>'.$v33.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Качеством приема?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v34.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Качеством обслуживания? </label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v35.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Качеством и выбором предлагаемых продуктов и напитков?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v36.'
				</p></td>
		</tr>
		<tr>
	</table>';
$message.='
	<table>
		
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>14.	Как бы  Вы оценили соотношение качество/цена?</strong></p>
				<br />
				<p>'.$v37.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>15.	Вы пользовались средствами доступа в интернет, которыми располагает          гостиница (WI-FI) </strong></p>
				<br />
				<p>'.$v38.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>16.	Если вспомнить о Вашем отъезде из отеля, были ли Вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Скоростью оформления при отъезде?</p></td>
			<td align="left" valign="middle"><p>'.$v39.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Вежливостью и дружелюбием персонала?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v40.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>17. Возникали  ли у Вас какие-либо проблемы во время пребывания в отеле? </strong></p>
				<br />
				<p>'.$v41.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>18.	 Что можно было бы сделать, чтобы Ваше пребывание в отеле было более приятным? (если нет ответа, оставьте это поле пустым) </strong></p>
				<br />
				<p>
'.$v42.'
				</p></td>
		</tr>
	</table>
	<br />
	<h3 align="center">Чтобы мы лучше понимали потребности  клиентов, ответьте на следующие вопросы:</h3>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>19.	Какое количество ночей Вы провели в отеле за последние 12 месяцев?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Число ночей в рамках делового пребывания</p></td>
			<td align="left" valign="middle"><p>'.$v43.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Число ночей  рамках приватного пребывания</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v44.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>20.	Ваш пол? </strong></p>
				<br />
				<p>'.$v45.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>21.	Ваш возраст </strong></p>
				<br />
				<p>'.$v46.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>22. Страна Вашего проживания? </strong></p>
				<br />
				<p>
'.$v47.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>23.	Ваша профессия? </strong></p>
				<br />
				<p>'.$v48.'
				</p></td>
		</tr>
	</table>';
	
	# E-Mail'ы куда отправлять
	$mail_to   =  Array();
	$mail_to[] = 'hotel_uyut@mail.ru';	
	//$mail_to[] = 'alpv@inbox.ru';	
	
	# Отправляем письмо подписчикам
	for($i=0; $i<sizeof($mail_to); $i++)
	{
		$send = mail($mail_to[$i], $api->Strings->mime('Опросник с сайта '.$_SERVER['HTTP_HOST']), $message, $headers);
	}
	
	if ($send) $ob->go('/ru/vote.php?success');
	
}else
{
	if (isset($_GET["success"]))
	{
		?>
		<br /><br /><p align="center"><strong style="font-size:18px;"> Данные успешно отправлены!</strong></p>
		<?
	}
	else
	{
?>
<script type="text/javascript" src="/js/form.js"></script>

<form action="" method="post" rel="ajax_form" id="forma">
<input type="hidden" name="hidden" value="vote">
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p><strong>1. Основная цель Вашего пребывания в гостинице?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top"><p>
<label for="v1">Деловая</label>
				</p></td>
			<td align="left" valign="top">
<label><input type="radio" name="v1" checked="checked" id="v1" value="Деловая"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v2">Отдых/личная</label>
				</p></td>
			<td align="left" valign="top">
<label><input type="radio" name="v1" value="Отдых/личная" id="v2"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2" ><p style="margin-bottom:5px;"><label for="v3">Даты Вашего пребывания в отеле:</label></p>
				<p style="margin-bottom:5px;">Дата заезда <label><input type="text" name="v2" value="" id="v3" style="margin-left:3px;" alt="data"></label></p>
				<p>Дата выезда <label><input type="text" name="v2v" value="" id="v3v" alt="data"></label></p>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>2. Вы путешествовали:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v4">Один?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" checked="checked" value="Один?" id="v4"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v5">С супругой (супругом), без ребенка?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="С супругой (супругом), без ребенка?" id="v5"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v6">Семьей с ребенком (Детьми)?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="Семьей с ребенком (Детьми)?" id="v6"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v7">С другими лицами?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="С другими лицами?" id="v7"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v8">В группе, в рамках организованной поездки?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="В группе, в рамках организованной поездки?" id="v8"></label>
				</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>3.	Говоря о Вашем пребывании в нашем отеле, были ли Вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Вашим пребыванием в целом?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v4" checked="checked" value="Очень доволен (10-9)" id="v9">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v4" value="Доволен (8-7)" id="v10">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Нейтрален (6-5)" id="v11">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Недоволен (4-3)" id="v111">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Очень Недоволен (2-1)" id="v112">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Качеством сервиса?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v5" checked="checked" value="Очень доволен (10-9)" id="v12">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v5" value="Доволен (8-7)" id="v13">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Нейтрален (6-5)" id="v14">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Недоволен (4-3)" id="v113">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Очень Недоволен (2-1)" id="v114">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Готовность помочь и дружелюбием персонала?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v6" checked="checked" value="Очень доволен (10-9)" id="v15">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v6" value="Доволен (8-7)" id="v16">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Нейтрален (6-5)" id="v17">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Недоволен (4-3)" id="v115">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Очень Недоволен (2-1)" id="v116">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Качеством размещения?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v7" checked="checked" value="Очень доволен (10-9)" id="v18">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v7" value="Доволен (8-7)" id="v19">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Нейтрален (6-5)" id="v20">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Недоволен (4-3)" id="v117">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Очень Недоволен (2-1)" id="v118">Очень Недоволен (2-1)</label>
				</p>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Осведомление о Вашем благополучии?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v8" checked="checked" value="Очень доволен (10-9)" id="v21">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v8" value="Доволен (8-7)" id="v22">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Нейтрален (6-5)" id="v23">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Недоволен (4-3)" id="v119">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Очень Недоволен (2-1)" id="v120">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>4.	Как бы вы оценили соотношение качество/цена</strong></p>
				<br />
				<p>
<label><input type="radio" name="v9" checked="checked" value="Блестящее (10-9)" id="v24">Блестящее (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v9" value="Хорошее (8-7)" id="v25">Хорошее (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Удовлетворительное (6-5)" id="v26">Удовлетворительное (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Посредственное (4-3)" id="v27">Посредственное (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Плохое (2-1)" id="v28">Плохое (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>5.	Порекомендовали ли бы Вы эту гостиницу кому-либо из своих знакомых?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v10" checked="checked" value="Обязательно (10-9)" id="v29">Обязательно (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v10" value="Вероятно (8-7)" id="v30">Вероятно (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Может быть (6-5)" id="v31">Может быть (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Вероятно нет (4-3)" id="v32">Вероятно нет (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Нет (2-1)" id="v33">Нет (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>6.	Как вы произвели бронирование?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v34">Я позвонил непосредственно в гостиницу;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" checked="checked" value="Я позвонил непосредственно в гостиницу;" id="v34"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v35">Я позвонил в центральную службу бронирования;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Я позвонил в центральную службу бронирования;" id="v35"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v36">Я произвел бронирование на сайте:  hotel-uyut.kz;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Я произвел бронирование на сайте:  hotel-uyut.kz;" id="v36"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v37">Я произвел бронирование на сайте booking.com;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Я произвел бронирование на сайте booking.com;" id="v37"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v38">Я произвел бронирование на другом сайте в интернете;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Я произвел бронирование на другом сайте в интернете;" id="v38"></label>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>7.	Были ли Вы удовлетворены  Вашим бронированием в целом?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v12" checked="checked" value="Очень Доволен (10-9)" id="v39">Очень Доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v12" value="Доволен (8-7)" id="v40">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Нейтрален (6-5)" id="v41">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Недоволен (4-3)" id="v42">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Очень недоволен (2-1)" id="v43">Очень недоволен (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>8.	Ели вспомнить о Вашем прибытии в гостиницу, как бы Вы оценили?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Чистоту и состояние территории вокруг гостиницы?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v13" checked="checked" value="Очень доволен (10-9)" id="v44">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v13" value="Доволен (8-7)" id="v45">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Нейтрален (6-5)" id="v46">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Недоволен (4-3)" id="v121">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Очень Недоволен (2-1)" id="v122">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Скорость регистрации?</label>
			</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v14" checked="checked" value="Очень доволен (10-9)" id="v47">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v14" value="Доволен (8-7)" id="v48">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Нейтрален (6-5)" id="v49">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Недоволен (4-3)" id="v123">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Очень Недоволен (2-1)" id="v124">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Вежливость и дружелюбность персонала?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v15" checked="checked" value="Очень доволен (10-9)" id="v50">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v15" value="Доволен (8-7)" id="v51">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Нейтрален (6-5)" id="v52">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Недоволен (4-3)" id="v111">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Очень Недоволен (2-1)" id="v112">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Администраторы заселили Вас в номер категории, который Вы бронировали?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v16" checked="checked" value="Очень доволен (10-9)" id="v53">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v16" value="Доволен (8-7)" id="v54">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Нейтрален (6-5)" id="v55">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Недоволен (4-3)" id="v111">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Очень Недоволен (2-1)" id="v112">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Общую атмосферу и дизайн гостиницы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v17" checked="checked" value="Очень доволен (10-9)" id="v56">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v17" value="Доволен (8-7)" id="v57">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Нейтрален (6-5)" id="v58">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Недоволен (4-3)" id="v111">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Очень Недоволен (2-1)" id="v112">Очень Недоволен (2-1)</label>
				</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Ощущение, что Вас ждали?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v18" checked="checked" value="Очень доволен (10-9)" id="v59">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v18" value="Доволен (8-7)" id="v60">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Нейтрален (6-5)" id="v61">Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Недоволен (4-3)" id="v111">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Очень Недоволен (2-1)" id="v112">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Были ли вам предложены дополнительные услуги (заказ такси, ресторанов…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v19" checked="checked" value="Очень доволен (10-9)" id="v62">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v19" value="Доволен (8-7)" id="v63">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Нейтрален (6-5)" id="v64">	Нейтрален (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Недоволен (4-3)" id="v111">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Очень Недоволен (2-1)" id="v112">Очень Недоволен (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>9.	При заселении вам предложили карту лояльности по программе «Постоянный гость», «Тариф «Выгодный», «С днем рождения, дорогой гость», «Скидка за отзыв», «Обратный звонок», «Тариф выходного дня» </strong></p>
				<br />
				<p>
<label><input type="radio" name="v20" checked="checked" value="Да" id="v65">Да</label>
				</p>
				<p>
<label><input type="radio" name="v20" value="Нет" id="v66">Нет</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>10.	Если вспомнить о Вашей ванной комнате, были ли Вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Чистотой?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v21" checked="checked" value="Очень доволен (10-9)" id="v67">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v21" value="Доволен (8-7)" id="v68">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Удовлетворен (6-5)" id="v69">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Недоволен (4-3)" id="v70">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Очень недоволен (2-1)" id="v97">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Не применимо (0)" id="v98">Не применимо (0)</label></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Хорошим общим состоянием (пол,стены…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v22" checked="checked" value="Очень доволен (10-9)" id="v71">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v22" value="Доволен (8-7)" id="v72">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Удовлетворен (6-5)" id="v73">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Недоволен (4-3)" id="v74">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Очень недоволен (2-1)" id="v97">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Не применимо (0)" id="v98">Не применимо (0)</label></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Хорошей работой оборудования (освещение, душ, краны…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v23" checked="checked" value="Очень доволен (10-9)" id="v75">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v23" value="Доволен (8-7)" id="v76">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Удовлетворен (6-5)" id="v77">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Недоволен (4-3)" id="v78">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Очень недоволен (2-1)" id="v97">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Не применимо (0)" id="v98">Не применимо (0)</label></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Бытовыми продуктами (мыло, гель для душа)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v24" checked="checked" value="Очень доволен (10-9)" id="v79">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v24" value="Доволен (8-7)" id="v80">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Удовлетворен (6-5)" id="v81">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Недоволен (4-3)" id="v82">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Очень недоволен (2-1)" id="v97">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Не применимо (0)" id="v98">Не применимо (0)</label></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Дизайн ванной комнаты?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v25" checked="checked" value="Очень доволен (10-9)" id="v83">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v25" value="Доволен (8-7)" id="v84">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Удовлетворен (6-5)" id="v85">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Недоволен (4-3)" id="v86">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Очень недоволен (2-1)" id="v97">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Не применимо (0)" id="v98">Не применимо (0)</label></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>11.	   Оценивая Ваш номер, были ли вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Чистотой?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v26" checked="checked" value="Очень доволен (10-9)" id="v87">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v26" value="Доволен (8-7)" id="v88">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Удовлетворен (6-5)" id="v89">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Недоволен (4-3)" id="v90">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Очень недоволен (2-1)" id="v91">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Не применимо (0)" id="v92">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Хорошим общим состоянием (пол,стены…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v27" checked="checked" value="Очень доволен (10-9)" id="v93">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v27" value="Доволен (8-7)" id="v94">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Удовлетворен (6-5)" id="v95">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Недоволен (4-3)" id="v96">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Очень недоволен (2-1)" id="v97">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Не применимо (0)" id="v98">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Хорошей работой оборудования  в номере (телевизор, телефон…)? </label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v28" checked="checked" value="Очень доволен (10-9)" id="v99">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v28" value="Доволен (8-7)" id="v100">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Удовлетворен (6-5)" id="v101">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Недоволен (4-3)" id="v102">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Очень недоволен (2-1)" id="v103">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Не применимо (0)" id="v104">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Дизайном номера?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v29" checked="checked" value="Очень доволен (10-9)" id="v105">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v29" value="Доволен (8-7)" id="v106">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Удовлетворен (6-5)" id="v107">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Недоволен (4-3)" id="v108">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Очень недоволен (2-1)" id="v109">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Не применимо (0)" id="v110">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Предложением телевизионных каналов?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v30" checked="checked" value="Очень доволен (10-9)" id="v111">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v30" value="Доволен (8-7)" id="v112">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Удовлетворен (6-5)" id="v113">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Недоволен (4-3)" id="v114">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Очень недоволен (2-1)" id="v115">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Не применимо (0)" id="v116">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Удобностью кровати?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v31" checked="checked" value="Очень доволен (10-9)" id="v117">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v31" value="Доволен (8-7)" id="v118">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Удовлетворен (6-5)" id="v119">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Недоволен (4-3)" id="120">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Очень недоволен (2-1)" id="v121">Очень недоволен (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Не применимо (0)" id="v122">Не применимо (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>12. В течение своего пребывания, пользовались ли Вы следующими услугами ресторана?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" width="275"><p>
<label for="v123">Завтрак в ресторане</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]"  value="Завтрак в ресторане" id="v123"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v124">Завтрак в номере (обслуживание в номере)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Завтрак в номере (обслуживание в номере)" id="v124"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v125">Обед в ресторане</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Обед в ресторане" id="v125"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v126">Обед в номере (обслуживание в номере)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Обед в номере (обслуживание в номере)" id="v126"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v127">Ужин в ресторане</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Ужин в ресторане" id="v127"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v128">Ужин в номере (обслуживание в номере)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Ужин в номере (обслуживание в номере)" id="v128"></label>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>13. Оценивая завтрак в ресторане, были ли Вы удовлетворены: </strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Завтраком в целом?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v33" checked="checked" value="Очень доволен (10-9)" id="v129">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v33" value="Доволен (8-7)" id="v130">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Удовлетворен (6-5)" id="v131">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Недоволен (4-3)" id="v132">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Очень недоволен (2-1)" id="v133">Очень недоволен (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Не применимо (0)" id="v134">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Качеством приема?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v34" checked="checked" value="Очень доволен (10-9)" id="v135">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v34" value="Доволен (8-7)" id="v136">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Удовлетворен (6-5)" id="v137">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Недоволен (4-3)" id="v138">Недоволен (4-3)</label>
</p>
				<p>
<label><input type="radio" name="v34"  value="Очень недоволен (2-1)" id="v139">Очень недоволен (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Не применимо (0)" id="v140">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Качеством обслуживания? </label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v35" checked="checked" value="Очень доволен (10-9)" id="v141">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v35" value="Доволен (8-7)" id="v142">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Удовлетворен (6-5)" id="v143">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Недоволен (4-3)" id="v144">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Очень недоволен (2-1)" id="v145">Очень недоволен (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Не применимо (0)" id="v146">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Качеством и выбором предлагаемых продуктов и напитков?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v36" checked="checked" value="Очень доволен (10-9)" id="v147">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v36" value="Доволен (8-7)" id="v148">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Удовлетворен (6-5)" id="v149">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Недоволен (4-3)" id="v150">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Очень недоволен (2-1)" id="v151">Очень недоволен (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Не применимо (0)" id="v152">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
	</table>
	<table>
		
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>14.	Как бы  Вы оценили соотношение качество/цена?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v37" checked="checked" value="Блестящее (10-9)" id="v153">Блестящее (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v37" value="Хорошее (8-7)" id="v154">Хорошее (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Удовлетворительное (6-5)" id="v155">Удовлетворительное (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Посредственное (4-3)" id="v156">Посредственное (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Плохое (2-1)" id="v157">Плохое (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>15.	Вы пользовались средствами доступа в интернет, которыми располагает          гостиница (WI-FI) </strong></p>
				<br />
				<p>
<label><input type="radio" name="v38" checked="checked" value="Да" id="v158">Да</label>
				</p>
				<p>
<label><input type="radio" name="v38" value="Нет" id="v159">Нет</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>16.	Если вспомнить о Вашем отъезде из отеля, были ли Вы удовлетворены:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Скоростью оформления при отъезде?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v39" checked="checked" value="Очень доволен (10-9)" id="v160">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v39" value="Доволен (8-7)" id="v161">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Удовлетворен (6-5)" id="v162">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Недоволен (4-3)" id="v163">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Очень недоволен (2-1)" id="v164">Очень недоволен (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Не применимо (0)" id="v165">Не применимо (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Вежливостью и дружелюбием персонала?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v40" checked="checked" value="Очень доволен (10-9)" id="v166">Очень доволен (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v40" value="Доволен (8-7)" id="v167">Доволен (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Удовлетворен (6-5)" id="v168">Удовлетворен (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Недоволен (4-3)" id="v169">Недоволен (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Очень недоволен (2-1)" id="v170">Очень недоволен (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Не применимо (0)" id="v171">Не применимо (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>17. Возникали  ли у Вас какие-либо проблемы во время пребывания в отеле? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v41"  value="Да" id="v172">Да</label>
				</p>
				<p>
<label><input type="radio" name="v41" checked="checked" value="Нет" id="v173">Нет</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>18.	 Что можно было бы сделать, чтобы Ваше пребывание в отеле было более приятным? (если нет ответа, оставьте это поле пустым) </strong></p>
				<br />
				<p>
<label><textarea name="v42" checked="checked"  id="v174" style="width:100%; height:70px;"></textarea></label>
				</p></td>
		</tr>
	</table>
	<br />
	<h3 align="center">Чтобы мы лучше понимали потребности  клиентов, ответьте на следующие вопросы:</h3>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>19.	Какое количество ночей Вы провели в отеле за последние 12 месяцев?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Число ночей в рамках делового пребывания</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v43" checked="checked" value="Ни одной" id="v175">Ни одной</label>
				</p>
				<p>
<label><input type="radio" name="v43" value="1" id="v176">1</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="2-3" id="v177">2-3</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="4-5" id="v178">4-5</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="6-13" id="v179">6-13</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="14-30" id="v180">14-30</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="31-60" id="v181">31-60</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="61-90" id="v182">61-90</label>
				</p>
				<p>
<label><input type="radio" name="v43"  value="Более 90 ночей" id="v183">Более 90 ночей</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Число ночей  рамках приватного пребывания</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v44" checked="checked" value="Ни одной" id="v184">Ни одной</label>
				</p>
				<p>
<label><input type="radio" name="v44" value="1" id="v185">1</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="2-3" id="v186">2-3</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="4-5" id="v187">4-5</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="6-13" id="v188">6-13</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="14-30" id="v189">14-30</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="31-60" id="v190">31-60</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="61-90" id="v191">61-90</label>
				</p>
				<p>
<label><input type="radio" name="v44"  value="Более 90 ночей" id="v192">Более 90 ночей</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>20.	Ваш пол? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v45" checked="checked" value="Мужской" id="v193">Мужской</label>
				</p>
				<p>
<label><input type="radio" name="v45" value="Женский" id="v194">Женский</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>21.	Ваш возраст </strong></p>
				<br />
				<p>
<label><input type="radio" name="v46" checked="checked" value="18-24" id="v195">18-24</label>
				</p>
				<p>
<label><input type="radio" name="v46" value="25-34" id="v196">25-34</label>
				</p>
				<p>
<label><input type="radio" name="v46" value="35-44" id="v197">35-44</label>
				</p>
				<p>
<label><input type="radio" name="v46" value="45-54" id="v198">45-54</label>
				</p>
				<p>
<label><input type="radio" name="v46" value="55-64" id="v199">55-64</label>
				</p>
				<p>
<label><input type="radio" name="v46" value="65-74" id="v200">65-74</label>
				</p>
				<p>
<label><input type="radio" name="v46" value="75+" id="v201">75+</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>22. Страна Вашего проживания? </strong></p>
				<br />
				<p>
<label><textarea name="v47" id="v202" style="width:100%; height:70px;"></textarea></label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>23.	Ваша профессия? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v48" value="Рабочий" checked="checked" id="v203">Рабочий</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Служащий" id="v204">Служащий</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Менеджер/ассистент" id="v205">Менеджер/ассистент</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Старший менеджер" id="v206">Старший менеджер</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Преподаватель" id="v207">Преподаватель</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Студент" id="v208">Студент</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Пенсионер" id="v209">Пенсионер</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Безработный" id="v210">Безработный</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Руководитель предприятия" id="v211">Руководитель предприятия</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Коммерсант" id="v212">Коммерсант</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Коммерческий/разъездной представитель фирмы" id="v213">Коммерческий/разъездной представитель фирмы</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Свободная профессия" id="v214">Свободная профессия</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Не хочу отвечать " id="v215">Не хочу отвечать </label>
				</p></td>
		</tr>
	</table>
</form>
<p align="center"><a href="javascript:send_vote();" class="link2" style="margin-left:0px; display:inline-block; float:none;"><em><b><span>Отправить</span></b></em></a></p>
<style>
input[type=radio], input[type=checkbox]{ margin-right:10px; vertical-align:middle;}
</style>
<script>
function send_vote()
{
	if ($('#v3').val()=='')
	{
		alert('Введите дату заезда в отель.')	
		$('#v3').focus();
	}else if ($('#v3v').val()=='')
	{
		alert('Введите дату выезда с отеля.')	
		$('#v3v').focus();
	}else
	if ($('#v202').val()=='')
	{
		alert('Введите cтрану Вашего проживания.')	
		$('#v202').focus();
	}
	else
	{
	$('#forma').submit();	
	}
}
</script>
<? } } require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>
