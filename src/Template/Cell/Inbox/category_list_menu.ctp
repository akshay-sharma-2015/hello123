<ul id="cat_head_ul">
<?php //pr($category); 
   foreach($category as $key => $name){  ?>
	<li <?php if($key == 0){ ?> class="first_h_li" data-id ="<?php echo $name->id;  ?>"<?php } ?>>
		<div class="col">
			<a href="javascript:void(0);">
				<span class="pull-left">
					<i id="cat_head_<?php echo $name->id; ?>" <?php if($key == 0){ ?> class="active"<?php } ?>> 
						<?php if(file_exists(AMENITIES_ROOT_PATH.$name->image)) { ?>
							<img src="<?php echo WEBSITE_UPLOADS_URL.'image.php?width=23px&height=22px&cropratio=1:1&image='.AMENITIES_IMG_URL.$name->image;?>" alt="<?php echo $name->name; ?>" title="<?php echo $name->name; ?>" data-id="<?php echo $name->id; ?>"/>
						<?php } ?>
					</i>
				</span>
				<label><?php echo $name->name; ?></label>
			</a>
		</div>
	</li>
<?php } ?>
</ul>