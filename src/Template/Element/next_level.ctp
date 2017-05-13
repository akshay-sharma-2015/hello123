<?php 
	if(!isset($uniqueId)){
		$uniqueId	=	time().rand();
	} 
	$readOnly 	=	 ($isEditable) ? '' : 'disabled="disabled"'; ?>
<ul class="second-row" data-id="<?php echo $uniqueId; ?>" id="d<?php echo $uniqueId; ?>">
	<li class="v-hide">
		<input <?php echo $readOnly; ?> <?php if(isset($nextDate) && !empty($nextDate)){ echo 'value="'.$nextDate.'"'; }else{  echo (isset($edit['arrive'])) ? 'value="'.$edit['arrive'].'"' : ''; } ?> type="text" name="<?php echo $uniqueId; ?>[arrive]" data-id="<?php echo $uniqueId; ?>" class=" text-margin ptripdate<?php echo $uniqueId; ?>"/>
		<span class="dspan <?php if(isset($nextDate) && !empty($nextDate)){  }else{  echo (isset($edit['arrive'])) ? '' : 'sphide'; } ?>" id="arrive<?php echo $uniqueId; ?>"><?php if(isset($nextDate) && !empty($nextDate)){ echo $nextDate; }else{  echo (isset($edit['arrive'])) ? $edit['arrive'] : ''; } ?></span>
	</li>
	<li>
		<input <?php echo $readOnly; ?> <?php echo (isset($edit['country'])) ? 'value="'.$edit['country'].'"' : '' ?> readonly="readonly" type="text" data-id="<?php echo $uniqueId; ?>" name="<?php echo $uniqueId; ?>[country]" placeholder="-" class="country  pcountry_autocompelte<?php echo $uniqueId; ?>"/>
		<input <?php echo (isset($edit['country'])) ? 'value="'.$edit['country'].'"' : '' ?> readonly="readonly" name="<?php echo $uniqueId; ?>[country]" data-id="<?php echo $uniqueId; ?>" type="hidden" placeholder="-" class=" country" id="country_description<?php echo $uniqueId; ?>" />
	</li>
	<li>
		<input <?php echo $readOnly; ?> <?php echo (isset($edit['place'])) ? 'value="'.$edit['place'].'"' : '' ?> readonly="readonly" type="text" data-id="<?php echo $uniqueId; ?>" name="<?php echo $uniqueId; ?>[place1]" placeholder="-" class="place  pplace_autocompelte<?php echo $uniqueId; ?>"/>
		<input <?php echo (isset($edit['place'])) ? 'value="'.$edit['place'].'"' : '' ?> readonly="readonly" name="<?php echo $uniqueId; ?>[place]" data-id="<?php echo $uniqueId; ?>" type="hidden" placeholder="-" class=" place" id="place_description<?php echo $uniqueId; ?>" />
	</li>
	<li>
		<input <?php echo $readOnly; ?> value="<?php echo (isset($edit['method'])) ? $edit['method'] : 'plane' ?>" name="<?php echo $uniqueId; ?>[method]" id="plane<?php echo $uniqueId; ?>" data-id="<?php echo $uniqueId; ?>" type="hidden"/>
		<span class="checkfild f14" id="mc<?php echo $uniqueId; ?>">
			<input checked="checked" type="radio"/>
			<label id="label<?php echo $uniqueId; ?>" for="plane<?php echo $uniqueId; ?>" class="method" data-id="<?php echo $uniqueId; ?>" data-balloon="Airplane" data-balloon-pos="up"><i class="fa fa-<?php echo (isset($edit['method'])) ? $edit['method'] : 'plane' ?> fa-4"></i></label>
			<input <?php echo (isset($edit['method_description'])) ? 'value="'.$edit['method_description'].'"' : '' ?> readonly="readonly" name="<?php echo $uniqueId; ?>[method_description]" data-id="<?php echo $uniqueId; ?>" type="hidden" placeholder="-" class="" id="method_description<?php echo $uniqueId; ?>" />
		</span>
	</li>
	<li class="v-hide">
		<input <?php echo $readOnly; ?> <?php echo (isset($edit['depart'])) ? 'value="'.$edit['depart'].'"' : '' ?> name="<?php echo $uniqueId; ?>[depart]" data-id="<?php echo $uniqueId; ?>" type="text" class="last_date_div text-margin pdepart<?php echo $uniqueId; ?>"/>
		<span class="dspan <?php echo (isset($edit['depart']) && !empty($edit['depart'])) ? '' : 'sphide'; ?>" id="depart<?php echo $uniqueId; ?>"><?php echo isset($edit['depart']) ? $edit['depart'] : ''; ?></span>
	</li>	
	<li style="display:none">
		<input <?php echo $readOnly; ?> style="cursor:default!important;" <?php echo (isset($edit['night'])) ? 'value="'.$edit['night'].'"' : '' ?> readonly="readonly" name="<?php echo $uniqueId; ?>[night]" data-id="<?php echo $uniqueId; ?>" id="night<?php echo $uniqueId; ?>" type="text" placeholder="-" class=" night"/>
	</li>
    <li>
		<input <?php echo $readOnly; ?> <?php echo (isset($edit['accom_title'])) ? 'value="'.$edit['accom_title'].'"' : '' ?> readonly="readonly" id="accom_title<?php echo $uniqueId; ?>" name="<?php echo $uniqueId; ?>[accom_title]" data-id="<?php echo $uniqueId; ?>" type="text" placeholder="-" class=" accom"/>
		<input <?php echo (isset($edit['accom_description'])) ? 'value="'.$edit['accom_description'].'"' : '' ?> readonly="readonly" name="<?php echo $uniqueId; ?>[accom_description]" data-id="<?php echo $uniqueId; ?>" type="hidden" placeholder="-" class=" accom" id="accom_description<?php echo $uniqueId; ?>" />
	</li>
    <li>
		<input <?php echo $readOnly; ?> <?php echo (isset($edit['activites'])) ? 'value="'.$edit['activites'].'"' : '' ?>" name="<?php echo $uniqueId; ?>[activites]" data-id="<?php echo $uniqueId; ?>" type="text" placeholder="-"  readonly="readonly" class="activites" id="activites<?php echo $uniqueId; ?>" />
		<input <?php echo (isset($edit['activites_description'])) ? 'value="'.$edit['activites_description'].'"' : '' ?> readonly="readonly" name="<?php echo $uniqueId; ?>[activites_description]" data-id="<?php echo $uniqueId; ?>" type="hidden" placeholder="-" class="accom" id="activites_description<?php echo $uniqueId; ?>" />
	</li>	
</ul>
<?php 
if($isEditable){
if(isset($getmethod)){
	$this->Html->scriptStart(array('block' => 'custom_script'));
}else{ ?>
	<script>
<?php } ?>
	$('.ptripdate<?php echo $uniqueId; ?>').datepicker({
		dateFormat	: 'dd-mm' ,
		buttonImage	: '<?php echo WEBSITE_URL; ?>images/ic8.png',
		buttonImageOnly: true,
		showOn		: '<?php echo (isset($edit['arrive']) && !empty($edit['arrive']) || isset($nextDate) && !empty($nextDate)) ? '' : 'both'; ?>',
		onSelect: function (selectedDate) {
			$('#arrive<?php echo $uniqueId; ?>').html(selectedDate);
			$('#ptripdate<?php echo $uniqueId; ?>').html(selectedDate);
			$('.ptripdate<?php echo $uniqueId; ?>').val(selectedDate);
			dateDiff<?php echo $uniqueId; ?>();
			$('.ptripdate<?php echo $uniqueId; ?>').next('.ui-datepicker-trigger').hide();
			$("#activites_div").hide();
			$("#accom_div").hide();
			$("#place_div").hide();
			$("#method_div").hide();
			$("#country_div").hide();
			
			fDate	=	$('.ptripdate<?php echo $uniqueId; ?>').datepicker('getDate');
			
			$('.pdepart<?php echo $uniqueId; ?>').datepicker("option", "minDate", fDate);
			
			dpe = $(".pdepart<?php echo $uniqueId; ?>").val();
			if(dpe != ''){
				$('.pdepart<?php echo $uniqueId; ?>').next('.ui-datepicker-trigger').hide();
			}
			$('#arrive<?php echo $uniqueId; ?>').removeClass("sphide");
			
			planSave<?php echo $time; ?>();	
		}
	}).val();
	
	 $('#arrive<?php echo $uniqueId; ?>').click(function(){ $('.ptripdate<?php echo $uniqueId; ?>').datepicker("show"); }); 
	 $('#depart<?php echo $uniqueId; ?>').click(function(){ $('.pdepart<?php echo $uniqueId; ?>').datepicker("show"); }); 
		
	$('.pdepart<?php echo $uniqueId; ?>').datepicker({
		dateFormat: 'dd-mm' , 
		buttonImage: '<?php echo WEBSITE_URL; ?>images/ic8.png',
		buttonImageOnly: true,
		showOn: '<?php echo (isset($edit['depart']) && !empty($edit['depart'])) ? '' : 'both'; ?>',
		onSelect: function (selectedDate) {
			$('#depart<?php echo $uniqueId; ?>').html(selectedDate);
			$('#pdepart<?php echo $uniqueId; ?>').html(selectedDate);
			$('.pdepart<?php echo $uniqueId; ?>').val(selectedDate);
			dateDiff<?php echo $uniqueId; ?>();
			$('.pdepart<?php echo $uniqueId; ?>').next('.ui-datepicker-trigger').hide();
			$("#activites_div").hide();
			$("#accom_div").hide();
			$("#place_div").hide();
			$("#method_div").hide();
			$("#country_div").hide();
			
			getDate	=	$('.pdepart<?php echo $uniqueId; ?>').datepicker('getDate');
			 $('.ptripdate<?php echo $uniqueId; ?>').datepicker("option", "maxDate", getDate);
			 
			dpe = $(".ptripdate<?php echo $uniqueId; ?>").val();
			if(dpe != ''){
				$('.ptripdate<?php echo $uniqueId; ?>').next('.ui-datepicker-trigger').hide();
			}
			$('#depart<?php echo $uniqueId; ?>').removeClass("sphide");
			planSave<?php echo $time; ?>();	
			index = $('.pdepart<?php echo $uniqueId; ?>').parent('li').parent('ul').index();
			
			total 	=	$(".list-top1 > .second-row").length;
			
			if(total == index){
				date111	=	selectedDate;
			}
		}
	}).val();
	
	function dateDiff<?php echo $uniqueId; ?>(){
		$('#depart<?php echo $uniqueId; ?>').removeClass('border-red1');		
		fDate	=	$('.ptripdate<?php echo $uniqueId; ?>').datepicker('getDate');
		eDate	=	$('.pdepart<?php echo $uniqueId; ?>').datepicker('getDate');
		
		if(fDate != null && eDate != null && fDate > eDate){
			$('.pdepart<?php echo $uniqueId; ?>').val('');
			$('#depart<?php echo $uniqueId; ?>').addClass('border-red1');
			// $('#depart<?php echo $uniqueId; ?>').html('');
			$("#night<?php echo $uniqueId; ?>").val('');
			return false;
		}
		if(fDate != null && eDate != null){
			var date1 = new Date(fDate);
			var date2 = new Date(eDate);
			var timeDiff = Math.abs(date2.getTime() - date1.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
			
			$("#night<?php echo $uniqueId; ?>").val(diffDays);
		}
	}
	<?php /*
 $(".pcountry_autocompelte<?php echo $uniqueId; ?>").autocomplete({
        source: function(e, a) {
            var t = ($(this), $(this.element)),
                l = t.data("jqXHR");
            l && l.abort(), t.data("jqXHR", $.ajax({
                url: "<?php echo $this->Url->build(array('plugin' =>'','controller' =>'Users','action' =>'user_autocomplete')); ?>",
                dataType: "json",
                data: {q: e.term
                },
                success: function(e) {a(e), $(".pcountry_autocompelte<?php echo $uniqueId; ?>").removeClass("ui-autocomplete-loading")
                }
            }))
        },
        minLength: 1,
        select: function(e, a) { console.log(a);
            name = a.item.name, id = a.item.id, 
			setTimeout(function() {
                $(".pcountry_autocompelte<?php echo $uniqueId; ?>").val(a.item.name);
				
			$("#pcountry_autocompelte<?php echo $uniqueId; ?>").val(id);
            }, 2);
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		},
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all")
        }
    }).data("ui-autocomplete")._renderItem = function(e, a) {
        return $( "<li>" )
		.append("<a href=javascript:void(0);>" +a.name + "</a>")
		.appendTo( e );
    }
 */ 
 if(isset($getmethod)){
	$this->Html->scriptEnd();		
}else{
 ?> 
 </script>
<?php } 
} ?>