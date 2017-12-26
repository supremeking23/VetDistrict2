<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Update_Controller extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('update_model');
		date_default_timezone_set('Asia/Taipei');
		 $this->load->helper(array('form', 'url'));

		 //load a class to another controller
		


	}



	public function update_employee_details(){

	//config for upload image
		$config['upload_path']          = './uploads/employee_image/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
       // $config['max_width']            = 1024;
       // $config['max_height']           = 768;
		$this->load->library('upload', $config);


		    if($this->upload->do_upload('upload_image')){
		    	//get the file name of the uploaded file
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
                //echo $image;
                }else{
                    $image = '';
                }


        	 $employee_id = $this->input->post('employee_id');
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
				//$this->update_model->update_employee($employee_id,$data);

				//$this->employee_details();
        	
        		redirect('admin/employees');
        	
	}



}