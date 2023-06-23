<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['actions'])
{
	if(count(@$_POST['select_ch'])>0)
	{
		foreach($_POST['select_ch'] as $k=>$v)
		{
		if($_POST['actions']=="delete"){$ob->del_r("i_badlist",array("id"=>$v));}
		}
	}else{$ob->alert("Необходимо выбрать элементы таблицы!");}
}
if(@$_GET['id'] AND isset($_GET['active']))
{
	$ob->update("i_badlist",array("active"=>$_GET['active']),$_GET['id'],"");
}

if(@$_GET['delete']=="true" AND $_GET['id'])
{
$ob->del_r("i_badlist",array("id"=>$_GET['id']));
}

//началась выборка
$field=array("timestamp_x"=>"Дата / Время","ip"=>"IP адрес","browser"=>"Браузер","os"=>"ОС");
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

$select=mysql_query("select * from i_badlist where id<>0 ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
$select_all=mysql_query("select * from  i_badlist where id<>0 ".$where."");
?>
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>
<script type="text/javascript">
function del(i)
{
if (confirm("Вы действительно хотите удалить выбранный элемент?")) 
{document.location.href='?start=<?=@$_GET['start']?>&delete=true&id='+i;}
}
</script>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />


<form id="form_index" name="form_index" method="post" action="index.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Обработка адресов</td>
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
      <td style="border: 1px solid #c4c5a6;"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf" style=" border-collapse:collapse">
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
	
	  echo '<tr onMouseOver="this.bgColor=\'#f3f2da\'" onMouseOut="this.bgColor=\'#fafaf0\'" onmouseup="if (!stopMoving()) if (!otherClicks(event)) return CheckTR(this);" onmousedown="startMoving()" id="str'.$res['id'].'">
        <td width="40" align="center" height="25"><INPUT id="chb'.$res['id'].'" type="checkbox" onclick="CheckTR(this);" value="'.$res['id'].'" name="select_ch[]"></td>
        
		<td align="center"><ul id="actions_menu'.$res['id'].'" class="MenuBarHorizontal">
		<li ><img src="/incom/modules/theme/default/images/icons_edit.png" border="0"/>
      <ul>
		<li '.$li_style.'><a href="javascript:del(\''.$res['id'].'\')">удалить</a></li>
	
	</ul>
  </li>
		
		 </ul><script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("actions_menu'.$res['id'].'", {imgDown:"", imgRight:""});
//-->
</script></td>';
		foreach($field as $v=>$k)
		echo '<td class="table_value">'.$res[''.$v.''].'&nbsp;</td>';
        
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
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
