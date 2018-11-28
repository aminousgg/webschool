  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Pendaftar
        <small>news form</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('admin/pendaftaran_edit_in', array('role' => 'form'))?>
            <!-- <form role="form" action="tambah_news" method="post"> -->
              <div class="box-body">
                <input name="id" type="hidden" value="<?php echo $record['id'] ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input name="nama" class="form-control" type="text" value="<?php echo $record['nama'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option value="<?php echo $record['gender'] ?>" hidden=""> <?php echo $record['gender'] ?> </option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tempat Lahir</label>
                  <input name="tempat_lahir" class="form-control" type="text" value="<?php echo $record['tempat_lahir'] ?>" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea name="alamat" class="form-control" cols="40" rows="6" required><?php echo $record['alamat'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Asal sekolah</label>
                    <input name="asal_sekolah" class="form-control" type="text" value="<?php echo $record['asal_sekolah'] ?>">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Lulus</label>
                    <select name="tahun_lulus" class="form-control">
                        <option value="<?php echo $record['tahun_lulus'] ?>" hidden=""><?php echo $record['tahun_lulus'] ?></option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                      </select>
                </div>
                <input name="password" type="hidden" value="<?php echo $record['password'] ?>">
                <input type="hidden" name="username" value="<?php echo $record['username'] ?>">
                <input type="hidden" name="kode_daftar" value="<?php echo $record['kode_daftar'] ?>">
                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box -->

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>