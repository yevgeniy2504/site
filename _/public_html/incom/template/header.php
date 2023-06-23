<?




ob_start();
if($_SERVER['REQUEST_URI'] == '/ru/gall.php?id=37' || $_SERVER['REQUEST_URI'] == '/ru/gall.php?id=30'){
	header("HTTP/1.0 404 Not Found"); 
}

if(	!file_exists($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php") || (filesize( $_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php") < 10)	){
	header( "Location: /install/index.php" );
	exit();
}else{

	include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

	$select_template=$ob->select("i_template",array("active"=>1,"version"=>$lang),"");
	
	

	
	$res_template=mysql_fetch_array($select_template);
	

	$_SESSION["version"]=$lang;
	
	
	// добавление комментариев
	if (isset($_POST["com_id"]) && $_POST["com_id"]!='' && isset($_POST["token"]) && $_SESSION["token"]==$_POST["token"])
	{
		$incom->comment->lang=$lang;
		$comment=mysql_query("select * from i_block where translit_name='comments'");
		$comment_res=mysql_fetch_array($comment);
		$incom->comment->id_section=$comment_res["id"];
		$incom->comment->get_params();
		
		
		
		
		
		
		
		
	if ($_SERVER['REQUEST_URI'] == '/zh/catalog/2393/') { 
$meta_info['desc'] = '';
}

if ($_SERVER['REQUEST_URI'] == '/zh/catalog/') { 
$meta_info['desc'] = '';
}

if ($_SERVER['REQUEST_URI'] == '/zh/catalog/390/') { 
$meta_info['desc'] = '';
}

if ($_SERVER['REQUEST_URI'] == '/zh/catalog/392/') { 
$meta_info['desc'] = '';
}

if ($_SERVER['REQUEST_URI'] == '/zh/catalog/_1331/') { 
$meta_info['desc'] = '';
}

if ($_SERVER['REQUEST_URI'] == '/zh/catalog/391/') { 
$meta_info['desc'] = '';
}
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if ($incom->comment->add_comment($lang, $_POST["name"], $_POST["mail"], $_POST["text"], $_POST["com_id"], $_POST["com_com_id"]))
		{
			echo '<script>';
			echo 'jQuery(".comment_field").val("");';
			echo 'jQuery("#comment_info").html("'.strip_tags(trim($incom->comment->text_success)).'").css("color","green").slideDown("slow");';
			echo '</script>';
			$link = $_SERVER['HTTP_REFERER'].'#comment';
			$incom->comment->send_mail($incom->comment->email, $link, $_POST["name"], $_POST["text"]);
		}
		else
		{
			echo '<script>';
			echo 'jQuery("#comment_info").html("Ошибка отправки комментария. Попробуйте позже").css("color","red").slideDown("slow");';
			echo '</script>';
		}
		exit;
	}
	


	// модерация комментариев
	if ($ob->check_admin())
	{
		if (isset($_POST["com_act"]) && isset($_POST["id"]))	
		{
			mysql_query("update i_block set com_act=".intval($_POST["com_act"])." where id=".intval($_POST["id"])."");	
		}
	}
	$page_title=$res_template['title'];
	

	
	if( !@$description ) $description=$res_template['description'];
	if( !@$keywords ) $keywords=$res_template['keywords'];
	define('_TEMPLATE_', '/incom/template/'.$res_template['folders'], false);
	define('_TEMPLATE_FULL_', $_SERVER['DOCUMENT_ROOT'].'/incom/template/'.$res_template['folders'], false);
	define('_IMAGES_', '/upload/images', false);
	define('_FILES_', '/upload/files', false);
		
		
		
		
		
		
		
	
		
		
		

	if( !isset($_GET['print']) ) 
	{
		if (@$title=='') 		$title=$res_template["title"];



		// if ((@$h1title)=='') 		$h1title=@$res_template["title"];	
		if (@$description=='') 	$description=$res_template["description"];
		if (@$keywords=='') 		$keywords=$res_template["keywords"];
		
		
		
		
		include_once($_SERVER['DOCUMENT_ROOT']."/incom/template/".$res_template['folders']."/header_".$lang.".php");
		
		

		
	}
	else echo 
	
	'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
			   <html>
			   <head>
			   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
			   </head><body><script>print();</script>';
}
?>

