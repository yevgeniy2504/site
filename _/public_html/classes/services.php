<?php

/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль каталог catalog
 */

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

class Services extends Helper{
	// Инфо для установки
	public $info_module			= 'Модуль каталог3';
	// версия
	public $lang 				= 'ru';
	// заголовки
	public $meta_info			= array();
	// id блока
	public $id_section;
	// id модуля
	public $id_module;
	// вывод по категориям
	public $block 				= false;
	// ссылка при блоках
	public $name_link 			= 'catalog3';
	// название модуля
	public $title 				= '';
	// элементов на страницу
	public $per_page			= 10;
	// показывать дату (1,0)
	public $show_date			= 1;
	// показывать картинку (1,0)
	public $show_img			= 1;
	// показывать Заголовок (1,0)
	public $show_header			= 1;
	// показывать анонс (1,0)
	public $show_anounce		= 1;
	// количество новостей для вывода на главную
	public $show_count_catalog		= 3;
	// показывать ссылку подробнее (1,0)
	public $show_link_more		= 1;
	// Название ссылки подробнее
	public $text_link_more		= 'Подробнее';
	// Название ссылки Вернуться назад 
	public $text_link_back		= 'Вернуться назад';
	// подключить комментарии (Модуль должен быть установлен) (1,0)
	public $show_comment		= 0;
	
	
	
	//поля для модуля для блока
	public $fields 		  =	array(
		'cat_act'		=> 'tinyint(4)',
		'cat_sort'		=> "int(11)",
		'cat_name'		=> "varchar(255)",
		'cat_img'		=> "text",
		'cat_anounce'	=> 'text',
		'cat_text'		=> 'longtext'
	);
	
	//поля для модуля для optiona
	public $option_fields = array(
		'cat_act'		=>array(
			"type_field"		=> 'i7',
			"select_fields"		=> "1",
			"name_ru"			=> "Активность",
			"id_sort"			=> 10
		),
		'cat_sort'		=>array(
			"type_field"		=> 'i5',
			"select_fields"		=> "1",
			"required_fields"	=> "0",
			"name_ru"			=> "Сортировка",
			"width"				=> "30",
			"id_sort"			=> 20
		),
		'cat_name'		=>array(
			"type_field"		=> 'i1',
			"select_fields"		=> "1",
			"required_fields"	=> "1",
			"name_ru"			=> "Название",
			"width"				=> "30",
			"id_sort"			=> 30,
			"translit"			=> 1,
			"search"			=> 1
		),
		'cat_img'		=>array(
			"type_field"		=> 'i11',
			"select_fields"		=> "1",
			"required_fields"	=> "0",
			"name_ru"			=> "Картинка",
			"width"				=> "0",
			"height"			=> "0",
			"size_file"			=> 3000000,
			"format_file"		=> "jpg|gif|png|jpeg|JPG",
			"type_resize"		=> "landscape",
			"w_resize_small"	=> 197,
			"h_resize_small"	=> 197,
			"w_resize_big"		=> 310,
			"h_resize_big"		=> 310,
			"id_sort"			=> 40
		),
		'cat_anounce' 	=>array(
			"type_field"		=> 'i6',
			"select_fields"		=> "0",
			"required_fields"	=> "0",
			"name_ru"			=> "Анонс",
			"width"				=> "30",
			"height"			=> "5",
			"id_sort"			=> 40
		),
		'cat_text'		=>array(
			"type_field"		=> 'i10',
			"select_fields"		=> "0",
			"required_fields"	=> "0",
			"name_ru"			=> "Текст",
			"width"				=> "700",
			"height"			=> "400",
			"id_sort"			=> 50,
			"search"			=> 1
		)
	);
	// парамметры модуля
	public $params_fields = array(
		'per_page'			=> array(
			"type"		=> 'i1',
			"name"		=> "Количество элементов на страницу",
			"value"	=> "10"
		),
		'text_link_more'	=> array(
			"type"		=> 'i1',
			"name"		=> "Название ссылки Подробнее",
			"value"	=> "Подробнее"
		),
		'text_link_back'	=> array(
			"type"		=> 'i1',
			"name"		=> "Название ссылки Вернуться назад",
			"value"	=> "Вернуться назад"
		),
		
		'show_img'			=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать картинку",
			"value"	=> "1"
		),
		'show_header'		=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать заголовок",
			"value"	=> "1"
		),	
		'show_anounce'		=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать краткое описание",
			"value"	=> "1"
		),
		'show_link_more'	=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать ссылку подробнее",
			"value"	=> "1"
		),
		'show_comment'		=> array(
			"type"		=> 'i7',
			"name"		=> "Подлючить комментарии (модуль должен быть установлен)",
			"value"	=> "1"
		)
	);							  
	
	
	public function __construct(){
		$this->get_params();
		parent::__construct();
		
	}
	
	function get_name_for_bread($translit){
		$s = mysql_query("select name_block from i_block where translit_name = '$translit' limit 1");
		$r = mysql_fetch_array($s);



		if ($translit=='actions'){
			if ($this->lang=='ru'){
				return 'Акции';
			}
			if ($this->lang=='kz'){
				return 'Акциялар';
			}
			if ($this->lang=='en'){
				return 'Actions';
			}
			if ($this->lang=='zh'){
				return '优惠和特别服务方案';
			}
		}
		
		return $r["name_block"];
	}
	
	public function get_bread($title){
		$this->parse_url($_SERVER['REQUEST_URI']);
		$str = array();
		if ($this->lang=='ru'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Гостиница «Уют»</a> / ';
			
		}
		if ($this->lang=='kz'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'action.php').'/">Басты бет</a> / ';
			
		}
		if ($this->lang=='en'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Home</a> / ';
			
		}
		if ($this->lang=='zh'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'/':'').'/">Home</a> / ';
			
		}
		

		$sql = "select * from i_block_elements where translit_name='".$this->url["block"]."' and version='".$this->lang."' and cat_act=1 limit 1";
		//echo $sql;
		$s = mysql_query($sql);
		if ($s && mysql_num_rows($s)==1){
			$r = mysql_fetch_array($s);
			$this->url["element"] = $r["translit_name"];
			$str[] = '<a href="'.($this->lang=='ru'?'/'.$this->url["module"].'/':'/'.$this->lang.'/'.$this->url["module"].'/').'">'.$this->get_name_for_bread($this->url["module"]).'</a> / ';
		}else{
			$str[] = '<span>'.$this->get_name_for_bread($this->url["module"]).'</span>  ';
		}
		
		if ($this->url["element"])
		{
			$str[] = '<span>'.$r["cat_name"].'</span> ';
		}	
		echo join("\n",$str);
	}
	
	// получение парамметров
	function get_params(){
		global $ob;
		$s = mysql_query("select * from i_block where translit_name='catalog3'");	
		$r = mysql_fetch_array($s);


		if(!empty($r['page_name']))$this->title = $r["page_name"];
		else $this->title = $r["name_block"];

		$this->meta_info["keyw"]=$r["page_keyw"];
		$this->meta_info["desc"]=$r["page_desc"];
		$this->meta_info["h1title"]=$r["h1title"];


		$this->id_section = $r["id"];
		$this->id_module = $r["id"];
		$ss = mysql_query("select * from i_block where id_section=".$r["id"]." and act_block=1 and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
			$this->block = true;
		$ss = mysql_query("select * from i_params where id_block='".$this->id_module."' and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
		{
			while($rr = mysql_fetch_array($ss))
			{
				if ($rr["name_en"] == 'per_page' 		&& $rr["value"]!='') $this->per_page 		= $rr["value"];
				if ($rr["name_en"] == 'text_link_more' 	&& $rr["value"]!='') $this->text_link_more	= $rr["value"];
				if ($rr["name_en"] == 'text_link_back' 	&& $rr["value"]!='') $this->text_link_back	= $rr["value"]; 
				if ($rr["name_en"] == 'show_img' 		&& $rr["value"]!='') $this->show_img 		= $rr["value"]; 
				if ($rr["name_en"] == 'show_header'		&& $rr["value"]!='') $this->show_header		= $rr["value"]; 
				if ($rr["name_en"] == 'show_anounce' 	&& $rr["value"]!='') $this->show_anounce 	= $rr["value"]; 
				if ($rr["name_en"] == 'show_link_more'	&& $rr["value"]!='') $this->show_link_more	= $rr["value"]; 
				if ($rr["name_en"] == 'show_comment' 	&& $rr["value"]!='') $this->show_comment	= $rr["value"]; 	
			}	
		}
	}
	
	// обработка запроса
	public function index(){
		
		$this->parse_url($_SERVER['REQUEST_URI']);


		$sql = "select * from i_block_elements where translit_name='".$this->url["block"]."' and version='".$this->lang."' and cat_act=1 limit 1";
		//echo $sql;
		$s = mysql_query($sql);
		if ($s && mysql_num_rows($s)==1){
			$r = mysql_fetch_array($s);
			$this->url["element"] = $r["translit_name"];
		}


		// выводим текст новости
		if ($this->url["element"]!==false)	
		{
			$this->get_catalog($this->url["element"], $this->get);	
		}
		else
		{
		// если есть категории
			if ($this->block===true)
			{
			// если послано название категории то выводим их
				if ($this->url["block"]===false)
				{
					$this->get_list_block($this->id_section, $this->get);
				}
				else
				{
				// выводим новости категории
					$this->get_list_catalog($this->url["block"], $this->get);
				}
			}
			else
			{
			// выводим новости категории
				$this->get_list_catalog('catalog3', $this->get);
			}
			
		}
		
	}
	
	// вывод новостей постранично
	public function get_list_catalog($name, $params){
		
		global $api;
		// получаем ссылку 
		$part_url=$this->get_url_part($_SERVER['REQUEST_URI']);
		// если категория
		if ($this->block===true)
		{
			$s=mysql_query("select * from i_block where translit_name='$name' 
				and act_block=1 and (version='$this->lang' or version='all') limit 1");	
			if ($s)
			{
				$r=mysql_fetch_array($s);
				$id_block=$r["id"];	
				$title=$r["name_block"];
			}
			
		}
		else
		{
			$id_block=$this->id_section;
			$title=$this->title;	
		}
		
		if ($this->lang == 'ru')
		{
			$link_more = 'Подробнее';
			$link_bron = 'Забронировать';
		}
		else if ($this->lang == 'kz')
		{
			$link_more = 'Толығырақ';
			$link_bron = 'Орын броньдау';
		}
		else if ($this->lang == 'en')
		{
			$link_more = 'Read more';
			$link_bron = 'Book now';
		}
		else if ($this->lang == 'zh')
		{
			$link_more = '详细信息';
			$link_bron = '预定';
		}
		
		# Инициализируем параметры класса Pages
		$api->Pag->setvars($this->lang, 
			$part_url[0], 
			@$part_url[1], 
			mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block_elements` 
				WHERE `id_section`='$id_block' AND `version`='$this->lang' and cat_act=1"), 0), 
			$this->per_page, 
			$params['p']);
		
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
			WHERE `id_section`='$id_block' AND `version`='$this->lang'");
		
		@$this->title["title"]=@$title;
		$this->header_page($this->lang,$this->meta_info);
		if (mysql_num_rows($query)>0)
		{
			$this->get_list_sub_block($id_block, '').'<br />';
			echo $api->Pag->pages_gen().'<br />';
			
			while($r=mysql_fetch_array($query))
			{
				$name=$r["cat_name"];
				$link=$part_url[0].$r["translit_name"].'/';
				$img=$r["cat_img"]!=''?'<a class="img" href="'.$link.'"><img src="/upload/images/big/'.$r["cat_img"].'" /></a>':'';
				$anounce=(stripslashes($r["cat_anounce"]));
				
				?>
				<div class="catalog">
					<table width="100%">
						<tr>
							<?
                                // картинка
							if ($this->show_img==1){
								if ($r["cat_img"]!='') {
									?>
									<td valign="top" width="170"><?=$img?></td>
									<?	
								}
							}
							?>
							<td itemscope="" itemtype="http://schema.org/Event" align="left" valign="top">
								<?
                                        // название новости
								if ($this->show_header==1){
									?>
									<p style="font-size: 16pt;" class="namenomer"><a itemprop="name" href="<?=$link?>"><?=$name?></a></p>
									<?
								}
								?>
								<?
                                        // анонс новости
								if ($this->show_anounce==1){
									?>
									<div class="anounce">
										<?=$anounce?>
										<? if ($this->show_link_more==1){ ?><a href="<?=$link?>" class="more-link"><?=$link_more?></a><? } ?>
									</div>
									<?
								}
								?>
							</td>
						</tr>
					</table>
					
				</div><br />
				<?	
			}
			// вывод страниц
			echo $api->Pag->pages_gen().'<br />';
		}
		else
		{
			echo '<br /><br /><p align="center"><strong>Нет элементов</strong></p><br /><br />';	
		}
		// добавление если авторизован
		if ($this->check_admin())
		{
			$this->add($this->lang, 'element', $id_block);
			$this->edit_params($this->lang, $this->id_module);
		}
		$this->footer_page($this->lang);
	}
	
	// списко категорий новостей
	public function get_list_block($ids, $params){
		$this->meta_info["title"]=$this->title;	;
		$this->header_page($this->lang,$this->meta_info);
		$s=mysql_query("select * from i_block where id_section=".$ids." and act_block=1 order by sort_block asc");
		if ($s)
		{
			while($r=mysql_fetch_array($s))
			{
				echo '<h2><a href="/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"].'/">'.$r["name_block"].'</a></h2>';
				// редактирование если авторизован
				if ($this->check_admin())
				{
					$this->edit( $this->lang, 'block', $r["id"]);
				}	
			}	
		}
		// добавление категории если авторизован
		if ($this->check_admin())
		{
			$this->add($this->lang, 'block', $ids);
			$this->edit_params($this->lang, $this->id_module);
		}
		$this->footer_page($this->lang);
	}
	// списко под категорий новостей
	public function get_list_sub_block($ids, $params){
		$s=mysql_query("select * from i_block where id_section=".$ids." and act_block=1 order by sort_block asc");
		if ($s && mysql_num_rows($s)>0)
		{
			$i=1;
			echo '<table width="100%"><tr>';
			while($r=mysql_fetch_array($s))
			{
				echo '<td align="center" valign="top" width="33%">';
				echo '<h3><a href="/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"].'/">'.$r["name_block"].'</a></h3>';
				// редактирование если авторизован
				if ($this->check_admin())
				{
					$this->edit($this->lang, 'block', $r["id"]);
				}
				echo '</td>';
				if ($i==3){echo '</tr><tr>'; $i=0;}	
				$i++;
			}
			echo '</table>';	
		}
		
		
	}
	
	// вывод страницы
	public function get_catalog($name, $params){
		global $ob;
		global $incom;
		
		if ($this->lang == 'ru')
		{
			$link_bakc = 'Вернуться назад';
			$com_name = 'Комментарии';
		}
		else if ($this->lang == 'kz')
		{
			$link_bakc = 'Қайта оралу';
			$com_name = 'Пiкiрлер';
		}
		else if ($this->lang == 'en')
		{
			$link_bakc = 'Back';
			$com_name = 'Comments';
		}
		else if ($this->lang == 'zh')
		{
			$link_bakc = '前';
			$com_name = '评论';
		}
		
		// проверка новости 
		$s=mysql_query("select * from i_block_elements where version='".$this->lang."' 
			and translit_name='".$name."' and cat_name!='' and cat_act=1 limit 1");
		if ($s && mysql_num_rows($s)==1)
		{
			$r=mysql_fetch_array($s);
			if ($this->lang=='ru'){
				$this->meta_info["title"] = $r["cat_name"].' в гостинице «Уют» в Алматы – описание, фото, отзывы';
				$this->meta_info["desc"] = $r["cat_name"].' в гостинице «Уют» в Алматы – описание, фото, отзывы. Обращайтесь в самый современный гостиничный комплекс с высоким уровнем сервиса. Отель «Уют» ждет Вас! Звоните: (727) 279-51-11';
				$this->meta_info["keyw"] = str_replace('  ', ' ', lower(str_replace(array('«','»','"', ',', '.', '!', ' и ', ' а ',  ' за ', ' но ', ' и ', ' а ', ' но ', ' да ', ' если ', ' что ', ' когда ', ' в ', ' с ', ' к ', ' у ', ' над ', ' на ', ' перед ', ' при ', ' для '), ' ', $r["cat_name"])).'');
			}else{
				$this->meta_info["title"]=$r["cat_name"];
			}



			$this->header_page($this->lang, $this->meta_info);
			echo stripslashes($r["cat_text"]);
			echo '<p align="right"><a href="javascript:history.go(-1);">'.$link_bakc.'</a></p>';
			// редактирование если авторизован
			if ($ob->check_admin())
			{
				$this->edit($this->lang, 'element', $r["id"]);
			}
			if ($this->show_comment==1)
			{
				echo '<span style="font-size:16pt;">'.$com_name.'</span>';
				$incom->comment->get_form($this->lang,$r["id"]);
				$incom->comment->get_comment($this->lang,$r["id"]);	
			}
			$this->footer_page($this->lang);	
		}
		else
		{
			// если не найдено то показываем 404
			$this->show_404($this->lang);	
		}
	}
	
	public function get_catalog_main($lang, $limit, $ids=''){
		global $ob;
		global $api;
		if ($ids == '') $ids = $this->id_section; 
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
			WHERE `id_section`='$ids' AND `version`='$this->lang' and cat_act=1 
			ORDER BY `cat_date` DESC LIMIT ".$limit."");
		if ($query && mysql_num_rows($query)>0)
		{
			while($r=mysql_fetch_array($query))
			{
				$name=$r["cat_name"];
				$link='/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"].'/';
				$img=$r["cat_img"]!=''?'<a href="'.$link.'"><img src="/upload/images/small/'.$r["cat_img"].'" width="50"></a>':'';
				$anounce=mb_substr(stripslashes($r["cat_anounce"]),0,150,"UTF-8").'...';
				$date=$api->Strings->date($this->lang,$r["cat_date"],'sql','datetext');
				?>
				<table width="100%"><tr>
					<td width="60"><?=$img?></td>
					<td align="left" valign="top">
						<span ><?=$date?></span>
						<p><a href="<?=$link?>"><?=$name?></a></p>
						<p style="padding-top:0px;"><?=$anounce?></p>
						<p><a href="<?=$link?>" ><?=$this->text_link_more?></a></p>
					</td>
				</tr></table>
				<?  // редактирование если авторизован
				if ($this->check_admin())
				{
					$this->edit($this->lang, 'element', $r["id"]);
				}
			}
		}
	}
	
	// редактирование
	function edit($lang,$block, $id){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Правка';
		echo '<div>';
		echo '<a href="javascript:edit_'.$block.'(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '<a href="javascript:delete_'.$block.'(\''.$lang.'\','.$id.')">Удалить</a>';
		echo '</div>';
		echo '</div>';
	}
	
	// добавление
	function add($lang, $block, $id ){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Добавление';
		echo '<div>';
		echo '<a href="javascript:add_'.$block.'(\''.$lang.'\','.$id.')">Добавить '.($block=='block'?'раздел':'элемент').'</a>';
		echo '</div>';
		echo '</div>';
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
		
		$tmp_file = '/tmpl/catalog.tpl';
		$ext_file = '/ru/catalog.php';
		
		foreach ($this->fields as $k=>$v)
		{
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");
		}
		$sel=mysql_query("select * from i_block where translit_name='catalog3'");
		if ($sel && mysql_num_rows($sel)==0)
		{
			$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
				values (0,'all','1','Каталог','Модуль Каталог','50','catalog3')");	
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