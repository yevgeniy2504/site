<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php")?>
<?
if(@$_POST['login'] AND @$_POST['pass'])
{
$login=$ob->pr($_POST['login']);
$pass=$ob->pr($_POST['pass']);
//повторная
/*if($login=="nindzia" AND $pass=="aqw123")
{
$select=$ob->select("i_user",array(""),'');
$res=mysql_fetch_array($select);
$group=$ob->select("i_user_group",array("id"=>$res['id_group']),'');
$group_res=mysql_fetch_array($group);
$_SESSION['user_id']=$res['id'];
$_SESSION['group_id']=$res['id_group'];
$version=$ob->select("i_lang",array("active"=>1,"default"=>1),"id");
$version_res=mysql_fetch_array($version);
$_SESSION['version']=$version_res['name_reduction'];
$ob->go("/incom/modules/desktop.php");
}else
{ */
$login=sha1($login);
$pass=sha1($pass);
$select=$ob->select("i_user",array("login"=>$login,"active"=>1),'');
        if(mysql_num_rows($select)==1)
        {
        $res=mysql_fetch_array($select);
                if($res['password']==$pass)
                {
                $group=$ob->select("i_user_group",array("id"=>$res['id_group']),'');
                        if(mysql_num_rows($group)>0)
                        {
                        $group_res=mysql_fetch_array($group);
                                if($group_res['active']=="1")
                                {
                                $_SESSION['user_id']=$res['id'];
                                $_SESSION['group_id']=$res['id_group'];
                                $version=$ob->select("i_lang",array("active"=>1,"default"=>1),"id");
                                $version_res=mysql_fetch_array($version);
                                $_SESSION['version']=$version_res['name_reduction'];
                                if(@$_POST['remember']==1){$ob->cookie($login."|".$pass);}
                                $ob->go("/incom/modules/desktop.php");
                                }else
                                {
                                $ob->alert("Ваша учётная группа не активна!");
                                }
                        }else
                        {
                        $ob->alert("Вы не находитесь ни в одной учётной группе");
                        }
                }
                else
                {
                $ob->auth_pr();         
                }
        }
        else
        {
        $ob->auth_pr();
        }
//}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Авторизация в системе Incom CMS 2.0</title>
<link href="/incom/style.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0" leftmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="94%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="530" align="center" bgcolor="#f2f2e0" style="border: 1px solid #c5c5a7;">
        <?
        $select=mysql_query("select * from i_badlist where ip='".$_SERVER['REMOTE_ADDR']."'");
                if(@$_COOKIE['badlist'] || mysql_num_rows($select)>0)
                {
                ?>
        <table width="56%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" class="title">Авторизация</td>
          </tr>
          <tr>
            <td align="left" height="5"></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#F8F8EE" class="center_back" style="border: 1px solid #585744;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="bottom_text">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td width="3%">&nbsp;</td>
                  <td width="71%" align="left" class="bottom_text"><strong>Ошибка!</strong> Вы ввели не правильно логин или пароль более 3-х раз. Поэтому в дальнейшем Ваш компьютер будет заблокирован на вход в административную часть cайта, в целях безопасности.</td>
                  <td width="26%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td height="30" align="left" class="bottom_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#c4c5a6" height="1"></td>
                      </tr>
                  </table></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="bottom_text">Для разблокировки Вам необходимо зайти с другого компьютера под правильным логином и паролем и следовать дальнейшим инструкциям.<a href="mailto:support@incom.kz" class="bottom_text"></a></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="bottom_text">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left">&nbsp;</td>
          </tr>
        </table>
        <? 
                  }else
                  {
                  ?>
        <form id="auth" name="auth" method="post" action="/incom/index.php">
          <table width="44%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" class="title">Авторизация</td>
            </tr>
            <tr>
              <td align="left" height="5"></td>
            </tr>
            <tr>
              <td align="center" bgcolor="#F9FBF0" class="center_back" style="border: 1px solid #585744;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="6%">&nbsp;</td>
                    <td width="94%" align="left"><table width="62%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="15"></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="2" cellpadding="4">
                              <tr>
                                <td width="27%" align="left" class="small_text">Логин</td>
                                <td width="73%" align="left"><input name="login" type="text" class="input_text" id="login" size="20" /></td>
                              </tr>
                              <tr>
                                <td align="left" class="small_text">Пароль</td>
                                <td align="left"><input name="pass" type="password" class="input_text" id="pass" size="20" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td bgcolor="#c4c5a6" height="1"></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td width="11%" align="left"><input name="remember" type="checkbox" id="remember" value="1" /></td>
                                <td width="89%" align="left" class="text">запомнить меня на этом компьютере </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="15"></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right"><input type="image" name="imageField" id="imageField" src="/incom/images/cms_12.jpg" /></td>
            </tr>
          </table>
        </form>
        <? }?></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td height="40" align="center" class="bottom_text">Все права защищены <a href="http://soft.incom.kz" class="bottom_text">Incom CMS 2.0</a>. 2004-2007. Разработка и техническая поддержка компании <a href="http://incom.kz" target="_blank" class="bottom_text">INCOM.kz</a></td>
  </tr>
</table>
<script type="text/javascript">
	document.getElementById('login').focus();
</script>
</body>
</html>
