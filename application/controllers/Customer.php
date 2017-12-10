<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function customers(){
		$this->load->view('customer/customers');
	}


	public function dashboard(){
		$this->load->view('customer/dashboard');
	}

	public function signup(){
		$this->load->view('customer/signup');
	}

	public function login(){
		$this->load->view('customer/login');
	}



	
}
