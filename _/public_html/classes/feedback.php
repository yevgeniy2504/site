<?php

/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль страницы сайта
 */
 
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
error_reporting(E_ALL);
class Feedback extends Helper{
	// Инфо для установки
	public $info_module			= 'Модуль обратная связь';
	// версия
	public $lang 				= 'ru';
	public $show_comment 		= '0';
	public $email 				= '0';
	public $feed_name 			= '0';
	public $feed_mail 			= '0';
	public $feed_theme 			= '0';
	public $feed_text 			= '0';
	public $feed_name_error 	= '0';
	public $feed_mail_error 	= '0';
	public $feed_text_error 	= '0';
	public $feed_button 		= '0';
	public $feed_success 		= '0';
	public $feed_error 			= '0';
	public $id_module;
	public $meta_info			= array();
	
	//поля для модуля для блока
	public $fields = array(
						'page_act'	=> 'tinyint(4)',
						'page_sort'	=> "int(11)",
						'page_name'	=> "varchar(255)",
						'page_desc'	=> "text",
						'page_keyw'	=> 'text',
						'page_text'	=> 'longtext'
					);
						   
	//поля для модуля для optiona
	public $option_fields = array(
								'page_act'	=> array(
													"type_field"		=> 'i7',
												 	"select_fields"		=> "1",
												 	"name_ru"			=> "Активность",
												 	"id_sort"			=> 10
											   ),
								'page_sort'	=> array(
													"type_field"		=> 'i5',
												 	"select_fields"		=> "1",
												 	"required_fields"	=> "0",
												 	"name_ru"			=> "Сортировка",
												 	"width"				=> "30",
												 	"id_sort"			=> 20
											   ),
								'page_name'	=> array(
													"type_field"		=> 'i1',
												 	"select_fields"		=> "1",
												 	"required_fields"	=> "1",
												 	"name_ru"			=> "Название",
												 	"width"				=> "30",
												 	"id_sort"			=> 30,
												 	"translit"			=> 1,
												 	"search"			=> 1
											   ),
								'page_desc'	=> array(
													"type_field"		=> 'i6',
												 	"select_fields"		=> "0",
												 	"required_fields"	=> "0",
												 	"name_ru"			=> "Описание страницы",
												 	"width"				=> "30",
												 	"height"			=> "5",
												 	"id_sort"			=> 40
											   ),
								'page_keyw'	=> array(
													"type_field"		=> 'i6',
												 	"select_fields"		=> "0",
												 	"required_fields"	=> "0",
												 	"name_ru"			=> "Ключевые слова",
												 	"width"				=> "30",
												 	"height"			=> "5",
												 	"id_sort"			=> 40
											   ),
								'page_text'	=> array(
													"type_field"		=> 'i10',
												 	"select_fields"		=> "0",
												 	"required_fields"	=> "0",
												 	"name_ru"			=> "Текст страницы",
												 	"width"				=> "700",
												 	"height"			=> "400",
												 	"id_sort"			=> 50,
												 	"search"			=> 1
											  )
						);
	// парамметры модуля
	public $params_fields = array(
								'show_comment' => array(
													"type"	=> 'i7',
												 	"name"	=> "Подлючить комментарии (модуль должен быть установлен)",
												 	"value"	=> "1"
												  ),
							);
	// парамметры модуля
	public $params_fields1 = array(
								'email' => array(
													"type"	=> 'i1',
												 	"name"	=> "E-mail куда отправляться",
												 	"value"	=> "alpv88@gmail.com"
												  ),
								'feed_name' => array(
													"type"	=> 'i1',
												 	"name"	=> "Название поля Имя",
												 	"value"	=> "Ваше имя"
												  ),
								'feed_mail' => array(
													"type"	=> 'i1',
												 	"name"	=> "Название поля E-mail",
												 	"value"	=> "Ваш e-mail"
												  ),	
								'feed_theme' => array(
													"type"	=> 'i1',
												 	"name"	=> "Название поля Тема",
												 	"value"	=> "Тема сообщения"
												  ),
								'feed_text' => array(
													"type"	=> 'i1',
												 	"name"	=> "Название поля Сообщение",
												 	"value"	=> "Сообщение"
												  ),
								'feed_name_error' => array(
													"type"	=> 'i1',
												 	"name"	=> "Текст ошибки Имя",
												 	"value"	=> "Введите имя"
												  ),
								'feed_mail_error' => array(
													"type"	=> 'i1',
												 	"name"	=> "Текст ошибки E-mail",
												 	"value"	=> "Введите e-mail"
												  ),
								'feed_text_error' => array(
													"type"	=> 'i1',
												 	"name"	=> "Текст ошибки Сообщения",
												 	"value"	=> "Введите сообщение"
												  ),
								'feed_button' => array(
													"type"	=> 'i1',
												 	"name"	=> "Название кнопки отправить",
												 	"value"	=> "Отправить сообщение"
												  ),
								'feed_success' => array(
													"type"	=> 'i1',
												 	"name"	=> "Текст успешной отправки",
												 	"value"	=> "Ваше сообщение успешно отправлено, наши менеджеры свяжутся с вами в ближайщее время"
												  ),
								'feed_error' => array(
													"type"	=> 'i1',
												 	"name"	=> "Текст ошибки отправки",
												 	"value"	=> "Невозможно отправить сообщение. Попробуйте позднее."
												  )				  
							);
	public function __construct(){
		$this->get_params();
		parent::__construct();
	}
	
	function get_name_for_bread($translit){
		$s = mysql_query("select page_name from i_block where translit_name = '$translit' limit 1");
		$r = mysql_fetch_array($s);
		
		return $r["page_name"];
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
		$s = mysql_query("select * from i_block where translit_name='feedback'");	
		$r = mysql_fetch_array($s);
                

		$this->id_module = $r["id"];
		$ss = mysql_query("select * from i_params where id_block='".$this->id_module."' and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
		{
			while($rr = mysql_fetch_array($ss))
			{
				if ($rr["name_en"] == 'email' 				&& $rr["value"]!='') $this->email			= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_name' 			&& $rr["value"]!='') $this->feed_name		= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_mail' 			&& $rr["value"]!='') $this->feed_mail		= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_theme' 			&& $rr["value"]!='') $this->feed_theme		= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_text' 			&& $rr["value"]!='') $this->feed_text		= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_name_error' 	&& $rr["value"]!='') $this->feed_name_error	= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_mail_error' 	&& $rr["value"]!='') $this->feed_mail_error	= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_text_error' 	&& $rr["value"]!='') $this->feed_text_error	= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_button' 		&& $rr["value"]!='') $this->feed_button		= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_success' 		&& $rr["value"]!='') $this->feed_success	= $rr["value"]; 	
				if ($rr["name_en"] == 'feed_error' 			&& $rr["value"]!='') $this->feed_error		= $rr["value"]; 	
			}	
		}
	}
	
	// обработка запроса
	public function index(){
		$this->parse_url($_SERVER['REQUEST_URI']);
		$this->get_page($this->url["element"], $this->get);		
	}
	// вывод страницы
	public function get_page($name, $params){
		global $ob;
		global $incom;
		// проверка страницы в блоках
		$s=mysql_query("select * from i_block where (version='".$this->lang."' or version='all') 
						and translit_name='feedback' and page_name!='' and page_act=1 limit 1");
			if (mysql_num_rows($s)==1)
			{
				//var_dump($r);
				$r=mysql_fetch_array($s);
				$this->meta_info["title"]=$r["page_name"];
				$this->meta_info["keyw"]=$r["page_keyw"];
				$this->meta_info["desc"]=$r["page_desc"];
				$this->meta_info["h1title"]=$r["h1title"];
				$this->header_page($this->lang, $this->meta_info);
				echo stripslashes($r["page_text"]);
				// редактирование если авторизован
				if ($ob->check_admin())
				{
					$this->edit($this->lang, 'block', $r["id"]);
					$this->edit_params($this->lang, $this->id_module);
					
					
					
				}
				$this->get_form();
				$this->footer_page($this->lang);	
			}
			else
				// если не найдено то показываем 404
				$this->show_404($this->lang);	
				
	}
	
	public function get_form(){
		global $ob, $api, $incom;
		
		$str = array();
		$str[] ='<div class="anounce" id="feedback_protocol"></div><br/> 
				<table id="feedback" cellpadding="5" cellspacing="0">
				 <tr>
					<td width="150" align="right"><span>*</span>'.$this->feed_name.':</td>
					<td><input class="feed_input" id="feedback_fio" style="width:300px;" type="text" value="" /></td>
				 </tr>
				 <tr>
					<td align="right"><span>*</span>'.$this->feed_mail.':</td>
					<td><input class="feed_input"  id="feedback_theme" style="width:300px;" type="text" value="" /></td>
				 </tr>
				 <tr>
					<td align="right"><span>&nbsp;</span>'.$this->feed_theme.':</td>
					<td><input class="feed_input"  id="feedback_theme1" style="width:300px;" type="text" value="" /></td>
				 </tr>
				 <tr valign="top">
					<td align="right"><span>*</span>'.$this->feed_text.':</td>
					<td><textarea class="feed_input" id="feedback_text" rows="7" style="width:300px;"></textarea></td>
				 </tr>
				 <tr>
					<td></td>
					<td><input  id="do_feedback" type="button" class="button" value="'.$this->feed_button.'" /></td>
				 </tr>
				</table>';	
		$str[] = '<script type="text/javascript">
					jQuery(document).ready(function()
					{
						jQuery("#do_feedback").click(function()
						{
							var error_msg = "";
							var focused = 0;
							
							jQuery("#feedback_msg").html("").hide();
							
							if (jQuery("#feedback_fio").val() == \'\'){ 
								error_msg = error_msg+"<span style=\"color:red;\">'.$this->feed_name_error.'</span><br />"; 
								jQuery("#feedback_fio").css("border", "1px solid red");				
								if (focused == 0) { 
									focused = 1; 
									jQuery("#feedback_fio").focus(); 
								} 		
							} 
							else 
							{ 
								jQuery("#feedback_fio").css("border", "1px solid green"); 
							}
							
							if (jQuery("#feedback_theme").val() == \'\'){ 
								error_msg = error_msg+"<span style=\"color:red;\">'.$this->feed_mail_error.'</span><br />"; 
								jQuery("#feedback_theme").css("border", "1px solid red");	
								if (focused == 0) { 
									focused = 1; jQuery("#feedback_theme").focus(); 
								}	 	
							} 
							else 
							{ 
								jQuery("#feedback_theme").css("border", "1px solid green");
							}
							
							if (jQuery("#feedback_text").val() == \'\')	{ 
								error_msg = error_msg+"<span style=\"color:red;\">'.$this->feed_text_error.'</span>"; 
								jQuery("#feedback_text").css("border", "1px solid red");		
								if (focused == 0) { 
									focused = 1; 
									jQuery("#feedback_text").focus(); 
								} 	
							} 
							else 
							{ 
								jQuery("#feedback_text").css("border", "1px solid green");
							}
						
							// Ошибок нет
							if (error_msg == "")
							{
								jQuery.ajax(
								{
									url: "'.$_SERVER['PHP_SELF'].'",
									data: "do=send&fio="+jQuery("#feedback_fio").val()+"&theme="+jQuery("#feedback_theme").val()+"&theme1="+jQuery("#feedback_theme1").val()+"&text="+jQuery("#feedback_text").val()+"&x=secure",
									type: "POST",
									dataType : "html",
									cache: false,
									success:  function(data)  { jQuery("#feedback_protocol").html(data); },
									error: function()         { jQuery("#feedback_protocol").html("<p style=\"color:red;\">Невозможно связаться с сервером!</p>"); }
								});
								
							} else {
							  jQuery("#feedback_protocol").html(error_msg).slideDown(700);
							}
						});
					
					});
					
					</script>';
					
					echo join("\n",$str);
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
	// редктирование страницы
	function edit($lang, $block, $id){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Правка';
		echo '<div>';
		echo '<a href="javascript:edit_'.$block.'(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '</div>';
		echo '</div>';
	}
	// установка модуля	
	function install(){
		$tmp_file1 = '/tmpl/feedback.tpl';
		$ext_file1 = '/ru/feedback.php';
		$tmp_file = '/tmpl/page.tpl';
		$ext_file = '/ru/page.php';
		
		$s = mysql_query("select * from i_block where translit_name='page' limit 1");
		if ($s && mysql_num_rows($s)==0)
		{
			foreach ($this->fields as $k=>$v)
			{
				$query=mysql_query("ALTER TABLE i_block ADD ".$k." ".$v."");	
				$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");	
			}
			$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
									values (0,'all','1','Текстовые страницы','Статичные страницы сайта','20','page')");	
			if ($s)
			{
				$s=mysql_query("select max(id) as idd from i_block");	
				$r=mysql_fetch_array($s);
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
			$fr = fopen($_SERVER['DOCUMENT_ROOT'].$tmp_file, "r");
			$fw = fopen($_SERVER['DOCUMENT_ROOT'].$ext_file, "w");
			while(!feof($fr))
			{
				$line = fgets($fr, 10240);
				fwrite($fw, $line);
			}
			fclose($fr);
			fclose($fw);
			$s=mysql_query("select id as idd from i_block where translit_name='page'");	
			$r=mysql_fetch_array($s);
			$s=mysql_query("insert into i_block (id_section,version,page_act,page_name,page_sort,translit_name) 
								values ('".$r["idd"]."','all','1','Обратная связь','10','feedback')");	
			if ($s)
			{
				$s=mysql_query("select id as idd from i_block where translit_name='feedback'");	
				$r=mysql_fetch_array($s);	
			
				foreach ($this->params_fields1 as $k=>$v)
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
				$fr = fopen($_SERVER['DOCUMENT_ROOT'].$tmp_file1, "r");
				$fw = fopen($_SERVER['DOCUMENT_ROOT'].$ext_file1, "w");
				while(!feof($fr))
				{
					$line = fgets($fr, 10240);
					fwrite($fw, $line);
				}
				fclose($fr);
				fclose($fw);
			}
		}
		else
		{
			$s=mysql_query("select id as idd from i_block where translit_name='page'");	
			$r=mysql_fetch_array($s);
			$s=mysql_query("insert into i_block (id_section,version,page_act,page_name,page_sort,translit_name) 
								values ('".$r["idd"]."','all','1','Обратная связь','10','feedback')");
			if ($s)
			{
				$s=mysql_query("select id as idd from i_block where translit_name='feedback'");	
				$r=mysql_fetch_array($s);	
			
				foreach ($this->params_fields1 as $k=>$v)
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
				$fr = fopen($_SERVER['DOCUMENT_ROOT'].$tmp_file1, "r");
				$fw = fopen($_SERVER['DOCUMENT_ROOT'].$ext_file1, "w");
				while(!feof($fr))
				{
					$line = fgets($fr, 10240);
					fwrite($fw, $line);
				}
				fclose($fr);
				fclose($fw);
			}
		}
	}
	
}
?>