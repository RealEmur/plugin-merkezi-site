<?php
include 'admin/veritabani/baglan.php';
$ayarsor=$db->prepare("select * from ayarlar where ayar_id=?");
$ayarsor->execute(array(0));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $ayarcek['ayar_title']?></title>
  <meta content="<?php echo $ayarcek['ayar_description']?>" name="description">
  <meta content="<?php echo $ayarcek['ayar_keywords']?>" name="keywords">
  <meta content="<?php echo $ayarcek['ayar_author']?>" name="author">
  <meta name="revisit-after" content="7 days">
  <meta name="rating" content="General">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="robots" content="ALL">
  <meta name="copyright" content="2021">
  <meta name="generator" content="pluginmerkezi.com">
  <meta name="classification" content="Turkey">
  <meta name="distribution" content="Global">
  <meta name="Publisher" content="https://pluginmerkezi.com/">
  <meta name="GoogleRobot" content="index,follow">  
  <meta name="Scooter" content="pluginmerkezi.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Favicons -->
  <link href="<?php echo $ayarcek['ayar_logo']?>" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno - v2.2.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.php"><?php echo $ayarcek['ayar_isim']?></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.php">Ana Sayfa</a></li>
        <li><a href="eklentiler.php">Eklentiler</a></li>
        <li><a href="<?php echo $ayarcek['ayar_discord']?>" target="_blank">İletişim</a></li>

      </ul>
    </nav><!-- .nav-menu -->
  </div>
  </header><!-- End Header -->