<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="index.php";}else{$page="";}

$modules=$ob->select("i_modules",array("id_head"=>0),"id_sort");	
	while($modules_res=mysql_fetch_array($modules))
	{
		if(@$_POST[''.$modules_res['id'].'']==1)
		{
		@$priv.=$modules_res['id'].'=';
		$sub_modules=$ob->select("i_modules",array("id_head"=>$modules_res['id']),"id_sort");
			$i=0;
			while($sub_res=mysql_fetch_array($sub_modules))
			{
			if(@$_POST[''.$modules_res['id'].'_'.$i.'']==1)
			{
			$priv.=$sub_res['id']; 
			if(mysql_num_rows($sub_modules)!=($m=1+$i)){$priv.=',';}
			}
			$i++;
			}
		}
		$priv.='|';
	}
	$ob->insert("i_user_group","CURRENT_TIMESTAMP,'".$_POST['active']."','".$_POST['id_sort']."','".$_POST['name']."','".$_POST['info']."','".$priv."'",$page);
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
if (fr.name.value==''){msg=msg+'* Наименование \n';}

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

function main(id,count)
{
general_box = document.getElementById(id);
	for(var i=0;i<count;i++)
	{
	thisCheckbox = document.getElementById(id+'_'+i);
	if(general_box.checked){thisCheckbox.checked=true;}else{thisCheckbox.checked=false;}
	}
}
</script>

<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Группа пользователей</td>
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
                <tr>
                  <td align="right" class="small_text">ID сорт.</td>
                  <td align="left"><input name="id_sort" type="text" id="id_sort" size="20" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование:</td>
                  <td align="left"><input name="name" type="text" id="name" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Описание группы:</td>
                  <td align="left"><textarea name="info" id="info" cols="45" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Привилегии на разделы:</td>
                  <td align="left">&nbsp;</td>
                </tr>
               <?
			   $modules=$ob->select("i_modules",array("id_head"=>0),"id_sort");
			   while($modules_res=mysql_fetch_array($modules))
			   {
			   $sub_modules=$ob->select("i_modules",array("id_head"=>$modules_res['id']),"id_sort");
                echo '<tr>
                  <td align="right" class="small_text">&nbsp;</td>
                  <td align="left" valign="middle" class="small_text"><input type="checkbox" name="'.$modules_res['id'].'" onclick="main(\''.$modules_res['id'].'\',\''.mysql_num_rows($sub_modules).'\')" value="1">
                  '.$modules_res['name'];
				  if(mysql_num_rows($sub_modules)>0){echo "<br>";}
				  $i=0;
				  while($sub_res=mysql_fetch_array($sub_modules))
				  {
				  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="'.$modules_res['id'].'_'.$i.'" value="1">
                  '.$sub_res['name'].'<br>';
				  $i++;
				  }
				  echo'</td>
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
