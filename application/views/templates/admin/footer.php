
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y') ?> <a href="javascript:void(0);">MANAJEMEN ASET</a>.</strong> All rights
        reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">

        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">

      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('public/admin/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('public/admin/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('public/admin/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('public/admin/plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?php echo base_url('public/admin/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('public/admin/plugins/datatables-rowsgroup/dataTables.rowsGroup.js')?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('public/admin/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('public/admin/bower_components/morris.js/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('public/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<!--script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script-->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('public/admin/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('public/admin/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('public/admin/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script src="<?php echo base_url('public/admin/bower_components/bootstrap-datepicker-mobile/bootstrap-datepicker-mobile.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('public/admin/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('public/admin/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/admin/bower_components/admin-lte/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('public/admin/bower_components/admin-lte/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/admin/bower_components/admin-lte/dist/js/demo.js')?>"></script>
<script src="<?php echo base_url('public/admin/sweetalert2/dist/sweetalert2.min.js')?>"></script>
<!-- jquery price format -->
<script src="<?php echo base_url('public/admin/plugins/price/jquery.price_format.min.js')?>"></script>
<!-- Responsive Bootstrap Toolkit -->
<script src="<?php echo base_url('public/admin/bower_components/responsive-bootstrap-toolkit/dist/bootstrap-toolkit.min.js')?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('public/admin/plugins/icheck/icheck.min.js') ?>"></script>
<script>
$(function(){
  'use strict';
  //$('[data-enable="expandOnHover"]').trigger('click');
  
  $('.select2').select2({ allowClear: true });
  
  $('[data-mask]').inputmask();
  
  $('.date-picker').on('changeDate', function(ev){
    $(this).datepicker('hide');
  });

  $('.month-picker').datepicker({
    format: "mm/yyyy",
    viewMode: 'months',
    minViewMode: 'months'
  }).on('changeDate', function(ev){
    $(this).datepicker('hide');
  });

  $ ('body').resize();
  
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
  })
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
});

$(document).ready(function(){
  <?php if($filejs){ ?>
    $.getScript("<?php echo $filejs ?>", function(data, status){
    }).fail(function(){
      console.log("js not found");
    });
  <?php } ?>
  
  $("#imgFile").change(function() {
    readURL(this);
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#showImage').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
</body>
</html>
