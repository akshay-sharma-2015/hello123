<div id="page-wrapper" style="min-height: 140px;">
	<div class="row">
		<?php  echo $this->Flash->render(); ?>
	</div>	
	<div class="row">
		<div class="col-lg-6">
			<h1 class="page-header">Edit text</h1>
		</div>
		<div class="col-lg-6">
			<?php echo $this->Html->link('Back',array('action' => 'index'),array('class' => 'btn btn-primary','style' => array('float: right; margin-top: 58px;'))); ?>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<?php echo $this->Form->create($textSetting);
								?>
								<div class="form-group">
									<label>Text</label>
									<?php echo $this->Form->text("msgstr",array('class' => 'form-control','placesholder' => 'Title','required' => true)); ?>
									<?php echo $this->Form->error("msgstr"); ?>
								</div>
								<button class="btn btn-default" type="submit">Save</button>
								<button class="btn btn-default" type="reset">Reset</button>
							</form>
						</div>
						<!-- /.col-lg-6 (nested) -->
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
