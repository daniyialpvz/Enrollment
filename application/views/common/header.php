<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <!-- <meta http-equiv="Pragma" content="no-cache"> -->
    <title>RSU - SESP</title>

    <!-- Favicons-->
    <link rel="icon" href="<?php echo base_url();?>images/favicon/favicon.ico" sizes="32x32">
    <!-- Favicons-->
     <link rel="icon" href="<?php echo base_url();?>images/favicon/favicon.ico" sizes="32x32">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#009900">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="<?php echo base_url();?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url();?>css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url();?>css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo base_url();?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>js/plugins/chartist-js/chartist.js" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url();?>js/materialize.js"></script>
</head>
<?php $home = 0; ?>
<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">                    
                    
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="<?php echo ($this->session->userdata['logged_in']['role'] == 4 || $this->session->userdata['logged_in']['role'] == 5 || $this->session->userdata['logged_in']['role'] == 6) ? '#' : base_url(); ?>" class="brand-logo darken-1"><?php echo $this->session->userdata['logged_in']['role'] == 4 ? "IM DEP" : "IM SESP" ?></a></h1></li>
                    </ul>
                   <!--  <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore RSU SESP"/>
                    </div> -->
                    <ul class="right hide-on-med-and-down">                        
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-navigation-apps"></i></a>
                        </li>                        
                        <!-- <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li>   -->                      
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <?php include(APPPATH.'views/common/navigation.php');?>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">