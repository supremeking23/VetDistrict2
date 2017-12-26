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



    public function create_employee($data){
      $this->db->insert('tblemployees',$data);
  }



  public function create_pet($data){
    $this->db->insert('tblpets',$data);
  }


  public function create_pettype($data){
    $this->db->insert('tblpettype',$data);
  }


    public function create_petbreed($data){
    $this->db->insert('tblpetbreed',$data);
  }




   
}