<!DOCTYPE html>
<html lang="en">

<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 2.3
  Author: GeeksLabs
  Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="#">
  <meta name="keywords" content="#">
  <title>Login Page | RSU SESP</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url();?>images/favicon/favicon.ico" sizes="32x32">
  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url();?>images/favicon/favicon.ico" sizes="32x32">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo base_url();?>images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url();?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url();?>css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url();?>css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>



<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->


<!-- <div class="col s12 z-depth-4 row">
  <h2>ENROLLMENT & RETENTION DRIVE - 2018</h2>
</div>
 -->
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
       <?php 
            if (isset($this->session->userdata['message_display'])) {
            echo "<div class='alert alert-info fade in'>";
              echo $this->session->userdata['message_display'];
              $this->session->unset_userdata('message_display');
            echo "</div>";
          }
            $attributes = array('id' => 'userId');
          echo form_open_multipart('Login/validateuser', $attributes); 

          if (isset($this->session->userdata['errors'])) {
            echo "<div class='alert alert-danger fade in'>";
              echo $this->session->userdata['errors'];
              $this->session->unset_userdata('errors');
            echo "</div>";
          }

          ?>
      <div class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url();?>images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text"><strong>ENROLLMENT & RETENTION DRIVE - 2018</strong></p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="useremail" name="useremail" type="text">
            <label for="useremail" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="userpassword" name="userpassword" type="password">
            <label for="userpassword">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light blue col s12">Login</button>
          </div>
        </div>
       <!--  <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
          </div>          
        </div> -->
      </div>
      <?php echo form_close();?>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url();?>js/materialize.js"></script>

  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url();?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>

</body>

</html>