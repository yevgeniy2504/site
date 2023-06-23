<?php

/**

 * @author Алисеевич Валерий

 * @copyright 2012

 * Модуль отзывы

 */



include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");



class Guest extends Helper{

	// Инфо для установки

	public $info_module		= 'Модуль отзывы';

	// версия

	public $lang 			= 'ru';

	// id блока с отзывами

	public $id_section;

	// количество элементов

	public $per_page 		= 10;

	// заголовок отзывов

	public $title 			= 'Отзывы';

	// текст ссылки

	public $text_link 		= 'Оставить отзыв';

	// текст Имя

	public $text_name 		= 'Имя';

	// текст E-mail

	public $text_mail 		= 'E-mail';

	// текст Отзыв

	public $text_guest 		= 'Отзыв';

	// текст Кнопки

	public $text_button 	= 'Отправить';

	// текст Добавлено

	public $text_added 		= 'Добавлено';

	// текст Ошибки

	public $text_error 		= 'Заполните обязательные поля';

	// текст Успешной отправки

	public $text_success 	= 'Ваш отзыв успешно отправлен. После проверки администратором он отобразится на сайте.';

	// e-mail куда отправлять

	public $email 			= 'alpv88@gmail.com';

	// отправлять e-mail

	public $send_mail 		= 1;


	public $stars;
	public $stars_total;





	//поля для модуля для блока

	public $fields 		  =	array('guest_act'	=>'tinyint(4)',

		'guest_date'	=>"datetime",

		'guest_name'	=>"varchar(255)",

		'guest_guest'	=>"text",

		'guest_mail'	=>'text');



	//поля для модуля для optiona

	public $option_fields = array('guest_act'	=>array("type_field"=>'i7',

		"select_fields"	=>"1",

		"name_ru"			=>"Активность",

		"id_sort"			=>10),

	'guest_date'	=>array("type_field"=>'i2',

		"select_fields"	=>"1",

		"required_fields"	=>"0",

		"name_ru"			=>"Дата",

		"width"			=>"30",

		"id_sort"			=>20),

	'guest_name'	=>array("type_field"=>'i1',

		"select_fields"	=>"1",

		"required_fields"	=>"1",

		"name_ru"			=>"Название",

		"width"			=>"30",

		"id_sort"			=>30,

		"translit"			=>1,

		"search"			=>1),

	'guest_guest'		=>array("type_field"=>'i6',

		"select_fields"	=>"1",

		"required_fields"	=>"0",

		"name_ru"			=>"Отзыв",

		"width"			=>"30",

		"height"			=>"5",

		"id_sort"			=>40),

	'guest_mail' 	=>array("type_field"=>'i1',

		"select_fields"	=>"1",

		"required_fields"	=>"0",

		"name_ru"			=>"E-mail",

		"width"			=>"30",

		"id_sort"			=>40)

);



	//парамметры модуля

	public $params_fields = array('per_page'	=>array("type"		=>'i1',

		"name"				=>"Количество элементов на страницу",

		"value"			=>"10"),

	'text_link'	=>array("type"		=>'i1',

		"name"				=>"Название формы отправки",

		"value"			=>"Оставить отзыв"),

	'text_name'	=>array("type"		=>'i1',

		"name"				=>"Название поля Имя",

		"value"			=>"Имя"),

	'text_mail'	=>array("type"		=>'i1',

		"name"				=>"Название поля E-mail",

		"value"			=>"E-mail"),

	'text_guest' 	=>array("type"		=>'i1',

		"name"				=>"Название поля Отзыв",

		"value"			=>"Отзыв"),

	'text_button'	=>array("type"		=>'i1',

		"name"				=>"Название кнопки отправить",

		"value"			=>"Отправить"),

	'text_added' 	=>array("type"		=>'i1',

		"name"				=>"Текст Добавлено для даты",

		"value"			=>"Добавлено"),

	'text_error' 	=>array("type"		=>'i1',

		"name"				=>"Текст ощибки",

		"value"			=>"Заполните обязательные поля"),

	'text_success'=>array("type"		=>'i1',

		"name"				=>"Текст успешной отправки",

		"value"			=>"Ваш отзыв успешно отправлен. После проверки администратором он отобразится на сайте."),

	'mail' 		=>array("type"		=>'i1',

		"name"				=>"Куда отправлять",

		"value"			=>"alpv88@gmail.com"),

	'send_mail'	=>array("type"		=>'i7',

		"name"				=>"Отправлять на почту",

		"value"			=>"1")

);









	function __counstuct(){



	}



	function get_name_for_bread($translit){

		$s = mysql_query("select name_block from i_block where translit_name = '$translit' limit 1");

		$r = mysql_fetch_array($s);



		return $r["name_block"];

	}



	public function get_bread($title){

		$this->parse_url($_SERVER['REQUEST_URI']);

		$str = array();

		$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'':'').'/">Гостиница «Уют»</a> / ';

		//$str[] = '<a href="/'.$this->lang.'/'.$this->url["module"].'/">'.$this->get_name_for_bread($this->url["module"]).'</a> / ';

		if ($this->url["block"])

		{

			$ids = $this->id_module;

			$ss = mysql_query("select * from i_block where translit_name = '".$this->url["block"]."' limit 1");

			$rr = mysql_fetch_array($ss);

			$ids1 = $rr["id"];

			//$str[] = '<a href="/'.$this->lang.'/'.$this->url["block"].'/">'.$this->get_name_for_bread($this->url["block"]).'</a> / ';

			$arr = array();

			while($ids1!=$ids)

			{

				$ss = mysql_query("select * from i_block where id = '".$ids1."' limit 1");

				$rr = mysql_fetch_array($ss);

				$arr[] = '<a href="/'.$this->lang.'/'.$this->url["module"].'/'.$rr["translit_name"].'/">'.$this->get_name_for_bread($rr["translit_name"]).'</a> / ';

				$ids1 = $rr["id_section"];



			}



			$str[] = join("\n", array_reverse($arr));

		}

		//if ($this->url["element"])

		//{

		if ($this->lang=='ru')

			$str[] = '<span>Отзывы</span> ';

		if ($this->lang=='en')

			$str[] = '<span>Customer reviews</span> ';

		if ($this->lang=='kz')

			$str[] = '<span>Қонақтар пікірлері</span> ';

		if ($this->lang=='zh')

			$str[] = '<span>客人反馈</span> ';

		//}

		echo join("\n",$str);

	}



	// получение парамметров

	function get_params(){



		global $ob;



		$s = mysql_query("select * from i_block where translit_name='guest'");

		@$r = mysql_fetch_array($s);



		if ($this->lang=='en')

		{

			$this->title ='Reviews';

		}

		else if ($this->lang=='ru')

		{

			$this->title ='Отзывы';

		} else {

			$this->title = $r["name_block"];

		}



		$this->id_section = $r["id"];
		$this->stars = $r["guest_star_count"];
		$this->stars_total = $r["guest_star_total"];



		$ss = mysql_query("select * from i_params where id_block='".$this->id_section."' and version='$this->lang'");

		if (mysql_num_rows($ss)>0)

		{

			while($rr = mysql_fetch_array($ss))

			{

				if ($rr["name_en"] == 'per_page' 		&& $rr["value"]!='') $this->per_page 		= $rr["value"];

				if ($rr["name_en"] == 'mail' 			&& $rr["value"]!='') $this->email 			= $rr["value"];

				if ($rr["name_en"] == 'text_link' 		&& $rr["value"]!='') $this->text_link 		= $rr["value"];

				if ($rr["name_en"] == 'text_name' 		&& $rr["value"]!='') $this->text_name 		= $rr["value"];

				if ($rr["name_en"] == 'text_mail' 		&& $rr["value"]!='') $this->text_mail 		= $rr["value"];

				if ($rr["name_en"] == 'text_guest' 		&& $rr["value"]!='') $this->text_guest 		= $rr["value"];

				if ($rr["name_en"] == 'text_button' 	&& $rr["value"]!='') $this->text_button 	= $rr["value"];

				if ($rr["name_en"] == 'text_added' 		&& $rr["value"]!='') $this->text_added 		= $rr["value"];

				if ($rr["name_en"] == 'text_error' 		&& $rr["value"]!='') $this->text_error 		= $rr["value"];

				if ($rr["name_en"] == 'text_success' 	&& $rr["value"]!='') $this->text_success 	= $rr["value"];

				if ($rr["name_en"] == 'send_mail' 		&& $rr["value"]!='') $this->send_mail 		= $rr["value"];

			}

		}



	}





	// формирование формы для отзывов

	function get_form($lang,$id){

		global $ob;

		//защита от роботов

		$token = md5(uniqid(rand(), true));

		$_SESSION['token'] = $token;

		$str = array();

		$str[] = '<span style="display:block; padding:20px 0px; font-size:18px;">'.$this->text_link.'<a name="guest"></a></span>';

		$str[] = '<div id="guest_form"><a href="#guest" id="click_to_guest" style=" display:none;">перейти</a>';

		$str[] = '<div id="guest_info" style="display:none"></div>';

		$str[] = '<div id="guest_msg" style="display:none"></div><br />';



		$str[] = '<table width="100%">

		<tr>

		<td width="200" id="reviewStars" align="right" style="padding:5px;">

		'.'Оценка:

		</td>

		<td align="left" style="padding:5px; position:relative">

		<!--[if lte IE 7]><style>#reviewStars-input{display:none}</style><![endif]-->

		<div id="reviewStars-input" class="tooltip">
		    <input id="star-4" type="radio" name="reviewStars"/>
		    <label class="review_stars" count="5" for="star-4"></label>

		    <input id="star-3" type="radio" name="reviewStars"/>
		    <label class="review_stars" count="4" for="star-3"></label>

		    <input id="star-2" type="radio" name="reviewStars"/>
		    <label class="review_stars" count="3" for="star-2"></label>

		    <input id="star-1" type="radio" name="reviewStars"/>
		    <label class="review_stars" count="2" for="star-1"></label>

		    <input id="star-0" type="radio" name="reviewStars"/>
		    <label class="review_stars" count="1" for="star-0"></label>


		</div>

		<span id="user_star_container" class="tooltiptext">
			Оценка <span id="user_star"></span>
		</span>

		<div>


			<div id="total_star_container" style="font-size: 80%;">
				<span id="total_star">'.$this->stars.'</span> из 5 на основе '.$this->stars_total.' оценок(ки)
			</div>


		</div>

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		'.$this->text_name.' *

		</td>

		<td align="left" style="padding:5px;">

		<input type="text" id="guest_name" style="width:250px;" class="guest_field">

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		'.$this->text_mail.'



		</td>

		<td align="left" style="padding:5px;">

		<input type="text" id="guest_mail" style="width:250px;" class="guest_field">

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		'.$this->text_guest.' *

		</td>

		<td align="left" style="padding:5px;">

		<textarea id="guest_text" style="width:248px; height:70px;" class="guest_field"></textarea>

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		&nbsp;

		</td>

		<td align="left" style="padding:5px;">

		<input type="button" id="guest_send" class="button " value="'.$this->text_button.'" style="width:150px;">



		<input type="hidden" id="token" value="'.$token.'">



		</td>

		</tr>

		</table>';



		$str[] = '</div>';



		// код скрипта

		$str[] = '<script>';





		$str[] = '

		jQuery(function(){';

		$str[] = "
			  var stars = document.getElementsByClassName('review_stars');
			  var user_star = document.getElementById('user_star_container');
			  var user_star_number = document.getElementById('user_star');
			  var q = 0;
			  var number = 0;
			  var total = '".$this->stars."';
			  var i, starsValue, starsValueInt;

			  if (total == '') total = 0;


			  for (i = stars.length - 1; i >= 0 ; i--) {
			  	starsValue = stars[i].getAttribute('count');
				starsValueInt = parseInt(starsValue);
			  	if (starsValueInt <= total) {
					stars[i].style.backgroundPosition = '0 -22.5px';
			  	}
			  }


			  for (i = 0; i < stars.length; i++) {

			    stars[i].addEventListener('click', function() {
			      number = this.getAttribute('count');
			      user_star.style.top = '2px';
			      user_star_number.innerHTML = number;
			    })

			  }
		";



		if ($ob->check_admin())

		{

			$str[] = 'jQuery(".admin_mod").click(function(){



				if (jQuery(this).attr("checked"))

				{

					var act = 1;

				}

				else

				{

					var act = 0;

				}



				jQuery.post("/'.$lang.'/guest.php",{

					id:jQuery(this).attr("rel"),

					guest_act:act

				}, function(data){



				})



			});';



		}



		$str[] = '	jQuery("#guest_send").click(function(){



			var msg ="";




			if (jQuery("#guest_name").val()=="") {jQuery("#guest_name").css("border","1px solid red");

			    msg=1;

		}

		if (jQuery("#guest_text").val()=="") {jQuery("#guest_text").css("border","1px solid red");

		msg=1;

	}

	if (number==0) {

	    jQuery("#reviewStars").css("border-bottom","2px solid red");

		msg=1;

	}



        if (msg == 1)

        {

            alert("'.$this->text_error.'");

        }

        else

        {


            var data = {

                        name:$("#guest_name").val(),

                        mail:$("#guest_mail").val(),

                        text:$("#guest_text").val(),

                        star: number,
                        id: "'.$this->id_section.'",

                        token:$("#token").val()

                    };

            $.ajax({
                type: "POST",
                url: "/'.$this->lang.'/add.php",
            async: false,
            data: data,
            success: function (data) {
            console.log(data)
                $("#guest_msg").html(data);
                setTimeout(function() { $("#guest_info").slideUp("slow").html("");  }, 2500);
            }

        });



	}



})



})';



$str[] = '</script>';



echo join("\n",$str);



}

function form_all_pages($lang,$id){

		global $ob;

		//защита от роботов

		$token = md5(uniqid(rand(), true));

		$_SESSION['token'] = $token;

		$str = array();

		$str[] = '<span style="display:block; padding:20px 0px; font-size:18px;">'.$this->text_link.'<a name="guest"></a></span>';

		$str[] = '<div id="guest_form"><a href="#guest" id="click_to_guest" style=" display:none;">перейти</a>';

		$str[] = '<div id="guest_info" style="display:none"></div>';

		$str[] = '<div id="guest_msg" style="display:none"></div><br />';



		$str[] = '<table width="100%">

		<tr>

		<td width="200" align="right" style="padding:5px;">

		'.$this->text_name.' *

		</td>

		<td align="left" style="padding:5px;">

		<input type="text" id="guest_name" style="width:250px;" class="guest_field">

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		'.$this->text_mail.'

		</td>

		<td align="left" style="padding:5px;">

		<input type="text" id="guest_mail" style="width:250px;" class="guest_field">

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		'.$this->text_guest.' *

		</td>

		<td align="left" style="padding:5px;">

		<textarea id="guest_text" style="width:248px; height:70px;" class="guest_field"></textarea>

		</td>

		</tr>

		<tr>

		<td width="200" align="right" style="padding:5px;">

		&nbsp;

		</td>

		<td align="left" style="padding:5px;">

		<input type="button" id="guest_send" class="button " value="'.$this->text_button.'" style="width:150px;">



		<input type="hidden" id="token" value="'.$token.'">



		</td>

		</tr>

		</table>';



		$str[] = '</div>';



		// код скрипта

		$str[] = '<script>';



		$str[] = '

		jQuery(function(){';



		if ($ob->check_admin())

		{

			$str[] = 'jQuery(".admin_mod").click(function(){



				if (jQuery(this).attr("checked"))

				{

					var act = 1;

				}

				else

				{

					var act = 0;

				}



				jQuery.post("/'.$lang.'/guest.php",{

					id:jQuery(this).attr("rel"),

					guest_act:act

				}, function(data){



				})



			});';



		}



		$str[] = '	jQuery("#guest_send").click(function(){



			var msg ="";



			if (jQuery("#guest_name").val()=="") {jQuery("#guest_name").css("border","1px solid red");

			msg=1;

		}

		if (jQuery("#guest_text").val()=="") {jQuery("#guest_text").css("border","1px solid red");

		msg=1;

	}



	if (msg!="")

	{

		alert("'.$this->text_error.'");

	}

	else

	{

		jQuery.post("/'.$this->lang.'/guest.php",{

			name:jQuery("#guest_name").val(),

			mail:jQuery("#guest_mail").val(),

			text:jQuery("#guest_text").val(),

			token:jQuery("#token").val()

		}, function(data){





			jQuery("#guest_msg").html(data);

			setTimeout(function() { jQuery("#guest_info").slideUp("slow").html("");  }, 2500);



		})

	}



})



})';



$str[] = '</script>';



echo join("\n",$str);



}



	// добавить отзыв

function add_guest($name, $mail, $text, $star,$id)
{


    global $ob;


    $data = date("Y-m-d H:i:s");

    $name = $ob->pr($name);

    $mail = $ob->pr($mail);

    $text = nl2br($ob->pr($text));

    if ($this->id_section == "") {
        $ids = $id;
    } else {
        $ids = $this->id_section;
    }




	/* Принимаем значение звезды пользователя */
	switch ($star) {
    case 1:
        $star_number = 1;
        break;
    case 2:
        $star_number = 2;
        break;
    case 3:
        $star_number = 3;
        break;
    case 4:
        $star_number = 4;
        break;
    case 5:
        $star_number = 5;
        break;
    default:
        $star_number = 0;
	}


	if ($star_number != 0) {

		//Выводим количество проголосовавших пользователей
		$s = mysql_query("SELECT * FROM i_block_elements WHERE id_section = $ids AND (guest_star != '' && guest_star != 0)");
		$totalComments = mysql_num_rows($s);

		//Выводим сумму звезд
		$max = 0;
		while($r = mysql_fetch_array($s)) {
			$max = $max + (int)$r['guest_star'];
		}


		//Если это первое голосование
		if ($totalComments == 0) {
			$totalComments = 1;
			$max = $star_number;
		}

		//Считаем avg рейтинг
		$renew = $max / $totalComments;






		if ($ids == 6)
        {
            //Обновляем столбец
            $s = mysql_query("UPDATE i_block SET guest_star_count=$renew, guest_star_total = $totalComments WHERE id = $ids");
        }
        else
        {
            //Обновляем столбец
            $s = mysql_query("UPDATE i_block_elements SET guest_star_count=$renew, guest_star_total = $totalComments WHERE id = $ids");
        }

	}


	$s=mysql_query("insert into i_block_elements (id_section, version, guest_name, guest_mail, guest_act, guest_date, guest_guest, guest_star)

		values($ids,'$this->lang','$name', '$mail', '0', '$data', '$text', '$star_number')");



	if ($s) return true;

	else return false;



}



	// отправить почту

function send_mail($link, $name, $text){



	global $api;



		# Составляем письмо

	$headers  = "Content-type: text/html; charset=utf-8\n";

	$headers .= "From: ".$_SERVER['HTTP_HOST']." <admin@".$_SERVER['HTTP_HOST'].">\n";

	$message = '<html>

	<body>

	Отправлено: '.date('d.m.Y').' в '.date('h:i').' с IP '.$_SERVER['REMOTE_ADDR'].'<br/>

	<br/>

	Поступил отзыв <a href="'.$link.'">'.$link.'</a>. <br />

	<br />

	<strong>'.$this->text_name.'</strong> <br />

	'.strip_tags($name).'<br />

	<br />

	<strong>'.$this->text_guest.'</strong><br />

	'.strip_tags($text).'<br />

	</body>

	</html>';



	$send = mail($this->email, $api->Strings->mime('Отзыв с сайта '.$_SERVER['HTTP_HOST']), $message, $headers);



	if ($send) return true;

	else return false;



}



	// получение отзывов

function get_guest($id){
	// die($_GET['']);


	global $api;

	global $ob;

    if ($id == "")
    {
        $ids = $this->id_section;
    }
    else
    {
        $ids = $id;
    }


	$str = array();



		// получаем парамметры

	$part_url=$this->get_url_part($_SERVER['REQUEST_URI']);

	$this->parse_url($_SERVER['REQUEST_URI']);



		# Инициализируем параметры класса Pages
		// die($ids);
	$api->Pag->setvars($this->lang,

		$part_url[0],

		@$part_url[1],

		mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block_elements`

			WHERE `id_section`='$ids' AND `version`='$this->lang' ".($ob->check_admin()?'':'and guest_act=1')." "), 0),

		$this->per_page,

		$this->get['p']);

		// $_GET['p']);







	$str[] = '<div  id="guest_com">';

	$str[] = '<div id="" class="" itemscope="" itemtype="http://schema.org/Article" data-nonce="">
<meta itemprop="headline" content="'.$this->title.'">
<meta itemprop="description" content="'.$description.'">
<meta itemprop="datePublished" content="2019">
<meta itemprop="dateModified" content="2019">
<meta itemprop="url" content="'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'">
<meta itemprop="author" content="Отель Уют">
<meta itemprop="mainEntityOfPage" content="'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'">
<div style="" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
<meta itemprop="url" content="https://www.hotel-uyut.kz/incom/template/template1/images/logo.png">
<meta itemprop="width" content="215">
<meta itemprop="height" content="120"></div>
<div style="" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
<meta itemprop="name" content="Гостиничный комплекс Уют">
<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject"><meta itemprop="url"
content="https://www.hotel-uyut.kz/incom/template/template1/images/logo.png"></div></div>
<div style="" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
<meta itemprop="bestRating" content="5">
<meta itemprop="worstRating" content="1">
<meta itemprop="ratingValue" content="'.$this->stars.'">
<meta itemprop="ratingCount" content="'.$this->stars_total.'"></div></div>';



	$s = mysql_query("select * from i_block_elements where id_section='$ids' ".($ob->check_admin()?'':'and guest_act=1')." and version='$this->lang' order by guest_date desc LIMIT ".$api->Pag->start_from.", $this->per_page");







	if (mysql_num_rows($s)>0)

	{

		$i=1;

		$str[]=$api->Pag->pages_gen().'<br />';

		while($r=mysql_fetch_array($s))

		{



			$str[] = '<div itemscope itemtype="http://schema.org/Review"><a itemprop="url" href="https://www.hotel-uyut.kz/guest/" style="display:none;"></a>';

			$date = $api->Strings->date($this->lang, $r["guest_date"], 'sql', 'datetimetext');



			$str[] = '<a name="guest'.$r["id"].'"></a><div style="padding:0 10px 15px; margin:0 0 15px; border-bottom:1px dashed #ccc"> ';

			if ($ob->check_admin())

			{

				$str[] = '<label style="float:right">Активность <input type="checkbox" value="1"

				class="admin_mod" rel="'.$r["id"].'" '.($r["guest_act"]==1?'checked':'').'></label>';

			}



			$str[] = '<p style="line-heihgt:20px;"><strong style=" color: #ea9103; font-size: 16px;"><span itemprop="author" itemscope itemtype="http://schema.org/Person">'.$r["guest_name"].'</span></strong> |

			'.$this->text_added.':

			<meta itemprop="datePublished" content="'.$r["guest_date"].'"><span style="color: #999; font-size: 14px;">'.$date.'s'.$_GET['p'].'f'.'</span></p>

			<p style="padidng:0px;"><span itemprop="description">'.nl2br(stripslashes($r["guest_guest"])).'</span></p>

			</div>';

			$str[] = '<div style="display:none;" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Organization">

			<span itemprop="name">Гостиничный комплекс «Уют»</span><br />

			<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

			<span itemprop="addressLocality">г.Алматы</span>, <span itemprop="streetAddress">ул.Гоголя, 127/1,<br />

			уг.пр.Сейфуллина</span>

			</span>

			<span itemprop="telephone">+7 (727) <strong style="color:#FFFFFF">279-51-11</strong></span><br/>

			<span itemprop="telephone">+7 (727) <strong style="color:#FFFFFF">279-55-11</strong></span><br/>

			<span itemprop="telephone">+7 (777) <strong style="color:#FFFFFF">218-31-32</strong></span>

			</div>';

			$str[] = '</div>';

			$i++;



		}



		$str[]=''.$api->Pag->pages_gen().'';

	}

	else

	{

		$str[] = '<br /><br /><br /><p align="center"><strong>Нет элементов.</strong></p><br /><br /><br />';

	}



	$str[] = '</div>';


			if(isset($this->get['p']) && !empty($this->get['p'])){
				//$this->title ='Отзывы - Страница '.$this->get['p'];
				$this->header_page($this->lang,array("title"=>'Отзывы гостей, посетивших гостиницу “Уют” в Алматы – Страница '.$this->get['p'],"h1title"=>'Отзывы - Страница '.$this->get['p']));
			}else{
				$this->title ='Отзывы';
				$this->header_page($this->lang,array("title"=>$this->title,"h1title"=>$this->title));
			}
	





	echo join("\n",$str);





	$this->get_form($this->lang,$this->id_section);



	if ($this->check_admin())

	{

		$this->edit_params($this->lang,$this->id_section);

	}



	$this->footer_page($this->lang);

}





	// редактировать парамметры

function edit_params($lang,$id)

{

	echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Парамметры';



	echo '<div>';



	echo '<a href="javascript:edit_params(\''.$lang.'\','.$id.')">Редактировать</a>';



	echo '</div>';





	echo '</div>';

}









	// установка модуля

function install(){



	$tmp_file = '/tmpl/guest.tpl';

	$ext_file = '/ru/guest.php';



	foreach ($this->fields as $k=>$v)

	{



		$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");

		$query=mysql_query("ALTER TABLE i_block ADD ".$k." ".$v."");



	}







	$sel=mysql_query("select * from i_block where translit_name='guest'");

	if (mysql_num_rows($sel)==0)

	{

		$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name)

			values (0,'all','1','Отзывы','Отзывы сайта','40','guest')");







		if ($s)

		{

			$s=mysql_query("select max(id) as idd from i_block");

			$r=mysql_fetch_array($s);



			foreach ($this->option_fields as $k=>$v)

			{

				$ss=mysql_query("insert into i_option (category,category_id, name_en)

					values ('block_elements','".$r["idd"]."','".$k."')");



				$sss=mysql_query("select max(id) as idd from i_option");

				$rrr=mysql_fetch_array($sss);



				foreach ($v as $q=>$w)

				{

					mysql_query("update i_option set $q='$w' where id=".$rrr["idd"]."");



				}



			}









			foreach ($this->option_fields as $k=>$v)

			{

				$ss=mysql_query("insert into i_option (category,category_id, name_en)

					values ('block','".$r["idd"]."','".$k."')");



				$sss=mysql_query("select max(id) as idd from i_option");

				$rrr=mysql_fetch_array($sss);



				foreach ($v as $q=>$w)

				{

					mysql_query("update i_option set $q='$w' where id=".$rrr["idd"]."");



				}



			}





			foreach ($this->params_fields as $k=>$v)

			{

				$ss=mysql_query("insert into i_params (id_block, name_en, version)

					values ('".$r["idd"]."','".$k."', 'ru')");



				$sss=mysql_query("select max(id) as idd from i_params");

				$rrr=mysql_fetch_array($sss);



				foreach ($v as $q=>$w)

				{

					mysql_query("update i_params set $q='$w' where id=".$rrr["idd"]."");



				}



				$ss=mysql_query("insert into i_params (id_block, name_en, version)

					values ('".$r["idd"]."','".$k."', 'kz')");



				$sss=mysql_query("select max(id) as idd from i_params");

				$rrr=mysql_fetch_array($sss);



				foreach ($v as $q=>$w)

				{

					mysql_query("update i_params set $q='$w' where id=".$rrr["idd"]."");



				}



				$ss=mysql_query("insert into i_params (id_block, name_en, version)

					values ('".$r["idd"]."','".$k."', 'en')");



				$sss=mysql_query("select max(id) as idd from i_params");

				$rrr=mysql_fetch_array($sss);



				foreach ($v as $q=>$w)

				{

					mysql_query("update i_params set $q='$w' where id=".$rrr["idd"]."");



				}



			}





		}



	}





	$fr = fopen($_SERVER['DOCUMENT_ROOT'].$tmp_file, "r");

	$fw = fopen($_SERVER['DOCUMENT_ROOT'].$ext_file, "w");

	while(!feof($fr))

	{

		$line = fgets($fr, 10240);

		fwrite($fw, $line);

	}

	fclose($fr);

	fclose($fw);



}



}

?>
