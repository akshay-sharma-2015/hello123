<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class User extends Entity
{

    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    // ...

     protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

	public function parentNode()
	{
		if (!$this->id) {
			return null;
		}
		if (isset($this->group_id)) {
			$groupId = $this->group_id;
		} else {
			$Users = TableRegistry::get('Users');
			$user = $Users->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
			$groupId = $user->group_id;
		}
		if (!$groupId) {
			return null;
		}
		return ['Groups' => ['id' => $groupId]];
	} 
}