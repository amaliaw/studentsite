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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/about.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>image/icon/fontawesome-free/css/all.min.css">

    <title><?php echo $title ?></title>
</head>

<body>

    <!-- MELOAD / MEMANGGIL NAVBAR -->
    <?php $this->load->view('partials/navbar') ?>

    <!-- detail -->
    <div class="container col-md-8">
        <div class="row detail mb-5">
            <div class="col-12 ">
                <h1 style="font-family: calibri"><?= $data['title'] ?></h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <img style="width: 100%;" src="<?= base_url('assets/image/') . $data['image'] ?>" alt="">
            </div>
            <div class="col">
                <b>Kategori: <?= $data["category"] ?></b>
                <p><?php date_default_timezone_set('Asia/Jakarta');
                    echo date('l, j F Y', strtotime($data["tgl_post"])); ?></p>
                <p style="width: 100%;">
                    <?= $data["body"] ?>
                </p>
            </div>
        </div>
    </div>
    <!-- akhir detail -->

    <!-- memanggil footer -->
    <?php $this->load->view('partials/footer'); ?>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-9a5da101-f555-4ae9-a150-2f22475847cf"></div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>