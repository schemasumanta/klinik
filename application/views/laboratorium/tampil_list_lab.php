<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN REKAM LABORATORIUM</h4>
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
            <a href="#">Laboratorium</a>
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
                <div class="col-sm-12">  

         </div>
         <script type="text/javascript">
          function refresh(){
            location.reload();
          }
        </script>
      </div> 

      <div class="card-body"> 

        <h2 style="font-weight: bold">LIST PEMERIKSAAN LABORATORIUM PASIEN</h2> 

      
        <div class="table-responsive">

          <table  id="example2" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
            <thead>
              <tr style="background: #699e00 ;text-align: center; color:white">
                <!-- <td>Kode</td> -->
                <th>No</th>
                <th>Kode Lab</th> 
                <th >Nama Pasien</th>                  
                <th width="10%" >Status Pasien</th>  
                <th width="10%" >Petugas Pemeriksa</th>  
                <th width="10%" >Tanggal di Periksa</th> 
                <th width="40%" >Keterangan Pemeriksaan LAB</th> 

                <th style="text-align: center;" >Option</th>
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

                <input type="hidden" name="kode_lab" id="kode_lab" value="">  
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
      url   : '<?php echo base_url()?>laboratorium/tampil_data_listlab',
      // async : true,
      dataType : 'json',
      success : function(data){
        var nomor = 1;
        var no = 1;
        var html1 = '';
        var html2 = '';
        for(i=0; i<data.length; i++){
       
          html2 += '<tr>'+
          '<td style="text-align:left">'+(nomor)+'</td>'+
          '<td style="text-align:left">'+data[i].kode_lab+'</td>'+ 
          '<td style="text-align:left">'+data[i].nama_pasien+'</td>'+    
          '<td style="text-align:left">'+data[i].status_pasien+'</td>'+  
          '<td style="text-align:left">'+data[i].petugas_lab+'</td>'+   
          '<td style="text-align:left">'+data[i].tanggal_periksa+'</td>'+  
          '<td style="text-align:left">'+data[i].keterangan_pemeriksaan_lab+'</td>'+  
          '<td style="text-align:center"><div class="btn-group">'+ 
          '<a href="<?php echo base_url() ?>laboratorium/detail_laboratorium_pasien/'+data[i].kode_lab+'" class="btn btn-success btn-sm btn-flat item_periksa_pasien "> <i class="fas fa-eye mr-1"></i></a>'+ 
          // '<a href="<?php echo base_url() ?>laboratorium/edit_lab/'+data[i].kode_lab+'" data="'+data[i].kode_lab+'" class="btn btn-info ><i class="fa fa-edit mr-1"></i>Edit Hasil Lab</a>'+
           // '<a href="<?php echo base_url() ?>laboratorium/cetak_lab/'+data[i].kode_lab+'" class="btn btn-dark btn-sm btn-flat item_cetak "  target="_blank"> <i class="fas fa-print mr-1"></i> Cetak</a>'+
          '</td>'+
          '</div></tr>';
          nomor++;
         
        } 
        $('#show_data1').html(html2); 
        set2();
      }

    });
  }
  
  
  $('#show_data').on('click','.item_hapus', function(){
    var kode_lab =$(this).attr('data');

    $('#ModalHapus').modal('show');
    $('[name="kode_lab"]').val(kode_lab);

    return false;

  });

  $('#btn_hapus').on('click',function(){
    var kode_lab=$('#kode_lab').val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('rekam/hapus_data_pasien')?>",
      dataType : "JSON",
      data : {kode_lab: kode_lab},
      success: function(data){
        $('#ModalHapus').modal('hide');
        location.reload();

        tampil_data();
      }
    });
    return false;


  }); 


  

  


</script>













