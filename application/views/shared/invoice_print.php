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
  <title><?php echo $system_name;?> | Invoice</title>
  <link rel="shortcut icon" href="<?php echo site_url(); ?>uploads/system_images/<?php echo $system_logo;?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style  onload="window.print();"-->
  <link rel="stylesheet" href="<?php echo site_url(); ?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="<?php echo site_url(); ?>uploads/system_images/<?php echo $system_logo;?>" width="50"> <?php echo $system_name;?>
          <small class="pull-right"></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">

      <?php //get customer_name,invoice number and date

       foreach ($get_all_data_from_sales as $data_from_sales):
      ?>
        <div class="col-sm-4 invoice-col">
          <b>Invoice <?php echo $data_from_sales->invoice_number;?> </b><br>
          <br>
          <b>Customer Name: <?php echo $data_from_sales->customer_name;?>  (<?php echo ucfirst($data_from_sales->customer_type); ?>)</b>
          <br /> <br />
           <?php
                                $date =date_create($data_from_sales->sales_date);
                                $sales_date = date_format($date,"F j, Y, g:i a");
                        ?>
          <b> Date:</b> <?php echo $sales_date?><br>
        </div>
        <!-- /.col -->

        <?php //for total_amount,total_tax,sales_total
            $total_amount = $data_from_sales->total_amount;
            $total_tax = $data_from_sales->total_tax;
            $sales_total = $data_from_sales->sales_total;
        ?>

      <?php endforeach;?>

    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Product Price</th>
             <th>Qty</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach($get_all_data_from_sales_detail as $data_from_sales_detail):?>

            <tr>
              
              <td><?php echo $data_from_sales_detail->product_name;?></td>
              <td><?php echo $data_from_sales_detail->product_type;?></td>
              <td><?php echo $data_from_sales_detail->price_per_product;?></td>
               <td><?php echo $data_from_sales_detail->sales_quantity;?></td>
              <td><?php echo $data_from_sales_detail->total_per_product;?></td>
            </tr>
          
          <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
       
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead"></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?php echo $total_amount;?></td>
            </tr>
            <tr>
              <th>Total tax</th>
              <td><?php echo $total_tax;?></td>
            </tr>
           
            <tr>
              <th>Grand Total:</th>
              <td><?php echo $sales_total;?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
