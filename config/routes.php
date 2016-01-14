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

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'dashboard']);

    $routes->fallbacks('DashedRoute');
});

Router::connect('/map',
    array('controller' => 'Pages', 'action' => 'map')
);
Router::connect('/clients/:id',
    array('controller' => 'Clients', 'action' => 'showdetails'),
    array('pass' => array('id')
));
Router::connect('/projects/:id',
    array('controller' => 'Projects', 'action' => 'showdetails'),
    array('pass' => array('id')
));
Router::connect('/projects/create',
    array('controller' => 'Projects', 'action' => 'create')
);
Router::connect('/clients/create',
    array('controller' => 'Clients', 'action' => 'create')
);
Router::connect('/clients/edit/:id',
    array('controller' => 'Clients', 'action' => 'edit'),
    array('pass' => array('id')
));
Router::connect('/projects/edit/:id',
    array('controller' => 'Projects', 'action' => 'edit'),
    array('pass' => array('id')
));
Router::connect('/clients/delete/:id',
    array('controller' => 'Clients', 'action' => 'delete'),
    array('pass' => array('id')
));
Router::connect('/projects/delete/:id',
    array('controller' => 'Projects', 'action' => 'delete'),
    array('pass' => array('id')
));

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
