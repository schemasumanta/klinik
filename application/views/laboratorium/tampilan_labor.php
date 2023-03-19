<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN REKAM LABORATORIUM</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('medis') ?>">Pasien</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Laboratorium</a>
          </li>
        </ul>
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

            
         
           <h2 style="font-weight: bold">LIST DIAGNOSIS PASIEN</h2>

         </div>
        
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">

          <table  id="tabel_laboratorium_belum_periksa"  class="table table-striped table-bordered" >
            <thead>
              <tr style="background: #03b509 ;text-align: center; color:white">
                <!-- <td>Kode</td> -->
                <th width="3%">No</th>
                <th>Nama Pasien</th>  
                <th>Tgl Daftar</th>  
                <th>Status Pasien</th> 
                <th>Keterangan <br>Pemeriksaan LAB</th> 
                <th>Opsi</th>
              </tr>

            </thead>
            <tbody id="show_data">
            </tbody>



          </table>
        </div>
      </div>

 
          
        <hr>
        <hr>

      <div class="card-body"> 

        <h2 style="font-weight: bold">LIST PEMERIKSAAN LABORATORIUM PASIEN</h2> 

      
        <div class="table-responsive">

          <table  id="tabel_laboratorium_sudah_periksa" class="table table-striped table-bordered">
            <thead>
              <tr style="background: #699e00 ;text-align: center; color:white">
                <th width="3%">No</th>
                <th>Kode Lab</th> 
                <th >Nama Pasien</th>                  
                <th  >Status Pasien</th>  
                <th  >Petugas Pemeriksa</th>  
                <th  >Tanggal di Periksa</th> 
                <th  >Keterangan <br>Pemeriksaan LAB</th> 
                <th >Opsi</th>
              </tr>

            </thead>
            <tbody id="show_data1">
            </tbody>



          </table>
        </div>
      </div>


      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background: #f25961;">
              <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-trash"></i> Hapus</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>laboratorium/hapus_data_lab">
              <div class="modal-body">

                <input type="hidden" name="kode_lab" id="kode_lab" value="">  
                <div class="alert alert-danger"><p>Apakah Data Pasien Akan di Hapus..?</p></div>
                <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> TIDAK</button>
                <button class="btn_hapus btn btn-danger btn-flat" id="btn_hapus" type="submit"><i class="fas fa-trash-alt mr-2"></i> YA</button>

              </div>
              <div class="modal-footer"style="background: #f25961;"> 
              </div>
            </form>
          </div>
        </div>
      </div>



      






    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript"> 

  $(document).ready(function(){

    dataTable = $('#tabel_laboratorium_belum_periksa').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('laboratorium/tabel_laboratorium_belum_periksa')?>',
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
    // order: [2, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'nama_pasien'},
     {'data':'tanggal_berobat'},
     {'data':'status_pasien'},
     {'data':'keterangan_pemeriksaan_lab'},
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,2,3,-1],
      className: 'dt-center'
    },
    ]




});


    dataTable2 = $('#tabel_laboratorium_sudah_periksa').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('laboratorium/tabel_laboratorium_sudah_periksa')?>',
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
    order: [1, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'kode_lab'},
     {'data':'nama_pasien'},
     {'data':'status_pasien'},
     {'data':'petugas_lab'},
     {'data':'tanggal_periksa'},
     {'data':'keterangan_pemeriksaan_lab'},
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,2,3,-1],
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


  
  $('#show_data').on('click','.item_hapus', function(){
    var kode_lab =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_lab"]').val(kode_lab);

    return false;

  });



</script>













