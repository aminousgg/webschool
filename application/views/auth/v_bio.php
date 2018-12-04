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
</head>
<body>
  

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="col-md-8">
      <img class="logo" src="<?php echo base_url() ?>assets/asset_form/favicon.ico">
    </div>
  <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <div class="col-md-4">
      <div class="float-right">
        <a href="<?php echo base_url() ?>web/logout"><img class="logo_user" src="<?php echo base_url() ?>assets/asset_form/user.png"></a>
      </div>
    </div>
  <!-- </div> -->
  </nav>

  <!-- banner atas -->
    <div class="row">
      <div class="col-md-12">
        <div class="atas">
          <!-- isi image slide disini (OTW) -->
        </div>
      </div>
    </div>

  <!-- isi content -->
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="cardbio_left">
          <div class="card-header">
            <h3 class="mb-0">Biodata</h3>
          </div>
            <form>
              <!-- Input nama -->
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
              <!-- Email -->
              <div class="form-group">
                <fieldset disabled>
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('user')['nama'] ?>">
                </fieldset>
              </div>
              <!-- Input TTL -->
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
              <!-- Alamat -->
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
              </div>
              <!-- Input jenis kelamin, Asal sekolah, Tahun Lulus -->
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

              <!-- form file upload -->
              <div class="form-row">
                <div class="col-md-4">
                  <label for="inputZip">Upload KK</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><img src="<?php echo base_url() ?>assets/asset_form/up.png" width="18px" height="18px"></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
                <!--  -->
                <div class="col-md-4">
                  <label for="inputZip">Upload Ijazah</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><img src="<?php echo base_url() ?>assets/asset_form/up.png" width="18px" height="18px"></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
                <!--  -->
                <div class="col-md-4">
                  <label for="inputZip">Upload SKHU</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><img src="<?php echo base_url() ?>assets/asset_form/up.png" width="18px" height="18px"></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="posisi_submit">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>
            </form>
        </div>
      </div>
      <!-- <div class="col-md-4">
        <div class="cardbio_right">

        </div> -->
    </div>  
        <!--/container-->

  <!-- body background tengah -->
      <div class="bawahbio"></div>
  <!-- footer -->
      <footer class="container">
        <br>
        <p>&copy; @nur.aminnudin 2018</p>
        <br>
      </footer>
    <!-- </section> -->
    

</body>
</html>