<style>.ui-helper-hidden-accessible{display:none !important}
.readonlyclass {
    border-bottom-color: white;
    cursor: default;
}</style>
<?php $readOnly 	=	 ($isEditable) ? '' : 'disabled="disabled"'; ?>
<div class="mainbox">
  <div class="inerbigbox">
	<?php echo $this->Form->create('Planner',['id' => 'planner_form_'.$timeKey,'url' => ['plugin' => '','controller' => 'users','action' => 'plan_save'],'autocomplete' => 'off']); ?>
	<div  class="top-textbox" >
		<input <?php echo $readOnly; ?> id="trip_name<?php echo $timeKey; ?>" type="text" value="<?php echo isset($data['name']) ? $data['name'] : '';  ?>" name="trip_name" class="notlogin1" placeholder="Enter plan name here"/><br/>
		<span style="display:none;" class="ter" id="ter<?php echo $timeKey; ?>">Please enter plan name</span>		
		<input type="hidden" name="uuid" value="<?php echo isset($data['uuid']) ? $data['uuid'] : md5(uniqid(rand(), true));  ?>">
	</div>
	 <div class="list-top list-top1" id="ul-append<?php echo $timeKey; ?>">
		<ul>
		   <li><a href="javascript:void(0);">Arrive</a></li>
		   <li><a href="javascript:void(0);">Country</a></li>
		   <li><a href="javascript:void(0);">Place</a></li>
		   <li><a href="javascript:void(0);">Method</a></li>
		   <li><a href="javascript:void(0);">Depart</a></li>
		   <li style="display:none"><a href="javascript:void(0);">Nights</a></li>
		   <li><a href="javascript:void(0);">Accom</a></li>
		   <li><a href="javascript:void(0);">Activites</a></li>		   
		   <?php 
		   if(!empty($data['trip'])){
			   foreach($data['trip'] as $v){ 
				   echo $this->element("next_level",['uniqueId' => $v['unique_id'].rand(5000,99999),'edit' => $v]);
				   $unique_id 	=	$v['unique_id'];
			   }
		   } ?>
		</ul>		
	 </div>
	 <?php echo $this->Form->end(); ?>
		<div class="small-mid-box Accom"  id="method_div<?php echo $timeKey; ?>" style="display:none">
			<h6>Transport Method</h6>
			<div class="filed">
				<div class="selectoption selectoption2"> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="male" id="male1" name="name1"  type="radio"/>
						<label for="male1" data-balloon="Walk" data-balloon-pos="up"><i class="fa fa-male"></i></label>
					</span> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="motorcycle" id="motorcycle1" name="name1" type="radio"/>
						<label for="motorcycle1" data-balloon="Bike" data-balloon-pos="up"><i class="fa fa-motorcycle"></i></label>
					</span> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="car" id="car1" name="name1" type="radio"/>
						<label for="car1" data-balloon="Car" data-balloon-pos="up"><i class="fa fa-car"></i></label>
					</span> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="bus" id="bus1" name="name1" type="radio"/>
						<label for="bus1" data-balloon="Bus" data-balloon-pos="up"><i class="fa fa-bus"></i></label>
					</span> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="train" id="train1" name="name1" type="radio"/>
						<label for="train1" data-balloon="Train" data-balloon-pos="up"><i class="fa fa-train"></i></label>
					</span> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="plane" id="plane1" name="name1" type="radio"/>
						<label for="plane1" data-balloon="Airplane" data-balloon-pos="up"><i class="fa fa-plane"></i></label>
					</span> 
					<span class="checkfild">
						<input <?php echo $readOnly; ?> data-id="question" id="question1" name="name1" type="radio"/>
						<label for="question1" data-balloon="Other" data-balloon-pos="up"><i class="fa fa-question"></i></label>
					 </span>
				</div>
			</div>
			<input type="hidden" id="method_title<?php echo $timeKey; ?>"/>
			<p class="details-here"><textarea <?php echo $readOnly; ?> id="method_description<?php echo $timeKey; ?>" class="notlogin1" placeholder="Details"></textarea></p>
			<p class="details-here"><a id="method_ok<?php echo $timeKey; ?>" data-id="" href="javascript:void(0);">Ok</a></p>
		</div>
		<div class="small-mid-box Accom" id="activites_div<?php echo $timeKey; ?>" style="display:none">
			<h6>Activites</h6>
			<div class="accom-info"><p><input <?php echo $readOnly; ?> id="activites_title<?php echo $timeKey; ?>" placeholder="Name" class="notlogin1" type="text"/></p></div>
			<div class="accom-info"><p><textarea <?php echo $readOnly; ?> id="activites_description<?php echo $timeKey; ?>" class="notlogin1" placeholder="Details"></textarea></p></div>			
			<p class="details-here"><a data-id="" id="activites_ok<?php echo $timeKey; ?>" href="javascript:void(0);">Ok</a></p>
		</div>
		<div class="small-mid-box Accom" id="accom_div<?php echo $timeKey; ?>" style="display:none">
			<h6>Accom</h6>
			<div class="accom-info"><p><input <?php echo $readOnly; ?> id="accom_title<?php echo $timeKey; ?>" class="notlogin1" placeholder="Name" type="text"/></p></div>
			<div class="accom-info"><p><textarea <?php echo $readOnly; ?> id="accom_description<?php echo $timeKey; ?>" class="notlogin1" placeholder="Details"></textarea></p></div>			
			<p class="details-here"><a data-id="" id="accom_ok<?php echo $timeKey; ?>" href="javascript:void(0);">Ok</a></p>
		</div>
		<div class="small-mid-box Accom" id="country_div<?php echo $timeKey; ?>" style="display:none">
			<h6>Country</h6>
			<div class="accom-info"><p><input <?php echo $readOnly; ?> id="country_description<?php echo $timeKey; ?>" class="notlogin1" placeholder="Name" type="text"/></p></div>		
			<p class="details-here"><a data-id="" id="country_ok<?php echo $timeKey; ?>" href="javascript:void(0);">Ok</a></p>
		</div>
		<div class="small-mid-box Accom" id="place_div<?php echo $timeKey; ?>" style="display:none">
			<h6>Place</h6>
			<div class="accom-info"><p><input <?php echo $readOnly; ?> id="place_description<?php echo $timeKey; ?>" class="notlogin1" placeholder="Name" type="text"/></p></div>		
			<p class="details-here"><a data-id="" id="place_ok<?php echo $timeKey; ?>" href="javascript:void(0);">Ok</a></p>
		</div>
	<?php if($isEditable){ ?>
	 <div class="nexsteptrip">
		<a class="next_level<?php echo $timeKey; ?> aleft" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
		<a style="<?php echo isset($data['uuid']) ? '' : 'display:none';  ?>" class="delete_row<?php echo $timeKey; ?> nexsteptrip2<?php echo $timeKey; ?> aright" data-id="<?php echo isset($unique_id) ?  $unique_id : '';  ?>" href="javascript:void(0);"><i class="fa fa-minus"></i></a>
	</div>	 
	<?php } ?>
	 <div class="nexsteptrip nexsteptrip1"><a class="tripviewmy" onclick="$('#tripviewmy<?php echo $timeKey; ?>').toggle()" href="javascript:void(0);">Show / hide full itinerary</a></div>
  </div>
</div>

<div id="tripviewmy<?php echo $timeKey; ?>" style="display:none">
	<div class="mainbox">
		<div class="tripviewmy"></div>		
	</div>
</div>
<?php 
if(isset($getmethod)){
	$this->Html->scriptStart(array('block' => 'custom_script'));
}else{
	if(!empty($data['trip']) || isset($edit_info)){ ?>
		<script>
		<?php 
	}else{
		$this->Html->scriptStart(array('block' => 'custom_script'));		
	} 
}	?>
<?php if(!isset($data)){ ?>
	var theTemplateScript =  $("#planner-template<?php echo $timeKey; ?>").html();
	var theTemplate		  =  Handlebars.compile(theTemplateScript);
	var data 			  =  {"trip":[{"arrive":"","country":"","place":"","method":"plane","depart":"","night":"","accom_title":"","accom_description":"","activites":"","activites_description":"","method_description":""}],"name":"Plan name","uuid":""};
	var context			  =  data;
	var theCompiledHtml   =  theTemplate(context);	
	$('#tripviewmy<?php echo $timeKey; ?>').html(theCompiledHtml);

	$.get("<?php echo $this->Url->build(['plugin' => '','controller' => 'users','action' => 'next_level']); ?>", function(data, status){
        $("#ul-append<?php echo $timeKey; ?>").append(data);
    });
<?php }else{ ?>
	var theTemplateScript =  $("#planner-template<?php echo $timeKey; ?>").html();
	var theTemplate		  =  Handlebars.compile(theTemplateScript);
	var data 			  =  '<?php echo json_encode($data);  ?>';
	var data 			  =  JSON.parse(data);
	var context			  =  data;
	var theCompiledHtml   =  theTemplate(context);
	
	$('#tripviewmy<?php echo $timeKey; ?>').html(theCompiledHtml);
	
	$(".url-p").html('<a href="'+data.slug+'">'+data.slug+'</a>');
	$(".url-href").html('<a href="<?php echo $this->Url->build(["plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>" class="btn radiusBtn">Login</a>');
	
	setTimeout(function(){
		var theTemplateScript =  $("#social_url").html();
		context				  =	 JSON.parse('<?php echo json_encode($data);  ?>');
		var theTemplate		  =  Handlebars.compile(theTemplateScript);
		var context			  =  {"text":context.name,"url":context.slug};console.log(context);
		var theCompiledHtml   =  theTemplate(context);	
		$('.social_url').html(theCompiledHtml);
	},1000);
	
<?php } ?>
$(document).on('click', '.next_level<?php echo $timeKey; ?>', function(){
	
    date  =$('#ul-append<?php echo $timeKey; ?>').find(".last_date_div:last").val();
	
	$.get("<?php echo $this->Url->build(['plugin' => '','controller' => 'users','action' => 'next_level']); ?>?date="+date, function(data, status){
        $("#ul-append<?php echo $timeKey; ?>").append(data);
		len 	=	$(".second-row").length;
		if(len > 1){
			id	=	$("#ul-append<?php echo $timeKey; ?> ul").last().attr('data-id');
			$(".nexsteptrip2<?php echo $timeKey; ?>").show();
			$(".delete_row<?php echo $timeKey; ?>").attr('data-id',id);
		}
    });
});

$(document).on('click', '.delete_row<?php echo $timeKey; ?>', function(){
	id 	=	$(this).attr('data-id');
	$("#d"+id).hide();
		
	
	setTimeout(function(){
		$("#d"+id).remove();		
		len 	=	$(".second-row").length;	
		if(len > 1){
			id	=	$("#ul-append<?php echo $timeKey; ?> ul").last().attr('data-id');
			$(".nexsteptrip2<?php echo $timeKey; ?>").show();
			$(".delete_row<?php echo $timeKey; ?>").attr('data-id',id);
		}else{
			$(".nexsteptrip2<?php echo $timeKey; ?>").hide();
		}
		planSave<?php echo $timeKey; ?>();	
	},200);
	
});
$(document).on('click', '.activites', function(){
	id						=	$(this).attr('data-id');	
	title					=	$("#activites"+id).val();
	activites_description	=	$("#activites_description"+id).val();	
	$("#activites_ok<?php echo $timeKey; ?>").attr('data-id',id);
	
	
	$("#activites_title<?php echo $timeKey; ?>").val(title);
	$("#activites_description<?php echo $timeKey; ?>").val(activites_description);
	
	$("#activites_div<?php echo $timeKey; ?>").show();
	$("#method_div<?php echo $timeKey; ?>").hide();
	$("#accom_div<?php echo $timeKey; ?>").hide();
	$("#country_div<?php echo $timeKey; ?>").hide();
	$("#place_div<?php echo $timeKey; ?>").hide();
	
	$("#activites_title<?php echo $timeKey; ?>").trigger("focus");
	
});
$(document).on('click', '#activites_ok<?php echo $timeKey; ?>', function(){
	id	=	$(this).attr('data-id');
	title					=	$("#activites_title<?php echo $timeKey; ?>").val();
	activites_description	=	$("#activites_description<?php echo $timeKey; ?>").val();
	
	$("#activites"+id).val(title);
	$("#activites_description"+id).val(activites_description);
	$("#activites_div<?php echo $timeKey; ?>").hide();
	
	setTimeout(function(){
		planSave<?php echo $timeKey; ?>();		
	},500);
});


$(document).on('click', '.accom', function(){
	$("#accom_div<?php echo $timeKey; ?>").show();
	$("#activites_div<?php echo $timeKey; ?>").hide();
	$("#method_div<?php echo $timeKey; ?>").hide();	
	
	$("#country_div<?php echo $timeKey; ?>").hide();
	$("#place_div<?php echo $timeKey; ?>").hide();
	
	id						=	$(this).attr('data-id');	
	title					=	$("#accom_title"+id).val();
	accom_description		=	$("#accom_description"+id).val();	
	$("#accom_ok<?php echo $timeKey; ?>").attr('data-id',id);
	
	$("#accom_title<?php echo $timeKey; ?>").val(title);
	$("#accom_description<?php echo $timeKey; ?>").val(accom_description);
	
	$("#accom_title<?php echo $timeKey; ?>").trigger("focus");

});


<?php if($isEditable){ ?>
$(document).on('focusout', '.notlogin1', function(){
	planSave<?php echo $timeKey; ?>();
});
<?php } ?>
$(document).on('click', '.delete-p', function(){
	if(confirm('Are you sure ?')){
		uuid	=	$(this).attr('data-id');
		$(".lip"+uuid).remove();
		$(".lip0").remove();
		$("#myplandetailpage").hide();
		$("#mytrip_list").show();
		$.ajax({
			url  : '<?php echo $this->Url->build(['plugin' => '','controller' => 'users','action' => 'delete_plan']); ?>',
			data : {uuid : uuid},
			type : "POST",
			success : function(r){
				location.href =	"<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=>"trips"]); ?>";
			}
		});
	}
});
<?php if($isEditable){ ?>
function planSave<?php echo $timeKey; ?>(){
	trip_name	=	$("#trip_name<?php echo $timeKey; ?>").val();
	// trip_name   = 	trip_name.trim();
	if(trip_name == '' || trip_name == ' '){
		$("#trip_name<?php echo $timeKey; ?>").addClass('border-red');
		$("#ter<?php echo $timeKey; ?>").show();
		return false;
	}
	$(".npn").hide();
	$("#ter<?php echo $timeKey; ?>").hide();
	// $(".a2").show();
	$("#trip_name<?php echo $timeKey; ?>").removeClass('border-red');
	form_id		=	'planner_form_<?php echo $timeKey; ?>';
	var options={
		type: 'post',
		success:function(data){
			$(".cplana").attr("data-trip",data);			
			var theTemplateScript =  $("#planner-template<?php echo $timeKey; ?>").html();
			var theTemplate		  =  Handlebars.compile(theTemplateScript);
			var data 			  =  JSON.parse(data);
			
			
			
			var context			  =  data;
			var theCompiledHtml   =  theTemplate(context);
			
			$('#tripviewmy<?php echo $timeKey; ?>').html(theCompiledHtml);

			 $(".cplan").show();
			 trip_name			 =	$("#trip_name<?php echo $timeKey; ?>").val();
			 
			 <?php if(empty($data['trip'])){ ?>
			 $(".cplana").html(trip_name);
			 $(".cplana").attr('data-id',data.uuid);
			 <?php } ?>
			$("#dlt-plan-btn").show();
			
			if(data.trip.length > 1){				
				$(".aright").show();			
			}else{				
				$(".aright").hide();			
			}
			
			$(".url-p").html('<a href="'+data.slug+'">'+data.slug+'</a>');
			$(".url-href").html('<a href="<?php echo $this->Url->build(["plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>?slug='+data.href+'" class="btn radiusBtn">Login</a>');
			
			var theTemplateScript =  $("#social_url").html();
			var theTemplate		  =  Handlebars.compile(theTemplateScript);
			var context			  =  {"text":data.name,"url":data.slug};
			var theCompiledHtml   =  theTemplate(context);	
			$('.social_url').html(theCompiledHtml);
			(function(r, d, s) {
				r.loadSkypeWebSdkAsync = r.loadSkypeWebSdkAsync || function(p) {
					var js, sjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(p.id)) { return; }
					js = d.createElement(s);
					js.id = p.id;
					js.src = p.scriptToLoad;
					js.onload = p.callback
					sjs.parentNode.insertBefore(js, sjs);
				};
				var p = {
					scriptToLoad: 'https://swx.cdn.skype.com/shared/v/latest/skypewebsdk.js',
					id: 'skype_web_sdk'
				};
				r.loadSkypeWebSdkAsync(p);
			})(window, document, 'script');

		},
		resetForm:false
	};
	$("form#"+form_id).ajaxSubmit(options);
}
<?php } ?>
$(document).on('click', '#accom_ok<?php echo $timeKey; ?>', function(){
	id	=	$(this).attr('data-id');
	title					=	$("#accom_title<?php echo $timeKey; ?>").val();
	accom_description		=	$("#accom_description<?php echo $timeKey; ?>").val();
	
	$("#accom_title"+id).val(title);
	$("#accom_description"+id).val(accom_description);
	$("#accom_div<?php echo $timeKey; ?>").hide();
	setTimeout(function(){
		planSave<?php echo $timeKey; ?>();		
	},500);
});

$(document).on('click', '#method_ok<?php echo $timeKey; ?>', function(){
	id						=	$(this).attr('data-id');
	method_title			=	$("#method_title<?php echo $timeKey; ?>").val();
	method_description		=	$("#method_description<?php echo $timeKey; ?>").val();
	
	
	$("#plane"+id).val(method_title);
	$("#method_description"+id).val(method_description);
	
	$("#method_div<?php echo $timeKey; ?>").hide();
	setTimeout(function(){
		planSave<?php echo $timeKey; ?>();		
	},500);
});

$(document).on('change', "input[name='name1']", function(){
	id			=	$(this).attr('data-id');
	methodid	=	$("#method_ok<?php echo $timeKey; ?>").attr('data-id');
	$("#label"+methodid).html('<i class="fa fa-'+id+' fa-4"></i>');
	$("#mc"+methodid).removeClass("method-margin");
	if(id == 'motorcycle' || id == 'car'){
		$("#mc"+methodid).addClass("method-margin");
	}
	
	$("#plane"+methodid).val(id);
	planSave<?php echo $timeKey; ?>();	
	
	$("#method_title<?php echo $timeKey; ?>").val(id);
});


$(document).on('click', '.method', function(){
	methodid	=	$(this).attr('data-id');
	
	$("#method_ok<?php echo $timeKey; ?>").attr('data-id',methodid);
	$("#method_div<?php echo $timeKey; ?>").show();
	$("#activites_div<?php echo $timeKey; ?>").hide();
	$("#accom_div<?php echo $timeKey; ?>").hide();	
	
	
	$("#country_div<?php echo $timeKey; ?>").hide();
	$("#place_div<?php echo $timeKey; ?>").hide();
	
	title				=	$("#plane"+methodid).val();
	method_description	=	$("#method_description"+methodid).val();
	
	$("#method_title<?php echo $timeKey; ?>").val(title);	
	$("#method_description<?php echo $timeKey; ?>").val(method_description);
	
	// alert(title);
	$("#"+title+"1").prop("checked", true);
	
	$("#method_description<?php echo $timeKey; ?>").trigger("focus");
});


$(document).on('click', '.country', function(){
	id						=	$(this).attr('data-id');	
	
	country_description	=	$("#country_description"+id).val();	
	$("#country_ok<?php echo $timeKey; ?>").attr('data-id',id);
	
	
	$("#country_description<?php echo $timeKey; ?>").val(country_description);
	
	$("#place_div<?php echo $timeKey; ?>").hide();
	$("#country_div<?php echo $timeKey; ?>").show();
	$("#method_div<?php echo $timeKey; ?>").hide();
	$("#accom_div<?php echo $timeKey; ?>").hide();
	$("#activites_div<?php echo $timeKey; ?>").hide();
	
	$("#country_description<?php echo $timeKey; ?>").trigger("focus");
	
	
});
$(document).on('click', '#country_ok<?php echo $timeKey; ?>', function(){
	id	=	$(this).attr('data-id');
	country_description	=	$("#country_description<?php echo $timeKey; ?>").val();
	
	$("#country_description"+id).val(country_description);
	$(".pcountry_autocompelte"+id).val(country_description);
	$("#country_div<?php echo $timeKey; ?>").hide();
	
	
	setTimeout(function(){
		planSave<?php echo $timeKey; ?>();		
	},500);
});


$(document).on('click', '.place', function(){
	id						=	$(this).attr('data-id');	
	
	place_description	=	$("#place_description"+id).val();	
	$("#place_ok<?php echo $timeKey; ?>").attr('data-id',id);
	
	
	$("#place_description<?php echo $timeKey; ?>").val(place_description);
	
	$("#place_div<?php echo $timeKey; ?>").show();
	$("#country_div<?php echo $timeKey; ?>").hide();
	$("#method_div<?php echo $timeKey; ?>").hide();
	$("#accom_div<?php echo $timeKey; ?>").hide();
	$("#activites_div<?php echo $timeKey; ?>").hide();
	
	
	$("#place_description<?php echo $timeKey; ?>").trigger("focus");
	
});
$(document).on('click', '.edit-plan', function(){
	id	=	$(this).attr('data-id');
	$.ajax({
			url  : '<?php echo WEBSITE_URL; ?>trip_edit/'+id,
			success : function(r){
				$("#h"+id).html(r);
			}
		});
});

$(document).on('click', '#place_ok<?php echo $timeKey; ?>', function(){
	id	=	$(this).attr('data-id');
	place_description	=	$("#place_description<?php echo $timeKey; ?>").val();
	// alert(id);
	// alert(place_description);
	$("#place_description"+id).val(place_description);
	$(".pplace_autocompelte"+id).val(place_description);
	$("#place_div<?php echo $timeKey; ?>").hide();
	
	
	setTimeout(function(){
		planSave<?php echo $timeKey; ?>();		
	},500);
});
<?php 
if(isset($getmethod)){
	$this->Html->scriptEnd();		
}else{
	if(!empty($data['trip']) || isset($edit_info)){	?>
		</script>
		<?php 
	}else{
		$this->Html->scriptEnd();		
	}	
} ?>
<script id="planner-template<?php echo $timeKey; ?>" type="text/x-handlebars-template">
<?php echo $this->element("plan_view"); ?>  
</script>
