  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Page
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Select Mahasiswa</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Tambah data" onclick="window.location.href='<?php echo base_url(); ?>mahasiswa/insert';"> Tambah</button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table id="example1" class="text-center table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nomor</th>
              <th>Nim</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $nomor = 1; 
                foreach ($records as $r) { ?>
                <tr>
                  <td><?php echo $nomor++;?></td>
                  <td><?php echo $r['nim']; ?></td>
                  <td><?php echo $r['nama']; ?></td>
                  <td><?php echo $r['jurusan']; ?></td>
                  <td><?php echo $r['alamat']; ?></td>
                  <td>
                    <button class="btn btn-primary btn-xs" onclick="window.location.href='<?php echo base_url(); ?>mahasiswa/detail/<?php echo $r['id']; ?>'">Detail</button> |
                    <button class="btn btn-warning btn-xs" onclick="window.location.href='<?php echo base_url(); ?>mahasiswa/update/<?php echo $r['id']; ?>'">Edit</button> |
                    <button class="btn btn-danger btn-xs" id="btn-delete-mahasiswa" hapus-mahasiswa="<?php echo $r['id']; ?>">Hapus</button>  
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
