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

