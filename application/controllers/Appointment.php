<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		 $this->load->helper(array('form', 'url'));

		//for reading.. retrieving
		$this->load->model('admin_model');

    //for reading.. retrieving
    $this->load->model('employee_model');

		//for creating
		$this->load->model('create_model');
		//for updating
		$this->load->model('update_model');

		//for system settings
		$this->load->model('system_settings_model');


		//this will be the models that we're  going to use for the rest of the project

		$this->load->model('appointment_model');

		
	}



	



    public function get_all_appointments_approved(){


   		$data_appointments = $this->appointment_model->get_all_appointments_approved();

   		$appointments = array();

   		foreach ($data_appointments  as $data_appointment) {

   			$datas = array();
   			
   			$datas['id'] = $data_appointment->appointment_id;

   			$datas['title'] = $data_appointment->customer_name;
   			
   			$datas['customer_name'] =   $data_appointment->customer_name ;
   			


   			$datas['description'] = "You have an appointment with " . $data_appointment->customer_name;

   			$datas['start'] = $data_appointment->preferred_date;

   			$datas['preferred_time'] = ucfirst($data_appointment->preferred_time_of_day);


   			$datas['appointment_reason'] = ucfirst($data_appointment->appointment_reason);

   			//merget the vent array into the return array
			array_push($appointments, $datas);
   		}
   		echo json_encode($appointments);
    }

    



    public function get_all_appointments_for_calendar(){

    	$data_appointments = $this->appointment_model->get_all_appointments();

   		$appointments = array();

   		foreach ($data_appointments  as $data_appointment) {

   			$datas = array();
   			
   			$datas['id'] = $data_appointment->appointment_id;
   			$datas['title'] = $data_appointment->customer_name;
   			$datas['start'] = $data_appointment->preferred_date;
   			//status
   			$status_color = "";
   			if($data_appointment->status == "pending"){
   				$status_color = "#D88B24";
   			}else if($data_appointment->status == "approved"){
   				$status_color = "#45A9FF";
   			}else if($data_appointment->status == "done"){
   				$status_color = "#008B24";
   			}else if($data_appointment->status == "cancelled"){
   				$status_color = "#FF1B00";
   			}
   			

   			$datas['backgroundColor'] = $status_color;
   			$datas['borderColor'] = $status_color;



   			$datas['customer_name'] =   $data_appointment->customer_name;
   			$datas['status'] =   $data_appointment->status;
   			$datas['preferred_time'] = ucfirst($data_appointment->preferred_time_of_day);
   			$datas['appointment_reason'] = ucfirst($data_appointment->appointment_reason);


   			$datas['cancellation_reason'] = ucfirst($data_appointment->cancellation_reason);

   			//merget the vent array into the return array
			array_push($appointments, $datas);
   		}
   		echo json_encode($appointments);
    }










    public function cancel_appointment_action(){

      if(!$this->session->userdata('logged_in')){
        redirect('admin/login');
      }



			$user_id = $this->session->userdata('user_id');

				//get user_id via $user_id session //for sidebar
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			//password of the currently login user
       		$password_confirmation = $this->input->post('password_confirmation');
       		$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);

       		if($check_password){

       			//update to cancel
       			$data = array(
       				'status' => 'cancelled',
       				'cancellation_reason' => $this->input->post('cancel_reason'),
       			);

       			$appointment_id = $this->input->post('appointment_id');
       			$this->appointment_model->update_appointment_status($appointment_id,$data);

       			$this->session->set_flashdata('appointment_cancel','The Schedule was cancelled successfully');

       		}else{
       			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       		}


       		redirect('admin/appointments');
	      
    		//print_r($this->input->post());
    }




    public function done_appointment_action(){

    	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		  }



			$user_id = $this->session->userdata('user_id');

				//get user_id via $user_id session //for sidebar
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			//password of the currently login user
       		$password_confirmation = $this->input->post('password_confirmation');
       		$check_password = $this->admin_model->get_admin_by_id_and_password($user_id,$password_confirmation);

       		if($check_password){

       			//update to cancel
       			$data = array(
       				'status' => 'done',
       				
       			);

       			$appointment_id = $this->input->post('appointment_id');
       			$this->appointment_model->update_appointment_status($appointment_id,$data);

       			$this->session->set_flashdata('appointment_done','The appointment was done successfully');

       		}else{
       			$this->session->set_flashdata('incorrect_password','Incorrect  Password');
       		}


       		redirect('admin/appointments');
	      
    		//print_r($this->input->post());
    }





    public function approve_appointment_action(){

    	if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
		  }



			$user_id = $this->session->userdata('user_id');

				//get user_id via $user_id session //for sidebar
			$data['current_admin_login'] = $this->admin_model->get_admin_by_id($user_id);

			//password of the currently login user
       	

       			//update to cancel
       			$data = array(
       				'status' => 'approved',
       				
       			);

       			echo $appointment_id =  $this->uri->segment(3);;
       			$this->appointment_model->update_appointment_status($appointment_id,$data);

       			$this->session->set_flashdata('appointment_approved','The appointment schedule was approved successfully');

       	


       		redirect('admin/appointments');
	      
    		//print_r($this->input->post());
    }


     /////////////////////////////////////////////////////////////////////////////////////////////////////////




    public function cancel_appointment_action_employee(){

      if(!$this->session->userdata('logged_in')){
        redirect('employee/login');
      }



      $user_id = $this->session->userdata('user_id');

        //get user_id via $user_id session //for sidebar
      $data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

      //password of the currently login user
          $password_confirmation = $this->input->post('password_confirmation');
          $check_password = $this->employee_model->get_employee_by_id_and_password($user_id,$password_confirmation);

          if($check_password){

            //update to cancel
            $data = array(
              'status' => 'cancelled',
              'cancellation_reason' => $this->input->post('cancel_reason'),
            );

            $appointment_id = $this->input->post('appointment_id');
            $this->appointment_model->update_appointment_status($appointment_id,$data);

            $this->session->set_flashdata('appointment_cancel','The Schedule was cancelled successfully');

          }else{
            $this->session->set_flashdata('incorrect_password','Incorrect  Password');
          }


          redirect('employee/appointments');
        
        //print_r($this->input->post());
    }



    public function done_appointment_action_employee(){

      if(!$this->session->userdata('logged_in')){
        redirect('employee/login');
      }



      $user_id = $this->session->userdata('user_id');

        //get user_id via $user_id session //for sidebar
      $data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

      //password of the currently login user
          $password_confirmation = $this->input->post('password_confirmation');
          $check_password = $this->employee_model->get_employee_by_id_and_password($user_id,$password_confirmation);

          if($check_password){

            //update to cancel
            $data = array(
              'status' => 'done',
              
            );

            $appointment_id = $this->input->post('appointment_id');
            $this->appointment_model->update_appointment_status($appointment_id,$data);

            $this->session->set_flashdata('appointment_done','The appointment was done successfully');

          }else{
            $this->session->set_flashdata('incorrect_password','Incorrect  Password');
          }


          redirect('employee/appointments');
        
        //print_r($this->input->post());
    }





    public function approve_appointment_action_employee(){

      if(!$this->session->userdata('logged_in')){
        redirect('employee/login');
      }



      $user_id = $this->session->userdata('user_id');

        //get user_id via $user_id session //for sidebar
      $data['current_employee_login'] = $this->employee_model->get_employee_by_id($user_id);

      //password of the currently login user
        

            //update to cancel
            $data = array(
              'status' => 'approved',
              
            );

            echo $appointment_id =  $this->uri->segment(3);;
            $this->appointment_model->update_appointment_status($appointment_id,$data);

            $this->session->set_flashdata('appointment_approved','The appointment schedule was approved successfully');

        


          redirect('employee/appointments');
        
        //print_r($this->input->post());
    }






    




}
