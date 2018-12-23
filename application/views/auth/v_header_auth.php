<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/gif" href="<?php echo base_url() ?>assets/asset_form/favicon.png">
  <title><?php echo $judul; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.css" />
  <link href="<?php echo base_url() ?>assets/asset_form/dist/css/bootstrap.css" rel="stylesheet">
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <!-- <link href="dist/css/cssform.css" rel="stylesheet"> -->
  <!-- <link href="form-validation.css" rel="stylesheet"> -->
  <!-- Custom styles for this template -->
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets_lte/dist/css/AdminLTE.css"> -->
</head>
<body class="bg-light">

  <!-- Header -->
  <?php if($judul!="Bio"){
  ?>
  <nav class="navbar navbar-expand-lg navbar-light">
    <img class="logo" src="<?php echo base_url() ?>assets/asset_form/favicon.ico">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>"> <b>Home</b> <span class="sr-only">(current)</span></a>
        </li>
        <?php if($judul=="Pendaftaran"){ ?>
            <li class="nav-item active">
                <a class="nav-link active" href="<?php echo base_url().'web/pendaftaran' ?>">
                <b>Daftar</b>
                </a>
            </li>
        <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'web/pendaftaran' ?>">
                <b>Daftar</b>
                </a>
            </li>
        <?php } ?>

        <?php if($judul=="Login"){ ?>
            <li class="nav-item active">
                <a class="nav-link active" href="<?php echo base_url().'web/login' ?>">
                <b>Login</b>
                </a>
            </li>
        <?php }else {?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'web/login' ?>">
                <b>Login</b>
                </a>
            </li>
        <?php }?>

      </ul>
    </div>
  </nav>
  <?php } else{ ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="col-md-8">
        <div class="row">
            <img class="logo" src="<?php echo base_url() ?>assets/asset_form/favicon.ico">
            <div id="thumb0" onclick="link('a')" class="menubio">
            <b> Biodata</b>
            </div>
            <div id="thumb0" onclick="link('b')" class="menubio1">
            <b> Berkas </b>
            </div>
            <script>
            function link(i) {
                if(i=='a'){
                    window.location.href='<?php echo base_url() ?>auth/biodata'
                }else{
                    window.location.href='<?php echo base_url() ?>auth/berkas'
                }
            }
            </script>
        </div>
        </div>
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
        <div class="col-md-4">
        <div class="float-right">
            <a href="<?php echo base_url() ?>web/logout"><img class="logo_user" src="<?php echo base_url() ?>assets/asset_form/user.png"></a>
        </div>
        </div>
    <!-- </div> -->
    </nav>
  <?php }?>