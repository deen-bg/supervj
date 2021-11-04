<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gloves PFS </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <!--  -->
  <link href="<?=base_url('./assets/img/logo.png');?>" rel="icon">
  <link href="<?=base_url('./assets/img/logo.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <!--  -->
  <link href="<?=base_url('./assets/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?=base_url('./assets/css/font-awesome.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('./assets/css/animate.css');?>" rel="stylesheet">
  <link href="<?=base_url('./assets/lib/ionicons/css/ionicons.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('./assets/lib/owlcarousel/assets/owl.carousel.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('./assets/lib/lightbox/css/lightbox.min.css');?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?=base_url('./assets/css/style.css');?>" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5ZL2NTSB96"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5ZL2NTSB96');
</script>
</head>

<body>
  <?php 
    $this->load->model('Cart_model');
?>
    <section id="intro" class="clearfix">
        <div class="container">
            <header class="section-header">
                <h3><?=$caties_list[0]['cate_id']; ?></h3>
            </header>
        </div>
    </section>
    <!-- #intro -->

    <main id="main">
        <section id="product" class="section-product">
            <div class="container">

                <div class="text-center reviewp-tb search-p">
                    <input type="text" id="searchText" onkeyup="myFunction()" placeholder="ค้นหาสินค้า">
                    <button type="text"><i class="fa fa-search"></i></button>
                </div>
                <div class="row productp">
                    <ul>
                        <?php foreach($products_list as $products_detail) : ?>
                        <li>
                            <div class="col-md-3 mar-b">
                                <div class="card">
                                    <a href="<?=base_url('product/detail/'.$products_detail['id']);?>">
                                        <div class="product-text">
                                            <img src="<?=base_url('./assets/images/product/cover/'.$products_detail['id'].'/'.$products_detail['img_cover']);?>" alt="" class="img-responsive">
                                            <h2><?=$products_detail['name']; ?></h2>
                                            <!-- <p>Size S M L</p> -->
                                            <h1><?=number_format($products_detail['price'], 2); ?>.-</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- pagination -->
            <div class="row mt-4 mb-4">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="container">
                        <?=$pagination;?>
                    </div>
                </div>
            </div>
            <!-- end -->
            </div>
        </section><!-- #product -->
    </main>
    <?php $this->load->view('footer'); // footer ?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?=base_url('./assets/lib/jquery/jquery.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/jquery/jquery-migrate.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/easing/easing.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/mobile-nav/mobile-nav.js');?>"></script>
<script src="<?=base_url('./assets/lib/wow/wow.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/waypoints/waypoints.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/counterup/counterup.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/owlcarousel/owl.carousel.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/isotope/isotope.pkgd.min.js');?>"></script>
<script src="<?=base_url('./assets/lib/lightbox/js/lightbox.min.js');?>"></script>
<!-- Contact Form JavaScript File -->
<script src="<?=base_url('./assets/contactform/contactform.js');?>"></script>

<!-- Template Main Javascript File -->
<script src="<?=base_url('./assets/js/main.js');?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


    <script>
        function searchBar() {
            $('#searchText').on('keyup', function () {
                let searchString = $(this).val();
                $("li div").each(function (index, value) {

                    currentName = $(value).text()
                    if (currentName.toUpperCase().indexOf(searchString.toUpperCase()) > -1) {
                        $(value).show();
                    } else {
                        $(value).hide();
                    }
                });
            });
        };
        searchBar();
    </script>
</body>

</html>