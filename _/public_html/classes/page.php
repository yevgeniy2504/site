<?php

/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль страницы сайта
 */

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
error_reporting(E_ALL);
class Page extends Helper{
	// Инфо для установки
	public $info_module		= 'Модуль текстовые страницы';
	// версия
	public $lang 			= 'ru';
	public $show_comment 	= '0';
	public $id_module;
	public $meta_info		= array();
	
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
	public function __construct(){
		parent::__construct();
	}
	
	function get_name_for_bread($translit){
		$s = mysql_query("select name_block from i_block where translit_name = '$translit' limit 1");
		$r = mysql_fetch_array($s);
		
		return $r["name_block"];
	}
	
	public function get_bread($title){
		$this->parse_url($_SERVER['REQUEST_URI']);
		vd($this->url);
		$str = array();
		if ($this->lang=='ru')
		$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Главная</a> / ';
		if ($this->lang=='en')
		$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Home</a> / ';
		if ($this->lang=='kz')
		$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Басты бет</a> / ';
		if ($this->lang=='ru')
		$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Home</a> / ';
		//$str[] = '<a href="/'.$this->lang.'/'.$this->url["module"].'/">'.$this->get_name_for_bread($this->url["module"]).'</a> / ';
		if ($this->url["module"])
		{
			$ids = $this->id_module;
			$ss = mysql_query("select * from i_block where translit_name = '".$this->url["module"]."' limit 1");
			$rr = mysql_fetch_array($ss);
			$ids1 = $rr["id"];
			//$str[] = '<a href="/'.$this->lang.'/'.$this->url["block"].'/">'.$this->get_name_for_bread($this->url["block"]).'</a> / ';
			$arr = array();
			$i=1;
			while($ids1!=$ids)
			{
				$ss = mysql_query("select * from i_block where id = '".$ids1."' limit 1");
				$rr = mysql_fetch_array($ss);	
				$arr[] = '<a href="/'.$this->lang.'/'.$this->url["module"].'/'.$rr["translit_name"].'/">'.$this->get_name_for_bread($rr["translit_name"]).'</a> / ';
				$ids1 = $rr["id_section"];
				if ($i>10) break;
				$i++;
			}
			
			$str[] = join("\n", array_reverse($arr));
		}
		if ($this->url["module"])
		{
			$str[] = '<span>'.$title.'</span> ';
		}	
		echo join("\n",$str);
	}
	
	// получение парамметров
	function get_params(){
		global $ob;
		$s = mysql_query("select * from i_block where translit_name='page'");	
		$r = mysql_fetch_array($s);
		$this->id_module = $r["id"];
		$ss = mysql_query("select * from i_params where id_block='".$this->id_module."' and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
		{
			while($rr = mysql_fetch_array($ss))
			{
				if ($rr["name_en"] == 'show_comment' 	&& $rr["value"]!='') $this->show_comment	= $rr["value"]; 	
			}	
		}
	}
	
	// обработка запроса
	public function index(){
		$this->parse_url($_SERVER['REQUEST_URI']);
		$this->get_page($this->get);		
	}
	// вывод страницы
	public function get_page($params){
		global $ob;
		global $incom;
		if ($this->url['module']!='') $name = $this->url['module'];
		if ($this->url['block']!='') $name = $this->url['block'];
		if ($this->url['element']!='') $name = $this->url['element'];
		
		// проверка страницы в блоках
		$s=mysql_query("select * from i_block where (version='".$this->lang."' or version='all') 
			and translit_name='".$name."' and page_name!='' and page_act=1 limit 1");
		
		if (mysql_num_rows($s)==1)
		{
			$r=mysql_fetch_array($s);


			$this->meta_info["title"]=$r["page_name"];
			$this->meta_info["keyw"]=$r["page_keyw"];
			$this->meta_info["desc"]=$r["page_desc"];
			$this->meta_info["h1title"]=$r["h1title"];
			if ($r["h1title"]!=''){
				$this->meta_info["title"] = $r["h1title"];
			}
			$this->header_page($this->lang, $this->meta_info);
			echo stripslashes($r["page_text"]);
				// редактирование если авторизован
			if ($ob->check_admin())
			{
				$this->edit($this->lang, 'block', $r["id"]);
			}
			$this->footer_page($this->lang);	
		}
		else
		{
				// проверка страницы в элементах
			$s=mysql_query("select * from i_block_elements where version='".$this->lang."' 
				and translit_name='".$name."' and page_name!='' and page_act=1 limit 1");
			if (mysql_num_rows($s)==1)
			{

				$r=mysql_fetch_array($s);


				$this->meta_info["title"]=$r["page_name"];
				$this->meta_info["keyw"]=$r["page_keyw"];
				$this->meta_info["desc"]=$r["page_desc"];
				// die($this->meta_info['keyw']);
				$this->meta_info["h1title"]=$r["h1title"];
				if ($r["page_name"]==''){
					$this->meta_info["title"] = $r["h1title"];
				}
				$this->header_page($this->lang, $this->meta_info);
				echo stripslashes($r["page_text"]);
				echo '';

				if ($this->show_comment==1)
				{

                    $incom->guest->stars = $r["guest_star_count"];
                    $incom->guest->stars_total = $r["guest_star_total"];
                    $incom->guest->id_section = $r["id"];

                    $incom->guest->lang = $this->lang;
                    $incom->guest->get_guest();
					//$incom->guest->get_form($this->lang, $r["id"]);

				}
				// редактирование если авторизован
				if ($ob->check_admin())
				{
					$this->edit($this->lang, 'element', $r["id"]);
				}
				$this->footer_page($this->lang);
			}
			else
			{
				// если не найдено то показываем 404
				$this->show_404($this->lang);	
			}
		}	
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
			$tmp_file = '/tmpl/page.tpl';
			$ext_file = '/ru/page.php';
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
		}
	}
	?>