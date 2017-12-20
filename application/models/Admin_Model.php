<?php 
class Admin_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();

       //optional
       $this->db = $this->load->database('default', TRUE);
   }

  public function get_all_drug_type(){
      $result_set = $this->db->get('tbldrugtype');
      return $result_set->result_array();
  }



  	public function get_all_customer(){
			$result_set = $this->db->get('tblcustomers');

			return $result_set->result_array();
		}



	public function get_count_all_customer(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblcustomers ');
			return $result_set->result_array();
	}

	public function get_count_male_customer(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_male" FROM tblcustomers WHERE gender = "male"');
			return $result_set->result_array();
	}

	public function get_count_female_customer(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_female" FROM tblcustomers WHERE gender = "female"');
			return $result_set->result_array();
	}

   
}