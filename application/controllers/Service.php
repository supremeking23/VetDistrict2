<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		 $this->load->helper(array('form', 'url'));

		 //for reading.. retrieving
		$this->load->model('admin_model');

		//for creating
		$this->load->model('create_model');
		//for updating
		$this->load->model('update_model');

		//for system settings
		$this->load->model('system_settings_model');
	}



	public function create_new_servicetype(){
		

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


			$data = array(

				'servicetype_name' => $this->input->post('new_service_type'),

				'servicetype_description' => $this->input->post('service_type_description'),
			);
			//Transfering data to Model
			$this->create_model->create_servicetype($data);

			/*print_r($data);
			print_r($this->input->post());*/


			$this->session->set_flashdata('add_servicetype_success','Service type has been added successfully');
	      	
	      	redirect('admin/services');
	}




	public function create_new_service(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



			$data = array(

				'servicetype_id' => $this->input->post('service_type'),

				'service_name' =>$this->input->post('service_name'),

				'price' => $this->input->post('service_price'),


				'service_description' => $this->input->post('service_description'),


				'is_active' => 0,
			);


			$this->create_model->create_service($data);



			//print_r($this->input->post());

			$this->session->set_flashdata('add_service_success','Service  has been added successfully');
	      	
	      	redirect('admin/services');
	}



	public function change_service_state(){
		
		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}
		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session //for sidebar
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

		//password of the currently login user
		$password_confirmation = $this->input->post('password_confirmation');

		$service_id = $this->input->post('service_id');
		$current_state = $this->input->post('current_state');

		$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//change the state of the selected admin
       				if($current_state ==  1){
       					//echo "change it to 0";
       					$state_data = array(

       						'is_active' => 0,
       					);


       					$this->update_model->update_state_service($service_id,$state_data);

       					$this->session->set_flashdata('service_state','Service State has been successfully updated');

       				}else{
       					//echo "change it to 1";

       					$state_data = array(

       						'is_active' => 1,
       					);


       					$this->update_model->update_state_service($service_id,$state_data);

       					$this->session->set_flashdata('service_state','Service State has been successfully updated');

       					
       				}


       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}



       			redirect('admin/services');

	}


}