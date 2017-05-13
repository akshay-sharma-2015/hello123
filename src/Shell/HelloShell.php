<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

class HelloShell extends Shell
{
	
     public function initialize()
    {
    	ini_set('memory_limit', '2048M');
		set_time_limit(0);
        parent::initialize();
        $this->loadModel('CityManager.Country');
    }

    public function show()
    {
       /*  if (empty($this->args[0])) {
            // Use error() before CakePHP 3.2
            return $this->abort('Please enter a username.');
        } */
      	$city 	= $this->Country->find('all')
				->where([
				'Country.slug' => ''
			]);
			
		foreach($city as $a){
			$articlesTable 					= 	TableRegistry::get('CityManager.Country');
			
			
			$casinoAmenities 				= 	$articlesTable->get($a->id); // Return article with id 12

			$slug							=	strtolower($a->name.'-'.$a->country->name);
			$casinoAmenities->slug			=	Inflector::slug($slug);		
			
			$articlesTable->save($casinoAmenities);
			$id	=	$a->id;
		}
		$this->out(print_r($id, true));		
    }
	
	public function show2()
    {
       /*  if (empty($this->args[0])) {
            // Use error() before CakePHP 3.2
            return $this->abort('Please enter a username.');
        } */
      	$city 	= $this->City->find('all')
				->contain('Country')
				->where([
				'City.slug' => ''
			])->order(['City.id' => 'DESC'])->limit(200000);
		foreach($city as $a){
			$articlesTable 					= 	TableRegistry::get('CityManager.City');
			
			
			$casinoAmenities 				= 	$articlesTable->get($a->id); // Return article with id 12

			$casinoAmenities->country_name	=	$a->country->name;
			$slug							=	strtolower($a->name.'-'.$a->country->name);
			$casinoAmenities->slug			=	Inflector::slug($slug);		
			
			$articlesTable->save($casinoAmenities);
			$id	=	$a->id;
		}
		$this->out(print_r($a, true));		
    }
	
	public function akshay(){
		$this->out(print_r('akshay', true));	
	}
}