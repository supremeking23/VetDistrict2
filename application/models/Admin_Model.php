<?php 
class Admin_Model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();

       //optional
       //$this->db = $this->load->database('default', TRUE);
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





  	public function get_all_employees(){
			$result_set = $this->db->get('tblemployees');

			return $result_set->result_array();
	}


	public function get_count_all_employee(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblemployees ');
			return $result_set->result_array();
	}

	public function get_count_staff(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_staff" FROM tblemployees WHERE employee_type = "staff"');
			return $result_set->result_array();
	}

	public function get_count_veterinarian(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_veterinarian" FROM tblemployees WHERE employee_type = "vet"');
			return $result_set->result_array();
	}



	public function get_all_admins(){
		$result_set = $this->db->get('tbladmins');

			return $result_set->result_array();
	}



	public function get_count_all_admin(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tbladmins ');
			return $result_set->result_array();
	}

	public function get_count_male_admin(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_male" FROM tbladmins WHERE gender = "male"');
			return $result_set->result_array();
	}

	public function get_count_female_admin(){
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_female" FROM tbladmins WHERE gender = "female"');
			return $result_set->result_array();
	}





	//joins 4 tables 
	public function get_all_pets_with_there_customers(){
		

		$this->db->select('*');
		$this->db->from('tblpets');
		$this->db->join('tblpettype','tblpets.pet_type = tblpettype.pettype_id');
		$this->db->join('tblpetbreed','tblpets.pet_breed = tblpetbreed.breed_id');
		$this->db->join('tblcustomers','tblpets.customer_id = tblcustomers.customer_id');

		$result_set = $this->db->get();
		return $result_set->result_array();
	}


	public function get_all_pet_type(){
		$result_set = $this->db->get('tblpettype');

			return $result_set->result_array();
	}



	public function get_count_all_pet(){
		$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblpets ');
		return $result_set->result_array();
	}

	




	//ajax
	public function get_all_pet_breed_by_type_id($data){
		$this->db->select('*');
		$this->db->from('tblpetbreed');
		$this->db->where('pettype_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



	//get employee detail by id
	public function get_employee_by_id($data){
		$this->db->select('*');
		$this->db->from('tblemployees');
		$this->db->where('employee_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



		//get employee detail by id
	public function get_customer_by_id($data){
		$this->db->select('*');
		$this->db->from('tblcustomers');
		$this->db->where('customer_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	//get employee detail by id
	public function get_admin_by_id($data){
		$this->db->select('*');
		$this->db->from('tbladmins');
		$this->db->where('admin_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	public function get_pet_info_by_id($data){


		$this->db->select('*');
		$this->db->from('tblpets as P');
		$this->db->join('tblpettype','tblpets.pet_type = tblpettype.pettype_id');
		$this->db->join('tblpetbreed','tblpets.pet_breed = tblpetbreed.breed_id');
		$this->db->join('tblcustomers','tblpets.customer_id = tblcustomers.customer_id');
		$this->db->where('pet_id',$data);



		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


   
}