<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vet District Clinic | Admin</title>
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
</head>
<body class="hold-transition skin-green sidebar-mini" id="product">
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


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="<?php echo site_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="<?php echo site_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                        <p>
                          Alexander Pierce - Web Developer
                          <small>Member since Nov. 2012</small>
                        </p>
                      </li>
                      <!-- Menu Body -->

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
        Product 
        <small>Product List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->


      <div class="row">

            <div id="modal_section">
                
                <div class="modal fade" id="addProductModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Product</h4>
                      </div>
                      <div class="modal-body">
                        <?php //beginning form
                          echo form_open_multipart('product_controller/add_new_product');
                        ?>

                          <div class="form-group has-feedback">
                            <select "  class="form-control" name="drug_class">
                                <option value="">Please choose a drug type</option>
                                <?php foreach($drug_types as $drug_type): ?>
                                  <option value="<?php echo $drug_type['drugtype_id']?>"><?php echo ucfirst($drug_type['drug_type'])?></option>
                                <?php endforeach;?>       
                            </select>
                          </div>


                            <div class="form-group has-feedback">
                              <input type="text"  title=""  class="form-control" placeholder="Product Code"  name="product_code">
                              <span class="fa fa-minus-square form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                              <input type="text"  title=""  class="form-control" placeholder="Product Description"  name="product_description">
                              <span class="fa fa-minus-square form-control-feedback"></span>
                            </div>

                          



                            <?php //option for unit of measurements
                                $option = array(
                                    "" => "Please choose a unit of measurement",
                                    "BTL" => "Bottle",
                                    "PWD" => "Powder",
                                    "TUBE" => "Tube",
                                    "VIAL" => "Vial",
                                );
                            ?>
                            <div class="form-group has-feedback">
                             <?php echo form_dropdown('measure_option',$option,'','class="form-control"');?>
                            </div>

                            <!-- end dropdown-->

                            <div class="form-group has-feedback">
                              <input type="text"  title="" class="form-control" placeholder="Unit Cost"  name="unit_cost">
                              <span class="fa fa-minus-square form-control-feedback"></span>
                            </div>

                             <div class="form-group has-feedback">
                              <input type="text"  title=""  class="form-control" placeholder="Quantity"  name="quantity">
                              <span class="fa fa-minus-square form-control-feedback"></span>
                            </div>

                           


                           

                            <div class="form-group has-feedback">
                                <?php echo form_upload('product_image');?>
                            </div>
                           
                      </div>
                      <div class="modal-footer">
                       
                        <button type="submit" class="pull-right btn btn-primary">Save changes</button>
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
                <span class="info-box-icon bg-blue"><i class="fa fa-plus-square-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Product Count</span>
                  <span class="info-box-number">23</span>
                  <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#addProductModal">
                    Add new Product
                  </button>
                 
                </div>
              </div>
            </div>

                <div class="col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-minus-square-o"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Items in Inventory</span>
                      <span class="info-box-number">23</span>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Price</span>
                      <span class="info-box-number">23</span>
                    </div>
                  </div>
            </div>
        
      </div>


      <div class="row">

        <?php if ($this->session->flashdata('category_success')) { ?>
          <div class="alert alert-danger"> <?= $this->session->flashdata('category_success') ?>dsddsdsdsd </div>
      <?php } ?>
       
       <div class="col-xs-12">
             <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Product</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Product Code</th>
                        <th>Product Description</th>
                         <th>Unit of Measure</th>
                        <th>Unit Cost</th>
                        <th>In Store</th>
                        <th>Warehouse</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>QCO-THYM-M-084</td>
                        <td>FUROSEMIDE 20MG AMP (FRUMID)</td>
                        <td>AMP</td>
                        <td>100</td>
                        <td>284</td>
                        <td>284</td>
                        <td><a href="<?php echo site_url()?>admin/pet_details/1">View More Details</a></td>
                      </tr>
                     
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
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>
</body>
</html>