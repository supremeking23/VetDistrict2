<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function dashboard(){
		$this->load->view('admin/dashboard');
	}



	public function customer(){
		$this->load->view('admin/customer');
	}


	public function customer_details($id){
		$data['id'] = $id;
		$this->load->view('admin/customer_details',$data);
	}
}
