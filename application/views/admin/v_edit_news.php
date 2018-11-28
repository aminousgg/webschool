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
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form> -->
            <?php echo form_open_multipart('admin/news_edit_in', array('role' => 'form'))?>
            <!-- <form role="form" action="tambah_news" method="post"> -->
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $record['id']?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <!-- <input type="date" name="tanggal" placeholder="" value="<?php //echo isset($itemOutData->date_out) ? set_value('date_out', date('m/d/Y', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>" class="form-control" required> -->
                  <input type="date" name="tanggal" placeholder="" value="<?php echo $record['tanggal'] ?>" required>
                </div>

                <!-- <div class="form-group">
                  <label for="exampleInputFile">Gambar</label> -->
                  <!-- <input type="file" name="gambar" id="exampleInputFile"> -->
                  <!-- <img src="<?php echo base_url().'assets/img/'.$record['gambar'] ?>" width="40" height="40" class="img-responsive"> -->
                <!-- <input name="gambarlama" type="hidden" value="<?php echo $record['gambar'] ?>"> -->
                <!-- <input type="file" name="gambar" id="gambar" value="<?php echo $record['gambar'] ?>"> -->

                  <!-- <p class="help-block">.JPG</p> -->
                <!-- </div> -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Berita</label>
                  <input type="text" name="judul" class="form-control" id="exampleInputEmail1" value="<?php echo $record['judul'] ?>" placeholder="Judul" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Isi Berita</label>
                  <textarea name="isi" class="form-control" cols="40" rows="4" required><?php echo $record['isi'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Sumber</label>
                  <input type="text" name="sumber" class="form-control" id="exampleInputEmail1" value="<?php echo $record['sumber'] ?>" placeholder="sumber" required>
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
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Gambar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form> -->
            <?php echo form_open_multipart('admin/ubah_gambar', array('class' => 'form-horizontal'))?>
              <div class="box-body">
                
                  <label for="exampleInputFile">Gambar</label>
                  <!-- <input type="file" name="gambar" id="exampleInputFile"> -->
                  <img src="<?php echo base_url().'assets/img/'.$record['gambar'] ?>" width="70" height="70" class="img-responsive">
                  <!-- <input name="gambarlama" type="hidden" value="<?php //echo $record['gambar'] ?>"> -->
                <!-- <div class="form-group"> -->
                  <input type="hidden" name="id" value="<?php echo $record['id'];?>">
                  
                  <input type="file" name="gambar" id="gambar" value="<?php echo $record['gambar'] ?>">

                  <p class="help-block">.JPG</p>
                <!-- </div> -->

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
        </div>


      </div>
    </section>
    <!-- /.content -->
  </div>