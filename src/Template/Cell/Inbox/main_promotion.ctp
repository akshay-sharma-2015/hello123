<?php foreach($mainPromo as $mainPromos){ ?>
<div class="plan-box-footer">
	<?php if(!empty($mainPromos->image) && file_exists(CASINO_FULL_IMG_ROOT_PATH.$mainPromos->image)){ ?>
		<img class="download-img-img" src="<?php echo WEBSITE_UPLOADS_URL.'image.php?width=1700px&height=425px&cropratio=4:1&image='.CASINO_FULL_IMG_URL.$mainPromos->image ; ?>" alt="img" />
	<?php } ?>
	<div  class="details"><?php echo (isset($mainPromos->_translations["en"]->sdescription)) ? $mainPromos->_translations["en"]->sdescription : ''; ?></div>
	<div class="details"><?php echo (isset($mainPromos->_translations["en"]->description)) ? $mainPromos->_translations["en"]->description : ''; ?></div>
</div>
<?php } ?>