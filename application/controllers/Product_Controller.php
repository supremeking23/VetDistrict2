<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Controller extends CI_Controller {

	public function __construct(){
		 parent::__construct();
         $this->load->helper(array('form', 'url'));
	}

	
	public function wawa(){
        	echo "<h1>dsds</h1>";
        }

    public function add_new_product(){
        

        $config['upload_path']          = './uploads/product_image/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
       // $config['max_width']            = 1024;
       // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('product_image'))
        {		//failed to upload
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('file_view', $error);
        }
        else
        {

        		//success_upload
              /*  $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);*/
                //redirect('admin/dashboard');

             //wawa();

                $this->session->set_flashdata('category_success','Success Message');

                redirect('admin/products');
        }




       
}

 
	

}