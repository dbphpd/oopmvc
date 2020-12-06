<?php

/**
 * @Author: junnotarte
 * @Date:   2020-08-01 13:45:22
 * @Last Modified by:   Felix Notarte
 * @Last Modified time: 2020-09-05 13:43:59
 */


error_reporting(E_ALL);
ini_set('display_errors', 1);


$configDir = 'src/config';
$configFolder    = scandir($configDir);

foreach ($configFolder as $configFile) {
	if (!in_array($configFile, ['.', '..']))
		require_once $configDir . DIRECTORY_SEPARATOR . $configFile;
}


require_once 'src/helper.php';
require_once 'src/Routes.php';
require_once 'src/Template.php';
require_once 'src/Model.php';

require_once 'src/models/Profile_model.php';


use Ecommerce\Routes;

$routes = new Routes();
$routes->loadController();
