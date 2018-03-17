<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pet_Diagnosis extends CI_Controller {

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		 $this->load->helper(array('form', 'url'));

		//for reading.. retrieving
		$this->load->model('employee_model');

		//for creating
		$this->load->model('create_model');
		//for updating
		$this->load->model('update_model');

		//for system settings
		$this->load->model('system_settings_model');


		//for services
		$this->load->model('service_model');


		//inventory
		$this->load->model('inventory_model');

		//sales
		$this->load->model('sales_model');

		//pos
		$this->load->model('pos_model');

		//appointment
		$this->load->model('appointment_model');

		//isama na natin ung admin model para hindi hussle
		$this->load->model('admin_model');


		$this->load->model('diagnosis_model');
		//library
		$this->load->library('form_validation');
	}




	public function add_pet_diagnosis(){
		print_r($this->input->post());

		$now = date('Y-m-d H:i:s');
		$diagnosis_data_id = 'D'.date("ymdhis") . abs(rand('0','9'));
		$data = array(
		'diagnosis_data_id' => $diagnosis_data_id,
		'pet_id' => $this->input->post('pet_id'),
		'pet_data_id' => $this->input->post('pet_data_id'),
		'employee_user_id' => $this->input->post('employee_user_id'),
		'customer_user_id' => $this->input->post('customer_user_id'),
		'subject' => $this->input->post('subject'),
		'objective' => $this->input->post('objective'),
		'assessment' => $this->input->post('assessment'),
		'plan' => $this->input->post('plan'),
		'diagnosis_date' => $now,
		'body_weight' => $this->input->post('body_weight'),
		'body_temperature' => $this->input->post('body_temp'),
		'service_fee' =>$this->input->post('vet_pet_service'),
		);


		$this->diagnosis_model->create_diagnosis($data);

		$this->session->set_flashdata('create_diagnosis','Diagnosis information has been updated');


		redirect('employee/pets_diagnosis');

	}



	public function print(){
		$id = $this->uri->segment(3);

		//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();
		

		$data['medical_record_details'] = $this->diagnosis_model->get_all_diagnosis_by_diagnosis_id($id);

		//$id = $this->uri->segment(3);


		$this->load->view('shared/print_medical_record',$data);
	}

}