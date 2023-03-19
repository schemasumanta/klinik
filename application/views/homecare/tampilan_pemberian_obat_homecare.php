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
        <h4 class="page-title">TAMPILAN PASIEN SEDANG RAWAT JALAN</h4>
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
            <a href="#">Rawat Jalan</a>
          </li>
        </ul>
      </div>

      <!-- Main content -->
      <section class="content  flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }
              </script>
            </div>
            

            <div class="card-body"> 

              <h2 style="font-weight: bold">LIST PASIEN SEDANG RAWAT JALAN</h2> 

              <div class="table-responsive sedang_periksa" data="DESC" subject="kode_homecare">
                <table  id="tabel_homecare_sedang_periksa"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                  <thead>
                    <tr style="background: #03b509 ;text-align: left; color:white">
                      <!-- <td>Kode</td> -->
                      <th data-urut="kode_homecare">No</th>
                      <th data-urut="no_registrasi">Kode Pendaftaran</th> 
                      <th data-urut="nama_pasien">Nama Pasien</th>  
                      <th width="10%" data-urut="tanggal_berobat">Tgl Daftar</th>  
                      <th width="10%" data-urut="status_pasien">Status Pasien</th> 
                      <th style="text-align: center;" data-urut="kode_homecare">Option</th>
                    </tr>

                  </thead>
                  <tbody id="show_data1">
                  </tbody>
                </table>
              </div>
            </div>
            <hr>
            <hr>




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

<div class="modal fade" id="ModalObservasi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title judul_kode_homecare" style=" font: sans-serif; "><i class="fas fa-task mr-2"></i>LIST OBSERVASI Rawat Jalan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          <div class="row"> 
            <div class="col-md-12 list_observasi">

            </div>
          </div> 
          <hr>
          <div class="row p-3"> 
           <div class="col-md-12 detail_list_observasi p-3">

           </div>

         </div>
       </div>
       <div class="modal-footer">
        <button type="button"  class="btn btn-danger btn-flat btn-sm" data-dismiss="modal"><i class="far fa-times-circle mr-2"></i> TUTUP</button>
      </div>
    </div>
  </form>
</div>
</div>
</div> 
<script type="text/javascript"> 

  let filterdata_sedang = $('.sedang_periksa').attr('data');
  let sortdata_sedang = $('.sedang_periksa').attr('subject');
  let url_sedang_periksa ="<?php echo base_url()?>homecare/ambil_data_sedang_periksa_farmasi?sortdata="+sortdata_sedang+"&filterdata="+sortdata_sedang;


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


    let tabel_sedang_periksa= $("#tabel_homecare_sedang_periksa").DataTable({
      "ordering": true,
      "processing": true,
      "serverSide": true,
      "autoWidth":true,
      "ajax": {
        "url":url_sedang_periksa,
        "type":"GET",
      },

       "columnDefs" :[
    { targets: [0,3,4,-1],
     class: 'text-center'
   },

   ],
    });

    $('.sorting').on('click',function(){
      let sort_sedang = $(this).data('urut'); 
      let filter_sedang = $('.sedang_periksa').attr('data');
      if (filter_sedang=="ASC") {
        $('.sedang_periksa').attr('data','DESC');
        $('.sedang_periksa').attr('subject',sort_sedang);
      }else{
        $('.sedang_periksa').attr('data','ASC');
        $('.sedang_periksa').attr('subject',sort_sedang);
      }
      url_sedang_periksa="<?php echo base_url()?>homecare/ambil_data_sedang_periksa_farmasi/"+sort_sedang+"/"+filter_sedang
      tabel_sedang_periksa.ajax.url("<?php echo base_url()?>homecare/ambil_data_sedang_periksa_farmasi?sortdata="+sort_sedang+"&filterdata="+sort_sedang).load();
    });


   

  });


  $('#show_data1').on('click','.item_rincian_biaya', function(){
    var kode_homecare =$(this).attr('data');
    $.ajax({
      type : "GET",
      url  : "<?php echo base_url('homecare/rincian_biaya')?>",
      dataType : "JSON",
      data : {kode_homecare: kode_homecare},
      success: function(data){
        let total_akhir = 0;
        let html='';
        for (var i = 0; i < data.periksa_homecare.length;  i++) {
          html+=`<table class="table" style="width: 100%;">
          <thead>
          <tr>
          <td style="display:none" width="1%"></td>
          <td style="display:none" width="20%"></td>
          <td style="display:none" width="20%"></td>
          <td style="display:none" width="15%"></td>
          <td style="display:none" width="19%"></td>
          <td style="display:none" width="25%"></td>

          </tr>
          <tr>
          <td colspan="3">Nama Pasien&nbsp;&nbsp;:&nbsp;&nbsp;`+data.periksa_homecare[i].nama_pasien+`</td>
          <th colspan="3" class="text-right">`+kode_homecare+`</th>
          </tr>
          </thead>
          <tbody>
          <tr class="bg-success text-light">
          <th  class="text-center">No</th>
          <th  class="text-center">Tanggal<br>Observasi</th>
          <th  class="text-center">Biaya<br>Obat</th>
          <th  class="text-center">Upah<br>Dokter</th>
          <th  class="text-center">Pemeriksaan<br>Lab</th>
          <th  class="text-center">Sub<br>Total</th>
          </tr>`;

          for (var j = 0; j < data.rincian_biaya.length;  j++) {
            let subtotal=0;
            html+=`<tr>
            <td  class="text-center">`+(i+1)+`</td>
            <td  class="text-center">`+data.rincian_biaya[j].tanggal_pemeriksaan+`&nbsp;&nbsp;`+data.rincian_biaya[j].jam_pemeriksaan+`</td>
            <td  class="text-center">`;

            if (data.rincian_biaya[j].biaya_obat!==null) {
              subtotal+=parseFloat(data.rincian_biaya[j].biaya_obat > 0 ? data.rincian_biaya[j].biaya_obat:0)
              html+=data.rincian_biaya[j].biaya_obat;
            }

            html+=`</td>
            <td  class="text-center">`;
          
             if (data.rincian_biaya[j].jasa_dokter!==null) {
              subtotal+=parseFloat(data.rincian_biaya[j].jasa_dokter > 0 ? data.rincian_biaya[j].jasa_dokter:0);

              html+=data.rincian_biaya[j].jasa_dokter;
            }

           html+=`</td>
            <td  class="text-center">`;
            if (data.rincian_biaya[j].jumlah_lab!==null) {
              subtotal+=parseFloat(data.rincian_biaya[j].jumlah_lab > 0 ? data.rincian_biaya[j].jumlah_lab:0);
              html+=data.rincian_biaya[j].jumlah_lab;
            }
            html+=`</td>
            <td  class="text-center">`+subtotal+`</td>
            </tr>`;

              total_akhir+=subtotal;
          }
          html+=`
          <tr>
          <th colspan="5"  class="text-right fw-bold">Total Biaya</th>
          <th  class="text-right fw-bold">Rp. `+total_akhir+`,-</th>
          </tr>

          </tbody>
          </table>`
        }

        $('#ModalBiaya').modal('show');
        $('.list_biaya').html(html);


      }
    });
    // list_biaya

    return false;

  });


  $('#show_data1').on('click','.item_list_observasi', function(){
    var kode_homecare = $(this).attr('data');
    let level = '<?php echo  $this->session->level; ?>';
    $.ajax({
      type : "GET",
      url  : "<?php echo base_url('homecare/list_observasi')?>",
      dataType : "JSON",
      data : {kode_homecare: kode_homecare},
      success: function(data){
        let html='<div class="table-responsive list_observasihomecare" data="DESC" subject="kode_homecare">'+
        '<table  id="tabel_list_observasi"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">'+
        '<thead><tr style="background: #03b509 ;text-align: left; color:white">'+
        '<th data-urut="kode_homecare">No</th>'+
        '<th data-urut="no_registrasi">Tanggal<br>Pemeriksaan</th>'+ 
        '<th data-urut="nama_pasien">Jam<br>Pemeriksaan</th>'+  
        '<th width="10%" data-urut="status_pasien">Status Pemberian Obat</th>'+ 
        '<th style="text-align: center;" data-urut="kode_homecare">Option</th>'+
        '</tr>'+
        '</thead>'+
        '<tbody id="show_data_observasi">';

        for (var i = 0; i < data.length; i++) {
          html+='<tr>'+
          '<td>'+(i+1)+'</td>'+
          '<td>'+data[i].tanggal_pemeriksaan+'</td>'+
          '<td>'+data[i].jam_pemeriksaan+'</td>'+
          '<td>'+data[i].status_pemberian_obat+'</td>'+
          '<td><div class="btn-group"><a href="javascript:;" class="btn btn-success btn-flat btn-sm item_detail_observasi" style="font-weight: bold;"  data-status="'+data[i].status_pemberian_obat+'"  data-observasi="'+data[i].kode_observasi+'" data-homecare="'+data[i].kode_homecare+'"><i class="fa fa-eye"></i></a></div></td>'+
          '</tr>';
        }

        html+='</tbody></table></div>';
        $('#ModalObservasi').modal('show');
        $('.judul_kode_homecare').html('<i class="fas fa-task mr-2"></i>LIST OBSERVASI Rawat Jalan : '+kode_homecare);
        $('.list_observasi').html(html);
        $('.detail_list_observasi').css('display','none');

      }
    });
    return false;

  });

  $('#ModalObservasi').on('click','.item_hapus_observasi', function(){
    var kode_observasi = $(this).data('observasi');
    var kode_homecare = $(this).data('homecare');
    $('#ModalObservasi').modal('hide');
    $('#ModalHapusObservasi').modal('show');
    $('#kode_observasi_hapus').val(kode_observasi);
    $('#kode_homecare_hapus_observasi').val(kode_homecare);

    return false;
  });

  $('#ModalObservasi').on('click','.item_detail_observasi', function(){
    var kode_observasi = $(this).data('observasi');
    var kode_homecare = $(this).data('homecare');
    var status = $(this).data('status');

    $('#ModalObservasi .item_detail_observasi').each(function(){
      let kode = $(this).data('observasi');
      if (kode==kode_observasi) {
        $(this).parent().parent().parent().css('background','#f3e7ae');
      }else{
        $(this).parent().parent().parent().css('background','');

      }

    });
    $.ajax({
      type : "GET",
      url  : "<?php echo base_url('homecare/detail_observasi')?>",
      dataType : "JSON",
      data : {'kode_observasi': kode_observasi,'kode_homecare': kode_homecare},
      success: function(data){
        let html='<div class="table-responsive detail_observasihomecare" data="DESC" subject="kode_homecare">'+

        '<table  id="tabel_detail_observasi" class=""><tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">'+
        '<td style="height:40px;font-weight:bold;text-align: center;" colspan="6">&nbsp;&nbsp;&nbsp;Detail Pemberian Obat Obat</td>'+ 
        '</tr>'+
        '<tr class="pemisah"><td colspan="2"></td><td></td><td colspan="2"></td></tr>'+
        '<tr>'+
      
        '<tr><th  class="judul1" colspan="2">Nama Obat</th>'+
        '<th  class="judul1 text-center" colspan="2">Aturan Pakai</th>'+
        '<th  class="judul1 text-center">Qty</th>'+
        '<th  class="judul1 text-center">Tanggal Expired</th></tr>';
        for (var i = 0; i < data.obat.length; i++) {

          html+='<tr><td  class="isi1" colspan="2">'+data.obat[i].nama_obat+'</td>'+
          '<td  class="isi1 text-center" colspan="2">'+data.obat[i].aturan_pakai+'</td>'+
          '<td  class="isi1 text-center">'+data.obat[i].qty+'</td>'+
          '<td  class="isi1 text-center">'+data.obat[i].tanggal_expired+'</td></tr>';

        }
        html+='<tr class="pemisah"><td colspan="3"></td><td ></td><td colspan="3"></td></tr>';
        if (status=="Belum Diberikan") {
        html+='<td colspan="6" class="text-right"><a href="<?php echo base_url(); ?>homecare/update_pemberian_obat/'+kode_observasi+'" class="btn btn-primary btn-sm">Sudah Diberikan</a></td>'+ 
        '</tr>';
        }
        html+='</tbody></table></div>';
        $('.detail_list_observasi').html(html);
        $('.detail_list_observasi').css('display','inline-block');
      }
    });
return false;

});

$('#show_data').on('click','.item_hapus', function(){
  var kode_homecare =$(this).attr('data');

  $('#ModalHapus').modal('show');
  $('#kode_homecare_hapus').val(kode_homecare);

  return false;

});

$('#show_data2').on('click','.item_hapus', function(){
  var kode_homecare =$(this).attr('data');

  $('#ModalHapus').modal('show');
  $('#kode_homecare_hapus').val(kode_homecare);

  return false;

});



$('#show_data1').on('click','.item_hapus', function(){
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

$('#btn_hapus_observasi').on('click',function(){
  var kode_observasi=$('#kode_observasi_hapus').val();
  var kode_homecare=$('#kode_homecare_hapus_observasi').val();

  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('homecare/hapus_observasi')?>",
    dataType : "JSON",
    data : {'kode_observasi': kode_observasi,'kode_homecare': kode_homecare},
    success: function(data){
      $('#ModalHapusObservasi').modal('hide');
      location.reload();
    }
  });
  return false;


}); 





</script>













