<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;

class UsersController extends AppController
{
	public function initialize()
	{
		parent::initialize();

		// $this->Auth->allow();
	} 
	 
	public function index(){
		
		$query = $this->Users->find();
		
		if(!empty($this->request->query)){
			$requestedQuery	=	$this->request->query;
			foreach($requestedQuery as $name => $value){
				if($name == 'page' || $name == 'language' || $name == 'sort' || $name == 'direction')
					continue;
				$query->where([$name.' LIKE' => '%'.$value.'%']);			
		
			}
			$this->set('requestedQuery',$requestedQuery);
		}
		
		$this->paginate = [
				'sortWhitelist' => ['username', 'email','phone','created','id'],
				'limit' => Configure::read('Reading.record_per_page'),
				'sort' => 'id',
				'direction' => 'desc'
			];
		
		$query->where(['role !=' => 'admin']);
		

		$userList = $this->paginate($query);

        $this->set(compact('userList'));
        $this->set('_serialize', ['userList']);
	}
	
	  public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
			$user->email	=	$this->request->data['username'];
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
		
        $groups = $this->Users->Groups->find('list');
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }
	  public function edit($id)
    {
        $user = $this->Users->get($id);
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
		
        $groups = $this->Users->Groups->find('list');
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }
	
	function editProfile(){
		$result	 = $this->{$this->modelClass}->get($this->Auth->user('id'));
		if ($this->request->is(['post', 'put'])) {
			$this->{$this->modelClass}->patchEntity(
											$result, 
											$this->request->data, 
											[ 'validate' => 'adminEditProfile']
										);
			$result->username	=	$result->email;
			if ($this->{$this->modelClass}->save($result)) {
				$this->Flash->success(__('Information updated successfully.'));
				return $this->redirect(['action' => 'dashboard']);
			}
			$this->Flash->error(__('Unable to update your information.'));
		}
		$this->set('result', $result);
	}
	
	public function login()
	{
		$this->viewBuilder()->layout('login');
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$this->redirect('/admin/users/dashboard');
			}else{
				
				$this->Flash->error1('Your username or password is incorrect.');
			}
		}
		
	}
	 public function dashboard()
    {
		
		$currMonth		=	Date('m');
		$clinicUser		=	array();
		$patientUser	=	array();
		$doctorUser	=	array();
		for ($i=0; $i<=11; $i++) {
			$month	=	 date('Y-m', strtotime("-$i month"));
			$month1	=	 date('M', strtotime("-$i month"));
			$clinicUser[$month1]	=	$this->{$this->modelClass}->find('all',array('conditions' => array('created LIKE "%'.$month.'%"', 'is_deleted' => 0)))->count();
			$patientUser[$month1]	=	$this->{$this->modelClass}->find('all',array('conditions' => array('created LIKE "%'.$month.'%"', 'is_deleted' => 0)))->count();
			$doctorUser[$month1]	=	$this->{$this->modelClass}->find('all',array('conditions' => array('created LIKE "%'.$month.'%"', 'is_deleted' => 0)))->count();
		}  
		
		
		$this->set('clinicUser',array_reverse($clinicUser));
		$this->set('patientUser',array_reverse($patientUser));
		$this->set('doctorUser',array_reverse($doctorUser));
		
    }
	
	public function logout(){
       $this->Auth->logout();
	   $this->redirect(WEBSITE_ADMIN_URL);
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
        $users = $this->Users->get($id);
        if ($this->Users->delete($users)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
}
