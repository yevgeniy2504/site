<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/incom/modules/general/mysql.php";
class Helper{
	
	public $url = array();
	public $get = array();
	function __construct(){
		  $this->parse_url($_SERVER["REQUEST_URI"]);
	}
	// разбиваем на части url 
	// return array()
	function parse_url($url){
		$ob = new application();
		$uri = explode('?',$url);
		$url_segment = explode('/',$uri[0]);

		// версия
		$this->url["lang"] = $ob->pr($url_segment[1]);
		if ($this->url["lang"]!='ru' && $this->url["lang"]!='en' && $this->url["lang"]!='zh' && $this->url["lang"]!='kz'){
			$this->url["lang"] = 'ru';
			// модуль
			$this->url["module"] = $ob->pr($url_segment[1]);
			if ($url_segment[sizeof($url_segment)-1]=='')
			{
			// категория
				$this->url["block"] = $ob->pr($url_segment[sizeof($url_segment)-2]);
			// элемент
				$this->url["element"] = false;
			// если категория равна модулю то нет категорий
				if ($this->url["block"]==$this->url["module"]) $this->url["block"]=false;
			}
			else
			{
			// категория
				$this->url["block"] = $ob->pr($url_segment[sizeof($url_segment)-2]);
			// элемент
				$this->url["element"] = $ob->pr($url_segment[sizeof($url_segment)-1]);
			// если категория равна модулю то нет категорий
				if ($this->url["block"]==$this->url["module"]) $this->url["block"]=false;
			}
			if (@$uri[1]!='')
			{
				$params = explode('&',$uri[1]);
				foreach($params as $k=>$v)
				{
					$c = explode('=',$v);
					$this->get[$ob->pr($c[0])]=$ob->pr(urldecode($c[1]));	
				}
			}
			else
			{
				$this->get = false;	
			}
		}else{
		// модуль
			$this->url["module"] = $ob->pr($url_segment[2]);
			if ($url_segment[sizeof($url_segment)-1]=='')
			{
			// категория
				$this->url["block"] = $ob->pr($url_segment[sizeof($url_segment)-2]);
			// элемент
				$this->url["element"] = false;
			// если категория равна модулю то нет категорий
				if ($this->url["block"]==$this->url["module"]) $this->url["block"]=false;
			}
			else
			{
			// категория
				$this->url["block"] = $ob->pr($url_segment[sizeof($url_segment)-2]);
			// элемент
				$this->url["element"] = $ob->pr($url_segment[sizeof($url_segment)-1]);
			// если категория равна модулю то нет категорий
				if ($this->url["block"]==$this->url["module"]) $this->url["block"]=false;
			}
			if (@$uri[1]!='')
			{
				$params = explode('&',$uri[1]);
				foreach($params as $k=>$v)
				{
					$c = explode('=',$v);
					$this->get[$ob->pr($c[0])]=$ob->pr(urldecode($c[1]));	
				}
			}
			else
			{
				$this->get = false;	
			}
		}
		return;				
	}
	
	// разбиваем запрос на ссылку и парамметры
	public function get_url_part($uri){
		$uri=explode('?',$uri);
		return $uri;
	}
	
	// проверка админа для публичной части	
	function check_admin()
	{
		if (@$_SESSION['user_id'] AND @$_SESSION['group_id'])
		{
			$s=mysql_query("select * from i_user where id=".intval($_SESSION["user_id"])." 
				and id_group=".intval($_SESSION["group_id"])." and active=1");
			if (mysql_num_rows($s)==1)
			{
				return true;	
			}
			else
			{
				return false;	
			}
		}
		else
			return false;
	}
	// вывод header по языковой версии	
	public function header_page($lang, $meta_info=array())
	{
		global $ob;
		global $incom;
		global $api;

		if(!file_exists($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php") || 
			(filesize( $_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php") < 10))
		{
			header( "Location: /install/index.php" );
			exit();
		}else{
			$select_template=$ob->select("i_template",array("active"=>1,"version"=>$lang),"");
			$res_template=mysql_fetch_array($select_template);
			$page_title=$res_template['title'];
			if( !@$description ) $description=$res_template['description'];
			if( !@$keywords ) $keywords=$res_template['keywords'];

			define('_TEMPLATE_', '/incom/template/'.$res_template['folders'], false);
			define('_TEMPLATE_FULL_', $_SERVER['DOCUMENT_ROOT'].'/incom/template/'.$res_template['folders'], false);
			define('_IMAGES_', '/upload/images', false);
			define('_FILES_', '/upload/files', false);

			if( !isset($_GET['print']) ) 
			{
				if (@$meta_info["title"])
					$title=$meta_info["title"];

				if (@$meta_info["desc"])
					$description=$meta_info["desc"];

				if (@$meta_info["keyw"])
					$keywords=$meta_info["keyw"];

				if (@$meta_info["h1title"])
					$h1title=$meta_info["h1title"];


				if (@$title=='') 		$title=@$res_template["title"];
				if ((@$h1title)=='') 		$h1title=@$res_template["title"];
				if ($description=='') 	$description=@$res_template["description"];
				if ($keywords=='') 		$keywords=@$res_template["keywords"];


				include_once($_SERVER['DOCUMENT_ROOT']."/incom/template/".$res_template['folders']."/header_".$lang.".php");
			}
			else echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
				<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			</head><body><script>print();</script>';
		}
		
	}
	
	// вывод footer по языковой версии	
	public function footer_page($lang){
		
		global $ob;
		global $incom;
		global $api;
		
		$select_template=$ob->select("i_template",array("active"=>1,"version"=>$lang),"");
		$res_template=mysql_fetch_array($select_template);
		
		
		if( !isset($_GET['print']) ) 
		{
			include_once($_SERVER['DOCUMENT_ROOT']."/incom/template/".$res_template['folders']."/footer_".$lang.".php");
			if ($ob->check_admin())
			{
				?>
				<script src="/admin_script.js" type="text/javascript"></script>
				<link href="/admin_css.css" rel="stylesheet" type="text/css" />
				<div id="admin_opaco" class="admin_hidden"></div>
				<div id="admin_window" style="display:none;">
					<div id="admin_windowTop">
						<div id="admin_windowTopContent"></div>
						<img src="/incom/images/window_close.jpg" id="admin_windowClose" />
					</div>
					<div id="admin_windowBottom"><div id="admin_windowBottomContent">&nbsp;</div></div>
					<div id="admin_windowContent"></div>
				</div>
				<div id="admin_opaco1" class="admin_hidden"></div>
				<div id="admin_window1">
					<div id="admin_windowContent1"></div>
				</div>
				<?	
			}
		}
		else echo '</body></html>';

	}
	 
	function show_404($lang){
		ini_set("display_errors", "on");
		error_reporting(E_ALL);
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: https://www.hotel-uyut.kz/404.php/"); 

		//require('../404.php');		
		die();
	}
	
	
}

?>