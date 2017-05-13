<div class="midWrapper" id="profiletab">
 
   <div class="profileInfo">
      <div class="profile">
         <div class="userPort">
		 <span><?php if(!empty($userdata['profile_image'])&& file_exists(AMENITIES_ROOT_PATH.$userdata['profile_image'])){  ?>
		 <img src="<?php echo WEBSITE_URL.'image.php?width=164px&height=164px&image='.AMENITIES_IMG_URL.$userdata['profile_image'];?>" alt="Profile" class='image_src1' /> <?php } else {?><img src="<?php echo WEBSITE_URL.'images'; ?>/profile2.png" alt="Profile"  /> <?php } ?></span>
		 
		 </div>
         <h2>/<?php echo $userdata['username'];?></h2>
         <h4><?php echo $userdata['country']['name'];?></h4>
      </div>
 
      <div class="contactprofile">         
         <ul>
            <li><i><img src="<?php echo WEBSITE_URL.'img'; ?>/ic15.png" alt="Phone" /></i> <span><input type="text" value="<?php echo $userdata['mobile'];?>" class="" name="mobile" placeholder="Mobile" readonly /></span></li>
            <li><i><img src="<?php echo WEBSITE_URL.'img'; ?>/ic16.png" alt="Mail" /></i> <span><input type="text" value="<?php echo $userdata['email'];?>"  class="" name="email" placeholder="Email" readonly/></span></li>
            <li><i><img src="images/grid-world.png" alt="website" /></i> <span><input type="text" value="<?php echo $userdata['website'];?>" class="" name="website" placeholder="Website" readonly /></span></li>
         </ul>
		<?php /*if($userdata['about']!=""){ */?>
         <p><textarea class="" name="about" placeholder="Tell us a little about yourself" readonly /><?php echo $userdata['about'];?></textarea></p>
		 <?php //}?>
      </div>
	   
      <div class="myTripslist">
         <h2>Trips</h2>
         <?php echo $this->cell('Inbox::trip_country_list'); ?>
         <h2>My Plan</h2>
         <?php echo $this->cell('Inbox::trip_country_list2'); ?>
      </div>
   </div>
</div>
<div class="midWrapper" id="mytrips" style="display:none">
   <div class="mainTitle" >
    <h3><a href="javascript:void(0);"  class="publicprofileshow" > Back To profile</a></h3>
  </div>
  <div class="tripSelect">
<div class="col"></div>
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
<?php $this->Html->scriptStart(array('block' => 'custom_script')); ?>
$(".mytripdetailpage").click(function(){
var data = $(this).attr('full-data');
var notes="";
var json = JSON.parse(data);
$("#mytrips .mytripdate").html(json.tripdate);
$("#mytrips .mytripend").html(json.endtrip);
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
$(".publicprofileshow").click(function(){
	$(".midWrapper").hide();
	$("#profiletab").show();
	$('.navmain').removeClass('currentnav');		
});
<?php $this->Html->scriptEnd();  ?>