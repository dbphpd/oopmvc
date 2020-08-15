<?php

/**
 * @Author: junnotarte
 * @Date:   2020-08-01 15:00:23
 * @Last Modified by:   junnotarte
 * @Last Modified time: 2020-08-01 15:59:25
 */
namespace Ecommerce;

class Template {

	private $pageTemplate = '_htmlbody.php';
	private $customJs  = [];
	private $customCss  = [];

	private $title = '';

	function __construct() {}

	public function loadView(string $template, array $renderData = []) {
		$title = $this->title;
		$customJs = $this->customJs;
		$customCss = $this->customCss;
		$data = $renderData;
		$partialFile = $this->getPartial($template);
		$directoryPath = systemPath('views');

		require_once $directoryPath . $this->pageTemplate;
	}

	public function getPartial(string $template) : string {
		$directoryPath = systemPath('views');
		return $directoryPath.$template.'.php';

	}

	public function setTitle(string $title) {
		$this->title = $title;
		return $this;
	}

	public function setJS(array $filenames) {
		$this->customJs = $filenames;
		return $this;
	}


	public function setCSS(array $filenames) {
		$this->customCSS = $filenames;
		return $this;
	}



}