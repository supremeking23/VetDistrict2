<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class POS_Controller extends CI_Controller {

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Taipei');

		 $this->load->helper(array('form', 'url'));

		//for reading.. retrieving
		$this->load->model('admin_model');

		//for creating
		$this->load->model('create_model');
		//for updating
		$this->load->model('update_model');

		//for system settings
		$this->load->model('system_settings_model');


		//for services
		$this->load->model('service_model');


		//inventory
		$this->load->model('inventory_model');

		//sales
		$this->load->model('sales_model');

		//pos
		$this->load->model('pos_model');

		//library
		$this->load->library('form_validation');
	}





	public function add_to_cart(){

			//will execute if an item is added

			$product_already_in_cart_error = 0; //if it becomes 1 it is an error or true
			$product_added_to_cart_success = 0; //if it becomes 1 it is success or true

		    if(isset($_SESSION['shopping_cart'])){

		        $product_array_id = array_column($_SESSION['shopping_cart'],"product_id");

		         $product_array_name = array_column($_SESSION['shopping_cart'],"product_name");

		        $product_type_array =  array_column($_SESSION['shopping_cart'],"product_type");   //ex: item,medicen,service

		        //in_array($_GET['id'], $item_array_id)
		        //if(!(in_array($_POST['product_id'], $product_array_id) AND in_array($_POST['product_type'], $product_type_array ))){

		       	if(!(in_array($_POST['product_name'], $product_array_name ) AND in_array($_POST['product_type'], $product_type_array ))){

                        $count = count($_SESSION['shopping_cart']);

                         $item_array = array(

                        'product_type' => $_POST["product_type"],
				          'product_id' => $_POST['product_id'],
				          'product_name' => $_POST['product_name'],
				          'product_quantity' => $_POST['product_quantity'],
				          'product_price' => $_POST['product_price']

                      ); //end array
                        $_SESSION['shopping_cart'][$count] = $item_array;

                        $product_added_to_cart_success = 1;
                      }else{
                        //echo "<script>alert('product already added')</script>";
                        //echo "<script>window.location='shop.php'</script>";
                        $product_already_in_cart_error = 1;
                      }


		        

		    }else{

		          $item_array = array(

		          'product_type' => $_POST["product_type"],
		          'product_id' => $_POST['product_id'],
		          'product_name' => $_POST['product_name'],
		          'product_quantity' => $_POST['product_quantity'],
		          'product_price' => $_POST['product_price']

		            ); //end array
		          $_SESSION['shopping_cart'][0] = $item_array;
		    
		          $product_added_to_cart_success = 1;

		    }


	            echo "total items :" . array_sum(array_column($_SESSION['shopping_cart'], 'product_quantity'));
	            echo "<br /><br />";

	            echo "shopping cart count : " . count($_SESSION['shopping_cart']);
	          //print_r($this->input->post());

	          
	           echo "<br /><br />";

	           foreach ($_SESSION['shopping_cart'] as $keys => $values) {

	          	echo $values['product_id'] .' '. $values['product_name'] ." " . $values['product_quantity'] . "<br />";


	          
	         	}

		          //echo $count_item;

			          if($product_already_in_cart_error == 1){
			          		$this->session->set_flashdata('product_already_in_cart_error',"product ". $_POST['product_name'] . " already added");
			          }


			          if($product_added_to_cart_success == 1){
			          		$this->session->set_flashdata('product_added_to_cart_success',"product ". $_POST['product_name'] . " has been added to cart");
			          }


			         // product_added_to_cart_success


		          redirect('admin/pos');

	}







	public function remove_to_cart(){

		//sleep(2);

         foreach ($_SESSION['shopping_cart'] as $keys => $values) {

            if($values["product_name"] == $_POST['product_name']){
                unset($_SESSION['shopping_cart'][$keys]);
               // echo "<script>alert('Product Removed')</script>";
                //echo "<script>window.location='shop.php'</script>";

                $this->session->set_flashdata('remove_product_from_cart',"product ". $_POST['product_name'] . " has been removed");
            }
          }


         	redirect('admin/pos');
	}



	public function checkout(){
		print_r($this->input->post());

		$customer_id = $this->input->post('customer_id');
		$customer_type ='';
		$customer_name = "";
		$sales_date = date('Y-m-d H:i:s');

		$total_tax = $this->input->post('total_tax');
		$total_amount = $this->input->post('total_amount');
		$sales_total = $this->input->post('sales_total'); //total payable


		if(!empty($customer_id)){
			echo "member to";
			$customer_type="member";
			$get_customer_detail =  $this->admin_model->get_customer_by_id($customer_id);

			foreach($get_customer_detail as $customer_detail){
					$customer_name = $customer_detail->first_name .' '. $customer_detail->middle_name .' '. $customer_detail->last_name;
			}


		}else{
			echo "hindi member to";
			$customer_type="walk in";
			$customer_id = 0;
			$customer_name = $this->input->post('walk_customer_name');
		}




		echo $customer_id;
		echo "<br />" .$sales_total;

		$invoice_number = '#'.date("ymdhis");  

		$data = array(
			'customer_type' => $customer_type,
			'customer_name' => $customer_name,
			'customer_id' => $customer_id,
			'total_tax' =>$total_tax,
			'total_amount' =>$total_amount,
			'sales_total' => $sales_total,
			'sales_date' => $sales_date,
			'invoice_number' => $invoice_number,
		);


		$this->pos_model->add_sales($data);

		//get the last inserted id
		$sales_id = $this->db->insert_id();

		$total = 0;
		foreach($_SESSION['shopping_cart'] as $keys => $values) {
			$product_id =$values['product_id'];
			$product_type =$values['product_type'];
			$product_name = $values['product_name'];
			$sales_quantity = $values['product_quantity'];
			$product_price = $values['product_price'];
			$total_per_product = $total + ($sales_quantity * $product_price);

			//for sales_datail
			$data = array(

				'sales_id' => $sales_id,
				'product_type' => $product_type,
				'product_name' => $product_name,
				'sales_quantity' => $sales_quantity,
				'price_per_product' => $product_price,
				'total_per_product' => $total_per_product,


			);


			$this->pos_model->add_sales_details($data);

			//if the product is item

			if($product_type == "item"){

				echo "product type is item <br />";

				$action = "Purchased Product";
				$user_type="Customer (" .ucfirst($customer_type). ")";
				$inventory_date = date('Y-m-d H:i:s');
				$data = array(
				
				'user_type' => $user_type,
				'user_id' => $customer_id,
				'user_name' => $customer_name,
				'action' => $action ,
				'product_med_id' => $product_id,
				'quantity' => $sales_quantity,
				'inventory_date' => $inventory_date,

			);

			
			$this->create_model->create_med_inventory($data);


			}else if($product_type == "medicine"){

				echo "product type is item <br />";

				$action = "Purchased Product";
				$user_type="Customer (" .ucfirst($customer_type). ")";
				$inventory_date = date('Y-m-d H:i:s');
				$data = array(
				
				'user_type' => $user_type,
				'user_id' => $customer_id,
				'user_name' => $customer_name,
				'action' => $action ,
				'product_item_id' =>  $product_id,
				'quantity' => $sales_quantity,
				'inventory_date' => $inventory_date,
			);


			$this->create_model->create_item_inventory($data);


				echo "product type is medicine <br />";
			}else if($product_type == "service"){
				

				echo "product type is service <br />";
			}
		}



		print_r($data);

		//transfer data from shopping cart session to another session
		$_SESSION['print_receipt'] = $_SESSION['shopping_cart'];
		$_SESSION['sales_id'] = $sales_id;
		
		unset($_SESSION['shopping_cart']);

		

		$this->session->set_flashdata('print_receipt_message',"Please print your receipt");

		redirect('admin/pos');

	//	echo "<br /> sales total " . $sales_total;

	}



		public function add_to_cart_employee(){

			//will execute if an item is added

			$product_already_in_cart_error = 0; //if it becomes 1 it is an error or true
			$product_added_to_cart_success = 0; //if it becomes 1 it is success or true

		    if(isset($_SESSION['shopping_cart'])){

		        $product_array_id = array_column($_SESSION['shopping_cart'],"product_id");

		         $product_array_name = array_column($_SESSION['shopping_cart'],"product_name");

		        $product_type_array =  array_column($_SESSION['shopping_cart'],"product_type");   //ex: item,medicen,service

		        //in_array($_GET['id'], $item_array_id)
		        //if(!(in_array($_POST['product_id'], $product_array_id) AND in_array($_POST['product_type'], $product_type_array ))){

		       	if(!(in_array($_POST['product_name'], $product_array_name ) AND in_array($_POST['product_type'], $product_type_array ))){

                        $count = count($_SESSION['shopping_cart']);

                         $item_array = array(

                        'product_type' => $_POST["product_type"],
				          'product_id' => $_POST['product_id'],
				          'product_name' => $_POST['product_name'],
				          'product_quantity' => $_POST['product_quantity'],
				          'product_price' => $_POST['product_price']

                      ); //end array
                        $_SESSION['shopping_cart'][$count] = $item_array;

                        $product_added_to_cart_success = 1;
                      }else{
                        //echo "<script>alert('product already added')</script>";
                        //echo "<script>window.location='shop.php'</script>";
                        $product_already_in_cart_error = 1;
                      }


		        

		    }else{

		          $item_array = array(

		          'product_type' => $_POST["product_type"],
		          'product_id' => $_POST['product_id'],
		          'product_name' => $_POST['product_name'],
		          'product_quantity' => $_POST['product_quantity'],
		          'product_price' => $_POST['product_price']

		            ); //end array
		          $_SESSION['shopping_cart'][0] = $item_array;
		    
		          $product_added_to_cart_success = 1;

		    }


	            echo "total items :" . array_sum(array_column($_SESSION['shopping_cart'], 'product_quantity'));
	            echo "<br /><br />";

	            echo "shopping cart count : " . count($_SESSION['shopping_cart']);
	          //print_r($this->input->post());

	          
	           echo "<br /><br />";

	           foreach ($_SESSION['shopping_cart'] as $keys => $values) {

	          	echo $values['product_id'] .' '. $values['product_name'] ." " . $values['product_quantity'] . "<br />";


	          
	         	}

		          //echo $count_item;

			          if($product_already_in_cart_error == 1){
			          		$this->session->set_flashdata('product_already_in_cart_error',"product ". $_POST['product_name'] . " already added");
			          }


			          if($product_added_to_cart_success == 1){
			          		$this->session->set_flashdata('product_added_to_cart_success',"product ". $_POST['product_name'] . " has been added to cart");
			          }


			         // product_added_to_cart_success


		          redirect('employee/pos');

	}


	public function remove_to_cart_employee(){

		//sleep(2);

         foreach ($_SESSION['shopping_cart'] as $keys => $values) {

            if($values["product_name"] == $_POST['product_name']){
                unset($_SESSION['shopping_cart'][$keys]);
               // echo "<script>alert('Product Removed')</script>";
                //echo "<script>window.location='shop.php'</script>";

                $this->session->set_flashdata('remove_product_from_cart',"product ". $_POST['product_name'] . " has been removed");
            }
          }


         	redirect('employee/pos');
	}





		public function checkout_employee(){
		print_r($this->input->post());

		$customer_id = $this->input->post('customer_id');
		$customer_type ='';
		$customer_name = "";
		$sales_date = date('Y-m-d H:i:s');

		$total_tax = $this->input->post('total_tax');
		$total_amount = $this->input->post('total_amount');
		$sales_total = $this->input->post('sales_total'); //total payable


		if(!empty($customer_id)){
			echo "member to";
			$customer_type="member";
			$get_customer_detail =  $this->admin_model->get_customer_by_id($customer_id);

			foreach($get_customer_detail as $customer_detail){
					$customer_name = $customer_detail->first_name .' '. $customer_detail->middle_name .' '. $customer_detail->last_name;
			}


		}else{
			echo "hindi member to";
			$customer_type="walk in";
			$customer_id = 0;
			$customer_name = $this->input->post('walk_customer_name');
		}




		echo $customer_id;
		echo "<br />" .$sales_total;

		$invoice_number = '#'.date("ymdhis");  

		$data = array(
			'customer_type' => $customer_type,
			'customer_name' => $customer_name,
			'customer_id' => $customer_id,
			'total_tax' =>$total_tax,
			'total_amount' =>$total_amount,
			'sales_total' => $sales_total,
			'sales_date' => $sales_date,
			'invoice_number' => $invoice_number,
		);


		$this->pos_model->add_sales($data);

		//get the last inserted id
		$sales_id = $this->db->insert_id();

		$total = 0;
		foreach($_SESSION['shopping_cart'] as $keys => $values) {
			$product_id =$values['product_id'];
			$product_type =$values['product_type'];
			$product_name = $values['product_name'];
			$sales_quantity = $values['product_quantity'];
			$product_price = $values['product_price'];
			$total_per_product = $total + ($sales_quantity * $product_price);

			//for sales_datail
			$data = array(

				'sales_id' => $sales_id,
				'product_type' => $product_type,
				'product_name' => $product_name,
				'sales_quantity' => $sales_quantity,
				'price_per_product' => $product_price,
				'total_per_product' => $total_per_product,


			);


			$this->pos_model->add_sales_details($data);

			//if the product is item

			if($product_type == "item"){

				echo "product type is item <br />";

				$action = "Purchased Product";
				$user_type="Customer (" .ucfirst($customer_type). ")";
				$inventory_date = date('Y-m-d H:i:s');
				$data = array(
				
				'user_type' => $user_type,
				'user_id' => $customer_id,
				'user_name' => $customer_name,
				'action' => $action ,
				'product_med_id' => $product_id,
				'quantity' => $sales_quantity,
				'inventory_date' => $inventory_date,

			);

			
			$this->create_model->create_med_inventory($data);


			}else if($product_type == "medicine"){

				echo "product type is item <br />";

				$action = "Purchased Product";
				$user_type="Customer (" .ucfirst($customer_type). ")";
				$inventory_date = date('Y-m-d H:i:s');
				$data = array(
				
				'user_type' => $user_type,
				'user_id' => $customer_id,
				'user_name' => $customer_name,
				'action' => $action ,
				'product_item_id' =>  $product_id,
				'quantity' => $sales_quantity,
				'inventory_date' => $inventory_date,
			);


			$this->create_model->create_item_inventory($data);


				echo "product type is medicine <br />";
			}else if($product_type == "service"){
				

				echo "product type is service <br />";
			}
		}



		print_r($data);

		//transfer data from shopping cart session to another session
		$_SESSION['print_receipt'] = $_SESSION['shopping_cart'];
		$_SESSION['sales_id'] = $sales_id;
		
		unset($_SESSION['shopping_cart']);

		

		$this->session->set_flashdata('print_receipt_message',"Please print your receipt");

		redirect('employee/pos');

	//	echo "<br /> sales total " . $sales_total;

	}




	public function print(){

		//previous settings
		$data['get_system_settings'] = $this->system_settings_model->get_system_settings();

		$sales_id = $_SESSION['sales_id'];

		//wash sessoion sales_id
		unset($_SESSION['sales_id']);
		
		
		//for general information about the receipt
		$data['get_all_data_from_sales'] = $this->pos_model->get_all_sales_by_sales_id($sales_id);

		//for the products that has been purchased
		$data['get_all_data_from_sales_detail'] =  $this->pos_model->get_all_sales_detail_by_sales_id($sales_id);

		//$id = $this->uri->segment(3);


		$this->load->view('shared/invoice_print',$data);
	}













}
