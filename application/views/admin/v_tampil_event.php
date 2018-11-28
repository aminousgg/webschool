  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url().'Admin/tambah_event' ?>'"><img src="<?php echo base_url().'assets_lte/tool_icon/add.png' ?>"> Add Event</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>tanggal</th>
                  <th>Penyelenggara</th>
                  <th>Nama event</th>
                  <th>Tempat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <!-- isi -->
                <?php 
                $no = 1;
                foreach($user as $u){ 
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo $u->penyelenggara; ?></td>
                  <td><?php echo $u->nama_event ?></td>
                  <td><?php echo $u->tempat ?></td>
                  
                  <td> <center>

                    <a href="<?php echo base_url().'Admin/event_edit/'.$u->id ?>"> <img src="<?php echo base_url().'assets_lte/tool_icon/edit.png' ?>"> </a> | 

                    <a href="<?php echo base_url().'Admin/event_hapus/'.$u->id ?>"> <img src="<?php echo base_url().'assets_lte/tool_icon/delete.png' ?>"> </a>

                        <!-- <?php //echo anchor('admin/event_edit/'.$u->id,'Edit'); ?>
                                          <?php //echo anchor('admin/event_hapus/'.$u->id,'Hapus'); ?> -->
                    </center>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>tanggal</th>
                  <th>Penyelenggara</th>
                  <th>Nama event</th>
                  <th>Tempat</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>