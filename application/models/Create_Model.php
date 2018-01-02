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



  public function create_admin($data){
      $this->db->insert('tbladmins',$data);
  }



  public function create_employee($data){
      $this->db->insert('tblemployees',$data);
  }




  //for PRODUCTS

  public function create_drugtype($data){
    $this->db->insert('tbldrugtype',$data);
  }

  public function create_prod_medicine($data){
    $this->db->insert('tblproductmedicines',$data);
  }


  public function create_med_inventory($data){
     $this->db->insert('tblinventoryformedicines',$data);
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