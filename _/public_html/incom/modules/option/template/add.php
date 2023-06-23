<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="index.php";}else{$page="";}
if(file_exists($_SERVER['DOCUMENT_ROOT']."/incom/template/".$_POST['name_folder'])){$create_folders=1;}else{$create_folders=mkdir($_SERVER['DOCUMENT_ROOT']."/incom/template/".$_POST['name_folder'],0777);}

	if(@$create_folders)
	{
	preg_match("|(.*)#WORK_AREA#|Uis",$ob->strip_slashes($_POST['template']),$header);
	preg_match("|#WORK_AREA#(.*?)|Uis",$ob->strip_slashes($_POST['template']),$footer);
	$file=fopen($_SERVER['DOCUMENT_ROOT']."/incom/template/".$_POST['name_folder']."/header_".$_POST['version'].".php","w+");
	$i=fputs($file,$ob->strip_slashes($header['1']));
	
	$file=fopen($_SERVER['DOCUMENT_ROOT']."/incom/template/".$_POST['name_folder']."/footer_".$_POST['version'].".php","w+");
	$i1=fputs($file,$ob->strip_slashes($footer['1']));
	
	$file=fopen($_SERVER['DOCUMENT_ROOT']."/incom/template/".$_POST['name_folder']."/style_".$_POST['version'].".css","w+");
	$i2=fputs($file,$ob->strip_slashes($_POST['style']));
	
	if(!$i OR !$i1 OR !$i2){$erorr='Не возможно создать файлы!';}
	
	}else{$erorr='Невозможно создать директорию!';}

	if(!$erorr)
	{
	$ob->insert("i_template","'".$_POST['active']."','".$_POST['name_folder']."','".$_POST['name_template']."','".$_POST['title']."','".$_POST['description']."','".$_POST['keywords']."','".$_POST['version']."'",$page);
	}else{$ob->alert($erorr);}
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
if (fr.template.value==''){msg=msg+'* Внешний вид шаблона \n';}

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
                  <td width="59%" align="left"><input name="active" type="checkbox" id="active" value="1" checked /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Языковая версия шаблона:</td>
                  <td align="left"><select name="version" id="version" style="width:150px">
                 <?
                 $ln=$ob->select("i_lang",array("active"=>1),"id");
				 while($ln_res=mysql_fetch_array($ln))
				 {
				 echo '<option value="'.$ln_res['name_reduction'].'">'.$ln_res['name'].'</option>';
				 }
				 ?>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование шаблона:</td>
                  <td align="left"><input name="name_template" type="text" id="name_template" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование папки:</td>
                  <td align="left"><input name="name_folder" type="text" id="name_folder" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Заголовок (title):</td>
                  <td align="left"><input name="title" type="text" id="title" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Описание (description):</td>
                  <td align="left"><textarea name="description" id="description" cols="45" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Ключевые слова (keywords):</td>
                  <td align="left"><textarea name="keywords" id="keywords" cols="45" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text"><span class="small_red_text">*</span> Внешний вид шаблона сайта (рабочую область заменить #WORK_AREA#):</td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text"><textarea name="template" id="template" cols="85" rows="20"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text"><span class="small_red_text">*</span> Файл стилей сайта (styles.css)</td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text"><textarea name="style" id="style" cols="85" rows="20"></textarea></td>
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
