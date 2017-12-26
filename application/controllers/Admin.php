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
	}

	public function login(){
		$this->load->view('admin/login');
	}


	// navigation admin
	public function dashboard(){
		$data['data'] ="";
		
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layouts/sidebar.php');

		
	}

	public function employees(){

		//for datatable
		$data['employees'] = $this->admin_model->get_all_employees();


		$data['count_all_employee'] = $this->admin_model->get_count_all_employee();
		$data['count_staff'] = $this->admin_model->get_count_staff();
		$data['count_veterinarian'] = $this->admin_model->get_count_veterinarian();


		$this->load->view('admin/employee',$data);
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




	public function admins(){


		$data['admins'] = $this->admin_model->get_all_admins();

		$data['count_all_admins'] = $this->admin_model->get_count_all_admin();
		$data['count_male_admins'] = $this->admin_model->get_count_male_admin();
		$data['count_female_admins'] = $this->admin_model->get_count_female_admin();
		$this->load->view('admin/administrator',$data);
		$this->load->view('admin/layouts/sidebar.php');
	}


	public function pets(){
		//$data['type'] = $this->admin_model->get_all_pet_type();

		$data['pets'] = $this->admin_model->get_all_pets_with_there_customers();
		$data['count_all_pet'] = $this->admin_model->get_count_all_pet();

		$data['customers'] = $this->admin_model->get_all_customer();
		$data['pet_type'] = $this->admin_model->get_all_pet_type();
		$this->load->view('admin/pets',$data);
		$this->load->view('admin/layouts/sidebar.php');
	}



	//ajax request
	public function pet_breed($id){
 		$id = $id;
         $result = $this->db->where("pettype_id",$id)->get("tblpetbreed")->result();
       echo json_encode($result);
	}

	

// end navigation admin




	public function customer_details(){

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
		$this->load->view('admin/layouts/sidebar.php');
	}


	public function employee_details(){
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

		//single employee . search with id
		$this->load->view('admin/layouts/sidebar.php');
		$this->load->view('admin/employee_details',$data);
		


		//echo  $this->uri->segment(3);
	}




	public function admin_details(){
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
		$this->load->view('admin/layouts/sidebar.php');
		$this->load->view('admin/admin_details',$data);
		


		//echo  $this->uri->segment(3);
	}


	public function pet_details(){
		//$data['id'] = $id;

			/*
			*	The segment numbers would be this:
			*  	1 news
				2 local
				3 metro
				4 crime_is_up
			*/

		$id = $this->uri->segment(3);

		$data['show_pet_details'] = $this->admin_model->get_pet_info_by_id($id);

		//single employee . search with id
		$this->load->view('admin/layouts/sidebar.php');
		$this->load->view('admin/pet_details',$data);
		


		//echo  $this->uri->segment(3);
	}







	///for add models


	public function create_new_customer(){
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
		$this->create_model->create_customer($data);
	

		$this->session->set_flashdata('add_customer_success','Customer has been added');
      	redirect('admin/customers');




	}



	public function create_new_employee(){

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
		$this->create_model->create_customer($data);
	

		$this->session->set_flashdata('add_admin_success','Admin has been added');
      	redirect('admin/admins');

      	



      	//print_r($this->input->post());
	}




	public function create_new_admin(){

			
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



	public function create_new_pet(){


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



	
	public function create_new_pettype(){
		$data = array(
			'pet_type' => $this->input->post('new_pet_type'),
		);

		$this->create_model->create_pettype($data);
		$this->session->set_flashdata('add_pettype_success','Pet type has been added');
      	redirect('admin/pets');
	}



	public function create_new_petbreed(){
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



	//for update models

	public function update_employee_details(){

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
				$this->session->set_flashdata('update_employee_success','Employee information has ben updated');
				
        		echo $employee_id;
        		redirect('admin/employee_details/'.$employee_id);



        	
	} //end update employee




	public function update_customer_details(){

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
				$this->session->set_flashdata('update_customer_success','Customer information has ben updated');
				
        		echo $customer_id;
        		redirect('admin/customer_details/'.$customer_id);



        	
	} //end update employee




	public function update_admin_details(){
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
				$this->session->set_flashdata('update_admin_success','Admin information has ben updated');
				
        		echo $admin_id;
        		redirect('admin/admin_details/'.$admin_id);


       }//update admins


}
