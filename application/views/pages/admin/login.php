<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="/img/favicon.ico">
  <title>Admin Echic | Community Healt Information Centre</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/bower_components/admin-lte/dist/css/AdminLTE.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/plugins/icheck/skins/all.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('public/admin/sweetalert2/dist/sweetalert2.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page fixed">
<div class="login-box">
  <?php if(validation_errors()){ ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i></h4>
        <?php echo validation_errors() ?>
    </div>
  <?php } ?>
  <?php if($errmsg){ ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i></h4>
        <?php echo $errmsg ?>
    </div>
  <?php } ?>
  <!-- /.login-logo -->
  <div class="login-logo" style="margin-top:0px;">
    <a href="javascript:void(0);"><b>Manajemen Aset</b></a>
  </div>
  
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai sesi anda</p>

    <?php echo form_open('admin/login/action') ?>
      <div class="form-group has-feedback" style="padding-top:10px">
        <input type="text" class="form-control" placeholder="User" name="nama_pengguna" value="<?php echo $nama_pengguna ?>">
        <span class="fa fa-user-o form-control-feedback" style="padding-top:10px"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password ?>">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-block btn-primary btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close() ?> 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('public/admin/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('public/admin/sweetalert2/dist/sweetalert2.min.js')?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('public/admin/plugins/icheck/icheck.min.js')?>"></script>
<script>
  $(document).ready(function(){
    $('.skin-flat input').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    $('#showDaftar').on('click', function(){
      $(location).attr('href', $('#baseUrl').val()+'daftar');
    });

  });
</script>
</body>
</html>
