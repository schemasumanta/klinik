<style type="text/css">
.modal-header{
  background: #1572e8;
  border: 1px solid #e0e0e0;
  color:white;


}
.modal-body{
  border: 1px solid #e8e8e8;
}
</style>
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN SURAT KELAHIRAN</h4>
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
            <a href="#">Surat Kelahiran</a>
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
                <div class="row"> 
                  <a href="#" class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#ModaltSKL"><i class="fa fa-plus mr-1"></i> <b>Buat Surat Keterangan Kelahiran</b> </a>  
                  
                </div>
                <script type="text/javascript">
                  function refresh(){
                    location.reload();
                  }
                </script>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <div class="row">
                <div class="col-md-3"></div> 


              </div>
            </div>


            <div class="modal fade" id="ModaltSKL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style=" border: 1px solid #e8e8e8;">
              <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" >
                  <div class="modal-header" style="background: #03b509;">

                    <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "> <i class="fas fa-ticket-alt"></i> BUAT SURAT LAHIRAN</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

                  </div>
                  <form class="form-horizontal">
                    <div class="modal-body"> 
                      <div class="row">  
                        <div class="mb-3 col-sm-6">
                          <p class="input-group-text" id="basic-addon3"  style="background: #03b509;color :white">Tanggal</p>
                          <input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal" style="border-color: #03b509; background: #ffffff" > 
                        </div>   
                        <div class="mb-3 col-sm-6"> 
                          <span class="input-group-text" id="basic-addon3" style="background: #03b509;color :white">Hari</span>
                           <input type="text" class="form-control form-control-sm" name="hari" id="hari" style="border-color: #03b509; background: #ffffff" > 
                        </div>  

                         <div class="mb-3 col-sm-6"> 
                          <span class="input-group-text" id="basic-addon3" style="background: #03b509;color :white">Jam / Waktu</span>
                           <input type="time" class="form-control form-control-sm" name="jam" id="jam" style="border-color: #03b509; background: #ffffff" > 
                        </div>  

                         <div class="mb-3 col-sm-6"> 
                          <span class="input-group-text" id="basic-addon3" style="background: #03b509;color :white">Jenis Kelamin</span>
                           <select type="text" class="form-control form-control-sm" name="jenis_kelamin" id="jenis_kelamin" style="border-color: #03b509; background: #ffffff">
                            <option value="0" selected=""> -- Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                           </select> 
                        </div> 

                        <div class="col-md-6 mb-3" id="lbl_anak"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Anak Ke</span> 
                          <input type="number" class="form-control form-control-sm" name="anak_ke" id="anak_ke" style="border-color: #03b509; background: #ffffff"  > 
                        </div>  

                         <div class="col-md-6 mb-3"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Nama Bayi</span> 
                          <input type="text" class="form-control form-control-sm" name="nama_bayi" id="nama_bayi" style="border-color: #03b509; background: #ffffff"  > 
                        </div>  

                        <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Berat Badan</span> 
                          <input type="text" class="form-control form-control-sm" name="berat_badan" id="berat_badan" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                        <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Panjang Badan</span> 
                          <input type="text" class="form-control form-control-sm" name="panjang_badan" id="panjang_badan" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                         <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Dengan Pertolongan</span> 
                          <input type="text" class="form-control form-control-sm" name="dengan_pertolongan" id="dengan_pertolongan" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 




                          <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Nama Ayah</span> 
                          <input type="text" class="form-control form-control-sm" name="nama_ayah" id="nama_ayah" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                        <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Umur Ayah</span> 
                          <input type="text" class="form-control form-control-sm" name="umur_ayah" id="umur_ayah" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                         <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Nik Ayah</span> 
                          <input type="text" class="form-control form-control-sm" name="nik_ayah" id="nik_ayah" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                          <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Nama Ibu</span> 
                          <input type="text" class="form-control form-control-sm" name="nama_ibu" id="nama_ibu" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                        <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Umur Ibu</span> 
                          <input type="text" class="form-control form-control-sm" name="umur_ibu" id="umur_ibu" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 

                         <div class="col-md-6 mb-3" id="bb"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Nik Ibu</span> 
                          <input type="text" class="form-control form-control-sm" name="nik_ibu" id="nik_ibu" style="border-color: #03b509; background: #ffffff"  > 
                        </div>

                         <div class="col-md-12 mb-3" id="almt"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Alamat</span> 
                          <textarea type="text" class="form-control form-control-sm" name="alamat" id="alamat" style="border-color: #03b509; background: #ffffff" ></textarea> 
                        </div>
 

                        <div class="mb-3 col-sm-6" id="lbl_yang_bertanda_tangan" > 
                          <span class="input-group-text"  style="background: #03b509;color :white">Yang Bertanda Tangan</span>
                          <select  class="form-control " id="yang_bertanda_tangan" name="yang_bertanda_tangan" readonly="disabled" >
                            <option value="0" selected disabled>--Pilih Nama Dokter / Bidan--</option>
                            <option value="dr. BENNY APRIYANZA">dr. BENNY APRIYANZA</option>
                            <option value="dr. LUCKY FAIZAL SOBARNA ">dr. LUCKY FAIZAL SOBARNA </option>
                            <option value="Rischa Letfi M, Amd. Keb">Rischa Letfi M, Amd. Keb</option>
                            <option value="Ambariah, Amd. Keb">Ambariah, Amd. Keb</option>
                            <option value="Yuliana Sri Rahayu, Amd. Keb">Yuliana Sri Rahayu, Amd. Keb</option> 
                          </select>
                        </div>

                       


                      </div> 
                    </div>
                    <div class="modal-footer" style=" border: 1px solid #e8e8e8;">
                      <button type="button"  class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
                      <button  type="button" class="btn btn-success btn-flat" id="btn_simpan_skl"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body col-md-12">
              <div style="overflow-x:auto;">

                <table  id="tabel_kelahiran" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;"  >
                  <thead>
                    <tr style="background: #03b509 ;text-align: center; color:white">
                      <th>No</th>
                      <th>Kode SKL</th>                   
                      <th>Tanggal</th>
                      <th>Jenis Kelamin</th>
                      <th>Nama Bayi</th> 
                      <th>Nama Ayah</th> 
                      <th>Nama Ibu</th> 
                      <th>Alamat</th> 
                      <th > Opsi</th> 
                    </tr>
                  </thead>
                  <tbody id="show_data">
                  </tbody>

                </table>
              </div>
            </div>



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

<!-- MODAL UPDATE -->


<script type="text/javascript">
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

  function hitung_hari(){
    let dari_tanggal = $('#dari_tanggal').val();
    let sampai_tanggal = $('#sampai_tanggal').val();
    if (dari_tanggal!='' && sampai_tanggal!='') {
      let t_awal = Date.parse(dari_tanggal);
      let t_akhir = Date.parse(sampai_tanggal);
      if (t_awal > t_akhir) {
        alert('Tanggal Awal tidak boleh lebih besar dari tanggal Akhir!');
        $('#dari_tanggal').focus();
        return false;
      }
      let selisih = (t_akhir - t_awal)/86400000+1;
      $('#hari').val(selisih);
    }
  }

  $(document).ready(function(){
    $('#keterangan').select2({
      placeholder :'Pilih Nama Pasien',
    })

  });



  $(document).ready(function(){ 
        dataTable = $('#tabel_kelahiran').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('skl/tabel_kelahiran')?>',
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
     {'data':'kode_kelahiran'},
     {'data':'tanggal'},
     {'data':'jenis_kelamin'},
     {'data':'nama_bayi'},
     {'data':'nama_ayah'},     
     {'data':'nama_ibu'},  
     {'data':'alamat'},               

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
     location.reload();
   });




  });


  $('#show_data').on('click','.update_status',function(){
    var kode_surat=$(this).attr('data');
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('surat/get_status')?>",
      dataType : "JSON",
      data : {kode_surat: kode_surat},
      success: function(data){

        $.each(data,function(){
          $('#ModalUpdateStatus').modal('show');
          $('[name="kode_update_status"]').val(kode_surat);
          $('[name="status"]').val(data.status); 
        });
      }
    });


  }); 

  $('#btn_update_status').on('click',function(){
    var kode_surat=$('#kode_update_status').val();
    var status=$('#status').val(); 

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('surat/update_status')?>",
      dataType : "JSON",
      data : {kode_surat: kode_surat,status: status},
      success: function(data){
        alert(data);
        $('#ModalUpdateStatus').modal('hide');
        location.reload();

        tampil_data();
      }
    });
    return false;


  }); 



  $('#btn_simpan_skl').on('click',function(){   
    // let kode_pasien = $('#kode_pasien').val();
    // if (kode_pasien==null || kode_pasien=='' ) {
    //   alert('Silahkan Masukkan Nama Pemohon!');
    //   $('#nama_pemohon').focus();
    //   return false;
    // } 
    let tanggal = $('#tanggal').val();
    let hari = $('#hari').val();
    let jam = $('#jam').val();
    let jenis_kelamin = $('#jenis_kelamin').val();
    let anak_ke = $('#anak_ke').val();
    let nama_bayi = $('#nama_bayi').val(); 
    let berat_badan = $('#berat_badan').val();
    let panjang_badan = $('#panjang_badan').val();
    let dengan_pertolongan = $('#dengan_pertolongan').val();
    let nama_ayah = $('#nama_ayah').val();
    let umur_ayah = $('#umur_ayah').val();
    let nik_ayah = $('#nik_ayah').val();

    let nama_ibu = $('#nama_ibu').val();
    let umur_ibu = $('#umur_ibu').val();
    let nik_ibu = $('#nik_ibu').val();
    let yang_bertanda_tangan = $('#yang_bertanda_tangan').val();
    let alamat = $('#alamat').val();

    
    $.ajax({
      type :'POST',
      url  :"<?php echo base_url('skl/simpanskl')?>",
      dataType:'json',
      data:{'tanggal':tanggal,'hari':hari, 'jam':jam,'jenis_kelamin':jenis_kelamin,'anak_ke':anak_ke,'nama_bayi':nama_bayi, 'berat_badan':berat_badan,'panjang_badan':panjang_badan,'dengan_pertolongan':dengan_pertolongan,'nama_ayah':nama_ayah, 'umur_ayah':umur_ayah,'nik_ayah':nik_ayah,'nama_ibu':nama_ibu ,'umur_ibu':umur_ibu ,'nik_ibu':nik_ibu ,'yang_bertanda_tangan':yang_bertanda_tangan,'alamat':alamat },
      success:function(data){
        alert(data);
        location.reload();
      } 
    }) ;

  }); 


</script>















