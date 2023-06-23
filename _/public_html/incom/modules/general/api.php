<?
# Название: API
# Версия: 1.0
# Разработал Дмитрий Тригуб aka ShadoW (c) 2010
# --------------------------------------------------------

# Корневой класс
$api = new API;
class API
{
	public $Pages;
	public $Pag;
	public $CPages;
	public $Strings;
	public $Users;
	
	# Подгрузка
	function __construct() 
	{
		$this->Pages 	= new Pages;
		$this->Pag 		= new Pagination;
		$this->CPages 	= new CPages;
		$this->Strings 	= new Strings;
		$this->Users	= new Users;
		$this->Basket	= new Basket;
	}
	
	# Выгрузка
	function __destruct()
	{
		unset($this->Pages);
		unset($this->Pag);
		unset($this->cPages);
		unset($this->Strings);
		unset($this->Users);
		unset($this->Basket);
	}	
}

# Класс страниц
class Pages
{
	private $lang;
	private $url;
	private $query;
	private $elements_count;
	private $per_page;
	private $page;

	public $pages;
	public $start_from;
	
		// Установка значений
	public function setvars($lang, $url, $query, $elements_count, $per_page, $page)
	{
		$this->lang				= $lang;
		$this->url 				= $url;
		$this->query			= @eregi_replace("&p=[[:digit:]]{1,100}", "", $query);
		$this->query			= @eregi_replace("p=[[:digit:]]{1,100}", "", $this->query);
		$this->elements_count 	= intval($elements_count);
		$this->per_page 		= intval($per_page);
		$this->page 			= intval($page);
		
		$this->count_pages();
		$this->set_page();
		$this->set_start();
	}	
	
		// Подсчет страниц
	private function count_pages()
	{
		$this->pages = ceil($this->elements_count / $this->per_page);
	}
	
		// Начинасть с
	private function set_start()
	{
		$this->start_from = ($this->page * $this->per_page) - $this->per_page;
		if ($this->start_from < 0) { $this->start_from = 0; }
	}
	
		// Установка текущей страницы
	private function set_page()
	{
		if (($this->page == '') || ($this->page > $this->pages))
		{
			$this->page = 1;
		}	
	}
	
		// Генератор страниц
	public function pages_gen()
	{
			// Языковой массив
		$lang_mass = Array(
			'ru'=>Array('page'=>'Страница', 'from'=>'из'),
			'en'=>Array('page'=>'Page', 'from'=>'from'),
			'zh'=>Array('page'=>'Page', 'from'=>'from'),
			'kz'=>Array('page'=>'Бет', 'from'=>'')
		);

			// Вывод
		$html = $seoText . '
		<table width="100%" cellpadding="7" cellspacing="0">
		<tr>
		<td width="200">'.$lang_mass[$this->lang]['page'].' <b>'.$this->page.'</b> '.($this->lang!='kz'?''.$lang_mass[$this->lang]['from'].' <b>'.$this->pages.'</b>':'').'</td>
		<td align="right" style=" text-align:right">';

			# Диапазон
		$diap_index = ceil($this->page / 10);
		$diap_start = (($diap_index * 10)-10)+1;
		$diap_end	= $diap_start + 10;


			# Если не начало диапозона
		if ($this->page > 10)
		{
			if ($diap_index > 2)
			{
				$html .=  '<a class="page_link" href="'.$this->url.'">1</a> ... ';
			}
			$html .= '<a class="page_link" href="'.$this->url.'?'.($this->query != '' ? $this->query."&p=".($diap_start - 10) : "p=".($diap_start - 10)).'">'.($diap_start - 10).'</a> ...';
		}

			# Если страница последняя из диапазона то меняем диапазон
		if ($this->page == $diap_end)
		{
			$diap_start = $diap_start + 10;
			$diap_end   = $diap_end + 10;
		}

		for($i=$diap_start; $i<=$diap_end; $i++)
		{
			if ($i <= $this->pages)
			{
				if ($i != $this->page)
				{
					$html .= '&nbsp;&nbsp;<a class="page_link" href="'.$this->url.'?'.($this->query != '' ? $this->query."&p=$i" : "p=$i").'">'.$i.'</a>';
				}
				else
				{
					$html .= '&nbsp;&nbsp;<span style="font-size: 20px;" class="page_set">'.$i.'</span>';
				}
			}
		}

			# Если не конец не деапозона
		if ($this->pages > $diap_end)
		{
			$html .= ' ... <a class="page_link" href="'.$this->url.'?'.($this->query != '' ? $this->query."&p=$this->pages" : "p=$this->pages").'">'.$this->pages.'</a>';
		}


		$html .= '</td>
		</tr>
		</table>';
		
		return $html;
	}
}



# Класс страниц
class Pagination
{
	private $lang;
	private $url;
	private $query;
	private $elements_count;
	private $per_page;
	private $page;

	public $pages;
	public $start_from;
	
		// Установка значений
	public function setvars($lang, $url, $query, $elements_count, $per_page, $page)
	{
		$this->lang				= $lang;
		$this->url 				= $url;
		$this->query			= @eregi_replace("&p=[[:digit:]]{1,100}", "", $query);
		$this->query			= @eregi_replace("p=[[:digit:]]{1,100}", "", $this->query);
		$this->elements_count 	= intval($elements_count);
		$this->per_page 		= intval($per_page);
		$this->page 			= intval($page);
		
		$this->count_pages();
		$this->set_page();
		$this->set_start();
	}	
	
		// Подсчет страниц
	private function count_pages()
	{
		$this->pages = ceil($this->elements_count / $this->per_page);
	}
	
		// Начинасть с
	private function set_start()
	{
		$this->start_from = ($this->page * $this->per_page) - $this->per_page;
		if ($this->start_from < 0) { $this->start_from = 0; }
	}
	
		// Установка текущей страницы
	private function set_page()
	{
		if (($this->page == '') || ($this->page > $this->pages))
		{
			$this->page = 1;
		}	
	}
	
		// Генератор страниц
	public function pages_gen()
	{
			// Языковой массив
		$lang_mass = Array(
			'ru'=>Array('page'=>'Страница', 'from'=>'из'),
			'en'=>Array('page'=>'Page', 'from'=>'from'),
			'zh'=>Array('page'=>'Page', 'from'=>'from'),
			'kz'=>Array('page'=>'Бет', 'from'=>'')
		);

			// Правки для SEO текста
		$seoText = '';

		if (empty($GLOBALS['seotext_crutch'])) {
			$GLOBALS['seotext_crutch'] = true;
		}
		else {

			$seoText = 'wГостиничный  комплекс бизнес класса «Уют» расположен в живописном тихом районе Южной столицы Казахстана.  К услугам гостей, решивших заказать номер в отеле, оптимальное размещение в самом центре Алматы, развитая городская инфраструктура, возможность увидеть достопримечательности и купить сувениры, быстро и недорого добраться до международного аэропорта или железнодорожного вокзала. Приглашаем вас снять номер в гостинице «Уют» на ночь, на день, на сутки или на неделю – вы почувствуете себя желанным гостем в одном из самых ярких городов континента! 
			<br /><br /><h2>Заказать гостиницу для проведения бизнес-мероприятия</h2>
			Наши клиенты - компании, арендующие у нас конференц-зал (как на день или на сутки, так и на неделю, при необходимости), переговорную комнату или те из них, чьи специалисты приезжают в Алматы в деловые командировки. Предлагаемые нами, оснащенные по последнему слову техники конференц-залы способны вместить от 20 до 100 человек, участвующих в мероприятии. Вы можете заказать гостиницу и в качестве места проведения корпоративного или личного торжества, используя наш уютный банкетный зал на 80 персон. 
			Снять номера в гостинице для командированных сотрудников, направленных на производство на неделю или для ведения переговоров всего на день, это намного выгоднее, чем снять мини-отель: мы предлагаем демократичные цены и максимальный уровень комфорта!
			<br /><br /><h2>Снять номер в отеле «Уют» - быстро, просто и недорого</h2>
			Наша гостиница располагает роскошным номерным фондом в сотню с небольшим номеров категорий «стандарт», «полулюкс», «комфорт де люкс» и «люкс», оформленных в сдержанном европейском стиле и обставленных эргономичной мебелью. Прямо со страниц этого сайта вы можете выбрать и заказать номер в отеле на ночь, на день, на сутки и на более продолжительный срок, расплатившись удобным для вас способом (наличный или безналичный расчет). 
			Сняв номер в отеле, вы получаете не только идеально обставленную комнату с климат-контролем, но и доступ к дополнительным платным сервисам, включая круглосуточное обслуживание номеров, услуги бизнес-центра, VIP-сауна, организация и проведение экскурсий, услуги химчистки и прачечной. Заказав номер в отеле, вы становитесь нашим гостем на все время пребывания:
			Время заезда - 14.00 
			Время выезда - 12.00
			Даже если вы приехали в Алматы всего на день, – по работе или велению души - отель «Уют» гостеприимно примет вас на ночь! 
			';
		}

		if ($lang!='ru') $seoText='';

			// Вывод$seoText = '';if (empty($GLOBALS['seotext_crutch'])) {$GLOBALS['seotext_crutch'] = true;}else {$seoText = '.....';}$html = $seoText . '....';
		$html = $seoText. '			
		<table width="100%" cellpadding="7" cellspacing="0">
		<tr>
		<td width="200">'.$lang_mass[$this->lang]['page'].' <b>'.$this->page.'</b> '.($this->lang!='kz'?''.$lang_mass[$this->lang]['from'].' <b>'.$this->pages.'</b>':'').'</td>
		<td align="right" style=" text-align:right">';

			# Диапазон
		$diap_index = ceil($this->page / 10);
		$diap_start = (($diap_index * 10)-10)+1;
		$diap_end	= $diap_start + 10;


			# Если не начало диапозона
		if ($this->page > 10)
		{
			if ($diap_index > 2)
			{
				$html .=  '<a class="page_link" href="'.$this->url.'">1</a> ... ';
			}
			if (($diap_start - 10)==1){
				$html .=  '<a class="page_link" href="'.$this->url.'">1</a> ... ';
			}else{
				$html .= '<a class="page_link" href="'.$this->url.'?'.($this->query != '' ? $this->query."&p=".($diap_start - 10) : "p=".($diap_start - 10)).'">'.($diap_start - 10).'</a> ...';
			}
		}

			# Если страница последняя из диапазона то меняем диапазон
		if ($this->page == $diap_end)
		{
			$diap_start = $diap_start + 10;
			$diap_end   = $diap_end + 10;
		}

		for($i=$diap_start; $i<=$diap_end; $i++)
		{
			if ($i <= $this->pages)
			{
				if ($i != $this->page)
				{
					if (($i)==1){
						$html .=  '<a class="page_link" href="'.$this->url.'">1</a> ';
					}else{
						$html .= '&nbsp;&nbsp;<a class="page_link" href="'.$this->url.'?'.($this->query != '' ? $this->query."&p=$i" : "p=$i").'">'.$i.'</a>';
					}

				}
				else
				{
					$html .= '&nbsp;&nbsp;<span style="font-size: 20px;" class="page_set">'.$i.'</span>';
				}
			}
		}

			# Если не конец не деапозона
		if ($this->pages > $diap_end)
		{
			$html .= ' ... <a class="page_link" href="'.$this->url.'?'.($this->query != '' ? $this->query."&p=$this->pages" : "p=$this->pages").'">'.$this->pages.'</a>';
		}


		$html .= '</td>
		</tr>
		</table>';
		
		return $html;
	}
}



# Класс страниц
class CPages
{
	private $lang;
	private $url;
	private $query;
	private $elements_count;
	private $per_page;
	private $page;

	public $pages;
	public $start_from;
	
		// Установка значений
	public function setvars($lang, $url, $query, $elements_count, $per_page, $page)
	{
		$this->lang				= $lang;
		$this->url 				= '/'.$lang.'/'.$url;
		$this->query			= @eregi_replace("/p/[[:digit:]]{1,100}", "", $query);
		$this->query			= @eregi_replace("p/[[:digit:]]{1,100}", "", $this->query);
		$this->query			= str_replace("name=", "", $this->query);
		$this->elements_count 	= intval($elements_count);
		$this->per_page 		= intval($per_page);
		$this->page 			= intval($page);
		
		$this->count_pages();
		$this->set_page();
		$this->set_start();
	}	
	
		// Подсчет страниц
	private function count_pages()
	{
		$this->pages = ceil($this->elements_count / $this->per_page);
	}
	
		// Начинасть с
	private function set_start()
	{
		$this->start_from = ($this->page * $this->per_page) - $this->per_page;
		if ($this->start_from < 0) { $this->start_from = 0; }
	}
	
		// Установка текущей страницы
	private function set_page()
	{
		if (($this->page == '') || ($this->page > $this->pages))
		{
			$this->page = 1;
		}	
	}
	
		// Генератор страниц
	public function pages_gen()
	{
			// Языковой массив
		$lang_mass = Array(
			'ru'=>Array('page'=>'Страница', 'from'=>'из'),
			'en'=>Array('page'=>'Page', 'from'=>'from'),
			'zh'=>Array('page'=>'Page', 'from'=>'from'),
			'kz'=>Array('page'=>'', 'from'=>'')
		);
			// Вывод
		$html = '
		<table width="100%" cellpadding="7" cellspacing="0">
		<tr>
		<td width="200">'.$lang_mass[$this->lang]['page'].' <b>'.$this->page.'</b> '.$lang_mass[$this->lang]['from'].' <b>'.$this->pages.'</b></td>
		<td align="right" style=" text-align:right">';

			# Диапазон
		$diap_index = ceil($this->page / 10);
		$diap_start = (($diap_index * 10)-10)+1;
		$diap_end	= $diap_start + 10;


			# Если не начало диапозона
		if ($this->page > 10)
		{
			if ($diap_index > 2)
			{
				$html .=  '<a class="page_link" href="'.$this->url.'/'.($this->query != '' ? $this->query."/p/1" : "/p/1").'">1</a> ... ';
			}
			$html .= '<a class="page_link" href="'.$this->url.'/'.($this->query != '' ? $this->query."/p/".($diap_start - 10) : "/p/".($diap_start - 10)).'">'.($diap_start - 10).'</a> ...';
		}

			# Если страница последняя из диапазона то меняем диапазон
		if ($this->page == $diap_end)
		{
			$diap_start = $diap_start + 10;
			$diap_end   = $diap_end + 10;
		}

		for($i=$diap_start; $i<=$diap_end; $i++)
		{
			if ($i <= $this->pages)
			{
				if ($i != $this->page)
				{
					$html .= '&nbsp;&nbsp;<a class="page_link" href="'.$this->url.'/'.($this->query != '' ? $this->query."/p/$i" : "/p/$i").'">'.$i.'</a>';
				}
				else
				{
					$html .= '&nbsp;&nbsp;<span style="font-size: 20px;" class="page_set">'.$i.'</span>';
				}
			}
		}

			# Если не конец не деапозона
		if ($this->pages > $diap_end)
		{
			$html .= ' ... <a class="page_link" href="'.$this->url.'/'.($this->query != '' ? $this->query."/p/$this->pages" : "/p/$this->pages").'">'.$this->pages.'</a>';
		}


		$html .= '</td>
		</tr>
		</table>';
		
		return $html;
	}
}



# Класс строк
class Strings {
	
	public function date($lang, $str, $type_from, $type_to)
	{
		$conv_date ='';
		$lang_mass = Array(
			'ru'=>Array(
				'at'=>'в',
				'mounth'=>Array(
					'01'=>'января',
					'02'=>'февраля',
					'03'=>'марта',
					'04'=>'апреля',
					'05'=>'мая',
					'06'=>'июня',
					'07'=>'июля',
					'08'=>'августа',
					'09'=>'сентября',
					'10'=>'октября',
					'11'=>'ноября',
					'12'=>'декабря')
			),
			'en'=>Array(
				'at'=>'at',
				'mounth'=>Array(
					'01'=>'january',
					'02'=>'february',
					'03'=>'march',
					'04'=>'april',
					'05'=>'may',
					'06'=>'june',
					'07'=>'july',
					'08'=>'august',
					'09'=>'september',
					'10'=>'october',
					'11'=>'november',
					'12'=>'december')
			),
			'zh'=>Array(
				'at'=>'at',
				'mounth'=>Array(
					'01'=>'january',
					'02'=>'february',
					'03'=>'march',
					'04'=>'april',
					'05'=>'may',
					'06'=>'june',
					'07'=>'july',
					'08'=>'august',
					'09'=>'september',
					'10'=>'october',
					'11'=>'november',
					'12'=>'december')
			),

			'kz'=>Array(
				'at'=>'',
				'mounth'=>Array(
					'01'=>'қаңтар',
					'02'=>'ақпан',
					'03'=>'наурыз',
					'04'=>'сәуір',
					'05'=>'мамыр',
					'06'=>'маусым',
					'07'=>'шілде',
					'08'=>'тамыз',
					'09'=>'қыркүйек',
					'10'=>'қазан',
					'11'=>'қараша',
					'12'=>'желтоқсан')
			)
		);

		
		# Если из SQL формата
		if ($type_from == 'sql')
		{
			$date_time 	= explode(' ', $str);
			$date 		= explode('-', $date_time[0]);
			$time 		= explode(':', $date_time[1]);
			
			# Обычный тип даты
			if ($type_to == 'date')
			{
				$conv_date = $date[2].'.'.$date[1].'.'.$date[0];
			}
			
			# Текстовая дата
			if ($type_to == 'datetext')
			{
				$conv_date = $date[2].' '.$lang_mass[$lang]['mounth'][$date[1]].' '.$date[0];
			}
			
			# Дата и время
			if ($type_to == 'datetime')
			{
				$conv_date = $date[2].'.'.$date[1].'.'.$date[0].' '.$lang_mass[$lang]['at'].' '.$time[0].':'.$time[1];
			}
			
			# Текстовые дата и время
			if ($type_to == 'datetimetext')
			{
				if (substr($date[2], 0, 1) == 0) { $date[2] = substr($date[2], 1); } 
				if (substr($time[0], 0, 1) == 0) { $time[0] = substr($time[0], 1); } 
				$conv_date = $date[2].' '.$lang_mass[$lang]['mounth'][$date[1]].' '.$date[0].' '.$lang_mass[$lang]['at'].' '.$time[0].':'.$time[1];
			}
		}
		
		# Из обычного формата
		if ($type_from == 'date')
		{
			$date_time 	= explode('.', $str);

			# SQL
			if ($type_to == 'sql')
			{
				$conv_date = $date_time[2].'-'.$date_time[1].'-'.$date_time[0];
			}
			
		}
		
		return $conv_date;
	}
	
	
	# Стоимость
	public function coast($str, $act='to')
	{
		$new_str = $str;
		
		# В
		if ($act == 'to')
		{
			if (strlen($str) > 3)
			{
				$u=0;
				$money_coast = '';
				for($i=strlen($str); $i>=0; $i--)
				{
					$money_coast = substr($str, $i, 1).$money_coast;
					if ($u == 3) { $money_coast = ' '.$money_coast; $u=0; }
					$u++;
				}
				
				$new_str = $money_coast;
			}
		}
		
		# Из
		if ($act == 'from')
		{
			$new_str = eregi_replace(' ', $str);
		}	
		
		return $new_str; 
	}
	
	
	# MIME
	public function mime($str, $data_charset='utf-8', $send_charset='utf-8') 
	{
		if($data_charset != $send_charset) 
		{
			$str = iconv($data_charset, $send_charset, $str);
		}
		
		return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
	}


}

// Класс Пользователь
class Users 
{
	public $user_id;
	public $user_name;
	public $user_login;
	
	
	function __construct() 
	{
		$this->check_auth();
	}
	
	# Генератор сессии
	public function sess_gen()
	{
		return md5(date('smdsiYmH'));
	}
	
	
	# Генератор паролей
	public function pass_gen()
	{
		return substr($this->sess_gen(), 0, 6);
	}
	
	# Проверка юзера по сессии
	public function check_auth()
	{
		if (
			isset($_SESSION['user_id1']) && 
			(intval($_SESSION['user_id1']) != '')  && 
			(mysql_num_rows(mysql_query("SELECT `id` FROM `i_shop_users` WHERE `active`='1' AND `id`='".intval($_SESSION['user_id1'])."'  LIMIT 1")) == 1)
		)
		{
			# Переменные
			$shop_user_id = intval($_SESSION['user_id1']);

			# Получаем данные пользователя
			$shop_user_name = mysql_result(mysql_query("SELECT `user_name` FROM `i_shop_users` WHERE `id`='$shop_user_id' LIMIT 1"), 0);
			
			$shop_user_block = mysql_result(mysql_query("SELECT `id_section` FROM `i_shop_users` WHERE `id`='$shop_user_id' LIMIT 1"), 0);
			$shop_user_login = mysql_result(mysql_query("SELECT `login` FROM `i_shop_users` WHERE `id`='$shop_user_id' LIMIT 1"), 0);
			
			# Обновляем данные
			mysql_query("UPDATE `i_shop_users` SET `timestamp_x`=NOW() WHERE `id`='$shop_user_id' LIMIT 1");

			# Устанавливаем данные в класс
			$this->user_id		= $shop_user_id;
			$this->user_name 	= $shop_user_name;
			$this->user_block 	= $shop_user_block;
			$this->user_login 	= $shop_user_login;

			return true;

		} else {
			return false;
		}
	}
	
	# Авторизация пользователя
	public function login_user($login, $pass)
	{
		# Если авторизация верна
		if ($this->check_login($login, $pass) == true)
		{
			# Получаем данные пользователя
			list($shop_user_id, $shop_user_name) = mysql_fetch_row(mysql_query("SELECT `id`, `user_name` FROM `i_shop_users` WHERE `active`='1' AND `login`='".addslashes($login)."' AND `password`='".addslashes($pass)."' LIMIT 1"));
			
			# Генерируем сессию
			$shop_user_new_sess = $this->sess_gen();
			
			# Обновляем сессию
			@mysql_query("UPDATE `i_shop_users` SET `timestamp_x`=NOW(), `sess`='$shop_user_new_sess' WHERE `id`='$shop_user_id' LIMIT 1");
			
			# Устанавливаем данные в класс
			$this->user_id		= $shop_user_id;
			$this->user_name 	= $shop_user_name;

			# Устанавливаем данные в сессию
			$_SESSION['user_id1']	 = $shop_user_id;
			$_SESSION['user_sess1']	 = $shop_user_new_sess;
		}
	}
	
	
	# Выход пользователя
	public function logout_user()
	{
		# Если авторизован
		if ($this->check_auth() == true)
		{
			# Обновляем сессию
			@mysql_query("UPDATE `i_shop_users` SET `timestamp_x`=NOW(), `sess`='".$this->sess_gen()."' WHERE `id`='".$this->user_id."' LIMIT 1");

			# Устанавливаем данные в класс
			$this->user_id		= '';
			$this->user_name 	= '';
			
			# Устанавливаем данные в сессию
			$_SESSION['user_id1']	 = '';
			$_SESSION['user_sess1']	 = '';
			
			return true;
			
		} else {
			return false;
		}	
	}
	
	
	# Проверка данных авторизации
	public function check_login($login, $pass)
	{
		if (($login != '') && ($pass != '') && (mysql_num_rows(mysql_query("SELECT `id` FROM `i_shop_users` WHERE `active`='1' AND `login`='$login' AND `password`='".$pass."' LIMIT 1")) == 1))
		{
			return true;
		} else {
			return false;
		}
	}
}


# Класс Корзина
class Basket 
{
	function __construct() 
	{
		// Если корзины нет...создаем
		if (!isset($_SESSION['user_basket']))
		{
			$_SESSION['user_basket'] = '';
		}
	}

	
	# Количество элементов в корзине
	public function count()
	{
		return sizeof(explode("\n", $_SESSION['user_basket']))-1;
	}
	
	public function sum()
	{
		# Разбиваем на элементы
		$elements_mass = explode("\n", $_SESSION['user_basket']);
		
		# Асоциативный массив
		$elements_mass_assoc = Array();	
		
		$sum=0;
		# Листаем эелементы
		for($i=0; $i<sizeof($elements_mass)-1; $i++)
		{
			# Разбиваем элемент на составляющие
			$tmp_element_mass = explode('|', $elements_mass[$i]);
			
			$id=$tmp_element_mass[0];
			
			$s=mysql_query("select * from i_block_elements where id=".$id."");
			$r=mysql_fetch_array($s);
			$pr=$r["cat_price"];
			$sum=$sum+$pr;
		}
		
		return $sum;
	}
	
	
	# Получить элементы корзины в массив
	public function get_all()
	{
		# Разбиваем на элементы
		$elements_mass = explode("\n", $_SESSION['user_basket']);
		
		# Асоциативный массив
		$elements_mass_assoc = Array();	
		
		# Листаем эелементы
		for($i=0; $i<sizeof($elements_mass)-1; $i++)
		{
			# Разбиваем элемент на составляющие
			$tmp_element_mass = explode('|', $elements_mass[$i]);
			
			# Забиваем асоциативный массив
			$elements_mass_assoc[$i] = Array('id'=>$tmp_element_mass[0], 'count'=>$tmp_element_mass[1], 'params'=>$tmp_element_mass[2]);
		}
		
		return $elements_mass_assoc;	
	}
	
	
	# Добавить в корзину
	public function add($id, $count=1, $params='')
	{
		# Переменные
		$id 	= intval($id);
		$count	= intval($count);
		
		# Добавляем
		$_SESSION['user_basket'] .= "$id|$count|$params\n";	
	}
	
	# Удалить из корзины
	public function del($pos)
	{
		
		# Разбмваем массив
		$elements_mass = explode("\n", $_SESSION['user_basket']);
		
		# Листаем элементы
		for ($i=0; $i<sizeof($elements_mass)-1; $i++)
		{
			if ($i != $pos)
			{
				@$new_content .= $elements_mass[$i]."\n";
			} else {
				$deleted = 1;
			}
		}

		# Элемент удален?
		if (isset($deleted)) { $_SESSION['user_basket'] = $new_content; return true; } else { return false; }
	}
	
	
	# Обновить позицию
	public function update($pos, $count='', $params='')
	{
		# Разбмваем массив
		$elements_mass = explode("\n", $_SESSION['user_basket']);
		
		# Листаем элементы
		for ($i=0; $i<sizeof($elements_mass)-1; $i++)
		{
			if ($i == $pos)
			{
			  # Свойства элемента
				$element = explode('|', $elements_mass[$i]);

			  # Меняем свойства
				if ($count  != '')	{ $element[1] = $count; }
				if ($params != '')	{ $element[2] = $params; }

				@$new_content .= $element[0].'|'.$element[1].'|'.$element[2]."\n";

			} else {
				@$new_content .= $elements_mass[$i]."\n";
			}
		}
		
		$_SESSION['user_basket'] = $new_content;
	}
	
	
	# Проверить наличие
	public function check($id)
	{
		# Разбмваем массив
		$elements_mass = explode("\n", $_SESSION['user_basket']);
		
		# Листаем элементы
		for ($i=0; $i<sizeof($elements_mass)-1; $i++)
		{
			$tmp_element = explode('|', $elements_mass[$i]);
			if ($tmp_element[0] == $id) { return true; }
		}

		return false;
	}
	
	
	# Очистить корзину
	public function clear()
	{
		$_SESSION['user_basket'] = '';
	}
}
?>