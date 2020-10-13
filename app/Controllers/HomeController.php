<?php

use App\Models\User;

class HomeController extends Controller {

	public function example($request) {

		$this->view->set('title', 'Baiseiit');
		$this->view->render('home');
	}
}
