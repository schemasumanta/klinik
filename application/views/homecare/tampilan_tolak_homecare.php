<div class="main-panel">{
  <style type="text/css">
    .detail_judul{
      background: #007304;
      color:white;
      border:1px solid white;

    }
    .pemisah{
      border: 1px solid white;
      height: 10px;

    }
    .detail_isi{
      background: #b95b00;
      color:white;
      border:1px solid white;
    }

    .batas{
      width:1%;
      border-top: 1px solid #ffff;
    }
    .judul2{
      background: #f1f1f1;
      padding: 10px;
      border: 1px solid #a5a6a7;
      font-size:14px;
      width:10%;
      text-align: left;
    }

    .judul1{
      background: #f1f1f1;
      padding: 10px;
      border: 1px solid #a5a6a7;
      font-size:14px;
      width:10%;
      text-align: left;
    }
    .isi1{
      padding: 10px;
      background: #fffeda;

      border: 1px solid #a5a6a7;
      width:30%;
      
      font-size:14px;
      text-align: left;
    }

    .isi{
      padding: 10px;
      background: #fffeda;

      border: 1px solid #a5a6a7;
      
      font-size:14px;
      text-align: left;
    }

  </style>
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">PENOLAKAN HOME CARE</h4>
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
            <a href="#">Rawat Inap</a>
          </li>
        </ul>
      </div>

      <section class="content  flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12"> 



                 <h2 style="font-weight: bold">LIST PENOLAKAN PEMERIKSAAN HOME CARE</h2>

               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }
              </script>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive belum_periksa" data="DESC" subject="kode_homecare">

                <table  id="tabel_tolak_homecare"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                  <thead>
                    <tr style="background: #03b509 ;text-align: left; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th>
                      <th>Kode Pendaftaran</th> 
                      <th>Nama Pasien</th>  
                      <th>Tgl Daftar</th>  
                      <th>Status Pasien</th> 
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

        
          </div>
        </div>
      </section>
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

                      <input type="hidden" name="kode_homecare_hapus" id="kode_homecare_hapus" value="">  
                      <div class="alert alert-danger"><p>Apakah Data Rawat Inap Akan di Hapus..?</p></div>
                      <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal"><i class="far fa-times-circle  mr-2"></i> TIDAK</button>
                      <button class="btn_hapus btn btn-danger btn-flat" id="btn_hapus"><i class="fas fa-trash-alt  mr-2"></i> YA</button>

                    </div>
                    <div class="modal-footer"style="background: #f25961;"> 
                    </div>


                  </form>
                </div>
              </div>
            </div>

            
<script type="text/javascript"> 


  $(document).ready(function(){
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

 dataTable = $('#tabel_tolak_homecare').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('homecare/tabel_tolak_homecare')?>',
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
    order: [0, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'no_registrasi'},
     {'data':'nama_pasien'},
     {'data':'tanggal_berobat'},
     {'data':'status_pasien'},
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


  });



$('#show_data').on('click','.item_hapus', function(){
  var kode_homecare =$(this).attr('data');

  $('#ModalHapus').modal('show');
  $('#kode_homecare_hapus').val(kode_homecare);

  return false;

});



$('#btn_hapus').on('click',function(){
  var kode_homecare=$('#kode_homecare_hapus').val();
  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('homecare/hapus_homecare')?>",
    dataType : "JSON",
    data : {kode_homecare: kode_homecare},
    success: function(data){
      $('#ModalHapus').modal('hide');
      location.reload();

    }
  });
  return false;


}); 


</script>













