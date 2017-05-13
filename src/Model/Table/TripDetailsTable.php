<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


class TripDetailsTable extends Table
{
	
	public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('trip_details'); 
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');		
	 
		$this->belongsTo('Country', [
            'foreignKey' => 'country_id',
			'className'  => 'CityManager.Country',
            'joinType' => 'INNER'
        ]);
		$this->belongsTo('User', [
            'foreignKey' => 'user_id', 
            'joinType' => 'INNER'
        ]);
		 
		
		 
		  
    }
 
	 
}