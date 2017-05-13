<?php
	$data	=	"";
	$PlaceCatCost	=	"";
	$userCurrencySymbol=	$this->request->session()->read('Auth.User.country.symbol');
	foreach($tripcountrylist as $key=> $row){
		$data[$row->trip_name]["trip"][]	=	
						array(
							  "id"			=>	$row->id,
							   "arrive"		=>	$row->arrive,
							   "country"		=>	$row->country,
							   "place"			=>	$row->place,
							   "method"			=>	$row->method,
							   "depart"			=>	$row->depart,
							   "night"			=>	$row->night,
							   "accom_title"	=>	$row->accom_title,
							   "accom_description"	=>	$row->accom_description,
							   "activites"	=>	$row->activites,
							   "activites_description"	=>	$row->activites_description,
							   "method_description"	=>	$row->method_description,
							);
		$data[$row->trip_name]["name"]	=	$row->trip_name;
		$data[$row->trip_name]["uuid"]	=	$row->uuid;
	} 	 
if(!empty($data))
{ ?>
	<div class="triplist">
		<ul class="m-tr">
			<?php foreach($data as $key => $row) { ?>
			<li class="lip<?php echo $row['uuid']; ?>">
				<a href="javascript:void(0);" class="myplandetailpage" data-id="<?php echo $row['uuid']; ?>" data-trip='<?php echo json_encode($row);?>'><?php echo $key;?></a>
			</li>
			<?php } ?>
			<li style="display:none" class="cplan lip0">
				<a href="javascript:void(0);" class="myplandetailpage cplana" data-trip=''></a>
			</li>
		</ul>
	</div> 
<?php 	
}else{
	echo  '<div class="triplist npn"><h3>No Plan Added</h3></div><div class="triplist"><ul class="m-tr"><li id="" style="display:none" class="cplan lip0"><a href="javascript:void(0);" class="myplandetailpage cplana" data-trip=""></a></li></ul></div>';	
} ?>