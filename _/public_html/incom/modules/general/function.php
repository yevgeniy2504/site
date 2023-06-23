<?
class application
{
	// установка cookie
	function cookie($str)
	{
		setcookie("web_auth",$str,time()+172800);
	}
	
	// проверка авторизации
    function pr_cookie()
    { 
    	$elements=explode("|",$_COOKIE['web_auth']);
        
        $select=$this->select("i_user",array("login"=>$elements['0'],"active"=>1),'');
        if(mysql_num_rows($select)==1)
        {
        	$res=mysql_fetch_array($select);
                if($res['password']==$elements['1'])
                {
                	$group=$this->select("i_user_group",array("id"=>$res['id_group']),'');
                        if(mysql_num_rows($group)>0)
                        {
                        	$group_res=mysql_fetch_array($group);
                                if($group_res['active']=="1")
                                {
                                	$_SESSION['user_id']=$res['id'];
                                	$_SESSION['group_id']=$res['id_group'];
                                	$version=$this->select("i_lang",array("active"=>1,"default"=>1),"id");
                                	$version_res=mysql_fetch_array($version);
                                	if(!@$_SESSION['version']){$_SESSION['version']=$version_res['name_reduction'];}
                                	if($_SERVER['PHP_SELF']=="/incom/index.php"){header("LOCATION:/incom/modules/desktop.php");}
                                }
                        }
               }
       	}
	}
        
	//работа с изображением
	function waterMark($logo,$image,$outfile,$x,$y,$opac)
	{
		$size=getimagesize($logo);
		$width_logo=$size[0];
		$height_logo=$size[1]; 
		$flag=imagecreatefromjpeg($image);
		preg_match("|\.(.*)|",$logo,$mathces);
		
		if($mathces['0']==".png")
		{
			$mask=imagecreatefrompng($logo);
			imagecopy($flag,$mask,$x,$y,0,0,$width_logo,$height_logo);
		}
		else
		{
			$mask=imagecreatefromgif($logo);
			imagecopymerge($flag,$mask,$x,$y, 0, 0,$width_logo,$height_logo,$opac); 
		}
		header("Content-type: image/jpeg");
		imagejpeg($flag, $outfile);
		imagedestroy($flag); 
	}
	// изменение размера изображения
    function resize($w,$h,$url,$out_file,$quality)
    {
        $arr=getimagesize($url);
        $imW = $arr[0];
        $imH = $arr[1];
        $imT = $arr[2];
        if ($imT==2) @header ("content-type: image/jpeg"); else @header ("content-type: image/png");
        if ($imW>$imH)
        {
        	$urlWidth=$w;
        	$urlHeight=round($imH/($imW/$w));
        }

        if ($imH>$imW)
        {
        	$urlHeight=$h;
        	$urlWidth=round($imW/($imH/$h));
        }

        $im2=imagecreatetruecolor($urlWidth, $urlHeight);
        if ($imT==1) {
        if (function_exists("imagecreatefromgif")) {
        	$im=imagecreatefromgif ($url);
        } else {
        	$im=imagecreate($w, $h);
        	$c1=imagecolorallocate($im, 255, 255, 255);
        	$c2=imagecolorallocate($im, 0, 0, 0);
        	imagecolortransparent ($im, $c1);
        	imagerectangle ($im, 0, 0, $w-1, $h-1, $c2);
        	imagestring ($im, 2, 5, 5, "gif format", $c2);
        	imagestring ($im, 2, 5, 15, "not", $c2);
        	imagestring ($im, 2, 5, 25, "supported", $c2);
        	header ("content-type: image/png");
        	imagepng($im);
        	return;
        }
		
        } elseif ($imT==2) {
			
        	$im=imagecreatefromjpeg ($url);
        
		} elseif ($imT==3) {
        	$im=imagecreatefrompng ($url);
        }
        imagecopyresampled($im2, $im, 0, 0, 0, 0, $urlWidth, $urlHeight, $imW, $imH);
        imagedestroy ($im);

        if ($imT==2) {
        	imagejpeg ($im2, $out_file, $quality);
        } else {
        	imagepng ($im2,$out_file);
        }
	}
    // убирем экранирование    
	function strip_slashes($str)
    {
        $str=str_replace("\'","'",$str);
        $str=str_replace('\"','"',$str);
        $str=str_replace("\\\\n",'\n',$str);
        $str=str_replace('\\\\r','\r',$str);
        $str=str_replace("\\n",'\n',$str);
        $str=str_replace('\\r','\r',$str);
        return $str;
    }
   // проверка авторизации     
   function auth_pr()
   {
        if(!@$_SESSION['auth_tmp']){$_SESSION['auth_tmp']=0;}
        $_SESSION['auth_tmp']+=1;
       
	    if($_SESSION['auth_tmp']>=3)
        {
       		setcookie("badlist","подборка паролей",0x7FFFFFFF);
            $ip=$_SERVER['REMOTE_ADDR'];
            $useragent=$_SERVER['HTTP_USER_AGENT'];
            
			if(empty($ip)){$ip='ip не определён';}
            if(strpos($useragent, "Mozilla")!== false) $browser = 'mozilla';
            if(strpos($useragent, "MSIE")!== false) $browser = 'msie';
            if(strpos($useragent, "MyIE")!== false) $browser = 'myie';
            if(strpos($useragent, "Opera")!== false) $browser = 'opera';
            if(strpos($useragent, "Netscape")!== false) $browser = 'netscape';
            if(strpos($useragent, "Firefox")!== false) $browser = 'firefox';
            
			$os = 'none';
            
			if(strpos($useragent, "Win")!== false) $os = 'windows';
            if(strpos($useragent, "Linux")!== false || strpos($useragent, "Lynx")!== false || strpos($useragent, "Unix")!== false) $os = 'unix';
            if(strpos($useragent, "Macintosh")!== false) $os = 'macintosh';
            if(strpos($useragent, "PowerPC")!== false) $os = 'macintosh';
            
			mysql_query("insert into i_badlist values('',CURRENT_TIMESTAMP,'".$ip."','".$browser."','".$os."')");
                
		}
		
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $this->alert("Не правильно введён логин или пароль!");
        
	}
    
	// проверка входа админа    
    function admin()
    {
        if (@!$_SESSION['user_id'] AND @!$_SESSION['group_id'])
        {
        	header("Location: /incom/index.php");
            $this->go("/incom/index.php");
        	exit;
        }
    }
	
	// проверка админа для публичной части	
	function check_admin()
	{
		if (@$_SESSION['user_id'] AND @$_SESSION['group_id'])
        {
        	$s=mysql_query("select * from i_user where id=".intval($_SESSION["user_id"])." 
							and id_group=".intval($_SESSION["group_id"])." and active=1");
							
			if (mysql_num_rows($s)==1)
			{
				return true;	
			}
			else
			{
				return false;	
			}
        
        }
		else
		return false;
	}
     
	// очистка переменных  
    function pr($i)
    {
        $i=strip_tags($i);
        $i=htmlspecialchars($i, ENT_QUOTES);
		$i=mysql_real_escape_string($i);
        return trim($i);
    }
	
    // не понятно для чего
    function small_pr($i)
    {
    	return $i;
    }
    // alert    
    function alert($i)
    {
        echo "<script>alert('".addslashes($i)."');</script>";
    }
    // удаление из таблицы    
    function del_r($table,$ar)
    {
    	if(count(@$ar)>0)
        {
        	$str = "WHERE ";
			$out = array();
			
			foreach($ar as $k=>$v)
            {
            	$out[]="`".$this->pr($k)."`='".$this->pr($v)."'";
            }
            
			$str.=implode(" AND ", $out);
            
		}else{$str="";}
                
        $select=mysql_query("delete from ".$table." ".$str." ");
        
		if($select)
        {
        	mysql_query("insert into i_logs values(0,CURRENT_TIMESTAMP,'".$_SESSION['user_id']."','delete','".$table."')");
            return $select;
		}else
		{
			$this->alert("Не возможно выполнить запрос!\\nREASON:".mysql_error());
		}
	}
	
    // выборка из таблицы
    function select($table,$ar,$order)
    {
    	if(count(@$ar)>0)
        {
        	foreach($ar as $k=>$v)
            {
            	if(!@$str){$str="where ".$k."='".$v."'";}
                else{$str.=" AND `".$this->pr($k)."`='".$this->pr($v)."'";}
            }
        }else{$str="";}
		
		if(@$order){$ord="ORDER BY ".$this->small_pr($order);}else{$ord="";}
           
		 		        
        $select=mysql_query("select * from ".$table." ".$str." ".$ord."");
        
		if($select)
		{
			return $select;
		}else
		{
			$this->alert("Не возможно выполнить запрос!\\nREASON:".mysql_error());
		}
	}
    
	// html редирект    
    function go($i)
    {
        echo "<meta http-equiv='refresh' content='0; url=".$i."'>";
    }
    
	// вставка в таблицу    
    function insert($table,$field,$page)
    {
        $field_ar=explode(",",$field);
        $field='';
        
		foreach($field_ar as $k=>$v)
        {
        	if($k==(count($field_ar)-1)){$ct="";}else{$ct=",";}
            $field.=$this->small_pr($v).$ct;
        }
		
        $add=mysql_query("insert into $table values(0,$field)");
        
        if (!$add){$this->alert("Record has not been added!\\nREASON:".mysql_error());}
		else{
			mysql_query("insert into i_logs values(0,CURRENT_TIMESTAMP,'".$_SESSION['user_id']."','insert','".$table."')");
			
            if($page!=""){
				echo '<div id="save_title" style="position:absolute; background-color:#FFFFFF; 
												  BORDER: #c4c5a6 1px solid; width:200px; height:50px;">
						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td height="50" align="center" class="small_text"><img src="/incom/modules/theme/default/images/new.gif"  hspace="4" align="left" />подождите, идёт сохранение параметров</td>
							</tr>
						  </table>
						</div>'; 
				$this->go($page);
			}
		}
	}
    
	// формирование ссылки с парамметрами    
    function gets_go($array_gets,$name,$value)
    {
        $result_ar=array();
        if($name!=""){array_push($result_ar,"$name=$value");}
		foreach($array_gets as $k=>$v)
		{
				if($name!=$k AND $k!="delete")
				{
					if($v!=""){array_push($result_ar,"$k=$v");}
				}
		}
        $gets='?';
        $count=count($result_ar);
        $i=1;

		foreach($result_ar as $k=>$v)
		{
			if($i==$count){$gets.=$v;}else{$gets.=$v."&";}
			$i++;
		}
		
		return $gets;
	}
    
	// обновление данных в таблице    
    function update($table,$field,$id,$page)
    {
        $i=0;
         
		foreach($field as $k=>$v)
        {
        	if(($i!=count($field)) AND ($i!=0)){@$str.=",";}
            @$str.='`'.$k.'`=\''.$this->small_pr($v).'\'';
            $i++;
		}
        
		$update=mysql_query("update ".$table." set ".$str." where id='".$this->pr($id)."'");
        
		
        if(!$update){$this->alert("Record has not update!\\nREASON:".mysql_error());}else{
			
			mysql_query("insert into i_logs values(0,CURRENT_TIMESTAMP,'".$_SESSION['user_id']."','update','".$table."')");
			
			if($page!=""){
				echo '<div id="save_title" style="position:absolute; background-color:#FFFFFF; 
												  BORDER: #c4c5a6 1px solid; width:200px; height:50px;">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td height="50" align="center" class="small_text"><img src="/incom/modules/theme/default/images/new.gif"  hspace="4" align="left" />подождите, идёт сохранение параметров</td>
						</tr>
					  </table>
					</div>';
				$this->go($page);
			}
		}
	}
	
	// обновление данных в таблице    
    function update_params($table,$field,$id,$page, $version)
    {
        $i=0;
         
		foreach($field as $k=>$v)
        {
        	if(($i!=count($field)) AND ($i!=0)){@$str.=",";}
            @$str.='`'.$k.'`=\''.$this->small_pr($v).'\'';
            $i++;
		}
        
		$update=mysql_query("update ".$table." set ".$str." where id='".$this->pr($id)."' and version='".$version."'");
        
		
        if(!$update){$this->alert("Record has not update!\\nREASON:".mysql_error());}else{
			
			mysql_query("insert into i_logs values(0,CURRENT_TIMESTAMP,'".$_SESSION['user_id']."','update','".$table."')");
			
			if($page!=""){
				echo '<div id="save_title" style="position:absolute; background-color:#FFFFFF; 
												  BORDER: #c4c5a6 1px solid; width:200px; height:50px;">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td height="50" align="center" class="small_text"><img src="/incom/modules/theme/default/images/new.gif"  hspace="4" align="left" />подождите, идёт сохранение параметров</td>
						</tr>
					  </table>
					</div>';
				$this->go($page);
			}
		}
	}
	
    
	// ввывод поля для заполнения данных   
    function input_view($type_id,$table,$field,$id,$tmp_name)
    {
        $select=$this->select("i_option",array("id"=>$type_id),"");
        $res=mysql_fetch_array($select);
		
        if($tmp_name!=""){$tmp_name="_".$tmp_name;}else{$tmp_name='';}
        
        if($table!="" AND $field!="" AND $id!="")
        {
        	$value=$this->select($table,array($field=>$id),"");
        	$value_res=mysql_fetch_array($value);
        }
        
		$value_res[''.$res['name_en'].''] = str_replace('"','&quot;',@$value_res[''.$res['name_en'].'']);
        $value_res[''.$res['name_en'].''] = str_replace("'",'&#039;',@$value_res[''.$res['name_en'].'']);
		
        switch ($res['type_field'])
        {
			// текстовое поле
			case "i1":
				$input='<input name="'.$res['name_en'].$tmp_name.'" type="text" id="'.$res['name_en'].$tmp_name.'" 
						size="'.$res['width'].'" value="'.@$value_res[''.$res['name_en'].''].'" />';
			break;
			
			// поле дата
            case "i2":
            	$input='<input name="'.$res['name_en'].$tmp_name.'" type="text" id="'.$res['name_en'].$tmp_name.'" 
						size="'.$res['width'].'" value="';
                if(@$value_res[''.$res['name_en'].'']){
					$input.=$value_res[''.$res['name_en'].''];
				}else{$input.=date($res['format_date']);}
				
                $input.='"/>';
				
				$calendar_button = rand(1000,9999);
				
				$input.='<img src="/calendar/calendar.jpg" width="20" height="18" border="0" 
						id="calendar_'.$res['name_en'].$tmp_name.'" style="margin-left: 5px;" />';
						
				$input.='<script type="text/javascript">
							Calendar.setup({
				    			inputField     :    "'.$res['name_en'].$tmp_name.'",      // id of the input field
				    			ifFormat       :    "%Y-%m-%d %H:%M:%S",       // format of the input field
				    			showsTime      :    true,            // will display a time selector
				    			button         :    "calendar_'.$res['name_en'].$tmp_name.'", // trigger for the calendar (button ID)
							    singleClick    :    true,           // double-click mode
							    step           :    1                // show all years in drop-down boxes 
							});
						</script>';
            break;
				
			// поле логин
			case "i3":
				$input='<input name="'.$res['name_en'].$tmp_name.'" type="text" id="'.$res['name_en'].$tmp_name.'" 
						size="'.$res['width'].'" />';
			break;
			
			// поле пароль
			case "i4":
				$input='<input name="'.$res['name_en'].$tmp_name.'" type="password" id="'.$res['name_en'].$tmp_name.'" 
						size="'.$res['width'].'" />';
			break;
			
			// поле числовое
			case "i5":
				$input='<input name="'.$res['name_en'].$tmp_name.'" type="text" id="'.$res['name_en'].$tmp_name.'" 
						size="'.$res['width'].'"  value="'.@$value_res[''.$res['name_en'].''].'" />';
			break;

			// много текста textarea
			case "i6":
				$value_res[''.$res['name_en'].''] = str_replace('&quot;','"',$value_res[''.$res['name_en'].'']);
				$value_res[''.$res['name_en'].''] = str_replace('&#039;',"'",$value_res[''.$res['name_en'].'']);
				
				$input='<textarea name="'.$res['name_en'].$tmp_name.'" cols="'.$res['width'].'" 
						rows="'.$res['height'].'">'.@$value_res[''.$res['name_en'].''].'</textarea>';
			break;
			
			// поле чекбокс
			case "i7":
				$input='<input name="'.$res['name_en'].$tmp_name.'" type="checkbox" value="1"';
				
				if(@$value_res[''.$res['name_en'].'']==1){$input.=' checked';}
				
				$input.=' />';
			break;
			
			// селект
			case "i8":
				$input='<select name="'.$res['name_en'].$tmp_name.'" style="width:'.$res['width'].'px">';
				$elem=explode("\n",$res['select_elements']);
				
				foreach($elem as $k=>$v)
				{
					if($v!="")
					{
						if(trim($v)==@trim($value_res[''.$res['name_en'].''])){$sel='selected';}else{$sel='';}
						$input.='<option value="'.trim($v).'" '.$sel.'>'.trim($v).'</option>';
					}
				}
				
				$input.='</select>';
			break;
			
			// радио батоны
			case "i9":
				$elem=explode("\n",$res['select_elements']);
				
				foreach($elem as $k=>$v)
				{
					if($v!="")
					{
						if(trim($v)==@trim($value_res[''.$res['name_en'].''])){$sel='checked';}else{$sel='';}
						$input.='<input type="radio" name="'.$res['name_en'].$tmp_name.'" 
								id="'.$res['name_en'].$tmp_name.'" value="'.trim($v).'" '.$sel.'>'.trim($v).'<br>';
					}
			   }
			break;
			
			// html редактор
			case "i10":
				$input='<div>
					<input type="hidden" id="'.$res['name_en'].$tmp_name.'" name="'.$res['name_en'].$tmp_name.'" 
					value="'.@$value_res[''.$res['name_en'].''].'">
					<input type="hidden" id="FCKeditor1___Config" value="">
					<iframe id="FCKeditor1___Frame" 
					src="/incom/modules/editor/editor/fckeditor.html?InstanceName='.$res['name_en'].$tmp_name.'&Toolbar=Default"
					width="'.$res['width'].'" height="'.$res['height'].'" frameborder="no" scrolling="no"></iframe></div>';
			break;
			
			// поле рисунок
			case "i11":
				if(@$value_res[''.$res['name_en'].'']!="")
				{
					$input='<table width="100%"  border="0" cellspacing="0" cellpadding="2" align="left">
							   <tr>
								<td align="left" class="left_menu">
									<img src="/incom/resize.php?url='.$_SERVER['DOCUMENT_ROOT'].'/upload/images/
									'.$value_res[''.$res['name_en'].''].'&w=100&h=90">
								</td>
								</tr>
								<tr>
								  <td align="left"><table width="20%"  border="0" cellspacing="0" cellpadding="0">
									<tr>
									  <td width="39%" align="center">
									  <input type="checkbox" name="delete'.$res['id'].'" value="1" 
									  onClick="SectionClick(\'delete_forms'.$res['id'].'\')">
									  </td>
									  <td width="61%" align="left" class="small_text">удалить</td>
									</tr>
								  </table>
								</td>
							</tr>
							<tr>
								<td class="small_text">
									<DIV id="delete_forms'.$res['id'].'" style="DISPLAY:none">
										<input name="'.$res['name_en'].$tmp_name.'" type="file" />
										<br>форматы('.$res['format_file'].')/размер('.$res['size_file'].' bytes)
									</div>
								</td>
							</tr>
					  </table>';
					  
				}else
				{
					$input='<input name="'.$res['name_en'].$tmp_name.'" type="file" />
							<br>форматы('.$res['format_file'].')/размер('.$res['size_file'].' bytes)';
				}
			
			break;
	
			// поле для файла
			case "i12":
				if(@$value_res[''.$res['name_en'].'']!="")
				{
					$input='<table width="100%"  border="0" cellspacing="0" cellpadding="2" align="left">
							<tr>
							  <td align="left" class="small_text"><b>'.$value_res[''.$res['name_en'].''].'</b></td>
							</tr>
							<tr>
							  <td align="left"><table width="20%"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="39%" align="center">
								  <input type="checkbox" name="delete'.$res['id'].'" value="1" 
								  onClick="SectionClick(\'delete_forms'.$res['id'].'\')"></td>
								  <td width="61%" align="left" class="small_text">удалить</td>
								</tr>
							  </table>
								</td>
							</tr><tr><td class="small_text"><DIV id="delete_forms'.$res['id'].'" style="DISPLAY:none">
							<input name="'.$res['name_en'].$tmp_name.'" type="file" /><br>
							форматы('.$res['format_file'].')/размер('.$res['size_file'].' bytes)</div></td></tr>
						  </table>';
				}else
				{
					$input='<input name="'.$res['name_en'].$tmp_name.'" type="file" /><br>
							форматы('.$res['format_file'].')/размер('.$res['size_file'].' bytes)';
				}
					
			break;
		}
		return stripslashes($input);
	}
	
	// ввывод поля для парамметров
    function input_params($type_id,$table,$field,$id,$tmp_name)
    {
        $select=$this->select("i_params",array("id"=>$type_id),"");
        $res=mysql_fetch_array($select);
		
        if($tmp_name!=""){$tmp_name="_".$tmp_name;}else{$tmp_name='';}
        
        if($table!="" AND $field!="" AND $id!="")
        {
        	$value=$this->select($table,array($field=>$id),"");
        	$value_res=mysql_fetch_array($value);
        }
        
		$value_res[''.$res['name_en'].''] = str_replace('"','&quot;',@$value_res[''.$res['name_en'].'']);
        $value_res[''.$res['name_en'].''] = str_replace("'",'&#039;',@$value_res[''.$res['name_en'].'']);
		
        switch ($res['type'])
        {
			// текстовое поле
			case "i1":
				$input='<input name="'.$res['name_en'].$tmp_name.'" type="text" id="'.$res['name_en'].$tmp_name.'" 
						size="30" value="'.@$res['value'].'" onchange="save_param(\''.$res['name_en'].'\',\'i1\','.$res["id"].');" />';
			break;
			
			// поле чекбокс
			case "i7":
				$input='<input name="'.$res['name_en'].$tmp_name.'" id="'.$res['name_en'].$tmp_name.'" 
						onclick="save_param(\''.$res['name_en'].'\',\'i7\','.$res["id"].')" type="checkbox" value="1"';
				
				if(@$res['value']==1){$input.=' checked';}
				
				$input.=' />';
			break;
		}
		return stripslashes($input);
	}
        
    // показ скрипта для обязательных полей
	function script_view($module,$sub_module,$id_section,$array)
    {
    	echo '<script>
				function pr(hidden_val)
				{
					var msg;
					var fr;
					msg=\'\';
					fr=document.form;';
					
		$input=$this->search_option($module,$sub_module,$id_section,$array);
		
		while($input_res=mysql_fetch_array($input))
		{
        	switch ($input_res['type_field'])
        	{
        		case 'i9':
        		$elem=explode("\n",$input_res['select_elements']);
                
				foreach($elem as $k=>$v)
                {
                	if($v!="")
                    {
                        if($k==(count($elem)-1)){$pl='';}else{$pl='&&';}
                        @$str.='fr.'.$input_res['name_en'].'[\''.$k.'\'].checked==false '.$pl.' ';
                    }
                }
				
        		echo 'if('.$str.'){msg=msg+\'* '.$input_res['name_ru'].' \n\';}';
				
        		break;
        
        		default:
			    
				// echo 'if (fr.'.$input_res['name_en'].'.value==\'\'){msg=msg+\'* '.$input_res['name_ru'].' \n\';}';
        		
				break;
        	}
		}

        echo' if(msg==\'\')
        	 {
        		fr.hidden.value=hidden_val;
        		fr.submit();
        	 }
        	 else
        	 {
        		msg=\'Необходимо заполнить обязательные поля:\n\'+msg;
		        alert(msg);
        	 }
		}
		</script>';
	}
    
	// поиск полей для блоков    
    function search_option($module,$sub_module,$id_section,$array)
    {
        $id_field='';
        if($sub_module==""){$sub_module=$module;}
        $where_con=array("category"=>$module,"category_id"=>$id_section);
        
        foreach($array as $k=>$v)
        {
       		if($k!=""){$where_con[$k]=$v;}
        }
        
		for($i=0;$i<=4;$i++)
        {
        	if(!@$option)
            {
            	$option=$this->select("i_option",$where_con,"id_sort");
            }
            
			if($module!="forms" && $module!="templates")
            {
            	if(mysql_num_rows($option)==0)
                {
                	$search_field=$this->select("i_".$sub_module,array("id"=>$id_section),"");
                    @$search_res=mysql_fetch_array($search_field);
                    $where_con['category_id']=$search_res['id_section'];
                    $option=$this->select("i_option",$where_con,"id_sort");
                    if(mysql_num_rows($option)==0){$id_section=$search_res['id_section'];}
                }
			}
		}
        return $option;
	}
	
	// поиск парамметров для блока
	function search_params($module,$sub_module,$id_section,$array)
	{
		$id_field='';
		if($sub_module==""){$sub_module=$module;}
		$where_con=array("id_block"=>$id_section);
	
		foreach($array as $k=>$v)
		{
			if($k!=""){$where_con[$k]=$v;}
		}

		for($i=0;$i<=4;$i++)
		{
			if(!@$option){
				$option=$this->select("i_params",$where_con,"id");
			}
			if($module!="forms")
			{
				if(mysql_num_rows($option)==0)
				{
					$search_field=$this->select("i_".$sub_module,array("id"=>$id_section),"");
					@$search_res=mysql_fetch_array($search_field);
					$where_con['id_block']=$search_res['id_section'];
					$option=$this->select("i_params",$where_con,"id");
					if(mysql_num_rows($option)==0){$id_section=$search_res['id_section'];}
							
					}
				}
		}
		return $option;
	}
		
    // удаление дерева блоков    
	function delete_tree($id,$block_name)
    {
        $array_block=array();
        $id_section='';
        //добавляем в массив 
        for($i=0;$i<=4;$i++)
        {
        	if($i==0)
            {
            	array_push($array_block,$id);
                $id_section=$id;
            }else
            {
            	$select=$this->select("i_".$block_name,array("id_section"=>$id_section),"");
                if(mysql_num_rows($select)>0)
                {
                	while($res=mysql_fetch_array($select))
                    {
                    	$id_section=$res['id'];
                        array_push($array_block,$res['id']);
                        $select2=$this->select("i_".$block_name,array("id_section"=>$id_section),"");
						if(mysql_num_rows($select2)>0)
						{
							while($res2=mysql_fetch_array($select2))
							{
								array_push($array_block,$res2['id']);
							}
						}
					}
				}
			}
		}
        
        krsort($array_block);
        
		foreach($array_block as $k=>$v)
		{
			$select=$this->select("i_option",array("category"=>$block_name,"category_id"=>$v),"");
			while($res=mysql_fetch_array($select))
			{
				$elements=$this->select("i_".$block_name,array("id"=>$v),"");
				while($elements_res=mysql_fetch_array($elements))
				{
					if($res['type_field']=="i11"){
						unlink($_SERVER['DOCUMENT_ROOT']."/upload/images/".$elements_res[''.$res['name_en'].'']);
					}
					if($res['type_field']=="i12"){
						unlink($_SERVER['DOCUMENT_ROOT']."/upload/files/".$elements_res[''.$res['name_en'].'']);
					}
				}
				//mysql_query("ALTER TABLE i_".$block_name." DROP ".$res['name_en']."");
				
				mysql_query("delete from i_option where category_id='".$v."' AND category='".$block_name."'");
			}

			$select=$this->select("i_option",array("category"=>$block_name."_elements","category_id"=>$v),"");
			while($res=mysql_fetch_array($select))
			{
				$elements=$this->select("i_".$block_name."_elements",array("id_section"=>$v),"");
				while($elements_res=mysql_fetch_array($elements))
				{
					if($res['type_field']=="i11"){
						unlink($_SERVER['DOCUMENT_ROOT']."/upload/images/".$elements_res[''.$res['name_en'].'']);
					}
					if($res['type_field']=="i12"){
						unlink($_SERVER['DOCUMENT_ROOT']."/upload/files/".$elements_res[''.$res['name_en'].'']);
					}
			}

			//mysql_query("ALTER TABLE i_".$block_name."_elements DROP ".$res['name_en']."");
			mysql_query("delete from i_option where category_id='".$v."' AND category='".$block_name."_elements'");
		}

		if($block_name=="photo")
		{
			$elements=$this->select("i_".$block_name."_elements",array("id_section"=>$v),"");
			while($elements_res=mysql_fetch_array($elements))
			{
				unlink($_SERVER['DOCUMENT_ROOT']."/upload/images/small/".$elements_res['photo_name']);
				unlink($_SERVER['DOCUMENT_ROOT']."/upload/images/big/".$elements_res['photo_name']);
			}
		}

		mysql_query("delete from i_".$block_name." where id='".$v."'");
		mysql_query("delete from i_".$block_name." where id_section='".$v."'");
		mysql_query("delete from i_".$block_name."_elements where id_section='".$v."'");
		}

		mysql_query("insert into i_logs values(0,CURRENT_TIMESTAMP,'".$_SESSION['user_id']."','delete','".$block_name."')");
	}
	// кодировка
	function encode($a) { 
		$_win1251utf8=array("\xC0"=>"\xD0\x90","\xC1"=>"\xD0\x91","\xC2"=>"\xD0\x92","\xC3"=>"\xD0\x93","\xC4"=>"\xD0\x94", 
							"\xC5"=>"\xD0\x95","\xA8"=>"\xD0\x81","\xC6"=>"\xD0\x96","\xC7"=>"\xD0\x97","\xC8"=>"\xD0\x98", 
							"\xC9"=>"\xD0\x99","\xCA"=>"\xD0\x9A","\xCB"=>"\xD0\x9B","\xCC"=>"\xD0\x9C","\xCD"=>"\xD0\x9D", 
							"\xCE"=>"\xD0\x9E","\xCF"=>"\xD0\x9F","\xD0"=>"\xD0\x20","\xD1"=>"\xD0\xA1","\xD2"=>"\xD0\xA2", 
							"\xD3"=>"\xD0\xA3","\xD4"=>"\xD0\xA4","\xD5"=>"\xD0\xA5","\xD6"=>"\xD0\xA6","\xD7"=>"\xD0\xA7", 
							"\xD8"=>"\xD0\xA8","\xD9"=>"\xD0\xA9","\xDA"=>"\xD0\xAA","\xDB"=>"\xD0\xAB","\xDC"=>"\xD0\xAC", 
							"\xDD"=>"\xD0\xAD","\xDE"=>"\xD0\xAE","\xDF"=>"\xD0\xAF","\xAF"=>"\xD0\x87","\xB2"=>"\xD0\x86", 
							"\xAA"=>"\xD0\x84","\xA1"=>"\xD0\x8E","\xE0"=>"\xD0\xB0","\xE1"=>"\xD0\xB1","\xE2"=>"\xD0\xB2", 
							"\xE3"=>"\xD0\xB3","\xE4"=>"\xD0\xB4","\xE5"=>"\xD0\xB5","\xB8"=>"\xD1\x91","\xE6"=>"\xD0\xB6", 
							"\xE7"=>"\xD0\xB7","\xE8"=>"\xD0\xB8","\xE9"=>"\xD0\xB9","\xEA"=>"\xD0\xBA","\xEB"=>"\xD0\xBB", 
							"\xEC"=>"\xD0\xBC","\xED"=>"\xD0\xBD","\xEE"=>"\xD0\xBE","\xEF"=>"\xD0\xBF","\xF0"=>"\xD1\x80", 
							"\xF1"=>"\xD1\x81","\xF2"=>"\xD1\x82","\xF3"=>"\xD1\x83","\xF4"=>"\xD1\x84","\xF5"=>"\xD1\x85", 
							"\xF6"=>"\xD1\x86","\xF7"=>"\xD1\x87","\xF8"=>"\xD1\x88","\xF9"=>"\xD1\x89","\xFA"=>"\xD1\x8A", 
							"\xFB"=>"\xD1\x8B","\xFC"=>"\xD1\x8C","\xFD"=>"\xD1\x8D","\xFE"=>"\xD1\x8E","\xFF"=>"\xD1\x8F", 
							"\xB3"=>"\xD1\x96","\xBF"=>"\xD1\x97","\xBA"=>"\xD1\x94","\xA2"=>"\xD1\x9E"); 

        if(is_array($a)){ 
			foreach($a as $k=>$v){ 
        		if(is_array($v)){ 
                	$a[$k]=encode($v); 
        		}else{ 
                	$a[$k]=strtr($v,$_win1251utf8); 
        		}	 
        	}
		 
        	return $a; 
        }else{
			return strtr($a,$_win1251utf8); 
        } 
	}
	
	function str_date($t){
		$arr = array(1=>"января",
					 "февраля",
					 "марта",
					 "апреля",
					 "мая",
					 "июня",
					 "июля",
					 "августа",
					 "сентября",
					 "октября",
					 "ноября",
					 "декабря",
					);
		if( preg_match("/^(\d+)-0?(\d+)-0?(\d+)(\s+(\d+):(\d+):(\d+))?$/", $t, $ok) ){
			return $ok[3]." ".$arr[$ok[2]]." ".$ok[1];
		}else if( is_numeric($t) ){
			return date("d", $t)." ".$arr[date("n", $t)]." ".$ok[1];
		}
	}
}

// конец класса aplication


// дополнительные функции

// вывод массива
function vd($var){
	echo '<pre style="text-align: left;">';
	var_dump($var);
	echo '</pre>';
}

// очистка гет запроса
function clear_GET(){
	global $ob;
	$tmp;
	foreach($_GET as $key=>$value){
		$key=$ob->pr($key);
		if(is_array($value)){
			$value=$value;
			foreach($value as $key1=>$value1){
				$key1=$ob->pr($key1);
				if(is_string($value1)){
					$value1=$ob->pr($value1);
				}elseif(is_int($value1)){
					$value1=(int)$value1;
				}
				$tmp[$key][$key1]=$value1;
			}
		}elseif(is_string($value)){
			$value=$ob->pr($value);
			$tmp[$key]=$value;
		}elseif(is_int($value)){
			$value=(int)$value;
			$tmp[$key]=$value;
		}
	}
	$_GET = $tmp;
}

// очистка пост запроса
function clear_POST(){
	global $ob;
	$tmp;
	foreach($_POST as $key=>$value){
		$key=$ob->pr($key);
		if(is_array($value)){
			$value=$value;
			foreach($value as $key1=>$value1){
				$key1=$ob->pr($key1);
				if(is_string($value1)){
					$value1=$ob->pr($value1);
				}elseif(is_int($value1)){
					$value1=(int)$value1;
				}
				$tmp[$key][$key1]=$value1;
			}
		}elseif(is_string($value)){
			$value=$ob->pr($value);
			$tmp[$key]=$value;
		}elseif(is_int($value)){
			$value=(int)$value;
			$tmp[$key]=$value;
		}
	}
	$_POST = $tmp;
}

// получение элемнтов
function getElements($id, $limit = 0, $order_direction = 'ASC', $order = 'id', $search_rows = '', $search_keyword = '', 	
					 $advanced_search = '')
{
	if ($limit === 0) $limit = '';
	else $limit = 'LIMIT '.$limit;
	
	$search = '';
	if ($search_keyword && $search_rows){
		$search_rows = explode(',', $search_rows);
		$search_keyword = explode(' ', $search_keyword);
		for ($i = 0; $i < sizeof($search_rows); $i++){
			$search_rows[$i] = trim($search_rows[$i]);
			if ($i != 0) $search .= ' OR ';
			for ($j = 0; $j < sizeof($search_keyword); $j++){
				$search_keyword[$j] = trim($search_keyword[$j]);
				if ($j != 0) $search .= ' OR ';
				$search .= '`'.$search_rows[$i].'` LIKE \'%'.$search_keyword[$j].'%\'';
			}
		}
		$search = 'AND ('.$search.')';
	}
	
	if ($advanced_search) $search .= ' AND ('.$advanced_search.')';
	
	$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` 
					   WHERE `category`="block_elements" AND `category_id`='.$id.' ORDER BY `id_sort`');
					   
	if (!mysql_num_rows($qr)){
		$id_parent = getPrentWAttrs($id);
		$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` 
						   WHERE `category`="block_elements" AND `category_id`='.$id_parent.' ORDER BY `id_sort`');
	}
	
	$attrs_ru = array();
	$attrs_en = array();
	$attrs_str = '';
	$i=0;
	
	while ($obj = mysql_fetch_object($qr)){
		if ($i != 0) $attrs_str .= ', ';
		$attrs_ru[] = $obj->name_ru;
		$attrs_en[] = $obj->name_en;
		$attrs_str .= '`'.$obj->name_en.'`';
		$i++;
	}
	
	$attrs_str = trim($attrs_str);
	$objects = array();
	$i = 0;
	
	$qr = mysql_query('SELECT `id`, `id_section`, '.$attrs_str.' FROM `i_block_elements` 
					   WHERE `id_section`='.$id.' '.$search.' ORDER BY '.$order.' '.$order_direction.' '.$limit);
					   
	if (!mysql_num_rows($qr)) return array();
	
	while ($obj = mysql_fetch_array($qr)){
		$objects[$i] = array();
		$objects[$i]['id'] = $obj['id'];
		$objects[$i]['id_section'] = $obj['id_section'];
		for ($j=0;$j<sizeof($attrs_ru); $j++){
			$objects[$i][$attrs_ru[$j]] = stripslashes($obj[$attrs_en[$j]]);
		}
		$i++;
	}
	
	return $objects;
}

// получение элемента
function getElement($id){
	$qr = mysql_query('SELECT `id_section` FROM `i_block_elements` WHERE `id`='.$id.' LIMIT 1');
	$obj = mysql_fetch_object($qr);
	$id_section = $obj->id_section;
	
	$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` WHERE `category`="block_elements" AND `category_id`='.$id_section.' ORDER BY `id_sort`');
	
	if (!mysql_num_rows($qr)){
		$id_parent = getPrentWAttrs($id_section);
		$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` 
						   WHERE `category`="block_elements" AND `category_id`='.$id_parent.' ORDER BY `id_sort`');
	}
	
	$attrs_ru = array();
	$attrs_en = array();
	$attrs_str = '';
	$i=0;
	
	while ($obj = mysql_fetch_object($qr)){
		if ($i != 0) $attrs_str .= ', ';
		$attrs_ru[] = $obj->name_ru;
		$attrs_en[] = $obj->name_en;
		$attrs_str .= '`'.$obj->name_en.'`';
		$i++;
	}
	
	$attrs_str = trim($attrs_str);
	$qr = mysql_query('SELECT `id`, `id_section`, '.$attrs_str.' FROM `i_block_elements` WHERE `id`='.$id.' LIMIT 1');
	
	if (!mysql_num_rows($qr)) return array();
	$obj = mysql_fetch_array($qr);
	$object = array();
	
	$object['id'] = $obj['id'];
	$object['id_section'] = $obj['id_section'];
	for ($j=0;$j<sizeof($attrs_ru); $j++){
		$object[$attrs_ru[$j]] = stripslashes($obj[$attrs_en[$j]]);
	}
	
	return $object;
}

// получение блоков
function getBlocks($id, $limit = 0, $order_direction = 'ASC', $order = 'id', $search_rows = '', $search_keyword = '', $advanced_search = ''){
	if ($limit === 0) $limit = '';
	else $limit = 'LIMIT '.$limit;
	
	$search = '';
	if ($search_keyword && $search_rows){
		$search_rows = explode(',', $search_rows);
		$search_keyword = explode(' ', $search_keyword);
		for ($i = 0; $i < sizeof($search_rows); $i++){
			$search_rows[$i] = trim($search_rows[$i]);
			if ($i != 0) $search .= ' OR ';
			for ($j = 0; $j < sizeof($search_keyword); $j++){
				$search_keyword[$j] = trim($search_keyword[$j]);
				if ($j != 0) $search .= ' OR ';
				$search .= '`'.$search_rows[$i].'` LIKE \'%'.$search_keyword[$j].'%\'';
			}
		}
		$search = 'AND ('.$search.')';
	}
	if ($advanced_search) $search .= ' AND ('.$advanced_search.')';
	$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` WHERE `category`="block" AND `category_id`='.$id.' ORDER BY `id_sort`');
	if (!mysql_num_rows($qr)){
		$id_parent = getBlockPrentWAttrs($id);
		$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` WHERE `category`="block" AND `category_id`='.$id_parent.' ORDER BY `id_sort`');
	}
	$attrs_ru = array();
	$attrs_en = array();
	$attrs_str = '';
	$i=0;
	while ($obj = mysql_fetch_object($qr)){
		if ($i != 0) $attrs_str .= ', ';
		$attrs_ru[] = $obj->name_ru;
		$attrs_en[] = $obj->name_en;
		$attrs_str .= '`'.$obj->name_en.'`';
		$i++;
	}
	$attrs_str = trim($attrs_str);
	$objects = array();
	$i = 0;
	$qr = mysql_query('SELECT `id`, `id_section`, '.$attrs_str.' FROM `i_block` WHERE `id_section`='.$id.' '.$search.' ORDER BY `'.$order.'` '.$order_direction.' '.$limit);
	if (!mysql_num_rows($qr)) return array();
	while ($obj = mysql_fetch_array($qr)){
		$objects[$i] = array();
		
		$objects[$i]['id'] = $obj['id'];
		$objects[$i]['id_section'] = $obj['id_section'];
		for ($j=0;$j<sizeof($attrs_ru); $j++){
			$objects[$i][$attrs_ru[$j]] = stripslashes($obj[$attrs_en[$j]]);
		}
		$i++;
	}
	return $objects;
}

// получение блока
function getBlock($id){
	$qr = mysql_query('SELECT `id_section` FROM `i_block` WHERE `id`='.$id.' LIMIT 1');
	$obj = mysql_fetch_object($qr);
	$id_section = $obj->id_section;
	$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` WHERE `category`="block" AND `category_id`='.$id_section.' ORDER BY `id_sort`');
	if (!mysql_num_rows($qr)){
		$id_parent = getBlockPrentWAttrs($id_section);
		$qr = mysql_query('SELECT `name_en`, `name_ru` FROM `i_option` WHERE `category`="block" AND `category_id`='.$id_parent.' ORDER BY `id_sort`');
	}
	$attrs_ru = array();
	$attrs_en = array();
	$attrs_str = '';
	$i=0;
	while ($obj = mysql_fetch_object($qr)){
		if ($i != 0) $attrs_str .= ', ';
		$attrs_ru[] = $obj->name_ru;
		$attrs_en[] = $obj->name_en;
		$attrs_str .= '`'.$obj->name_en.'`';
		$i++;
	}
	$attrs_str = trim($attrs_str);
	$qr = mysql_query('SELECT `id`, `id_section`, '.$attrs_str.' FROM `i_block` WHERE `id`='.$id.' LIMIT 1');
	if (!mysql_num_rows($qr)) return array();
	$obj = mysql_fetch_array($qr);
	$object = array();
	
	$object['id'] = $obj['id'];
	$object['id_section'] = $obj['id_section'];
	for ($j=0;$j<sizeof($attrs_ru); $j++){
		$object[$attrs_ru[$j]] = stripslashes($obj[$attrs_en[$j]]);
	}
	return $object;
}

// определение родителя
function getParent($id, $table = 'i_block_elements', $row = 'id_section'){
	$qr = mysql_query('SELECT `'.$row.'` FROM `'.$table.'` WHERE `id`='.$id.' LIMIT 1');
	$obj = mysql_fetch_array($qr, MYSQL_ASSOC);
	if ($obj) return $obj[$row];
	return false;
}
// получение аттрибутов родителя
function getPrentWAttrs($id){
	$qr = mysql_query('SELECT `id_section` FROM `i_block` WHERE `id`='.$id.' LIMIT 1');
	$obj = mysql_fetch_object($qr);
	if (!$obj) return false;
	$parent_id = $obj->id_section;
	$id = $obj->id;
	$qr = mysql_query('SELECT `id` FROM `i_option` WHERE `category`="block_elements" AND `category_id`='.$parent_id.' LIMIT 1');
	$obj = mysql_fetch_object($qr);
	if ($obj) return $parent_id;
	else return getPrentWAttrs($parent_id);
}
// получение аттрибутов блока родителя
function getBlockPrentWAttrs($id){
	$qr = mysql_query('SELECT `id_section` FROM `i_block` WHERE `id`='.$id.' LIMIT 1');
	$obj = mysql_fetch_object($qr);
	if (!$obj) return false;
	$parent_id = $obj->id_section;
	$id = $obj->id;
	$qr = mysql_query('SELECT `id` FROM `i_option` WHERE `category`="block" AND `category_id`='.$parent_id.' LIMIT 1');
	$obj = mysql_fetch_object($qr);
	if ($obj) return $parent_id;
	else return getPrentWAttrs($parent_id);
}

// расширение файла
function get_file_extension($file){
	$matches = array();
	$reg = preg_match('/^.+\.(.+)$/', $file, $matches);
	return $matches[1];
}

// склонение слов
function sklon($num, $arr){
	//echo "Комментар".sklon(34, array('ий', 'ия', 'иев'));
	if($num==1){
		return $arr[0];
	}else if($num>=2 && $num<=4){
		return $arr[1];
	}else if(($num>=5 && $num <=19) or $num==0){
		return $arr[2];
	}else{
		$num1 = substr($num,-1,1);
		$num2 = substr($num,-2,1);
		if($num2==1){
		    return $arr[2];
		}else if($num1==1){
			return $arr[0];
		}else if($num1>=2 && $num1<=4){
			return $arr[1];
		}else if(($num1>=5 && $num1 <=9) or $num1==0){
			return $arr[2];
		}
	}
}

// получение даты из sql date
function get_sql_date_array($d){
	$arr = array();
	$arr ['year'] = $d{0}.$d{1}.$d{2}.$d{3};
	$arr ['month'] = $d{5}.$d{6};
	$arr ['day'] = $d{8}.$d{9};
	$arr ['hours'] = $d{11}.$d{12};
	$arr ['minutes'] = $d{14}.$d{15};
	$arr ['seconds'] = $d{17}.$d{18};
	return $arr;
}

// дата в unix формате
function get_timestamp_from_sql($date){
	$date = get_sql_date_array($date);
	return mktime($date['hours'], $date['minutes'], $date['seconds'], $date['month'], $date['day'], $date['year']);
}

// время unix в обычный
function sql_to_date($date, $format = 'Y-m-d H:i:s'){
	return date($format, get_timestamp_from_sql($date));
}

// определение родителей
$recurse_parent=array();
function getRecurseParent($id, $recurse_parent){
	global $recurse_parent;
	array_unshift($recurse_parent, $id);
	if ($id == 0) return true;
	$q='SELECT * FROM `i_block` WHERE `id`='.$id;
	$qr=mysql_query($q);
	$obj=mysql_fetch_object($qr);
	getRecurseParent($obj->id_section, $recurse_parent);
}

// получение имен блоков
function getObjNamesById($id, $param = 'name_block'){
	$q='SELECT * FROM `i_block` WHERE `id`='.$id;
	$qr=mysql_query($q);
	$obj=mysql_fetch_array($qr, MYSQL_ASSOC);
	return $obj[$param];
}


// крошка админки
function admin_print_dir($curr_link = false){
	global $recurse_parent;
	if (@$_GET['id_section']) $id = @$_GET['id_section'];
	else $id = @$_GET['id'];
	getRecurseParent($id,null);
	echo '<div class="small_red_text">';
	for ($i=0;$i<sizeof($recurse_parent); $i++){
		if ($recurse_parent[$i] == 0) echo '<a href="index.php" class="small_red_text">ROOT</a>';
	  	if (!$id) break;
		if ($recurse_parent[$i] != $id || $curr_link){
			echo '<a href="'.($_GET['module'] == 'block_elements' && $i == sizeof($recurse_parent) - 1  ? 'elements.php' : 'index.php').'?id_section='.$recurse_parent[$i].'&module='.($_GET['module'] == 'block_elements' ? 'block_elements&sub_module=block' : 'block').'" class="small_red_text">'.getObjNamesById($recurse_parent[$i]).'</a>';
		}else{
			echo getObjNamesById($recurse_parent[$i]);
		}
		if ($recurse_parent[$i] != $id) echo ' / ';
	}
	echo '</div>';
}

// json
function json($a=false){
	if(is_null($a)) return 'null';
	if($a === false) return 'false';
	if($a === true) return 'true';
	if(is_scalar($a)){
		if(is_float($a)){
			return floatval(str_replace(",", ".", strval($a)));
		}else if(is_numeric($a)){
			return $a;
		}else{
			$jsonReplaces = array("\\"=>'\\\\', "/"=>'\\/', "\n"=>'\\n', "\t"=>'\\t', "\r"=>'\\r', "\b"=>'\\b', "\f"=>'\\f', '"'=>'\"');
			return '"'.strtr($a, $jsonReplaces).'"';
		}
	}else if( !is_array($a) ) return false;
	$isList = true;
	foreach($a as $k=>$v){
		if(!is_numeric($k)){
			$isList = false;
			break;
		}
	}
	$result = array();
	if($isList){
		foreach ($a as $v) $result[] = json($v);
		return '[' . join(',', $result) . ']';
	}else{
		foreach ($a as $k => $v) $result[] = json($k).':'.json($v);
		return '{' . join(',', $result) . '}';
	}
}

// конвертиация размеров
function convertBytes($bytes){
	$types = array(1=>"K", "M", "G", "T");
	$index = 0;
	while(($check = $bytes/1024)>=1 && $index++<=count($types)){
		$bytes = round($check, 2);
	}
	return ($bytes?$bytes:0)." ".$types[$index]."B";
}

// иконка документа
function getIcon($ext){
	$icons = array(
		'word.gif'=>array('doc', 'docx'),
		'excel.gif'=>array('xls', 'csv'),
		'rar.gif'=>array('rar', 'zip'),
		'pdf.gif'=>array('pdf'),
		'image.gif'=>array('gif', 'jpg', 'jpeg')
	);
	foreach($icons as $ico=>$arr){
		if(in_array($ext, $arr)) return $ico;
	}
	return 'word.gif';
}

// пагинация
function drawPages($total_elements, $onepage, $pg=0, $page_atributes=array()){
	$print_pages = '';
	if(ceil($total_elements/$onepage)>1){
		$print_pages .= "<div align=\"center\" class=\"pages-div\"><b>Страницы:</b> ";
		if($pg>0) $print_pages .= "<a href=\"".$_SERVER['PHP_SELF']."?pg=".$pg.($page_atributes ? '&'.join('&', $page_atributes) : '')."\">&larr;</a> ";
		$index = $pg>=6 ? ($pg+1<ceil($total_elements/$onepage)-5 ? $pg-5 : (ceil($total_elements/$onepage)>11 ? ceil($total_elements/$onepage)-11 : 0)) : 0;
		for($i=1; $i<=(ceil($total_elements/$onepage)<11 ? ceil($total_elements/$onepage) : 11); $i++){
			$index++;
			if($index>ceil($total_elements/$onepage)) break;
			if($index==$pg+1){
				$print_pages .= $index." ";
			}else{
				$print_pages .= "<a href=\"".$_SERVER['PHP_SELF']."?pg=".$index.($page_atributes ? '&'.join('&', $page_atributes) : '')."\">".$index."</a> ";
			}
		}
		if($pg+1<ceil($total_elements/$onepage)) $print_pages .= "<a href=\"".$_SERVER['PHP_SELF']."?pg=".($pg+2).($page_atributes ? '&'.join('&', $page_atributes) : '')."\">&rarr;</a> ";
		$print_pages .= '</div>';
	}
	return $print_pages;
}

// показ сообщения
function showMsg($content, $class='', $tag='div'){
		echo '<'.$tag.' class="message-conteiner '.$class.'">'.$content.'</'.$tag.'>';
		echo '<script type="text/javascript">setTimeout(function(){$(\'.message-conteiner\').hide("normal", function(){ $(this).remove() })}, 5000);</script>';
	}

// слово маленькими буквами	
function lower($text)
{
    $UP_CASE=array('A'=>'a', 'B'=>'b', 'C'=>'c', 'D'=>'d', 'E'=>'e', 'F'=>'f', 'G'=>'g', 'H'=>'h', 'I'=>'i', 'J'=>'j', 'K'=>'k', 'L'=>'l', 'M'=>'m', 'N'=>'n', 'O'=>'o', 'P'=>'p', 'Q'=>'q', 'R'=>'r', 'S'=>'s', 'T'=>'t', 'U'=>'u', 'V'=>'v', 'W'=>'w', 'X'=>'x', 'Y'=>'y', 'Z'=>'z', 'А'=>'а', 'Б'=>'б', 'В'=>'в', 'Г'=>'г', 'Д'=>'д', 'Е'=>'е', 'Ё'=>'ё', 'Ж'=>'ж', 'З'=>'з', 'И'=>'и', 'Й'=>'й', 'К'=>'к', 'Л'=>'л', 'М'=>'м', 'Н'=>'н', 'О'=>'о', 'П'=>'п', 'Р'=>'р', 'С'=>'с', 'Т'=>'т', 'У'=>'у', 'Ф'=>'ф', 'Х'=>'х', 'Ц'=>'ц', 'Ч'=>'ч', 'Ш'=>'ш', 'Щ'=>'щ', 'Ъ'=>'ъ', 'Ы'=>'ы', 'Ь'=>'ь', 'Э'=>'э', 'Ю'=>'ю', 'Я'=>'я');
     return strtr($text,  $UP_CASE);
}

// транслит	
function translit($string)
{
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => "",   'ы' => 'y',   'ъ' => "",
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
		' ' => '-',	  'ә' => 'a',	'і' => 'i',
		'ң' => 'n',	  'ғ' => 'g',   'ү' => 'u',
		'ұ' => 'u',   'қ' => 'k',   'ө' => 'o',
		'һ' => 'kh',
 
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => "",   'Ы' => 'Y',   'Ъ' => "",
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		' ' => '-',	  'Ә' => 'A',	'І' => 'I',
		'Ң' => 'N',	  'Ғ' => 'G',   'Ү' => 'U',
		'Ұ' => 'U',   'Қ' => 'K',   'Ө' => 'O',
		'Һ' => 'KH',
    );
	$string = str_replace(' ','-',$string);
	$string = preg_replace('/[^a-zа-яё0-9\-]+/iu', '', $string);
	
    return lower(strtr($string, $converter));
}





?>