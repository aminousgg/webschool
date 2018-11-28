<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Widgets
        <small>Preview page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Widgets</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <?php 
                $pesan = 0;
                foreach($contact as $u){
                  $pesan++;
                } 
                ?>
              <span class="info-box-text">Messages</span>
              <span class="info-box-number"><?php echo $pesan; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <?php 
                $evn = 0;
                foreach($event as $u){
                  $evn++;
                } 
                ?>
              <span class="info-box-text">Event</span>
              <span class="info-box-number"><?php echo $evn; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <?php 
                $berita = 0;
                foreach($news as $u){
                  $berita++;
                } 
                ?>
              <span class="info-box-text">Berita</span>
              <span class="info-box-number"><?php echo $berita; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <?php 
                $daftar = 0;
                foreach($pendaftaran as $u){
                  $daftar++;
                } 
                ?>
              <span class="info-box-text">Likes</span>
              <span class="info-box-number"><?php echo $daftar; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
</div>
</section>

    <!-- /.content -->
  </div>