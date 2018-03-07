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

		        $product_type_array =  array_column($_SESSION['shopping_cart'],"product_type");   //ex: item,medicen,service

		        //in_array($_GET['id'], $item_array_id)
		       	if(!(in_array($_POST['product_id'], $product_array_id) AND in_array($_POST['product_type'], $product_type_array ))){

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




	public function print(){
		if(isset($_GET['product_id'])){
			echo $_GET['product_id'];
		}
	}



	public function checkout(){
		print_r($this->input->post());

		$customer_id = $this->input->post('customer_id');
		$customer_type ='';
		$customer_name = "";
		$sales_date = date('Y-m-d H:i:s');

		$sales_total = $this->input->post('sales_total'); //total payable


		if(!empty($customer_id)){
			echo "member to";
			$customer_type="member";
			$customer_name ="";
		}else{
			echo "hindi member to";
			$customer_type="walkin";
			$customer_id = 0;
			$customer_name = $this->input->post('walk_customer_name');
		}




		echo $customer_id;
		echo "<br />" .$sales_total;

		$data = array(
			'customer_type' => $customer_type,
			'customer_name' => $customer_name,
			'customer_id' => $customer_id,
			'sales_total' => $sales_total,
			'sales_date' => $sales_date
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
				'total_per_product' => $total_per_product,

			);


			$this->pos_model->add_sales_details($data);

			//if the product is item

			if($product_type == "item"){

				echo "product type is item <br />";

				$action = "Purchased Product";
				$user_type="Customer";
				$inventory_date = date('Y-m-d H:i:s');
				$data = array(
				
				'user_type' => $user_type,
				'user_id' => $customer_id,
				'action' => $action ,
				'product_med_id' => $product_id,
				'quantity' => $sales_quantity,
				'inventory_date' => $inventory_date,

			);

			
			$this->create_model->create_med_inventory($data);


			}else if($product_type == "medicine"){

				echo "product type is item <br />";

				$action = "Purchased Product";
				$user_type="Customer";
				$inventory_date = date('Y-m-d H:i:s');
				$data = array(
				
				'user_type' => $user_type,
				'user_id' => $customer_id,
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



		unset($_SESSION['shopping_cart']);

		redirect('admin/pos');

		echo "<br /> sales total " . $sales_total;

	}










}
