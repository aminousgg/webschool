
    <section class="sss">

      <!-- card form -->
      

      <div class="atas">
        <img src="<?php echo base_url() ?>assets/asset_form/bg_atas.jpg">
      </div>
    <div class="row">
      <div class="col-md-8 mx-auto">
          <!-- form card login -->
         <div class="cardlogin">
            <div class="row">
              <div class="col-md-12">
                <div class="card-header">
                    <h3 class="mb-0">Login</h3>
                    <?php        
                    if($this->session->flashdata('error')):
                        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                        echo '<script>
                                swal({
                                    type: "'.'error'.'",
                                    title: "'.$this->session->flashdata('error').'",
                                    timer: 3000,
                                    customClass: "'.'animated bounceIn'.'",
                                })
                            </script>';
                    endif;
                    if($this->session->flashdata('errorpassword')):
                        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                        echo '<script>
                                swal({
                                    type: "'.'error'.'",
                                    title: "'.$this->session->flashdata('errorpassword').'",
                                    text: "'.'Password/email salah'.'",
                                    timer: 10000,
                                    customClass: "'.'animated bounceIn'.'",
                                })
                            </script>';
                    endif;
                    if($this->session->flashdata('belumaktif')):
                        // var_dump($this->session->flashdata('belumaktif')); die();
                        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                        echo '<script>
                                swal({
                                    type: "'.'error'.'",
                                    title: "'.$this->session->flashdata('belumaktif').'",
                                    text: "'.'Akun Anda Belum Aktif'.'",
                                    timer: 10000,
                                    customClass: "'.'animated bounceIn'.'",
                                })
                            </script>';
                    endif;
                  ?>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="box">
                      <?php echo form_open('web/aksi_login', array('id' => 'commentForm')); ?>
                        <div>
                          <?php 
                          $data = array('type' => 'text', 'id' => 'email', 'name' => 'email', 'value' => set_value('email'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Email Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')'); 
                          echo form_input($data);
                          ?>
                          <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                          <!-- <input type="text" name="email" required="email tidak valid"> -->
                          <label id="a">Email</label>
                        </div>
                        <div>
                          <?php 
                          $data = array('type' => 'password', 'id' => 'password', 'name' => 'password', 'value' => set_value('password'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'password Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')'); 
                          echo form_input($data);
                          ?>
                          <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                          <!-- <input type="password" name="password" required=""> -->
                          <label id="b">Password</label>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Sign in</button>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mx-auto">
                    <p align="center" style="margin-bottom: 10px;">
                      Belum punya akun? <a href="<?php echo base_url().'web/pendaftaran' ?>"><b>Daftar!</b></a>
                    </p>
                </div>
              </div>
             <!--/card-block-->
            </div>
        <!-- /form card login -->
      </div>
    </div>    
        <!--/container-->

      <div class="bawah"></div>
      <div class="bawah1">
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
      </div>

      <footer class="container">
        <br>
        <p>&copy; @nur.aminnudin 2018</p>
      </footer>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

</body>
</html>