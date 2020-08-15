<?php

/**
 * @Author: junnotarte
 * @Date:   2020-08-01 13:45:22
 * @Last Modified by:   junnotarte
 * @Last Modified time: 2020-08-01 16:18:18
 */


error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'src/helper.php';
require_once 'src/Routes.php';
require_once 'src/Template.php';

use Ecommerce\Routes;

$routes = new Routes();
$routes->loadController();