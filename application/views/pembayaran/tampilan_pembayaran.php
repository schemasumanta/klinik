<div class="modal fade" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body listcetak">
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-success btn-sm btn-flat btn_print_struk"  onclick="window.print()"><i class="fas fa-print mr-2"></i>Print</button>
        <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> TUTUP</button>

      </div>


    </div>
  </div>
</div>
<div class="main-panel">
  <div class="content flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">LIST DATA PEMBAYARAN</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="<?php echo base_url('dashboard') ?>">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('pembayaran') ?>">Pembayaran</a>
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

            <button  class=" btn btn-sm btn-primary refresh" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>

         </div>
        
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive" >

          <table  id="tabel_pembayaran" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
            <thead>
              <tr style="background: #03b509 ;text-align: center; color:white">
                <!-- <td>Kode</td> -->
                <th>No</th> 
                <th >ID Bayar</th> 
                <th>Nomor Rekam Medik</th> 
                <th >Nama Pasien</th>     
                <th >Tanggal Periksa</th>        
                <th >Update Status</th>     

                <th style="text-align: center;" width="20%" >Opsi</th>
              </tr>

            </thead>
            <tbody id="show_data">
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

                <input type="hidden" name="kode_pasien" id="kode_pasien" value="">  
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



      <div class="modal fade" id="ModalUpdateStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fas fa-wallet mr-2"></i> UPDATE STATUS&nbsp;&&nbsp;PEMBAYARAN PASIEN</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

            </div>
            <form class="form-horizontal">
              <div class="modal-body">
                <div class="row">  
                  <div class="col-md-12">

                    <div class="input-group mb-3"> 
                      <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Status</span>
                      <select class="form-control" id="status_pembayaran" name="status_pembayaran" >
                        <option disabled="disabled" selected value="0"  style="background: #d3d4d6;" >----</option>  
                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                        <option value="LUNAS">LUNAS</option> 
                      </select>

                    </div> 
                  </div>  

                  <input type="hidden" name="kode_update_status" id="kode_update_status" value="">  


                </div> 

              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
                <button class="btn btn-success btn-flat" id="btn_update_status"><i class="fas fa-wrench mr-2"></i>Update</button>
              </div>


            </form>
          </div>
        </div>
      </div>

      <!-- MODAL UPDATE -->

      <style type="text/css">
        @media print {
         html,body,.modal,.main-panel, #ModalCetak,.modal-dialog,.modal-content{
          padding:0;
          margin: 0;
        }
        .listcetak{
          display: inline-block !important;
          position: fixed !important;
          top:10 !important;
          left:30px !important;
        }
        .footer,.sidebar,.main-header,.modal-footer,.main-panel{
          display: none;
        }

        .hidden-print,
        .hidden-print * {
          display: none !important;
        }
      }
    </style>








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

   dataTable = $('#tabel_pembayaran').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('pembayaran/tabel_pembayaran')?>',
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

    order: [1, 'DESC'],
     columns: [
     {'data':'no'},
     {'data':'kode_pembayaran'},
     {'data':'kode_rekam'},
     {'data':'nama_pasien'},
     {'data':'tanggal_pembayaran'},
     {'data':'status_pembayaran'},               
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,1,5,-1],
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


 $('#show_data').on('click','.item_hapus_pasien', function(){
  var kode_pasien =$(this).attr('data');

  $('#ModalHapus').modal('show');
  $('[name="kode_pasien"]').val(kode_pasien);

  return false;

});

 $('#show_data').on('click','.item_cetak', function(){
  var kode_pembayaran =$(this).data('kode_pembayaran');
  var kode_rekam =$(this).data('kode_rekam');

  $('#ModalCetak').modal('show');
  $('.listcetak').load('<?php echo base_url()?>pembayaran/cetak_pembayaran/'+kode_pembayaran+'/'+kode_rekam);

  return false;

});

 $('#btn_hapus').on('click',function(){
  var kode_pasien=$('#kode_pasien').val();
  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('pasien/hapus_data_pasien')?>",
    dataType : "JSON",
    data : {kode_pasien: kode_pasien},
    success: function(data){
      $('#ModalHapus').modal('hide');
      location.reload();

    }
  });
  return false;


}); 
  //GET update
  $('#show_data').on('click','.update_status',function(){
    var kode_pembayaran=$(this).attr('data');

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('pembayaran/get_status_pembayaran')?>",
      dataType : "JSON",
      data : {kode_pembayaran: kode_pembayaran},
      success: function(data){

        $.each(data,function(){
          $('#ModalUpdateStatus').modal('show');
          $('[name="kode_update_status"]').val(kode_pembayaran);
          $('[name="status_pembayaran"]').val(data.status_pembayaran); 
        });
      }
    });


  }); 

  $('#btn_update_status').on('click',function(){
    var kode_pembayaran=$('#kode_update_status').val();
    var status_pembayaran=$('#status_pembayaran').val(); 

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('pembayaran/update_status')?>",
      dataType : "JSON",
      data : {kode_pembayaran: kode_pembayaran,status_pembayaran: status_pembayaran},
      success: function(data){
        alert(data);
        $('#ModalUpdateStatus').modal('hide');
        location.reload();

      }
    });
    return false;


  }); 


  

  $('.btn_print_struk').on('click',function(){
   
  });


</script>













