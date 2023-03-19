<div class="main-panel">
  <div class="content flash_data" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
    <style type="text/css">
    .matapasswordtambah{
      color:black;
      vertical-align: middle; 
      padding-top: 10px ;
      margin-top: 20px ;
      background:transparent;
    }

    table{
      overflow: scroll;
    }

   
   .modal-header{
     background:  #1572e8;
   }
   .matapasswordterbaru,.matapasswordconfirm{
    color:black;
    vertical-align: middle; 
    padding-top: 10px; 
    background: transparent;
    cursor: pointer;
  }
  label{
    margin-bottom: 5px
  }
  input[type="file"]{
   height: 0 !important;
   opacity: 0 !important;
   padding: 0 !important;
 }
 .imagecheck-figure > img {
  width: 100%;

}

</style>
<section class="content-header" >
  <div class="container-fluid" >
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger-gradient text-white">
          <h3 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Hapus</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

        </div>
        <form class="form-horizontal" action="<?php echo base_url()?>absensi/hapus_absensi" method="post">
          <div class="modal-body">
          
            <input type="hidden" name="kode_absensi_hapus" id="kode_absensi_hapus" value="">  

            <div class="alert alert-danger"><p>Hapus Data Absensi..?</p></div>

          </div>
          <div class="modal-footer"> 
            <button type="button" class="btn btn-sm btn-secondary btn-flat" data-dismiss="modal"><i class="far fa-times-circle mr-2"></i> BATAL</button>
            <button class="btn_hapus btn-sm  btn btn-danger btn-flat" id="btn_hapus" type="submit"><i class="fas fa-trash-alt mr-2"></i> YA</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="col-sm-6"> 
          </div>
          <div class="col-sm-12"> 
       
           <button id="export" name="export" onclick="location.reload()" class="btn btn-sm btn-secondary btn-md"  ><i class="fas fa-sync-alt mr-2"></i>Refresh Data</button>
         </div>
       </div>
       <div class="card-body">
        <div class="table-responsive">
          <table  id="tabel_absensi"  class="table table-striped table-bordered table-sm w-100">
            <thead class="bg-success text-white">
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                 <th>Nama Lengkap</th>
                <th>Absen</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody id="show_data"></tbody>
          </table>
        </div>
      </div>
   
</div>
</section>
</div>
</div>
<script type="text/javascript">

 $(document).ready(function(){

  const notif = $('.flash_data').data('title');
  if (notif) {
    Swal.fire({
      title:notif,
      html:$('.flash_data').data('text'),
      icon:$('.flash_data').data('icon'),
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.close();


      }
    });
  }

dataTable = $('#tabel_absensi').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('absensi/tabel_absensi')?>',
       type: 'get',
       data: function (data) {
       }
     },
     language: {
       sProcessing: 'Sedang memproses...',
       sLengthMenu: 'Tampilkan _MENU_ entri',
       sZeroRecords: 'Tidak ditemukan data yang sesuai',
       sInfo: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
       sInfoEmpty: 'Menampilkan 0 sampai 0 dari 0 entri',
       sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
       sInfoPostFix: '',
       sSearch: 'Cari:',
       sUrl: '',
       oPaginate: {
        sFirst: '<<',
        sPrevious: '<',
        sNext: '>',
        sLast: '>>'
      }
    },
    order: [2, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'tanggal_absensi'},
     {'data':'jam'},
     {'data':'nama_admin'},
     {'data':'type_absen'},
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,1,2,3,5],
      className: 'dt-center'
    },
    ]

});


    function table_data(){
     dataTable.ajax.reload(null,true);
   }


   $(".refresh").click(function(){
     location.reload();
   });




  
});

$('#show_data').on('click','.item_hapus_absensi',function(){
   let kode = $(this).attr('data');
   $('#ModalHapus').modal('show');
  $('#kode_absensi_hapus').val(kode);
  
});


</script>













