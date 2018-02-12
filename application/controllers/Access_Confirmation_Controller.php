<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_Confirmation_Controller extends CI_Controller {

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


		//library
		$this->load->library('form_validation');
	}



	public function delete_background_admin(){


       	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session //for sidebar
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//admin_id that you want to change state
       			$admin_id = $this->input->post('admin_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			


       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//remove admin background image
       				$background = "";
       				$data = array(

       					'login_photo_admin' => $background,
       				);

       				$system_id =  $this->input->post('system_id');
       				$this->admin_model->update_settings($system_id,$data);

       				$this->session->set_flashdata('update_system_setting_success','System settings has been updated');
       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}

       			

	       			redirect('admin/settings');
	       			//print_r($this->input->post());
   
    }


    public function delete_background_employee(){


       	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session //for sidebar
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//admin_id that you want to change state
       			$admin_id = $this->input->post('admin_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			


       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//remove admin background image
       				$background = "";
       				$data = array(

       					'login_photo_employee' => $background,
       				);

       				$system_id =  $this->input->post('system_id');
       				$this->admin_model->update_settings($system_id,$data);

       				$this->session->set_flashdata('update_system_setting_success','System settings has been updated');
       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}

       			

	       			redirect('admin/settings');
	       			//print_r($this->input->post());
   
    }



    public function delete_background_customer(){


       	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session //for sidebar
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//admin_id that you want to change state
       			$admin_id = $this->input->post('admin_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			


       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//remove admin background image
       				$background = "";
       				$data = array(

       					'login_photo_customer' => $background,
       				);

       				$system_id =  $this->input->post('system_id');
       				$this->admin_model->update_settings($system_id,$data);

       				$this->session->set_flashdata('update_system_setting_success','System settings has been updated');
       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}

       			

	       			redirect('admin/settings');
	       			//print_r($this->input->post());
   
    }




}
