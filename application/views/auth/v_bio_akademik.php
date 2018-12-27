<?php 
  if($this->session->flashdata('error1')):
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.$this->session->flashdata('error').'",
                  text: "'.'extensi file salah'.'",
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
  if($this->session->flashdata('success_bio')):
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
    echo '<script>
            swal({
                type: "'.'success'.'",
                title: "'.$this->session->flashdata('success').'",
                text: "'.'Data telas ditambahkan'.'",
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
                text: "'.'Update success'.'",
                customClass: "'.'animated bounceIn'.'",
                })
          </script>';
  endif;

 ?>
 
  <!-- banner atas -->
    <div class="row">
      <div class="col-md-12">
        <div class="atas" style="background-image: url(<?php echo base_url() ?>assets/background/img_bg_1.jpg);">
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
          <?php $attributes = array('id' => 'uploadForm'); ?>
          <?php echo form_open_multipart('auth/tambah_berkas',$attributes); ?>
              <!--  -->
              <div class="row">
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputState">Tahun Lulus</label>
                    <select id="inputState" name="tahun_lulus" class="form-control">
                      <option value="" hidden>Tahun</option>
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
                  <label for="inputZip">Upload KK</label>
                  <div class="input-group input-file" name="kk">
                    <span class="input-group-btn">
                          <button class="btn btn-default btn-choose" type="button">Choose</button>
                    </span>
                      <input type="text" class="form-control" placeholder='Choose a file...' />
                    <span class="input-group-btn">
                      <button class="btn btn-warning btn-reset" type="button">Reset</button>
                    </span>
                  </div>
                  <!-- COMPONENT END -->
                  <!--  -->
                  <!-- COMPONENT START -->
                    <label for="inputZip">Upload ijasah (tampak depan & belakang) *pdf</label>
                    <div class="input-group input-file" name="ijasah">
                      <span class="input-group-btn">
                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" class="form-control" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  <!-- COMPONENT END -->
                  <!--  -->
                  <!-- COMPONENT START -->
                    <label for="inputZip">Upload SKHU</label>
                    <div class="input-group input-file" name="skhu">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                      </span>
                        <input type="text" class="form-control" placeholder='Choose a file...' />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                      </span>
                    </div>
                  <!-- COMPONENT END --> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="boxfile">
                  Upload Pas Foto
                  <div class="boxfileupload">
                    <span class="btn btn-secondary btn-file">
                        Browse <input type="file" name="file" id="file">
                    </span>
                    <div id="gambar"></div>
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

    // checking file
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