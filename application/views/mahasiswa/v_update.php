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
          <form class="form-horizontal" id="v-update-mahasiswa">
            <div class="box-body">
              <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="inputNim" class="col-sm-2 control-label">Nim</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nim" value="<?php echo $records['nim']?>" id="inputNim" placeholder="Masukan Nim">
                    <div id="error-update-nim" class="text-danger"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $records['nama']?>" id="inputNama" placeholder="Masukan Nama Lengkap">
                    <div id="error-update-nama" class="text-danger"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJurusan" class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-10">
                    <select name="jurusan" class="form-control select2" style="width: 100%;">
                      <option value="">Pilihan...</option>
                      <?php
                        foreach($jurusan as $j => $j_name){
                      ?>
                      <option <?php if($j_name == $records['jurusan']){echo'selected="selected"';} ?> value="<?php echo $j_name; ?>"><?php echo $j_name; ?></option>
                      <?php } ?>
                    </select>
                    <div id="error-update-jurusan" class="text-danger"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $records['alamat']?>" id="inputAlamat" placeholder="Masukan Alamat">
                    <div id="error-update-alamat" class="text-danger"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="<?php echo $records['email']?>" id="inputEmail" placeholder="Masukan Email">
                    <div id="error-update-email" class="text-danger"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelepon" class="col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" name="no_telp" value="<?php echo $records['no_telp']?>" id="inputTelp" placeholder="Masukan Nomor Telepon">
                    <div id="error-update-no_telp" class="text-danger"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <input type="hidden" name="id" value="<?php echo $records['id']?>">
              <button type="button" class="btn btn-info btn-xs" onclick="window.location.href='<?php echo base_url();?>mahasiswa';">Kembali</button>
              <button type="submit" class="btn btn-primary btn-xs pull-right" id="btn-update-mahasiswa">Simpan</button>
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
