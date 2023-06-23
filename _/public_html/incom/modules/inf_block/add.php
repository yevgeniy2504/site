<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
function getExtension($filename) {
    return end(explode(".", $filename));
}

if(@$_POST['hidden'])
{
	
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
	
	
if($_POST['hidden']=='save'){$page="index.php?id_section=".@$_GET['id_section']."&module=".@$_GET['module'];}else{$page="";}

$option=$ob->search_option($_GET['module'],"",@$_GET['id_section'],array(""));
$i=1;
$translit='';
	while($option_res=mysql_fetch_array($option))
	{
	if(!@$field){$field=',';}
	
	@$field_name.=$option_res['name_en'];
	if(mysql_num_rows($option)!=$i){$field_name.=',';}
	
	switch($option_res['type_field'])
	{
	case $option_res['type_field']=="i11" OR $option_res['type_field']=="i12":
			if($option_res['type_field']=="i11"){$folder="images";}
			if($option_res['type_field']=="i12"){$folder="files";}
				
				if(!empty($_FILES[''.$option_res['name_en'].'']['tmp_name']))
				{
					if($_FILES[''.$option_res['name_en'].'']['size']<=$option_res['size_file'])
					{
					$format=explode("|",$option_res['format_file']);
					if(in_array(substr($_FILES[''.$option_res['name_en'].'']['name'],(strlen($_FILES[''.$option_res['name_en'].'']['name'])-3),strlen($_FILES[''.$option_res['name_en'].'']['name'])),$format))
						{
						$text=rand(0,100000)."_".rand(500,1000000)."_".date("H");
						$upload=move_uploaded_file($_FILES[''.$option_res['name_en'].'']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/".$text.'.'.substr($_FILES[''.$option_res['name_en'].'']['name'],(strlen($_FILES[''.$option_res['name_en'].'']['name'])-3)));
						$field.="'".$text.'.'.substr($_FILES[''.$option_res['name_en'].'']['name'],(strlen($_FILES[''.$option_res['name_en'].'']['name'])-3))."'";
						
						if(!$upload){$erorr='Не возможно загрузить файл!';}else
						{
							$resizeObj_small = new resize('/upload/images/'.$text.'.'.getExtension($_FILES[''.$option_res['name_en'].'']['name']));
							$resizeObj_small -> resizeImage($option_res['w_resize_small'], $option_res['h_resize_small'], $option_res['type_resize']);
							$resizeObj_small -> saveImage('/upload/images/small/'.$text.'.'.getExtension($_FILES[''.$option_res['name_en'].'']['name']), 100);	
							
							$resizeObj_big = new resize('/upload/images/'.$text.'.'.getExtension($_FILES[''.$option_res['name_en'].'']['name']));
							$resizeObj_big -> resizeImage($option_res['w_resize_big'], $option_res['h_resize_big'], $option_res['type_resize']);
							$resizeObj_big -> saveImage('/upload/images/big/'.$text.'.'.getExtension($_FILES[''.$option_res['name_en'].'']['name']), 100);	
							if ($option_res['watermark']!='')
							{
								
								$resizeObj_big = new resize('/upload/images/big/'.$text.'.'.getExtension($_FILES[''.$option_res['name_en'].'']['name']));
								$resizeObj_big -> watermark($_SERVER['DOCUMENT_ROOT'].'/upload/images/big/'.$text.'.'.getExtension($_FILES[''.$option_res['name_en'].'']['name']),$_SERVER['DOCUMENT_ROOT'].'/upload/images/watermark/'.$option_res['watermark']);
							}	
							
						}
						}else{$erorr='Не верный формат файла';}
					}else{$erorr="Файл превышает размер ".$option_res['size_file']." б";}
				}else{$field.="''";}	
				
	break;
	case $option_res['type_field']=="i3":
	$login_search=$ob->select("i_".$_GET['module'],array($option_res['name_en']=>sha1($_POST[''.$option_res['name_en'].''])),"");
		if(mysql_num_rows($login_search)>0){$erorr="Извините, но данный логин уже существует!";}else{$field.="'".sha1($_POST[''.$option_res['name_en'].''])."'";}
	break;
	
	case $option_res['type_field']=="i4":
	$field.="'".sha1($_POST[''.$option_res['name_en'].''])."'";
	break;
	
	default:
	$field.="'".addslashes($_POST[''.$option_res['name_en'].''])."'";
	break;
		
	}	
		if ($option_res["translit"]==1) $translit=translit($_POST[''.$option_res['name_en'].'']);
		
			$s=mysql_query("select * from i_block where translit_name='$translit'");
			$ss=mysql_query("select * from i_block_elements where translit_name='$translit'");
			if (mysql_num_rows($s)>0 || mysql_num_rows($ss)>0)
			{
				$s_max=mysql_query("select max(id) as idd from i_block");
				$r_max=mysql_fetch_array($s_max);
				
				$translit=$translit.'_'.($r_max["idd"]+1);	
			}
		
			if(mysql_num_rows($option)!=($i++)){$field.=',';}
	}
		
		
	if(!@$erorr)
	{	
	if(@$_POST['version']){$ver=$_POST['version'];}else{$ver=$_SESSION['version'];}
	//$ob->insert("i_".$ob->pr($_GET['module']),"'".@$_GET['id_section']."'".@$field,$page);
	
	
	$i=mysql_query("INSERT INTO i_".$ob->pr($_GET['module'])." (id_section,version,translit_name,".$field_name.") VALUES ('".@$_GET['id_section']."','".$ver."','".$translit."'".@$field.")");
	$s_max=mysql_query("select max(id) as idd from i_block");
	$r_max=mysql_fetch_array($s_max);
	$params=$ob->search_params($_GET['module'],"",@$_GET['id_section'],array(""));
	
	while($r=mysql_fetch_array($params))
	{
		
		mysql_query("insert into i_params (id_block, type, name, name_en, value) values ('".$r_max["idd"]."', '".$r["type"]."', '".$r["name"]."', '".$r["name_en"]."', '".$r["value"]."')");	
	}
	
	
		if(!$i){$ob->alert("Ошибка добавления поля!");}else{$ob->go($page);}
	}else
	{
	$ob->alert($erorr);
	}
}
//проверка на валидность
$ob->script_view($_GET['module'],"",@$_GET['id_section'],array("required_fields"=>1));
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />


<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Добавление модуля</td>
    </tr>
	<tr>
    	<td>
    		<?=admin_print_dir(true);?>
    	</td>
    </tr>
    <tr>
      <td height="15" align="left" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#ecebcf" height="1"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#f9f8e8" style="border: 1px solid #c4c5a6;"><table width="97%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td align="right" class="small_text">акт. для всех языковых версий:</td>
                  <td align="left" class="small_text"><input name="version" type="checkbox" id="version" value="all"  /></td>
                </tr>
				<?
				$option=$ob->search_option($_GET['module'],"",@$_GET['id_section'],array(""));
				
				while($option_res=mysql_fetch_array($option))
				{
				if($option_res['required_fields']==1){$star='<span class="small_red_text">*</span>';}else{$star='';}
				
				
                if($option_res['type_field']=="i10")
					{
					echo '<tr>
                  <td align="center" class="small_text" colspan="2">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  
                </tr><tr>
                  
                  <td align="left" class="small_text"  colspan="2">'.$ob->input_view($option_res['id'],"","","","").'</td>
                </tr>';
					}else
					{
						
					if ($option_res['name_en']=='link_menu')
					{
						echo '<tr>
                  				<td align="right" class="small_text">Введите ссылку:</td>
				                <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"","","","").'</td>
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
						  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"","","","").'</td>
						</tr>';
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
            <td width="11%" align="left"><input type="button" name="button2" id="button2" value="Применить"  onclick="pr('apply')" /></td>
            <td width="79%" align="left"><input type="reset" name="button3" id="button3" value="Отменить" />
            <input type="hidden" name="hidden" id="hidden" /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
  </table>
</form>
<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
