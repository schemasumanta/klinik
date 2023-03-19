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
             <button id="btn_tambah" class="btn btn-success btn-sm btn-md btn" data-toggle="modal" data-target="#modal_tambah" style="color: white ;margin-right:10px" ><i class="fa fa-plus "></i> Tambah Data User</button>
             <button id="export" name="export" class="btn btn-sm refresh btn-secondary btn-md"  ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button>

           </div>
           
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">

            <table  id="tabel_user"  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
              <thead>
                <tr style="background: #03b509 ;text-align: left; color:white">
                  <!-- <td>Kode</td> -->
                  <th>Kode</th>
                  <th >Nama Lengkap</th>
                  <th >User ID</th>
                  <th >Level</th>
                  <th >Tarif</th>
                  <th >Status</th>
                  <th >Photo</th>


                  <th style="text-align: center;" width="10%" >Option</th>
                </tr>

              </thead>
              <tbody id="show_data">
              </tbody>



            </table>
          </div>
        </div>

        <!-- modal add -->


        <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambahLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" >

              <div class="modal-header" style="background:  #03b509"> 

                <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "> <i class="fas fa-user"></i> TAMBAH DATA USER KLINIK HMS MEDIKA</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

              </div>

              <div class="modal-body">
               <form method="post">


                 <div class="row "> 
                  <div class="col-md-6"> 
                   <label style="color:#343a40;" for="nama_admin">Nama Lengkap</label>
                   <input type="text" class="form-control" id="nama_admin"  name="nama_admin" required>
                 </div>   

                 <div class="col-md-6">  
                  <label style="color:#343a40;" for="username">Username</label> 
                  <input type="text" class="form-control " id="username"  name="username" required>
                </div> 

              </div>
              <div class="row "> 

               <div class="col-md-5"> 
                <label style="color:#343a40;" for="password">Password</label> 
                <input type="password" class="form-control" id="password"  name="password" required>
              </div> 


              <div class="col-md-1"> 
                <i class="fas fa-eye" type="button" style="color:black;vertical-align: middle; padding-top: 10px ;background:transparent;" onclick="showpassword()" id="tampilkan"></i> 
              </div> 

              <div class="col-md-6"> 
                <label style="color:#343a40;vertical-align:middle;" for="Level">Level User</label> 
                <select type="text" class="form-control" id="level" name="level" required>
                  <option value="0" selected="selected" disabled="disabled">Pilih Level User</option>
                  <option value="superadmin">superadmin</option>
                  <option value="admin">admin</option>
                  <option value="kasir">kasir</option>
                  <option value="dokter">dokter</option>
                  <option value="bidan">dokter</option>
                  <option value="farmasi">farmasi</option>
                  <option value="laboratorium">laboratorium</option>

                </select>   
              </div>
            </div>

            <div class="row">
             <div class="col-md-6"> 
              <label style="color:#343a40;" for="tl">Tempat Lahir</label> 
              <input type="text" class="form-control" id="tempat_lahir"  name="tempat_lahir" required>
            </div>

            <div class="col-md-6">
              <label style="color:#343a40;" for="tgl">Tanggal Lahir</label> 
              <input type="date" class="form-control" id="tanggal_lahir"  name="tanggal_lahir" required>
            </div>
          </div> 

          <div class="row" >  
            <div class="col-md-6"> 
              <label style="color:#343a40;vertical-align:middle;" for="jbt">Jabatan Dokter</label> 
              <input type="text" class="form-control" id="jabatan" name="jabatan" required> 
            </div> 

            <div class="col-md-6"> 
              <label style="color:#343a40;vertical-align:middle;" for="tarif">Tarif</label>  
              <input type="text" class="form-control" id="tarif_dokter" name="tarif_dokter" required> 
            </div> 
          </div>

          <div class="row"> 
            <form method='post' action='' enctype="multipart/form-data"> 
              <div class="col-md-4"> 
                <label style="color:#343a40;" for="foto">Pilih Foto</label> 
                <input type="file"  id="file"  class='form-control' name="file" onchange="cekisi()">   
              </div>
              <div class="col-md-4" style="display: none"> 
                <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
              </div>
            </form> 

            <div class="col-sm-8">
              <img src="#" id="preview" width="100" height="100" style="display: none;">
              <input type="hidden"  id="nama_lampiran"  class='form-control' name="nama_lampiran">   


            </div>

          </div>





              <!-- <div class="form-group row"class="collapse" id="customer_collapse"> 
                <form method='post' action='' enctype="multipart/form-data">
                  <div class="col-sm-4" style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                    <label style="color:#343a40;" for="foto">Pilih Foto</label>
                  </div>
                  <div class="col-sm-4"> 
                    <input type="file"  id="file"  class='form-control' name="file" onchange="cekisi()">   
                  </div>
                  <div class="col-sm-2" style="display: none"> 
                    <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
                  </div>
                </form>

              </div>

              <div class="form-group row"class="collapse" id="customer_collapse">



                <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                  <label style="color:#343a40;vertical-align:middle;" for="Level"></label>
                </div>

                <div class="col-sm-8">
                  <img src="#" id="preview" width="100" height="100" style="display: none;">
                </div>

              </div> -->

              <div class="modal-footer">

                <div class="form-group row"class="collapse" id="customer_collapse">

                  <div class="col-sm-6">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>TUTUP</b></button>

                  </div>

                  <div class="col-sm-6 float-sm-right">
                    <button type="button" class="btn btn-success" id="btn_simpan"><b>TAMBAH</b></button>
                    
                  </div>

                </div>



              </div>
              
            </form>
            


          </div>
        </div>
      </div> 


      <!-- /.card-body -->
    </div>

    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #f25961">
           <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; color: white "><i class="fa fa-trash"></i> Hapus</h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white"><span aria-hidden="true">x</span></button>

         </div>
         <form class="form-horizontal">
          <div class="modal-body">

            <input type="hidden" name="kode" id="kode" value="">  
            <div class="alert alert-danger"><p>Hapus User..?</p></div>

          </div> 
          <button type="button" class="btn btn-secondary btn-flat ml-2 mb-2" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
          <button class="btn_hapus btn btn-danger btn-flat mb-2 " id="btn_hapus"><i class="fas fa-trash-alt"></i> Hapus</button>

          <div class="modal-footer"style="background-color: #f25961">

          </div>


        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_edit_password" tabindex="-1" role="dialog" aria-labelledby="modal_edit_passwordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" >

        <div class="modal-header" style="background: #03b509">
          <h5 id="modal_edit_passwordLabel" style="color: white;font-weight:bold; font: sans-serif;"><i class="far fa-user-circle" style="margin-right: 10px"></i>UBAH PASSWORD USER</h5>
        </div>


        <div class="modal-body">

          <form method="post">


            <div class="form-group row"class="collapse" id="customer_collapse">

              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto;display: none">
                <label style="color:#343a40;" for="kodex">Kode</label>
              </div>
              <div class="col-sm-8">

                <input type="text" class="form-control" id="kodex"  name="kodex" required style="display: none">
              </div>

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">

              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                <label style="color:#343a40;" for="passwordx">Password Baru</label>
              </div>
              <div class="col-sm-7">

                <input type="password" class="form-control" id="passwordx"  name="passwordx" required>
              </div>

              <div class="col-sm-1">
                <i class="fas fa-eye" type="button" style="color:black;vertical-align: middle; padding-top: 10px; background: transparent;" onclick="showpasswordx()" id="tampilkanx"></i>

              </div>

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">



              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                <label style="color:#343a40;" for="confirm">Ulangi Password</label>
              </div>
              <div class="col-sm-7">

                <input type="password" class="form-control" id="confirm"  name="confirm" required>
              </div>

              <div class="col-sm-1">
                <i class="fas fa-eye" type="button" style="color:black;vertical-align: middle; padding-top: 10px; background: transparent;" onclick="showpasswordx2()" id="tampilkanx2"></i>

              </div>

            </div>


          </form>



          <div class="modal-footer">

            <div class="form-group row"class="collapse" id="customer_collapse">

              <div class="col-sm-6">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>TUTUP</b></button>

              </div>

              <div class="col-sm-6 float-sm-right">
                <button type="button" class="btn btn-success" id="btn_ubah"><b>UBAH</b></button>
                
              </div>

            </div>



          </div>
          



        </div>
      </div>
    </div> 


    <!-- /.card-body -->
  </div>

  <!-- MODAL EDIT USER -->
  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" >

        <div class="modal-header" style="background: #03b509">
          <h5 id="modal_editLabel" style="color: white;font-weight:bold;font-family: Century Gothic"><i class="far fa-user-circle" style="margin-right: 10px"></i>EDIT DATA USER</h5>
        </div>


        <div class="modal-body">

          <form method="post">


            <div class="form-group row"class="collapse" id="customer_collapse">

              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto;display: none">
                <label style="color:#343a40;" for="kodex">Kode</label>
              </div>
              <div class="col-sm-8">

                <input type="text" class="form-control" id="kodex"  name="kodex" required style="display: none">
              </div>

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">

              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                <label style="color:#343a40;" for="nama_adminx">Nama Lengkap</label>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_adminx"  name="nama_adminx" required>
              </div>

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">



              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                <label style="color:#343a40;" for="usernamex">Username</label>
              </div>
              <div class="col-sm-8">

                <input type="text" class="form-control" id="usernamex"  name="usernamex" required>
              </div>

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">

             <div class="col-sm-4 "style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
              <label style="color:#343a40;" for="tarif_dokterx">Tarif</label>
            </div>
            <div class="col-sm-8">

              <input type="text" class="form-control" id="tarif_dokterx"  name="tarif_dokterx" required>
            </div>

          </div>
          <div class="form-group row"class="collapse" id="customer_collapse">



            <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
              <label style="color:#343a40;vertical-align:middle;" for="Levelx">Level User</label>
            </div>
            <div class="col-sm-8">

              <select type="text" class="form-control" id="levelx" name="levelx" required> 
                <option value="superadmin">superadmin</option>
                <option value="admin">admin</option>
                <option value="kasir">kasir</option>
                <option value="dokter">dokter</option>
                <option value="bidan">bidan</option>
                <option value="farmasi">farmasi</option>
                <option value="laboratorium">laboratorium</option>


              </select>   

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">

              <form method='post' action='' enctype="multipart/form-data">


                <div class="col-sm-4" style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">

                  <label style="color:#343a40;" for="foto">Pilih Foto</label>
                </div>
                <div class="col-sm-4">

                  <input type="file"  id="filex"  class='form-control' name="filex" onchange="cekisix()">  

                </div>

                <div class="col-sm-2" style="display: none">

                  <input type='button' class='btn btn-info' value='Upload' id='btn_uploadx'>


                </div>
              </form>

            </div>

            <div class="form-group row"class="collapse" id="customer_collapse">



              <div class="col-sm-4"style="text-align: right;margin-top: 5px;font-weight:normal;font-family: roboto">
                <label style="color:#343a40;vertical-align:middle;" for="Level"></label>
              </div>

              <div class="col-sm-8">
                <img src="#" id="previewx" width="100" height="100">
                <input type="hidden"  id="nama_lampiranx"  class='form-control' name="nama_lampiran">  

                <input type="hidden"  id="nama_lampiranlama"  class='form-control' name="nama_lampiran">  
              </div>

            </div>

          </div>



        </form>




        <div class="modal-footer">

          <div class="form-group row"class="collapse" id="customer_collapse">

            <div class="col-sm-6">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><b>TUTUP</b></button>

            </div>

            <div class="col-sm-6 float-sm-right">
              <button type="button" class="btn btn-success" id="btn_update"><b>UPDATE</b></button>

            </div>

          </div>



        </div>




      </div>
    </div>
  </div> 


  <!-- /.card-body -->
</div>


</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
</div>
  <div class="modal fade" id="ModalAktivasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h3 class="modal-title" id="myModalLabel" style=" font: sans-serif; "><i class="fas fa-users"></i> Status User</h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

         </div>
         <form class="form-horizontal">
          <div class="modal-body">

            <input type="hidden" name="kode_user_aktivasi" id="kode_user_aktivasi" value=""> 
            <input type="hidden" name="isi_aktivasi" id="isi_aktivasi" value="">  

            <div class="alert alert-danger"><p class="notif_aktivasi"></p></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-flat mr-2" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
            <button class="btn_aktivasi btn btn-danger btn-flat" id="btn_aktivasi"><i class="fas fa-check mr-2"></i>YA</button>
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


function cekisi(){ 
  var file = $('[name="file"]').val();
  if (file!="") {
    $('#btn_upload').click();

  }
}

function cekisix(){



  var file = $('[name="filex"]').val();
  if (file!="") {
    $('#btn_uploadx').click();

  }
}




$('#btn_upload').click(function(){

  var fd = new FormData();
  var files = $('#file')[0].files[0];
  fd.append('file',files);

    // AJAX request
    $.ajax({
      url   :'<?php echo base_url()?>user/uploadphoto',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){

          let respondata = response.split('assets/img/');
          $("#preview").attr('src',"<?php echo base_url()?>assets/img/"+respondata[1]);
          $("#preview").css('display', "inline-block");
          $("#nama_lampiran").val("assets/img/"+respondata[1]);

        }else{
          alert('file not uploaded');
        }
      }
    });
  });

$('#btn_uploadx').click(function(){

  var fd = new FormData();
  var files = $('#filex')[0].files[0];
  fd.append('file',files);

    // AJAX request
    $.ajax({
      url   :'<?php echo base_url()?>user/uploadphotox',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){

          let respondata = response.split('assets/img/');

          // Show image preview
          // document.getElementById("previewx").setAttribute('src',"http://66.96.238.16/klinikku"+response);
          $("#previewx").attr('src',"<?php echo base_url()?>assets/img/"+respondata[1]);
          $("#previewx").css('display', "inline-block");
          $("#nama_lampiranx").val("assets/img/"+respondata[1]);

        }else{
          alert('file not uploaded');
        }
      }
    });
  });






function showpassword() {
  var tampilkan = document.getElementById("tampilkan");
  var password = document.getElementById("password");

  if (password.type === "password") {
    password.type = "text";
    tampilkan.style.color="green"
  } else {
    password.type = "password";
    tampilkan.style.color="black"

  }
}

function showpasswordx() {
  var tampilkan = document.getElementById("tampilkanx");
  var password = document.getElementById("passwordx");

  if (password.type === "password") {
    password.type = "text";
    tampilkan.style.color="green"
  } else {
    password.type = "password";
    tampilkan.style.color="black"

  }
}

function showpasswordx2() {
  var tampilkan = document.getElementById("tampilkanx2");
  var password = document.getElementById("confirm");

  if (password.type === "password") {
    password.type = "text";
    tampilkan.style.color="green"
  } else {
    password.type = "password";
    tampilkan.style.color="black"

  }
}

$(document).ready(function(){

    dataTable = $('#tabel_user').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('user/tabel_user')?>',
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
     {'data':'nama_admin'},
     {'data':'username'},
     {'data':'level'},
     {'data':'tarif_dokter'},
     {'data':'user_status'},               
     {'data':'foto',orderable:false},
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,3,4,5,6,-1],
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



  $('#btn_aktivasi').on('click',function(){
    var kode=$('#kode_user_aktivasi').val();
    var isi=$('#isi_aktivasi').val();

    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('user/aktivasi_user')?>",
      dataType : "JSON",
      data : {'kode': kode,'isi': isi},
      success: function(data){
        let pesan='';
         if (data) {
          if (isi==1) {
            pesan = "Diaktifkan";
          }else{
            pesan = "DiNonaktifkan";

          }
       Swal.fire({
        title:'Berhasil',

        text:'User Berhasil Di '+ pesan,
        icon:'success'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.close();
      $('#ModalAktivasi').modal('hide');

          location.reload();

        }
      });
    }


      }
    });
    return false;


  });

$('#show_data').on('click','.item_aktivasi_user',function(){
    if ($(this).html().includes('check')) {
      $('.notif_aktivasi').html('Aktifkan User... ?');
      $('#isi_aktivasi').val(1);

    }else{
      $('.notif_aktivasi').html('Nonaktifkan User... ?');
      $('#isi_aktivasi').val(0);
    }

    var kode=$(this).attr('data');
    $('#ModalAktivasi').modal('show');
    $('#kode_user_aktivasi').val(kode);

    return false;
  });


$('#show_data').on('click','.item_edit_user',function(){


  var kode=$(this).attr('data');
  $.ajax({
    type : "GET",
    url  : "<?php echo base_url('user/edit_user')?>",
    dataType : "JSON",
    data : {kode:kode},
    success: function(data){
      $.each(data,function(kode,nama_admin,username,level,tarif_dokter){
        $('#modal_edit').modal('show');
        $('[name="kodex"]').val(data.kode);
        $('[name="nama_adminx"]').val(data.nama_admin);
        $('[name="usernamex"]').val(data.username);
        $('[name="tarif_dokterx"]').val(data.tarif_dokter);

        $('[name="levelx"]').val(data.level).selected;
        $('#previewx').attr('src',data.foto);
        $('#nama_lampiranlama').val(data.foto);




      });
    }
  });

      // datatemp(kode_temp);
      return false;
    });

$('#show_data').on('click','.item_edit_password',function(){


  var kode=$(this).attr('data');
  $.ajax({
    type : "GET",
    url  : "<?php echo base_url('user/edit_user')?>",
    dataType : "JSON",
    data : {kode:kode},
    success: function(data){
      $.each(data,function(kode){
        $('#modal_edit_password').modal('show');
        $('[name="kodex"]').val(data.kode);
      });
    }
  });

      // datatemp(kode_temp);
      return false;
    });



$('#btn_update').on('click',function(){
  var kodex = $('#kodex').val();
  var nama_adminx = $('#nama_adminx').val();
  var usernamex= $('#usernamex').val();
  var levelx= $('#levelx').val();
  var tarif_dokterx=$('#tarif_dokterx').val();
  var fotox=$('#nama_lampiranx').val()!= ""?$('#nama_lampiranx').val():$('#nama_lampiranlama').val(); 

  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('user/update_data_user')?>",
    dataType : "JSON",
    data : {
      'kodex':kodex, 
      'nama_adminx':nama_adminx, 
      'usernamex':usernamex, 
      'levelx':levelx, 
      'tarif_dokterx':tarif_dokterx,
      'fotox':fotox
    },
    success: function(data){
      $('[name="kodex"]').val("");
      $('[name="nama_adminx"]').val("");
      $('[name="usernamex"]').val("");
      $('[name="levelx"]').val("");
      $('[name="previewx"]').attr('src',"");
      if (data) {
       Swal.fire({
        title:'Berhasil',
        text:'Data Berhasil Di Update',
        icon:'success'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.close();
      $('#modal_edit').modal('hide');

          location.reload();

        }
      });
    }

    }
  });
  return false;
});

$('#btn_ubah').on('click',function(){
  var kodex =$('#kodex').val();
  var passwordx=$('#passwordx').val();
  var confirm=$('#confirm').val();

  var x=document.getElementById("passwordx").value;
  var y=document.getElementById("confirm").value;



  if (x!=y){
    alert("Password & Konfirmasi Password Tidak Cocok!");
    $('#passwordx').focus();
    return false;
  }


  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('user/update_password')?>",
    dataType : "JSON",
    data : {kodex:kodex, passwordx:passwordx, confirm:confirm},
    success: function(data){
      $('[name="kodex"]').val("");
      $('[name="passwordx"]').val("");
      $('[name="confirm"]').val("");
      $('[name="levelx"]').val("");


      // alert('Password Berhasil Diubah');


      if (data) {
       Swal.fire({
        title:'Berhasil',
        text:'Password Berhasil Di Update :)',
        icon:'success'


      }).then((result) => {
        if (result.isConfirmed) {
          Swal.close();
    $('#modal_edit_password').modal('hide');
          location.reload();

        }
      });
    } 



  }
});
  return false;
});



$('#show_data').on('click','.item_hapus_user',function(){
  var kode=$(this).attr('data');
  $.ajax({
    type : "GET",
    url  : "<?php echo base_url('user/edit_user')?>",
    dataType : "JSON",
    data : {kode:kode},
    success: function(data){
      $.each(data,function(kode, kode_produk){
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(data.kode);
        $('[name="kode_produk"]').val(data.kode_produk); 
      });
    }
  });


  return false;
});


$('#btn_hapus').on('click',function(){
  var kode=$('#kode').val();
  $.ajax({
    type : "POST",
    url  : "<?php echo base_url('user/hapus_user')?>",
    dataType : "JSON",
    data : {kode: kode},
    success: function(data){
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

    $('#ModalHapus').modal('hide');
    location.reload();

  }
});
  return false;


});





$('#btn_simpan').on('click',function(){


  var nama_admin =$('#nama_admin').val();
  var username =$('#username').val();
  var password =$('#password').val();
  var level= $('#level').val();
  var tempat_lahir= $('#tempat_lahir').val();
  var tanggal_lahir= $('#tanggal_lahir').val();
  var jabatan= $('#jabatan').val();
  var tarif_dokter= $('#tarif_dokter').val();
  var foto=$('#nama_lampiran').val();
    // alert(foto);



    if (password==""){
      alert("password tidak boleh kosong");
      $('#password').focus();
      return false;
    }

    if (nama_admin==""){
      alert("Nama tidak boleh kosong");
      $('#nama_admin').focus();
      return false;
    }if (username==""){
      alert("Username tidak boleh kosong");
      $('#username').focus();
      return false;
    }if (level==""){
      alert("Silahkan Pilih Level!");
      $('#level').focus();
      return false;
    }

    $.ajax({
      type : "POST",
      url  : "<?php echo site_url('user/simpan')?>",
      dataType : "JSON",
      data : {nama_admin:nama_admin, username:username, password:password, level:level,  tempat_lahir:tempat_lahir,  tanggal_lahir:tanggal_lahir,  jabatan:jabatan, tarif_dokter:tarif_dokter,foto:foto},
      success: function(data){ 
        if (data) {
         Swal.fire({
          title:'Berhasil',
          text:'Data Berhasil Di Simpan :)',
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













