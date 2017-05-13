<div class="inerbigbox">
   <h6>{{name}}</h6>   
	{{#each trip}}
	   <div class="europe2016 full-detailbox">
		  <ul class="content-ul">
		   <li class="content-li">
				
				<p>{{arrive}} </p> 
			 </li>
			 <li class="content-li">
				
				<p>{{country}}  </p>
			 </li>
			 <li class="content-li">
				
				<p>{{place}}  </p>
			 </li>
			
			 <li class="content-li">
				
				<p>{{depart}}</p>
			 </li>
	</ul>
	<ul>		 
			 <li>
				<span>Transport :</span>
				<p class="pco"><label data-balloon="Walk" data-balloon-pos="up"><i class="fa fa-{{method}}"></i></label><br>
					<span>{{method_description}}</span>
				</p>
			 </li>
			 <li>
				<span># of Nights :</span>
				<p>{{night}}</p>
			 </li>
			 <li>
				<span>Accom :</span>
				<p class="pco"><span>{{accom_title}}</span><br>
					<span>{{{accom_description}}}</span>
				</p>
			 </li>
			 <li>
				<span>Activities :</span>
				<p class="pco"><span>{{activites}}</span><br>
					<span>{{{activites_description}}}</span>
				</p>
			 </li>
		  </ul>	  
	   </div>
   {{/each}}
<?php if($isEditable){ ?>
   <h6 id="dlt-plan-btn"><a href="javascript:void(0);" class="delete-p" data-id="{{uuid}}" >(Delete Plan)</a></h6>
<?php } ?>
</div>
<?php echo $this->cell('Inbox::mainPromotion'); ?>