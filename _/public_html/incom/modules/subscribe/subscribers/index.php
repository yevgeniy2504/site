<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['actions'])
{
	if(count(@$_POST['select_ch'])>0)
	{
		foreach($_POST['select_ch'] as $k=>$v)
		{
			if($_POST['actions']=="delete")
			{
			$ob->delete_tree($v,"subscriber");
			}
		}
	}else{$ob->alert("Необходимо выбрать элементы таблицы!");}
}


if(@$_GET['id'] AND isset($_GET['active']))
{
	$ob->update("i_subscriber",array("active"=>$_GET['active']),$_GET['id'],"");
}


//удаление
if(@$_GET['delete']=="true" AND $_GET['id'])
{
$ob->delete_tree($_GET['id'],"subscriber");
}


//началась выборка
$field=array();
$field['#']="Разделов / Элементов";
$select=$ob->search_option("subscriber","",@$_GET['id_section'],array("select_fields"=>1));
$m=0;
while($res=mysql_fetch_array($select))
{
if($m==0){$hide_field_name=$res['name_en']; $m=1;}
$field[''.$res['name_en'].'']=$res['name_ru'];
}

$where='';
foreach($field as $k=>$v)
{
	if(@$_POST[''.$k.''])
	{
	$where.="AND ".$k." LIKE '%".$ob->pr($_POST[''.$k.''])."%'";
	}
}

if(@$_GET['id_section'])
{
$where.="AND id_section='".$ob->pr($_GET['id_section'])."'";
}else{$where.="AND id_section='0'";}

if(!@$_GET['order']){$ord="id DESC";}else{$ord=$ob->pr($_GET['order']);}
if(!@$_GET['start']){$start=0;}else{$start=$ob->pr($_GET['start']);} 
if(!@$_GET['number']){$number=10;}else{$number=$ob->pr($_GET['number']);}

$select=mysql_query("select * from i_subscriber where (version='all' OR version='".$_SESSION['version']."') ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
$select_all=mysql_query("select * from  i_subscriber where (version='all' OR version='".$_SESSION['version']."') ".$where."");
?>
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>
<script type="text/javascript">
function del(i)
{
if (confirm("Вы действительно хотите удалить выбранный элемент?")) 
{document.location.href='?start=<?=@$_GET['start']?>&id_section=<?=@$_GET['id_section']?>&module=<?=@$_GET['module']?>&delete=true&id='+i;}
}

function del_pr()
{
	if(document.form_index.actions.options.value!='delete')
	{
	document.form_index.submit();
	}else
	{
		if (confirm("Вы действительно хотите удалить выбранные элементы?")) 
		{
		document.form_index.submit();
		}
	}
	
}
</script>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />


<form id="form_index" name="form_index" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Группы подписчиков</td>
    </tr>
    <tr>
      <td height="25" align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="62%" align="left"><table width="272" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="272" height="25" align="center" bgcolor="#ebecd2" style="border: 1px solid #c4c5a6;"><table width="95%" border="0" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="6%" align="left" class="begin">||</td>
                        <td width="62%" align="left" class="cell_border2" onmouseover="this.className='cell_border';" onmouseout="this.className='cell_border2';">
<ul id="filter_menu" class="MenuBarHorizontal">
  <li><a  href="#">Дополнительно</a>
      <ul>
       <?
	   $i=0;
		foreach($field as $k=>$v)
		{
		if(@$_POST['field_'.$k.'']==1){$view="checked";}else{$view="";}
        if($i!=0)
			{
			echo '<li style="height:25px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top;" ><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td align="left" width="25px"><input name="field_'.$k.'" type="checkbox" value="1" onclick="SectionClick(\'tr_'.$k.'\')" '.$view.'/></td>
    <td align="left"><a href="javascript:check(\'field_'.$k.'\');SectionClick(\'tr_'.$k.'\')">'.$v.'</a></td>
  </tr>
</table>
</li>';
		}$i++;
		}
		?>
      </ul>
  </li>
 
</ul>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("filter_menu");
//-->
</script></td>
                        <td width="32%" align="right"><table width="12" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td  height="12" bgcolor="<? if(@$_POST['search']){echo '#a2d64f';}else{echo '#fed859';}?>" ></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" bgcolor="#F7F9E9" style="border-bottom: 1px solid #c4c5a6;border-right: 1px solid #c4c5a6;border-left: 1px solid #c4c5a6;"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                      <tr>
                        <td align="left" class="small_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr >
                              <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <?
								 $i=0;
								 foreach($field as $k=>$v)
								 {
								  if($i!=0)
								 {
								 if(@$_POST['field_'.$k.'']==1){$view="subscriber";}else{$view="none";}
                                  echo '<tr id="tr_'.$k.'" style="DISPLAY:'.$view.'">
                                    <td width="35%" class="dot_black" height="30px">'.$v.':</td>
                                    <td width="65%" class="dot_black"><input name="'.$k.'" type="text" id="textfield" size="20" value="'.@$_POST[''.$k.''].'" /></td>
                                  </tr>';
								  }$i++;
								  }
								  ?>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="5"></td>
                            </tr>
                            <tr>
                              <td align="left"><input type="submit" name="search" id="search" value="Найти" /></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="5"></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
            <td width="38%" align="right" valign="bottom" class="small_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td width="37%" align="center" class="small_text"><?
				 
$count=mysql_num_rows($select_all);
$por=ceil($count/$number);
$link=0;
$right=0;
	  	
for($i=1;$i<=$por;$i++)
{
if($start<=$link)
{
$right++;
	if(($right==1) AND $start>0)
	{
		if(($i-5)>0){$minus=$i-5;}else{$minus=0;}
		$link_main=$link-($number*5);
		if($link_main<0){$link_main=0;}
	echo '<a href="'.$ob->gets_go($_GET,"start",$link_main).'" class="small_text">['.$minus."..".($i-1).']</a>&nbsp;';}
	
	if($right<=5)
	{
	if($start==$link){$style='style="font-weight:bold"';}else{$style='';}
	echo '<a href="'.$ob->gets_go($_GET,"start",$link).'" class="small_text" '.$style.'>'.$i.'</a>&nbsp;';}
	
	if(($right==5) AND (($link+$number)<$count))
	{
	echo '<a href="'.$ob->gets_go($_GET,"start",($link+$number)).'" class="small_text" >['.($i+1)."..".($i+5).']</a>';}	
}
$link=$number+$link;
}
?></td>
                  <td width="4%" align="center">|</td>
                  <td width="59%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="46%" align="right"> на странице</td>
                        <td width="54%" align="center"><select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
                            <?
                    $elements=array(10,20,40,80,100,1000);
					foreach($elements as $k=>$v)
					{
					if($v==$number){$sel='selected';}else{$sel='';}
					echo '<option value="'.$ob->gets_go($_GET,"number",$v).'" '.$sel.'>'.$v.'</option>'; 
					}
					?>
                          </select>                        </td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10" ></td>
    </tr>
    <tr>
      <td height="29" align="center" class="panel_back" style="border: 1px solid #c4c5a6;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td width="1%" height="26" align="left"><span class="begin">||</span></td>
            <td width="20%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="16%" align="center"><a href="add.php<?=$ob->gets_go($_GET,"module","subscriber")?>"><img src="/incom/modules/theme/default/images/blank.gif" alt="добавить информ. блок" width="16" height="21" border="0" /></a></td>
                  <td width="84%" align="center" class="small_text"><a href="add.php<?=$ob->gets_go($_GET,"module","subscriber")?>" class="small_text">Добавить блок</a></td>
                </tr>
            </table></td>
            <td width="13%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="37%" align="center"><a href="<?=$ob->gets_go($_GET,"excel","true")?>" target="_blank"><img src="/incom/modules/theme/default/images/excel.gif" alt="экспорт в excel" width="22" height="22" border="0" /></a></td>
                <td width="63%" align="center" class="small_text"><a href="<?=$ob->gets_go($_GET,"excel","true")?>" target="_blank" class="small_text">Export</a></td>
              </tr>
            </table></td>
            <td width="16%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="37%" align="center"><a href="/incom/modules/inf_block/option.php?module=subscriber&amp;id_section=<?=@$_GET['id_section']?>"><img src="/incom/modules/theme/default/images/option.gif" alt="настройка инфор. блока" width="23" height="22" border="0" /></a></td>
                <td width="63%" align="center" class="small_text"><a href="/incom/modules/inf_block/option.php?module=subscriber&id_section=<?=@$_GET['id_section']?>" class="small_text">Настроить</a></td>
              </tr>
            </table></td>
            
            <td width="17%">&nbsp;</td>
            <td width="33%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><select name="actions" id="actions" style="width:130px">
                      <?
            $actions=array(""=>"выбор действия","delete"=>"удалить");
			foreach($actions as $k=>$v)
			{
			echo '<option value="'.$k.'">'.$v.'</option>';
			}
			?>
                    </select>                  </td>
                  <td align="center"><input type="button" name="send" id="send" value="Отправить" onclick="del_pr()" /></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
   <?
   
   if(!@$_GET['id_section'])
   {
   echo '<tr>
      <td height="10"></td>
    </tr>';
   }else
   {
   echo '<tr>
      <td height="10"></td>
    </tr>
	<tr>
      <td class="small_red_text">';
	  
	  $hide_ar=array();
	  $hide_ar2=array();
	  $field_name=$ob->select("i_option",array("category"=>"subscriber","select_fields"=>1),"id_sort");
	  $field_res=mysql_fetch_array($field_name);
	  $hide_field_name=$field_res['name_en'];
	  
	  for($i=0;$i<=4;$i++)
	  {
	  	if($i==0)
	  	{
	  	$hide=$ob->select("i_subscriber",array("id"=>$_GET['id_section']),"");
	  	$hide_res=mysql_fetch_array($hide);
	  	array_push($hide_ar,$hide_res[''.$hide_field_name.'']);
		array_push($hide_ar2,'index.php');
		}else
		{
		$hide=$ob->select("i_subscriber",array("id"=>$hide_res['id_section']),"");
	  	$hide_res=mysql_fetch_array($hide);
		array_push($hide_ar,$hide_res[''.$hide_field_name.'']);
		array_push($hide_ar2,'index.php?id_section='.$hide_res['id']);
		}
	  }
	  
	  
	  krsort($hide_ar);
	  $i=0;
	  $m=0;
	  foreach($hide_ar as $k=>$v)
	  {
	  $m++;
	  	if($v!="")
	  	{
		$i++;
		if($m!=count($hide_ar)){echo '<a href="'.$hide_ar2[''.$i.''].'&module=subscriber" class="small_red_text">'.$v.'</a> / ';}else{echo ''.$v.' / ';}
	  	
	  	}
	  }
	  echo'</td>
    </tr>
	<tr>
      <td height="10"></td>
    </tr>';   
   }
   ?>
    
   
    <tr>
      <td style="border: 1px solid #c4c5a6;"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf">
          <tr>
            <td  height="35" align="center"  class="check_table_title"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
            <td width="65" align="center" class="check_table_title" >Действия</td>
            <td width="45" align="center" class="check_table_title" >ID</td>
            <?
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; 
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		if($k=="#"){$width='width="20%"';}else{$width='';}
		
		echo '<td  class="'.$style.'" '.$width.' onmouseover="this.className=\'top_table_title_back\';" onmouseout="this.className=\''.$style.'\';" onclick="document.location.href=\'index.php'.$ob->gets_go($_GET,"order",$k).'\'" title="сортировка по полю '.$v.'">'.$v.'</td>
';
		}
		?>
          </tr>


          <?
      while($res=mysql_fetch_array($select))
	  {
	  $section=mysql_query("select * from i_subscriber where (version='all' OR version='".$_SESSION['version']."') AND id_section='".$res['id']."'");
	  $elements=$ob->select("i_subscriber_elements",array("id_section"=>$res['id'],"version"=>$_SESSION['version']),"");
	  
	  $li_style='style="height:23px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top; text-align:left;	padding-left: 23px;"';
		
	  echo '<tr onMouseOver="this.bgColor=\'#f3f2da\'" onMouseOut="this.bgColor=\'#fafaf0\'" onmouseup="if (!stopMoving()) if (!otherClicks(event)) return CheckTR(this);" onmousedown="startMoving()" id="str'.$res['id'].'" ondblclick="javascript:document.location.href=\'edit.php'.$ob->gets_go($_GET,"id",$res['id']).'&module=subscriber\'" >
	  
        <td width="40" align="center" height="25"><INPUT id="chb'.$res['id'].'" type="checkbox" onclick="CheckTR(this);" value="'.$res['id'].'" name="select_ch[]"></td>
        
		<td align="center"><ul id="actions_menu'.$res['id'].'" class="MenuBarHorizontal">
		<li ><img src="/incom/modules/theme/default/images/icons_edit.png" border="0"/>
      <ul>
		<li '.$li_style.'><a href="?id_section='.$res['id'].'&module=subscriber" >разделы</a></li>
		<li '.$li_style.'><a href="elements.php?module=subscriber_elements&sub_module=subscriber&id_section='.$res['id'].'">элементы</a></li>
		<li '.$li_style.'><a href="/incom/modules/inf_block/option.php?module=subscriber_elements&id_section='.$res['id'].'">настройка</a></li>
		<li '.$li_style.'><a href="edit.php'.$ob->gets_go($_GET,"id",$res['id']).'&module=subscriber">редактировать</a></li>
		<li '.$li_style.'><a href="javascript:del(\''.$res['id'].'\')">удалить</a></li>
	
	</ul>
  </li>
		
		 </ul><script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("actions_menu'.$res['id'].'", {imgDown:"", imgRight:""});
//-->
</script></td>
<td class="id_block_style" align="center">'.$res['id'].'</td>
<td class="table_value"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="371" align="center" style="border-right: 2px solid #ecebcf;" ><a href="?id_section='.$res['id'].'&module=subscriber" style="color:#72ad0f;font-weight:bold;">'.mysql_num_rows($section).'</a> </td>
    <td width="372" align="center"><a href="elements.php?module=subscriber_elements&sub_module=subscriber&id_section='.$res['id'].'" style="color:#72ad0f;font-weight:bold;">'.mysql_num_rows($elements).'</a></td>
  </tr>
</table>
</td>';
		$field2=$ob->search_option("subscriber","",@$_GET['id_section'],array("select_fields"=>1));
		while($field_res=mysql_fetch_array($field2))
		{
			//если рисунок
			if($res[''.$field_res['name_en'].'']!="" AND ($field_res['type_field']=="i10" OR $field_res['type_field']=="i11"))
			{
				if($field_res['type_field']=="i11"){$text='<img src="/incom/resize.php?url='.$_SERVER['DOCUMENT_ROOT'].'/upload/images/'.$res[''.$field_res['name_en'].''].'&w=100&h=90">';}
				if($field_res['type_field']=="i12"){}
			}else{$text='';}
			//если checkbox
			if($field_res['type_field']=="i7")
			{
				if($res[''.$field_res['name_en'].'']==1){$text='Да';}else{$text='Нет';}
			}
			
			if(!@$text)
			{
			echo '<td class="table_value">'.substr(strip_tags($res[''.$field_res['name_en'].'']),0,200).'&nbsp;</td>';
      		}else
			{
			echo '<td class="table_value">'.$text.'&nbsp;</td>';
      		}
		}
	  echo '</tr>';
	  }
	  ?>
      </table></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#ecebcf" class="small_text" style="border: 1px solid #c4c5a6;border-top: 0px solid ;">Всего:
        <?=mysql_num_rows($select_all)?>
        &nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   
  </table>
</form>
<?
if(@$_GET['excel']=="true")
{
$select=mysql_query("select * from i_subscriber where (version='all' OR version='".$_SESSION['version']."') ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
$str='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf">
          <tr>
           <td width="45" align="center" class="check_table_title" >ID</td>';
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; 
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		if($k=="#"){$width='width="20%"';}else{$width='';}
		
		$str.='<td  class="'.$style.'" '.$width.'>'.$v.'</td>
';
		}
		$str.='</tr>';

      while($res=mysql_fetch_array($select))
	  {
	  $section=mysql_query("select * from i_subscriber where (version='all' OR version='".$_SESSION['version']."') AND id_section='".$res['id']."'");
	  $elements=$ob->select("i_subscriber_elements",array("id_section"=>$res['id'],"version"=>$_SESSION['version']),"");
	  
	  $str.='<tr >
<td class="id_subscriber_style" align="center">'.$res['id'].'</td>
<td class="table_value"><a href="?id_section='.$res['id'].'&module=subscriber" style="color:#72ad0f;font-weight:bold;">'.mysql_num_rows($section).'</a> / <a href="elements.php?module=subscriber_elements&id_section='.$res['id'].'" style="color:#72ad0f;font-weight:bold;">'.mysql_num_rows($elements).'</a></td>';
		$field=$ob->search_option("subscriber","",@$_GET['id_section'],array("select_fields"=>1));
		while($field_res=mysql_fetch_array($field))
		{
			//если рисунок
			if($res[''.$field_res['name_en'].'']!="" AND ($field_res['type_field']=="i10" OR $field_res['type_field']=="i11"))
			{
				if($field_res['type_field']=="i11"){$text='<img src="/incom/resize.php?url='.$_SERVER['DOCUMENT_ROOT'].'/upload/images/'.$res[''.$field_res['name_en'].''].'&w=100&h=90">';}
				if($field_res['type_field']=="i12"){}
			}else{$text='';}
			//если checkbox
			if($field_res['type_field']=="i7")
			{
				if($res[''.$field_res['name_en'].'']==1){$text='Да';}else{$text='Нет';}
			}
			
			if(!@$text)
			{
			$str.='<td class="table_value">'.substr(strip_tags($res[''.$field_res['name_en'].'']),0,200).'&nbsp;</td>';
      		}else
			{
			$str.='<td class="table_value">'.$text.'&nbsp;</td>';
      		}
		}
	  $str.='</tr>';
	  }
      $str.='</table>';
	  $file=fopen($_SERVER['DOCUMENT_ROOT']."/incom/tmp/export.xls","w+");
	  $wr=fputs($file,$str);
	  if($wr){$ob->go("/incom/tmp/export.xls");}else{$ob->alert("Ошибка экспорта!");}
}
?>
<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
