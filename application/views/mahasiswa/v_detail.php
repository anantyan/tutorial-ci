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
          <h3 class="box-title">Update Mahasiswa</h3>
        </div>
        <div class="box-body">
          <?php echo form_open_multipart(base_url().'mahasiswa/upload_photo', 'class="form-horizontal"'); ?>
            <div class="box-body">
              <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group">
                  <label for="inputNim" class="col-sm-2 control-label">Nim</label>
                  <div class="col-sm-10">
                    <input type="number" readonly class="form-control" value="<?php echo $records['nim']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" value="<?php echo $records['nama']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJurusan" class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" value="<?php echo $records['jurusan']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" value="<?php echo $records['alamat']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" readonly class="form-control" value="<?php echo $records['email']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNoTelp" class="col-sm-2 control-label">No Telp.</label>
                  <div class="col-sm-10">
                    <input type="number" readonly class="form-control" value="<?php echo $records['no_telp']?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="col-sm-12 mb-2">
                  <img src="<?php echo $records['photo']?>" alt="<?php echo $records['photo']?>" width="240px">
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input id="photo" type="file" class="form-control" name="photo" placeholder="Upload photo">
                    <div id="error-update-photo" class="text-danger"><?php echo $this->session->flashdata('message'); ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <input type="hidden" name="id" value="<?php echo $records['id']?>">
              <button type="button" class="btn btn-info btn-xs" onclick="window.location.href='<?php echo base_url();?>mahasiswa';">Kembali</button>
              <button type="submit" class="btn btn-primary btn-xs pull-right">Simpan Foto</button>
            </div>
            <!-- /.box-footer -->
          <?php echo form_close(); ?>
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
