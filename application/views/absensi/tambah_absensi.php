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

      thead{
       background: black ;
       color: white;
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


<!-- Main content -->
<section class="content">
  <div class="row"  style="max-height: 100%">
    <div class="col-12">
      <div class="card ">
        <div class="card-header">
          <div class="col-sm-6"> 
          </div>
          <div class="col-sm-12 text-center"> 
           <H2 class="fw-bold">ABSEN HARIAN DOKTER</H2>

            <?php $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',); ?>

           <h6>Tanggal <?php echo date('d')." ".$bulan[date('m')]." ".date('Y'); ?></h6>
           <hr>
           
           <hr>
           <p class="status_hari bg-success w-100 text-white p-1" style="border-radius:5px">
               <?php 
               
               if ($absen_masuk==0){
                   echo "Anda Belum Absen";
               }else{
                   if($absen_pulang==0)
                   {
                       echo "Anda Belum Absen Pulang";
                       
                   }else{
                       
                      echo "Anda Sudah Absen"; 
                   }
               }
               
               ?>
               
               </p>

         </div>
       </div>
       <!-- /.card-header -->
       <div class="card-body">
        <div class="row">
          <div class="col-md-12 text-center">
              <div class=" btn-group  pr-3 pl-2 pb-2 pt-2">
                <button class="btn btn-md w-100 fw-bold btn-success mr-3 absenmasuk" <?php if ($absen_masuk > 0){echo "disabled";} ?>>ABSEN MASUK</button>
             <button class="btn btn-md w-100 fw-bold btn-primary absenpulang" <?php if ($absen_masuk==0 || $absen_pulang > 0){echo "disabled";} ?>>ABSEN PULANG</button>
           </div>

        </div>
      </div>

    </div>
    <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambahLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" >

          <div class="modal-header bg-dark"> 

            <h3 class="modal-title" id="myModalLabel"> <i class="fas fa-tasks mr-2"></i><span id="type_absen">ABSEN MASUK</span></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
          </div>
          <div class="modal-body">
           <form method="post" action="<?php echo base_url() ?>absensi/simpan_absensi" class="simpan_absensi" enctype="multipart/form-data">
             <div class="row "> 
             
                <div class="col-md-12 mb-3">
                <label for="foto-produk">Foto Absen</label>
                <input type="hidden" name="jenis_absen" id="jenis_absen" class="form-control"> 
                <input type="hidden" name="latitude_absen" id="latitude_absen" class="form-control"> 
                <input type="hidden" name="longitude_absen" id="longitude_absen" class="form-control">
                
                <label class="imagecheck mb-4">
                  <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="lampiran" id="lampiran1" onchange="previewFile(1)" capture="camera">
                  <figure class="imagecheck-figure">
                    <img src="<?php echo base_url('assets/img/img02.jpg');?>" alt="}" class="imagecheck-image" id="preview_lampiran1">
                  </figure>
                </label>
              </div>
              
             
           </div>
         </form>
       </div>
       <div class="modal-footer">
        <div class="form-group row"class="collapse" id="customer_collapse">
          <div class="col-sm-12">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal"><b>TUTUP</b></button>
            <button type="button" class="btn btn-success" id="btn_simpan"><b>ABSEN</b></button>
          </div>
        </div>

      </div>
    </div> 
  </div>

</div>


</div>
</section>
</div>
</div>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script>

<script>


</script>


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

});

function previewFile(id) {
    let file = $('#lampiran'+id)[0].files[0];
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      $('#preview_lampiran'+id).attr('src',reader.result);
    }, false);
    if (file) {
      reader.readAsDataURL(file);
    }
  }
  


 
$('.absenmasuk').on('click',function(){

$('#modal_tambah').modal('show');
      $('#jenis_absen').val('Masuk');
      $('#type_absen').html('ABSEN MASUK');
});


$('.absenpulang').on('click',function(){
 $('#modal_tambah').modal('show');
      $('#jenis_absen').val('Pulang');
      $('#type_absen').html('ABSEN PULANG');

});

 
 $('#btn_simpan').on('click',function(){
  
     let lampiran = $('#lampiran1').val();
     if (lampiran=="")
     {
         Swal.fire({
      title:'Error!',
      text:'Foto Absen Kosong!',
      icon:'error'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.close();
      }
    });
    return false;
     }
     
     $('.simpan_absensi').submit();
 });

</script>













