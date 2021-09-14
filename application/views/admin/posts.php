<main>
	<div class="container-fluid">
		<h1 class="mt-4">List Post</h1>
		<section class="content">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i>&nbsp;<?php echo $this->session->flashdata('post'); ?></h4>
			</div>
		</section>
		<div class="card mb-4">
			<div class="card-header row">
				<div class="col-6">
					<i class="fas fa-plus mr-1"></i>
					<a href="<?php echo base_url('admin/add-new-data-post') ?>"> Tambah Post Baru</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Judul</th>
								<th>Gambar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($posts->result() as $dt) : ?>

								<tr class="text-center align-items-center">
									<td class="align-middle"><?php echo $dt->title ?></td>

									<td class="align-middle"><img width="90px" height="auto" src="<?php echo base_url('assets/image/') . $dt->image ?>" alt="<?= $dt->title ?>"></td>

									<td class="align-middle">
										<a href="<?php echo base_url('admin/posts/edit/' . $dt->id_post) ?>" class="btn  btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
										<a href="<?php echo base_url('admin/posts/delete/' . $dt->id_post) ?>" class="btn  btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</main>