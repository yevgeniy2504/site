<?
$per_page = 12;
$block_id = 24;
$moderation   = '';
$lang		= 'kz';
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

if (isset($_GET["id"]))
{
	$id=intval($_GET["id"]);
	$s=mysql_query("select name_block from i_block where id=$id limit 1");
	$r=mysql_fetch_array($s);
	$title		= $r["name_block"];
}

else { $title='Галерея'; }
$keywords	= '';
$description= '';


$mod_lang_mass = Array(
						# Русский
				 		'kz'=>Array(
									  'no_elements'=>'Извините, в данный момент элементов нет!',
									  'more'=>'Подробнее...'
				 					  ),
				 		# Английский
				 		'en'=>Array(
				 		  				'no_elements'=>'Sorry, no elements found!',
										'more'=>'More...'
				 					    )
				 );

require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");
?>
<style>

</style>
<?
?>
<style>
	.component_item {
		display: inline-block;
		margin: 15px 15px 0 0 !important;
		vertical-align: top;
	}
	.image_block {
		background: none repeat scroll 0 0 #d5d5d5;
		border: 1px solid #d5d5d5;
		height: 146px;
		width: 212px;
	}
</style>
<?
# Если послан ID элемента
if (isset($_GET['id']) AND (intval($_GET['id']) != ''))
{
	$element_id = intval($_GET['id']);
	
	$query=mysql_query("SELECT * FROM i_block_elements WHERE id_section='".$element_id."' and gal_act=1 AND gal_img!='' AND version='".$lang."'");
	if (mysql_num_rows($s)>0)
	{
		$i=1;
		if($_SERVER['REQUEST_URI']=='/kz/gall.php?id=70'){
		echo '<p>Қонақ үйдің қонақтары кез-келген уақытта 8-ден 22 сағат аралығында өзіміздің жайлы саунаны пайдалана алады. Сіз ыңғайлы да заманауи ылғалды қуатты пеші бар және ішінде парогенератор орнатылған  саунада демалуға мүмкіндігіңіз бар, сондай-ақ ағашпен безендірілген кабинаның ішінде күнделікті тірлікке алаңдамайсыз.</p><br>';
		}
		if($_SERVER['REQUEST_URI']=='/kz/gall.php?id=69'){
		echo '<p>«Уют» қонақ үйінің қонақтарының ең жайлы демалысы үшін барлығын жасай отырып, қонақ үйде жұмыс істейтін заманауи толық жабдықталған фитнес-клубқа шақырамыз. Сіз іскерлік сапарларда және үйден тыс жерде жаттығуды үзбей, кәдімгі физикалық нысанды оңтайлы ұстай аласыз.</p><br>';
		}
		echo '<div class="gallery">';
		while($r=mysql_fetch_array($query))
		{
			$name = stripslashes($r["gal_name"]);

			echo '
			<div class="el">
				<a rel="image" href="/upload/images/'.$r["gal_img"].'" title="'.$name.'"><img class="title1" src="/upload/images/big/'.$r["gal_img"].'" alt="'.$name.'" /></a>
			</div>
			';	
			
			if (($i%3)==0) { echo '<div class="clear"></div>'; }
			
			$i++;
		}
		if (($i%3)-1!=0) { echo '<div class="clear"></div>'; }
		
		echo '</div><br>';
		
		if($_SERVER['REQUEST_URI']=='/kz/gall.php?id=70'){
		echo '<p>Кәдімгі кестені сақтаңыз: біздің фитнес тәулік бойы ашық. Сабақты реттеңіз, өзіңіздің ыңғайлылықтарыңызды ескеріңіз. Сіз спорт залында спорттық құрал-жабдыққа (жүгіру жолы мен жаттығу велосипедіне) қол жеткізе аласыз, сондай-ақ, барлық бұлшық ет топтарын айдау үшін.<br><br>
		Әуесқойлар үшін жұмыс бос таразылармен ауырлату, шоқпар темірлер, әр түрлі салмақтар бар. 
		Маңызды! Фитнес тек «Уют» қонақ үйі қонақтарына арналған.
		</p>';
		}
		if($_SERVER['REQUEST_URI']=='/kz/gall.php?id=69'){
		echo '<p>Сауна бұл гигиеналық рәсімдерге арналған шомылу алаңы ғана емес.<br> Саунадағы демалыс демалу күштерді тиімді түрде қалпына келтіруге әсерін тигізеді, бұлшық етті және ақыл-ойдың жеңілдігін қайтарады, сондай-ақ ароматерапиялық қалпына келтіру импровизациялық сеанс алуға мүмкіндік береді.		</p>';
		}
	}
	
}

else
{
	$api->Pages->setvars($lang, $_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block` WHERE `id_section`='$block_id' AND act_block=1 AND (`version`='$lang' OR version='all') "), 0), $per_page, @$_GET['p']);

	$sql_query = "select * FROM `i_block` WHERE `id_section`='$block_id' AND (`version`='$lang' OR version='all') AND act_block=1 ORDER BY `sort_block` ASC LIMIT ".$api->Pages->start_from.", $per_page";
	
	$get_elements = mysql_query($sql_query);
	if (mysql_num_rows($get_elements) != 0)
	{
		$i=1; $t=1;
		echo '<div class="gallery">';
		while ($r = mysql_fetch_array($get_elements))
		{
			$name=$r["name_block"];
			$link=$_SERVER['PHP_SELF'].'?id='.$r["id"];
			
			echo '
			<div class="el">
				<a href="'.$link.'"><img class="title1" src="/upload/images/big/'.$r["img_block"].'" alt="'.stripslashes($r["name_block"]).'" /></a>
				<span class="gallspan" onclick="location.href=\''.$link.'\'">'.stripslashes($r["name_block"]).'</span>
				'.($r["info_block"]!='' ? '<p>'.stripslashes($r["info_block"]).'</p>' : '').'
			</div>
			';	
			
			if (($i%3)==0) { echo '<div class="clear"></div>'; }
			$i++;
		}	
		if (($i%3)-1!=0) { echo '<div class="clear"></div>'; }
		
		echo '</div>';
		
		echo $api->Pages->pages_gen().'<br/>';
		
	} 
}
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");
?>
