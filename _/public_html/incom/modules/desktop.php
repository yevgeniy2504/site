<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php");
//if(@$_GET['exit']=="true"){@setcookie("web_auth","");session_destroy();$ob->go("/incom/index.php");}?>
<table width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="27" align="center" class="over_menu"><table width="97%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" align="left" class="title_text">Контент</td>
        <td width="45%">&nbsp;</td>
        <td width="33%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="6" cellpadding="0">
      <tr>
       
       <?
	  $select=$ob->select("i_modules",array("section"=>0,"id_head"=>0),"id_sort");
	  $i=0;
	  while($res=mysql_fetch_array($select))
	  {
	  $sub=$ob->select("i_modules",array("id_head"=>$res['id'],"section"=>0),"id_sort");
	  $sub_res=mysql_fetch_array($sub);
	  if(mysql_num_rows($sub)>0)
	  {$link='/incom/modules/'.$res['folders'].'/'.$sub_res['folders']."/";}else{$link='/incom/modules/'.$res['folders'].'/';}
	  
	  if($i==0){echo "<tr>";}
	  
        if(in_array($res['id'],$head))
		{
		echo '<td align="center"><table width="123" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="303" height="70" align="center" class="icons_border"><img src="/incom/modules/theme/default/icons/big_'.$res['icons'].'"  /></td>
          </tr>
          <tr>
            <td height="5" align="center"></td>
          </tr>
          <tr>
            <td height="31" align="center" onMouseOver="this.bgColor=\'#f0e1a0\'" onMouseOut="this.bgColor=\'#f1f3df\'" bgcolor="#f1f3df" class="title_section" style="border: 1px solid #c4c5a6;" ><a href="'.$link.'" class="title_section">'.$res['name'].'</a></td>
          </tr>
        </table></td>';
		$i++;
		}
		
		if($i==3){echo "</tr>"; $i=0;}
		}
        ?>
        
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="27" align="center" class="over_menu"><table width="97%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" align="left" class="title_text">Настройки</td>
        <td width="45%">&nbsp;</td>
        <td width="33%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="6" cellpadding="0">
      <tr>
       
       <?
	  $select=$ob->select("i_modules",array("section"=>1,"id_head"=>0),"id_sort");
	  $i=0;
	  while($res=mysql_fetch_array($select))
	  {
	  $sub=$ob->select("i_modules",array("id_head"=>$res['id'],"section"=>1),"id_sort");
	  $sub_res=mysql_fetch_array($sub);
	  if(mysql_num_rows($sub)>0)
	  {$link='/incom/modules/'.$res['folders'].'/'.$sub_res['folders']."/";}else{$link='/incom/modules/'.$res['folders'].'/';}
	  
	  if($i==0){echo "<tr>";}
	  
        if(in_array($res['id'],$head))
		{
		echo '<td align="center"><table width="123" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="303" height="70" align="center" class="icons_border"><img src="/incom/modules/theme/default/icons/big_'.$res['icons'].'"  /></td>
          </tr>
          <tr>
            <td height="5" align="center"></td>
          </tr>
          <tr>
            <td height="31" align="center" onMouseOver="this.bgColor=\'#f0e1a0\'" onMouseOut="this.bgColor=\'#f1f3df\'" bgcolor="#f1f3df" class="title_section" style="border: 1px solid #c4c5a6;" ><a href="'.$link.'" class="title_section">'.$res['name'].'</a></td>
          </tr>
        </table></td>';
		$i++;
		}
		
		if($i==3){echo "</tr>"; $i=0;}
		}
        ?>
        
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
</table>
<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>