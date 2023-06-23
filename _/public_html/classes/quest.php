<?php
/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль вопрос ответ 
 */

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

class Quest extends Helper{
	// Инфо для установки
	public $info_module		= 'Модуль вопрос ответ';
	// версия
	public $lang 			= 'ru';
	// id блока с отзывами
	public $id_section;
	// количество элементов
	public $per_page 		= 10;
	// заголовок отзывов
	public $title 			= 'Вопрос ответ';
	// текст ссылки 
	public $text_link 		= 'Задать вопрос';
	// текст Имя 
	public $text_name 		= 'Имя';
	// текст E-mail 
	public $text_mail 		= 'E-mail';
	// текст Вопрос 
	public $text_quest 		= 'Вопрос';
	// текст Вопрос  при выводе
	public $text_vopros 	= 'Вопрос';
	// текст Ответ при выводе 
	public $text_answer		= 'Ответ';
	// текст Кнопки 
	public $text_button 	= 'Отправить';
	// текст Добавлено 
	public $text_added 		= 'Добавлено';
	// текст Ошибки 
	public $text_error 		= 'Заполните обязательные поля';
	// текст Успешной отправки 
	public $text_success 	= 'Ваш вопрос успешно отправлен. После ответа администратора он отобразится на сайте.';
	// e-mail куда отправлять
	public $email 			= 'alpv88@gmail.com';
	// отправлять e-mail
	public $send_mail 		= 1;
	// скрывать ответ
	public $hide_answer 	= 1;
	
	
	//поля для модуля для блока
	public $fields 		  =	array('quest_act'	=>'tinyint(4)',
						   		  'quest_date'	=>"datetime",
								  'quest_name'	=>"varchar(255)",
								  'quest_quest'	=>"text",
								  'quest_answer'=>"text",
								  'quest_mail'	=>'text');
						   
	//поля для модуля для optiona
	public $option_fields = array('quest_act'	=>array("type_field"=>'i7',
												 "select_fields"	=>"1",
												 "name_ru"			=>"Активность",
												 "id_sort"			=>10),
								  'quest_date'	=>array("type_field"=>'i2',
												 "select_fields"	=>"1",
												 "required_fields"	=>"0",
												 "name_ru"			=>"Дата",
												 "width"			=>"30",
												 "id_sort"			=>20),
								  'quest_name'	=>array("type_field"=>'i1',
												 "select_fields"	=>"1",
												 "required_fields"	=>"1",
												 "name_ru"			=>"Название",
												 "width"			=>"30",
												 "id_sort"			=>30,
												 "translit"			=>1,
												 "search"			=>1),
								  'quest_quest'	=>array("type_field"=>'i6',
												 "select_fields"	=>"1",
												 "required_fields"	=>"0",
												 "name_ru"			=>"Вопрос",
												 "width"			=>"30",
												 "height"			=>"5",
												 "id_sort"			=>40),
								  'quest_answer'=>array("type_field"=>'i6',
												 "select_fields"	=>"1",
												 "required_fields"	=>"0",
												 "name_ru"			=>"Ответ",
												 "width"			=>"30",
												 "height"			=>"5",
												 "id_sort"			=>40),
								  'quest_mail' 	=>array("type_field"=>'i1',
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
												 "value"			=>"Задать вопрос"),
								  'text_name'	=>array("type"		=>'i1',
												 "name"				=>"Название поля Имя",
												 "value"			=>"Имя"),
								  'text_mail'	=>array("type"		=>'i1',
												 "name"				=>"Название поля E-mail",
												 "value"			=>"E-mail"),
								  'text_quest' 	=>array("type"		=>'i1',
												 "name"				=>"Название поля Вопрос",
												 "value"			=>"Вопрос"),
								  'text_vopros'	=>array("type"		=>'i1',
												 "name"				=>"Текст вопрос при выводе",
												 "value"			=>"Вопрос"),
								  'text_answer'	=>array("type"		=>'i1',
												 "name"				=>"Текст ответ при выводе",
												 "value"			=>"Ответ"),
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
												 "value"			=>"Ваш вопрос успешно отправлен. После ответ администратора он отобразится на сайте."),
								  'mail' 		=>array("type"		=>'i1',
												 "name"				=>"Куда отправлять",
												 "value"			=>"alpv88@gmail.com"),
								  'send_mail'	=>array("type"		=>'i7',
												 "name"				=>"Отправлять на почту",
												 "value"			=>"1"),
								  'hide_answer'	=>array("type"		=>'i7',
												 "name"				=>"Скрывать ответ",
												 "value"			=>"1")
									);
												 
								  
	
		
	function __construct(){
		parent::__construct();
		$this->get_params();		
	}
	
	function get_name_for_bread($translit){
		$s = mysql_query("select name_block from i_block where translit_name = '$translit' limit 1");
		$r = mysql_fetch_array($s);
		
		return $r["name_block"];
	}
	
	public function get_bread($title){
		$this->parse_url($_SERVER['REQUEST_URI']);
		$str = array();
		$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/index.php">Главная</a> / ';
		$str[] = '<a href="/'.$this->lang.'/'.$this->url["module"].'/">'.$this->get_name_for_bread($this->url["module"]).'</a> / ';
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
		if ($this->url["element"])
		{
			$str[] = '<span>'.$title.'</span> ';
		}	
		echo join("\n",$str);
	}
	
	// получение парамметров
	function get_params(){
		
		global $ob;
		
		$s = mysql_query("select * from i_block where translit_name='quest'");	
		$r = mysql_fetch_array($s);
		
		$this->title = $r["name_block"];
		
		$this->id_section = $r["id"];
		
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
				if ($rr["name_en"] == 'text_quest' 		&& $rr["value"]!='') $this->text_quest 		= $rr["value"]; 
				if ($rr["name_en"] == 'text_button' 	&& $rr["value"]!='') $this->text_button 	= $rr["value"]; 
				if ($rr["name_en"] == 'text_added' 		&& $rr["value"]!='') $this->text_added 		= $rr["value"]; 
				if ($rr["name_en"] == 'text_error' 		&& $rr["value"]!='') $this->text_error 		= $rr["value"]; 	
				if ($rr["name_en"] == 'text_success' 	&& $rr["value"]!='') $this->text_success 	= $rr["value"]; 	
				if ($rr["name_en"] == 'send_mail' 		&& $rr["value"]!='') $this->send_mail 		= $rr["value"];
				if ($rr["name_en"] == 'hide_answer' 	&& $rr["value"]!='') $this->hide_answer 	= $rr["value"];
				if ($rr["name_en"] == 'text_vopros' 	&& $rr["value"]!='') $this->text_vopros 	= $rr["value"];
				if ($rr["name_en"] == 'text_answer' 	&& $rr["value"]!='') $this->text_answer 	= $rr["value"]; 	
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
		$str[] = '<h3>'.$this->text_link.'<a name="quest"></a></h3>';
		$str[] = '<div id="quest_form"><a href="#quest" id="click_to_quest" style=" display:none;">перейти</a>';
		$str[] = '<div id="quest_info" style="display:none"></div>';
		$str[] = '<div id="quest_msg" style="display:none"></div><br />';
		
		$str[] = '<table width="100%">
					<tr>
						<td width="200" align="right" style="padding:5px;">
							'.$this->text_name.' *
						</td>
						<td align="left" style="padding:5px;">
							<input type="text" id="quest_name" style="width:250px;" class="quest_field">
						</td>
					</tr>
					<tr>
						<td width="200" align="right" style="padding:5px;">
							'.$this->text_mail.'
						</td>
						<td align="left" style="padding:5px;">
							<input type="text" id="quest_mail" style="width:250px;" class="quest_field">
						</td>
					</tr>
					<tr>
						<td width="200" align="right" style="padding:5px;">
							'.$this->text_quest.' *
						</td>
						<td align="left" style="padding:5px;">
							<textarea id="quest_text" style="width:248px; height:70px;" class="quest_field"></textarea>
						</td>
					</tr>
					<tr>
						<td width="200" align="right" style="padding:5px;">
							&nbsp;
						</td>
						<td align="left" style="padding:5px;">
							<input type="button" id="quest_send" class="button " value="'.$this->text_button.'" style="width:150px;">
							
							<input type="hidden" id="token" value="'.$token.'">
					
						</td>
					</tr>
					</table>';
		
		$str[] = '</div>';
		
		// код скрипта
		$str[] = '<script>';
		
		$str[] = '				
				jQuery(function(){
					
					// Открыть ответ
					jQuery("div.question").click(function()
					{
						if (jQuery(this).attr("alt") == 0)
						{
						  jQuery(this).attr("alt","1").parent().find(".answer").slideDown();
						} else {
						  jQuery(this).attr("alt","0").parent().find(".answer").slideUp();
						}
					});';
					
		
		
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
						
						jQuery.post("/'.$lang.'/quest.php",{
							id:jQuery(this).attr("rel"),
							quest_act:act
						}, function(data){
							
						})
						
					  });';
					
		}
					
		$str[] = '	jQuery("#quest_send").click(function(){
					
					var msg ="";
					
					if (jQuery("#quest_name").val()=="") {jQuery("#quest_name").css("border","1px solid red");
						msg=1;
					}
					if (jQuery("#quest_text").val()=="") {jQuery("#quest_text").css("border","1px solid red");
						msg=1;
					}
					
					if (msg!="")
					{
						alert("'.$this->text_error.'");	
					}
					else
					{
						jQuery.post("/'.$this->lang.'/quest.php",{
							name:jQuery("#quest_name").val(),
							mail:jQuery("#quest_mail").val(),
							text:jQuery("#quest_text").val(),
							token:jQuery("#token").val()
						}, function(data){
							
							
							jQuery("#quest_msg").html(data);
							setTimeout(function() { jQuery("#quest_info").slideUp("slow").html("");  }, 2500);
								
						})	
					}	
						
					})	
					
				})';
		if ($ob->check_admin())
		{		
			$str[] = '
				// сохраняем ответ
				
				function save_answer(id){
					
					var val = jQuery("#quest_answer"+id).val();
					
					val = encodeURIComponent(val);	
					
					jQuery.post("/'.$this->lang.'/quest.php",{
							id:id,
							value:val
						}, function(data){
							
						})
					
				}		
				
				';
		}
		
		$str[] = '</script>';
		
		echo join("\n",$str);
		
	}
	
	// добавить отзыв
	function add_quest($name, $mail, $text){
		
		global $ob;
		
		$data = date("Y-m-d H:i:s");
		$name = $ob->pr($name);
		$mail = $ob->pr($mail);
		$text = nl2br($ob->pr($text));
		$ids = $this->id_section;
		
		$s=mysql_query("insert into i_block_elements (id_section, version, quest_name, quest_mail, quest_act, quest_date, quest_quest)
						values($ids,'$this->lang','$name', '$mail', '0', '$data', '$text')");	
		
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
					Поступил вопрос <a href="'.$link.'">'.$link.'</a>. <br />
					<br />
					<strong>'.$this->text_name.'</strong> <br />
					'.strip_tags($name).'<br />
					<br />
					<strong>'.$this->text_quest.'</strong><br />
					'.strip_tags($text).'<br />		
					</body>
					</html>';

		$send = mail($this->email, $api->Strings->mime('Вопрос с сайта '.$_SERVER['HTTP_HOST']), $message, $headers);
		
		if ($send) return true;
		else return false;

	}
	
	// получение отзывов
	function get_quest(){
		
		global $api;
		global $ob;
		
		$str = array();
		
		// получаем парамметры 
		$part_url=$this->get_url_part($_SERVER['REQUEST_URI']);
		$this->parse_url($_SERVER['REQUEST_URI']);
		
		# Инициализируем параметры класса Pages
		$api->Pag->setvars($this->lang, 
						$part_url[0], 
						@$part_url[1], 
						mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block_elements` 
												   WHERE `id_section`='$this->id_section' AND `version`='$this->lang' ".($ob->check_admin()?'':'and quest_act=1')." "), 0), 
						$this->per_page, 
						$this->get['p']);
		
		
		
		$str[] = '<div style="padding:0px 0px;" id="quest_com">';
				
		$s = mysql_query("select * from i_block_elements where id_section='$this->id_section' ".($ob->check_admin()?'':'and quest_act=1')." and version='$this->lang' order by quest_date desc LIMIT ".$api->Pag->start_from.", $this->per_page");
		
	
		if (mysql_num_rows($s)>0)
		{
			$i=1;
			$str[]=$api->Pag->pages_gen().'<hr style="border:0; border-bottom:1px dashed #aaa"><br />';
			while($r=mysql_fetch_array($s))
			{
				$date = $api->Strings->date($this->lang, $r["quest_date"], 'sql', 'datetext');
				
				$str[] = '<a name="quest'.$r["id"].'"></a><div style=" padding:0px; margin-bottom:10px; border-bottom:'.($i==mysql_num_rows($s)?'0px;':'1px dashed #aaa;').'  padding-left:0px; padding-bottom:10px;"> ';
				if ($ob->check_admin())
				{
					$str[] = '<label style="float:right">Активность <input type="checkbox" value="1" 
								class="admin_mod" rel="'.$r["id"].'" '.($r["quest_act"]==1?'checked':'').'></label>';	
				}
							  
				$str[] = '<div class="question" alt="0" style="cursor:pointer">
							<table width="100%" cellpadding="5" cellspacing="0">
							 <tr valign="top">
							  <td align="center" width="50"><img src="/upload/question.gif" />
							  <td>
								<p style="margin:0px; padding:0px; margin-bottom:10px"><strong>'.$r["quest_name"].'</strong> | '.$this->text_added.': '.$date.'</p>
								
								<p style="margin:0px; padding:0px; margin-bottom:10px"><b>'.$this->text_vopros.':</b><br/>'.nl2br(stripslashes($r["quest_quest"])).'</p>
							  </td>
							 </tr>
							</table>
						</div>
						<div class="answer" '.($this->hide_answer?'style=" display:none;"':'').'>
							<table width="100%" cellpadding="5" cellspacing="0">
							 <tr valign="top">
							  <td align="right" width="50"><img src="/upload/answer.gif" />
							  <td>
								<p><b>'.$this->text_answer.':</b><br/>'.($this->check_admin()?'<textarea name="quest_answer'.$r["id"].'" id="quest_answer'.$r["id"].'" style="width:100%; height:70px" onchange="save_answer('.$r["id"].');">'.stripslashes($r["quest_answer"]).'</textarea>':''.nl2br(stripslashes($r["quest_answer"])).'').'</p>
							  </td>
							 </tr>
							</table>					
						</div>
				
					 </div>';
				$i++;
				
			}	
			
			$str[]='<hr style="border:0; border-bottom:1px dashed #aaa">'.$api->Pag->pages_gen().'';
		}
		else
		{
			$str[] = '<br /><br /><br /><p align="center"><strong>Нет элементов.</strong></p><br /><br /><br />';	
		}
		
		$str[] = '</div>';
		
		$this->header_page($this->lang,array("title"=>$this->title));
		
		
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
		
		$tmp_file = '/tmpl/quest.tpl';
		$ext_file = '/ru/quest.php';
		
		foreach ($this->fields as $k=>$v)
		{
			
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");
			$query=mysql_query("ALTER TABLE i_block ADD ".$k." ".$v."");	
		
		}
		
		
		
		$sel=mysql_query("select * from i_block where translit_name='quest'");
		if (mysql_num_rows($sel)==0)
		{
		$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
						values (0,'all','1','Вопрос ответ','FAQ','50','quest')");	
						
							
		
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