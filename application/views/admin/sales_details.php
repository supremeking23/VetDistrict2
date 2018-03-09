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


<script>
  
 
</script>

</head>
<body class="hold-transition <?php echo $system_color_skin?> sidebar-mini" id="sales">
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
        Sales 
        <small>Purchase Full Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Sales</li> <li class="active">Purchase Full Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->


      <div class="row">

       <div class="col-xs-12">
         <div class="box">

           <?php 
                          foreach ($get_all_sales as $sales) {
                              $customer_name = $sales->customer_name;
                              $invoice_number = $sales->invoice_number;
                              $total_amount = $sales->total_amount;
                              $total_tax = $sales->total_tax;
                              $sales_total = $sales->sales_total;

                               $date =date_create($sales->sales_date);
                              $sales_date = date_format($date,"F j, Y g:i a");
                          }
                    ?>  

              <div class="box-header">
                <h3 class="box-title"> Invoice Number:(<?php echo $invoice_number?>)</h3>

                <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Expand">
                            <i class="fa fa-minus"></i></button>

                        </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                  
                  <div class="container-fluid">

                   
                    <div class="row">
                      <div class="col-lg-12">
                        <span>Customer: <strong><?php echo $customer_name;?></strong></span>
                        <span class="pull-right">Date: <strong><?php echo $sales_date;?></strong></span>
                      </div>
                    </div>
                    <div style="height:10px;"></div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th>Product Name</th>
                                      <th>Product Type</th>
                                      <th>Product Price</th>
                                      <th>Purchase Qty</th>
                                      <th>SubTotal</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      
                                      <?php foreach($get_all_sales_details as $sales_detail):?>
                                      <tr>
                                          <td><?php echo $sales_detail->product_name;?></td>
                                          <td><?php echo $sales_detail->product_type;?></td>
                                          <td><?php echo $sales_detail->price_per_product;?></td>
                                          <td align="right"><?php echo $sales_detail->sales_quantity;?></td>
                                         
                                          <td align="right">
                                            <?php echo $sales_detail->total_per_product;?>
                                          </td>
                                      </tr>

                                      <?php endforeach;?>

                                     <tr>
                                      <td align="right" colspan="4"><strong>Total Amount</strong></td>
                                      <td align="right"><strong><?php echo $total_amount;?></strong></td>
                                    </tr>

                                     <tr>
                                      <td align="right" colspan="4"><strong>Total Tax</strong></td>
                                      <td align="right"><strong><?php echo $total_tax;?></strong></td>
                                    </tr>
                                        
                                    <tr>
                                      <td align="right" colspan="4"><strong>Grand Total</strong></td>
                                      <td align="right"><strong><?php echo $sales_total;?></strong></td>
                                    </tr>
                                  </tbody>
                            </table>

                        </div>

                    </div>

                  </div>   

              </div>
              <!-- /.box-body -->
            </div>
          <!-- /.box -->

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
<script src="<?php echo site_url()?>assets/js/adminjs.js"></script>

<!-- page script -->
<script>
  $(function () {
    
  })


  

   
  </script>
</body>
</html>
