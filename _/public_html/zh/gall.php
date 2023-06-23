<?
$per_page = 12;
$block_id = 24;
$moderation   = '';
$lang		= 'zh';
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

if (isset($_GET["id"]))
{
	$id=intval($_GET["id"]);
	$s=mysql_query("select * from i_block where id=$id limit 1");
	$r=mysql_fetch_array($s);

	if(!empty($r['page_name']))$title = $r["page_name"];
	else $title = $r["name_block"];

$keywords = $r["page_keyw"];
$description= $r["page_desc"];
$h1title=$r["h1title"];

}else {
$title='​走廊。 - Гостиничный комплекс «УЮТ» в Алмате';
$keywords	= '​走廊。 Галерея фотографии';
$description= 'На нашем сайте Вы сможете найти подробную галерею нашего комплекса - Гостиничный комплекс элитного класса «УЮТ»';
$h1title='​走廊。';
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
	$element_id = intval($_GET['id']);
	
	$query=mysql_query("SELECT * FROM i_block_elements WHERE id_section='".$element_id."' and gal_act=1 AND gal_img!='' AND version='".$lang."'");
	if (mysql_num_rows($s)>0)
	{
		$i=1;
		if($_SERVER['REQUEST_URI']=='/zh/gall.php?id=99'){
		echo '<p>尽可能舒适地在我们的酒店休息。 我们邀请您到现代化的健身俱乐部。 你可以保持你美丽的身体形状。 商务访问和旅行不会中断您的zanyat运动。</p><br>';
		}
		if($_SERVER['REQUEST_URI']=='/zh/gall.php?id=98'){
		echo '<p>所有客人均可使用桑拿浴室。 桑拿浴室的开放时间为8:00至22:00。 桑拿浴室配有强力烤箱和蒸汽发生器。 房间的墙壁用木板装饰。 您可以休息并采取卫生程序。 使用芳香疗法。</p><br>';
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
		
		echo '</div>';
		if($_SERVER['REQUEST_URI']=='/zh/gall.php?id=99'){
		echo '<p>全天候工作的健身俱乐部。 您可以在任何方便的时候玩运动。 我们提供运动模拟器，跑步机，健身车，重量，哑铃。 健身专门为酒店“Uyut”的客人服务。 </p><br>';
		}
		if($_SERVER['REQUEST_URI']=='/zh/gall.php?id=98'){
		echo '<p>你会恢复你的肌肉和神经。 我们邀请你！ </p><br>';
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
