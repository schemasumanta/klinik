      <div id="ModalCetak" style="display: none;">
        <div class=" row cetakan">
          <?php foreach ($perusahaan as $pt): ?>
            
          <?php endforeach ?>
          <div class="col-md-12" style="margin: 0px;padding: 0px;text-align: center;">
            <img src="<?php echo base_url().$pt->logo_pt ?>" style="margin-bottom: 12px;width: 30%;height: auto;filter: grayscale(100%)"> 
            <br>
            <span style="font-size: 10px;"><?php echo $pt->alamat ?>" </span>
            <hr>
            <p style="font-size:18px; text-align: center;  margin-left: 2px;">NOMOR ANTRIAN</p>
            <span  id="print_nomor_antrian" style="font-size: 100px;font-weight: bold;">003</span>
            <hr style="border-top: 1px dashed black;">
          </div>
        </div>
      </div>
      <div class="container mt-5 w-100">
        <style>
          .kotakutama{
            margin-left: 5px;
            width: 20%;
            height: 80px;
            vertical-align: middle;
            border:2px dotted #687b69;
            border-radius: 5px;
            background-color: #ff9c00;
            color: white;
          }
          .jam,.menit,.detik{
          }
          .kotak{
            padding-top: 5px;
            background: #ff6100;
            height:50px;
            font-size: 25px;
            font-weight:bold;

          }
          .counter{
            margin-top: 5px;
          }
        </style>
        <link rel="icon" href="<?php echo base_url() ?>assets/img/logo.png" type="image/x-icon"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
        <!-- Fonts and icons -->
        <script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>assets/css/fonts.min.css']},
            active: function() {
              sessionStorage.fonts = true;
            }
          });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/atlantis.min.css">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.min.css">

        <style type="text/css">
        </style>
        <div class="contentdata w-100">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6"> 
                  <div class="card card-stats card-round">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-12" style="position: absolute;top:0;z-index: 555">
                          <div class="icon-big text-center input-group">
                            <div class="kotakutama">
                              <div class="kotak">
                                <span id="0jam">0</span>
                                <span id="jam"></span>
                              </div>
                              <div class="counter">
                                <span style="font-size: 12px;">Jam</span>
                              </div>

                            </div>
                            <div class="kotakutama">
                              <div class="kotak">
                                <span id="0menit">0</span>
                                <span id="menit"></span>
                              </div>
                              <div class="counter">
                               <span style="font-size: 12px;">Menit</span>
                             </div>
                           </div>
                           <div class="kotakutama">
                            <div class="kotak">
                              <span id="0detik">0</span>
                              <span id="detik"></span>
                            </div>
                            <div class="counter">
                             <span style="font-size: 12px;">Detik</span>
                           </div>
                         </div>


                       </div>
                     </div>
                     <div class="col-12 text-center">
                      <div class="container-antrian ml-3 mr-3" style="border:5px solid #687b69;border-radius: 25px;box-shadow: 5px 10px #888888;padding-top: 55px;margin-bottom: 35px">
                        <h4 class="antrianterakhir" style="font-size: 192;color:#19721c;font-weight: bold;"><?php echo $antrian; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6"  style="height: 100px"> 
              <div class="card">
               <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <center><img src="<?php echo base_url().$pt->logo_pt ?>"  style="width: 20%;height: auto;"> </center><br>
                    <div class="text-center mt-4">
                      <h1 class="h4 mb-4" style="font-size:25px; font-weight: bold; color: #03b509">SELAMAT DATANG<br>DI <?php echo strtoupper($pt->nama_pt); ?>  </h1>
                      <marquee width="70%"><h2>Silahkan Ambil Nomor Antrian Anda!</h2></marquee></div>

                    </div>
                  </div>
                </div>
                <div class="card-body">
                 <div class="row">
                   <div class="col-12 text-center">
                     <button class="btn btn-success btn-lg btn-round" style="letter-spacing: 1px;height: 70px;width:70%;font-size: 25px" id="ambilantrian"><b>AMBIL ANTRIAN</b></button>
                   </div>
                 </div>
               </div>
             </div> 

           </div>
         </div>

       </div>

       <style type="text/css">
        * {  
          font-family: 'Arial';
          font-size: 13px;
        }
        td,
        th,
        tr,
        table {
          border-top: 1px solid black; 
          border-collapse: collapse;
        }  
        .centered {
          text-align: center;
          align-content: center;
          margin-left: 2px;
        }

        .ticket {
          width: 260px;
          max-width: 260px;
          margin-left:0px;
          margin-right: 5px;
        }

        img {
         max-width: 300px;
         height: 50px;
         margin-left: 55px;
       }
       @media print {
         html,body,.modal,.main-panel, #ModalCetak,.modal-dialog,.modal-content,.modal-body{
          padding:0;
          margin: 0;
        }
        *{
          color:black !important;
        }
        #ModalCetak{
          display: block !important;
          position: absolute;
          z-index: 99999999
        }

        .footer,.sidebar,.main-header,.main-panel,.modal-header,.modal-footer,.wrapper,.contentdata{
          display: none;
        }
        .cetakan{
          display: inline-block;
          position: fixed;
          top:10;
          left:30px;
        }
        .hidden-print,
        .hidden-print * {
          display: none !important;
        }
      }

      .judul{
        text-align: left;
        padding-left: 100px;
        font-size: 20px;
      }
    </style>



  </div>

  <script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- <script src="<?php echo base_url() ?>sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>sweetalert/sweetalert-dev.js"></script>  -->


  <script src="<?php echo base_url() ?>assets/js/atlantis.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>

  <!-- <script src="<?php echo base_url() ?>assets/plugins/highcharts/highcharts.js"></script>  -->

  <script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

  

  <script type="text/javascript">
    window.setTimeout("waktu()", 1000);

    function waktu() {
      var waktu = new Date();
      var jam = waktu.getHours();
      var menit = waktu.getMinutes();
      var detik = waktu.getSeconds();
      setTimeout("waktu()", 1000);
      if (jam < 10) {
        $('#0jam').css('display','inline-block');
      }else{
        $('#0jam').css('display','none');
      }
      if (menit < 10) {
        $('#0menit').css('display','inline-block');
      }else{
        $('#0menit').css('display','none');
      }
      if (detik < 10) {
        $('#0detik').css('display','inline-block');
      }else{
        $('#0detik').css('display','none');
      }
      $("#jam").html(jam);
      $("#menit").html(menit);
      $("#detik").html(detik);
    }

    $('#ambilantrian').on('click',function(){
      let antrianterakhir = parseFloat($('.antrianterakhir').html());
      let antrianbaru = parseFloat(antrianterakhir)+1;
      let nomor_antrian='';

      if (antrianbaru <10) {
       nomor_antrian +="00"+antrianbaru;
     }else if(antrianbaru <100){
      nomor_antrian +="0"+antrianbaru;
    }else{
     nomor_antrian+=antrianbaru;
   }
   $.ajax({
    type : "POST",
    url  : "<?php echo base_url('antrian/simpan')?>",
    dataType : "JSON",
    data : {'nomor_antrian': nomor_antrian},
    success: function(data){
      if (data=="1") {
       $('.antrianterakhir').html(nomor_antrian);
       $('#print_nomor_antrian').html(nomor_antrian);
       window.print();
     }else{
      alert('Nomor Antrian Bermasalah, Silahkan Hubungi CS!');
    }
  }
});
   return false;
 })
</script>
