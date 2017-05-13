<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Inbox cell
 */
class InboxCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
/*     public function display($sort_by)
    {	
		$this->loadModel('Master.Masters');
		$reviewOrder = $this->Masters->find('list')
			->where([
				'Masters.type' => 'review_order'
			])->all()->toArray();
		$this->set('sort_by', $sort_by);
		$this->set('reviewOrder', $reviewOrder);
    } */
	
		 
	/**
     * Default display method.
     *
     * @return void
     */
    public function country_list()
    {	
		$this->loadModel('CityManager.Country');
		$country = $this->Country->find('list')->order(['name' => 'asc']);
		$this->set('country',$country);
    }  

	public function currency_list()
    {	
		$this->loadModel('CityManager.Country');
		$currency = $this->Country->find('list', ['keyField' => 'code','valueField' => 'id'])->order(['code' => 'asc']);
		$this->set('currency',$currency);
		 
    } 
	
	public function category_list_menu()
    {	
		
		$this->loadModel('Master.Masters');
		$category = $this->Masters->find('all')
			->where([
				'Masters.type' => 'category', 'is_deleted'=>0
			])->all()->toArray();
		$this->set('category',$category);

    }
	
	public function category_list()
    {	
		
		$this->loadModel('Master.Masters');
		$category = $this->Masters->find('all')
			->where([
				'Masters.type' => 'category', 'is_deleted'=>0
			])->all()->toArray();
		$this->set('category',$category);

    }
	public function trip_country_list()
    {	
		
		$this->loadModel('TripDetails');
		$tripCountryList = $this->TripDetails->find('all')
		->contain(['Country'])
			->where([
				'TripDetails.user_id' => $this->request->session()->read('Auth.User.id')
			])->all()->toArray();
		$this->set('tripcountrylist',$tripCountryList);

    }
	
	public function my_trips_category_list()
    {	
		
		$this->loadModel('Master.Masters');
		$category = $this->Masters->find('all')
			->where([
				'Masters.type' => 'category', 'is_deleted'=>0
			])->all()->toArray();
		$this->set('category',$category);

    }
	
	
	public function blog()
    {	
		
		$this->loadModel('News.News');
		$blog = $this->News->find('all')->contain(['Master'])->all()->toArray();
		$this->set('blog',$blog);

    }
}
