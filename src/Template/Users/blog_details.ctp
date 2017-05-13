<div class="midWrapper">  
	<div class="blog-detail">
	<div class="row sub_panel cv_row">
	    				
	<div class="col-md-12">
	  <div class="top-textbox-detail">
		<span style="font-size:24px"><?php echo $blog->title; ?></span>
	</div>
		
		<div class="blog-detail-img">
		<?php if(!empty($blog->image) && file_exists(CASINO_FULL_IMG_URL.$blog->image)){ ?>
			<img class="download-img-img" src="<?php echo CASINO_FULL_IMG_URL.$blog->image; ?>" alt="img">
		<?php } ?>
	
</div>
	  <div class="blog-detail-para"><?php echo $blog->description; ?>
</div>    
  	</div>
</div>
 
</div>
</div>