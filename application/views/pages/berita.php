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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/berita.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/image/icon/fontawesome-free/css/all.min.css') ?>">

    <title><?php echo $title ?></title>
</head>

<body>

    <!-- MELOAD / MEMANGGIL NAVBAR -->
    <?php $this->load->view('partials/navbar') ?>

    <!-- berita -->
    <div class="container">
        <div class="row berita mb-5">
            <div class="col-12 ">
                <h1 style="font-family: chapaza">Berita</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data->result() as $key => $value) : ?>
                <div class="col-md-6">
                    <a href="<?= base_url('berita/') . $value->id_post  ?>">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <img width="50px;" height="auto" style="object-fit: cover; " src=" <?= base_url('assets/image/') . $value->image  ?>" alt="<?= $value->image ?>">
                                </div>
                                <div class="col-md-10 card-body">
                                    <b>
                                        <justify><?= $value->title ?></justify>
                                    </b>
                    </a>
                    <p class="card-text"><small class="text-muted"><?= $value->tgl_post ?></small></p>
                </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>
</div>
</div>

<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-9a5da101-f555-4ae9-a150-2f22475847cf"></div>

<!-- memanggil footer -->
<?php $this->load->view('partials/footer'); ?>

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>