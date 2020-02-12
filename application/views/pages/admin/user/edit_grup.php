  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php $title = explode('(',$menuHalaman->sub_judul_menu); ?>
        <section class="content-header">
          <h1>
            <?php echo $title[0] ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="?php echo $menuHalaman->icon_menu ?>"></i> <?php echo $menuHalaman->judul_menu ?></a></li>
            <li class="active"><?php echo $title[0] ?></li>
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
                    echo form_open('admin/updateGrup', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="grup" class="col-sm-4 control-label">Nama Grup</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nama Grup" name="nama_grup" value="<?php echo $nama_edit_grup ?>">
                            <span class="fa fa-user-o form-control-feedback"></span>
                        </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="hidden" name="baseURL" id="baseURL" value="<?php echo base_url() ?>" />
                    <input type="hidden" name="grup_id_edit" value="<?php echo $grup_id_edit ?>">
                    <?php if(isset($priviliges->{17})){ ?>
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
