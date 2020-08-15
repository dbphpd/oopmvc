<?php

/**
 * @Author: junnotarte
 * @Date:   2020-08-01 14:15:35
 * @Last Modified by:   junnotarte
 * @Last Modified time: 2020-08-01 14:21:15
 */


function systemPath (string $folder) : string {
	return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			'src' . DIRECTORY_SEPARATOR .$folder . DIRECTORY_SEPARATOR;
}



function baseUrl() : string {
	return 'http://localhost/';
}