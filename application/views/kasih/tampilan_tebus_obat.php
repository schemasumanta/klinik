<div class="main-panel">
  <div class="content">

   <!-- Content Header (Page header) -->
   <!-- style="width: 100%;" -->
   <section class="content-header" >
    <div class="container-fluid" >
      <div class="row mb-2">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col-sm-6"> 
            </div>
            <div class="col-sm-12"> 

             <!-- Button trigger modal --><!-- 
             <a href="<?php echo site_url('pasien/tambah_pasien') ?>" class="btn btn-success btn-md btn"> Tambah Data Pasien</a>
 -->
             <button id="export" name="export" onclick="refresh()" class=" btn btn-md" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>

           </div>
           <script type="text/javascript">
            function refresh(){
              location.reload();
            }
          </script>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div style="overflow-x:auto;">

            <table  id="example1" class="table table-bordered table-sm " cellspacing="0" width="100%">
              <thead>
                <tr style="background: #5f7cff ;text-align: center; color:white">
                  <!-- <td>Kode</td> -->
                  <th>No</th>
                  <th>Kode Pasien</th> 
                  <th >Nama Pasien</th> 
                  <th width="10%" >Telepon</th> 
                  <th >Alamat</th>   
                  <th width="10%" >Status Pasien</th>  

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
     <!-- /.col -->
   </div>
   <!-- /.row -->
 </section>
 <!-- /.content -->
</div>
</div>

<script type="text/javascript">



  tampil_data();

  function tampil_data(){
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>kasir/tampil_data_pembayaran',
      // async : true,
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        var no=1;
        for(i=0; i<data.length; i++){
                    

          html += '<tr>'+
          '<td style="text-align:center">'+no+'</td>'+
                  '<td style="text-align:center">'+data[i].no_registrasi+'</td>'+ 
                  '<td style="text-align:center">'+data[i].nama_pasien+'</td>'+
                  // '<td style="text-align:center">'+data[i].tempat_lahir+' - '+tgl[2]+' '+bulan+' '+tgl[0]+'</td>'+   
                  '<td style="text-align:center">'+data[i].telepon+'</td>'+ 
                  '<td style="text-align:center">'+data[i].alamat+'</td>'+ 
                  '<td style="text-align:center">'+data[i].status_pasien+'</td>'+ 

                  // '<td style="text-align:center"><img src="'+data[i].foto+'" width="50" height="50"></td>'+ 


                  '<td style="text-align:center"><div class="btn-group">'+ 

                    '<a href="rekam/periksa_pasien/'+data[i].no_registrasi+'" class="btn btn-success btn-sm  btn-flat "style="font-weight: bold;" data="'+data[i].no_registrasi+'" > <i class="fa fa-medis"></i> PERIKSA PASIEN</a>'+' '+ 
                    // '<a href="rekam/cetak_hasil_rekam/'+data[i].no_registrasi+'" class="btn btn-success btn-sm  btn-flat "style="font-weight: bold;" data="'+data[i].no_registrasi+'" > CETAK</a>'+' '+ 


                  '</td>'+

                  '</div></tr>';
                  no++;

                }
                $('#show_data').html(html);

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


  

  


</script>













