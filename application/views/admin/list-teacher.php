<main>
	<div class="container-fluid">
		<h1 class="mt-4">List Guru</h1>
		<section class="content">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i>&nbsp;<?php echo $this->session->flashdata('guru'); ?></h4>
			</div>
		</section>
		<div class="card mb-4">
			<div class="card-header row">
				<div class="col-6">
					<i class="fas fa-plus mr-1"></i>
					<a href="<?php echo base_url('admin/add-new-data-teacher') ?>">Tambah Guru</a>
				</div>
				<div class="col-6 text-right pr-3">
					<i class="fas fa-print mr-1"></i>
					<a target="_blank" href="<?php echo base_url('cetak-list-teacher') ?>">Cetak</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Foto</th>
								<th>Nama Guru</th>
								<th>NIP</th>
								<th>Gender</th>
								<th>No. Hp</th>
								<th>Alamat</th>
								<th>Mata Pelajaran</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list_teacher->result() as $dt) : ?>

								<tr>
									<td><img width="70px" heigth="auto" src="<?php echo base_url() ?>upload/guru/<?php echo $dt->foto_guru ?>"></td>

									<td><?php echo $dt->nama_guru ?></td>

									<td><?php echo $dt->NIP ?></td>

									<td><?php echo $dt->jk_g ?></td>

									<td><?php echo $dt->no_hp_g ?></td>

									<td><?php echo $dt->alamat_guru ?></td>

									<td><?php echo $dt->mapel ?></td>

									<td>
										<a href="<?php echo base_url('list-teacher/edit/' . $dt->id_guru) ?>" class="btn  btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>

										<a href="<?php echo base_url('list-teacher/delete/' . $dt->id_guru) ?>" class="btn  btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>