<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_Controller extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('create_model');


		date_default_timezone_set('Asia/Taipei');
	}


	public function create_new_customer(){
		//$this->load->library('form_validation');

		//creating new customer will not include image upload
		//default image will be guest2.jpg for new customer

		//preparing the data to be uploaded to database

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $this->input->post('middle_name'),
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
			'date_birth' => $this->input->post('date_birth'),
			'telephone' => $this->input->post('telephone'),
			'cellphone' => $this->input->post('cellphone'),
			'address' => $this->input->post('address'),
			'email' => $this->input->post('email'),
			'password' =>$this->input->post('password'),
			'is_active' => 1,
			'date_added' => time()
		);


		//Transfering data to Model
		$this->create_model->create_customer($data);
	

		$this->session->set_flashdata('add_customer_success','Customer has been added');
      redirect('admin/customers');




	}

}