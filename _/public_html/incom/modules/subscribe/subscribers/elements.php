<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php");
require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/subscribe/mail_function.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/incom/modules/subscribe/class.phpmailer.php");
 function mime($str, $data_charset='utf-8', $send_charset='utf-8') 
	{
		if($data_charset != $send_charset) 
		{
			$str = iconv($data_charset, $send_charset, $str);
		}
		
		return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
	}
 


?>
<?
if(@$_POST['actions'])
{
	if(count(@$_POST['select_ch'])>0)
	{
	$i=0;
		foreach($_POST['select_ch'] as $k=>$v)
		{
		if($_POST['actions']=="delete"){$ob->del_r("i_".$ob->pr($_GET['module'])."",array("id"=>$v));}
			if($_POST['actions']=="send")
			{
				if($_POST['subscribe']!="not")
				{
				$sub=$ob->select("i_subscribes",array("id"=>$_POST['subscribe']),"");
				$sub_res=mysql_fetch_array($sub);
				
				$user=$ob->select("i_subscriber_elements",array("id"=>$v),"");
				$user_res=mysql_fetch_array($user);
				$files=explode("|",$sub_res['files']);
				$msg=$sub_res['message'];
				$mail = new PHPMailer(true);
				
				try {
  
  					$mail->AddAddress($user_res['mail'], $user_res['name']);
 					$mail->SetFrom($sub_res['mail_from'], 'Admin');
 
  					$mail->Subject = mime($sub_res['theme']);
					
					//preg_match_all('/img src="(.*?)"/i',$msg, $images);
 					preg_match_all('/src="(.+?)"/i', $msg, $images);
  					foreach($images[1] as $k=>$v)
  					{
  						$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT']."/upload/userfiles/image/".basename($v), 'mail-img-'.$k, basename($v), 'base64', 'image/jpeg');
						$msg=str_replace($v,'cid:mail-img-'.$k,$msg);
 					 }
					 
					// echo $msg;
 				
				  	$mail->MsgHTML($msg);
					foreach($files as $k=>$v)
					{
						if($v!="")
						{
						  $mail->AddAttachment($_SERVER['DOCUMENT_ROOT']."/upload/subscribe/".$v);      // attachment
  						}
					}

  					 //echo "Message Sent OK</p>\n";
			} catch (phpmailerException $e) {
			
				  echo $e->errorMessage(); //Pretty error messages from PHPMailer
				  
		} catch (Exception $e) {
			  echo $e->getMessage(); //Boring error messages from anything else!
	}
	$mail->Send();
				
		/*		
				$mail = new mime_mail();
				foreach($files as $k=>$v)
				{
					if($v!="")
					{
					$attachment = fread(fopen($_SERVER['DOCUMENT_ROOT']."/upload/subscribe/".$v, "r"), filesize($_SERVER['DOCUMENT_ROOT']."/upload/subscribe/".$v));
					$mail->add_attachment("$attachment",$v, "Content-Transfer-Encoding: base64 /9j/4AAQSkZJRgABAgEASABIAAD/7QT+UGhvdG9zaG");
					}
				}
				
				$mail->from = $sub_res['mail_from'];
				$mail->headers = "Content-type: text/html; charset=utf-8\n Errors-To: [EMAIL=".$user_res['mail']."]".$user_res['mail']."[/EMAIL]";
				$mail->to = $user_res['mail'];
				$mail->subject = $sub_res['theme'];
				$mail->body = $msg;
				$mail->send();
				*/
				$i++;
				}else{$ob->alert("Необходимо выбрать из списка рассылку!");}
			}
		}
		
	$ob->alert("Рассылка была разослана ".$i." пользователям[ю]");
	}else{$ob->alert("Необходимо выбрать элементы таблицы!");}
}

//удаление
if(@$_GET['delete']=="true" AND $_GET['id'])
{
$ob->del_r("i_".$ob->pr($_GET['module'])."",array("id"=>$_GET['id']));
}


//началась выборка
$field=array();
$field['mail']='E-mail';
$option=$ob->search_option($_GET['module'],$_GET['sub_module'],$_GET['id_section'],array("select_fields"=>1));
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

if(@$_GET['id_section'])
{
$where.="AND id_section='".$ob->pr($_GET['id_section'])."'";
}else{$where.="AND id_section='0'";}

if(!@$_GET['order']){$ord="id DESC";}else{$ord=$ob->pr($_GET['order']);}
if(!@$_GET['start']){$start=0;}else{$start=$ob->pr($_GET['start']);} 
if(!@$_GET['number']){$number=10;}else{$number=$ob->pr($_GET['number']);}

$select=mysql_query("select * from i_".$ob->pr($_GET['module'])." where version='".$_SESSION['version']."' ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");

$select_all=mysql_query("select * from  i_".$ob->pr($_GET['module'])." where version='".$_SESSION['version']."' ".$where."");
?>
<SCRIPT src="/incom/modules/general/script.js"></SCRIPT>
<script type="text/javascript">
function del(i)
{
if (confirm("Вы действительно хотите удалить выбранный элемент?")) 
{document.location.href='<?=$ob->gets_go($_GET,"start",@$_GET['start'])?>&delete=true&id='+i;}
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
      <td height="35" class="title_text">Подписчики</td>
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
        
			echo '<li style="height:25px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top;" ><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td align="left" width="25px"><input name="field_'.$k.'" type="checkbox" value="1" onclick="SectionClick(\'tr_'.$k.'\')" '.$view.'/></td>
    <td align="left"><a href="javascript:check(\'field_'.$k.'\');SectionClick(\'tr_'.$k.'\')">'.$v.'</a></td>
  </tr>
</table>
</li>';
		$i++;
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
								  
								 if(@$_POST['field_'.$k.'']==1){$view="subscriber";}else{$view="none";}
                                  echo '<tr id="tr_'.$k.'" style="DISPLAY:'.$view.'">
                                    <td width="35%" class="dot_black" height="30px">'.$v.':</td>
                                    <td width="65%" class="dot_black"><input name="'.$k.'" type="text" id="textfield" size="20" value="'.@$_POST[''.$k.''].'" /></td>
                                  </tr>';
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
      <td height="29" align="center" class="panel_back" style="border: 1px solid #c4c5a6;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td width="2%" height="26" align="left"><span class="begin">||</span></td>
            <td width="21%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="16%" align="center"><a href="add_elements.php<?=$ob->gets_go($_GET,"module","subscriber_elements")?>"><img src="/incom/modules/theme/default/images/blank.gif" alt="добавить элемент" width="16" height="21" border="0" /></a></td>
                  <td width="84%" align="center" class="small_text"><a href="add_elements.php<?=$ob->gets_go($_GET,"module","subscriber_elements")?>" class="small_text">Добавить элемент</a></td>
                </tr>
            </table></td>
            <td width="14%" align="center" onmouseover="this.className='cell_border_small';" onmouseout="this.className='small_text';"><table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="37%" align="center"><a href="<?=$ob->gets_go($_GET,"excel","true")?>" target="_blank"><img src="/incom/modules/theme/default/images/excel.gif" alt="экспорт в excel" width="22" height="22" border="0" /></a></td>
                <td width="63%" align="center" class="small_text"><a href="<?=$ob->gets_go($_GET,"excel","true")?>" target="_blank" class="small_text">Export</a></td>
              </tr>
            </table></td>
            <td width="30%" align="center"><select name="subscribe" id="subscribe" style="width:130px">
            <option value="not">выбор рассылки</option>
            <?
			$sub=$ob->select("i_subscribes",array("act"=>1,"version"=>$_SESSION['version']),"id DESC");
			while($sub_res=mysql_fetch_array($sub))
			{
            echo '<option value="'.$sub_res['id'].'">'.$sub_res['name'].'</option>';
            }
			?>
			</select>            </td>
            <td width="33%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="68%" align="center"><select name="actions" id="actions" style="width:130px">
                      <?
            $actions=array(""=>"выбор действия","send"=>"разослать","delete"=>"удалить");
			foreach($actions as $k=>$v)
			{
			echo '<option value="'.$k.'">'.$v.'</option>';
			}
			?>
                    </select>                  </td>
                  <td width="32%" align="center"><input type="button" name="send" id="send" value="Отправить" onclick="del_pr()" /></td>
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
		array_push($hide_ar2,'index.php?module=subscriber');
		}else
		{
		$hide=$ob->select("i_subscriber",array("id"=>$hide_res['id_section']),"");
	  	$hide_res=mysql_fetch_array($hide);
		array_push($hide_ar,$hide_res[''.$hide_field_name.'']);
		array_push($hide_ar2,'index.php?id_section='.$hide_res['id'].'&module=subscriber');
		}
	  }
	  
	  
	  krsort($hide_ar);
	  //print_r($hide_ar2);
	  $i=0;
	  $m=0;
	  foreach($hide_ar as $k=>$v)
	  {
	  $m++;
	  	if($v!="")
	  	{
		
		if($m!=count($hide_ar)){echo '<a href="'.$hide_ar2[''.$i.''].'" class="small_red_text">'.$v.'</a> / ';}else{echo ''.$v.' / ';}
	  	$i++;
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
            <?
		foreach($field as $k=>$v)
		{
		if(@$_GET['order']==$k OR @$_GET['order']==$k." DESC")
		{
		$style='top_table_title_back'; ;
			if($_GET['order']!=$k." DESC"){$k.=" DESC";}
		}else{$style='top_table_title';}
		if($k=="#"){$width='width="20%"';}else{$width='';}
		
		echo '<td  class="'.$style.'" '.$width.' onmouseover="this.className=\'top_table_title_back\';" onmouseout="this.className=\''.$style.'\';" onclick="document.location.href=\''.$ob->gets_go($_GET,"order",$k).'\'" title="сортировка по полю '.$v.'">'.$v.'</td>
';
		}
		?>
          </tr>


          <?
      while($res=mysql_fetch_array($select))
	  {
	  $section=$ob->select("i_subscriber",array("id_section"=>$res['id']),"");
	  $elements=$ob->select("i_subscriber_elements",array("id_section"=>$res['id']),"");
	  
	  $li_style='style="height:23px;background-image: url(/incom/modules/theme/default/images/menu_03.gif);
	background-repeat: repeat-y;
	background-position: left top; text-align:left;	padding-left: 23px;"';
	
	  echo '<tr onMouseOver="this.bgColor=\'#f3f2da\'" onMouseOut="this.bgColor=\'#fafaf0\'" onmouseup="if (!stopMoving()) if (!otherClicks(event)) return CheckTR(this);" onmousedown="startMoving()" id="str'.$res['id'].'" ondblclick="javascript:document.location.href=\'edit_elements.php'.$ob->gets_go($_GET,"id",$res['id']).'\'" >
        <td width="40" align="center" height="25"><INPUT id="chb'.$res['id'].'" type="checkbox" onclick="CheckTR(this);" value="'.$res['id'].'" name="select_ch[]"></td>
        
		<td align="center"><ul id="actions_menu'.$res['id'].'" class="MenuBarHorizontal">
		<li ><img src="/incom/modules/theme/default/images/icons_edit.png" border="0"/>
      <ul>
	  <li '.$li_style.'><a href="edit_elements.php'.$ob->gets_go($_GET,"id",$res['id']).'">редактировать</a></li>
		<li '.$li_style.'><a href="javascript:del(\''.$res['id'].'\')">удалить</a></li>
	
	</ul>
  </li>
		
		 </ul><script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("actions_menu'.$res['id'].'", {imgDown:"", imgRight:""});
//-->
</script></td>
<td class="table_value"><a href="mailto:'.$res['mail'].'" class="small_text">'.$res['mail'].'</a>&nbsp;</td>';

		$field2=$ob->search_option("subscriber_elements",$_GET['sub_module'],@$_GET['id_section'],array("select_fields"=>1));
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
			echo '<td class="table_value">'.$res[''.$field_res['name_en'].''].'&nbsp;</td>';
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
$select=mysql_query("select * from i_".$ob->pr($_GET['module'])." where version='".$_SESSION['version']."' ".$where." ORDER BY ".$ord.",'puttime' DESC LIMIT ".$start.",".$number."");
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
		if($k=="#"){$width='width="20%"';}else{$width='';}
		
		$str.= '<td  class="'.$style.'" >'.$v.'</td>';
		}
		$str.='</tr>';

      while($res=mysql_fetch_array($select))
	  {
	  $section=$ob->select("i_subscriber",array("id_section"=>$res['id']),"");
	  $elements=$ob->select("i_subscriber_elements",array("id_section"=>$res['id']),"");
	  
	  $str.='<tr >';
		$field=$ob->search_option("subscriber_elements",$_GET['sub_module'],@$_GET['id_section'],array("select_fields"=>1));
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
			$str.='<td class="table_value">'.$res[''.$field_res['name_en'].''].'&nbsp;</td>';
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
