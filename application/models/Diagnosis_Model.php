<?php 
class Diagnosis_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }

  public function create_diagnosis($data){
      $this->db->insert('tbl_petdiagnosis',$data);
  }



  public function get_all_diagnosis_by_pet_id($pet_id){
    

    $this->db->select('a.diagnosis_id,a.diagnosis_data_id,a.employee_user_id,a.customer_user_id,a.pet_id,a.pet_data_id,a.subject,a.objective,a.assessment,a.plan,a.diagnosis_date,a.body_weight,a.body_temperature,a.service_fee,b.pet_name,c.first_name as cus_firstname ,c.middle_name as cus_middlename,c.last_name as cus_lastname,d.first_name,d.middle_name,d.last_name');
    $this->db->from('tbl_petdiagnosis a');
    $this->db->join('tblpets b','a.pet_id = b.pet_id');
    $this->db->join('tblcustomers c','a.customer_user_id = c.customer_user_id');
    $this->db->join('tblemployees d','a.employee_user_id = d.employee_user_id');
    $this->db->where('a.pet_id', $pet_id);
    $this->db->order_by('diagnosis_id', 'DESC');

    $result_set = $this->db->get();
    return $result_set->result();
  }


  public function get_all_diagnosis_by_diagnosis_id($diagnosis_id){
    

    $this->db->select('a.diagnosis_id,a.diagnosis_data_id,a.employee_user_id,a.customer_user_id,a.pet_id,a.pet_data_id,a.subject,a.objective,a.assessment,a.plan,a.diagnosis_date,a.body_weight,a.body_temperature,a.service_fee,b.pet_name,c.first_name as cus_firstname ,c.middle_name as cus_middlename,c.last_name as cus_lastname,d.first_name,d.middle_name,d.last_name');
    $this->db->from('tbl_petdiagnosis a');
    $this->db->join('tblpets b','a.pet_id = b.pet_id');
    $this->db->join('tblcustomers c','a.customer_user_id = c.customer_user_id');
    $this->db->join('tblemployees d','a.employee_user_id = d.employee_user_id');
    $this->db->where('a.diagnosis_id', $diagnosis_id);
    $this->db->order_by('diagnosis_id', 'DESC');

    $result_set = $this->db->get();
    return $result_set->result();
  }

  
}