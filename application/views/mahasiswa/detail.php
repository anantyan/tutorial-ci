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
	<?= form_open_multipart(base_url("mahasiswa/upload_photo/".$record['id'])); ?>
	<?= $this->session->flashdata('success'); ?>
	<div class="card-body">
		<div class="form-group">
			<label>Nim</label>
			<input type="number" readonly="true" class="form-control" placeholder="Input NIM"
				value="<?= $record['nim']; ?>">
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" readonly="true" class="form-control" placeholder="Input Nama"
				value="<?= $record['nama']; ?>">
		</div>
		<div class="form-group">
			<label>Jurusan</label>
			<input type="text" readonly="true" class="form-control" placeholder="Input Jurusan"
				value="<?= $record['jurusan']; ?>">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" rows="3" placeholder="Input Alamat"
				readonly="true"><?= $record['alamat']; ?></textarea>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" readonly="true" class="form-control" placeholder="Input Email"
				value="<?= $record['email']; ?>">
		</div>
		<div class="form-group">
			<label>No. Telp.</label>
			<input type="number" readonly="true" class="form-control" placeholder="Input No. Telp."
				value="<?= $record['no_telp']; ?>">
		</div>
		<div class="form-group">
			<label>File input</label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="photo" required="true">
					<label class="custom-file-label">Choose file</label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="">Upload</span>
				</div>
			</div>
		</div>
		<?= $this->session->flashdata('upload_foto'); ?>
		<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
			value="<?= $this->security->get_csrf_hash(); ?>">
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
		<button type="button" class="btn btn-info btn-sm"
			onclick="window.location.href='<?= base_url('mahasiswa');?>';">Kembali</button>
		<button type="submit" class="btn btn-primary btn-sm">Upload Foto</button>
	</div>
	<?= form_close(); ?>
</div>
