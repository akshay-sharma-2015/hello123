
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




$(function() {
	$(".datepicker").datepicker();
});


/*TOGGLE ICON SCRIPT*/
$("#navIcon").click(function(){
  $("#navIcon a").toggleClass("close");
  $("body").toggleClass("overhight");
});


$(".backBg").click(function(){
  $(".tripAddpop").removeClass("show");
});


/*TOGGLE ICON SCRIPT*/
$("#memoriDatial").click(function(){
  $(".memorieDetail").toggle("show");
  $("#memoriDatial").toggleClass("active");
});

function tripPopup(){
    $('.tripAddpop').addClass('show bounceInDown');
	$('body .mainWrapper').prepend('<div class="backBg fadeIn"></div>');
};

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



/*footer Btns*/

$("#tripSbtn").click(function(){
    $('#TripShare, #tripSbtn').toggleClass('active');
	$('#TripFriend, #tripFbtn, #Notifications, #tripNbtn').removeClass('active');
});

$("#tripFbtn").click(function(){
    $('#TripFriend, #tripFbtn').toggleClass('active');
	$('#TripShare, #tripSbtn, #Notifications, #tripNbtn').removeClass('active');
});

$("#tripNbtn").click(function(){
    $('#Notifications, #tripNbtn').toggleClass('active');
	$('#TripShare, #tripSbtn, #TripFriend, #tripFbtn').removeClass('active');
});

$(".closeIc").click(function(){
	$('#TripShare, #tripSbtn, #TripFriend, #tripFbtn, #Notifications, #tripNbtn').removeClass('active');
});

