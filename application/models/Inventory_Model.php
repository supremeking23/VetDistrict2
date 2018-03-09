<?php 
class Inventory_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }


  


   public function get_all_inventory_for_items(){

   	 	$this->db->select('*');
		$this->db->from('tblinventoryforitems');
		
		$this->db->order_by('inv_item_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;

   }



   public function get_all_inventory_details_for_items(){

   		$this->db->select('a.inv_item_id,a.user_name,a.user_type,a.user_id,a.action,a.product_item_id,a.quantity,a.inventory_date,b.item_name');
		$this->db->from('tblinventoryforitems a');
		
		$this->db->join('tblproductitems b','a.product_item_id = b.prod_item_id');
		
		$this->db->order_by('inv_item_id', 'DESC');

		$result_set = $this->db->get();
		return $result_set->result();
   }




      public function get_all_inventory_details_for_medicines(){

   		$this->db->select('a.inv_med_id,a.user_type,a.user_name,a.user_id,a.action,a.product_med_id,a.quantity,a.inventory_date,b.med_name,b.drugtype_id,c.drug_type');
		$this->db->from('tblinventoryformedicines a');
		$this->db->join('tblproductmedicines b','a.product_med_id = b.prod_med_id');
		$this->db->join('tbldrugtype c','b.drugtype_id = c.drugtype_id');
		
		$this->db->order_by('inv_med_id', 'DESC');

		$result_set = $this->db->get();
		return $result_set->result();
   }





}