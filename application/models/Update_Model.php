<?php 
class Update_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
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


  public function update_product_item($item_id,$data){
      $this->db->where('prod_item_id', $item_id);
      $this->db->update('tblproductitems', $data);
  }


  public function update_product_med($med_id,$data){
      $this->db->where('prod_med_id', $med_id);
      $this->db->update('tblproductmedicines', $data);
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


  //change state for : item
  public function update_state_for_item($item_id,$data){
     $this->db->where('prod_item_id', $item_id);
      $this->db->update('tblproductitems', $data);
  }



    //change state for : item
  public function update_state_for_med($med_id,$data){
     $this->db->where('prod_med_id', $med_id);
      $this->db->update('tblproductmedicines', $data);
  }




  //change state for : service
  public function update_state_service($service_id,$data){
      $this->db->where('service_id', $service_id);
      $this->db->update('tblservices', $data);
  }









   
}