<?php

/**
 * @Author: Felix Notarte
 * @Date:   2020-08-23 13:34:58
 * @Last Modified by:   Felix Notarte
 * @Last Modified time: 2020-08-23 14:05:27
 */

namespace Ecommerce;

use Ecommerce\Model;


class Profile extends Model {
	
	function __construct() {}

	public function getRecords() : array
	{
		$data = $this->setQuery('Select * from profile')->getRows();


		$data['first_name'] = 'asdfsad';
		$id = $model->insert('table', $data);

	}



}