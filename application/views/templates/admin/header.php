<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php $title= array("Dashboard"); if($menuHalaman){$title = explode('(',$menuHalaman->sub_judul_menu); }?>
  <link rel="icon" href="<?php echo base_url('public/admin/images/Logo_PKM_Panah_Cinta_2019.jpg') ?>">
  <title>Manajemen Aset | <?php echo $title[0] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Material Design -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/plugins/material-design-iconic-font/css/material-design-iconic-font.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/select2/dist/css/select2.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/admin-lte/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/admin-lte/dist/css/skins/_all-skins.min.css')?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/morris.js/morris.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/bootstrap-datepicker/css/datepicker3.css')?>">
  <script src="<?php echo base_url('public/admin/bower_components/modernizr/modernizr.js')?>"></script>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.min.css')?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url('public/admin/sweetalert2/dist/sweetalert2.min.css')?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/plugins/icheck/skins/all.css') ?>">
  <link rel='stylesheet' href="<?php echo base_url('public/css/chatViewStyle.css')?>" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"-->
</head>
<body class="hold-transition skin-blue <?php echo $fixed?>">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Manajemen</b>Aset</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--img src="public/admin/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"-->
              <img src="<?php echo base_url('public/admin/images/user-icon2.png')?>" class="user-image" alt="User Image'">
              <span class="hidden-xs"><?php echo $nama_pengguna ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('public/admin/images/user-icon2.png')?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $nama_pengguna?>
                  <small><?php echo $nama_grup ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('admin/logout')?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li-->
        </ul>
      </div>
    </nav>
  </header>