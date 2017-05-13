<?php  echo $this->Html->script(array(
		WEBSITE_ADMIN_JS_URL.'jquery-checktree.js'
		),
	array('block' =>'bottom')); /*
	 echo $this->Html->css(array(
		WEBSITE_URL.'uploader/assets/css/style.css',
		WEBSITE_URL.'uploader/assets/css/lightbox.css'
		),
	array('block' =>'css'));  */
	?>
<div id="page-wrapper" style="min-height: 140px;">
<div class="row">
		<?php  echo $this->Flash->render(); ?>
	</div>	
	<div class="row">
		<div class="col-lg-6">
			<h1 class="page-header">Add new group</h1>
		</div>
		<div class="col-lg-6">
			<?php echo $this->Html->link('Back',array('action' => 'index'),array('class' => 'btn btn-primary','style' => array('float: right; margin-top: 58px;'))); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12" ng-app="plunker"  ng-controller="MainCtrl">
							<?php echo $this->Form->create($group,array('role' => 'form','type' => 'file','novalidate' => true)); ?>
								<div class="form-group">
									<label>Name</label>
									<?php echo $this->Form->text("name",array('class' => 'form-control','placesholder' => 'Title','ng-model' => 'name','ng-required' => "required")); ?>   
									<?php echo $this->Form->error("name"); ?>
								</div>
								<div class="form-group">
									<label>Group Permission</label>
									<ul id="tree">										
										<?php 
										$pluginName	=	'module';
										foreach($array as $main ){  ?>
											<li>
												<label class="checkbox">
												<?php echo $this->Form->checkbox($pluginName.".".$main->alias); ?>
												All</label>
												<ul>
												<?php foreach($main->children as  $controller ){ //pr($controller); ?>
													<li>
														<label class="checkbox">
														<?php echo $this->Form->checkbox($pluginName.".".$main->alias.".".$controller->alias); ?>
														<?php echo $controller->alias; ?></label>
														<ul>
														<?php foreach($controller->children as  $action ){ ?>
															<li>
																<label class="checkbox">
																<?php echo $this->Form->checkbox($pluginName.".".$main->alias.".".$controller->alias.".".$action->alias); ?>
																<?php echo $action->alias; ?></label>
																<ul>
																<?php foreach($action->children as  $subAction ){ ?>
																	<li>
																		<label class="checkbox">
																		<?php echo $this->Form->checkbox($pluginName.".".$main->alias.".".$controller->alias.".".$action->alias.".".$subAction->alias); ?>
																		<?php echo $subAction->alias; ?></label>
																		<ul>
																		<?php foreach($subAction->children as  $subCAction ){ ?>
																			<li>
																				<label class="checkbox">
																				<?php echo $this->Form->checkbox($pluginName.".".$main->alias.".".$controller->alias.".".$action->alias.".".$subAction->alias.".".$subCAction->alias); ?>
																				<?php echo $subCAction->alias; ?></label>
																			</li>
																		<?php } ?>
																		</ul>
																	</li>
																<?php } ?>
																</ul>
															</li>
														<?php } ?>
														</ul>
													</li>
												<?php } ?>
												</ul>
											</li>
										<?php } ?>									
									</ul>
								</div>							
								<button class="btn btn-default" type="submit">Save</button>
								<button class="btn btn-default" type="reset">Reset</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
$this->Html->scriptStart(array('inline' => true,'block' => 'custom_script')); ?>
$(function () {	
     $('#tree').checktree();  
});
<?php $this->Html->scriptEnd(); ?>