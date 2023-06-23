<? 
$lang="kz";
$title="Опросник";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
error_reporting(0);
if (isset($_POST["hidden"]) && $_POST["hidden"]=='vote')
{
	$v1 = $ob->pr($_POST["v1"]);
	$v2 = $ob->pr($_POST["v2"]);
	$v2v = $ob->pr($_POST["v2v"]);
	$v3 = $ob->pr($_POST["v3"]);
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
			<td colspan="2" align="left" valign="top"><p><strong>1. Сіздің    қонақ үйде тоқтауыңыздың  негізгі мақсаты?</strong></p></td>
		</tr><tr>
			<td align="left" valign="top"><p>'.$v1.'</p></td>
			<td align="left" valign="top"></td>
		</tr><tr>
			<td align="left" valign="top" ><p>
			<label for="v3">Сіздің  қонақ үйде тоқтаған күндеріңіз:</label></p>
			<p>Кіру күні  '.$v2.'</p>
			<p>Шығу  күні '.$v2v.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>2. Сіз кіммен бірге саяхат жасадыңыз:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>'.$v3.'</p></td>
			<td align="left" valign="middle"></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>3.	Біздің  қонақ  үйде  тұрғаныңызға  қанағаттандыңыз ба:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Жалпы тұрғаныңыз?</p></td>
			<td align="left" valign="middle"><p>'.$v4.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label >Қызмет көрсету сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v5.'</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label>Қызметкерлердің көмекке әзірлігі және ықыластылығы?</label>	</p></td>
			<td align="left" valign="middle"><p>'.$v6.'</p></td>
		</tr>
		<tr>

			<td align="left" valign="top" ><p><label >Орналастыру сапасы?</label>	</p></td>
			<td align="left" valign="middle"><p>'.$v7.'</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label >Сіздің хал-жағдайыңызды сұрауы?</label></p></td>
			<td align="left" valign="middle"><p>'.$v8.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>4.	Сапа/баға ара-қатынасын қалай бағалар едіңіз?</strong></p>
				<br />
				<p>'.$v9.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>5.	Сіз өз таныстарыңызға осы қонақүйде тоқтауға кеңес берер ме едіңіз?</strong></p>
				<br />
				<p>'.$v10.'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>6.	Брондауды қалай жасадыңыз?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2"><p>'.$v11.'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>7.	Сіздің жасаған брондауыңызға жалпы қанағаттандыңыз ба?</strong></p>
				<br />
				<p>'.$v12.'</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>8.	Қонақүйге келген кезіңізді еске түсірсек, мыналарды қалай бағалар едіңіз?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Қонақүйге жапсарлас аумақтың тазалығы мен жағдайы?</p></td>
			<td align="left" valign="middle"><p>'.$v13.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Тіркеу жылдамдылығы?</label>
			</p></td>
			<td align="left" valign="middle"><p>'.$v14.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қызметкерлердің сыпайлығы және ықыластылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v15.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Әкімгерлер Сізді өзіңіз брондаған санаттағы нөмірге орналастырды ма?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v16.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қонақүйдің жалпы атмосферасы және дизайны?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v17.'
				</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Сізді ғана күтіп отырғандай сезім қалды ма?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v18.'
				</p>
				<strong></strong></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Сізге қосымша қызметтер ұсынылды ма (таксиге, мейрамханаларға тапсырыс беру…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v19.'</p>
				<strong></strong></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>9.	Қоныстану кезінде Сізге «Тұрақты қонақ», «Пайдалы» тарифі», «Тұған күніңіз құтты болсын, қымбатты қонақ», «Пікір үшін жеңілдік», «Кері қоңырау шалу», «Демалыс күні тарифі» бағдарламалары бойынша ниеттестік картасы ұсынылды ма? </strong></p>
				<br />
				<p>'.$v20.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>10.	Нөмірдегі ванна бөлмесіне қанағаттандыңыз ба?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Тазалығы?</p></td>
			<td align="left" valign="middle"><p>'.$v21.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Жалпы жағдайы (еден, қабырға…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v22.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Жабдықтардың жұмыс істеуі (жарықтандыру, душ, шүмектер…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v23.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Тұрмыстық бұйымдар (сабын, душ гелі)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v24.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Ванна бөлмесінің дизайны?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v25.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>11.	   Тұрған нөміріңізге қанағаттандыңыз ба?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Тазалығы?</p></td>
			<td align="left" valign="middle"><p>'.$v26.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Жалпы жағдайы (еден, қабырға…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v27.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Нөмірдің ішіндегі жабдықтардың жұмыс істеуі (теледидар, телефон…)?  </label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v28.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Нөмірдің дизайны?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v29.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Ұсынылған теледидар арналары?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v30.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Керуеттің жайлылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v31.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>12. Қонақүйде болған кезіңізде мейрамхананың мынадай қызметтерін пайдаландыңыз ба?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2"><p>'.join(',', $_POST["v32"]).'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>13. Мейрамханадағы таңғы асқа қанағаттандыңыз ба? </strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Жалпы таңғы ас?</p></td>
			<td align="left" valign="middle"><p>'.$v33.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Қабылдау сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v34.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қызмет көрсету сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v35.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Ұсынылған тағамдар мен сусындардың сапасы мен таңдалуы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v36.'
				</p></td>
		</tr>
		<tr>
	</table>';
$message.='
	<table>
		
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>14.	Сапа/баға ара-қатынасын қалай бағалар едіңіз?</strong></p>
				<br />
				<p>'.$v37.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>15.	Сіз қонақүйімізде бар интернетке шығу құралдарын (WI-FI) пайдаландыңыз ба? </strong></p>
				<br />
				<p>'.$v38.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>16.	Қонақүйден шығу кезінде Сізде қанағаттанушылық болды ма?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Шығу кезіндегі рәсімдеу жылдамдылығы?</p></td>
			<td align="left" valign="middle"><p>'.$v39.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Қызметкерлердің сыпайылығы және ықыластылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v40.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>17. Қонақүйде тұрған кезде Сізде қандай да бір проблемалар пайда болды ма? </strong></p>
				<br />
				<p>'.$v41.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>18.	 Сіздің қонақүйде тұруыңызды анағұрлым жағымды ету үшін не жасауымызға болады? (жауабыңыз болмаса, бұл алаңшаны бос қалдырыңыз) </strong></p>
				<br />
				<p>
'.$v42.'
				</p></td>
		</tr>
	</table>
	<br />
	<h3 align="center">Клиенттеріміздің қажеттіліктерін тереңірек түсінуіміз үшін мынадай сұрақтарға жауап беріңізші:</h3>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>19.	Соңғы 12 айдың ішінде біздің қонақүйімізде қанша түн қондыңыз?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Іскерлік мақсатта тұру шеңберіндегі түндердің саны</p></td>
			<td align="left" valign="middle"><p>'.$v43.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Жеке мақсаттармен тұру шеңберріндегі түндердің саны</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v44.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>20.	Сіздің жынысыңыз? </strong></p>
				<br />
				<p>'.$v45.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>21.	Сіздің жасыңыз? </strong></p>
				<br />
				<p>'.$v46.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>22. Сіздің тұратын еліңіз? </strong></p>
				<br />
				<p>
'.$v47.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>23.	Сіздің кәсібіңіз? </strong></p>
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
	
	if ($send) $ob->go('/kz/vote.php?success');
	
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
			<td colspan="2" align="left" valign="top"><p><strong>1. Сіздің    қонақ үйде тоқтауыңыздың  негізгі мақсаты?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top"><p>
<label for="v1">Іскерлік</label>
				</p></td>
			<td align="left" valign="top">
<label><input type="radio" name="v1" checked="checked" id="v1" value="Іскерлік"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v2">Демалу/жеке мақсат</label>
				</p></td>
			<td align="left" valign="top">
<label><input type="radio" name="v1" value="Демалу/жеке мақсат" id="v2"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2" ><p style="margin-bottom:5px;"><label for="v3">Сіздің  қонақ үйде тоқтаған күндеріңіз:</label></p>
				<p style="margin-bottom:5px;">Кіру күні <label><input type="text" name="v2" value="" id="v3" style="margin-left:7px;" alt="data"></label></p>
				<p>Шығу  күні <label><input type="text" name="v2v" value="" id="v3v" alt="data"></label></p>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>2. Сіз кіммен бірге саяхат жасадыңыз:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v4">Бір  өзіңіз?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" checked="checked" value="Бір  өзіңіз?" id="v4"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v5">Жұбайыңызбен, балаларсыз?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="Жұбайыңызбен, балаларсыз?" id="v5"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v6">Отбасыңызбен, балалармен (баламен) бірге?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="Отбасыңызбен, балалармен (баламен) бірге?" id="v6"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v7">Басқа адамдармен?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="Басқа адамдармен?" id="v7"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v8">Ұйымдастырылған сапардың шеңберінде топтың құрамында?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="Ұйымдастырылған сапардың шеңберінде топтың құрамында?" id="v8"></label>
				</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>3.	Біздің  қонақ  үйде  тұрғаныңызға  қанағаттандыңыз ба:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Жалпы тұрғаныңыз?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v4" checked="checked" value="Өте ризамын
 (10-9)" id="v9">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v4" value="Ризамын (8-7)" id="v10">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Бейтарап (6-5)" id="v11">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Қызмет көрсету сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v5" checked="checked" value="Өте ризамын
 (10-9)" id="v12">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v5" value="Ризамын (8-7)" id="v13">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Бейтарап (6-5)" id="v14">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қызметкерлердің көмекке әзірлігі және ықыластылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v6" checked="checked" value="Өте ризамын
 (10-9)" id="v15">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v6" value="Ризамын (8-7)" id="v16">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Бейтарап (6-5)" id="v17">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Орналастыру сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v7" checked="checked" value="Өте ризамын
 (10-9)" id="v18">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v7" value="Ризамын (8-7)" id="v19">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Бейтарап (6-5)" id="v20">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Сіздің хал-жағдайыңызды сұрауы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v8" checked="checked" value="Өте ризамын
 (10-9)" id="v21">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v8" value="Ризамын (8-7)" id="v22">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Бейтарап (6-5)" id="v23">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>4.	Сапа/баға ара-қатынасын қалай бағалар едіңіз?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v9" checked="checked" value="Керемет (10-9)" id="v24">Керемет (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v9" value="Жақсы (8-7)" id="v25">Жақсы (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Қанағаттанарлық (6-5)" id="v26">Қанағаттанарлық (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Орташа (4-3)" id="v27">Орташа (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Нашар (2-1)" id="v28">Нашар (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>5.	Сіз өз таныстарыңызға осы қонақүйде тоқтауға кеңес берер ме едіңіз?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v10" checked="checked" value="Міндетті түрде (10-9)" id="v29">Міндетті түрде (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v10" value="Әбден мүмкін (8-7)" id="v30">Әбден мүмкін (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Мүмкін (6-5)" id="v31">Мүмкін (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Бәлкім бермеспін  (4-3)" id="v32">Бәлкім бермеспін  (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Жоқ (2-1)" id="v33">Жоқ (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>6.	Брондауды қалай жасадыңыз?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v34">Мен тікелей қонақүйге қоңырау шалдым;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" checked="checked" value="Мен тікелей қонақүйге қоңырау шалдым;" id="v34"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v35">Мен орталық брондау қызметіне қоңырау шалдым;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Мен орталық брондау қызметіне қоңырау шалдым;" id="v35"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v36">Мен брондауды hotel-uyut.kz сайтында жасадым;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Мен брондауды hotel-uyut.kz сайтында жасадым;" id="v36"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v37">Мен брондауды booking.com сайтында жасадым;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Мен брондауды booking.com сайтында жасадым;" id="v37"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v38">Мен брондауды Интернеттегі басқа сайтта жасадым;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="Мен брондауды Интернеттегі басқа сайтта жасадым;" id="v38"></label>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>7.	Сіздің жасаған брондауыңызға жалпы қанағаттандыңыз ба?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v12" checked="checked" value="Өте ризамын  (10-9)
" id="v39">Өте ризамын  (10-9)
</label>
				</p>
				<p>
<label><input type="radio" name="v12" value="Ризамын (8-7)" id="v40">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Бейтарап (6-5)" id="v41">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Наразымын (4-3)" id="v42">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Өтенаразымын (2-1)" id="v43">Өтенаразымын (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>8.	Қонақүйге келген кезіңізді еске түсірсек, мыналарды қалай бағалар едіңіз?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Қонақүйге жапсарлас аумақтың тазалығы мен жағдайы?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v13" checked="checked" value="Өте ризамын
 (10-9)" id="v44">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v13" value="Ризамын (8-7)" id="v45">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Бейтарап (6-5)" id="v46">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Тіркеу жылдамдылығы?</label>
			</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v14" checked="checked" value="Өте ризамын
 (10-9)" id="v47">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v14" value="Ризамын (8-7)" id="v48">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Бейтарап (6-5)" id="v49">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қызметкерлердің сыпайлығы және ықыластылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v15" checked="checked" value="Өте ризамын
 (10-9)" id="v50">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v15" value="Ризамын (8-7)" id="v51">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Бейтарап (6-5)" id="v52">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Әкімгерлер Сізді өзіңіз брондаған санаттағы нөмірге орналастырды ма?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v16" checked="checked" value="Өте ризамын
 (10-9)" id="v53">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v16" value="Ризамын (8-7)" id="v54">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Бейтарап (6-5)" id="v55">Бейтарап (6-5)</label>
				</p><p>
<label><input type="radio" name="v16"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қонақүйдің жалпы атмосферасы және дизайны?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v17" checked="checked" value="Өте ризамын
 (10-9)" id="v56">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v17" value="Ризамын (8-7)" id="v57">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Бейтарап (6-5)" id="v58">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Сізді ғана күтіп отырғандай сезім қалды ма?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v18" checked="checked" value="Өте ризамын
 (10-9)" id="v59">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v18" value="Ризамын (8-7)" id="v60">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Бейтарап (6-5)" id="v61">Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Сізге қосымша қызметтер ұсынылды ма (таксиге, мейрамханаларға тапсырыс беру…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v19" checked="checked" value="Өте ризамын
 (10-9)" id="v62">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v19" value="Ризамын (8-7)" id="v63">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Бейтарап (6-5)" id="v64">	Бейтарап (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Наразымын (4-3)" id="v11">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Өте наразымын (2-1)" id="v11">Өте наразымын (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>9.	Қоныстану кезінде Сізге «Тұрақты қонақ», «Пайдалы» тарифі», «Тұған күніңіз құтты болсын, қымбатты қонақ», «Пікір үшін жеңілдік», «Кері қоңырау шалу», «Демалыс күні тарифі» бағдарламалары бойынша ниеттестік картасы ұсынылды ма? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v20" checked="checked" value="Иә" id="v65">Иә</label>
				</p>
				<p>
<label><input type="radio" name="v20" value="Жоқ" id="v66">Жоқ</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>10.	Нөмірдегі ванна бөлмесіне қанағаттандыңыз ба?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Тазалығы?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v21" checked="checked" value="Өте ризамын
 (10-9)" id="v67">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v21" value="Ризамын (8-7)" id="v68">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Қанағаттандым (6-5)" id="v69">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Наразымын (4-3)" id="v70">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Өте наразымын (2-1)" id="v91">Өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Жарамсыз (0)" id="v92">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Жалпы жағдайы (еден, қабырға…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v22" checked="checked" value="Өте ризамын
 (10-9)" id="v71">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v22" value="Ризамын (8-7)" id="v72">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Қанағаттандым (6-5)" id="v73">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Наразымын (4-3)" id="v74">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Өте наразымын (2-1)" id="v91">Өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Жарамсыз (0)" id="v92">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Жабдықтардың жұмыс істеуі (жарықтандыру, душ, шүмектер…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v23" checked="checked" value="Өте ризамын
 (10-9)" id="v75">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v23" value="Ризамын (8-7)" id="v76">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Қанағаттандым (6-5)" id="v77">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Наразымын (4-3)" id="v78">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Өте наразымын (2-1)" id="v91">Өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Жарамсыз (0)" id="v92">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Тұрмыстық бұйымдар (сабын, душ гелі)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v24" checked="checked" value="Өте ризамын
 (10-9)" id="v79">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v24" value="Ризамын (8-7)" id="v80">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Қанағаттандым (6-5)" id="v81">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Наразымын (4-3)" id="v82">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Өте наразымын (2-1)" id="v91">Өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Жарамсыз (0)" id="v92">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Ванна бөлмесінің дизайны?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v25" checked="checked" value="Өте ризамын
 (10-9)" id="v83">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v25" value="Ризамын (8-7)" id="v84">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Қанағаттандым (6-5)" id="v85">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Наразымын (4-3)" id="v86">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Өте наразымын (2-1)" id="v91">Өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Жарамсыз (0)" id="v92">Жарамсыз (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>11.	   Тұрған нөміріңізге қанағаттандыңыз ба?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Тазалығы?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v26" checked="checked" value="Өте ризамын
 (10-9)" id="v87">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v26" value="Ризамын (8-7)" id="v88">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Қанағаттандым (6-5)" id="v89">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Наразымын (4-3)" id="v90">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Өте наразымын (2-1)" id="v91">Өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Жарамсыз (0)" id="v92">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Жалпы жағдайы (еден, қабырға…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v27" checked="checked" value="Өте ризамын
 (10-9)" id="v93">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v27" value="Ризамын (8-7)" id="v94">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Қанағаттандым (6-5)" id="v95">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Наразымын (4-3)" id="v96">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Өтенаразымын (2-1)" id="v97">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Жарамсыз (0)" id="v98">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Нөмірдің ішіндегі жабдықтардың жұмыс істеуі (теледидар, телефон…)?  </label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v28" checked="checked" value="Өте ризамын
 (10-9)" id="v99">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v28" value="Ризамын (8-7)" id="v100">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Қанағаттандым (6-5)" id="v101">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Наразымын (4-3)" id="v102">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Өтенаразымын (2-1)" id="v103">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Жарамсыз (0)" id="v104">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Нөмірдің дизайны?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v29" checked="checked" value="Өте ризамын
 (10-9)" id="v105">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v29" value="Ризамын (8-7)" id="v106">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Қанағаттандым (6-5)" id="v107">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Наразымын (4-3)" id="v108">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Өтенаразымын (2-1)" id="v109">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Жарамсыз (0)" id="v110">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Ұсынылған теледидар арналары?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v30" checked="checked" value="Өте ризамын
 (10-9)" id="v111">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v30" value="Ризамын (8-7)" id="v112">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Қанағаттандым (6-5)" id="v113">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Наразымын (4-3)" id="v114">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Өтенаразымын (2-1)" id="v115">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Жарамсыз (0)" id="v116">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Керуеттің жайлылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v31" checked="checked" value="Өте ризамын
 (10-9)" id="v117">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v31" value="Ризамын (8-7)" id="v118">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Қанағаттандым (6-5)" id="v119">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Наразымын (4-3)" id="120">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Өтенаразымын (2-1)" id="v121">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Жарамсыз (0)" id="v122">Жарамсыз (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>12. Қонақүйде болған кезіңізде мейрамхананың мынадай қызметтерін пайдаландыңыз ба?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" width="275"><p>
<label for="v123">Мейрамханадағы таңғы ас</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]"  value="Мейрамханадағы таңғы ас" id="v123"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v124">Нөмірдегі таңғы ас (нөмірде қызмет көрсету)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Нөмірдегі таңғы ас (нөмірде қызмет көрсету)" id="v124"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v125">Мейрамханадағы түскі ас</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Мейрамханадағы түскі ас" id="v125"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v126">Нөмірдегі түскі ас(нөмірде қызмет көрсету)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Нөмірдегі түскі ас(нөмірде қызмет көрсету)" id="v126"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v127">Мейрамханадағы кешкі ас</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Мейрамханадағы кешкі ас" id="v127"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v128">Нөмірдегі кешкі ас(нөмірде қызмет көрсету)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Нөмірдегі кешкі ас(нөмірде қызмет көрсету)" id="v128"></label>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>13. Мейрамханадағы таңғы асқа қанағаттандыңыз ба? </strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Жалпы таңғы ас?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v33" checked="checked" value="Өте ризамын
 (10-9)" id="v129">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v33" value="Ризамын (8-7)" id="v130">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Қанағаттандым (6-5)" id="v131">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Наразымын (4-3)" id="v132">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Өтенаразымын (2-1)" id="v133">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Жарамсыз (0)" id="v134">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Қабылдау сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v34" checked="checked" value="Өте ризамын
 (10-9)" id="v135">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v34" value="Ризамын (8-7)" id="v136">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Қанағаттандым (6-5)" id="v137">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Наразымын (4-3)" id="v138">Наразымын (4-3)</label>
</p>
				<p>
<label><input type="radio" name="v34"  value="Өтенаразымын (2-1)" id="v139">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Жарамсыз (0)" id="v140">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Қызмет көрсету сапасы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v35" checked="checked" value="Өте ризамын
 (10-9)" id="v141">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v35" value="Ризамын (8-7)" id="v142">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Қанағаттандым (6-5)" id="v143">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Наразымын (4-3)" id="v144">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Өтенаразымын (2-1)" id="v145">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Жарамсыз (0)" id="v146">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Ұсынылған тағамдар мен сусындардың сапасы мен таңдалуы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v36" checked="checked" value="Өте ризамын
 (10-9)" id="v147">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v36" value="Ризамын (8-7)" id="v148">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Қанағаттандым (6-5)" id="v149">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Наразымын (4-3)" id="v150">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Өтенаразымын (2-1)" id="v151">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Жарамсыз (0)" id="v152">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
	</table>
	<table>
		
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>14.	Сапа/баға ара-қатынасын қалай бағалар едіңіз?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v37" checked="checked" value="Керемет (10-9)" id="v153">Керемет (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v37" value="Жақсы (8-7)" id="v154">Жақсы (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Қанағаттанарлық (6-5)" id="v155">Қанағаттанарлық (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Орташа (4-3)" id="v156">Орташа (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Нашар (2-1)" id="v157">Нашар (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>15.	Сіз қонақүйімізде бар интернетке шығу құралдарын (WI-FI) пайдаландыңыз ба? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v38" checked="checked" value="Иә" id="v158">Иә</label>
				</p>
				<p>
<label><input type="radio" name="v38" value="Жоқ" id="v159">Жоқ</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>16.	Қонақүйден шығу кезінде Сізде қанағаттанушылық болды ма?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Шығу кезіндегі рәсімдеу жылдамдылығы?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v39" checked="checked" value="Өте ризамын
 (10-9)" id="v160">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v39" value="Ризамын (8-7)" id="v161">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Қанағаттандым (6-5)" id="v162">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Наразымын (4-3)" id="v163">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Өтенаразымын (2-1)" id="v164">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Жарамсыз (0)" id="v165">Жарамсыз (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Қызметкерлердің сыпайылығы және ықыластылығы?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v40" checked="checked" value="Өте ризамын
 (10-9)" id="v166">Өте ризамын
 (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v40" value="Ризамын (8-7)" id="v167">Ризамын (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Қанағаттандым (6-5)" id="v168">Қанағаттандым (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Наразымын (4-3)" id="v169">Наразымын (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Өтенаразымын (2-1)" id="v170">өте наразымын  (2-1)
</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Жарамсыз (0)" id="v171">Жарамсыз (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>17. Қонақүйде тұрған кезде Сізде қандай да бір проблемалар пайда болды ма? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v41"  value="Иә" id="v172">Иә</label>
				</p>
				<p>
<label><input type="radio" name="v41" checked="checked" value="Жоқ" id="v173">Жоқ</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>18.	 Сіздің қонақүйде тұруыңызды анағұрлым жағымды ету үшін не жасауымызға болады? (жауабыңыз болмаса, бұл алаңшаны бос қалдырыңыз) </strong></p>
				<br />
				<p>
<label><textarea name="v42" checked="checked"  id="v174" style="width:100%; height:70px;"></textarea></label>
				</p></td>
		</tr>
	</table>
	<br />
	<h3 align="center">Клиенттеріміздің қажеттіліктерін тереңірек түсінуіміз үшін мынадай сұрақтарға жауап беріңізші:</h3>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>19.	Соңғы 12 айдың ішінде біздің қонақүйімізде қанша түн қондыңыз?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Іскерлік мақсатта тұру шеңберіндегі түндердің саны</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v43" checked="checked" value="Бір түн де емес" id="v175">Бір түн де емес</label>
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
<label><input type="radio" name="v43"  value="90 түннен көп" id="v183">90 түннен көп</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Жеке мақсаттармен тұру шеңберріндегі түндердің саны</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v44" checked="checked" value="Бір түн де емес" id="v184">Бір түн де емес</label>
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
<label><input type="radio" name="v44"  value="90 түннен көп" id="v192">90 түннен көп</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>20.	Сіздің жынысыңыз? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v45" checked="checked" value="Ер" id="v193">Ер</label>
				</p>
				<p>
<label><input type="radio" name="v45" value="Әйел" id="v194">Әйел</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>21.	Сіздің жасыңыз? </strong></p>
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
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>22. Сіздің тұратын еліңіз? </strong></p>
				<br />
				<p>
<label><textarea name="v47" id="v202" style="width:100%; height:70px;"></textarea></label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>23.	Сіздің кәсібіңіз? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v48" value="Жұмысшы" checked="checked" id="v203">Жұмысшы</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Қызметші" id="v204">Қызметші</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Менеджер/көмекші" id="v205">Менеджер/көмекші</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Аға менеджер" id="v206">Аға менеджер</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Оқытушы" id="v207">Оқытушы</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Студент" id="v208">Студент</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Зейнеткер" id="v209">Зейнеткер</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Жұмыссыз" id="v210">Жұмыссыз</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Кәсіпорынның басшысы" id="v211">Кәсіпорынның басшысы</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Коммерсант" id="v212">Коммерсант</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Фирманың коммерциялық/жүріп-тұратын өкілі" id="v213">Фирманың коммерциялық/жүріп-тұратын өкілі</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Еркін кәсіп" id="v214">Еркін кәсіп</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Жауап бергім келмейді " id="v215">Жауап бергім келмейді </label>
				</p></td>
		</tr>
	</table>
</form>
<p align="center"><a href="javascript:send_vote();" class="link2" style="margin-left:0px; display:inline-block; float:none;"><em><b><span>Жiберу</span></b></em></a></p>
<style>
input[type=radio], input[type=checkbox]{ margin-right:10px; vertical-align:middle;}
</style>
<script>
function send_vote()
{
	if ($('#v3').val()=='')
	{
		alert('Введите дату вашего прибывания в отеле.')	
		$('#v3').focus();
	}else if ($('#v3v').val()=='')
	{
		alert('Введите дату вашего прибывания в отеле.')	
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
