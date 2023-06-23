<?php

include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");

class Catalog extends Helper{
	// Инфо для установки
	public $info_module			= 'Модуль каталог';
	// версия
	public $lang 				= 'ru';
	// заголовки
	public $meta_info			= array();
	// id блока
	public $id_section;
	// id модуля
	public $id_module;
	// вывод по категориям
	public $block 				= false;
	// ссылка при блоках
	public $name_link 			= 'catalog';
	// название модуля
	public $title 				= '';
	// элементов на страницу
	public $per_page			= 10;
	// показывать дату (1,0)
	public $show_date			= 1;
	// показывать картинку (1,0)
	public $show_img			= 1;
	// показывать Заголовок (1,0)
	public $show_header			= 1;
	// показывать анонс (1,0)
	public $show_anounce		= 1;
	// количество новостей для вывода на главную
	public $show_count_catalog		= 3;
	// показывать ссылку подробнее (1,0)
	public $show_link_more		= 1;
	// Название ссылки подробнее
	public $text_link_more		= 'Подробнее';
	// Название ссылки Вернуться назад 
	public $text_link_back		= 'Вернуться назад';
	// подключить комментарии (Модуль должен быть установлен) (1,0)
	public $show_comment		= 0;
	
	
	
	//поля для модуля для блока
	public $fields 		  =	array(
		'catalog_act'		=> 'tinyint(4)',
		'catalog_sort'		=> "int(11)",
		'catalog_name'		=> "varchar(255)",
		'catalog_img'		=> "text",
		'catalog_anounce'	=> 'text',
		'catalog_text'		=> 'longtext'
	);
	
	//поля для модуля для optiona
	public $option_fields = array(
		'catalog_act'		=>array(
			"type_field"		=> 'i7',
			"select_fields"		=> "1",
			"name_ru"			=> "Активность",
			"id_sort"			=> 10
		),
		'catalog_sort'		=>array(
			"type_field"		=> 'i5',
			"select_fields"		=> "1",
			"required_fields"	=> "0",
			"name_ru"			=> "Сортировка",
			"width"				=> "30",
			"id_sort"			=> 20
		),
		'catalog_name'		=>array(
			"type_field"		=> 'i1',
			"select_fields"		=> "1",
			"required_fields"	=> "1",
			"name_ru"			=> "Название",
			"width"				=> "30",
			"id_sort"			=> 30,
			"translit"			=> 1,
			"search"			=> 1
		),
		'catalog_img'		=>array(
			"type_field"		=> 'i11',
			"select_fields"		=> "1",
			"required_fields"	=> "0",
			"name_ru"			=> "Картинка",
			"width"				=> "0",
			"height"			=> "0",
			"size_file"			=> 3000000,
			"format_file"		=> "jpg|gif|png|jpeg|JPG",
			"type_resize"		=> "landscape",
			"w_resize_small"	=> 197,
			"h_resize_small"	=> 197,
			"w_resize_big"		=> 310,
			"h_resize_big"		=> 310,
			"id_sort"			=> 40
		),
		'catalog_anounce' 	=>array(
			"type_field"		=> 'i6',
			"select_fields"		=> "0",
			"required_fields"	=> "0",
			"name_ru"			=> "Анонс",
			"width"				=> "30",
			"height"			=> "5",
			"id_sort"			=> 40
		),
		'catalog_text'		=>array(
			"type_field"		=> 'i10',
			"select_fields"		=> "0",
			"required_fields"	=> "0",
			"name_ru"			=> "Текст",
			"width"				=> "700",
			"height"			=> "400",
			"id_sort"			=> 50,
			"search"			=> 1
		)
	);
	// парамметры модуля
	public $params_fields = array(
		'per_page'			=> array(
			"type"		=> 'i1',
			"name"		=> "Количество элементов на страницу",
			"value"	=> "10"
		),
		'text_link_more'	=> array(
			"type"		=> 'i1',
			"name"		=> "Название ссылки Подробнее",
			"value"	=> "Подробнее"
		),
		'text_link_back'	=> array(
			"type"		=> 'i1',
			"name"		=> "Название ссылки Вернуться назад",
			"value"	=> "Вернуться назад"
		),
		
		'show_img'			=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать картинку",
			"value"	=> "1"
		),
		'show_header'		=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать заголовок",
			"value"	=> "1"
		),	
		'show_anounce'		=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать краткое описание",
			"value"	=> "1"
		),
		'show_link_more'	=> array(
			"type"		=> 'i7',
			"name"		=> "Отображать ссылку подробнее",
			"value"	=> "1"
		),
		'show_comment'		=> array(
			"type"		=> 'i7',
			"name"		=> "Подлючить комментарии (модуль должен быть установлен)",
			"value"	=> "1"
		)
	);							  
	
	
	public function __construct(){
		$this->get_params();
		parent::__construct();
		
	}
	
	function get_name_for_bread($translit){
		$s = mysql_query("select name_block from i_block where translit_name = '$translit' limit 1");
		$r = mysql_fetch_array($s);

		if ($translit=='catalog'){
			if ($this->lang=='ru'){
				return 'Размещение';
			}
			if ($this->lang=='kz'){
				return 'Орналастыру';
			}
			if ($this->lang=='en'){
				return 'Rooms';
			}
			if ($this->lang=='zh'){
				return '布局';
			}
		}
		
		return $r["name_block"];
	}
	
	public function get_bread($title){
		$this->parse_url($_SERVER['REQUEST_URI']);
		$str = array();
		if ($this->lang=='ru'){
			$str[] = '<a href="/">Гостиница «Уют»</a> / ';
			
		}
		if ($this->lang=='kz'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'':'').'/">Басты бет</a> / ';
			
		}
		if ($this->lang=='en'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'':'').'/">Home</a> / ';
			
		}
		if ($this->lang=='zh'){
			$str[] = '<a href="'.($this->lang!='ru'?'/'.$this->lang.'':'').'/">Home</a> / ';
			
		}
		

		$sql = "select * from i_block_elements where translit_name='".$this->url["block"]."' and version='".$this->lang."' and catalog_act=1 limit 1";
		//echo $sql;
		$s = mysql_query($sql);
		if ($s && mysql_num_rows($s)==1){
			$r = mysql_fetch_array($s);
			$this->url["element"] = $r["translit_name"];
			$str[] = '<a href="'.($this->lang=='ru'?'/'.$this->url["module"].'/':'/'.$this->lang.'/'.$this->url["module"].'/').'">'.$this->get_name_for_bread($this->url["module"]).'</a> / ';
		}else{
			$str[] = '<span>'.$this->get_name_for_bread($this->url["module"]).'</span>  ';
		}
		
		if ($this->url["element"])
		{
			$str[] = '<span>'.$r["catalog_name"].'</span> ';
		}	
		echo join("\n",$str);
	}
	
	// получение парамметров
	function get_params(){
		global $ob;
		$s = mysql_query("select * from i_block where translit_name='catalog'");	
		$r = mysql_fetch_array($s);


		if(!empty($r['page_name']))$this->title = $r["page_name"];
		else $this->title = $r["name_block"];

		$this->meta_info["keyw"]=$r["page_keyw"];
		$this->meta_info["desc"]=$r["page_desc"];
		$this->meta_info["h1title"]=$r["h1title"];


		$this->id_section = $r["id"];
		$this->id_module = $r["id"];
		$ss = mysql_query("select * from i_block where id_section=".$r["id"]." and act_block=1 and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
			$this->block = true;
		$ss = mysql_query("select * from i_params where id_block='".$this->id_module."' and version='$this->lang'");
		if ($ss && mysql_num_rows($ss)>0)
		{
			while($rr = mysql_fetch_array($ss))
			{
				if ($rr["name_en"] == 'per_page' 		&& $rr["value"]!='') $this->per_page 		= $rr["value"];
				if ($rr["name_en"] == 'text_link_more' 	&& $rr["value"]!='') $this->text_link_more	= $rr["value"];
				if ($rr["name_en"] == 'text_link_back' 	&& $rr["value"]!='') $this->text_link_back	= $rr["value"]; 
				if ($rr["name_en"] == 'show_img' 		&& $rr["value"]!='') $this->show_img 		= $rr["value"]; 
				if ($rr["name_en"] == 'show_header'		&& $rr["value"]!='') $this->show_header		= $rr["value"]; 
				if ($rr["name_en"] == 'show_anounce' 	&& $rr["value"]!='') $this->show_anounce 	= $rr["value"]; 
				if ($rr["name_en"] == 'show_link_more'	&& $rr["value"]!='') $this->show_link_more	= $rr["value"]; 
				if ($rr["name_en"] == 'show_comment' 	&& $rr["value"]!='') $this->show_comment	= $rr["value"]; 	
			}	
		}
	}
	
	// обработка запроса
	public function index(){
		
		$this->parse_url($_SERVER['REQUEST_URI']);
		// die($this->url['block']);

		$sql = "select * from i_block_elements where translit_name='".$this->url["block"]."' and version='".$this->lang."' and catalog_act=1 limit 1";
		//echo $sql;
		$s = mysql_query($sql);
		if ($s && mysql_num_rows($s)==1){
			$r = mysql_fetch_array($s);
			$this->url["element"] = $r["translit_name"];
		}

		// выводим текст новости
		if ($this->url["element"]!==false)	
		{
			$this->get_catalog($this->url["element"], $this->get);	
			
		}
		else
		{
		// если есть категории
			if ($this->block===true)
			{
				
				
				
			// если послано название категории то выводим их
				if ($this->url["block"]===false)
				{
					$this->get_list_block($this->id_section, $this->get);
				}
				else
				{
				// выводим новости категории
					$this->get_list_catalog($this->url["block"], $this->get);
				}
			}
			else
			{
			// выводим новости категории
				$this->get_list_catalog('catalog', $this->get);
			}
			
		}
		
		
		
		
		
		
		
	}
	
	// вывод новостей постранично
	public function get_list_catalog($name, $params){
		
		global $api;
		// получаем ссылку 
		$part_url=$this->get_url_part($_SERVER['REQUEST_URI']);

		// die($this->url['block']);
		// если категория
		if ($this->block===true)
		{
			
			
		
			$s=mysql_query("select * from i_block where translit_name='$name' 
				and act_block=1 and (version='$this->lang' or version='all') limit 1");	
			if ($s)
			{
				$r=mysql_fetch_array($s);
				$id_block=$r["id"];	
				$title=$r["name_block"];
			}
			
		}
		else
		{
			$id_block=$this->id_section;
			$title=$this->title;	
		}
		
		if ($this->lang == 'ru')
		{
			$link_more = 'Подробнее';
			$link_bron = 'Забронировать';
		}
		else if ($this->lang == 'kz')
		{
			$link_more = 'Толығырақ';
			$link_bron = 'Орын броньдау';
		}
		else if ($this->lang == 'en')
		{
			$link_more = 'Read more';
			$link_bron = 'Book now';
		}
		else if ($this->lang == 'zh')
		{
			$link_more = '详细信息';
			$link_bron = '预定';
		}
		
		# Инициализируем параметры класса Pages
		$api->Pag->setvars($this->lang, 
			$part_url[0], 
			@$part_url[1], 
			mysql_result(mysql_query("SELECT COUNT('id') FROM `i_block_elements` 
				WHERE `id_section`='$id_block' AND `version`='$this->lang' and catalog_act=1"), 0), 
			$this->per_page, 
			$params['p']);
		
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
			WHERE `id_section`='$id_block' AND `version`='$this->lang' and catalog_act=1 
			ORDER BY `sort2` ASC LIMIT ".$api->Pag->start_from.", $this->per_page");
		
		@$this->title["title"]=@$title;
		$this->header_page($this->lang,$this->meta_info);
		
		if (mysql_num_rows($query)>0)
		{
			$this->get_list_sub_block($id_block, '').'<br />';
			//echo $api->Pag->pages_gen().'<br />';
			// echo '<br>';
			$selector = array();
			$selector['kz']['choose'] = 'Валютаны таңдаңыз';
			$selector['ru']['choose'] = 'Выберите валюту';
			$selector['en']['choose'] = 'Select currency';
			$selector['zh']['choose'] = '选择货币';
			$selector['kz']['dollars'] = "Доллар";
			$selector['ru']['dollars'] = "Доллары";
			$selector['en']['dollars'] = "USD";
			$selector['zh']['dollars'] = "USD";
			$selector['kz']['rubli'] = "Рубль";
			$selector['ru']['rubli'] = "Рубли";
			$selector['en']['rubli'] = "RUR";
			$selector['zh']['rubli'] = "RUR";
			$selector['kz']['euro'] = "Евро";
			$selector['ru']['euro'] = "Евро";
			$selector['en']['euro'] = "EURO";
			$selector['zh']['euro'] = "EURO";
			?>
				<table style="width: 100%; height: 40px; ">
					<!-- <td>Вы можете выбрать валюту для перерассчета</td> -->
					<td style="float: right; margin-right:30px;"> <select onchange="changecurrency(this.value)">
							<option disabled="" selected="true"><?=$selector[$this->lang]['choose']?></option>
							<option value="USD"> <?=$selector[$this->lang]['dollars']?></option>
							<option value="RUR"> <?=$selector[$this->lang]['rubli']?></option>
							<option value="EUR"> <?=$selector[$this->lang]['euro']?></option>
					</select> </td>
					
				</table>
			<?
			
				
			
			while($r=mysql_fetch_array($query))
			{
				$name=$r["catalog_name"];
				$link=$part_url[0].$r["translit_name"].'/';
				$img=$r["catalog_img"]!=''?'<a class="img" href="'.$link.'"><img src="/upload/images/big/'.$r["catalog_img"].'" /></a>':'';
				$anounce=(stripslashes($r["catalog_anounce"]));
				// $anounce=(stripslashes($r["catalog_anounce"]));
				
				?>

				<div class="catalog">
					<table width="100%">
						<tr>
							<?
                                // картинка
							if ($this->show_img==1){
								if ($r["catalog_img"]!='') {
									?>
									<td valign="top" width="340"><?=$img?></td>
									<?	
								}
							}
							?>
							<td itemscope="" itemtype="http://schema.org/Event" align="left" valign="top">
								<?
                                        // название новости
								if ($this->show_header==1){
									?>
									<p style="font-size: 16pt;" class="namenomer"><a itemprop="name" href="<?=$link?>"><?=$name?></a></p>
									<?
								}
								?>
								<?
                                        // анонс новости
								if ($this->show_anounce==1){
									?>
									<div class="anounce">
										<?=$anounce?>
										<? if ($this->show_link_more==1){ ?><a href="<?=$link?>" class="more-link"><?=$link_more?></a><? } ?>
									</div>
									<?
								}
								?>
							</td>
						</tr>
					</table>

					<?
                            // редактирование если авторизован
					if ($this->check_admin())
					{
						$this->edit($this->lang, 'element', $r["id"]);
					}
					?>
				</div><br />

				<?	
			}
			if(isset($_COOKIE['currency'])){


			$new_cur = getCurrency();	
			
			
			
			
			?>

			<script type="text/javascript">
						let all_prices = document.getElementsByClassName("price_value");
						let arr = Array();
						for (i = 0; i<all_prices.length; i++){
							let current_element = all_prices[i].parentElement;
							current_element.style.marginLeft = '-40px';
							let new_el = document.createElement('p');
							current_element.style.display = 'flex';
							<? echo 'let current_new_price = parseInt(parseInt(all_prices[i].innerHTML)/'.$new_cur[$_COOKIE['currency']]['description'].');';?>
							<? echo 'let new_curs = "'.$new_cur[$_COOKIE['currency']]['title'].'";'; ?>
							// alert(current_new_price);
							new_el.className = "price_value";
							let new_text = "=> "+current_new_price+new_curs;
							new_el.innerHTML = new_text;
							// console.log(new_el);
							arr[i] = new_el;
							// current_element.innerHTML = 'hhe';
							// all_prices[i*2].parentElement.appendChild(arr[i]);





						}
						all_prices[0].parentElement.appendChild(arr[0]);
						all_prices[2].parentElement.appendChild(arr[1]);
						all_prices[4].parentElement.appendChild(arr[2]);
						all_prices[6].parentElement.appendChild(arr[3]);
						all_prices[8].parentElement.appendChild(arr[4]);
						all_prices[10].parentElement.appendChild(arr[5]);
						all_prices[12].parentElement.appendChild(arr[6]);
						all_prices[14].parentElement.appendChild(arr[7]);
						all_prices[16].parentElement.appendChild(arr[8]);
						all_prices[18].parentElement.appendChild(arr[9]);

						
						// for(i = 0; i < all_prices.length; i++){
						// 	all_prices[i].parentElement.appendChild(arr);
						// }


					</script>

			<?
			}
			
			if($_SERVER['REQUEST_URI'] == '/catalog/'){
			?>
			
				<div class="catalogText">
				<h1 style="font-size: 20px; font-weight: 700;">Снять гостиницу в Алматы – Забронировать номер в «Отеле УЮТ» в центре города Алматы рядом с горами и парками</h1>
					<p>Гостиничный  комплекс бизнес класса «Уют» расположен в живописном тихом районе Южной столицы Казахстана.  К услугам гостей, решивших <strong>заказать номер в отеле</strong>, оптимальное размещение в самом центре <strong>Алматы</strong>, развитая городская инфраструктура, возможность увидеть достопримечательности и <strong>купить</strong> сувениры, быстро и недорого добраться до международного аэропорта или железнодорожного вокзала. Приглашаем вас <strong>снять номер в гостинице</strong> «Уют» <strong>на ночь, на день, на сутки</strong> или <strong>на неделю</strong> – вы почувствуете себя желанным гостем в одном из самых ярких городов континента!</p>
					
					<h2 style="font-size: 20px; font-weight: 700;">Забронировать гостиницу в Алматы для проведения бизнес-мероприятия</h2>
					
					<p>Наши клиенты - <strong>компании</strong>, арендующие у нас конференц-зал (как <strong>на день</strong> или <strong>на сутки</strong>, так и <strong>на неделю</strong>, при необходимости), переговорную комнату или те из них, чьи <strong>специалисты</strong> приезжают в <strong>Алматы</strong> в деловые командировки. Предлагаемые нами, оснащенные по последнему слову техники конференц-залы способны вместить от 20 до 100 человек, участвующих в мероприятии. Вы можете <strong>заказать</strong> гостиницу и в качестве места проведения корпоративного или личного торжества, используя наш уютный банкетный зал на 80 персон. </p>
					<h3 style="font-size: 20px; font-weight: 700;">Снять номер в гостинице в Алматы в центре города по лояльной (недорогой) цене</h3>
					<p><strong>Снять номера в гостинице</strong> для командированных сотрудников, направленных на <strong>производство на неделю</strong> или для ведения переговоров всего <strong>на день</strong>, это намного выгоднее, чем <strong>снять мини-отель</strong>: мы предлагаем демократичные цены и максимальный уровень комфорта!</p>
					
					<h4 style="font-size: 20px; font-weight: 700;">Снять номер в отеле «Уют» в Алматы онлайн через сайт - быстро, просто, комфортно и недорого</h4>
					
					<p>Наша гостиница располагает роскошным номерным фондом в сотню с небольшим номеров категорий «стандарт», «полулюкс», «комфорт де люкс» и «люкс», оформленных в сдержанном европейском стиле и обставленных эргономичной мебелью. Прямо со страниц этого сайта вы можете выбрать и заказать номер в отеле <strong>на ночь, на день, на сутки</strong> и на более продолжительный срок, расплатившись удобным для вас способом (наличный или безналичный расчет). </p>
					
					<h5 style="font-size: 20px; font-weight: 700;">Забронировать номер в бизнес отеле Алматы «Уют»</h5>
					
					<p><strong>Сняв номер в отеле</strong>, вы получаете не только идеально обставленную комнату с климат-контролем, но и доступ к дополнительным платным сервисам, включая круглосуточное обслуживание номеров, услуги бизнес-центра, VIP-сауна, организация и проведение экскурсий, услуги химчистки и прачечной. <strong>Заказав номер в отеле</strong>, вы становитесь нашим гостем на все время пребывания:<br>
					Время заезда - 14.00<br>
					Время выезда - 12.00<br>
					Даже если вы приехали в <strong>Алматы</strong> всего <strong>на день</strong>, – по работе или велению души - отель «Уют» гостеприимно примет вас <strong>на ночь</strong>!</p>
					
					<h6 style="font-size: 20px; font-weight: 700;">Контакты гостиницы УЮТ для бронирования номеров в Алматы: контакты и телефоны бронирования</h6>
<p style="margin-top: 15px;"><strong>Наш адрес:</strong></p>
<p>Улица Гоголя 127/1 (пересечение с улицей Сейфуллина), Алматы</p>
<p><strong>Телефоны:</strong></p>
<p><a href="tel:+77272795111">+7 (727) 279-51-11</a>, <a href="tel:+77272795511">+7 (727) 279-55-11</a>;</p>
<p>Мобильный: <a href="tel:+77772183132">+7-777-218-31-32</a>;</p>
<p>Ресторан: <a href="tel:+77717091109">+7-771-709-11-09</a>;</p>
<p>Бухгалтерия: <a href="tel:+77272791360">+7 (727) 279-13-60</a>;</p>
<p>Отдел бронирования: <a href="tel:+77272798735">+7 (727) 279-87-35</a>, <a href="tel:+77717091101">+7 771 709-11-01</a></p>
<p>Электронная почта:&nbsp;</p>
<p><a href="mailto:hotel_uyut@mail.ru">hotel_uyut@mail.ru</a>, <a href="mailto:reservation@hotel-uyut.kz">reservation@hotel-uyut.kz</a></p>
					
					<hr style="border-color: #EA9103; border-width: 0.5px; margin-bottom: 20px; margin-top: 20px;"><br>

										
				</div>
			<?
			}
			// вывод страниц
			//echo $api->Pag->pages_gen().'<br />';
		}
		else
		{
			echo '<br /><br /><p align="center"><strong>Нет элементов</strong></p><br /><br />';	
		}
		// добавление если авторизован
		if ($this->check_admin())
		{
			$this->add($this->lang, 'element', $id_block);
			$this->edit_params($this->lang, $this->id_module);
		}
		$this->footer_page($this->lang);
	}
	
	// списко категорий новостей
	public function get_list_block($ids, $params){
		$this->meta_info["title"]=$this->title;	;
		$this->header_page($this->lang,$this->meta_info);
		// die("hello");
		$s=mysql_query("select * from i_block where id_section=".$ids." and act_block=1 order by sort_block asc");
		if ($s)
		{
			while($r=mysql_fetch_array($s))
			{
				echo '<h2><a href="/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"].'/">'.$r["name_block"].'</a></h2>';
				// редактирование если авторизован
				if ($this->check_admin())
				{
					$this->edit( $this->lang, 'block', $r["id"]);
				}	
			}	
		}
		// добавление категории если авторизован
		if ($this->check_admin())
		{
			$this->add($this->lang, 'block', $ids);
			$this->edit_params($this->lang, $this->id_module);
		}
		$this->footer_page($this->lang);
	}
	// списко под категорий новостей
	public function get_list_sub_block($ids, $params){
		$s=mysql_query("select * from i_block where id_section=".$ids." and act_block=1 order by sort_block asc");
		if ($s && mysql_num_rows($s)>0)
		{
			$i=1;
			echo '<table width="100%"><tr>';
			while($r=mysql_fetch_array($s))
			{
				echo '<td align="center" valign="top" width="33%">';
				echo '<h3><a href="/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"].'/">'.$r["name_block"].'</a></h3>';
				// редактирование если авторизован
				if ($this->check_admin())
				{
					$this->edit($this->lang, 'block', $r["id"]);
				}
				echo '</td>';
				if ($i==3){echo '</tr><tr>'; $i=0;}	
				$i++;
			}
			echo '</table>';	
		}
		
		
	}
	function getCurrency(){
						return @parseCurrency( file_get_contents("https://www.nationalbank.kz/rss/rates.xml") );
					}
	
	// вывод страницы
	public function get_catalog($name, $params){
		global $ob;
		global $incom;
		
		if ($this->lang == 'ru')
		{
			$link_bakc = 'Вернуться назад';
			$com_name = 'Комментарии';
		}
		else if ($this->lang == 'kz')
		{
			$link_bakc = 'Қайта оралу';
			$com_name = 'Пiкiрлер';
		}
		else if ($this->lang == 'en')
		{
			$link_bakc = 'Back';
			$com_name = 'Comments';
		}
		else if ($this->lang == 'zh')
		{
			$link_bakc = '前';
			$com_name = '评论';
		}

		// проверка новости 
		$s=mysql_query("select * from i_block_elements where version='".$this->lang."' 
			and translit_name='".$name."' and catalog_name!='' and catalog_act=1 limit 1");
		if ($s && mysql_num_rows($s)==1)
		{
			$r=mysql_fetch_array($s);
			$this->meta_info["title"]=$r["catalog_name"];
			$this->meta_info["h1title"]=$r["catalog_name"];
			// var_dump($this->meta_info);
			$this->header_page($this->lang, $this->meta_info);
			$selector = array();
			$selector['kz']['choose'] = 'Валютаны таңдаңыз';
			$selector['ru']['choose'] = 'Выберите валюту';
			$selector['en']['choose'] = 'Select currency';
			$selector['zh']['choose'] = '选择货币';
			$selector['kz']['dollars'] = "Доллар";
			$selector['ru']['dollars'] = "Доллары";
			$selector['en']['dollars'] = "USD";
			$selector['zh']['dollars'] = "USD";
			$selector['kz']['rubli'] = "Рубль";
			$selector['ru']['rubli'] = "Рубли";
			$selector['en']['rubli'] = "RUR";
			$selector['zh']['rubli'] = "RUR";
			$selector['kz']['euro'] = "Евро";
			$selector['ru']['euro'] = "Евро";
			$selector['en']['euro'] = "EURO";
			$selector['zh']['euro'] = "EURO";
			?>
				<table style="width: 100%; height: 40px; border: ">
					<!-- <td>Вы можете выбрать валюту для перерассчета</td> -->
					<td style="float: right; margin-right:30px;"> <select onchange="changecurrency(this.value)">
							<option disabled="" selected="true"><?=$selector[$this->lang]['choose']?></option>
							<option value="USD"> <?=$selector[$this->lang]['dollars']?></option>
							<option value="RUR"> <?=$selector[$this->lang]['rubli']?></option>
							<option value="EUR"> <?=$selector[$this->lang]['euro']?></option>
					</select> </td>
					
				</table>
			<?
			
			
			echo stripslashes($r["catalog_text"]);

					$currency = getCurrency();
					// echo "hello".$currency[$_COOKIE['currency']]['description'];
			
		
					$usd = '';
					$rur = '';
					$eur = '';
					if(is_array($currency))
					{
						$usd = $currency['USD']['description'];
						$rur = $currency['RUR']['description'];
						$eur = $currency['EUR']['description'];
					}
					
					
					
				
					
			// if($this->lang!="kz"){
					if(isset($_COOKIE['currency'])) {
						?>
					<style type="text/css">
						.single{
							width: 200%;
							display: flex;
							margin-left: -50px !important;
						}
						.double{
							width: 200%;
							display: flex;
							margin-left: -50px !important;
						}
						 /*.price{*/
							/*margin-right: -20px;*/
						/*}*/
						.value{
							margin: 0px 5px 0px 5px;
						}
					</style>
					<?

				echo "<script> 
						let price_kzt = parseInt(document.getElementsByClassName('single')[0].children[0].innerHTML);
						// alert(price_kzt);
						let chosen_price = parseInt(price_kzt/".$currency[$_COOKIE['currency']]['description'].");
						let single_app = document.createElement('span');
						let tag = document.createElement('p');
						tag.innerHTML = '';
						let x = '=> ' + chosen_price;
						// let x = '|".$currency[$_COOKIE['currency']]['description']." ';
						let y = document.createElement('p');
						y.innerHTML = ' ".$currency[$_COOKIE['currency']]['title']."';

						single_app.innerHTML = x;
						single_app.className = 'value';
						document.getElementsByClassName('single')[0].appendChild(tag);
						document.getElementsByClassName('single')[0].appendChild(single_app);
						document.getElementsByClassName('single')[0].appendChild(y);
				  </script>";
				  echo "<script> 
						let price_kzt_d = parseInt(document.getElementsByClassName('double')[0].children[0].innerHTML);
						// alert(price_kzt_d);
						let chosen_price_d = parseInt(price_kzt_d/".$currency[$_COOKIE['currency']]['description'].");
						let single_app_d = document.createElement('span');
						let tag_d = document.createElement('p');
						tag_d.innerHTML = '';
						let x_d = '=> ' + chosen_price_d;
						// let x = '|".$currency[$_COOKIE['currency']]['description']." ';
						let y_d = document.createElement('p');
						y_d.innerHTML = ' ".$currency[$_COOKIE['currency']]['title']."';

						single_app_d.innerHTML = x_d;
						single_app_d.className = 'value';
						document.getElementsByClassName('double')[0].appendChild(tag_d);
						document.getElementsByClassName('double')[0].appendChild(single_app_d);
						document.getElementsByClassName('double')[0].appendChild(y_d);
				  </script>";
					}
				// endif;


			// echo "<script>
			// var x= document.getElementsByClassName('single');
			// var i;
			// for(i=0; i<x.length;i++){
			// 	";



			// if($_COOKIE['currency'] == 'rur'){ echo "
			// 	document.getElementsByClassName('text')[0].innerHTML = 'Стоимость в рублях:  ';";}
			// else if($_COOKIE['currency'] == 'usd'){
			// 	echo "
			// 	document.getElementsByClassName('text')[0].innerHTML = 'Price in USD:  ';";
			// }

			// echo

			// 	"
			// 	console.log(document.getElementsByClassName('text')[0].innerHTML);
			// 	console.log(parseInt(x[i].children[0].innerHTML));"."

			// 	";
			// 	if($_COOKIE['currency']=='rur'){
			// 		echo "x[i].innerHTML ='<span itemprop=".'"price"'." class=".'"value"'." >' + parseInt(parseInt(x[i].children[0].innerHTML)/".$rur.")+'</span>'+' рублей';
			// }

			// </script>";
			// 	}
			// 	else if($_COOKIE['currency']=="usd"){
			// 		echo "x[i].innerHTML ='<span itemprop=".'"price"'." class=".'"value"'." >' + parseInt(parseInt(x[i].children[0].innerHTML)/".$usd.")+'</span>'+' USD';
			// }

			// </script>";
				// }


		// if($_COOKIE['currency']=="rur"){


				
		// 	echo "<script>
		// 	var x= document.getElementsByClassName('double');
		// 	var i;
		// 	for(i=0; i<x.length;i++){
		// 		console.log(parseInt(x[i].children[0].innerHTML));"."
				
		// 		x[i].innerHTML ='<span itemprop=".'"price"'." class=".'"value"'." >' + parseInt(parseInt(x[i].children[0].innerHTML)/".$rur.")+'</span>'+' рублей';
		// 	}

		// 	</script>";
		// }
		// else if($_COOKIE['currency']=="usd"){
		// 		echo "<script>
		// 	var x= document.getElementsByClassName('double');
		// 	var i;
		// 	for(i=0; i<x.length;i++){
		// 		console.log(parseInt(x[i].children[0].innerHTML));"."
				
		// 		x[i].innerHTML ='<span itemprop=".'"price"'." class=".'"value"'." >' + parseInt(parseInt(x[i].children[0].innerHTML)/".$usd.")+'</span>'+' USD';
		// 	}

		// 	</script>";

		// }
		// }
			echo '<p align="right"><a href="javascript:history.go(-1);">'.$link_bakc.'</a></p>';
			// редактирование если авторизован
			if ($ob->check_admin())
			{
				$this->edit($this->lang, 'element', $r["id"]);
			}
			if ($this->show_comment==1)
			{
				echo '<span style="font-size:16pt;">'.$com_name.'</span>';
				$incom->comment->get_form($this->lang,$r["id"]);
				$incom->comment->get_comment($this->lang,$r["id"]);	
			}
			$this->footer_page($this->lang);	
		}
		else
		{
			// если не найдено то показываем 404
			$this->show_404($this->lang);	
		}
	}
	
	public function get_catalog_main($lang, $limit, $ids=''){
		global $ob;
		global $api;
		if ($ids == '') $ids = $this->id_section; 
		// составляем запрос
		$query = mysql_query("select * from `i_block_elements` 
			WHERE `id_section`='$ids' AND `version`='$this->lang' and catalog_act=1 
			ORDER BY `catalog_date` DESC LIMIT ".$limit."");
		if ($query && mysql_num_rows($query)>0)
		{
			while($r=mysql_fetch_array($query))
			{
				$name=$r["catalog_name"];
				$link='/'.$this->lang.'/'.$this->name_link.'/'.$r["translit_name"];
				$img=$r["catalog_img"]!=''?'<a href="'.$link.'"><img src="/upload/images/small/'.$r["catalog_img"].'" width="50"></a>':'';
				$anounce=mb_substr(stripslashes($r["catalog_anounce"]),0,150,"UTF-8").'...';
				$date=$api->Strings->date($this->lang,$r["catalog_date"],'sql','datetext');
				?>
				<table width="100%"><tr>
					<td width="60"><?=$img?></td>
					<td align="left" valign="top">
						<span ><?=$date?></span>
						<p><a href="<?=$link?>"><?=$name?></a></p>
						<p style="padding-top:0px;"><?=$anounce?></p>
						<p><a href="<?=$link?>" ><?=$this->text_link_more?></a></p>
					</td>
				</tr></table>
				<?  // редактирование если авторизован
				if ($this->check_admin())
				{
					$this->edit($this->lang, 'element', $r["id"]);
				}
			}
		}
	}
	
	// редактирование
	function edit($lang,$block, $id){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Правка';
		echo '<div>';
		echo '<a href="javascript:edit_'.$block.'(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '<a href="javascript:delete_'.$block.'(\''.$lang.'\','.$id.')">Удалить</a>';
		echo '</div>';
		echo '</div>';
	}
	
	// добавление
	function add($lang, $block, $id ){
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Добавление';
		echo '<div>';
		echo '<a href="javascript:add_'.$block.'(\''.$lang.'\','.$id.')">Добавить '.($block=='block'?'раздел':'элемент').'</a>';
		echo '</div>';
		echo '</div>';
	}
	// редактировать парамметры
	function edit_params($lang,$id)
	{
		echo '<div class="admin_pravka" onmouseover="show_el(jQuery(this).find(\'div\'));">Парамметры';
		echo '<div>';
		echo '<a href="javascript:edit_params(\''.$lang.'\','.$id.')">Редактировать</a>';
		echo '</div>';
		echo '</div>';
	}
	
	
	// установка модуля	
	function install(){
		
		$tmp_file = '/tmpl/catalog.tpl';
		$ext_file = '/ru/catalog.php';
		
		foreach ($this->fields as $k=>$v)
		{
			$query=mysql_query("ALTER TABLE i_block_elements ADD ".$k." ".$v."");
		}
		$sel=mysql_query("select * from i_block where translit_name='catalog'");
		if ($sel && mysql_num_rows($sel)==0)
		{
			$s=mysql_query("insert into i_block (id_section,version,act_block,name_block,info_block,sort_block,translit_name) 
				values (0,'all','1','Каталог','Модуль Каталог','50','catalog')");	
			if ($s)
			{
				$s=mysql_query("select max(id) as idd from i_block");	
				$r=mysql_fetch_array($s);
				
				foreach ($this->option_fields as $k=>$v)
				{
					$ss=mysql_query("insert into i_option (category,category_id, name_en) 
						values ('block_elements','".$r["idd"]."','".$k."')");
					
					$sss=mysql_query("select max(id) as idd from i_option");	
					$rrr=mysql_fetch_array($sss);
					
					foreach ($v as $q=>$w)
					{
						mysql_query("update i_option set $q='$w' where id=".$rrr["idd"]."");
					}
				}
				
				
				foreach ($this->params_fields as $k=>$v)
				{
					$ss=mysql_query("insert into i_params (id_block, name_en, version) 
						values ('".$r["idd"]."','".$k."', 'ru')");
					
					$sss=mysql_query("select max(id) as idd from i_params");	
					$rrr=mysql_fetch_array($sss);
					
					foreach ($v as $q=>$w)
					{
						mysql_query("update i_params set $q='$w' where id=".$rrr["idd"]."");
					}
					
					$ss=mysql_query("insert into i_params (id_block, name_en, version) 
						values ('".$r["idd"]."','".$k."', 'kz')");
					
					$sss=mysql_query("select max(id) as idd from i_params");	
					$rrr=mysql_fetch_array($sss);
					
					foreach ($v as $q=>$w)
					{
						mysql_query("update i_params set $q='$w' where id=".$rrr["idd"]."");
					}
					
					$ss=mysql_query("insert into i_params (id_block, name_en, version) 
						values ('".$r["idd"]."','".$k."', 'en')");
					
					$sss=mysql_query("select max(id) as idd from i_params");	
					$rrr=mysql_fetch_array($sss);
					
					foreach ($v as $q=>$w)
					{
						mysql_query("update i_params set $q='$w' where id=".$rrr["idd"]."");
					}
				}
			}
		}
		$fr = fopen($_SERVER['DOCUMENT_ROOT'].$tmp_file, "r");
		$fw = fopen($_SERVER['DOCUMENT_ROOT'].$ext_file, "w");
		while(!feof($fr))
		{
			$line = fgets($fr, 10240);
			fwrite($fw, $line);
		}
		fclose($fr);
		fclose($fw);
	}
}
?>