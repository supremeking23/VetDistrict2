<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Taipei');
		$this->load->model('admin_model');
	}

	public function login(){
		$this->load->view('admin/login');
	}

	public function dashboard(){
		$data['data'] ="";
		
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layouts/sidebar.php');

		
	}



	public function employees(){
		$this->load->view('admin/employee');
		$this->load->view('admin/layouts/sidebar.php');

		
	}

	public function products(){

		//for drug_type
		//$this->load->model('Admin_Model');
		$data['drug_types'] = $this->admin_model->get_all_drug_type();


		//unit of measurement
		/*$data['unitofmeasurements'] = array(
			 "Ampule",
			 "Bottle",
		);*/
		
		$this->load->view('admin/product',$data);
		$this->load->view('admin/layouts/sidebar.php');

		
	}



	public function wow(){
		echo "wow";
	}


	//add new product in the database
	/*public function add_product(){

		$data['success'];
		redirect('admin/customers/',$data);
	}*/


	public function customers(){
		$data['customers'] = $this->admin_model->get_all_customer();


		$data['count_all_customer'] = $this->admin_model->get_count_all_customer();
		$data['count_male_customer'] = $this->admin_model->get_count_male_customer();
		$data['count_female_customer'] = $this->admin_model->get_count_female_customer();


		$this->load->view('admin/customer',$data);
		$this->load->view('admin/layouts/sidebar.php');
	}

	public function pets(){
		$this->load->view('admin/pets');
		$this->load->view('admin/layouts/sidebar.php');
	}


	public function customer_details($id){
		$data['id'] = $id;
		$this->load->view('admin/customer_details',$data);
		$this->load->view('admin/layouts/sidebar.php');
	}
}
