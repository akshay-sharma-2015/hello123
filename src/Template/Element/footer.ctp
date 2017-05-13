<?php use Cake\Core\Configure; ?>
<footer>
   <div class="col-md-6"><a href="javascript:void(0);" class="footer-menu" data-id="Notifications" id="tripSbtn"><i class="fa fa-share-alt"></i></a></div>
   <?php /*<div class="col-md-4 asas"><a href="javascript:void(0);" data-id="TripFriend" class="footer-menu">
      <img class="download-img" src="<?php echo WEBSITE_URL ; ?>images/Download-501.png" alt="img" />
      <img class="download-img1" src="<?php echo WEBSITE_URL ; ?>images/Download-502.png" alt="img" />
      </a>
   </div>*/ ?>
   <div class="col-md-6"><a href="javascript:void(0);" data-id="love" class="footer-menu"><i class="fa fa-heart"></i> </a></div>
</footer>
<?php /*
<div class="footerPopup" id="TripFriend">
   <a href="javascript:void(0);" class="fa fa-close closeIc btn radiusBtn"></a>
   <div class="TripFriendinfo trip-download-tap">
      <p>Your unique URL for this page is</p>
      <a href="#">xxxxxxxxxx.com</a>
      <p>OR</p>
      <a href="#">save to ´My Trips´</a>
      <p>OR</p>
      <a href="#">Saved to My Trips</a>
      <p>OR</p>
      <p class="input-p"><input id=""  placeholder="Enter Email" type="text"></p>
      <a href="#">Save</a>
      <a href="javascript:void(0);" data-id="TripFriend" class="footer-menu">
      <img class="download-img" src="<?php echo WEBSITE_URL ; ?>images/Download-501.png" alt="img" />
      <img class="download-img1" src="<?php echo WEBSITE_URL ; ?>images/Download-502.png" alt="img" />
      </a>
   </div>
</div>*/ ?>
<div class="footerPopup" id="love">
    <a href="javascript:void(0);" class="close1 closeIc"><img src="<?php echo WEBSITE_URL ; ?>images/close.png" /> </a>   
   <div class="TripFriendinfo trip-download-tap">
      <div class="col-md-12">
         <?php echo $this->cell('Inbox::footerCell'); ?>
      </div>
   </div>
</div>
<div class="footerPopup" id="Notifications">
    <a href="javascript:void(0);" class="close1 closeIc"><img src="<?php echo WEBSITE_URL ; ?>images/close.png" /> </a> 
	<?php if($this->request->session()->read('Auth.User')){ ?>
		<div class="toptext">
			 <h3>Save</h3>
			<span>Your plan is saved in your Trips</span>    
			<span>Also, here is the direct link to your plan.</span>    
			<span class="url-p" ><a href="<?php echo WEBSITE_URL; ?>"><?php echo WEBSITE_URL; ?></a></span>
		</div>
	<?php }else{ ?>
		<div class="toptext">
        <h3>Save</h3>
			<span>Login to save your trip</span>   
            <span class="url-href"><a href="<?php echo $this->Url->build(["plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type" => "gotologin"]); ?>" class="btn radiusBtn">Login</a></span><?php /*		
			<h5>or, remember the following link</h5>
			<span class="url-p" ><a href="<?php echo WEBSITE_URL.'plan'; ?>"><?php echo WEBSITE_URL.'plan'; ?></a></span>*/ ?>
			<h5>or, remember the following link </h5>
			<span class="url-editable" ><a href="<?php echo WEBSITE_URL.'plan'; ?>"><?php echo WEBSITE_URL.'plan'; ?></a></span>
			
		</div>
	<?php } ?>	
    <div class="social_url"></div>
</div>

