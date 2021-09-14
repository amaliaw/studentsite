<main>
    <div class="container-fluid">
        <h1 class="mt-4">List Santri Baru</h1>
        <section class="content">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>&nbsp;<?php echo $this->session->flashdata('ubah'); ?></h4>
            </div>
        </section>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Gender</th>
                                <th>Ayah</th>
                                <th>Ibu</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_santribaru->result() as $dt) : ?>
                                <tr>
                                    <td><img width="70px" heigth="auto" src="<?php echo base_url() . '/' . $dt->fotob ?>"></td>

                                    <td><?php echo $dt->nama_santrib ?></td>

                                    <td><?php echo $dt->NISNb ?></td>

                                    <td><?php echo $dt->jkb ?></td>

                                    <td><?php echo $dt->wali_santri_ayahb ?></td>

                                    <td><?php echo $dt->walisantri_ibub ?></td>

                                    <td><?php echo $dt->alamatb ?></td>

                                    <td><?php echo $dt->no_hpb ?></td>

                                    <td><?php echo $dt->tmp_lahirb ?></td>

                                    <td><?php echo $dt->tgl_lahirb ?></td>

                                    <td>
                                        <a href="<?php echo base_url('list-santribaru/edit/') . $dt->id_santribaru ?>" class="btn  btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>

                                        <a href="<?php echo base_url('list-santribaru/delete/') . $dt->id_santribaru ?>" class="btn  btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
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