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


		        //check if the product is already in the session by checking the  $product_array_id or $product_type_array
		        if(in_array($_POST['product_id'], $product_array_id) OR (in_array($_POST['product_type'], $product_type_array))){

		         	//check if the specific product is already in the cart by checking the product name
		        	$product_name_array = array_column($_SESSION['shopping_cart'],"product_name");
		        	if(!in_array($_POST['product_name'], $product_name_array)){
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
				      			//echo "<script>alert('product ". $_POST['product_name'] . " already added')</script>";
				      		$product_already_in_cart_error = 1;


				      }

				         


		        }else{
		          //echo "<script>alert('product already added')</script>";
		          //redirect('admin/pos');


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










}
