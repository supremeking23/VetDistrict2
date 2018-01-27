<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vet Disctrict | Customer</title>
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
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/dist/css/skins/skin-green.css">
  
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
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
</head>
<body class="hold-transition skin-green sidebar-mini" id="appointment">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Vet </b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vet District</b></span>
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

               //this page only
               $full_name = $first_name .' '. $middle_name .' '. $last_name;
               $cellphone = $customer_login->cellphone;
               $telephone = $customer_login->telephone;
               $customer_id = $customer_login->customer_id;

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
        <li><a href="#"><i class="fa fa-dashboard"></i> Customer</a></li>
        <li class="active">Appointment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-lg-4 col-xs-12">
          <!-- change email -->
            <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Book an appointment </h3>
                      <div class="box-tools pull-right">
                      
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    
                    
                     <?php 
                            echo form_open_multipart('customer/book_appointment','class="form-horizontal"');
                                  ?>
                          <div class="box-body">
                            


                            <p>Preferred Date</p>
                            <div class=" has-feedback">
                              <input  required  type="date" class="form-control"  name="preferred_date" value="">
                              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                            </div>



                          <?php //option for unit of measurements
                                $option = array(
                                   
                                    "moring" => "Morning",
                                    "afternoon" => "Afternoon",
                                    "evening" => "Evening",
                                    
                                );
                            ?>

                            <p>Preferred Time</p>
                            <div class=" has-feedback">
                                <?php echo form_dropdown('preferred_time',$option,'','class="form-control"','required');?>
                              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                            </div>

                            <p>Reason</p>
                            <div class=" has-feedback">
                                <textarea class="textarea" name="appointment_reason">
                                  
                                </textarea>
                            </div>



                          <input type="hidden" name="customer_name" value="<?php echo $full_name;?>">
                          <input type="hidden" name="contact_number" value="<?php echo $cellphone?>">

                           <input type="hidden" name="telephone_number" value="<?php echo $telephone?>">

                           <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">


                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                              <input type="submit" name="send__appointment_request" value="Send Appointment Request" class="btn btn-primary pull-right">
                          </div><!-- box-footer -->
                    

                    <?php echo form_close(); ?>

                </div><!-- /.box -->
        </div>
      </div>
      <!-- /.row -->



      <!-- Main row -->

      <div class="row">
          <div class="col-xs-12">
           <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Appointment Record</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                      <th>View Details</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    

                    <?php foreach($appointnments as $appointnment):?>
                    <tr>
                      <td><?php echo $appointnment['preferred_date'];?></td>
                      <td><?php echo $appointnment['preferred_time_of_day'];?></td>
                      <td><?php echo $appointnment['status']?></td>

                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewDetail<?php echo $appointnment['appointment_id']?>">View Details</button></td>


                      

                      
                      
                      <td><a href="<?php echo site_url()?>admin/employee_details/<?php echo $employee['employee_id']; ?>" class="btn btn-primary">View More Details</a></td>
                    </tr>
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">Vet District Animal Clinic</a>.</strong> All rights reserved.
    
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
<!-- Slimscroll -->
<script src="<?php echo site_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo site_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url()?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url()?>assets/dist/js/demo.js"></script>


<script src="<?php echo site_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>



<!--admin scripts -->
<script src="<?php echo site_url()?>assets/js/customerjs.js"></script>

<!-- Page specific script -->
<!-- CK Editor -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
   
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

</body>
</html>
