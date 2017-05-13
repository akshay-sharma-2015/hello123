<ul>
<?php
   foreach($category as $key => $name){ ?>
	<li>
		<div class="col">
			<a href="javascript:void(0);">
			<label><?php echo $name->name; ?></label>
				<span class="pull-left pullcenter">
					<i>
						<?php if(!empty($name->image) && file_exists(AMENITIES_ROOT_PATH.$name->image)) { ?>
								<img src="<?php echo WEBSITE_UPLOADS_URL.'image.php?width=23px&height=22px&cropratio=1:1&image='.AMENITIES_IMG_URL.$name->image;?>" alt="<?php echo $name->name; ?>" title="<?php echo $name->name; ?>" data-id="<?php echo $name->id; ?>">
						<?php } ?>
					</i>
				</span>
				
			</a>
		</div>
		
		 <div class="col"><span class="cat_price"></span></div>
	</li>
<?php } ?>
</ul>





 