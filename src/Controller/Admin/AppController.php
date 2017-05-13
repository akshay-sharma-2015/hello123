<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Session\DatabaseSession;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public $components = [
		'Acl' => [
			'className' => 'Acl.Acl'
		]
	];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
	 public function initialize()
    {	
		
		$scope  	=     array('Users.is_deleted' => 0,'Users.role' => ADMIN_USER);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
			'authorize' => [
				'Acl.Actions' => ['actionPath' => 'controllers/']
			],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'username','password' => 'password'],
					'scope' => $scope
				]
			],
			'authError' => 'You are not authorized to access that location.',
			'flash' => [
				'element' => 'error'
			],
			'storage' => ['className' => 'Session', 'key' => 'Auth.Admin']
        ]);
	}

	 public function change_file_name($fileName= null) {
		
        $exFileName     = strtolower(substr($fileName,strrpos($fileName,".") + 1));
        $sampleFileName = str_replace('.'.$exFileName,'', $fileName);
        $name           = str_replace(' ', '_',$sampleFileName);
		
		$name			 = substr($name, 0, 250);
		
        $fileRename     = $name.'.'.$exFileName;
		
        return $fileRename;
    }//end change_file_name()
    
	public function moveUploadedFile($filename , $destination) {
        if (move_uploaded_file($filename, $destination)) {
            return true;
        }
        return false;
    }//end moveUploadedFile()
	
	function getLnt($address){
		if(!empty($address)){
			$key 			= 	'';
			$url  			= 	"https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false&key=".$key;
			$result_string  = 	file_get_contents($url);
			$result 		= 	json_decode($result_string, true);
			
			$location		=	isset($result['results']['0']['geometry']['location']) ? $result['results']['0']['geometry']['location'] : '';
			return $location;
		}
	}
	
	public function copyUploadedFile($filename , $destination) {
        if (copy($filename, $destination)) {
            return true;
        }
        return false;
    }//end moveUploadedFile()
}
