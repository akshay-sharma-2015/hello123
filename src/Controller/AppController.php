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
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Session\DatabaseSession;
use Cake\Cache\Cache;
use Cake\I18n\I18n;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use App\Controller\Component\Sanitize;

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
		 // pr($this->request);die;
		
		$scope  	=     array('Users.is_deleted' => 0,'Users.role' => 'front');
        $this->loadComponent('Flash');
		$this->loadComponent('RequestHandler');
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
			]
        ]);
		
		
		$this->set('isMobile',$this->RequestHandler->isMobile());
	}

    public function beforeFilter(Event $event)
    {
		$userRole	=	$this->Auth->user('role');
		if(isset($userRole) && $userRole == 'admin'){
			$session = $this->request->session();
			$session->destroy();
		}
		// pr($this->request->params);die;
		$languageList		=	$this->request->session()->read('Config.languageListData');
		if(isset($this->request->params['language'])){
			$Defaultlanguage	=	$this->request->params['language'];			
			if(!isset($languageList[$Defaultlanguage])){
				$Defaultlanguage	=	'';
			}
		}else{
			$Defaultlanguage	=	'en';		
		}
		
		if(empty($Defaultlanguage) || empty($languageList)){
			$subStr					=	'';
			$browserLang		=	$this->request->acceptLanguage();
			if(isset($browserLang[0])){
				$subStr				=	$browserLang[0];
				if($subStr == 'nl'){
					$subStr	=	'de';
				}
			}
			if (($languageListData = Cache::read('languageListData')) === false) {
				$this->loadModel('Languages');
				$languageListData		=	$this->Languages->find('all',['conditions' => ['is_active' => 1]])->toList();
				Cache::write('languageListData', $languageListData);
			}
			
			foreach($languageListData as $list){
				if($list->is_default == 1){
					$Defaultlanguage		=	$list->code;
				}
				if($list->code == $subStr){
					$Defaultlanguage		=	$list->code;
				}
				$languageList[$list->code]	=	$list->name;	
			}			
			$this->request->session()->write('Config.language',$Defaultlanguage);
			$this->request->session()->write('Config.languageListData',$languageList);
		}else{				
			$this->request->session()->write('Config.language',$Defaultlanguage);
			$this->request->session()->write('Config.languageListData',$languageList);
		}
		
		I18n::locale($Defaultlanguage);		
		$this->set('Defaultlanguage', $Defaultlanguage);		
		$this->set('languageList', $languageList);
		
		
		#### Remeber me ####
		if(!$this->Auth->User('id') && $this->Cookie->read('login')){
			$user	=	$this->Cookie->read('login');
			$this->request->data['email']		=	$user['email'];
			$this->request->data['password']	=	$user['password'];
			
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$data['success']	=	true;
				$this->Cookie->configKey('login', 'expires', '+3 months');
				$this->Cookie->write('login',json_encode($this->request->data));
			}
		}
		$this->set('isMobile',$this->RequestHandler->isMobile());
	
    }
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {	
		
    }
	public function afterFilter(Event $event)
    {
		// pr('afterFilter');
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
	
	function json_error($errors){
		$data	=	'';
		foreach($errors as $key => $err){
			$val 		=	array_values( $err);
			$data[$key]	=	$val[0];
		}
		return $data;
	}
		
	function _sendMail( $to, $from, $replyTo, $subject, $element,
        $parsingParams = array(),$attachments ="", $sendAs = 'html', $bcc = array()) {
			
		$email = new Email('default');	
		if ($attachments!="") {
			$email->attachments([$attachments]);		
		}
		foreach ($parsingParams as $key => $value) {
		   $email->viewVars(['key' => $value]);
		}
		
		$email->from(['eipl@eipldevelopers.com' => 'eipl@eipldevelopers.com'])
		->to($to)
		->subject($subject)
		->emailFormat('html')
		->send($parsingParams['message']);
	}
	
	
}
