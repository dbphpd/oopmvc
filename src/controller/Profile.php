<?php

/**
 * @Author: junnotarte
 * @Date:   2020-08-01 14:27:41
 * @Last Modified by:   Felix Notarte
 * @Last Modified time: 2020-08-29 15:02:02
 */

use Ecommerce\Template;
use Ecommerce\Model\Profile_model;

class Profile extends Template {

	private $profileDb;

	function __construct(){
		$this->profileDb = new Profile_model();
	}

	public function index() {

	}


	public function ajax_add() {
		$this->profileDb->setFirstName('first name')
						->setLastName('last name')
						->setEmail('email@neweamil.com');
		echo $this->profileDb->_insert();

	} 


}