  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        <small><?php echo $title ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="zmdi zmdi-view-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" style="align:center;">
        <?php echo current_url()?><br><?php echo $this->uri->segment(1)?>
        <?php if(isset($priviliges->{2})) {?>
        <!-- right column -->
        <div class="col-sm-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Data Catin</h3>

              <p>Berkas Baru</p>
            </div>
            <div class="icon">
              <i class="zmdi zmdi-male-female"></i>
            </div>
            <a href="<?php echo base_url('admin/catin') ?>" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php } ?>
        <?php if(isset($priviliges->{4})) {?>
        <div class="col-sm-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data Catin</h3>

              <p>Proses Berkas</p>
            </div>
            <div class="icon">
              <i class="zmdi zmdi-male-female"></i>
            </div>
            <a href="<?php echo base_url('admin/catin/proses') ?>" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php } ?>
        <?php if(isset($priviliges->{4})) {?>
        <div class="col-sm-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3>Data Catin</h3>

              <p>Berkas Selesai </p>
            </div>
            <div class="icon">
              <i class="zmdi zmdi-male-female"></i>
            </div>
            <a href="<?php echo base_url('admin/catin/selesai') ?>" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php } ?>
      </div>
    </section>
  </div>
