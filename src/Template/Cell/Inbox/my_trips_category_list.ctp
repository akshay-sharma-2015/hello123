<ul>
<?php //pr($category);
   foreach($category as $key => $name){ ?>
	<li>
	  <div class="col"> <a href=""> <span class="pull-left"><i> <?php if(file_exists(AMENITIES_ROOT_PATH.$name->image)) { ?><img src="<?php echo WEBSITE_UPLOADS_URL.'image.php?width=23px&height=22px&cropratio=1:1&image='.AMENITIES_IMG_URL.$name->image;?>" alt="<?php echo $name->name; ?>" title="<?php echo $name->name; ?>" data-id="<?php echo $name->id; ?>"> <?php } ?></i></span>
		<label><?php echo $name->name; ?></label>
		</a> </div>
		 <div class="col"> <span class="mytrips_cat_price<?php echo $name->id; ?>"> </span> </div>
	</li>
<?php } ?>
</ul>


 