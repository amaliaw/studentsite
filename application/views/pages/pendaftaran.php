<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/image/icon/favicon.ico') ?>" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- My Fonts -->
    <link href="https://www.dafont.com/chapaza.font" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/') ?>about.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>image/icon/fontawesome-free/css/all.min.css">

    <title><?php echo $title ?></title>
</head>

<body>
    <!-- MELOAD / MEMANGGIL NAVBAR -->
    <?php $this->load->view('partials/navbar') ?>

    <!-- Form Pendaftaran -->
    <div class="card-body px-5">
        <h5>Form Pendaftaran</h5>
        <hr>
        <form action="<?php echo base_url('Page/proses_pendaftaran') ?>" method="post">
            <div class="form-group">
                <label for="pendaftaran">Jenjang</label>
                <input required type="text" name="pendaftaran" id="" value="<?= set_value('pendaftaran') ?>" list="mysuggestion" class="form-control">
                <datalist id="mysuggestion">
                    <option>SMP</option>
                    <option>SMA</option>
                </datalist>
                <?php echo form_error('pendaftaran', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="nisn">NISN</label>
                <input required type="text" name="nisn" class="form-control" id="nisn" value="<?= set_value('nisn') ?>" maxlength="20" placeholder="Masukan NISN">
                <?php echo form_error('nisn', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input required type="text" class="form-control" name="nama_santri" id="" value="<?= set_value('nama_santri') ?>" placeholder="Masukkan nama">
                <?php echo form_error('nama_santri', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input required type="text" class="form-control" name="tmp_lahir" id="" value="<?= set_value('tmp_lahir') ?>" placeholder="Masukkan tempat lahir">
                    <?php echo form_error('tmp_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input required type="date" class="form-control" name="tgl_lahir" id="" value="<?= set_value('tgl_lahir') ?>">
                    <?php echo form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="jk">Gender</label>
                <select name="jk" class="form-control" id="">
                    <option value="">-- PILIH --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?php echo form_error('jk', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="alamat">Alamat</label>
                    <input required type="text" class="form-control" id="" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Masukkan alamat">
                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="nohp">No Telepon/HP</label>
                    <input required type="text" name="no_hp" class="form-control" id="" value="<?= set_value('no_hp') ?>" placeholder="Masukkan No Telepon/HP">
                    <?php echo form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="lulusan">Lulusan</label>
                    <input required type="text" name="lulusan" class="form-control" id="" value="<?= set_value('lulusan') ?>">
                    <?php echo form_error('lulusan', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="asal_school">Asal Sekolah</label>
                    <input required type="text" name="asal_school" class="form-control" id="" value="<?= set_value('asal_school') ?>">
                    <?php echo form_error('asal_school', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="wali_santri_ayah">Nama Ayah</label>
                    <input required type="text" class="form-control" id="" name="wali_santri_ayah" value="<?= set_value('wali_santri_ayah') ?>">
                    <?php echo form_error('wali_santri_ayah', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="walisantri_ibu">Nama Ibu</label>
                    <input required type="text" class="form-control" id="" name="walisantri_ibu" value="<?= set_value('walisantri_ibu') ?>">
                    <?php echo form_error('walisantri_ibu', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-inline my-1">
                <label for="kerja">Pekerjaan Orang Tua &nbsp;</label>
                <input required type="text" name="pekerjaan_ortu" style="width: 200px" id="" value="<?= set_value('pekerjaan_ortu') ?>" list="mySuggestion" class="form-control">
                <datalist id="mySuggestion">
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
                <input type="text" class="form-control" style="width: 360px;" id="lain_lain" name="lain_lain" value="<?= set_value('lain_lain') ?>" placeholder="isi jika pekerjaan orang tua tidak tertera di list">
                <?php echo form_error('lain_lain', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="edu">Pendidikan Orang Tua</label>
                <select name="pendidikan" class="form-control" id="" value="<?= set_value('pendidikan') ?>">
                    <option value="">-- PILIH --</option>
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
                <input required type="text" class="form-control" id="" name="anak_ke" value="<?= set_value('anak_ke') ?>" style="width: 50px">
                <?php echo form_error('anak_ke', '<small class="text-danger">', '</small>'); ?>

                <label for="dari">&nbsp;dari &nbsp;</label>
                <input required type="text" class="form-control" id="" name="dari" style="width: 50px" value="<?= set_value('dari') ?>">
                <?php echo form_error('dari', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="stat">Status Anak</label>
                <select name="stat_anak" class="form-control" id="stat">
                    <option value="">-- PILIH --</option>
                    <option>Kandung</option>
                    <option>Tiri</option>
                    <option>Perwalian</option>
                </select>
                <?php echo form_error('stat_anak', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="hasil">Penghasilan Orang Tua/Bulan</label>
                <select name="penghasilan_ortu" class="form-control" id="hasil">
                    <option value="">-- PILIH --</option>
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
                <input required type="text" class="form-control" style="width: 50px" id="bb" name="bb" value="<?= set_value('bb') ?>"> &nbsp;kg &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                <?php echo form_error('bb', '<small class="text-danger">', '</small>'); ?>

                <label for="tb">Tinggi Badan &nbsp; </label>
                <input required type="text" class="form-control" style="width: 50px" id="tb" name="tb" value="<?= set_value('tb') ?>"> &nbsp;cm &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                <?php echo form_error('tb', '<small class="text-danger">', '</small>'); ?>

                <label for="goldar">Golongan Darah &nbsp; </label>
                <select name="gol_dar" class="form-control" id="goldar" style="width: 70px;">
                    <option value=""></option>
                    <option>O</option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                </select>
                <?php echo form_error('gol_dar', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="penyakit">Penyakit yang Pernah Diderita</label>
                <input required type="text" class="form-control" id="penyakit" name="penyakit" value="<?= set_value('penyakit') ?>">
                <?php echo form_error('penyakit', '<small class="text-danger">', '</small>'); ?>
            </div>

            <label><b>Bakat yang Dimiliki : </b></label>
            <div class="form-group">
                <label for="or">Bidang Olahraga</label>
                <input required type="text" class="form-control" id="bakat_or" name="bakat_or" value="<?= set_value('bakat_or') ?>">
                <?php echo form_error('bakat_or', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="bakat_seni">Bidang Kesenian</label>
                <input required type="text" class="form-control" id="bakat_seni" name="bakat_seni" value="<?= set_value('bakat_seni') ?>">
                <?php echo form_error('bakat_seni', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="bakat_agama">Bidang Keagamaan</label>
                <input required type="text" class="form-control" id="bakat_agama" name="bakat_agama" value="<?= set_value('bakat_agama') ?>">
                <?php echo form_error('bakat_agama', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group buttons d-flex justify-content-between">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>

    <!-- memanggil footer -->
    <?php $this->load->view('partials/footer'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>