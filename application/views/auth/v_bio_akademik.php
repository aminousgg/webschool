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
  if($this->session->flashdata('success_ubah')):
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
      echo '<script>
              swal({
                  type: "'.'success'.'",
                  title: "'.$this->session->flashdata('success').'",
                  text: "'.'Anda telah Mengubah'.'",
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
            <h3 class="mb-0">Data Akademik</h3>
          </div>
            <form>
              <!--  -->
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputState">NISN</label>
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
          <div class="row">
            <div class="col-md-6 float-right">
            
              <div class="form-row">
                <div class="col-md-12">
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
              </div>
                <!--  -->
              <div class="form-row">
                <div class="col-md-12">
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
              </div>
                <!--  -->
              <div class="form-row">
                <div class="col-md-12">
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