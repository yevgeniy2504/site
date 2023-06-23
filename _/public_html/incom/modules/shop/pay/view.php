<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/header.php")?>
<?
$select=$ob->select("i_payments",array("id"=>$_GET['id']),"");
$res=mysql_fetch_array($select);
?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
<form action="" method="post" enctype="multipart/form-data" name="form" id="form" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" class="title_text">Информация о заказе</td>
    </tr>
    <tr>
      <td height="15" align="left" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#ecebcf" height="1"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#f9f8e8" style="border: 1px solid #c4c5a6;"><table width="97%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td width="200" align="right" class="small_text"><strong>Дата/Время:</strong></td>
                  <td align="left" class="small_text"><?=$res['timestamp_x']?></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><strong>Статус заказа:</strong></td>
                  <td align="left" class="small_text"><? if($res['paid']==1){echo "оплачен";}else{echo "не оплачен";}?></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><strong>Доставка:</strong></td>
                  <td align="left" class="small_text"><?=$res['delivery']?></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><strong>Способ оплаты:</strong></td>
                  <td align="left" class="small_text"><?=$res['payment']?></td>
                </tr>
                <tr>
                  <td align="right" class="small_text"><strong>Доп. информация о доставке:</strong></td>
                  <td align="left" class="small_text"><?=$res['info_delivery']?></td>
                </tr>
               
                <tr>
				  <td colspan="2" align="right" class="small_text" height="15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" bgcolor="#676964"></td>
                    </tr>
                  </table></td>
			    </tr>
               <?
			   //$ob->alert($res['goods']);
			   $ar=explode("|",$res['goods']);
			   $i=1;
			   $cc=0;
			   foreach($ar as $k=>$v)
			   {
			   	if($v!="")
			   	{
					//$ob->alert($v);
				# Данные корзины
				$obj_vals = explode(';', $v);
					
                echo '<tr>
                  <td class="small_text" colspan="2"><strong>Информация о товаре №'.($i++).':</strong></td>
                </tr>
				<tr>
				 <td align="right" class="small_text"><strong>Количество:</strong></td>
				 <td  class="table_value" align="left">'.str_replace("-","",$obj_vals[1]).'</td>
				</tr>
				<tr>
				 <td align="right" class="small_text">URL:</td>
				 <td class="table_value" align="left"><a href="http://'.$_SERVER['HTTP_HOST'].'/ru/cat.php?id='.$obj_vals[0].'" target="_blank">http://'.$_SERVER['HTTP_HOST'].'/ru/cat.php?id='.$obj_vals[0].'</a></td>
				</tr>
				';
				
				$s=mysql_query("select * from i_block_elements where id=".$obj_vals[0]."");
				if ($s)
				{
				$r=mysql_fetch_array($s);	
				}
				
				$cc=$cc+$r["catalog_price"]*intval(str_replace("-","",$obj_vals[1]));
				
				# Параметры
				if ($obj_vals[2] != '')
				{
					$type = mysql_result(mysql_query("SELECT `name_block` FROM `i_block` WHERE `id`='".intval($obj_vals[2])."' LIMIT 1"), 0);
					$param = '';
					if ($obj_vals[3] != '')
					{
						@list($param_name, $param_coast) = mysql_fetch_row(mysql_query("SELECT `name_s`, `price_s` FROM `i_block_elements` WHERE `id`='".intval($obj_vals[3])."' AND `id_section`='".intval($obj_vals[2])."' LIMIT 1"));
						$param = $param_name.' <b>'.$param_coast.'</b> тг.';
					}
				echo '
				<tr>
				 <td align="right" class="small_text">Параметры:</td>
				 <td  class="table_value" align="left">'.$type.' '.$param.'</td>
				</tr>';
				}
				
				
                $goods=$ob->select("i_block_elements",array("id"=>$obj_vals[0]),"");
				$goods_res=mysql_fetch_array($goods);
				$option=$ob->search_option("block_elements","block",$goods_res['id_section'],array(""));
					while($option_res=mysql_fetch_array($option))
					{
					if($goods_res[''.$option_res['name_en'].'']!="")
					{
						if($goods_res[''.$option_res['name_en'].'']!="" AND ($option_res['type_field']=="i10" OR $option_res['type_field']=="i11"))
						{
								if($option_res['type_field']=="i11"){$text='<img src="/incom/resize.php?url='.$_SERVER['DOCUMENT_ROOT'].'/upload/images/'.$goods_res[''.$option_res['name_en'].''].'&w=100&h=90">';}
								if($option_res['type_field']=="i12"){}
						}else{$text='';}
						//если checkbox
					if($option_res['type_field']=="i7")
					{
						if($goods_res[''.$option_res['name_en'].'']==1){$text='Да';}else{$text='Нет';}
					}
					
				echo '<tr>
                  <td align="right" class="small_text">'.$option_res['name_ru'].':</td>
                  ';
				  if(!@$text)
			{
			echo '<td class="table_value" align="left">'.substr(strip_tags($goods_res[''.$option_res['name_en'].'']),0,200).'&nbsp;</td>';
      		}else
			{
			echo '<td class="table_value" align="left">'.$text.'&nbsp;</td>';
      		}
                echo'</tr>';
					}
                
				 }}
				}
				?>
				<tr>
				  <td colspan="2" align="right" class="small_text" height="15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" bgcolor="#676964"></td>
                    </tr>
                  </table></td>
			    </tr>
                 <tr>
                  <td align="right" class="small_text"><strong>Итого к оплате:</strong></td>
                  <td align="left" class="small_text"><?=$cc?> тенге</td>
                </tr>
				<tr>
                  <td class="small_text" colspan="2"><strong>Информация о покупателе:</strong></td>
                </tr>
                <?
				$users=$ob->select("i_shop_users",array("id"=>$res['id_user']),"");
				$users_res=mysql_fetch_array($users);
				
				$option=$ob->select("i_option",array("category"=>"shop_users","category_id"=>$users_res['id_section']),"id_sort");
				while($option_res=mysql_fetch_array($option))
				{
				if($users_res[''.$option_res['name_en'].'']!="")
					{
					if($users_res[''.$option_res['name_en'].'']!="" AND ($option_res['type_field']=="i10" OR $option_res['type_field']=="i11"))
			{
				if($option_res['type_field']=="i11"){$text='<img src="/incom/resize.php?url='.$_SERVER['DOCUMENT_ROOT'].'/upload/images/'.$users_res[''.$option_res['name_en'].''].'&w=100&h=90">';}
				if($option_res['type_field']=="i12"){}
			}else{$text='';}
			//если checkbox
			if($option_res['type_field']=="i7")
			{
				if($users_res[''.$option_res['name_en'].'']==1){$text='Да';}else{$text='Нет';}
			}
				
				
                echo '<tr>
                  <td align="right" class="small_text">'.$option_res['name_ru'].':</td>';
				 if(!@$text)
			{
			echo '<td class="table_value" align="left">'.substr(strip_tags($users_res[''.$option_res['name_en'].'']),0,200).'&nbsp;</td>';
      		}else
			{
			echo '<td class="table_value" align="left">'.$text.'&nbsp;</td>';
      		}
			}
                echo '</tr>';
				}
                ?>
                
            </table></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10" align="center" ></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#f9f8e8" style="border: 1px solid #c4c5a6;"><table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <td width="10%" align="left"><input type="button" name="button" id="button" value="&lt;&lt; назад" onclick="document.location.href='index.php'" /></td>
            <td width="11%" align="left">&nbsp;</td>
            <td width="79%" align="left">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
  </table>
</form>
<? require_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/theme/default/footer.php")?>
