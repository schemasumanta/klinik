<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN SWAB ANTIGEN SARS - COV-2</h4>
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
            <a href="#">swab</a>
          </li>
        </ul>
      </div>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-body">

            

            <div  class="table-responsive">
              <h2 class="mb-3 ml-2 mt-2" style="font-weight: bold; ">LIST DIAGNOSIS PASIEN</h2>


              <table  id="tabel_swab_belum_periksa" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                <thead>
                  <tr style="background: #699e00 ;text-align: center; color:white">
                    <!-- <td>Kode</td> -->
                    <th>No</th>
                    <th>Kode Pasien</th> 
                    <th>No Registrasi</th> 
                    <th>Nama Pasien</th>  
                    <th>Tgl Daftar</th>  
                    <th>Status Pasien</th> 
                    <th >Opsi</th>
                  </tr>

                </thead>
                <tbody id="show_data">
                </tbody>



              </table>
            </div>




            <hr> 




            <hr>
            <div  class="table-responsive">

              <table  id="tabel_swab_sudah_periksa" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                <thead>
                  <tr style="background: #699e00 ;text-align: center; color:white">
                    <!-- <td>Kode</td> -->
                    <th>No</th>
                    <th>Kode Rekam</th> 
                    <th>Nama Pasien</th>                  
                    <th>Status Pasien</th>  
                    <th>Dokter Pemeriksa</th>  
                    <th>Tanggal di Periksa</th>  
                    <th>Opsi</th>
                  </tr>

                </thead>
                <tbody id="show_data1">
                </tbody>



              </table>
            </div>
            </div>

          </div>


          <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background: #f25961;">
                  <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-trash"></i> Hapus</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

                </div>
                <form class="form-horizontal">
                  <div class="modal-body">

                    <input type="hidden" name="kode_swab" id="kode_swab" value="">  
                    <div class="alert alert-danger"><p>Apakah Data Pasien Akan di Hapus..?</p></div>
                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> TIDAK</button>
                    <button class="btn_hapus btn btn-danger btn-flat" id="btn_hapus"><i class="fas fa-trash-alt"></i> YA</button>

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

    dataTable = $('#tabel_swab_belum_periksa').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('swab/tabel_swab_belum_periksa')?>',
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
    order: [4, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'kode_pasien'},
     {'data':'no_registrasi'},
     {'data':'nama_pasien'},
     {'data':'tanggal_berobat'},
     {'data':'status_pasien',orderable:false},

     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,2,3,-1],
      className: 'dt-center'
    },
    ]




});


    dataTable2 = $('#tabel_swab_sudah_periksa').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('swab/tabel_swab_sudah_periksa')?>',
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
    order: [5, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'kode_swab'},
     {'data':'nama_pasien'},
     {'data':'status_pasien',orderable:false},
     {'data':'dokter_pemeriksa'},
     {'data':'tanggal_periksa'},
     
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



  $('#show_data1').on('click','.item_rekam_medik', function(){
    var kode_swab =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>rekam/detail_rekam_pasien/'+kode_swab;
  });

  $('#show_data1').on('click','.item_rekam_medik', function(){
    var kode_swab =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>rekam/detail_rekam_pasien/'+kode_swab;
  });

  $('#show_data1').on('click','.item_rekam_medik', function(){
    var kode_swab =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>rekam/detail_rekam_pasien/'+kode_swab;
  });


  $('#show_data1').on('click','.item_edit_rekam', function(){
    var kode_swab =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>rekam/item_edit_rekam/'+kode_swab;
  });



  $('#show_data1').on('click','.item_print_data', function(){
    var kode_swab =$(this).attr('data'); 
    window.location.href='<?php echo base_url() ?>swab/print_data/' +kode_swab;
  });


  $('#show_data').on('click','.item_hapus', function(){
    var kode_swab =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_swab"]').val(kode_swab);

    return false;

  });

  $('#btn_hapus').on('click',function(){
    var kode_swab=$('#kode_swab').val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('swab/hapus')?>",
      dataType : "JSON",
      data : {kode_swab: kode_swab},
      success: function(data){
        $('#ModalHapus').modal('hide');
        location.reload();

      }
    });
    return false;


  }); 


  

  


</script>













