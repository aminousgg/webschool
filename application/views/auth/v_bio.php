<?php 
  if($this->session->flashdata('error')):
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.$this->session->flashdata('error').'",
                  text: "'.'mohon mengisi data dg benar'.'",
                  timer: 10000,
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
  if($this->session->flashdata('success')):
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
      echo '<script>
              swal({
                  type: "'.'success'.'",
                  title: "'.$this->session->flashdata('success').'",
                  text: "'.'Silahkan Cek Email Untuk Aktivasi Akun'.'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
 ?>

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
            <?php echo form_open('auth/bio_in'); ?>
              <!-- Input nama -->
              <div class="form-row">
                <div class="col">
                  <label for="exampleInputEmail1">Nama depan</label>
                  <input type="text" name="nama" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                <label for="exampleInputEmail1">Nama belakang</label>
                  <input type="text" name="nama1" class="form-control" placeholder="Last name">
                </div>
              </div>
              <!-- Email -->
              <div class="form-group">
                <fieldset disabled>
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('user')['nama'] ?>">
                </fieldset>
              </div>
              <!-- Gender NISN -->
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Gender</label>
                  <select id="inputState" name="gender" class="form-control">
                    <option value="" hidden="">Jenis Kelamin</option>
					          <option value="L">Laki-laki</option>
					          <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">NISN</label>
                  <input type="text" name="nisn" class="form-control" id="inputCity">
                </div>
              </div>
              <!-- Input TTL -->
              <div class="form-row">
                <div class="col">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir">
                </div>
                <div class="col">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <img class="logo_form" src="<?php echo base_url() ?>assets/asset_form/calendar.png">
                    </div>
                    <input class="form-control" name="tgl_lahir" data-inputmask="'alias':'hh/bb/tttt'" datamask="" type="date">
                  </div>
                </div>
              </div>
              <!-- Alamat -->
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
              </div>
              

              <!-- form file upload -->
              <div class="posisi_submit">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>
            <?php echo form_close(); ?>
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