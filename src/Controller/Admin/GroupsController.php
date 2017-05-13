<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Acl\AclExtras;

use Acl\Shell\AclExtrasShell;
use Acl\Shell\AclShell;

/* use Cake\Utility\Inflector;
use Cake\Core\App;
use Cake\Core\Plugin;
use Cake\Filesystem\Folder;
use Cake\Utility\Hash;
use Cake\Core\Configure;
use Cake\Controller\Controller; */

// use Cake\Network\Session\DatabaseSession;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
				// $this->Auth->allow();

	} 

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$group = $this->Groups->newEntity();
		if ($this->request->is(['patch', 'post', 'put'])) {
			 $group = $this->Groups->patchEntity($group, $this->request->data);
			 if ($this->Groups->save($group)) {
				$id			=	$group->id;
				$module		=	$this->request->data['module'];
				
				$this->Acl->deny($group, 'controllers');
				foreach($module as $controllerName => $action){
					if(is_array($action)){
						foreach($action as $key1 => $val1){
							if(is_array($val1)){
								foreach($val1 as $key2 => $val2){
									if(is_array($val2)){
										foreach($val2 as $key3 => $val3){
											if(is_array($val3)){
												foreach($val3 as $key4 => $val4){													
													if($val4 == 1){
														$group->id 			= 	$id;
														$this->Acl->allow($group, $controllerName.'/'.$key1.'/'.$key2.'/'.$key3.'/'.$key4);
													}
												}
											}else{
												if($val3 == 1){
													$group->id 			= 	$id;
													$this->Acl->allow($group, $controllerName.'/'.$key1.'/'.$key2.'/'.$key3);
												}
											}
										}
									}else{
										if($val2 == 1){
											$group->id 			= 	$id;
											$this->Acl->allow($group, $controllerName.'/'.$key1.'/'.$key2);
										}
									}
								}
							}else{
								if($val1 == 1){
									$group->id 			= 	$id;
									$this->Acl->allow($group, $controllerName.'/'.$key1);
								}
							}
						}
					}
				}
				
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
		
		// ini_set('max_execution_time', 0);
		// ini_set('memory_limit', '2048M');
		// $job = new AclExtrasShell();		
		// $job->startup();
		// $job->acoSync();
		        $this->AclExtras = new AclExtras();
				 $this->AclExtras->startup();
		        $this->AclExtras->acoSync();

		
        $class	=	'Aco';
        $alias = $this->Acl->Aco->alias();
        $array = $this->Acl->{$class}->find('threaded', ['order' => $alias . '.lft ASC'])->toArray();
      
		
		/* 
		
		$plugins 	=	 Plugin::loaded();
		
		$this->request->session()->delete('ddd');		
		foreach($plugins as $name){
			$this->getControllerList($name,'admin');
		}
		$this->getControllerList(null,'admin'); */
		// $array		=	$this->request->session()->read('ddd');
        $this->set(compact('group','array'));
        $this->set('_serialize', ['group']);
	}
	
	
    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
		// pr($group);
        if ($this->request->is(['patch', 'post', 'put'])) {
			 $group = $this->Groups->patchEntity($group, $this->request->data);
			 if ($this->Groups->save($group)) {
				$id			=	$group->id;
				$module		=	$this->request->data['module'];
				
				$this->Acl->deny($group, 'controllers');
				foreach($module as $controllerName => $action){
					if(is_array($action)){
						foreach($action as $key1 => $val1){
							if(is_array($val1)){
								foreach($val1 as $key2 => $val2){
									if(is_array($val2)){
										foreach($val2 as $key3 => $val3){
											if(is_array($val3)){
												foreach($val3 as $key4 => $val4){													
													if($val4 == 1){
														$group->id 			= 	$id;
														$this->Acl->allow($group, $controllerName.'/'.$key1.'/'.$key2.'/'.$key3.'/'.$key4);
													}
												}
											}else{
												if($val3 == 1){
													$group->id 			= 	$id;
													$this->Acl->allow($group, $controllerName.'/'.$key1.'/'.$key2.'/'.$key3);
												}
											}
										}
									}else{
										if($val2 == 1){
											$group->id 			= 	$id;
											$this->Acl->allow($group, $controllerName.'/'.$key1.'/'.$key2);
										}
									}
								}
							}else{
								if($val1 == 1){
									$group->id 			= 	$id;
									$this->Acl->allow($group, $controllerName.'/'.$key1);
								}
							}
						}
					}
				}
				
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
		
		$class	=	'Aco';
        $alias = $this->Acl->Aco->alias();
        $array = $this->Acl->{$class}->find('threaded', ['order' => $alias . '.lft ASC'])->toArray();
		
		
		$this->set(compact('group','array'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	 /**
     * Get a list of controllers in the app and plugins.
     *
     * Returns an array of path => import notation.
     *
     * @param string $plugin Name of plugin to get controllers for
     * @param string $prefix Name of prefix to get controllers for
     * @return array
     */
    public function getControllerList($plugin = null, $prefix = null)
    {
        if (!$plugin) {
            $path = App::path('Controller' . (empty($prefix) ? '' : DS . Inflector::camelize($prefix)));
            $dir = new Folder($path[0]);
            $controllers = $dir->find('.*Controller\.php');
        } else {
            $path = App::path('Controller' . (empty($prefix) ? '' : DS . Inflector::camelize($prefix)), $plugin);
            $dir = new Folder($path[0]);
            $controllers = $dir->find('.*Controller\.php');
        }
		$pluginPath = $this->_pluginAlias($plugin);
		$a		=	'';
		foreach ($controllers as $controller) {
            $tmp = explode('/', $controller);
            $controllerName = str_replace('Controller.php', '', array_pop($tmp));
            if ($controllerName == 'App') {
                continue;
            }
            $controllersNames[] = $controllerName;
            $path = [
                $this->rootNode,
                $pluginPath,
                $prefix,
                $controllerName
            ];
            $path = implode('/', Hash::filter($path));
            $this->request->session()->write('ddd.'.$controllerName,$this->_checkMethods($controller, $controllerName, '', $pluginPath, $prefix));
        }
    }
	
	
	 /**
     * Get a list of registered callback methods
     *
     * @param string $className The class to reflect on.
     * @param string $pluginPath The plugin path.
     * @param string $prefixPath The prefix path.
     * @return array
     */
    protected function _getCallbacks($className, $pluginPath = null, $prefixPath = null)
    {
        $callbacks = [];
        $namespace = $this->_getNamespace($className, $pluginPath, $prefixPath);
        $reflection = new \ReflectionClass($namespace);
        if ($reflection->isAbstract()) {
            return $callbacks;
        }
        try {
            $method = $reflection->getMethod('implementedEvents');
        } catch (ReflectionException $e) {
            return $callbacks;
        }
        if (version_compare(phpversion(), '5.4', '>=')) {
            $object = $reflection->newInstanceWithoutConstructor();
        } else {
            $object = unserialize(
                sprintf('O:%d:"%s":0:{}', strlen($className), $className)
            );
        }
        $implementedEvents = $method->invoke($object);
        foreach ($implementedEvents as $event => $callable) {
            if (is_string($callable)) {
                $callbacks[] = $callable;
            }
            if (is_array($callable) && isset($callable['callable'])) {
                $callbacks[] = $callable['callable'];
            }
        }

        return $callbacks;
    }
	
	 /**
     * Check and Add/delete controller Methods
     *
     * @param string $className The classname to check
     * @param string $controllerName The controller name
     * @param array $node The node to check.
     * @param string $pluginPath The plugin path to use.
     * @param string $prefixPath The prefix path to use.
     * @return bool
     */
    protected function _checkMethods($className, $controllerName, $node, $pluginPath = null, $prefixPath = null)
    {
        $excludes = $this->_getCallbacks($className, $pluginPath, $prefixPath);
        $baseMethods = get_class_methods(new Controller);

        $namespace = $this->_getNamespace($className, $pluginPath, $prefixPath);
        $methods = get_class_methods(new $namespace);
        if ($methods == null) {
            $this->err(__d('cake_acl', 'Unable to get methods for {0}', $className));

            return false;
        }
        $actions = array_diff($methods, $baseMethods);
        $actions = array_diff($actions, $excludes);
        foreach ($actions as $key => $action) {
            if (strpos($action, '_', 0) === 0) {
                continue;
            }
            $path = [
                $this->rootNode,
                $pluginPath,
                $prefixPath,
                $controllerName,
                $action
            ];
            $path = implode('/', Hash::filter($path));
            $actions[$key] = $action;
        }
        return $actions;
    }
	
	/**
     * Returns the aliased name for the plugin (Needed in order to correctly handle nested plugins)
     *
     * @param string $plugin The name of the plugin to alias
     * @return string
     */
    protected function _pluginAlias($plugin)
    {
        return preg_replace('/\//', '\\', Inflector::camelize($plugin));
    }
	
	/**
     * Get the namespace for a given class.
     *
     * @param string $className The class you want a namespace for.
     * @param string $pluginPath The plugin path.
     * @param string $prefixPath The prefix path.
     * @return string
     */
    protected function _getNamespace($className, $pluginPath = null, $prefixPath = null)
    {
        $namespace = preg_replace('/(.*)Controller\//', '', $className);
        $namespace = preg_replace('/\//', '\\', $namespace);
        $namespace = preg_replace('/\.php/', '', $namespace);
        $prefixPath = preg_replace('/\//', '\\', Inflector::camelize($prefixPath));
        if (!$pluginPath) {
            $rootNamespace = Configure::read('App.namespace');
        } else {
            $rootNamespace = preg_replace('/\//', '\\', $pluginPath);
        }
        $namespace = [
            $rootNamespace,
            'Controller',
            $prefixPath,
            $namespace
        ];

        return implode('\\', Hash::filter($namespace));
    }
}
