<?php

class HomeController extends HnSController {

	function beforeAction($query=null) {
		if (isset($query) && $query != "") $this->set('query',$query);
		// determine authentication
		// if not on home page redirect to homepage and show logged out version
		
		$status = $this->Home->search();
		$this->set('logged',$status);
	}

	function index() {

	}

	function auth($type=null) {
		if (isset($type)) {
			switch ($type) {
				case 'login':

				break;
				case 'logout':

				break;
				case 'signup':

				break;
			}
		}
	}

	function afterAction() {

	}

}