<div class="main-panel">
  <style type="text/css">
    .signature-pad {
      border: 1px solid #03b509;
      border-radius: 3%
    }

    .signature-pad1 {
      border: 1px solid #03b509;
      border-radius: 3%
    }

    .signature-pad2 {
      border: 1px solid #03b509;
      border-radius: 3%
    }

    #hapus_sign0{
      position: absolute;
      top:80%;
      left:20%;
    }

    #hapus_sign1{
      position: absolute;
      top:80%;
      left:20%;
    }

    #hapus_sign2{
      position: absolute;
      top:80%;
      left:20%;
    }
  </style>
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN REKAM MEDIK PASIEN</h4>
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
            <a href="#">Rekam Medik</a>
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
                 <h2 style="font-weight: bold">LIST DIAGNOSIS PASIEN</h2>

               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }
              </script>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">

                <table  id="tabel_umum_belum_periksa"  class="table table-striped table-bordered  ">
                  <thead>
                    <tr style="background: #03b509 ;text-align: center; color:white">
                      <!-- <td>Kode</td> -->
                      <th width="5%">No</th>
                      <th>Kode Pendaftaran</th> 
                      <th>Nama Pasien</th>  
                      <th>Tgl Berobat</th>  
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
              <div class="table-responsive " >
                <table  id="tabel_umum_sudah_periksa" class="table table-striped table-bordered ">
                  <thead>
                    <tr style="background: #699e00 ;text-align: center; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th>
                      <th>Kode Rekam</th> 
                      <th>Nama Pasien</th>                  
                      <th>Dokter Pemeriksa</th>  
                      <th>Tanggal di Periksa</th>  
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

                      <input type="hidden" name="kode_rekam" id="kode_rekam" value="">  
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


            <div class="modal fade" id="ModalRujuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-success-gradient">
                    <h4 class="modal-title" id="myModalLabel" ><i class="fas fa-exchange-alt mr-2"></i> Rujuk Pasien Sdr. <span name="nama_pasien_rujuk" id="nama_pasien_rujuk" class="fw-bold"></span></h4>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

                  </div>
                  <form class="form-horizontal" method="POST" action="<?php echo base_url('rekam/rujuk_pasien') ?>" id="form_rujuk">
                    <div class="modal-body">
                      <div class="row">
                        <input type="hidden" name="kode_rekam_rujuk" id="kode_rekam_rujuk" value="">  

                        <div class="col-md-4 mb-3"> 
                          <span class="input-group-text bg-success text-light" >Keluhan</span> 
                          <textarea type="text" class="form-control"  id="keluhan_pasien" name="keluhan_pasien"style="border-color: #03b509" ></textarea>
                        </div>
                        <div class="col-md-4 mb-3"> 
                          <span class="input-group-text bg-success text-light" >Diagnosa</span> 
                          <textarea type="text" class="form-control"  id="diagnosa_pasien" name="diagnosa_pasien"style="border-color: #03b509" ></textarea>
                        </div>
                        <div class="col-md-4 mb-3"> 
                          <span class="input-group-text bg-success text-light" >Terapi Yang Diberikan</span> 
                          <textarea type="text" class="form-control"  id="terapi_pasien" name="terapi_pasien"style="border-color: #03b509" ></textarea>
                        </div>
                        <div class="col-md-12 mb-3"> 
                          <span class="input-group-text bg-success text-light" >Jenis RUJUKAN</span> 
                          <select type="text" class="form-control"  id="jenis_rujukan" name="jenis_rujukan" style="border-color: #03b509">
                            <option value="0" disabled selected>Pilih Rujukan</option>
                            <option value="RS">RUMAH SAKIT</option>
                            <option value="RAWAT INAP">RAWAT INAP</option>
                            <option value="HOME CARE">HOME CARE</option>
                          </select>
                        </div>

                        <div class="col-md-12 mb-3 rujuk_rs d-none"> 
                          <span class="input-group-text bg-success text-light" >Nama RS</span> 
                          <input type="text" class="form-control"  id="nama_rs" name="nama_rs"style="border-color: #03b509" >
                        </div>
                        <div class="col-md-12 mb-3 rujuk_rs d-none"> 
                          <span class="input-group-text bg-success text-light" >Alamat RS</span> 
                          <textarea type="text" class="form-control"  id="alamat_rs" name="alamat_rs" style="border-color: #03b509" ></textarea>
                        </div>

                        <div class="col-md-12 mb-3 observasi disnon"> 
                          <span class="input-group-text labelkolom">Approval</span> 
                          <select type="text" rows="3" class="textarea_atas form-control isikolom" id="approval" name="approval"  required="required" > 
                            <option value="0" selected disabled>Pilih</option>  
                            <option value="KELUARGA">KELUARGA</option>  
                            <option value="DIRI SENDIRI">DIRI SENDIRI</option>  
                          </select>
                        </div>
                      </div>

                      <div class="row observasi disnon"> 
                        <div class="col-md-12 float-sm-right">
                          <h3 class="text-center"><b>DATA KELUARGA YANG BERSANGKUTAN</b></h3> 
                        </div> 
                        <br>
                        <div class="col-md-4 mb-3" id="nama_app"> 
                          <span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Nama</span> 
                          <input type="text" class="form-control form-control-md isikolom" id="nama_approval" name="nama_approval">
                        </div>

                        <div class="col-md-4 mb-3" id="umur_app"> 
                          <span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Umur</span> 
                          <input type="text" class="form-control form-control-md isikolom" id="umur_approval" name="umur_approval" >
                        </div>

                        <div class="col-md-4 mb-3" id="jk_app"> 
                          <span class="input-group-text labelkolom"><i class="fas fa-thermometer-three-quarters mr-1"></i>Jenis Kelamin</span> 
                          <select type="text" class="form-control  form-control-md isikolom " name="jenis_kelamin_approval" id="jenis_kelamin_approval"  >
                            <option value="0" selected> -- Pilih Jenis Kelamin--</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                        </div> 

                        <div class="col-md-4 mb-3" id="hubungan_app"> 
                          <span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>Hubungan Dengan Pasien</span> 
                          <select class="form-control " id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" >
                            <option value="0" selected disabled>--Select--</option>
                            <option value="Diri Saya Sendiri">Diri Saya Sendiri</option>
                            <option value="Istri">Istri</option>
                            <option value="Suami">Suami</option>
                            <option value="Anak">Anak</option>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option> 
                            <option value="Saudara Kandung">Saudara Kandung</option> 
                          </select>
                        </div>
                        <div class="col-md-4 mb-3" id="nik_app"> 
                          <span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>NIK</span> 
                          <input type="text" class="form-control form-control-md isikolom" id="nik_approval" name="nik_approval" >
                        </div>

                        <div class="col-md-4 mb-3" id="Ruang"> 
                          <span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Ruang Rawat</span> 
                          <input type="text" class="form-control form-control-md isikolom" id="ruang_rawat" name="ruang_rawat" >
                        </div>

                        <div class="col-md-4 mb-3" id="saksi1_app"> 
                          <span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Saksi 1</span> 
                          <input type="text" class="form-control form-control-md isikolom" id="nama_saksi1" name="nama_saksi1">
                        </div>

                        <div class="col-md-4 mb-3" id="saksi2_app"> 
                          <span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Saksi 2</span> 
                          <input type="text" class="form-control form-control-md isikolom" id="nama_saksi2" name="nama_saksi2"  >
                        </div>
                        <div class="col-md-4 mb-3" id="persetujuan_rawat"> 
                          <span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>Persetujuan Tindak Medis</span> 
                          <select class="form-control " id="persetujuan_rawat" name="persetujuan_rawat" >
                            <option value="0" selected disabled>--Select--</option>
                            <option value="menyetujui">menyetujui</option>
                            <option value="menolak">menolak</option>  
                          </select>
                        </div>


                        <div class="mb-3 col-md-4" id="ttd" style="position: relative"> 
                          <span class="input-group-text" style="background: #03b509;color :white;max-width:100%"> <i class="far fa-list-alt mr-1"></i> Saksi 1</span>
                          <canvas id="signature-pad" name="signature-pad" class="signature-pad" style="max-width:100%"></canvas>
                          <input type="hidden" name="isi_ttd0" id="isi_ttd0">
                          <button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign0"><i class="fas fa-eraser"></i></button>
                        </div> 

                        <div class="mb-3 col-md-4" id="ttd1" style="position: relative" > 
                          <span class="input-group-text" style="background: #03b509;color :white;max-width:100%"> <i class="far fa-list-alt mr-1"></i> Yang membuat Pernyataan</span>

                          <input type="hidden" name="isi_ttd1" id="isi_ttd1">
                          <canvas id="signature-pad1" name="signature-pad1" class="signature-pad1" style="max-width:100%"></canvas>
                          <button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign1"><i class="fas fa-eraser"></i></button>
                        </div> 

                        <div class="mb-3 col-md-4" id="ttd2"style="position: relative"> 
                          <span class="input-group-text" style="background: #03b509;color :white;max-width:100%"> <i class="far fa-list-alt mr-1"></i> Saksi 2</span>
                          <input type="hidden" name="isi_ttd2" id="isi_ttd2">
                          <canvas id="signature-pad2" name="signature-pad2" class="signature-pad2" style="max-width:100%"></canvas>
                          <button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign2"><i class="fas fa-eraser"></i></button>
                        </div>  
                      </div> 
                    </div>

                    <div class="modal-footer">

                      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle mr-2"></i>BATAL</button>
                      <button type="submit" class="btn_rujuk_pasien btn btn-success btn-flat" id="btn_rujuk_pasien"><i class="fas fa-exchange-alt mr-2"></i> RUJUK PASIEN</button>

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

  var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
  });

  signaturePad.onEnd = function(){
    let ttd = document.getElementById("signature-pad").toDataURL();
    if (!signaturePad.isEmpty()) {

      $('#isi_ttd0').val(ttd);

    }else{
      $('#isi_ttd0').val('');
    }

  };



  var signaturePad1 = new SignaturePad(document.getElementById('signature-pad1'), {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
  });

    signaturePad1.onEnd = function(){
    let ttd = document.getElementById("signature-pad1").toDataURL();
    if (!signaturePad1.isEmpty()) {

      $('#isi_ttd1').val(ttd);

    }else{
      $('#isi_ttd1').val('');
    }

  };



  var signaturePad2 = new SignaturePad(document.getElementById('signature-pad2'), {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
  });

    signaturePad2.onEnd = function(){
    let ttd = document.getElementById("signature-pad2").toDataURL();
    if (!signaturePad2.isEmpty()) {

      $('#isi_ttd2').val(ttd);

    }else{
      $('#isi_ttd2').val('');
    }

  };


  $('#hapus_sign0').on('click',function(){
    signaturePad.clear();
      $('#isi_ttd0').val('');

  });


  $('#hapus_sign1').on('click',function(){
    signaturePad1.clear();
      $('#isi_ttd1').val('');

  });


  $('#hapus_sign2').on('click',function(){
    signaturePad2.clear();
      $('#isi_ttd2').val('');


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

  $('#jenis_rujukan').on('change',function(){

    if($(this).val()=="RS")
    {
      $('.rujuk_rs').removeClass('d-none');
      $('.observasi').addClass('disnon');

    }else{
      $('.rujuk_rs').addClass('d-none');
      $('#nama_rs').val('');
      $('#alamat_rs').val('');
      $('.observasi').removeClass('disnon');

    }

  });


  $(document).ready(function(){ 

    
   dataTable = $('#tabel_umum_belum_periksa').DataTable( {
    paginationType:'full_numbers',
    processing: true,
    serverSide: true,
    searching: true,

    filter: false,
    autoWidth:false,
    aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    ajax: {
     url: '<?php echo base_url('rekam/tabel_umum_belum_periksa')?>',
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
    // order: [2, 'desc'],
    columns: [
    {'data':'no'},
    {'data':'no_registrasi'},
    {'data':'nama_pasien'},
    {'data':'tanggal_berobat'},
    {'data':'status_pasien',orderable:false},
    {'data':'opsi',orderable:false},

    ],   
    columnDefs: [
    {
      targets: [0,3,-1],
      className: 'dt-center'
    },
    ]




  });


   dataTable2 = $('#tabel_umum_sudah_periksa').DataTable( {
    paginationType:'full_numbers',
    processing: true,
    serverSide: true,
    searching: true,

    filter: false,
    autoWidth:false,
    aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    ajax: {
     url: '<?php echo base_url('rekam/tabel_umum_sudah_periksa')?>',
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
  {'data':'kode_rekam'},
  {'data':'nama_pasien'},
  {'data':'dokter_pemeriksa'},
  {'data':'tanggal_periksa'},
  {'data':'opsi',orderable:false},

  ],   
  columnDefs: [
  {
    targets: [0,4,-1],
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





  $('#show_data1').on('click','.consent', function(){
    var kode_rekam =$(this).attr('data'); 
    window.location.href='<?php echo base_url() ?>rekam/consent_pasien/'+kode_rekam;
  });





  $('#show_data').on('click','.item_hapus', function(){
    var kode_rekam =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_rekam"]').val(kode_rekam);

    return false;

  });

  $('#show_data').on('click','.item_rujuk_pasien', function(){
    var kode_rekam =$(this).data('kode');
    var nama_pasien =$(this).data('pasien');
    $('#ModalRujuk').modal('show');
    $('[name="kode_rekam_rujuk"]').val(kode_rekam);
    $('[name="nama_pasien_rujuk"]').html(nama_pasien);


    return false;

  });




  $('#btn_hapus').on('click',function(){
    var kode_rekam=$('#kode_rekam').val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('rekam/hapus_rekam')?>",
      dataType : "JSON",
      data : {kode_rekam: kode_rekam},
      success: function(data){

        $('#ModalHapus').modal('hide');
        if (data) {
         Swal.fire({
          title:'Berhasil',
          text:'Data Berhasil Di Hapus :)',
          icon:'success'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.close();
            location.reload();

          }
        });
      } 

    }

  });
    return false;


  }); 







</script>













