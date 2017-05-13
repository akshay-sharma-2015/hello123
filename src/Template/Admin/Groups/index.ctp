<div id="page-wrapper">
	<div class="row">
		<?php  echo $this->Flash->render(); ?>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h1 class="page-header">Group List</h1>
			</div>
			<div class="col-lg-6">
				<?php echo $this->Html->link('Add New Group',array('action' => 'add'),array('class' => 'btn btn-primary','style' => array('float: right; margin-top: 58px;'))); ?>
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive1">
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-12">
									<?php echo $this->Form->create('',array('type' => 'get')); ?>
									<div class="col-sm-3"> <?php echo $this->Form->text("name",array('class' =>'form-control','placeholder' => 'Search by name','value' => isset($requestedQuery['name']) ? $requestedQuery['name'] : '')); ?></div>
									
									<div class="col-sm-3">
										<input type="submit" value="Search" class="btn btn-primary">
										<?php echo $this->Html->link("Reset",array('action' => 'index'),array('class' => 'btn btn-default')); ?>
									 </div>
									 <?php echo $this->Form->end(); ?>
								</div>
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th scope="col"><?= $this->Paginator->sort('id') ?></th>
									<th scope="col"><?= $this->Paginator->sort('name') ?></th>
									<th scope="col"><?= $this->Paginator->sort('created') ?></th>
									<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
									<th scope="col" class="actions"><?= __('Actions') ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($groups as $group): ?>
								<tr>
									<td><?= $this->Number->format($group->id) ?></td>
									<td><?= h($group->name) ?></td>
									<td><?= h($group->created) ?></td>
									<td><?= h($group->modified) ?></td>
									<td class="actions">
										<?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id],['class' => 'btn btn-info']) ?>
										<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['class' => 'btn btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php $paginator    =    $this->Paginator; ?>
						<div class="row">
							<div class="col-sm-12 text-right">
								<ul class="pagination">	
								<?php
									echo $paginator->prev(__('Prev', true),
										array(
											'id'=> 'p_prev',
											'tag'=> 'li',
											'escape'=>false
										),
										null,
										array(
											'class'=>'pagination',
											'escape'=>false,
										   'tag'=> 'li',
											'disabledTag'=>'a'
										)
									);
									echo $paginator->numbers(array(
									   'tag'=> 'li',
										'span'=>false,
										'currentClass' => 'pagination',
										'currentTag' => 'a',
										'separator' => false,
										'class' => "pagination"
										
									));    
									echo $paginator->next(__('Next', true),
										array(
											'id'=> 'p_next',
											'tag'=> 'li',
											'escape'=>false
										),
										null,
										array(
											'class'=>'pagination',
											'escape'=>false,
										   'tag'=> 'li',
											'disabledTag'=>'a'
										)
									);
								?>
								</ul>
							</div>
						 </div>
					</div>					
				</div>				
			</div>			
		</div>		
	</div>
</div>