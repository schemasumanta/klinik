<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">TAMPILAN REKAM MEDIK IMUNISASI</h4>
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
            <a href="#">Rekam Medik IMUNISASI</a>
          </li>
        </ul>
      </div>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header"> 
                <h2 style="font-weight: bold">BACKUP DTABASE</h2>
                <hr style="background-color:green">

                <div class="panel-body">
                  <form class="form-horizontal" method="post" action="<?php echo base_url();?>sutilitas/restoredb" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label col-sm-2"> Restore Database</label>
                      <div class="col-sm-6"> 
                        <input  type="file" name="datafile" id="datafile" /><hr>
                        <button type="submit" class="btn btn-primary" >Upload Database</button>


                      </div>
                    </div>
                  </form>
                </div>

              </div>  

            </div> 
          </div>




        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</div>
</div>
</div> 













