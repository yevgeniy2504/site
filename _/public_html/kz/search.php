<? 
### info ###
#name Поиск по сайту #end_name
#edit false #end_edit
### end_info ###
$lang="kz";
$title="Поиск";
$keywords="";
$description="";
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<?
$arr_not = array("'comments'","'quest'","'guest'");
$arr_search = array();
$s  = mysql_query("select * from i_block where id_section = 0 and (version = '$lang' or version='all') and translit_name not in (".join(',', $arr_not).") and act_block=1 order by id_sort asc");
if ($s)
{
	while($r = mysql_fetch_array($s))
	{
		$ss = mysql_query("select * from i_option where category_id = ".$r["id"]." and category='block_elements' and search = 1 group by category_id having count(*)>0");
		
		if ($ss && mysql_num_rows($ss)>0)
		{
			while($rr = mysql_fetch_array($ss))
			$arr_search[] = $r["translit_name"];
		}
	}	
}

#ПЕРЕМЕННЫЕ
$onepage = 10;//сколько результатов поиска отображать на странице
$rows = 3;//во сколько колонок выводить чекбоксы формы поиска
//заносим где искать, #SEARCH# служебный маркер, который соответствует введённому в запрос слову
$where = array();
foreach ($arr_search as $v)
{
	$s = mysql_query("select * from i_block where translit_name='".$v."' and act_block = 1 order by id_sort asc");	
	$r = mysql_fetch_array($s);
	$ss = mysql_query("select * from i_option where category_id=".$r["id"]." and category='block_elements' and search=1 order by id_sort asc");
	$arr_field = array();	
	while($rr = mysql_fetch_array($ss))
	{
		$arr_field[] = " (INSTR(`".$rr["name_en"]."`, '#SEARCH#')) ";	
	}
	
	if(sizeof($arr_field)>0) 
	{
		$where[$r["translit_name"]] = array('title'=>$r["name_block"], 'sql'=>"select * from i_block_elements where ".join(" or ", $arr_field)."");	
	}
	
}

#ПЕРЕМЕННЫЕ.end

#MAIN-PART
$search = @$ob->pr(trim($_REQUEST['search']));
$out = array();
if($search!=''){
	$pg = 0;
	if(!empty($_REQUEST['pg'])) $pg = intval($_REQUEST['pg'])-1;
	if(empty($_REQUEST['where'])) $_REQUEST['where'] = array_keys($where);
	$result = array();
	if(is_array($_REQUEST['where'])){
		$index = 0;
		$count = array();
		$parsed = array();
		$start = $pg*$onepage;
		$total_count = 0;
		foreach($_REQUEST['where'] as $w){
			if(!isset($where[$w])) continue;
			$where[$w]['sql'] = str_replace('#SEARCH#', $search, $where[$w]['sql']);
			if(!preg_match("/^SELECT(.+?)FROM\s+([\w`]+)(\s+WHERE(.+))?$/i", $where[$w]['sql'], $ok)) continue;
				$parsed[$w] = array('what'=>$ok[1], 'table'=>$ok[2], 'where'=>$ok[3]?$ok[3]:'');
				$total_count += $count[$w] = $mysql->count($parsed[$w]['table'], $parsed[$w]['where']); 
			if($index<$onepage && $start>=0 && mysql_num_rows( ($r = mysql_query($where[$w]['sql']." LIMIT ".$start.", ".($onepage-$index))) ) ){
				while($e = mysql_fetch_object($r)){
					#ЗДЕСЬ ПРОИСХОДИТ УПРАВЛЕНИЕ ВЫВОДОМ, КЛЮЧИ switch($w) СООТВЕТСТВУЮТ КЛЮЧАМ МАССИВА $where
					/*
						title - крепится автоматически. Переменная нужна чтобы выводить результаты поиска с заголовками, копируйте везде 'title'=>$where[$w]['title'] или меняйте на свои
						link - ссылка, по которой можно будет щелкнуть чтобы перейти к просмотру результата поиска
						text - текстовое сопровождение, которое будет отображено сразу под ссылкой
					*/
					switch ($w){
						case 'page':
							if($e->page_name && $e->translit_name) 
								$result[]=array(
											'title'=>$where[$w]['title'], 
											'link'=>'<a target="_blank" href="/'.$lang.'/page/'.$e->translit_name.'">
											'.substr(strip_tags($e->page_name), 0, 50).'</a>', 
											'text'=>substr(strip_tags($e->page_text), 0, 200)
										 );
							break;
						case 'news':
							if($e->news_name && $e->translit_name) 
								$result[]=array(
											'title'=>$where[$w]['title'], 
											'link'=>'<a target="_blank" href="/'.$lang.'/news/'.$e->translit_name.'">
											'.substr(strip_tags($e->news_name), 0, 50).'</a>', 
											'text'=>substr(strip_tags($e->news_text), 0, 200)
										 );
							break;
						case 'article':
							if($e->article_name && $e->translit_name) 
								$result[]=array(
											'title'=>$where[$w]['title'], 
											'link'=>'<a target="_blank" href="/'.$lang.'/article/'.$e->translit_name.'">
											'.substr(strip_tags($e->article_name), 0, 50).'</a>', 
											'text'=>substr(strip_tags($e->article_text), 0, 200)
										 );
							break;
						case 'catalog':
							if($e->catalog_name && $e->translit_name) 
								$result[]=array(
											'title'=>$where[$w]['title'], 
											'link'=>'<a target="_blank" href="/'.$lang.'/catalog/'.$e->translit_name.'">
											'.substr(strip_tags($e->catalog_name), 0, 50).'</a>', 
											'text'=>substr(strip_tags($e->catalog_text), 0, 200)
										 );
							break;
						case 'video':
							if($e->vid_name && $e->translit_name) 
								$result[]=array(
											'title'=>$where[$w]['title'], 
											'link'=>'<a target="_blank" href="/'.$lang.'/video/'.$e->translit_name.'">
											'.substr(strip_tags($e->vid_name), 0, 50).'</a>', 
											'text'=>substr(strip_tags($e->vid_anounce), 0, 200)
										 );
							break;	
						case 'gallery':
							if($e->gallery_name && $e->translit_name) 
								$result[]=array(
											'title'=>$where[$w]['title'], 
											'link'=>'<a target="_blank" href="/'.$lang.'/video/'.$e->translit_name.'">
											'.substr(strip_tags($e->gallery_name), 0, 50).'</a>', 
											'text'=>''
										 );
							break;						
					}
					$index = count($result);
				}
				$start = 0;
			}else $start-=$count[$w];
		}
	}
#MAIN-PART.end

#HTML-PART -> RESULT; HTML РЕЗУЛЬТАТА ЗАПРОСА НАЧИНАЕТ ВЫВОДИТЬСЯ ТУТ
	#ЕСЛИ РЕЗУЛЬТАТ НЕ ПУСТ, НАЧИНАЕМ ФОРМИРОВАТЬ HTML РЕЗУЛТАТА ПОИСКА	
	if($result){
		$out[]='<h2>Всего найдено: '.$total_count.', отображено '.($pg*$onepage+1).'&ndash;'.($pg*$onepage+count($result)).'</h2><br>';
		$pages = drawPages( $total_count, $onepage, $pg, array("search=".$search, (@$_REQUEST['where']?'where[]='.join("&where[]=", $_REQUEST['where']):'')) );
		$out[]=$pages;
		
		$title = null;
		#ПЕРЕБОР РЕЗУЛЬТАТОВ
		foreach($result as $r){
			if($r['title']!=$title){
				$index = 0;
				$title = $r['title'];
				$out[]='<br><h2>'.$title.'</h2><br>';
			}
			$out[]='<div>'.(++$index).'. '.$r['link'].'</div>';
			$out[]='<div class="hint">'.$r['text'].'</div><br>';
		}
		$out[]=$pages;
	}else $out[]='По вашему запросу ничего не найдено.';
#HTML-PART.end;
}else $out[]='Введите параметры запроса.';

#HTML-PART -> FINAL-PART; ТУТ ПРОИСХОДИТ ФОРМИРОВАНИЕ САМОЙ ФОРМЫ ПОИСКА, КЛЕЯТСЯ РЕЗУЛЬТАТЫ ЗАПРОСА ПОИСКА И ПРОИСХОДИТ ОТОБРАЖЕНИЕ. 
$inc = 0;
$index = 0;
$temp = array('<table cellpadding="3">');
foreach($where as $k => $v){
	if(!$index) $temp[]='<tr>';
	$temp[]='<td><input type="checkbox" name="where[]" value="'.$k.'"'.(@in_array($k, $_REQUEST['where'])?' checked':'').'>&nbsp;'.$v['title'].'</td>';
	if(++$index>=$rows){
		$temp[]='</tr>';
		$index = 0;
	}
	$inc++;
}
if($index) $temp[]=($inc>$rows?str_repeat('<td></td>', $rows-$index):'').'</tr>';
$temp[]='</table>';

$content = array('<div>', '<form method="post" action="'.$_SERVER['PHP_SELF'].'">');
$content[]='<input type="text" name="search" style="width:300px;" value="'.$search.'"> <input type="submit" value="Найти">';
$content[]=join("\r\n", $temp);
$content[]='</form>';
$content[]='</div><br>';
$content[]=join("\r\n", $out);
echo join("\r\n", $content);
#HTML-PART.end
?>
<? require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>
