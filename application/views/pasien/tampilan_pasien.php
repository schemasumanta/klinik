<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">FORM DATA PASIEN</h4>
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
            <a href="#">Tampilan Data Pasien</a>
          </li>
        </ul>
      </div>


      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


      <!-- Main content -->
      <section class="content flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12"> 

                 <!-- Button trigger modal -->
                 <a href="<?php echo site_url('pasien/tambah_pasien') ?>" class="btn btn-success btn-sm btn"> Tambah Data Pasien</a>

                 <button class=" btn btn-sm refresh" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>

                 <a href="<?php echo site_url('pasien/tarik_laporan') ?>" id="btn_laporan" class="btn btn-secondary btn-sm mr-1" ><i class="fas fa-receipt mr-2"></i>  Cetak Laporan</a>


                 <!--  <a href="#" id="btn_draft" class="btn btn-danger btn-sm mr-1" onclick="buat_kartu('DRAFT')"><i class="fas fa-receipt mr-2"></i>  Buat Kartun</a> -->
               </div>
               <script type="text/javascript">
                function refresh(){
                  location.reload();
                }

                function buat_kartu(pasien){
                  let data = pasien.toLowerCase();

                  $('#Modalkartu').modal('show'); 
                }
              </script>


            </div>





            <!-- /.card-header -->
            <div class="card-body col-md-12">
              <div class="table-responsive">
                <table  id="tabel_pasien" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                  <thead>
                    <tr style="background: #03b509 ;text-align: center; color:white">
                      <th>No</th>
                      <th style="text-align: center;" >Option</th> 
                      <th>Kode Pasien</th>                   
                      <th>No Registrasi</th>
                      <th>Nama Pasien</th>
                      <th>Tanggal Daftar</th>  
                      <th>Alamat</th>     
                      <th>Kepala Keluarga</th>     

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

<div class="modal fade" id="Modalkartu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>PEMBUATAN KARTU</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <div class="row"> 
            <div class="col-md-12" style="text-align: center;">
              <a href="<?php echo site_url('pasien/tampil_kartu_sehat') ?>" id="sehat" onclick="sehat()" class="btn btn-sm btn-secondary"> KARTU KET SEHAT</a> 
              <a href="" id="sakit" onclick="sakit()" class="btn btn-sm btn-info"> KARTU KET SAKIT</a>
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


<div class="modal fade" id="ModalLaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN PASIEN</h3>
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
                <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tanggal Awal</span>
                <input type="date" class="form-control"  id="tanggal_awal" >
                
              </div> 
            </div> 



            <div class="col-md-12 tgl" style="display:none">

              <div class="input-group mb-3"> 
                <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tanggal Akhir</span>
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


<div class="modal fade" id="ModalDetailPasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style=" background: green ">
        <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; ">Detail Data Atas Nama :  <span class="nama_pasien"></span></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
      </div>
      <form class="form-horizontal">
        <div class="modal-body" >
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Kode Pasien</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="kode_pasien"></span>
            </div> 
          </div>

          <div class="form-group row" style="background-color: green; color: white">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">NIK Pasien</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="nik"></span>
            </div> 
          </div>
          
          
          
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">No registrasi</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="no_registrasi"></span>
            </div> 
          </div>

          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Jenis Kelamin</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="jk"></span>
            </div> 
          </div>

          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">TTL</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="tempat_lahir"></span>,
              <span class="tanggal_lahir"></span>
            </div> 
          </div>

          
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Umur</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="umur"></span> TH
            </div> 
          </div>

          
          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Kepala Keluarga</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="kepala_keluarga"></span> 
            </div> 
          </div>

          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Agama</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="agama"></span> 
            </div> 
          </div>

          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Telepon</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="telepon"></span> 
            </div> 
          </div>

          <div class="form-group row">
            <div class="col-md-5 col-5 mb-1"> 
              <span class="fw-bold">Alamat</span>
            </div> 
            <div class="col-md-1 col-1 mb-1"> 
              <span>:</span>
            </div> 
            <div class="col-md-6 col-6 mb-1"> 
              <span class="alamat"></span> 
              <span class="rt"></span> 
              <span class="rw"></span> 
              <span class="desa"></span> 
              <span class="kecamatan"></span> 
              <span class="kabupaten"></span> 
            </div> 
          </div>

          

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
                  <form class="form-horizontal" method="POST" action="<?php echo base_url('pasien/rujuk_rs_pasien') ?>">
                    <div class="modal-body">
                      <div class="row">
                        <input type="hidden" name="kode_pasien_rujuk" id="kode_pasien_rujuk" value="">  

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
                        <div class="col-md-12 mb-3 rujuk_rs"> 
                          <span class="input-group-text bg-success text-light" >Nama RS</span> 
                          <input type="text" class="form-control"  id="nama_rs" name="nama_rs"style="border-color: #03b509" >
                        </div>
                        <div class="col-md-12 mb-3 rujuk_rs"> 
                          <span class="input-group-text bg-success text-light" >Alamat RS</span> 
                          <textarea type="text" class="form-control"  id="alamat_rs" name="alamat_rs" style="border-color: #03b509" ></textarea>
                        </div>

                        <div class="col-md-12 mb-3"> 
                          <span class="input-group-text bg-success text-light" >Nama Dokter</span> 
                          <select type="text" class="form-control"  id="dokter_perujuk" name="dokter_perujuk" style="border-color: #03b509">
                            <option value="0" disabled selected>Pilih Dokter</option>
                            <?php foreach ($list_dokter as $key): ?>
                            <option value="<?php echo $key->nama_admin ?>"><?php echo $key->nama_admin ?></option>
                            <?php endforeach ?>
                          </select>
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

  $('#show_data').on('click','.item_rujuk_pasien', function(){
  var kode_pasien =$(this).data('pasien');
  var nama_pasien =$(this).data('nama');
  $('#ModalRujuk').modal('show');
  $('[name="kode_pasien_rujuk"]').val(kode_pasien);
  $('[name="nama_pasien_rujuk"]').html(nama_pasien);



  return false;

});



  $(document).ready(function(){
   
    dataTable = $('#tabel_pasien').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('pasien/tabel_pasien')?>',
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
    order: [2, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'opsi',orderable:false},
     {'data':'kode_pasien'},
     {'data':'no_registrasi'},
     {'data':'nama_pasien'},
     {'data':'tanggal_daftar'},
     {'data':'alamat'},  
     {'data':'kepala_keluarga'},               

     ],   
     columnDefs: [
     {
      targets: [0,1,2,3,5],
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



   //GET update
   $('#show_data').on('click','.lihat_detail',function(){
    var kode_pasien=$(this).attr('data');
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>pasien/tampil_data_pasien_bykode',
      data :{'kode_pasien':kode_pasien},
      dataType : 'json',
      success : function(data){
        $('#ModalDetailPasien').modal('show');
        for (var i = 0; i <data.length; i++) {
          $('.kode_pasien').html(data[i].kode_pasien);
          $('.no_registrasi').html(data[i].no_registrasi); 
          $('.nik').html(data[i].nik); 
          $('.nama_pasien').html(data[i].nama_pasien); 
          $('.jk').html(data[i].jk); 
          $('.tempat_lahir').html(data[i].tempat_lahir); 
          $('.tanggal_lahir').html(data[i].tanggal_lahir); 
          $('.umur').html(data[i].umur); 
          $('.kepala_keluarga').html(data[i].kepala_keluarga); 
          $('.agama').html(data[i].agama); 
          $('.telepon').html(data[i].telepon); 
          $('.alamat').html(data[i].alamat); 
          $('.rt').html(data[i].rt); 
          $('.rw').html(data[i].rw); 
          $('.desa').html(data[i].desa); 
          $('.kecamatan').html(data[i].kecamatan); 
          $('.kabupaten').html(data[i].kabupaten); 
        }

      },
    });
    return false;
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
   $('#show_data').on('click','.item_hapus_pasien', function(){
    var kode_pasien =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_pasien"]').val(kode_pasien);

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

        tampil_data();
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













