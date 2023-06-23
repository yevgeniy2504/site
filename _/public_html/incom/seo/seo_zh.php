<?php
if ($_SERVER['REQUEST_URI'] === '/zh/') {
 $title = '舒适 "Uyut", 阿拉木图 -官方網站';
 $h1title = '舒适 宾馆 (УЮТ)';
 $keywords = '酒店 舒适 在阿拉木图 酒店的官方网站 ';
 $description = '舒适 宾馆 (УЮТ)。。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';	

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/"';
} 
elseif ($_SERVER['REQUEST_URI'] === '/zh/guest/') {

 $title = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '住客点评 ';
 $keywords = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '酒店“Uyut”在阿拉木图的客户评论。请联系最现代的酒店大楼。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';       

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/guest/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/guest/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/guest/"';
}
elseif (substr($_SERVER['REQUEST_URI'], 0, 13) === '/zh/guest/?p=') {
 $lastSymbol = substr($_SERVER['REQUEST_URI'], -1);
 $title = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图 页 '.$lastSymbol.'';
 $h1title = '住客点评 ';
 $keywords = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图 页 '.$lastSymbol.'';
 $description = '酒店“Uyut”在阿拉木图的客户评论。请联系最现代的酒店大楼。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11 页 №'.$lastSymbol.'';   
}


elseif ($_SERVER['REQUEST_URI'] === '/zh/catalog/') {
 $title = '留在 舒适 宾馆 (УЮТ) 阿 拉木图住在酒店，晚上，一天，一星期';
 $h1title = '酒店式公寓';
 $keywords = '住酒店舒适阿拉木图下令晚上天天一周 ';
 $description = '酒店式公寓。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/catalog/"';
}

elseif ($_SERVER['REQUEST_URI'] === '/zh/catalog/390/') {
 $title = '标准间 – 入住舒适宾馆（УЮТ）在阿拉木图，价格，照片，评论';
 $h1title = '标准间';
 $keywords = '标准间  入 舒适宾馆（УЮТ） 阿拉木图 价格 照片 评论';
 $description = '标准间。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/standart127/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/standart17/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/catalog/standard120/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/catalog/391/') {
 $title = '豪华房 – 入住舒适宾馆（УЮТ）在阿拉木图，价格，照片，评论';
 $h1title = '豪华酒店套房';
 $keywords = '豪华房  入 舒适宾馆（УЮТ）阿拉木 价格 照片 评论';
 $description = '豪华酒店套房。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/comfort-deluxe129/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/komfort-de-lyuks19/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/catalog/comfort-deluxe122/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/catalog/392/') {
 $title = '小型套房 – 入住舒适宾馆（УЮТ）在阿拉木图，价格，照片，评论';
 $h1title = '小型套房';
 $keywords = '小型套房  入 舒适宾馆（УЮТ）阿拉木图 价格 照片 评论';
 $description = '小型套房。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/zhartylay-lyuks130/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/polulyuks20/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/catalog/semi-lux124/"';
}

elseif ($_SERVER['REQUEST_URI'] === '/zh/catalog/393/') {
 $title = '豪华房2间  – 入住舒适宾馆（УЮТ）在阿拉木图，价格，照片，评论';
 $h1title = '豪华房2间 ';
 $keywords = '豪华房2间   入 舒适宾馆（УЮТ） 阿拉木图 价格 照片 评论';
 $description = '豪华房2间 。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/lyuks-2--blmel132/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/lyuks-2h-komnatnyy22/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/catalog/lux-large123/"';
}

elseif ($_SERVER['REQUEST_URI'] === '/zh/booking/') {
 $title = '在線預訂 "Uyut", 阿拉木图 -官方網站';
 $h1title = '预订酒店';
 $keywords = '预订舒适间酒店阿拉木图价格评论照片 ';
 $description = '预订酒店。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/booking/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/booking/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/booking/"';
}
elseif ($_SERVER['REQUEST_URI'] == '/zh/gall.php') {
 $title = '资组合。照片 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '酒店照片';
 $keywords = '资组合 照片 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。照片 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/guest/') {
   $title = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图';
   $h1title = '住客点评 ';
   $keywords = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图';
   $description = '住客点评  舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

   $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/guest/"';

   $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/guest/"';

   $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/guest/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/virtual-tour/') {

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/virtual-tour/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/virtual-tour/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/virtual-tour/"';
}

elseif ($_SERVER['REQUEST_URI'] === '/zh/397/') {
 $title = '往来舒适宾馆（УЮТ）在阿拉木图：电话，地址和电子邮件管理';
 $h1title = '往来';
 $keywords = '往来舒适宾馆（УЮТ）在阿拉木图 电话 地址和电子邮件管理';
 $description = '往来舒适宾馆（УЮТ）在阿拉木图：电话，地址和电子邮件管理。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';	


 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/baylanysu97/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/kontakty_613/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/contacts95/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=98') {
 $title = '资组合。照片桑拿 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '桑拿浴：照片';
 $keywords = '资组合 照片桑拿 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。照片桑拿 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=69"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=28"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=78"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=99') {
 $title = '资组合。照片健身中心 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '健身中心：照片';
 $keywords = '资组合 照片健身中心 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。照片健身中心 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=70"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=29"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=79"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=96') {
 $title = '资组合。餐厅照片 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '餐厅照片';
 $keywords = '资组合 餐厅照片 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。餐厅照片 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=67"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=31"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=76"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=97') {
 $title = '资组合。照片会议厅  舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '会议厅：照片 ';
 $keywords = '资组合 照片会议厅  舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。照片会议厅  舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=68"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=32"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=77"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=92') {
 $title = '资组合。照片豪华房 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '豪华：照片';
 $keywords = '资组合 照片豪华房 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。照片豪华房 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=62"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=33"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=71"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=93') {
 $title = '资组合。照片小型套房 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '少年：照片';
 $keywords = '资组合 照片小型套房 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。照片小型套房 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=63"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=34"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=72"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=103') {
 $title = '资组合。图片套房2间房 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '套房两室：照片';
 $keywords = '资组合 图片套房2间房 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。图片套房2间房 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=64"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=35"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=73"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=95') {
 $title = '资组合。标准间照片 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '标准：照片';
 $keywords = '资组合 标准间照片 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '资组合。标准间照片 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=65"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=36"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=74"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/gall.php?id=100') {
 $title = '投资组合：照片编号阿拉木图酒店“Uyut”的标准№2';
 $h1title = '标准：照片';
 $keywords = '投资组合照片房间标准2酒店Uyut';
 $description = '投资组合：阿拉木图酒店“Uyut”标准№2的房间照片。 通过高水平的服务联系最现代化的酒店大楼。 酒店“舒适”等着你！ 电话：（727）279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=66"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=39"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/gall.php?id=75"';
}

elseif ($_SERVER['REQUEST_URI'] === '/zh/394/') {
 $title = '酒店每天费用, 客房的酒店价格 舒适 宾馆 (УЮТ) 阿拉木图, 照片，评论';
 $h1title = '客房价格酒店';
 $keywords = '酒店每天费用 客房的酒店价格 舒适 宾馆 (УЮТ) 阿拉木图  照片 评论';
 $description = '酒店每天费用, 客房的酒店价格 舒适 宾馆 (УЮТ) 阿拉木图, 照片，评论。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/prays-para108/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/price-list-13/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/price-list114/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/384/') {
 $title = '信息 舒适 宾馆 (УЮТ) 阿拉木图 , 起来火车/火车站附近酒店';
 $h1title = '小型企业级酒店';
 $keywords = '信息 舒适 宾馆 (УЮТ) 阿拉木图   起来火车/火车站附近酒店';
 $description = '信息 舒适 宾馆 (УЮТ) 阿拉木图 , 起来火车/火车站附近酒店。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/bz-zhayly107/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/about-us-12/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/about-our-hotel113/"';
}

elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/') {
 $title = '促销和特殊优惠 舒适 宾馆 (УЮТ) 阿拉木图 ';
 $h1title = '促销和特殊优惠';
 $keywords = '促销和特殊优惠 舒适 宾馆 (УЮТ) 阿拉木图 ';
 $description = '促销和特殊优惠 舒适 宾馆 (УЮТ) 阿拉木图 。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/actions/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/actions/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/actions/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/395/') {
 $title = '服务 舒适 宾馆 (УЮТ) 阿拉木图';
 $h1title = '酒店服务';
 $keywords = '服务 舒适 宾馆 (УЮТ) 阿拉木图';
 $description = '服务 舒适 宾馆 (УЮТ) 阿拉木图。 请参阅最现代化的酒店大楼高水准的服务。 舒适 宾馆 (УЮТ) 等着你! 通话 (727) 279-51-11';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/yzmet-krsetuler/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/services-14/"';

 $hreflang3 = 'hreflang="en" href="https://www.hotel-uyut.kz/en/services/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/650/') {
    $keywords = "有利可图的包裹";
    $description = '在阿拉木图酒店“Uyut”有利的包裹 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';      
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/651/') {
 $description = '周末包在酒店“Uyut”在阿拉木图 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';   
 $keywords = "周末套餐";
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/652/') {
 $description = '套餐“新婚夫妇”在酒店“舒适”在阿拉木图 - 描述，照片，评论。 请联系最高级别的现代化酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';    
 $keywords = "包新婚夫妇";
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/653/') {
    $description = '在阿拉木图的“Uyut”酒店打包“儿童” - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = '孩子的包裹';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/654/') {
    $description = '套餐“预订豪华客房”在阿拉木图酒店“Uyut” - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = '包书豪华';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/656/') {
 $description = '特别优惠“生日快乐”在酒店“Uyut”在阿拉木图 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
 $keywords = '特价 生日';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/657/') {
    $description = '特别优惠“我们的同事”在酒店“Uyut”在阿拉木图 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = '特别优惠我们的同事';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/658/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = '常客计划';
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/catalog/2393/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';  
    $keywords = "套房两个房间 豪华酒店 酒店uyut 阿拉木图 " ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/actions/32655/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';  
    $keywords = "支付两晚 住三晚" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_674/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "酒店预订条件UYUT" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_675/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "酒店规则" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_677/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "我们的故事" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_678/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "转机场酒店uyut" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_679/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "干洗洗衣服务" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_680/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "宴会大厅酒店租 廉价 阿拉木图" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/_850/') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "证书酒店餐厅 Uyut " ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/685/') {
    $keywords = "一家餐馆 Uyut一家咖啡馆  宴会大厅阿拉木图" ;
}
elseif ($_SERVER['REQUEST_URI'] === '/zh/sitemap.php') {
    $description = '在阿拉木图的酒店“Uyut”的一个常客的计划 - 描述，照片，评论。 请与高级服务联系最现代化的酒店。 酒店“Uyut”正在等着你！ 致电：（727）279-51-11';
    $keywords = "Uyut酒店的站点地图 阿拉木图 " ;
}



elseif ($_SERVER['REQUEST_URI'] == '/zh/actions/pakage-guests_1354/') {
 $title = "Guests package - information, rates, booking";
}
elseif ($_SERVER['REQUEST_URI'] == '/zh/') {
 $desc = "宾馆为现代化商务级别公寓的卓越代表。游客、商人或出差的人士若预定了本宾馆（位于市中心），则无须花时间在阿拉木图长久找寻住宿的地方。宾馆所在地有发达的商业、服务基础设施，与阿拉木图国际机场（乘坐汽车需20-25分钟）、火车站（乘坐汽车需10分钟）间有便捷的交通。";
} 
elseif (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 99)) {
 $desc = "酒店相册。 我们房间，健身中心，餐厅的实际照片。";
}

elseif (($_SERVER['REQUEST_URI'] == '/zh/gall.php') && ($_GET['id'] == 98)) {
 $desc = "酒店的相册，大厅，酒吧，健身中心和房间的照片。 在这里您可以看到最新的照片。";
}

elseif ($_SERVER['REQUEST_URI'] == '/zh/guest/') {
 $desc = "住客评语-真实住客和普通客户的评语。";
} 

elseif ($_SERVER['REQUEST_URI'] == '/zh/actions/') {
 $desc = "促销和特别优惠。 所有新闻和折扣都在一页上";
} 

elseif ($_SERVER['REQUEST_URI'] == '/zh/actions/650/') {
 $desc = "折扣和特殊服务计划/经济套餐。 有利可图的报价。";
} 

if ($_SERVER['REQUEST_URI'] == '/zh/virtual-tour/') {
 $desc = "虚拟游览，酒店3D游览。";
} 


elseif ($_SERVER['REQUEST_URI'] == '/zh/gall.php') {
 $desc = "酒店图片，套房图片，小型套房，标准和舒适的图片";
} 



?>