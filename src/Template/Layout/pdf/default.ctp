<?php 
use Cake\Core\Configure;
$here = $this->request->here();
$canonical = $this->Url->build($here, true);
 $plugin		=	$this->request->params['plugin'];
 $controller	=	$this->request->params['controller'];
 $action		=	$this->request->params['action'];  ?>
<!DOCTYPE html>
<html lang="<?php echo (!empty($Defaultlanguage)) ? $Defaultlanguage :'en'; ?>" manifest="<?php //echo $this->Url->build(array('plugin' => '','controller' => 'users','action' => 'cache')); ?>">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo isset($pageTitle) ? $pageTitle : __('title.homepage'); ?></title>
<?php echo $this->Html->css(array('main.css','fonts.css','font-awesome.css','animate.css','pnotify.custom.min.css'/* ,'autocomplete.css' */),array('block' =>'css'));
	echo $this->fetch('meta'); 
	echo $this->fetch('css'); ?>
</head>
<body>
  <div class="mainWrapper">
	<?php //echo $this->element('header_menu_2'); ?>
	<?php echo $this->fetch('content'); ?>
</div>
</body>
</html>