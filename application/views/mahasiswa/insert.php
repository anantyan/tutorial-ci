<div class="card-header">
	<h3 class="card-title"><?= $title; ?></h3>
	<div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	</div>
</div>
<div class="card-body">
	<!-- form start -->
	<?= form_open(base_url("mahasiswa/insert_action")); ?>
	<?= $this->session->flashdata('success'); ?>
	<div class="card-body">
		<div class="form-group">
			<label>Nim</label>
			<input type="number" class="form-control" placeholder="Input NIM" name="nim">
		</div>
		<?= $this->session->flashdata('nim'); ?>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" placeholder="Input Nama" name="nama">
		</div>
		<?= $this->session->flashdata('nama'); ?>
		<div class="form-group">
			<label>Jurusan</label>
			<select id="input_jurusan" class="form-control" style="width: 100%;" name="jurusan">
				<option selected="selected" value="">Pilihan...</option>
				<?php foreach($jurusan as $j => $k) {?>
				<option value="<?= $k; ?>"><?= $k; ?></option>
				<?php } ?>
			</select>
		</div>
		<?= $this->session->flashdata('jurusan'); ?>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" rows="3" placeholder="Input Alamat" name="alamat"></textarea>
		</div>
		<?= $this->session->flashdata('alamat'); ?>
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
