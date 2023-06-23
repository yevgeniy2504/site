<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?

if ($_GET["id_section"]=='') $_GET["id_section"]=0;

if(@$_GET['delete']=="true" AND $_GET['id_field'])
{
	$select=$ob->select("i_params",array("id"=>$_GET['id_field'],"version"=>$_SESSION['version']),"");
	$res=mysql_fetch_array($select);
	
	mysql_query("delete from i_params where id='".$_GET['id_field']."'");
	
}

if(@$_POST['hidden'])
{
	if($_POST['hidden']=='save'){$page=$_POST['reffer'];}else{$page="?module=".@$_GET['module']."&id_section=".@$_GET['id_section'];}

	if(!@$_GET['id'])
	{
		$select=$ob->select("i_params",array("id_block"=>$_GET['id_section'],"version"=>$_SESSION['version'],"name_en"=>$_POST['name_en']),"");
	}
	else
	{
		$select=mysql_query("select * from i_params where id_block='".$_GET['id_section']."' and version='".$_SESSION["version"]."' AND name_en='".$ob->pr($_POST['name_en'])."' AND id<>'".$ob->pr($_GET['id'])."'");
	}

	if($_POST['type_field']=="i1"){$type_res="varchar(100)";}
	if($_POST['type_field']=="i7"){$type_res="int(11)";}

	if(mysql_num_rows($select)==0)
	{
			if($_POST['type_field']!="i0")
			{
			
			if(!@$_GET['id'])
			{
			
				$field="'".$_GET['id_section']."','".$_POST['name_ru']."','".$_POST['type_field']."','".$_POST['i1_width']."','".$_POST['name_en']."','".$_SESSION['version']."'";
	
				$ob->insert("i_params",$field,$page);
				
			}else
			{
				$select=$ob->select("i_params",array("id"=>$_GET['id'],"version"=>$_SESSION['version']),"");
				$res=mysql_fetch_array($select);

				$field=array("name"=>@$_POST['name_ru'],"type"=>@$_POST['type_field'],
							"value"=>$_POST['i1_width'],"name_en"=>$_POST['name_en']);
				$ob->update_params("i_params",$field,$_GET['id'],$page, $_SESSION["version"]);
				
				/////////////////////////////////////
				$field2=array("name_en"=>$_POST['name_en'],"type"=>$_POST['type_field'],"value"=>@$_POST['i1_width']);
				
				$i=0;
				
				foreach($field2 as $k=>$v){
					if(($i!=count($field2)) AND ($i!=0)){@$str2.=",";}
					@$str2.='`'.$k.'`=\''.$v.'\'';
					$i++;
				}
				
				$update=mysql_query("update `i_params` set ".$str2." where `name_en`='".$res['name_en']."' and version='".$_SESSION["version"]."'");
				//////////////////////////////////////
				
			}
			
			}else
			{
				$ob->alert("Необходимо выбрать тип файла!");
			}
		
	}else{
		
		$qr = mysql_query("select * from `i_params` where `id_block`='".$_GET['id_section']."' and `version`='".$_SESSION['version']."' AND `name_en`='".$ob->pr($_POST['name_en'])."' ".($_GET['id'] ? ' AND `id`!='.$_GET['id'] : ''));
		if(mysql_num_rows($qr)<1){
			if($_POST['type_field']!="i0")
			{
			
			if(!@$_GET['id'])
			{
				
					$field=array("name"=>@$_POST['name_ru'],"type"=>@$_POST['type_field'],
							"value"=>$_POST['i1_width'],"name_en"=>$_POST['name_en'],"version"=>$_SESSION['version']);
					$ob->insert("i_params",$field,$page);
					///////////////////////////////////////////////////
					
					$field2=array("name_en"=>$_POST['name_en'],"type"=>$_POST['type_field'],"value"=>@$_POST['i1_width']);
					
					$i=0;
					foreach($field2 as $k=>$v){
						if(($i!=count($field2)) AND ($i!=0)){@$str2.=",";}
						@$str2.='`'.$k.'`=\''.$v.'\'';
						$i++;
					}
					$update=mysql_query("update `i_params` set ".$str2." where `name_en`='".$_POST['name_en']."' and version='".$_SESSION["version"]."'");
					
					if(!$update){
						$ob->alert("Record has not update!\\nREASON:".mysql_error());
					}
				
			}else
			{
				$select=$ob->select("i_params",array("id"=>$_GET['id'],"version"=>$_SESSION['version']),"");
				$res=mysql_fetch_array($select);
				
				
				
				$field=array("name"=>$_POST['name_ru'],"name_en"=>$_POST['name_en'],"type"=>$_POST['type_field'],"value"=>@$_POST['i1_width']);
				$field2=array("name_en"=>$_POST['name_en'],"type"=>$_POST['type_field'],"value"=>@$_POST['i1_width']);
				
				$i=0;
				$str='';
				$str2='';
				foreach($field as $k=>$v){
					if(($i!=count($field)) AND ($i!=0)){@$str.=",";}
					@$str.='`'.$k.'`=\''.$v.'\'';
					$i++;
				}
				$i=0;
				
				foreach($field2 as $k=>$v){
					if(($i!=count($field2)) AND ($i!=0)){@$str2.=",";}
					@$str2.='`'.$k.'`=\''.$v.'\'';
					$i++;
				}
				
				$update=mysql_query("update `i_params` set ".$str." where `id`=".$_GET['id']." and version='".$_SESSION["version"]."'");
				$update=mysql_query("update `i_params` set ".$str2." where `name_en`='".$res['name_en']."' and version='".$_SESSION["version"]."'");
				
				
				if(!$update){
					$ob->alert("Record has not update!\\nREASON:".mysql_error());
				}else{
					if($page!=""){
						echo '
							<div id="save_title" style="position:absolute; background-color:#FFFFFF; BORDER: #c4c5a6 1px solid; width:200px; height:50px;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
									  <td height="50" align="center" class="small_text"><img src="/incom/modules/theme/default/images/new.gif"  hspace="4" align="left" />подождите, идёт сохранение параметров</td>
									</tr>
								</table>
							</div>';
							$ob->go($page);
						}
					}
				
			}
			
			}else
			{
			$ob->alert("Необходимо выбрать тип файла!");
			}
		}else $ob->alert("Извените, но данное поле уже существует!");
	}
}
$field=array("name"=>"Наимен. поля","name_en"=>"Наимен. поля(eng)","type"=>"Тип файла");
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>

<script>
function select_type(id)
{
	var mas=new Array('i0','i1','i7');
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
{document.location.href='<?=$ob->gets_go($_GET,"delete","true")?>&id_field='+i;}
}
</script>
<?
$select=$ob->select("i_params",array("id"=>@$_GET['id'],"version"=>@$_SESSION["version"]),"");
$res=mysql_fetch_array($select);
?>
<form id="form" name="form" method="post" action="<?=$ob->gets_go($_GET,"","")?>" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Парамметры модуля
        <input type="hidden" name="reffer" id="reffer" value="<? 
		if(!@$_POST['reffer']){
			echo @$_SERVER['HTTP_REFERER'];
		}else{
			echo @$_POST['reffer'];
		}?>" /></td>
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
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Наименование поля:</td>
                  <td align="left"><input name="name_ru" type="text" id="name_ru" value="<?=$res['name']?>" size="35" /></td>
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
                  $ar=array("i0"=>"выберите из списка","i1"=>"текстовое (text)","i7"=>"выбор (checkbox)");
				  foreach($ar as $k=>$v)
				  {
				  if($res['type']==$k){$sel='selected';}else{$sel='';}
				  echo '<option value="'.$k.'" '.$sel.'>'.$v.'</option>';
				  }
				  ?>
                  </select>                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="small_text">
                  <div id="i0" style="display:none"></div>
                  <div id="i1" style="display:<? if($res['type']=="i1"){echo "block";}else{echo "none";}?>">
                  <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                      <td width="41%" align="right" class="small_text">Значение:</td>
                      <td width="59%" align="left"><input name="i1_width" type="text" id="i1_width" value="<? if(@$_GET['id']){echo $res['value'] ? $res['value'] : "";}else{echo "";}?>" size="35" /></td>
                    </tr>
                  </table>
                  </div>
                  
                    
                    
                    
                    
                    <div id="i7" style="display:<? if($res['type_field']=="i7"){echo "block";}else{echo "none";}?>">
                    </div>
                    
                    
                    
                    
                                        </td>
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
      <td style="border: 1px solid #c4c5a6;"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf" style="border-collapse:collapse">
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
	  
	  $select=$ob->select("i_params",array("id_block"=>@$_GET['id_section'], "version"=>@$_SESSION['version']),"id");
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
			if($k!="type")
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
