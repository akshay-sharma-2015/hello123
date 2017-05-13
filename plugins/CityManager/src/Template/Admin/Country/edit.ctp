<?php echo $this->Html->script(array(
		WEBSITE_ADMN_JS_URL.'ckeditor/ckeditor.js'),
	array('block' =>'bottom'));
	?>
<div id="page-wrapper" style="min-height: 140px;">
	<div class="row">
		<div class="col-lg-6">
			<h1 class="page-header">Edit country</h1>
		</div>
		<div class="col-lg-6">
			<?php echo $this->Html->link('Back',array('action' => 'index'),array('class' => 'btn btn-primary','style' => array('float: right; margin-top: 58px;'))); ?>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<?php foreach($lanagauageList as $lanagauage){ ?>
				<li class="<?php echo ($lanagauage->is_default == 1) ? 'active' : '';  ?> "><a data-toggle="tab" href="#<?php echo $lanagauage->code; ?>_div" aria-expanded="true"><?php echo $lanagauage->name; ?></a></li>
			<?php } ?>
		</ul>
		<?php echo $this->Form->create($country,array('role' => 'form','type' => 'file')); ?>
		<div class="tab-content">
			<?php 	
			foreach($lanagauageList as $lanagauage){
				$code		=	$lanagauage->code;
				$required	=	 ($lanagauage->is_default == 1) ? 'required' : '' ; ?>
				<div id="<?php echo $lanagauage->code; ?>_div" class="tab-pane <?php echo ($lanagauage->is_default == 1) ? 'active' : '';  ?>">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Name</label>
							<?php 
							if($lanagauage->is_default == 1){
								$val 		=	 (!empty($country->_translations[$code]->name)) ? $country->_translations[$code]->name : $country->name;
								echo $this->Form->text('_translations.'.$code.".name",array('class' => 'form-control','placesholder' => 'Name','required' => $required, 'value' => $val));
							}else{
								echo $this->Form->text('_translations.'.$code.".name",array('class' => 'form-control','placesholder' => 'Name','required' => $required));
							}
							echo ($lanagauage->is_default == 1) ? $this->Form->error("name") : ''; ?>
						</div>	
					</div>
				</div>
			<?php } ?>
			<div class="col-lg-12">		
				<div class="form-group">
					<label>Currency</label>
					<?php 
					 echo $this->Form->text("currency",array('class' => 'form-control','placeholdder' => 'Currency'));  
					echo $this->Form->error("currency"); ?>
				</div> 
				<div class="form-group">
					<label>Code</label>
					<?php 
					 echo $this->Form->text("code",array('class' => 'form-control','placeholdder' => 'Code'));  
					echo $this->Form->error("code"); ?>
				</div> 
				<div class="form-group">
					<label>Symbol</label>
					<?php 
					 echo $this->Form->text("symbol",array('class' => 'form-control','placeholdder' => 'Symbol'));  
					echo $this->Form->error("symbol"); ?>
				</div> 
				<button class="btn btn-default" type="submit">Save</button>
				<button class="btn btn-default" type="reset">Reset</button>
			</div>
		</form>
	</div>
</div>