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
        <h4 class="page-title">TAMPILAN SURAT SEHAT DAN SAKIT</h4>
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
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="row"> 
                  <a href="#" class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#ModaltSuratSehat"><i class="fa fa-plus mr-1"></i> <b>Buat Surat Keterangan</b> </a>  
                  
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


            <div class="modal fade" id="ModaltSuratSehat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style=" border: 1px solid #e8e8e8;">
              <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" >
                  <div class="modal-header" style="background: #03b509;">

                    <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "> <i class="fas fa-ticket-alt"></i> BUAT SURAT SEHAT</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

                  </div>
                  <form class="form-horizontal">
                    <div class="modal-body"> 
                      <div class="row">  
                        <div class="mb-3 col-sm-6">
                          <p class="input-group-text" id="basic-addon3"  style="background: #03b509;color :white">Nama Pasien</p>
                          <select  class="form-control" name="kode_pasien"  id="kode_pasien" style="width: 100%; border-color: #03b509; background: #ffffff">
                            <option></option>
                            <?php foreach ($pasien as $key): ?>
                              <option value="<?php echo $key->kode_pasien ?>"><?php echo $key->nama_pasien." || ".$key->kepala_keluarga ?></option>
                            <?php endforeach ?>
                          </select>  
                        </div>   
                        <div class="mb-3 col-sm-6"> 
                          <span class="input-group-text" id="basic-addon3" style="background: #03b509;color :white">Jenis Surat</span>
                          <select  class="form-control " id="keterangan" name="keterangan" readonly="disabled" style="border-color: #03b509; background: #ffffff;width: 100%">
                            <option value="0" selected disabled>--PILIH JENIS SURAT--</option>
                            <option value="SURAT KETERANGAN SEHAT">SURAT KETERANGAN SEHAT</option>
                            <option value="SURAT KETERANGAN SAKIT">SURAT KETERANGAN SAKIT</option>
                          </select>
                        </div>   

                        <div class="col-md-6 mb-3" id="lbl_pekerjaan" style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Pekerjaan</span> 
                          <input type="text" class="form-control form-control-sm" name="pekerjaan" id="pekerjaan" style="border-color: #03b509; background: #ffffff"  > 
                        </div>  
                        <div class="col-md-6 mb-3" id="lbl_dari" style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Dari Tanggal</span> 
                          <input type="date" class="form-control form-control-sm" name="dari_tanggal" id="dari_tanggal" style="border-color: #03b509; background: #ffffff" onchange="hitung_hari()"> 
                        </div> 
                        <div class="col-md-6 mb-3" id="lbl_sampai" style="display:  none;">
                          <span class="input-group-text" style="background: #03b509;color :white">Sampai Tanggal </span> 
                          <input type="date" class="form-control form-control-sm" name="sampai_tanggal" id="sampai_tanggal" style="border-color: #03b509; background: #ffffff" onchange="hitung_hari()"> 
                        </div> 

                        <div class="col-md-6 mb-3" id="lbl_terapi" style="display:  none;">
                          <span class="input-group-text" style="background: #03b509;color :white">Terapi Pasien </span> 
                          <textarea type="text" class="form-control form-control-sm" name="terapi" id="terapi" style="border-color: #03b509; background: #ffffff" ></textarea> 
                        </div> 

                        <div class="col-md-6 mb-3" id="lbl_diagnosa" style="display:  none;">
                          <span class="input-group-text" style="background: #03b509;color :white">Diagnosa Pasien </span> 
                          <textarea type="text" class="form-control form-control-sm" name="diagnosa" id="diagnosa" style="border-color: #03b509; background: #ffffff" ></textarea> 
                        </div> 

                        <div class="col-md-6 mb-3" id="lbl_hari" style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Jumlah Hari Istirahat</span> 
                          <input type="text" pattern="\d*"  class="form-control form-control-sm" name="hari" id="hari" style="border-color: #03b509; background: #ffffff"  maxlength="2" disabled> 
                        </div> 




                        <div class="col-md-12 mb-3" id="lbl_keperluan" style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Penggunaan Surat</span> 
                          <input type="text" class="form-control form-control-sm" name="keperluan" id="keperluan" style="border-color: #03b509; background: #ffffff"  > 
                        </div> 


                        <div class="col-md-4 mb-3" id="lbl_tb"  style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Tinggi Badan</span> 
                          <input type="text" class="form-control form-control-sm"  id="tb" name="tb" placeholder="Input Tinggi Badan"style="border-color: #03b509; background: #ffffff" >
                        </div>  


                        <div class="col-md-4" id="lbl_bb"  style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Berat Badan</span> 
                          <input type="text" class="form-control form-control-sm"  id="bb" name="bb" placeholder="Input Berat Badan" style="border-color: #03b509; background: #ffffff" >
                        </div> 

                        <div class="col-md-4" id="lbl_tekanan_darah"  style="display:  none;"> 
                          <span class="input-group-text" style="background: #03b509;color :white">Tekanan Darah</span> 
                          <input type="text" class="form-control form-control-sm"  id="tekanan_darah" name="tekanan_darah" placeholder="Input Berat Badan" style="border-color: #03b509; background: #ffffff"  >
                        </div>

                        <div class="mb-3 col-sm-6" id="lbl_yang_bertanda_tangan" style="display:  none;"> 
                          <span class="input-group-text"  style="background: #03b509;color :white">Yang Bertanda Tangan</span>
                          <select  class="form-control " id="yang_bertanda_tangan" name="yang_bertanda_tangan" readonly="disabled" style="border-color: #03b509; background: #ffffff;width: 100%">
                            <option value="0" selected disabled>--Pilih Nama Dokter / Bidan--</option>
                            <option value="dr. BENNY APRIYANZA">dr. BENNY APRIYANZA</option>
                            <option value="dr. LUCKY FAIZAL SOBARNA ">dr. LUCKY FAIZAL SOBARNA </option>
                            <option value="Rischa Letfi M, Amd. Keb">Rischa Letfi M, Amd. Keb</option>
                            <option value="Ambariah, Amd. Keb">Ambariah, Amd. Keb</option>                              
                          </select>
                        </div>

                        <div class="input-group mb-3 col-sm-12" id="lbl_total"  > 

                          <span class="input-group-text" id="basic-addon3" style="background: #03b509;color :white" >Biaya Pembuatan</span>
                          <input  class="form-control" id="total_akhir" name="total_akhir" style="border-color: #03b509; background: #ffffff" onfocusout="SeparatorRibuan(this.value,this.id)"> 
                        </div> 



                      </div> 
                    </div>
                    <div class="modal-footer" style=" border: 1px solid #e8e8e8;">
                      <button type="button"  class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
                      <button  type="button" class="btn btn-success btn-flat" id="btn_simpan_sehat"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body col-md-12"><div style="overflow-x:auto;">
              <table  id="tabel_surat" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;"  >
                <thead>
                  <tr style="background: #03b509 ;text-align: center; color:white">
                    <!-- <td>Kode</td> -->
                    <th>No</th>
                    <th>Kode Surat</th>                   
                    <th>Nama Pasien</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th> 
                    <th>Status</th> 
                    <th style="text-align: center;" >Opsi</th> 
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

  $(function() {
    $('#keterangan').on('change',function(){
      if( $(this).val()==="SURAT KETERANGAN SAKIT"){
        $("#lbl_pekerjaan").show()
        $("#lbl_hari").show() 
        $("#lbl_dari").show() 
        $("#lbl_sampai").show() 
        $("#lbl_terapi").show() 
        $("#lbl_yang_bertanda_tangan").show() 

        $("#lbl_diagnosa").show()  
        $("#lbl_keperluan").hide()
        $("#lbl_bb").hide() 
        $("#lbl_tb").hide()
        $("#lbl_tekanan_darah").hide()
        $("#lbl_total").hide()

      } 
      else{
       $("#lbl_keperluan").show()
       $("#lbl_bb").show() 
       $("#lbl_tb").show() 
       $("#lbl_tekanan_darah").show()
       $("#lbl_pekerjaan").hide()
       $("#lbl_hari").hide() 
       $("#lbl_dari").hide() 
       $("#lbl_terapi").hide() 
       $("#lbl_yang_bertanda_tangan").show() 


       $("#lbl_diagnosa").hide()
       $("#lbl_sampai").hide()
       $("#lbl_total").show()


     }
   }); 
  });

  $(document).ready(function(){
    $('#kode_pasien').select2({
      placeholder :'Pilih Nama Pasien',
    })

    $('#keterangan').select2({
      placeholder :'Pilih Nama Pasien',
    })

  });



  $(document).ready(function(){ 


    dataTable = $('#tabel_surat').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('surat/tabel_surat')?>',
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
    {'data':'kode_surat'},
    {'data':'nama_pasien'},
    {'data':'keterangan'},
    {'data':'tanggal_pembuatan_surat'},
    {'data':'status'},               
    {'data':'opsi',orderable:false},

    ],   
    columnDefs: [
    {
      targets: [0,1,4,5,-1],
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
    var id=$(this).data('id');
    var status=$(this).data('status');

    $('#ModalUpdateStatus').modal('show');
    $('[name="kode_update_status"]').val(id);
    $('[name="status"]').val(status); 
    return false;
  }); 

  $('#btn_update_status').on('click',function(){
    var id=$('#kode_update_status').val();
    var status=$('#status').val(); 

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('surat/update_status')?>",
      dataType : "JSON",
      data : {id: id,status: status},
      success: function(data){
        alert(data);
        $('#ModalUpdateStatus').modal('hide');
        location.reload();

        
      }
    });
    return false;


  }); 



  $('#btn_simpan_sehat').on('click',function(){   
    let kode_pasien = $('#kode_pasien').val();
    if (kode_pasien==null || kode_pasien=='' ) {
      alert('Silahkan Masukkan Nama Pemohon!');
      $('#nama_pemohon').focus();
      return false;
    } 
    let keterangan = $('#keterangan').val();
    let pekerjaan = $('#pekerjaan').val();
    let hari = $('#hari').val();
    let dari_tanggal = $('#dari_tanggal').val();
    let sampai_tanggal = $('#sampai_tanggal').val();
    let keperluan = $('#keperluan').val();
    let tb = $('#tb').val();
    let bb = $('#bb').val();
    let terapi = $('#terapi').val();
    let diagnosa = $('#diagnosa').val();

    let tekanan_darah = $('#tekanan_darah').val();
    let yang_bertanda_tangan = $('#yang_bertanda_tangan').val();

    let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
    if (total_akhir=='' && keterangan=="SURAT KETERANGAN SEHAT") {
      alert('Silahkan Masukkan total_akhir!');
      $('#total_akhir').focus();
      return false;
    } 
    $.ajax({
      type :'POST',
      url  :"<?php echo base_url('surat/simpansurat')?>",
      dataType:'json',
      data:{'kode_pasien':kode_pasien,'keterangan':keterangan,'pekerjaan':pekerjaan, 'hari':hari,'dari_tanggal':dari_tanggal,'sampai_tanggal':sampai_tanggal,'keperluan':keperluan, 'tb':tb,'bb':bb,'terapi':terapi,'diagnosa':diagnosa, 'yang_bertanda_tangan':yang_bertanda_tangan,'tekanan_darah':tekanan_darah,'total_akhir':total_akhir },
      success:function(data){
        alert(data);
        location.reload();
      } 
    }) ;

  }); 


</script>















