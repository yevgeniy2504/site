<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
if($_POST['hidden']=='save'){$page="elements.php".$ob->gets_go($_GET,"","");}else{$page="";}
	
	if(!empty($_FILES['file']['tmp_name']))
	{
	$upload=move_uploaded_file($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/incom/tmp/".date("d.m.Y").".csv");
	$file=fopen($_SERVER['DOCUMENT_ROOT']."/incom/tmp/".date("d.m.Y").".csv","r");
		while ($data=fgets($file,100000))
		{
			$data = explode(";", $data);
			$option=$ob->search_option($_GET['module'],$_GET['sub_module'],$_GET['id_section'],array(""));
			$i=0;
			while($option_res=mysql_fetch_array($option))
			{
				if($i==0)
				{
				mysql_query("INSERT INTO i_".$ob->pr($_GET['module'])." (id_section,version,".$option_res['name_en'].") VALUES ('".@$_GET['id_section']."','".$_SESSION['version']."','".$ob->encode($data[''.$_POST['number'.$option_res['id'].'']])."')");
				$i++;
				}else
				{
				$max=mysql_query("select MAX(id) from i_".$ob->pr($_GET['module'])."");
				$max_res=mysql_fetch_array($max);
				$ob->update("i_".$_GET['module'],array($option_res['name_en']=>$ob->encode($data[''.$_POST['number'.$option_res['id'].'']])),$max_res['MAX(id)'],"");
				}
			}
		}
		$ob->alert("Загружено строк - ".$i);
	}else{$ob->alert("Необходимо выбрать экспортируемый файл!");}
}
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />

<script>
function pr(hidden_val)
{
var msg;
var fr;
msg='';
fr=document.form;

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
<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Информ. блоки</td>
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
                  <td colspan="2" align="left" class="small_text">Необходимо сопоставить столбцы загружаемого *.csv файла (с разделяющими запятыми), путём указания номера столбца =&gt; наименованию столбца в базе сайта. <br><br><span class="small_red_text">* номер начинается с нуля</span></td>
                </tr>
               <?
			   $option=$ob->search_option($_GET['module'],$_GET['sub_module'],$_GET['id_section'],array(""));
				$i=0;
				while($option_res=mysql_fetch_array($option))
				{
                echo '<tr>
                  <td align="right" class="small_text">'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text"><input name="number'.$option_res['id'].'" type="text" id="number'.$option_res['id'].'" size="10" value="'.$i++.'"></td>
                </tr>';
				}
                ?>
				<tr>
                  <td align="right" class="small_text"><span class="small_red_text">*</span> Файл для загрузки:</td>
                  <td align="left" class="small_text"><input type="file" name="file" id="file"></td>
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
