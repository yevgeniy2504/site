<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
if ($ob->check_admin())
{
$_GET["id_section"]=$_GET["id"];

$_SESSION["version"]=$_GET["lang"];

?>
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

<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
<script>
function pr(hidden_val)
{
	fr=document.form;
	fr.hidden.value=hidden_val;
	fr.submit();
}
</script>

<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   
    <tr>
      <td align="center" bgcolor="#f9f8e8" style="border: 1px solid #c4c5a6;"><table width="97%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="4">
				<?
				$params=$ob->search_params(@$_GET['module'],"",@$_GET['id_section'],array("version"=>$_SESSION["version"]));
				
				if (mysql_num_rows($params)>0)
				{
					while($params_res=mysql_fetch_array($params))
					{
						echo '<tr>
							<td align="right" class="small_text" width="200">'.$params_res['name'].':</td>
							<td align="left" class="small_text">'.$ob->input_params($params_res['id'],"","","","").'</td>
							</tr>';	
					}
				}
				
				?>
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
            <td width="10%" align="left"><input type="button" name="button" id="button" value="Сохранить" onclick="pr('save')" /></td>
            </tr>
            </table>
            <input type="hidden" name="hidden" id="hidden" /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
  </table>
</form>
<script>
$(window).load(function(){
	
	window.parent.get_frame_height($(document).height());
		
})
<?
if ($_POST["hidden"]=='save')
{
	echo'window.parent.location.reload();';
}

?>
</script>
<?
}
?>