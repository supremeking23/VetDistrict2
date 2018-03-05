<?php 
class Service_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }


   public function get_all_service_type(){

   		$this->db->select('*');
		$this->db->from('tblservicetype');
		$query = $this->db->get();
		$result_set = $query->result();
		return $result_set;
   }


   public function get_all_services(){

   	 	$this->db->select('*');
		$this->db->from('tblservices');
		$this->db->where('is_active',1);
		$this->db->order_by('service_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;

   }



   public function get_all_services_details(){

   		$this->db->select('a.service_id,a.servicetype_id,a.service_name,a.service_description,a.price,a.is_active,b.servicetype_name,b.servicetype_description');
		$this->db->from('tblservices a');
		$this->db->join('tblservicetype b','a.servicetype_id = b.servicetype_id');
		$this->db->order_by('service_id', 'DESC');
		

		$result_set = $this->db->get();
		return $result_set->result();
   }

}