<?
$startTimer = microtime(1);
require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");

if(@$_GET['exit']=="true"){@setcookie("web_auth","");session_destroy();$ob->go("/incom/index.php");}

if(@$_GET['version']){$_SESSION['version']=$_GET['version'];}

$ob->admin();

$users=$ob->select("i_user",array("id"=>$_SESSION['user_id']),"");
$users_res=mysql_fetch_array($users);

$group=$ob->select("i_user_group",array("id"=>$users_res['id_group']),"");
$group_res=mysql_fetch_array($group);

$self=explode("/",$_SERVER['PHP_SELF']);
$mas=explode("|",$group_res['privileges']);

$head=array();
$head_name=array();
$sub_head=array();
$sub_head_name=array();


foreach($mas as $k=>$v){
	$namef=$ob->select("i_modules",array("id"=>$v),"");
	$namef_res=mysql_fetch_array($namef);
	$res_v=explode("=",$v);

	array_push($head,$res_v['0']);
	array_push($head_name,$namef_res['folders']);
	if(@$res_v['1']!=""){
		
		$sub_v=explode(",",$res_v['1']);
		foreach($sub_v as $f=>$m)
		{
			$namef=$ob->select("i_modules",array("id"=>$m),"");
			$namef_res=mysql_fetch_array($namef);
			
			array_push($sub_head,$m);
			array_push($sub_head_name,$namef_res['folders']);
		}
	}
}

if($_SERVER['PHP_SELF']!="/incom/modules/desktop.php" AND $_SERVER['PHP_SELF']!="/incom/modules/search/index.php")
{
	if(in_array($self['3'],$head_name))
	{
		if(!strstr($self['4'],"."))
		{
			if(!@in_array($self['4'],$sub_head_name))
			{
				header("LOCATION:/incom/index.php");
			}
		}
	}else{
		header("LOCATION:/incom/index.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Incom Content Manager System 2.0</title>
        <link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
        <link href="/incom/modules/theme/default/popup_menu.css" rel="stylesheet" type="text/css">
        <link rel="StyleSheet" href="/calendar/calendar.css" type="text/css">
        <script src="/incom/modules/theme/default/jquery-1.4.2.min.js" type="text/javascript"></script>
        <script src="/incom/modules/theme/default/left_menu.js" type="text/javascript"></script>
        <script src="/incom/modules/theme/default/popup_menu.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="/calendar/calendar.js"></script>
        <script type="text/javascript" language="javascript" src="/calendar/calendar-setup.js"></script>
        <script type="text/javascript" language="javascript" src="/calendar/lang/calendar-ru.js"></script>
        <script type="text/javascript" src="/incom/modules/general/script.js"></script>
        <script type="text/javascript" src="/incom/modules/theme/default/interface.js"></script>
        
        <script>
	function open_menu(id,panel_id){	
		var div = document.getElementById(id);
		if(div.style.display=='none'){
			div.style.display='block';
			if(panel_id=='panel1'){
				document.getElementById('panel1').style.height='235px';
			}else{
				document.getElementById('panel0').style.height='auto';
			}
		}else{
			div.style.display='none';
		}
	}

	function view_all(act){
		<?
		$select=$ob->select("i_modules",array("id_head"=>0),"id_sort");
		while($res=mysql_fetch_array($select)){
			$sub=$ob->select("i_modules",array("id_head"=>$res['id']),"id_sort");
			if(mysql_num_rows($sub)>0){
				echo "	var div = document.getElementById('popup_".$res['id']."'); div.style.display=act;";
			}
		}
		?>
	}

	function SectionClick(id){	
		var div = document.getElementById(id);
		if(div.style.display=='none'){
			div.style.display='block';
		}else{
			div.style.display='none';
		}
	}
	// показ меню
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
		eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
		if (restore) selObj.selectedIndex=0;
	}
	// выход из системы
	function exit_to(){
		if (confirm("Вы действительно хотите выйти?")){
			document.location.href='?exit=true';
		}
	}
	// проверка чекобокса
	function check(i){
		thisCheckbox = document.getElementById(i);
		thisCheckbox.checked = !thisCheckbox.checked;
	}
	// ширина экрана
	function screen_width(){
		save_ob=document.getElementById('save_title');
		if(save_ob){
			save_ob.style.left=screen.width/2;
			save_ob.style.top=screen.height/2-80;
		}
	}
	</script>
        </head>
        
    <body topmargin="0" leftmargin="0" onload="screen_width()">
	
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
        	<td height="60" align="center" valign="top" bgcolor="#fafafa" style="border-bottom:#c5c4a4 solid 1px;">
            	
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
              		<tr>
              			<td>&nbsp;</td>
            		</tr>
              		<tr>
              			<td>
                        	
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  				<tr>
                  					<td width="21%" align="left" valign="top">
                                    	
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      						<tr>
                      							<td width="236" height="36" align="center" bgcolor="#7DBF0F" class="title_white" nowrap="nowrap">Добрый день, <?=$users_res['last_name']."&nbsp;".$users_res['name']?>
                                                </td>
                    						</tr>
                      						<tr>
                      							<td align="right">
                                                	<img src="/incom/modules/theme/default/images/shadow_03.gif" width="156" height="20" />
                                                </td>
                    						</tr>
                    					</table>
                    
                    				</td>
                  					<td width="1%" align="right" valign="top">&nbsp;</td>
                 					<td width="40%" align="right" valign="top">
                                    	
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      						<tr>
                      							<td height="25" align="center" class="red_menu">
                                                	
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          								<tr>
                          									<td align="center">
                                                            	<select name="select2" class="popup_menu" id="select2" style="width:87%;background-color:#C4D926; color: #000000;"onchange="MM_jumpMenu('parent',this,0)" >
                                                                	<option value="#">--разделы системы--</option>
                              			<?
					  					$select=$ob->select("i_modules",array("id_head"=>0),"id_sort");
					  					while($res=mysql_fetch_array($select)){
											$popup=$ob->select("i_modules",array("id_head"=>$res['id']),"id_sort");
											if(mysql_num_rows($popup)>0){
												$link='#';
											}else{
												$link='/incom/modules/'.$res['folders'].'/';
											}
					  
					  						if(in_array($res['id'],$head)){
												echo '<option value="'.$link.'">'.$res['name'].'</option>';
											}	
											
											while($popup_res=mysql_fetch_array($popup)){
												if(in_array($popup_res['id'],$sub_head)){
													echo '<option value="/incom/modules/'.$res['folders'].'/'.$popup_res['folders'].'/">--- '.$popup_res['name'].'</option>';
												}
					  						}
					  					}
					  					?>
                            										</select>
                                                                 </td>
                                                                 <td align="center">
                                                                 	<select name="select3" class="popup_menu" id="select3" style="width:87%;background-color:#C4D926; color: #000000;" onchange="MM_jumpMenu('parent',this,0)">
										                              <option value="#">--выбор языка--</option>
                              			<?
                      					$select=$ob->select("i_lang",array("active"=>1),"id");
										while($res=mysql_fetch_array($select)){
											 if($_SESSION['version']==$res['name_reduction']){$sel='selected';}else{$sel='';}
											 echo '<option value="?version='.$res['name_reduction'].'" '.$sel.'>'.$res['name'].'</option>';
									  	}
					  					?>
                           											</select>
                                                                  </td>
                        									</tr>
                        							</table>
                                                    
                                                </td>
						                  	</tr>
    				                </table>
                                    
                               	</td>
                  				<td width="1%" valign="top">&nbsp;</td>
                  				<td width="37%" height="27" align="center" valign="top" >
                                
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="out_menu">
                      					<tr>
                      					<td width="24%" height="25" align="left" id="help_td" >
                                        
                                        	<table width="100%" border="0" cellspacing="0" cellpadding="1">
                          						<tr>
                          							<td width="36%" align="center">
                                                    <img src="/incom/modules/theme/default/images/ques.png" width="10" height="14" />
                                                    </td>
                          							<td width="64%" align="left">
                                                    <a href="/incom/modules/help/" target="_blank" 
                                                    class="small_title_white" onmouseover="help_td.className='out_menu_not_br';" 
                                                    onmouseout="help_td.className='';">Помощь</a>
                                                    </td>
                        						</tr>
                        					</table>
                                      	</td>
                     					
                      <td width="30%" align="left"  id="option_td" ><table width="99%" border="0" cellspacing="0" cellpadding="1">
                          <tr>
                          <td width="36%" align="center"><img src="/incom/modules/theme/default/images/option.png" width="16" height="16" /></td>
                          <td width="64%" align="left"><a onmouseover="option_td.className='over_menu';" 
          onmouseout="option_td.className='';" href="/incom/modules/option/template/" class="small_title_white">Настройки</a></td>
                        </tr>
                        </table></td>
                      <td width="22%" align="center" valign="middle" ><table width="81" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                          <td width="93" height="20" align="center" class="red_menu"><a href="javascript:exit_to()" class="small_title_white"><strong>Выход</strong></a></td>
                        </tr>
                        </table></td>
                    </tr>
                    </table></td>
                </tr>
                </table></td>
            </tr>
            </table></td>
        </tr>
<tr>
          <td bgcolor="#f8f8e8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
              <td height="20">&nbsp;</td>
            </tr>
    <tr>
              <td align="center" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                      <td align="left" class="white_small_text"><a href="javascript:view_all('block')" class="white_small_text">Развернуть</a></td>
                      <td align="left"><a href="javascript:view_all('none')" class="white_small_text">Свернуть</a></td>
                    </tr>
                    </table></td>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
                </tr>
        <tr>
                  <td colspan="3" align="left" valign="top" height="5"></td>
                </tr>
        <tr>
                  <td width="21%" align="left" valign="top"><div id="Accordion1" class="Accordion" >
                      <div class="AccordionPanel">
                      <div class="AccordionPanelTab">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td height="27" align="center" class="over_menu"  id="td_content"><table width="91%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                  <td align="left" class="title_text"><a onmouseover="td_content.className='out_menu';" 
          onmouseout="td_content.className='over_menu';" href="#" class="title_text">Контент</a></td>
                                  <td align="right"><img src="/incom/modules/theme/default/images/str.png" width="5" height="4" /></td>
                                </tr>
                                </table></td>
                            </tr>
                        </table>
                        </div>
                      
                      
                      <div class="AccordionPanelContent" id="panel0">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
$select=$ob->select("i_modules",array("section"=>0,"id_head"=>0),"id_sort");
while($res=mysql_fetch_array($select)){
	$sub=$ob->select("i_modules",array("id_head"=>$res['id'],"section"=>0),"id_sort");
	
	if(mysql_num_rows($sub)>0){
		$link='javascript:open_menu(\'popup_'.$res['id'].'\',\'panel0\')';
	}else{
		$link='/incom/modules/'.$res['folders'].'/';
	}

	if(in_array($res['folders'],$self)){
		$style='style="text-decoration:underline;color:black;"';
	}else{
		$style='';
	}
	
	if(in_array($res['id'],$head)){
		
		echo '<tr>
				<td height="40" align="center" class="dot_background">
					
					<table width="95%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="14%" align="left"><img src="/incom/modules/theme/default/icons/'.$res['icons'].'" /></td>
						<td width="86%" align="left"><a href="'.$link.'" class="left_menu" '.$style.' data-pjax="html">'.$res['name'].'</a></td>
					  </tr>
  					</table>
				</td>
			</tr>';
			
			
		if($res['folders']=="file_manager"){
			$sub=$ob->select("i_template",array("active"=>1),"id");
		}
	
		if(mysql_num_rows($sub)>0){
			$search=$ob->select("i_modules",array("folders"=>@$self['4'],"id_head"=>$res['id']),"");
		
			if(mysql_num_rows($search)>0){
				$view="block";
			}else{
				$view="none";
			}
			
			if($res['folders']=="file_manager"){
				$view="block";
			}
			
			echo '<tr>
					<td  align="center" >
					
						<table width="95%" border="0" cellspacing="0" 
						cellpadding="0" id="popup_'.$res['id'].'" style="DISPLAY:'.$view.'">
				  <tr>
					<td colspan="2" align="center" height="5"></td>
				  </tr>';
				  
			while($sub_res=mysql_fetch_array($sub)){
				if($sub_res['folders']==@$self['4']){$style='style="color:#7dbe0c; text-decoration:underline;"';}else{$style='';}
				if($res['folders']=="file_manager")	{
					
					if($res['folders']=="file_manager"){
						$link='/incom/modules/'.$res['folders'].'/?d_path='.$sub_res['version'].'/';
					}else{
						$link='/incom/modules/'.$res['folders'].'/'.$sub_res['folders'].'/';
					}
		
					echo ' 
					  <tr>
						<td width="12%" align="center"><table width="5" border="0" cellpadding="0" cellspacing="0" bgcolor="#714e2e">
							<tr>
							  <td width="5" height="5"></td>
							</tr>
						</table></td>
						<td width="88%" align="left"><a href="'.$link.'" class="popup_menu" '.$style.' data-pjax="html">'.$sub_res['name'].'</a></td>
					  </tr>
					  <tr align="center">
						<td height="5" colspan="2"></td>
					  </tr>';
				}else{
					
					if(in_array($sub_res['id'],$sub_head))
					{
						if($res['folders']=="file_manager"){$link='/incom/modules/'.$res['folders'].'/?d_path='.$sub_res['version'].'/';}else{$link='/incom/modules/'.$res['folders'].'/'.$sub_res['folders'].'/';}
						echo ' 
					  <tr>
						<td width="12%" align="center"><table width="5" border="0" cellpadding="0" cellspacing="0" bgcolor="#714e2e">
							<tr>
							  <td width="5" height="5"></td>
							</tr>
						</table></td>
						<td width="88%" align="left"><a href="'.$link.'" class="popup_menu" '.$style.' data-pjax="html">'.$sub_res['name'].'</a></td>
					  </tr>
					  <tr align="center">
						<td height="5" colspan="2"></td>
					  </tr>';
					}
				}
			}
			echo '</table></td></tr>';
		
		}
	}
}
?>
                          <tr align="center">
                              <td height="25"></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                      <div class="AccordionPanel" >
                      <div class="AccordionPanelTab" >
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td height="27" align="center" class="over_menu"  id="td_option"><table width="91%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                  <td align="left" class="title_text"><a onmouseover="td_option.className='out_menu';" 
          onmouseout="td_option.className='over_menu';" href="#" class="title_text">Настройки</a></td>
                                  <td align="right"><img src="/incom/modules/theme/default/images/str.png" width="5" height="4" /></td>
                                </tr>
                                </table></td>
                            </tr>
                        </table>
                        </div>
                      <div class="AccordionPanelContent" id="panel1">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <?
					$select=$ob->select("i_modules",array("section"=>1,"id_head"=>0),"id_sort");
                    while($res=mysql_fetch_array($select))
					{
					$sub=$ob->select("i_modules",array("id_head"=>$res['id'],"section"=>1),"id_sort");
					if(mysql_num_rows($sub)>0)
					{$link='javascript:open_menu(\'popup_'.$res['id'].'\',\'panel1\')';}else{$link='/incom/modules/'.$res['folders'].'/';}
					
					if(in_array($res['id'],$head))
					{
					echo '<tr>
                      <td height="40" align="center" class="dot_background"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="14%" align="left"><img src="/incom/modules/theme/default/icons/'.$res['icons'].'" /></td>
                            <td width="86%" align="left"><a href="'.$link.'" class="left_menu" data-pjax="html">'.$res['name'].'</a></td>
                          </tr>
                      </table></td>
                    </tr>';
						if(mysql_num_rows($sub)>0)
						{
						$search=$ob->select("i_modules",array("folders"=>@$self['4'],"id_head"=>$res['id']),"");
							if(mysql_num_rows($search)>0){$view="block";}else{$view="none";}
							
							
						echo '<tr>
  <td  align="center" ><table width="95%" border="0" cellspacing="0" cellpadding="0" id="popup_'.$res['id'].'" style="DISPLAY:'.$view.'">
                          <tr>
                            <td colspan="2" align="center" height="5"></td>
                          </tr>';
							while($sub_res=mysql_fetch_array($sub))
							{
							if($sub_res['folders']==@$self['4']){$style='style="color:#7dbe0c; text-decoration:underline;"';}else{$style='';}
							if(in_array($sub_res['id'],$sub_head))
							{
						echo ' 
                          <tr>
                            <td width="12%" align="center"><table width="5" border="0" cellpadding="0" cellspacing="0" bgcolor="#714e2e">
                                <tr>
                                  <td width="5" height="5"></td>
                                </tr>
                            </table></td>
                            <td width="88%" align="left"><a href="/incom/modules/'.$res['folders'].'/'.$sub_res['folders'].'/" class="popup_menu" '.$style.' data-pjax="html">'.$sub_res['name'].'</a></td>
                          </tr>
                          <tr align="center">
                            <td height="5" colspan="2"></td>
                          </tr>';
							}
							}
							echo '</table></td>
                    </tr>';
						}}
						
					}
                    ?>
                          <tr align="center">
                              <td height="25"></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    </div>
            <?
//вывод основной панели
$select=$ob->select("i_modules",array("folders"=>$self['3']),"");
$res=mysql_fetch_array($select);
if($res['section']!=""){$number=$res['section'];}else{$number=0;}
?>
            <script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1","","<?=$number?>");

//-->
</script></td>
                  <td width="1%" align="left" valign="top">&nbsp;</td>
                  <td width="78%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                          <td height="40" align="center" bgcolor="#ecebcf" style="border: 1px solid #545644;"><table width="97%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                              <td width="6%" align="left"><img src="/incom/modules/theme/default/images/icons_10.jpg" width="20" height="29" /></td>
                              <td width="94%" align="left" class="braun_text">Если у вас возникают вопросы по работе с программным продуктом нашей компании, напишите письмо <a href="mailto:support@site4u.kz" class="braun_text">технической поддержке</a>, или найдите ответ в <a href="http://www.site4u.kz/ru/add_ques.php" target="_blank" class="braun_text">FAQ</a>.<br />
                                  Так же вы можете получить консультацию онлайн, воспользовавшись <a href="https://siteheart.com/webconsultation/66958?byhref=1" target="siteheart_sitewindow_66958" onclick="o=window.open;o('https://siteheart.com/webconsultation/66958', 'siteheart_sitewindow_66958', 'width=550,height=400,top=30,left=30,resizable=yes'); return false;" class="braun_text">онлайн поддержкой</a>.</td>
                            </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
            <tr>
                      <td height="10"></td>
                    </tr>
            <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                          <td align="center" valign="top" bgcolor="#fafaf0" style="border: 1px solid #c4c5a6;" height="350px"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                              <td align="left" class="centercontent" >
