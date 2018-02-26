<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_Gallery_Controller extends CI_Controller {

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






   


    public function add_image_to_gallery(){


       	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		}



		$user_id = $this->session->userdata('user_id');

			//get user_id via $user_id session //for sidebar
		$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

            //config for upload image
              $config['upload_path']          = './uploads/gallery_images/';
              $config['allowed_types']        = 'gif|jpg|png|jpeg';
              //$config['max_size']             = 100;
             // $config['max_width']            = 1024;
             // $config['max_height']           = 768;
                  $this->load->library('upload', $config);

                if($this->upload->do_upload('gallery_image')){
                  //get the file name of the uploaded file
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                    //echo 1;
                    //echo "ivan";
                }else{
                  
                }

            $data = array(
                  'image_name' => $image,
            );
            $this->system_settings_model->add_image_to_gallery($data);


            $this->session->set_flashdata('add_image_gallery_success','Image has been successfully added to gallery');
		redirect('admin/settings');
		//print_r($this->input->post());
      
    }




}
