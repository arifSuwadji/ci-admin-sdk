  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php echo $menuHalaman->judul_menu ?>
        <small><?php echo $menuHalaman->sub_judul_menu ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="<?php echo $menuHalaman->icon_menu ?>"></i> <?php echo $menuHalaman->judul_menu ?></a></li>
        <li class="active"><?php echo $menuHalaman->sub_judul_menu  ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header hidden-xs">
              <h3 class="box-title hidden-xs"><?php echo $menuHalaman->sub_judul_menu ?></h3><?php if(isset($priviliges->{14})){?><a href="<?php echo $tambahData ?>"><button class="pull-right btn btn-primary text-bold">Tambah Grup</button></a><?php }else{?><button class="pull-right btn btn-default text-bold" disabled>Tambah Grup</button><?php } ?>
              <input type="hidden" id="dataJson" value="<?php echo $dataJson ?>"/>
              <input type="hidden" id="editData" value="<?php echo $editData ?>"/>
              <input type="hidden" id="hapusJson" value="<?php echo $hapusData ?>"/>
              <input type="hidden" id="hakAkses" value="<?php echo $hakAkses?>" />
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tableData" class="table table-bordered table-hover table-striped">
                <thead class="bg-primary">
                <tr class='hidden-xs'>
                  <th>No</th>
                  <th>Nama Grup</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
