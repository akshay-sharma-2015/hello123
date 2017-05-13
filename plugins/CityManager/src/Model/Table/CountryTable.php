<?php
namespace CityManager\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use CityManager\Model\Entity\Country;

/**
 * Country Model
 *
 * @property \Cake\ORM\Association\HasMany $City
 * @property \Cake\ORM\Association\HasMany $State
 */
class CountryTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('countries');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('City', [
            'foreignKey' => 'country_id',
            'className' => 'CityManager.City',
			'conditions' => function ($e, $query) {
				$query->limit(8);
				return [];
			},
			'sort' => 'City.review_count DESC'
        ]);
		
		$this->addBehavior('Translate', ['fields' => ['name']]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

		$validator->add('name', [
	            	'unique' => [
	            		'rule' => ['validateUnique', ['scope' => ['name']]],
	            		'provider' => 'table',
	            		'message' => 'You already have a country with that name!'
	            	]
	            ])->notEmpty('name');
				
		 
		$validator
            ->requirePresence('currency', 'create')
            ->notEmpty('currency'); 

		$validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');  
			
		$validator
            ->requirePresence('symbol', 'create')
            ->notEmpty('symbol');

        return $validator;
    }
}
