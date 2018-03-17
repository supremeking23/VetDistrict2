<?php 
class POS_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }


   //for store
	public function get_all_active_items(){
		$this->db->select('*');
		$this->db->from('tblproductitems');
		$this->db->where('is_active',1);
		$this->db->order_by('prod_item_id','DESC');
		$result_set = $this->db->get();
		return $result_set->result_array();
	}


 	public function get_all_active_medicine(){
  		//joins 2 tables

  		$this->db->select('a.prod_med_id,a.med_name,a.med_price,a.med_qty,a.image,a.is_active,b.drug_type');
		$this->db->from('tblproductmedicines a');
		$this->db->where('is_active',1);
		$this->db->join('tbldrugtype b','a.drugtype_id = b.drugtype_id');
		$this->db->order_by('prod_med_id','DESC');

		$result_set = $this->db->get();
		return $result_set->result_array();

  	}


   public function get_all_active_services_details(){

   		$this->db->select('a.service_id,a.servicetype_id,a.service_name,a.service_description,a.price,a.is_active,b.servicetype_name,b.servicetype_description');
		$this->db->from('tblservices a');
		$this->db->where('is_active',1);
		$this->db->join('tblservicetype b','a.servicetype_id = b.servicetype_id');
		$this->db->order_by('service_id', 'DESC');
		

		$result_set = $this->db->get();
		return $result_set->result();
   }




   public function get_all_service_type(){
   		$this->db->select('*');
		$this->db->from('tblservicetype');
		$this->db->order_by('servicetype_id','DESC');
		$result_set = $this->db->get();
		return $result_set->result();
   }





   public function add_sales($data){

   		$this->db->insert('tblsales',$data);

   }

   public function add_sales_details($data){

   		$this->db->insert('tblsales_detail',$data);
   }


   public function get_all_sales_by_sales_id($sales_id){

   		$this->db->select('*');
		$this->db->from('tblsales');
		$this->db->where('sales_id',$sales_id);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
   }


   public function get_all_sales_detail_by_sales_id($sales_id){

   		$this->db->select('*');
		$this->db->from('tblsales_detail');
		$this->db->where('sales_id',$sales_id);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
   }

}