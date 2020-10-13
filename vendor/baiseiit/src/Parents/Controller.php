<?php

use Views\View;

Class Controller {
	public $view;

	public function __construct() {			
		$this->view = new View();
	}
}