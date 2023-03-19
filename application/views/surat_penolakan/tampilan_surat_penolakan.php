<!-- <style type="text/css">
.modal-header{
  background: #1572e8;
  border: 1px solid #e0e0e0;
  color:white;


}
.modal-body{
  border: 1px solid #e8e8e8;
}
</style> -->

<div class="main-panel">
  <div class="content">
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
             

            </div>

            <!-- MODAL TAMBAH OBAT -->

            <div class="modal fade" id="modal_stok_obat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style=" border: 1px solid #e8e8e8;">
              <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" >
                  <div class="modal-header" style="background: #03b509;">

                    <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "> <i class="fas fa-ticket-alt"></i> TAMBAH DATA OBAT MASUK</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

                  </div>
                  <form class="form-horizontal">
                    <div class="modal-body"> 
                      <div class="row">  
                        <div class="mb-3 col-sm-12">
                          <p class="input-group-text" id="basic-addon3"  style="background: #03b509;color :white">Nama Obat</p>
                          <select type="text" class="form-control" id="nama_obat" name="nama_obat"   style="width: 100%">


                           <option selected>Pilih Nama Obat</option>
                           <?php foreach ($tambah_stok_obat as $row): ?>
                            <option value="<?php echo $row->kode_obat ?>"><?php echo $row->nama_obat ?></option>
                          <?php endforeach ?> 

                        </select>  
                      </div> 


                      <div class="col-sm-12 mt-2 mb-2">
                        <label for="stok_masuk">Stok Masuk</label>
                        <input type="text" class="form-control" id="stok_masuk" name="stok_masuk" onkeypress="return hanyaAngka(event)" required >
                      </div> 

                    </div> 
                  </div>
                  <div class="modal-footer" style=" border: 1px solid #e8e8e8;">
                    <button type="button" class="btn btn-danger mr-2"  data-dismiss="modal"><b>BATAL</b></button>
                    <button type="button" class="btn btn-success" id="btn_tambah_stok"><b>TAMBAH STOK</b></button>
                  </div>


                </form>
              </div>
            </div>
          </div> 

          <!-- AKHIR MODAL TAMBAH OBAT -->

          <div class="card-body col-md-12">
            <div style="overflow-x:auto;">

              <table  id="example1" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;"  >
                <thead>
                  <tr style="background: #03b509 ;text-align: center; color:white">
                    <!-- <td>Kode</td> -->
                    <th>No</th>
                    <th>Kode Obat</th>                   
                    <th>Nama Pasien</th>
                    <th>Tanggal</th>
                    <th>Yang Menolak </th>  
                    <th style="text-align: center;" > Option</th> 


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

                <input type="hidden" name="kode_obat" id="kode_obat" value="">  
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



      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-upload mr-2"></i> IMPORT DATA OBAT</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="import_form" enctype="multipart/form-data">

               <div class="form-group row" style="display :none"> 
                 <div class="col-sm-12">
                  <label style="color:#343a40"for="kode_obat">Kode Obat</label>
                  <input type="text" class="form-control" id="kode_obat"  name="kode_obat"   placeholder="Nomor OP.." required>
                </div>
              </div>

              <div class="form-group row" style="display :none"> 
               <div class="col-sm-12">
                <label style="color:#343a40"for="nama_obat">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat"  name="nama_obat"   placeholder="Nomor OP.." required>
              </div>
            </div>


            <div class="form-group row" style="display :none"> 
             <div class="col-sm-12">
              <label style="color:#343a40"for="harga_beli">Harga Beli</label>
              <input type="text" class="form-control" id="harga_beli"  name="harga_beli"   placeholder="Nomor OP.." required>
            </div>
          </div>

          <div class="form-group row" style="display :none"> 
           <div class="col-sm-12">
            <label style="color:#343a40"for="harga_jual">Harga Jual</label>
            <input type="text" class="form-control" id="harga_jual"  name="harga_jual"   placeholder="Nomor OP.." required>
          </div>
        </div>


        <div class="form-group row" style="display :none"> 
         <div class="col-sm-12">
          <label style="color:#343a40"for="satuan">Satuan</label>
          <input type="text" class="form-control" id="satuan"  name="satuan"   placeholder="Nomor OP.." required>
        </div>
      </div>


      <div class="form-group row" style="display :none"> 
       <div class="col-sm-12">
        <label style="color:#343a40"for="stok">Jumlah Stok</label>
        <input type="text" class="form-control" id="stok"  name="stok"   placeholder="Nomor OP.." required>
      </div>
    </div>

    <div class="form-group row" style="display :none"> 
     <div class="col-sm-12">
      <label style="color:#343a40"for="status_obat">  Status Obat</label>
      <input type="text" class="form-control" id="status_obat"  name="status_obat"   placeholder="Nomor OP.." required>
    </div>
  </div>

  <div class="form-group row" >
    <div class="col-sm-12">
      <label style="color:#343a40"for="file">Pilih Data</label>
      <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
    </div>
  </div>  

</form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" name="import" value="Import" class="btn btn-primary">Save changes</button>
</div>
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


<div class="modal fade" id="ModalDataPenolakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <select class="form-control" id="status" name="status" >
                  <option disabled="disabled" selected value="0"  style="background: #d3d4d6;" >----</option>  
                  <option value="Tercetak">Tercetak</option>
                  <option value="Belum">Belum</option> 
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

<script type="text/javascript"> 

  tampil_data();

   function tampil_data(){
     $.ajax({
       type  : 'GET',
       url   : '<?php echo base_url()?>surat_penolakan/tampil_data',
        async : true,
       dataType : 'json',
       success : function(data){
         var html = '';
         var i;
         var no=1;
         for(i=0; i<data.length; i++){
           html += '<tr>'+
           '<td style="text-align:center">'+no+'</td>'+
           '<td style="text-align:center">'+data[i].kode_surat_penolakan+'</td>'+
           '<td style="text-align:center">'+data[i].nama_pasien+'</td>'+   
           '<td style="text-align:center">'+data[i].tanggal_peembuatan_surat+'</td>'+   
           '<td style="text-align:center">'+data[i].nama_approval+'</td>'+    
           '<td style="text-align:left"><div class="btn-group">'+  
           '<a href="javascript:;" class="btn btn-secondary btn-sm  btn-flat data_penolakan "style="font-weight: bold;" data="'+data[i].kode_surat_penolakan+'" ><i class="fas fa-edit mr-1"></i> Update</a>'+
           '<a  href="<?php echo base_url() ?>surat/cetak/'+data[i].kode_surat_penolakan+'" class="btn btn-sm btn-success btn-flat item_edit_user"  target="_blank" data="'+data[i].kode_surat_penolakan+'"><i class="fa fa-print mr-1"></i>Cetak Surat</a>'; 
          html += '</td>'+
           '</div></tr>';
           no++;
         }
         $('#show_data').html(html);
         set();
       }
     });
   }


   $('#show_data').on('click','.data_penolakan',function(){
    var kode_surat_penolakan=$(this).attr('data');
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('surat_penolakan/get_surat_penolakan')?>",
      dataType : "JSON",
      data : {kode_surat_penolakan: kode_surat_penolakan},
      success: function(data){

        $.each(data,function(){
          $('#ModalDataPenolakan').modal('show');
          $('[name="kode_update_status"]').val(kode_surat_penolakan);
          $('[name="status"]').val(data.status); 
        });
      }
    });


  }); 



  $(document).ready(function(){
   var delay = (function(){
    var timer = 0;
    return function(callback, ms){
     clearTimeout(timer);
     timer = setTimeout(callback,ms);
   };
 })();  

 $('#nama_obat').select2({
   placeholder:"Pilih Nama Obat",
   allowClear: true,
   dropdownParent:"#modal_stok_obat"
 })

})


  function refresh(){
    location.reload();
  }  

 //  function table_data(){
 //    dataTable.ajax.reload(null,true);
 //  }

 //  $(".filter_nama").keyup(function(){
 //   table_data();
 // });

 //  $(".filter_keterangan").keyup(function(){
 //   table_data();
 // });


//  $(document).ready(function(){ 
//   let tabel = $("#penolakan").DataTable({
//     "ordering": true,
//     "processing": true,
//     "serverSide": true,
//     "autoWidth":true,
//     "ajax": {
//       "url": "<?php echo base_url()?>/surat_penolakan/ambil_data/",
//       "type":'POST',
//     }

//   });






// });

 $('#show_data').on('click','.item_hapus_obat', function(){
  var kode_obat =$(this).attr('data');

  $('#ModalHapus').modal('show');
  $('[name="kode_obat"]').val(kode_obat);

  return false;

});

 $('#btn_hapus').on('click',function(){
  var kode_obat=$('#kode_obat').val();
  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('satuan_obat/hapus')?>",
    dataType : "JSON",
    data : {kode_obat: kode_obat},
    success: function(data){
      $('#ModalHapus').modal('hide');
      location.reload();

        // tampil_data();
      }
    });
  return false; 
});  




 $('#btn_tambah_stok').on('click', function() {
  var nama_obat = $('#nama_obat').val();
  var stok_masuk = $('#stok_masuk').val();
  if (nama_obat ==null) {
    $('#nama_obat').focus();
    Swal.fire({
      title:'Nama Obat Kosong',
      text:'Silahkan Pilih Nama Obat!',
      icon:'error'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.close();
      }
    });
    return false;

  }
  if (stok_masuk =='') {
    $('#stok_masuk').focus();
    Swal.fire({
      title:'Stok Masuk Kosong',
      text:'Silahkan Masukkan Jumlah Stok Obat Masuk!',
      icon:'error'
    }).then((result) =>{
      if (result.isConfirmed) {
        Swal.close();
      }
    });
    return false;
  }
  $.ajax({
    type: "POST",
    url: "<?php echo base_url('satuan_obat/update_stok_obat') ?>",
    dataType: "JSON",
    data: {
      'nama_obat': nama_obat,
      'stok_masuk': stok_masuk,
    },
    success: function(data) {
      if (data=="Stok Obat Berhasil Ditambahkan!") {
        Swal.fire({
          title:'Berhasil',
          text:data,
          icon:'success'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.close();
            $('#modal_stok_obat').modal('hide');
            location.reload();
              // tampil_data();
            }
          });


      }else{
        Swal.fire({
          title:'Gagal',
          text:data,
          icon:'error'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.close();
          }
        }); 
        return false
      }
    }
  });
  return false;
});



 function hanyaAngka(event) {
  var angka = (event.which) ? event.which : event.keyCode
  if (angka != 46 && angka != 8 && angka > 31 && (angka < 48 || angka > 57))
    return false;
  return true;
}
</script>













