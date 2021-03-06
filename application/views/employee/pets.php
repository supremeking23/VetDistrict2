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
  <title><?php echo $system_name;?> | <?php
  //comes frome the session
   echo ucfirst($employee_type);?></title>
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


  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<script>
  
 
</script>

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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pet 
        <small>Pet List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Employee</a></li>
        <li class="active">Pet</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="row">

          <div id="modal_section">

              <!-- add pet message--> 
               <?php if ($this->session->flashdata('add_pets_success')) { ?>
         
                   <div class="modal modal-success" id="successmodal" role="dialog">
                     <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <p> <?php echo $this->session->flashdata('add_pets_success'); ?> </p>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     </div>
                  </div>

               <?php } ?>


            

               

                   <!-- addPetModal-->  
                <div class="modal fade" id="addPetModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new Pet</h4>
                      </div>
                      <div class="modal-body">
                        <?php //beginning form
                          echo form_open_multipart('employee/create_new_pet');
                        ?>

                         <div class="form-group has-feedback">
                            <input type="text"   class="form-control" placeholder="Pet ID"   name="pet_data_id" id="pet_data_id" readonly="">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                        <?php  //for customer name?>
                          <div class="form-group has-feedback">
                               <select name="customer_id" class="form-control select2" required="" style="width: 100%;min-height: 150px;max-height: 150px;overflow-y: auto;">
                                <option value="">Customer Name</option>
                                <?php foreach($customers as $customer):?>
                                  
                                 <option value="<?php echo $customer['customer_id']?>"><?php echo $customer['first_name'] .' '. $customer['middle_name'] .' '. $customer['last_name']?></option>
                                 <?php ?>
                               <?php endforeach;?>
                               </select>
                          </div>

                            <!-- end dropdown-->

                          <div class="form-group has-feedback">
                            <input type="text"  class="form-control" placeholder="Pet Name"   name="pet_name" required="">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                           



                          <?php //
                                $option = array(
                                    "" => "Gender",
                                    "male" => "Male",
                                    "female" => "Female",
                                    
                                );
                            ?>
                            <div class="form-group has-feedback">
                             <?php echo form_dropdown('gender',$option,'','class="form-control" required');?>
                            </div>

                            <!-- end dropdown-->


                      <div class="form-group has-feedback">
                        <select id="pet_type" name="pet_type" class="form-control" required="">
                                 <option value="">Pet Type</option>
                                <?php foreach($pet_type as $type):?>
                                 
                                 <option value="<?php echo $type['pettype_id']?>"><?php echo $type['pet_type'];?></option>
                                 <?php ?>
                               <?php endforeach;?>
                               </select>
                       </div>


                        <div class="form-group has-feedback">
                        <select id="breed" name="breed" class="form-control" required="">
                       </select>
                       </div>

                            <!-- end dropdown-->


                        <div class="form-group has-feedback">
                            <input type="text"  class="form-control" placeholder="Pet Size in kg"   name="pet_size" required="">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>



                        <div class="form-group has-feedback">
                            <input type="date"  class="form-control" name="date_birth" placeholder="Date of Birth" required="">
                            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                        </div>



                      </div><!-- end modal content-->
                      <div class="modal-footer">
                        <?php echo form_submit(array('id' => 'add_pet', 'name' =>'add_pet', 'value' => 'Add Pet','class'=>'pull-right btn btn-primary')); ?>
                        
                      </div>

                      <?php echo form_close();//endform?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        

            <div class="col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-firefox"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pet Count 
                  </span>
                  
                 
                 <?php foreach($count_all_pet as $total_count_all_pet):?>
                      <span class="info-box-number"><?php echo $total_count_all_pet['count_all'];?></span>
                  <?php endforeach?>

                  <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addPetModal">
                    Add new pet
                  </button>
                 
                </div>
              </div>
            </div>


          
      </div> <!-- end first row -->


      <div class="row">
              <div class="col-md-12">
                      
                <!-- Default box -->
                    <div class="box ">
                      <div class="box-header with-border">
                        <h3 class="box-title">Pet List</h3>

                        <div class="box-tools pull-right">
                          
                        
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Print Data">
                            <i class="fa fa-print"></i></button>
                        </div>
                      </div>
                      <div class="box-body table-responsive">
                          
                              <table class="data-table table table-bordered table-striped" >
                                    <thead>
                                    <tr>
                                      <th>Pet ID</th>
                                      <th>Name</th>
                                       <th>Animal Type <?php //echo date('F d Y',31556926)?></th>
                                      <th>Breed</th>
                                      <th>Owner</th>
                                       <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                  <?php foreach($pets as $pet_info):?>

                                    <tr>
                                      <td><?php echo $pet_info['pet_data_id'];?></td>
                                      <td><?php echo $pet_info['pet_name'];?></td>
                                      <td><?php echo $pet_info['pet_type'];?></td>
                                      <td><?php echo $pet_info['breed'];?></td>
                                      <td><?php echo $pet_info['first_name'] .' '. $pet_info['middle_name']. ' ' . $pet_info['last_name'];?></td>
                                       <td><?php if($pet_info['is_active'] == 1){ ?>
                                           <span class="label label-success">Active</span> 
                                      <?php  }else{ ?>
                                            <span class="label label-danger">Not Active</span>
                                             
                                      <?php   } ?>
                                        
                                      </td>
                                      <td><a href="<?php echo site_url()?>employee/pet_details/<?php echo $pet_info['pet_id'];?>" class="btn btn-primary btn-sm">View More Details</a></td>
                                    </tr>


                                    <?php endforeach; ?>
                                   
                                    </tbody>
                                
                              </table>
                                

                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                      
                      </div>
                      <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
              </div>
          </div>

      <!-- /.row (main row) -->


      <div class="row">
        
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
  $(function () {
    
    var pet_data_id = "<?= 'P'.date("ymdhis") . abs(rand('0','9'));  ?>";
        $('#pet_data_id').val(pet_data_id);
  })


    $(document).ready(function() {

          $('#breed').hide(); 

          $('select[name="pet_type"]').on('change', function() {

            var stateID = $(this).val();

            if(stateID) {

                 $('#breed').show(); 
                $.ajax({

                    url: '<?php echo base_url('admin/pet_breed/')?>'+stateID,

                    type: "GET",

                    dataType: "json",

                    success:function(data) {

                        $('select[name="breed"]').empty();
                         $.each(data, function(key, value) {

                            $('select[name="breed"]').append('<option value="'+ value.breed_id +'">'+ value.breed +'</option>');

                        });

                    }

                });

            }else{

                $('select[name="breed"]').empty();

            }

        });



    //modal test
     

    });

   
  </script>
</body>
</html>
