<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
//if(@$_COOKIE["web_auth"]) $ob->pr_cookie();

 if (@$_SESSION['user_id'] AND @$_SESSION['group_id'])
{
	//$ob->alert($_SESSION['user_id']);
$users=$ob->select("i_user",array("id"=>$_SESSION['user_id']),"");
$users_res=mysql_fetch_array($users);
$group=$ob->select("i_user_group",array("id"=>$users_res['id_group']),"");
$group_res=mysql_fetch_array($group);
$self=explode("/",$_SERVER['PHP_SELF']);
////////////////////////////////////////////////
$mas=explode("|",$group_res['privileges']);
$head=array();
$head_name=array();
$sub_head=array();
$sub_head_name=array();
	foreach($mas as $k=>$v)
	{
	$namef=$ob->select("i_modules",array("id"=>$v),"");
	$namef_res=mysql_fetch_array($namef);
	$res_v=explode("=",$v);
	array_push($head,$res_v['0']);
	array_push($head_name,$namef_res['folders']);
		if(@$res_v['1']!="")
		{
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
	
?>
<style type="text/css">
html{ margin:0px; padding:0px;}
</style>
<script src="/incom/modules/theme/default/jquery-1.4.2.min.js" type="text/javascript"></script>
<div id="opaco" class="hidden"></div>
<div id="window" style="display:none;">
	<div id="windowTop">
		<div id="windowTopContent"></div>
		<img src="/incom/images/window_close.jpg" id="windowClose" />
	</div>
	<div id="windowBottom"><div id="windowBottomContent">&nbsp;</div></div>
	<div id="windowContent"></div>
</div>
<div id="opaco1" class="hidden"></div>
<div id="window1">
<div id="windowContent1"></div>
</div>
<div style="background:url(/incom/modules/theme/default/images/head.jpg) repeat-x left top; height:85px; border-bottom:1px solid #ccc; position:relative" id="full_admin">
	<div style="height:30px; margin:0px; padding:0px;">
		<div style="float:left; border:0px solid #000; width:50px; height:29px; vertical-align:middle; position:relative; display:inline-block">
			<a style="cursor:pointer; margin:0px; padding:0px; text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding-left:15px; font-weight:bold; display:block; vertical-align:middle;text-transform:none; padding-top:5px; color:#222;" id="menu_admin">Меню</a>
			<div style="position:absolute; left:15px; top:100%; width:150px; padding:0px 3px 10px 4px; border:1px solid  #CCCC99; background:url(/incom/modules/theme/default/icons/cms.png) repeat-y left top #F8F8E8; display:none; z-index:1000" id="menu_admin_block">
  				<? 
				$select=$ob->select("i_modules",array("id_head"=>0,"section"=>0),"id_sort");
				while($res=mysql_fetch_array($select)){
				  $popup=$ob->select("i_modules",array("id_head"=>$res['id']),"id_sort");
				  if(mysql_num_rows($popup)>0){$link='#';}else{$link='/incom/modules/'.$res['folders'].'/';}
				  if(in_array($res['id'],$head)){echo '<a href="'.$link.'" style=" font-size:13px; font-family:Arial; background:url(/incom/modules/theme/default/icons/'.$res['icons'].') no-repeat left 5px; padding:5px; padding-left:35px; display:block; color:#333; text-decoration:none; border-bottom:0px dashed #ccc; text-align:left; line-height:15px; ">'.$res['name'].'</a>';}	
	             			}
				$path=$_SERVER['PHP_SELF'];
				$path1=explode("/",$path);
				$file_name=$path1[sizeof($path1)-1];
				$path1[sizeof($path1)-1]='';
				$path=implode("/",$path1);
				//$ob->alert($path);
				
$file=fopen($_SERVER['DOCUMENT_ROOT']."/".$_SERVER['PHP_SELF'],"r");
$string=@fread($file,filesize($_SERVER['DOCUMENT_ROOT']."/".$_SERVER['PHP_SELF']));
preg_match_all('/### info ###(.+?)### end_info ###/sm', $string, $info);
//echo $info['1']['0'];
preg_match_all('/#name(.+?)#end_name/sm', $info['1']['0'], $info_name);
preg_match_all('/#edit(.+?)#end_edit/sm', $info['1']['0'], $info_edit);
preg_match_all('/#block(.+?)#end_block/sm', $info['1']['0'], $info_id);
preg_match_all('/#elem(.+?)#end_elem/sm', $info['1']['0'], $info_elem);

$info_idd=intval(trim($info_id['1']['0']));
if ($info_elem['1']['0']==' false ')
{
$ll=' <div style="display:block; padding:0px; float:left; border-right:1px dashed #ccc; margin-left:0px; height:30px; margin:15px 10px 10px 20px; padding:0px;">
     </div>
      <div style="display:block; padding:0px; float:left; padding:5px;">
    <a style="padding-top:5px; font-style:normal; text-decoration:none; width:270px;cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:120px;">
    <table border="0"><tr><td><img src="/incom/images/category.png" border="0" id="new_file_admin" style="vertical-align:middle"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; color:#333; font-size:11px; display:block; width:100px; vertical-align:middle;text-transform:none " onclick="edit_block(\''.$info_idd.'\',false);"> Редактировать '.$info_name['1']['0'].'</td></tr></table></a>
    </div>';	
}
else
{
if ($info_elem['1']['0']==' true ')
{
$ll=' <div style="display:block; padding:0px; float:left; border-right:1px dashed #ccc; margin-left:0px; height:30px; margin:15px 10px 10px 20px; padding:0px;">
     </div>
      <div style="display:block; padding:0px; float:left; padding:5px;">
    <a style="padding-top:5px; font-style:normal; text-decoration:none; width:270px;cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:120px;">
    <table><tr><td><img src="/incom/images/category.png" border="0" id="new_file_admin" style="margin:0px; padding:0px;vertical-align:middle"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; color:#333; font-size:11px; display:block; width:100px; vertical-align:middle;text-transform:none " onclick="edit_block(\''.$info_idd.'\',true);"> Редактировать '.$info_name['1']['0'].'</td></tr></table></a>
    </div>';		
}
else
{
$ll='';	
}
}

if (isset($_GET['id'])&&(intval($_GET['id'])!=''))
{
	$s=mysql_query("select * from i_block_elements where id='".intval($_GET["id"])."'");
	if ($s)
	{
		$r=mysql_fetch_array($s);
$ll1=' <div style="display:block; padding:0px; float:left; border-right:1px dashed #ccc; margin-left:0px; height:30px; margin:15px 10px 10px 20px; padding:0px;">
     </div>
      <div style="display:block; padding:0px; float:left; padding:5px;">
    <a style="padding-top:5px; font-style:normal; text-decoration:none; width:270px;cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:120px;">
    <table><tr><td><img src="/incom/images/edit_elem.png" border="0" id="new_file_admin" style="margin:0px; padding:0px;vertical-align:middle"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#333; display:block; width:100px; vertical-align:middle; text-transform:none" onclick="edit_elem(\''.intval($_GET['id']).'\',\''.$r["id_section"].'\');"> Редактировать элемент</td></tr></table></a>
    </div>';	
	}
}
else
{
$ll1='';	
}

				?>
			</div>
    	  </div>
          <!--<div style="display:inline-block; margin-left:30px;">
             <a style="cursor:pointer; margin:0px; padding:0px; text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding-left:15px; font-weight:bold; display:block; vertical-align:middle; padding-top:5px;" id="site_admin">Сайт</a>

          </div>-->
          <div style="display:inline-block; margin-left:30px; float:left">
             <a onclick="location.href='/incom/modules/desktop.php'" style="cursor:pointer; margin:0px; padding:0px; text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding-left:15px; font-weight:bold; display:block; vertical-align:middle; padding-top:5px; float:left; color:#222; text-transform:none" id="admin_admin">Администрирование</a>

          </div>
       </div>
	<div style=" margin:0px; padding:0px;" id="but_admin">
    <div style="display:block; float:left; border:0px solid #000; padding:5px;">
    <a style="cursor:pointer; font-style:normal; text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:100px;">
    <table><tr><td><img src="/incom/modules/theme/default/icons/new_file.png" border="0" id="new_file_admin" style="margin:0px; padding:0px;vertical-align:middle"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:70px; vertical-align:middle; padding-top:5px; color:#333; text-transform:none" onclick="new_file('<?=$path?>','html');"> Создать новый файл</td></tr></table></a>
    </div>
    <div style="display:block; padding:0px; float:left ; padding:5px;">
    <a style="padding-top:5px; width:250px;cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-style:normal; text-decoration:none; font-size:11px; display:block; width:120px;">
    <table><tr><td><img src="/incom/modules/theme/default/icons/new_folder.png" border="0" id="new_file_admin" style="margin:0px; padding:0px;vertical-align:middle"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:75px; vertical-align:middle; color:#333; text-transform:none " onclick="new_folder('<?=$path?>');"> Создать новый раздел</td></tr></table></a>
    </div>
     <div style="display:block; padding:0px; border-right:1px dashed #ccc; float:left; margin-left:0px; height:30px; margin:15px 10px 10px 10px; padding:0px;">
     </div>
      <div style="display:block; padding:0px; float:left; padding:5px;">
    <a style="padding-top:5px; font-style:normal; text-decoration:none; width:250px;cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:100px;">
    <table><tr><td><img src="/incom/modules/theme/default/icons/edit_file.png" border="0" id="new_file_admin" style="margin:0px; padding:0px;vertical-align:middle"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:75px; vertical-align:middle;color:#333; text-transform:none " onclick="edit_file('<?=$path?>','html','<?=$file_name?>');"> Редактировать файл</td></tr></table></a>
    </div>
     <div style="display:block; padding:0px; float:left; border-right:1px dashed #ccc; margin-left:0px; height:30px; margin:15px 10px 10px 20px; padding:0px;">
     </div>
      <div style="display:block; padding:0px; float:left; padding:5px;">
    <a style="padding-top:5px; font-style:normal; text-decoration:none; width:250px;cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:100px;">
    <table><tr><td><img src="/incom/modules/theme/default/icons/menu.png" border="0" id="new_file_admin" style="vertical-align:middle; margin:0px; padding:0px;"></td><td style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px; display:block; width:75px; vertical-align:middle; color:#333; text-transform:none" onclick="new_menu('toop');"> Редактировать меню</td></tr></table></a>
    </div>
    <?=$ll;?>
    <?=$ll1;?>
	</div>
    <div style="position:absolute; right:0px; bottom:0px;">
    <a id="hide_full_admin" rel="0" style="cursor:pointer; font-style:normal; text-decoration:none; display:block; font-size:11px; font-family:Arial, Helvetica, sans-serif; color:#666666; padding:8px; font-weight:bold; line-height:normal">Свернуть <span style=" width:5px; height:5px; display:inline-block; "></span></a>
    </div>
</div>
<div id="test" style="clear:left"></div>

<script type="text/javascript">
$(document).ready(function(){

$('#menu_admin').mouseenter(function(){
$('#menu_admin_block').slideDown('fast');
});

$('#menu_admin_block').mouseleave(function(){
$('#menu_admin_block').slideUp('fast');
});

$('#hide_full_admin').click(function(){
if ($(this).attr("rel")==0)
{
$('#full_admin').animate({
        height: "28px"}, 500);
$(this).html("Развернуть <span style=\" width:5px; height:5px; display:inline-block\"></span>");
$(this).attr("rel","1");
$('#but_admin').hide();
}
else
{
$('#full_admin').animate({
        height: "85px"}, 500);
$(this).html("Свернуть <span style=\" width:5px; height:5px; display:inline-block\"></span>");
$(this).attr("rel","0");
$('#but_admin').show();
}

});


});
</script>
<style type="text/css" media="all" >

#window
{
z-index:2000;
display: none;
position: absolute !important;
left:0%;
top:0%;
border:2px solid #C3D825;
background:#FAFAFA;
}
#window1
{
z-index:2300;
display: none;
position: absolute !important;
left:0%;
top:0%;
border:2px solid #C3D825;
background:#FAFAFA;
}
#windowTop
{
	height: 27px;
	overflow: 30px;
	background-image: url(/incom/images/cms_03.gif);
	background-position: left top;
	background-repeat: repeat-x;
	position: relative;
	overflow: hidden;
	}
#windowTopContent
{
	margin-right: 13px;
	background-image:url(/incom/images/cms_03.gif);
	background-position:left top;
	background-repeat: repeat-x;
	overflow: hidden;
	height: 27px;
	line-height: 30px;
	text-indent: 10px;
	font-family:Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
	color: #444;
}
#windowMin
{
	position: absolute;
	right: 25px;
	top: 10px;
	cursor: pointer;
}
#windowMax
{
	position: absolute;
	right: 25px;
	top: 10px;
	cursor: pointer;
	display: none;
}
#windowClose
{
	position: absolute;
	right: 10px;
	top: 10px;
	cursor: pointer;
}
#windowBottom
{
	position: relative;
	}
#windowBottomContent
{
	position: relative;
	
}
#windowResize
{
	position: absolute;
	right: 3px;
	bottom: 5px;
	cursor: se-resize;
}
#windowContent
{
	position:absolute;
	top: 27px;
	left: 0px;
	margin-right: 0px;
	border: 0px solid #ccc;
	font-family:Arial, Helvetica, sans-serif;
	font-size: 12px;
	
	
}
#windowContent1
{
	position:absolute;
	top: 0px;
	left: 0px;
	margin-right: 0px;
	border: 0px solid #ccc;
	font-family:Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding:10px;
	
	
}
#windowContent 
{
	margin: 10px;
}
.transferer2
{
border: 1px solid #6BAF04;
background-color: #B4F155;
	filter:alpha(opacity=20); 
	-moz-opacity: 0.3; 
	opacity: 0.3;
}
.hidden{
	display:none;	
}
#opaco {
     background-color: #aaa;
     left: 0;
     -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";/* IE8 */
     filter:progid:DXImageTransform.Microsoft.Alpha(opacity = 70); /* IE5+ */
     filter: alpha(opacity=70);/* IE4- */
     moz-opacity: 0; /* Mozilla */
     -khtml-opacity: 0; /* Safari */
     opacity: 0;  /* general CSS3 */
     position: absolute;
     top: 0;
     width: 100%;
     z-index: 1900;
   }
   
   #opaco1 {
     background-color: #aaa;
     left: 0;
     -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";/* IE8 */
     filter:progid:DXImageTransform.Microsoft.Alpha(opacity = 70); /* IE5+ */
     filter: alpha(opacity=70);/* IE4- */
     moz-opacity: 0; /* Mozilla */
     -khtml-opacity: 0; /* Safari */
     opacity: 0;  /* general CSS3 */
     position: absolute;
     top: 0;
     width: 100%;
     z-index: 2250;
   }
</style>
<script type="text/javascript">
function edit_elem(id,id_s)
{
	window.open('/incom/modules/inf_block/edit_elements.php?id='+id+'&module=block_elements&sub_module=block&id_section='+id_s+'');	
}
function edit_block(id, edit)
{
if (edit==false)
{
window.open('/incom/modules/inf_block/index.php?id_section='+id+'&module=block');	
}
if (edit==true)
{
window.open('/incom/modules/inf_block/elements.php?module=block_elements&sub_module=block&id_section='+id+'');	
}
	
}
$(document).ready(function(){
   //align element in the middle of the screen
  $.fn.alignCenter = function() {
   //get margin left
   var marginLeft = Math.max(40, parseInt($(window).width()/2 - $(this).width()/2)) + 'px';
   //get margin top
   var marginTop = Math.max(40, parseInt($(window).height()/2 - $(this).height()/2)) + 'px';
   //return updated element
   return $(this).css({'margin-left':marginLeft, 'margin-top':marginTop});
  };
});

function show_w() {
if($('#window').css('display') == 'none') {
$('#window').css({"left":"0","top":"0","margin-left":"0","margin-top":"0"});
	$('#window').alignCenter();
	$('#window').show();
	if($.browser.msie){
		$('#opaco').height($(document).height()).toggleClass('hidden');
	}
   	else{
     	$('#opaco').height($(document).height()).toggleClass('hidden').fadeTo('slow', 0.7);
   	}
}
//this.blur();
return false;
};

function show_w1() {
if($('#window1').css('display') == 'none') {
$('#window1').css({"left":"0","top":"0","margin-left":"0","margin-top":"0"});
	$('#window1').alignCenter();
	$('#window1').show();
	if($.browser.msie){
		$('#opaco1').height($(document).height()).toggleClass('hidden');
	}
   	else{
     	$('#opaco1').height($(document).height()).toggleClass('hidden').fadeTo('slow', 0.7);
   	}
}
//this.blur();
return false;
};

$(document).ready(function(){

		$('#windowClose').bind(
			'click',
			function()
			{
				$('#window').hide();
				$('#opaco').toggleClass('hidden').removeAttr('style');
			}
		);
		
}
);

function new_folder(path)
{
//alert(path);
$.ajax({
	url: "/incom/modules/file_manager/new_folders.php",
	data: "do=new_folder&d_path="+path+"&x=secure",
	type: "POST",
	dataType : "html",
	cache: false,
	success:  function(data)  { $("#windowTopContent").html("Новая папка");$("#windowContent").html(data); $('#window').css({"width":"450px","height":"170px"}); show_w();   },
	error: function(){ alert("Ошибка создания папки.");  }
});
}

function new_menu(name)
{
//alert(path);
$.ajax({
	url: "/incom/modules/file_manager/menu1.php",
	data: "do=new_menu&menu="+name+"&x=secure",
	type: "POST",
	dataType : "html",
	cache: false,
	success:  function(data)  { $("#windowTopContent").html("Редактировать меню");$("#windowContent").html(data); $('#window').css({"width":"350px","height":"120px"}); show_w();   },
	error: function(){ alert("Ошибка редактирования меню.");  }
});
}


function new_file(path,format)
{
//alert(path);
$.ajax({
	url: "/incom/modules/file_manager/new_page.php",
	data: "do=new_page&d_path="+path+"&format="+format+"&x=secure",
	type: "POST",
	dataType : "html",
	cache: false,
	success:  function(data)  { $("#windowTopContent").html("Новый файл");$("#windowContent").html(data); $('#window').css({"width":"700px","height":"570px"}); show_w();   },
	error: function(){ alert("Ошибка создание файла.");  }
});
}

function edit_file(path,format,name)
{
//alert(path);
$.ajax({
	url: "/incom/modules/file_manager/edit_page.php",
	data: "do=edit_page&d_path="+path+"&format="+format+"&name="+name+"&x=secure",
	type: "POST",
	dataType : "html",
	cache: false,
	success:  function(data)  { $("#windowTopContent").html("Редактирование файла");$("#windowContent").html(data); $('#window').css({"width":"700px","height":"570px"}); show_w();   },
	error: function(){ alert("Ошибка создание файла.");  }
});
}


function show_tit()
{
$("#windowContent1").html($('#sh_tit').html()); $('#sh_tit').html(''); $('#window1').css({"width":"500px","height":"280px"}); show_w1();   
$('#title').val($('#hidden2').val());
$('#description').val($('#hidden4').val());
$('#keywords').val($('#hidden3').val());
}


function save_folder()
{
var val=$('#name_folder').val();
var cr;
var path=$('#hidden1').val()
if (document.getElementById('create').checked){cr=1;}else{cr=0;}
if (val=='')
{
alert("Введите название папки");
}
else
{
$.ajax({
	url: "/incom/modules/file_manager/ajax.php",
	data: "do=save_folder&d_path="+path+"&name="+val+"&cr="+cr+"&x=secure",
	type: "POST",
	dataType : "html",
	cache: false,
	success:  function(data)  {$("#info_msg").html(data); location.href='<?=$path?>'+val; },
	error: function(){ alert("Ошибка создание папки.");  }
});
}
}

function str_replace(search, replace, subject) {
return subject.split(search).join(replace);
}


function save_file(val,format)
{
var val=$('#name').val();
var cr;
var path=$('#hidden11').val();
//alert(path);
var title=$('#hidden2').val();
var keyw=$('#hidden3').val();
var desc=$('#hidden4').val();
if (format=='html')
{
var oEditor = FCKeditorAPI.GetInstance('page') ;
res = oEditor.GetHTML();
}
else
{
res=$('#page').val();
}
res=str_replace("&","zxc123",res);
if (document.getElementById('template').checked){cr=1;}else{cr=0;}
if (val=='untilled.php')
{
alert("Введите название файла");
}
else
{
$.ajax({
	url: "/incom/modules/file_manager/ajax.php",
	data: "do=save_file&d_path="+path+"&name="+val+"&cr="+cr+"&title="+title+"&keyw="+keyw+"&desc="+desc+"&page="+res+"&x=secure",
	type: "POST",
	dataType : "html",
	cache: false,
	success:  function(data)  {$("#info_msg").html(data); val=str_replace(".php","",val); location.href=path+val+'.php'; },
	error: function(){ alert("Ошибка создание файла.");  }
});
}
}

function save_tit(){
var title=$('#title').val();
var desc=$('#description').val();
var keyw=$('#keywords').val();
$('#sh_tit').html($("#windowContent1").html());
$('#hidden2').val(title);
$('#hidden3').val(keyw);
$('#hidden4').val(desc);
$('#title').val(title);
$('#description').val(desc);
$('#keywords').val(keyw);
$('#window1').hide();
$('#opaco1').toggleClass('hidden').removeAttr('style');
}



function cl(){
$('#window').hide();
$('#opaco').toggleClass('hidden').removeAttr('style');
}

function edit_menu(){
	var menu=$('#menu_type').val();
	if (menu!='')
	{
	window.open('/incom/modules/file_manager/menu.php?menu='+menu+'');
	$('#window').hide();
$('#opaco').toggleClass('hidden').removeAttr('style');
	}
	else
	{
		alert('Выберите меню для редактирования.');
	}
	}

</script>
<?
}
?>