<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="index.php";}else{$page="";}


	$ob->update("i_template",array("active"=>$_POST['active'],"folders"=>$_POST['name_folder'],"name"=>$_POST['name_template'],"title"=>$_POST['title'],"description"=>$_POST['description'],"keywords"=>$_POST['keywords'],"version"=>$_POST['version']),$_GET['id'],$page);

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
if (fr.name_template.value==''){msg=msg+'* Наименование шаблона \n';}
if (fr.name_folder.value==''){msg=msg+'* Наименование папки \n';}

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
$select=$ob->select("i_template",array("id"=>$_GET['id']),"");
$res=mysql_fetch_array($select);

?>
<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Шаблоны сайтов</td>
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
                  <td width="59%" align="left"><input name="active" type="checkbox" id="active" value="1" <? if($res['active']==1){echo "checked";}?> /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Языковая версия шаблона:</td>
                  <td align="left"><select name="version" id="version" style="width:150px">
                   <?
                 $ln=$ob->select("i_lang",array("active"=>1),"id");
				 while($ln_res=mysql_fetch_array($ln))
				 {
				 if($res['version']==$ln_res['name_reduction']){$sel='selected';}else{$sel='';}
				 echo '<option value="'.$ln_res['name_reduction'].'" '.$sel.'>'.$ln_res['name'].'</option>';
				 }
				 ?>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование шаблона:</td>
                  <td align="left"><input name="name_template" type="text" id="name_template" value="<?=$res['name']?>" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование папки:</td>
                  <td align="left"><input name="name_folder" type="text" id="name_folder" value="<?=$res['folders']?>" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Заголовок (title):</td>
                  <td align="left"><input name="title" type="text" id="title" value="<?=$res['title']?>" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Описание (description):</td>
                  <td align="left"><textarea name="description" id="description" cols="45" rows="5"><?=$res['description']?></textarea></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Ключевые слова (keywords):</td>
                  <td align="left"><textarea name="keywords" id="keywords" cols="45" rows="5"><?=$res['keywords']?></textarea></td>
                </tr>
               
                
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
            <td width="10%" align="left"><input type="button" name="button" id="button" value="Сохранить" onClick="pr('save')" /></td>
            <td width="11%" align="left"><input type="button" name="button2" id="button2" value="Применить"  onclick="pr('apply')" /></td>
            <td width="79%" align="left"><input type="button" name="button3" id="button3" value="Отменить" onClick="document.location.href='index.php'" />
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
