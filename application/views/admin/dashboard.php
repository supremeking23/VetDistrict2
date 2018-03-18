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

  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">


  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">


   <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/morris.js/morris.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="dashboard">
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
  

  <!-- testing-->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
              
              <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                      
                            <?php foreach($count_all_customer as $customer_count):?>
                              <h3><?php echo $customer_count['count_all']?></h3>
                          <?php endforeach;?>
                          <p>Customers</p>
                        </div>

                      <div class="icon">
                         <i class="ion ion-person" ></i>
                      </div>
                      <a href="<?php echo site_url()?>admin/customers" class="small-box-footer"></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">


                          <?php foreach($count_all_pet as $pet_count):?>

                          <h3><?php echo $pet_count['count_all']?></h3>
                          <?php endforeach;?>

                          <p>Pets</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-firefox"></i>
                      </div>
                      <a href="<?php echo site_url()?>admin/pets" class="small-box-footer"></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      
                      <div class="inner">

                          <?php foreach($count_all_items as $item_count){
                                  $itemCount = $item_count['count_all'];
                          }?>

                          <?php foreach($count_all_meds as $med_count){
                                  $medCount = $med_count['count_all'];
                          }?>




                          <h3><?php $product_count = $itemCount + $medCount;
                              echo $product_count;
                          ?></h3>

                          <p>Products</p>
                      </div>

                      <div class="icon">
                        <i class="fa fa-archive"></i>
                      </div>
                      <a href="#" class="small-box-footer"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                       <div class="inner">
                  
                        <?php foreach($count_all_employee as $employee_count):?>

                          <h3><?php echo $employee_count['count_all']?></h3>


                        <?php endforeach;?>
                          <p>Employees</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users" style="padding-top: 15px"></i>
                      </div>
                      <a href="#" class="small-box-footer"></a>
                    </div>
                  </div>
                  <!-- ./col -->

      </div> <!--end row for boxes -->


      <div class="row">
            
            <div class="col-md-6">
                         <!-- DONUT CHART -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Product (Medicine) Count</h3>

                      <div class="box-tools pull-right">
                          
                      </div>
                    </div>
                    <div class="box-body chart-responsive">
                      <div class="chart" id="medicine-chart" style="height: 300px; position: relative;"></div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
            </div>


            <div class="col-md-6">
                         <!-- DONUT CHART -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Product (Item) Count</h3>

                      <div class="box-tools pull-right">
                          
                      </div>
                    </div>
                    <div class="box-body chart-responsive">
                      <div class="chart" id="item-chart" style="height: 300px; position: relative;"></div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
            </div>

      </div>
       
          <?php 

          foreach($medicines as $meds){

             $med_name =$meds['med_name'];
              $med_qty = $meds['med_qty'];

             $data[] = array(
                'label' => $meds['med_name'],
                'value' => $meds['med_qty'],
             );

             $datas_med = json_encode($data);

          }



            foreach($items as $item){

             $item_name =$item['item_name'];
              $item_qty = $item['item_qty'];

             $data[] = array(
                'label' => $item['item_name'],
                'value' => $item['item_qty'],
             );

             $datas_item = json_encode($data);

          }


          ?>
          

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"><?php echo $system_name;?></a>.</strong> All rights reserved.
    reserved.
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


<!-- fullCalendar -->
<script src="<?php echo site_url()?>assets/bower_components/moment/moment.js"></script>
<script src="<?php echo site_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Select2 -->
<script src="<?php echo site_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>



<!-- Morris.js charts -->
<script src="<?php echo site_url()?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo site_url()?>assets/bower_components/morris.js/morris.min.js"></script>

<!--admin scripts -->
<script src="<?php echo site_url()?>assets/js/globaljs.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
        var customer_user_id = "<?= 'C'.date("ymdhis") . abs(rand('0','9'));  ?>";
        $('#customer_user_id').val(customer_user_id);

        var pet_data_id = "<?= 'P'.date("ymdhis") . abs(rand('0','9'));  ?>";
        $('#pet_data_id').val(pet_data_id);

      
        
        $('#employee_type').change(function(){
          var val = $(this).val();
          var employee_user_id = "";

          if(val =="vet"){
            var employee_user_id = "<?= 'V'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#employee_user_id').val(employee_user_id);
          }else if(val=="staff"){
            var employee_user_id = "<?= 'S'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#employee_user_id').val(employee_user_id);
          }
        });


       
     //DONUT CHART
    var donut = new Morris.Donut({
      element: 'medicine-chart',
      resize: true,
      
      data: <?php echo $datas_med; ?>
      ,
      hideHover: 'auto'
    });


    var donut = new Morris.Donut({
      element: 'item-chart',
      resize: true,
      
      data: <?php echo $datas_item; ?>
      ,
      hideHover: 'auto'
    });

        
     
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
