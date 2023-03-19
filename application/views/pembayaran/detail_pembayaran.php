<div class="main-panel">
  <style type="text/css">

  </style>
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
      </div>


      <div class="row">
        <div class="col-md-12"> 

          <div class="card">
            <form class="form-control" spellcheck="false"  id="formupdate" method="post" action="<?php echo base_url() ?>pembayaran/update_pembayaran">
              <div class="card-header"> 
                <a href="<?php echo site_url('pembayaran') ?>" onclick=kembali(); class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a>
                <i class="fas fa-briefcase-medical mr-3 text-primary"></i><span><b>FORM RINCIAN PEMBAYARAN PASIEN</b></span>
                <?php foreach ($rincikan_pembayaran as $row): ?>

                  <h4 style="font-weight: bold;margin-top: 10px;"><?php echo ucwords($row->kode_rekam);?></h4>                
                <?php endforeach ?>             

                <hr> 

              </div>


              <div class="card-body">  
                <h4 type="button transparent"  style="color:white; background:#f99500;margin-top: 10px;height: 35px; padding-left: 10px; padding-top: 4px;"  ><b>Data Pasien</b></h4>  
                <div class="row" class="collapse" id="customer_collapse"> 


                  <div class="input-group col-md-2 mb-3" style="display: none;">

                    <input type="text" onclick="this.blur()" class="form-control " id="kode_pembayaran" name="kode_pembayaran" value="<?php echo $row->kode_pembayaran ?>"  onkeydown="return false">
                  </div> 
                  <div class="input-group col-md-2 mb-3" style="display: none;">

                    <input type="text" onclick="this.blur()" class="form-control " id="kode_rekam" name="kode_rekam" value="<?php echo $row->kode_rekam ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div> 


                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Kode Pasien</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Momor Registrasi</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="nomor_registrasi" name="nomor_registrasi" value="<?php echo $row->no_registrasi ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Nama Pasien</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="nama_pasien" name="nama_pasien" value="<?php echo $row->nama_pasien ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>
                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Jenis Kelamin</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="jk" name="jk" value=" <?php if ($row->jk=="L") { echo "Laki-Laki"; } else{ echo "Perempuan"; }  ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>
                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Telepon</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="telepon" name="telepon" value="<?php echo $row->telepon ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Tanggal lahir</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tempat_lahir ?>, <?php echo $row->tanggal_lahir ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>  


                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Tanggal Berobat</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="tanggal_berobat" name="tanggal_berobat" value=" <?php echo $row->tanggal_berobat ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div> 
                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Status Pernikahan</span>
                    </div>
                    <input type="text" onclick="this.blur()" class="form-control " id="status_pernikahan" name="status_pernikahan" value="<?php echo $row->status_pernikahan ?>" style="border-color: #03b509;" onkeydown="return false">
                  </div>  





                  <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Alamat </span>
                    </div>
                    <textarea spellcheck="false" type="text" onclick="this.blur()" class="form-control " id="alamat" name="alamat"  onkeydown="return false" rows="3"style="border-color: #03b509;" style="text-decoration-line:none;outline: none;  "><?php echo $row->alamat?></textarea> 
                  </div>

                </div>
                
                  <?php if ($detail_obat!=0): ?>

                <h4 type="button transparent"  style="color:white; background:#f99500;margin-top: 10px;height: 35px; padding-left: 10px; padding-top: 4px;"  ><b>Rincian Obat</b></h4> 

                <div class="row" class="collapse" id="customer_collapse">  

                  <?php foreach ($detail_obat as $key) {?>
                    <div class="input-group col-md-9 mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background: #31ce36;color :white">Nama Obat</span>
                      </div>
                      <input type="text" onclick="this.blur()" class="form-control " id="nama_obat" name="nama_obat" value=" <?php echo $key->nama_obat?>" style="border-color: #03b509;"   onkeydown="return false">

                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background: #03b509;color :white">Ket.</span>
                      </div>
                     <!--  <input onclick="this.blur()"  type="text" class="form-control " id="keterangan" name="keterangan" value="<?php echo $key->keterangan?>" ket=""  onkeydown="return false" style="border-color: #03b509;"> -->

                      <input onclick="this.blur()"  class="form-control" id="satuan_obat" name="satuan_obat" value="<?php echo $key->qty ?> <?php echo $key->satuan_obat."&nbsp; ( ".$key->aturan_pakai." )" ?>" style="border-color: #03b509;"style="border-color: #03b509;"  onkeydown="return false">

                      <input onclick="this.blur()" style="border-color: #03b509;" class="form-control" style="text-align: right;" id="harga_jual" name="harga_jual"  value="<?php echo number_format(($key->harga_jual), 0, ',', '.') ?>" onkeydown="return false" >

                    </div> 

                    <div class="input-group col-md-3 mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background: #31ce36;color :white">Sub Total</span>
                      </div> 
                      <input onclick="this.blur()"  class="form-control"  style="text-align: right;" style="border-color: #03b509;" id="subtotal" name="subtotal"   value="<?php echo number_format(($key->subtotal), 0, ',', '.') ?>"   onkeydown="return false">
                    </div> 

                  <?php } ?>
                  <?php endif ?>

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #06820a;color :white">Biaya Admin</span>
                    </div>
                    <input style="text-align: right;" type="text" class="form-control " id="biaya_admin" name="biaya_admin" onfocusout="SeparatorRibuan(this.value,this.id)" onclick="this.blur()"  value="<?php echo number_format ($row->biaya_admin, 0, ',', '.') ?>" onkeyup="hitung()"  style="border-color: #03b509;" onkeydown="return false"  >
                  </div> 

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #06820a;color :white">Disc (Rp)</span>
                    </div>
                    <input style="text-align: right;" type="text" onclick="this.blur()" class="form-control " id="discount" name="discount" value="<?php echo $row->discount ?>" onkeyup="hitung()" style="border-color: #03b509;" onkeydown="return false"  >
                    <!-- <input style="text-align: right;" type="text" onclick="this.blur()" class="form-control " id="jumlah_discount" name="jumlah_discount" value="<?php echo $row->discount ?>" onkeyup="hitung()" style="border-color: #03b509;" onkeydown="return false" > -->
                  </div> 

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Jasa Dokter</span>
                    </div>
                    <input  style="text-align: right;font-weight: bold;" type="text" onclick="this.blur()" class="form-control " id="upah_dokter" name="upah_dokter" onkeyup="hitung()"  value="<?php echo number_format(($row->upah_dokter), 0, ',', '.') ?>"  style="border-color: #03b509;" onkeydown="return false"  >
                  </div> 

                  <?php if (isset($pemeriksaan_lab)): ?>
                    
                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #03b509;color :white">Pemeriksaan Lab</span>
                    </div>
                    <input onclick="this.blur()"  style="text-align: right;font-weight: bold;border-color: #03b509;" type="text" class="form-control " id="pemeriksaan_lab" name="pemeriksaan_lab" onkeyup="hitung()" value="<?php echo number_format($pemeriksaan_lab, 0, ',', '.') ?>" onkeydown="return false" >
                  </div> 
                  <?php endif ?>
<!-- 

                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: #31ce36;color :white">Total Obat</span>
                    </div>
                    <input style="text-align: right;font-weight: bold;" type="text" onclick="this.blur()" class="form-control " id="total_akhir" name="total_akhir" onkeyup="hitung()"  value="<?php echo number_format(floatval($row->total_akhir)- floatval($row->upah_dokter), 0, ',', '.') ?>"   onkeydown="return false" >
                  </div>  -->


                </div>

                <h4 type="button transparent"  style="color:white; background:#f99500;margin-top: 10px;height: 35px; padding-left: 10px; padding-top: 4px;"  ><b>Tambahan Pemeriksaan</b></h4> 


                <div class="listtambahan">
                  <?php

                  $no=1; foreach ($tambahan as $tambah) { ?>
                  <div class="row listpemeriksaan1 listtindakan">   
                    <div class="input-group col-md-9 mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background: #06820a;color :white">Tindakan <?php echo $no ?></span>
                      </div>
                      <input type="text" onclick="this.blur()" class="form-control " id="tindakan1" name="tindakan1" value="<?php echo $tambah->tindakan_pemeriksaan ?>" placeholder="Masukan Tindakan" onkeydown="return false" >

                    </div>   

                    <div class="input-group col-md-3 mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background: #06820a;color :white">Biaya  <?php echo $no ?></span>
                      </div>
                      <input onclick="this.blur()"  style="text-align: right;" class="form-control" id="pembayaran_tambahan1" name="pembayaran_tambahan1"  onfocusout="SeparatorRibuan(this.value,this.id)"  value="<?php echo  $tambah->biaya_pemeriksaan  ?>" onkeyup="hitung()" placeholder="Masukan Jumlah Biaya" onkeydown="return false" > 

                    </div>  

                  </div> 
                <?php $no++; } ?>
                </div>
                
                <hr>
                <div class="row" class="collapse" id="customer_collapse">   
                  
                  
                  <div class=" col-md-3 mb-3"> 
                      <span class="input-group-text" style="background: #212529;color :white;font-size: 15px;font-weight: bold;letter-spacing: 1px">Total Pembayaran &nbsp;&nbsp;(Rp.)</span> 
                    <input style="text-align: right;font-size: 20px;font-weight: bold;text-align: left;" type="text" onclick="this.blur()" class="form-control " id="total_pembayaran" name="total_pembayaran" value="<?php echo number_format($row->total_pembayaran, 0, ',', '.') ?>"   onkeydown="return false" >
                  </div> 

                  <div class="col-md-3 mb-3">
                   <span class="input-group-text" style="background: #212529;color :white;font-size: 15px;">Tagihan Sebelumnya </span>
                   <input style="text-align: right;font-size: 20px;font-weight: bold; text-align: left;" type="text" onclick="this.blur()" class="form-control " id="tagihan_sebelumnya" name="tagihan_sebelumnya" value="<?php echo number_format($row->tagihan_sebelumnya, 0, ',', '.'); ?>" onkeydown="return false" >
                  </div> 
                  <div class="col-md-3 mb-3">
                   <span class="input-group-text" style="background: #06820a;color :white;font-size: 15px;">Pembayaran</span>
                   <input style="text-align: right;font-size: 20px;font-weight: bold; text-align: left;" type="text" onclick="this.blur()" class="form-control"  onkeyup="hitungtagihan()" onfocusout="SeparatorRibuan(this.value,this.id)"  id="dibayarkan" name="dibayarkan" value="<?php echo number_format ($row->dibayarkan, 0, ',', '.') ?>" onkeydown="return false"  >

                  </div> 
                  <div class="col-md-3 mb-3">
                   <span class="input-group-text labeltagihan" style="background: #212529;color :white;font-size: 15px;">Sisa Tagihan</span>
                   <input style="text-align: right;font-size: 20px;font-weight: bold;" type="text" onclick="this.blur()" class="form-control " id="sisa_tagihan" name="sisa_tagihan" value=" <?php echo number_format(floatval($row->total_pembayaran)+floatval($row->tagihan_sebelumnya)-floatval($row->dibayarkan)+floatval($row->kembalian), 0, ',', '.'); ?>"   onkeydown="return false" >
                  </div> 
                  <div class="col-md-6">


                  </div> 
                    
 
                  
                </div>

                <hr>
                <br> 
              </div>
            </form>
          </div> 

        </div>
      </div>


    </div>


  </div>
  <script type="text/javascript">
    $('#hanyapengobatan').on('click',function(){
      hitungtagihan();

    });
    function hitungtagihan(){

      let hanyapengobatan =$('#hanyapengobatan').prop('checked');

      let total_pembayaran = $('#total_pembayaran').val().toString().replace(/\./g,'');
      let tagihan_sebelumnya = $('#tagihan_sebelumnya').val().toString().replace(/\./g,'');
      let dibayarkan = $('#dibayarkan').val().toString().replace(/\./g,'');
      let sisa=0;
      if (hanyapengobatan==true){

        sisa = parseFloat(total_pembayaran)-parseFloat(dibayarkan);
      }else{
        sisa = parseFloat(total_pembayaran)+parseFloat(tagihan_sebelumnya)-parseFloat(dibayarkan);

      }
      if (sisa==0) {
        $('#sisa_tagihan').val(0);

      }
      if (sisa<0) {
        $('.labeltagihan').html('Kembalian');
        let jumlah = sisa.toString().substring(1);
        SeparatorRibuan(jumlah.toString(),'sisa_tagihan'); 

      }else{
        $('.labeltagihan').html('Sisa Tagihan');
        SeparatorRibuan(sisa.toString(),'sisa_tagihan'); 


      }


    }
    $('#btn_rincikan_pembayaran').on('click',function(){
      let jumlah_tambahan = $('.listtindakan').length;
      let labeltagihan = $('.labeltagihan').html();
      let check = $('#hanyapengobatan').prop('checked');
      let dibayarkan =parseFloat($('#dibayarkan').val().toString().replace(/\./g,''));
      let total = parseFloat($('#total_pembayaran').val().toString().replace(/\./g,''));
      let tagihan_sebelumnya = parseFloat($('#tagihan_sebelumnya').val().toString().replace(/\./g,''));
      let tagihan='';
      let kembalian=0;



      if (labeltagihan =="Kembalian" && check==true){
        tagihan = $('#tagihan_sebelumnya').val().toString().replace(/\./g,'');
        if (dibayarkan > total) {
          kembalian=dibayarkan-total;
        }

        else if(dibayarkan < total){
          kembalian=0;
        }else{
          kembalian=0;

        }
        

      }

      if (labeltagihan =="Kembalian" && check==false){
        tagihan = 0;

        if (dibayarkan > (total+tagihan_sebelumnya)) {
          kembalian=dibayarkan-(total+tagihan_sebelumnya);


        }

        if (dibayarkan < (total+tagihan_sebelumnya)) {
          kembalian=0;
          
        }


      }


      if (labeltagihan =="Sisa Tagihan" && check==true){
        tagihan = parseFloat($('#tagihan_sebelumnya').val().toString().replace(/\./g,''))+parseFloat($('#sisa_tagihan').val().toString().replace(/\./g,''));
        if (dibayarkan > total) {
          kembalian=dibayarkan-total;
        }

        else if(dibayarkan < total){
          kembalian=0;
        }
        

      }

      if (labeltagihan =="Sisa Tagihan" && check==false){
        tagihan = parseFloat($('#sisa_tagihan').val().toString().replace(/\./g,''));
        
        if (dibayarkan > (total+tagihan_sebelumnya)) {
          kembalian=dibayarkan-(total+tagihan_sebelumnya);


        }

        if (dibayarkan < (total+tagihan_sebelumnya)) {
          kembalian=0;
        }


      }


      let link = $('#formupdate').attr('action');
      let linkbaru =link+'/'+jumlah_tambahan+'/'+tagihan+'/'+kembalian;
      $('#formupdate').attr('action',linkbaru);
      $('#formupdate').submit();
    });
    function kembali(){
      window.location.href="<?php echo site_url('pembayaran') ?>";
    }
    function tambahpemeriksaan(kode) {
      let kode_baru =parseFloat(kode)+1;
      let tindakan = $('#tindakan'+kode).val();
      if (tindakan=='') {
        alert('Silahkan isi baris yang Kosong sebelum menambah baris!');
        $('#tindakan'+kode).focus();
        return false;
      }
      let biaya =$('#pembayaran_tambahan'+kode).val();
      if (tindakan!='' && biaya==0) {
        alert('Silahkan Masukkan Harga!');
        $('#pembayaran_tambahan'+kode).focus();

        return false;
      }

      let html="";

      html+='<div class="row listpemeriksaan'+kode_baru+' listtindakan">'+   
      '<div class="input-group col-md-6 mb-3">'+
      '<div class="input-group-prepend">'+
      '<span class="input-group-text" style="background: #06820a;color :white">Tindakan '+kode_baru+'</span></div>'+
      '<input type="text" onclick="this.blur()" class="form-control " id="tindakan'+kode_baru+'" name="tindakan'+kode_baru+'"  placeholder="Masukan Tindakan"></div>'+
      '<div class="input-group col-md-3 mb-3">'+
      '<div class="input-group-prepend">'+
      '<span class="input-group-text" style="background: #06820a;color :white">Biaya '+kode_baru+'</span></div>'+
      '<input  style="text-align: right;" class="form-control" id="pembayaran_tambahan'+kode_baru+'" name="pembayaran_tambahan'+kode_baru+'"  onfocusout="SeparatorRibuan(this.value,this.id)"  value="0" onkeyup="hitung()" placeholder="Masukan Jumlah Biaya"></div> '+
      '<div class="input-group btngroup'+kode_baru+' col-md-3 mb-3">'+
      '<button id="tambahpemeriksaan'+kode_baru+'" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahpemeriksaan('+kode_baru+')">+</button>'+
      '<button id="tambahpemeriksaan'+kode_baru+'" type="button" class="btn btn-sm btn-danger mr-2" onclick="hapuspemeriksaan('+kode_baru+')">-</button>'+

      '</div></div>';

      $('.listtambahan').append(html);
      $('.btngroup'+kode).css('display','none');

    }

    function hapuspemeriksaan(kode){
      let kode_lama = parseFloat(kode)-1;
      $('.listpemeriksaan'+kode).remove();
      $('.btngroup'+kode_lama).css('display','');


    }
  </script>

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

    // $(document).ready(function(){
    //   hitung();
    // });

    function hitung(){ 

      let biaya_tambahan =0;
      let jumlah_tambahan = $('.listtindakan').length;
      for (var i=1; i <= jumlah_tambahan; i++) {

        biaya_tambahan+=parseFloat($('#pembayaran_tambahan'+i).val().toString().replace(/\./g,''));
      }
      var total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
      var upah_dokter = $('#upah_dokter').val().toString().replace(/\./g,'');
      var biaya_admin = $('#biaya_admin').val().toString().replace(/\./g,'');



      var discount = $('#discount').val().toString().replace(/\./g,'');

      var total_pem =parseFloat(total_akhir) + parseFloat(upah_dokter) + parseFloat(biaya_admin) +biaya_tambahan;
      var dsc = total_pem * (discount /100 ); 


      var total_pembayaran = 0;
      total_pembayaran += total_pem - dsc;
      SeparatorRibuan(dsc.toString(),'jumlah_discount');  

      if (!isNaN(total_pembayaran)) {
        if (discount<100) {
          SeparatorRibuan(total_pembayaran.toString(),'total_pembayaran');
        }else{
          $('#total_pembayaran').val(0);
        }
      } 

      hitungtagihan();

    }





  </script>
