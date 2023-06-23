jQuery(function($) {
	
	$('a.linknoindex').click(function(){window.open($(this).data("link"));return false;});
	$('a.linknoindex1').click(function(){window.open($(this).data("href"));return false;});
              
	$(".sp").spoiler({
		effect: "slide",
		title: true,
		srcid: "#spshopc"
	});   
	$("#sp").css({"text-decoration":"underline"});
	$("#sp").spoiler({
		effect: "slide",
		title: true,
		srcid: "#spshopc"
	});   
});