<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<?php foreach ($perusahaan as $pt) { ?>
<title><?php echo strtoupper($pt->nama_pt); ?></title>

<!-- Custom fonts for this template-->
  <link rel="icon" href="<?php echo base_url().$pt->logo_pt ?>" type="image/x-icon"/>

<link href="<?php echo base_url() ?>assets_login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url() ?>assets_login/css/sb-admin-2.min.css" rel="stylesheet">
<style>
.badge-online{
  background: #03b509;
  color: #ffffff;
}
</style>
</head>

<body class="bg-gradient" style="background-color: #31ce36; ">  

<div class="container ">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-md-6">


      <div class="card o-hidden border-0 shadow-lg my-5">
              <span class="badge <?php if(strtolower($mode)=='online'){ echo 'badge-online'; }else{ echo 'badge-danger'; } ?>" style="position: absolute;top:8px;right: 10px;width: 100px;font-size: 14px">Mode <?php echo $mode ?></span>

        <div class="card-body p-2">

          <!-- Nested Row within Card Body -->
          <div class="row">

            <div class="col-lg-12">
              <div class="p-4">

                <form  class="user" action="<?php echo site_url('login/ceklogin') ?>"class="sign-in-form"  method="post">
                  <center><img src="<?php echo base_url().$pt->logo_pt ?>"  style=" width:30%;height:auto;"> </center><br>
                  <div class="text-center">
                    <h6  style="font-weight: bold; color: #03b509">SELAMAT DATANG DI </h6><h4 class=" mb-5" style="font-weight: bold; color: #03b509"><?php echo strtoupper($pt->nama_pt); ?></h4>
                  </div>
                   <div class="input-group">
                  <div class="input-group-prepend">
                    <span class=" input-group-text"  style="background-color:#03b509; "><i class="fa fa-user"  style="color:white; "></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg"   id="username" name="username" placeholder="Masukkan Username" autocomplete="off">
                </div>

                   <br>

                  <div class="input-group">
                  <div class="input-group-prepend" >
                    <span class="input-group-text" style="background-color:#03b509; "><i class="fa fa-key" style="color:white; "></i></span>
                  </div>
                  <input type="password" class="form-control form-control-lg"   id="password" name="password" placeholder="Password" autocomplete="off">
                </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <button class="btn btn-lg btn-block " style="background-color: #03b509;color: white"> <i class="fas fa-unlock-alt mr-2"></i> LOGIN</button>
                      
                    </div>
                    <div class="col-md-6">
                      <a class="btn btn-lg btn-block bg-danger text-white"><i class="fa fa-times mr-2"></i>BATAL</a>
                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets_login/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets_login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets_login/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets_login/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php } ?>
