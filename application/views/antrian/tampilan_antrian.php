<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
      position: relative;
      margin-top: -15px
    }
    body{
      margin: 0;
      padding: 0;
      height: 100%
    }
  </style>
  <?php foreach ($perusahaan as $pt) { ?>

    <link rel="icon" href="<?php echo base_url().$pt->logo_pt ?>" type="image/x-icon"/>
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

    <title>ANTRIAN <?php echo strtoupper($pt->nama_pt); ?></title>
  </head>
  <body>

    <style type="text/css">
    </style>
    <div class="contentdata">
      <div class="card" >
        <div class="card-body" style="position: relative;">
          <div class="row">
            <div class="col-md-6"> 
              <div class="card card-stats card-round" style="height: 500px">
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
                  <div class="container-antrian ml-3 mr-3" style="border:5px solid #687b69;border-radius: 25px;box-shadow: 5px 10px #888888;padding-top: 55px;margin-bottom: 35px;height: 400px">
                    <h4 class="antrianterakhir" style="font-size: 195px;color:#19721c;font-weight: bold;"><?php echo $antrian; ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6"> 
          <div class="card">
            <div class="card-body">
             <div class="row">
               <div class="col-12 text-center" style="height: 460px">
                 <video width="100%" controls preload autoplay loop muted id="myvideo" style="max-height: 460px">

                  <?php foreach ($video as $v): ?>
                    
                    <source src="<?php echo base_url().$v->foto?>" type="video/mp4">
                      
                    <?php endforeach ?>
                  </video>

                </div>
              </div>
            </div>
          </div> 

        </div>

        <div class="col-md-12 mt-3">

          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php $i=0; foreach ($slider as $sld): ?>
              <?php if ($i==0) {?>

                <div class="carousel-item active">

                <?php }else{ ?>

                  <div class="carousel-item">
                  <?php } ?> 

                  <img class="d-block w-100" src="<?php echo base_url().$sld->foto ?>" alt="Second slide">


                </div>

                <?php $i++; endforeach ?>

              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon bg-info" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon bg-info" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


          
        </div>


      </div>


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

    $(document).ready(function () {
      refresh_antrian();
    });

    var i = 1;
    function refresh_antrian() {
      $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url()?>antrian/tunggu_antrian',
        dataType : 'json',
        success : function(data){
          $('.antrianterakhir').html(data);
        }

      });
    }

    var reloadXML = setInterval(refresh_antrian, 2000);

  </script>
<?php } ?>
</body>
</html>
