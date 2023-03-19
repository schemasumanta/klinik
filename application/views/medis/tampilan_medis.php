<div class="main-panel">
    <div class="content">
      <div class="page-inner">
        <div class="page-header">
          <h4 class="page-title">LIST DATA MEDIS</h4>
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
              <a href="<?php echo site_url('medis') ?>">medis</a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="#">List Data Medis</a>
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
             <a href="<?php echo site_url('medis/tambah_data_medis') ?>" class="btn btn-success btn-sm btn"> <i class="fa fa-plus"></i> Tambah Data Medis</a>
              
             <button id="export" name="export" onclick="refresh()" class=" btn btn-sm" style="background-color: #5f7cff; color: white;"><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>

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
                  <th>ID Dokter</th>
                  <th >Nama Dokter</th>
                  <th >Jenis Kelamin</th>
                  <th >Tempat Tanggal Lahir</th>
                  <th >Jabatan</th>
                  <th >No Telepon</th>
                  <th >Alamat</th>
                  <!-- <th >Foto</th> -->



                  <th style="text-align: center;" width="10%" >Option</th>
                </tr>

              </thead>
              <tbody id="show_data">
              </tbody>



            </table>
          </div>
        </div>

      <!--   <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#f25961; color: white">
          <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fa fa-trash"></i> Hapus</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

        </div>
        <form class="form-horizontal">
          <div class="modal-body">

            <input type="hidden" name="kode_medis" id="kode_medis" value="">  
            <div class="alert alert-danger"><p>Hapus Data..?</p></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
            <button class="btn_hapus btn btn-danger btn-flat" id="btn_hapus"><i class="fas fa-trash-alt"></i> Hapus</button>
          </div>


        </form>
      </div>
    </div>
  </div> -->

   <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background: #f25961;">
                <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif;color: #ffffff "><i class="fa fa-trash"></i> Hapus</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

              </div>
              <form class="form-horizontal">
                <div class="modal-body">

                  <input type="hidden" name="kode_medis" id="kode_medis" value="">  
                  <div class="alert alert-danger"><p>Apakah Data Medis Akan di Hapus..?</p></div>
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

<script type="text/javascript">
 

  tampil_data();

  function tampil_data(){
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>medis/tampilan_medis',
      // async : true,
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        var no=1;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
          '<td style="text-align:center">'+no+'</td>'+
          '<td style="text-align:center">'+data[i].kode_medis+'</td>'+
          '<td style="text-align:center">'+data[i].nama_medis+'</td>'+ 
          '<td style="text-align:center">'+data[i].jk+'</td>'+
          '<td style="text-align:center">'+data[i].tempat+','+data[i].tanggal_lahir+'</td>'+ 
          '<td style="text-align:center">'+data[i].jabatan+'</td>'+
          '<td style="text-align:center">'+data[i].telepon+'</td>'+ 
          '<td style="text-align:center">'+data[i].alamat+'</td>'+
          // '<td style="text-align:center"><img src="'+data[i].foto+'" width="50" height="50"></td>'+ 
           

          '<td style="text-align:center"><div class="btn-group">'+
          '<a href="<?php echo base_url() ?>medis/edit_medis/'+data[i].kode_medis+'" class="btn btn-sm btn-success  btn-flat edit" data="'+data[i].kode_medis+'"><i class="fa fa-edit"></i></a>'+' '+
          '<a href="javascript:;" class="btn btn-sm btn-info  btn-flat detail" data="'+data[i].kode_medis+'"><i class="fas fa-eye"></i></a>'+' '+
 
          '<a href="javascript:;" class="btn btn-sm btn-danger  btn-flat item_hapus_medis" data="'+data[i].kode_medis+'"><i class="fa fa-trash"></i></a>'+

          '</div></td>'+

          '</tr>';

        }
        $('#show_data').html(html);

        set();

      }

    });
  }

  $('#show_data').on('click','.item_hapus_medis',function(){
            var kode_medis=$(this).attr('data');
            
            $('#ModalHapus').modal('show');
            $('[name="kode_medis"]').val(kode_medis);

            return false;
          });


          $('#btn_hapus').on('click',function(){
            var kode_medis=$('#kode_medis').val();
            $.ajax({
              type : "POST",
              url  : "<?php echo base_url('index.php/medis/hapus_data_medis')?>",
              dataType : "JSON",
              data : {kode_medis: kode_medis},
              success: function(data){
                $('#ModalHapus').modal('hide');
                location.reload();

                tampil_data();
              }
            });
            return false;


          }); 

 

</script>













