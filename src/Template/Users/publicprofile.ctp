<div class="midWrapper" id="profiletab">
 
   <div class="profileInfo">
      <div class="profile">
         <div class="userPort">
		 <span><img src="<?php echo WEBSITE_URL.'image.php?width=164px&height=164px&image='.AMENITIES_IMG_URL.$userdata['profile_image'];?>" alt="Profile" class='image_src' /><a href="" class="fa fa-edit"></a></span>
		 
		 </div>
         <h4>/<?php echo $userdata['username'];?></h4>
         <h2><?php echo $userdata['username'];?></h2>
         <h4><?php echo $userdata['country']['name'];?></h4>
      </div>
 
      <div class="contactprofile">
         <h2>Contact</h2>
         <ul>
            <li><i><img src="<?php echo WEBSITE_URL.'img'; ?>/ic15.png" alt="Phone" /></i> <span><input type="text" value="<?php echo $userdata['mobile'];?>" class="" name="mobile" readonly /></span></li>
            <li><i><img src="<?php echo WEBSITE_URL.'img'; ?>/ic16.png" alt="Mail" /></i> <span><input type="text" value="<?php echo $userdata['email'];?>"  class="" name="email" readonly/></span></li>
            <li><i><img src="images/grid-world.png" alt="Website" /></i> <span><input type="text" value="<?php echo $userdata['website'];?>" class="" name="website" readonly /></span></li>
         </ul>
		<?php if($userdata['about']!=""){?>
         <p><textarea class="" name="about" /> <?php echo $userdata['about'];?>  </textarea></p>
		 <?php }?>
      </div>
	   
      <div class="myTripslist">
         <h2>Trips</h2>
         <?php echo $this->cell('Inbox::trip_country_list'); ?>
      </div>
   </div>
</div>