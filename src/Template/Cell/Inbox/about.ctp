<div class="blogpage">
<?php
  foreach($about as $key => $name){ ?>
	<div class="row sub_panel cv_row">
	    				
	<div class="col-md-12">
	    <h2><?php echo $name->title; ?></h2>
	    <p><?php echo $name->description; ?></p>	    
  	</div>
</div>
<?php } ?>
 
</div>
