<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">DATA PEMBAYARAN TAGIHAN</h4>
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
            <a href="#">Pembayaran Tagihan</a>
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
      <script src="<?php echo base_url() ?>assets/js/html2canvas.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/zip-full.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/JSPrintManager.js"></script>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12">  
                 <button  name="export"  class=" btn btn-sm refresh" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button> 

                 <a href="#" id="btn_draft" class="btn btn-success btn-sm mr-1" onclick="tarikdatabytanggal('DRAFT')"><i class="fas fa-receipt mr-2"></i>  Tarik Data Tagihan</a>

               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }

                function tarikdatabytanggal(pasien){
                  let data = pasien.toLowerCase();

                  $('#ModalLaporan').modal('show');
                  $('#judul_laporan').html('<i class="fas fa-receipt mr-2"></i>'+pasien+" REPORT");
                  $('#btn_tarik_laporan').attr('data',data);
                }
              </script>
            </div>


            <!-- /.card-header -->
            <div class="card-body col-md-12">
              <div  class="table-responsive tabel_tagihan_pembayaran">

                <table  data-filterdata="DESC" data-subject="kode_tagihan" id="tabel_pembayaran_tagihan"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                  <thead class="bg-success text-light text-center">
                    <tr>
                      <th>No</th>
                      <th>Kode Tagihan</th>  
                      <th>Nama Pasien</th>
                      <th>Tanggal Pembayaran</th>
                      <th>Tagihan Awal</th>     
                      <th>Tagihan Dibayarkan</th>    
                      <th>Sisa Tagihan</th>    
                      <th>Dibayarkan Oleh</th>
                      <th>Opsi</th> 
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

                      <input type="hidden" name="kode_pembayaran_tagihan" id="kode_pembayaran_tagihan" value="">  
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


<div class="modal fade" id="ModalLaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN IZIN</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <div class="row"> 
            <div class="col-md-12 cheklist" >

              <div class="checkbox">
                <label style="margin:5px" ><input type="checkbox" id="bytanggal" value="" style="margin:5px">By Tanggal</label>
                <label style="margin:5px" ><input type="checkbox" id="by_hari_ini" value="" style="margin:5px">Hari Ini</label>               

              </div>
              
            </div> 
            <div class="col-md-12 tgl mt-5" style="display:none">
              <div class="input-group mb-3"> 
                <span class="input-group-text" id="basic-addon3" >Tanggal Awal</span>
                <input type="date" class="form-control"  id="tanggal_awal" >
              </div> 
            </div> 
            <div class="col-md-12 tgl" style="display:none">
              <div class="input-group mb-3"> 
                <span class="input-group-text" id="basic-addon3">Tanggal Akhir</span>
                <input type="date" class="form-control"  id="tanggal_akhir" >
              </div> 
            </div> 
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
          <button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporan"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form class="form-horizontal">
        <div class="modal-body" >
          <div class=" row cetakan justify-content-center">
            <style type="text/css">
              * {  
                font-family: 'Arial';
                font-size: 13px;
              }
              td,
              th,
              tr,
              table {
                border-top: 1px solid black; 
                border-collapse: collapse;
              }  
              .centered {
                text-align: center;
                align-content: center;
                margin-left: 2px;
              }

              .ticket {
                width: 260px;
                max-width: 260px;
                margin-left:0px;
                margin-right: 5px;
              }

              img {
               max-width: 300px;
               height: 50px;
               margin-left: 55px;
             }
             @media print {
               html,body,.modal,.main-panel, #ModalCetak,.modal-dialog,.modal-content{
                padding:0;
                margin: 0;
              }
              
              *{
                color:black !important;
              }

              .footer,.sidebar,.main-header,.main-panel,.modal-header,.modal-footer,.wrapper{
                display: none;
              }
              .cetakan{
                display: inline-block;
                position: fixed;
                top:10;
                left:30px;
              }
              .hidden-print,
              .hidden-print * {
                display: none !important;
              }
            }

            .judul{
              text-align: left;
              padding-left: 100px;
              font-size: 20px;
            }
          </style>
        </head>
        <body>
          <div class="ticket">

            <a href="<?php echo site_url('dashboard'); ?>" class="logo" >
              <img src="<?php echo base_url().$this->session->logo_thermal ?>" class="mr-2"style="width: 150px;height:150px;margin-left: 55px">
            </a>
            <P style="font-size:14px; text-align: center;  margin-left: 2px;"> BUKTI PEMBAYARAN <br>
              <span class="print_kode_pembayaran_tagihan">koderekam</span><br></p>
              <span class="kamu" style="font-size: 13px; margin-right: 41px;" >TANGGAL</span>
              <span>:</span>
              <span style="font-size: 13px; " class="print_tanggal_bayar_tagihan"></span><br> 

              <span class="kamu" style="font-size: 13px; margin-right: 15px;" >KODE PASIEN</span>
              <span>:</span>
              <span style="font-size: 13px; " class="print_kode_pasien"></span><br> 

              <span class="kamu" style="font-size: 13px;margin-right: 51px;">NO.REG</span>
              <span>:</span>
              <span style="font-size: 13px; " class="print_no_registrasi"></span><br> 
              <span class="kamu" style="font-size: 13px;margin-right: 15px">NAMA PASIEN</span>
              <span>:</span>
              <span style="font-size: 13px; " class="print_nama_pasien"></span><br> 
              <br>
              <p class="centered" style="font-weight: bold;">RINCIAN PEMBAYARAN</p>
              <table width="100%">
                <tbody>
                  <tr>
                    <td style=" font-size:13px;font-weight: bold;" colspan="2">Tagihan Awal</td>
                    <td></td>
                    <td style="text-align: right;font-size:13px;font-weight: bold;" class="print_tagihan_awal"></td>
                  </tr>
                  <tr>
                    <td style=" font-size:13px;font-weight: bold;" colspan="2">DiBayarkan</td>
                    <td></td>
                    <td style="text-align: right;font-size:13px;font-weight: bold;" class="print_tagihan_dibayarkan"></td>
                  </tr>
                  <tr>
                    <td style=" font-size:13px;font-weight: bold;" colspan="2">Sisa Tagihan</td>
                    <td></td>
                    <td style="text-align: right;font-size:13px;font-weight: bold;" class="print_sisa_tagihan"></td>
                  </tr>
                  <tr> 
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                  </tr>
                  <tr> 
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                  </tr>
                  <tr>
                    <td style=" font-size:13px;font-weight: bold;" colspan="2">Dibayar Oleh</td>
                    <td></td>
                    <td style="text-align: right;font-size:13px;font-weight: bold;" class="print_dibayarkan_oleh"></td>
                  </tr>
                  <tr>
                    <td style=" font-size:13px;font-weight: bold;">Tunai</td>
                    <td></td>
                    <td style="text-align: right;font-size:13px;font-weight: bold;" class="print_tunai" colspan="2"></td>

                  </tr> 

                  <tr>
                    <td style=" font-size:13px;font-weight: bold;">Kembalian</td>
                    <td></td>
                    <td style="text-align: right;font-size:13px;font-weight: bold;" class="print_kembalian" colspan="2"></td>

                  </tr> 
                </tbody>
              </table>
              <hr style="border-top: 1px dashed black;">
              <p style="font-size: 10px; text-align: center; ">Jl. Pasir Beureum, Desa Jagabaya, Kec. Parungpanjang</p>
              <p style="text-align: center; font-size: 11px;">Struk ini adalah bukti pembayaran yang sah</p>
              <p style="text-align: center; font-size: 11px;font-weight: bold; margin-bottom: 50px">MOHON DI SIMPAN</p>
              <br>
              <br>
              <br>
            </div>
            <br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm" id="btnPrint" onclick="print();">Cetak</button>
          <button type="button" class="btn btn-danger btn-sm" id="btnPrint" data-dismiss="modal">Batal</button>

        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
    
    dataTable = $('#tabel_pembayaran_tagihan').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,
      searchDelay: 800,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('pasien/tabel_pembayaran_tagihan')?>',
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
     {'data':'kode_pembayaran_tagihan'},
     {'data':'nama_pasien'},
     {'data':'tanggal_bayar_tagihan'},
     {'data':'tagihan_awal'},
     {'data':'tagihan_dibayarkan'},               
     {'data':'sisa_tagihan'},
     {'data':'dibayarkan_oleh'},
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,3,-1],
      className: 'dt-center'
    },
    ]

});


    function table_data(){
     dataTable.ajax.reload(null,true);
   }

 
   $(".refresh").click(function(){
     table_data();
   });




});

</script>
</script>


<div class="modal fade" id="ModalUpdateStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fas fa-wallet mr-2"></i>DETAIL PEMBAYARAN TAGIHAN</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
      </div>
      <form class="form-horizontal">
        <div class="modal-body" >
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Kode Pembayaran</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="kode_pembayaran_tagihan"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Nama Pasien</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="nama_pasien"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Tanggal Pembayaran</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="tanggal_bayar_tagihan"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Tagihan Awal</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="tagihan_awal"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Tagihan Dibayarkan</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="tagihan_dibayarkan"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Sisa Tagihan</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="sisa_tagihan"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Dibayarkan Oleh</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="dibayarkan_oleh"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Uang Tunai</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="tunai"></span>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Kembalian</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="kembalian"></span>
            </div> 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
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
  $('#btn_tarik_laporan').on('click',function(){

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

    window.location.href='<?php echo base_url()?>pasien/laporan_bytanggal/'+tanggal_awal+'/'+tanggal_akhir;




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




  // function tampil_data(){
  //   $.ajax({
  //     type  : 'GET',
  //     url   : '<?php echo base_url()?>pasien/tampil_data_pembayaran_tagihan',
  //     // async : true,
  //     dataType : 'json',
  //     success : function(data){
  //       var html = '';
  //       var i;
  //       var no=1;
  //       for(i=0; i<data.length; i++){
  //        html += '<tr>'+
  //        '<td style="text-align:center">'+no+'</td>'+ 
  //        '<td style="text-align:left">'+data[i].kode_pembayaran_tagihan+'</td>'+ 
  //        '<td style="text-align:left">'+data[i].nama_pasien+'</td>'+
  //        '<td style="text-align:left">'+data[i].tanggal_bayar_tagihan+'</td>'+    
  //        '<td style="text-align:left">'+data[i].tagihan_awal+'</td>'+  
  //        '<td style="text-align:left">'+data[i].tagihan_dibayarkan+'</td>'+    
  //        '<td style="text-align:left">'+data[i].sisa_tagihan+'</td>'+    
  //        '<td style="text-align:left">'+data[i].dibayarkan_oleh+'</td>'+    

  //        '<td style="text-align:left"><div class="btn-group">'+ 
  //        '<a href="javascript:;" class="btn btn-success btn-sm  btn-flat lihat_pembayaran_tagihan "style="font-weight: bold;" data="'+data[i].kode_tagihan+'" ><i class="fas fa-eye mr-1"></i></a>'+ 

  //        '<a href="javascript:;" class="btn btn-secondary btn-sm  btn-flat cetak_pembayaran_tagihan "style="font-weight: bold;" data="'+data[i].kode_tagihan+'"><i class="fas fa-print mr-1"></i> Cetak</a>'+
  //        '</td>'+ 
  //        '</td>'+ 
  //        '</div></tr>';
  //        no++;
  //      }
  //      $('#show_data').html(html);
  //      set();
  //    }

  //  });
  // }

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
  function SeparatorRibuanClass(bilangan,id){
    let angka = bilangan.replace(/\./g,'');
    let sisa  = angka.length % 3;
    awalan  = angka.substr(0, sisa);
    ribuan  = angka.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
      separator = sisa ? '.' : '';
      hasil = awalan + separator + ribuan.join('.');
      $('.'+id).html(hasil);
    }
  }
   //GET update
   $('#show_data').on('click','.lihat_pembayaran_tagihan',function(){
    var kode_pembayaran_tagihan=$(this).attr('data');
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>pasien/tampil_data_pembayaran_tagihan_bykode',
      data :{'kode_pembayaran_tagihan':kode_pembayaran_tagihan},
      dataType : 'json',
      success : function(data){
        $('#ModalUpdateStatus').modal('show');
        for (var i = 0; i <data.length; i++) {
          $('.kode_pembayaran_tagihan').html(data[i].kode_pembayaran_tagihan);
          $('.nama_pasien').html(data[i].nama_pasien);
          $('.tanggal_bayar_tagihan').html(data[i].tanggal_bayar_tagihan);
          $('.tagihan_awal').html(data[i].tagihan_awal);
          $('.tagihan_dibayarkan').html(data[i].tagihan_dibayarkan);
          $('.sisa_tagihan').html(data[i].sisa_tagihan);
          $('.dibayarkan_oleh').html(data[i].dibayarkan_oleh);
          $('.tunai').html(data[i].tunai);
          $('.kembalian').html(data[i].kembalian);
        }

      },
    });
    return false;
  }); 

   
   $('#show_data').on('click','.cetak_pembayaran_tagihan',function(){
    var kode_pembayaran_tagihan=$(this).attr('data');
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>pasien/tampil_data_pembayaran_tagihan_bykode',
      data :{'kode_pembayaran_tagihan':kode_pembayaran_tagihan},
      dataType : 'json',
      success : function(data){
        $('#ModalCetak').modal('show');
        for (var i = 0; i <data.length; i++) {
          $('.print_kode_pembayaran_tagihan').html(data[i].kode_pembayaran_tagihan);
          let tanggal = data[i].tanggal_bayar_tagihan.split('-');
          let month = parseInt(tanggal[1])-1;
          let bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
          $('.print_nama_pasien').html(data[i].nama_pasien.toUpperCase());
          $('.print_tanggal_bayar_tagihan').html(tanggal[2]+" "+bulan[month]+" "+tanggal[0]);
          $('.print_kode_pasien').html(data[i].kode_pasien);
          $('.print_no_registrasi').html(data[i].no_registrasi);
          SeparatorRibuanClass(data[i].tagihan_awal,'print_tagihan_awal');
          SeparatorRibuanClass(data[i].tagihan_dibayarkan,'print_tagihan_dibayarkan');
          if (data[i].sisa_tagihan > 0) {
            SeparatorRibuanClass(data[i].sisa_tagihan,'print_sisa_tagihan'); 
          }else{
            $('.print_sisa_tagihan').html(data[i].sisa_tagihan);
          }
          if (data[i].kembalian > 0) {
            SeparatorRibuanClass(data[i].kembalian,'print_kembalian'); 
          }else{
            $('.print_kembalian').html(data[i].kembalian);
          }

          $('.print_dibayarkan_oleh').html(data[i].dibayarkan_oleh);
          SeparatorRibuanClass(data[i].tunai,'print_tunai');
        }

      },
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













