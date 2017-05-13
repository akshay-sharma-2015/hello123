 /*NAV SCRIPT*/
( function( $ ) {
$( document ).ready(function() {
$(".topMenus .topNavs li > a").on("click", function(){
		var element = $(this).parent("li");
		if (element.hasClass("open")) {
			element.removeClass("open");
			element.find("li").removeClass("open");
			element.find("ul").slideUp();
		}
		else {
			element.addClass("open");
			element.children("ul").slideDown();
			element.siblings("li").children("ul").slideUp();
			element.siblings("li").removeClass('open');
			element.siblings("li").find("li").removeClass('open');
			element.siblings("li").find("ul").slideUp();
		}
	});
});
} )( jQuery );



/*CONTENT TABS SCRIPT*/
jQuery(document).ready(function(){
 (function() {
   if($('.content-tabs').length || $('.aside-tabs').length) {
    var $contentTabs  = $('.content-tabs'),
        $asideTabs    = $('.aside-tabs');
        $.fn.tabs     = function($obj) {
        $tabsNavLis = $obj.find('.tabs-nav').children('li'),
        $tabContent = $obj.find('.tab-content');
        $tabsNavLis.first().addClass('active').show();
        $tabContent.first().show();
        $obj.find('ul.tabs-nav li').on('click', function(e) {
        var $this = $(this);
        $obj.find('ul.tabs-nav li').removeClass('active');
        $this.addClass('active');
        $obj.find('.tab-content').hide();
        $($this.find('a').attr('href')).fadeIn();
        e.preventDefault();
      });
     }
        $contentTabs.tabs($contentTabs);
        $asideTabs.tabs($asideTabs);
        }
      })
   ();
});





/*TOGGLE ICON SCRIPT*/

$("#navIcon").click(function(){

  $("#navIcon a").toggleClass("close");
  if( $("body").hasClass("overhight"))
  {
	  	$("body").removeClass("overhight");
  }
  else
  {
	    $("body").addClass("overhight");
  }
});


$(".mytripsmemoriDatial34").click(function(){
	$(".memorieDetail").toggle("show");
  $(".mytripsmemoriDatial34").toggleClass("active");				   
  
})


$(".allofusmemoriDatial").click(function(){
								   
  $(".memorieDetail").toggle("show");
  $(".allofusmemoriDatial").toggleClass("active");
})

$(".backBg").click(function(){

  $(".tripAddpop").removeClass("show");

});








function chouseCurrency(id){

	$('#'+id).toggleClass('show zoomIn');

	$('body .mainWrapper').prepend('<div class="baxxs"></div>');

};



$(".baxxs").live("click", function(){

    $('.chouseCurrnce').removeClass('show zoomIn');

    $('.baxxs').remove('');

});







$(".backBg").live("click", function(){

    $('.tripAddpop').removeClass('show');

    $('.backBg').hide('');

});



$(".topSearch label").click(function(){

    $('.topSearch label').toggleClass('active zoomIn');

});



