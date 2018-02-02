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

}
