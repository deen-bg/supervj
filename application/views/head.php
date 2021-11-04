<!-- ***** Header Area Start ***** -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Favicons -->
<link href="<?=base_url('./assets/img/logo.png');?>" rel="icon">
  <link href="<?=base_url('./assets/img/logo.png');?>" rel="apple-touch-icon">
  <!-- use for navbar -->
<link rel="stylesheet" href="<?=base_url('./assets/style.css');?>">
</head>
<header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
        <a href="#intro" class="scrollto"><img src="<?=base_url('./assets/img/logo.png');?>" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li>
            <a class="active" href="<?=base_url('home/');?>">หน้าแรก</a>
          </li>
          <li><a href="<?=base_url('about/');?>">เกี่ยวกับเรา</a></li>
          <li class="drop-down pro-nav"><a>สินค้า </a>
            <ul>
              <?php 
              foreach($cats_list as $cats_detail) : 
                $catsub_list = $this->Cart_model->cats_list($cats_detail['c_name']);
            ?>
              <li class="drop-down ">
                <a><?=$cats_detail['c_name']; ?></a>
                <ul>
                  <?php foreach($catsub_list as $catsub_detail) : ?>
                  <li>
                    <a href="<?=base_url('product/page/'.$catsub_detail['sub_id'])?>"><?=$catsub_detail['subcate_name'];?></a>
                  </li>
                  <?php endforeach ?>
                </ul>
              </li>
              <?php endforeach ?>
            </ul>
          </li>
          <li><a href="<?=base_url('review/page/');?>">รีวิวสินค้า</a></li>
          <li><a href="<?=base_url('howtoorder/');?>">วิธีการสั่งซื้อสินค้า</a></li>
          <li><a href="<?=base_url('contact');?>">ติดต่อเรา</a></li>

          <li>
            <a class="size-50" href="<?=base_url('cart/');?>">
              <i class="fa fa-shopping-cart " aria-hidden="true"></i>
              <?php echo (isset($_SESSION["cart"]['num']) and $_SESSION["cart"]['num'] > 0 ) ?  $_SESSION["cart"]['num'] : '';?>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>