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
  <title><?php echo $system_name;?> | Medical Record</title>
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

  <!-- Google Font onload="window.print();-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <link rel="stylesheet" href="css/print.css" type="text/css" media="print"/>
  <style type="text/css">



  </style>

  <style type="text/css" media="print">
    @media print{ .wrapper{ height:100%;overflow:visible;} } 
  </style>

<!-- jQuery 3 -->
<script src="<?php echo site_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  
<script>
  
  $("body").css("overflow", "hidden");
  $("body").css("overflow", "auto");
</script>
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

       foreach ($medical_record_details as $record_details):
      ?>
        <div class="col-sm-4 invoice-col">
          <b>Medical Record Number <?php echo $record_details->diagnosis_data_id;?> </b><br>
          <br>
          <b>Pet Name: <?php echo $record_details->pet_name;?></b>
           <br>
          <b>Owner Name: <?php echo $record_details->cus_firstname .' '. $record_details->cus_middlename .' '. $record_details->cus_lastname; ?></b>
          <br /> <br />
           <?php
                                $date =date_create($record_details->diagnosis_date);
                                $diagnosis_date = date_format($date,"F j, Y, g:i a");
                        ?>
          <b>Assess By: <?php echo $record_details->first_name .' '. $record_details->middle_name .' '. $record_details->last_name; ?></b>
          <br/>
          <b> Assessment Date:</b> <?php echo $diagnosis_date?><br>

        </div>
        <!-- /.col -->


        <div class="col-md-offset-4 col-sm-4 invoice-col">

          <b > Date Issued:</b> <?php echo date("F j, Y, g:i a");?><br>
        </div>


        <div class="clearfix"></div>

        <br /><br />

        <div class="col-md-12">
          
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <b> Body Weight:(in KG)</b>
                  </div>
                  <div class="col-md-7">
                    <div class="form-group">
                      <input type="number" readonly="" value="<?php echo $record_details->body_weight; ?>" min="0" max="1000"  class="form-control" id="body_weight" style="margin-left:5px;border-radius: 6px" name="body_weight" /> 
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                  <b>Body Temperature (in Celcius):</b>  
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" readonly="" value="<?php echo $record_details->body_temperature; ?>" class="form-control" id="body_temp" name="body_temp" style="border-radius: 6px" />  
                    </div>
                  </div>
                </div>
              </div>

             
           </div>

            <hr />

        

         <div class="row">
            <div class="col-md-12">
              <label>Subject : </label> 
              <div class="form-group">
              <textarea name="subject" readonly=""  id="subject" class="form-control" style="height:100px" placeholder="Input Owner Statement">
                 <?php echo $record_details->subject; ?>
              </textarea>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <label>Objective : </label> 
              <div class="form-group">
              <textarea name="objective" readonly="" id="objective" class="form-control" style="height:100px" placeholder="Input Veterinarian Observation">
                <?php echo $record_details->objective; ?>
              </textarea>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-md-12">
              <label>Assessment : </label> 
              <div class="form-group">
              <textarea name="assessment" readonly=""  id="assessment" class="form-control" style="height:100px" placeholder="Input Owner need to do">
                <?php echo $record_details->assessment; ?>
              </textarea>
              </div>
            </div>
          </div>


           <div class="row">
            <div class="col-md-12">
              <label>Plan : </label> 
              <div class="form-group">
              <textarea name="plan" id="plan" readonly=""  class="form-control" style="height:100px" placeholder="Input Owner need to attain">
                <?php echo $record_details->plan; ?>
              </textarea>
              </div>
            </div>
          </div>



         <div class="row">
              <div class="col-md-9 offset-md-3">
                <div class="row">
                  <div class="col-md-4">
                    <b>Veterinary Service Fee:</b>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <input type="text" readonly="" class="form-control" id="vet_pet_service" name="vet_pet_service" value="<?php echo $record_details->service_fee; ?>"  style="border-radius: 6px;" />  
                    </div>  
                  </div>
                </div>  
              </div>
        </div>


     </div>
        

      <?php endforeach;?>

    </div>
    <!-- /.row -->

  
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
