let ajaxJson = $("#dataJson").val();
let urlEditData = $("#editData").val();
let hapusJson = $("#hapusJson").val();
let hakAksesUrl = $("#hakAkses").val();
let table = $('#tableData').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'autoWidth'   : false,
    'info'        : true,
    'processing'  : true,
    'serverSide'  : true,
    'ajax' : ajaxJson,
    'columns' : [
      {
        "mRender": function(data, type, full){
            return '<span class="pull-right">'+full['grup_id']+'</span>';
        }
      },
      { "mRender": function(data, type, full){
          if(full[21]){
              return "<a href='"+hakAksesUrl+"/"+full['grup_id']+"'>"+full['nama_grup']+"</a>";
          }else{
              return "<a href='javascript:void(0);'>"+full['nama_grup']+"</a>";
          }
      }},
      { "mRender": function(data, type, full){
          if(full[16] && full[18]){
            return '<a href="javascript:void(0);" onClick="editData('+full['grup_id']+')"<button class="btn btn-warning btn-xs text-bold">Edit</button></a>&emsp;&emsp;<a href="javascript:void(0);" onClick="hapusData('+full['grup_id']+')"><button class="btn btn-danger btn-xs text-bold">Hapus</button></a>';
          }else if(!full[16] && full[18]){
            return '<a href="javascript:void(0);" onClick="javascript:void(0)"<button class="btn btn-default btn-xs text-bold" disabled>Edit</button></a>&emsp;&emsp;<a href="javascript:void(0);" onClick="hapusData('+full['grup_id']+')"><button class="btn btn-danger btn-xs text-bold">Hapus</button></a>';
          }else if(full[16] && !full[18]){
            return '<a href="javascript:void(0);" onClick="editData('+full['grup_id']+')"<button class="btn btn-warning btn-xs text-bold">Edit</button></a>&emsp;&emsp;<a href="javascript:void(0);" onClick="javascript:void(0)"><button class="btn btn-default btn-xs text-bold" disabled>Hapus</button></a>';
            }else if(!full[16] && !full[18]){
            return '<a href="javascript:void(0);" onClick="javascript:void(0);"<button class="btn btn-default btn-xs text-bold" disabled>Edit</button></a>&emsp;&emsp;<a href="javascript:void(0);" onClick="javascript:void(0)"><button class="btn btn-default btn-xs text-bold" disabled>Hapus</button></a>';
          }
      }}
    ],
  });

table.on( 'order.dt search.dt', function () {
    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //cell.innerHTML = i+1;
        cell.innerHTML = i+1;
    } );
} ).draw();

table.on('draw.dt', function(){
    table.column(0).nodes().each( function (cell, i) {
        let info = table.page.info();
        let page = info.page;
        let length = table.page.len();
        if(page >= 1){
            page = page * length;
        }
        cell.innerHTML = page+i+1;
    } );
});

function editData(idGrup){
    console.log("grup id "+idGrup);
    $(location).attr("href", urlEditData+'/'+idGrup);
}

function hapusData(idGrup){
    console.log("grup id "+idGrup);
    $.post(hapusJson, {grup_id: idGrup}, function(data, status){
        console.log(data);
        if(data.status == 'success'){
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Data Telah dihapus',
              showConfirmButton: false,
              timer: 2000
            }).then(function(){
              table.ajax.reload( null, false );
            });
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'error',
              title: 'Data Tidak dihapus',
              showConfirmButton: false,
              timer: 2000
            }).then(function(){
              table.ajax.reload( null, false );
            });
        }
    }).fail(function(){
        Swal.fire({
            position: 'top-end',
            type: 'warning',
            title: 'Url tidak ditemukan',
            showConfirmButton: false,
            timer: 2000
        })
    });
}

  function toRp(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+=',';}}return'\t'+e(d)+''}
  
  // Wrap IIFE around your code
  (function($, viewport){
      $(document).ready(function() {
  
          // Executes only in XS breakpoint
          if(viewport.is('xs')) {
              // ...
          }
  
          // Executes in SM, MD and LG breakpoints
          if(viewport.is('>=sm')) {
              // ...
              /*let column = table.column(6);
              column.visible(!column.visible());*/
          }
  
          // Executes in XS and SM breakpoints
          if(viewport.is('<md')) {
              // ...
              /*let column = table.column(0);
              column.visible(!column.visible());*/
          }
  
          // Execute code each time window size changes
          $(window).resize(
              viewport.changed(function() {
                  if(viewport.is('xs')) {
                      // ...
                  }
              })
          );
      });
  })(jQuery, ResponsiveBootstrapToolkit);
  