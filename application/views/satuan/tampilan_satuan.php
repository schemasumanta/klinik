<div class="main-panel">
  <div class="content flashdatart" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>"> 
    <style type="text/css">
      .isi_expired{
        border:1px solid #d1d1d1;
        line-height:35px
      }

    </style>
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
                <div class="col-sm-12"> 

                 <!-- Button trigger modal -->
                 <a href="<?php echo site_url('satuan_obat/tambah_satuan_obat') ?>" class="btn btn-sm btn mr-1"  style="background:#03b509; color:white;"> Tambah Satuan Obat</a>
                 <button name="export" onclick="refresh()" class=" btn btn-sm" style="background-color: #673ab7; color: white" ><i class="fas fa-sync-alt ml-2" style="margin-right: 10px"></i></button>

                 <!--  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-upload mr-2"></i> --> 

                  <a href="#" id="btn_laporan" class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#modal_stok_obat"><i class="fas fa-drum-steelpan mr-2"></i>Tambah Stok Obat</a>

                  <a href="#" id="btn_expired" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modaltambahexpired"><i class="fas fa-clock mr-2"></i>Atur Expired Obat</a>

                  <a href="<?php echo site_url('satuan_obat/tarik_laporan') ?>" id="btn_laporan" class="btn btn-secondary btn-sm mr-1" ><i class="fas fa-download mr-2"></i>Laporan Stok Obat</a>

                  <a href="#" id="btn_pemakaian" class="btn btn-dark btn-sm mr-1" data-target="#ModalLaporan" data-toggle="modal"><i class="fas fa-capsules mr-2" ></i>Laporan Pemakaian Obat</a>
                </button>  

              </div>  

            </div>

            <!-- MODAL TAMBAH OBAT -->

            <div class="modal fade" id="ModalLaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="judul_laporan_kpi" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i> TARIK DATA PEMAKAIAN OBAT</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url()?>satuan_obat/laporan_pemakaian_obat" method="post">
                    <div class="modal-body">
                      <div class="row"> 
                        <div class="col-md-12 tgl mt-5">

                          <div class="input-group mb-3"> 
                            <span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Bulan</span>
                            <input type="month" class="form-control"  id="bulan_obat" name="bulan_obat" required oninvalid="this.setCustomValidity('Pilih Bulan')"
                            oninput="this.setCustomValidity('')">
                          </div> 
                        </div> 
                      </div> 

                    </div>
                    <div class="modal-footer">
                      <button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
                      <button  type="submit" class="btn btn-success btn-flat" id="btn_tarik_laporan_pemakaian"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

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
                            <option value="<?php echo $row->kode_obat ?>" data-keterangan="<?php echo $row->keterangan ?>">

                              <?php $cek = str_replace("'",'&apos;',$row->nama_obat);
                              if ($row->keterangan!='') {
                                echo $cek." || ". $row->keterangan;
                              }else{
                                echo $cek;
                              }
                            ?></option>
                          <?php endforeach ?> 

                        </select>  
                      </div> 

                      <div class="col-sm-6 mt-2 mb-2">
                        <label for="stok_masuk">Stok Masuk</label>
                        <input type="text" class="form-control" id="stok_masuk" name="stok_masuk" onkeypress="return hanyaAngka(event)" required >
                      </div> 
                      <div class="col-sm-6 mt-2 mb-2">
                        <label for="stok_masuk">Tanggal Expired</label>
                        <input type="date" class="form-control" id="expired_stok_masuk" name="expired_stok_masuk" required >
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

          <div class="modal fade" id="modaltambahexpired" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style=" border: 1px solid #e8e8e8;">
            <div class="modal-dialog modal-lg" role="document" >
              <div class="modal-content" >
                <div class="modal-header bg-danger">

                  <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "> <i class="fas fa-clock mr-2"></i> TAMBAH TANGGAL EXPIRED OBAT</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

                </div>
                <form class="form-horizontal">
                  <div class="modal-body"> 
                    <div class="row">  
                      <div class="mb-3 col-sm-12">
                        <p class="input-group-text" id="basic-addon3"  style="background: #03b509;color :white">Nama Obat</p>
                        <select type="text" class="form-control" id="nama_obat_exp" name="nama_obat_exp"   style="width: 100%">
                         <option selected>Pilih Nama Obat</option>
                         <?php foreach ($tambah_stok_obat as $row): ?>
                          <option value="<?php echo $row->kode_obat ?>" data-keterangan="<?php echo $row->keterangan ?>"   data-stok="<?php echo $row->total_stok ?>">
                            <?php $cek = str_replace("'",'&apos;',$row->nama_obat);
                            if ($row->keterangan!='') {
                              echo $cek." || ". $row->keterangan;
                            }else{
                              echo $cek;
                            }
                          ?></option>
                        <?php endforeach ?> 
                      </select>  
                    </div>



                    <div class="col-sm-6 mt-2 mb-2">
                      <label for="stok_masuk">Stok Obat</label>
                      <input type="text" class="form-control" id="stok_obat_lama" name="stok_obat_lama" onkeypress="return hanyaAngka(event)" readonly>
                    </div> 
                    <div class="col-sm-6 mt-2 mb-2">
                      <label for="stok_masuk">Qty Di Exp. Date</label>
                      <input type="text" class="form-control" id="qty_exp_date" name="qty_exp_date" onkeypress="return hanyaAngka(event)" readonly>
                    </div> 

                    <div class="col-sm-6 mt-2 mb-2">
                      <label for="stok_masuk">Qty Belum ada Exp. Date</label>
                      <input type="text" class="form-control" id="qty_expired" name="qty_expired" readonly="readonly" onkeypress="return hanyaAngka(event)" required >
                      <p id="notif_exp" class="text-success mt-3"></p>
                    </div> 


                    <div class="col-sm-6 mt-2 mb-2">
                      <label for="stok_masuk">Tanggal Expired</label>
                      <input type="date" class="form-control" id="expired_stok_obat" name="expired_stok_obat" readonly="readonly" >
                    </div> 

                  </div> 
                </div>
                <div class="modal-footer" style=" border: 1px solid #e8e8e8;">
                  <button type="button" class="btn btn-danger mr-2"  data-dismiss="modal"><b>BATAL</b></button>
                  <button type="button" class="btn btn-success" id="btn_simpan_expired"><b>SIMPAN</b></button>
                </div>


              </form>
            </div>
          </div>
        </div> 

        <div class="card-body col-md-12">
          <div class="table-responsive">
           <table  id="tabel_obat" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;" >
            <thead>
              <tr style="background: #03b509 ;text-align: left; color:white">
                <!-- <td>Kode</td> -->
                <th>No</th>
                <th>Kode Obat</th>                   
                <th >Nama Obat</th>
                <th >Keterangan Obat</th>
                <th >Harga Beli </th>   
                <th >Harga Jual </th>   
                <th >Satuan </th>   
                <th >Stok </th>   
                <th >Status Stok</th>
                <th >Status Obat</th>   
                <th style="text-align: center;" > Option</th> 
              </tr>
            </thead>
            <tbody id="show_data" class="isi_expired">
            </tbody>



          </table>
        </div>
      </div>

      <div class="modal fade" id="ModalHapusExpired" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-dark-gradient">
              <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-trash mr-2"></i>Kosongkan Obat Expired</h3>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>satuan_obat/hapus_obat_expired">
              <input type="hidden" name="kode_obat_hapus_expired">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="w-100">
                      <thead>
                        <tr>
                          <th width="10%">Kode Obat</th>
                          <td id="kode_obat_hapus_expired" width="20%"></td>
                        </tr>
                        <tr>
                          <th width="10%">Nama Obat</th>

                          <td id="nama_obat_hapus_expired" width="30%"></td>

                        </tr>
                        <tr>
                          <th width="10%">Jumlah Exp</th>
                          <td id="jumlah_obat_hapus_expired" width="20%" class="fw-bold"></td>
                        </tr>
                        <tr>
                          <td style="line-height: 15px"><br></td>
                        </tr>

                      </thead>


                    </table>
                  </div>
                </div>

              </div>
              <div class="modal-footer"> 
                <button type="button" class="btn btn-sm btn-secondary btn-flat" data-dismiss="modal"><i class="far fa-times-circle mr-2"></i> Batal</button>
                <button type="submit" class="btn btn-sm btn-danger btn-flat"><i class="fas fa-circle-notch mr-2"></i>Kosongkan</button>
              </div>


            </form>
          </div>
        </div>
      </div>


      <div class="modal fade" id="ModalExpired" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-dark-gradient">
              <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-clock mr-2"></i> Expired Obat</h3>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

            </div>
            <form class="form-horizontal" action="<?php echo base_url('satuan_obat/update_qty_expired') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="w-100">
                      <thead>
                        <tr>
                          <th width="10%">Kode Obat</th>
                          <td name="kode_obat_expired" id="kode_obat_expired" width="20%"></td>
                        </tr>
                        <tr>
                          <th width="10%">Nama Obat</th>

                          <td id="nama_obat_expired" width="30%"></td>

                        </tr>
                        <tr>
                          <th width="10%">Stok Obat</th>
                          <td id="stok_obat_expired" width="20%" class="fw-bold"></td>
                        </tr>
                        <tr>
                          <td style="line-height: 15px"><br></td>
                        </tr>

                        <tr class="bg-success-gradient text-white text-center" border="1">
                          <th>No</th>
                          <th colspan="3">Tanggal Expired</th>

                          <th colspan="3">Jumlah Obat</th>

                        </tr>
                      </thead>
                      <tbody id="list_expired_obat">

                      </tbody>

                    </table>
                  </div>
                </div>

              </div>
              <div class="modal-footer"> 
                <button type="submit" class="btn btn-sm btn-success btn-flat"><i class="fas fa-check mr-2"></i>Update</button>

                <button type="button" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle mr-2"></i> Tutup</button>
              </div>


            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success-gradient">
              <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-capsules"></i> Status Obat</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>satuan_obat/hapus_obat">
              <div class="modal-body">

                <input type="hidden" name="kode_obat_hapus" id="kode_obat_hapus" value="">
                <input type="hidden" name="status_obat_hapus" id="status_obat_hapus" value="">  
                <div class="alert alert-danger" id="bungkus"><p id="notif_hapus">Apakah Data obat Akan di Hapus..?</p></div>
              </div>
              <div class="modal-footer"> 
               <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">TIDAK</button>
               <button class="btn_hapus_obat btn btn-success btn-flat" id="btn_hapus_obat" type="submit">YA</button>
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

<script type="text/javascript"> 

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


    $('#nama_obat').select2({
     placeholder:"Pilih Nama Obat",
     allowClear: true,
     dropdownParent:"#modal_stok_obat"
   })

    $('#nama_obat_exp').select2({
     placeholder:"Pilih Nama Obat",
     allowClear: true,
     dropdownParent:"#modaltambahexpired"
   })

  })


  function refresh(){
    location.reload();
  }  


  $(document).ready(function(){ 

     dataTable = $('#tabel_obat').DataTable({
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('satuan_obat/tabel_obat')?>',
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
    order: [2, 'asc'],
     columns: [
     {'data':'no'},
     {'data':'kode_obat'},
     {'data':'nama_obat'},
     {'data':'keterangan'},
     {'data':'harga_beli'},
     {'data':'harga_jual'},
     {'data':'satuan_obat'},
     {'data':'total_stok'},
     {'data':'status_stok',orderable:false},
     {'data':'status_obat'},
     
     {'data':'opsi',orderable:false},

     ],     
     columnDefs: [
     {
      targets: [0,2,3,-1],
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
  



    $('#import_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url   : '<?php echo base_url()?>satuan_obat/import',
        method:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
          $('#file').val('');
        alert(data);
      }
    })
    });


  });

  $('#show_data').on('click','.item_hapus_obat', function(){
    var kode_obat =$(this).data('kode');
    var status_obat =$(this).data('status');
    $('#ModalHapus').modal('show');
    $('#kode_obat_hapus').val(kode_obat);
    $('#status_obat_hapus').val(status_obat);
    if (status_obat==0) {
      $('#notif_hapus').html("Nonaktifkan Obat ?");
      $('#bungkus').addClass('alert-danger');
      $('#bungkus').removeClass('alert-success');
    }else{

      $('#notif_hapus').html("Aktifkan Obat ?");
      $('#bungkus').removeClass('alert-danger');
      $('#bungkus').addClass('alert-success');
    }
    return false;
  });
  $('#nama_obat_exp').on('change',function(){
    let stok = $('#nama_obat_exp option:selected').data('stok');
    let kode_obat = $(this).val();
    $.ajax({
      type : "GET",
      url  : "<?php echo base_url('satuan_obat/jumlah_expired')?>",
      dataType : "JSON",
      data : {'kode_obat': kode_obat},
      success: function(data){
       $('#stok_obat_lama').val(stok);
       $('#qty_exp_date').val(data[0].jumlah);
       if (parseFloat(data[0].jumlah)==parseFloat(stok)) {
         $('#qty_expired').attr('readonly','readonly');
         $('#expired_stok_obat').attr('readonly','readonly');


         $('#tanggal_expired').attr('readonly','readonly');

         $('#notif_exp').html('Stok Obat dan Stok di Tanggal Expired Sudah Sesuai!');

       }else{
         $('#qty_expired').removeAttr('readonly');
         $('#qty_expired').val(0);
         $('#notif_exp').html('');
         $('#expired_stok_obat').removeAttr('readonly');
       }
     }
   });

  });

  $('#qty_expired').on('keyup',function(){
    let stok = $('#stok_obat_lama').val();
    let qty_exp = $('#qty_exp_date').val();
    let stok_belum = parseFloat(stok)-parseFloat(qty_exp);

    if (parseFloat($(this).val()) > stok_belum) {
     $('#qty_expired').focus();
     $('#qty_expired').val(0);

     Swal.fire({
      title:'Error',
      text:'Qty Melebihi Stok yang belum Exp.!',
      icon:'error'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.close();
      }
    });
    return false;
  }

});
  $('#show_data').on('click','.item_hapus_expired', function(){

   var kode_obat =$(this).data('kode');
   var nama_obat =$(this).data('nama');

   $.ajax({
    type : "GET",
    url  : "<?php echo base_url('satuan_obat/jumlah_expired_obat')?>",
    dataType : "JSON",
    data : {'kode_obat': kode_obat},
    success: function(data){
      if (data[0].jumlah!=null)
      {
        $('#ModalHapusExpired').modal('show');
        $('#kode_obat_hapus_expired').html('&nbsp;:&nbsp;&nbsp;'+kode_obat);
        $('[name="kode_obat_hapus_expired"]').val(kode_obat);

        $('#nama_obat_hapus_expired').html('&nbsp;:&nbsp;&nbsp;'+nama_obat);
        $('#jumlah_obat_hapus_expired').html('&nbsp;:&nbsp;&nbsp;'+data[0].jumlah);
      }else{
       Swal.fire({
        title:'Error',
        text:'Tidak Ada Obat Yang Expired!',
        icon:'error'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.close();
        }
      });
      return false;
    }

  }
});

   return false;
 });


  $('#show_data').on('click','.item_expire_obat', function(){
    var kode_obat =$(this).data('kode');
    var nama_obat =$(this).data('nama');
    var stok_obat =$(this).data('stok');
    $.ajax({
      type : "GET",
      url  : "<?php echo base_url('satuan_obat/list_expired_obat')?>",
      dataType : "JSON",
      data : {kode_obat: kode_obat},
      success: function(data){
        $('#ModalExpired').modal('show');
        $('#kode_obat_expired').html('&nbsp;:&nbsp;&nbsp;'+kode_obat);
        $('#nama_obat_expired').html('&nbsp;:&nbsp;&nbsp;'+nama_obat);
        $('#stok_obat_expired').html('&nbsp;:&nbsp;&nbsp;'+stok_obat);
        let html='';
        for (var i = 0; i < data.length; i++) {
          html+=`<tr class="text-center isi_expired">
          <td class="isi_expired">`+(i+1)+`</td>
          <td colspan="3" class="isi_expired">`+data[i].tanggal_expired+`</td>
          <td colspan="3" class="isi_expired"><input type="text" id="qty_expired_obat" name="qty_expired_obat[]" class="form-control" value="`+data[i].qty+`"><input type="hidden" id="id_expired_obat" name="id_expired_obat[]" name="qty_expired_obat[]" class="form-control" value="`+data[i].kode_exp+`"></td>
          </tr>
          `;
        }

        $('#list_expired_obat').html(html);
      }
    });


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




  $('#btn_simpan_expired').on('click', function() {
    var nama_obat = $('#nama_obat_exp').val();
    var qty = $('#qty_expired').val();
    var expired = $('#expired_stok_obat').val();

    if (nama_obat ==null) {
      $('#nama_obat_exp').focus();
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
    if (qty =='' || qty == 0) {
      $('#qty_expired').focus();
      Swal.fire({
        title:'Qty Kosong',
        text:'Silahkan Masukkan Qty Per Tanggal Expired!',
        icon:'error'
      }).then((result) =>{
        if (result.isConfirmed) {
          Swal.close();
        }
      });
      return false;
    }

    if (expired =='') {
      $('#expired_stok_obat').focus();
      Swal.fire({
        title:'Tanggal Expired Kosong',
        text:'Silahkan Masukkan Tanggal Expired!',
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
      url: "<?php echo base_url('satuan_obat/update_tanggal_expired') ?>",
      dataType: "JSON",
      data: {
        'nama_obat': nama_obat,
        'qty': qty,
        'expired': expired,

      },
      success: function(data) {
        if (data==1) {
          Swal.fire({
            title:'Berhasil',
            text:'Tanggal Expired Berhasil Ditambahkan',
            icon:'success'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.close();
              $('#modaltambahexpired').modal('hide');
              location.reload();
            }
          });


        }else{
          Swal.fire({
            title:'Gagal',
            text:'Tanggal Expired Gagal Ditambahkan',
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


  $('#btn_tambah_stok').on('click', function() {
    var nama_obat = $('#nama_obat').val();
    var stok_masuk = $('#stok_masuk').val();
    var expired_stok_masuk = $('#expired_stok_masuk').val();

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

    if (expired_stok_masuk =='') {
      $('#expired_stok_masuk').focus();
      Swal.fire({
        title:'Tanggal Expired Kosong',
        text:'Silahkan Masukkan Tanggal Expired!',
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
        'expired_stok_masuk': expired_stok_masuk,

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













