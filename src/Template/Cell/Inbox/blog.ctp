<div class="blogpage">
<?php
  foreach($blog as $key => $name){ ?>
	<div class="row sub_panel cv_row">
	    				
	<div class="col-md-12">
	    <h2><a href="<?php echo WEBSITE_URL; ?>blog/<?php echo $name->slug; ?>"><?php echo $name->title; ?></a></h2>
	    <div><?php echo $name->sdescription; ?></div><?php /*
	    <p>
  			<i class="fa fa-cloud-download" aria-hidden="true"></i>
  			<?php echo $name->user->name; ?>
  			<i class="fa fa-book" aria-hidden="true"></i>
  			<?php echo $name->master->name; ?>
  			</p>*/ ?>
  	</div>
</div>
<?php } ?>
 
</div>
