<? 
$lang="en";
$title="Certificates";
$keywords="";
$description="";

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");

echo '<p>Conveniently located adjacent to historical and geographical center of Almaty, the «Uyut» Hotel is within easy reach of Almaty’s top attractions and businesses. More than two decades we warmly welcome our guests from all over the world, rendering a broad list of services. As a result, now we possess all necessary conformity certificates, which is indicative of the impeccable quality of service and safety for each and every guest of our hotel.</p><br>';




	
	$query=mysql_query("SELECT * FROM `i_block_elements` WHERE `id_section` = '192' ORDER BY id_sort DESC");

		$i=1;
		echo '<div class="gallery">';
		while ($r = mysql_fetch_assoc($query)){

			echo '
			<div itemscope itemtype="http://schema.org/ImageObject" class="el">
			<a itemprop="contentUrl" rel="image" href="/upload/images/'.$r["cert_photo"].'" title=""><img class="title1" src="/upload/images/big/'.$r["cert_photo"].'" alt="" /></a>
			</div>
			';	
			
			if (($i%3)==0) { echo '<div class="clear"></div>'; }
			
			$i++;
		}
		if (($i%3)-1!=0) { echo '<div class="clear"></div>'; }
		
		echo '</div><br><br>';
	
		


echo '<p>All our approvals and certificates are placed here. You may rest assured that all personnel assigned to or directly involved in room-service or safety and security arrangements are properly instructed have demonstrated their abilities in their particular duties.</p>';


require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>