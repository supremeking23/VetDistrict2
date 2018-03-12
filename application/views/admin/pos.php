 <?php 

            //for system preferences
            foreach($get_system_settings as $system_settings){
                $system_name = $system_settings->system_name;
                $system_color_skin = $system_settings->color_skin;
                $system_logo = $system_settings->system_logo;
                $system_background_color = $system_settings->background_color;


                $system_id = $system_settings->systemsetting_id;



                //for background photos in login
                $login_photo_admin = $system_settings->login_photo_admin;
                $login_photo_employee = $system_settings->login_photo_employee;
                $login_photo_customer = $system_settings->login_photo_customer;
           }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $system_name;?> | Admin</title>
  <link rel="shortcut icon" href="<?php echo site_url(); ?>uploads/system_images/<?php echo $system_logo;?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/dist/css/skins/<?php echo $system_color_skin?>.css">
   
     <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">

  </style>
</head>
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="pos">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $system_name;?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
           
            <ul class="dropdown-menu">
            
              <li>
                <!-- inner menu: contains the actual data -->

              </li>

            </ul>
          </li>


             <?php 

            foreach($current_admin_login as $admin_login){
               $first_name = $admin_login->first_name;
               $middle_name = $admin_login->middle_name;
               $last_name = $admin_login->last_name;
               $image = $admin_login->image;
               $admin_type = $admin_login->admin_type;
            }
          ?>

           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                      <?php if(empty($image)){ ?>
                      <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="user-image" alt="User Image">
                     <?php }else{ ?>
                     <img src="<?php echo site_url()?>uploads/admin_image/<?php echo $image;?>" class="user-image" alt="User Image">
                     <?php } ?>


                      <span class="hidden-xs"><?php echo $first_name .' '. $middle_name .' '. $last_name;?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                       
                        <?php if(empty($image)){ ?>
                        <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="img-circle" alt="User Image">
                       <?php }else{ ?>
                       <img src="<?php echo site_url()?>uploads/admin_image/<?php echo $image;?>" class="img-circle" alt="User Image">
                       <?php } ?>

                        <p>
                         <?php echo $first_name .' '. $middle_name .' '. $last_name;?>
                         <small><?php echo strtoupper($admin_type);?></small>
                        </p>
                      </li>
                      <!-- Menu Body -->

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo site_url()?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo site_url()?>admin/sign_out" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
          </li>


        </ul>
      </div>
    </nav>
  </header>
   <!-- Left side column. contains the logo and sidebar  included in the controller admin-->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        POS 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">POS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <div class="col-md-12">
          
           <?php //product is successfully added to the cart ?>

         <?php if ($this->session->flashdata('product_added_to_cart_success')) {?>

             <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php echo $this->session->flashdata('product_added_to_cart_success');?>
             </div>

         <?php }?>

       

       <?php if ($this->session->flashdata('remove_product_from_cart')) {?>

           <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php echo $this->session->flashdata('remove_product_from_cart');?>
             </div>

        <?php } ?>



          <?php if ($this->session->flashdata('product_already_in_cart_error')) {?>

            <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <?php echo  $this->session->flashdata('product_already_in_cart_error'); ?>
            </div>

        <?php } ?>


           <?php if ($this->session->flashdata('print_receipt_message')) {?>

           <div class="alert alert-success alert-dismissible" id="close_print_message">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <p><?php echo $this->session->flashdata('print_receipt_message');?></p>
                


                <a href="<?php echo site_url()?>pos_controller/print" id="print_close" class="btn btn-sm btn-info"  target="_blank">Print <span class="fa fa-print"></span></a>
             </div>

        <?php } ?>    





        </div>

      </div>




      <div class="row">

            <div class="col-md-5">
              <div class="box">
                
                <div class="box-body table-responsive no-padding">


                

                  <table id="example1" class="table table-bordered table-striped">
                     
                      <tr>
                          <td>
                            <table  class="table table-striped table-condensed table-hover list-table" style="margin:0px;" data-height="100">
                              <thead>
                              <tr class="success">
                                <th>Product</th>
                                <th>Product Type</th>
                                <th style="width: 15%;text-align:center;">Price</th>
                                <th style="width: 15%;text-align:center;">Qty</th>
                                <th style="width: 20%;text-align:center;">Subtotal</th>
                                <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                              </tr>
                              </thead>

                              <tbody>

                                <?php if(!empty($_SESSION['shopping_cart'])){ ?>

                                 <?php 
                                    //global variable
                                    $total = 0;
                                    $total_payable = 0;
                                    $tax = 2; //2 pesos
                                 ?>

                                  <?php if(count($_SESSION['shopping_cart']) < 7 ){ // unti lang laman ng cart 7 below?>

                                      <?php foreach($_SESSION['shopping_cart'] as $keys => $values): ?>

                                              <tr>
                                                <td><?php echo $values['product_name']; ?></td>
                                                <td><?php echo $values['product_type']; ?></td>
                                                <td>₱<?php echo $values['product_price'];?></td>
                                                <td><?php echo $values['product_quantity'];?></td>
                                                <td>₱<?php echo number_format($values['product_quantity'] * $values['product_price'],2);?></td>
                                                <td>
                                                      

                                                      <?php 
                                                        echo form_open_multipart('pos_controller/remove_to_cart');

                                                     ?>

                                                     <input type="hidden" name="product_type" value="<?php echo $values['product_type']; ?>">
                                                     
                                                     <input type="hidden" name="product_id" value="<?php echo $values['product_id'];?>">

                                                     <input type="hidden" name="product_name" value="<?php echo $values['product_name']; ?>">

                                                    


                                                      <button type="submit" id="delete_product" style="" class="btn btn-sm btn-danger" data-tooltip="tooltip" title="delete product"><i class="fa fa-trash-o"></i></button>

                                                  
                                                     <?php echo form_close();//endform?>

                                              </tr>


                                                <?php 


                                            //computation for total and tatal payables

                                              $total = $total + ($values['product_quantity'] * $values['product_price']);

                                              $total_tax = $tax * array_sum(array_column($_SESSION['shopping_cart'], 'product_quantity'));


                                              $total_payable = $total + $total_tax;

                                          ?>

                                        

                                          <?php endforeach;  //for items less than 7?>


                                            <?php 

                                              $x = 0;
                                              while($x < 8):
                                              ?>

                                              <tr>
                                                <td><p></p></td>
                                                 <td><p></p></td>
                                                <td><p></p></td>
                                                <td><p></p></td>
                                                <td><p></p></td>
                                                <td><p></p></td>
                                              </tr>

                                            <?php 

                                              $x++;
                                            endwhile;?>
                                
                                  <?php }else{ ?>

                                   <?php foreach($_SESSION['shopping_cart'] as $keys => $values): ?>

                                              <tr>
                                                <td><?php echo $values['product_name']; ?></td>
                                                <td><?php echo $values['product_type']; ?></td>
                                                <td>₱<?php echo $values['product_price'];?></td>
                                                <td><?php echo $values['product_quantity'];?></td>
                                                <td>₱<?php echo number_format($values['product_quantity'] * $values['product_price'],2);?></td>
                                                <td>

                                                   <?php 
                                                        echo form_open_multipart('pos_controller/remove_to_cart');

                                                     ?>

                                                     <input type="hidden" name="product_type" value="<?php echo $values['product_type']; ?>">
                                                     
                                                     <input type="hidden" name="product_id" value="<?php echo $values['product_id'];?>">

                                                     <input type="hidden" name="product_name" value="<?php echo $values['product_name']; ?>">

                                                    


                                                      <button type="submit" id="delete_product" style="" class="btn btn-sm btn-danger" data-tooltip="tooltip" title="delete product"><i class="fa fa-trash-o"></i></button>

                                                  
                                                     <?php echo form_close();//endform?>


                                                </td>
                                              </tr>

                                              

                                          
                                            <?php 


                                            //computation for total and tatal payables

                                              $total = $total + ($values['product_quantity'] * $values['product_price']);

                                              $total_tax = $tax * array_sum(array_column($_SESSION['shopping_cart'], 'product_quantity'));


                                              $total_payable = $total + $total_tax;

                                          ?>


                                          <?php endforeach; ?>


                               <?php   } ?>

                               <?php }else{ ?>



                                      <?php 

                                              $x = 0;
                                              while($x < 8):
                                              ?>

                                              <tr>
                                                <td><p></p></td>
                                                 <td><p></p></td>
                                                <td><p></p></td>
                                                <td><p></p></td>
                                                <td><p></p></td>
                                                <td><p></p></td>
                                              </tr>

                                  <?php 

                                              $x++;
                                            endwhile;?>




                             <?php  }?>
                              </tbody>
                            </table>

                            <div style="clear:both;"></div>
                            <div id="totaldiv">
                            <table id="totaltbl" class="table table-condensed totals" style="margin-bottom:10px;">
                            <tbody>
                            <tr class="info">
                            <td width="25%">Total Items</td>
                            <td class="text-right" style="padding-right:10px;"><span id="count">
                            <?php 
                              //number of products 1
                              if(!empty($_SESSION['shopping_cart'])){
                                 echo  count($_SESSION['shopping_cart']);
                              }
                             
                            ?>
                            (<?php 
                              //total number of products (10)
                              if(!empty($_SESSION['shopping_cart'])){
                                echo array_sum(array_column($_SESSION['shopping_cart'], 'product_quantity'));
                              }
                            ?>)

                          </span></td>
                            <td width="25%">Total</td>



                            <td class="text-right" colspan="2"><span id="total">₱<?php
                            if(!empty($_SESSION['shopping_cart'])){
                             echo number_format($total,2); } ?></span></td>
                            </tr>
                            <tr class="info">
                            <td width="25%"><a href="#" id="add_discount"></a></td>
                            <td class="text-right" style="padding-right:10px;"><span id="ds_con"></span></td>
                            <td width="25%"><a href="#" id="add_tax">Order Tax</a></td>
                            <td class="text-right"><span id="ts_con">₱<?php
                            if(!empty($_SESSION['shopping_cart'])){
                             echo number_format($total_tax,2); } ?></span></td>
                            </tr>
                            <tr class="success">
                            <td colspan="2" style="font-weight:bold;">
                            Total Payable <a role="button" data-toggle="modal" data-target="#noteModal">
                            <i class="fa fa-comment"></i>
                            </a>
                            </td>
                            <td class="text-right" colspan="2" style="font-weight:bold;"><span id="total-payable">₱<?php 
                            if(!empty($_SESSION['shopping_cart'])){
                                echo number_format($total_payable,2); } ?></span></td>
                            </tr>

                            
                            </tbody>
                            </table>
                            </div>

                          </td>
                      </tr>



                      <?php echo form_open_multipart('pos_controller/checkout');//start form?>

                       <tr>
                          <td> 
                            <?php //option for unit of measurements
                                    $option = array(
                                        "walkin" => "Walk in Customer",
                                        "member" => "Member",

                                    );
                                ?>

                               
                                    <div class="form-group has-feedback">
                                        <?php echo form_dropdown('is_walkin',$option,'','class="form-control" id="is_walkin" required');?>
                                        
                                    </div>

                                     <fieldset id="for_member">
                                         <div class="form-group has-feedback">
                                             <select name="customer_id"  class="form-control select2" style="width: 100%" >
                                              <option value="">Customer Name</option>
                                              <?php foreach($customers as $customer):?>
                                                
                                               <option value="<?php echo $customer['customer_id']?>"><?php echo $customer['first_name'] .' '. $customer['middle_name'] .' '. $customer['last_name']?></option>
                                               <?php ?>
                                             <?php endforeach;?>
                                             </select>
                                          </div>
                                    </fieldset>

                                    <fieldset id="for_walkin">
                                        <div class="form-group has-feedback">
                                          <input type="text" class="form-control" name="walk_customer_name" placeholder="Enter Name for walk in Customer">
                                          
                                        </div>

                                   
                                  </fieldset>
                          </td>
                      </tr>


                      <tr>
                              <td width="100%" colspan="4">


                              <?php if(!empty($_SESSION['shopping_cart'])):?>

                               <input type="hidden" name="total_tax" value="<?php echo number_format($total_tax,2);?>">
                               <input type="hidden" name="total_amount" value="<?php echo number_format($total,2);?>">
                               <?php //total_payable?>
                               <input type="hidden" name="sales_total" value="<?php echo number_format($total_payable,2);?>">


                             <?php endif; ?>

                               <?php ?>
                                <button type="submit" class="btn btn-sm btn-success btn-block">Checkout</button>
                                 



                                


                              </td>
                      </tr>
             
                      <?php echo form_close(); //end form?>

                  </table> <?php //end main table?>

                

                </div>
                <!-- /.box-body -->
              </div>
            </div>


            <div class="col-md-7">
                
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Product (Items)</h3>
                  
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          
                           

                        </div>
                  </div>
                    <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                       <table  class="data-table table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock(s) left</th>
                        <th>Details</th>
                        <th></th>

                      </tr>
                      </thead>
                      <tbody>

                      <?php foreach($items as $item):?>

                      <tr>
                        <td><?php echo $item['item_name'];?></td>
                        <td>₱<?php echo $item['item_price'];?>
                        </td>
                        <td><?php echo $item['item_qty'];?></td>
                        <td> <a  data-toggle="modal" data-target="#item_detail<?php echo $item['prod_item_id'];?>"  role="button" class="btn btn-primary btn-sm">View Details</a>

                        </td>
                        <td>
                         
                           <?php 
                            echo form_open_multipart('pos_controller/add_to_cart');

                         ?>

                         <input type="hidden" name="product_type" value="item">
                         <input type="hidden" name="product_id" value="<?php echo $item['prod_item_id'];?>">

                         <input type="hidden" name="product_name" value="<?php echo $item['item_name'];?>">

                         <input type="hidden" name="product_price" value="<?php echo $item['item_price'];?>">



                         <input type="number" class="" name="product_quantity" value=""  style="width: 50px " min="1" max="<?php echo $item['item_qty'];?>" required="">

                          <button type="submit" class="btn btn-sm btn-success" data-tooltip="tooltip" title="add product"><span class="fa fa-plus"></span></button>

                      
                         <?php echo form_close();//endform?>

                        
                        </td>

                      </tr>


                      <div class="modal fade" id="item_detail<?php echo $item['prod_item_id'];?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Product Detail</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <?php if(empty($item['image'])){ ?>

                                      <center>
                                        <img  class="img-responsive" alt="" width="100" height="200" src="<?php echo site_url(); ?>uploads/system_images/<?php echo   $system_logo;?>" />
                                      </center>

                                     <?php }else{ ?>

                                      <center>
                                          <img  class="img-responsive" alt="" width="100" height="200" src="<?php echo site_url(); ?>uploads/item_image/<?php echo $item['image'];?>" />
                                      </center>

                                     <?php }?>
                                  </div>
                                  <div class="col-md-8">
                                      <dl class="dl-horizontal">
                                          <dt>Product Name:</dt>
                                          <dd><?php echo $item['item_name'];?></dd>
                                          <dt>Product Price:</dt>
                                          <dd>₱<?php echo $item['item_price'];?></dd>
                                          <dt>Stock(s) Left:</dt>
                                          <dd><?php echo $item['item_qty'];?></dd>
                                        </dl>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                        <!-- /.modal -->

                      
                    <?php endforeach;?>

                      </tbody>

                    </table>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>


                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Product (Medicines)</h3>
                  
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          
                           

                        </div>
                  </div>
                    <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                       <table  class="data-table table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock(s) left</th>
                        <th>Details</th>
                        <th></th>

                      </tr>
                      </thead>
                      <tbody>

                      <?php foreach($medicines as $medicine):?>

                      <tr>
                        <td><?php echo $medicine['med_name'];?> (<?php echo ucfirst($medicine['drug_type']);?>)</td>
                        <td>₱<?php echo $medicine['med_price'];?>
                        </td>
                        <td><?php echo $medicine['med_qty'];?></td>
                        <td>
                          
                         <a data-toggle="modal" data-target="#med_detail<?php echo $medicine['prod_med_id'];?>"  role="button" class="btn btn-primary btn-sm">View Details</a>
                        </td>

                        <td>
                          
                           <?php 
                            echo form_open_multipart('pos_controller/add_to_cart');

                         ?>

                         <input type="hidden" name="product_type" value="medicine">
                         <input type="hidden" name="product_id" value="<?php echo $medicine['prod_med_id'];?>">

                         <input type="hidden" name="product_name" value="<?php echo $medicine['med_name'];?>">

                         <input type="hidden" name="product_price" value="<?php echo $medicine['med_price'];?>">

                         <input type="number" class="" name="product_quantity" value=""  style="width: 50px " min="1" max="<?php echo $medicine['med_qty'];?>" required="">

                          <button type="submit" class="btn btn-sm btn-success" data-tooltip="tooltip" title="add product"><span class="fa fa-plus"></span></button>

                      
                         <?php echo form_close();//endform?>


                        </td>

                      </tr>


                       <div class="modal fade" id="med_detail<?php echo $medicine['prod_med_id'];?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Product Detail</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <?php if(empty($medicine['image'])){ ?>

                                      <center>
                                        <img  class="img-responsive" alt="" width="100" height="200" src="<?php echo site_url(); ?>uploads/system_images/<?php echo   $system_logo;?>" />
                                        dsdsdsds
                                      </center>

                                     <?php }else{ ?>

                                      <center>
                                          <img  class="img-responsive" alt="" width="100" height="200" src="<?php echo site_url(); ?>uploads/med_image/<?php echo $medicine['image'];?>" />
                                      </center>

                                     <?php }?>
                                  </div>
                                  <div class="col-md-8">
                                      <dl class="dl-horizontal">
                                          <dt>Product Name:</dt>
                                          <dd><?php echo $medicine['med_name'];?></dd>
                                          <dt>Medicine Type</dt>
                                          <dd><?php echo ucfirst($medicine['drug_type']);?></dd>
                                          <dt>Product Price:</dt>
                                          <dd>₱<?php echo $medicine['med_price'];?></dd>
                                          <dt>Stock(s) Left:</dt>
                                          <dd><?php echo $medicine['med_qty'];?></dd>
                                        </dl>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                        <!-- /.modal -->



                      
                    <?php endforeach;?>

                      </tbody>

                    </table>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>



                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Services</h3>
                  
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          
                           

                        </div>
                  </div>
                    <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                       <table  class="data-table table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Service</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th></th>

                      </tr>
                      </thead>
                      <tbody>

                      <?php foreach($services as $service):?>

                      <tr>
                        <td><?php echo $service->service_name;?></td>
                        <td><?php echo $service->servicetype_name;?>
                        </td>
                        <td>₱<?php echo $service->price;?></td>
                        <td>
                          
                         <a data-toggle="modal" data-target="#service_detail<?php echo $service->service_id;?>"  role="button" class="btn btn-primary btn-sm">View Details</a>
                        </td>

                        <td>


                        <?php 
                            echo form_open_multipart('pos_controller/add_to_cart');

                         ?>

                         <input type="hidden" name="product_type" value="service">
                         <input type="hidden" name="product_id" value="<?php echo $service->service_id;?>">

                         <input type="hidden" name="product_name" value="<?php echo $service->service_name;?>">

                         <input type="hidden" name="product_price" value="<?php echo $service->price;?>">

                         <input type="number" class="" name="product_quantity" value=""  style="width: 50px " min="1" max="1000" required="">

                          <button type="submit" class="btn btn-sm btn-success" data-tooltip="tooltip" title="add product"><span class="fa fa-plus"></span></button>

                      
                         <?php echo form_close();//endform?>
                          
                         

                        </td>

                      </tr>



                       <div class="modal fade" id="service_detail<?php echo $service->service_id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Servie Detail</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-4">
                                     

                                      <center>
                                        <img  class="img-responsive" alt="" width="100" height="200" src="<?php echo site_url(); ?>uploads/system_images/<?php echo   $system_logo;?>" />
                                 
                                      </center>

                                   
                                  </div>
                                  <div class="col-md-8">
                                      <dl class="dl-horizontal">
                                          <dt>Service Name:</dt>
                                          <dd><?php echo $service->service_name;?></dd>
                                          <dt>Service Type</dt>
                                          <dd><?php echo ucfirst($service->servicetype_name);?></dd>
                                          <dt>Price:</dt>
                                          <dd>₱<?php echo $service->price;?></dd>
                                          <dt></dt>
                                          <dd></dd>
                                        </dl>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                               
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                        <!-- /.modal -->
                      
                    <?php endforeach;?>

                      </tbody>

                    </table>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>




            </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
     <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"><?php echo $system_name;?></a>.</strong> All rights reserved.
    
  </footer>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo site_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo site_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



<!-- DataTables -->
<script src="<?php echo site_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo site_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo site_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo site_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url()?>assets/dist/js/demo.js"></script>

<!-- Select2 -->
<script src="<?php echo site_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<!--admin scripts -->
<script src="<?php echo site_url()?>assets/js/globaljs.js"></script>


<!-- page script -->
<script>
 
  $(document).ready(function() {


      $('#for_member').hide();

      $('#is_walkin').change(function(){

          var is_walkin = $('#is_walkin').val();

          if(is_walkin == "member"){
            
             $('#for_member').show();
             $('#for_walkin').hide();
          }else if(is_walkin =="walkin"){
            
             $('#for_member').hide();
             $('#for_walkin').show();
          }
      });

     });


   /* var print_close = document.getElementById("print_close");
    var close_print_message = document.getElementById("close_print_message");

    print_close.addEventListener("click",function(){
        close_print_message.hide();
    });*/


    $("#print_close").click(function(){
      $("#close_print_message").hide();
    });


  </script>
</body>
</html>
