<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {


	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		

		//for system settings
		$this->load->model('system_settings_model');


	}

	
	public function index(){

		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();

		$this->load->view('public/index',$data);
	}


	
}
