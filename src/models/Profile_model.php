<?php

/**
 * @Author: Felix Notarte
 * @Date:   2020-08-23 13:34:58
 * @Last Modified by:   Felix Notarte
 * @Last Modified time: 2020-12-06 14:57:26
 */

namespace Ecommerce\Model;
use Ecommerce\Model;

class Profile_model extends Model {
	
	private $first_name;
	private $last_name;
	private $email;
	private $id;


	public function setFirstName(string $firstName) {
		$this->first_name = $firstName;
		return $this;
	}

	public function setLastName(string $lastName) {
		$this->last_name = $lastName;
		return $this;
	}

	public function setEmail(string $email) {
		$this->email = $email;
		return $this;
	}


	public function getEmail():string {
		return $this->email;
	}

	public function getLastName():string {
		return $this->last_name;
	}

	public function getFirstName():string {
		return $this->first_name;
	}

	public function getId():integer {
		return $this->id; 
	}

	public function _insert() {
		$this->insert(get_object_vars($this));
		return $this->inserted_id;
	}


}