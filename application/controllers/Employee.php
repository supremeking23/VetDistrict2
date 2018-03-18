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

					if($employee_type == "staff"){
						redirect('employee/pos');
					}else{
						redirect('employee/pets_diagnosis');
					}

					


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

		
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();

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

		$check_password = $this->employee_model->get_employee_by_id_and_password($user_id,$password);



		if($check_password){

		    //preparing for update

		    $data = array(

		    	'email' => $this->input->post('new_email'),
		    );

		    $this->update_model->update_employee($user_id,$data);


		    $this->session->set_flashdata('update_email_success','Your email has been updated successfully');
	   
			redirect('employee/profile');

		}else{

			//wrong password
			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	   
			redirect('employee/profile');
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

	public function pos(){

		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');
		$email = $this->session->userdata('email');
	 	$data['employee_type'] = $this->session->userdata('employee_type');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

		
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();


		$data['customers'] = $this->employee_model->get_all_customer();

		//items
		$data['items'] = $this->pos_model->get_all_active_items();

		//medicines
		$data['medicines'] = $this->pos_model->get_all_active_medicine();

		//services
		$data['services'] = $this->pos_model->get_all_active_services_details();

		$this->load->view('employee/pos',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
		

	}



	public function appointments(){

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');
		$email = $this->session->userdata('email');
	 	$data['employee_type'] = $this->session->userdata('employee_type');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

		
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


	public function pets(){

			if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}



			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

			
			$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



			$data['pets'] = $this->admin_model->get_all_pets_with_there_customers();
			$data['count_all_pet'] = $this->admin_model->get_count_all_pet();

			$data['customers'] = $this->admin_model->get_all_customer();
			$data['pet_type'] = $this->admin_model->get_all_pet_type();


			$this->load->view('employee/pets',$data);
			$this->load->view('employee/layouts/sidebar.php',$data);
	}
	

	//for veterinarians only
	public function pets_diagnosis(){

			if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}
			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

			
			$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



			$data['pets'] = $this->admin_model->get_all_pets_with_there_customers_for_veterinarian();
			$data['pet_type'] = $this->admin_model->get_all_pet_type();


			$data['service_type'] = $this->pos_model->get_all_service_type();


			$this->load->view('employee/pets_diagnosis',$data);
			$this->load->view('employee/layouts/sidebar.php',$data);
	}


		//ajax request
	public function get_all_services_by_service($id){
 		$id = $id;
        $result = $this->db->where("servicetype_id",$id)->get("tblservices")->result();
        echo json_encode($result);
	}


	public function get_all_services_by_service_id($id){
 		$id = $id;
        $result = $this->db->where("service_id",$id)->get("tblservices")->result();
        echo json_encode($result);
	}



	public function items(){
		//$data['type'] = $this->admin_model->get_all_pet_type();
		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}



			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);
			//previous settings
			$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



			$data['items'] = $this->admin_model->get_all_item();


			$data['count_all_items'] = $this->admin_model->get_count_all_item();



		


		$this->load->view('employee/items',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
	}


	public function medicines(){
		//$data['type'] = $this->admin_model->get_all_pet_type();

		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);
			//previous settings
			$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



		$data['medicines'] = $this->admin_model->get_all_medicine();


		$data['count_all_meds'] = $this->admin_model->get_count_all_meds();



		$data['drug_type'] = $this->admin_model->get_all_drug_type();


		$this->load->view('employee/medicines',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
	}



	public function sales(){

		
		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');
		$email = $this->session->userdata('email');
	 	$data['employee_type'] = $this->session->userdata('employee_type');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);
		//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();


		$data['get_all_sales'] = $this->sales_model->get_all_sales_report();


		

		//not use... duga mode on the way
		//$data['get_all_sales'] = $this->sales_model->get_all_sales_report_by_sales_id();
		

		$this->load->view('employee/sales_report',$data);
		$this->load->view('employee/layouts/sidebar.php',$data);
	}



	public function inventory(){

		
		if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');
		$email = $this->session->userdata('email');
	 	$data['employee_type'] = $this->session->userdata('employee_type');

		//get user_id via $user_id session
		$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);
		//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



		//get all inventory item details
		$data['item_inventory'] = $this->inventory_model->get_all_inventory_details_for_items();

		$data['medicine_inventory'] = $this->inventory_model->get_all_inventory_details_for_medicines();

		$this->load->view('employee/inventory_report',$data);
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

			//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();



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



	public function update_customer_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
		}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);




				//config for upload image
					$config['upload_path']          = './uploads/customer_image/';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
			        //$config['max_size']             = 100;
			       // $config['max_width']            = 1024;
			       // $config['max_height']           = 768;
					$this->load->library('upload', $config);


					$customer_id = $this->input->post('customer_id');


					if($this->upload->do_upload('upload_image')){
				    	//get the file name of the uploaded file
				        $uploadData = $this->upload->data();
				        $image = $uploadData['file_name'];
				        //echo 1;
				        //echo "ivan";
				        }else{
				        	//echo 'wala laman';
				        	//set the image name to the previously upload image
				        	$default_image_name = $this->admin_model->get_customer_by_id($customer_id);
				           	foreach ($default_image_name as $default_image) {
				           			   $image = $default_image->image; 
							
				           }
							


				           //$image ='';
				           			 
				           echo 12;		 
				           echo "dsds";	


				           //check for errors
				          /* $error = array('error' => $this->upload->display_errors());

			                $this->load->view('file_view', $error);*/
				        }


			        	 
			        	//preparing the data to be uploaded to database
						//key value pair key is the column name value is the input type value
			        	$data = array(
			        		
			        		'first_name' => $this->input->post('first_name'),
			        		'middle_name' => $this->input->post('middle_name'),
			        		'last_name' => $this->input->post('last_name'),
			        		'email' => $this->input->post('email'),
			        		'cellphone' => $this->input->post('cellphone'),
			        		'telephone' => $this->input->post('telephone'),
			        		'address' => $this->input->post('address'),
			        		'image' =>  $image,
			        		'gender' => $this->input->post('gender'),
			        		'date_birth' => $this->input->post('date_birth'),

			        	);



			        			//Transfering data to Model
							$this->update_model->update_customer($customer_id,$data);
							$this->session->set_flashdata('update_customer_success','Customer information has been updated');
							
			        		echo $customer_id;
			        		redirect('employee/customer_details/'.$customer_id);

        	
	} //end update CUSTOMER


	public function update_customer_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			//$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//id that you want to change state
       			$customer_id = $this->input->post('customer_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			$current_state = $this->input->post('current_state');

       			//check to see if the admin and password are match
       			$check_password = $this->admin_model->get_employee_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){

       				//change the state of the selected admin

       				if($current_state ==  1){
       					//echo "change it to 0";
       					$state_data = array(

       						'is_active' => 0,
       					);


       					$this->update_model->update_state_for_customer($customer_id,$state_data);

       					$this->session->set_flashdata('change_state','Customer State has been successfully updated');

       				

       				}else{
       					//echo "change it to 1";

       					$state_data = array(

       						'is_active' => 1,
       					);


       					$this->update_model->update_state_for_customer($customer_id,$state_data);


       					$this->session->set_flashdata('change_state','Customer State has been successfully updated');
       					
       				}




       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}

	       			redirect('employee/customer_details/'.$customer_id);
	       			//print_r($this->input->post());
   
    }




	public function pet_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

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
				//must be pettype_id
				 $pet_id = $d->pettype_id;
			}

			$data['customers'] = $this->employee_model->get_all_customer();
			$data['pet_types'] = $this->employee_model->get_all_pet_types_for_dropdown();

			$data['pet_breeds'] = $this->employee_model->get_all_pet_breed_by_type_id($pet_id);


			//pet diagnosis
			 $data['pets_diagnosis'] = $this->diagnosis_model->get_all_diagnosis_by_pet_id($id);


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


	public function update_pet_details(){

    	if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
		}


		$user_id = $this->session->userdata('user_id');

				//print_r($this->input->post());


	       		 //config for upload image
			$config['upload_path']          = './uploads/pet_image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        //$config['max_size']             = 100;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;
			$this->load->library('upload', $config);


			$pet_id = $this->input->post('pet_id');


			if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
		        $uploadData = $this->upload->data();
		        $image = $uploadData['file_name'];
		        //echo 1;
		        //echo "ivan";
		        }else{
		        	//echo 'wala laman';
		        	//set the image name to the previously upload image
		        	$default_image_name = $this->admin_model->get_pet_data_by_pet_id($pet_id);
		           	foreach ($default_image_name as $default_image) {
		           			   $image = $default_image->pet_image; 
					
		           	}
					


		           //$image ='';
		           			 
		           echo 12;		 
		           echo "dsds";	


		           //check for errors
		          /* $error = array('error' => $this->upload->display_errors());

	                $this->load->view('file_view', $error);*/
		        }


	        	 
	        	//preparing the data to be uploaded to database
				//key value pair key is the column name value is the input type value
	        	$data = array(
	        		
	        		'customer_id' => $this->input->post('customer'),

	        		'pet_name' => $this->input->post('pet_name'),
	        		'pet_type' => $this->input->post('pet_type'),
	        		'pet_breed' => $this->input->post('breed'),
	        		'gender' => $this->input->post('gender'),
	        		'date_birth' => $this->input->post('date_birth'),
	        		'pet_size' => $this->input->post('pet_size'),
	        		
	        		'pet_image' =>  $image,
	        		
	        		

	        	);



	        			//Transfering data to Model
					$this->update_model->update_pet($pet_id,$data);
					$this->session->set_flashdata('update_pet_success','Pet information has been updated');
					
	        		echo $pet_id;
	        		redirect('employee/pet_details/'.$pet_id);
    
    }



    public function update_pet_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			//$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//id that you want to change state
       			$pet_id = $this->input->post('pet_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			$current_state = $this->input->post('current_state');

       			//check to see if the admin and password are match
       			$check_password = $this->admin_model->get_employee_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//change the state of the selected admin
       				if($current_state ==  1){
       					//echo "change it to 0";
       					$state_data = array(

       						'is_active' => 0,
       					);


       					$this->update_model->update_state_for_pet($pet_id,$state_data);

       					$this->session->set_flashdata('change_state','Pet State has been successfully updated');

       				

       				}else{
       					//echo "change it to 1";

       					$state_data = array(

       						'is_active' => 1,
       					);


       				$this->update_model->update_state_for_pet($pet_id,$state_data);

       					$this->session->set_flashdata('change_state','Pet State has been successfully updated');
       					
       				}




       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}


	       			redirect('employee/pet_details/'.$pet_id);

    }




	public function update_item_details(){

    	if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
		}


		$user_id = $this->session->userdata('user_id');

				//print_r($this->input->post());


	       		 //config for upload image
			$config['upload_path']          = './uploads/item_image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        //$config['max_size']             = 100;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;
			$this->load->library('upload', $config);


			$item_id = $this->input->post('item_id');
			$inputed_qty = $this->input->post('item_qty');


			if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
		        $uploadData = $this->upload->data();
		        $image = $uploadData['file_name'];
		        //echo 1;
		        //echo "ivan";
		    }else{
		        	//echo 'wala laman';
		        	//set the image name to the previously upload image
		        	$default_image_name = $this->admin_model->get_item_details_by_id_from_tblproductitems($item_id);
		           	foreach ($default_image_name as $default_image) {
		           			   $image = $default_image->image; 
					
		           	}
					


		           //$image ='';
		           			 
		           echo 12;		 
		           echo "dsds";	


		           //check for errors
		          /* $error = array('error' => $this->upload->display_errors());

	                $this->load->view('file_view', $error);*/
		        }



		    //get quantity
		    $get_quantity = $this->admin_model->get_item_details_by_id_from_tblproductitems($item_id);

		    foreach ($get_quantity as $item_qty) {
		           			   $item_qty_in_db = $item_qty->item_qty; 
					
		           	}



		    //echo $get_quantity->item_qty;


		    //preparing the data to be uploaded to database
			//key value pair key is the column name value is the input type value
        	$data = array(
        		
        		'item_name' => $this->input->post('item_name'),

        		'item_price' => $this->input->post('item_price'),
        		'item_qty' => $this->input->post('item_qty'),	
        		'image' =>  $image,

        	);


		//Transfering data to Model
		$this->update_model->update_product_item($item_id,$data);

		if($inputed_qty != $item_qty_in_db){
    		//echo "run second query";
			//mysqli_query($conn,"insert into inventory (userid,action,productid,quantity,inventory_date) values ('".$_SESSION['id']."','Update Quantity', '$id', '$qty', NOW())");

			//for item inventory table


			$get_user_name =  $this->admin_model->get_employee_by_id($user_id);

			foreach ($get_user_name as $user_name) {
					$u_first_name = $user_name->first_name;
					$u_middle_name = $user_name->middle_name;
					$u_last_name = $user_name->last_name;

					 $user_full_name = $u_first_name .' '. $u_middle_name .' '. $u_last_name;
			}


			$employee_type =  $this->session->userdata('employee_type');
			$user_type = $employee_type;
			$action = "Update Quantity";
			$inventory_date = date('Y-m-d H:i:s');
			//$now = date('Y-m-d H:i:s');

			$data = array(
        		
        		'user_type' => $user_type,
        		'user_id' => $user_id,
        		'user_name' => $user_full_name,
        		'action' => $action,
        		'product_item_id' => $item_id,
        		'quantity' => $this->input->post('item_qty'),	
        		'inventory_date' => $inventory_date,

        	);



        	//add row to item inventory

			$this->create_model->create_item_inventory($data);

	    }

	    $this->session->set_flashdata('update_item_success','Product information has been updated');
	    redirect('employee/item_details/'.$item_id);

        //print_r($this->input->post());
    


    }


    public function update_item_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			//$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//id that you want to change state
       			$item_id = $this->input->post('item_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			$current_state = $this->input->post('current_state');

       			//check to see if the admin and password are match
       			$check_password = $this->admin_model->get_employee_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//change the state of the selected admin
       				if($current_state ==  1){
       					//echo "change it to 0";
       					$state_data = array(

       						'is_active' => 0,
       					);


       					$this->update_model->update_state_for_item($item_id,$state_data);

       					$this->session->set_flashdata('change_state','Item State has been successfully updated');

       				

       				}else{
       					//echo "change it to 1";

       					$state_data = array(

       						'is_active' => 1,
       					);


       				$this->update_model->update_state_for_item($item_id,$state_data);

       					$this->session->set_flashdata('change_state','Item State has been successfully updated');
       					
       				}




       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}


	       			redirect('employee/item_details/'.$item_id);

    }



    public function item_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}

			
			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

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

			//get info from productitem table
			$data['show_item_details'] = $this->admin_model->get_item_details_by_id_from_tblproductitems($id);

			

			

			$this->load->view('employee/item_details',$data);
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



	public function med_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}

			$user_id = $this->session->userdata('user_id');
			$email = $this->session->userdata('email');
		 	$data['employee_type'] = $this->session->userdata('employee_type');

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

			//get info from productitem table
			$data['show_med_details'] = $this->admin_model->get_med_details_by_id_from_tblproductmedicines($id);





			//print_r($data['show_med_details']);

			$data['drug_type'] = $this->admin_model->get_all_drug_type();

			$this->load->view('employee/med_details',$data);
			$this->load->view('employee/layouts/sidebar.php',$data);
			//print_r($data);

	}




	public function update_med_details(){

    	if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
		}


		$user_id = $this->session->userdata('user_id');

				//print_r($this->input->post());


	       	//config for upload image
			$config['upload_path']          = './uploads/med_image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        //$config['max_size']             = 100;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;
			$this->load->library('upload', $config);


			$med_id = $this->input->post('med_id');
			$inputed_qty = $this->input->post('item_qty');


			if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
		        $uploadData = $this->upload->data();
		        $image = $uploadData['file_name'];
		        //echo 1;
		        //echo "ivan";
		    }else{
		        	//echo 'wala laman';
		        	//set the image name to the previously upload image
		        	$default_image_name = $this->admin_model->get_med_details_by_id_from_tblproductmedicines($med_id);
		           	foreach ($default_image_name as $default_image) {
		           			   $image = $default_image->image; 
					
		           	}
					


		           //$image ='';
		           			 
		           echo 12;		 
		           echo "dsds";	


		           //check for errors
		          /* $error = array('error' => $this->upload->display_errors());

	                $this->load->view('file_view', $error);*/
		        }



		    //get quantity
		    $get_quantity = $this->admin_model->get_med_details_by_id_from_tblproductmedicines($med_id);

		    foreach ($get_quantity as $med_qty) {
		           			   $med_qty_in_db = $med_qty->med_qty; 
					
		           	}



		    //echo $get_quantity->item_qty;


		    //preparing the data to be uploaded to database
			//key value pair key is the column name value is the input type value
        	$data = array(
        		
        		'med_name' => $this->input->post('med_name'),
        		'drugtype_id' => $this->input->post('drugtype_id'),

        		'med_price' => $this->input->post('item_price'),
        		'med_qty' => $this->input->post('item_qty'),	
        		'image' =>  $image,

        	);


		//Transfering data to Model
		$this->update_model->update_product_med($med_id,$data);

		if($inputed_qty != $med_qty_in_db){
    		//echo "run second query";
			//mysqli_query($conn,"insert into inventory (userid,action,productid,quantity,inventory_date) values ('".$_SESSION['id']."','Update Quantity', '$id', '$qty', NOW())");

			//for item inventory table

			$get_user_name =  $this->admin_model->get_employee_by_id($user_id);

			foreach ($get_user_name as $user_name) {
					$u_first_name = $user_name->first_name;
					$u_middle_name = $user_name->middle_name;
					$u_last_name = $user_name->last_name;

					 $user_full_name = $u_first_name .' '. $u_middle_name .' '. $u_last_name;
			}

			$employee_type =  $this->session->userdata('employee_type');
			$user_type = $employee_type;
			$action = "Update Quantity";
			$inventory_date = date('Y-m-d H:i:s');


			$data = array(
        		
        		'user_type' => $user_type,
        		'user_id' => $user_id,
        		'user_name' => $user_full_name,
        		'action' => $action,
        		'product_med_id' => $med_id,
        		'quantity' => $this->input->post('item_qty'),	
        		'inventory_date' => $inventory_date,

        	);



        	//add row to item inventory

			$this->create_model->create_med_inventory($data);

	    }

	    $this->session->set_flashdata('update_med_success','Product information has been updated');
	    redirect('employee/med_details/'.$med_id);

        //print_r($this->input->post());
    
    }




    public function update_med_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('employee/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			//$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



       			//id that you want to change state
       			$med_id = $this->input->post('med_id');

       			//password of the currently login user
       			$password_confirmation = $this->input->post('password_confirmation');

       			$current_state = $this->input->post('current_state');

       			//check to see if the admin and password are match
       			$check_password = $this->admin_model->get_employee_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//change the state of the selected admin
       				if($current_state ==  1){
       					//echo "change it to 0";
       					$state_data = array(

       						'is_active' => 0,
       					);


       					$this->update_model->update_state_for_med($med_id,$state_data);

       					$this->session->set_flashdata('change_state','Product State has been successfully updated');

       				

       				}else{
       					//echo "change it to 1";

       					$state_data = array(

       						'is_active' => 1,
       					);


       				$this->update_model->update_state_for_med($med_id,$state_data);

       					$this->session->set_flashdata('change_state','Product State has been successfully updated');
       					
       				}




       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}


	       			redirect('employee/med_details/'.$med_id);

    }



	//------------------------ CREATE PAGES -------------------------------------///////////

	public function book_appointment(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

			$walk_customer_name = $this->input->post('walk_customer_name');

			if(empty($walk_customer_name)){

				//if it is a member customer
				$customer_id = $this->input->post('customer_id');
				//get customer detail by their id
				$customer_details = $this->admin_model->get_customer_by_id($this->input->post('customer_id'));
				
				foreach ($customer_details as $customer) {
				$customer_name =  $customer->first_name .' '. $customer->middle_name .' '. $customer->last_name;

				$telephone = $customer->telephone;
				$cellphone = $customer->cellphone;
				}


			}else{

				$customer_id = 0;
				$customer_name = $this->input->post('walk_customer_name');
				$cellphone = $this->input->post('cellphone');
				$telephone = $this->input->post('telephone');

			}
			
			
			

			$appointment_reason = $this->input->post('reason');
			$now = date('Y-m-d H:i:s');
			$data = array(
				'customer_id' => $customer_id,
				'customer_name' => $customer_name,
				'telephone' => $telephone,
				'cellphone' => $cellphone,
				'preferred_time_of_day' => $this->input->post('preferred_time'),
				'appointment_reason' => $appointment_reason,
				'status' => 'approved',
				'preferred_date' => $this->input->post('preferred_date'),
				'date_requested' => $now,

			);




				//Transfering data to Model
			$this->create_model->create_appointment($data);
		

			$this->session->set_flashdata('book_appointment_success','Appointment has been scheduled successfully');


	      	redirect('employee/appointments');
			

		print_r($this->input->post());

	}



	public function create_new_pet(){


		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);


			$now = date('Y-m-d H:i:s');
			$data = array(
			'pet_data_id'=> $this->input->post('pet_data_id'),
			//customer_id reference
			'customer_id' => $this->input->post('customer_id'),
			'pet_name' => $this->input->post('pet_name'),
			'gender' => $this->input->post('gender'),
			
			'pet_type' => $this->input->post('pet_type'),
			'pet_breed' => $this->input->post('breed'),
			'pet_size' => $this->input->post('pet_size'),
			'date_birth' => $this->input->post('date_birth'),
			'is_active' => 1,
			'date_added' => $now,  
			

		);


		/*foreach ($data as $d) {
			echo $d .'<br />';
		}*/

		$this->create_model->create_pet($data);
		$this->session->set_flashdata('add_pets_success','Pet has been added');
      	redirect('employee/pets');

	}




	//customer

	public function create_new_customer(){

		if(!$this->session->userdata('logged_in')){
					redirect('employee/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);


			//$this->load->library('form_validation');

			//creating new USER will not include image upload
			//default image will be guest2.jpg for new USER

			//preparing the data to be uploaded to database
			//key value pair key is the column name value is the input type value
			$now = date('Y-m-d H:i:s');
			$data = array(
				'customer_user_id' => $this->input->post('customer_user_id'),
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
				'date_added' => $now
			);

			print_r($data);

			//Transfering data to Model
			$this->create_model->create_customer($data);
		

			$this->session->set_flashdata('add_customer_success','Customer has been added');
	      	redirect('employee/customers');
	}

}