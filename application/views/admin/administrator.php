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
  <title><?php echo $system_name;?> | Admin</title>
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
</head>
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="administrator">
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
        <small>Administrator List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Administrator</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->



       <div class="row">

            <div id="modal_section">

              <!-- add empoyee message--> 
               <?php if ($this->session->flashdata('add_admin_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('add_admin_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>




                <!-- addCustomerModal-->  
                <div class="modal fade" id="addAdminModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new Admin</h4>
                      </div>
                      <div class="modal-body">
                        <?php //beginning form
                          echo form_open_multipart('admin/create_new_admin');
                        ?>


                          <div class="form-group has-feedback">
                            <input type="text"  class="form-control" placeholder="Admin ID" id="admin_user_id"   name="admin_user_id" readonly="" >
                            <span class="glyphicon glyphicon-user form-control-feedback" required=""></span>
                          </div>

                          <?php //option for unit of measurements
                                $option = array(
                                    "" => "Admin Type",
                                    "superadmin" => "Super Admin",
                                    "admin" => "Admin",
                                    
                                );
                            ?>
                            <div class="form-group has-feedback">
                             <?php echo form_dropdown('admin_type',$option,'','class="form-control" id="admin_type"','required');?>
                            </div>

                          <div class="form-group has-feedback">
                            <input type="text"  class="form-control" placeholder="First Name"   name="first_name" required="">
                            <span class="glyphicon glyphicon-user form-control-feedback" required=""></span>
                          </div>

                           <div class="form-group has-feedback">
                            <input type="text"    class="form-control" placeholder="Middle Name"  name="middle_name" >
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                           <div class="form-group has-feedback">
                            <input type="text"  class="form-control" placeholder="Last Name" name="last_name" required="">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>



                          <?php //option for unit of measurements
                                $option = array(
                                    "" => "Gender",
                                    "male" => "Male",
                                    "female" => "Female",
                                    
                                );
                            ?>
                            <div class="form-group has-feedback">
                             <?php echo form_dropdown('gender',$option,'','class="form-control"','required');?>
                            </div>

                            <!-- end dropdown-->

                          <div class="form-group has-feedback">
                            <input type="date"  class="form-control" name="date_birth" placeholder="Date of Birth" required="">
                            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <input type="text"    class="form-control" placeholder="Telephone"  name="telephone">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <input type="text"    class="form-control" placeholder="Cellphone"  name="cellphone">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <input type="text"    class="form-control" placeholder="Address"  name="address" required="">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>



                          <div class="form-group has-feedback">
                            <input type="text"    class="form-control" placeholder="Email"  name="email" required="">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>

                           <div class="form-group has-feedback">
                            <input type="password"   required="" class="form-control" placeholder="Password"  name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          


                      </div><!-- end modal content-->
                      <div class="modal-footer">
                        <?php echo form_submit(array('id' => 'add_admin', 'name' =>'add_admin', 'value' => 'Add Admin','class'=>'pull-right btn btn-primary')); ?>
                        
                      </div>

                      <?php form_close();//endform?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


            </div>

            <div class="col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Administrator Count 
                  </span>
                  
                  <?php foreach($count_all_admins as $total_count_all_admins):?>
                      <span class="info-box-number"><?php echo $total_count_all_admins['count_all'];?></span>
                  <?php endforeach?>


                  <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addAdminModal">
                    Add new Admin
                  </button>
                 
                </div>
              </div>
            </div>

                <div class="col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-male"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Male Administrator</span>

                      <?php foreach($count_male_admins as $total_count_male_admins):?>
                      <span class="info-box-number"><?php echo $total_count_male_admins['count_male'];?></span>
                      <?php endforeach?>

                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-female"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Female Customer</span>

                       <?php foreach($count_female_admins as $total_count_female_admins):?>
                      <span class="info-box-number"><?php echo $total_count_female_admins['count_female'];?></span>
                      <?php endforeach?>

                    </div>
                  </div>
            </div>
        
      </div> <!-- end first row -->


 <div class="row">

       <div class="col-xs-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Admin ID</th>
                  <th>Admin Type</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Telephone Number</th>
                  <th>Cellphone Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($admins as $admin):?>
                  <tr>
                    <td><?php echo $admin['admin_user_id'];?></td>
                    <td><?php echo strtoupper($admin['admin_type']);?></td>
                    <td><?php echo $admin['first_name'] .' ' . $admin['middle_name'] .' ' . $admin['last_name'];?></td>
                    <td><?php echo $admin['gender'];?></td>
                    <td><?php echo $admin['telephone'];?></td>
                    <td><?php echo $admin['cellphone'];?></td>
                    <td><?php if($admin['is_active'] == 1){ ?>
                       <span class="label label-success">Active</span> 
                  <?php  }else{ ?>

                        <span class="label label-danger">Not Active</span>
                  <?php   } ?></td>
                    <td><a href="<?php echo site_url()?>admin/admin_details/<?php echo $admin['admin_id'];?>" class="btn btn-primary btn-sm">View More Details</a></td>
                  </tr>
                <?php endforeach; ?>

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
  $(function () {
   
    $('#admin_type').change(function(){
          var val = $(this).val();
          var admin_user_id = "";

          if(val =="superadmin"){
            var admin_user_id = "<?= 'SA'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#admin_user_id').val(admin_user_id);
          }else if(val=="admin"){
            var admin_user_id = "<?= 'A'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#admin_user_id').val(admin_user_id);
          }
        });
  })






  </script>
</body>
</html>
