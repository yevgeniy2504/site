<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="index.php?id_section=".@$_GET['id_section']."&module=".@$_GET['module'];}else{$page="";}

$ob->go($page);
}

?>
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
      <td height="35" class="title_text">Парамметры модуля</td>
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
				<?
				$params=$ob->search_params($_GET['module'],"",@$_GET['id_section'],array("version"=>$_SESSION["version"]));
				
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
            <td width="11%" align="left"><input type="button" name="button2" id="button2" value="Применить"  onclick="pr('apply')" /></td>
            <td width="79%" align="left"><input type="reset" name="button3" id="button3" value="Отменить" />
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
