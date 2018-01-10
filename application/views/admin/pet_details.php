<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vet District Clinic | Admin</title>
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

<body class="hold-transition skin-green sidebar-mini" id="pet">
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

            foreach($current_admin_login as $admin_login){
               $first_name = $admin_login->first_name;
               $middle_name = $admin_login->middle_name;
               $last_name = $admin_login->last_name;
               $image = $admin_login->image;
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
                         <small>Admin</small>
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
        Pet 
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Pet</li>
        <li class="active">Pet Details</li>
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

              <h3 class="profile-username text-center"><?php echo $pet_details->pet_name;?></h3>

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
                    <div class="col-sm-6">Toggle to edit information </div>
                </div>

              </div>

             

             <br />

              <div class="row">
                
                <div class="form-group">
                    <div class="col-sm-12">
                      
                      <?php 

                        $state;
                        if($pet_details->is_active == 1){
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
                  echo form_open_multipart('admin/update_pet_details','class="form-horizontal"');
                  ?>


                    <?php foreach($show_pet_details as $pet_details):?>


                   <div class="form-group has-feedback">
                    <label for="customer" class="col-sm-2 control-label">Owner's Name</label>

                    <div class="col-sm-10">
                      <select class="form-control" name="customer" id="customer">
                        <?php foreach($customers as $customer):?>
                            <option value="<?php echo $customer['customer_id'];?>"
                              <?php if($customer['customer_id'] == $pet_details->customer_id){echo "selected";} ?> ><?php echo $customer['first_name'].' '.$customer['middle_name'].''.$customer['last_name'];?></option>

                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="pet_name" class="col-sm-2 control-label">Pet Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?php echo $pet_details->pet_name?>">
                    </div>
                  </div>


                   <div class="form-group has-feedback">
                    <label for="pet_type" class="col-sm-2 control-label">Pet Type</label>

                    <div class="col-sm-10">
                      <select class="form-control" name="pet_type" id="pet_type">
                        <?php foreach($pet_types as $type):?>
                            <option value="<?php echo $type->pettype_id;?>"
                              <?php if($type->pet_type == $pet_details->pet_type){echo "selected";} ?> ><?php echo $type->pet_type;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>



                  <div class="form-group has-feedback">
                    <label for="breed" class="col-sm-2 control-label">Breed Type</label>

                    <div class="col-sm-10">
                      <select id="breed" name="breed" class="form-control">

                       </select>


                    </div>
                    <input type="hidden" name="breed_init" value="<?php echo $pet_details->breed; ?>">
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
                             <?php echo form_dropdown('gender',$option,$pet_details->gender,'class="form-control" required');?>
                    </div>
                  </div>


                 

                   <div class="form-group">
                    <label for="date_birth" class="col-sm-2 control-label">Date of Birth</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="date_birth" name="date_birth" value="<?php echo $pet_details->date_birth?>">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="pet_size" class="col-sm-2 control-label">Pet Size (in KG)</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pet_size" name="pet_size" value="<?php echo $pet_details->pet_size?>">
                    </div>
                  </div>



                     <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Profile Picture</label>

                    <div class="col-sm-2">
                      <input type="file" name="upload_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                       <input type="hidden" value="" name="image_name">


                   <?php if(empty($pet_details->pet_image)){ ?>
                        <img id="image" class="profile-user-img img-responsive " src="<?php echo site_url()?>assets/dist/img/stock-vector-paw-print-205756207.jpg" width="100" alt="User profile picture">
                      <?php }else { ?>
                           <img id="image" class="profile-user-img img-responsive " src="<?php echo site_url()?>uploads/pet_image/<?php echo $pet_details->pet_image; ?>" width="100" alt="User profile picture">
                      <?php } ?>
                    </div>

                    <?php //for employee_id?>
                    <input type="hidden" name="pet_id" value="<?php echo $pet_details->pet_id;?>">
                  </div>
                 


                    <?php
                      //testing
                       //$test2 = $pet_details->pet_breed;
                    ///echo "<script>alert(". $pet_details->pet_type .")</script>";
                     ?>
                   <?php endforeach;?>
                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update<?php //echo $test2;?></button>
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




  $(document).ready(function() {
      $("fieldset").attr('disabled','disabled');
      //console.log('sssssss');
      //alert('session');

  });


  /*$('#check_edit').change(function() {
     $("fieldset").removeAttr('disabled');
  });*/


  $('#check_edit').change(function(){
   $("fieldset").prop("disabled", !$(this).is(':checked'));
});


    $(document).ready(function() {

      
      var hidden_init = $('input[name="breed_init"]').val();
      console.log(hidden_init);
      //$('#breed').hide();
      //var stateID = $(this).val();
        var typeID = $('select[name="pet_type"]').val();
        //alert('session' + typeID);



         if(typeID) {

                
                $.ajax({

                    url: '<?php echo base_url('admin/pet_breed/')?>'+typeID,

                    type: "GET",

                    dataType: "json",

                    success:function(data) {

                        $('select[name="breed"]').empty();
                         $.each(data, function(key, value) {

                              var added_att = "";
                              if(hidden_init == value.breed){
                                  added_att = "selected";
                              }else{
                                  added_att = "";
                              }

                            $('select[name="breed"]').append('<option value="'+ value.breed_id +'" '+ added_att +'>'+ value.breed +'</option>');

                        });

                    }

                });

            }

      
         // $('#test').hide(); 

        $('select[name="pet_type"]').on('change', function() {
         // $('#test').show(); 
           // $('#breed').show();
           // $('#breed_intro').hide();
            var stateID = $(this).val();
            //alert('session' + stateID);

            if(stateID) {

                
                $.ajax({

                    url: '<?php echo base_url('admin/pet_breed/')?>'+stateID,

                    type: "GET",

                    dataType: "json",

                    success:function(data) {

                        $('select[name="breed"]').empty();
                         $.each(data, function(key, value) {

                            $('select[name="breed"]').append('<option value="'+ value.breed_id +'"  <?php echo "selected"; ?>>'+ value.breed +'</option>');

                        });

                    }

                });

            }else{

                $('select[name="breed"]').empty();

            }

        });



       /* $('select[name="pet_type"]').on('load', function() {
            var stateID = $(this).val();
            console.log(stateID);
         });*/



    //modal test
     

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
