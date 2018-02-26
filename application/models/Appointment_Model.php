<?php 
class Appointment_Model extends CI_Model
{

   public function __construct(){
       parent::__construct();

       //optional
       //$this->db = $this->load->database('default', TRUE);
   }


   //--------------------------APPOINTMENT RELATED MODEL------------------//







//----------------------------- APPOINTMENT RELATED MODEL ----------------//
    //for calendar only /// only employee uses it... must change
	public function get_all_appointments_approved(){

		/*$this->db->select('a.prod_med_id,a.med_name, a.med_price, a.med_qty, a.image, a.is_active, a.drugtype_id, b.drug_type');
		$this->db->from('tblproductmedicines a');
		$this->db->join('tbldrugtype b','a.drugtype_id = b.drugtype_id');
		$this->db->where('prod_med_id',$data);*/

		//$query = $this->db->get("tblappointments");

		$this->db->select('*');
		$this->db->from('tblappointments');
		$this->db->where('status','approved');
		$this->db->order_by('appointment_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;
	}




	public function update_appointment_status($appointment_id,$data){
		$this->db->where('appointment_id', $appointment_id);
      	$this->db->update('tblappointments', $data);
	}




	public function get_all_appointments_for_calendar(){

		/*$this->db->select('a.prod_med_id,a.med_name, a.med_price, a.med_qty, a.image, a.is_active, a.drugtype_id, b.drug_type');
		$this->db->from('tblproductmedicines a');
		$this->db->join('tbldrugtype b','a.drugtype_id = b.drugtype_id');
		$this->db->where('prod_med_id',$data);*/

		//$query = $this->db->get("tblappointments");

		$this->db->select('*');
		$this->db->from('tblappointments');
		
		$this->db->order_by('appointment_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;
	}




	public function get_all_appointments(){
		$this->db->select('*');
		$this->db->from('tblappointments');
		
		$this->db->order_by('appointment_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;
	}



   
}