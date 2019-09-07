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
          <h3 class="box-title">Insert Mahasiswa</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" id="v-insert-mahasiswa">
            <div class="box-body">
              <div class="form-group">
                <label for="inputNim" class="col-sm-2 control-label">Nim</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="nim" id="inputNim" placeholder="Masukan Nim">
                  <div id="error-insert-nim" class="text-danger"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Masukan Nama Lengkap">
                  <div id="error-insert-nama" class="text-danger"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputJurusan" class="col-sm-2 control-label">Jurusan</label>
                <div class="col-sm-10">
                  <select name="jurusan" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="">Pilihan...</option>
                    <?php
                      foreach($jurusan as $j => $j_name){
                    ?>
                    <option value="<?php echo $j_name; ?>"><?php echo $j_name; ?></option>
                    <?php } ?>
                  </select>
                  <div id="error-insert-jurusan" class="text-danger"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Masukan Alamat">
                  <div id="error-insert-alamat" class="text-danger"></div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-info btn-xs" onclick="window.location.href='<?php echo base_url();?>mahasiswa';">Kembali</button>
              <button type="submit" class="btn btn-primary btn-xs pull-right" id="btn-insert-mahasiswa">Simpan</button>
            </div>
            <!-- /.box-footer -->
          </form>
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
