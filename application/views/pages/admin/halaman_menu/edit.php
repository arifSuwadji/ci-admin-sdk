  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php $title = explode('(',$menuHalaman->sub_judul_menu); ?>
        <section class="content-header">
          <h1>
            <?php echo $title[0] ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="<?php echo $menuHalaman->icon_menu ?>"></i> <?php echo $menuHalaman->judul_menu ?></a></li>
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
                    echo form_open('admin/updateMenu', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="admin" class="col-sm-3 control-label">Judul Menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Judul Menu" name="judul_menu" value="<?php echo $judulMenu ?>">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="admin" class="col-sm-3 control-label">Sub Judul Menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Judul Menu" name="sub_judul_menu" value="<?php echo $subJudulMenu ?>">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="admin" class="col-sm-3 control-label">Url Menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Url Menu" name="url_menu" value="<?php echo $urlMenu?>">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="admin" class="col-sm-3 control-label">Icon Menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Icon Menu" name="icon_menu" value="<?php echo $iconMenu ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin" class="col-sm-3 control-label">Aktif Menu</label>
                        <div class="col-sm-9">
                            <select name="aktif_menu" class="form-control select2" data-placeholder="Aktif Menu">
                            <option></option>
                            <option value="ya" <?php echo $aktifMenu == 'ya' ? 'selected' : ''?>>Ya</option>
                            <option value="tidak" <?php echo $aktifMenu == 'tidak' ? 'selected' : ''?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="hidden" name="baseURL" id="baseURL" value="<?php echo base_url() ?>" />
                    <input type="hidden" name="menu_id_edit" value="<?php echo $menu_id_edit ?>">
                    <?php if(isset($buttonPriviliges->{5})){ ?>
                        <button type="submit" id="lanjut" class="btn bg-purple pull-right">Perbarui</button>
                    <?php }else{ ?>
                        <button class="pull-right btn btn-default text-bold" disabled>Perbarui</button>
                    <?php } ?>
                  </div>
                  <!-- /.box-footer -->
                <?php echo form_close() ?>
              </div>
              <!-- /.box -->
            </div>
        </section>
  </div>
