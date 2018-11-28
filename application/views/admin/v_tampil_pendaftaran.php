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
              <a href="<?php echo base_url().'Report_pdf/pdf_pendaftaran' ?>"> <img src="<?php echo base_url().'assets_lte/tool_icon/print.png' ?>"> </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>Asal Sekolah</th>
                  <th>Thn lulus</th>
                  <th>User Name</th>
                  <th>Kode</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- isi -->
                <?php 
                $no = 1;
                foreach($user as $u){ 
                ?>
                <tr>
                  <!-- <th>&bnsp;</th>
                  <th>&bnsp;</th> -->
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u->nama ?></td>
                  <td><?php echo $u->tempat_lahir ?>/<?php echo $u->tgl_lahir ?></td>
                  <td><?php echo $u->alamat ?></td>
                  <td><?php echo $u->asal_sekolah ?></td>
                  <td><?php echo $u->tahun_lulus ?></td>
                  <td><?php echo $u->username ?></td>
                  <td><?php echo $u->kode_daftar ?></td>
                  <td>
                      <a href="<?php echo base_url().'Admin/pendaftaran_edit/'.$u->id ?>"> <img src="<?php echo base_url().'assets_lte/tool_icon/edit.png' ?>"> </a>

                      <a href="<?php echo base_url().'Admin/pendaftaran_hapus/'.$u->id ?>"> <img src="<?php echo base_url().'assets_lte/tool_icon/delete.png' ?>"> </a>


                        <!-- <?php //echo anchor('admin/pendaftaran_edit/'.$u->id,'Edit'); ?> | 
                                          <?php //echo anchor('admin/pendaftaran_hapus/'.$u->id,'Hapus'); ?> -->
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>Asal Sekolah</th>
                  <th>Thn lulus</th>
                  <th>User Name</th>
                  <th>Kode</th>
                  <th>Action</th>
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