<?php
if ($_SERVER['REQUEST_URI'] === '/en/') {
 $title = '"Uyut" Hotel, Almaty - Official Site';
 $h1title = 'Hotel "Uyut"';
 $keywords = 'hotel complex uyut  almaty official site hotel';

 $description = 'Hotel "Comfort". Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/"';
} elseif ($_SERVER['REQUEST_URI'] === '/en/catalog/') {

 $title = 'Rent a room in the hotel "Uyut", book a hotel room in Almaty for a night, a day, a week';
 $h1title = 'Hotel rooms';
 $keywords = 'rent room hotel uyut book almaty night day week';
 $description = 'Hotel rooms. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/catalog/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/catalog/lux-large123/') {
 $title = 'Lux room 2-room - rent a room in hotel "Uyut" in Almaty, prices, photos, reviews';
 $h1title = 'Suite room 2-room';
 $keywords = 'lux room 2-room rent hotel uyut almaty prices photos reviews';
 $description = 'Suite room 2-room. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/lyuks-2--blmel132/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/lyuks-2h-komnatnyy22/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/catalog/393/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/catalog/standard120/') {
 $title = 'Standard room - rent a room in hotel "Uyut" in Almaty, prices, photos, reviews';
 $h1title = 'Standard Room';
 $keywords = 'standard room rent hotel uyut almaty prices photos reviews';
 $description = 'Standard room. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11 ';	

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/standart127/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/standart17/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/catalog/390/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/catalog/comfort-deluxe122/') {
	
 $title = 'Comfort de luxe room - rent a room in hotel "Uyut" in Almaty, prices, photos, reviews';
 $h1title = 'Comfort de luxe room';
 $keywords = 'comfort de luxe room rent hotel uyut almaty prices photos reviews';
 $description = 'Comfort de luxe room. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/comfort-deluxe129/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/komfort-de-lyuks19/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/catalog/391/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/catalog/semi-lux124/') {

 $title = 'Room Junior suite - rent a room in hotel "Uyut" in Almaty, prices, photos, reviews';
 $h1title = 'Junior Suite';
 $keywords = 'room junior suite rent hotel uyut almaty prices photos reviews';
 $description = 'Junior Suite. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/catalog/zhartylay-lyuks130/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/catalog/polulyuks20/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/catalog/392/"';
}

elseif (substr($_SERVER['REQUEST_URI'], 0, 13) === '/en/guest/?p=') {
	$lastSymbol = substr($_SERVER['REQUEST_URI'], -1);

$title = 'Reviews of guests who visited the Uyut Hotel in Almaty - Page '.$lastSymbol.'';
 $h1title = 'Guest reviews ';
 $keywords = 'review guest uyut hotel almaty рage '.$lastSymbol.'';
 $description = 'Reviews of guests who visited the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11. Page №'.$lastSymbol.'';
}

elseif ($_SERVER['REQUEST_URI'] === '/en/booking/') {

 $title = 'Online reservation "Uyut" Hotel, Almaty - Official Site';
 $h1title = 'Hotel reservation';
 $keywords = 'reservation rooms hotel uyut almaty lowest price photo room review';
 $description = 'Hotel reservation. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	
 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/booking/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/booking/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/booking/"';

}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php') {
 $title = 'Portfolio: photos of hotel and hotel rooms "Uyut" in Almaty';
 $h1title = 'Hotel photos';
 $keywords = 'portfolio photo hotel  room uyut almaty';
 $description = 'Portfolio: photos of hotel and hotel rooms "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';
 $hreflang1 = 'hreflang="kk" href="http://www.hotel-uyut.kz/kz/gall.php"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/guest/') {
 $title = 'Reviews of guests who visited the Uyut Hotel in Almaty';
 $h1title = 'Guest reviews ';
 $keywords = 'review guest uyut hotel almaty';
 $description = 'Reviews of guests who visited the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/guest/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/guest/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/guest/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/virtual-tour/') {
 $title = 'Virtual tour for acquaintance with hotel "Uyut" in Almaty';
 $h1title = 'Virtual tour';
 $keywords = 'virtual tour acquaintance hotel uyut almaty';
 $description = 'Virtual tour for acquaintance with hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-16';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/virtual-tour/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/virtual-tour/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/virtual-tour/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/sitemap.php') {

}
elseif ($_SERVER['REQUEST_URI'] === '/en/contacts95/') {
 $title = 'Contacts of hotel "Uyut" in Almaty: phone, address and e-mail of administration';
 $h1title = 'Contacts';
 $keywords = 'contacts hotel uyut almaty phone address e-mail administration';
 $description = 'Contacts of hotel "Uyut" in Almaty: phone, address and e-mail of the administration. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/baylanysu97/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/kontakty_613/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/397/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=78') {
 $title = 'Portfolio: photos Saunas in the hotel "Uyut" in Almaty';
 $h1title = 'Sauna: photos';
 $keywords = 'portfolio photo saunas hotel uyut almaty';
 $description = 'Portfolio: photos Saunas in the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=69"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=28"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=98"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=79') {

 $title = 'Portfolio: photos of the Fitness Center at the Uyut Hotel in Almaty';
 $h1title = 'Fitness center: photos';
 $keywords = 'portfolio photo fitness center uyut hotel almaty';
 $description = 'Portfolio: photos of the Fitness Center at the Uyut Hotel in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-12';

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=70"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=29"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=99"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=76') {
 $title = 'Portfolio: photos of Restaurant "Uyut" in the hotel "Uyut" in Almaty ';
 $h1title = 'Restaurant "Uyut": photos';
 $keywords = 'Portfolio photo restaurant uyut hotel almaty ';
 $description = 'Portfolio: photos of the Restaurant Uyut at the Uyut Hotel in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-13';
 $hreflang1 = 'hreflang="kk" href="http://www.hotel-uyut.kz/kz/gall.php?id=67"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=31"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=96"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=77') {
 $title = 'Portfolio: photos Conference halls at the hotel "Uyut" in Almaty';
 $h1title = 'Conference halls: photos';
 $keywords = 'Portfolio photo conference hall hotel uyut almaty';
 $description = 'Portfolio: photos Conference halls at the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-14';
 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=68"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=32"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=97"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=71') {
 $title = 'Portfolio: photos of Comfort Deluxe room at Uyut Hotel in Almaty';
 $h1title = 'Deluxe comfort: photos';
 $keywords = 'portfolio photo comfort deluxe room uyut hotel almaty';
 $description = 'Portfolio: photos of the Comfort Deluxe room of the Uyut Hotel in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';
 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=62"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=33"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=92"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=72') {
 $title = 'Portfolio: photos of the room Junior suite of the hotel "Uyut" in Almaty';
 $h1title = 'Junior Suite: Photos';
 $keywords = 'portfolio photo room junior suite hotel uyut almaty';
 $description = 'Portfolio: photos of the room Junior Suite of the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-12';
 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=63"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=34"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=93"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=73') {
 $title = 'Portfolio: photos of the room Suite 2-room hotel "Uyut" in Almaty';
 $h1title = 'Suite 2-room: photos';
 $keywords = 'portfolio photo room suite 2-room hotel uyut almaty';
 $description = 'Portfolio: photos of the suite Luxe 2-room hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-13';
 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/gall.php?id=64"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=35"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=103"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=74') {
 $title = 'Portfolio: photos of the room Standard of hotel "Uyut" in Almaty';
 $h1title = 'Standard: photos';
 $keywords = 'portfolio photo room standard hotel uyut almaty';
 $description = 'Portfolio: photos of the room The standard of the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-14';
 $hreflang1 = 'hreflang="kk" href="http://www.hotel-uyut.kz/kz/gall.php?id=65"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=36"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=95"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/gall.php?id=75') {
 $title = 'Portfolio: photos of the room Standard №2 of hotel "Uyut" in Almaty';
 $h1title = 'Standard: photos';
 $keywords = 'portfolio photo room standard 2 hotel uyut almaty';
 $description = 'Portfolio: photos of the room The standard №2 of the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-14 ';
 $hreflang1 = 'hreflang="kk" href="http://www.hotel-uyut.kz/kz/gall.php?id=66"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/gall.php?id=39"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/gall.php?id=100"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/guest/?p=1') {

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/guest/?p=1"';

}
elseif ($_SERVER['REQUEST_URI'] === '/en/guest/?p=2') {

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/guest/?p=2"';

}
elseif ($_SERVER['REQUEST_URI'] === '/en/price-list114/') {
 $title = 'The cost of the hotel for a day, the price of a room in the hotel "Uyut" in Almaty, photo, reviews';
 $h1title = 'Prices of rooms in the hotel';
 $keywords = 'cost hotel day price room uyut almaty photo review';
 $description = 'The cost of the hotel for a day, the price of a room in the hotel "Uyut" in Almaty, photo, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/prays-para108/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/price-list-13/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/394/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/about-our-hotel113/') {
 $title = 'Information about hotel "Uyut" in Almaty, check-in at the hotel near the railway station';
 $h1title = 'Mini Business Class Hotel';
 $keywords = 'information hotel uyut almaty check-in railway station';
 $description = 'Information about the hotel "Uyut" in Almaty, check-in at the hotel near the railway station. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-12';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/bz-zhayly107/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/about-us-12/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/384/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/conference-halls117/') {
 $title = 'Conference halls for rent in hotel "Uyut" in the center of Almaty, prices, photo, reviews';
 $h1title = 'Rent of conference hall';
 $keywords = 'conference hall rent hotel uyut center almaty price photo review';
 $description = 'Conference halls for rent in hotel "Uyut" in the center of Almaty, prices, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-13';		 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/mzhls-zaldary/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/konference-hall-23/"';

}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/') {
 $title = 'Special offers from the hotel "Uyut" in Almaty';
 $h1title = 'Special offers from the hotel';
 $keywords = 'special offer hotel uyut almaty';
 $description = 'Special offers from the hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-14';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/actions/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/actions/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/actions/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/services/') {
 $title = 'Services of hotel "Uyut" in Almaty';
 $h1title = 'Services of hotel complex';
 $keywords = 'Service hotel uyut almaty';
 $description = 'Services of hotel "Uyut" in Almaty. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-15';	 

 $hreflang1 = 'hreflang="kk" href="https://www.hotel-uyut.kz/kz/yzmet-krsetuler/"';

 $hreflang2 = 'hreflang="ru" href="https://www.hotel-uyut.kz/services-14/"';

 $hreflang3 = 'hreflang="zh" href="https://www.hotel-uyut.kz/zh/395/"';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/book-a-luxe-room-package643/') {
 $description = 'Package "Book a Luxe Room" In the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';     
}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/children-package642/') {
 $description = 'Package "Children" in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11'; 
 $keywords = 'children\'s package';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/favorable-package640/') {
    $keywords = "profitable package";
    $description = 'Favorable package in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';     
}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/happy-birthday-special-offer645/') {
    $description = 'Special offer "Happy birthday" in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';     
}elseif ($_SERVER['REQUEST_URI'] === '/en/actions/offers-for-families-who-adopts-the-children-from-kazakhstan-special-offer640/') {
    $description = 'Special Offer for families in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';     
}elseif ($_SERVER['REQUEST_URI'] === '/en/actions/our-colleague-special-offer646/') {
    $description = 'Special offer "Our colleague" in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11'; 
    $keywords = "special offer our colleague"; 
    $title = "Special offer Our colleague in the hotel Uyut in Almaty - description, photo, reviews";
}elseif ($_SERVER['REQUEST_URI'] === '/en/actions/permanent-guest-program647/') {
    $description = 'Program of a regular guest in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';  
    $keywords = "regular guest program";   
    $title = 'Regular guest program at the hotel Uyut in Almaty - description, photo, reviews';
}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/stay-for-three-nights-and-pay-for-two-nights-only-package644/') {
    $description = 'Package "Live three nights, paying two!" In the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';   
    $keywords = "pay for two nights live three nights";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/actions/weekend-package641/') {
    $description = 'Weekend package in the hotel "Uyut" in Almaty - description, photos, reviews. Please contact the most modern hotel complex with a high level of service. Hotel "Uyut" is waiting for you! Call: (727) 279-51-11';     
}
elseif ($_SERVER['REQUEST_URI'] === '/en/hotel-rules-and-regulations/') {
    $keywords = "hotel rules";
    $description = 'Please read the rules of the hotel "Uyut"'; 
    $title = "Hotel Uyut rules and regulations";    
}
elseif ($_SERVER['REQUEST_URI'] === '/en/banqueting-hall/') {
    $title = "Banquet halls in the restaurant 'Uyut' - rent a hotel cafe in the center in Almaty at an inexpensive price";
    $keywords = "banquet halls restaurant cosiness rent banquet hall cheap hotel almaty";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/certificates/') {
    $keywords = "certificates hotel restaurant uyut";
}

elseif ($_SERVER['REQUEST_URI'] === '/en/restaurant684/') {
    $keywords = "restaurant Uyut cafe banquet room Almaty";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/our-history/') {
    $keywords = "our history";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/dry-cleaning/') {
    $keywords = "dry cleaning laundry services";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/transfer_664/') {
    $keywords = "airport transfer services to the hotel";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/transfer_664/') {
    $keywords = "conditions of hotel reservation uyut";
}
elseif ($_SERVER['REQUEST_URI'] === '/en/booking-conditions/') {
    $keywords = "	conditions of hotel reservation uyut";
}
?>