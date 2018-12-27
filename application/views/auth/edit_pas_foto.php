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
          <!-- $attributes = array('class' => 'email', 'id' => 'myform'); -->
          <?php echo form_open('auth/edit_foto_in'); ?>
              <!--  -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-md-6">
                  <fieldset disabled>
                    <label for="inputCity">Asal Sekolah</label>
                    <input type="text" value="<?php echo $record['sekolah'] ?>" name="asal_sekolah" class="form-control" id="inputCity">
                  </fieldset>
                  </div>
                  <div class="form-group col-md-6">
                  <fieldset disabled>
                    <label for="inputState">Tahun Lulus</label>
                    <select id="inputState" name="tahun_lulus" class="form-control">
                      <option value="<?php $record['tahun_lulus']?>"><?php echo $record['tahun_lulus']?></option>
                      <option value=2014>2014</option>
                      <option value=2015>2015</option>
                      <option value=2016>2016</option>
                      <option value=2017>2017</option>
                      <option value=2018>2018</option>
                    </select>
                  </fieldset>
                  </div>
                </div>
              </div>
            </div>
              <!-- form file upload -->
            <div class="row">
              <div class="col-md-6">
                <div class="boxfile">
                  <!-- COMPONENT START -->
                  <fieldset disabled>
                    <label for="inputZip">KK *pdf</label>
                    <div class="input-group input-file" name="kk">
                      <span class="input-group-btn">
                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" class="form-control" value="<?php echo $record['kk'] ?>" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  </fieldset>
                  <!-- COMPONENT END -->
                  <!--  -->
                  <!-- COMPONENT START -->
                  <fieldset disabled>
                    <label for="inputZip">Ijasah *pdf</label>
                    <div class="input-group input-file" name="ijasah">
                      <span class="input-group-btn">
                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" class="form-control" value="<?php echo $record['ijasah'] ?>" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  </fieldset>
                  <!-- COMPONENT END -->
                  <!--  -->
                  <!-- COMPONENT START -->
                  <fieldset disabled>
                    <label for="inputZip">SKHU *pdf</label>
                    <div class="input-group input-file" name="skhu">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" class="form-control" value="<?php echo $record['skhu'] ?>" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  </fieldset>
                  <!-- COMPONENT END --> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="boxfile">
                    Upload Pas Foto
                    <div class="boxfileupload">
                      <span class="btn btn-secondary btn-file">
                                <input type="hidden" name="foto" value="<?php echo $record['pas_foto'] ?>">
                          Browse <input type="file" name="file" id="file">
                      </span>
                      <div id="gambar"><img src="<?php echo base_url() ?>berkas/pas_foto/<?php echo $record['pas_foto'] ?>" width="100px" height="100px" /></div>
                  </div>
                </div>
                </div>
              </div>
                <div class="posisi_submit">
                    <button type="submit" name="tambah" value="upload" class="btn btn-primary float-right">Update</button>
                </div>
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

    function filePreview(input) {
      if(input.files&&input.files[0]){
        var tipefile=/.\.(gif|jpg|png|jpeg)$/i;
        var namafile=input.files[0]['name'];
        var ukuran=input.files[0]['size'];

        if (!tipefile.test(namafile)){
          $('#gambar').html('Only images are allowed!');
        }
        else if (ukuran > 500000){
          $('#gambar').html('Your file is too big! Max allowed size is: 500KB');
        }
        else{
          var reader = new FileReader();
          reader.onload=function(e){
            $('#uploadForm + img').remove();
            $('#gambar').html('<img src="'+e.target.result+'" width="100px" height="100px" />')
          }
          reader.readAsDataURL(input.files[0]);
        }

      }
    }
    $('#file').change(function(){
      filePreview(this);
    });

  </script>   

</body>
</html>