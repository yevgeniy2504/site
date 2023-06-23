<?php
/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль меню
 */
class Menu{
	// Инфо для установки
	public $info_module		= 'Модуль меню';
	//поля для модуля для блока
	public $fields  = array(
						'id_section'	=> 'INT(11)',
						'version'		=> 'varchar(10)',
						'active'		=> 'tinyint(4)',
						'name_menu'		=> "varchar(255)",
						'translit_name'	=> "varchar(255)",
						'link_menu'		=> "varchar(255)",
						'id_sort'		=> 'INT(11)'
					);
						   
	//поля для модуля для optiona
	public $option_fields = array(
								'active'		=> array(
														"type_field"		=> 'i7',
												 		"select_fields"		=> "1",
												 		"name_ru"			=> "Активность",
												 		"id_sort"			=> 10),
								  
								'name_menu'		=> array(
														"type_field"		=> 'i1',
												 		"select_fields"		=> "1",
												 		"required_fields"	=> "1",
												 		"name_ru"			=> "Название",
												 		"width"				=> "30",
												 		"id_sort"			=> 20),
								  
								'link_menu'		=> array(
														"type_field"		=> 'i1',
												 		"select_fields"		=> "1",
												 		"required_fields"	=> "0",
												 		"name_ru"			=> "Ссылка",
												 		"width"				=> "30",
												 		"id_sort"			=> 30
														),
								  
								'id_sort'		=> array(
														"type_field"		=> 'i5',
												 		"select_fields"		=> "1",
												 		"required_fields"	=> "0",
												 		"name_ru"			=> "Сортировка",
												 		"width"				=> "30",
												 		"id_sort"			=> 40
														)
						);
												 
								  
	
		
	public function __construct(){
		
	}
	
	// формирование меню
	function get_simple_menu_li($lang, $id, $block)
	{
		global $ob;
		// получаем ссылки для меню
		$links = $this->get_fields($lang, $id, $block);
		$string=array();
		$i=1;
		$string[] = '<ul>';
		foreach ($links as $k=>$v)
		{
			$string[] = '<li class="'.($i==1?'first':''.($i==sizeof($links)?'last':'').'').' '.(sizeof(@$v["sub"])>0?'':'').'">
						<a class="'.($_SERVER['REQUEST_URI']==$v["link"] || $_SERVER['PHP_SELF']==$v["link"] ?'active':'').'" href="'.$v["link"].'">'.$v["name"].'</a>';
			// второй уровень
			if (sizeof(@$v["sub"])>0)
			{
				$string[] = ' <ul>';	
				$j=1;
				foreach ($v["sub"] as $q=>$w)
				{
					$string[] = '<li class="'.($j==1?'first':''.($j==sizeof(@$v["sub"])?'':'').'').'">
									<a class="" href="'.$w["link"].'">'.$w["name"].'</a>';
					// третий уровень
					if (sizeof(@$w["sub"])>0)
					{
						$string[] = '<ul class="">';	
						$l=1;
						foreach ($w["sub"] as $u=>$n)
						{
							$string[] = '<li class="'.($l==1?'first':''.($l==sizeof(@$w["sub"])?'last':'').'').'">
										<a class="" href="'.$n["link"].'">'.$n["name"].'</a>';

							$string[] ='</li>';
							$l++;
						}	
						$string[] = '</ul>';
					}
					$string[] ='</li>';
					$j++;
				}	
				$string[] = '</ul>';

			}
			$string[]='</li>';
			$i++;
			if ($i==7) break;
		}		
		$string[] = '</ul>';
		return join("\n",$string);
	}
// формирование меню
	function get_simple_menu_li_sitemap($lang, $id, $block)
	{
		global $ob;
		// получаем ссылки для меню
		$links = $this->get_fields($lang, $id, $block);
		$string=array();
		$i=1;
		$string[] = '<ul>';
		foreach ($links as $k=>$v)
		{
			$string[] = '<li class="'.($i==1?'first':''.($i==sizeof($links)?'last':'').'').' ">
						<a class="'.($_SERVER['REQUEST_URI']==$v["link"]||$_SERVER['PHP_SELF']==$v["link"]?'active':'').'"  href="'.$v["link"].'">'.$v["name"].'</a></li>';
			$i++;
		}
		if($lang==='ru'){
			$string[] = '<li><a href="/sitemap.php">Карта сайта</a></li>';
		}elseif($lang==='en'){
			$string[] = '<li><a href="/en/sitemap.php">Site map</a></li>';
		}elseif($lang==='zh'){
			$string[] = '<li><a href="/zh/sitemap.php">网站地图</a></li>';
		}elseif($lang==='kz'){
			$string[] = '<li><a href="/kz/sitemap.php">САЙТТЫҢ КАРТАСЫ </a></li>';
		}
		$string[] = '</ul>';
		return join("\n",$string);
	}
	
	// формирование меню
	function get_simple_menu_a($lang, $id, $block)
	{
		global $ob;
		// получаем ссылки для меню
		$links = $this->get_fields($lang, $id, $block);
		$string=array();
		$i=1;
		$string[] = '<div>';
		foreach ($links as $k=>$v)
		{
			$string[] = '<a title="'.$v["name"].'" class="'.($_SERVER['REQUEST_URI']==$v["link"]?'active':'').'" 
						href="'.$v["link"].'">'.$v["name"].'</a>';
			$i++;
		}
		$string[] = '</div>';
		return join("\n",$string);
	}
	
	// формирование меню
	function get_main_menu($lang, $id, $block)
	{
		// получаем ссылки для меню
		$links = $this->get_fields($lang, $id, $block);
		$string=array();
		// первый уровень
		$i=1;
		$string[] = '<ul class="sf-menu">';
		foreach ($links as $k=>$v)
		{
			$string[] = '<li class="'.($i==1?'first':''.($i==sizeof($links)?'last':'').'').' '.(sizeof(@$v["sub"])>0?'':'').'">
						<a class="'.($_SERVER['REQUEST_URI']==$v["link"] || $_SERVER['PHP_SELF']==$v["link"] ?'active':'').'" href="'.$v["link"].'">'.$v["name"].'</a>';
			// второй уровень
			if (sizeof(@$v["sub"])>0)
			{
				$string[] = ' <ul>';	
				$j=1;
				foreach ($v["sub"] as $q=>$w)
				{
					$string[] = '<li class="'.($j==1?'first':''.($j==sizeof(@$v["sub"])?'':'').'').'">
									<a class="" href="'.$w["link"].'">'.$w["name"].'</a>';
					// третий уровень
					if (sizeof(@$w["sub"])>0)
					{
						$string[] = '<ul class="">';	
						$l=1;
						foreach ($w["sub"] as $u=>$n)
						{
							$string[] = '<li class="'.($l==1?'first':''.($l==sizeof(@$w["sub"])?'last':'').'').'">
										<a class="" href="'.$n["link"].'">'.$n["name"].'</a>';

							$string[] ='</li>';
							$l++;
						}	
						$string[] = '</ul>';
					}
					$string[] ='</li>';
					$j++;
				}	
				$string[] = '</ul>';

			}
			$string[]='</li>';
			$i++;
			if ($i==7) break;
		}
		$string[] = '</ul>';
		return join("\n",$string);
	}
	// формирование карта сайта
	function get_map_menu($lang, $id, $block)
	{
		// получаем ссылки для меню
		$links = $this->get_fields($lang, $id, $block);
		$string=array();
		$i=1;
		$string[] = '<ul>';
		foreach ($links as $k=>$v)
		{
			$string[] = '<li class="'.($i==1?'first':''.($i==sizeof($links)?'last':'').'').' '.(sizeof(@$v["sub"])>0?'parent':'').'">
						<a href="'.$v["link"].'"><span>'.$v["name"].'</span></a>';
			if (sizeof(@$v["sub"])>0)
			{
				$string[] = '<ul class="level0" style="margin-left:30px;">';	
				$j=1;
				foreach ($v["sub"] as $q=>$w)
				{
					$string[] = '<li class=" '.($j==1?'first':''.($j==sizeof($v["sub"])?'last':'').'').'">
								<a  href="'.$w["link"].'"><span>'.$w["name"].'</span></a>';
					// третий уровень
					if (sizeof(@$w["sub"])>0)
					{
						$string[] = '<ul class="subcat">';	
						$l=1;
						foreach ($w["sub"] as $u=>$n)
						{
							$string[] = '<li class=" '.($l==1?'first':''.($l==sizeof(@$w["sub"])?'last':'').'').'">
										 <a class="level-top" href="'.$n["link"].'">'.$n["name"].'</a>';
							$string[] ='</li>';
							$l++;
						}	
						$string[] = '</ul>';
					}
					$string[] ='</li>';
					$j++;
				}	
				$string[] = '</ul>';
			}
			$string[]='</li>';
			$i++;
		}
		$string[] = '</ul>';
		return join("\n",$string);
	}
	
	
	// получение полей
	// $lang - версия
	// $id - id менюшки в инфоблоках
	// $block - откуда начинать с блоков или элементов (block, block_elements)
	function get_fields($lang,$id, $block)
	{
		$fields=array();
		// первая
		$s=mysql_query("select * from i_".$block." where id_section='$id' and (version='all' or version='$lang') 
						and active=1 order by id_sort asc");
		if (mysql_num_rows($s)>0)
		{
			while($r=mysql_fetch_array($s))
			{
				$fields_array=array();
				$fields_array["name"]=$r["name_menu"];
				$fields_array["link"]=$r["link_menu"];
				// если из блоков
				if ($block=='block')
				{
					// вторая
					// если надо взять из каталога меняем id_section
					if ($r["link_menu"]=='1/'.$lang.'/catalog/')
					{
						$ss=mysql_query("select * from i_block where id_section=37
										and (version='$lang' or version='all') and act_block=1 order by id_sort asc");
					}
					else
					{
						$ss=mysql_query("select * from i_block where id_section=".$r["id"]." 
										and (version='$lang' or version='all') and active=1 order by id_sort asc");
					}
					$fields1=array();
					if (mysql_num_rows($ss)>0)
					{
						while($rr=mysql_fetch_array($ss))
						{
							$fields_array1=array();
							if ($r["link_menu"]=='1/'.$lang.'/catalog/') 
							{
								$fields_array1["name"]=$rr["name_block"];	
								$fields_array1["link"]='/'.$lang.'/catalog/'.$rr["translit_name"].'/';
							}
							else
							{
								$fields_array1["name"]=$rr["name_menu"];	
								$fields_array1["link"]=$rr["link_menu"];
							}
							// третья
							$sss=mysql_query("select * from i_block_elements where id_section=".$rr["id"]." and version='$lang' 
											  and active=1 order by id_sort asc");
							$fields_array2=array();
							if (mysql_num_rows($sss)>0)
							{
								while($rrr=mysql_fetch_array($sss))
								{
									$fields_array2[]=array("name"=>$rrr["name_menu"],"link"=>$rrr["link_menu"]);	
								}
							}
							if (sizeof($fields_array2)>0)
							$fields_array1["sub"]=$fields_array2;
							if (sizeof($fields_array1)>0)
							$fields1[]=$fields_array1;
						}
					}
					else
					{
						// если в блоках нет проверяем в элементах
						$ss=mysql_query("select * from i_block_elements where id_section=".$r["id"]." 
										and (version='$lang' or version='all') and active=1 order by id_sort asc");
						$fields1=array();
						if (mysql_num_rows($ss)>0)
						{
							while($rr=mysql_fetch_array($ss))
							{
								$fields_array1=array();
								$fields_array1["name"]=$rr["name_menu"];	
								$fields_array1["link"]=$rr["link_menu"];
								if (sizeof($fields_array1)>0)
								$fields1[]=$fields_array1;
							}	
						}			
					}	
				}
				if (sizeof(@$fields1)>0)
					$fields_array["sub"]=$fields1;
				if (sizeof($fields_array)>0)
					$fields[]=$fields_array;	
			}	
		}
		return $fields;
	}
	function edit($lang, $id, $block,  $sub_block='block')
	{
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Правка меню';
		echo '<div>';
		echo '<a href="javascript:edit_menu(\''.$lang.'\','.$id.',\''.$block.'\',\''.$sub_block.'\')">Редактировать</a>';
		echo '</div>';
		echo '</div>';
	}
	// установка модуля	
	function install(){
		foreach ($this->fields as $k=>$v)
		{
			$query=mysql_query("ALTER TABLE i_block ADD ".$k." ".$v."");
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");	
		}
		$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
						values (0,'all','1','Меню','Управление меню','10','menu')");	
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
		}
	}
}
?>