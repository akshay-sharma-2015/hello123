<?php use Cake\Core\Configure; ?>
 <div class="midWrapper" id="gotologin" style="display:none;">
 <div class="mainTitle"></div>
	<div class="loginForm">
	   <h2>Login</h2>
	   <div class="form">
		<?php echo $this->Form->create('Users',['id' => 'login-form','url' => ['action' => 'login'],'autocomplete' => 'off']); ?>
			<div id="login-form_error_div" style="display:none"></div>

			 <div class="filed"><?php echo $this->Form->text('username',['placeholder' => __('Username',true),'class' => 'lsrequire1','id' => 'username_err_login']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic9.png" alt="User" /></i> 
			 </div>
			 <div class="filed">
				<?php echo $this->Form->password('password',['placeholder' => __('Password',true),'class' => 'lsrequire1','id' => 'username_err_login']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic10.png" alt="User" /></i> 
			 </div>
			 <div class="block forgotpass"><a href="javascript:void(0);" class="profile-menu" data-tab="forgetPassword">Forgot Password ? </a></div>
			 <div class="block">
				<input type="submit" class="btn radiusBtn login-btn" value="Ok" />
			 </div>
		<?php echo $this->Form->end(); ?>
	   </div>
	</div>
	<div class="loginForm JoinForm">
	   <h2>Join</h2>
	   <div class="form">
		<?php echo $this->Form->create('Users',['id' => 'signup-form','url' => ['action' => 'signup'],'autocomplete' => 'off']); ?>
			<div id="signup-form_error_div" style="display:none"></div>
			 <div class="filed">
				<?php echo $this->Form->text('username',['placeholder' => __('Choose A Username',true),'class' => 'srequire','id' => 'username_err']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic9.png" alt="User" /></i> 
			 </div>
			 <div class="filed">
				<?php echo $this->Form->password('password',['placeholder' => __('Choose A Password',true),'class' => 'srequire','id' => 'password_err']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic10.png" alt="User" /></i> 
			 </div>
			 <div class="filed">
				<?php echo $this->Form->text('country',['placeholder' => __('Country',true),'class' => 'pop-o cuntFild srequire','data-id' => 'cuntFild','autocomplete' => 'off','id' => 'country_id_err','readonly'=>'readonly']); ?>
				<?php echo $this->Form->hidden('country_id',['id' => 'country_id']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic11.png" alt="User" /></i> 
				<div class="chouseCurrnce" id="cuntFild">
				   <div class="searchCurr">
					  <input type="text" placeholder="Search Country" class="countrysearch">
				   </div>
				   
				   <?php echo $this->cell('Inbox::country_list'); ?>
				</div>
			 </div>
			 <div class="filed">
				<?php echo $this->Form->text('email',['placeholder' => __('Email',true),'class' => 'srequire','id' => 'email_err']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic12.png" alt="User" /></i> 
			 </div>
			 <div class="filed">
				<?php echo $this->Form->text('sex_id',['placeholder' => __('Sex',true),'class' => 'pop-o sexFild srequire','data-id' => 'sexFild','id' => 'sex_err', 'readonly'=>'readonly']); ?>
				<?php echo $this->Form->hidden('sex',['id' => 'sex_id']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic13.png" alt="User" /></i> 
				<div class="chouseCurrnce" id="sexFild">
				   <ul>
					<?php foreach(Configure::read('sex') as $key => $sex){ ?>
					  <li>
						 <label for="check"><?php echo $sex; ?></label>
						 <span class="checkCol">
						 <input type="radio" value="<?php echo $sex ?>" data-id="<?php echo $key; ?>" name="sex">
						 <span></span> </span>
					  </li>
					<?php } ?>
				   </ul>
				</div>
			 </div>
			 <div class="filed">
				<?php echo $this->Form->text('mobile',['placeholder' => __('+19898989898',true),'class' => 'srequire','id' => 'mobile_err']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>ic14.png" alt="User" /></i> 
			 </div>
			
			<div class="filed">
				<?php echo $this->Form->text('currency_id',['placeholder' => __('Currency to view costs in',true),'class' => 'pop-o minCurrnce srequire','data-id' => 'minCurrnce','id' => 'currency_err','readonly'=>'readonly']); ?>
				<?php echo $this->Form->hidden('currency',['id' => 'currency_id']); ?>
				<i><img src="<?php echo WEBSITE_IMG_URL ?>carency.png" alt="User" /></i> 
				<div class="chouseCurrnce" id="minCurrnce">
				   <div class="searchCurr">
					  <input type="text" placeholder="Search Currency" class="currencysearch">
				   </div>
				   	<?php echo $this->cell('Inbox::currency_list'); ?>

				</div>
			 </div>
			 
			 <div class="block">
				<input type="submit" class="btn radiusBtn signupSubmit" data-rel="signup-form" value="Ok" />
			 </div>
		  </form>
	   </div>
	</div>
 </div>
<div class="midWrapper forgetPassword" id="forgetPassword" style="display:none;">
	<div class="loginForm">
		<h2>Forget Password</h2>	
		<div class="form">
		<p>Please enter your email below to reset password.</p>
		<?php	
			 
			echo $this->Form->create('Users',['id' => 'forgot_password-form','url' => ['action' => 'forgot_password'],'autocomplete' => 'off']); ?>
			<div id="forgot_password-form_error_div" style="display:none"></div>
			<div class="filed">
					<?php echo $this->Form->email('email',['placeholder' => __('Email',true),'class' => 'form-control forgotsrequire login-field']); ?>
					<i><img src="<?php echo WEBSITE_IMG_URL ?>ic12.png" alt="User" /></i> 
			</div>
			<div class="block">
				<input type="submit" class="btn radiusBtn forgot-btn" value="Ok" />
			</div>
			<?php $this->Form->end(); ?>
 
		</div>	 
	</div>		
</div> 
<div class="midWrapper" id="alloffus"  style="display:none;"> 
  <div class="topSearch">
    <label>
	 <?php echo $this->Form->create('Users',['id' => 'allofus-form','url' => ['action' => 'allofus'],'autocomplete' => 'off']); ?>
      <?php echo $this->Form->text('search',['placeholder' => __('Search (e.g. India)',true),'class' => 'search tossrequire','id' => 'search_err_login']); ?>
      <input type="submit" value="" class="submitallofus" />
	  <?php echo $this->Form->end(); ?>
    </label>
  </div>
  <div class="priceGraph">
    
    <div class="block"> <span>$10</span> <span>$35</span> <span>$500</span> </div>
    <div class="priceBar"> <samp title="Stretch"></samp> <samp title="Cool"></samp> <samp title="Splash"></samp> </div>
    <div class="block bot"> <span>Stretch</span> <span>Cool</span> <span>Splash</span> </div>
  </div>
  <div class="priceInquery"> 
    <div class="pricerow">
      <h3>Average amount spent per day</h3>
      <div class="price"><span>$35 usd</span></div>
    </div>
    <div class="pricerow">
      <h3>Average length of stay</h3>
      <div class="price"><span>#16 Days</span></div>
    </div> 
    <div class="block moreDetail"><a href="javascript:void(0)" id="memoriDatial" class="allofusmemoriDatial"><span class="first">(Click for more details)</span> <span class="after">(Click for less details)</span></a></div>
    <div class="memorieDetail">
      <div class="category">
        <ul>
          <li>
            <div class="col"> <a href=""> <span class="pull-left"><i><img src="images/ic2.png" alt="Accom" /></i></span>
              <label>Accom</label>
              </a> </div>
            <div class="col"> <span>$ 10.5</span> </div>
          </li>
          <li>
            <div class="col"> <a href=""> <span class="pull-left"><i><img src="images/ic3.png" alt="Accom" /></i></span>
              <label>Food</label>
              </a> </div>
            <div class="col"> <span>$ 10.5</span> </div>
          </li>
          <li>
            <div class="col"> <a href=""> <span class="pull-left"><i><img src="images/ic4.png" alt="Accom" /></i></span>
              <label>Activites</label>
              </a> </div>
            <div class="col"> <span>$ 10.5</span> </div>
          </li>
          <li>
            <div class="col"> <a href=""> <span class="pull-left"><i><img src="images/ic5.png" alt="Accom" /></i></span>
              <label>Transport</label>
              </a> </div>
            <div class="col"> <span>$ 10.5</span> </div>
          </li>
          <li>
            <div class="col"> <a href=""> <span class="pull-left"><i><img src="images/ic6.png" alt="Accom" /></i></span>
              <label>Other</label>
              </a> </div>
            <div class="col"> <span>$ 10.5</span> </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="block notes ylw">
	  <a href="<?php echo $this->Url->build(['plugin' => '','controller' => 'users', 'action' => 'promos']); ?>">Click here for promos</a>
    </div>
  </div>
  
<div class="t-hide-div"><p>Coming in June 2017</p></div>
  </div>
<div class="midWrapper" id="tracker" style="display:none" > 
<?php echo $this->element("tracker"); ?>
</div>
<div class="midWrapper" id="mytrip_list" style="display:none" >
	<div class="mytriplogin">
	<p>please log in to view your trips</p>
	<a href="<?php echo $this->Url->build(["plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>" class="btn radiusBtn">Login</a>
	</div>
</div>
<div class="midWrapper palnerwrapper" id="planner">
<?php echo $this->element('planner'); ?>
</div>
<?php $this->Html->scriptStart(array('block' => 'custom_script')); ?>


$("input[name='country']").change(function(){
	$(".cuntFild").removeClass('border-red');
	// alert($(this).val());
	$(".cuntFild").val($(this).val());
	$("#country_id").val($(this).attr('data-id'));
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});

$(".chouseCurrnce ul li label").click(function(){
	$(".cuntFild").removeClass('border-red');
 
	$(".cuntFild").val($(this).parent().children().find("input[name='country']").val());
	$("#country_id").val($(this).parent().children().find("input[name='country']").attr('data-id'));
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
}); 	
$("#minCurrnce ul li label").click(function(){
	$("#currency_id").val($(this).parent().children().find("input[name='currency']").attr('data-id'));
	$(".minCurrnce").removeClass('border-red');
	$(".minCurrnce").val($(this).parent().children().find("input[name='currency']").val());
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});
$("input[name='sex']").change(function(){
	$("#sex_id").val($(this).attr('data-id'));
	$(".sexFild").removeClass('border-red');
	$(".sexFild").val($(this).val());
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});

$("input[name='currency']").change(function(){
	$("#currency_id").val($(this).attr('data-id'));
	$(".minCurrnce").removeClass('border-red');
	$(".minCurrnce").val($(this).val());
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});

$(".srequire").live("keyup", function(e){
	val = $(this).val();
	if(val == ''){
		$(this).addClass('border-red');
	}else{
		$(this).removeClass('border-red');
	
	}
});
$(".signupSubmit").live("click", function(e){
	e.preventDefault();
	error = true;
	$(".srequire").each(function(){
		val = $(this).val();
		$(this).removeClass('border-red');
		if(val == ''){
			$(this).addClass('border-red');
			error = false;
		}
	});
	if(error){
		form_id = $(this).attr('data-rel');
		$("#ajax-loader").removeClass('hide');
		
		var error_div_id=form_id+'_error_div';
		var error_div=$("#"+error_div_id);
		var options={
			type: 'post',
			error:function(r){
				notice('error','Something going wrong','error');
			},
			success:function(r){
				$("#ajax-loader").addClass('hide');
				data=JSON.parse(r) ;
				
				if(data.success){
					$(".srequire").val('');
					error_div.hide();
					$("html, body").animate({ scrollTop: 0 }, "slow");
					notice(data.type,data.message,data.type);
				}else{
					notice(data.type,data.message,data.type);
					data = data.errors;
					goToByScroll(error_div);
					var error='<ul class="client-side-error">';
					$.each(data,function(index,html){
						error	+=	'<li>'+html+'</li>';
						$("#"+index+"_err").addClass('border-red');
					});
					error	+=	'</ul>';
					error_msg	=	'<div class="alert alert-danger alert-dismissible site-color" style="padding-left: 0;" role="alert">'+error+'</div>';
					error_div.html(error_msg);
					error_div.show();
				}
			return false;
			},resetForm:false
		};
		$("form#"+form_id).ajaxSubmit(options);
			
	}
});


$(".login-btn").live("click", function(e){
	e.preventDefault();
	error = true;
	$(".lsrequire1").each(function(){
		val = $(this).val();
		$(this).removeClass('border-red');
		if(val == ''){
			$(this).addClass('border-red');
			error = false;
		}
	});
	form_id = 'login-form';
	$("#"+form_id+'_error_div').hide();
	if(error){
	
	$("#ajax-loader").removeClass('hide');
		var options={
			type: 'post',
			success:function(r){
				$("#ajax-loader").addClass('hide');
				data=JSON.parse(r) ;
				if(data.success){
					window.location='<?php echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'dashboard')); ?>';
				}else{
					data = data.errors;var error_div_id=form_id+'_error_div';$('#login-modal').animate({ scrollTop: 0 }, 'slow');
					var error_div=$("#"+error_div_id);
					var error='<ul class="client-side-error">';
					$.each(data,function(index,html){ error	+=	'<li>'+html+'</li>';});error	+=	'</ul>';error_msg	=	'<div class="alert alert-danger alert-dismissible site-color" style="padding-left: 0;" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+error+'</div>';error_div.html(error_msg);error_div.show();
				}return false;
			},
			resetForm:false
		};
		$("form#"+form_id).ajaxSubmit(options);
	}
});


/*  Code for Submit Forgot Passsword Form */
$(".forgot-btn").live("click", function(e){
	e.preventDefault();
	error = true;
	$(".forgotsrequire").each(function(){
		val = $(this).val();
		$(this).removeClass('border-red');
		if(val == ''){
			$(this).addClass('border-red');
			error = false;
		}
	});
	form_id = 'forgot_password-form';
	$("#"+form_id+'_error_div').hide();
	if(error){
	
	$("#ajax-loader").removeClass('hide');
		var options={
			type: 'post',
			success:function(r){
				$("#ajax-loader").addClass('hide');
				data=JSON.parse(r) ;
				if(data.success){
					// window.location='<?php echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'dashboard')); ?>';
				}else{
					data = data.errors;var error_div_id=form_id+'_error_div';$('#login-modal').animate({ scrollTop: 0 }, 'slow');
					var error_div=$("#"+error_div_id);
					var error='<ul class="client-side-error">';
					$.each(data,function(index,html){ error	+=	'<li>'+html+'</li>';});error	+=	'</ul>';error_msg	=	'<div class="alert alert-danger alert-dismissible site-color" style="padding-left: 0;" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+error+'</div>';error_div.html(error_msg);error_div.show();
				}return false;
			},
			resetForm:false
		};
		$("form#"+form_id).ajaxSubmit(options);
	}
});
$(".baxxs").live("click", function(){
    $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});

ckeydown = false;
	 
     
	
	$("input[name='country']").change(function(){
	$(".cuntFild").removeClass('border-red');

	$(".cuntFild").val($(this).val());
	$("#country_id").val($(this).attr('data-id'));
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});
$(document).on('click','.notlogin',function(){
	$(".midWrapper").hide();
	$("#gotologin").show();
	 $("#navIcon a").removeClass("close");
	 $("body").removeClass("overhight");
	$(".toggle_menu").hide();
	$('.changeprofile').hide();
});

$(".futuretrip").live("click", function(e){
	e.preventDefault();
	$(".mainTitle a").removeClass('currentnav');
	$("#planner").hide();
	$("#gotologin").show();
	notice('Info','Please first login','notice');

});
<?php $this->Html->scriptEnd();  ?>