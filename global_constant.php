<?php 

// D:\xampp\htdocs\casino\bin>cake bake all Master.Masters
define('SUBDIR','trip/');
define('SUBDIR_CSS_PATH','/trip');


define('ADMIN_SUBDIR','admin/');

$host = $_SERVER['HTTP_HOST'];
// $host = 'localhost';
// echo $host;

define('JS_URL','js/');
define('CSS_URL','css/');

define('WEBSITE_URL','http://'.$host.'/'.SUBDIR);
define('WEBSITE_ADMIN_URL','http://'.$host.'/'.SUBDIR.ADMIN_SUBDIR);


define('WEBSITE_CSS_URL',WEBSITE_URL.'css/');
define('WEBSITE_JS_URL',WEBSITE_URL.'js/');

// define('WEBSITE_ADMIN_CSS_URL',WEBSITE_URL.'css/admin/');
define('WEBSITE_ADMIN_JS_URL',WEBSITE_URL.'js/admin/');

define('WEBSITE_ADMIN_CSS_URL',WEBSITE_ADMIN_URL.'css/');
define('WEBSITE_ADMN_JS_URL',WEBSITE_ADMIN_URL.'js/');


define('WEBSITE_APP_WEBROOT_ROOT_PATH', ROOT . DS . 'webroot' . DS);

define('APP_WEBROOT_ROOT_PATH', WEBSITE_APP_WEBROOT_ROOT_PATH);


define('APP_UPLOADS_ROOT_PATH', APP_WEBROOT_ROOT_PATH . 'uploads' . DS);
define('WEBSITE_UPLOADS_URL', WEBSITE_URL . 'webroot/uploads/');


define('WEBSITE_IMG_URL',WEBSITE_URL.'img/');
define('COMPLETE_UPLOAD_PATH',WEBSITE_URL.'webroot/uploads/');

define('CASINO_THUMB_IMG_URL',WEBSITE_URL.'files/thumbnail/');
define('CASINO_THUMB_IMG_ROOT_PATH',APP_WEBROOT_ROOT_PATH.'files'.DS.'thumbnail'.DS);

define('CASINO_FULL_IMG_URL',WEBSITE_URL.'webroot/files/');
define('CASINO_FULL_IMG_ROOT_PATH',APP_WEBROOT_ROOT_PATH.'files'.DS);


define('AMENITIES_IMG_URL',COMPLETE_UPLOAD_PATH.'amenities/');
define('AMENITIES_ROOT_PATH',APP_UPLOADS_ROOT_PATH.'amenities'.DS);


define('PROMOTION_CASINO_LOGO_IMG_URL',COMPLETE_UPLOAD_PATH.'promotions/');
define('PROMOTION_CASINO_LOGO_ROOT_PATH',APP_UPLOADS_ROOT_PATH.'promotions'.DS);

define('SLIDER_IMG_URL',COMPLETE_UPLOAD_PATH.'slider/');
define('SLIDER_ROOT_PATH',APP_UPLOADS_ROOT_PATH.'slider'.DS);

define('NO_CASINO_IMG',WEBSITE_URL.'webroot/img/city-image.jpg');
define('NO_CITY_IMG',WEBSITE_URL.'webroot/img/city-image.jpg');
define('NO_COUNTRY_IMG',WEBSITE_URL.'webroot/img/city-image.jpg');
define('NO_PROFILE_IMAGE',WEBSITE_URL.'webroot/img/city-image.jpg');

define('PROFILE_IMG_URL',COMPLETE_UPLOAD_PATH.'profile/');
define('PROFILE_ROOT_PATH',APP_UPLOADS_ROOT_PATH.'profile'.DS);

define('ADMIN',1);
define('ADMIN_USER','admin');
define('FRONT_USER','front');

define('ADMIN_ID',423424651);
define('LAT','23.6345');
define('LONG','102.5528');



$config['language_translate_module']    =    array(
		'homepage'    => 'Homepage',
		'menu'    => 'Header Menu',
		'footer'    => 'Footer',
		'dashboard'    => 'Dashboard',
		'title'    => 'Page Title',
		'metadescription'    => 'Meta Description'
	);	
$config['image_array']    =    array('category');

$config['sex']    =    array(
		'Male'    => 'Male',
		'Female'    => 'Female',
		'Other'    => 'Other'
	);	

$config['email_preference']    =    array(
	'dashboard.general'    => array(
		'1' => "Email 1",
		'2' => "Email 2",
		'3' => "Email 3"
	),
	'dashboard.follow'    => array(
		'4' => "Email 4",
		'5' => "Email 5",
		'6' => "Email 6"
	),
	'dashboard.likes_and_comments'    => array(
		'7' => "Email 7",
		'8' => "Email 8",
		'9' => "Email 9"
	)
);	
 ?>