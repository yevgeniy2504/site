<?php

/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль редактирование списка
 * 
 */
error_reporting(0); 
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

class Edit_list extends Helper{
	
	// версия
	public $lang = 'ru';
	
	
		
	function __construct(){
		
		parent::__construct();
		
	}
	
	// обработка запроса
	public function index(){
		
		global $ob;
		
		$ids=intval($_GET["ids"]);
		$module=$ob->pr($_GET["module"]);
		
		$option=$ob->search_option($module,"",$ids,array("")); 
		
		//vd($option);
		
		$this->header_page($this->lang,array("title"=>"Редактирование списка"));
		
		echo '<table width="100%" style="border-collapse:collapse; border:1px solid #333" border="1"><tr bgcolor="#7DBF0F" style=" background:#7DBF0F">';
		
		
		while($option_res=mysql_fetch_array($option))
		{
			if ($option_res["select_fields"]==1)
			echo '<th align="center" style="padding:5px; border:1px solid #333"><strong style="color:#fff">'.$option_res["name_ru"].'</strong></th>';
		}
			echo '<th align="center" style="padding:5px; border:1px solid #333"><strong style="color:#fff">Правка</strong></th></tr>';
			
		$s=mysql_query("select * from i_".$module." where id_section=".$ids." and version='$this->lang' order by id asc");
		if ($s)
		{
			
			while($r=mysql_fetch_array($s))
			{
				echo '<tr>';
				$option=$ob->search_option($module,"",$ids,array("")); 
				while($option_res=mysql_fetch_array($option))
				{
					if ($option_res["select_fields"]==1)
					{
						//если рисунок
						if($r[''.$option_res['name_en'].'']!="" AND ($option_res['type_field']=="i10" OR $option_res['type_field']=="i11"))
						{
							if($option_res['type_field']=="i11"){
								$text='<img src="/incom/resize.php?url='.$_SERVER['DOCUMENT_ROOT'].'/upload/images/'.$r[''.$option_res['name_en'].''].'&w=100&h=90">';
							}
							
							if($option_res['type_field']=="i12"){}
							
						}else{$text='';}
						
						//если checkbox
						if($option_res['type_field']=="i7")
						{
							if($r[''.$option_res['name_en'].'']==1){$text='Да';}else{$text='Нет';}
						}
						
						if(!@$text)
						{
							echo '<td align="center" style="padding:5px; border:1px solid #333">'.substr(strip_tags($r[''.$option_res['name_en'].'']),0,200).'&nbsp;</td>';
						}else
						{
							echo '<td align="center" style="padding:5px; border:1px solid #333">'.$text.'&nbsp;</td>';
						}
						
						
					}
				}
				echo '<td align="center" style="padding:5px; border:1px solid #333">';
				$this->edit($this->lang,$module,$r["id"]);
				echo'</td>';
				echo '</tr>';
			}	
			
		}	
		
		echo '</table>';
		
		$this->footer_page($this->lang);
	}
	
	
	function edit($lang, $block, $id){
		
		if ($block=='block_elements') $block='element';
				
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Правка';
		
		echo '<div>';
		
		echo '<a href="javascript:edit_'.$block.'(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '<a href="javascript:delete_'.$block.'(\''.$lang.'\','.$id.')">Удалить</a>';
		 	 
		echo '</div>';
		
		
		echo '</div>';
		
	}
	
}
?>