<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['actions'])
{
	if(count(@$_POST['select_ch'])>0)
	{
		foreach($_POST['select_ch'] as $k=>$v)
		{
		if($_POST['actions']=="action"){$query="update i_shop_user set active='1' where id='".$ob->pr($v)."'";}
		if($_POST['actions']=="deaction"){$query="update i_shop_user set active='0' where id='".$ob->pr($v)."'";}
		if($_POST['actions']=="delete"){$ob->del_r("i_shop_user",array("id"=>$v));}
		mysql_query(@$query);
		}
	}else{$ob->alert("Необходимо выбрать элементы таблицы!");}
}
if(@$_GET['id'] AND isset($_GET['active']))
{
	$ob->update("i_shop_user",array("active"=>$_GET['active']),$_GET['id'],"");
}

if(@$_GET['delete']=="true" AND $_GET['id'])
{
$ob->del_r("i_shop_user",array("id"=>$_GET['id']));
}

//началась выборка
$field=array();
$field["active"]="Активность";
$option=$ob->select("i_option",array("category"=>"shop_user","select_fields"=>1),"id_sort");
while($res=mysql_fetch_array($option))
{
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


if(!@$_GET['order']){$ord="id DESC";}else{$ord=$ob->pr($_GET['order']);}
if(!@$_GET['start']){$start=0;}else{$start=$ob->pr($_GET['start']);} 
if(!@$_GET['number']){$number=10;}else{$number=$ob->pr($_GET['number']);}

$select=mysql_query("select * from i_shop_user where id<>0 ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
$select_all=mysql_query("select * from  i_shop_user where id<>0 ".$where."");
?>
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>
<script type="text/javascript">
function del(i)
{
if (confirm("Вы действительно хотите удалить выбранный элемент?")) 
{document.location.href='?start=<?=@$_GET['start']?>&delete=true&id='+i;}
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


<form id="form_index" name="form_index" method="post" action="index.php" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Список зарег. пользователей</td>
    </tr>
    <tr>
      <td height="25" align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="62%" align="left">&nbsp;</td>
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
            <td width="26%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="16%" align="center"><a href="add.php"><img src="/incom/modules/theme/default/images/blank.gif" alt="добавить пользователя" width="16" height="21" border="0" /></a></td>
                  <td width="84%" align="center" class="small_text"><a href="add.php" class="small_text">Добавить валюту</a></td>
                </tr>
            </table></td>
            <td width="13%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="37%" align="center"><a href="<?=$ob->gets_go($_GET,"excel","true")?>" target="_blank"><img src="/incom/modules/theme/default/images/excel.gif" alt="экспорт в excel" width="22" height="22" border="0" /></a></td>
                <td width="63%" align="center" class="small_text"><a href="<?=$ob->gets_go($_GET,"excel","true")?>" target="_blank" class="small_text">Export</a></td>
              </tr>
            </table></td>
            <td width="15%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';">&nbsp;</td>
            <td width="12%">&nbsp;</td>
            <td width="33%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><select name="actions" id="actions" style="width:130px">
                      <?
            $actions=array(""=>"выбор действия","action"=>"активизировать","deaction"=>"деактивизировать","delete"=>"удалить");
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
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td style="border: 1px solid #c4c5a6;"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf">
          <tr>
            <td  height="35" align="center"  class="check_table_title"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
            <td width="65" align="center" class="check_table_title" >Действия</td>
            <?
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; ;
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		echo '<td  class="'.$style.'" onmouseover="this.className=\'top_table_title_back\';" onmouseout="this.className=\''.$style.'\';" onclick="document.location.href=\'index.php'.$ob->gets_go($_GET,"order",$k).'\'" title="сортировка по полю '.$v.'">'.$v.'</td>
';
		}
		?>
          </tr>


          <?
      while($res=mysql_fetch_array($select))
	  {
	  $li_style='style="height:23px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top; text-align:left;	padding-left: 23px;"';
	
	  if($res['active']==1){$act='Да';}else{$act='Нет';}
	  echo '<tr onMouseOver="this.bgColor=\'#f3f2da\'" onMouseOut="this.bgColor=\'#fafaf0\'" onmouseup="if (!stopMoving()) if (!otherClicks(event)) return CheckTR(this);" onmousedown="startMoving()" id="str'.$res['id'].'" ondblclick="javascript:document.location.href=\'edit.php'.$ob->gets_go($_GET,"id",$res['id']).'\'" >
        <td width="40" align="center" height="25"><INPUT id="chb'.$res['id'].'" type="checkbox" onclick="CheckTR(this);" value="'.$res['id'].'" name="select_ch[]"></td>
        
		<td align="center"><ul id="actions_menu'.$res['id'].'" class="MenuBarHorizontal">
		<li ><img src="/incom/modules/theme/default/images/icons_edit.png" border="0"/>
      <ul>
		<li '.$li_style.'><a href="'.$ob->gets_go($_GET,"id",$res['id']).'&active=1">активизировать</a></li>
		<li '.$li_style.'><a href="'.$ob->gets_go($_GET,"id",$res['id']).'&active=0">деактивизировать</a></li>
		<li '.$li_style.'><a href="edit.php?id='.$res['id'].'">редактировать</a></li>
		<li '.$li_style.'><a href="javascript:del(\''.$res['id'].'\')">удалить</a></li>
	
	</ul>
  </li>
		
		 </ul><script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("actions_menu'.$res['id'].'", {imgDown:"", imgRight:""});
//-->
</script></td>
		
		<td class="table_value">'.$act.'&nbsp;</td>
        <td class="table_value">'.$res['name'].'&nbsp;</td>
        <td class="table_value">'.$res['last_name'].'&nbsp;</td>
        <td class="table_value"><a href="mailto:'.$res['email'].'" class="small_text">'.$res['email'].'</a>&nbsp;</td>
      </tr>';
	  }
	  ?>
      </table></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#ecebcf" class="small_text" style="border: 1px solid #c4c5a6;border-top: 0px solid ;">Всего:
        <?=mysql_num_rows($select_all)?>
        &nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>

  </table>
</form>
<?
if(@$_GET['excel']=="true")
{
$select=mysql_query("select * from i_shop_user where id<>0 ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
$str='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf">
          <tr>';
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; ;
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		
		$str.='<td  class="'.$style.'">'.$v.'</td>';
		}
		$str.='</tr>';

      while($res=mysql_fetch_array($select))
	  {
	  $str.='<tr>		
		<td class="table_value">'.$act.'&nbsp;</td>
        <td class="table_value">'.$res['name'].'&nbsp;</td>
        <td class="table_value">'.$res['last_name'].'&nbsp;</td>
        <td class="table_value"><a href="mailto:'.$res['email'].'" class="small_text">'.$res['email'].'</a>&nbsp;</td>
      </tr>';
	  } 
      $str.='</table>';
	  $file=fopen($_SERVER['DOCUMENT_ROOT']."/incom/tmp/export.xls","w+");
	  $wr=fputs($file,$str);
	  if($wr){$ob->go("/incom/tmp/export.xls");}else{$ob->alert("Ошибка экспорта!");}
}
?>

<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
