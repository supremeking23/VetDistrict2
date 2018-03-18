<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {


	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		$this->load->model('admin_model');

		//for system settings
		$this->load->model('system_settings_model');
		$this->load->model('pos_model');

	}

	
	public function index(){

		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();


		$data['image_gallery'] = $this->system_settings_model->get_all_image_gallery();

		//services
		$data['services'] = $this->pos_model->get_all_service_type();

		$data['vets'] = $this->admin_model->get_all_vets();

		$this->load->view('public/index',$data);
	}


	
}
