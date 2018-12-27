
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
          <?php echo form_open_multipart('auth/edit_berkas_in'); ?>
              <!--  -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Asal Sekolah</label>
                    <input type="text" value="<?php echo $record['sekolah'] ?>" name="asal_sekolah" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputState">Tahun Lulus</label>
                    <select id="inputState" name="tahun_lulus" class="form-control">
                      <option value="<?php $record['tahun_lulus']?>"><?php echo $record['tahun_lulus']?></option>
                      <option value=2014>2014</option>
                      <option value=2015>2015</option>
                      <option value=2016>2016</option>
                      <option value=2017>2017</option>
                      <option value=2018>2018</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
              <!-- form file upload -->
            <div class="row">
              <div class="col-md-6">
                <div class="boxfile">
                  <!-- COMPONENT START -->
                    <label for="inputZip">Upload KK *pdf</label>
                    <div class="input-group input-file" name="kk">
                      <span class="input-group-btn">
                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" name="kk" class="form-control" value="<?php echo $record['kk'] ?>" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  <!-- COMPONENT END -->
                  <!--  -->
                  <!-- COMPONENT START -->
                    <label for="inputZip">ijasah *pdf</label>
                    <div class="input-group input-file" name="ijasah">
                      <span class="input-group-btn">
                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" name="ijasah" class="form-control" value="<?php echo $record['ijasah'] ?>" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  <!-- COMPONENT END -->
                  <!--  -->
                  <!-- COMPONENT START -->
                    <label for="inputZip">SKHU *pdf</label>
                    <div class="input-group input-file" name="skhu">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" name="skhu" class="form-control" value="<?php echo $record['skhu'] ?>" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  <!-- COMPONENT END --> 
                </div>
              </div>
              <div class="col-md-6">
                <label style="margin-top: 10px;">Kode</label>
                <div class="boxprofile">
                  <div class="sicard">
                      <div class="firstinfo"><img src="<?php echo base_url() ?>berkas/pas_foto/<?php echo $record['pas_foto'] ?>" />
                          <div class="profileinfo">
                              <h2><?php echo $ambil['nama'] ?></h2>
                              <h3>Kode Daftar</h3>
                              <p class="bio"><h2><b><?php echo $record['kode_daftar'] ?></b></h2></p>
                          </div>
                      </div>
                  </div>
                </div>

              </div>
            </div>  

            <div class="posisi_submit">
              <button type="submit" name="tambah" value="upload" class="btn btn-primary float-right">Ubah</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

  <!-- body background tengah -->
    <div class="bawahbio">
      
    </div>
  <!-- footer -->
      <footer class="container">
        <br>
        <p>&copy; @nur.aminnudin 2018</p>
        <br>
      </footer>
    <!-- </section> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    function bs_input_file() {
      $(".input-file").before(
        function() {
          if ( ! $(this).prev().hasClass('input-ghost') ) {
            var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
            element.attr("name",$(this).attr("name"));
            element.change(function(){
              element.next(element).find('input').val((element.val()).split('\\').pop());
            });
            $(this).find("button.btn-choose").click(function(){
              element.click();
            });
            $(this).find("button.btn-reset").click(function(){
              element.val(null);
              $(this).parents(".input-file").find('input').val('');
            });
            $(this).find('input').css("cursor","pointer");
            $(this).find('input').mousedown(function() {
              $(this).parents('.input-file').prev().click();
              return false;
            });
            return element;
          }
        }
      );
    }
    $(function() {
      bs_input_file();
    });
  </script>   

</body>
</html>