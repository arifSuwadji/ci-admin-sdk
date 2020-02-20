
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('public/admin/images/user-icon2.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_pengguna ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
        
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo $current_url == 'admin' ? 'active' : '' ?>">
          <a href="<?php echo base_url('admin') ?>">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php 
        $icon_menu = $menuHalaman ? $menuHalaman->icon_menu : 'zmdi zmdi-view-dashboard';
        $lastJudul = '';
        foreach($menuPriviliges->result() as $priv){ ?>
          <?php if($lastJudul != $priv->judul_menu){ ?>
            <li class="header"><?php echo strtoupper($priv->judul_menu) ?></li>
          <?php } $lastJudul = $priv->judul_menu ?>
            <?php if($priv->hitungMenu > 1){
              $activeArrayIcon = array();
              $arrayIcon = explode(',', $priv->tampilkanIcon);
              foreach($arrayIcon as $icon){
                $activeArrayIcon[$icon] = $icon;
              }
              $activeArrayUrl = array();
              $arrayUrl = explode(',', $priv->tampilkanUrl);
              foreach($arrayUrl as $url){
                $activeArrayUrl[$url] = $url;
              }
            ?>
              <li class="treeview <?php echo $current_url == array_search($current_url, $activeArrayUrl) ? 'active': $icon_menu == array_search($icon_menu, $activeArrayIcon) ? 'active': '' ?>">
                <a href="javascript:void(0)">
                  <i class="<?php echo $priv->icon_menu ?>"></i> <?php echo ucfirst($priv->judul_menu) ?><span></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php
                    $arrayMenu = explode(';', $priv->tampilkanMenu);
                    foreach($arrayMenu as $menu){
                      $arrayList = explode('_', $menu);
                  ?>
                    <li class="<?php echo $current_url == $arrayList[1] ? 'active': $icon_menu == $arrayList[0] ? 'active': '' ?>"><a href="<?php echo base_url($arrayList[1]) ?>"><i class="<?php echo $arrayList[0] ?>"></i> <span><?php echo $arrayList[2] ?></span></a></li>
                  <?php } ?>
                </ul>
              </li>
            <?php }else{ ?>
              <li class="<?php echo $current_url == $priv->url_menu ? 'active': $icon_menu == $priv->icon_menu ? 'active': '' ?>"><a href="<?php echo base_url($priv->url_menu) ?>"><i class="<?php echo $priv->icon_menu ?>"></i> <span><?php echo $priv->sub_judul_menu ?></span></a></li>
            <?php } ?>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
