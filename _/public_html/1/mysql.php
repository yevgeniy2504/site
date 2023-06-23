<?
session_start();
@header("Content-Type: text/html; charset=utf-8");
$host="srv-pleskdb48.ps.kz";
$db="hoteluyu_uyut_new";
$user="hoteluyu_alpv";
$pass="i+yxEk#u5=,s";
$connect_sql=@mysql_connect($host,$user,$pass);


// очистка POST и GET
class CleanGetPost{
	public function __construct()
	{
		$this->clean_get();
		$this->clean_post();
	}
	private function clean($input) 
	{
		$text = preg_replace('%&\s*\{[^}]*(\}\s*;?|$)%', '', $input);
		$text = strip_tags($text);
		$text = htmlspecialchars($text, ENT_QUOTES);
		$text = preg_replace('/[<>]/', '', $text); 
		$text = mysql_real_escape_string($text);
		$badwords = array('input', 'union', 'script', 'select', 'update', 'script');
		$text = str_replace($badwords, '', $text);
		return $text;
	}
	private function clean_get()
	{
	   if(isset($_GET))
	   {
			foreach($_GET as $name => $value)
			{
				$_GET[$name] = $this->clean(@$value);
			}
		}
	}
	private function clean_post()
	{
		if(isset($_POST))
		{
			foreach($_POST as $name => $value)
			{
				$_POST[$name] = $this->clean(@$value);
			}
		}
	}
}
error_reporting(E_ALL);
ini_set("display_errors", "on");
if(@$connect_sql)
{
	mysql_query("SET NAMES `utf8`", $connect_sql);
	if( @mysql_query("use $db", $connect_sql) )
	{	
		include_once($_SERVER["DOCUMENT_ROOT"]."/incom/modules/general/mysql_class.php");
		include_once($_SERVER["DOCUMENT_ROOT"]."/incom/modules/general/function.php");
		include_once($_SERVER["DOCUMENT_ROOT"]."/incom/modules/general/resize-class.php");
		include_once($_SERVER["DOCUMENT_ROOT"]."/classes/incom.php");
		$ob = new application();
		if ($ob->check_admin()==false)
			$clean = new CleanGetPost;
		$mysql = new mysql($host, $db, $user, $pass);
	}
	else
	{
		echo "Невозможно подключиться к базе!";
	}
}
else 
	exit( "Невозможно подключиться к серверу!" );
?>
