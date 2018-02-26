<?php 
class System_Settings_Model extends CI_Model
{

   public function __construct(){
       parent::__construct();

       //optional
       //$this->db = $this->load->database('default', TRUE);
   }




   public function get_system_settings(){
   		$result_set = $this->db->get('tblsystemsettings');
		return $result_set->result();
   }



   public function add_image_to_gallery($data){

   		 $this->db->insert('tblimagegallery',$data);

   }


   public function get_all_image_gallery(){

   		$this->db->select('*');
		$this->db->from('tblimagegallery');
		
		$this->db->order_by('image_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;
   }



   public function get_mission(){
   		$result_set = $this->db->get('tblsystemsettings');
		return $result_set->result();
   }

}
