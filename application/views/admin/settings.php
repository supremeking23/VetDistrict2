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
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="settings">
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
        Administrator 
        <small>System Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">System Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        


         <?php if ($this->session->flashdata('update_system_setting_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('update_system_setting_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>



            <?php if ($this->session->flashdata('incorrect_password')) { ?>
         
                   <div class="modal modal-danger" id="dangermodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('incorrect_password'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>



              <div class="modal modal-danger fade" id="deleteBackgroundAdmin">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Access Confirmation</h4>
                                  </div>

                                  <?php //beginning form
                                    echo form_open_multipart('access_confirmation_controller/delete_background_admin','class="form-horizontal"');
                                   ?>

                                  <div class="modal-body">
                                    
                                    <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                    
                                    <p>Please enter your password to continue </p>
                                    <div class="has-feedback">
                                        <input type="password"   required="" class="form-control" placeholder="Password" name="password_confirmation">
                                      
                                    </div>
                                    

                                  </div>
                                  <div class="modal-footer">
                                    <?php echo form_submit(array('id' => 'delete_background_admin', 'name' =>'delete_background_admin', 'value' => 'Delete','class'=>'pull-right btn btn-primary')); ?>
                                  </div>

                                  <?php echo form_close();?>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              <div class="modal modal-danger fade" id="deleteBackgroundEmployee">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Access Confirmation</h4>
                                  </div>

                                  <?php //beginning form
                                    echo form_open_multipart('access_confirmation_controller/delete_background_employee','class="form-horizontal"');
                                   ?>

                                  <div class="modal-body">
                                    
                                    <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                    
                                    <p>Please enter your password to continue </p>
                                    <div class="has-feedback">
                                        <input type="password"   required="" class="form-control" placeholder="Password" name="password_confirmation">
                                      
                                    </div>
                                    

                                  </div>
                                  <div class="modal-footer">
                                    <?php echo form_submit(array('id' => 'delete_background_employee', 'name' =>'delete_background_employee', 'value' => 'Delete','class'=>'pull-right btn btn-primary')); ?>
                                  </div>

                                  <?php echo form_close();?>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->


              <div class="modal modal-danger fade" id="deleteBackgroundCustomer">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Access Confirmation</h4>
                                  </div>

                                  <?php //beginning form
                                    echo form_open_multipart('access_confirmation_controller/delete_background_customer','class="form-horizontal"');
                                   ?>

                                  <div class="modal-body">
                                    
                                    <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                    
                                    <p>Please enter your password to continue </p>
                                    <div class="has-feedback">
                                        <input type="password"   required="" class="form-control" placeholder="Password" name="password_confirmation">
                                      
                                    </div>
                                    

                                  </div>
                                  <div class="modal-footer">
                                    <?php echo form_submit(array('id' => 'delete_background_customer', 'name' =>'delete_background_customer', 'value' => 'Delete','class'=>'pull-right btn btn-primary')); ?>
                                  </div>

                                  <?php echo form_close();?>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
          
      </div>

      <div class="row">
            
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">

              <div class="box-tools pull-right" style="background-color: ">
                        <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#editbanners">
                         <i class="fa fa-wrench" style="color: white"></i>
                        </button>

                       <div class="modal fade" id="editbanners">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Change Company Settings</h4>
                              </div>
                              

                              <?php //beginning form
                                  echo form_open_multipart('admin/update_system_settings');
                            ?>
                                 
                                        <div class="modal-body">
                                              <div class="row">

                                               

                                                  <div class="col-md-12">
                                                    
                                                      <div class="form-group has-feedback">
                                                        <input type="text"   required="" class="form-control" placeholder="Company Name"  name="company_name" value="<?php echo $system_name;?>">
                                                      </div>

                                                      <div class="form-group has-feedback">
                                                        <p>Company Logo</p>
                                                        <input type="file"   class="form-control"  name="company_logo" onchange="document.getElementById('company_Logo').src = window.URL.createObjectURL(this.files[0])" >
                                                        <br />
                                                        <img  id="company_Logo" class="img-rounded" alt="" width="100%" height="200" src="" />
                                                      </div>
                                                  

                                                      <div class="form-group has-feedback">
                                                          <select required=""  class="form-control" name="skin_color">
                                                          <option value="">Please choose your preferred skin color</option>
                                                               <?php foreach($skin_colors as $skin_color):?>

                                                                <option value="<?php echo $skin_color->colorskin_id;?>" <?php if($system_color_skin == $skin_color->color_skin){ echo "selected"; } ?> >
                                                                  <?php echo $skin_color->color_skin;?>
                                                                </option>
                                                          <?php endforeach;?>
                                                          </select>
                                                      </div>


                                                  </div>

                                                
                                              </div>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>


                                          <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                          <input type="submit" name="update_system_settings" value="Save Changes"  class="btn btn-primary pull-right">
                                        </div>

                                <?php echo form_close();//endform?>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                       
                      </div>



            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background:<?php echo $system_background_color;?>">
              <h2 class="widget-user-username" style="background:rgba(0,0,0,0.3);text-align: center;font-size: 50px;color: #ffffff"><?php echo $system_name;?></h2>
             
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo site_url(); ?>uploads/system_images/<?php echo $system_logo;?>" alt="logo">
            </div>
            <div class="box-footer">
              <div class="row">
               
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

      </div>

      <div class="row">
        <div class="col-md-4 col-xs-12">
                    <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Change Login Background Image for Admin</h3>

                    
                  </div>
                  <div class="box-body">

                       <?php //beginning form
                            echo form_open_multipart('admin/update_login_photo_admin');
                        ?>

                        <div class="form-group has-feedback">
                            <p>Admin Login Background Image</p>
                            <input type="file"   class="form-control"  name="admin_login_photo" onchange="document.getElementById('login_photo_admin').src = window.URL.createObjectURL(this.files[0])" >
                            <br />

                            <a href="#" data-tooltip="tooltip" title="Remove Background Image" data-toggle="modal" data-target="#deleteBackgroundAdmin">
                              <img  id="login_photo_admin" class="img-rounded" alt="" width="100%" height="200" src="<?php echo site_url(); ?>uploads/system_images/<?php echo $login_photo_admin;?>" />
                            </a>
                        </div>
                   
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                                  <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                 <input type="submit" name="update_admin_photo" class="btn btn-block btn-primary btn-sm">    
                            <?php echo form_close();//endform?>
                  </div>
                  <!-- /.box-footer-->
                </div>
                <!-- /.box -->
        </div>


        <div class="col-md-4 col-xs-12"">
                    <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Change Login Background Image for Employee</h3>

                    
                  </div>
                  <div class="box-body">

                       <?php //beginning form
                            echo form_open_multipart('admin/update_login_photo_employee');
                        ?>

                        <div class="form-group has-feedback">
                            <p>Employee Login Background Image</p>
                            <input type="file"   class="form-control"  name="employee_login_photo" onchange="document.getElementById('login_photo_employee').src = window.URL.createObjectURL(this.files[0])" >
                            <br />
                             <a href="#" data-tooltip="tooltip" title="Remove Background Image" data-toggle="modal" data-target="#deleteBackgroundEmployee">
                              <img  id="login_photo_employee" class="img-rounded" alt="" width="100%" height="200" src="<?php echo site_url(); ?>uploads/system_images/<?php echo $login_photo_employee;?>" />
                            </a>
                        </div>
                   
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                                 <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                 <input type="submit" name="update_employee_photo" class="btn btn-block btn-primary btn-sm">    
                            <?php echo form_close();//endform?>
                  </div>
                  <!-- /.box-footer-->
                </div>
                <!-- /.box -->
        </div>


        <div class="col-md-4 col-xs-12"">
                    <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Change Login Background Image for Customer</h3>

                    
                  </div>
                  <div class="box-body">

                       <?php //beginning form
                            echo form_open_multipart('admin/update_login_photo_customer');
                        ?>

                        <div class="form-group has-feedback">
                            <p>Customer Background Image</p>
                            <input type="file"   class="form-control"  name="customer_login_photo" onchange="document.getElementById('login_photo_customer').src = window.URL.createObjectURL(this.files[0])" >
                            <br />

                             <a href="#" data-tooltip="tooltip" title="Remove Background Image" data-toggle="modal" data-target="#deleteBackgroundCustomer">
                                <img  id="login_photo_customer" class="img-rounded" alt="" width="100%" height="200" src="<?php echo site_url(); ?>uploads/system_images/<?php echo $login_photo_customer;?>" />
                            </a>
                        </div>
                   
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                                  <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                 <input type="submit" name="update_customer_photo" class="btn btn-block btn-primary btn-sm">    
                            <?php echo form_close();//endform?>
                  </div>
                  <!-- /.box-footer-->
                </div>
                <!-- /.box -->
        </div>

      </div>


      <div class="row">

        <div class="col-md-6">
          
          <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Add Gallery Image</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#addBanner"  data-toggle="tooltip" title="Add Gallery Image">
                    <i class="fa fa-plus"></i></button>
                 
                  <div class="modal fade" id="addBanner">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Add Gallery Image</h4>
                        </div>


                    <?php //beginning form
                            echo form_open_multipart('image_gallery_controller/add_image_to_gallery');
                      ?>
                        <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group has-feedback">
                                          <p>Add Gallery Image</p>
                                          <input type="file"   class="form-control"  name="gallery_image" onchange="document.getElementById('gallery_Image').src = window.URL.createObjectURL(this.files[0])" >
                                          <br />
                                          <img  id="gallery_Image" class="img-rounded" alt="" width="100%" height="200" src="" />
                                        </div>

                                    </div>

                                  
                                </div>                          

                        </div>


                        <div class="modal-footer">
                         
                            <input type="submit" name="add_gallery" value="Add" class="btn btn-primary btn-sm pull-right">
                        </div>


                      <?php echo form_close();?>


                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                </div>
              </div>
              <div class="box-body">
                

                <div class="carousel slide" data-ride="carousel" id="featured">


                  <div class="carousel-inner">

                      <?php foreach($image_gallery as $images_for_gallery):?>

                        <?php if( $images_for_gallery->image_id == 1){
                            $carousel_item_active ="active";
                        }else{
                           $carousel_item_active="";
                        }

                        ?>

                        <div class="item <?php echo $carousel_item_active; ?>">
                           <img src="<?php echo site_url()?>uploads/gallery_images/<?php echo $images_for_gallery->image_name;?>" alt="">

                        </div>

                      
                      <?php endforeach;?>

                  </div>


                  <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>

                    <a class="right carousel-control" href="#featured" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>

                  </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer-->
         </div>
        <!-- /.box -->

        </div>


        <div class="col-md-6">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Mission</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#mission"  data-toggle="tooltip" title="Add Banner">
                    <i class="fa fa-plus"></i></button>
                 
                  <div class="modal fade" id="mission">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Mission</h4>
                        </div>


                    <?php //beginning form
                            echo form_open_multipart('admin/update_mission');
                      ?>
                        <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group has-feedback">
                                          <textarea style="width: 100%;height: 150px" class="form-control" name="mission">
                                           <?php foreach($company_mission as $mission):?>
                                              <?php echo $mission->mission;?>
                                           <?php endforeach;?>
                                          </textarea>
                                        </div>

                                    </div>

                                  <input type="hidden" name="system_id" value="<?php echo $system_id;?>">
                                </div>                          

                        </div>


                        <div class="modal-footer">
                         
                            <input type="submit" name="update_mission" value="Update Mission" class="btn btn-primary btn-sm pull-right">
                        </div>


                      <?php echo form_close();?>


                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                </div>
              </div>
              <div class="box-body">
                
                <?php foreach($company_mission as $mission):?>
                    <?php echo $mission->mission;?>
                 <?php endforeach;?>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer-->
            </div>
          <!-- /.box -->

        </div>

      </div>

      

      <div class="row">
        
          <?php if ($this->session->flashdata('add_image_gallery_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('add_image_gallery_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>


          <?php if ($this->session->flashdata('update_mission_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('update_mission_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>

      </div>


     
      <!-- /.row (main row) -->

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
<!--admin scripts -->
<script src="<?php echo site_url()?>assets/js/adminjs.js"></script>

<!-- page script -->
<script>
 



  </script>
</body>
</html>
