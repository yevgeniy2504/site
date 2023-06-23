<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
$ob->update("i_shop_option",array("version"=>$_SESSION['version'],"mail"=>$_POST['mail'],"title_reg"=>$_POST['title_reg'],"text_reg"=>$_POST['text_reg'],"title_order"=>$_POST['title_order'],"text_order"=>$_POST['text_order'],"delivery"=>$_POST['delivery'],"paid"=>$_POST['paid']),1,"");
}
$select=$ob->select("i_shop_option",array("id"=>1,"version"=>$_SESSION['version']),"");
$res=mysql_fetch_array($select);
?>
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
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Настройка интернет магазина</td>
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
            <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" class="small_text"><strong>Основные настройки</strong></td>
                  <td align="left" class="small_text">&nbsp;</td>
                </tr>
                <tr>
                  <td width="41%" align="right" class="small_text">E-mail для получения заказов:</td>
                  <td width="59%" align="left" class="small_text"><input name="mail" type="text" id="mail" value="<?=$res['mail']?>" size="20" /></td>
                </tr>
                <tr>
                  <td align="left" class="small_text"><strong>Письма</strong></td>
                  <td align="left" class="small_text">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Заголовок письма покупателю о регистрации:</td>
                  <td align="left" class="small_text"><input name="title_reg" type="text" id="title_reg" value="<?=$res['title_reg']?>" size="40" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Текст письма покупателю о регистрации:</td>
                  <td align="left" class="small_text"><textarea name="text_reg" id="text_reg" cols="45" rows="5"><?=$res['text_reg']?></textarea></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Заголовок письма покупателю о заказе:</td>
                  <td align="left" class="small_text"><input name="title_order" type="text" id="title_order" value="<?=$res['title_order']?>" size="40" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Текст письма покупателю о заказе:</td>
                  <td align="left" class="small_text"><textarea name="text_order" id="text_order" cols="45" rows="5"><?=$res['text_order']?></textarea></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><strong>Способы доставки:</strong></td>
                  <td align="left" class="small_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><textarea name="delivery" id="delivery" cols="45" rows="5"><?=$res['delivery']?></textarea></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td><span class="small_text">(каждый элемент добавляется с новой строки &quot;с помощью клавиши <img src="/incom/modules/theme/default/images/enter.jpg" width="49" height="20" align="absmiddle" />&quot;)</span></td>
                    </tr>
                  </table></td>
                </tr>
                
                <tr>
                  <td align="right" class="small_text"><strong>Способы оплаты:</strong></td>
                  <td align="left" class="small_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><textarea name="paid" id="paid" cols="45" rows="5"><?=$res['paid']?></textarea></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td><span class="small_text">(каждый элемент добавляется с новой строки &quot;с помощью клавиши <img src="/incom/modules/theme/default/images/enter.jpg" width="49" height="20" align="absmiddle" />&quot;)</span></td>
                    </tr>
                  </table></td>
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
            <td width="11%" align="left"><input type="button" name="button2" id="button2" value="Применить"  onclick="pr('apply')" /></td>
            <td width="79%" align="left"><input type="button" name="button3" id="button3" value="Отменить" onclick="document.location.href='index.php'" />
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
