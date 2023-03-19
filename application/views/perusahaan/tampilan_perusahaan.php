<div class="modal fade" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body listcetak">
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-success btn-sm btn-flat" onclick="window.print()" ><i class="fas fa-print mr-2"></i>Print</button>
        <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> TUTUP</button>

      </div>


    </div>
  </div>
</div>

<style type="text/css">
  input[type="file"]{
    height: 0 !important;
    opacity: 0 !important;
    padding: 0 !important;
    width: 50%;

  }
  .imagecheck-figure > img {
    width: 100%;
  }
</style>
<div class="main-panel">
  <div class="content flashdataperusahaan" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">MASTER DATA PERUSAHAAN</h4>
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
            <a href="<?php echo site_url('perusahaan') ?>">Perusahaan</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Data Perusahaan</a>
          </li>
        </ul>
      </div>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"  >
                <div class="col-sm-6"> 
                </div>
                <?php if ($perusahaan == 0) { ?>

                  <div class="col-sm-12"> 
                    <button id="btn_tambah"class="btn  btn-success btn-sm"> <i class="fa fa-plus "></i> Tambah Data Perusahaan</button>

                  </div>
                <?php } ?>
              </div>

              <div class="card-body"> 
                <div class="table-responsive">
                  <table  id="example1"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
                    <thead>
                      <tr style="background: #03b509 ;text-align: left; color:white">
                        <!-- <td>Kode</td> -->
                        <th>No</th>
                        <th >Nama Perusahaan</th>
                        <th >Alamat Perusahaan</th>
                        <th >Pemilik</th>
                        <th >Telepon</th>
                        <th >Handphone</th>
                        <th >Email</th>
                        <th >Logo PT</th>


                        <th style="text-align: center;" width="10%" >Option</th>
                      </tr>

                    </thead>
                    <tbody id="show_data">
                    </tbody>



                  </table>
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



<!-- Modal -->
<div class="modal fade" id="modal_perusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE DATA PERUSAHAAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="<?php echo base_url()?>perusahaan/update_data_perusahaan" enctype="multipart/form-data" class="updatedata">
        <div class="row">
         <div class="col-md-12 form-group mb-3">
          <label>Nama Perusahaan</label>
          <input type="hidden" class="form-control" id="id_perusahaan"  name="id_perusahaan" required>
          <input type="text" class="form-control" id="nama_pt"  name="nama_pt" required>
        </div>
        <div class="col-md-6 form-group mb-3">
          <label>Pemilik</label>
          <input type="text" class="form-control" id="pemilik_perusahaan"  name="pemilik_perusahaan" required>
        </div>


        <div class="col-md-6 form-group mb-3">
          <label>Email</label>
          <input type="text" class="form-control" id="email"  name="email" required>
        </div>

        <div class="col-md-6 form-group mb-3">
          <label>Telepon</label>
          <input type="text" class="form-control" id="telepon"  name="telepon" required>
        </div>
        <br>

        <div class="col-md-6 form-group mb-3">
          <label>Handphone</label>
          <input type="text" class="form-control" id="handphone"  name="handphone" required>
        </div>

        <div class="col-md-12 form-group mb-3">
          <label>Alamat Perusahaan</label>
          <textarea type="text" class="form-control" id="alamat"  name="alamat" required rows="3"></textarea> 
        </div>
        <div class=" col-md-4 form-group mb-3">
          <input type="hidden" name="lampiran_logolama" id="lampiran_logolama">
          <input type="hidden" name="lampiran_headerlama" id="lampiran_headerlama">
          <input type="hidden" name="lampiran_iconlama" id="lampiran_iconlama">

          <label for="foto-produk mb-3">Logo Perusahaan</label>
          <label class="imagecheck">
            <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="lampiran_logo" id="lampiran_logo" onchange="previewFile(this.id)">
            <figure class="imagecheck-figure">
              <img src="<?php echo base_url('assets/img/img02.jpg');?>" alt="}" class="imagecheck-image" id="preview_lampiran_logo">
            </figure>
          </label>
        </div>

        <div class=" col-md-4 form-group mb-3">
          <label for="foto-produk mb-3">Logo Header</label>
          <label class="imagecheck">
            <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="lampiran_header" id="lampiran_header" onchange="previewFile(this.id)">
            <figure class="imagecheck-figure">
              <img src="<?php echo base_url('assets/img/img02.jpg');?>" alt="}" class="imagecheck-image" id="preview_lampiran_header">
            </figure>
          </label>
        </div>

        <div class=" col-md-4 form-group mb-3">
          <label for="foto-produk mb-3">Icon Perusahaan</label>
          <label class="imagecheck">
            <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="lampiran_icon" id="lampiran_icon" onchange="previewFile(this.id)">
            <figure class="imagecheck-figure">
              <img src="<?php echo base_url('assets/img/img02.jpg');?>" alt="}" class="imagecheck-image" id="preview_lampiran_icon">
            </figure>
          </label>
        </div>

      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        <button type="button" class="btn btn-success" id="btn_update"><b>UPDATE</b></button>
      </div>
    </form>

  </div>
</div>
</div>


<script type="text/javascript"> 

  const notif = $('.flashdataperusahaan').data('title');
  if (notif) {
    Swal.fire({
      title:notif,
      text:$('.flashdataperusahaan').data('text'),
      icon:$('.flashdataperusahaan').data('icon'),
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.close();


      }
    });
  }

  $('#btn_update').on('click',function(){
    $('.updatedata').submit();
  });
  
  function previewFile(id) {
    let file = $('#'+id)[0].files[0];
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      $('#preview_'+id).attr('src',reader.result);
    }, false);
    if (file) {
      reader.readAsDataURL(file);
    }
  }
  tampil_data();
  function tampil_data(){
    $.ajax({
      type  : 'GET',
      url   : '<?php echo base_url()?>perusahaan/data_perusahaan',
      // async : true,
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
          '<td style="text-align:left">'+data[i].id+'</td>'+
          '<td style="text-align:left">'+data[i].nama_pt+'</td>'+
          '<td style="text-align:left">'+data[i].alamat+'</td>'+
          '<td style="text-align:left">'+data[i].pemilik+'</td>'+
          '<td style="text-align:left">'+data[i].telepon+'</td>'+
          '<td style="text-align:left">'+data[i].handphone+'</td>'+
          '<td style="text-align:left">'+data[i].email+'</td>'+
          '<td style="text-align:left"><img src="'+data[i].logo_pt+'" width="50" height="50"></td>'+
          '<td style="text-align:center"><div class="btn-group">'+
          '<a href="javascript:;" class="btn btn-sm btn-outline-success  btn-flat item_edit_perusahaan" data="'+data[i].id+'"><i class="fa fa-edit"></i> Update Data</a>'+' '+
          '</div></td>'+

          '</tr>';

        }
        $('#show_data').html(html);

        set();

      }

    });
  }


  $('#show_data').on('click','.item_edit_perusahaan',function(){
    var id=$(this).attr('data');
    $.ajax({
      type : "GET",
      url  : "<?php echo base_url('perusahaan/edit_perusahaan')?>",
      dataType : "JSON",
      data : {id:id},
      success: function(data){

        $('#modal_perusahaan').modal('show');
        $('.updatedata').attr('action','<?php echo  base_url(); ?>perusahaan/update_data_perusahaan');
        $('#btn_update').html('UPDATE');

        $('#id_perusahaan').val(data[0].id);
        $('#nama_pt').val(data[0].nama_pt);
        $('#alamat').val(data[0].alamat);
        $('#email').val(data[0].email);
        $('#handphone').val(data[0].handphone);
        $('#telepon').val(data[0].telepon);
        $('#pemilik_perusahaan').val(data[0].pemilik);

        if (data[0].logo_pt!='') {
          $('#preview_lampiran_logo').attr('src',data[0].logo_pt);

        }

        if (data[0].logo_header!='') {
          $('#preview_lampiran_header').attr('src',data[0].logo_header);

        }

        if (data[0].favicon!='') {
          $('#preview_lampiran_icon').attr('src',data[0].favicon);

        }

        $('#lampiran_logolama').val(data[0].logo_pt);
        $('#lampiran_headerlama').val(data[0].logo_header);
        $('#lampiran_iconlama').val(data[0].favicon);
      }
    });

      // datatemp(kode_temp);
      return false;
    });


  $('#btn_tambah').on('click',function(){

    $('#modal_perusahaan').modal('show');
    $('.updatedata').attr('action','<?php echo  base_url(); ?>perusahaan/simpan');
        $('#btn_update').html('SIMPAN');

  });
</script>













