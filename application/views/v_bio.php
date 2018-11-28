<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url() ?>assets/asset_form/favicon.ico">
  <title>Biodata</title>
  <link href="<?php echo base_url() ?>assets/asset_form/dist/css/bootstrap.css" rel="stylesheet">
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <!-- <link href="dist/css/cssform.css" rel="stylesheet"> -->
  <!-- <link href="form-validation.css" rel="stylesheet"> -->
  <!-- Custom styles for this template -->
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->
</head>
<body>
  

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light">


    <div class="col-md-8">
      <img class="logo" src="<?php echo base_url() ?>assets/asset_form/favicon.ico">
    </div>
  <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <div class="col-md-4">
      <a href="<?php echo base_url() ?>web/logout"><img class="logo_user" src="<?php echo base_url() ?>assets/asset_form/user.png"></a>
    </div>
  <!-- </div> -->
  </nav>

    <!-- <div class="container py-5"> -->
          <!-- <div class="row"> -->
              <!-- <div class="col-md-12"> -->
                  <!-- <div class="row"> -->
                      


                  <!-- </div> -->
                  <!--/row-->

              <!-- </div> -->
              <!--/col-->
          <!-- </div> -->
           <!--/row-->
        <!-- </div> -->

    <!-- <section class="sss"> -->

      <!-- card form -->
      
    <div class="row">
      <div class="col-md-12">
        <div class="atas">
          <!-- <img src="<?php echo base_url() ?>assets/asset_form/bg_atas.jpg"> -->
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="cardbio_left">
          <div class="card-header">
            <h3 class="mb-0">Biodata</h3>
          </div>
            <form>

              <div class="form-row">
                <div class="col">
                  <label for="exampleInputEmail1">Nama depan</label>
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                <label for="exampleInputEmail1">Nama belakang</label>
                  <input type="text" class="form-control" placeholder="Last name">
                </div>
              </div>

              <div class="form-group">
                <fieldset disabled>
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </fieldset>
              </div>

              <div class="form-row">
                <div class="col">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" class="form-control" placeholder="Tempat lahir">
                </div>
                <div class="col">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <img class="logo_form" src="<?php echo base_url() ?>assets/asset_form/calendar.png">
                    </div>
                    <input class="form-control" data-inputmask="'alias':'hh/bb/tttt'" datamask="" type="date" name="tanggal" id="">
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputState">Gender</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">Asal Sekolah</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Tahun lulus</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>

              <div class="posisi_submit">
                <button type="submit" class="btn btn-primary float-right">Next</button>
              </div>
            </form>
        </div>
      </div>
      <!-- <div class="col-md-4">
        <div class="cardbio_right">

        </div> -->
      </div>
    </div>  
        <!--/container-->

      <div class="bawahbio"></div>
      <!-- <div class="bawah1">
        <img src="<?php echo base_url() ?>assets/asset_form/icon-register.png">
        <img src="<?php echo base_url() ?>assets/asset_form/logo_email.png">
        <img src="<?php echo base_url() ?>assets/asset_form/if_login.png">
        <div>
          <p>Registrasi Menggunakan email yang aktif</p>
        </div>
        <div>
          <p>Cek email anda untuk konfirmasi</p>
        </div>
        <div>
          <p>Setelah konfirmasi, anda sudah dapat login dan melengkapi berkas-berkas</p>
        </div>
      </div> -->

      <footer class="container">
        <br>
        <p>&copy; @nur.aminnudin 2018</p>
      </footer>
    <!-- </section> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

</body>
</html>