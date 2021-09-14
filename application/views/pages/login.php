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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/image/icon/fontawesome-free/css/all.min.css') ?>">

    <title>Login | DHIBS</title>
</head>

<body>

    <?php $this->load->view('partials/navbar') ?>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <?php if ($this->session->flashdata("register")) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata("register"); ?>
                </div>
            <?php  } ?>
            <h4 class="text-center">LOGIN</h4>
            <form action="<?= base_url('cekLogin') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email Anda">
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </div>
                    <div class="col-6">
                        <a href="<?php echo base_url("register") ?>" class="btn btn-secondary btn-block">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- About -->
    <div class="about" style="margin-top: -40px">
        <div class="container footer ">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h1><img src="<?php echo base_url('assets/image/icon/Group10.png') ?>" width="250px"></h1>
                <p>Jl. Sipon Irigasi, Cipondoh Makmur, Kec. Cipondoh <br />Kota Tangerang 15148</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xd-12">
                <a href="darulhasanibs@gmail.com">darulhasanibs@gmail.com</a>
                <p>021-5575-4003</p>
            </div>

            <p class="text-center">Darul Hasan Islamic Boarding School © 2020</p>

        </div>
    </div>
    <!-- akhir about -->

    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-9a5da101-f555-4ae9-a150-2f22475847cf"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>