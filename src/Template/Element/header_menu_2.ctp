<header>
   <div class="block h60">

      <div class="logo"><a href="<?php echo WEBSITE_URL ;?>"><img src="<?php echo WEBSITE_IMG_URL ?>tripadvisor.png" alt="logo" /></a></div>
   </div>
   
 </header>

<div class="mainTitle">
    <h1>
		<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=>"discover"]); ?>"> Discover </a></span>
		<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=> "plan"]); ?>"> Plan </a></span>
		<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index', "cat_type"=>"track"]); ?>" > Track </a></span>
		<span><a href="<?php echo $this->Url->build([ "plugin"=>'',"controller" => "Users",'action' => 'index',"cat_type"=>"trips"]); ?>"> Trips </a></span>		
	</h1>
  </div>