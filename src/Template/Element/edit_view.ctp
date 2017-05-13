<div class="inerbigbox">
   <h6>{{name}}</h6>
  
	{{#each trip}}
	   <div class="europe2016 full-detailbox details-pra">
		  <ul>
			 <li>
				<span>Country :</span>
				<p><input type="text" name="country"/></p>
			 </li>
			 <li>
				<span>Place :</span>
				<p><input type="text" name="country"/></p>
			 </li>
			 <li>
				<span>Arrive :</span>
				<p><input type="text" name="country"/></p>
			 </li>
			 <li>
				<span>Depart :</span>
				<p><input type="text" name="country"/></p>
			 </li>
			 <li>
				<span>Method :</span>
				<p class="pco"><label data-balloon="Walk" data-balloon-pos="up"><i class="fa fa-{{method}}"></i></label><br>
					<span>{{method_description}}</span>
				</p>
			 </li>
			 <li>
				<span># of Nights :</span>
				<p><input type="text" name="country"/></p>
			 </li>
			 <li>
				<span>Accom :</span>
				<p><input type="text" name="country"/></p>
			 </li>
			 <li>
				<span>Activities :</span>
				<p><input type="text" name="country"/></p>
			 </li>
		  </ul>	  
	   </div>
   {{/each}}
    <h6><a href="javascript:void(0);" class="delete-p" data-id="{{uuid}}" >Delete</a></h6>
</div>