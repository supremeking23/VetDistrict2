<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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

		//library
		$this->load->library('form_validation');

		//for system settings
		$this->load->model('system_settings_model');


		//for appointment
		$this->load->model('appointment_model');
	}



	public function login(){

			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');


			if($this->form_validation->run() === FALSE){
				//beginning of the load
				//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();
				$this->load->view('employee/login',$data);

				


			}else{
				//die('continue');

				//get u email and password when the form is submitted
				$email = $this->input->post('email');
				$password = $this->input->post('password');


				//search login user with email and password
				$found_employee = $this->employee_model->login_employee($email,$password);


				if($found_employee){
					//redirect('admin/dashboard');



					foreach($found_employee as $employee_credentials){
						$user_id =  $employee_credentials->employee_id;
						$email = 	$employee_credentials->email;
						$employee_type = $employee_credentials->employee_type;
					}



					//creating a session
					$user_data = array(
						'user_id' => $user_id,
						'email' => $email,
						'logged_in' =>true,
						'employee_type' => $employee_type,
					);

					$this->session->set_userdata($user_data);

					redirect('employee/dashboard');


				}else{
					//set errors if the password and email doesnt match
				$this->session->set_flashdata('login_failed','Incorrect Email or Password');
					//die('sds');
					redirect('employee/login');
				}
			}


	}


	public function sign_out(){
		//$this->login();
		$this->session->sess_destroy();
		redirect('employee/login');
	}



	public function profile(){

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}

		$user_id = $this->session->userdata('user_id');
		$data['employee_type'] = $this->session->userdata('employee_type');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

		//$data['id'] = $id;

			/*
			*	The segment numbers would be this:
			*  	1 news
				2 local
				3 metro
				4 crime_is_up
			*/

		$id = $user_id;

		$data['show_employee_details'] = $this->employee_model->get_employee_by_id($id);

		
		
		$this->load->view('employee/profile',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
		

	}



		//----------------------//for updating profile-----------------------------------

	//update profile pic

	public function update_profile_pic(){
		//print_r($this->input->post());

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}

		$user_id = $this->session->userdata('user_id');

		//check if password is correct
		$password = $this->input->post('password');

		$check_password = $this->employee_model->get_employee_by_id_and_password($user_id,$password);



		if($check_password){


			//config for upload image
			$config['upload_path']          = './uploads/employee_image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        //$config['max_size']             = 100;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;
			$this->load->library('upload', $config);


			if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
		        $uploadData = $this->upload->data();
		        $image = $uploadData['file_name'];
		        //echo 1;
		        //echo "ivan";
		    }


		    //preparing for update

		    $data = array(

		    	'image' => $image,
		    );

		    $this->update_model->update_employee($user_id,$data);


		    $this->session->set_flashdata('update_pic_success','Your picture has been updated successfully');
	   
			redirect('employee/profile');

		}else{

			//wrong password
			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	   
			redirect('employee/profile');
		}

	}


		//update email


	public function update_email(){

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}

		$user_id = $this->session->userdata('user_id');



		//check if password is correct
		$password = $this->input->post('password');

		$check_password = $this->customer_model->get_employee_by_id_and_password($user_id,$password);



		if($check_password){

		    //preparing for update

		    $data = array(

		    	'email' => $this->input->post('new_email'),
		    );

		    $this->update_model->update_employee($user_id,$data);


		    $this->session->set_flashdata('update_email_success','Your email has been updated successfully');
	   
			redirect('customer/profile');

		}else{

			//wrong password
			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	   
			redirect('customer/profile');
		}

	}



		// update password
	public function update_password(){

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}

		$user_id = $this->session->userdata('user_id');

		//check if new password and confirm password are match

		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');


		if($new_password != $confirm_password){
			 $this->session->set_flashdata('password_mismatch_error','New password and confirm password doesnt match');
			redirect('employee/profile');
			exit;
		}


		//check if password is correct
		$password = $this->input->post('old_password');

		$check_password = $this->employee_model->get_employee_by_id_and_password($user_id,$password);



		if($check_password){

		    //preparing for update

		    $data = array(

		    	'password' => $confirm_password,
		    );

		    $this->update_model->update_employee($user_id,$data);


		    $this->session->set_flashdata('update_password_success','Your password has been updated successfully');
	   
			redirect('employee/profile');

		}else{

			//wrong password
			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	   
			redirect('employee/profile');
		}

	}


	//-------------------LEGEND------------------//


	/*
		NAVIGATION MAIN 
		AJAX REQUEST
		DETAILS PAGES
		CREATE PAGES
		UPDATE PAGES
		UPDATE STATE PAGES 



	*/



// ------------------------------------ NAVIGATION MAIN ------------------------------------ //

	public function dashboard(){


		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}

		$user_id = $this->session->userdata('user_id');
		$email = $this->session->userdata('email');
	 	$data['employee_type'] = $this->session->userdata('employee_type');

		//echo "welcome " . $email;


		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();


		$data['count_all_employee'] = $this->employee_model->get_count_all_employee();

		//total count of medicine and item in product tbl not in inventory
		$data['count_all_items'] = $this->employee_model->get_count_all_item();

		$data['count_all_meds'] = $this->employee_model->get_count_all_meds();

		$data['count_all_customer'] = $this->employee_model->get_count_all_customer();

		$data['count_all_pet'] = $this->employee_model->get_count_all_pet();



		$data['customers'] = $this->employee_model->get_all_customer();
		$data['pet_type'] = $this->employee_model->get_all_pet_type();
		$data['pets'] = $this->employee_model->get_all_pets_with_there_customers();
		
		$this->load->view('employee/dashboard',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);

	}



	public function appointments(){

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);
		//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



		 $data['appointments'] = $this->appointment_model->get_all_appointments();
		

		 $data['customers'] = $this->employee_model->get_all_customer();

		$this->load->view('employee/appointments',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
	}


	public function customers(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}



			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

			
			$data['get_system_settings'] = $this->system_settings_model->get_system_settings();


			$data['customers'] = $this->employee_model->get_all_customer();


			$data['count_all_customer'] = $this->employee_model->get_count_all_customer();
			$data['count_male_customer'] = $this->employee_model->get_count_male_customer();
			$data['count_female_customer'] = $this->employee_model->get_count_female_customer();


			$this->load->view('employee/customer',$data);
			$this->load->view('employee/layouts/sidebar.php',$data);
	}





//--------------------------------- DETAILS PAGES ----------------------------///////

	public function customer_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}

		
			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);



		/*
			*	The segment numbers would be this:
			*  	1 news
				2 local
				3 metro
				4 crime_is_up
		*/

		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['show_customer_details'] = $this->employee_model->get_customer_by_id($id);
		$this->load->view('employee/customer_details',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
	}



	public function pet_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

			//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();

			//$data['id'] = $id;

				/*
				*	The segment numbers would be this:
				*  	1 news
					2 local
					3 metro
					4 crime_is_up
				*/

			$id = $this->uri->segment(3);

			$data['show_pet_details'] = $this->employee_model->get_complete_pet_info_by_id($id);

			foreach($data['show_pet_details'] as $d){
				 $pet_id = $d->pettype_id;
			}

			$data['customers'] = $this->employee_model->get_all_customer();
			$data['pet_types'] = $this->employee_model->get_all_pet_types_for_dropdown();

			$data['pet_breeds'] = $this->employee_model->get_all_pet_breed_by_type_id($pet_id);

			$this->load->view('employee/pet_details',$data);
			$this->load->view('employee/layouts/sidebar.php',$data);
			//print_r($data);


			/*foreach($data['pet_breeds'] as $d){
				echo $pet_breed = $d->breed;
			}*/
			

			/*foreach($data['pet_types'] as $d){
				echo $d->pettype_id;
			}*/
			//echo  $this->uri->segment(3);

	}

}