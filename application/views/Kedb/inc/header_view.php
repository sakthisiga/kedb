<!doctype html>
<html lang="en">
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xerox :: KEDB Articles</title>
	<!-- CSS Links -->
		<!-- Bootstrap CSS links -->
		<link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?=base_url()?>public/css/bootstrap-theme.css" rel="stylesheet" />
        <link href="<?=base_url()?>public/css/bootstrap.min.panel.css" rel="stylesheet" />
        
        <!-- Jquery CSS links -->
        <link href="<?=base_url()?>public/css/jquery-ui.css" rel="stylesheet" />
        
         
         <!-- Custom CSS links -->
		<link href="<?=base_url()?>public/css/style.css" rel="stylesheet" />
	
	<!-- JS Section -->	
		
        <!-- Jquery JS -->
        <script src="<?=base_url()?>public/js/jquery.js"></script>
		<script src="<?=base_url()?>public/js/jquery-ui.js"></script>

		
		
		<!-- Bootstrap JS -->
        <script src="<?=base_url()?>public/js/bootstrap.js"></script>
        <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>public/js/bootstrap-transition.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-alert.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-modal.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-dropdown.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-scrollspy.js"></script>  
	    <script src="<?=base_url()?>public/js/bootstrap-tab.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-tooltip.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-popover.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-button.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-collapse.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-carousel.js"></script>
	    <script src="<?=base_url()?>public/js/bootstrap-typeahead.js"></script>
         
		<!-- Custom JS -->
        <script src="<?=base_url()?>public/js/js_home/dashboard/template.js"></script>
        <script src="<?=base_url()?>public/js/js_home/dashboard/event.js"></script>
     	<script src="<?=base_url()?>public/js/js_home/dashboard/display.js"></script>  
        <script src="<?=base_url()?>public/js/js_home/dashboard.js"></script>
	
	<!-- FAVICON file -->
		<link rel="shortcut icon" href="<?php echo base_url();?>public/ico/favicon.png">
    
    <!-- Project Enablement Section -->
        <script type="text/javascript">
            //Init the Dashboard Application
            $(function() {
                // Init application
            var dashboard = new Dashboard();
            });

        </script>
        
        
</head>
<body>
<header>

<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?=base_url()?>home"><strong>XEROX</strong> | SCM KEDB</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php echo $this->session->userdata('user_id'); ?></a> | <a href="<?=base_url()?>home/logout" class="navbar-link">Logout</a>
              
            </p>
            <ul class="nav">
             <!--  <li><a href="<?php echo base_url(); ?>home">KeDB</a></li>  -->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
 
  
  
  
</header>
    
<div class="wrapper">
<!-- Start: Wrapper -->


