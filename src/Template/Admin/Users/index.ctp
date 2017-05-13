<div id="page-wrapper">
	<div class="row">
		<?php  echo $this->Flash->render(); ?>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h1 class="page-header">User List</h1>
			</div>
			<div class="col-lg-6">
				<?php echo $this->Html->link('Add New User',array('action' => 'add'),array('class' => 'btn btn-primary','style' => array('float: right; margin-top: 58px;'))); ?>
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
									<th scope="col"><?= $this->Paginator->sort('username') ?></th>
									<th scope="col"><?= $this->Paginator->sort('email') ?></th>
									<th scope="col"><?= $this->Paginator->sort('created') ?></th>
									<th scope="col" class="actions"><?= __('Actions') ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($userList as $user): ?>
								<tr>
									<td><?= $this->Number->format($user->id) ?></td>
									<td><?= h($user->username) ?></td>
									<td><?= h($user->email) ?></td>
									<td><?= h($user->created) ?></td>
									<td class="actions">
										<?php  //$this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class' => 'btn btn-info']) ?>
										<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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