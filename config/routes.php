<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');
 Router::extensions(['xlsx']);
 Router::extensions(['json']);
 Router::extensions(['pdf']);
Router::prefix('admin', function ($routes) {
   
    $routes->connect('/', ['controller' => 'users', 'action' => 'login']);	
    $routes->connect('/dashboard', ['controller' => 'users', 'action' => 'dashboard']);	
    $routes->connect('/edit_profile', array('plugin' => '','controller' => 'users', 'action' => 'edit_profile'));	
    $routes->connect('/logout', array('plugin' => '','controller' => 'users', 'action' => 'logout')); 
 
	
	// $routes->connect('/emailtemplate/index', array('plugin' => 'emailtemplate','controller' => 'email_templates','action' => 'index'));
	$routes->connect('/cms/index', array('plugin' => 'cms','controller' => 'cms_pages','action' => 'index'));
	$routes->connect('/add', array('plugin' => '','controller' => 'users','action' => 'add'));
	 
	$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/:plugin/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);
	
	$routes->connect('/add', array('plugin' => '','controller' => 'users','action' => 'add'));
	
	// Casino controller
	// $routes->connect('/casino/*', array('plugin' => '','controller' => 'users'));
	
	$routes->plugin('Setting', ['path' => '/setting'], function ($routes) {
        $routes->connect('/:controller/:action/*');
    });
	
	$routes->plugin('EmailTemplate', ['path' => '/email_template'], function ($routes) {
        $routes->connect('/:controller/:action/*');
    });
	$routes->plugin('Master', ['path' => '/master'], function ($routes) {
        $routes->connect('/:controller/:action/*');
    });
	$routes->plugin('TextSetting', ['path' => '/textsetting'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	 });
	 
	$routes->plugin('CityManager', ['path' => '/city_manager'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	  
	$routes->plugin('Cms', ['path' => '/cms'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	 
	$routes->plugin('Block', ['path' => '/block'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	
	$routes->plugin('Contact', ['path' => '/contact'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	
	$routes->plugin('Slider', ['path' => '/slider'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	
	$routes->plugin('Promotion', ['path' => '/promotion'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	 
	$routes->plugin('News', ['path' => '/news'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	
	$routes->plugin('Promos', ['path' => '/promos'], function ($routes) {
        $routes->connect('/:controller/:action/*');
	});
	 $routes->fallbacks('DashedRoute');
});

Router::scope('/', function (RouteBuilder $routes) {
	
	// $routes->connect('/:language/:plugin/:controller/:action/*', [],array('language' => '[a-z]{3}'));
	/* $routes->connect('/:language', 
		['plugin' => '','controller' => 'users', 'action' => 'index'],
		['pass' => ['language']]
	); */
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
	
    $routes->connect('/allofus', ['plugin' => '','controller' => 'users', 'action' => 'allofus']);
		
	$cat_type	=	'discover|plan|track|trips|gotologin|profiletab';
	
	$routes->connect('/:cat_type', 
		['plugin' => '','controller' => 'Users', 'action' => 'index'],
		['pass' => ['cat_type'],'cat_type' => $cat_type]
	);	
		
		
	$routes->connect('/:user_slug/:pslug', 
		['plugin' => '','controller' => 'Users', 'action' => 'tripView'],
		['pass' => ['user_slug','pslug']]
	);	
	
	$routes->connect('/plan/:pslug', 
		['plugin' => '','controller' => 'Users', 'action' => 'tripView'],
		['pass' => ['pslug']]
	);	
	
	
	$routes->connect('/pdf/:pslug', 
		['plugin' => '','controller' => 'Users', 'action' => 'tripPdf'],
		['pass' => ['pslug']]
	);	
	
	$routes->connect('/', ['plugin' => '','controller' => 'users', 'action' => 'index']);
	
    $routes->connect('/users/upload_image', ['plugin' => '','controller' => 'users', 'action' => 'upload_image']);
	
	
    $routes->connect('/signup', ['plugin' => '','controller' => 'users', 'action' => 'signup']);
    $routes->connect('/login', ['plugin' => '','controller' => 'users', 'action' => 'login']);
    $routes->connect('/logout', ['plugin' => '','controller' => 'users', 'action' => 'logout']);
	$routes->connect('/:language/forgot_password', ['plugin' => '','controller' => 'users', 'action' => 'forgot_password']);
	$routes->connect('/forgot_password', ['plugin' => '','controller' => 'users', 'action' => 'forgot_password']);
	
	$routes->connect('/:language/reset_password', ['plugin' => '','controller' => 'users', 'action' => 'resetPassword']);
	$routes->connect('/reset_password', ['plugin' => '','controller' => 'users', 'action' => 'resetPassword']);
    $routes->connect('/site.appcache', ['plugin' => '','controller' => 'users', 'action' => 'cache']);
	$routes->connect('/dashboard', 	['plugin' => '','controller' => 'users', 'action' => 'dashboard']);	
    $routes->connect('/tripdetails', ['plugin' => '','controller' => 'users', 'action' => 'tripdetails']);
	

	$routes->connect('/blog', ['plugin' => '','controller' => 'users', 'action' => 'blog']);
	$routes->connect('/editprofile', ['plugin' => '','controller' => 'users', 'action' => 'editProfile']);
	
	$routes->connect('/:user_slug', 
		['plugin' => '','controller' => 'Users', 'action' => 'publicProfile'],
		['pass' => ['user_slug']]
	);
	$routes->connect('/promos', ['plugin' => '','controller' => 'users', 'action' => 'promos']);	
	$routes->connect('/about', ['plugin' => '','controller' => 'users', 'action' => 'about']);	
	
	
	$routes->connect('/getTripDetails', ['plugin' => '','controller' => 'users', 'action' => 'getTripDetails']);	
	
	$routes->connect('/user_autocomplete', ['plugin' => '','controller' => 'users', 'action' => 'user_autocomplete']);	
	$routes->connect('/future_trip', ['plugin' => '','controller' => 'users', 'action' => 'future_trip']);	
	
	
	$routes->connect('/next_level', ['plugin' => '','controller' => 'users', 'action' => 'next_level']);	
	$routes->connect('/plan_save', ['plugin' => '','controller' => 'users', 'action' => 'plan_save']);	
	$routes->connect('/delete_plan', ['plugin' => '','controller' => 'users', 'action' => 'delete_plan']);	
	$routes->connect('/trip_edit/*', ['plugin' => '','controller' => 'users', 'action' => 'trip_edit']);	
	$routes->connect('/tracker', ['plugin' => '','controller' => 'users', 'action' => 'tracker']);	
	$routes->connect('/notification', ['plugin' => '','controller' => 'users', 'action' => 'notification']);	
	
	
	$routes->connect('/blog/:blog', 
		['plugin' => '','controller' => 'Users', 'action' => 'blog_details'],
		['pass' => ['blog']]
	);	
	
	
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});
   
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
