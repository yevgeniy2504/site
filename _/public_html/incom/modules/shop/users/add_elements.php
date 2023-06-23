<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
$select=$ob->select("i_shop_users",array("login"=>$_POST['login']),"");
	if(mysql_num_rows($select)==0)
	{
	if($_POST['hidden']=='save'){$page="elements.php".$ob->gets_go($_GET,"","");}else{$page="";}
	
	$option=$ob->search_option($_GET['module'],$_GET['sub_module'],$_GET['id_section'],array(""));

$i=1;
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
						if(!$upload){$erorr='Не возможно загрузить файл!';}
						}else{$erorr='Не верный формат файла';}
					}else{$erorr="Файл превышает размер ".$option_res['size_file']." б";}
				}else{$field.="''";}	
				
	break;
	
	case "i3":
	$login_search=$ob->select("i_".$_GET['module'],array($option_res['name_en']=>sha1($_POST[''.$option_res['name_en'].''])),"");
		if(mysql_num_rows($login_search)>0){$erorr="Извените, но данный логин уже существует!";}else{$field.="'".sha1($_POST[''.$option_res['name_en'].''])."'";}
	break;
	
	case "i4":
	$field.="'".sha1($_POST[''.$option_res['name_en'].''])."'";
	break;
	
	default:
	$field.="'".$ob->strip_slashes($_POST[''.$option_res['name_en'].''])."'";
	break;
		
	}
			if(mysql_num_rows($option)!=($i++)){$field.=',';}
		}
		
		
	if(!@$erorr)
	{	
		$i=mysql_query("INSERT INTO i_".$ob->pr($_GET['module'])." (id_section,version,timestamp_x,login,password,sess,active,mail,".$field_name.") VALUES ('".@$_GET['id_section']."','".$_SESSION['version']."',CURRENT_TIMESTAMP,'".$_POST['login']."','".md5($_POST['password'])."', '".md5('session')."','".$_POST['active']."','".$_POST['mail']."'".@$field.")");
	
		if(!$i){$ob->alert("Ошибка добавления поля!");}else{$ob->go($page);}
	}else
	{
	$ob->alert($erorr);
	}
		
	}else
	{
	$ob->alert("Извените, но данный логин уже существует!");
	}
}
?>

<script>
function pr(hidden_val)
{
var msg;
var fr;
msg='';
fr=document.form;
if (fr.mail.value==''){msg=msg+'* E-mail \n';}
if (fr.login.value==''){msg=msg+'* Логин \n';}
if (fr.password.value==''){msg=msg+'* Пароль \n';}
if (fr.pr_password.value==''){msg=msg+'* Подтверждение пароля \n';}
if(fr.password.value!='' || fr.pr_password.value!='')
{
	if(fr.password.value!=fr.pr_password.value){msg=msg+'* Пароли не совпадают \n';}
}
<?
$input=$ob->select("i_option",array("category"=>"shop_users","required_fields"=>1,"category_id"=>$_GET['id_section']),"id_sort");
while($input_res=mysql_fetch_array($input))
{
	switch ($input_res['type_field'])
	{
	case 'i9':
	$elem=explode("\n",$input_res['select_elements']);
		foreach($elem as $k=>$v)
		{
			if($v!="")
			{
			if($k==(count($elem)-1)){$pl='';}else{$pl='&&';}
			@$str.='fr.'.$input_res['name_en'].'[\''.$k.'\'].checked==false '.$pl.' ';
			}
		}
	echo 'if('.$str.'){msg=msg+\'* '.$input_res['name_ru'].' \n\';}';
	break;
	
	default:
	echo 'if (fr.'.$input_res['name_en'].'.value==\'\'){msg=msg+\'* '.$input_res['name_ru'].' \n\';}';
	break;
	}
}
?>
	if(msg=='')
	{
	fr.hidden.value=hidden_val;
	fr.submit();
	}
	else
	{
	msg='Необходимо заполнить обязательные поля:\n'+msg;
	alert(msg);
	}
}
</script>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />


<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Регистрационная информация</td>
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
                <td width="41%" align="right" class="small_text">Активен:</td>
                  <td width="59%" align="left"><input name="active" type="checkbox" id="active" value="1" /></td>
                </tr>
                <?
				$option=$ob->select("i_option",array("category"=>"shop_user"),"id_sort");
				while($option_res=mysql_fetch_array($option))
				{
				if($option_res['required_fields']==1){$star='<span class="small_red_text">*</span>';}else{$star='';}
				
				
                 echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"","","","").'</td>
                </tr>';
				}
				?>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> E-mail:</td>
                  <td align="left"><input name="mail" type="text" id="mail" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Логин:</td>
                  <td align="left"><input name="login" type="text" id="login" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Пароль:</td>
                  <td align="left"><input name="password" type="password" id="password" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Подтверждение пароля:</td>
                  <td align="left"><input name="pr_password" type="password" id="pr_password" size="35" /></td>
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
                  
                  <td align="left" class="small_text"  colspan="2">'.$ob->input_view($option_res['id'],"","","","").'</td>
                </tr>';
					}else
					{
					echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"","","","").'</td>
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
