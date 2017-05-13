<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


class UsersTable extends Table
{
	
	public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('full_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');		
		
		 $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
		
		
		$this->belongsTo('Country', [
            'foreignKey' => 'country_id',
			'className'  => 'CityManager.Country',
            'joinType' => 'INNER'
        ]);
		
		 
		
		
		$this->addBehavior('Muffin/Slug.Slug', [
			'field' => 'slug',
			'displayField' => 'full_name'
		]);
		
		
        /* $this->addBehavior('Captcha', [
			'field' => 'securitycode',
			'message' => 'Incorrect captcha code value'
		]); */
		
		
		$this->addBehavior('Acl.Acl', ['type' => 'requester']);

    }

	public function validationAdminEditProfile()
    {
		
		$validator = new Validator();
        $validator
            ->requirePresence('email')
			->add('email', 'validFormat', [
				'rule' => 'email',
				'message' => 'E-mail must be valid'
			]);
		$validator
            ->add('new_password', 'passwordsEqual', [
				'rule' => function ($value, $context) {
					return
						isset($context['data']['confirm_password']) && $context['data']['confirm_password'] === $value;
				}
			])->allowEmpty('new_password', 'update');
		$validator
            ->add('old_password', 'oldPassword', [
				'rule' => function ($value, $context) {
					return
						isset($context['data']['old_password']) && $context['data']['old_password'] === $value;
				}
			])->allowEmpty('old_password', 'update');
			
        return $validator;    
    }
	
	
	public function validationUpdateProfile()
    {
		
		$validator = new Validator();
        $validator->requirePresence('full_name',true,__('Please enter full name'));
        $validator->notEmpty('full_name',__('Please enter full name'));
		
		$validator->requirePresence('email',true,__('Please enter email'))
			->add('email', 'validFormat', [
				'rule' => 'email',
				'message' => 'E-mail must be valid'
			])
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message' => 'Email id already exists.Please login with your exists account']);
		
		/* $validator->requirePresence('password1',true,__('Please enter password'));
        $validator->notEmpty('password1',__('Please enter password'))
			->add('password1', [
				'length' => [
					'rule' => ['minLength', 6],
					'message' => 'Password need to be at least 6 characters long',
				]
			]);
			 */
		$validator->requirePresence('city',true,__('Please enter city',true));
		$validator->notEmpty('city', __('Please enter city',true));
		
		$validator->requirePresence('country_id',true,__('Please select country',true));
		$validator->notEmpty('country_id', __('Please select country',true));
		
		$validator->requirePresence('accept',true,__('Please accept term & conditions',true));
		$validator->notEmpty('accept', __('Please accept term & conditions',true));
			 
        return $validator;    
    }
	
	public function validationContactUsForm()
    {
		
		$validator = new Validator();
        $validator->requirePresence('name',__('Please enter name.',true)); 
		
		$validator->requirePresence('email')
			->add('email', 'validFormat', [
				'rule' => 'email',
				'message' => 'E-mail must be valid'
			]);
		$validator->requirePresence('subject',__('Please enter subject.',true)); 	
		$validator->requirePresence('master_id',__('Please select department.',true)); 	
		$validator->requirePresence('message',__('Please enter message.',true)); 	
        return $validator;    
    }	
	

	
	public function validationSignUpForm()
    {
		
		$validator = new Validator();
        $validator
            ->notEmpty('username',__('Please enter username.',true))
			 ->ascii('username',['message' => __('Please enter valid username.',true)])
			->add('username', 'validFormat',[
                'rule' => array('custom', '/^[a-zA-Z0-9]{5,}$/'),
                'message' => 'Please enter valid username.Please use only letters (a-z), numbers and length must be 6 characters'
			])
			->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message' => 'Username already exists.Please login with your exists account']);
		
		$validator
			->notEmpty('password',__('Please enter password.',true))
			->requirePresence('password',__('Please enter password.',true))
            ->add('password', [
				'length' => [
					'rule' => ['minLength', 6],
					'message' => 'Password need to be at least 6 characters long',
				]
			]);	
		
			
		$validator
			->notEmpty('country_id',__('Please select country.',true))
			->requirePresence('country',__('Please select country.',true));
				
			
		$validator
            ->notEmpty('email',__('Please enter E-mail.',true))
			->add('email', 'validFormat', [
				'rule' => 'email',
				'message' => __('E-mail must be valid.',true)
			]);
		 $validator
			->notEmpty('sex',__('Please select sex.',true))
			->requirePresence('mobile',__('Please select sex.',true));
        
		
		
       /*  $validator
			->notEmpty('mobile',__('Please enter mobile number.',true))
			->requirePresence('mobile',__('Please enter mobile number.',true)); */
       
	  /*	$validator
			->notEmpty('currency',__('Please select currency.',true))
			->requirePresence('currency',__('Please select currency.',true));
	  */
        return $validator;    
    }
	
	public function validationFutureTripForm()
    {
  
  $validator = new Validator();
        $validator
            ->notEmpty('name',__('Please enter name.',true))
            ->requirePresence('name',__('Please enter name.',true));
   
  $validator
            ->notEmpty('tripname',__('Please enter tripname.',true))
            ->requirePresence('tripname',__('Please enter tripname.',true));
       $validator
			->notEmpty('country_id',__('Please select country.',true))
			->requirePresence('country_id',__('Please select country.',true));
        $validator
            ->notEmpty('city',__('Please enter city.',true))
            ->requirePresence('city',__('Please enter city.',true));
        $validator
            ->notEmpty('arrive',__('Please enter arrive date.',true))
            ->requirePresence('arrive',__('Please enter city.',true));
        $validator
            ->notEmpty('depart',__('Please enter depart date.',true))
            ->requirePresence('depart',__('Please enter depart date.',true));
        $validator
            ->notEmpty('method',__('Please select a  method.',true));
            /* ->requirePresence('method',__('Please select a method.',true)); */
        $validator
            ->notEmpty('address',__('Please enter address.',true))
            ->requirePresence('address',__('Please enter address.',true));
        $validator
            ->notEmpty('phone',__('Please enter phone number.',true))
            ->requirePresence('phone',__('Please enter phone number.',true));
        $validator
            ->notEmpty('cost',__('Please enter cost.',true))
            ->requirePresence('cost',__('Please enter cost',true));
        $validator
            ->notEmpty('details',__('Please enter details.',true))
            ->requirePresence('details',__('Please enter details',true));
        $validator
            ->notEmpty('activities_title',__('Please enter activities title.',true))
            ->requirePresence('activities_title',__('Please enter activities title',true));
        $validator
            ->notEmpty('activities_details',__('Please enter activities details.',true))
            ->requirePresence('activities_details',__('Please enter activities details',true));
		$validator
            ->notEmpty('notes_title',__('Please enter notes title.',true))
            ->requirePresence('notes_title',__('Please enter notes title',true));
		$validator
            ->notEmpty('notes_details',__('Please enter notes details.',true))
            ->requirePresence('notes_details',__('Please enter notes details',true));
  
        return $validator;    
    }
	
	
	public function validationTripDetailsForm()
    {
		
		$validator = new Validator();
       
			
		$validator
			->notEmpty('category',__('Please select category.',true))
			->requirePresence('category',__('Please select category.',true));
			
			
		$validator
			->notEmpty('people',__('Please select number of people.',true))
			->requirePresence('people',__('Please select number of people.',true))
			->add('people', 'validFormat',[
                'rule' => array('custom', '/^[0-9]*$/'),
                'message' => 'Please enter only numbers for people'
			]); 
		$validator
			->notEmpty('details',__('Please fillup details.',true))
			->requirePresence('details',__('Please fillup details.',true));
		$validator
			->notEmpty('cost',__('Please Fillup Cost.',true))
			->requirePresence('cost',__('Please fillup cost.',true))
			->add('cost', 'validFormat',[
                'rule' => array('custom', '/^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$/'),
                'message' => 'Please enter only numbers for cost'
			]); 	
		$validator
			->notEmpty('days',__('Please select days.',true))
			->requirePresence('days',__('Please select days.',true))
			->add('days', 'validFormat',[
                'rule' => array('custom', '/^[0-9]*$/'),
                'message' => 'Please enter only numbers for days'
			]); 	
		/*
		$validator
			->notEmpty('currency_id',__('Please choose currency.',true))
			->requirePresence('currency_id',__('Please choose currency.',true));
		*/
		$validator
			->notEmpty('notes',__('Please fill notes and memories.',true))
			->requirePresence('notes',__('Please fill notes and memories.',true));
		$validator
			->notEmpty('place',__('Please fill place.',true))
			->requirePresence('place',__('Please fill place.',true));
		$validator
			->notEmpty('tripdate',__('Please select date.',true))
			->requirePresence('tripdate',__('Please select date.',true));
		$validator
			->notEmpty('country_id',__('Please select country.',true))
			->requirePresence('country_id',__('Please select country.',true));
        return $validator;    
    }
	
	
	public function validationUploadImageForm()
    {
		$validator = new Validator();		
       
	    $validator		
		->notEmpty('image',__('Please select an image.',true))
		->add('image',[
			 'validExtension' => [
                    'rule' => ['extension'], // default  ['gif', 'jpeg', 'png', 'jpg']
                    'message' => __('These files extension are allowed: .gif, .jpeg, .png, .jpg')
                ]
        ]);

		return $validator;    
    }
	
	public function validationForgotPasswordForm()
    {
		
		$validator = new Validator();       
		$validator
            ->notEmpty('email',__('Please enter E-mail.',true))
			->add('email', 'validFormat', [
				'rule' => 'email',
				'message' => __('E-mail must be valid.',true)
			]);
		
        return $validator;    
    }
 
 
 
	 
}