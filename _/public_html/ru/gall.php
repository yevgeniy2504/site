<?

$per_page = 12;
$block_id = 24;
$moderation   = '';
$lang		= 'ru';
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

if (isset($_GET["id"]))
{
	$id=intval($_GET["id"]);
	$s=mysql_query("select * from i_block where id=$id limit 1");
	$r=mysql_fetch_array($s);
	// die(var_dump($r));

	if(!empty($r['title']))$title = $r["title"];
	else $title = 'h'.$r["name_block"];

	$keywords =$r["keywords"];
	$description=$r["description"];
	$h1title=$r["title_h1"];

}else {
	$title='Наша галерея - Гостиничный комплекс «УЮТ» в Алмате';
	$keywords	= 'Галерея фотографии';
	$description= 'На нашем сайте Вы сможете найти подробную галерею нашего комплекса - Гостиничный комплекс элитного класса «УЮТ»';
	$h1title='Галерея';
}

$mod_lang_mass = Array(
						# Русский
	'ru'=>Array(
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

	if($_GET['id'] == 37 || $_GET['id'] == 30){
		require $_SERVER['DOCUMENT_ROOT'] . '/404.php';
		exit;
	}

	$element_id = intval($_GET['id']);
	$sql = "SELECT * FROM i_block_elements WHERE id_section='".$element_id."' and gal_act=1 AND gal_img!='' AND version='".$lang."'";
	$query=mysql_query($sql);

	if (mysql_num_rows($s)>0)
	{
		$i=1;
		if($_SERVER['REQUEST_URI']=='/ru/gall.php?id=29'){
		echo '<p>Делая все для максимально комфортного отдыха гостей отеля «Уют», мы приглашаем вас в современный всесторонне оборудованный фитнес-клуб, работающий при нашей гостинице. Вы сможете оптимально поддерживать привычную физформу, не прерывая тренировки на время деловых визитов и проживания вне дома.</p><br>';
		}
		if($_SERVER['REQUEST_URI']=='/ru/gall.php?id=28'){
		echo '<p>Гости отеля могут в любой момент в интервале с 8 до 22 часов воспользоваться нашей собственной комфортабельной сауной. Вы можете отдохнуть в удобной современной парной с мощной печью со встроенным парогенератором, а также отвлечься от дневных забот внутри отделанной смолистым деревом кабины. </p><br>';
		}
		echo '<div class="gallery">';
		while($r=mysql_fetch_array($query))
		{
			$name = stripslashes($r["gal_name"]);

			echo '
			<div itemscope itemtype="http://schema.org/ImageObject" class="el">
			<a itemprop="contentUrl" rel="image" href="/upload/images/'.$r["gal_img"].'" title="'.$name.'"><img class="title1" src="/upload/images/big/'.$r["gal_img"].'" alt="'.$name.'" /></a>
			</div>
			';

			if (($i%3)==0) { echo '<div class="clear"></div>'; }

			$i++;
		}
		if (($i%3)-1!=0) { echo '<div class="clear"></div>'; }

		echo '</div><br>';

		if($_SERVER['REQUEST_URI']=='/ru/gall.php?id=29'){
		echo '<p>Сохраняйте привычный график: наш фитнес работает круглосуточно. Регулируйте занятия, исходите из соображение вашего собственного удобства. У вас будет доступ к залу спортивных тренажеров для кардиотренировок (беговая дорожка и велотренажер), а также для прокачки всех групп мышц. Для любителей работы со свободными весами имеются утяжелители, гантели различного веса.<br><br>
		<strong>Важно!</strong> Фитнес работает исключительно для гостей отеля «Уют». </p>';}
	}
	if($_SERVER['REQUEST_URI']=='/ru/gall.php?id=28'){
		echo '<p>Сауна – это не только купальня для гигиенических процедур. Отдых в сауне позволяет эффективно восстановить иссякающие силы, возвратить мышцам и мыслям легкость, а также позволяет провести импровизированный сеанс восстановительной ароматерапии.</p>';
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
			<div itemscope itemtype="http://schema.org/ImageObject" class="el">
			<a itemprop="contentUrl" href="'.$link.'"><img class="title1" src="/upload/images/big/'.$r["img_block"].'" alt="'.stripslashes($r["name_block"]).'" /></a>
			<span itemprop="name" class="gallspan" onclick="location.href=\''.$link.'\'">'.stripslashes($r["name_block"]).'</span>
			'.($r["info_block"]!='' ? /*'<p>'.stripslashes($r["info_block"]).'</p>'*/'' : '').'
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
