<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


class FutureTripsTable extends Table
{
	
	public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('future_trips'); 
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');		
	 
		/* $this->belongsTo('Country', [
            'foreignKey' => 'country_id',
			'className'  => 'CityManager.Country',
            'joinType' => 'INNER'
        ]); */
		$this->belongsTo('User', [
            'foreignKey' => 'user_id', 
            'joinType' => 'LEFT',
			'className'  => 'Users',
        ]);
    }	 
}