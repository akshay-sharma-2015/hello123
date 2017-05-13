<div id="page-wrapper" style="min-height: 140px;">
	<div class="row">
		<?php  echo $this->Flash->render(); ?>
	</div>	
	<div class="row">
		<div class="col-lg-6">
			<h1 class="page-header">Update user</h1>
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
						<div class="col-lg-12">
							<?php echo $this->Form->create($user,array('role' => 'form','type' => 'file','novalidate' => true)); ?>
								<div class="form-group">
									<label>Name</label>
									<?php echo $this->Form->text("username",array('class' => 'form-control','placesholder' => 'Email')); ?>   
									<?php echo $this->Form->error("username"); ?>
								</div>
								<div class="form-group">
									<label>Name</label>
									<?php echo $this->Form->text("full_name",array('class' => 'form-control','placesholder' => 'Full name')); ?>   
									<?php echo $this->Form->error("name"); ?>
								</div>
								<div class="form-group">
									<label>Password</label>
									<?php echo $this->Form->password("password",array('class' => 'form-control','placesholder' => 'Password')); ?>   
									<?php echo $this->Form->error("password"); ?>
								</div>
								<div class="form-group">
									<label>Group</label>
									<?php echo $this->Form->select("group_id",$groups,array('class' => 'form-control','empty' => false)); ?>   
									<?php echo $this->Form->error("group_id"); ?>
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