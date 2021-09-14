<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="fas fa-user-edit"></div> Edit Data Santri <b><?php echo $dt['nama_santri'] ?></b>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('list-santri/edit/' . $dt['id_santri']) ?>" method="post">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="fotosantri" id="foto" size="20" class="form-control" />
                                <input required hidden name="old-image-fotosantri" type="text" class="form-control" id="nisn" value="<?php echo $dt['NISN'] ?>" maxlength="20" placeholder="Masukkan NISN">
                            </div>

                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input required type="text" name="nisn" class="form-control" id="nisn" value="<?php echo $dt['NISN'] ?>" maxlength="20" placeholder="Masukan NISN">
                                <?php echo form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="nama_santri">Nama</label>
                                <input required type="text" class="form-control" name="nama_santri" id="name" value="<?php echo $dt['nama_santri'] ?>" placeholder="Masukkan nama">
                                <?php echo form_error('nama_santri', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input required type="text" class="form-control" name="tmp_lahir" id="" value="<?php echo $dt['tmp_lahir'] ?>" placeholder="Masukkan tempat lahir">
                                    <?php echo form_error('tmp_lahir', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input required type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $dt['tgl_lahir'] ?>">
                                    <?php echo form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jk">Gender</label>
                                <select name="jk" class="form-control" id="jk">
                                    <option value="<?php echo $dt['jk'] ?>"><?php echo $dt['jk'] ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?php echo form_error('jk', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dt['alamat'] ?>" placeholder="Masukkan alamat">
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nohp">No Telepon/HP</label>
                                    <input required type="text" name="no_hp" class="form-control" id="no_hp" value="<?php echo $dt['no_hp'] ?>" placeholder="Masukkan No Telepon/HP">
                                    <?php echo form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="foto">Akta Kelahiran</label>
                                <input type="file" name="aktaKel" class="form-control" value="<?php echo $dt['aktaKel'] ?>" />
                                <input required name="old-image-aktakel" hidden type="text" class="form-control" id="nisn" value="<?php echo $dt['NISN'] ?>" maxlength="20" placeholder="Masukan NISN">
                            </div>

                            <div class="form-group">
                                <label for="foto">Sertifikat</label>
                                <input required hidden name="old-image-sertif" type="text" class="form-control" id="nisn" value="<?php echo $dt['sertifSis'] ?>" maxlength="20" placeholder="Masukan NISN">
                                <input type="file" name="sertifSis" class="form-control" value="<?php echo $dt['sertifSis'] ?>" />
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="lulusan">Lulusan</label>
                                    <input required type="text" name="lulusan" class="form-control" id="lulusan" value="<?php echo $dt['lulusan'] ?>">
                                    <?php echo form_error('lulusan', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="asal_school">Asal Sekolah</label>
                                    <input required type="text" name="asal_school" class="form-control" id="asal_school" value="<?php echo $dt['asal_school'] ?>">
                                    <?php echo form_error('asal_school', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="wali_santri_ayah">Nama Ayah</label>
                                    <input required type="text" class="form-control" id="wali_santri_ayah" name="wali_santri_ayah" value="<?php echo $dt['wali_santri_ayah'] ?>">
                                    <?php echo form_error('wali_santri_ayah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="walisantri_ibu">Nama Ibu</label>
                                    <input required type="text" class="form-control" id="walisantri_ibu" name="walisantri_ibu" value="<?php echo $dt['walisantri_ibu'] ?>">
                                    <?php echo form_error('walisantri_ibu', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-inline my-1">
                                <label for="kerja">Pekerjaan Orang Tua &nbsp;</label>
                                <input required type="text" name="pekerjaan_ortu" style="width: 200px" id="pekerjaan_ortu" list="mySuggestion" class="form-control">
                                <datalist id="mySuggestion">
                                    <option value="<?php echo $dt['pekerjaan_ortu'] ?>" <?php echo $dt['pekerjaan_ortu'] ?>></option>
                                    <option>TNI/POLRI</option>
                                    <option>PNS</option>
                                    <option>Peg. Swasta</option>
                                    <option>Guru</option>
                                    <option>Pedagang</option>
                                    <option>Petani</option>
                                    <option>Sopir</option>
                                    <option>Lain-lain</option>
                                </datalist>
                                <?php echo form_error('pekerjaan_ortu', '<small class="text-danger">', '</small>'); ?> &nbsp; &nbsp;
                                <label for="lain_lain"></label>
                                <input type="text" class="form-control" style="width: 360px;" id="lain_lain" name="lain_lain" value="<?php echo $dt['lain_lain'] ?>" placeholder="isi jika pekerjaan orang tua tidak tertera di list">
                                <?php echo form_error('lain_lain', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="pendidikan">Pendidikan Orang Tua</label>
                                <select name="pendidikan" class="form-control" id="pendidikan">
                                    <option value="<?php echo $dt['pendidikan'] ?>" <?php echo $dt['pendidikan'] ?>></option>
                                    <option>SD/MI</option>
                                    <option>SMP/MTs</option>
                                    <option>SMA/SMK/MA</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                </select>
                                <?php echo form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-inline my-1">
                                <label for="anak">anak ke- &nbsp;</label>
                                <input required type="text" class="form-control" id="anak_ke" name="anak_ke" value="<?php echo $dt['anak_ke'] ?>" style="width: 50px">
                                <?php echo form_error('anak_ke', '<small class="text-danger">', '</small>'); ?>
                                <label for="dari">&nbsp;dari &nbsp;</label>
                                <input required type="text" class="form-control" id="dari" name="dari" value="<?php echo $dt['dari'] ?>" style="width: 50px">
                                <?php echo form_error('dari', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="stat">Status Anak</label>
                                <select name="stat_anak" class="form-control" id="stat">
                                    <option value="<?php echo $dt['stat_anak'] ?>" <?php echo $dt['stat_anak'] ?>></option>
                                    <option>Kandung</option>
                                    <option>Tiri</option>
                                    <option>Perwalian</option>
                                </select>
                                <?php echo form_error('stat_anak', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="hasil">Penghasilan Orang Tua/Bulan</label>
                                <select name="penghasilan_ortu" class="form-control" id="hasil">
                                    <option value="<?php echo $dt['penghasilan_ortu'] ?>" <?php echo $dt['penghasilan_ortu'] ?>></option>
                                    <option>
                                        < Rp. 500.000</option>
                                    <option>Rp. 500.000 - Rp. 1.000.000</option>
                                    <option>Rp. 1.000.000 - Rp. 3.000.000</option>
                                    <option>Rp. 3.000.000 - Rp. 5.000.000</option>
                                    <option>
                                        > Rp. 5.000.000</option>
                                </select>
                                <?php echo form_error('penghasilan_ortu', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <label><b>Keterangan Kesehatan : </b></label>
                            <div class="form-inline">
                                <label for="bb">Berat Badan &nbsp; </label>
                                <input required type="text" class="form-control" style="width: 50px" id="bb" name="bb" value="<?php echo $dt['bb'] ?>"> &nbsp;kg &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                                <?php echo form_error('bb', '<small class="text-danger">', '</small>'); ?>

                                <label for="tb">Tinggi Badan &nbsp; </label>
                                <input required type="text" class="form-control" style="width: 50px" id="tb" name="tb" value="<?php echo $dt['tb'] ?>"> &nbsp;cm &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                                <?php echo form_error('tb', '<small class="text-danger">', '</small>'); ?>

                                <label for="goldar">Golongan Darah &nbsp; </label>
                                <select name="gol_dar" class="form-control" id="gol_dar" style="width: 80px;">
                                    <option value="<?php echo $dt['gol_dar'] ?>" <?php echo $dt['gol_dar'] ?>></option>
                                    <option>O</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>AB</option>
                                </select>
                                <?php echo form_error('gol_dar', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="penyakit">Penyakit yang Pernah Diderita</label>
                                <input required type="text" class="form-control" id="penyakit" name="penyakit" value="<?php echo $dt['penyakit'] ?>">
                                <?php echo form_error('penyakit', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <label><b>Bakat yang Dimiliki : </b></label>
                            <div class="form-group">
                                <label for="or">Bidang Olahraga</label>
                                <input required type="text" class="form-control" id="bakat_or" name="bakat_or" value="<?php echo $dt['bakat_or'] ?>">
                                <?php echo form_error('bakat_or', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="bakat_seni">Bidang Kesenian</label>
                                <input required type="text" class="form-control" id="bakat_seni" name="bakat_seni" value="<?php echo $dt['bakat_seni'] ?>">
                                <?php echo form_error('bakat_seni', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="bakat_agama">Bidang Keagamaan</label>
                                <input required type="text" class="form-control" id="bakat_agama" name="bakat_agama" value="<?php echo $dt['bakat_agama'] ?>">
                                <?php echo form_error('bakat_agama', '<small class="text-danger">', '</small>'); ?>
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