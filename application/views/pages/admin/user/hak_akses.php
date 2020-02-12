  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php $title = explode('(',$menuHalaman->sub_judul_menu); ?>
        <section class="content-header">
          <h1>
            <?php echo $title[0] ?> <?php echo $nama_edit_grup ?>
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
            <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('admin/updateHakAkses', $attributes);
            ?>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="box box-success">
                        <div class="box-body">
                        <div class="col-md-12">
                            <div class="box-body table-responsive">
                                <table id="tableData" class="table table-bordered table-hover table-striped">
                                    <thead class="bg-primary">
                                        <tr class='hidden-xs'>
                                            <th>No</th>
                                            <th>Judul Modul</th>
                                            <th>Nama Modul</th>
                                            <th>Url Modul</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php $lastJudul = ''; $i=0; foreach($halaman_admin->result() as $admin){ $i++; ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php if($lastJudul != $admin->judul_menu ){ echo $admin->judul_menu; }?></td>
                                            <td><?php echo $admin->sub_judul_menu ?></td>
                                            <td><?php echo $admin->url_menu ?></td>
                                            <td><input type="checkbox" class="minimal halaman" name="halaman[]" value="<?php echo $admin->menu_id ?>" <?php echo $admin->menu_id == $admin->halaman_menu ? 'checked' : '' ?>></td>
                                        </tr>
                                    <?php $lastJudul= $admin->judul_menu; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="hidden" name="baseURL" id="baseURL" value="<?php echo base_url() ?>" />
                    <input type="hidden" name="grup_id_edit" value="<?php echo $grup_id_edit ?>">
                    <button type="button" class="btn bt-outline bg-primary cek"><span class="fa fa-check-square-o"></span> Cek Semua</button>
				    <button type="button" class="btn btn-outline bg-navy batal"><span class="fa fa-square-o"></span> Batal</button>
                    <?php if(isset($priviliges->{22})){ ?>
                    <button type="submit" id="lanjut" class="btn bg-purple pull-right">Perbarui</button>
                    <?php }else{?><button class="pull-right btn btn-default text-bold" disabled>Perbarui</button><?php } ?>
                </div>
            </div>
            <?php echo form_close() ?>

        </section>
  </div>
