<? 
$lang="zh";
$title="证书";
$keywords="";
$description="";

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
require($_SERVER["DOCUMENT_ROOT"]."/incom/template/header.php");


echo '<p>阿拉木图中部地区的“Uyut”酒店欢迎其来自世界各地的客人超过20年。 长期以来，我们的组织已经获得了大量的文凭和证书。 文件证实了我们酒店客人住宿的无可挑剔的服务质量和安全性。</p><br>';




	
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
	
		


echo '<p>我们想向您展示我们的证书. 在酒店的网站上有一些文件。 我们想要说服你我们的经验和无可挑剔的服务。 所有的客房服务和安全服务员工都为客人的会议做好了充分的准备。</p>';


require($_SERVER["DOCUMENT_ROOT"]."/incom/template/footer.php");?>