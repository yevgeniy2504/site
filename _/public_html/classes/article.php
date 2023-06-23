<?php

/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль новости
 */
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

class Article extends Helper{
	// Инфо для установки
	public $info_module			= 'Модуль статьи';
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
	public $name_link 			= 'article';
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
	public $show_count_article		= 3;
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
								'article_act'		=> 'tinyint(4)',
						   		'article_date'		=> "datetime",
								'article_name'		=> "varchar(255)",
								'article_img'		=> "text",
								'article_anounce'	=> 'text',
								'article_text'		=> 'longtext'
						   );
						   
	//поля для модуля для optiona
	public $option_fields = array(
								'article_act'		=>array(
													"type_field"		=> 'i7',
													"select_fields"		=> "1",
													"name_ru"			=> "Активность",
													"id_sort"			=> 10
											 	  ),
								'article_date'		=>array(
													"type_field"		=> 'i2',
													"select_fields"		=> "1",
													"required_fields"	=> "0",
													"name_ru"			=> "Дата",
													"width"				=> "30",
													"id_sort"			=> 20
											 	  ),
								'article_name'		=>array(
													"type_field"		=> 'i1',
													"select_fields"		=> "1",
													"required_fields"	=> "1",
													"name_ru"			=> "Название",
													"width"				=> "30",
													"id_sort"			=> 30,
													"translit"			=> 1,
													"search"			=> 1
											 	   ),
								'article_img'		=>array(
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
								'article_anounce' 	=>array(
													"type_field"		=> 'i6',
												 	"select_fields"		=> "0",
												 	"required_fields"	=> "0",
												 	"name_ru"			=> "Анонс",
												 	"width"				=> "30",
												 	"height"			=> "5",
												 	"id_sort"			=> 40
												  ),
								'article_text'		=>array(
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
								'show_date'			=> array(
														 "type"		=> 'i7',
												 		 "name"		=> "Отображать дату",
												 		 "value"	=> "1"
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
												 	   ),
								'show_count_article'	=> array(
														 "type"		=> 'i1',
												 		 "name"		=> "Количество новостей на главной",
												 		 "value"	=> "3"
													   )
							);							  
	
		
	public function __construct(){
		$this->get_params();
		parent::__construct();
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
		$s = mysql_query("select * from i_block where translit_name='article'");	
		$r = mysql_fetch_array($s);
		$this->title = $r["name_block"];
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
				if ($rr["name_en"] == 'show_date' 		&& $rr["value"]!='') $this->show_date 		= $rr["value"]; 
				if ($rr["name_en"] == 'show_img' 		&& $rr["value"]!='') $this->show_img 		= $rr["value"]; 
				if ($rr["name_en"] == 'show_header'		&& $rr["value"]!='') $this->show_header		= $rr["value"]; 
				if ($rr["name_en"] == 'show_anounce' 	&& $rr["value"]!='') $this->show_anounce 	= $rr["value"]; 
				if ($rr["name_en"] == 'show_link_more'	&& $rr["value"]!='') $this->show_link_more	= $rr["value"]; 
				if ($rr["name_en"] == 'show_comment' 	&& $rr["value"]!='') $this->show_comment	= $rr["value"]; 	
				if ($rr["name_en"] == 'show_count_article' && $rr["value"]!='') $this->show_count_article	= $rr["value"]; 	
			}	
		}
	}
	
	// обработка запроса
	public function index(){
		$this->parse_url($_SERVER['REQUEST_URI']);
		// выводим текст новости
		if ($this->url["element"]!==false)	
		{
			$this->get_article($this->url["element"], $this->get);	
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
				$this->get_list_article($this->url["block"], $this->get);
			}
		}
		else
		{
			// выводим новости категории
			$this->get_list_article('article', $this->get);
		}
		
		}
		
	}
	
	// вывод новостей постранично
	public function get_list_article($name, $params){
		
		global $api;
		// получаем ссылку 
		$part_url=$this->get_url_part($_SERVER['REQUEST_URI']);
		// если категория
		if ($this->block===true)
		{
			$s=mysql_query("select * from i_block where translit_name='$name' 
							and id_section='$this->id_section' and act_block=1 and (version='$this->lang' or version='all') limit 1");	
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
		
		# Инициализируем параметры класса Pages
		$api->Pag->setvars($this->lang, 
						$part_url[0], 
						@$part_url[1], 
						mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block_elements` 
												   WHERE `id_section`='$id_block' AND `version`='$this->lang' and article_act=1"), 0), 
						$this->per_page, 
						$params['p']);
						
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
							  WHERE `id_section`='$id_block' AND `version`='$this->lang' and article_act=1 
							  ORDER BY `article_date` DESC LIMIT ".$api->Pag->start_from.", $this->per_page");
		
		$this->meta_info["title"]=$title;
		$this->header_page($this->lang,$this->meta_info);
		if (mysql_num_rows($query)>0)
		{
			echo $api->Pag->pages_gen().'<br />';
			while($r=mysql_fetch_array($query))
			{
				$name=$r["article_name"];
				$link=$part_url[0].$r["translit_name"];
				$img=$r["article_img"]!=''?'<a href="'.$link.'"><img src="/upload/images/small/'.$r["article_img"].'" width="150"></a>':'';
				$anounce=nl2br(stripslashes($r["article_anounce"]));
				$date=$api->Strings->date($this->lang,$r["article_date"],'sql','datetext');
				?>
                    <div class="article">
                        <table width="100%">
                            <tr>
                                <?
                                // картинка
                                if ($this->show_img==1){
                                ?>
                                    <td width="170"><?=$img?></td>
                                <?	
                                }
                                ?>
                                    <td align="left" valign="top">
                                        <?
                                        // название новости
                                        if ($this->show_header==1){
                                        ?>
                                            <h2 onclick="location.href='<?=$link?>'"><?=$name?></h2>
                                        <?
                                        }
                                        ?>
                                        <?
                                        // анонс новости
                                        if ($this->show_anounce==1){
                                        ?>
                                            <p style="padding-top:0px;"><?=$anounce?></p>
                                        <?
                                        }
                                        ?>
                                        <p>
                                        <?
                                        // дата новости
                                        if ($this->show_date==1){
                                        ?>
                                            <span ><?=$date?></span>
                                        <?
                                        }
                                        ?>
                                        <?
                                        // ссылка подробнее
                                        if ($this->show_link_more==1){
                                        ?>
                                            <a href="<?=$link?>" ><?=$this->text_link_more?></a>
                                        <?
                                        }
                                        ?>
                                        </p>
                                </td>
                            </tr>
                        </table>
						<?
                            // редактирование если авторизован
                            if ($this->check_admin())
                            {
                                $this->edit($this->lang, 'element', $r["id"]);
                            }
                        ?>
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
	// вывод страницы
	public function get_article($name, $params){
		global $ob;
		global $incom;
		// проверка новости 
		$s=mysql_query("select * from i_block_elements where version='".$this->lang."' 
						and translit_name='".$name."' and article_name!='' and article_act=1 limit 1");
		if ($s && mysql_num_rows($s)==1)
		{
			$r=mysql_fetch_array($s);
			$this->meta_info["title"]=$r["article_name"];
			$this->header_page($this->lang, $this->meta_info);
			echo stripslashes($r["article_text"]);
			echo '<p align="right"><a href="javascript:history.go(-1);">'.$this->text_link_back.'</a></p>';
			// редактирование если авторизован
			if ($ob->check_admin())
			{
				$this->edit($this->lang, 'element', $r["id"]);
			}
			if ($this->show_comment==1)
			{
				echo '<h2>'.$incom->comment->title.'</h2>';
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
	
	public function get_article_main($lang, $limit, $ids=''){
		global $ob;
		global $api;
		if ($ids == '') $ids = $this->id_section; 
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
							  WHERE `id_section`='$ids' AND `version`='$this->lang' and article_act=1 
							  ORDER BY `article_date` DESC LIMIT ".$limit."");
		if ($query && mysql_num_rows($query)>0)
		{
			while($r=mysql_fetch_array($query))
			{
				$name=$r["article_name"];
				$link='/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"];
				$img=$r["article_img"]!=''?'<a href="'.$link.'"><img src="/upload/images/small/'.$r["article_img"].'" width="50"></a>':'';
				$anounce=mb_substr(stripslashes($r["article_anounce"]),0,150,"UTF-8").'...';
				$date=$api->Strings->date($this->lang,$r["article_date"],'sql','datetext');
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
		
		$tmp_file = '/tmpl/article.tpl';
		$ext_file = '/ru/article.php';
		
		foreach ($this->fields as $k=>$v)
		{
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");
		}
		$sel=mysql_query("select * from i_block where translit_name='article'");
		if ($sel && mysql_num_rows($sel)==0)
		{
			$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
							values (0,'all','1','Статьи','Модуль статьи','50','article')");	
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