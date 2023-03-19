<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">DATA PENGELUARAN KAS</h4>
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
            <a href="<?php echo site_url('pembayaran') ?>">Pembayaran</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Kas Keluar</a>
          </li>
        </ul>
      </div>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <div class="col-sm-12"> 

                 <a href="#" class="btn btn-success btn-sm btn mr-2" data-toggle="modal" data-target="#ModalTambahKasKeluar"><i class="fa fa-plus mr-1"></i> Transaksi Keluar</a>
                 <button id="export" name="export" onclick="refresh()" class=" btn btn-sm" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>
                 <!-- <h2>PASIEN DIAGNOSIS</h2> -->

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

                <table  id="example1" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                  <thead>
                    <tr style="background: #03b509 ;text-align: center; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th> 
                      <th >Tanggal</th> 
                      <th>Kas ( Rp. )</th> 
                      <th >Keterangan</th>     
                    </tr>
                  </thead>
                  <tbody id="show_data">
                  </tbody>



                </table>
              </div>
            </div>
            <div class="modal fade" id="ModalTambahKasKeluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>FORM TRANSAKSI KAS KELUAR</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                  </div>
                  <form class="form-horizontal" method="post" action="<?php echo base_url('pembayaran/simpan_transaksi_keluar') ?>">
                    <div class="modal-body">
                      <div class="row"> 
                        <div class="input-group mb-3 col-sm-6"> 
                          <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white;">Tanggal</span>
                          <input type="date" class="form-control"  id="tanggal_transaksi" name="tanggal_transaksi">
                        </div> 
                        <div class="input-group mb-3 col-sm-6"> 
                          <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Nominal</span>
                          <input type="text" class="form-control"  name="nominal_transaksi" onfocusout="SeparatorRibuan(this.value,this.id)"  id="nominal_transaksi">
                        </div>
                        <div class="input-group mb-3 alasan col-sm-12"> 
                          <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Keterangan / Rincian</span>
                          <textarea type="date" class="form-control" name="keterangan_transaksi" id="keterangan_transaksi" rows="5"></textarea>
                        </div>  
                      </div> 

                    </div>
                    <div class="modal-footer">
                      <button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
                      <button  type="button" class="btn btn-success btn-flat" id="btn_simpan_transaksi"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>


                  </form>
                </div>
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
                            <select class="form-control" id="status_pembayaran" name="status_pembayaran" >
                              <option disabled="disabled" selected value="0"  style="background: #d3d4d6;" >----</option>  
                              <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                              <option value="LUNAS">LUNAS</option> 
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

  tampil_data();

  function tampil_data(){
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>pembayaran/tampil_kas_keluar',
      // async : true,
      dataType : 'json',
      success : function(data){
        $('#show_data').html(data);

        set();

      }

    });
  }





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


  //GET update
  $('#show_data').on('click','.update_status',function(){
    var kode_pembayaran=$(this).attr('data');

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('pembayaran/get_status_pembayaran')?>",
      dataType : "JSON",
      data : {kode_pembayaran: kode_pembayaran},
      success: function(data){

        $.each(data,function(){
          $('#ModalUpdateStatus').modal('show');
          $('[name="kode_update_status"]').val(kode_pembayaran);
          $('[name="status_pembayaran"]').val(data.status_pembayaran); 
        });
      }
    });


  }); 

  $('#btn_update_status').on('click',function(){
    var kode_pembayaran=$('#kode_update_status').val();
    var status_pembayaran=$('#status_pembayaran').val(); 

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('pembayaran/update_status')?>",
      dataType : "JSON",
      data : {kode_pembayaran: kode_pembayaran,status_pembayaran: status_pembayaran},
      success: function(data){
        alert(data);
        $('#ModalUpdateStatus').modal('hide');
        location.reload();

        tampil_data();
      }
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

  $('#btn_simpan_transaksi').on('click',function(){
    let tanggal_transaksi = $('#tanggal_transaksi').val();
    let nominal_transaksi = $('#nominal_transaksi').val().toString().replace(/\./g,'');
    let keterangan_transaksi = $('#keterangan_transaksi').val();
    if (tanggal_transaksi=='') {
      alert('Tanggal Kosong ! , Silahkan Masukkan Tanggal!');
      $('#tanggal_transaksi').focus();
      return false;
    }
    if (nominal_transaksi=='') {
      alert('Nominal Kosong ! , Silahkan Masukkan Nominal Pengeluaran Kas!');
      $('#nominal_transaksi').focus();
      return false;
    }
    if (keterangan_transaksi=='') {
      alert('Keterangan Transaksi Kosong ! , Silahkan Masukkan Keterangan Transaksi!');
      $('#keterangan_transaksi').focus();
      return false;
    }
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('pembayaran/simpan_transaksi_keluar')?>",
      dataType : "JSON",
      data : {'tanggal_transaksi': tanggal_transaksi,'nominal_transaksi': nominal_transaksi,'keterangan_transaksi': keterangan_transaksi},
      success: function(data){
        if (data=="Transaksi Berhasil Disimpan!") {
          alert(data);
          $('#ModalTambahKasKeluar').modal('hide');
          location.reload();
          tampil_data();
        }else{
          alert(data);
          return false;
        }
      },
    });
  });

  


</script>













