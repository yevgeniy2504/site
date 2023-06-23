<?

/**
 * @author Алисеевич Валерий
 * @copyright 2012
 * Модуль отзывы 
 */

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
ini_set("display_errors","on");
error_reporting(E_ALL);

class Install{
	
	// классы которые будут устанавливаться
	public $inst = array();
	// классы которые не будут устанавливаться
	public $not_inst = array('helper.php','incom.php','install.php','index.php');
	// папка с классами
	public $path = '/classes/';
	// где хранится экземпляр класса static 
	public $classes = array();
	
	function __construct(){
		$this->list_classes();
	}
	
	function mb_ucfirst($str, $enc = 'utf-8') {
    	return mb_strtoupper(mb_substr($str, 0, 1, $enc), $enc).mb_substr($str, 1, mb_strlen($str, $enc), $enc);
	} 
	
	// получем список классов
	function list_classes(){
		
		$path = $_SERVER['DOCUMENT_ROOT'].$this->path;	
		$dir = opendir($path); 
		$array_file = array(); 

		while ($list_file = readdir($dir)) 
		{
			if (($list_file != ".") && ($list_file != "..")) 
			{
				if (is_dir($path."/".$list_file)) 
				{
				
				}
				else 
				{
					if (!in_array($list_file,$this->not_inst))
					{
						array_push($array_file, str_replace('.php','',$list_file));
						$this->classes[] = $this->mb_ucfirst(str_replace('.php','',$list_file)); 
					}
				}
			}
		}
		return $this->loader($array_file);
	}
	
	public function loader($array_file){
		foreach($array_file as $k=>$v)
		{
			require_once($_SERVER['DOCUMENT_ROOT'].$this->path.$v.'.php');
			$this->{$v} = new $v; 
		}
		
	}
	
	
	
}

$inst = new Install;


?>