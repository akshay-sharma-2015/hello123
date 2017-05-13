<div class="midWrapper">
	 
	<div class="mainTitle">
		<h1>Reset Password</h1>
	</div> 
	<div class="resetpasswordformdiv loginForm">
	<?php echo $this->Form->create('Users',['id' => 'reset-form','url' => ['action' => 'reset_password'],'autocomplete' => 'off']); ?>
	<div id="reset-form_error_div" style="display:none"></div>
			
		<div class="filed">
		 
			<?php echo $this->Form->password('password',['placeholder' => __('New Password'),'class' => 'srequire','required' => true]); ?>
			<i><img src="<?php echo WEBSITE_IMG_URL ?>ic10.png" alt="User" /></i> 
		 </div>
					
		<div class="filed">
			 
			<?php echo $this->Form->password('c_password',['placeholder' => __('Confirm Password',true),'class' => 'srequire','required' => true]); ?>
			<i><img src="<?php echo WEBSITE_IMG_URL ?>ic10.png" alt="User" /></i> 
		</div>
		<div class="block center">
				<input type="submit" class="btn radiusBtn reset-btn" value="Ok" />
		</div>			
 
		<?php echo $this->Form->end(); ?>
	 </div>
</div>

<?php $this->Html->scriptStart(array('block' => 'custom_script')); ?>
$(".reset-btn").live("click", function(e){
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
	form_id = 'reset-form';
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

<?php $this->Html->scriptEnd();  ?>