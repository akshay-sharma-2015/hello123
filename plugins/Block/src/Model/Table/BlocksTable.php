<?php
namespace Block\Model\Table;

use Block\Model\Entity\Block;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Cache\Cache;

/**
 * Blocks Model
 *
 */
class BlocksTable extends Table
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

        $this->table('blocks');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('Translate', ['fields' => ['title','description']]);
		
		$this->addBehavior('Sluggable');
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

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
		$validator
            ->requirePresence('page_name', 'create')
            ->notEmpty('page_name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

      
        return $validator;
    }
	
	public function afterSave($entity, $options = [])
	{
		Cache::delete('allBlocks','longlong');
	} 
	
	public function afterDelete($entity, $options = [])
	{
		Cache::delete('allBlocks','longlong');
	} 
}
