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
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-12"> 

                 <button id="export" name="export" onclick="refresh()" class=" btn btn-sm" style="background-color: #5f7cff; color: white" ><i class="fas fa-sync-alt" style="margin-right: 10px"></i>Refresh Data</button> 

                 
               </div> 

             </div>





             <!-- /.card-header -->
             <div class="card-body col-md-12">
              <div style="overflow-x:auto;">

                <table  id="example1" class="table table-bordered table-sm " cellspacing="0" width="100%" >
                  <thead>
                    <tr style="background: #5f7cff ;text-align: center; color:white">
                      <!-- <td>Kode</td> -->
                      <th>No</th>
                      <th style="text-align: center;" > Option</th> 
                      <th>Kode Pasien</th>                   
                      <th >No Registrasi</th>
                      <th >Nama Pasien</th>
                      <th >Tanggal Daftar</th>     

                    </tr>

                  </thead>
                  <tbody id="show_data1">
                  </tbody>



                </table>
              </div>
            </div>



          </div> 
        </section> 
      </div>
    </div>
  </div>
</div>
</div>



<script type="text/javascript"> 

 function refresh(){
  location.reload();
}



tampil_data();

function tampil_data(){
  $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>pasien/tampil_kartu',
      // async : true,
      dataType : 'json',
      success : function(data){
        var html = '';
        var i;
        var no=1;
        for(i=0; i<data.length; i++){


         html += '<tr>'+
         '<td style="text-align:center">'+no+'</td>'+ 
         '<td style="text-align:center"><div class="btn-group">'+ 
         '<a  href="pasien/kartu_sehat/'+data[i].kode_pasien+'" class="btn btn-sm btn-success     btn-flat item_edit_user" data="'+data[i].kode_pasien+'"><i class="fa fa-print mr-2"></i> Cetak</a>'+' '+  

                   // '<a href="javascript:;" class="btn btn-danger btn-flat item_hapus_pasien" data="'+data[i].kode_pasien+'"><i class="fa fa-trash"></i></a>'+

                   '</td>'+ 
                   '<td style="text-align:center">'+data[i].kode_pasien+'</td>'+
                   '<td style="text-align:center">'+data[i].no_registrasi+'</td>'+
                   '<td style="text-align:center">'+data[i].nama_pasien+'</td>'+
                   '<td style="text-align:center">'+data[i].tanggal_daftar+'</td>'+    


                   '</div></tr>';
                   no++;

                 }
                 $('#show_data1').html(html);

                 set2();

               }

             });
}














</script>













