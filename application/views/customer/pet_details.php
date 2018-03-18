 <?php 

            //for system preferences
            foreach($get_system_settings as $system_settings){
                $system_name = $system_settings->system_name;
                $system_color_skin = $system_settings->color_skin;
                $system_logo = $system_settings->system_logo;
                $system_background_color = $system_settings->background_color;


                $system_id = $system_settings->systemsetting_id;
           }
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $system_name;?> | Customer</title>
  <link rel="shortcut icon" href="<?php echo site_url(); ?>assets/dist/img/vet.png">
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


  <style>
    
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>

</head>

<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="pet">
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

            foreach($current_customer_login as $customer_login){
               $first_name = $customer_login->first_name;
               $middle_name = $customer_login->middle_name;
               $last_name = $customer_login->last_name;
               $image = $customer_login->image;
               $user_email = $customer_login->email;
            }
          ?>

           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                      <?php if(empty($image)){ ?>
                      <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="user-image" alt="User Image">
                     <?php }else{ ?>
                     <img src="<?php echo site_url()?>uploads/customer_image/<?php echo $image;?>" class="user-image" alt="User Image">
                     <?php } ?>


                      <span class="hidden-xs"><?php echo $first_name .' '. $middle_name .' '. $last_name;?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                       
                        <?php if(empty($image)){ ?>
                        <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="img-circle" alt="User Image">
                       <?php }else{ ?>
                       <img src="<?php echo site_url()?>uploads/customer_image/<?php echo $image;?>" class="img-circle" alt="User Image">
                       <?php } ?>

                        <p>
                         <?php echo $first_name .' '. $middle_name .' '. $last_name;?>
                          <small><?php echo $user_email;?></small>
                        </p>
                      </li>
                      <!-- Menu Body -->

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo site_url()?>customer/profile" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo site_url()?>customer/sign_out" class="btn btn-default btn-flat">Sign out</a>
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
        Pet 
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Customer</a></li>
        <li class="active">Pet Details</li>
        <li class="active">Pet Service Record</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        
        <div class="col-md-3">

          <?php foreach($show_pet_details as $pet_details):?>

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <?php if(empty($pet_details->pet_image)){ ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url()?>assets/dist/img/stock-vector-paw-print-205756207.jpg" alt="User's Name">
              <?php }else{ ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url()?>uploads/pet_image/<?php echo $pet_details->pet_image; ?>" alt="User's Name">
              <?php } ?>

              <h3 class="profile-username text-center"><?php echo ucfirst($pet_details->pet_name);?></h3>

              <p class="text-muted text-center"></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Pet ID</b> <a class="pull-right"><?php echo $pet_details->pet_id;?></a>
                </li>
                <li class="list-group-item">
                  <b>Pet Type</b> <a class="pull-right"><?php echo $pet_details->pet_type;?></a>
                </li>
                <li class="list-group-item">
                  <b>Pet Breed</b> <a class="pull-right"><?php echo $pet_details->breed;?></a>
                </li>
                <li class="list-group-item">
                  <b>Gender</b> <a class="pull-right"><?php echo ucfirst($pet_details->gender);?></a>
                </li>
                <li class="list-group-item">
                  <!--$dateadded = date("F j, Y, g:i a", $r["DateAdded"]);-->

                   <?php 
                         $date =date_create($pet_details->date_birth);
                         $birthdate= date_format($date,"F d Y");

                    ?>
                  <b>Date of Birth</b> <a class="pull-right"><?php echo $birthdate;?></a>
                </li>
                <li class="list-group-item">
                  <?php $age = floor((time() - strtotime($birthdate)) / 31556926);?>
                  <b>Age</b> <a class="pull-right"><?php echo $age;?></a>
                </li>
              </ul>


             
              <?php endforeach;?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->



      <div class="col-md-9">
            
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Medical Record History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  
              <table  class="data-table table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Medical Record ID</th>
                    <th>Date</th>
                    <th>Assess By</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
               
               <?php foreach($pets_diagnosis as $diagnosis):?>
                <tr>
                  <td><?php echo $diagnosis->diagnosis_data_id;?></td>
                  <?php 

                     $date =date_create($diagnosis->diagnosis_date);
                              $diagnosis_date= date_format($date,"F j, Y, g:i a");
                  ?>
                  <td><?php echo  $diagnosis_date;?></td>
                  <td><?php echo $diagnosis->first_name .' '. $diagnosis->middle_name .' '. $diagnosis->last_name?></td>
                  <td><a role="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view_detail<?php echo $diagnosis->diagnosis_id;?>">View Detail</a> <a class="btn btn-info btn-sm" href="<?php echo site_url()?>pet_diagnosis/print/<?php echo $diagnosis->diagnosis_id;?>">Print Detail</a></td>

                  <div class="modal fade" id="view_detail<?php echo $diagnosis->diagnosis_id;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title text-center">Diagnosis Detail</h4>
                        </div>
                        <div class="modal-body">
                            
                              <div class="row">
                                <div class="col-md-9 offset-md-3">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <b>Diagnosis ID:</b>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <input type="text" class="form-control" id="diagnosis_data_id" name="diagnosis_data_id" value="<?php echo $diagnosis->diagnosis_data_id?>" readonly="true" style="border-radius: 6px;" />  
                                      </div>  
                                    </div>
                                  </div>  
                                </div>
                             </div>

                            <div class="row">
                                  <div class="col-md-9 offset-md-3">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <b>Pet ID:</b>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="form-group">
                                          <input type="text" class="form-control" id="pet_data_id" name="pet_data_id" value="<?php echo $diagnosis->pet_data_id?>" readonly="true" style="border-radius: 6px;" />  
                                        </div>  
                                      </div>
                                    </div>  
                                  </div>
                            </div>


                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <b>Pet Name:</b>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?php echo $diagnosis->pet_name?>" readonly="true" style="border-radius: 6px;" />  
                                      </div>  
                                    </div>
                                  </div>  
                                </div>
                          </div>



                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <b>Owner Name:</b>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <input type="text" class="form-control" id="owner_name" name="owner_name" value="<?php echo $diagnosis->cus_firstname .' '. $diagnosis->cus_middlename .' '. $diagnosis->cus_lastname; ?>" readonly="true" style="border-radius: 6px;" />  


                                      </div>  
                                    </div>
                                  </div>  
                                </div>
                          </div>


                           <div class="row">
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-md-5">
                                    <b> Body Weight:(in KG)</b>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <input type="number" readonly="" value="<?php echo $diagnosis->body_weight; ?>" min="0" max="1000"  class="form-control" id="body_weight" style="margin-left:5px;border-radius: 6px" name="body_weight" /> 
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-md-6">
                                  <b>Body Temperature (in Celcius):</b>  
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" readonly="" value="<?php echo $diagnosis->body_temperature; ?>" class="form-control" id="body_temp" name="body_temp" style="border-radius: 6px" />  
                                    </div>
                                  </div>
                                </div>
                              </div>

                             
                           </div>

                            <hr />

                         <div class="row">
                            <div class="col-md-12">
                              <label>Subject : </label> 
                              <div class="form-group">
                              <textarea name="subject" readonly=""  id="subject" class="form-control" style="height:100px" placeholder="Input Owner Statement">
                                 <?php echo $diagnosis->subject; ?>
                              </textarea>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-12">
                              <label>Objective : </label> 
                              <div class="form-group">
                              <textarea name="objective" readonly="" id="objective" class="form-control" style="height:100px" placeholder="Input Veterinarian Observation">
                                <?php echo $diagnosis->objective; ?>
                              </textarea>
                              </div>
                            </div>
                          </div>



                          <div class="row">
                            <div class="col-md-12">
                              <label>Assessment : </label> 
                              <div class="form-group">
                              <textarea name="assessment" readonly=""  id="assessment" class="form-control" style="height:100px" placeholder="Input Owner need to do">
                                <?php echo $diagnosis->assessment; ?>
                              </textarea>
                              </div>
                            </div>
                          </div>


                           <div class="row">
                            <div class="col-md-12">
                              <label>Plan : </label> 
                              <div class="form-group">
                              <textarea name="plan" id="plan" readonly=""  class="form-control" style="height:100px" placeholder="Input Owner need to attain">
                                <?php echo $diagnosis->plan; ?>
                              </textarea>
                              </div>
                            </div>
                          </div>



                         <div class="row">
                              <div class="col-md-9 offset-md-3">
                                <div class="row">
                                  <div class="col-md-4">
                                    <b>Veterinary Service Fee:</b>
                                  </div>
                                  <div class="col-md-8">
                                    <div class="form-group">
                                      <input type="text" readonly="" class="form-control" id="vet_pet_service" name="vet_pet_service" value="<?php echo $diagnosis->service_fee; ?>"  style="border-radius: 6px;" />  
                                    </div>  
                                  </div>
                                </div>  
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

                  

                
                </tr>
                
                <?php endforeach;?>
                </tbody>
               
                </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row (main row) -->



      <div class="row">
        <?php  //for messages?>

              <?php if ($this->session->flashdata('update_pet_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('update_pet_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>

                <?php if ($this->session->flashdata('change_state')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('change_state'); ?> </p>
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


                <div class="modal fade modal-danger" id="access_confirmation">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Access Confirmation</h4>
                                </div>

                                 <?php //beginning form
                                    echo form_open_multipart('admin/update_pet_state','class="form-horizontal"');
                              ?>
                                <div class="modal-body">
                                  <input type="hidden" name="current_state" value="<?php echo  $pet_details->is_active;?>">
                                  <input type="hidden" name="pet_id" value="<?php echo  $pet_details->pet_id;?>">
                                  <p>Please enter your password to continue </p>
                                  <div class="has-feedback">
                                      <input type="password"   required="" class="form-control" placeholder="Password" name="password_confirmation">
                                    
                                  </div>


                                  
                                </div>

                                <div class="modal-footer">
                                   <?php echo form_submit(array('id' => 'change_state', 'name' =>'change_state', 'value' => 'Proceed','class'=>'pull-right btn btn-primary')); ?>
                                 
                                </div> 
                                <?php echo form_close();?>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
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
<!--admin scripts -->
<script src="<?php echo site_url()?>assets/js/globaljs.js"></script>

<!-- page script -->
<script>

   

</script>
</body>
</html>
