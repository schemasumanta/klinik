<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN REKAM MEDIK  NIFAS</h4>
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
            <a href="#">Rekam Medik Nifas</a>
          </li>
        </ul>
      </div>


      <!-- Main content -->
      <section class="content flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12">  
         
           <!--  <button id="export" name="export" onclick="refresh()" class=" btn btn-md" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button> -->
           <!-- <h2>PASIEN DIAGNOSIS</h2> -->
           <h2 style="font-weight: bold">LIST PEMERIKSAAN PASIEN NIFAS</h2>

         </div>
         <script type="text/javascript">
          function refresh(){
            location.reload();
          }
        </script>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive" >

          <table id="tabel_rekam_nifas_satu" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
            <thead>
              <tr style="background: #03b509 ;text-align: left; color:white">
                <!-- <td>Kode</td> -->
                <th>No</th>   
                <th>No Registrasi</th>
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


      <div class="card-body">
        <div class="table-responsive" >
           <h2 style="font-weight: bold">LIST PASIEN NIFAS</h2>

          <table  id="tabel_rekam_nifas_dua" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
            <thead>
              <tr style="background:#699e00 ;text-align: left; color:white">
                <!-- <td>Kode</td> -->
                <th>No</th>   
                <th>kode Rekam</th>  
                <th>Nama Pasien</th>  
                <th>Status Pasien</th>  
                <th>Dokter Pemeriksa</th>    
                <th>Tanggal Di Periksa</th>    
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

                <input type="hidden" name="kode_nifas" id="kode_nifas" value="">  
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
  let tabel = $("#tabel_rekam_nifas_satu").DataTable({
      "ordering": true,
      "processing": true,
      "serverSide": true,
      "autoWidth":true,
      "ajax": {
        "url": "<?php echo base_url()?>/nifas/ambil_data_nifas_satu/",
        "type":'POST',
      }

    });
    });

  $(document).ready(function(){ 
  let tabel = $("#tabel_rekam_nifas_dua").DataTable({
      "ordering": true,
      "processing": true,
      "serverSide": true,
      "autoWidth":true,
      "ajax": {
        "url": "<?php echo base_url()?>/nifas/ambil_data_nifas_dua/",
        "type":'POST',
      }

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

  $('#show_data').on('click','.periksa_pasien_nifas', function(){
    var kode_nifas =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>nifas/periksa_pasien_nifas/'+kode_nifas;
  });


   $('#show_data1').on('click','.item_detail_nifas', function(){
    var kode_nifas =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>nifas/item_detail_nifas/'+kode_nifas;
  });

     $('#show_data1').on('click','.item_edit_nifas', function(){
    var kode_nifas =$(this).attr('data').replace('/','garing'); 
    window.location.href='<?php echo base_url() ?>nifas/item_edit_nifas/'+kode_nifas;
  });


    $('#show_data').on('click','.item_hapus', function(){
    var kode_nifas =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_nifas"]').val(kode_nifas);

    return false;

  });

  $('#btn_hapus').on('click',function(){
    var kode_nifas=$('#kode_nifas').val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('nifas/hapus_datanifas')?>",
      dataType : "JSON",
      data : {kode_nifas: kode_nifas},
      success: function(data){
        $('#ModalHapus').modal('hide');
        location.reload();

        tampil_data();
      }
    });
    return false;


  }); 




  
 


</script>













