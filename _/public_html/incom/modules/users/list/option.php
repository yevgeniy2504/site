<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
$_GET['module']="user";

if(@$_GET['delete']=="true" AND $_GET['id'])
{
$select=$ob->select("i_option",array("id"=>$_GET['id']),"");
$res=mysql_fetch_array($select);
mysql_query("ALTER TABLE i_user DROP ".$res['name_en']."");
$i=mysql_query("delete from i_option where id='".$ob->pr($_GET['id'])."'");
if(!$i){$ob->alert("Ошибка удаление элемента!");}
}

if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="index.php";}else{$page="?module=".@$_GET['module']."&id_section=".@$_GET['id_section'];}

if(!@$_GET['id'])
{$select=$ob->select("i_option",array("category"=>$_GET['module'],"name_en"=>$_POST['name_en']),"");}
else{$select=mysql_query("select * from i_option where category='".$_GET['module']."' AND name_en='".$ob->pr($_POST['name_en'])."' AND id<>'".$ob->pr($_GET['id'])."'");}

	if(mysql_num_rows($select)==0)
	{
		if($_POST['type_field']!="i0")
		{
		if($_POST['type_field']=="i1" OR $_POST['type_field']=="i3" OR $_POST['type_field']=="i4" OR $_POST['type_field']=="i7"  OR $_POST['type_field']=="i11" OR $_POST['type_field']=="i12"){$type_res="varchar(250)";}
		if($_POST['type_field']=="i2"){$type_res="date";}
		
		if($_POST['type_field']=="i5"){$type_res="int(11)";}
		if($_POST['type_field']=="i6" OR $_POST['type_field']=="i8" OR $_POST['type_field']=="i9" OR $_POST['type_field']=="i10"){$type_res="TEXT";}
		if($_POST['type_field']=="i7"){$type_res="tinyint(4)";}
		
		if(!@$_GET['id'])
		{
		$i=mysql_query("ALTER TABLE i_".$_GET['module']." ADD ".$ob->pr($_POST['name_en'])." ".$type_res."");
			if($i)
			{
			$field="'".$_GET['module']."','".$_GET['id_section']."','".$_POST['required_fields']."','".$_POST['select_fields']."','".$_POST['id_sort']."','".$_POST['name_ru']."','".$_POST['name_en']."','".$_POST['type_field']."','".@$_POST[''.$_POST['type_field'].'_width']."','".@$_POST[''.$_POST['type_field'].'_format_date']."','".@$_POST[''.$_POST['type_field'].'_height']."','".@$_POST[''.$_POST['type_field'].'_select_elements']."','".@$_POST[''.$_POST['type_field'].'_size_file']."','".@$_POST[''.$_POST['type_field'].'_format_file']."'";
			$ob->insert("i_option",$field,$page);
			}else{$ob->alert("Ошибка создания поля!");}
		}else
		{
		$select=$ob->select("i_option",array("id"=>$_GET['id']),"");
		$res=mysql_fetch_array($select);
		$i=mysql_query("ALTER TABLE i_".$_GET['module']." CHANGE ".$res['name_en']." ".$ob->pr($_POST['name_en'])." ".$type_res."");
			if($i)
			{
			$field=array("required_fields"=>@$_POST['required_fields'],"select_fields"=>@$_POST['select_fields'],"id_sort"=>$_POST['id_sort'],"name_ru"=>$_POST['name_ru'],"type_field"=>$_POST['type_field'],"width"=>@$_POST[''.$_POST['type_field'].'_width'],"format_date"=>@$_POST[''.$_POST['type_field'].'_format_date'],"height"=>@$_POST[''.$_POST['type_field'].'_height'],"select_elements"=>@$_POST[''.$_POST['type_field'].'_select_elements'],"size_file"=>@$_POST[''.$_POST['type_field'].'_size_file'],"format_file"=>@$_POST[''.$_POST['type_field'].'_format_file']);
			$ob->update("i_option",$field,$_GET['id'],$page);
			}else{$ob->alert("Ошибка создания поля!");}
		}
		
		
		
		}else
		{
		$ob->alert("Необходимо выбрать тип файла!");
		}
	}else
	{
	$ob->alert("Извените, но данное поле уже существует!");
	}
}
$field=array("id_sort"=>"ID сорт.","name_ru"=>"Наимен. поля","name_en"=>"Наимен. поля(eng)","type_field"=>"Тип файла");
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>

<script>
function select_type(id)
{
	var mas=new Array('i0','i1','i2','i3','i4','i5','i6','i7','i8','i9','i10','i11');
	//var div = document.getElementById(id);
	
		for(var i=0;i<mas.length;i++)
		{
		var div = document.getElementById(mas[i]);
			if(mas[i]==id)
			{
			div.style.display='block';
			}else
			{
			div.style.display='none';
			}
		}
	
}

function pr(hidden_val)
{
var msg;
var fr;
msg='';
fr=document.form;
if (fr.name_ru.value==''){msg=msg+'* Наименование поля \n';}
if (fr.name_en.value==''){msg=msg+'* Наименование поля (eng) \n';}

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
<script type="text/javascript">
function del(i)
{
if (confirm("Вы действительно хотите удалить выбранный элемент?")) 
{document.location.href='<?=$ob->gets_go($_GET,"delete","true")?>&id='+i;}
}
</script>
<?
$select=$ob->select("i_option",array("id"=>@$_GET['id'],"category"=>$_GET['module']),"");
$res=mysql_fetch_array($select);
?>
<form id="form" name="form" method="post" action="" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Настройка полей</td>
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
                  <td align="right" class="small_text">Обязательное поле для заполнения:</td>
                  <td align="left"><input name="required_fields" type="checkbox" id="required_fields" value="1" <? if($res['required_fields']==1){echo "checked";}?>></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Выделить поле:</td>
                  <td align="left"><input name="select_fields" type="checkbox" id="select_fields" value="1" <? if($res['select_fields']==1){echo "checked";}?>></td>
                </tr>
                <tr>
                  <td width="41%" align="right" class="small_text">ID сортировки:</td>
                  <td width="59%" align="left"><input name="id_sort" type="text" id="id_sort" value="<?=$res['id_sort']?>" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование поля:</td>
                  <td align="left"><input name="name_ru" type="text" id="name_ru" value="<?=$res['name_ru']?>" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование поля (eng):</td>
                  <td align="left"><input name="name_en" type="text" id="name_en" value="<?=$res['name_en']?>" size="35" /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text">(поле не должно содержать спец. символы и его длина не должна превышать 30 символов)</td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Тип поля:</td>
                  <td align="left"><select name="type_field" id="type_field" onChange="select_type(this.value)">
                  <?
                  $ar=array("i0"=>"выберите из списка","i1"=>"текстовое (text)","i2"=>"текстовое (дата)","i3"=>"текстовое (логин/пароль)","i4"=>"текстовое цена (числовое)","i5"=>"много текста (textarea)","i6"=>"выбор (checkbox)","i7"=>"список (select)","i8"=>"список (radio button)","i9"=>"html редактор","i10"=>"рисунок (file)","i11"=>"файл (file)");
				  foreach($ar as $k=>$v)
				  {
				  if($res['type_field']==$k){$sel='selected';}else{$sel='';}
				  echo '<option value="'.$k.'" '.$sel.'>'.$v.'</option>';
				  }
				  ?>
                  </select>                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text">
                  <div id="i0" style="display:none"></div>
                  <div id="i1" style="display:<? if($res['type_field']=="i1"){echo "block";}else{echo "none";}?>">
                  <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                      <td width="41%" align="right" class="small_text">Длина поля:</td>
                      <td width="59%" align="left"><input name="i1_width" type="text" id="i1_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="35" /></td>
                    </tr>
                  </table>
                  </div>
                  <div id="i2" style="display:<? if($res['type_field']=="i2"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина поля:</td>
                        <td width="59%" align="left"><input name="i2_width" type="text" id="i2_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Формат даты:</td>
                        <td align="left"><input name="i2_format_date" type="text" id="i2_format_date" value="<? if(@$_GET['id']){echo $res['format_date'];}else{echo "Y.m.d";}?>" size="35" /></td>
                      </tr>
                    </table>
                    </div>
                    <div id="i3" style="display:<? if($res['type_field']=="i3"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина поля:</td>
                        <td width="59%" align="left"><input name="i3_width" type="text" id="i3_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" class="small_text">(данный тип поля шифруется)</td>
                      </tr>
                    </table>
                    </div>
                    <div id="i4" style="display:<? if($res['type_field']=="i4"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина поля:</td>
                        <td width="59%" align="left"><input name="i4_width" type="text" id="i4_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="35" /></td>
                      </tr>
                    </table>
                    </div>
                    <div id="i5" style="display:<? if($res['type_field']=="i5"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина:</td>
                        <td width="59%" align="left"><input name="i5_width" type="text" id="i5_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="45" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Высота:</td>
                        <td align="left"><input name="i5_height" type="text" id="i5_height" value="<? if(@$_GET['id']){echo $res['height'];}else{echo "5";}?>" size="35" /></td>
                      </tr>
                    </table>
                    </div>
                    <div id="i6" style="display:<? if($res['type_field']=="i6"){echo "block";}else{echo "none";}?>"></div>
                    <div id="i7" style="display:<? if($res['type_field']=="i7"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина поля:</td>
                        <td width="59%" align="left"><input name="i7_width" type="text" id="i7_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Элементы выпадающего списка:</td>
                        <td align="left"><textarea name="i7_select_elements" id="i7_select_elements" cols="45" rows="5"><? if(@$_GET['id']){echo $res['select_elements'];}else{echo "";}?></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" class="small_text">(каждый элемент необходимо отделить вертикальной линией - |)</td>
                      </tr>
                    </table>
                    </div>
                    <div id="i8" style="display:<? if($res['type_field']=="i8"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина поля:</td>
                        <td width="59%" align="left"><input name="i8_width" type="text" id="i8_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "30";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Элементы списка:</td>
                        <td align="left"><textarea name="i8_select_elements" id="i8_select_elements" cols="45" rows="5"><? if(@$_GET['id']){echo $res['select_elements'];}else{echo "";}?></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" class="small_text">(каждый элемент необходимо отделить вертикальной линией - |)</td>
                      </tr>
                    </table>
                    </div>
                    <div id="i9" style="display:<? if($res['type_field']=="i9"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Длина:</td>
                        <td width="59%" align="left"><input name="i9_width" type="text" id="i9_width" value="<? if(@$_GET['id']){echo $res['width'];}else{echo "700";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Высота:</td>
                        <td align="left"><input name="i9_height" type="text" id="i9_height" value="<? if(@$_GET['id']){echo $res['height'];}else{echo "400";}?>" size="35" /></td>
                      </tr>
                    </table>
                    </div>
                    <div id="i10" style="display:<? if($res['type_field']=="i10"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Максимальный размер (в байтах):</td>
                        <td width="59%" align="left"><input name="i10_size_file" type="text" id="i10_size_file" value="<? if(@$_GET['id']){echo $res['size_file'];}else{echo "30000";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Форматы изображений:</td>
                        <td align="left"><input name="i10_format_file" type="text" id="i10_format_file" value="<? if(@$_GET['id']){echo $res['format_file'];}else{echo "jpg|gif|png";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" class="small_text">(каждый формат необходимо отделить вертикальной линией - |)</td>
                      </tr>
                    </table>
                    </div>
                    <div id="i11" style="display:<? if($res['type_field']=="i11"){echo "block";}else{echo "none";}?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="41%" align="right" class="small_text">Максимальный размер (в байтах):</td>
                        <td width="59%" align="left"><input name="i11_size_file" type="text" id="i11_size_file" value="<? if(@$_GET['id']){echo $res['size_file'];}else{echo "30000";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td align="right" class="small_text">Форматы файлов:</td>
                        <td align="left"><input name="i11_format_file" type="text" id="i11_format_file" value="<? if(@$_GET['id']){echo $res['format_file'];}else{echo "doc|xls";}?>" size="35" /></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" class="small_text">(каждый формат необходимо отделить вертикальной линией - |)</td>
                      </tr>
                    </table>
                    </div>                    </td>
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
            <td width="79%" align="left"><input type="reset" name="button3" id="button3" value="Отменить"  />
            <input type="hidden" name="hidden" id="hidden" /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td style="border: 1px solid #c4c5a6;"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf">
          <td width="45" height="35" align="center" class="check_table_title" >Действия</td>
            <?
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; ;
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		echo '<td  class="'.$style.'" onmouseover="this.className=\'top_table_title_back\';" onmouseout="this.className=\''.$style.'\';" onclick="document.location.href=\'option.php'.$ob->gets_go($_GET,"order",$k).'\'" title="сортировка по полю '.$v.'">'.$v.'</td>
';
		}
		?>
          </tr>


          <?
	  
	  $select=$ob->select("i_option",array("category"=>$_GET['module']),"id_sort");
      while($res=mysql_fetch_array($select))
	  {
	  $li_style='style="height:23px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top; text-align:left;	padding-left: 23px;"';
	
	  echo '<tr onMouseOver="this.bgColor=\'#f3f2da\'" onMouseOut="this.bgColor=\'#fafaf0\'" >
        
		<td align="center"><ul id="actions_menu'.$res['id'].'" class="MenuBarHorizontal">
		<li ><img src="/incom/modules/theme/default/images/icons_edit.png" border="0"/>
      <ul>
		<li '.$li_style.'><a href="'.$ob->gets_go($_GET,"id",$res['id']).'">редактировать</a></li>
		<li '.$li_style.'><a href="javascript:del(\''.$res['id'].'\')">удалить</a></li>
	
	</ul>
  </li>
		
		 </ul><script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("actions_menu'.$res['id'].'", {imgDown:"", imgRight:""});
//-->
</script></td>';
		foreach($field as $k=>$v)
		{
			if($k!="type_field")
			{
			echo '<td class="table_value">'.$res[''.$k.''].'&nbsp;</td>';
			}else
			{
			echo '<td class="table_value">'.$ar[''.$res[''.$k.''].''].'&nbsp;</td>';
			}
		}
	  echo'</tr>';
	  }
	  ?>
      </table></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
    </tr>
  </table>
</form>
<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
