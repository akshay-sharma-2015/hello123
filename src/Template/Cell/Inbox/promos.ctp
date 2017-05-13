<div class="blogpage">
<?php
//echo "<pre>"; print_r($promos); die();
  foreach($promos as $key => $name){ ?>
	<div class="row sub_panel cv_row">
	    				
	<div class="col-md-12">
	    <h2><?php echo $name->title; ?></h2>
      
	    <div><?php echo $name->_translations["en"]->sdescription; ?></div>	    
	    <div><?php echo $name->_translations["en"]->description; ?></div>	    
  	</div>
</div>
<?php }  ?>
 
</div>
