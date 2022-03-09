<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="Anil z" name="author">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo strip_tags($this->resumen) ?>">
  <meta name="keywords" content="CV, resume, card, vcard, online cv, online resume, professional resume, portfolio, one page, bootstrap responsive, creative html template, creative design, parallax, personal">

  <!-- SITE TITLE -->
  <title><? echo $this->nombre_completo ? $this->nombre_completo : "Nombre de usuario";  ?> CV / Portafolio</title>
  <!-- Favicon Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/portafolio/images/favicon.png">
  <!-- Animation CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/animate.css">
  <!-- Latest Bootstrap min CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/bootstrap/css/bootstrap.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  <!-- Icon Font CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/themify-icons.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/all.min.css">
  <!-- Flaticon Font CSS -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/flaticon.css"> -->
  <!--- owl carousel CSS-->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/owlcarousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/owlcarousel/css/owl.theme.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/owlcarousel/css/owl.theme.default.min.css">
  <!-- Magnific Popup CSS -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/magnific-popup.css"> -->
  <!-- Scrollbar Css -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/jquery.mCustomScrollbar.min.css"> -->
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/portafolio/css/responsive.css">

</head>

<body data-spy="scroll" data-target=".navbar-nav" data-offset="110">
  <!-- LOADER -->
  <div class="preloader">
    <div class="loader">
      <div class="loader-inner ball-scale">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>
  <!-- END LOADER -->