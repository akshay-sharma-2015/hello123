<?php  use Cake\Core\Configure; ?><!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo $this->Url->build('/admin/dashboard') ?>"><b><?php echo Configure::read('Site.title'); ?></b></a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">
		 <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
				<li><a href="<?php echo $this->Url->build('/admin/edit_profile'); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
				</li>
				<li class="divider"></li>
				<li><a href="<?php echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'logout')); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
			</ul>
			<!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	</ul>
	<!-- /.navbar-top-links -->
	<?php $plugin		=	$this->request->params['plugin']; ?>
	<?php $controller	=	trim($this->request->params['controller']); ?>
	<?php $action		=	$this->request->params['action']; ?>
	<?php $slug			=	isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : ''; ?>
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a class="<?php echo ($controller == 'Users' && $action == 'dashboard') ? 'active' : ''; ?>" href="<?php echo $this->Url->build('/admin/dashboard'); ?>"><i class="fa  <?php echo ($controller == 'Users' && $action == 'dashboard') ? 'fa-cog fa-spin' : 'fa-dashboard'; ?> fa-fw"></i> Dashboard</a>
				</li>							
				<li>
					<a class="<?php echo ($controller == 'Users' && $action == 'index') ? 'active' : ''; ?>" href="<?php echo $this->Url->build('/admin/users/index'); ?>"><i class="fa  <?php echo ($controller == 'Users' && $action == 'index') ? 'fa-cog fa-spin' : 'fa-user'; ?> fa-fw"></i> User Management</a>
				</li><?php /*						
				<li>
					<a class="<?php echo ($controller == 'Groups' && $action == 'index') ? 'active' : ''; ?>" href="<?php echo $this->Url->build('/admin/groups/index'); ?>"><i class="fa  <?php echo ($controller == 'Groups' && $action == 'index') ? 'fa-cog fa-spin' : 'fa-users'; ?> fa-fw"></i> Group Management</a>
				</li>*/ ?>							
				<li class="<?php echo ($plugin == 'emailtemplate' || $slug == 'Site' || $slug == 'FollowUsOn'|| $plugin == 'slider'|| $plugin == 'cms') ? 'active' : ''; ?>">
					<a class="bbt" href="#"><i class="fa <?php echo ($plugin == 'emailtemplate' || $slug == 'Site' || $slug == 'FollowUsOn'|| $plugin == 'slider'|| $plugin == 'cms') ? 'fa-cog fa-spin' : 'fa-cogs'; ?>  fa-fw"></i> Management<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level <?php echo ($plugin == 'emailtemplate' || $slug == 'Site'|| $slug == 'FollowUsOn'|| $plugin == 'slider'|| $plugin == 'cms') ? 'collapse in' : 'collapse'; ?>">
						 <li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'setting','controller' => 'settings','action' => 'view','Site')); ?>"> Site Settings</a>
						</li>
						<?php /* 
						 <li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'setting','controller' => 'settings','action' => 'view','Date')); ?>"> Date Format</a>
						</li>
						<li>
							 <a  href="<?php echo $this->Url->build('/admin/email_template/email-templates/index'); ?>"> Email Templates</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'setting','controller' => 'settings','action' => 'view','FollowUsOn')); ?>"> Follow Us On</a>
						</li> 
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'cms','controller' => 'cms-pages','action' => 'index')); ?>"> Cms Pages</a>
						</li>*/?>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'cms','controller' => 'cms-pages','action' => 'index')); ?>"> Cms Pages</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'block','controller' => 'blocks','action' => 'index')); ?>"> Blocks</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'news','controller' => 'news','action' => 'index')); ?>"> Blogs</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'master','controller' => 'masters','action' => 'index','blog_category')); ?>"> Blogs Category</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build('/admin/master/masters/index/blog_user'); ?>"> Blogs Users</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'promos','controller' => 'promos','action' => 'index')); ?>"> Promos</a>
						</li>
						<?php /*
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'contact','controller' => 'contacts','action' => 'index')); ?>"> Contact Us</a>
						</li>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'slider','controller' => 'sliders','action' => 'index')); ?>">Homepage slider</a>
						</li>*/?>
					</ul>
					<!-- /.nav-second-level -->
				</li><?php /*
				<li class="<?php echo ($plugin == 'textsetting') ? 'active' : ''; ?>">
					<a class="bbt" href="#"><i class="fa <?php echo ($plugin == 'textsetting') ? 'fa-cog fa-spin' : 'fa-language'; ?>  fa-fw"></i> Language Setting<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level <?php echo ($plugin == 'textsetting') ? 'collapse in' : 'collapse'; ?>">	<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'textsetting','controller' => 'languages','action' => 'index')); ?>">Languages</a>
						</li> 
						 <li>
							<a href="<?php echo $this->Url->build('/admin/textsetting/text-settings/index'); ?>">Language Translate</a>
						</li>
					</ul> 
				</li>* ?>
				<li class="<?php echo ($plugin == 'city_manager') ? 'active' : ''; ?>">
					<a class="bbt" href="#"><i class="fa <?php echo ($plugin == 'city_manager') ? 'fa-cog fa-spin' : 'fa-map-marker'; ?>  fa-fw"></i>Country Manager<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level <?php echo ($plugin == 'city_manager') ? 'collapse in' : 'collapse'; ?>">	
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'city_manager','controller' => 'country','action' => 'index')); ?>">Country</a>
						</li> <?php /*
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'city_manager','controller' => 'state','action' => 'index')); ?>">State</a>
						</li> *?>
						<li>
							<a href="<?php echo $this->Url->build(array('plugin' => 'city_manager','controller' => 'city','action' => 'index')); ?>">City</a>
						</li><?php /*
						<li>
							<a href="<?php echo $this->Url->build('/admin/city_manager/city-details/index'); ?>">Featured City</a>
						</li>*?>
					</ul> 
				</li>*/ ?>
				<li>
					<a class="<?php echo ($controller == 'country' && $action == 'index') ? 'active' : ''; ?>" href="<?php echo $this->Url->build(array('plugin' => 'city_manager','controller' => 'country','action' => 'index')); ?>"><i class="fa  <?php echo ($controller == 'country' && $action == 'index') ? 'fa-cog fa-spin' : 'fa-user'; ?> fa-fw"></i>Country</a>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>
