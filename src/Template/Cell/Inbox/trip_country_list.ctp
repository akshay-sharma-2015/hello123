<?php
	$data	=	"";
	$PlaceCatCost	=	"";
	$userCurrencySymbol=	$this->request->session()->read('Auth.User.country.symbol');
	foreach($tripcountrylist as $key=> $row){
		$data[$row->country->name][$row->place][]	=	
						array( 
								"id"			=>	$row->id,
							   "currency_id"	=>$row->currency_id,
							   "category"		=>$row->category,
							   "details"   		=>$row->details,
							   "place"			=>$row->place,
							   "people"			=>$row->people,
							   "tripdate"		=>$row->tripdate,
							   "days"			=>$row->days,										   
							   "cost"			=>$row->cost,
							   "notes"			=>$row->notes,
							   "country_name"	=>$row->country->name,
							   "symbol"		 	=>$row->country->symbol,
							   "code"		 	=>$row->country->code,
							   "exchange_rate"	=>$row->exchange_rate, 
							   "total_user_currency"=>$row->cost*$row->exchange_rate,
							);
		$tot					=	isset($PlaceCatCost[$row->country->name][$row->place][$row->category]) ? $PlaceCatCost[$row->country->name][$row->place][$row->category] : 0;
		
		$PlaceCatCost[$row->country->name][$row->place][$row->category] = $tot + $row->cost;
		
	}
	 
	// pr($PlaceCatCost);
	// pr($data);
 	 
if(!empty($data))
{
	foreach($data as $key=> $row) { ?>
	<div class="triplist">
		<h3><?php echo $key;?></h3>
		<ul>
		<?php 
			
			foreach($row as $keyy=> $col) {
				 $days	=	$cost	= $total_user_currency=	0;
				 $count	=	count($col);
				 
				 foreach($col as $key11 => $data){
					 $days 					+= 	$data['days'];
					 $cost 					+= 	$data['cost'];
					 $total_user_currency 	+= 	$data['total_user_currency'];
					 $info['notes'][]		=	$data['notes'];
					if($key11 == 0){
						$sDate				=	$data['tripdate'];
					}
					// pr($count.' '.$key11);
					// pr();
					if(($key11+1) == $count){
						$eDate				=	$data['tripdate'];
					}
				  }
				  
				    
				  $info['country']				=			$key;								// Country Name
				  $info['symbol']				=			$col[0]['symbol'];					// Currency Symbol
				  $info['place']				=			$keyy;								// Place name
				  $info['days']					=			$days;								// Total number of days spent on that palce
				  $info['cost']					=			$cost;								// Total cost spent on that place
				  $info['currency_id']			= 			$col[0]['currency_id'];				// Total Currency ID  on that place
				  $info['category_total'] 		=			$PlaceCatCost[$key][$keyy];			// Total cost spent on that place
  				  $info['total_local_currency']	=			$cost;								// Total Local cost spent on that place
				  $info['total_user_currency']	=	  		$total_user_currency;				// Total User Amount
				  $info['userCurrencySymbol']	=			$userCurrencySymbol;                 // User Registered Country Currency Symbol
				  $info['tripdate']             =          	date('d-m-Y',strtotime($sDate)) ;
				  if($sDate != $eDate){
					$info['endtrip']              =			date('d-m-Y',strtotime($eDate));	 
				  }
				  if($days!=0){
						$info['avgcost']= round($cost/$days,2);		// Cost for per day that is Average cost
				  }else{
						$info['avgcost']=$cost;
				  } ?>
			<li>
				<a href="javascript:void(0);" class="mytripdetailpage" full-data='<?php echo json_encode($info);?>'><?php echo $keyy;?></a>
			</li>
		<?php unset($info);
			} ?>
		</ul>
	</div> 
	<?php } // end of foreach loop
}else{
	echo  '<div class="triplist"><h3>No Trip Added</h3></div>';	
} ?>