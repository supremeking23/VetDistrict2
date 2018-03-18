 <?php 

            //for system preferences
            foreach($get_system_settings as $system_settings){
                $system_name = $system_settings->system_name;
                $system_color_skin = $system_settings->color_skin;
                $system_logo = $system_settings->system_logo;
                $system_background_color = $system_settings->background_color;


                $system_id = $system_settings->systemsetting_id;

                $mission =  $system_settings->mission;
           }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $system_name;?></title>
  <link rel="shortcut icon" href="<?php echo site_url(); ?>uploads/system_images/<?php echo $system_logo;?>">
  <link rel="stylesheet" href="<?php echo site_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo site_url();?>assets/css/style.css">
  <script src="<?php echo site_url()?>assets/js/prefixfree.min.js "></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">
    
    /*in body style*/
    header .inbody {
      background: <?php echo $system_background_color ?>;/*light green*/
    }

    header .navbar-brand {
      background: url(<?php echo site_url(); ?>uploads/system_images/<?php echo $system_logo;?>);
      background-repeat: no-repeat;
      background-position: 15px 0;
      height: auto;
    }
  </style>

</head>

<body>

<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#featured"><h1><?php echo $system_name;?><span class="subhead"></span></h1></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse" >
        <ul class="nav navbar-nav navbar-right" >
          <li class="active"><a href="#featured">Home</a></li>
          <li><a href="#mission" >Mission</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#staff">Staff</a></li>
          
          <li><a href="<?php echo site_url()?>customer/login">Login</a></li>
        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>

  <div class="carousel fade" data-ride="carousel" id="featured">

    <ol class="carousel-indicators">
    </ol>

    <div class="carousel-inner fullheight">
      <?php foreach($image_gallery as $images_for_gallery):?>

                        <?php if( $images_for_gallery->image_id == 1){
                            $carousel_item_active ="active";
                        }else{
                           $carousel_item_active="";
                        }

                        ?>

                        <div class="item <?php echo $carousel_item_active; ?>">
                           <img src="<?php echo site_url()?>uploads/gallery_images/<?php echo $images_for_gallery->image_name;?>" alt="">

                        </div>

                      
                      <?php endforeach;?>
    </div><!-- carousel-inner -->

    <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#featured" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div><!-- featured carousel -->
</header>

<div class="main">
  <div class="page" id="mission">
    <div class="content container">
      <h2>Our Mission</h2>      
      <div class="row">
        <p class="col-md-11 col-md-offset-1" style="text-indent: 24px"> <?php echo $mission;?>
        </p>
      
      </div><!-- row -->
    </div><!-- content container -->
  </div><!-- mission page -->

  <div class="page" id="services">
    <div class="content container">
      <h2>Services</h2>
      <div class="row">
          <?php foreach($services as $service):?>
                 <article class="service col-md-4 col-sm-6 col-xs-12">

                  <?php if($service->servicetype_name == "Grooming"){
                  ?>
                   <img class="icon" src="<?php echo site_url();?>assets/images/icon-grooming.svg" alt="Icon">

                   <?php } else if($service->servicetype_name == "Deworming") { ?>

                   <img class="icon" src="<?php echo site_url();?>assets/images/icon-pestcontrol.svg" alt="Icon">

                   <?php }else { ?>

                    <img class="icon" src="<?php echo site_url();?>assets/images/icon-exoticpets.svg" alt="Icon">

                    <?php } ?>
                    <h3><?php echo $service->servicetype_name;?></h3>
                    <p>We offer specialized care for reptiles, rodents, birds, and other exotic pets.</p>
                  </article>


                   

          <?php endforeach;?>

         

            <article class="service col-md-4 col-sm-6 col-xs-12">
              <img class="icon" src="<?php echo site_url();?>assets/images/icon-nutrition.svg" alt="Icon">
              <h3>Nutrition</h3>
              <p>Let our nutrition experts review your pet's diet and prescribe a custom nutrition plan for optimum health and disease prevention.</p>
            </article>

             <article class="service col-md-4 col-sm-6 col-xs-12">
          <img class="icon" src="<?php echo site_url();?>assets/images/icon-health.svg" alt="Icon">
          <h3>GeneralHealth</h3>
          <p>Wellness and senior exams, ultrasound, x-ray, and dental cleanings are just a few of our general health services.</p>
        </article>


      </div><!-- row -->   
    </div><!-- content container -->
  </div><!-- services page -->

  <div class="page" id="staff">
    <div class="container-fluid">
      <h2 id="ourstaff">Our Doctors</h2>
      <div class="row">

      <?php foreach($vets as $vet):?>
         
         <div class="doctor col-lg-4">
          <div class="row">
            <div class="photo col-xs-6 col-xs-offset-3 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2 col-lg-4 col-lg-offset-0">

             <?php if(empty($vet->image)){ ?>

               <img id="image" class="img-circle" src="<?php echo site_url()?>assets/dist/img/guest2.jpg" width="100" alt="<?php echo $vet->first_name .' '. $vet->last_name;?>" title="<?php echo $vet->first_name .' '. $vet->last_name;?>">

              <?php }else{  ?>

                <img class="img-circle" src="<?php echo site_url();?>uploads/employee_image/<?php echo $vet->image;?>" alt="Photo of Dr Sanders" title="<?php echo $vet->first_name .' '. $vet->last_name;?>">

              <?php }?>
            </div><!-- photo -->
            <div class="info col-xs-8 col-xs-offset-2 col-sm-7 col-sm-offset-0 col-md-6 col-lg-8">
              <h3>Dr. <?php echo $vet->first_name .' '. $vet->last_name;?></h3>
              <p></p>
            </div><!-- info -->
          </div> <!-- inner row -->
        </div> <!-- doctor -->          
       
      <?php endforeach;?>

      </div><!-- outer row -->
    </div><!-- container -->
  </div><!-- staff page -->

 
</div><!-- main -->

<footer>
  <div class="content container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <p>Call us toll-free at <span class="phone">888-555-1212</span></p>
        <p>All contents &copy; <?php echo date('Y');?> <a href="#"><?php echo $system_name;?></a>. All rights reserved.</p>    
      </div><!-- col-sm-6 -->
      <div class="col-sm-6">
        
      </div><!-- col-sm-6 -->
    </div><!-- row -->
  </div><!-- content container -->
</footer>

<script src="<?php echo site_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo site_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo site_url();?>assets/js/myscript.js"></script>
</body>
</html>
