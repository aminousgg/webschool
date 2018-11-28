  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Berita
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
            <?php echo form_open_multipart('admin/tambah_news', array('role' => 'form'))?>
            <!-- <form role="form" action="tambah_news" method="post"> -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="date" name="tanggal" placeholder="" value="<?php echo isset($itemOutData->date_out) ? set_value('date_out', date('m/d/Y', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" name="gambar" id="exampleInputFile">
                  <p class="help-block">.JPG</p>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Berita</label>
                  <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Isi Berita</label>
                  <textarea name="isi" class="form-control" cols="40" rows="4" required></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Sumber</label>
                  <input type="text" name="sumber" class="form-control" id="exampleInputEmail1" placeholder="Judul" required>
                </div>
                
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
            </form>
          </div>
          <!-- /.box -->

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>