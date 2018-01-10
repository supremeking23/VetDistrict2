<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {


	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		 $this->load->helper(array('form', 'url'));

		//for reading.. retrieving
		$this->load->model('customer_model');

		//for creating
		$this->load->model('create_model');
		//for updating
		$this->load->model('update_model');
		//library
		$this->load->library('form_validation');
	}


	public function login(){


		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');


		if($this->form_validation->run() === FALSE){
			

			$this->load->view('customer/login');

		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			//search login user with email and password
			$found_customer = $this->customer_model->login_customer($email,$password);


			if($found_customer){
		

				foreach($found_customer as $customer_credentials){
					$user_id =  $customer_credentials->customer_id;
					$email   = 	$customer_credentials->email;
				}



				//creating a session
				$user_data = array(
					'user_id' => $user_id,
					'email' => $email,
					'logged_in' =>true,
				);

				$this->session->set_userdata($user_data);

				redirect('customer/dashboard');


			}else{
				//set errors if the password and email doesnt match
			$this->session->set_flashdata('login_failed','Incorrect Email or Password');
				//die('sds');
				redirect('customer/login');
			}
		}

	}//



	public function sign_out(){
		//$this->login();
		$this->session->sess_destroy();
		redirect('admin/login');
	}


	public function profile(){

		if(!$this->session->userdata('logged_in')){
				redirect('customer/login');
		}

		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_customer_login'] = $this->customer_model->get_customer_by_id($user_id);


		//$data['id'] = $id;

			/*
			*	The segment numbers would be this:
			*  	1 news
				2 local
				3 metro
				4 crime_is_up
			*/

		$id = $user_id;

		$data['show_customer_details'] = $this->customer_model->get_customer_by_id($id);

		
		
		$this->load->view('customer/profile',$data);
		$this->load->view('customer/layouts/sidebar.php',$data);
		

	}


	//----------------------//for updating profile-----------------------------------

	//update profile pic

	public function update_profile_pic(){
		//print_r($this->input->post());

		if(!$this->session->userdata('logged_in')){
				redirect('customer/login');
		}

		$user_id = $this->session->userdata('user_id');

		//check if password is correct
		$password = $this->input->post('password');

		$check_password = $this->customer_model->get_customer_by_id_and_password($user_id,$password);



		if($check_password){


			//config for upload image
			$config['upload_path']          = './uploads/customer_image/';
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

		    $this->update_model->update_customer($user_id,$data);


		    $this->session->set_flashdata('update_pic_success','Your picture has been updated successfully');
	   
			redirect('customer/profile');

		}else{

			//wrong password
			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	   
			redirect('customer/profile');
		}

	}



	//update email


	public function update_email(){

		if(!$this->session->userdata('logged_in')){
				redirect('customer/login');
		}

		$user_id = $this->session->userdata('user_id');



		//check if password is correct
		$password = $this->input->post('password');

		$check_password = $this->customer_model->get_customer_by_id_and_password($user_id,$password);



		if($check_password){

		    //preparing for update

		    $data = array(

		    	'email' => $this->input->post('new_email'),
		    );

		    $this->update_model->update_customer($user_id,$data);


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
				redirect('customer/login');
		}

		$user_id = $this->session->userdata('user_id');

		//check if new password and confirm password are match

		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');


		if($new_password != $confirm_password){
			 $this->session->set_flashdata('password_mismatch_error','New password and confirm password doesnt match');
			redirect('customer/profile');
			exit;
		}


		//check if password is correct
		$password = $this->input->post('old_password');

		$check_password = $this->customer_model->get_customer_by_id_and_password($user_id,$password);



		if($check_password){

		    //preparing for update

		    $data = array(

		    	'password' => $confirm_password,
		    );

		    $this->update_model->update_customer($user_id,$data);


		    $this->session->set_flashdata('update_password_success','Your password has been updated successfully');
	   
			redirect('customer/profile');

		}else{

			//wrong password
			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	   
			redirect('customer/profile');
		}

	}




	//-------------------LEGEND------------------//

		/*
		NAVIGATION MAIN 

		*/


	public function dashboard(){
		//$data['data'] ="";


		if(!$this->session->userdata('logged_in')){
				redirect('customer/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_customer_login'] = $this->customer_model->get_customer_by_id($user_id);

		//total number of appointments

		//total number of pets

		$data['count_pets'] =  $this->customer_model->get_count_all_pet_by_customer_id($user_id);

		//total number of purchase product
		

		$this->load->view('customer/dashboard',$data);
		$this->load->view('customer/layouts/sidebar.php',$data);

	}





	public function pets(){

		if(!$this->session->userdata('logged_in')){
				redirect('customer/login');
		}

		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_customer_login'] = $this->customer_model->get_customer_by_id($user_id);

		//get customers pets
		$data['customers_pets'] = $this->customer_model->get_pet_data_by_customer_id($user_id);

		$this->load->view('customer/pet',$data);
		$this->load->view('customer/layouts/sidebar.php',$data);
	}




	public function pet_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('customer/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
		$data['current_customer_login'] = $this->customer_model->get_customer_by_id($user_id);

			//$data['id'] = $id;

				/*
				*	The segment numbers would be this:
				*  	1 news
					2 local
					3 metro
					4 crime_is_up
				*/

			 $id = $this->uri->segment(3);

			$data['show_pet_details'] = $this->customer_model->get_complete_pet_info_by_id($id);

			foreach($data['show_pet_details'] as $d){
				 $pet_id = $d->pettype_id;
			}

		
			//$data['pet_breeds'] = $this->admin_model->get_all_pet_breed_by_type_id($pet_id);

			

			$this->load->view('customer/pet_details',$data);
			$this->load->view('customer/layouts/sidebar.php',$data);
			//print_r($data);
	}










	
}



