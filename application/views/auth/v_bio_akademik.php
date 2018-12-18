
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
          <!-- $attributes = array('class' => 'email', 'id' => 'myform'); -->
          <?php echo form_open_multipart('auth/tambah_berkas'); ?>
              <!--  -->
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Asal Sekolah</label>
                  <input type="text" name="asal_sekolah" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Tahun Lulus</label>
                  <select id="inputState" name="tahun_lulus" class="form-control">
                    <option hidden value="">Tahun</option>
                    <option value=2014>2014</option>
                    <option value=2015>2015</option>
                    <option value=2016>2016</option>
                    <option value=2017>2017</option>
                    <option value=2018>2018</option>
                  </select>
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
                      <input type="file" name="kk" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
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
                      <input type="file" name="ijasah" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
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
                      <input type="file" name="skhu" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
              <div class="posisi_submit">
                <button type="submit" name="tambah" value="upload" class="btn btn-primary float-right">Submit</button>
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