<header>
   <div class="block h60">

      <div class="navIcon" id="navIcon"><a href="javascript:void(0)" onClick="$('.toggle_menu').slideToggle();"><span></span> <span></span> <span></span></a></div>
   
      <div class="logo"><a href="<?php echo WEBSITE_URL ;?>"><img src="<?php echo WEBSITE_IMG_URL ?>tripadvisor.png" alt="logo" /></a></div>
       <div class=" profileTop">
      

      <?php if($this->request->session()->read('Auth.User')){ ?>
      <?php if($this->request->action!='dashboard') {
      ?>
      <a href="<?php echo $this->Url->build(["plugin"=>'', "controller" => "Users",'action' => 'index',"cat_type" => "profiletab"]); ?>" class="profile-menu" data-tab="profiletab" >  <?php if( !empty($this->request->session()->read('Auth.User.profile_image'))&& file_exists(AMENITIES_ROOT_PATH.$this->request->session()->read('Auth.User.profile_image'))){ ?><img src="<?php echo WEBSITE_UPLOADS_URL.'image.php?width=40px&height=40px&cropratio=1:1&image='.AMENITIES_IMG_URL.$this->request->session()->read('Auth.User.profile_image');?>" alt="Profile" class='image_src' /> <?php } else {?><img src="<?php echo WEBSITE_URL.'images'; ?>/profile.png" alt="Profile" /> <?php } ?> 
    </a> 
    
  
    
    
    
      <?php } else{ ?>
      <a href="javascript:void(0);"  class="profile-menu" data-tab="profiletab"> <?php if(!empty($this->request->session()->read('Auth.User.profile_image'))&& file_exists(AMENITIES_ROOT_PATH.$this->request->session()->read('Auth.User.profile_image'))){  ?><img src="<?php echo WEBSITE_UPLOADS_URL.'image.php?width=40px&height=40px&cropratio=1:1&image='.AMENITIES_IMG_URL.$this->request->session()->read('Auth.User.profile_image');?>" alt="Profile" class='image_src' /> <?php } else {?><img src="<?php echo WEBSITE_URL.'images'; ?>/profile.png" alt="Profile" class='image_src' /> <?php } ?> 
      <?php /* <span class="changeprofile " style="display: none;"  data-tab="profiletab">
	   
	   <?php echo $this->Form->create('User',['url' => '/users/upload_image','id' => 'upload_img_form']) ?>
      
           <label for="changeinput" class="fa fa-edit"><?php echo $this->Form->file('image',['id'=>'changeinput']) ?></label>
      
      <?php echo $this->Form->end(); ?>
      
      </span>
      */?>
    </a> 
     <?php } }else{
		 ?>
		 <a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>" class="btn radiusBtn ha-btn">Login</a>
		 <?php
	 } ?></div>
   </div>
   
   <nav class="toggle_menu">
   <?php  
   if($this->request->action=='blog' || $this->request->action=='resetPassword' || $this->request->action=='publicProfile'||$this->request->action=='about' || $this->request->action=='promos')
   {
   ?>
     <ul>
         
        <li><a href="<?php echo $this->Url->build('/promos'); ?>">Promos</a></li>
        <?php if($this->request->session()->read('Auth.User')){ /* ?>
        <li><a href="javascript:void(0);" class="top-menu" data-tab="tracker">Tracker</a></li>
        <li><a href="javascript:void(0);" class="top-menu" data-tab="mytrip_list">My Trips</a></li>
        <li><a href="javascript:void(0);" class="top-menu" data-tab="allofus">All of us</a></li>
        <?php */ } ?>
        <li><a href="<?php echo $this->Url->build('/blog'); ?>">Blog</a></li>
        <!-- <li><a href="javascript:void(0);" class="top-menu" data-tab="profiletab">Live Chat</a></li> -->
        <li><a href="<?php echo $this->Url->build('/about'); ?>" class="top-menu" data-tab="profiletab">About</a></li>
         
        <?php if($this->request->session()->read('Auth.User')){ ?>
         <li><a href="<?php echo $this->Url->build(['action' => 'logout']); ?>">Logout</a></li>
        <?php }else{ ?>
         <li><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>">Login / Join</a></li>      
        <?php } ?>
      </ul>
   <?php } else { ?>
      <ul>
        
        <li><a href="<?php echo $this->Url->build('/promos'); ?>">Promos</a></li>
        <?php if($this->request->session()->read('Auth.User')){ /* ?>
        <li><a href="javascript:void(0);" class="top-menu" data-tab="tracker">Tracker</a></li>
        <li><a href="javascript:void(0);" class="top-menu" data-tab="mytrip_list">My Trips</a></li>
        <li><a href="javascript:void(0);" class="top-menu" data-tab="allofus">All of us</a></li>
        <?php */ } ?>
        <li><a href="<?php echo $this->Url->build('/blog'); ?>">Blog</a></li>
        <!-- <li><a href="javascript:void(0);" class="top-menu" data-tab="profiletab">Live Chat</a></li> -->
        <li><a href="<?php echo $this->Url->build('/about'); ?>" class="top-menu" data-tab="profiletab">About</a></li>
         
        <?php if($this->request->session()->read('Auth.User')){ ?>
         <li><a href="<?php echo $this->Url->build(['action' => 'logout']); ?>">Logout</a></li>
        <?php }else{ ?>
         <li><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>">Login / Join</a></li>      
        <?php } ?>
      </ul>
   <?php } ?>
   
   </nav>
 </header>
 <?php  
		if( ($this->request->session()->read('Auth.User')) && $this->request->action=='dashboard' ){	 ?>
 <div class="mainTitle">
    <h1>
	<span><a href="javascript:void(0)" class="navmain" data-tab="alloffus"> Discover </a></span>
	<span><a href="javascript:void(0)" class="navmain currentnav" data-tab="planner" > Plan </a></span>
	<span><a href="javascript:void(0)" class="navmain" data-tab="tracker"> Track </a></span>
	<span><a href="javascript:void(0)" class="navmain" data-tab="mytrip_list"> Trips </a></span>
</h1>
  </div>
<?php }   else{?>
<div class="mainTitle">
    <h1>
	<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=>"discover"]); ?>" class="navmain " data-tab="alloffus"> Discover </a></span>
	<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=> "plan"]); ?>" class="navmain" data-tab="planner" > Plan </a></span>
	<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index', "cat_type"=>"track"]); ?>" class="navmain" data-tab="tracker"> Track </a></span>
	<?php  //if($this->request->session()->read('Auth.User')){ ?><span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=>"trips"]); ?>" class="navmain" data-tab="mytrip_list"> Trips </a></span>
	<?php //}?>
</h1>
  </div>
<?php }?>
<?php $this->Html->scriptStart(array('block' => 'custom_script')); ?>
$('input[type=file]#changeinput').change(function (event) { 
  form_id = 'upload_img_form';
  
  $("#upload_img_form_error_div").hide();
  $("#uploadPhoto").hide();
  $("#uploadPhoto1").show();
  
      
  var options = {
   type : 'post',    
   success:function(r){
    data  = JSON.parse(r) ;
    if(data.success){
      notice('success',data.message,'success');
     $("#image_name").val(data.name);
     $(".image_src").attr('src',data.src);
     $("#uploadPhoto").hide();
     $("#uploadPhoto1").hide();
     $("#uploadPhoto2").show();
    }else{
     $("#uploadPhoto").show();
     $("#uploadPhoto1").hide();
  
     data = data.errors;
     var error_div_id = form_id+'_error_div';
     $('#login-modal').animate({ scrollTop: 0 }, 'slow');
     
     var error_div  = $("#"+error_div_id);
     
     var error = '<ul class="client-side-error">';
     $.each(data,function(index,html){
      error += '<li>'+html+'</li>';
     });
     error += '</ul>';
     error_msg = '<div class="alert alert-danger alert-dismissible site-color" style="padding-left: 0;" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+error+'</div>';
     error_div.html(error_msg);
     error_div.show();
    }
   },
   resetForm:false
  }; 
  $("form#"+form_id).ajaxSubmit(options); 
 });
 

 
<?php $this->Html->scriptEnd();  ?>