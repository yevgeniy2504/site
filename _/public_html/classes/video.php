<?php
/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль галереи
 */
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
class Video extends Helper{
	// версия
	public $info_module = 'Видеогалерея';
	// версия
	public $lang = 'ru';
	// заголовки
	public $meta_info=array();
	// id блока
	public $id_section;
	// вывод по категориям
	public $block = false;
	// ссылка при блоках
	public $name_link = 'video';
	// название модуля
	public $title = 'Фотогалерея';
	// элементов на страницу
	public $per_page=18;
	// подключить комментарии (Модуль должен быть установлен) (1,0)
	public $show_comment=0;
	//поля для модуля для блока
	public $fields 		  =	array('vid_act'		=>'tinyint(4)',
						   		  'vid_name'	=>"varchar(255)",
								  'vid_img'		=>"text",
								  'vid_video'	=>"text",
								  'vid_anounce'	=>"text");
	//поля для модуля для optiona
	public $option_fields = array('vid_act'	    =>array("type_field"=>'i7',
												 "select_fields"=>"1",
												 "name_ru"=>"Активность",
												 "id_sort"=>10),
								  'vid_name'	=>array("type_field"=>'i1',
												 "select_fields"=>"1",
												 "required_fields"=>"1",
												 "name_ru"=>"Название",
												 "width"=>"30",
												 "id_sort"=>30,
												 "translit"=>1,
												 "search"=>1),
								  'vid_video'	=>array("type_field"=>'i6',
												 "select_fields"=>"0",
												 "required_fields"=>"0",
												 "name_ru"=>"Видео",
												 "width"=>"30",
												 "id_sort"=>30,
												 "translit"=>0,
												 "search"=>0),
								  'vid_anounce'	=>array("type_field"=>'i6',
												 "select_fields"=>"0",
												 "required_fields"=>"0",
												 "name_ru"=>"Анонс",
												 "width"=>"30",
												 "id_sort"=>30,
												 "translit"=>0,
												 "search"=>1),
								  'vid_img'	=>array("type_field"=>'i11',
												 "select_fields"=>"1",
												 "required_fields"=>"0",
												 "name_ru"=>"Картинка",
												 "width"=>"0",
												 "height"=>"0",
												 "size_file"=>3000000,
												 "format_file"=>"jpg|gif|png|jpeg|JPG",
												 "type_resize"=>"landscape",
												 "w_resize_small"=>150,
												 "h_resize_small"=>150,
												 "w_resize_big"=>300,
												 "h_resize_big"=>300,
												 "id_sort"=>40)	);
	// парамметры модуля
	public $params_fields = array(
								'per_page'			=> array(
													   	 "type"		=> 'i1',
														 "name"		=> "Количество элементов на страницу",
														 "value"	=> "10"
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
		$s = mysql_query("select * from i_block where translit_name='video'");	
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
				if ($rr["name_en"] == 'show_comment' 	&& $rr["value"]!='') $this->show_comment	= $rr["value"]; 	
			}	
		}
	}
	
	// обработка запроса
	public function index(){
		$this->parse_url($_SERVER['REQUEST_URI']);
		// выводим текст галереи
		if ($this->url["element"]!==false)	
		{
			$this->get_video($this->url["element"], $this->get);	
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
					// выводим галереи категории
					$this->get_list_video($this->url["block"], $this->get);
				}
			}
			else
			{
				// выводим галереи категории
				$this->get_list_video('video', $this->get);
			}
		}
	}
	
	// вывод новостей постранично
	public function get_list_video($name, $params){
		global $api;
		// получаем парамметры 
		$part_url=$this->get_url_part($_SERVER['REQUEST_URI']);
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
		# Инициализируем параметры класса Pages
		$api->Pag->setvars($this->lang, 
						$part_url[0], 
						@$part_url[1], 
						mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block_elements` 
												   WHERE `id_section`='$id_block' AND `version`='$this->lang' and vid_act=1"), 0), 
						$this->per_page, 
						$params['p']);
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
							  WHERE `id_section`='$id_block' AND `version`='$this->lang' and vid_act=1 
							  ORDER BY `id` DESC LIMIT ".$api->Pag->start_from.", $this->per_page");
		$this->meta_info["title"]=$title;
		$this->header_page($this->lang,$this->meta_info);
		$this->get_list_sub_block($id_block, $params);
		if (mysql_num_rows($query)>0)
		{
			$kol = mysql_num_rows($query);
			$kol = ceil($kol/3) - 1;
			echo '<table width="100%"><tr>';
			$i=1;
			$t=1;
			while($r=mysql_fetch_array($query))
			{
				$name=$r["vid_name"];
				$link=$part_url[0].$r["translit_name"];
				$img=$r["vid_img"]!=''?'<a href="'.$link.'" title="'.$name.'"><img src="/upload/images/small/'.$r["vid_img"].'" ></a><br />':'';
				?>
			<td width="33%" align="center" valign="middle" style="padding:10px;">
			<?=$img?>
			<?
                // редактирование если авторизован
                if ($this->check_admin())
                {
                    $this->edit($this->lang, 'element', $r["id"]);
                }
            ?>
            </td>
		    <?	
				if ($i==3){echo '</tr><tr>'; $i=0; $t++;}
				$i++;
			}
			if ($i!=1)
			for ($j=$i;$j<=3; $j++)
				echo '<td width="33%" align="center" valign="middle" style="padding:10px;"> &nbsp;</td>';
			// вывод страниц
			echo '</table>'.$api->Pag->pages_gen().'<br />';
		}
		else
		{
			$myquery=mysql_query("select id from i_block where id_section=".$id_block." and act_block=1 order by sort_block asc");
			if (!(mysql_num_rows($myquery)>0))
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
		if ($s && mysql_num_rows($s)>0)
		{
			echo '<table width="100%"><tr>';
			$i=1;
			$t=1;
			while($r=mysql_fetch_array($s))
			{
				$name=$r["name_block"];
				$link=@$part_url[0].$r["translit_name"].'/';
				$img=$r["img_block"]!=''?'<a href="'.$link.'" title="'.$name.'">
					 <img src="/upload/images/small/'.$r["img_block"].'" ></a><br />':'';
				?>
				<td width="33%" align="center" valign="middle" style="padding:10px;"><?=$img?>
				<?=$name?><br />
				<?
                    // редактирование если авторизован
                    if ($this->check_admin())
                    {
                        $this->edit($this->lang, 'block', $r["id"]);
                    }
                ?>
                </td>
                <?	
				if ($i==3){echo '</tr><tr>'; $i=0; $t++;}
				$i++;
			}
			if ($i!=1)
			for ($j=$i;$j<=3; $j++)
				echo '<td width="33%" align="center" valign="middle" style="padding:10px;"> &nbsp;</td>';
			// вывод страниц
			echo '</table>';
		}
		// добавление категории если авторизован
		if ($this->check_admin())
		{
			$this->add($this->lang, 'block', $ids);
			$this->edit_params($this->lang, $this->id_module);
		}
		$this->footer_page($this->lang);
	}
	// списко категорий новостей
	public function get_list_sub_block($ids, $params){
		$s=mysql_query("select * from i_block where id_section=".$ids." and act_block=1 order by sort_block asc");
		if ($s && mysql_num_rows($s)>0)
		{
			echo '<table width="100%"><tr>';
			$i=1;
			$t=1;
			while($r=mysql_fetch_array($s))
			{
				$name=$r["name_block"];
				$link='/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"].'/';
				$img=$r["img_block"]!=''?'<a href="'.$link.'" title="'.$name.'">
						<img src="/upload/images/small/'.$r["img_block"].'" ></a><br />':'';
				?>
			<td width="33%" align="center" valign="middle" style="padding:10px;"><?=$img?>
            <?=$name?><br />
	
<?
	// редактирование если авторизован
	if ($this->check_admin())
	{
		$this->edit($this->lang, 'block', $r["id"]);
	}
?></td>


                <?	
				if ($i==3){echo '</tr><tr>'; $i=0; $t++;}
				$i++;
			}	
			
			for ($j=$i;$j<=3; $j++)
				echo '<td width="33%" align="center" valign="middle" style="padding:10px;"> &nbsp;</td>';
			// вывод страниц
			echo '</table>';
		}
		
		// добавление категории если авторизован
		if ($this->check_admin())
		{
			$this->add($this->lang, 'block', $ids);
			$this->edit_params($this->lang, $this->id_module);
		}
		
	}
	
	
	// вывод страницы
	public function get_video($name, $params){
		
		global $ob;
		global $incom;
		
				// проверка галереи 
				$s=mysql_query("select * from i_block_elements where version='".$this->lang."' 
								and translit_name='".$name."' and vid_name!='' and vid_act=1 limit 1");
				if (mysql_num_rows($s)==1)
				{
					$r=mysql_fetch_array($s);
					
					$this->meta_info["title"]=$r["vid_name"];
					
					$this->header_page($this->lang, $this->meta_info);
					$img=stripslashes($r["vid_video"]);
				
					echo '<center>'.$img.'</center>';
					echo '<p>'.stripslashes($r["vid_anounce"]).'</p>';
					
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
		$tmp_file = '/tmpl/video.tpl';
		$ext_file = '/ru/video.php';
		foreach ($this->fields as $k=>$v)
		{
			
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");	
		
		}
		
		$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
									values (0,'all','1','Видеогалерея','Видеогалерея','20','video')");	
									
		$query=mysql_query("ALTER TABLE i_block ADD img_block varchar(255)");
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
				$ss=mysql_query("insert into i_option (category,category_id, name_en, type_field, select_fields, required_fields, 
								name_ru, width, height, size_file, format_file, type_resize, w_resize_small, h_resize_small,
								w_resize_big, h_resize_big, id_sort, translit) values ('block','".$r["idd"]."','img_block','i11', 
								'1','0','Картинка','0','0','3000000','jpg|gif|png|jpeg|JPG','crop','150','150','300','300','50',0),
								('block','".$r["idd"]."','act_block','i7','1','0','Активность','30','0','','','','','','','','10',0),
								('block','".$r["idd"]."','name_block','i1','1','1','Название','30','0','','','','','','','','20',1),
								('block','".$r["idd"]."','sort_block','i5','1','0','Сортировка','30','0','','','','','','','','30',0),
								('block','".$r["idd"]."','info_block','i6','1','0','Описание','50','5','','','','','','','','40',0);");
							
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