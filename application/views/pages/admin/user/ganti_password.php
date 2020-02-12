  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php $title = explode('(',$menuHalaman->sub_judul_menu); ?>
        <section class="content-header">
          <h1>
            <?php echo $title[0] .' ' .$nama_pengguna_edit ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="<?php echo $menuHalaman->icon_menu ?>"></i> <?php echo $menuHalaman->judul_menu ?></a></li>
            <li class="active"><?php echo $title[0].' '.$nama_pengguna_edit ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php if(validation_errors()){ ?>
            <div class="alert alert-warning alert-dismissible col-sm-6 col-sm-offset-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i></h4>
                <?php echo validation_errors() ?>
            </div>
            <?php } ?>
            <?php if($errmsg){ ?>
            <div class="alert alert-warning alert-dismissible col-sm-6 col-sm-offset-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i></h4>
                <?php echo $errmsg ?>
            </div>
            <?php } ?>
            <div class="col-sm-10 col-sm-offset-1">
              <!-- Horizontal Form -->
              <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open('admin/updatePassword', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="admin" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password ?>">
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="admin" class="col-sm-4 control-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="konf_password" value="<?php echo $konf_password ?>">
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="hidden" name="baseURL" id="baseURL" value="<?php echo base_url() ?>" />
                    <input type="hidden" name="pengguna_id_edit" value="<?php echo $pengguna_id_edit ?>">
                    <?php if(isset($priviliges->{20})){ ?>                    
                    <button type="submit" id="lanjut" class="btn bg-purple pull-right">Perbarui</button>
                    <?php }else{?><button class="pull-right btn btn-default text-bold" disabled>Perbarui</button><?php } ?>
                  </div>
                  <!-- /.box-footer -->
                <?php echo form_close() ?>
              </div>
              <!-- /.box -->
            </div>
        </section>
  </div>
