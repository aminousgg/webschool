
    <section class="sss">

      <!-- card form -->
      
    <div class="row">
      <div class="col-md-12">
      <div class="atas">
        <img src="<?php echo base_url() ?>assets/asset_form/bg_atas.jpg">
      </div>
      </div>
    </div>

    <div class="row"></div>

          <!-- form card login -->
        <div class="row">
          <div class="col-md-8 mx-auto">
            <div class="row">
              <div class="col-md-8 mx-auto">
                <div class="card rounded-0">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-header">
                        <h3 class="mb-0">Daftar</h3>
                      </div>
                    </div>
                  </div>
                    <?php 
                        if($this->session->flashdata('error')):
                            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                            echo '<script>
                                    swal({
                                        type: "'.'error'.'",
                                        title: "'.$this->session->flashdata('error').'",
                                        text: "'.'Mohon Maaf! Hanya Email berdomain gmail.com dan yahoo.com yang bisa Mendaftar'.'",
                                        timer: 10000,
                                        customClass: "'.'animated bounceIn'.'",
                                        })
                                  </script>';
                        endif;
                        if($this->session->flashdata('double_data')):
                          echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                          echo '<script>
                                  swal({
                                      type: "'.'error'.'",
                                      title: "'.$this->session->flashdata('double_data').'",
                                      text: "'.'Email sudah didaftarkan'.'",
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
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                        <div class="box">
                            <?php echo form_open('auth/prosesregister', array('id' => 'commentForm')); ?>
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
                              <div>
                                <?php 
                                $data = array('type' => 'password', 'id' => 'password1', 'name' => 'password1', 'value' => set_value('password1'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'password tidak valid'".')', 'oninput' => 'setCustomValidity('."''".')'); 
                                echo form_input($data);
                                ?>
                                <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                                <!-- <input type="password" name="password1" required=""> -->
                                <label id="c">Confirm Password</label>
                              </div>
                              <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Sign up</button>
                            <?php echo form_close(); ?>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8 mx-auto">
                          <p align="center" style="margin-bottom: 10px;">
                          Sudah punya akun? <a href="<?php echo base_url().'web/login' ?>"><b>Login!</b></a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--/card-->
                </div>
              </div>
            </div>
          </div>
        <!-- /form card login -->
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
    
    <script type="text/javascript">
      var password = document.getElementById("password")
        , confirm_password = document.getElementById("password1");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }

      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>