<?php /* <div class="midWrapper" id="tracker" style="display:none" > 
   <div class="priceInquery">
      <div class="block">
         <div class="placeDatial">
            <div class="block">
               <div class="col">
               <div class="datescol">
                <input type="text" class="datespicker datepicker tripdate"   />   
               <span id="dp"></span>
                </div>
               </div>
               <div class="col">
                  <input type="text" name="country" placeholder="Country"   class="pop-o cuntFild srequire trackercountry trc" data-id="cuntFild" country-id="" readonly="readonly" />
				  <?php echo $this->Form->hidden('country_id',['id' => 'country_id']); ?>
				  <div class="chouseCurrnce" id="cuntFild">
				    <div class="searchCurr">
					  <input type="text" placeholder="Search Country" class="countrysearch">
				   </div>			   
				   <?php echo $this->cell('Inbox::country_list'); ?>
				</div>
               </div>
               <div class="col">
                  <input type="text" placeholder="Place" class="place"/>
               </div>
            </div>
            <div class="addTrip"><a href="javascript:void(0);" onClick="tripPopup();"><img src="images/ic7.png" alt="img" /></a></div>
         </div>
         <div class="category">		 	
  			 <?php echo $this->cell('Inbox::category_list'); ?>
         </div>
      </div>
      <div class="block notes">
         <h2>Total Local Currency</h2>
      </div>
      <div class="block notes">
         <h2>Total User Currency</h2>
      </div>
      <div class="block notes">
         <h2>Notes and Memories</h2>
      </div>
   </div>
   <div class="tripAddpop">
   
      <div class="category">
    <?php echo $this->cell('Inbox::category_list_menu'); ?>
      </div>
      <div class="tripForm">
            <?php echo $this->Form->create('Users',['id' => 'trip-form','url' => ['action' => 'tripdetails'],'autocomplete' => 'off']); ?>
			<div id="trip-form_error_div" style="display:none"></div>
            <div class="filed">
               <label for="People"># of People:</label>
			   <?php echo $this->Form->hidden('category',['placeholder' => __('Category',true),'class' => 'Category','id' => 'category_err_login','value'=>'1']); ?>
			   <?php echo $this->Form->hidden('country_id',['placeholder' => __('country',true),'class' => 'country countryhidden','id' => 'country_id_err_login']); ?>
			   <?php echo $this->Form->hidden('place',['placeholder' => __('place',true),'class' => 'place','id' => 'place_err_login']); ?>
			    <?php echo $this->Form->hidden('tripdate',['placeholder' => __('tripdate',true),'class' => 'tripdate2','id' => 'tripdate_err_login']); ?>
               <?php echo $this->Form->text('people',['placeholder' => __('People',true),'class' => 'People tsrequire','id' => 'people_err_login']); ?>
			   
            </div>
            <div class="filed">
               <label for="Detaf">Details:</label>
			    <?php echo $this->Form->text('details',['placeholder' => __('Details',true),'class' => 'Details tsrequire','id' => 'details_err_login']); ?>
                
            </div>
            <div class="filed">
               <label for="Costy">Cost:</label>
           
			   <?php echo $this->Form->text('cost',['placeholder' => __('Cost',true),'class' => 'Cost tsrequire','id' => 'cost_err_login']); ?>
			   <div class="filed">
               <label for="Costy">Number of days spent:</label>
           
			   <?php echo $this->Form->text('days',['placeholder' => __('Days',true),'class' => 'days tsrequire','id' => 'days_err_login']); ?>
            </div>
			<?php /*
             <div class="filed">
			 <label for="Costy">Currency:</label>
				<?php echo $this->Form->text('currency_id',['placeholder' => __('Currency to view costs in',true),'class' => ' tsrequire pop-o minCurrnce srequire','data-id' => 'minCurrnce','id' => 'currency_err']); ?>
				<?php echo $this->Form->hidden('currency',['id' => 'currency_id']); ?>
				 
				<div class="chouseCurrnce" id="minCurrnce">
				   <div class="searchCurr">
					  <input type="text" placeholder="Search Currency" class="currencysearch">
				   </div>
				   	<?php echo $this->cell('Inbox::currency_list', [], ['cache' => ['config' => 'longlong', 'key' => 'currency_list_'.$Defaultlanguage]]); ?>

				</div>
			 </div>
			 <?php * ?>
            <div class="filed">
               <label for="Memot">Notes and Memories:</label>
			   <?php echo $this->Form->textarea('notes',['placeholder' => __('',true),'class' => 'Memot tsrequire','id' => 'Memot_err_login']); ?>
               
            </div>
            <div class="block alinCenter">
               <input type="submit" value="Ok" data-rel="trip-form" class="btn radiusBtn submittripdetails" />
            </div>
        <?php echo $this->Form->end(); ?>
      </div>
   </div>
</div>
</div>*/ ?>
<div class="midWrapper" id="tracker" style="display:none" > 
<?php echo $this->element("tracker"); ?>
</div>
<div class="midWrapper" id="profiletab" style="display:none"> 
   <div class="profileInfo">
      <div class="profile">
         <div class="userPort"> 
		 <span><?php if(!empty($authData['profile_image'])&& file_exists(AMENITIES_ROOT_PATH.$authData['profile_image'])){  ?>
		 <img src="<?php echo WEBSITE_URL.'image.php?width=164px&height=164px&image='.AMENITIES_IMG_URL.$authData['profile_image'];?>" alt="Profile" class='image_src' /><?php } else {?><img src="<?php echo WEBSITE_URL.'images'; ?>/profile2.png" alt="Profile" class="image_src" /> <?php } ?><a href="" class="fa fa-edit"></a></span>
		 <?php echo $this->Form->create('User',['url' => '/users/upload_image','id' => 'upload_img_form1']) ?>
      
       	  <?php echo $this->Form->file('image',['id'=>'changeinput1']) ?> 
      
     	<?php echo $this->Form->end(); ?>
	 	  
		 </div>
         <h2>/<?php echo $authData['username'];?></h2>
         <h4><?php echo $authData['country']['name'];?></h4>
      </div>
 
      <div class="contactprofile">        
         <ul>
            <li><i><img src="images/ic15.png" alt="Phone" /></i> <span><input type="text" value="<?php echo $authData['mobile'];?>" class="editprofile" name="mobile" placeholder="Mobile" /></span></li>
            <li><i><img src="images/ic16.png" alt="Mail" /></i> <span><input type="text" value="<?php echo $authData['email'];?>"  class="editprofile" name="email" placeholder="Email"/></span></li>
			<li><i><img src="images/grid-world.png" alt="website" /></i> <span><input type="text" value="<?php echo $authData['website'];?>" class="editprofile" name="website" placeholder="Website" /></span></li>
         </ul>
         <?php // if(isset($authData['about'])){?> 
		 <p><textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" id="sdsdsd" class="editprofile sdsdsd" name="about" placeholder="Tell us a little about yourself" /><?php echo $authData['about'];?></textarea></p>
		 <?php  //} ?>
      </div>
	   
      <div class="myTripslist"><?php /*
         <h2>My Trips</h2>
         <?php echo $this->cell('Inbox::trip_country_list'); ?>*/ ?>
		 <h2>My Plans</h2>
		<?php echo $this->cell('Inbox::trip_country_list2'); ?>

      </div>
   </div>
</div>
<div class="midWrapper" id="mytrip_list" style="display:none"> 
	<div class="myTripslist"><?php /*
		<h2>My Trips</h2>
	  <?php echo $this->cell('Inbox::trip_country_list'); ?>*/ ?>
	  <h2>My Plans</h2>
	  <?php echo $this->cell('Inbox::trip_country_list2'); ?>
	</div>
</div>
<div class="midWrapper" id="mytrips" style="display:none">
   <!--<div class="mainTitle">
    <h1>My Trips - <span class="mytripsPlace">Delhi</span></h1>
  </div>-->
  <div class="tripSelect">
<!-- <div class="col"><span class="mytripdate">---</span> <span style="display:none" class="dateto"> to </span> <span style="display:none" class="mytripend">---</span></div> -->
<div class="col"><span class="mytripsCountryName">India</span></div>
<div class="col"><span class="mytripsPlace">Jaipur</span></div>
  </div>
  <div class="priceInquery">
    <div class="pricerow">
      <h3>Length of stay</h3>
      <div class="price"><span class="mytripsDays">#10 days</span></div>
    </div>
    <div class="pricerow">
      <h3>Amount spent per day</h3>
      <div class="price"><span class="mytripsCost">$35</span></div>
    </div>
    <div class="block moreDetail"><a href="javascript:void(0)" id="memoriDatial" class="mytripsmemoriDatial34"><span class="first">(Click for more details)</span> <span class="after">(Click for less details)</span></a></div>
    <div class="memorieDetail"  >
      
      <div class="category">
		 <?php echo $this->cell('Inbox::my_trips_category_list'); ?>
      </div>
    </div>
    <div class="block notes">
      <h2>Total Local Currency</h2>
      <span class="total_local_currency">$ 00</span> </div>
    <div class="block notes">
      <h2>Total User Currency</h2>
      <span class="total_user_currency">$ 00</span> </div>
    <div class="block notes">
      <h2>Notes and Memories</h2>
      <p class="mytripsNotes"></p>
    </div>
  </div>
  </div>
<div class="" id="myplandetailpage" style="display:none">
	<div class="mainbox" id="hplan1">
		<div id="hplan"></div>	
	</div>
</div>
<div class="midWrapper" id="alloffus" style="display:none">  
	<?php  //echo $this->Session->flash('error'); ?>
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
<div class="midWrapper" id="blog" style="display:none">  
	<?php echo $this->cell('Inbox::blog'); ?>
</div>
<div class="midWrapper palnerwrapper" id="planner">
<?php echo $this->element('planner'); ?>
</div>
<?php /*
<div class="midWrapper palnerwrapper" id="planner" style="display:none"> 
  <div class="planerInfo">
	<h6 class="text-center"><textarea placeholder="Trip Name"></textarea></h6>
    <div class="topMenus">
      <ul class="topNavs"> 
        <li><a href="javascript:void(0);">Arrive</a> 
			<div class="planerFiled">
				<div class="filed">
					<div class="dateLine"><input placeholder="" type="text"></div>
				</div>
			</div>
        </li>
        <li><a href="javascript:void(0);">Country</a>
			<div class="planerFiled">
				<div class="filed">
					<input placeholder="Country" type="text">
				</div>
			</div>
        </li>
        <li><a href="javascript:void(0);">Place</a>
			<div class="planerFiled">
				<div class="filed">
					<input placeholder="Place" type="text">
				</div>            
			</div>
        </li>
        <li><a href="javascript:void(0);">Method</a>
          <div class="planerFiled">
            <div class="selectoption selectoption2"> 
             <span class="checkfild">
                <input id="walk1" name="name" type="radio">
                <label for="walk1" data-balloon="Walk" data-balloon-pos="up"><i class="fa fa-male"></i></label>
              </span> 
              <span class="checkfild">
                <input id="bike1" name="name" type="radio">
                <label for="bike1" data-balloon="Bike" data-balloon-pos="up"><i class="fa fa-motorcycle"></i></label>
              </span> 
              <span class="checkfild">
                <input id="car1" name="name" type="radio">
                <label for="car1" data-balloon="Car" data-balloon-pos="up"><i class="fa fa-car"></i></label>
              </span> 
              <span class="checkfild">
                <input id="bus1" name="name" type="radio">
                <label for="bus1" data-balloon="Bus" data-balloon-pos="up"><i class="fa fa-bus"></i></label>
              </span> 
              <span class="checkfild">
                <input id="train1" name="name" type="radio">
                <label for="train1" data-balloon="Train" data-balloon-pos="up"><i class="fa fa-train"></i></label>
              </span> 
              <span class="checkfild">
                <input id="airplane1" name="name" type="radio">
                <label for="airplane1" data-balloon="Airplane" data-balloon-pos="up"><i class="fa fa-plane"></i></label>
              </span> 
              <span class="checkfild">
                <input id="other1" name="name" type="radio">
                <label for="other1" data-balloon="Other" data-balloon-pos="up"><i class="fa fa-thumbs-o-up"></i></label>
              </span> 
            </div>
         </div>
        </li>    
        <li><a href="javascript:void(0);">Depart</a>
			<div class="planerFiled">
				<div class="dateLine"><input placeholder="" type="text"></div>
			</div>
        </li>  
        <li><a href="javascript:void(0);">Nights</a>
          <div class="planerFiled">
				<div class="filed">
                <input placeholder="1" type="number">
              </div>
          </div>
        </li>
        <li><a href="javascript:void(0);">Accom Name</a>
          <div class="planerFiled">
				<div class="filed">
                <input placeholder="Name" type="text">
              </div>
          </div>
        </li>
        <li><a href="javascript:void(0);">Activities</a>
          <div class="planerFiled">
			<div class="filed">
                <input placeholder="Title" type="text">
              </div>
          </div>
        </li>
        <li><a href="javascript:void(0);">Notes</a>
          <div class="planerFiled">
             <div class="filed">
                <input placeholder="Title" type="text">
              </div>
          </div>              
        </li>        
      </ul>
    </div>
    <div class="midwrapperIn">
      <div class="tripForm">
      <?php echo $this->Form->create('Users',['id' => 'futuretrip-form','url' => ['action' => 'future_trip'],'autocomplete' => 'off']); ?>
        <div id="futuretrip-form_error_div" style="display:none"></div>
         <div class="filed"> <label for="tripname_err">Name of Trip</label><?php echo $this->Form->text('tripname',['class' => 'lsrequire','id' => 'tripname_err']); ?>
         </div>
         <div class="filed"> <label for="country_err">Country</label>
        <?php  echo $this->Form->hidden('country_id',['id' => 'country_autocompelte']); ?>
         <?php echo $this->Form->text('country',['class' => 'lsrequire country_autocompelte','id' => 'country_err']); ?>
         </div>
         <div class="filed"> <label for="city_err">City</label><?php echo $this->Form->text('city',['class' => 'lsrequire','id' => 'city_err']); ?>
         </div>
         <div class="filed"> <label for="arrive_err">Arrive</label> <div class="dateLine"><?php echo $this->Form->text('arrive',['class' => 'lsrequire','id' => 'arrive_err','readonly' => true]); ?> </div>
         </div>
         <div class="filed"> <label for="depart_err">Depart</label> <div class="dateLine"><?php echo $this->Form->text('depart',['class' => 'lsrequire','id' => 'depart_err','readonly' => true]); ?> </div>
         </div>
         <div class="filed">
          <div class="selectoption selectoption2"> 
          <span class="checkfild">
            <input id="walk" name="method" value="walk" checked="checked" type="radio">
            <label for="walk" data-balloon="Walk" data-balloon-pos="up"><i class="fa fa-male"></i></label>
            </span> 
            <span class="checkfild">
            <input id="bike" name="method" value="bike" type="radio">
            <label for="bike" data-balloon="Bike" data-balloon-pos="up"><i class="fa fa-motorcycle"></i></label>
            </span> 
            <span class="checkfild">
            <input id="car" name="method" value="car" type="radio">
            <label for="car" data-balloon="Car" data-balloon-pos="up"><i class="fa fa-car"></i></label>
            </span> 
            <span class="checkfild">
            <input id="bus" name="method" value="bus" type="radio">
            <label for="bus" data-balloon="Bus" data-balloon-pos="up"><i class="fa fa-bus"></i></label>
            </span> 
            <span class="checkfild">
            <input id="train" name="method" value="train" type="radio">
            <label for="train" data-balloon="Train" data-balloon-pos="up"><i class="fa fa-train"></i></label>
            </span> 
            <span class="checkfild">
            <input id="airplane" name="method" value="airplane" type="radio">
            <label for="airplane" data-balloon="Airplane" data-balloon-pos="up"><i class="fa fa-plane"></i></label>
            </span> 
            <span class="checkfild">
            <input id="other" name="method" value="other" type="radio">
            <label for="other" data-balloon="Other" data-balloon-pos="up"><i class="fa fa-thumbs-o-up"></i></label>
            </span> </div>
          </div>
          <div class="filed">
             <label for="name_err">Accom</label>
            <div class="minfild"><?php echo $this->Form->text('name',['placeholder' => __('Name',true),'class' => 'lsrequire','id' => 'name_err']); ?>
            </div>
             <div class="minfild"><?php echo $this->Form->text('address',['placeholder' => __('Address',true),'class' => 'lsrequire','id' => 'address_err']); ?>           
            </div>
            <div class="minfild"><?php echo $this->Form->text('phone',['placeholder' => __('Phone Number',true),'class' => 'lsrequire','id' => 'phone_err']); ?>           
            </div>
            <div class="minfild"><?php echo $this->Form->text('cost',['placeholder' => __('Cost',true),'class' => 'lsrequire','id' => 'cost_err']); ?>           
            </div>
            <div class="minfild">
            <textarea placeholder="details" name="details" id="details_err"></textarea>
            </div>  
          </div>
            <div class="filed">
              <label for="activities_title_err">Activities</label>
              <div class="minfild">
              <?php echo $this->Form->text('activities_title',['placeholder' => __('Title',true),'class' => 'lsrequire','id' => 'activities_title_err']); ?>          
              </div>
              
              <div class="minfild">
              <textarea placeholder="details" name="activities_details" id="activities_details_err"></textarea>
              </div>   
            </div>         
            <div class="filed">
              <label for="notes_title_err">Notes</label>
              <div class="minfild">
               <?php echo $this->Form->text('notes_title',['placeholder' => __('Title',true),'class' => 'lsrequire','id' => 'notes_title_err']); ?>    
              </div>
              
              <div class="minfild">
              <textarea placeholder="details" name="notes_details" id="notes_details_err"></textarea>
              </div>             
              
            </div>
            <div class="block alinCenter">
            <input value="Ok" class="btn radiusBtn futuretrip" data-rel="futuretrip-form" type="submit">
          </div>

      <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
<?php */ $this->Html->scriptStart(array('block' => 'custom_script')); ?>
$(".submittripdetails").live("click", function(e){
	e.preventDefault();
	error = true;
	$(".tsrequire").each(function(){
		val = $(this).val();
		$(this).removeClass('border-red');
		if(val == ''){
			$(this).addClass('border-red');
			error = false;
		}
	});
	form_id = 'trip-form';
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


$(".submitallofus").live("click", function(e){
	e.preventDefault();
	error = true;
	$(".tossrequire").each(function(){
		val = $(this).val();
		$(this).removeClass('border-red');
		if(val == ''){
			$(this).addClass('border-red');
			error = false;
		}
	});
	form_id = 'allofus-form';
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

$('.tripAddpop .category ul li a').click(function(){
	$('.tripAddpop .category ul li .pull-left i').removeClass('active');
	var id=$(this).find("img").attr('data-id');
	$(this).find("i").addClass('active');
	$('.Category').val(id);
	setData(id);
});

$('.navmain').click(function(){
	$("#myplandetailpage").hide();
	$('.navmain').removeClass('currentnav');
	$(this).addClass('currentnav');
	$(".midWrapper").hide();
	$("#"+$(this).attr("data-tab")).show();
	$("#hplan").html('');
	// alert($(this).attr("data-tab"));
	if($(this).attr("data-tab")=='profiletab'){
		$('.changeprofile').show();
		setTimeout(function(){
			getPlanPage();
		},1000);
	}else{ 
		$('.changeprofile').hide();
	}
	tab	=	$(this).attr("data-tab");
	
	if(tab == 'tracker' || tab == 'mytrip_list' ||  tab == 'alloffus'){
		$("footer").hide();
		setTimeout(function(){
			getPlanPage();
		},1000);
	}else{
		$("footer").show();
		var theTemplateScript =  $("#social_url").html();
		var theTemplate		  =  Handlebars.compile(theTemplateScript);
		var context			  =  {"text":"Plan","url":"<?php echo WEBSITE_URL; ?>","pdf":"javascript:void(0);"};
		var theCompiledHtml   =  theTemplate(context);	
		$('.social_url').html(theCompiledHtml);
		
		$(".url-p").html('<a href="javascript:void(0);"><?php echo WEBSITE_URL; ?></a>');
	}
	
	
	 $(".a2").hide();
});
$('.tripdate').datepicker({ dateFormat: 'dd-mm-yy' , buttonImage: 'images/ic8.png',
        buttonImageOnly: true,showOn: 'both',onSelect: function (selectedDate) {
			$('#dp').html(selectedDate);
			$('.tripdate2').val(selectedDate);
			getDataDate(selectedDate);
     }}).val();
$('#arrive_err').datepicker( {dateFormat: 'dd-mm-yy'}).val();
$('#depart_err').datepicker( {dateFormat: 'dd-mm-yy'}).val();
$("input[name='country']").change(function(){
	$(".cuntFild").removeClass('border-red');

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
  $(".countrysearch").live("keyup", function(e){
		var searchText = $(this).val();
		
		ckeydown = true;
		if(e.keyCode == 8){
			$('ul#countrysearch > li > label').each(function(){
				var currentLiText = $(this).text();
				searchText		=	searchText.toUpperCase();
				currentLiText	=	currentLiText.toUpperCase();
				
				showCurrentLi = currentLiText.startsWith(searchText);
				console.log(showCurrentLi);	
				if(showCurrentLi){
					$(this).parent('li').show();						
				}else{
					$(this).parent('li').hide();			
				}
				

			});
		}
	});  	
$("input[name='currency']").change(function(){
	$("#currency_id").val($(this).attr('data-id'));
	$(".minCurrnce").removeClass('border-red');
	$(".minCurrnce").val($(this).val());
	 $('.chouseCurrnce').removeClass('show zoomIn');
    $('.baxxs').remove('');
});

$(".mytripdetailpage").click(function(){
	var data = $(this).attr('full-data');
	var notes="";
	var json = JSON.parse(data);
	$("#mytrips .mytripdate").html(json.tripdate);
	if(json.endtrip){
		$(".dateto").show();
		$("#mytrips .mytripend").show();
		$("#mytrips .mytripend").html(json.endtrip);
	}

	$("#mytrips .mytripsPlace").html(json.place);
	$("#mytrips .mytripsCountryName").html(json.country);
	$("#mytrips .mytripsDays").html("# "+json.days+" days");
	$("#mytrips .mytripsCost").html(json.symbol+" "+json.avgcost);
	$("#mytrips .total_local_currency").html(json.symbol+" "+json.total_local_currency);
	$("#mytrips .total_user_currency").html(json.userCurrencySymbol+" "+json.total_user_currency);


	$.each(json.notes,function(index, value){
		$("#mytrips .mytripsNotes").append(value+"<br>");
	   // notes =console.log('My array has at position ' + index + ', this value: ' + value);
	});
	$.each(json.category_total,function(index, value){
		$(".mytrips_cat_price"+index).html(value+"  "+json.symbol);
	   
	});
	 

});


$(document).on('click', '.myplandetailpage', function(){
	id	=	$(this).attr('data-id');
	// $("#planner .second-row").remove();
	// $("#planner #trip_name").val('');
	
	$.ajax({
		url  : '<?php echo WEBSITE_URL; ?>trip_edit/'+id,
		dataType : "json",
		type : "POST",
		success : function(r){
			$("#hplan").html(r.html);
			timeKey	=	r.timeKey;
			data	=	r.json;
			
			var theTemplateScript =  $("#planner-template"+timeKey).html();
			var theTemplate		  =  Handlebars.compile(theTemplateScript);
			
			var context			  =  data;
			var theCompiledHtml   =  theTemplate(context);
				
			$('#tripviewmy'+timeKey).html(theCompiledHtml);
			
			
			$(".midWrapper").hide();
			$("#myplandetailpage").show();
			$(".a2").show();
			$('.navmain').removeClass('currentnav');
			$('.navmain[data-tab=mytrip_list]').addClass('currentnav');
			
			$("footer").show();
			
			setTimeout(function(){
				var theTemplateScript =  $("#social_url").html();
				var theTemplate		  =  Handlebars.compile(theTemplateScript);
				var context			  =  {"text":data.name,"url":data.slug,"pdf":data.pdf};
				var theCompiledHtml   =  theTemplate(context);	
				
				$('.social_url').html(theCompiledHtml);
			},1000);
			
			$(".url-p").html('<a href="'+data.slug+'">'+data.slug+'</a>');
			$(".url-href").html('<a href="<?php echo $this->Url->build(["plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>?slug='+data.href+'" class="btn radiusBtn">Login</a>');
			
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
		}
	});
		
});


function getPlanPage(){
	$.ajax({
		url  : '<?php echo WEBSITE_URL; ?>trip_edit',
		dataType : "json",
		type : "POST",
		success : function(r){
			$("#planner").html(r.html);
		}
	});
}
$('input[type=file]#changeinput1').change(function (event) { 
  form_id = 'upload_img_form1';
  
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
 
 <?php /*

 $(".country_autocompelte").autocomplete({
        source: function(e, a) {
            var t = ($(this), $(this.element)),
                l = t.data("jqXHR");
            l && l.abort(), t.data("jqXHR", $.ajax({
                url: "<?php echo $this->Url->build(array('plugin' =>'','controller' =>'Users','action' =>'user_autocomplete')); ?>",
                dataType: "json",
                data: {q: e.term
                },
                success: function(e) {a(e), $(".country_autocompelte").removeClass("ui-autocomplete-loading")
                }
            }))
        },
        minLength: 1,
        select: function(e, a) { console.log(a);
            name = a.item.name, id = a.item.id, 
			setTimeout(function() {
                $(".country_autocompelte").val(a.item.name);
				
			$("#country_autocompelte").val(id);
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
    }*/ ?>
 

$(".futuretrip").live("click", function(e){
  e.preventDefault();
  error = true;
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
		  window.location='<?php echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'index','cat_type' =>'mytrip_list')); ?>';
        }else{
          notice(data.type,data.message,data.type);
          data = data.errors;
          goToByScroll(error_div);
          var error='<ul class="client-side-error">';
          $.each(data,function(index,html){
            error +=  '<li>'+html+'</li>';
            $("#"+index+"_err").addClass('border-red');
          });
          error +=  '</ul>';
          error_msg = '<div class="alert alert-danger alert-dismissible site-color" style="padding-left: 0;" role="alert">'+error+'</div>';
          error_div.html(error_msg);
          error_div.show();
        }
      return false;
      },resetForm:false
    };
    $("form#"+form_id).ajaxSubmit(options);
      
  }
});
c = 1;
	function textAreaAdjust(o) {
		if(c == 1){
			o.style.height = (25+o.scrollHeight)+"px";
		}else{
			o.style.height = o.scrollHeight+"px";
		}
		c++;
	}
<?php $this->Html->scriptEnd();  ?>
<script id="address-template" type="text/x-handlebars-template">
  <?php echo $this->element("plan_view"); ?>
</script>