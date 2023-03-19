<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">LIST TAGIHAN PASIEN</h4>
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
            <a href="#">Tagihan Pasien</a>
          </li>
        </ul>
      </div>

      <style type="text/css">
        .input-group-text{
          background:#03b509;
          color: white; 
          font-size: 15px;
          font-weight: bold;
        }
        
      </style>
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
                 <button  class=" btn btn-sm refresh" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button> 

                 <a href="<?php echo base_url('pasien/laporan_tagihan')?>" id="btn_draft" class="btn btn-success btn-sm mr-1" target="_blank"><i class="fas fa-receipt mr-2"></i>  Tarik Data Tagihan</a>

               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }

                
              </script>


            </div>





            <!-- /.card-header -->
            <div class="card-body col-md-12">
              <div  class="table-responsive">

                <table  id="tabel_tagihan"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                  <thead>
                    <tr style="background: #03b509 ;text-align: left; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th>
                      <th>Kode Pasien</th>  
                      <th >Nama Pasien</th>
                      <th >Alamat</th>     
                      <th >Sisa Tagihan</th>    
                      <th style="text-align: center;" >Option</th> 


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






          </div> 
        </section> 
      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="ModalUpdateStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fas fa-wallet mr-2"></i> UPDATE&nbsp;TAGIHAN PASIEN</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

      </div>
      <form class="form-horizontal">
        <div class="modal-body" >
          <div class="row">   
            <input type="hidden" class="form-control" id="kode_pasien" name="kode_pasien"> 

            <div class="input-group col-md-6 mb-3"> 
              <span class="input-group-text" id="basic-addon3">Jumlah Tagihan</span>
              <input type="text" class="form-control" id="kredit" name="kredit" style="font-size: 20px; font-weight: bold " onkeydown="return false"> 
            </div> 
            <div class="input-group col-md-6 mb-3"> 
              <span class="input-group-text lbl_tagihan" id="basic-addon3">Sisa Tagihan</span>
              <input type="text" class="form-control bg-danger text-light" id="sisa_tagihan" name="sisa_tagihan" style="font-size: 20px; font-weight: bold " onkeydown="return false"> 
            </div> 
            <div class="input-group col-md-12 mb-3 no-hover"> 
              <span class="input-group-text" id="basic-addon3">Tagihan Dibayarkan</span>
              <input type="text" class="form-control" id="dibayarkan" name="dibayarkan" value="0" onfocusout="SeparatorRibuan(this.value,this.id)" onkeyup="hitungtagihan()" style="font-size: 20px; font-weight: bold "> 
              <button href="#" id="bayarsemua" class="btn btn-sm btn-primary no-hover" style="padding-top: 15px">All</button>
            </div>
            <div class="col-md-12">
              <hr>
              <p class="text-center">Keterangan Pembayaran</p>
              <hr>
            </div>
            <div class="input-group col-md-6 mb-3"> 
              <span class="input-group-text lbl_dibayaroleh" id="basic-addon3">Dibayar Oleh</span>
              <input type="text" class="form-control" id="user_pembayaran" name="user_pembayaran" style="font-weight: bold "> 

            </div> 
            <div class="input-group col-md-6 mb-3"> 
              <span class="input-group-text lbl_tagihan" id="basic-addon3">Kembalian</span>
              <input type="text" class="form-control bg-danger text-light" id="kembalian" name="kembalian" style="font-size: 20px; font-weight: bold " onkeydown="return false"> 
            </div> 
            <div class="input-group col-md-12 mb-3 no-hover"> 
              <span class="input-group-text" id="basic-addon3">Tunai</span>
              <input type="text" class="form-control" id="uang_tunai" name="uang_tunai" value="0" onfocusout="SeparatorRibuan(this.value,this.id)" onkeyup="hitungkembalian()" style="font-size: 20px; font-weight: bold "> 
              <button href="#" id="uangpas" class="btn btn-sm btn-primary no-hover" style="padding-top: 15px">Uang Pas</button>
            </div>
          </div>   
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
          <button class="btn btn-success btn-flat" id="btn_update_tagihan"><i class="fas fa-wrench mr-2"></i>Update</button>
        </div>
      </form>
    </div>
  </div>
</div>




 <div class="modal fade" id="ModalHistoryTagihan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fas fa-wallet mr-2"></i>HISTORY TAGIHAN PASIEN</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
          </div>
          <form class="form-horizontal">
            <div class="modal-body" >
              <div class="form-group row">
                <div class="col-md-2 col-2 mb-1"> 
                  <span class="fw-bold">Kode Pasien</span>
                </div> 
              
                <div class="col-md-10 col-10 mb-1"> 
                  <span class="kode_pasien"></span>
                </div> 
              </div>

              <div class="form-group row">
                <div class="col-md-2 col-2 mb-1"> 
                  <span class="fw-bold">Nama Pasien</span>
                </div> 
                <div class="col-md-10 col-10 mb-1"> 
                  <span class="nama_pasien"></span>
                </div> 
              </div>
             
             <div class="card" >

               <div class="row">
                <div class="col-md-12 col-12 mb-1"> 
                  <table class="table w-100 table-hover table-striped table-bordered">
                    <thead>
                    <tr style="background: #03b509; color: white; ">
                      <th width="18%">Tanggal</th>
                      <th>Awal</th>
                      <th>Masuk</th>
                      <th>Dibayar</th>
                      <th>Sisa</th>
                      <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody id="show_tagihan">
                      
                    </tbody>
                  </table>
                </div> 
               
              </div>
             </div>

              

            </div>
          </form>
        </div>
      </div>
    </div>


<script type="text/javascript">

  $(document).ready(function(){

    dataTable = $('#tabel_tagihan').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('pasien/tabel_tagihan')?>',
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
     {'data':'kode_pasien'},
     {'data':'nama_pasien'},
     {'data':'alamat'},
     {'data':'kredit'},
     {'data':'opsi',orderable:false},
     ],   
     columnDefs: [
     {
      targets: [0,1,-1],
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


  $('#bayarsemua').on('click',function(e){
    e.preventDefault();
    let kredit =parseFloat($('#kredit').val().toString().replace(/\./g,''));
    let sisa = 0;
    SeparatorRibuan(kredit.toString(),'dibayarkan');  
    $('#sisa_tagihan').val(0);
    hitungkembalian();
  });
  $('#uangpas').on('click',function(e){
    e.preventDefault();
    $('#uang_tunai').val($('#dibayarkan').val());
    $('#kembalian').val(0);
  });
  $('#btn_tarik_laporan_tagihan').on('click',function(){

    let bytanggal=$('#bytanggal').prop('checked');
    let by_hari_ini=$('#by_hari_ini').prop('checked');

    let tanggal_awal='';
    let tanggal_akhir='';

    if (by_hari_ini==true) {
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      if (month < 10) month = "0" + month;      
      if (day < 10) day = "0" + day;
      tanggal_awal=year + "-" + month + "-" + day;
      tanggal_akhir=year + "-" + month + "-" + day;


    }else{
      tanggal_awal=$('#tanggal_awal').val();
      tanggal_akhir=$('#tanggal_akhir').val();
    }

    if (tanggal_awal=='') {
      alert('Tanggal Awal Tidak Boleh Kosong');
      return false
    }

    if (tanggal_akhir=='') {
      alert('Tanggal Akhir Tidak Boleh Kosong');
      return false
    }

    if (tanggal_akhir<tanggal_awal) {
      alert('Tanggal Akhir Harus Lebih Besar dari Tanggal Awal');
      return false
    }

    window.location.href='<?php echo base_url()?>pasien/laporan_tagihan_bytanggal/'+tanggal_awal+'/'+tanggal_akhir;


    

  });



  $('#bytanggal').click(function(){
    if (this.checked==true) {
      $('.tgl').css('display','block');
      $('#by_hari_ini').prop('checked',false); 
    }else{
      $('.tgl').css('display','none'); 
    }

  })

  $('#by_hari_ini').click(function(){
    if (this.checked==true) {
      $('.tgl').css('display','none');
      $('#bytanggal').prop('checked',false);




    }
  })





$('#show_data').on('click','.detail_tagihan',function(){
    var kode_pasien=$(this).attr('data');
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>pasien/tampil_history_tagihan',
      data :{'kode_pasien':kode_pasien},
      dataType : 'json',
      success : function(data){
        $('#ModalHistoryTagihan').modal('show');
        $('.kode_pasien').html(': '+kode_pasien);
        $('.nama_pasien').html(': '+data.pasien[0].nama_pasien);
        let html='';
        console.log(data);
        for (var i = 0; i < data.tagihan.length; i++) {
          let tanggal = data.tagihan[i].tanggal_input.split(' ');
          let tgl = tanggal[0].split('-');

          html+=`<tr>
          <td>`+data.tagihan[i].tanggal_input+`</td>
          <td style="text-align:right">`;
          if (data.tagihan[i].tagihan_awal!=null) {html+=data.tagihan[i].tagihan_awal;
          }else{
            html+='';
          }

          html+=`</td><td style="text-align:right">`;

           if (data.tagihan[i].penambahan_tagihan!=null) {html+=data.tagihan[i].penambahan_tagihan;
          }else{
            html+='';
          }
           html+=`</td><td style="text-align:right">`;

           if (data.tagihan[i].tagihan_dibayarkan!=null) {html+=data.tagihan[i].tagihan_dibayarkan;
          }else{
            html+='';
          }
           html+=`</td><td style="text-align:right">`;

            if (data.tagihan[i].sisa_tagihan!=null) {html+=data.tagihan[i].sisa_tagihan;
          }else{
            html+='';
          }

           html+=`</td><td>`+data.tagihan[i].keterangan+`</td>
          </tr>
          `
            
        }

        $('#show_tagihan').html(html);
        // for (var i = 0; i <data.length; i++) {
        //   $('.kode_pasien').html(data[i].kode_pasien);
        //   $('.nama_pasien').html(data[i].nama_pasien); 
        //   $('.keterangan').html(data[i].keterangan); 
        // }

      },
    });
    return false;
  }); 




  function SeparatorRibuan(bilangan,id){
    let angka = bilangan.replace(/\./g,'');
    let sisa  = angka.length % 3;
    awalan  = angka.substr(0, sisa);
    ribuan  = angka.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
      separator = sisa ? '.' : '';
      hasil = awalan + separator + ribuan.join('.');
      $('#'+id).val(hasil);


    }
  }

   //GET update
   $('#show_data').on('click','.update_tagihan',function(){
    var kode_pasien=$(this).attr('data');
    var sisa_tagihan=$(this).attr('subject');


    $('#ModalUpdateStatus').modal('show');
    $('#kode_pasien').val(kode_pasien); 
    SeparatorRibuan(sisa_tagihan.toString(),'kredit');  
    SeparatorRibuan(sisa_tagihan.toString(),'sisa_tagihan');   
  }); 


   function hitungtagihan() {
    let kredit= parseFloat($('#kredit').val().toString().replace(/\./g,''));
    let dibayarkan= parseFloat($('#dibayarkan').val().toString().replace(/\./g,''));
    let sisa;
    if (kredit==dibayarkan) {
      $('#sisa_tagihan').val(0);
    }
    if (kredit < dibayarkan) {
      alert('Jumlah Tagihan dibayarkan tidak boleh Lebih Besar dari '+ kredit);
      $('#dibayarkan').val(0);
      SeparatorRibuan(kredit.toString(),'sisa_tagihan');   
    }
    if (kredit > dibayarkan) {
      sisa = (kredit - dibayarkan);
      SeparatorRibuan(sisa.toString(),'sisa_tagihan');   
    }
    hitungkembalian();

  }

  function hitungkembalian() {
    let uang_tunai= parseFloat($('#uang_tunai').val().toString().replace(/\./g,''));
    let dibayarkan= parseFloat($('#dibayarkan').val().toString().replace(/\./g,''));
    let sisa;
    if (uang_tunai==0) {
      sisa =0;
      $('#kembalian').val(0);

    }else{
     if (uang_tunai==dibayarkan) {
      $('#kembalian').val(0);
    }else if(uang_tunai < dibayarkan) {

      sisa = (uang_tunai - dibayarkan);
      
      $('#kembalian').val(sisa);

    } else{
      sisa = (uang_tunai - dibayarkan);
      SeparatorRibuan(sisa.toString(),'kembalian');   
    }
  }
}



$('#btn_update_tagihan').on('click',function(){


  var kode_pasien=$('#kode_pasien').val();
  var tagihan_awal =parseFloat($('#kredit').val().toString().replace(/\./g,''));
  var sisa_tagihan =parseFloat($('#sisa_tagihan').val().toString().replace(/\./g,''));
  var tagihan_dibayarkan =parseFloat($('#dibayarkan').val().toString().replace(/\./g,''));
  var dibayarkan_oleh =$('#user_pembayaran').val();
  var tunai =parseFloat($('#uang_tunai').val().toString().replace(/\./g,''));
  var kembalian =parseFloat($('#kembalian').val().toString().replace(/\./g,''));
  if (tagihan_dibayarkan==0) {
    alert("Jumlah Pembayaran Tagihan Kosong!");
    $('#dibayarkan').focus();
    return false;
  }
  if (dibayarkan_oleh=="") {
    alert("Nama Pembayar Kosong!");
    $('#user_pembayaran').focus();
    return false;
  }

  if (tunai < tagihan_dibayarkan) {
    alert("Uang Tunai Kurang!");
    $('#uang_tunai').focus();
    return false;
  }
  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('pasien/update_tagihan')?>",
    dataType : "JSON",
    data : {'kode_pasien': kode_pasien,'tagihan_awal': tagihan_awal,'sisa_tagihan': sisa_tagihan,'tagihan_dibayarkan': tagihan_dibayarkan,'dibayarkan_oleh': dibayarkan_oleh,'tunai': tunai,'kembalian': kembalian},
    success: function(data){
      alert(data);
      $('#ModalUpdateStatus').modal('hide');
      window.location.href="<?php echo  base_url('pasien/pembayaran_tagihan'); ?>";
    }
  });
  return false;


}); 



$('#bytanggal').click(function(){
  if (this.checked==true) {
    $('.tgl').css('display','block');
    $('.nama').css('display','none');
    $('.status_laporan').css('display','block');
    $('.laporan_kas').css('display','block'); 
    $('.departemen').css('display','none');
    $('#bynama').prop('checked',false);
    $('#bydepartemen').prop('checked',false);
    $('#by_hari_ini').prop('checked',false);



  }else{
    $('.tgl').css('display','none');
    $('.status_laporan').css('display','none');       
    $('.laporan_kas').css('display','none'); 


  }

})

$('#bynama').click(function(){
  if (this.checked==true) {
    $('.nama').css('display','block');
    $('.tgl').css('display','block');
    $('.status_laporan').css('display','block');
    $('.laporan_kas').css('display','block'); 

    $('.departemen').css('display','none');
    $('#bytanggal').prop('checked',false);
    $('#bydepartemen').prop('checked',false);
    $('#by_hari_ini').prop('checked',false);






  }else{
    $('.nama').css('display','none');
    $('.tgl').css('display','none');
    $('.status_laporan').css('display','none');       

    $('.laporan_kas').css('display','none');        

  }
})

$('#bydepartemen').click(function(){
  if (this.checked==true) {
    $('.departemen').css('display','block');
    $('.tgl').css('display','block');
    $('.laporan_kas').css('display','block');
    $('.status_laporan').css('display','block');        

    $('.nama').css('display','none');
    $('#bytanggal').prop('checked',false);
    $('#bynama').prop('checked',false);
    $('#by_hari_ini').prop('checked',false);


  }else{
    $('.departemen').css('display','none');
    $('.tgl').css('display','none');
    $('.status_laporan').css('display','none');    
    $('.laporan_kas').css('display','none');        



  }
})

$('#by_hari_ini').click(function(){
  if (this.checked==true) {
    $('.status_laporan').css('display','block');
    $('.laporan_kas').css('display','block');
    $('.departemen').css('display','none');
    $('.tgl').css('display','none');
    $('.nama').css('display','none');
    $('#bytanggal').prop('checked',false);
    $('#bynama').prop('checked',false);
    $('#bydepartemen').prop('checked',false);




  }else{        
    $('.status_laporan').css('display','none');
    $('.laporan_kas').css('display','none');        



  }
})







</script>













