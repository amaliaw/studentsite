<main>
	<div class="container-fluid">
		<h1 class="mt-4">List Admin</h1>

		<?= $this->session->flashdata('admin') ?>

		<div class="card mb-4">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Terakhir Akses</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($dt_user->result() as $dt) : ?>
								<tr>
									<td><?php echo $dt->nama ?></td>
									<td><?php echo $dt->email ?></td>
									<td><?php echo $dt->tgl_akses ?></td>
									<td>
										<a href="<?php echo base_url('admin/edit/' . $dt->id_user) ?>" class="btn  btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
										<a href="<?php echo base_url('admin/delete/' . $dt->id_user) ?>" class="btn  btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
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