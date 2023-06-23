<?
error_reporting(0);
ini_set("display_errors", "off");
?>
<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/classes/helper.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/classes/edit_list.php");
class Incom{
	public $edit_list;
	// классы которые будут устанавливаться
	public $inst = array();
	// классы которые не будут устанавливаться
	public $not_inst = array('helper.php','incom.php','install.php','index.php','edit_list.php');
	// папка с классами
	public $path = '/classes/';
	// где хранится экземпляр класса static 
	public $classes = array();
	
	public function __construct(){
		$this->list_classes();
		// редактирование списков
		$this->edit_list = new Edit_list;
		
	}
	// заглавная буква
	function mb_ucfirst($str, $enc = 'utf-8') {
		return mb_strtoupper(mb_substr($str, 0, 1, $enc), $enc).mb_substr($str, 1, mb_strlen($str, $enc), $enc);
	} 
	// получем список классов
	function list_classes(){
		
		$path = $_SERVER['DOCUMENT_ROOT'].$this->path;	
		$dir = opendir($path); 
		$array_file = array(); 

		while ($list_file = readdir($dir)) 
		{
			if (($list_file != ".") && ($list_file != "..")) 
			{
				if (is_dir($path."/".$list_file)) 
				{
					
				}
				else 
				{
					if (!in_array($list_file,$this->not_inst))
					{
						array_push($array_file, str_replace('.php','',$list_file));
						$this->classes[] = $this->mb_ucfirst(str_replace('.php','',$list_file)); 
					}
				}
			}
		}
		return $this->loader($array_file);
	}
	// загружаем классы
	public function loader($array_file){
		foreach($array_file as $k=>$v)
		{
			require_once($_SERVER['DOCUMENT_ROOT'].$this->path.$v.'.php');
			$this->{$v} = new $v; 
		}
		
	}
	// вывод крошки сайта
	public function breadcrumb($lang,$title){
		echo '<div style="padding: 5px 10px; background: rgba(255,255,255,0.2); margin-left: 5px; margin-right: 5px; margin-bottom: 10px;">';
		$url = explode('/',$_SERVER['REQUEST_URI']);



		if (@$url[1]!='' && $lang=='ru'){
			if (in_array($this->mb_ucfirst(@$url[1]), $this->classes))
			{  
				$this->{@$url[1]}->get_bread($title);	
			}
			else
			{
				echo'<a href="'.($lang!='ru'?'/'.$lang.'/':'').'/">Гостиница «Уют»</a> / '.$title;
			}
		}else
		if (@$url[2]!='' ){
			if (in_array($this->mb_ucfirst(@$url[2]), $this->classes))
			{  
				$this->{@$url[2]}->get_bread($title);	
			}
			else
			{
				if ($_SERVER["REQUEST_URI"]=='/en/virtual-tour/') $title = 'Virtual Tour';
				if ($_SERVER["REQUEST_URI"]=='/kz/virtual-tour/') $title = 'Виртуалдық тур';
				if ($_SERVER["REQUEST_URI"]=='/zh/virtual-tour/') $title = '虛擬之旅';

				echo'<a href="'.($lang!='ru'?'/'.$lang.'':'').'/">Home</a> / '.$title;
			}
		}
		
		
		
		$urlAddr = $_SERVER['REQUEST_URI'];
		$ur1 = explode('/',$urlAddr);
		//echo "select * from i_block_elements where translit_name = '".$ur1[1]."'";
		$s=mysql_query("select * from i_block_elements where translit_name = '".$ur1[1]."'");
		if ($s)
		{
			$i=0;
			while($r=mysql_fetch_array($s))
			{
		
		if ($r['croshki'])  {  
		
		$strcrosh = str_replace('Экскурсии ->','<a href="/ekskursii/">Экскурсии</a> / ',$r['croshki']);
		$strcrosh = str_replace('Ски - туры','<a href="/ski-tury/">Ски - туры</a> / ',$strcrosh);
		$strcrosh = str_replace('Экскурсии по городу Алматы','<a href="/ekskursii-po-gorodu-Almaty/">Экскурсии по городу Алматы</a> / ',$strcrosh);
		$strcrosh = str_replace('Экскурсии по Алматинской области','<a href="/ekskursii-po-almatinskoy-oblasti/">Экскурсии по Алматинской области</a> / ',$strcrosh);
		$strcrosh = str_replace('Восхождения','<a href="/voshozhdenie/">Восхождения</a> / ',$strcrosh);
		
		
		
		echo $strcrosh;
		
		}
		
		
			}
		}
		
		
		
		
		
		echo '</div>';
	}
	
	
	
	// вывод слайдера
	function slider($ids, $lang, $limit){
		$s=mysql_query("select * from i_block_elements where ban_act=1 and id_section=".$ids." and version='$lang' order by ban_sort asc limit $limit");
		if ($s)
		{
			$i=0;
			while($r=mysql_fetch_array($s))
			{
				?>
				<li class="counter<?=$i?>">
					<div class="inner"><img src="/upload/images/big/<?=$r["ban_img"]?>" title="#counter<?=$i?>"/></div>
				</li>
				<?				
				$i++;	
			}	
		}
	}
	
	// вывод статичного баннера
	function get_banner($lang,$id){
		global $ob;
		$s=mysql_query("select * from i_block_elements where ban_act=1 and id=".$id." limit 1");
		if ($s)
		{
			$r=mysql_fetch_array($s);
			echo'<a href="'.$r["link_menu"].'"><img src="/upload/images/small/'.$r["ban_img"].'" /></a>';	
			if ($ob->check_admin())
				$this->edit($lang,'element',$r["id"]);			
		}
	}
	
	
	// редактирование
	function edit($lang, $block, $id, $text=''){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">'.($text!=''?''.$text.'':'Правка').'';
		echo '<div>';
		echo '<a href="javascript:edit_'.$block.'(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '</div>';
		echo '</div>';
	}
	// редактирование списка
	function edit_list($lang, $ids,$block ){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Правка';
		echo '<div>';
		echo '<a href="/'.$lang.'/edit_list.php?ids='.$ids.'&module='.$block.'">Редактировать список</a>';
		echo '</div>';
		echo '</div>';
	}
	
	// редактирование описание сайта
	function edit_template($lang,$id)
	{
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Редактирование заголовков';
		echo '<div>';
		echo '<a href="javascript:edit_template(\''.$lang.'\','.$id.')">Редактировать заголовки</a>';
		echo '</div>';
		echo '</div>';
	}
	
	// добавить страницу
	function add_page($lang,$id)
	{
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Создать страницу';
		echo '<div>';
		echo '<a href="javascript:add_element(\''.$lang.'\','.$id.')">Создать страницу</a>';
		echo '</div>';
		echo '</div>';
	}

}

$incom = new Incom;

$incom->pr_page = new Helper;
?>