// JavaScript Document

jQuery(document).ready(function(){
   //align element in the middle of the screen
  jQuery.fn.alignCenter = function() {
   //get margin left
   var marginLeft = Math.max(40, parseInt(jQuery(window).width()/2 - jQuery(this).width()/2)) + 'px';
   //get margin top
   var marginTop = (document.body.scrollTop || document.documentElement.scrollTop) + 50  + 'px';
   //return updated element
   return jQuery(this).css({'margin-left':marginLeft, 'margin-top':marginTop});
  };
});


function get_frame_height(height){
	
	jQuery('#admin_window').css({"height":(height+50)});
	jQuery('#admin_window iframe').css({"height":height});
	
}


function show_w() {
if(jQuery('#admin_window').css('display') == 'none') {
jQuery('#admin_window').css({"left":"0","top":"0","margin-left":"0","margin-top":"0"});
	jQuery('#admin_window').alignCenter();
	jQuery('#admin_window').show();
	
	
	
	
}

return false;
};

function show_w1() {
if(jQuery('#admin_window1').css('display') == 'none') {
jQuery('#admin_window1').css({"left":"0","top":"0","margin-left":"0","margin-top":"0"});
	jQuery('#admin_window1').alignCenter();
	jQuery('#admin_window1').show();
	
}
//this.blur();
return false;
};

jQuery(document).ready(function(){

		jQuery('#admin_windowClose').bind(
			'click',
			function()
			{
				jQuery('#admin_window').hide();
				jQuery('#admin_opaco').toggleClass('hidden').removeAttr('style');
			}
		);
		
		
		jQuery('body').click(function(){
			
			jQuery('.admin_pravka div').slideUp('fast');
				
		})
		
		
		
}
);

function show_el(element){
	
	element.slideDown('fast');
		
}


// генерируем название
function generate(){
	
	jQuery('#admin_hidden2').val(jQuery('#title').val());
	
	jQuery.ajax({
		url: "/incom/modules/file_manager/ajax.php",
		data: "do=generate&title="+jQuery('#title').val()+"&x=secure",
		type: "POST",
		dataType : "html",
		cache: false,
		success:  function(data)  { 
			jQuery('#name').val(""+data+"");
		},
		error: function(){ alert("Ошибка выбора.");  }
	});
	
}


// редактирование файла
function edit_file(path,format,name)
{

	jQuery.ajax({
		url: "/incom/modules/file_manager/edit_page.php",
		data: "do=edit_page&d_path="+path+"&format="+format+"&name="+name+"&x=secure",
		type: "POST",
		dataType : "html",
		cache: false,
		success:  function(data)  {  
			jQuery("#admin_windowTopContent").html("Редактирование файла");
			jQuery("#admin_windowContent").html(data); 
			jQuery('#admin_window').css({"width":"900px","height":"270px"}); 
			show_w();   
		},
		error: function(){ alert("Ошибка создание файла.");  }
	});
}

// редактирование элемента
function edit_element(lang, id)
{
	jQuery("#admin_windowTopContent").html("Редактирование элемента");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="220" src="/incom/modules/inf_block/admin_elements.php?id='+id+'&lang='+lang+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"270px"}); 
	show_w();   
}

// редактирование меню
function edit_menu(lang,id, block, sub_block)
{
	jQuery("#admin_windowTopContent").html("Редактирование меню");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="220" src="/incom/modules/inf_block/admin_menu.php?id='+id+'&block='+block+'&ver='+lang+'&sub_block='+sub_block+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"270px"}); 
	show_w();   
}

// редактирование блока
function edit_block(lang,id)
{
	jQuery("#admin_windowTopContent").html("Редактирование раздела");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="220" src="/incom/modules/inf_block/admin_edit.php?id='+id+'&lang='+lang+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"370px"}); 
	show_w();   
}


// добавление блока
function add_block(lang,id)
{
	jQuery("#admin_windowTopContent").html("Добавление раздела");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="320" src="/incom/modules/inf_block/admin_block.php?id_section='+id+'&lang='+lang+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"370px"}); 
	show_w();   
}


// добавление элемента 
function add_element(lang,id)
{
	jQuery("#admin_windowTopContent").html("Добавление элемента");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="320" src="/incom/modules/inf_block/admin_element.php?id_section='+id+'&lang='+lang+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"370px"}); 
	show_w();   
}

// удаление блока
function delete_block(lang,id)
{
	if (confirm("Вы действительно хотите удалить раздел?"))
	{
		jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="320" src="/incom/modules/inf_block/delete_block.php?id='+id+'&lang='+lang+'"></iframe>');
	}	
}

// удаление элемента
function delete_element(lang,id)
{
	if (confirm("Вы действительно хотите удалить элемент?"))
	{
		jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="320" src="/incom/modules/inf_block/delete_element.php?id='+id+'&lang='+lang+'"></iframe>');
	}	
}



// редактирование файла
function edit_template(lang, id)
{
	jQuery("#admin_windowTopContent").html("Редактирование заголовков");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="420" src="/incom/modules/option/template/admin_edit.php?id='+id+'&lang='+lang+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"470px"}); 
	show_w();   
}


// редактирование файла
function edit_params(lang, id)
{
	jQuery("#admin_windowTopContent").html("Редактирование парамметров");
	jQuery("#admin_windowContent").html('<iframe frameborder="0" name="element" id="element" width="880" height="420" src="/incom/modules/inf_block/admin_params.php?id='+id+'&lang='+lang+'"></iframe>'); 
	jQuery('#admin_window').css({"width":"900px","height":"470px"}); 
	show_w();   
}



// показ ключевых слов
function show_tit()
{
	jQuery("#admin_windowContent1").html(jQuery('#sh_tit').html()); 
	jQuery('#admin_sh_tit').html(''); 
	jQuery('#admin_window1').css({"width":"500px","height":"220px"}); 
	show_w1();   
	
	jQuery('#admin_description').val(jQuery('#hidden4').val());
	jQuery('#admin_keywords').val(jQuery('#hidden3').val());
}

// функция замены
function str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}



// сохранение редактируемого файла файла
function save_edit_file(val1,format)
{
	var val=jQuery('#name').val();
	var cr;
	var path=jQuery('#hidden11').val();
	var title=jQuery('#hidden2').val();
	var keyw=jQuery('#hidden3').val();
	var desc=jQuery('#hidden4').val();
	var id=jQuery('#hidden5').val();
	if (format=='html')
	{
		var oEditor = FCKeditorAPI.GetInstance('page') ;
		res = oEditor.GetHTML();
	}
	else
	{
		res=jQuery('#page').val();
	}
	
	res=str_replace("&","zxc123",res);
	
	if (document.getElementById('template').checked){cr=1;}else{cr=0;}
	if (document.getElementById('active').checked){act=1;}else{act=0;}
	
	if (val=='Генерируется автоматически' || val=='')
	{
		alert("Название (eng) должно быть заполнено");
	}
	else
	{
	
		jQuery.ajax({
			url: "/incom/modules/file_manager/ajax.php",
			data: "do=save_edit_file&d_path="+path+"&name="
				   +val+"&cr="+cr+"&id="+id+"&act="+act+"&title="+title+"&keyw="+keyw+"&desc="+desc+"&page="+res+"&x=secure",
			type: "POST",
			dataType : "html",
			cache: false,
			success:  function(data)  {
				if (parseInt(data)==0) {
					alert('Страница с таким названием уже существует. Пожалуйста измените название.');		
				}
				else
				{
					jQuery("#info_msg").html(data); 
					if (val1=="save"){ 
						location.reload();
					}
				}
			},
			error: function(){ alert("Ошибка создание файла.");  }
		});
	}
}

// сохранение ключевых слов
function save_tit(){
	var title=jQuery('#title').val();
	var desc=jQuery('#description').val();
	var keyw=jQuery('#keywords').val();
	jQuery('#sh_tit').html(jQuery("#admin_windowContent1").html());
	jQuery('#hidden2').val(title);
	jQuery('#hidden3').val(keyw);
	jQuery('#hidden4').val(desc);
	jQuery('#title').val(title);
	jQuery('#description').val(desc);
	jQuery('#keywords').val(keyw);
	jQuery('#admin_window1').hide();
	jQuery('#admin_opaco1').toggleClass('hidden').removeAttr('style');
}


// закрытие окна
function cl(){
	jQuery('#window').hide();
	jQuery('#opaco').toggleClass('hidden').removeAttr('style');
}
