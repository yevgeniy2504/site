<?
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/api.php");
if ($ob->check_admin())
{
if (isset($_POST["act"]))
{
	
	if ($_POST["act"]=='get_down')
	{
		
		$s=mysql_query("select * from i_".$_POST["block"]." where id=".$_POST["id"]."");
		$r=mysql_fetch_array($s);
		
		$true=false;
		
		
		
		$ss=mysql_query("select * from i_".$_POST["block"]." where id_section=".$r["id_section"]." and id_sort>".$r["id_sort"]." order by id_sort asc limit 1");
		
		$rr=mysql_fetch_array($ss);	
		
			$next=$rr["id"];
			$sort=$rr["id_sort"];	
		
		
		echo $r["id_sort"].'<br />';
		echo $rr["id_sort"].'<br />';
		
		mysql_query("update i_".$_POST["block"]." set id_sort=".$r["id_sort"]." where id=".$next."");
		mysql_query("update i_".$_POST["block"]." set id_sort=".$sort." where id=".$r["id"]."");
		
		
	}
	
	if ($_POST["act"]=='get_del')
	{
		mysql_query("delete from i_".$_POST["block"]." where id=".$_POST["id"]."");
	}
	
	
	if ($_POST["act"]=='get_up')
	{
		
		$s=mysql_query("select * from i_".$_POST["block"]." where id=".$_POST["id"]."");
		$r=mysql_fetch_array($s);
		
		$true=false;
		
		
		
		$ss=mysql_query("select * from i_".$_POST["block"]." where id_section=".$r["id_section"]." and id_sort<".$r["id_sort"]." order by id_sort desc limit 1");
		
		$rr=mysql_fetch_array($ss);	
		
			$next=$rr["id"];
			$sort=$rr["id_sort"];	
		
		
		echo $r["id_sort"].'<br />';
		echo $rr["id_sort"].'<br />';
		
		mysql_query("update i_".$_POST["block"]." set id_sort=".$r["id_sort"]." where id=".$next."");
		mysql_query("update i_".$_POST["block"]." set id_sort=".$sort." where id=".$r["id"]."");
		
		
	}
	
	
	if ($_POST["act"]=='get_list')
	{
		$fields = $incom->menu->get_fields($_POST["ver"], $_POST["id"], $_POST["block"]);
		
	
	
	$i=1;
	foreach ($fields as $k=>$v)
	{
		$s=mysql_query("select * from i_".$_POST["block"]." where id_section=".$_POST["id"]." and link_menu='".$v["link"]."'");
		$r=mysql_fetch_array($s);
		?>
    		<li class="ui-state-default" link="<?=$v["link"]?>" sub="1">
            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$v["name"]?>
            <?
            if ($i==1)
			{
				?>
                <a href="javascript:get_down(<?=$r["id"]?>,'<?=$_POST["block"]?>')" title="Переместить вниз">
                <img src="/incom/modules/theme/default/icons/down.png"></a>
                <?	
			}
			else
			{
				if ($i==sizeof($fields))
				{
					?>
					<a href="javascript:get_up(<?=$r["id"]?>,'<?=$_POST["block"]?>')" title="Переместить вверх">
                    <img src="/incom/modules/theme/default/icons/up.png"></a>
					<?	
				}
				else
				{
					?>
                    <a href="javascript:get_down(<?=$r["id"]?>,'<?=$_POST["block"]?>')" title="Переместить вниз">
                    <img src="/incom/modules/theme/default/icons/down.png"></a> 
                    <a href="javascript:get_up(<?=$r["id"]?>,'<?=$_POST["block"]?>')" title="Переместить вверх">
                    <img src="/incom/modules/theme/default/icons/up.png"></a>
                    <?	
				}		
			}
			if ($v["link"]!='/ru/catalog/')
			{
			?>
            <a href="javascript:get_new('<?=$_POST["ver"]?>',<?=$r["id"]?>,'<?=($_POST["sub_block"]=='block_elements'?'block_elements':'block')?>')" title="Новый подпункт">
            <img src="/incom/modules/theme/default/icons/new.png"></a>
            <?
			}
			?>
              <a href="javascript:get_edit('<?=$_POST["ver"]?>',<?=$r["id"]?>,'<?=$_POST["block"]?>')" title="Редактировать">
           	<img src="/incom/modules/theme/default/icons/edit.png"></a>
            <a href="javascript:get_del(<?=$r["id"]?>,'<?=$_POST["block"]?>')" title="Удалить">
            <img src="/incom/modules/theme/default/icons/del.png"></a>
            </li>    
        <?
		
		if (sizeof($v["sub"])>0)
		{
			$j=1;
			foreach ($v["sub"] as $q=>$w)
			{
				if ($v["link"]!='/ru/catalog/')
				{
				if ($_POST["sub_block"]=='block_elements')
				{
				$s1=mysql_query("select * from i_block_elements where id_section=".$r["id"]." and link_menu='".$w["link"]."'");
				$r1=mysql_fetch_array($s1);
				}
				else
				{
				$s1=mysql_query("select * from i_block where id_section=".$r["id"]." and link_menu='".$w["link"]."'");
				$r1=mysql_fetch_array($s1);
				}
				
				?>
				<li class="ui-state-default" link="<?=$w["link"]?>" sub="2" style="margin-left:20px;">
            		<span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$w["name"]?>
                    <?
					if ($j==1)
					{
						?>
						<a href="javascript:get_down(<?=$r1["id"]?>,'<?=$_POST["sub_block"]?>')" title="Переместить вниз">
                        <img src="/incom/modules/theme/default/icons/down.png"></a>
						<?	
					}
					else
					{
						if ($j==sizeof($v["sub"]))
						{
							?>
							<a href="javascript:get_up(<?=$r1["id"]?>,'<?=$_POST["sub_block"]?>')" title="Переместить вверх">
                            <img src="/incom/modules/theme/default/icons/up.png"></a>
							<?	
						}
						else
						{
							?>
							<a href="javascript:get_down(<?=$r1["id"]?>,'<?=$_POST["sub_block"]?>')" title="Переместить вниз">
                            <img src="/incom/modules/theme/default/icons/down.png"></a> 
							<a href="javascript:get_up(<?=$r1["id"]?>,'<?=$_POST["sub_block"]?>')" title="Переместить вверх">
                            <img src="/incom/modules/theme/default/icons/up.png"></a>
							<?	
						}		
					}
					if ($_POST["sub_block"]=='block_elements')
					{}
					else
					{
					?>
					<a href="javascript:get_new('<?=$_POST["ver"]?>',<?=$r1["id"]?>,'block_elements')" title="Новый подпункт">
                    <img src="/incom/modules/theme/default/icons/new.png"></a>
                    <?
					}
					?>
                      <a href="javascript:get_edit('<?=$_POST["ver"]?>',<?=$r1["id"]?>,'<?=$_POST["sub_block"]?>')" title="Редактировать">
           			<img src="/incom/modules/theme/default/icons/edit.png"></a>
					<a href="javascript:get_del(<?=$r1["id"]?>,'<?=$_POST["sub_block"]?>')" title="Удалить">
					<img src="/incom/modules/theme/default/icons/del.png"></a>
            	</li> 	
                <?
				}
				if (sizeof($w["sub"])>0)
				{
					$k=1;
					foreach ($w["sub"] as $e=>$t)
					{
						$s2=mysql_query("select * from i_block_elements where id_section=".$r["id"]." and link_menu='".$w["link"]."'");
						$r2=mysql_fetch_array($s2);
						?>
						<li class="ui-state-default" link="<?=$t["link"]?>" sub="2" style="margin-left:40px;">
							<span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$t["name"]?>
                            <?
							if ($k==1)
							{
								?>
								<a href="javascript:get_down(<?=$r2["id"]?>,'block_elements')" title="Переместить вниз">
                                <img src="/incom/modules/theme/default/icons/down.png"></a>
								<?	
							}
							else
							{
								if ($k==sizeof($w["sub"]))
								{
									?>
									<a href="javascript:get_up(<?=$r2["id"]?>,'block_elements')" title="Переместить вверх">
                                    <img src="/incom/modules/theme/default/icons/up.png"></a>
									<?	
								}
								else
								{
									?>
									<a href="javascript:get_down(<?=$r2["id"]?>,'block_elements')" title="Переместить вниз">
                                    <img src="/incom/modules/theme/default/icons/down.png"></a> 
									<a href="javascript:get_up(<?=$r2["id"]?>,'block_elements')" title="Переместить вверх">
                                    <img src="/incom/modules/theme/default/icons/up.png"></a>
									<?	
								}		
							}
							?>
							  <a href="javascript:get_edit('<?=$_POST["ver"]?>',<?=$r2["id"]?>,'block_elements')" title="Редактировать">
           			<img src="/incom/modules/theme/default/icons/edit.png"></a>
							<a href="javascript:get_del(<?=$r2["id"]?>,'block_elements')" title="Удалить">
							<img src="/incom/modules/theme/default/icons/del.png"></a>
						</li> 	
						<?
					}
					
					$k++;
			
				}
				
				$j++;
			}
		}
		
		$i++;		
	}

		
	}
	
	exit;	
}


?>
<link href="/incom/modules/theme/default/style.css" rel="stylesheet" type="text/css" />
<script src="/incom/modules/theme/default/jquery-1.4.2.min.js" type="text/javascript"></script>
<link type="text/css" href="/incom/modules/theme/default/css/ui-lightness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/incom/modules/theme/default/jquery-ui-1.8.23.custom.min.js"></script>

<style>
	#sortable { list-style-type: none; margin: 0; padding: 0; float:left}
	#sortable li { padding-left:10px; border:0px; margin-bottom:10px; width:auto; background:none; font-size:13px; color:#333; font-family:Arial, Helvetica, sans-serif}
	#sortable li span { position: absolute; margin-left:-15px; }
</style>

<script>

function get_list(id, block,ver,sub_block)
{

	$.post("admin_menu.php",
	{
		act:'get_list',
		id :id,
		block:block,
		ver:ver,
		sub_block:sub_block
			
	},
	onSuccess
	)	
	
}

function get_down(id,block)
{

	$.post("admin_menu.php",
	{
		act:'get_down',
		id :id,
		block:block
			
	},
	get_list(<?=$_GET["id"]?>,'<?=$_GET["block"]?>','<?=$_GET["ver"]?>','<?=$_GET["sub_block"]?>')
	)	
	
}

function get_del(id,block)
{

	$.post("admin_menu.php",
	{
		act:'get_del',
		id :id,
		block:block
			
	},
	get_list(<?=$_GET["id"]?>,'<?=$_GET["block"]?>','<?=$_GET["ver"]?>','<?=$_GET["sub_block"]?>')
	)	
	
}

function get_up(id,block)
{

	$.post("admin_menu.php",
	{
		act:'get_up',
		id :id,
		block:block
			
	},
	get_list(<?=$_GET["id"]?>,'<?=$_GET["block"]?>','<?=$_GET["ver"]?>','<?=$_GET["sub_block"]?>')
	)	
	
}


function onSuccess(data)
{
	$('#sortable').html(data);	
}

setInterval("get_list(<?=$_GET["id"]?>,'<?=$_GET["block"]?>','<?=$_GET["ver"]?>','<?=$_GET["sub_block"]?>')",1000)

$(function(){

	get_list(<?=$_GET["id"]?>,'<?=$_GET["block"]?>','<?=$_GET["ver"]?>','<?=$_GET["sub_block"]?>')
	
})


function get_new(lang, id, block)
{
	var src='';
	var mod = block;
	
	if (block=='block_elements') mod='element';
	
	src = '/incom/modules/inf_block/admin_'+mod+'.php?id_section='+id+'&module='+block+'&lang='+lang+'';
	
	$('#edit iframe').attr('src',src);
	$('#admin_h2').html("Добавить пункт меню");	
}


function get_edit(lang,id, block)
{
	var src='';
	var mod = block;
	
	if (block=='block_elements') mod='elements';
	else mod='edit';
	
	src = '/incom/modules/inf_block/admin_'+mod+'.php?id='+id+'&lang='+lang+'';
	
	$('#edit iframe').attr('src',src);
	$('#admin_h2').html("Редактировать пункт меню");	
}

</script>

<table width="100%">
<tr>
<td width="50%" align="left" valign="top">
<h2 style="font-size:18px; font-family:Arial, Helvetica, sans-serif">Список пунктов</h2>
<?
$fields = $incom->menu->get_fields($_GET["ver"], $_GET["id"], $_GET["block"]);
?>
<ul id="sortable">
<?

	$i=1;
	foreach ($fields as $k=>$v)
	{
		$s=mysql_query("select * from i_".$_GET["block"]." where id_section=".$_GET["id"]." and link_menu='".$v["link"]."'");
		$r=mysql_fetch_array($s);
		?>
    		<li class="ui-state-default" link="<?=$v["link"]?>" sub="1">
            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$v["name"]?>
            <?
            if ($i==1)
			{
				?>
                <a href="javascript:get_down(<?=$r["id"]?>,'<?=$_GET["block"]?>')" title="Переместить вниз">
                <img src="/incom/modules/theme/default/icons/down.png"></a>
                <?	
			}
			else
			{
				if ($i==sizeof($fields))
				{
					?>
					<a href="javascript:get_up(<?=$r["id"]?>,'<?=$_GET["block"]?>')" title="Переместить вверх">
                    <img src="/incom/modules/theme/default/icons/up.png"></a>
					<?	
				}
				else
				{
					?>
                    <a href="javascript:get_down(<?=$r["id"]?>,'<?=$_GET["block"]?>')" title="Переместить вниз">
                    <img src="/incom/modules/theme/default/icons/down.png"></a> 
                    <a href="javascript:get_up(<?=$r["id"]?>,'<?=$_GET["block"]?>')" title="Переместить вверх">
                    <img src="/incom/modules/theme/default/icons/up.png"></a>
                    <?	
				}		
			}
			if ($v["link"]!='/ru/catalog/')
			{
			?>
            <a href="javascript:get_new('<?=$_GET["ver"]?>',<?=$r["id"]?>,'<?=($_GET["sub_block"]=='block_elements'?'block_elements':'block')?>')" title="Новый подпункт">
            <img src="/incom/modules/theme/default/icons/new.png"></a>
            <?
			}
			?>
            <a href="javascript:get_edit('<?=$_GET["ver"]?>',<?=$r["id"]?>,'<?=$_GET["block"]?>')" title="Редактировать">
            <img src="/incom/modules/theme/default/icons/edit.png"></a>
            
            <a href="javascript:get_del(<?=$r["id"]?>,'<?=$_GET["block"]?>')" title="Удалить">
            <img src="/incom/modules/theme/default/icons/del.png"></a>
            </li>    
        <?
		
		if (sizeof($v["sub"])>0)
		{
			$j=1;
			foreach ($v["sub"] as $q=>$w)
			{
				if ($v["link"]!='/ru/catalog/')
				{
				if ($_GET["sub_block"]=='block_elements')
				{
				$s1=mysql_query("select * from i_block_elements where id_section=".$r["id"]." and link_menu='".$w["link"]."'");
				$r1=mysql_fetch_array($s1);
				}
				else
				{
				$s1=mysql_query("select * from i_block where id_section=".$r["id"]." and link_menu='".$w["link"]."'");
				$r1=mysql_fetch_array($s1);
				}
				
				?>
				<li class="ui-state-default" link="<?=$w["link"]?>" sub="2" style="margin-left:20px;">
            		<span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$w["name"]?>
                    <?
					if ($j==1)
					{
						?>
						<a href="javascript:get_down(<?=$r1["id"]?>,'<?=$_GET["sub_block"]?>')" title="Переместить вниз">
                        <img src="/incom/modules/theme/default/icons/down.png"></a>
						<?	
					}
					else
					{
						if ($j==sizeof($v["sub"]))
						{
							?>
							<a href="javascript:get_up(<?=$r1["id"]?>,'<?=$_GET["sub_block"]?>')" title="Переместить вверх">
                            <img src="/incom/modules/theme/default/icons/up.png"></a>
							<?	
						}
						else
						{
							?>
							<a href="javascript:get_down(<?=$r1["id"]?>,'<?=$_GET["sub_block"]?>')" title="Переместить вниз">
                            <img src="/incom/modules/theme/default/icons/down.png"></a> 
							<a href="javascript:get_up(<?=$r1["id"]?>,'<?=$_GET["sub_block"]?>')" title="Переместить вверх">
                            <img src="/incom/modules/theme/default/icons/up.png"></a>
							<?	
						}		
					}
					if ($_GET["sub_block"]=='block_elements')
					{}
					else
					{
					?>
					<a href="javascript:get_new(<?=$r1["id"]?>,'block_elements')" title="Новый подпункт">
                    <img src="/incom/modules/theme/default/icons/new.png"></a>
                    <?
					}
					?>
                    <a href="javascript:get_edit(<?=$r1["id"]?>,'<?=$_GET["sub_block"]?>')" title="Редактировать">
           			<img src="/incom/modules/theme/default/icons/edit.png"></a>
					<a href="javascript:get_del(<?=$r1["id"]?>,'<?=$_GET["sub_block"]?>')" title="Удалить">
					<img src="/incom/modules/theme/default/icons/del.png"></a>
            	</li> 	
                <?
				}
				if (sizeof($w["sub"])>0)
				{
					$k=1;
					foreach ($w["sub"] as $e=>$t)
					{
						$s2=mysql_query("select * from i_block_elements where id_section=".$r["id"]." and link_menu='".$w["link"]."'");
						$r2=mysql_fetch_array($s2);
						?>
						<li class="ui-state-default" link="<?=$t["link"]?>" sub="2" style="margin-left:40px;">
							<span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?=$t["name"]?>
                            <?
							if ($k==1)
							{
								?>
								<a href="javascript:get_down(<?=$r2["id"]?>,'block_elements')" title="Переместить вниз">
                                <img src="/incom/modules/theme/default/icons/down.png"></a>
								<?	
							}
							else
							{
								if ($k==sizeof($w["sub"]))
								{
									?>
									<a href="javascript:get_up(<?=$r2["id"]?>,'block_elements')" title="Переместить вверх">
                                    <img src="/incom/modules/theme/default/icons/up.png"></a>
									<?	
								}
								else
								{
									?>
									<a href="javascript:get_down(<?=$r2["id"]?>,'block_elements')" title="Переместить вниз">
                                    <img src="/incom/modules/theme/default/icons/down.png"></a> 
									<a href="javascript:get_up(<?=$r2["id"]?>,'block_elements')" title="Переместить вверх">
                                    <img src="/incom/modules/theme/default/icons/up.png"></a>
									<?	
								}		
							}
							?>
							<a href="javascript:get_edit(<?=$r2["id"]?>,'block_elements')" title="Редактировать">
            				<img src="/incom/modules/theme/default/icons/edit.png"></a>
							<a href="javascript:get_del(<?=$r2["id"]?>,'block_elements')" title="Удалить">
							<img src="/incom/modules/theme/default/icons/del.png"></a>
						</li> 	
						<?
					}
					
					$k++;
			
				}
				
				$j++;
			}
		}
		
		$i++;		
	}
?>
	
</ul>
<br clear="left" />
<input type="button" value="Создать новый пункт" onclick="get_new(<?=$_GET["id"]?>,'<?=$_GET["block"]?>')">
</td>
<td width="50%" align="left" valign="top">
<h2 style="font-size:18px; font-family:Arial, Helvetica, sans-serif" id="admin_h2">Добавить пункт меню</h2>
<div id="edit">
<iframe name="admin_menu" id="admin_menu" src="/incom/modules/inf_block/admin_<?=($_GET["block"]=='block_elements'?'element':''.$_GET["block"].'')?>.php?id_section=<?=$_GET["id"]?>&module=<?=$_GET["block"]?>&lang=<?=$_GET["ver"]?>" frameborder="0" width="100%" height="400"></iframe>
</div>
</td>
</tr>
</table>

<script>
$(window).load(function(){
	
	window.parent.get_frame_height($(document).height());
		
})
</script><?
}
?>