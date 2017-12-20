<?php 
class Create_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //$this->db = $this->load->database('default', TRUE);
   }

  public function create_customer($data){
      $this->db->insert('tblcustomers',$data);
  }

   
}