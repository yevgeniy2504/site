<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="elements.php".$ob->gets_go($_GET,"","");}else{$page="";}
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
				$field[''.$option_res['name_en'].'']="";
				}
				
				if(!empty($_FILES[''.$option_res['name_en'].'']['tmp_name']))
				{
					if($_FILES[''.$option_res['name_en'].'']['size']<=$option_res['size_file'])
					{
					$format=explode("|",$option_res['format_file']);
						if(in_array(substr($_FILES[''.$option_res['name_en'].'']['name'],(strlen($_FILES[''.$option_res['name_en'].'']['name'])-3),strlen($_FILES[''.$option_res['name_en'].'']['name'])),$format))
						{
						$text=rand(0,100000)."_".rand(500,1000000)."_".date("H").".".substr($_FILES[''.$option_res['name_en'].'']['name'],(strlen($_FILES[''.$option_res['name_en'].'']['name'])-3));
						$upload=move_uploaded_file($_FILES[''.$option_res['name_en'].'']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/".$text);
						
						$field[''.$option_res['name_en'].'']=$text;
							if(!$upload){$erorr='Не возможно загрузить файл!';}
						}else{$erorr='Не верный формат файла';}
					}else{$erorr="Файл превышает размер ".$option_res['size_file']." байт";}
				}
				
				
		}else
		{
		$field[''.$option_res['name_en'].'']=$ob->strip_slashes($_POST[''.$option_res['name_en'].'']);
		}
	}
		
	if(!@$erorr)
	{	
	$field['mail']=$_POST['mail_sub'];
	$ob->update("i_".$_GET['module'],$field,$_GET['id'],$page);
	}else
	{
	$ob->alert($erorr);
	}
}
//проверка на валидность
$ob->script_view($_GET['module'],$_GET['sub_module'],@$_GET['id_section'],array("required_fields"=>1));
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />

<?
$select=$ob->select("i_".$_GET['module'],array("id"=>$_GET['id']),"");
$res=mysql_fetch_array($select);
?>
<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Подписчики</td>
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
                  <td align="right" class="small_text">E-mail:</td>
                  <td align="left" class="small_text"><input name="mail_sub" type="text" id="mail_sub" size="30" value="<?=$res['mail']?>" /></td>
                </tr>
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
					echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"i_".$_GET['module'],"id",$_GET['id'],"").'</td>
                </tr>';
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
