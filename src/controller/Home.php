<?php

/**
 * @Author: junnotarte
 * @Date:   2020-08-01 14:27:41
 * @Last Modified by:   junnotarte
 * @Last Modified time: 2020-08-01 16:12:35
 */

use Ecommerce\Template;

class Home extends Template{

	public function index() {

		$this->setTitle('Home Screen')
			->setJs(['script.js'])
			->loadView('home/body');

	}

	public function about() {
		$this->setTitle('About Us')
			->loadView('home/about');		
	}
}