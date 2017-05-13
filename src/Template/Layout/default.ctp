<?php 
use Cake\Core\Configure;
$here = $this->request->here();
$canonical = $this->Url->build($here, true);
 $plugin		=	$this->request->params['plugin'];
 $controller	=	$this->request->params['controller'];
 $action		=	$this->request->params['action'];  ?>
<!DOCTYPE html>
<html lang="<?php echo (!empty($Defaultlanguage)) ? $Defaultlanguage :'en'; ?>" manifest="<?php //echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'cache')); ?>">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo isset($pageTitle) ? $pageTitle : __('title.homepage');
	$metaDescription	=	(isset($metaDescription) ? $metaDescription : __('metadescription.homepage')); ?></title>
	
	<meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : __('title.homepage'); ?>" />
	<?php /* <meta property="og:description" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." />*/ ?>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php if(SUBDIR ==''){ ?>
<meta name="google-site-verification" content="DW0n9hlh9qppmoXsjIlnOHbzW54AwOA0jskLJC6EU7g" />
<?php }
		echo $this->fetch('css1');
	echo $this->Html->meta(
		'description',$metaDescription
	);	
	echo $this->Html->css(array('main.css','fonts.css','font-awesome.css','animate.css','pnotify.custom.min.css'/* ,'autocomplete.css' */),array('block' =>'css'));
	if(Configure::read('debug')){
	}else{
		// echo $this->element('home_page_css',[],['cache' => true]);
	}	
	echo $this->fetch('meta');

	echo $this->fetch('css');
	?>
</head>
<body>
    <div class="mainWrapper">
	<?php echo $this->element('header_menu'); ?>

<?php 
echo $this->fetch('content');
echo $this->element('footer');
echo $this->Html->script(array('jquery.min.js','jquery.IE.js','jquery-ui.js','custom.js','pnotify.custom.min.js','jquery.form.min.js','handlebars.min.js'),array('block' =>'script'));
if(Configure::read('debug')){
}else{
	// echo $this->element('javascript',[],['cache' => true]);
}
echo $this->fetch('script'); 
echo $this->fetch('footer_script'); 
echo $this->fetch('custom_script'); ?>
<?php  
if($this->request->session()->check('type')){
	$arguments= $this->request->session()->read('type');
	if($this->request->session()->read('Auth.User') && $arguments=='gotologin'){
		$arguments= 'alloffus';	
				
	} 
		if($arguments	== 'plan')		{$arguments='planner';}
		if($arguments	== 'track')		{$arguments='tracker';}
		if($arguments	== 'trips')		{$arguments='mytrip_list';}
		if($arguments	== 'discover')	{$arguments='alloffus';}	
	?> <script>
	var arguments ='<?php echo $arguments;?>'; 
	if(arguments){
		$("#myplandetailpage").hide();
		$(".midWrapper").hide();
		$("#"+arguments).show();
		$('.navmain').removeClass('currentnav');		
		$('.navmain[data-tab='+arguments+']').addClass('currentnav');
		
	}
	</script>
<?php }
$this->request->session()->delete('type');
?>
<script>


function notice(s, e, t) {
    "" == e && (e = s, s = t), s = s.replace(/^[a-z]/, function(s) {
        return s.toUpperCase()
    }), new PNotify({
        title: s,
        text: e,
        type: t,
        hide: !0,
        shadow: !0,
        delay: 6e3,
        mouse_reset: !0,
        buttons: {
            closer: !0,
            sticker: !1
        }
    })
}
function goToByScroll(id){
      // Scroll
    $('html,body').animate({scrollTop: $(id).offset().top},'slow');
}
$(".top-menu").click(function(){
	$("#myplandetailpage").hide();
	$(".midWrapper").hide();
	$("#"+$(this).attr("data-tab")).show();
	 $("#navIcon a").removeClass("close");
	 $("body").removeClass("overhight");
	$(".toggle_menu").hide();
	$('.changeprofile').hide();
});
$(".profile-menu").click(function(){
	$("#myplandetailpage").hide();
	$(".midWrapper").hide();
	$("#"+$(this).attr("data-tab")).show();
    $("#navIcon a").removeClass("close");
	 $("body").removeClass("overhight");
	$(".toggle_menu").hide();
	$('.navmain').removeClass('currentnav');
	if($(this).attr("data-tab")=='profiletab'){
		$('.changeprofile').show();
		
		
		height	=	document.getElementById("sdsdsd").scrollHeight;
		$(".sdsdsd").css("height",(25+height)+"px");
	}else{ 
		$('.changeprofile').hide();
	}
});
function checki(id){
	/* $("#"+id).val(''); */
	$('#'+id).toggleClass('show zoomIn');
	$('#'+id+' li').show();
	$('#'+id+'  input[type="text"]').val("");
	$('body .mainWrapper').prepend('<div class="baxxs"></div>');
}
$(".pop-o").keyup(function(){
	/* $(this).val('');	 */
});
$(".pop-o").focus(function(){
	/* $(this).val(''); */
	$('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
	checki($(this).attr('data-id'));
});
$(".mytripdetailpage").click(function(){
	
	$(".midWrapper").hide();
	$("#mytrips").show();
	$("#myplandetailpage").hide();
	$('.navmain').removeClass('currentnav');		
	$('.navmain[data-tab=mytrip_list]').addClass('currentnav');
 
});
/* 
$("input[name='currency']").on("click", function() { 
var z=$(this).val();
$('.minCurrnce').val(z);alert(z);
$('#minCurrnce').removeClass('show zoomIn');
}); */
 $(".countrysearch").live("keydown", function(e){
	var searchText = $(this).val();
	
	ckeydown = true;
	if(e.keyCode != 8){
		$('ul#countrysearch > li > label').each(function(){
			var currentLiText = $(this).text();
			searchText		=	searchText.toUpperCase();
			currentLiText	=	currentLiText.toUpperCase();
			
			showCurrentLi = currentLiText.startsWith(searchText);
			// console.log(showCurrentLi);	
			if(showCurrentLi){
				$(this).parent('li').show();						
			}else{
				$(this).parent('li').hide();			
			}
			

		});
	}
});  
 $(".countrysearch").live("keyup", function(e){
	var searchText = $(this).val();
	
	ckeydown = true;
	if(e.keyCode == 8){
		$('ul#countrysearch > li > label').each(function(){
			var currentLiText = $(this).text();
			searchText		=	searchText.toUpperCase();
			currentLiText	=	currentLiText.toUpperCase();
			
			showCurrentLi = currentLiText.startsWith(searchText);
			if(showCurrentLi){
				$(this).parent('li').show();						
			}else{
				$(this).parent('li').hide();			
			}
			

		});
	}
}); 

 $(".currencysearch").live("keyup", function(e){
	var searchText = $(this).val();
	
	ckeydown = true;
	if(e.keyCode == 8){
		$('ul#currencysearch > li > label').each(function(){
			var currentLiText = $(this).text();
			searchText	=	searchText.toUpperCase();
			currentLiText	=	currentLiText.toUpperCase();
			showCurrentLi = currentLiText.startsWith(searchText);
				if(showCurrentLi){
					$(this).parent('li').show();						
				}else{
					$(this).parent('li').hide();			
				}

		});  
	}
});     

$(".currencysearch").live("keydown", function(e){
	var searchText = $(this).val();
	
	ckeydown = true;
	if(e.keyCode != 8){
		$('ul#currencysearch > li > label').each(function(){
			var currentLiText = $(this).text();
			searchText	=	searchText.toUpperCase();
			currentLiText	=	currentLiText.toUpperCase();
			showCurrentLi = currentLiText.startsWith(searchText);
				if(showCurrentLi){
					$(this).parent('li').show();						
				}else{
					$(this).parent('li').hide();			
				}

		});  
	}
}); 

/* --------------------  Code for Update Profile ---------------------  */ 
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
$(".editprofile").on('change', function saveProfile(){ 
	value=$(this).val();
	filed=$(this).attr('name');
	if( filed=='email' && !validateEmail(value)) { $(this).addClass('border-red'); return false;	}
	if( filed=='email' && validateEmail(value)) { $(this).removeClass('border-red'); 	}
	$.ajax({ 
            url: '<?php echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'editProfile')); ?>',
            data: { 'col':filed,'val':value },
            type: 'post'
    })
});




function getDataDate(tripdate){
	
	first_h_li		=	parseInt($(".first_h_li").attr('data-id'));
	$.ajax({ 
		url : '<?php echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'getTripDetails')); ?>',
		data: {'tripdate':tripdate},
		type: 'post',
		dataType: 'json',
		success: function(r){
			globalData	=	r.data;
			setData(first_h_li);
			if(r.ok){
				$(".trc").val(r.countryName);
				$(".place").val(r.place);
				$(".countryhidden").val(r.countryId);
				$("#country_id").val(r.countryId);

				$('html').animate({scrollTop:0}, 'slow');
				$('.tripAddpop').addClass('show bounceInDown');
				$('body .mainWrapper').prepend('<div class="backBg fadeIn"></div>');
			}
		}
    });
	
}
function tripPopup(){
	
	var tripdate=$('.tripdate').val();
	var place = $('.place').val();
	var country= $('#country_id').val();
	
	
	if(tripdate=="")
	{
		$('.tripdate').addClass('border-red');
		return false;
	}else{	
		$('.tripdate').val(tripdate);			
	}
	
	if(place==""){
		$('.place').addClass('border-red');
		return false;
	}else{	
		$('.place').val(place);			
	}
	
	if(country==""){
		$('.trackercountry').addClass('border-red');
		return false;
	}else{	 	
		$('.countryhidden').val(country);
	}
	
	
	$('html').animate({scrollTop:0}, 'slow');
	$('.tripAddpop').addClass('show bounceInDown');
	$('body .mainWrapper').prepend('<div class="backBg fadeIn"></div>');
	setData();
	globalData	=	'';
};
function setData(id){
	if(globalData && globalData[id]){
		people		=	globalData[id]['people'];
		category	=	globalData[id]['category'];
		details		=	globalData[id]['details'];
		days		=	globalData[id]['days'];
		cost		=	globalData[id]['cost'];
		notes		=	globalData[id]['notes'];
		
		
		$("#trip-form  #people_err_login").val(people);
		$("#trip-form  #details_err_login").val(details);
		$("#trip-form  #cost_err_login").val(cost);
		$("#trip-form  #days_err_login").val(days);
		$("#trip-form  #Memot_err_login").val(notes);
		$("#trip-form  #category_err_login").val(category);
	}else{
		$("#trip-form  #people_err_login").val('');
		$("#trip-form  #details_err_login").val('');
		$("#trip-form  #cost_err_login").val('');
		$("#trip-form  #days_err_login").val('');
		$("#trip-form  #Memot_err_login").val('');
	}
}
$(".footer-menu").click(function(){
	$('#TripShare, #tripSbtn, #TripFriend, #tripFbtn, #Notifications, #tripNbtn, #love').removeClass('active');

	id	=	$(this).attr('data-id');
	$("#"+id).toggleClass('active');
});
$(".closeIc").click(function(){
	$('#TripShare, #tripSbtn, #TripFriend, #tripFbtn, #Notifications, #tripNbtn, #love').removeClass('active');
});
/* $(".chk-noti").click(function(){
	form_id		=	'notification_form';
	var options={
		type: 'post',
		success:function(data){			
			$(".cplana").attr("data-trip",data);
			
			var theTemplateScript =  $("#planner-template").html();
			var theTemplate		  =  Handlebars.compile(theTemplateScript);
			var data 			  =  JSON.parse(data);
			var context			  =  data;
			var theCompiledHtml   =  theTemplate(context);
				
			$('#tripviewmy').html(theCompiledHtml);

			 $(".cplan").show();
			 trip_name			 =	$("#trip_name").val();
			 $(".cplana").html(trip_name);
			 
			 $(".cplana").attr('data-id',data.uuid);
			$("#dlt-plan-btn").show();
		},
		resetForm:false
	};
	$("form#"+form_id).ajaxSubmit(options);
}); */

function getMobileOperatingSystem(smsmsg) { mobile = ''; 
	var userAgent = navigator.userAgent || navigator.vendor || window.opera;
	if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) ){
		return window.location.href="sms:"+mobile+"&body="+smsmsg;
	}else if( userAgent.match( /Android/i ) ){		
		return window.location.href="sms:"+mobile+"?body="+smsmsg;
	}else{		
		return false;
	}
}
</script>
<script id="social_url" type="text/x-handlebars-template">
<div class="NotifiInfo1">
      <div class="checkList-share">
			<h3>Share</h3>
 <ul>
	<li><div class='skype-share' data-href='{{url}}' data-lang='' data-text='{{text}}'><a href="javascript:void(0);"><i class="fa fa-skype skype"></i><span>Skype</span></a></div></li>
	
		<li><a class="<?php if(!$isMobile){ ?>desk-a<?php } ?>" href="<?php if($isMobile){ ?>whatsapp://send?text={{text}}%20{{url}}<?php }else{ echo 'javascript:void(0)';} ?>"><i class="fa fa-whatsapp whatsapp"></i><span>Whatsapp</span></a></li>
	
	<li><a href="https://mail.google.com/mail/?view=cm&fs=1&su={{text}}&body=I´ve created a trip plan on TripSpend {{url}}" target="_blank"><i class="fa fa-envelope-square envelope"></i><span>Gmail</span></a></li>
	<li><a href="https://www.facebook.com/sharer/sharer.php?u={{url}}" target="_blank"><i class="fa fa-facebook-square facebook"></i><span>Facebook</span></a></li>
	<li><a href="http://twitter.com/home?status={{text}}+{{url}}" target="_blank"><i class="fa fa-twitter-square twitter"></i><span>Twitter</span></a></li>
	<?php /*<li><a href="javascript:void(0);" target="_blank"><i class="fa fa-map-marker map-marker"></i><span>Add to maps</span></a></li>*/?>
	<li><a href="mailto:?subject={{text}}&body={{url}}" target="_blank"><i class="fa fa-envelope-square Email"></i><span>Email</span></a></li>
	<li><a href="https://plus.google.com/share?url={{url}}" target="_blank"><i class="fa fa-google-plus-square google-plus"></i><span>Google+</span></a></li>
		<?php if($isMobile){ /* ?>
	<li><a href="javascript:void(0);" target="_blank"><i class="fa fa-commenting hangouts"></i><span>Hangouts</span></a></li>
	/*  */ ?>
		<?php } ?>
		<li><a  class="<?php if(!$isMobile){ ?>desk-a<?php } ?>" href="javascript:void(0);" onclick="getMobileOperatingSystem('{{url}}')"><i class="fa fa-comments-o  skype"></i><span>Messaging</span></a></li>	
 </ul>
      </div>
   </div>   
   
   <div class="pdftext">
      <h3>Download</h3>
      <p class="footer-share">Download as PDF</p>      
     <a target="_blank" href="{{pdf}}"><img class="download-img" src="<?php echo WEBSITE_URL ; ?>images/Download-502.png" alt="img" /></a>
   </div>
</script>

</body>
</html>