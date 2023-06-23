<?
$per_page = 12;
$block_id = 24;
$moderation   = '';
$lang		= 'en';
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

if (isset($_GET["id"]))
{
	$id=intval($_GET["id"]);
	$s=mysql_query("select name_block from i_block where id=$id limit 1");
	$r=mysql_fetch_array($s);
	$title		= $r["name_block"];
}

else { $title='GALLERY'; }
$keywords	= '';
$description= '';


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
		if($_SERVER['REQUEST_URI']=='/en/gall.php?id=79'){
		echo '<p>We invite you to a modern fully equipped fitness club at our hotel «Uyut»!
You will be able to optimally maintain the usual physical form, without interrupting training for the duration of business visits and staying away from home.</p><br>';
		}
		if($_SERVER['REQUEST_URI']=='/en/gall.php?id=78'){
		echo '<p>All the Guests of the Hotel «Uyut» can use our own comfortable sauna any time from 8:00 a.m. till 22:00 p.m. <br>
Everyone interested can relax in the comfortable modern steam room with a powerful oven (equipped with a built-in steam generator) or escape from the daily worries inside the cab, which decorated with the resinous wood.
</p><br>';
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
		if($_SERVER['REQUEST_URI']=='/en/gall.php?id=79'){
		echo 'You can keep your usual schedule, because our fitness works for our Guests around the clock. During your trainings you can use some cardio equipment (treadmill and exercise bike), as well as pumping all the muscle groups. For those who like to work with free weights, there have equipments and various dumbbells.<br><br>
		Importantly! Fitness is open exclusively for guests of our Hotel!</p><br>';
		}
		if($_SERVER['REQUEST_URI']=='/en/gall.php?id=78'){
		echo '<p>Today sauna is not only a kind of the bath for hygienic procedures. Rest in this wonderful place allows you to effectively restore the energy, make your muscles strong and organize your thoughts. Sitting in a sauna you can also spend an impromptu session of regenerative aromatherapy.
</p><br>';
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
