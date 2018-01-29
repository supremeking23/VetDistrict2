<?php 
class Admin_Model extends CI_Model
{

   public function __construct(){
       parent::__construct();

       //optional
       //$this->db = $this->load->database('default', TRUE);
   }


   //--------------------------ADMIN RELATED MODEL------------------//


	//login admin


	public function login_admin($email,$password){
		$active = 1;
		$this->db->select('*');
		$this->db->from('tbladmins');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->where('is_active',$active);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
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


	//get admin detail by id
	public function get_admin_by_id($data){
		$this->db->select('*');
		$this->db->from('tbladmins');
		$this->db->where('admin_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}







	//AND // FOR PASSWORD CHECK
	public function get_admin_by_id_and_password($id,$password){
		$this->db->select('*');
		$this->db->from('tbladmins');
		$this->db->where('admin_id',$id);
		$this->db->where('password',$password);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}







   //--------------------------END ADMIN RELATED MODEL------------------//


	//--------------------------END EMPLOYEE RELATED MODEL------------------//

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



		//get employee detail by id
	public function get_employee_by_id($data){
		$this->db->select('*');
		$this->db->from('tblemployees');
		$this->db->where('employee_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	//--------------------------END EMPLOYEE RELATED MODEL------------------//



	//-------------------------- CUSTOMER RELATED MODEL------------------//


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



			//get employee detail by id
	public function get_customer_by_id($data){
		$this->db->select('*');
		$this->db->from('tblcustomers');
		$this->db->where('customer_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



	//--------------------------END CUSTOMER RELATED MODEL------------------//


	//-------------------------- PRODUCT RELATED MODEL------------------//

	//FOR MEDICINES

	 public function get_all_drug_type(){
      $result_set = $this->db->get('tbldrugtype');
      return $result_set->result_array();
  	}


  	public function get_all_medicine(){
  		//joins 2 tables

  		$this->db->select('a.prod_med_id,a.med_name,a.med_price,a.med_qty,a.is_active,b.drug_type');
		$this->db->from('tblproductmedicines a');
		$this->db->join('tbldrugtype b','a.drugtype_id = b.drugtype_id');
		

		$result_set = $this->db->get();
		return $result_set->result_array();

  	}


  	public function get_count_all_meds(){
		$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblproductmedicines');
		return $result_set->result_array();
	}





	//FOR ITEMS
	public function get_all_item(){
		$result_set = $this->db->get('tblproductitems');
		return $result_set->result_array();
	}



	public function get_count_all_item(){
		$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblproductitems');
		return $result_set->result_array();
	}



	public function get_item_details_by_id_from_tblproductitems($data){
		$this->db->select('*');
		$this->db->from('tblproductitems');
		$this->db->where('prod_item_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	//FOR MEDICINE
	public function get_med_details_by_id_from_tblproductmedicines($data){
		$this->db->select('a.prod_med_id,a.med_name, a.med_price, a.med_qty, a.image, a.is_active, a.drugtype_id, b.drug_type');
		$this->db->from('tblproductmedicines a');
		$this->db->join('tbldrugtype b','a.drugtype_id = b.drugtype_id');
		$this->db->where('prod_med_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}


	//--------------------------END PRODUCT RELATED MODEL------------------//




  //-------------------------- PETS RELATED MODEL------------------//


  //joins 4 tables 
	public function get_all_pets_with_there_customers(){
		

		$this->db->select('a.pet_id,a.pet_name,a.is_active,b.pet_type,c.breed,d.first_name,d.middle_name,d.last_name');
		$this->db->from('tblpets a');
		$this->db->join('tblpettype b','a.pet_type = b.pettype_id');
		$this->db->join('tblpetbreed c','a.pet_breed = c.breed_id');
		$this->db->join('tblcustomers d','a.customer_id = d.customer_id');

		$result_set = $this->db->get();
		return $result_set->result_array();
	}


	public function get_all_pet_type(){
		$result_set = $this->db->get('tblpettype');

			return $result_set->result_array();
	}

	
	public function get_all_pet_types_for_dropdown(){
		$this->db->select('*');
		$this->db->from('tblpettype');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;
	}


	/*function get_all_pet_types_for_dropdown()
	{
		$result = $this->db->select('pettype_id','pet_type')->get('tblpettype')->result_array();


		$pet_types = array(); 
	        foreach($result as $r) { 
	            $pet_types[$r['pettype_id']] = $r['pet_type']; 
	        } 
	        $pet_types[''] = 'Select job position...'; 
	        return $pet_types; 

	}*/



	public function get_count_all_pet(){
		$result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM tblpets ');
		return $result_set->result_array();
	}









	//just getting the data to 1 table //tblpets datatable in pets controller
	public function get_pet_data_by_pet_id($data){
		$this->db->select('*');
		$this->db->from('tblpets');
		$this->db->where('pet_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}

	//simple join
	public function get_pet_info_by_id($data){


		$this->db->select('*');
		$this->db->from('tblpets');
		$this->db->join('tblpettype','tblpets.pet_type = tblpettype.pettype_id');
		$this->db->join('tblpetbreed','tblpets.pet_breed = tblpetbreed.breed_id');
		$this->db->join('tblcustomers','tblpets.customer_id = tblcustomers.customer_id');
		$this->db->where('pet_id',$data);



		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



	//with alias
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


  //--------------------------END PETS RELATED MODEL------------------//




 
 //--------------------------AJAX RELATED MODEL------------------//


	//ajax
	public function get_all_pet_breed_by_type_id($data){
		$this->db->select('*');
		$this->db->from('tblpetbreed');
		$this->db->where('pettype_id',$data);

		$query = $this->db->get();

		$result_set = $query->result();

		return $result_set;
	}



 //-------------------------- END AJAX RELATED MODEL------------------//
	


//----------------------------- APPOINTMENT RELATED MODEL ----------------//

	public function get_all_appointments(){

		/*$this->db->select('a.prod_med_id,a.med_name, a.med_price, a.med_qty, a.image, a.is_active, a.drugtype_id, b.drug_type');
		$this->db->from('tblproductmedicines a');
		$this->db->join('tbldrugtype b','a.drugtype_id = b.drugtype_id');
		$this->db->where('prod_med_id',$data);*/

		//$query = $this->db->get("tblappointments");

		$this->db->select('*');
		$this->db->from('tblappointments');
		
		$this->db->order_by('appointment_id', 'DESC');
		$query = $this->db->get();
		$result_set = $query->result();

		return $result_set;
	}



   
}