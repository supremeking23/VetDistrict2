<?php 
class Sales_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }


  


   public function get_all_sales_report(){

   	 	$this->db->select('*');
		$this->db->from('tblsales');
		
		$this->db->order_by('sales_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;

   }


      public function get_sales_report_by_sales_id($sales_id){

   	 	$this->db->select('*');
		$this->db->from('tblsales');
		$this->db->where('sales_id',$sales_id);
		$this->db->order_by('sales_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;

   }



   public function get_all_sales_report_by_sales_id($sales_id){

   	 	$this->db->select('*');
		$this->db->from('tblsales_detail');
		$this->db->where('sales_id',$sales_id);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;

   }












}