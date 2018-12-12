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
            <?php echo form_open('auth/edit_bio_in'); ?>
              <!-- Input nama -->
              <div class="form-row">
                <div class="col">
                    <label for="exampleInputEmail1">Nama depan</label>
                    <?php 
                        $name= explode(" ", $record['nama']);
                        $name2=$name[count($name)-1];

                        $last_space_position = strrpos(($record['nama']), ' ');
                        $name1 = substr(($record['nama']), 0, $last_space_position);
                    ?>

                    <input type="text" name="nama" value="<?php echo $name1;?>" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1">Nama belakang</label>
                    <input type="text" name="nama1" value="<?php echo $name2;?>" class="form-control" placeholder="Last name">
                </fieldset>
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
                    <?php
                        if($record['gender']=="L"){
                            echo "
                            <option value='L' selected>Laki-laki</option>
		                    <option value='P'>Perempuan</option>
                            ";
                        }else{
                            echo "
                            <option value='L'>Laki-laki</option>
		                    <option value='P' selected>Perempuan</option>
                            ";
                        }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">NISN</label>
                  <input type="text" name="nisn" value="<?php echo $record['nisn']?>" class="form-control" id="inputCity">
                </div>
              </div>
              <!-- Input TTL -->
              <div class="form-row">
                <div class="col">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" value="<?php echo $record['tempat_lahir']?>" class="form-control" placeholder="Tempat lahir">
                </div>
                <div class="col">
                <fieldset disabled>
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <img class="logo_form" src="<?php echo base_url() ?>assets/asset_form/calendar.png">
                    </div>
                    <input class="form-control" name="tgl_lahir" value="<?php echo $record['tgl_lahir']?>" data-inputmask="'alias':'hh/bb/tttt'" datamask="" type="date">
                  </div>     
                </div>
              </div>
              <!-- Alamat -->
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" value="<?php echo $record['alamat']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">              
              </div>
              <!-- form file upload -->
              <div class="posisi_submit">
                <button type="submit" class="btn btn-primary float-right">Update</button>
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