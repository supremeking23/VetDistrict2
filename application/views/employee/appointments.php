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
  <title><?php echo $system_name;?> |  <?php
  //comes frome the session
   echo ucfirst($employee_type);?> </title>
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
  
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


     <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">


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
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="appointment">
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

            foreach($current_employee_login as $employee_login){
               $first_name = $employee_login->first_name;
               $middle_name = $employee_login->middle_name;
               $last_name = $employee_login->last_name;
               $image = $employee_login->image;
            }
          ?>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                      <?php if(empty($image)){ ?>
                      <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="user-image" alt="User Image">
                     <?php }else{ ?>
                     <img src="<?php echo site_url()?>uploads/employee_image/<?php echo $image;?>" class="user-image" alt="User Image">
                     <?php } ?>


                      <span class="hidden-xs"><?php echo $first_name .' '. $middle_name .' '. $last_name;?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                       
                        <?php if(empty($image)){ ?>
                        <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="img-circle" alt="User Image">
                       <?php }else{ ?>
                       <img src="<?php echo site_url()?>uploads/employee_image/<?php echo $image;?>" class="img-circle" alt="User Image">
                       <?php } ?>

                       <p>
                         <?php echo $first_name .' '. $middle_name .' '. $last_name;?>
                          <small><?php echo ucfirst($employee_login->employee_type);?></small>
                        </p>
                      </li>
                      <!-- Menu Body -->

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo site_url()?>employee/profile" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo site_url()?>employee/sign_out" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
          </li>

          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar  included in the controller admin-->
  

  <!-- testing-->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointment
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Appointment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          
      </div>
      <!-- /.row -->


      <!-- row for modals -->

       <div class="row">


                      <div class="modal fade" id="bookAppointment">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Schedule an Appointment</h4>
                            </div>

                            <?php 
                            echo form_open_multipart('employee/book_appointment');
                                  ?>
                            <div class="modal-body">



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

                                      <div class="form-group has-feedback">
                                        <input type="text" class="form-control" name="telephone" placeholder="Telephone Number">
                                      
                                      </div>

                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control" name="cellphone" placeholder="Cellphone Number">
                                        
                                      </div>
                                    </fieldset>


                                   <?php //option for unit of measurements
                                    $option = array(
                                        ""       => "Preferred Time",
                                        "moring" => "Morning",
                                        "afternoon" => "Afternoon",
                                        "evening" => "Evening",
                                        
                                    );
                                ?>

                               
                                    <div class="form-group has-feedback">
                                        <?php echo form_dropdown('preferred_time',$option,'','class="form-control"','required');?>
                                        
                                    </div>


                                      <div class="form-group has-feedback">
                                        <input type="date" class="form-control" name="preferred_date" placeholder="Preferred Date">
                                      
                                      </div>




                                     <div class="form-group has-feedback">
                                        <textarea style="width: 100%;height: 70px" name="reason" placeholder="Reason"></textarea>
                                        
                                    </div>



                            </div>
                            <div class="modal-footer">
                             <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
                            </div>

                             <?php echo form_close(); ?>

                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->





               <?php if ($this->session->flashdata('book_appointment_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('book_appointment_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>
          
      </div>



      <!-- Main row -->

      <div class="row">
          <div class="col-xs-12">
           <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Appointment Record</h3>

                    <div class="box-tools pull-right">
                     
                      
                        <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#bookAppointment"><i class="fa fa-calendar" data-tooltip="tooltip" title="Book an Appointment"></i></button>
                      </div>


                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table  class="data-table table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Customer Name</th>
                      <th>Date Requested</th>
                      <th>Appointment Date</th>
                      <th>Time</th>
                      <th>Status</th>
                      
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    



                    <?php foreach($appointments as $appointment):?>
                   
                      <tr>

                        <td><?php echo $appointment->customer_name;?></td>

                        <?php 
                            //0000-00-00 00:00:00
                          if($appointment->date_requested == "0000-00-00 00:00:00"){

                            $date_requested = "";
                          }else{
                             $date_req =date_create($appointment->date_requested);
                              $date_requested= date_format($date_req,"F j, Y, g:i a");
                          }

                          

                         ?>

                        <td><?php echo $date_requested;?></td>
                        <?php $date =date_create($appointment->preferred_date);
                         $preferred_date= date_format($date,"F d, Y");?>

                        <td><?php echo $preferred_date;?></td>
                        <td><?php echo ucfirst($appointment->preferred_time_of_day);?></td>

                        <td>
                          <?php if($appointment->status == "pending"){
                                  $label_type = "warning";
                          }else if($appointment->status == "approved"){
                                  $label_type = "info";
                          }else if($appointment->status == "cancelled"){
                                  $label_type = "danger";
                          }else if($appointment->status == "done"){
                             $label_type = "success";
                          }?>
                            
                            
                          <span class="label label-<?php echo $label_type;?>"><?php echo ucfirst($appointment->status)?></span>
                          </td>


                        
                        <td>

                          <?php if($appointment->status == "done"){ ?>

                           <a data-toggle="modal" data-target="#view_appointment<?php echo $appointment->appointment_id?>" class="btn btn-primary btn-sm">View Detail</a>


                        <?php   }else if($appointment->status == "approved"){ ?>
                            <a data-toggle="modal" data-target="#cancel_appointment<?php echo $appointment->appointment_id?>" class="btn btn-danger btn-sm">Cancel Appointment</a>

                            <a data-toggle="modal" data-target="#done_appointment<?php echo $appointment->appointment_id?>" class="btn btn-success btn-sm">Done</a>

                             <a data-toggle="modal" data-target="#view_appointment<?php echo $appointment->appointment_id?>" class="btn btn-primary btn-sm">View Detail</a>


                          <?php  }else if($appointment->status == "pending"){ ?>
                         <a data-toggle="modal" data-target="#cancel_appointment<?php echo $appointment->appointment_id?>" class="btn btn-danger btn-sm">Cancel Appointment</a>
                          <a href="<?php echo site_url()?>appointment/approve_appointment_action_employee/<?php echo $appointment->appointment_id;?>" class="btn btn-sm btn-info">Approve</a>

                           <a data-toggle="modal" data-target="#view_appointment<?php echo $appointment->appointment_id?>" class="btn btn-primary btn-sm">View Detail</a>

                          <?php  }else if($appointment->status == "cancelled"){ ?>
                          


                          <a data-toggle="modal" data-target="#view_appointment<?php echo $appointment->appointment_id?>" class="btn btn-primary btn-sm">View Detail</a>
                          <?php }?>

                         
                        </td>
                    </tr>


                    <div class="modal modal-success fade" id="done_appointment<?php echo $appointment->appointment_id?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                          </div>

                            <?php //beginning form
                                    echo form_open_multipart('appointment/done_appointment_action_employee','class="form-horizontal"');
                            ?>



                          <div class="modal-body">
                           

                            <p>Please enter your password to continue </p>
                                    <div class="has-feedback">
                                        <input type="password"   required="" class="form-control" placeholder="Password" name="password_confirmation">
                                      
                                    </div>


                              <input type="hidden" name="appointment_id" value="<?php echo $appointment->appointment_id;?>">
                          </div>


                          <div class="modal-footer">
                           <?php echo form_submit(array('id' => 'done_appointment', 'name' =>'done_appointment', 'value' => 'Proceed','class'=>'pull-right btn btn-primary')); ?>
                          </div>

                            <?php echo form_close();?>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <div class="modal modal-danger fade" id="cancel_appointment<?php echo $appointment->appointment_id?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">This Schedule will be cancelled</h4>
                          </div>

                            <?php //beginning form
                                    echo form_open_multipart('appointment/cancel_appointment_action_employee','class="form-horizontal"');
                            ?>

                          <div class="modal-body">
                              
                              <input type="hidden" name="appointment_id" value="<?php echo $appointment->appointment_id;?>">

                                   <p>Reason for cancellation</p>
                                    <div class="has-feedback">
                                        <textarea name="cancel_reason" style="width: 100%;height: 150px" class="form-control"></textarea>
                                      
                                    </div>

                                    
                                    <p>Please enter your password to continue </p>
                                    <div class="has-feedback">
                                        <input type="password"   required="" class="form-control" placeholder="Password" name="password_confirmation">
                                      
                                    </div>


                          </div>
                          <div class="modal-footer">
                           <?php echo form_submit(array('id' => 'cancel_appointment', 'name' =>'cancel_appointment', 'value' => 'Proceed','class'=>'pull-right btn btn-primary')); ?>
                          </div>

                           <?php echo form_close();?>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <div class="modal fade" id="view_appointment<?php echo $appointment->appointment_id?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Appointment Detail</h4>
                          </div>
                          <div class="modal-body">
                            <dl class="dl-horizontal">
                              <dt>Customer Name</dt>
                              <dd><?php echo $appointment->customer_name;?></dd>
                              <dt>Appointment Time</dt>
                              <dd><?php echo $preferred_date;?></dd>
                              <dd><?php echo ucfirst($appointment->preferred_time_of_day);?></dd>
                              
                              <dt>Reason</dt>
                              <dd>
                                <?php echo ucfirst($appointment->appointment_reason);?>
                              </dd>
                            </dl>

                            <hr>

                            <dl class="dl-horizontal">
                              <dt>Status</dt>
                              <dd>
                                <?php if($appointment->status == "pending"){
                                  $label_type = "warning";
                                }else if($appointment->status == "approved"){
                                        $label_type = "info";
                                }else if($appointment->status == "cancelled"){
                                        $label_type = "danger";
                                }else if($appointment->status == "done"){
                                   $label_type = "success";
                                }?>

                              <span class="label label-<?php echo $label_type;?>"><?php echo ucfirst($appointment->status)?></span>


                              </dd>
                              
                              <?php if($appointment->status == "cancelled"):?>
                               
                                <dt>Cancellation Reason</dt>
                                <dd>
                                  <?php echo ucfirst($appointment->cancellation_reason);?>
                                </dd>
                                
                              <?php endif;?>
                            </dl>
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
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

          </div>
       

      </div>
      <!-- /.row (main row) -->





      <div class="row">
          



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


              <?php if ($this->session->flashdata('appointment_cancel')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('appointment_cancel'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>



               <?php if ($this->session->flashdata('appointment_approved')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('appointment_approved'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>


               <?php if ($this->session->flashdata('appointment_done')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('appointment_done'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>


               

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b></b>
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

<!-- daterangepicker -->
<script src="<?php echo site_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo site_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo site_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo site_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- DataTables -->
<script src="<?php echo site_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Slimscroll -->
<script src="<?php echo site_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo site_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url()?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url()?>assets/dist/js/demo.js"></script>


<script src="<?php echo site_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>

<!-- fullCalendar -->
<script src="<?php echo site_url()?>assets/bower_components/moment/moment.js"></script>
<script src="<?php echo site_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Select2 -->
<script src="<?php echo site_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<!--admin scripts -->
<script src="<?php echo site_url()?>assets/js/globaljs.js"></script>

<!-- Page specific script -->
<!-- CK Editor -->

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

   

  $(function () {
    

   
   
   
     

  });




</script>

</body>
</html>
