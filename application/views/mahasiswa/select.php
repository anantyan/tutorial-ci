<div class="card-header">
	<h3 class="card-title"><?= $title; ?></h3>
	<div class="card-tools">
		<button type="button" class="btn btn-tool" title="Tambah data" id="btn_add_mahasiswa" data-params="<?= base_url('mahasiswa/insert'); ?>">Tambah Data</button>
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	</div>
</div>
<div class="card-body">
	<?= $this->session->flashdata('success'); ?>
	<table id="tbl_mahasiswa" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nim</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>No. Telp</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($records as $r) {
			?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $r['nim']; ?></td>
				<td><?= $r['nama']; ?></td>
				<td><?= $r['jurusan']; ?></td>
				<td><?= $r['alamat']; ?></td>
				<td><?= $r['email']; ?></td>
				<td><?= $r['no_telp']; ?></td>
				<td>
					<button type="button" class="btn btn-sm btn-default" id="btn_detail_mahasiswa" data-params="<?= base_url('mahasiswa/detail/'.$r['id']); ?>">Detail</button>
					<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#lihat_foto" id="btn_detail_foto_mahasiswa" data-params="<?= base_url('mahasiswa/modal_detail_foto/'.$r['id']); ?>">Detail Foto</button>
					<button type="button" class="btn btn-sm btn-warning" id="btn_update_mahasiswa" data-params="<?= base_url('mahasiswa/update/'.$r['id']); ?>">Edit</button>
					<button type="button" class="btn btn-sm btn-danger" id="btn_delete_mahasiswa" data-params="<?= base_url('mahasiswa/delete/'.$r['id']); ?>">Hapus</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal fade" id="lihat_foto">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Foto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal_detail_mahasiswa modal-body">
				<img class="img-fluid" src="" alt="">
			</div>
		</div> -->
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
