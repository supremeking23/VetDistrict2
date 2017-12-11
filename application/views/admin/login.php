<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QMC | Log in</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="<?php echo site_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo site_url();?>assets/font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo site_url();?>assets/ionicons-2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="<?php echo site_url();?>assets/dist/css/AdminLTE.min.css">
  <style type="text/css">
    .img-bg-mine { 
      background: url('<?php echo site_url();?>assets/images/doctor-chase.jpg') 
      no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    body{
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body class="hold-transition login-page img-bg-mine">
  <div class="img-bg-mine">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>Vet District</b>Clinic</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input pattern=".{8,}" required title="Minimum 8 characters required" type="text" class="form-control" placeholder="username" name="uname">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="password" name="pass">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div>
            <div class="col-xs-4">
              <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Sign In"></input>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="<?php echo site_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo site_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>