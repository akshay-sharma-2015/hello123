<?php
	namespace App\Controller\Component;

	use Cake\Controller\Component;
	use Cake\Controller\ComponentRegistry;
	use Cake\Utility\Text;
	use Cake\ORM\TableRegistry;

	class SlugComponent extends Component	{
		public $slug;
		public $field = "slug";
		public $separator = "-";
	
		function create($slug){
			$this->slug 	=	$slug;
        
			$this->makeSlug();
			return $this->makeUnique();
		}
		
		function makeSlug(){
			$string = Text::slug($this->slug, "-");
			$this->slug 	=	mb_strtolower($string);
		}
		
		function makeUnique(){
			$fancyTable = TableRegistry::get('FutureTrips');
			// $exists = ;

			$primaryKey = null;
			
			$conditions = [$this->field => $this->slug];
			// $conditions += $this->config('scope');
			if ($primaryKey){
				$conditions['NOT'] = $id;
			}

			$i = 0;
			$suffix = '';
			$length = $this->config('length');

			while ($fancyTable->exists($conditions)) {
				$i++;
				$suffix = $this->separator . $i;
				if ($length && $length < mb_strlen($slug . $suffix)) {
					$this->slug = mb_substr($slug, 0, $length - mb_strlen($suffix));
				}
				$conditions[$this->field] = $this->slug . $suffix;
			}

			return $this->slug . $suffix;
		}
	}