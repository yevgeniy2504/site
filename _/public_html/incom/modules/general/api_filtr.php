<?
# Корневой класс
$filter = new Filter;

# Класс страниц
class Filter
{
	
	# тестовая функция
	function pre($value){
		
		echo'<pre>';
		print_r($value);
		echo'</pre>';
	}
	
	# получаем id родителя 
	function get_id($id)
	{
		$select=mysql_query("select * from i_block where id=".intval($id)."");
		if ($select)
		{
			$result=mysql_fetch_array($select);
		}
		
		return $result["id_section"];
	}
	
	// получаем количество элементов для поля
	function get_count($id,$value, $param=array())
	{
		
		$sql=array();
		if (sizeof($param)>0)
		{
			foreach ($param as $k=>$v)
			{
				if ($v!='')
				$sql[] = " ".$k."='".$v."' ";
			}
			
		}
		
		$sql = implode("and", $sql);
		
		$select=mysql_query("select * from i_option where id=".$id."");
		$result=mysql_fetch_array($select);
		
		$select_count=mysql_query("select * from i_block_elements where ".$result["name_en"]."='".$value."' and id_section=".$result["category_id"]."  ".$sql."");
		
		return mysql_num_rows($select_count);
		
	}
	
	
	# получаем значения для полей
	function get_values($id, $param=array()){
		
		$select=mysql_query("select * from i_option where id=".$id."");
		$result=mysql_fetch_array($select);
		
		
				
		$arr_values=array();
		
		$select_values=mysql_query("select * from i_block_elements where id_section=".$result["category_id"]." and ".$result["name_en"]."!=''  group by ".$result["name_en"]."  order by ".$result["name_en"]." asc");
		if ($select_values)
		{
			while($select_results=mysql_fetch_array($select_values))
			{
				$arr=array();
				$arr["name"]=$select_results["".$result["name_en"].""];
				$arr["count"]=$this->get_count($result["id"],$select_results["".$result["name_en"].""], $param);
				
				$arr_values[]=$arr;
			}
			
		}
		
		return $arr_values;
		
	}
	
	// получаем запрос к базе
	public function get_sql($query){
		
		global $ob;
		
		$query=explode("&",$query);
		
		$sql=' and (';
		
		$sql1=array();
		
		foreach ($query as $k=>$v)
		{
			$a=explode('=',$v);
			
			if ($a[0]!='ids' && $a[0]!='ot' && $a[0]!='do' && $a[0]!='p' && $a[0]!='per_page' && $a[0]!='br')
			$sql1[]=" ".$ob->pr(str_replace('%5B%5D','',$a[0]))."='".urldecode($ob->pr(str_replace('+',' ',$a[1])))."' ";
			
		}
		$sql.=implode(' and ', $sql1);
		
		$sql.=')';
		
		//$sql=substr($sql,0,strlen($sql)-1);
		
		if ($sql==' and ()') $sql='';
				
		
		return $sql;
		
	}
	
	# получаем поля для фильтра
	function get_fields($id){
		
		// типы полей
		$array_types=array('i1','i5','i7','i8');
		$array_fields=array();
		$option=false;
		
		// пока нет массива полей 
		while($option!=true)
		{
			$fields_select=mysql_query("select * from i_option where category_id=".intval($id)." and filter=1 order by id_sort asc");
			if (mysql_num_rows($fields_select)>0)
			{
				while($fields_result=mysql_fetch_array($fields_select))
				{
					$array_fields[]=$fields_result;
				}
				
				$option=true;
			}
			else
			{
				
				if ($id==0)$option=true;
				$id=$this->get_id($id);
				
			}
		}
					
		return $array_fields;
	}
		
}

