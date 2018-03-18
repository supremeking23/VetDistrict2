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
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="employee">
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
        Employee 
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Employee</li>
        <li class="active">Employee Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        
        <div class="col-md-3">

          <?php foreach($show_employee_details as $employee_details):?>

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <?php if(empty($employee_details->image)){ ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url()?>assets/dist/img/guest2.jpg" alt="User's Name">
              <?php }else{ ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url()?>uploads/employee_image/<?php echo $employee_details->image; ?>" alt="User's Name">
              <?php } ?>

              <h3 class="profile-username text-center"><?php echo $employee_details->first_name .' '. $employee_details->middle_name .' '. $employee_details->last_name;?></h3>


              <?php if($employee_details->employee_type == "veterinarian"){
                  $emp_type = "Veterinarian";
              }else{
                  $emp_type = "Staff";

              }
                ?>
              

              <p class="text-muted text-center"><?php echo $emp_type;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Employee ID</b> <a class="pull-right"><?php echo $employee_details->employee_id;?></a>
                </li>
                <li class="list-group-item">
                  <!--$dateadded = date("F j, Y, g:i a", $r["DateAdded"]);-->

                   <?php 
                         $date =date_create($employee_details->date_birth);
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


                            <div class="row">
                
                 <div class="form-group">
                    <div class="col-sm-6">
                      <div class="checkbox">
                        <label class="switch">

                          <input type="checkbox" id="check_edit"> 
                          <span class="slider round"></span>
                        </label>
                      </div>

                      
                    </div>
                    <div class="col-sm-6">Toggle to edit information</div>
                </div>

              </div>

             

              <br />

              <div class="row">
                
                <div class="form-group">
                    <div class="col-sm-12">
                      
                      <?php 

                        $state;
                        if($employee_details->is_active == 1){
                          $state = "Active";
                        }else{
                          $state = "Not Active";
                        }

                      ?>
                      <button title="Click to change state. Current state is <?php echo $state;?>" class="btn btn-success btn-block" data-tooltip="tooltip" data-toggle="modal" data-target="#access_confirmation" data-placement="bottom"> <?php echo $state; //echo $admin_details->is_active;?></button>
                    </div>
                    
                </div>



              

              </div>


             <!-- <div class="form-group">
                    <div class="col-sm-12">
                      <div class="checkbox">
                          <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                </div> -->

          <!-- Rounded switch -->




            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->



      <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Account Settings</a></li>
            </ul>
            <div class="tab-content">
             

              <div class="active tab-pane" id="settings">


                <?php //fieldset disable?>
               
                <fieldset>

                  <?php //beginning form
                  echo form_open_multipart('admin/update_employee_details','class="form-horizontal"');
                  ?>


                   <?php foreach($show_employee_details as $employee_details):?>


                   <div class="form-group">
                    <label for="account_type" class="col-sm-2 control-label">Employee Type</label>

                    <div class="col-sm-10">
                       <?php //option for employee type
                                $option = array(
                                    "" => "Employee Type",
                                    "veterinarian" => "Veterinarian",
                                    "staff" => "Staff",
                                    
                                );
                        ?>

                        <?php echo form_dropdown('employee_type',$option,$employee_details->employee_type,'class="form-control" required');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $employee_details->first_name?>" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle_name" class="col-sm-2 control-label">Middle Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $employee_details->middle_name?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $employee_details->last_name?>" required="">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label">Gender</label>

                    <div class="col-sm-10">

                      <?php //option for  gender
                                $option = array(
                                    "" => "Gender",
                                    "male" => "Male",
                                    "female" => "Female",
                                    
                                );
                            ?>

                      <?php //parameters(attribute name , options,selected option,added attibute ex:class,required)?>
                             <?php echo form_dropdown('gender',$option,$employee_details->gender,'class="form-control" required');?>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="address" name="address" value="<?php echo $employee_details->address?>" required="">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="cellphone" class="col-sm-2 control-label">Cellphone Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="cellphone" name="cellphone" value="<?php echo $employee_details->cellphone?>" required="">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $employee_details->email?>" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telephone Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $employee_details->telephone?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="date_birth" class="col-sm-2 control-label">Date of Birth</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="date_birth" name="date_birth" value="<?php echo $employee_details->date_birth?>" required="">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Profile Picture</label>

                    <div class="col-sm-2">
                      <input type="file" name="upload_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                       <input type="hidden" value="" name="image_name">


                      <?php if(empty($employee_details->image)){ ?>
                        <img id="image" class="profile-user-img img-responsive " src="<?php echo site_url()?>assets/dist/img/guest2.jpg" width="100" alt="User profile picture">
                      <?php }else { ?>
                           <img id="image" class="profile-user-img img-responsive " src="<?php echo site_url()?>uploads/employee_image/<?php echo $employee_details->image; ?>" width="100" alt="User profile picture">
                      <?php } ?>
                    </div>

                    <?php //for employee_id?>
                    <input type="hidden" name="employee_id" value="<?php echo $employee_details->employee_id;?>">
                  </div>



                   <?php endforeach;?>
                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                
                <?php echo form_close();?>

                </fieldset> <?php //end fieldset?>


              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row (main row) -->



      <div class="row">
        <?php  //for messages?>

              <?php if ($this->session->flashdata('update_employee_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('update_employee_success'); ?> </p>
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
                                    echo form_open_multipart('admin/update_employee_state','class="form-horizontal"');
                              ?>
                                <div class="modal-body">
                                  <input type="hidden" name="current_state" value="<?php echo  $employee_details->is_active;?>">
                                  <input type="hidden" name="employee_id" value="<?php echo  $employee_details->employee_id;?>">
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




  $(document).ready(function() {
      $("fieldset").attr('disabled','disabled');
  });


  /*$('#check_edit').change(function() {
     $("fieldset").removeAttr('disabled');
  });*/


  $('#check_edit').change(function(){
   $("fieldset").prop("disabled", !$(this).is(':checked'));
});

/*$( "input" ).change(function() {
    var $input = $( this );
    $( "p" ).html( ".attr( 'checked' ): <b>" + $input.attr( "checked" ) + "</b><br>" +
      ".prop( 'checked' ): <b>" + $input.prop( "checked" ) + "</b><br>" +
      ".is( ':checked' ): <b>" + $input.is( ":checked" ) + "</b>" );
  }).change();*/
 
</script>
</body>
</html>
