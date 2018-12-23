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
          <?php echo form_open_multipart('auth/tambah_berkas'); ?>
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
                    <label for="inputZip">Upload ijasah</label>
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
                <div class="boxfile2">

                  <div class="box box-widget widget-user">
                   <!-- Add the bg color to the header using any of the bg-* classes -->
                   <div class="widget-user-header bg-aqua-active">
                     <h3 class="widget-user-username">Alexander Pierce</h3>
                     <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                   </div>
                   <div class="widget-user-image">
                     <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                   </div>
                   <div class="box-footer">
                     <div class="row">
                       <div class="col-sm-4 border-right">
                         <div class="description-block">
                           <h5 class="description-header">3,200</h5>
                           <span class="description-text">SALES</span>
                         </div>
                         <!-- /.description-block -->
                       </div>
                       <!-- /.col -->
                       <div class="col-sm-4 border-right">
                         <div class="description-block">
                           <h5 class="description-header">13,000</h5>
                           <span class="description-text">FOLLOWERS</span>
                         </div>
                         <!-- /.description-block -->
                       </div>
                       <!-- /.col -->
                       <div class="col-sm-4">
                         <div class="description-block">
                           <h5 class="description-header">35</h5>
                           <span class="description-text">PRODUCTS</span>
                         </div>
                         <!-- /.description-block -->
                       </div>
                       <!-- /.col -->
                     </div>
                     <!-- /.row -->
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