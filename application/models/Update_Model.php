<?php 
class Update_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }

  public function create_customer($data){
      $this->db->insert('tblcustomers',$data);
  }






  public function update_employee($employee_id,$data){
      $this->db->where('employee_id', $employee_id);
      $this->db->update('tblemployees', $data);
  }


  public function update_customer($customer_id,$data){
      $this->db->where('customer_id', $customer_id);
      $this->db->update('tblcustomers', $data);
  }


  public function update_admin($admin_id,$data){
      $this->db->where('admin_id', $admin_id);
      $this->db->update('tbladmins', $data);
  }



  public function update_pet($pet_id,$data){
      $this->db->where('pet_id', $pet_id);
      $this->db->update('tblpets', $data);
  }



    //change state for :Admin
  public function update_state_for_admin($admin_id,$data){
     $this->db->where('admin_id', $admin_id);
      $this->db->update('tbladmins', $data);
  }




    //change state for :Employee
  public function update_state_for_employee($employee_id,$data){
     $this->db->where('employee_id', $employee_id);
      $this->db->update('tblemployees', $data);
  }



   //change state for :Customer
  public function update_state_for_customer($customer_id,$data){
     $this->db->where('customer_id', $customer_id);
      $this->db->update('tblcustomers', $data);
  }



   //change state for :Pet
  public function update_state_for_pet($pet_id,$data){
     $this->db->where('pet_id', $pet_id);
      $this->db->update('tblpets', $data);
  }
   
}