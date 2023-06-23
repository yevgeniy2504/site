<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
if(@$_POST['hidden'])
{
  mysql_query("UPDATE i_subscribes SET `version`='".$_SESSION['version']."', `act`='".(@$_POST['act'] ? 1 : 0)."', `mail_from`='".$_POST['mail_from']."', `name`='".$_POST['name']."', `theme`='".$_POST['theme']."', `message`='".$_POST['full_text']."', `files`='".$_POST['upl_files']."' WHERE `id`='".$_GET['id']."'");
if($_POST['hidden']=='save'){$page="index.php";}else{$page="";}
$ob->go($page);
}

$rassilka = mysql_fetch_object(mysql_query("SELECT * FROM i_subscribes WHERE `id`='".$_GET['id']."' AND `version`='".$_SESSION['version']."' LIMIT 1"));
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />

<script>
function pr(hidden_val)
{
var fr=document.form;
if(fr.name.value=="")
                              {
                                alert("Заполните название рассылки!");
                                return false;
                              }else if(fr.theme.value=="")
                                      {
                                        alert("Заполните тему рассылки!");
                                        return false;
                                      }
fr.hidden.value=hidden_val;
if(uploaded_files)
  {
    for(var i in uploaded_files)
           {
             if(uploaded_files[i].file) fr.upl_files.value+="|"+uploaded_files[i].file;
           }
        fr.upl_files.value+="|";
  }
fr.submit();
}
</script>
<iframe name="hidden_frame" id="hidden_frame" style="display:none; position:absolute;"></iframe>
<form action="<?=$_SERVER['PHP_SELF']?>?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Редактирование рассылки</td>
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
            <td align="center"><table border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td width="41%" align="right" class="small_text">Активна:</td>
                  <td width="59%" align="left"><input name="act" type="checkbox" id="act" <?=($rassilka->act ? "checked" : "")?> /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Отсылать с e-mail:</td>
                  <td align="left"><input name="mail_from" type="text" id="mail_from" value="<?=$rassilka->mail_from?>" size="35" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Название рассылки:</td>
                  <td align="left"><input name="name" type="text" id="name" size="35" value="<?=$rassilka->name?>" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Тема рассылки:</td>
                  <td align="left"><input name="theme" type="text" id="theme" size="35" value="<?=$rassilka->theme?>" /></td>
                </tr>
                <tr>
                  <td align="right" class="small_text">Файлы:</td>
                  <td align="left"><div id="uploaders-container"></div><div id="uploaded-files-container"></div></td>
                </tr>
                <tr>
                  <td align="center" colspan="2"><div><input type="hidden" id="full_text" name="full_text" value="<?=htmlspecialchars($rassilka->message)?>"><input type="hidden" id="FCKeditor1___Config" value=""><iframe id="FCKeditor1___Frame" src="/incom/modules/editor/editor/fckeditor.html?InstanceName=full_text&Toolbar=Default" width="700" height="400" frameborder="no" scrolling="no"></iframe></div></td>
                </tr>
                <?
                                $option=$ob->select("i_option",array("category"=>"user"),"id_sort");
                                while($option_res=mysql_fetch_array($option))
                                {
                                if($option_res['required_fields']==1){$star='<span class="small_red_text">*</span>';}else{$star='';}
                                
                                
                 echo '<tr>
                  <td align="right" class="small_text">'.$star.'&nbsp;'.$option_res['name_ru'].':</td>
                  <td align="left" class="small_text">'.$ob->input_view($option_res['id'],"","","","").'</td>
                </tr>';
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
            <td width="79%" align="left"><input type="button" name="button3" id="button3" value="Отменить" onclick="document.location.href='index.php'" />
            <input type="hidden" name="hidden" id="hidden" />
             <input type="hidden" name="upl_files" id="upl_files" />
            </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
        var template =
            '<div style="margin-top:5px; border:1px dotted #C0C0C0;">'+
            '<table border="0">'+
            '<tr>'+
            '<td><div id="screen_frame_O_O" style="display:none;">'+
            '<iframe name="iframe_O_O" width="100%" height="20" frameborder="0" scrolling="no"></iframe>'+
            '</div></td><td align="right"><button id="closer_O_O" onclick="removeUploader(O_O)" style="display:none;">&nbsp;x&nbsp;</button></td>'+
            '</tr>'+
            '<tr>'+
            '<td align="left" colspan="2">'+
            '<div id="screen_form_O_O">'+
            '<form name="load_form_O_O" enctype="multipart/form-data" method="POST" action="load_file.php" target="iframe_O_O" onsubmit="checkLoad(O_O)">'+
            '<table border="0">'+
            '<tr>'+
            '<td class="small_text">O_O. <input type="file" name="f_file" id="file_O_O" onchange="showCloser(O_O); if( O_O == index-1) createUploader()"></td>'+
            '<td><input type="Submit" value="Прикрепить"></td>'+
            '</tr>'+
            '</table>'+
            '</form>'+
            '</div>'+
            '</td>'+
            '</tr>'+
            '</table>'+
            '</div>';

                var index = 1;
                var uploaded_files = new Array();
                function createUploader() {
                        var div =document.createElement('div');
                        div.innerHTML = template.replace( new RegExp( 'O_O', 'g'), index );
                        div.id = 'sp_' + index;
                        document.getElementById( 'uploaders-container' ).appendChild( div );
                        index ++;
                      }
                            function showCloser( i ) {
                        document.getElementById('closer_'+i).style.display="block";
                }

                function removeUploader( index ) {
                        document.getElementById( 'uploaders-container' ).removeChild( document.getElementById('sp_' + index ) );
                }

        function showFrame( i ){
            document.getElementById( 'screen_form_'+i ).style.display='none';
            document.getElementById( 'screen_frame_'+i ).style.display='block';
                          }

        function checkLoad( i )
                          {
                            if(!document.getElementById('file_'+i).value)
                              {
                                alert('Файл не задан!');
                                return false;
                              }else showFrame( i );
                          }
        function replainFiles()
                             {
                               if(uploaded_files)
                                 {
                                    var div = document.createElement('div');
                                    document.getElementById('uploaded-files-container').innerHTML="";
                                    var str = '<table style="margin-top:30px;" width="100%" border="1" bordercolorlight="#EEEEEE" bordercolordark="#C0C0C0" cellspacing="0" cellpadding="3"><tbody><tr class="small_text" align="center" style="color:#572a00; background-color:#ecebcf;"><td style="border:1px solid #545644;" width="50%">Файл</td><td style="border:1px solid #545644;" width="25%">Размер</td><td style="border:1px solid #545644;" width="25%">Действие</td></tr>';
                                    var check = 0;
                                                                        for(var i in uploaded_files)
                                       {
                                         if(uploaded_files[i].file) check++; 
                                                                                 str+='<tr class="small_text" align="center"><td>'+uploaded_files[i].file+'</td><td>'+(uploaded_files[i].size/1024).toFixed(2)+' KB </td><td><a href="javascript:void(0);" onClick="if(confirm(\'Вы уверены что хотите удалить этот файл?\')) deleteUploadedFile('+(i)+');"><img src="/incom/modules/theme/default/images/b_drop.png" border="0"></a></td></tr>';
                                       }
                                    str += '</tbody></table>';
                                    if(check) document.getElementById('uploaded-files-container').innerHTML=str;
                                                                          else document.getElementById('uploaded-files-container').innerHTML='';
                                 }else{
                                   document.getElementById('uploaded-files-container').innerHTML = '';
                                 }
                                return true;
                             }
            function deleteUploadedFile(i)
                                       {
                                         if(uploaded_files[i])
                                           {
                                             document.getElementById('hidden_frame').src="delete_file.php?file="+uploaded_files[i].file+"&f_id="+i;
                                           }else alert("Элемента не существует.");
                                       }
        createUploader();
<?
$files_arr = explode("|", $rassilka->files);
if($files_arr)
  {
foreach($files_arr as $f)
       {
             if($f && file_exists($_SERVER['DOCUMENT_ROOT']."/upload/subscribe/".$f)) echo "uploaded_files.push({file: '".$f."', size:'".filesize($_SERVER['DOCUMENT_ROOT']."/upload/subscribe/".$f)."'});\n";
           }
        echo "replainFiles();";
  }
?>
</script>
<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
