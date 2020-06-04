<div class="card-header">
	<h3 class="card-title"><?= $title; ?></h3>
	<div class="card-tools">
		<button type="button" class="btn btn-tool" title="Tambah data"
			onclick="window.location.href='<?= base_url('mahasiswa/insert'); ?>'">
			Tambah Data</button>
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	</div>
</div>
<div class="card-body">
	<!-- form start -->
	<?= form_open(base_url("mahasiswa/update_action/".$record['id'])); ?>
	<?= $this->session->flashdata('success'); ?>
	<div class="card-body">
		<div class="form-group">
			<label>Nim</label>
			<input type="number" class="form-control" placeholder="Input NIM" name="nim" value="<?= $record['nim'];?>">
		</div>
		<?= $this->session->flashdata('nim'); ?>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" placeholder="Input Nama" name="nama"
				value="<?= $record['nama']; ?>">
		</div>
		<?= $this->session->flashdata('nama'); ?>
		<div class="form-group">
			<label>Jurusan</label>
			<select id="input_jurusan" class="form-control" style="width: 100%;" name="jurusan">
				<option value="">Pilihan...</option>
				<?php foreach($jurusan as $j => $k) {?>
				<option <?php if($k == $record['jurusan']){echo'selected="selected"';} ?> value="<?= $k; ?>"><?= $k; ?>
				</option>
				<?php } ?>
			</select>
		</div>
		<?= $this->session->flashdata('jurusan'); ?>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" rows="3" placeholder="Input Alamat"
				name="alamat"><?= $record['alamat']; ?></textarea>
		</div>
		<?= $this->session->flashdata('alamat'); ?>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" placeholder="Input Email" name="email"
				value="<?= $record['email']; ?>">
		</div>
		<?= $this->session->flashdata('email'); ?>
		<div class="form-group">
			<label>No. Telp.</label>
			<input type="number" class="form-control" placeholder="Input Nama" name="no_telp"
				value="<?= $record['no_telp']; ?>">
		</div>
		<?= $this->session->flashdata('no_telp'); ?>
		<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
			value="<?= $this->security->get_csrf_hash(); ?>">
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
		<button type="button" class="btn btn-info btn-sm"
			onclick="window.location.href='<?= base_url('mahasiswa');?>';">Kembali</button>
		<button type="submit" class="btn btn-primary btn-sm">Save Data</button>
	</div>
	<?= form_close(); ?>
</div>
