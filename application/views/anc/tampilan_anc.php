<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN REKAM MEDIK ANC</h4>
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
            <a href="#">Rekam Medik ANC</a>
          </li>
        </ul>
      </div>


      <!-- Main content -->
      <section class="content  flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12"> 



                 <!--  <button id="export" name="export" onclick="refresh()" class=" btn btn-md" style="background-color: ##03b509; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button> -->
                 <!-- <h2>PASIEN DIAGNOSIS</h2> -->
                 <h2 style="font-weight: bold">LIST PEMERIKSAAN PASIEN ANC</h2>

               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }
              </script>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <h2 style="font-weight: bold">PASIEN ANC BELUM DIPERIKSA</h2>
                <table  id="tabel_anc_belum_periksa" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;" >
                  <thead>
                    <tr style="background: #03b509 ;text-align: left; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th>    
                      <th>Kode Rekam ANC</th>  
                      <th>Nama Pasien</th>  
                      <th>Tanggal Berobat</th> 
                      <th>Opsi</th>  
                    </tr>

                  </thead>
                  <tbody id="show_data">
                  </tbody>



                </table>
              </div>
            </div>

            <hr> 


            <div class="card-body">
              <div class="table-responsive">
               <h2 style="font-weight: bold">PASIEN ANC SUDAH DIPERIKSA</h2>

               <table  id="tabel_anc_sudah_periksa" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;" >
                <thead>
                  <tr style="background: #699e00;text-align: left; color:white">
                    <!-- <td>Kode</td> -->
                    <th>No</th>    
                    <th>Kode Rekam ANC</th>  
                    <th>Nama Pasien</th>  
                    <th>Tanggal Diperiksa</th>
                    <th>Dr. Pemeriksa</th>
                    <th>Opsi</th>    
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
                <form class="form-horizontal">
                  <div class="modal-body">

                    <input type="hidden" name="kode_kehamilan" id="kode_kehamilan" value="">  
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



   dataTable = $('#tabel_anc_belum_periksa').DataTable( {
    paginationType:'full_numbers',
    processing: true,
    serverSide: true,
    searching: true,

    filter: false,
    autoWidth:false,
    aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    ajax: {
     url: '<?php echo base_url('anc/tabel_anc_belum_periksa')?>',
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
    {'data':'kode_kehamilan'},
    {'data':'nama_pasien'},
    {'data':'tanggal_berobat'},
    {'data':'opsi',orderable:false},

    ],   
    columnDefs: [
    {
      targets: [0,3,-1],
      className: 'dt-center'
    },
    ]




  });


   dataTable2 = $('#tabel_anc_sudah_periksa').DataTable( {
    paginationType:'full_numbers',
    processing: true,
    serverSide: true,
    searching: true,

    filter: false,
    autoWidth:false,
    aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    ajax: {
     url: '<?php echo base_url('anc/tabel_anc_sudah_periksa')?>',
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
  // order: [0, 'desc'],
  columns: [
  {'data':'no'},
  {'data':'kode_kehamilan'},
  {'data':'nama_pasien'},
  {'data':'tanggal_periksa'},
  {'data':'dokter_pemeriksa'},
  {'data':'opsi',orderable:false},

  ],   
  columnDefs: [
  {
    targets: [0,4,-1],
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
  
  const notif = $('.flashdatart').data('title');
  if (notif) {
    Swal.fire({
      title:notif,
      text:$('.flashdatart').data('text'),
      icon:$('.flashdatart').data('icon'),
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.close();


      }
    });
  } 


  $('#show_data').on('click','.item_hapus', function(){
    var kode_kehamilan =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_kehamilan"]').val(kode_kehamilan);

    return false;

  });

  $('#btn_hapus').on('click',function(){
    var kode_kehamilan=$('#kode_kehamilan').val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('anc/hapus_dataanc')?>",
      dataType : "JSON",
      data : {kode_kehamilan: kode_kehamilan},
      success: function(data){
        $('#ModalHapus').modal('hide');
        location.reload();

        tampil_data();
      }
    });
    return false;


  }); 




  



</script>













