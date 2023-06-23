<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?

//началась выборка
$field=array("timestamp_x"=>"Дата/Время","id_user"=>"Пользователь","table"=>"Раздел","action"=>"Действие");
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

$select=mysql_query("select * from i_logs where id<>0 ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
$select_all=mysql_query("select * from  i_logs where id<>0 ".$where."");
?>
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />


<form id="form_index" name="form_index" method="post" action="index.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Обработка логов</td>
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
		foreach($field as $k=>$v)
		{
		if(@$_POST['field_'.$k.'']==1){$view="checked";}else{$view="";}
		
        	echo '<li style="height:25px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top;" ><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td align="left" width="25px"><input name="field_'.$k.'" type="checkbox" value="1" onclick="SectionClick(\'tr_'.$k.'\')" '.$view.'/></td>
    <td align="left"><a href="javascript:check(\'field_'.$k.'\');SectionClick(\'tr_'.$k.'\')">'.$v.'</a></td>
  </tr>
</table>
</li>';
			
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
								 
								 if(@$_POST['field_'.$k.'']==1){$view="block";}else{$view="none";}
                                  if($i==1)
								  {
								  echo '<tr id="tr_'.$k.'" style="DISPLAY:'.$view.'">
                                    <td width="35%" class="dot_black" height="30px">'.$v.':</td>
                                    <td width="65%" class="dot_black"><select name="'.$k.'" style="width:150px">
									<option value="">выбор пользователя</option>';
									$log_us=$ob->select("i_user",array(),"id_group");
									while($log_usres=mysql_fetch_array($log_us))
									{
									if($_POST[''.$k.'']==$log_usres['id']){$sel='selected';}else{$sel='';}
									echo '<option value="'.$log_usres['id'].'" '.$sel.'>'.$log_usres['last_name'].'&nbsp;'.$log_usres['name'].'</option>';
									}
									echo'</select></td>
                                  </tr>';
								  }else
								  {
								  echo '<tr id="tr_'.$k.'" style="DISPLAY:'.$view.'">
                                    <td width="35%" class="dot_black" height="30px">'.$v.':</td>
                                    <td width="65%" class="dot_black"><input name="'.$k.'" type="text" id="textfield" size="20" value="'.@$_POST[''.$k.''].'" /></td>
                                  </tr>';
								  }
								  
								  $i++;
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
      <td style="border: 1px solid #c4c5a6;"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ecebcf" style="border-collapse:collapse">
          <tr>
            
            <?
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; ;
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		echo '<td  height="35" class="'.$style.'" onmouseover="this.className=\'top_table_title_back\';" onmouseout="this.className=\''.$style.'\';" onclick="document.location.href=\'index.php'.$ob->gets_go($_GET,"order",$k).'\'" title="сортировка по полю '.$v.'">'.$v.'</td>
';
		}
		?>
          </tr>


          <?
		  $table_name=array("i_badlist"=>"Обработка адресов","i_block"=>"Информ. блоки","i_block_elements"=>"Элементы блоков","i_lang"=>"Языковые версии","i_menu"=>"Элементы меню","i_option"=>"Настройки полей","i_template"=>"Шаблоны сайтов","i_user"=>"Пользователи","i_user_group"=>"Группа пользователей");
		$action=array("delete"=>"удаление","insert"=>"добавление","update"=>"обновление");
      while($res=mysql_fetch_array($select))
	  {
	  $log_us=$ob->select("i_user",array("id"=>$res['id_user']),"");
	  $log_usres=mysql_fetch_array($log_us);
	  
	  $li_style='style="height:23px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top; text-align:left;	padding-left: 23px;"';
	
	  echo '<tr onMouseOver="this.bgColor=\'#f3f2da\'" onMouseOut="this.bgColor=\'#fafaf0\'">
		<td class="table_value"  height="25">'.$res['timestamp_x'].'&nbsp;</td>
        <td class="table_value">'.$log_usres['last_name'].'&nbsp;'.$log_usres['name'].'</td>
        <td class="table_value">'.$table_name[$res['table']].'&nbsp;</td>
        <td class="table_value">'.$action[$res['action']].'&nbsp;</td>
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
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
