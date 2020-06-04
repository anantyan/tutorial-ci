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
					<button type="button" class="btn btn-sm btn-default"
						onclick="window.location.href='<?= base_url('mahasiswa/detail/'.$r['id']); ?>'">Detail</button>
					<button type="button" class="btn btn-sm btn-warning"
						onclick="window.location.href='<?= base_url('mahasiswa/update/'.$r['id']); ?>'">Edit</button>
					<button type="button" class="btn btn-sm btn-danger"
						onclick="delete_mahasiswa('<?= base_url('mahasiswa/delete/'.$r['id']); ?>');">Hapus</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
