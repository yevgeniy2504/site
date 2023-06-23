<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="index.php";}else{$page="";}
$field=array();
	if($_POST['login'] AND $_POST['password'])
	{
	$select=$ob->select("i_user",array("login"=>sha1($_POST['login'])),"");
		if(mysql_num_rows($select)==0)
		{
		$field['login']=sha1($_POST['login']);
		$field['password']=sha1($_POST['password']);
		}else
		{
		$erorr="Извените, но данный логин уже существует!";
		}
	}
	
	
	
	$option=$ob->select("i_option",array("category"=>"user"),"id_sort");
	
	while($option_res=mysql_fetch_array($option))
	{
		if($option_res['type_field']=="i10"){$folder="images";}
		if($option_res['type_field']=="i11"){$folder="files";}
		
		if($option_res['type_field']=="i10" OR $option_res['type_field']=="i11")
		{
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
				//если выбрано удаление
				
				if(@$_POST['delete'.$option_res['id'].'']==1)
				{
				$delete=$ob->select("i_user",array("id"=>$_GET['id']),"");
				$delete_res=mysql_fetch_array($delete);
				unlink($_SERVER['DOCUMENT_ROOT']."/upload/".$folder."/".$delete_res[''.$option_res['name_en'].'']);
				$field[''.$option_res['name_en'].'']="";
				}
				
		}else
		{
		$field[''.$option_res['name_en'].'']=$ob->strip_slashes($_POST[''.$option_res['name_en'].'']);
		}
	}
	
	if($_POST['go']==1)
			{
			$msg='<style type="text/css">
<!--
.style1 {
	font-family: Tahoma;
	font-size: 12px;
}
.style2 {font-family: Tahoma; font-size: 12px; font-weight: bold; }
-->
</style>
<p class="style2">Здравствуйте.</p>
<p class="style1">Ваши авторизационные данные:</p>
<p class="style2">Логин: '.$_POST['login'].'</p>
<p class="style2">Пароль:  '.$_POST['pass'].'</p>
<p class="style1">&nbsp;</p>
<p class="style1">Напоминаем, что для авторизации , Вам необходимо зайти на страницу <a href="http://'.$_SERVER['HTTP_HOST'].'">'.$_SERVER['HTTP_HOST'].'</a> и пройти авторизацию, используя логин и пароль. <br>
Желаем удачи.</p>
<p class="style1">&nbsp;</p>
<p class="style1">С Уважением, Администрация </p>';
	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Admin Site <admin@".$_SERVER['HTTP_HOST'].">\r\n";
	mail($_POST['email'],"Уведомление системы INCOM CMS 2.0",$msg,$headers);
			}
	
	$field_stat=array("id_group"=>$_POST['id_group'],"active"=>$_POST['active'],"name"=>$_POST['name'],"last_name"=>$_POST['last_name'],"email"=>$_POST['email']);
		
	if(!@$erorr)
	{	
	$ob->update("i_user",array_merge($field,$field_stat),$_GET['id'],$page);
	}else
	{
	$ob->alert($erorr);
	}
}
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />

<script>
function pr(hidden_val)
{
var msg;
var fr;
msg='';
fr=document.form;
if (fr.email.value==''){msg=msg+'* E-mail \n';}
<?
$input=$ob->select("i_option",array("required_fields"=>1,"category"=>"user"),"id_sort");
while($input_res=mysql_fetch_array($input))
{
echo 'if (fr.'.$input_res['name_en'].'.value==\'\'){msg=msg+\'* '.$input_res['name_ru'].' \n\';}';
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
<?
$select=$ob->select("i_user",array("id"=>$_GET['id']),"");
$res=mysql_fetch_array($select);
?>
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
                  <td width="59%" align="left"><input name="active" type="checkbox" id="active" value="1" <? if($res['active']==1){echo "checked";}?>/></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Пользовательская группа:</td>
                  <td align="left"><select name="id_group" id="id_group">
                  <?
                  $group=$ob->select("i_user_group",array("active"=>1),"id_sort");
				  while($group_res=mysql_fetch_array($group))
				  {
				  if($res['id_group']==$group_res['id']){$sel='selected';}else{$sel='';}
				  echo '<option value="'.$group_res['id'].'" '.$sel.'>'.$group_res['name'].'</option>';
				  }
				  ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Имя:</td>
                  <td align="left"><input name="name" type="text" id="name" size="35" value="<?=$res['name']?>" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Фамилия:</td>
                  <td align="left"><input name="last_name" type="text" id="last_name" size="35" value="<?=$res['last_name']?>" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> E-mail:</td>
                  <td align="left"><input name="email" type="text" id="email" size="35" value="<?=$res['email']?>" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"> Новый Логин:</td>
                  <td align="left"><input name="login" type="text" id="login" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Новый Пароль:</td>
                  <td align="left"><input name="password" type="password" id="password" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Подтверждение пароля:</td>
                  <td align="left"><input name="pr_password" type="password" id="pr_password" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Оповестить пользователя:</td>
                  <td align="left"><input name="go" type="checkbox" id="go" value="1" /></td>
                </tr>
                <?
				$option=$ob->select("i_option",array("category"=>"user"),"id_sort");
				while($option_res=mysql_fetch_array($option))
				{
				if($option_res['required_fields']==1){$star='<span class="small_red_text">*</span>';}else{$star='';}
				
				
                 echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"i_user","id",$_GET['id'],"").'</td>
                </tr>';
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
            <td width="79%" align="left"><input type="button" name="button3" id="button3" value="Отменить" onclick="document.location.href='index.php'" />
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
