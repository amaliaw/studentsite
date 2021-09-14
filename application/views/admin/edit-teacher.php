<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="fas fa-user-edit"></div> Edit Data Guru <b><?php echo $dt['nama_guru'] ?></b>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('list-guru/edit/' . $dt['id_guru']) ?>" method="post">
                            <div class="form-group">
                                <label for="foto_guru"> Foto</label>
                                <input type="file" class="form-control" name="foto_guru">
                                <?php echo form_error('foto_guru', 'small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control" id="nip" value="<?php echo $dt['NIP'] ?>">
                                <?php echo form_error('nip', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="nama_guru" value="<?php echo $dt['nama_guru'] ?>" id="name" placeholder="Masukkan nama">
                                <?php echo form_error('nama_guru', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="jk_g" id="jk_g" class="form-control">
                                    <option value="<?php echo $dt['jk_g'] ?>"><?php echo $dt['jk_g'] ?></option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                                <?php echo form_error('jk_g', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="telp">No. Telepon/HP</label>
                                <input type="number" name="no_hp_g" class="form-control" id="telp" value="<?php echo $dt['no_hp_g'] ?>">
                                <?php echo form_error('no_hp_g', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="alamat_guru">Alamat</label>
                                <input type="text" class="form-control" id="alamat_guru" name="alamat" value="<?php echo $dt['alamat_guru'] ?>">
                                <?php echo form_error('alamat_guru', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <input type="text" name="mapel" class="form-control" id="mapel" value="<?php echo $dt['mapel'] ?>">
                                <?php echo form_error('mapel', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="foto_ktp_g"> Foto KTP</label>
                                <input type="file" class="form-control" name="foto_ktp_g">
                                <?php echo form_error('foto_ktp_g', 'small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <label for="KK_g"> Foto KK</label>
                                <input type="file" class="form-control" name="KK_g">
                                <?php echo form_error('KK_g', 'small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <label for="sertif_g"> Sertifikat</label>
                                <input type="file" class="form-control" name="foto_ktp_g">
                                <?php echo form_error('sertif_g', 'small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <label for="sertif_g"> Sertifikat</label>
                                <input type="file" class="form-control" name="foto_ktp_g">
                                <?php echo form_error('sertif_g', 'small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <label for="ijazah_g"> Ijazah</label>
                                <input type="file" class="form-control" name="ijazah_g">
                                <?php echo form_error('ijazah_g', 'small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>