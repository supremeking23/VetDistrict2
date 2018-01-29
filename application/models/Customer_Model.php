<?php 
class Customer_Model extends CI_Model
{

   public function __construct(){
       parent::__construct();

       //optional
       //$this->db = $this->load->database('default', TRUE);
   }



   //--------------------------Customer RELATED MODEL------------------//


	//login 
	public function login_customer($email,$password){
		$active = 1;
		$this->db->select('*');
		$this->db->from('tblcustomers');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->where('is_active',$active);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



	//get customer detail by id
	public function get_customer_by_id($data){
		$this->db->select('*');
		$this->db->from('tblcustomers');
		$this->db->where('customer_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	//AND // FOR PASSWORD CHECK
	public function get_customer_by_id_and_password($id,$password){
		$this->db->select('*');
		$this->db->from('tblcustomers');
		$this->db->where('customer_id',$id);
		$this->db->where('password',$password);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



	public function get_pet_data_by_customer_id($data){
		$this->db->select('*');
		$this->db->from('tblpets');
		$this->db->where('customer_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	public function get_count_all_pet_by_customer_id($data){
		//other way
		/*
			$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblpets WHERE customer_id = ' . $data);
			return $result_set->result_array();
		*/

		////
		$this->db->from('tblpets');
		$this->db->where('customer_id',$data);
		
		$result_set = $this->db->count_all_results();

		return $result_set;


		/*

			$this->db->where('id',5);
			$this->db->from("grant_money");
			echo $this->db->count_all_results();

			echo $this->db->where('id',5)->from("grant_money")->count_all_results();
		*/
	}


	public function get_complete_pet_info_by_id($data){


		$this->db->select('a.pet_image,a.pet_name,a.date_birth,a.pet_breed,a.gender,a.is_active,b.pettype_id,b.pet_type,a.pet_size,a.pet_id,c.breed,d.customer_id,d.first_name');
		$this->db->from('tblpets as a');
		$this->db->join('tblpettype as b','a.pet_type = b.pettype_id');
		$this->db->join('tblpetbreed as c','a.pet_breed = c.breed_id');
		$this->db->join('tblcustomers as d','a.customer_id = d.customer_id');
		$this->db->where('a.pet_id',$data);



		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	public function get_appointments_by_customer_id($data){

		$this->db->select('*');
		$this->db->from('tblappointments');
		$this->db->where('customer_id',$data);
		$this->db->order_by('appointment_id', 'DESC');

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}

}