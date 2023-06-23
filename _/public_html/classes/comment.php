<?php
/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль комментарии 
 */

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

class Comment {
	// Инфо для установки
	public $info_module			= 'Модуль комментарии';
	// версия
	public $lang 				= 'ru';
	// id блока с комментариями
	public $id_section;
	// заголовок комментариев
	public $title 				= 'Комментарии';
	// текст ссылки 
	public $text_link 			= 'Оставить комментарий';
	// текст Имя 
	public $text_name 			= 'Имя';
	// текст E-mail 
	public $text_mail 			= 'E-mail';
	// текст Комментарий 
	public $text_comment 		= 'Комментарий';
	// текст Кнопки 
	public $text_button 		= 'Отправить';
	// текст Ответить 
	public $text_replay 		= 'Ответить';
	// текст Добавлено 
	public $text_added 			= 'Добавлено';
	// текст Ошибки 
	public $text_error 			= 'Заполните обязательные поля';
	// текст Успешной отправки 
	public $text_success 		= 'Ваш комментарий успешно отправлен. После проверки администратором он отобразится на сайте.';
	// e-mail куда отправлять
	public $email 				= 'alpv88@gmail.com';
	
	
	//поля для модуля для блока
	public $fields = array(
						'com_act'	=> 'tinyint(4)',
						'com_date'	=> "datetime",
						'com_name'	=> "varchar(255)",
						'com_com'	=> "text",
						'com_mail'	=> 'text',
						'com_id'	=> 'int(11)'
					);
						   
	//поля для модуля для optiona
	public $option_fields = array(
								'com_act'		=> array(
													  "type_field"		=> 'i7',
												 	  "select_fields"	=> "1",
												 	  "name_ru"			=> "Активность",
												 	  "id_sort"			=> 10
												   ),
								'com_date'		=> array(
													  "type_field"		=> 'i2',
												 	  "select_fields"	=> "1",
												 	  "required_fields"	=> "0",
												 	  "name_ru"			=> "Дата",
												 	  "width"			=> "30",
												 	  "id_sort"			=> 20
												   ),
								'com_name'		=> array(
								  					  "type_field"		=> 'i1',
													  "select_fields"	=> "1",
												 	  "required_fields"	=> "1",
												 	  "name_ru"			=> "Название",
												 	  "width"			=> "30",
												 	  "id_sort"			=> 30,
												 	  "translit"		=> 1,
												 	  "search"			=> 1
												   ),
								'com_com'		=> array(
								  					  "type_field"		=> 'i6',
												 	  "select_fields"	=> "1",
												 	  "required_fields"	=> "0",
													  "name_ru"			=> "Комментарий",
													  "width"			=> "30",
												 	  "height"			=> "5",
												 	  "id_sort"			=> 40
												   ),
								'com_mail' 		=> array(
												 	  "type_field"		=> 'i1',
												 	  "select_fields"	=> "1",
												 	  "required_fields"	=> "0",
												 	  "name_ru"			=> "E-mail",
												 	  "width"			=> "30",
												 	  "id_sort"			=> 40
												   ),
								'com_id'		=> array(
													  "type_field"		=> 'i1',
												 	  "select_fields"	=> "0",
												 	  "required_fields"	=> "0",
												 	  "name_ru"			=> "ID элемента",
												 	  "width"			=> "30",
												 	  "id_sort"			=> 50
												  )
						);
												 
	// парамметры модуля
	public $params_fields = array(
								'text_link'		=> array(
														"type"		=> 'i1',
														"name"		=> "Название ссылки Оставить комментарий",
												 		"value"		=> "Оставить комментарий"
											   	   ),
								'text_name'		=> array(
														"type"		=> 'i1',
														"name"		=> "Название поля имя",
														"value"		=> "Имя"
												   ),
								'text_mail'		=> array(
													 	"type"		=> 'i1',
												 		"name"		=> "Название поля E-mail",
												 		"value"		=> "E-mail"
												   ),
								'text_comment'	=> array(
													    "type"		=> 'i1',
												 		"name"		=> "Название поля комментарий",
												 		"value"		=> "Комментарий"
												   ),
								'text_button'	=> array(
													 	"type"		=> 'i1',
												 		"name"		=> "Название кнопки отправить",
												 		"value"		=> "Отправить"
												   ),	
								'text_replay'	=> array(
													    "type"		=> 'i1',
												 	    "name"		=> "Название ссылки ответить",
												 	    "value"		=> "Ответить"
												   ),
								'text_added'	=> array(
														"type"		=> 'i1',
												 		"name"		=> "Текст когда добавлен комментария",
												 		"value"		=> "Добавлено"
												   ),
								'text_error'	=> array(
														"type"		=> 'i1',
												 		"name"		=> "Текст ошибки при не заполненных полях",
												 		"value"		=> "Заполните обязательные поля"
												   ),
								'text_success'	=> array(
														"type"		=> 'i1',
												 		"name"		=> "Текст успешной отправки комментария",
												 		"value"		=> "Ваш комментарий успешно отправлен. После проверки администратором он отобразится на сайте."
												   ),
								'email'			=> array(
														"type"		=> 'i1',
												 		"name"		=> "E-mail куда отправлять",
												 		"value"		=> "alpv88@gmail.com"
												   )
							);							  
	
		
	public function __construct(){
		$this->get_params();
	}
	
	// получение парамметров
	public function get_params(){
		global $ob;
		$s = mysql_query("select * from i_block where translit_name='comment'");	
		$r = mysql_fetch_array($s);
		$this->title = $r["name_block"];
		$this->id_section = $r["id"];
		$ss = mysql_query("select * from i_params where id_block='".$this->id_section."' and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
		{
			while($rr = mysql_fetch_array($ss))
			{
				if ($rr["name_en"] == 'text_link' 		&& $rr["value"]!='') $this->text_link 		= $rr["value"];
				if ($rr["name_en"] == 'text_name' 		&& $rr["value"]!='') $this->text_name		= $rr["value"];
				if ($rr["name_en"] == 'text_mail'		&& $rr["value"]!='') $this->text_mail		= $rr["value"]; 
				if ($rr["name_en"] == 'text_comment' 	&& $rr["value"]!='') $this->text_comment 	= $rr["value"]; 
				if ($rr["name_en"] == 'text_button' 	&& $rr["value"]!='') $this->text_button 	= $rr["value"]; 
				if ($rr["name_en"] == 'text_replay'		&& $rr["value"]!='') $this->text_replay		= $rr["value"]; 
				if ($rr["name_en"] == 'text_added' 		&& $rr["value"]!='') $this->text_added 		= $rr["value"]; 
				if ($rr["name_en"] == 'text_error'		&& $rr["value"]!='') $this->text_error		= $rr["value"]; 
				if ($rr["name_en"] == 'text_success' 	&& $rr["value"]!='') $this->text_success	= $rr["value"]; 	
				if ($rr["name_en"] == 'email' 			&& $rr["value"]!='') $this->email			= $rr["value"]; 	
			}	
		}
	}
	
	// формирование формы для комментариев
	public function get_form($lang,$id){
		global $ob;
		//защита от роботов
		
		if ($lang == 'ru')
		{
			$com_name2 = 'Оставить комментарий';
			$text_name = 'Имя';
			$text_send = 'Отправить';
		}
		else if ($lang == 'kz')
		{
			$com_name2 = 'Пікір қалдыру';
			$text_name = 'Аты';
			$text_send = 'Жіберу';
		}
		else if ($lang == 'en')
		{
			$com_name2 = 'Leave a comment';
			$text_name = 'Name';
			$text_send = 'To send';
		}
		
		$token = md5(uniqid(rand(), true));
		$_SESSION['token'] = $token;
		$str = array();
		if ($ob->check_admin())
			$str[] = $this->edit_params($lang,$this->id_section);
		$str[] = '<p><a href="javascript:show_comment()">'.$com_name2.'</a><a name="comment"></a></p>';
		$str[] = '<div style="display:none" id="comment_form">
				  <a href="#comment" id="click_to_comment" style=" display:none;">перейти</a>';
		$str[] = '<div id="comment_info" style="display:none"></div>';
		$str[] = '<div id="comment_msg" style="display:none"></div>';
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
							'.$text_name.' *
						</td>
						<td align="left" style="padding:5px;">
							<input type="text" id="comment_name" style="width:250px;" class="comment_field">
						</td>
					</tr>
					<tr>
						<td width="200" align="right" style="padding:5px;">
							'.$this->text_mail.'
						</td>
						<td align="left" style="padding:5px;">
							<input type="text" id="comment_mail" style="width:250px;" class="comment_field">
						</td>
					</tr>
					<tr>
						<td width="200" align="right" style="padding:5px;">
							'.$this->text_comment.' *
						</td>
						<td align="left" style="padding:5px;">
							<textarea id="comment_text" style="width:252px; height:50px;" class="comment_field"></textarea>
						</td>
					</tr>
					<tr>
						<td width="200" align="right" style="padding:5px;">
							&nbsp;
						</td>
						<td align="left" style="padding:5px;">
							<input type="button" id="comment_send" value="'.$text_send.'" style="width:150px;">
							<input type="hidden" id="com_id" value="'.$id.'">
							<input type="hidden" id="com_com_id" value="0">
							<input type="hidden" id="token" value="'.$token.'">
					
						</td>
					</tr>
					</table>';
		$str[] = '</div>';
		// код скрипта
		$str[] = '<script>';
		$str[] = 'function show_comment(){
		 		  	jQuery("#comment_form").slideToggle("slow");
				  }
			  	  function replay_to(id)
				  {
					jQuery("#comment_form").slideDown("slow");
					jQuery("#com_com_id").val(id);
				  }
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
						jQuery.post("/index.php",{
							id:jQuery(this).attr("rel"),
							com_act:act
						}, function(data){})
					});';
		}
		$str[] = 'jQuery("#comment_send").click(function(){
					var msg ="";
					if (jQuery("#comment_name").val()=="") 
					{
						jQuery("#comment_name").css("border","1px solid red");
						msg=1;
					}
					if (jQuery("#comment_text").val()=="") 
					{
						jQuery("#comment_text").css("border","1px solid red");
						msg=1;
					}
					
					if (msg!="")
					{
						alert("'.$this->text_error.'");	
					}
					else
					{
					console.log();
//						jQuery.post("/'.$this->lang.'/index.php",{
//							name:jQuery("#comment_name").val(),
//							mail:jQuery("#comment_mail").val(),
//							text:jQuery("#comment_text").val(),
//							com_id:jQuery("#com_id").val(),
//							com_com_id:jQuery("#com_com_id").val(),
//							token:jQuery("#token").val()
//						}, function(data){
//							jQuery("#comment_msg").html(data);
//							setTimeout(function() { 
//								jQuery("#comment_form").slideUp("slow");
//								jQuery("#comment_info").slideUp("slow").html("");  
//								jQuery("#com_com_id").val(0); }, 1500);
//							})	
						}	
					})	
				})';
		$str[] = '</script>';
		echo join("\n",$str);
	}
	
	// добавить комментарий
	public function add_comment($lang, $name, $mail, $text, $com_id, $ids){
		global $ob;
		$data = date("Y-m-d H:i:s");
		$name = $ob->pr($name);
		$mail = $ob->pr($mail);
		$text = nl2br($ob->pr($text));
		$com_id = intval($com_id);
		$ids = intval($ids);
		if ($ids == 0) $ids = $this->id_section;
		$s=mysql_query("insert into i_block (id_section, version, com_name, com_mail, com_act, com_date, com_com, com_id)
						values($ids,'$lang','$name', '$mail', '0', '$data', '$text', '$com_id')");	
		if ($s) return true;
		else return false;
	}
	
	// отправить почту
	public function send_mail($mail, $link, $name, $text){
		global $api;
		# Составляем письмо
		$headers  = "Content-type: text/html; charset=utf-8\n"; 
		$headers .= "From: ".$_SERVER['HTTP_HOST']." <admin@".$_SERVER['HTTP_HOST'].">\n";
		$message  = '<html>
					<body>
					Отправлено: '.date('d.m.Y').' в '.date('h:i').' с IP '.$_SERVER['REMOTE_ADDR'].'<br/>
					<br/>
					Поступил комментарий к странице <a href="'.$link.'">'.$link.'</a>. <br />
					<br />
					<strong>Имя</strong> <br />
					'.strip_tags($name).'<br />
					<br />
					<strong>Комментарий</strong><br />
					'.strip_tags($text).'<br />		
					</body>
					</html>';
		$send = mail($mail, $api->Strings->mime('Комментарий с сайта '.$_SERVER['HTTP_HOST']), $message, $headers);
		if ($send) return true;
		else return false;
	}
	
	// получение комментариев
	public function get_comment($lang, $com_id){
		global $api;
		global $ob;
		$str = array();
		$str[] = '<div style="padding:10px 0px;" id="comment_com">';
		$s = mysql_query("select * from i_block where com_id='$com_id' ".($ob->check_admin()?'':'and com_act=1')." 
						  and version='$lang' and id_section='$this->id_section' order by com_date desc");
		if ($s)
		{
			while($r=mysql_fetch_array($s))
			{
				$date = $api->Strings->date($lang, $r["com_date"], 'sql', 'datetimetext');
				$str[] = '<a name="comment'.$r["id"].'"></a><div style="border-radius: 5px;   border:1px dashed #ddd; 
							-moz-border-radius:5px;  -webkit-border-radius:5px; padding:10px; margin-bottom:10px;"> ';
				if ($ob->check_admin())
				{
					$str[] = '<label style="float:right">Активность <input type="checkbox" value="1" 
								class="admin_mod" rel="'.$r["id"].'" '.($r["com_act"]==1?'checked':'').'></label>';	
				}
				$str[] = '<p><strong>'.$r["com_name"].'</strong> | 
							'.$this->text_added.': 
							<span >'.$date.'</span></p>
							<p >'.nl2br(stripslashes($r["com_com"])).'</p>
							<a href="#comment" onclick="replay_to('.$r["id"].');" style="float:right">'.$this->text_replay.'</a>
							<br />
    					  </div>';
				// если есть ответы показать их
				if ($this->check_replay($lang, $r["id"]))
				{
					$str[] = $this->get_sub_comment($lang, $com_id, $r["id"], 30);
				}
			}	
		}
		$str[] = '</div>';
		echo join("\n",$str);
	}
	
	// получение ответов на комментарии
	public function get_sub_comment($lang, $com_id, $ids, $num){
		global $api;
		global $ob;
		$str = array();
		// до пятого уровня вложенности
		if ($num<=150) 
		{		
			$s = mysql_query("select * from i_block where com_id='$com_id' ".($ob->check_admin()?'':'and com_act=1')." 
								and version='$lang' and id_section='$ids' order by com_date desc");
			if ($s)
			{
				while($r=mysql_fetch_array($s))
				{
					$date = $api->Strings->date($lang, $r["com_date"], 'sql', 'datetimetext');
					$str[] = '<a name="comment'.$r["id"].'"></a><div style="border-radius: 5px;   border:1px dashed #ddd;
					-moz-border-radius:5px;  -webkit-border-radius:5px; padding:10px; margin-bottom:10px; margin-left:'.$num.'px">';
					// если админ может сразу модерировать
					if ($ob->check_admin())
					{
						$str[] = '<label style="float:right">Активность <input type="checkbox" value="1" 
									class="admin_mod" rel="'.$r["id"].'" '.($r["com_act"]==1?'checked':'').'></label>';
					}			  
								  
					$str[] = '	<p><strong>'.$r["com_name"].'</strong> | '.$this->text_added.': 
								<span>'.$date.'</span></p>
								<p>'.nl2br(stripslashes($r["com_com"])).'</p>
								'.($num==150?'':'<a href="#comment" onclick="replay_to('.$r["id"].');" style="float:right">
								'.$this->text_replay.'</a>
								<br />').'
								</div>';
					// проверяем если есть ответы то выводим их
					if ($this->check_replay($lang, $r["id"]))
					{
						$num = $num+30;
						$str[] = $this->get_sub_comment($lang, $com_id, $r["id"], $num);
						$num = $num-30;
					}
				}	
			}
		}
		return join("\n",$str);
	}
	
	// проверка существования ответов на комменты
	public function check_replay($lang, $id){
		$s = mysql_query("select * from i_block where id_section=".$id." and version='".$lang."'");
		if (mysql_num_rows($s)>0)
			return true;
		else
			return false; 
	}
	// редактировать парамметры
	public function edit_params($lang,$id)
	{
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Парамметры';
		echo '<div>';
		echo '<a href="javascript:edit_params(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '</div>';
		echo '</div>';
	}
	// установка модуля	
	public function install(){
		foreach ($this->fields as $k=>$v)
		{
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");
			$query=mysql_query("ALTER TABLE i_block ADD ".$k." ".$v."");	
		}
		$sel=mysql_query("select * from i_block where translit_name='comment'");
		if (mysql_num_rows($sel)==0)
		{
			$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
							values (0,'all','1','Комментарии','Блок для комментариев','40','comment')");	
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
	}
}
?>