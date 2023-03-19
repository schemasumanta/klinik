<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">FORM PEMBELIAN OBAT</h4>
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
            <a href="#">Pembelian Obat</a>
          </li>
        </ul>
      </div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <section class="content flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12"> 

                 <!-- Button trigger modal -->
                 <a href="<?php echo site_url('pembelian_obat/tambah_pembelian_obat') ?>" class="btn btn-success btn-sm btn mr-1"> Tambah Pembelian Obat</a>

                 <button class=" btn btn-sm refresh " style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>  

               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                } 
              </script>


            </div> 

            <!-- /.card-header -->
            <div class="card-body col-md-12">
              <div class="table-responsive">

                <table  id="tabel_pembelian" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;" >
                  <thead>
                    <tr style="background: #03b509 ;text-align: center; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th>
                      <th>Kode Beli</th>                   
                      <th >Nama Pembeli</th>
                      <th >Tanggal</th>
                      <th >Total harga</th>  
                      <th style="text-align: center;" width="5%"> Option</th> 

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

                      <input type="hidden" name="kode_beli" id="kode_beli" value="">  
                      <div class="alert alert-danger"><p>Apakah Data obat Akan di Hapus..?</p></div>
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


$(document).ready(function(){ 
    dataTable = $('#tabel_pembelian').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('pembelian_obat/tabel_pembelian')?>',
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
    order: [1, 'asc'],
     columns: [
     {'data':'no'},
     {'data':'kode_beli'},
     {'data':'nama_pembeli'},
     {'data':'tanggal_pembelian'},
     {'data':'total_akhir'},
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,1,3,-1],
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


$(document).ready(function(){

  $('#import_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url   : '<?php echo base_url()?>satuan_obat/import',
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        // load_data();
        alert(data);
      }
    })
  });

});

  $('#show_data').on('click','.item_hapus_pembelian', function(){
    var kode_beli =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_beli"]').val(kode_beli);

    return false;

  });

  $('#btn_hapus').on('click',function(){
    var kode_beli=$('#kode_beli').val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('pembelian_obat/hapus')?>",
      dataType : "JSON",
      data : {kode_beli: kode_beli},
      success: function(data){
        $('#ModalHapus').modal('hide');

        if (data) {
         Swal.fire({
          title:'Berhasil',
          text:'Data Berhasil Di Hapus',
          icon:'success'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.close();
            location.reload();
            
          }
        });
      }

      tampil_data();
    }
  });
    return false;


  }); 


</script>













