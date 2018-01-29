<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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


		//library
		$this->load->library('form_validation');
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



	public function login(){
		//$this->load->view('admin/login');

		//field name, field label, attributee
		//$data['may_error'] = 1;

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');


		if($this->form_validation->run() === FALSE){
			//beginning of the load
			$this->load->view('admin/login');

			


		}else{
			//die('continue');

			//get u email and password when the form is submitted
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			//search login user with email and password
			$found_admin = $this->admin_model->login_admin($email,$password);


			if($found_admin){
				//redirect('admin/dashboard');



				foreach($found_admin as $admin_credentials){
					$user_id =  $admin_credentials->admin_id;
					$email = 	$admin_credentials->email;
				}



				//creating a session
				$user_data = array(
					'user_id' => $user_id,
					'email' => $email,
					'logged_in' =>true,
				);

				$this->session->set_userdata($user_data);

				redirect('admin/dashboard');


			}else{
				//set errors if the password and email doesnt match
			$this->session->set_flashdata('login_failed','Incorrect Email or Password');
				//die('sds');
				redirect('admin/login');
			}
		}


		//$this->load->view('admin/login');

	}//login







	public function sign_out(){
		//$this->login();
		$this->session->sess_destroy();
		redirect('admin/login');
	}




	public function profile(){

		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


		//$data['id'] = $id;

			/*
			*	The segment numbers would be this:
			*  	1 news
				2 local
				3 metro
				4 crime_is_up
			*/

		$id = $user_id;

		$data['show_admin_details'] = $this->admin_model->get_admin_by_id($id);

		
		
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);
		

	}



	public function change_profile(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
		}
		
			    //config for upload image
			$config['upload_path']          = './uploads/admin_image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        //$config['max_size']             = 100;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;
			$this->load->library('upload', $config);


			$admin_id = $this->input->post('admin_id');


			if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
		        $uploadData = $this->upload->data();
		        $image = $uploadData['file_name'];
		        //echo 1;
		        //echo "ivan";
		        }else{
		        	//echo 'wala laman';
		        	//set the image name to the previously upload image
		        	$default_image_name = $this->admin_model->get_admin_by_id($admin_id);
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
					$this->update_model->update_admin($admin_id,$data);
					$this->session->set_flashdata('update_admin_success','Admin information has been updated');
					
	        		
	        		redirect('admin/profile');

	}


	// ------------------------------------ NAVIGATION MAIN ------------------------------------ //
	public function dashboard(){
		//$data['data'] ="";


		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


		$data['count_all_employee'] = $this->admin_model->get_count_all_employee();

		//total count of medicine and item in product tbl not in inventory
		$data['count_all_items'] = $this->admin_model->get_count_all_item();

		$data['count_all_meds'] = $this->admin_model->get_count_all_meds();


		$data['count_all_customer'] = $this->admin_model->get_count_all_customer();

		$data['count_all_pet'] = $this->admin_model->get_count_all_pet();
		

		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);

	}



	public function appointments(){

		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



		 $data['appointments'] = $this->admin_model->get_all_appointments();
		

		 $data['customers'] = $this->admin_model->get_all_customer();

		$this->load->view('admin/appointments',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);
	}

	

	public function admins(){


		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}

		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


		$data['admins'] = $this->admin_model->get_all_admins();

		$data['count_all_admins'] = $this->admin_model->get_count_all_admin();
		$data['count_male_admins'] = $this->admin_model->get_count_male_admin();
		$data['count_female_admins'] = $this->admin_model->get_count_female_admin();

		$this->load->view('admin/administrator',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);


	}


	public function employees(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

		//for datatable
		$data['employees'] = $this->admin_model->get_all_employees();


		$data['count_all_employee'] = $this->admin_model->get_count_all_employee();
		$data['count_staff'] = $this->admin_model->get_count_staff();
		$data['count_veterinarian'] = $this->admin_model->get_count_veterinarian();


		$this->load->view('admin/employee',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);

		
	}


	//----------------------------- PRODUCT--------------------------------------//

	//FOR MEDICINES

	public function medicines(){
		//$data['type'] = $this->admin_model->get_all_pet_type();

		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



		$data['medicines'] = $this->admin_model->get_all_medicine();


		$data['count_all_meds'] = $this->admin_model->get_count_all_meds();



		$data['drug_type'] = $this->admin_model->get_all_drug_type();


		$this->load->view('admin/medicines',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);
	}



	public function items(){
		//$data['type'] = $this->admin_model->get_all_pet_type();

		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



		$data['items'] = $this->admin_model->get_all_item();


		$data['count_all_items'] = $this->admin_model->get_count_all_item();



		


		$this->load->view('admin/items',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);
	}









	//-----------------------------END PRODUCT--------------------------------------//


	public function customers(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}



			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



			$data['customers'] = $this->admin_model->get_all_customer();


			$data['count_all_customer'] = $this->admin_model->get_count_all_customer();
			$data['count_male_customer'] = $this->admin_model->get_count_male_customer();
			$data['count_female_customer'] = $this->admin_model->get_count_female_customer();


			$this->load->view('admin/customer',$data);
			$this->load->view('admin/layouts/sidebar.php',$data);
	}



	public function pets(){
		//$data['type'] = $this->admin_model->get_all_pet_type();

		if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



		$data['pets'] = $this->admin_model->get_all_pets_with_there_customers();
		$data['count_all_pet'] = $this->admin_model->get_count_all_pet();

		$data['customers'] = $this->admin_model->get_all_customer();
		$data['pet_type'] = $this->admin_model->get_all_pet_type();
		$this->load->view('admin/pets',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);
	}




	// ------------------------------------END NAVIGATION MAIN ------------------------------------ //

	






	//------------------------------------- AJAX REQUEST -------------------------------------------//

	//ajax request
	public function pet_breed($id){
 		$id = $id;
        $result = $this->db->where("pettype_id",$id)->get("tblpetbreed")->result();
        echo json_encode($result);
	}

	//-------------------------------------END AJAX REQUEST -------------------------------------------//








	//------------------------------------- DETAILS PAGES -------------------------------------------//


	public function admin_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}


			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


			//$data['id'] = $id;

				/*
				*	The segment numbers would be this:
				*  	1 news
					2 local
					3 metro
					4 crime_is_up
				*/

			$id = $this->uri->segment(3);

			$data['show_admin_details'] = $this->admin_model->get_admin_by_id($id);

			//single employee . search with id
			$this->load->view('admin/admin_details',$data);
			$this->load->view('admin/layouts/sidebar.php',$data);
			
			


			//echo  $this->uri->segment(3);
	
	}


	public function employee_details(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}



			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



			//$data['id'] = $id;

				/*
				*	The segment numbers would be this:
				*  	1 news
					2 local
					3 metro
					4 crime_is_up
				*/

			$id = $this->uri->segment(3);
			$data['show_employee_details'] = $this->admin_model->get_employee_by_id($id);
			$this->load->view('admin/employee_details',$data);
			$this->load->view('admin/layouts/sidebar.php',$data);
			
		


		//echo  $this->uri->segment(3);
	}



	public function customer_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

		
		$user_id = $this->session->userdata('user_id');

		//get user_id via $user_id session
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



		/*
			*	The segment numbers would be this:
			*  	1 news
				2 local
				3 metro
				4 crime_is_up
		*/

		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['show_customer_details'] = $this->admin_model->get_customer_by_id($id);
		$this->load->view('admin/customer_details',$data);
		$this->load->view('admin/layouts/sidebar.php',$data);
	}



	public function pet_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			//$data['id'] = $id;

				/*
				*	The segment numbers would be this:
				*  	1 news
					2 local
					3 metro
					4 crime_is_up
				*/

			$id = $this->uri->segment(3);

			$data['show_pet_details'] = $this->admin_model->get_complete_pet_info_by_id($id);

			foreach($data['show_pet_details'] as $d){
				 $pet_id = $d->pettype_id;
			}

			$data['customers'] = $this->admin_model->get_all_customer();
			$data['pet_types'] = $this->admin_model->get_all_pet_types_for_dropdown();

			$data['pet_breeds'] = $this->admin_model->get_all_pet_breed_by_type_id($pet_id);

			$this->load->view('admin/pet_details',$data);
			$this->load->view('admin/layouts/sidebar.php',$data);
			//print_r($data);


			/*foreach($data['pet_breeds'] as $d){
				echo $pet_breed = $d->breed;
			}*/
			

			/*foreach($data['pet_types'] as $d){
				echo $d->pettype_id;
			}*/
			//echo  $this->uri->segment(3);

	}




	public function item_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

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

			

			

			$this->load->view('admin/item_details',$data);
			$this->load->view('admin/layouts/sidebar.php',$data);
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
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

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

			$this->load->view('admin/med_details',$data);
			$this->load->view('admin/layouts/sidebar.php',$data);
			//print_r($data);


		



	}








	
	//------------------------------------- END DETAILS PAGES -------------------------------------------//





	//-------------------------------------  CREATE PAGES -------------------------------------------//

	///for add models


	public function create_new_admin(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


			
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
			'date_added' => time(),  //unix timestamp
			

			);


			//Transfering data to Model
			$this->create_model->create_admin($data);
		

			$this->session->set_flashdata('add_admin_success','Admin has been added');
	      	redirect('admin/admins');
	
	}


	public function create_new_employee(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			//$this->load->library('form_validation');

			//creating new customer will not include image upload
			//default image will be guest2.jpg for new customer

			//preparing the data to be uploaded to database
			//key value pair key is the column name value is the input type value
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
			$this->create_model->create_employee($data);
		

			$this->session->set_flashdata('add_employee_success','Employee has been added');
	      	redirect('admin/employees');

	      	



      	//print_r($this->input->post());
	
	}




	//for PRODUCTS

	public function create_new_medtype(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			$data = array(
				'drug_type' => $this->input->post('new_drug_type'),
			);

			$this->create_model->create_drugtype($data);
			$this->session->set_flashdata('add_medtype_success','Medicine type has been added');
	      
	      	redirect('admin/medicines');


	}


	public function create_new_medicine(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

		
			//we will insert data to 2 tables
			//table 1
			$data = array(
				'med_name' =>  $this->input->post('med_name'),
				'drugtype_id' => $this->input->post('med_type'),
				'med_price' =>  $this->input->post('med_price'),
				'med_qty' => $this->input->post('med_qty'),
				'is_active' => 1,
			);


			$this->create_model->create_prod_medicine($data);


			//get the last inserted id
			$insertId = $this->db->insert_id();

			//table 2

			$action = "Add Product";
			$user_type="Admin";

			$data = array(
				
				'user_type' => $user_type,
				'user_id' => $user_id,
				'action' => $action ,
				'product_med_id' => $insertId,
				'quantity' => $this->input->post('med_qty'),
				'inventory_date' => time(),

			);


			$this->create_model->create_med_inventory($data);


			$this->session->set_flashdata('add_med_success','Medicine product has been added');
	      
	      	redirect('admin/medicines');

		//print_r($this->input->post());
	}



	public function create_new_item(){
		//print_r($this->input->post());

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



			$data = array(
				'item_name' => $this->input->post('item_name'),
				'item_price' => $this->input->post('item_price'),
				'item_qty' => $this->input->post('item_qty'),
				'is_active' => 1,
			);


			$this->create_model->create_prod_item($data);


			//get the last inserted id
			$insertId = $this->db->insert_id();


			//table 2

			$action = "Add Product";
			$user_type="Admin";

			$data = array(
				
				'user_type' => $user_type,
				'user_id' => $user_id,
				'action' => $action ,
				'product_item_id' => $insertId,
				'quantity' => $this->input->post('item_qty'),
				'inventory_date' => time(),

			);


			$this->create_model->create_item_inventory($data);


			$this->session->set_flashdata('add_item_success','Item product has been added');
	      
	      	redirect('admin/items');

	}





	public function book_appointment(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


			//get customer detail by their id

			$customer_details = $this->admin_model->get_customer_by_id($this->input->post('customer_id'));


			foreach ($customer_details as $customer) {
				$full_name =  $customer->first_name .' '. $customer->middle_name .' '. $customer->last_name;

				$telephone = $customer->telephone;
				$cellphone = $customer->cellphone;
			}

			$appointment_reason = "---------- WALK IN ----------";
			$now = date('Y-m-d H:i:s');
			$data = array(
				'customer_id' => $this->input->post('customer_id'),
				'customer_name' => $full_name,
				'telephone' => $telephone,
				'cellphone' => $cellphone,
				'preferred_time_of_day' => $this->input->post('preferred_time'),
				'appointment_reason' => $appointment_reason,
				'status' => 'approved',
				'preferred_date' => $now,

			);




				//Transfering data to Model
			$this->create_model->create_appointment($data);
		

			$this->session->set_flashdata('book_appointment_success','Appointment has been scheduled successfully');


	      	redirect('admin/appointments');


		//print_r($this->input->post());

	}




	////////////////////////////////////////////////////////////////////////////////


	public function create_new_customer(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


			//$this->load->library('form_validation');

			//creating new USER will not include image upload
			//default image will be guest2.jpg for new USER

			//preparing the data to be uploaded to database
			//key value pair key is the column name value is the input type value
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


	public function create_new_pet(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);


			$data = array(
			//customer_id reference
			'customer_id' => $this->input->post('customer_id'),
			'pet_name' => $this->input->post('pet_name'),
			'gender' => $this->input->post('gender'),
			
			'pet_type' => $this->input->post('pet_type'),
			'pet_breed' => $this->input->post('breed'),
			'pet_size' => $this->input->post('pet_size'),
			'date_birth' => $this->input->post('date_birth'),
			'is_active' => 1,
			'date_added' => time(),  //unix timestamp
			

		);


		/*foreach ($data as $d) {
			echo $d .'<br />';
		}*/

		$this->create_model->create_pet($data);
		$this->session->set_flashdata('add_pets_success','Pet has been added');
      	redirect('admin/pets');

	}






	//FOR PETS


	public function create_new_pettype(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			$data = array(
				'pet_type' => $this->input->post('new_pet_type'),
			);

			$this->create_model->create_pettype($data);
			$this->session->set_flashdata('add_pettype_success','Pet type has been added');
	      	redirect('admin/pets');
	
	}



	public function create_new_petbreed(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);
		
			$data = array(
				'breed' => $this->input->post('new_petbreed'),
				'pettype_id' => $this->input->post('pet_type'),
			);


			/*foreach ($data as $d) {
				echo $d. '<br />';
				
			}*/

			$this->create_model->create_petbreed($data);
			$this->session->set_flashdata('add_petbreed_success','Pet breed has been added');
	      	redirect('admin/pets');
		
	}



	//------------------------------------- END CREATE PAGES -------------------------------------------//



	//-------------------------------------UPDATE PAGES -------------------------------------------//


	//for update models


	public function update_admin_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
		}
		
			    //config for upload image
			$config['upload_path']          = './uploads/admin_image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        //$config['max_size']             = 100;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;
			$this->load->library('upload', $config);


			$admin_id = $this->input->post('admin_id');


			if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
		        $uploadData = $this->upload->data();
		        $image = $uploadData['file_name'];
		        //echo 1;
		        //echo "ivan";
		        }else{
		        	//echo 'wala laman';
		        	//set the image name to the previously upload image
		        	$default_image_name = $this->admin_model->get_admin_by_id($admin_id);
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
					$this->update_model->update_admin($admin_id,$data);
					$this->session->set_flashdata('update_admin_success','Admin information has been updated');
					
	        		echo $admin_id;
	        		redirect('admin/admin_details/'.$admin_id);


    }//update admins

	public function update_employee_details(){


		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



			//config for upload image
				$config['upload_path']          = './uploads/employee_image/';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        //$config['max_size']             = 100;
		       // $config['max_width']            = 1024;
		       // $config['max_height']           = 768;
				$this->load->library('upload', $config);


				$employee_id = $this->input->post('employee_id');


				if($this->upload->do_upload('upload_image')){
			    	//get the file name of the uploaded file
			        $uploadData = $this->upload->data();
			        $image = $uploadData['file_name'];
			        //echo 1;
			        //echo "ivan";
			        }else{
			        	//echo 'wala laman';
			        	//set the image name to the previously upload image
			        	$default_image_name = $this->admin_model->get_employee_by_id($employee_id);
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
		        		'employee_type' => $this->input->post('employee_type'),
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
						$this->update_model->update_employee($employee_id,$data);
						$this->session->set_flashdata('update_employee_success','Employee information has been updated');
						
		        		echo $employee_id;
		        		redirect('admin/employee_details/'.$employee_id);


	} //end update employee



	public function update_customer_details(){

		if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
		}

			$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);




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
			        		redirect('admin/customer_details/'.$customer_id);

        	
	} //end update CUSTOMER


	public function update_pet_details(){

    	if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
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
	        		redirect('admin/pet_details/'.$pet_id);
    
    }






    //UPDATE PRODUCTS
    //ITEM
    public function update_item_details(){

    	if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
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

			$user_type = "Admin";
			$action = "Update Quantity";
			$inventory_date = time();


			$data = array(
        		
        		'user_type' => $user_type,
        		'user_id' => $user_id,
        		'action' => $action,
        		'product_item_id' => $item_id,
        		'quantity' => $this->input->post('item_qty'),	
        		'inventory_date' => $inventory_date,

        	);



        	//add row to item inventory

			$this->create_model->create_item_inventory($data);

	    }

	    $this->session->set_flashdata('update_item_success','Product information has been updated');
	    redirect('admin/item_details/'.$item_id);

        //print_r($this->input->post());
    


    }


    //MED
    public function update_med_details(){

    	if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
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
		        	$default_image_name = $this->admin_model->get_item_details_by_id_from_tblproductitems($med_id);
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

			$user_type = "Admin";
			$action = "Update Quantity";
			$inventory_date = time();


			$data = array(
        		
        		'user_type' => $user_type,
        		'user_id' => $user_id,
        		'action' => $action,
        		'product_med_id' => $med_id,
        		'quantity' => $this->input->post('item_qty'),	
        		'inventory_date' => $inventory_date,

        	);



        	//add row to item inventory

			$this->create_model->create_med_inventory($data);

	    }

	    $this->session->set_flashdata('update_med_success','Product information has been updated');
	    redirect('admin/med_details/'.$med_id);

        //print_r($this->input->post());
    


    }


	//------------------------------------- END UPDATE PAGES -------------------------------------------//






	//-------------------------------------  UPDATE STATE PAGES -------------------------------------------//

    //UPDATE STATES


  

    public function update_admin_state(){


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

       			$current_state = $this->input->post('current_state');


       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


       			if($check_password){
       				//change the state of the selected admin
       				if($current_state ==  1){
       					//echo "change it to 0";
       					$state_data = array(

       						'is_active' => 0,
       					);


       					$this->update_model->update_state_for_admin($admin_id,$state_data);

       					$this->session->set_flashdata('admin_state','Admin State has been successfully updated');

       				

       				}else{
       					//echo "change it to 1";

       					$state_data = array(

       						'is_active' => 1,
       					);


       					$this->update_model->update_state_for_admin($admin_id,$state_data);




       					$this->session->set_flashdata('admin_state','Admin State has been successfully updated');
       					
       				}




       			}else{ 
       				//echo "mali password";

       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       				

       			}

       			

	       			redirect('admin/admin_details/'.$admin_id);
	       			//print_r($this->input->post());
   
    }


    public function update_employee_state(){

    		//print_r($this->input->post());


	      	if(!$this->session->userdata('logged_in')){
					redirect('admin/login');
			}



			$user_id = $this->session->userdata('user_id');

				//get user_id via $user_id session
				//$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);



	       			//id that you want to change state
	       			$employee_id = $this->input->post('employee_id');

	       			//password of the currently login user
	       			$password_confirmation = $this->input->post('password_confirmation');

	       			$current_state = $this->input->post('current_state');

	       			//check to see if the admin and password are match
	       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


	       			if($check_password){
	       				//change the state of the selected admin
	       				if($current_state ==  1){
	       					//echo "change it to 0";
	       					$state_data = array(

	       						'is_active' => 0,
	       					);


	       					$this->update_model->update_state_for_employee($employee_id,$state_data);

	       					$this->session->set_flashdata('change_state','Employee State has been successfully updated');

	       				

	       				}else{
	       					//echo "change it to 1";

	       					$state_data = array(

	       						'is_active' => 1,
	       					);


	       				$this->update_model->update_state_for_employee($employee_id,$state_data);




	       					$this->session->set_flashdata('change_state','Employee State has been successfully updated');
	       					
	       				}




	       			}else{ 
	       				//echo "mali password";

	       				$this->session->set_flashdata('incorrect_password','Incorrect  Password');
	       				

	       			}

	       			

		       			redirect('admin/employee_details/'.$employee_id);
		       			//print_r($this->input->post());
     
    }


    public function update_customer_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
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
       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


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

	       			redirect('admin/customer_details/'.$customer_id);
	       			//print_r($this->input->post());
   
    }



    public function update_pet_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
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
       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


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


	       			redirect('admin/pet_details/'.$pet_id);

    }



    public function update_item_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
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
       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


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


	       			redirect('admin/item_details/'.$item_id);

    }




    public function update_med_state(){

    


      	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
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
       			$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);


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


	       			redirect('admin/med_details/'.$med_id);

    }






	//------------------------------------- END UPDATE STATE PAGES -------------------------------------------//





}
