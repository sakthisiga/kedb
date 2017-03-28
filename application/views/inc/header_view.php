<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NYDEVOPS | iTracker :: <?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- CSS Links -->
			<link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?=base_url()?>public/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?=base_url()?>public/css/ionicons.min.css">
			<link rel="stylesheet" href="<?=base_url()?>public/css/buttons.dataTables.min.css">
			<link rel="stylesheet" href="<?=base_url()?>public/boot/datatables/dataTables.bootstrap.css">			
    		<link rel="stylesheet" href="<?=base_url()?>public/boot/daterangepicker/daterangepicker-bs3.css">
    		<link rel="stylesheet" href="<?=base_url()?>public/boot/iCheck/all.css">
        	<link rel="stylesheet" href="<?=base_url()?>public/boot/timepicker/bootstrap-timepicker.min.css">
        	<link rel="stylesheet" href="<?=base_url()?>public/boot/datetimepicker/bootstrap-datetimepicker.min.css">
    		<link rel="stylesheet" href="<?=base_url()?>public/boot/select2/select2.min.css">
    		<link rel="stylesheet" href="<?=base_url()?>public/css/AdminLTE.min.css">
    		<link rel="stylesheet" href="<?=base_url()?>public/css/_all-skins.min.css">  		
    		<link rel="stylesheet" href="<?=base_url()?>public/css/jquery-jvectormap-1.2.2.css">
        	<link rel="stylesheet" href="<?=base_url()?>public/boot/datepicker/datepicker3.css">
        	<link rel="stylesheet" href="<?=base_url()?>public/boot/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        	
        	
        	        	
	<!-- JS Section -->	
        	<script src="<?=base_url()?>public/js/jQuery-2.1.4.min.js"></script>
        	<script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
        	<script src="<?=base_url()?>public/boot/datatables/jquery.dataTables.min.js"></script>
        	<script src="<?=base_url()?>public/boot/datatables/dataTables.buttons.min.js"></script>
        	<script src="<?=base_url()?>public/boot/exportable/buttons.flash.min.js"></script>
        	<script src="<?=base_url()?>public/boot/exportable/jszip.min.js"></script>
			<script src="<?=base_url()?>public/boot/exportable/pdfmake.min.js"></script>
			<script src="<?=base_url()?>public/boot/exportable/vfs_fonts.js"></script>
			<script src="<?=base_url()?>public/boot/exportable/buttons.html5.min.js"></script>
			<script src="<?=base_url()?>public/boot/exportable/buttons.print.min.js"></script>
    		<script src="<?=base_url()?>public/boot/datatables/dataTables.bootstrap.min.js"></script>
    		<script src="<?=base_url()?>public/boot/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
			<script src="<?=base_url()?>public/boot/select2/select2.full.min.js"></script>
			<script src="<?=base_url()?>public/boot/input-mask/jquery.inputmask.js"></script>
    		<script src="<?=base_url()?>public/boot/input-mask/jquery.inputmask.date.extensions.js"></script>
    		<script src="<?=base_url()?>public/boot/input-mask/jquery.inputmask.extensions.js"></script>
    		<script src="<?=base_url()?>public/js/moment.min.js"></script>
    		<script src="<?=base_url()?>public/boot/daterangepicker/daterangepicker.js"></script>
    		<script src="<?=base_url()?>public/boot/datepicker/bootstrap-datepicker.js"></script>
    		<script src="<?=base_url()?>public/boot/timepicker/bootstrap-timepicker.min.js"></script>
    		<script src="<?=base_url()?>public/boot/datetimepicker/bootstrap-datetimepicker.js"></script>
    		<script src="<?=base_url()?>public/boot/slimScroll/jquery.slimscroll.min.js"></script>
    		<script src="<?=base_url()?>public/boot/iCheck/icheck.min.js"></script>
    		<script src="<?=base_url()?>public/boot/fastclick/fastclick.min.js"></script>
    		<script src="<?=base_url()?>public/boot/ckeditor/ckeditor.js"></script>
    		<script src="<?=base_url()?>public/boot/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    		<script src="<?=base_url()?>public/boot/dist/js/app.min.js"></script>
    		<script src="<?=base_url()?>public/boot/dist/js/demo.js"></script>
    		  
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
        <style>
        tfoot input {
        width: 100%;
        padding: 0.02em;
    }
        </style>    
  </head>
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
	<header class="main-header">
	<?php 
			$filename = base_url().'public/img/profile/'.$this->session->userdata('user_id').'.jpg';
			if (@getimagesize($filename)) {
				$dp_image = $filename;
			} else {
				$dp_image = base_url().'public/img/profile/anonymous.jpg';
			}
	?>
        <!-- Logo -->
        <a href="<?=base_url()?>home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>i</b>TRK</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>iTracker</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=$dp_image ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('emp_name'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=$dp_image ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('emp_name'); ?> - <?php echo $this->session->userdata('user_id'); ?>
                      <small>Group DL: nydevops@cognizant.com</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url()?>home/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <?php if($this->session->userdata('emp_name') == "admin") { ?>
                     <div class="pull-left">
                      <a href="<?=site_url('login/register')?>" class="btn btn-default btn-flat">Registration</a>
                    </div>
                    <?php } ?>
                    <div class="pull-left">
                      <a href="<?=base_url()?>home/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
         
        </nav>
      </header>  
      
       <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-globe"></i> <span>Build/Deployment</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>build/add_build"><i class="fa fa-circle-o"></i> Add Build</a></li>
                <li><a href="<?=base_url()?>build/search_build"><i class="fa fa-circle-o"></i> View Build</a></li>
               <!-- <li><a href="<?=base_url()?>build/upload_build"><i class="fa fa-circle-o"></i> Upload Build</a></li> --> 
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-globe"></i> <span>SCM Support</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>scm/add_scm_support"><i class="fa fa-circle-o"></i> Add Details</a></li>
                <li><a href="<?=base_url()?>scm/search_scm_support"><i class="fa fa-circle-o"></i> View Details</a></li>
              </ul>
            </li>
			 <li class="treeview">
              <a href="#">
                <i class="fa fa-globe"></i> <span>Kedb</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>home/add_article"><i class="fa fa-circle-o"></i> Add Article</a></li>
                <li><a href="<?=base_url()?>home/search_article"><i class="fa fa-circle-o"></i> View Article</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>   
 </div>