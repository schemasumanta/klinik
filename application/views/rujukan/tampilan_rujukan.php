<div class="main-panel">
  <div class="content flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>"> 
    <style type="text/css">
      .isi_expired{
        border:1px solid #d1d1d1;
        line-height:35px
      }

    </style>
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">FORM DATA OBAT</h4>

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
            <a href="<?php echo site_url('medis') ?>">Obat</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">List Data Obat</a>
          </li>
        </ul>
      </div>


      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12"> 

                  <a href="#" id="btn_laporan" class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#modal_stok_obat"><i class="fas fa-exchange-alt mr-2"></i>Tarik Laporan Rujukan</a>

              </div>  

            </div>


        <div class="card-body col-md-12">
          <div class="table-responsive">
           <table  id="tabel_rujukan" class="table table-striped table-bordered"  >
            <thead>
              <tr style="background: #03b509 ;text-align: left; color:white">
                <th>No</th>
                <th>Kode Rujukan</th>  
                <th>Kode Pasien</th>                   
                <th >Nama Pasien</th>
                <th >Jenis Rujukan</th>
                <th >Nama RS</th>   
                <th >Alamat RS</th>   
                <th >Status</th>   
                <th style="text-align: center;" >Opsi</th> 
              </tr>
            </thead>
            <tbody id="show_data" class="isi_expired">
            </tbody>



          </table>
        </div>
      </div>
      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success-gradient">
              <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-capsules"></i> Status Obat</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>satuan_obat/hapus_obat">
              <div class="modal-body">

                <input type="hidden" name="kode_obat_hapus" id="kode_obat_hapus" value="">
                <input type="hidden" name="status_obat_hapus" id="status_obat_hapus" value="">  
                <div class="alert alert-danger" id="bungkus"><p id="notif_hapus">Apakah Data obat Akan di Hapus..?</p></div>
              </div>
              <div class="modal-footer"> 
               <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">TIDAK</button>
               <button class="btn_hapus_obat btn btn-success btn-flat" id="btn_hapus_obat" type="submit">YA</button>
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
   function refresh(){
    location.reload();
  }  


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


     dataTable = $('#tabel_rujukan').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('rujukan/tabel_rujukan')?>',
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
     {'data':'kode_rujukan'},
     {'data':'kode_pasien'},
     {'data':'nama_pasien'},
     {'data':'jenis_rujukan'},
     {'data':'nama_rs'},
     {'data':'alamat_rs'},
     {'data':'status_rujukan'},
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

  


  $('#show_data').on('click','.item_hapus_obat', function(){
    var kode_obat =$(this).data('kode');
    var status_obat =$(this).data('status');
    $('#ModalHapus').modal('show');
    $('#kode_obat_hapus').val(kode_obat);
    $('#status_obat_hapus').val(status_obat);
    if (status_obat==0) {
      $('#notif_hapus').html("Nonaktifkan Obat ?");
      $('#bungkus').addClass('alert-danger');
      $('#bungkus').removeClass('alert-success');
    }else{

      $('#notif_hapus').html("Aktifkan Obat ?");
      $('#bungkus').removeClass('alert-danger');
      $('#bungkus').addClass('alert-success');
    }
    return false;
  });




  function hanyaAngka(event) {
    var angka = (event.which) ? event.which : event.keyCode
    if (angka != 46 && angka != 8 && angka > 31 && (angka < 48 || angka > 57))
      return false;
    return true;
  }
</script>













