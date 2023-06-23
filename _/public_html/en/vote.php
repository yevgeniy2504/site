<? 
$lang="en";
$title="Vote";
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
			<td colspan="2" align="left" valign="top"><p><strong>1. Main purpose of your stay in the hotel?</strong></p></td>
		</tr><tr>
			<td align="left" valign="top"><p>'.$v1.'</p></td>
			<td align="left" valign="top"></td>
		</tr><tr>
			<td align="left" valign="top" ><p>
			<label for="v3">Period of your stay in the hotel:</label></p>
			<p>Check-in  '.$v2.'</p>
			<p>Check-out '.$v2v.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>2. Are you travelling:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>'.$v3.'</p></td>
			<td align="left" valign="middle"></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>3.	Speaking of your stay in our hotel, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Your stay in general?</p></td>
			<td align="left" valign="middle"><p>'.$v4.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label >Quality of service?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v5.'</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label>Helpfulness and friendliness of personnel?</label>	</p></td>
			<td align="left" valign="middle"><p>'.$v6.'</p></td>
		</tr>
		<tr>

			<td align="left" valign="top" ><p><label >Quality of accommodation?</label>	</p></td>
			<td align="left" valign="middle"><p>'.$v7.'</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p><label >Interest in your wellbeing?</label></p></td>
			<td align="left" valign="middle"><p>'.$v8.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>4.	What is your estimate of price-quality relationship?</strong></p>
				<br />
				<p>'.$v9.'</p></td>
		</tr>
	</table>';
$message.='<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>5.	Would your recommend our hotel to any of your friends?</strong></p>
				<br />
				<p>'.$v10.'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>6.	How did you book your room?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2"><p>'.$v11.'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>7.	Were you satisfied with reservation process on the whole?</strong></p>
				<br />
				<p>'.$v12.'</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>8.	If you remember your arrival to our hotel, how would you assess:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Cleanness and condition of area around the hotel?</p></td>
			<td align="left" valign="middle"><p>'.$v13.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Speed of check-in?</label>
			</p></td>
			<td align="left" valign="middle"><p>'.$v14.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Politeness and friendliness of personnel?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v15.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Did the receptionist settle you a room of the category that you had reserved?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v16.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>General atmosphere and design of the hotel?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v17.'
				</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Meeting your expectations?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v18.'
				</p>
				<strong></strong></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Have any additional services been offered to you (calling a taxi, restaurant reservation …)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v19.'</p>
				<strong></strong></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>9.	Have you been offered a customer loyalty card under one of the following programs upon checking-in: «Regular Customer», «Favorable Tariff», «Happy Birthday, Dear Guest!», «Discount for Feedback», «Callback», «Weekend Tariff»</strong></p>
				<br />
				<p>'.$v20.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>10.	If you remember your bathroom, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Cleanness?</p></td>
			<td align="left" valign="middle"><p>'.$v21.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Good general condition (floor, walls…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v22.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Proper operation of equipment (lighting, shower, faucets…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v23.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Bathroom products (soap, shower gel)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v24.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Your bathroom design?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v25.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>11.	   Assessing your room, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Cleanness?</p></td>
			<td align="left" valign="middle"><p>'.$v26.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Good general condition (floor, walls…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v27.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Proper equipment of room appliances (TV set, telephone…)?  </label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v28.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Room design?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v29.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Available TV Channels?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v30.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Bed comfort?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v31.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>12.	 Over the period of your stay, did you use the following restaurant services?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2"><p>'.join(',', $_POST["v32"]).'
				</p></td>
		</tr>
	</table>';
$message.='
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>13.	Assessing breakfasts in the restaurant, were you satisfied with:  </strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Breakfast in general?</p></td>
			<td align="left" valign="middle"><p>'.$v33.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Reception quality?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v34.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Service quality? </label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v35.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Quality and range of offered meals and beverages?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v36.'
				</p></td>
		</tr>
		<tr>
	</table>';
$message.='
	<table>
		
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>14.	  What is your estimation of price-quality relationship?</strong></p>
				<br />
				<p>'.$v37.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>15.	Did you use internet access means offered by the hotel (WI-FI) </strong></p>
				<br />
				<p>'.$v38.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>16.	Speaking of your checking out, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Speed of check out procedure?</p></td>
			<td align="left" valign="middle"><p>'.$v39.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Politeness and friendliness of the hotel personnel?</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v40.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>17.	  Did you face any problems over the period of your stay in our hotel?</strong></p>
				<br />
				<p>'.$v41.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>18. What could be done to make your stay in our hotel more pleasant? (if nothing, than leave this field blank) </strong></p>
				<br />
				<p>
'.$v42.'
				</p></td>
		</tr>
	</table>
	<br />
	<h3 align="center">Please, answer the following questions to help us better understand the needs of our guests:</h3>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>19.	How many nights did you stay in our hotel over the period of the last 12 months?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Number of nights during business trip</p></td>
			<td align="left" valign="middle"><p>'.$v43.'
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Number of nights during private trip</label>
				</p></td>
			<td align="left" valign="middle"><p>'.$v44.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>20.	Your sex? </strong></p>
				<br />
				<p>'.$v45.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>21.	Your age </strong></p>
				<br />
				<p>'.$v46.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>22.	     Your home country </strong></p>
				<br />
				<p>
'.$v47.'
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>23.	Your occupation </strong></p>
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
	
	if ($send) $ob->go('/en/vote.php?success');
	
}else
{
	if (isset($_GET["success"]))
	{
		?>
		<br /><br /><p align="center"><strong style="font-size:18px;"> Successfully sent!</strong></p>
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
			<td colspan="2" align="left" valign="top"><p><strong>1. Main purpose of your stay in the hotel?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top"><p>
<label for="v1">Business</label>
				</p></td>
			<td align="left" valign="top">
<label><input type="radio" name="v1" checked="checked" id="v1" value="Business"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v2">Leisure/personal</label>
				</p></td>
			<td align="left" valign="top">
<label><input type="radio" name="v1" value="Leisure/personal" id="v2"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2" ><p style="margin-bottom:5px;"><label for="v3">Period of your stay in the hotel:</label></p>
				<p style="margin-bottom:5px;">Check-in <label><input type="text" name="v2" value="" id="v3" style="margin-left:8px;" alt="data"></label></p>
				<p>Check-out <label><input type="text" name="v2v" value="" id="v3v" alt="data"></label></p>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>2. Are you travelling:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v4">Alone?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" checked="checked" value="Alone?" id="v4"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v5">With your spouse, without your child (children)?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="With your spouse, without your child (children)?" id="v5"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v6">With your spouse and child (children)?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="With your spouse and child (children)?" id="v6"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v7">With other persons?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="With other persons?" id="v7"></label>
				</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v8">In a group, within the framework of an organized tour?</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v3" value="In a group, within the framework of an organized tour?" id="v8"></label>
				</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>3.	Speaking of your stay in our hotel, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Your stay in general?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v4" checked="checked" value="Very satisfied (10-9)" id="v9">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v4" value="Satisfied (8-7)" id="v10">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Neutral (6-5)" id="v11">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v4"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Quality of service?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v5" checked="checked" value="Very satisfied (10-9)" id="v12">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v5" value="Satisfied (8-7)" id="v13">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Neutral (6-5)" id="v14">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v5"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Helpfulness and friendliness of personnel?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v6" checked="checked" value="Very satisfied (10-9)" id="v15">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v6" value="Satisfied (8-7)" id="v16">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Neutral (6-5)" id="v17">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v6"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Quality of accommodation?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v7" checked="checked" value="Very satisfied (10-9)" id="v18">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v7" value="Satisfied (8-7)" id="v19">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Neutral (6-5)" id="v20">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v7"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Interest in your wellbeing?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v8" checked="checked" value="Very satisfied (10-9)" id="v21">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v8" value="Satisfied (8-7)" id="v22">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Neutral (6-5)" id="v23">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v8"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>4.	What is your estimate of price-quality relationship?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v9" checked="checked" value="Perfect (10-9)" id="v24">Perfect (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v9" value="Good (8-7)" id="v25">Good (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Satisfactory (6-5)" id="v26">Satisfactory (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Mediocre (4-3)" id="v27">Mediocre (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v9"  value="Bad (2-1)" id="v28">Bad (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>5.	Would your recommend our hotel to any of your friends?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v10" checked="checked" value="Surely (10-9)" id="v29">Surely (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v10" value="Probably (8-7)" id="v30">Probably (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Maybe (6-5)" id="v31">Maybe (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Probably not (4-3)" id="v32">Probably not (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v10"  value="Not (2-1)" id="v33">Not (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>6.	How did you book your room?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v34">I called directly to your hotel;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" checked="checked" value="I called directly to your hotel;" id="v34"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v35">I called to the central reservation service;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="I called to the central reservation service;" id="v35"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v36">I booked my room at the web site www.hotel-uyut.kz; </label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="I booked my room at the web site www.hotel-uyut.kz; " id="v36"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v37">I booked my room at the web site www.booking.com; </label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="I booked my room at the web site www.booking.com; " id="v37"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v38">I booked my room at another web site;</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="radio" name="v11" value="I booked my room at another web site;" id="v38"></label>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>7.	Were you satisfied with reservation process on the whole?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v12" checked="checked" value="Very Satisfied (10-9)" id="v39">Very Satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v12" value="Satisfied (8-7)" id="v40">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Neutral (6-5)" id="v41">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Not Satisfied (4-3)" id="v42">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v12"  value="Very Dissatisfied (2-1)" id="v43">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>8.	If you remember your arrival to our hotel, how would you assess:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Cleanness and condition of area around the hotel?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v13" checked="checked" value="Very satisfied (10-9)" id="v44">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v13" value="Satisfied (8-7)" id="v45">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Neutral (6-5)" id="v46">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v13"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Speed of check-in?</label>
			</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v14" checked="checked" value="Very satisfied (10-9)" id="v47">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v14" value="Satisfied (8-7)" id="v48">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Neutral (6-5)" id="v49">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v14"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Politeness and friendliness of personnel?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v15" checked="checked" value="Very satisfied (10-9)" id="v50">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v15" value="Satisfied (8-7)" id="v51">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Neutral (6-5)" id="v52">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v15"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Did the receptionist settle you a room of the category that you had reserved?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v16" checked="checked" value="Very satisfied (10-9)" id="v53">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v16" value="Satisfied (8-7)" id="v54">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Neutral (6-5)" id="v55">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v16"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>General atmosphere and design of the hotel?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v17" checked="checked" value="Very satisfied (10-9)" id="v56">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v17" value="Satisfied (8-7)" id="v57">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Neutral (6-5)" id="v58">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v17"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Meeting your expectations?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v18" checked="checked" value="Very satisfied (10-9)" id="v59">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v18" value="Satisfied (8-7)" id="v60">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Neutral (6-5)" id="v61">Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v18"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Have any additional services been offered to you (calling a taxi, restaurant reservation …)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v19" checked="checked" value="Very satisfied (10-9)" id="v62">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v19" value="Satisfied (8-7)" id="v63">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Neutral (6-5)" id="v64">	Neutral (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Not Satisfied (4-3)" id="v11">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v19"  value="Very Dissatisfied (2-1)" id="v11">Very Dissatisfied (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>9.	Have you been offered a customer loyalty card under one of the following programs upon checking-in: «Regular Customer», «Favorable Tariff», «Happy Birthday, Dear Guest!», «Discount for Feedback», «Callback», «Weekend Tariff»</strong></p>
				<br />
				<p>
<label><input type="radio" name="v20" checked="checked" value="Yes" id="v65">Yes</label>
				</p>
				<p>
<label><input type="radio" name="v20" value="No" id="v66">No</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>10.	If you remember your bathroom, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Cleanness?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v21" checked="checked" value="Very satisfied (10-9)" id="v67">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v21" value="Satisfied (8-7)" id="v68">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Bearable (6-5)" id="v69">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Not Satisfied (4-3)" id="v70">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Very Dissatisfied (2-1)" id="v91">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v21"  value="Not Applicable (0)" id="v92">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Good general condition (floor, walls…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v22" checked="checked" value="Very satisfied (10-9)" id="v71">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v22" value="Satisfied (8-7)" id="v72">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Bearable (6-5)" id="v73">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Not Satisfied (4-3)" id="v74">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Very Dissatisfied (2-1)" id="v91">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v22"  value="Not Applicable (0)" id="v92">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Proper operation of equipment (lighting, shower, faucets…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v23" checked="checked" value="Very satisfied (10-9)" id="v75">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v23" value="Satisfied (8-7)" id="v76">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Bearable (6-5)" id="v77">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Not Satisfied (4-3)" id="v78">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Very Dissatisfied (2-1)" id="v91">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v23"  value="Not Applicable (0)" id="v92">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Bathroom products (soap, shower gel)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v24" checked="checked" value="Very satisfied (10-9)" id="v79">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v24" value="Satisfied (8-7)" id="v80">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Bearable (6-5)" id="v81">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Not Satisfied (4-3)" id="v82">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Very Dissatisfied (2-1)" id="v91">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v24"  value="Not Applicable (0)" id="v92">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Your bathroom design?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v25" checked="checked" value="Very satisfied (10-9)" id="v83">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v25" value="Satisfied (8-7)" id="v84">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Bearable (6-5)" id="v85">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Not Satisfied (4-3)" id="v86">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Very Dissatisfied (2-1)" id="v91">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v25"  value="Not Applicable (0)" id="v92">Not Applicable (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>11.	   Assessing your room, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Cleanness?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v26" checked="checked" value="Very satisfied (10-9)" id="v87">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v26" value="Satisfied (8-7)" id="v88">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Bearable (6-5)" id="v89">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Not Satisfied (4-3)" id="v90">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Very Dissatisfied (2-1)" id="v91">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v26"  value="Not Applicable (0)" id="v92">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Good general condition (floor, walls…)?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v27" checked="checked" value="Very satisfied (10-9)" id="v93">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v27" value="Satisfied (8-7)" id="v94">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Bearable (6-5)" id="v95">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Not Satisfied (4-3)" id="v96">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Very Dissatisfied (2-1)" id="v97">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v27"  value="Not Applicable (0)" id="v98">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Proper equipment of room appliances (TV set, telephone…)?  </label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v28" checked="checked" value="Very satisfied (10-9)" id="v99">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v28" value="Satisfied (8-7)" id="v100">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Bearable (6-5)" id="v101">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Not Satisfied (4-3)" id="v102">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Very Dissatisfied (2-1)" id="v103">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v28"  value="Not Applicable (0)" id="v104">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Room design?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v29" checked="checked" value="Very satisfied (10-9)" id="v105">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v29" value="Satisfied (8-7)" id="v106">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Bearable (6-5)" id="v107">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Not Satisfied (4-3)" id="v108">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Very Dissatisfied (2-1)" id="v109">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v29"  value="Not Applicable (0)" id="v110">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Available TV Channels?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v30" checked="checked" value="Very satisfied (10-9)" id="v111">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v30" value="Satisfied (8-7)" id="v112">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Bearable (6-5)" id="v113">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Not Satisfied (4-3)" id="v114">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Very Dissatisfied (2-1)" id="v115">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v30"  value="Not Applicable (0)" id="v116">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Bed comfort?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v31" checked="checked" value="Very satisfied (10-9)" id="v117">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v31" value="Satisfied (8-7)" id="v118">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Bearable (6-5)" id="v119">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Not Satisfied (4-3)" id="120">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Very Dissatisfied (2-1)" id="v121">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v31"  value="Not Applicable (0)" id="v122">Not Applicable (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>12.	 Over the period of your stay, did you use the following restaurant services?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" width="275"><p>
<label for="v123">Breakfast in the restaurant</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]"  value="Breakfast in the restaurant" id="v123"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v124">Breakfast in the room (room service)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Breakfast in the room (room service)" id="v124"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v125">Lunch in the restaurant</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Lunch in the restaurant" id="v125"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v126">Lunch in the room (room service)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Lunch in the room (room service)" id="v126"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v127">Dinner in the restaurant</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Dinner in the restaurant" id="v127"></label>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label for="v128">Dinner in the room (room service)</label>
				</p></td>
			<td align="left" valign="middle">
<label><input type="checkbox" name="v32[]" value="Dinner in the room (room service)" id="v128"></label>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>13.	Assessing breakfasts in the restaurant, were you satisfied with:  </strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Breakfast in general?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v33" checked="checked" value="Very satisfied (10-9)" id="v129">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v33" value="Satisfied (8-7)" id="v130">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Bearable (6-5)" id="v131">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Not Satisfied (4-3)" id="v132">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Very Dissatisfied (2-1)" id="v133">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v33"  value="Not Applicable (0)" id="v134">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Reception quality?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v34" checked="checked" value="Very satisfied (10-9)" id="v135">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v34" value="Satisfied (8-7)" id="v136">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Bearable (6-5)" id="v137">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Not Satisfied (4-3)" id="v138">Not Satisfied (4-3)</label>
</p>
				<p>
<label><input type="radio" name="v34"  value="Very Dissatisfied (2-1)" id="v139">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v34"  value="Not Applicable (0)" id="v140">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label>Service quality? </label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v35" checked="checked" value="Very satisfied (10-9)" id="v141">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v35" value="Satisfied (8-7)" id="v142">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Bearable (6-5)" id="v143">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Not Satisfied (4-3)" id="v144">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Very Dissatisfied (2-1)" id="v145">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v35"  value="Not Applicable (0)" id="v146">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Quality and range of offered meals and beverages?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v36" checked="checked" value="Very satisfied (10-9)" id="v147">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v36" value="Satisfied (8-7)" id="v148">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Bearable (6-5)" id="v149">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Not Satisfied (4-3)" id="v150">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Very Dissatisfied (2-1)" id="v151">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v36"  value="Not Applicable (0)" id="v152">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
	</table>
	<table>
		
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>14.	  What is your estimation of price-quality relationship?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v37" checked="checked" value="Perfect (10-9)" id="v153">Perfect (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v37" value="Good (8-7)" id="v154">Good (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Satisfactory (6-5)" id="v155">Satisfactory (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Mediocre (4-3)" id="v156">Mediocre (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v37"  value="Bad (2-1)" id="v157">Bad (2-1)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>15.	Did you use internet access means offered by the hotel (WI-FI) </strong></p>
				<br />
				<p>
<label><input type="radio" name="v38" checked="checked" value="Yes" id="v158">Yes</label>
				</p>
				<p>
<label><input type="radio" name="v38" value="No" id="v159">No</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>16.	Speaking of your checking out, were you satisfied with:</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Speed of check out procedure?</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v39" checked="checked" value="Very satisfied (10-9)" id="v160">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v39" value="Satisfied (8-7)" id="v161">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Bearable (6-5)" id="v162">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Not Satisfied (4-3)" id="v163">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Very Dissatisfied (2-1)" id="v164">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v39"  value="Not Applicable (0)" id="v165">Not Applicable (0)</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Politeness and friendliness of the hotel personnel?</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v40" checked="checked" value="Very satisfied (10-9)" id="v166">Very satisfied (10-9)</label>
				</p>
				<p>
<label><input type="radio" name="v40" value="Satisfied (8-7)" id="v167">Satisfied (8-7)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Bearable (6-5)" id="v168">Bearable (6-5)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Not Satisfied (4-3)" id="v169">Not Satisfied (4-3)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Very Dissatisfied (2-1)" id="v170">Very Dissatisfied (2-1)</label>
				</p>
				<p>
<label><input type="radio" name="v40"  value="Not Applicable (0)" id="v171">Not Applicable (0)</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>17.	  Did you face any problems over the period of your stay in our hotel?</strong></p>
				<br />
				<p>
<label><input type="radio" name="v41"  value="Yes" id="v172">Yes</label>
				</p>
				<p>
<label><input type="radio" name="v41" checked="checked" value="No" id="v173">No</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>18. What could be done to make your stay in our hotel more pleasant? (if nothing, than leave this field blank) </strong></p>
				<br />
				<p>
<label><textarea name="v42" checked="checked"  id="v174" style="width:100%; height:70px;"></textarea></label>
				</p></td>
		</tr>
	</table>
	<br />
	<h3 align="center">Please, answer the following questions to help us better understand the needs of our guests:</h3>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>19.	How many nights did you stay in our hotel over the period of the last 12 months?</strong></p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>Number of nights during business trip</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v43" checked="checked" value="None" id="v175">None</label>
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
<label><input type="radio" name="v43"  value="Over 90 nights" id="v183">Over 90 nights</label>
				</p></td>
		</tr>
		<tr>
			<td align="left" valign="top" ><p>
<label >Number of nights during private trip</label>
				</p></td>
			<td align="left" valign="middle"><p>
<label><input type="radio" name="v44" checked="checked" value="None" id="v184">None</label>
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
<label><input type="radio" name="v44"  value="Over 90 nights" id="v192">Over 90 nights</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>20.	Your sex? </strong></p>
				<br />
				<p>
<label><input type="radio" name="v45" checked="checked" value="Male" id="v193">Male</label>
				</p>
				<p>
<label><input type="radio" name="v45" value="Female" id="v194">Female</label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>21.	Your age </strong></p>
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
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>22.	     Your home country </strong></p>
				<br />
				<p>
<label><textarea name="v47" id="v202" style="width:100%; height:70px;"></textarea></label>
				</p></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="2" align="left" valign="top"><p style="margin-top:15px;"><strong>23.	Your occupation </strong></p>
				<br />
				<p>
<label><input type="radio" name="v48" value="Worker" checked="checked" id="v203">Worker</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Employee" id="v204">Employee</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Manager/assistant" id="v205">Manager/assistant</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Senior manager" id="v206">Senior manager</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Teacher" id="v207">Teacher</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Student" id="v208">Student</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Pensioner" id="v209">Pensioner</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Unemployed" id="v210">Unemployed</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Company manager" id="v211">Company manager</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Businessman" id="v212">Businessman</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Commercial/field representative of a company" id="v213">Commercial/field representative of a company</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="Freelance job" id="v214">Freelance job</label>
				</p>
				<p>
<label><input type="radio" name="v48" value="I don’t want to answer " id="v215">I don’t want to answer  </label>
				</p></td>
		</tr>
	</table>
</form>
<p align="center"><a href="javascript:send_vote();" class="link2" style="margin-left:0px; display:inline-block; float:none;"><em><b><span>Send</span></b></em></a></p>
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
