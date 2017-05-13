<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Utility\Sanitize;
use Cake\View\View;
use Cake\Core\Configure;
use Cake\Cache\Cache;
use App\Model\Table\TripDetailsTable;
use Cake\Network\Http\Client;

class UsersController extends AppController
{
	
	public function initialize()
    {
      parent::initialize();
      $this->loadComponent('Captcha');
      $this->loadComponent('Slug');
	      $this->loadComponent('Csrf');
	      $this->loadComponent('Cookie');

	  $this->Auth->allow();
    }
	
	public function beforeFilter(Event $event)
	{
		$this->eventManager()->off($this->Csrf);
	}
	
	public function sanitizeData($data) {
        return Sanitize::clean($data, array('encode' => true, 'escape' => false,'nl2br' =>true));
   
    }
	function captcha()	{
        $this->autoRender = false;
		 $this->viewBuilder()->layout('ajax');
        $this->Captcha->create();
	}
	
    public function index($type = 'plan'){
		
		$this->request->session()->write('type',$type);
		if($this->Auth->user()){
			return $this->redirect(array('action' => 'dashboard'));
		}
		if($type == 'gotologin'){
			if(isset($this->request->query['slug'])){
				$this->request->session()->write('slugtrip',$this->request->query['slug']);
			}
		}
		
		$timeKey	=	time();
		$this->set("timeKey",$timeKey);
		$this->set("isEditable",true);
	}
 
	public function blog(){
		 
		 
	}
	public function promos(){
		 
		 
	}
	public function about(){
		 
		 
	}

	
	function signup(){
	 	if($this->Auth->user()){
			$data['success']	=	true;
			echo json_encode($data);
			exit;
		}  
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			 
			$uData		=	array();
			$uData		=	$this->request->data; 
			$user = $this->{$this->modelClass}->patchEntity(
											$user, 
											$uData, 
											[ 'validate' => 'signUpForm']
										);
			if($user->errors()){
				$data['errors']		=	$this->json_error($user->errors());
				$data['success']	=	false;
				$data['type']		=	'error';
				$data['message']	=	'Error';
				echo json_encode($data);
				exit;
			}
			// $this->loadModel('Users');
			if($this->Users->save($user)){
				
				$data['message']	=	__('Your account has been created successfully.Please login with username or password.',true);
				$data['success']	=	true;
				$data['type']		=	'success';
				echo json_encode($data);
				
				exit;
			}else{
				$data['errors']		=	$this->json_error(array('username'=>'Username already exist !'));
				$data['success']	=	false;
				$data['type']		=	'error';
				$data['message']	=	'Error';
				echo json_encode($data);
				exit;
			}
			
			// $user = $this->Auth->identify();
			// $this->Auth->setUser($user);
			
        }
		exit;
	}
	
	function tripdetails(){	 	 
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			//$this->request->data 	=	$this->sanitizeData($this->request->data);
			
			$uData		=	array();
			$uData		=	$this->request->data;
			
			
			$user = $this->{$this->modelClass}->patchEntity(
											$user, 
											$uData, 
											[ 'validate' => 'tripDetailsForm']
										);
			if($user->errors()){
				$data['errors']		=	$this->json_error($user->errors());
				$data['success']	=	false;
				$data['type']		=	'error';
				$data['message']	=	'Error';
				echo json_encode($data);
				exit;
			}
			 
			$user->user_id	=	$this->Auth->user('id');
			$userCurrencyCode=	$this->request->session()->read('Auth.User.country.code');
			//pr($user); 
			 
			$this->loadModel('CityManager.Country');
			
			$country 			= $this->Country->find('all')->where(['Country.id'=>$user->country_id])->first();
			
			
			$http       		=  new Client();        
			$url				=	"https://www.google.com/finance/converter?a=1&from=$country->code&to=$userCurrencyCode";
			$response 			=  $http->get($url);
			$response 			=  $response->body();

			preg_match("/<span class=bld>(.*)<\/span>/",$response, $converted);
			if(isset($converted[1])){
				$converted		 	= preg_replace("/[^0-9.]/", "", $converted[1]);
				$exchangeRate		= round($converted, 3);
				$user->exchange_rate= $exchangeRate;
			}
			
			$this->loadModel('TripDetails');
			
			$results	=	$this->TripDetails->find('all')->where([
				'tripdate' => $this->request->data['tripdate'],
				'category' => $this->request->data['category'],
				'user_id' => $this->Auth->user('id')
			])->first();

			if(!empty($results->id)){
				$user->id	=	$results->id;
			}
			$this->TripDetails->save($user);
			
			$users	=	$this->Users->find('all')->contain(['Country'])->where(['Users.id'=>$this->Auth->user('id')])->first();
			$this->request->session()->write('Auth.User', $users->toArray());
			
			$data['message']	=	__('Your Trip Detail has been Saved successfully.',true);
			$data['success']	=	true;
			$data['type']		=	'success';
			echo json_encode($data);
            
			exit;
        }
		exit;
	}
	
	/* Action of All of Us */
	function allofus() {
	
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			//$this->request->data 	=	$this->sanitizeData($this->request->data);
	
			$uData		=	array();
			$uData		=	$this->request->data;
			
			 
		/*	$user = $this->{$this->modelClass}->patchEntity(
											$user, 
											$uData, 
											[ 'validate' => 'tripDetailsForm']
										); */
			if($user->errors()){
				$data['errors']		=	$this->json_error($user->errors());
				$data['success']	=	false;
				$data['type']		=	'error';
				$data['message']	=	'Error';
				echo json_encode($data);
				exit;
			}
 			$this->loadModel('TripDetails');
			$users	=	 $this->TripDetails->find('all')->where(['TripDetails.place'=>$this->request->data->search])->toArray();
			//$this->request->session()->write('Auth.User', $users->toArray());
			//pr($users);
			 
		
			
			//$this->TripDetails->save($user);
			
		 
			
			$data['message']	=	__('Searching...',true);
			$data['success']	=	true;
			$data['type']		=	'success';
			echo json_encode($data);
            
			exit;
        }
		exit;
	
	
	
	}
	function dashboard(){
		$this->set('authData',$this->Auth->user());
		$this->set('timeKey',time());
		$this->set('isEditable',true);
		
		// $this->loadModel("FutureTrips");
							// $this->FutureTrips->updateAll(['user_id' => $this->Auth->user('id')],['slug' => 'akshay']);
	}
	
	function login(){
		$this->viewBuilder()->layout('ajax');
		if($this->Auth->user()){
			$data['success']	=	true;
			echo json_encode($data);
				exit;
		}
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$users	=	$this->Users->find('all')->contain(['Country'])->where(['Users.id'=>$this->Auth->user('id')])->first();
				$this->request->session()->write('Auth.User', $users->toArray());
				
				$data['success']	=	true;
				/* if($this->request->data['remember_me']){
					$this->Cookie->configKey('login', 'expires', '+3 months');
					$this->Cookie->write('login',json_encode($this->request->data));
				} */
				
				if($this->request->session()->check('slugtrip')){
					$slugtrip	=	$this->request->session()->read('slugtrip');
					
					if(!empty($slugtrip)){
						$this->loadModel("FutureTrips");
						$allTrips 	=	$this->FutureTrips->find("all")->where(["slug" => $slugtrip])->first();
						 
						if($allTrips->user_id == $allTrips->uuid){
							$this->FutureTrips->updateAll(['user_id' => $this->Auth->user('id')],['slug' => $slugtrip]);
						}
					}
					$this->request->session()->delete('slugtrip');
				}
			}else{
				$data['errors']		=	array('error' => __('Your username or password is incorrect.',true));
				$data['success']	=	false;
			}
		}else{
			return $this->redirect(array('action' => 'index'));
		}
		$this->set('data', $data);
	}
	
	function logout(){
		if($this->Cookie->check('login')){
			$this->Cookie->delete('login');			
		}
		return $this->redirect($this->Auth->logout());
	}
	
	function cache(){
					echo 'CACHE MANIFEST
						# 2015-22-02 v5
						main.css
						fonts.css
						font-awesome.css
						animate.css
						pnotify.custom.min.css
						jquery.min.js
						jquery.IE.js
						jquery-ui.js
						custom.js
						pnotify.custom.min.js
						jquery.form.min.js
						
						NETWORK:
						*';
					exit;
	}
	
  function uploadImage(){ 
				  $this->loadModel('UploadImages');
				  $user = $this->UploadImages->newEntity();
				  if ($this->request->is('post')) {
   
						$user = $this->{$this->modelClass}->patchEntity(
								$user, 
								$this->request->data, 
								[ 'validate' => 'uploadImageForm']
							   );
    
						if($user->errors()){
									 $data['errors']  = $this->json_error($user->errors());
									 $data['success'] = false;
									 echo json_encode($data);
									 exit;
						}
    
					$thisData = $this->request->data;
					if(!empty($thisData['image']['name'])){
					 $file_name               =     $thisData['image']['name'];
					 $tmp_name                =     $thisData['image']['tmp_name'];
					 $return_file_name        =     time().$this->change_file_name($file_name);    
						 if($this->moveUploadedFile($tmp_name, AMENITIES_ROOT_PATH.$return_file_name)){
   
								  $data['message'] = __('Image uploaded successfully',true);
								  $data['success'] = true;
								  $data['name']  =  $return_file_name;
								  $data['src']  =  WEBSITE_URL.'image.php?width=164px&height=164px&image='.AMENITIES_IMG_URL.$return_file_name;
								  
								  $UpdateData  =	$this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
								  // pr($UpdateData);
									$UpdateData->profile_image = $return_file_name;
								 $this->Users->save($UpdateData);
		 
								$users	=	$this->Users->find('all')->contain(['Country'])->where(['Users.id'=>$this->Auth->user('id')])->first();
										$this->request->session()->write('Auth.User', $users->toArray());
										
										
								  echo json_encode($data);

								exit;
					 	}
  				  }
   exit;
 	 		}
			
 	}
	
	
	/* Forget Password Function */
	public function forgotPassword()
	{	 
		$user = $this->Users->newEntity();

		if ($this->request->is('post')) {
				$user = $this->{$this->modelClass}->patchEntity(
				$user,
				$this->request->data,
				[ 'validate' => 'forgotPasswordForm']
				);
				if($user->errors()){
					$data['errors'] = $this->json_error($user->errors());
					$data['success'] = false;
					echo json_encode($data);
					exit;
				}
				$email = $this->request->data['email'];
				$res = $this->{$this->modelClass}->find('all')->where(['email' => $email])->first();
				if(empty($res)){
					$data['errors'] = array('error' => __('This email does not exists',true));
					$data['success'] = false;
					echo json_encode($data);
					exit;
				}

				$res = $this->{$this->modelClass}->patchEntity($res, $this->request->data);
				$res->forgot_password_string = $forgot_password_string = md5($res->email.$res->id);

				$this->{$this->modelClass}->save($res);
				// pr($res);
				$url = WEBSITE_URL.'users/reset_password/'.$forgot_password_string;
				$forgot_password_string = 'Click here';
				$full_name = $res->full_name;

				$action = 'forgot_password';
				$settingsEmail = Configure::read('Site.email');
				$settingstitle = Configure::read('Site.title');

				$this->loadModel('Actions');
				$cons = $this->Actions->find('all')->where(array('action' => $action))->first()->toArray();

				$this->loadModel('EmailTemplates');
				$emailTemplate = $this->EmailTemplates->find('all')->where(array('action_id' => $cons['id']))->first()->toArray();


				$cons = explode(",",$cons['constant']);
				$constants = array();
				foreach($cons as $key=>$val){
					$constants[] = '{'.$val.'}';
				}

				$from_email = $settingsEmail;
				$from_name = $settingstitle;

				$from = $from_name . "<" . $from_email . ">";
				$replyTo = "";

				$subject = $emailTemplate['subject'];
				$rep_Array = array($full_name,$forgot_password_string,$url);
				$message = str_replace($constants, $rep_Array, $emailTemplate['body']);

				$to = $res->email;
				// pr($message);
				$this->_sendMail($to, $from, $replyTo, $subject, 'sendmail', array('message' => $message), "", 'html', $bcc = array());


				$this->Flash->success(__('forgot_password.success_message.',true));
				$data['success'] = true;
				echo json_encode($data);
				
		}
		exit;
	}
	/* Reset Password  Function */
	public function resetPassword($forgot_password_string = '') {
	
		if($forgot_password_string == ''){
			$this->Flash->error(__('This url has been used'));
			return $this->redirect(array('action' => 'index'));
			exit;
		}

		$reset = $this->{$this->modelClass}->find('all')->where(array('forgot_password_string' => $forgot_password_string))->first();
		if($reset == NULL){
			$this->Flash->error(__('This url has been used'));
			return $this->redirect(array('action' => 'index'));
			exit;
		}
		$full_name = $reset->full_name;
		$to = $reset->email;
		if ($this->request->is(['patch', 'post', 'put'])) {
			$reset = $this->{$this->modelClass}->patchEntity(
			$reset,
			$this->request->data,
			[ 'validate' => 'signUpForm']
			);
			if($reset->errors()){
				$data['errors'] = $this->json_error($reset->errors());
				$data['success'] = false;
				echo json_encode($data);
				exit;
			}

			$reset->forgot_password_string = '';
			$this->{$this->modelClass}->save($reset);

			$action = 'reset_password';
			$settingsEmail = Configure::read('Site.email');
			$settingstitle = Configure::read('Site.title');

			$this->loadModel('Actions');
			$cons = $this->Actions->find('all')->where(array('action' => $action))->first()->toArray();

			$this->loadModel('EmailTemplates');
			$emailTemplate = $this->EmailTemplates->find('all')->where(array('action_id' => $cons['id']))->first()->toArray();


			$cons = explode(",",$cons['constant']);
			$constants = array();
			foreach($cons as $key=>$val){
				$constants[] = '{'.$val.'}';
			}

			$from_email = $settingsEmail;
			$from_name = $settingstitle;

			$from = $from_name . "<" . $from_email . ">";
			$replyTo = "";

			$subject = $emailTemplate['subject'];

			$rep_Array = array($full_name);
			$message = str_replace($constants, $rep_Array, $emailTemplate['body']);
 
			//$this->_sendMail($to, $from, $replyTo, $subject, 'sendmail', array('message' => $message), "", 'html', $bcc = array());

			$this->Flash->success(__('reset_password.success_message.',true));

			$data['success'] = true;
			echo json_encode($data);
			exit;

		}
		$this->set(compact('reset','forgot_password_string'));
	}
	/* Edit  Profile Function */
	public function editProfile()
	{
		if ($this->request->is('post')) {
			
			$uData		=	array();
			$uData		=	$this->request->data;
		
			$UpdateData  = $this->Users->find('all')->where([
																'Users.id' => $this->Auth->user('id')
														    ])->first();
															 
			$UpdateData->$uData['col']=$uData['val'];
			//pr($UpdateData);
			$this->Users->save($UpdateData);
			$users	=	$this->Users->find('all')->contain(['Country'])->where(['Users.id'=>$this->Auth->user('id')])->first();
		    $this->request->session()->write('Auth.User', $users->toArray());
		}
		exit;
	}
	
	/* Public  Profile Function */
	public function publicProfile($username="")
	{ 
		if($this->request->session()->read('Auth.User')){
			   
			$users  = $this->Users->find('all')->where(['Users.username' => $username])->contain('Country')->first();
			if(empty($users))
			{
				$this->Flash->error(__('User not exist'));
				return $this->redirect(array('action' => 'dashboard'));
				exit;	
				 
			}
			else{
			$this->set('userdata',$users->toArray());
			}
		}else{
		
		
				return $this->redirect(array('action' => 'dashboard'));}
		 
	}
	public function userAutocomplete(){
	  if(empty($this->request->query['q'])){
	   exit;
	  }
	  $query   =  $this->request->query['q'];   
	  
	  $this->loadModel('CityManager.Country');
	  $results =  $this->Country->find('list');
	  
	  $results->where([
		'name LIKE' => '%'.$query.'%'
	  ])->limit(6);
	  
	  
		
	$newArray	=	'';
	foreach($results as $key => $val1){			
		$newArray[]		=	array('id' => $key,'name' => $val1);		
	}
	  echo json_encode($newArray);
	  exit;  
	 }
	 public function futureTrip(){
	 	
		$this->loadModel('FutureTrips');
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			 
			$uData		=	array();
			$uData		=	$this->request->data; 
			$user = $this->{$this->modelClass}->patchEntity(
											$user, 
											$uData, 
											[ 'validate' => 'futureTripForm']
										);
			if($user->errors()){
				$data['errors']		=	$this->json_error($user->errors());
				$data['success']	=	false;
				$data['type']		=	'error';
				$data['message']	=	'Error';
				echo json_encode($data);
				exit;
			}
			// $this->loadModel('Users');
			$user->user_id		=	$this->Auth->user('id');
			if($this->FutureTrips->save($user)){				
				$data['message']	=	__('Trip saved successfully.',true);
				$data['success']	=	true;
				$data['type']		=	'success';
				echo json_encode($data);
				
				exit;
			}
			
        }
		exit;
	}
	
	function getTripDetails(){
		if(!empty($this->request->data)){
			$tripDate	=	$this->request->data['tripdate'];
			$this->loadModel('TripDetails');
			$results	=	$this->TripDetails->find('all')->contain(['Country'])->where(['tripdate' => $tripDate,'user_id' => $this->Auth->user('id')]);
			$category	=	array();
			if(!empty($results)){
				foreach($results as $res){ 
					$category[$res->category]	=	$res;
					$countryName				=	$res->country->name;
					$countryId					=	$res->country->id;
					$place						=	$res->place;
				}
			}			
			if(!empty($category)){
				echo json_encode(array('ok' => true,'data' => $category,'countryName' => $countryName,'countryId' => $countryId,'place' => $place));				
			}else{
				echo json_encode(array('ok' => false));				
			}
			exit;
		}
	}
	
	function nextLevel(){
		$nextDate		=	isset($this->request->query['date']) ? $this->request->query['date'] : '';
		$time			=	isset($this->request->query['time']) ? $this->request->query['time'] : '';
		$nextDate		=	($nextDate == 'undefined') ? '' : $nextDate;
		$this->set("nextDate",$nextDate);
		$this->set("time",$time);
		$this->set("isEditable",true);
		
		$this->viewBuilder()->layout('ajax');
	}
	
	function planSave(){
		$this->loadModel('FutureTrips');
		
		if ($this->request->is('post')) {
			$requestData	=	$this->request->data;
			$trip_name		=	$this->request->data['trip_name'];
			$uuid			=	$this->request->data['uuid'];
			unset($requestData['trip_name']);
			unset($requestData['uuid']);
			
			$this->FutureTrips->deleteAll(['uuid' => $uuid]);
			$slug			=	$this->Slug->create($trip_name);
	
			foreach($requestData as $key => $res){				
				$casinoAmenities 							= 	$this->FutureTrips->newEntity();
				$casinoAmenities->user_id					=	(!empty($this->Auth->user('id'))) ? $this->Auth->user('id') : $uuid;
				$casinoAmenities->unique_id					=	$key;
				$casinoAmenities->arrive					=	$res['arrive'];
				$casinoAmenities->country					=	$res['country'];
				$casinoAmenities->place						=	$res['place'];
				$casinoAmenities->night						=	$res['night'];
				$casinoAmenities->method					=	$res['method'];
				$casinoAmenities->depart					=	$res['depart'];
				$casinoAmenities->accom_title				=	$res['accom_title'];
				$casinoAmenities->activites					=	$res['activites'];
				$casinoAmenities->accom_description			=	$res['accom_description'];
				$casinoAmenities->activites_description		=	$res['activites_description'];
				$casinoAmenities->method_description		=	$res['method_description'];
				$casinoAmenities->trip_name					=	$trip_name;
				$casinoAmenities->uuid						=	$uuid;
				$casinoAmenities->slug						=	$slug;
				$res	=	$this->FutureTrips->find("all")->where(['unique_id' => $key,'uuid' => $uuid])->first();
				
				if(!empty($res->id)){
					$casinoAmenities->id	=	$res->id;
				}
				
				
				$this->FutureTrips->save($casinoAmenities);
			}
        }
		
		$this->loadModel('FutureTrips');
		$tripcountrylist = $this->FutureTrips->find('all')
			->where([
				'FutureTrips.uuid' => $uuid
			])->order(['FutureTrips.id' => 'asc'])->all()->toArray();
		
		$data		=	array();
		foreach($tripcountrylist as $row){
			$data["trip"][]	=	
						array(
							  "id"			=>	$row->id,
							   "arrive"		=>	$row->arrive,
							   "country"		=>	$row->country,
							   "place"			=>	$row->place,
							   "method"			=>	$row->method,
							   "depart"			=>	$row->depart,
							   "night"			=>	$row->night,
							   "accom_title"	=>	$row->accom_title,
							   "accom_description"	=>	nl2br($row->accom_description),
							   "activites"	=>	$row->activites,
							   "activites_description"	=>	nl2br($row->activites_description),
							   "method_description"	=>	$row->method_description,
							);
			$data["name"]	=	$row->trip_name;
			$data["uuid"]	=	$row->uuid;
			/* $slug			=	(!empty($this->Auth->user('id'))) ? WEBSITE_URL.$this->Auth->user('username').'/'.$row->slug : WEBSITE_URL.'plan/'.$row->slug;
			
			$http 		= new Client();
			$response = $http->post('https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyApHPHm5IP5eTnpNIDvDlELuwjo1l5xSZI', json_encode(array("key" => "AIzaSyApHPHm5IP5eTnpNIDvDlELuwjo1l5xSZI","longUrl" => $)), ['type' => 'json']);
		 */
		
			$data["slug"]	=	(!empty($this->Auth->user('id'))) ? WEBSITE_URL.$this->Auth->user('username').'/'.$row->slug : WEBSITE_URL.'plan/'.$row->slug;
			
			$data["pdf"]	=	WEBSITE_URL.'pdf/'.$row->slug;
			
			$data["href"]	=	$row->slug;
		}
		echo json_encode($data);
		exit;
	}
	
	function deletePlan(){
		if ($this->request->is('post')) {
			$uuid	=	$this->request->data['uuid'];
			$this->loadModel('FutureTrips');
			$this->FutureTrips->deleteAll(['uuid' => $uuid]);
		}
		exit;
	}
	
	function tripEdit($uuid=null){
		$timeKey	=	time();
		$data		=	array();
		$isEditable	=	true;
		if($uuid){
			$this->loadModel("FutureTrips");
			$allTrips 	=	$this->FutureTrips->find("all")->where(["uuid" => $uuid]);
			
			foreach($allTrips as $row){
				$data["trip"][]	=	
							array(
								  "id"			=>	$row->id,
								   "arrive"		=>	$row->arrive,
								   "country"		=>	$row->country,
								   "place"			=>	$row->place,
								   "method"			=>	$row->method,
								   "depart"			=>	$row->depart,
								   "night"			=>	$row->night,
								   "accom_title"	=>	$row->accom_title,
								   "accom_description"	=>	$row->accom_description,
								   "activites"	=>	$row->activites,
								   "activites_description"	=>	$row->activites_description,
								   "unique_id"	=>	$row['unique_id'],
								   "method_description"	=>	$row->method_description,
								);
				$data["name"]	=	$row->trip_name;
				$data["uuid"]	=	$row->uuid;
				$data["slug"]	=	(!empty($this->Auth->user('id'))) ? WEBSITE_URL.$this->Auth->user('username').'/'.$row->slug : WEBSITE_URL.'plan/'.$row->slug;
				$data["pdf"]	=	WEBSITE_URL.'pdf/'.$row->slug;
				$data["href"]	=	$row->slug;
			}
		}
		
		if ($this->request->is('post')) {
			$view 				= 	new View();
			$view->viewPath		=	'Users';
			$view->layout		=	false;
			if($uuid){
				$view->set (compact('data','timeKey','isEditable')); 
			}else{			
				$edit_info	=	true;
				$view->set (compact('edit_info','timeKey','isEditable')); 
			}
			$html				=	$view->render('trip_edit');			
			$results			=	array();
			$results['html']	=	$html;
			$results['json']	=	$data;
			$results['timeKey']	=	$timeKey;
			
			echo json_encode($results);
			exit;
		}else{
			$getmethod	=	true;
			
			$this->set (compact('data','getmethod','timeKey','isEditable')); 
			$this->render('trip_edit');
		}
	}
	
	function tripView(){
		
		$timeKey	=	time();
		$slug 		=	$this->request->params['pslug'];	
		$data		=	array();
		$isEditable	=	false;
		if($slug){
			$this->loadModel("FutureTrips");
			$allTrips 	=	$this->FutureTrips->find("all")->contain(['User'])->where(["FutureTrips.slug" => $slug]);
			/* if($allTrips->isEmpty()){
				// $this->redirect(array("action" => "login"));
				// exit;
			} */
			foreach($allTrips as $row){ 
				if($row->user_id == $this->Auth->user('id')){
					$isEditable	=	true;
				}
				$data["trip"][]	=	
							array(
								  "id"			=>	$row->id,
								   "arrive"		=>	$row->arrive,
								   "country"		=>	$row->country,
								   "place"			=>	$row->place,
								   "method"			=>	$row->method,
								   "depart"			=>	$row->depart,
								   "night"			=>	$row->night,
								   "accom_title"	=>	$row->accom_title,
								   "accom_description"	=>	$row->accom_description,
								   "activites"	=>	$row->activites,
								   "activites_description"	=>	$row->activites_description,
								   "unique_id"	=>	$row['unique_id'],
								   "method_description"	=>	$row->method_description,
								);
				$data["name"]	=	$pageTitle	=	$row->trip_name;
				$data["uuid"]	=	$row->uuid;
				$data["slug"]	=	(!empty($allTrips->user->username)) ? WEBSITE_URL.$allTrips->user->username.'/'.$row->slug : WEBSITE_URL.'plan/'.$row->slug;
				$data["pdf"]	=	WEBSITE_URL.'pdf/'.$row->slug;
				$data["href"]	=	$row->slug;
			}
		}
		
		if ($this->request->is('post')) {
			$view 				= 	new View();
			$view->viewPath		=	'Users';
			$view->layout		=	false;
			if($slug){
				$view->set (compact('data','timeKey')); 
			}else{			
				$edit_info	=	true;
				$view->set (compact('edit_info','timeKey','isEditable')); 
			}
			$html				=	$view->render('trip_edit');			
			$results			=	array();
			$results['html']	=	$html;
			$results['json']	=	$data;
			$results['timeKey']	=	$timeKey;
			echo json_encode($results);
			exit;
		}else{
			$getmethod	=	true;
			$this->set (compact('data','getmethod','timeKey','pageTitle','isEditable')); 
			$this->render('trip_edit');
		}
		
	}
	
	function tripPdf(){
		ini_set('memory_limit', '-1');
		  $CakePdf = new \CakePdf\Pdf\CakePdf();
	
	// pr(APP);

		$timeKey	=	time();
		$slug 		=	$this->request->params['pslug'];	
		$data		=	array();
		$isEditable	=	false;
		
		$this->loadModel("FutureTrips");
		$allTrips 	=	$this->FutureTrips->find("all")->contain(['User'])->where(["FutureTrips.slug" => $slug]);
		
		foreach($allTrips as $row){
			if($row->user_id == $this->Auth->user('id')){
				$isEditable	=	true;
			}
			$data["trip"][]	=	
						array(
							  "id"			=>	$row->id,
							   "arrive"		=>	$row->arrive,
							   "country"		=>	$row->country,
							   "place"			=>	$row->place,
							   "method"			=>	$row->method,
							   "depart"			=>	$row->depart,
							   "night"			=>	$row->night,
							   "accom_title"	=>	$row->accom_title,
							   "accom_description"	=>	$row->accom_description,
							   "activites"	=>	$row->activites,
							   "activites_description"	=>	$row->activites_description,
							   "unique_id"	=>	$row['unique_id'],
							   "method_description"	=>	$row->method_description,
							);
			$data["name"]	=	$pageTitle	=	$row->trip_name;
			$data["uuid"]	=	$row->uuid;
			$data["slug"]	=	(!empty($allTrips->user->username)) ? WEBSITE_URL.$allTrips->user->username.'/'.$row->slug : WEBSITE_URL.'plan/'.$row->slug;
			$data["pdf"]	=	WEBSITE_URL.'pdf/'.$row->slug;
			$data["href"]	=	$row->slug;
		}
		
		
		$this->viewBuilder()->options([
			'pdfConfig' => [
				'orientation' => 'portrait',
				'filename' => 'Invoice_'
			]
		]);
		
		$getmethod	=	true;
		$this->set (compact('data','getmethod','timeKey','pageTitle','isEditable')); 
		// $this->render('trip_pdf');		
		
		$CakePdf->template('trip_pdf', 'default');
		$CakePdf->viewVars($this->viewVars);
		// Get the PDF string returned
		$pdf = $CakePdf->output("pdf");
		// Or write it to file directly
		
		$pageTitle	=	'Tripspend-'.Inflector::slug($pageTitle).'.pdf';
		$pdf = $CakePdf->write(ROOT . DS .'webroot'. DS .'pdf' . DS .$pageTitle);
		// pr($pdf);
		
		header("Content-type:application/pdf");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename=".$pageTitle);

		// The PDF source is in original.pdf
		readfile(WEBSITE_URL . '/webroot/pdf/' .$pageTitle);
		exit;
	}
	
	
	function tracker(){
		
	}
	
	function notification(){
		$data 	=	json_encode($this->request->data["notification"]);
		$user 	=	$this->Users->get($this->Auth->user("id"));
		
		$user->notification 	=	$data;
		$this->Users->save($user);
		
		$users	=	$this->Users->find('all')->contain(['Country'])->where(['Users.id'=>$this->Auth->user('id')])->first();
		$this->request->session()->write('Auth.User', $users->toArray());
		echo json_encode($users);
		exit;
	}
	
	function blogDetails(){
		$slug 		=	$this->request->params['blog'];
		
		$this->loadModel('News.News');
		$blog = $this->News->find('all')->contain(['Master','NewsUser'])->where(['News.slug' => $slug])->first();
		$this->set('blog',$blog);
		// pr($blog);
	}
}