<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
if ($ob->check_admin())
{
$_GET['sub_module']='block';
$_GET['module']='block_elements';

$_GET["id"]=$_GET["id"];

$s=mysql_query("select * from i_block_elements where id=".intval($_GET["id"])."");
$r=mysql_fetch_array($s);

$_GET["id_section"]=$r["id_section"];

$_SESSION["version"]=$_GET["lang"];

function getExtension($filename) {
    return end(explode(".", $filename));
  }
if(@$_POST['hidden'])
{
	if (isset($_POST["cat_problem"]))
	{
		$_POST["cat_problem"] = implode(',',$_POST["cat_problem"]);
	}
	
	if (isset($_POST["link_menu"]))
	{
		if ($_POST["page_link"]!='')
		{
			$_POST["link_menu"]=$_POST["page_link"];	
		}
		
		if(!empty($_FILES['page_file']['tmp_name']))
		{
			$text=rand(0,100000)."_".rand(500,1000000)."_".date("H");
			$upload=move_uploaded_file($_FILES['page_file']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/upload/files/".$text.'.'.getExtension($_FILES['page_file']['name']));
			
			if ($upload)
			{
				$_POST["link_menu"] = "/upload/files/".$text.'.'.getExtension($_FILES['page_file']['name']);
			}
		}
		
	}
	
$page="";
$field=array();
	
	$option=$ob->search_option($_GET['module'],$_GET['sub_module'],$_GET['id_section'],array(""));
	while($option_res=mysql_fetch_array($option))
	{
		if($option_res['type_field']=="i11"){$folder="images";}
		if($option_res['type_field']=="i12"){$folder="files";}
		
		if($option_res['type_field']=="i11" OR $option_res['type_field']=="i12")
		{
			//если выбрано удаление
				if(@$_POST['delete'.$option_res['id'].'']==1)
				{
				$delete=$ob->select("i_".$_GET['module'],array("id"=>$_GET['id']),"");
				$delete_res=mysql_fetch_array($delete);
				unlink($_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/".$delete_res[''.$option_res['name_en'].'']);
				if ($folder=='images')
				{
				unlink($_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/small/".$delete_res[''.$option_res['name_en'].'']);
				unlink($_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/big/".$delete_res[''.$option_res['name_en'].'']);
				}
				$field[''.$option_res['name_en'].'']="";
				}
				
				if(!empty($_FILES[''.$option_res['name_en'].'']['tmp_name']))
				  {
					if($_FILES[''.$option_res['name_en'].'']['size']<=$option_res['size_file'])
					{
					$format=explode("|",$option_res['format_file']);
						if(in_array(getExtension($_FILES[''.$option_res['name_en'].'']['name']),$format))
						{
						$text=rand(0,100000)."_".rand(500,1000000)."_".date("H").".".getExtension($_FILES[''.$option_res['name_en'].'']['name']);
						$upload=move_uploaded_file($_FILES[''.$option_res['name_en'].'']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/".$text);
						
						$field[''.$option_res['name_en'].'']=$text;
							if(!$upload){$erorr='Не возможно загрузить файл!';}else{
							
								$resizeObj_small = new resize('/upload/images/'.$text);
						$resizeObj_small -> resizeImage($option_res['w_resize_small'], $option_res['h_resize_small'], $option_res['type_resize']);
						$resizeObj_small -> saveImage('/upload/images/small/'.$text, 100);	
						
						$resizeObj_big = new resize('/upload/images/'.$text);
						$resizeObj_big -> resizeImage($option_res['w_resize_big'], $option_res['h_resize_big'], $option_res['type_resize']);
						$resizeObj_big -> saveImage('/upload/images/big/'.$text, 100);	
						if ($option_res['watermark']!='')
						{
							
							$resizeObj_wat = new resize('/upload/images/big/'.$text);
							$resizeObj_wat -> watermark($_SERVER['DOCUMENT_ROOT'].'/upload/images/big/'.$text,$_SERVER['DOCUMENT_ROOT'].'/upload/images/watermark/'.$option_res['watermark']);
						}
							
							
							}
						}else{$erorr='Не верный формат файла';}
					}else{$erorr="Файл превышает размер ".$option_res['size_file']." байт";}
				}
			 }else if($option_res['type_field']=="i3" || $option_res['type_field']=="i4")
                        {
                          if(@$_POST[$option_res['name_en']]) $field[$option_res['name_en']]=sha1($_POST[$option_res['name_en']]);		
				
		}else
		{
		$field[''.$option_res['name_en'].'']=addslashes($_POST[''.$option_res['name_en'].'']);
		}
			
		
		if ($option_res["translit"]==1) {$translit=translit($_POST[''.$option_res['name_en'].'']);
			
			
			
			$s=mysql_query("select * from i_block where translit_name='$translit' and id!='".$_GET["id"]."'");
			$ss=mysql_query("select * from i_block_elements where translit_name='$translit' and id!='".$_GET["id"]."'");
			if (mysql_num_rows($s)>0 || mysql_num_rows($ss)>0)
			{
				
				$s_max=mysql_query("select max(id) as idd from i_block_elements");
				$r_max=mysql_fetch_array($s_max);
				
				$translit=$translit.'_'.($r_max["idd"]+1);	
				
				
			}
		
		
		$s=mysql_query("select * from i_block_elements where id=".intval($_GET["id"])."");
		$r=mysql_fetch_array($s);
		
		if ($r["page_act"]==1)
		{
			mysql_query("update i_block_elements set link_menu='/".$_SESSION["version"]."/page/".$translit."' where link_menu='/".$_SESSION["version"]."/page/".$r["translit_name"]."'");
			mysql_query("update i_block set link_menu='/".$_SESSION["version"]."/page/".$translit."' where link_menu='/".$_SESSION["version"]."/page/".$r["translit_name"]."'");
		}
		}
		$field["translit_name"]=$translit;
		
		
	}
		
	if(!@$erorr)
	{	
	
	$ob->update("i_".$_GET['module'],$field,$_GET['id'],$page);
	}else
	{
	$ob->alert($erorr);
	}
	
	
	if ($_POST["link_menu"])
	{}
	else
	{
	if ($field["translit_name"]!='' && $r["page_act"]==1)
	{
	?>
    <script>
	var a = window.parent.location.href;
	var b = a.split('/');
	var c = b[b.length-1].split('.');
	if (c[1]!='php')
	{
	b[b.length-1] = '<?=$field["translit_name"]?>';
	window.parent.location.href = b.join('/');
	}
	else
	{
		window.parent.location.reload();
	}
	</script>
    
    <?
	}
	else
	{
	?>
    <script>
	window.parent.location.reload();
	</script>
    
    <?
	}
	}
}
//проверка на валидность
$ob->script_view($_GET['module'],$_GET['sub_module'],@$_GET['id_section'],array("required_fields"=>1));
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
        <link href="/incom/modules/theme/default/popup_menu.css" rel="stylesheet" type="text/css">
        <link rel="StyleSheet" href="/calendar/calendar.css" type="text/css">
        <script src="/incom/modules/theme/default/jquery-1.4.2.min.js" type="text/javascript"></script>
        <script src="/incom/modules/theme/default/left_menu.js" type="text/javascript"></script>
        <script src="/incom/modules/theme/default/popup_menu.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="/calendar/calendar.js"></script>
        <script type="text/javascript" language="javascript" src="/calendar/calendar-setup.js"></script>
        <script type="text/javascript" language="javascript" src="/calendar/lang/calendar-ru.js"></script>
        <script type="text/javascript" src="/incom/modules/general/script.js"></script>
        <script type="text/javascript" src="/incom/modules/theme/default/interface.js"></script>
        
        <script>
	function open_menu(id,panel_id){	
		var div = document.getElementById(id);
		if(div.style.display=='none'){
			div.style.display='block';
			if(panel_id=='panel1'){
				document.getElementById('panel1').style.height='235px';
			}else{
				document.getElementById('panel0').style.height='auto';
			}
		}else{
			div.style.display='none';
		}
	}

	function view_all(act){
		<?
		$select=$ob->select("i_modules",array("id_head"=>0),"id_sort");
		while($res=mysql_fetch_array($select)){
			$sub=$ob->select("i_modules",array("id_head"=>$res['id']),"id_sort");
			if(mysql_num_rows($sub)>0){
				echo "	var div = document.getElementById('popup_".$res['id']."'); div.style.display=act;";
			}
		}
		?>
	}

	function SectionClick(id){	
		var div = document.getElementById(id);
		if(div.style.display=='none'){
			div.style.display='block';
		}else{
			div.style.display='none';
		}
	}
	// показ меню
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
		eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
		if (restore) selObj.selectedIndex=0;
	}
	// выход из системы
	function exit_to(){
		if (confirm("Вы действительно хотите выйти?")){
			document.location.href='?exit=true';
		}
	}
	// проверка чекобокса
	function check(i){
		thisCheckbox = document.getElementById(i);
		thisCheckbox.checked = !thisCheckbox.checked;
	}
	// ширина экрана
	function screen_width(){
		save_ob=document.getElementById('save_title');
		if(save_ob){
			save_ob.style.left=screen.width/2;
			save_ob.style.top=screen.height/2-80;
		}
	}
	</script>

<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
    <tr>
      <td align="center" bgcolor="#f9f8e8" style="border: 1px solid #c4c5a6;"><table width="97%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                <?
				$option=$ob->search_option($_GET['module'],$_GET['sub_module'],$_GET['id_section'],array(""));
				while($option_res=mysql_fetch_array($option))
				{
				if($option_res['required_fields']==1){$star='<span class="small_red_text">*</span>';}else{$star='';}
					if($option_res['type_field']=="i10")
					{
					echo '<tr>
                  <td align="center" class="small_text" colspan="2">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  
                </tr><tr>
                  
                  <td align="left" class="small_text"  colspan="2">'.$ob->input_view($option_res['id'],"i_".$_GET['module'],"id",$_GET['id'],"").'</td>
                </tr>';
					}else
					{
							if ($option_res['name_en']=='cat_brend')
						{
							echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text"><select name="'.$option_res['name_en'].'">
				  <option value="0">Выберите бренд</option>
				  ';
				  $s=mysql_query("select * from i_block_elements where id_section=41 order by brand_name asc");
				  if ($s)
				  {
					  $value=mysql_query("SELECT ".$option_res['name_en']." FROM i_block_elements WHERE `id`='".$_GET['id']."' LIMIT 1");
						$value_res =  mysql_result($value, 0);
						//$ob->alert($value_res);
					while($r=mysql_fetch_array($s))
					{
						
						
						echo'<option value="'.$r["id"].'" '.(($r["id"]==$value_res)?' selected="selected"':'').'>'.$r["brand_name"].'</option>';
						
					}
				  }
				  
				  echo'</select></td>
                </tr>';
						}
						else
					{	
					if ($option_res['name_en']=='cat_problem')
						{
							echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">
				  ';
				  $s=mysql_query("select * from i_option where id = 357");
				  $r=mysql_fetch_array($s);
				  
				  $ss=mysql_query("select * from i_block_elements where id = ".$_GET['id']."");
				  $rr=mysql_fetch_array($ss);
				  
				  $arr_val = explode(',',$rr["cat_problem"]);
				  
				  $pr = explode("\n",$r["select_elements"]);
				  
				  foreach ($pr as $k=>$v)
				  {
						echo '<input type="checkbox" name="'.$option_res['name_en'].'[]" value="'.trim($v).'" '.(in_array(trim($v),$arr_val)?'checked':'').'> '.$v.'<br />';  
				  }
				  
				  echo'
				  </td>
                </tr>';
						}
						else
					{		
					
					if ($option_res['name_en']=='link_menu')
					{
						echo '<tr>
                  				<td align="right" class="small_text">Введите ссылку:</td>
				                <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"i_".$_GET['module'],"id",$_GET['id'],"").'</td>
               				  </tr>';
							  
						echo '<tr>
                  				<td align="right" class="small_text">Или выберите страницу:</td>
				                <td align="left" class="small_text">
								<select name="page_link" id="page_link">
								<option value="">Выберите страницу</option>';
								
								$arr_page=array();
								
								$s=mysql_query("(select page_name, translit_name from i_block where page_act=1 and version='".$_SESSION["version"]."') UNION ALL (select page_name, translit_name from i_block_elements where page_act=1 and version='".$_SESSION["version"]."') order by page_name asc");
								if ($s)
								{
									while($r=mysql_fetch_array($s))
									{
										echo '<option value="/'.$_SESSION["version"].'/page/'.$r["translit_name"].'">'.$r["page_name"].'</option>';
									}	
								}
								
								echo'</select>
								</td>
               				  </tr>';
							  
						echo '<tr>
                  				<td align="right" class="small_text">Или выберите файл:</td>
				                <td align="left" class="small_text">
								<input type="file" name="page_file" id="page_file">
								</td>
               				  </tr>';	
							  
					}
					else
					{		
						
					echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"i_".$_GET['module'],"id",$_GET['id'],"").'</td>
                </tr>';
					}
					}
					}
					}
                 
				}
				?>
                
            </table></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10" align="center" ></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#f9f8e8" style="border: 1px solid #c4c5a6;"><table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <td width="10%" align="left"><input type="button" name="button" id="button" value="Сохранить" onclick="pr('save')" /></td>
           
            <td width="79%" align="left">
            <input type="hidden" name="hidden" id="hidden" /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
  </table>
</form>
<script>
$(window).load(function(){
	
	window.parent.get_frame_height($(document).height());
		
})
</script>
<?
}
?>