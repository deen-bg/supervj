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
                <h3><?=$producties_list[0]['name']; ?></h3>
            </header>
        </div>
    </section>
    <!-- #intro -->
    <main id="main">
        <section id="detail" class="section-product">
            <div class="container">
                <form method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <?php foreach($products_img_list as $products_img_detail) : ?>
                        <div class="mySlides">
                            <img src="<?=base_url('./assets/images/product/'.$products_img_detail['product_id'].'/'.$products_img_detail['img_name']);?>"
                                class="img-responsive">
                        </div>
                        <?php endforeach ?>

                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>


                        <div class="row">
                            <div class="container">
                                <?php foreach($products_img_list as $products_img_detailies) : ?>
                                <div class="column">
                                    <img class="demo cursor" src="<?=base_url('./assets/images/product/'.$products_img_detailies['product_id'].'/'.$products_img_detailies['img_name']);?>"
                                        style="width:100%" onclick="currentSlide(1)">
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-text">
                            <h2><?=$producties_list[0]['name']; ?></h2>
                            <p><?=nl2br($producties_list[0]['dsc']); ?></p>
                            <h3>ราคา : <?=number_format($producties_list[0]['price'], 2); ?>.-</h3>

                            <div class="input-append">
                                <h4 class="float-left">Size :&emsp; </h4>
                                <select name="pets" id="pets">
                                    <option value="">--กรุณาเลือกไซส์--</option>
                                    <?php foreach($producties_list as $producties_d) : ?>
                                        <?php if($producties_d['size_xs'] != ""){ ?>
                                            <option value="<?=$producties_d['size_xs']; ?>"><?=$producties_d['size_xs']; ?></option>
                                        <?php } ?>
                                        <?php if($producties_d['size_s'] != ""){ ?>
                                            <option value="<?=$producties_d['size_s']; ?>"><?=$producties_d['size_s']; ?></option>
                                        <?php } ?>
                                        <?php if($producties_d['size_m'] != ""){ ?>
                                            <option value="<?=$producties_d['size_m']; ?>"><?=$producties_d['size_m']; ?></option>
                                        <?php } ?>
                                        <?php if($producties_d['size_l'] != ""){ ?>
                                            <option value="<?=$producties_d['size_l']; ?>"><?=$producties_d['size_l']; ?></option>
                                        <?php } ?>
                                        <?php if($producties_d['size_xl'] != ""){ ?>
                                            <option value="<?=$producties_d['size_xl']; ?>"><?=$producties_d['size_xl']; ?></option>
                                        <?php } ?>
                                        <?php if($producties_d['size_xs'] == "" && $producties_d['size_s'] == "" && $producties_d['size_m'] == "" && $producties_d['size_l'] == "" && $producties_d['size_xl'] == ""){ ?>
                                            <option>--กรุณาติดต่อเจ้าของ เพื่อทำการเพิ่มไซส์--</option>
                                        <?php } ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-append">
                                <h4 class="float-left">จำนวน :&emsp; </h4>
                                <button class="btn btn-mini incr-btn" type="button" data-action="decrease"> - </button>
                                <input class="span1 text-center quantity" id="quantity" name="quantity"
                                    style="max-width:34px" size="16" type="text" value="1" readonly>
                                <button class="btn btn-mini incr-btn" type="button" data-action="increase"> + </button>
                            </div>
                            <input type="hidden" value="<?=$this->uri->segment(3);?>" id="pid" name="pid">
                            <button class="button-detail" type="button" onclick="addCart()"> หยิบใส่ตะกร้า </button>
                        </div>
                    </div>
                    <div class="col-md-12 mar-t">
                        <div class="text-center mar-t contact-detail">
                            <h2>สินค้าที่เกี่ยวข้อง</h2>
                        </div>
                        <div class="row">
                            <?php foreach($rands_list as $rands_detail) : ?>
                            <div class="col-md-3 mar-b">
                                <div class="card">
                                    <a href="<?=base_url('product/detail/'.$rands_detail['id']);?>">
                                        <div class="product-text">
                                            <img src="<?=base_url('./assets/images/product/cover/'.$rands_detail['id'].'/'.$rands_detail['img_cover']);?>" alt="" class="img-responsive">

                                            <h2><?=$rands_detail['name']; ?></h2>
                                            <!-- <p>Size S M L</p> -->
                                            <h1><?=$rands_detail['price']; ?>.-</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                </form>
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

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            // var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            // captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>

    <script type="text/javascript">
        $(".incr-btn").on("click", function (e) {
            var $button = $(this);
            var oldValue = $button.parent().find('.quantity').val();
            $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
            if ($button.data('action') == "increase") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below 1
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                    $button.addClass('inactive');
                }
            }
            $button.parent().find('.quantity').val(newVal);
            e.preventDefault();

        });

        function addCart() {
            var pid = $('#pid').val();
            var qty = $('#quantity').val();
            var pets = $('#pets').val();

            console.log(pid + ' : ' + qty);
            if((pets == '')){
                alert('กรุณาเลือกไซส์');
            }else{
                $.ajax({
                    type: 'POST',
                    url: '<?=base_url("Cart/addToCart"); ?>',
                    data: {
                        pid: pid,
                        qty: qty,
                        pets: pets,
                        action: 'addCart', 
                        '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>',
                    },
                    crossDomain: true,
                    success: function (response) {
                        console.log('response=' + response);
                        var obj = JSON.parse(response);
                            console.log('obj=' + obj);
                        if (obj.result) {
                            location.reload();
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>