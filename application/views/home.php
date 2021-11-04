<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title><?=$name_sale[0]['name']; ?></title>
<meta name="keywords" content="ปลากะพง ปลากะพงยักษ์">
<meta name="description" content="ปลากะพงยักษ์ Giant Sea bass ขาวผ่องฟาร์ม จังหวัดฉะเชิงเทรา ใหญ่ สด สะอาด">
<meta name="author" content="">
<meta property="og:title" content="ปลากะพงยักษ์ Giant Sea bass ขาวผ่องฟาร์ม จังหวัดฉะเชิงเทรา ใหญ่ สด สะอาด" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" />
<meta property="og:url" content="https://kaopongfarm.com/" /> <!-- Site Icons -->
<!-- Favicons -->
<link href="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" rel="icon">
<link href="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" rel="apple-touch-icon">

<link rel="stylesheet" href="<?=base_url('./assets/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/style-runa.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/responsive.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/carousel.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/custom.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/w3.css');?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="<?=base_url('./assets/js/modernizr.js');?>"></script> <!-- Modernizr -->
<script src="<?=base_url('./assets/js/jquery.min.js');?>"></script>
<script src="<?=base_url('./assets/js/bootstrap.min.js');?>"></script>
</head>
<body id="page-top" class="politics_version">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top pt-0 pt-md-3 pt-lg-3 pt-xl-3 pb-0 pb-md-1 pb-lg-3 pb-xl-3" id="mainNav">
		<div class="navbar-icon">
			<div class="pl-2 social-icon d-flex justify-content-center">
				<a href="<?=$sociallinks[0]['fbicon'];?>" target="_blank">
					<img src="<?=base_url('./assets/images/icon/icon_fb.png');?>" class="icon-width">
				</a>
				<a href="<?=$sociallinks[0]['licon'];?>" target="_blank">
					<img src="<?=base_url('./assets/images/icon/icon_line.png');?>" class="icon-width">
				</a>
				<a href="tel:<?=$sociallinks[0]['picon'];?>" >
					<img src="<?=base_url('./assets/images/icon/icon_tel.png');?>" class="icon-width">
				</a>
			</div>
			<div class="d-flex bd-highlight">
				<div class="flex-grow-1 bd-highlight">
					<div class="d-flex justify-content-center">
						
					</div>
				</div>
				
				<div class="pt-1 bd-highlight">
          <div class="o-header">
            <div class="o-header__cart pb-3">	
							<?php if (!empty($_SESSION['cart'])) : ?>
								<?php if ($_SESSION['cart']['num'] != 0) : ?>
									
                  <button id="cart" class="button-bag">
						<img src="<?=base_url('./assets/images/icon/cart-t.png');?>" class="icon-width-cart"><sup><div class="o-header__cartCount">
										<span class="o-header__cartQuantity">
                      <?php echo ( isset($_SESSION["cart"]['num']) and $_SESSION["cart"]['num'] > 0 ) ? $_SESSION["cart"]['num'] : '';?>
                    </span>
									</div></sup>
          </button>
							<?php endif; 
              else : ?>
              <button id="cart" class="button-bag">
						<img src="<?=base_url('./assets/images/icon/cart-t.png');?>" class="icon-width-cart">
          </button>
							<?php endif ?>
						</div>
					</div>
						<a href="#popup1">		
						<button type="button" class="btn btn-link text-white pl-1 pr-1">แจ้งชำระเงิน</button>
						</a>

            <div class="bt-add">
              <!-- link to line for tracking -->
			  <a href="<?=$sociallinks[0]['licon'];?>" target="_blank">
			  	<button type="button" class="btn btn-link text-white pl-1 pr-1">เช็คเลขพัสดุ</button>	
				</a>
			</div>
		</div>
			</div>
			
			<!-- partial -->
			<?php if ( isset($_SESSION["cart"]['num']) AND $_SESSION["cart"]['num'] > 0 ) : ?>
			<div class="shopping-cart" id="shopping-cart">
				<div class="shopping-cart-header text-center">
					<h1>รายการสั่งซื้อ</h1>
					<a class="x-close" id="hide">X</a>
				</div>
				<!--end shopping-cart-header -->

				<ul class="shopping-cart-items" id="height-overflow">
					<table class="table table-bordered">
						<tbody class="underline-table">
							<!-- <div class="height-overfolow"> -->
							<?php 
									$total = 0;
									foreach ($_SESSION["cart"]['id'] as $value) : 
									$subtotal = $_SESSION["cart"]['qty'][$value] * $_SESSION["cart"]['price'][$value];
									$total += $subtotal;
								?>
							<tr>
								<td class="width-fit" id="non-bottom">
									<button type="button" class="btn-danger-cart hide-480"
										onclick="deleteCart(<?=$_SESSION['cart']['id'][$value]; ?>)">ลบสินค้า</button>
									<button type="button" class="border-non show-480"
										onclick="deleteCart(<?=$_SESSION['cart']['id'][$value]; ?>)"><i
											class="fa fa-trash" aria-hidden="true"></i></button>
								</td>

								<td><?php echo $_SESSION["cart"]['qty'][$value]; ?>x</td>
								<td>
									<div class="w5"><?php echo $_SESSION["cart"]['name'][$value]; ?></div>
									<?php if (!empty($_SESSION["cart"]['textnote'][$value])) : ?>
									<div class="comment">
										<strong
											class="extension"><?php echo $_SESSION["cart"]['textnote'][$value]; ?></strong>
									</div>
									<?php endif ?>
								</td>
								<?php 
											$pdprice 	= $_SESSION["cart"]['price'][$value];
											$pdqty 		= $_SESSION["cart"]['qty'][$value];
											$sumPd 		= $pdprice * $pdqty;
										?>
								<td class="text-right" id="pdr-0"><?php echo number_format($sumPd); ?></td>
							</tr>
							<?php endforeach ?>
							<!-- promotion id 32 >> 2 ชิ้น ฟรี ค่าส่ง -->
							<?php 

								$delivery = 30;
								$pss = 0;
								foreach ($_SESSION["cart"]['id'] as $key => $value){
							
									$ps = 0;
									$subdp = $_SESSION["cart"]['qty'][$key];
									$pss += ($subdp * 10);
									// $delivery += $subdp;
								}

								$totl_delivery = $delivery + $pss;
								// print_r($totl_delivery);
							?>

							<!-- -------------------------------------- -->

							<?php 
								if (!empty($_SESSION["cart"]['id'][32]) && $_SESSION["cart"]['qty'][32] == 2) {
									$sumTotal = $total;
								} else {
									$sumTotal = $total;
								}
								?>
							<!-- end promotion id 32 >> 2 ชิ้น ฟรี ค่าส่ง -->
							<!-- </div> -->
						</tbody>
					</table>
				</ul>
				<ul class="total-thb text-right padding-top-10 padding-bottom-15">
					<!-- promotion id 32 >> 2 ชิ้น ฟรี ค่าส่ง -->
					<!-- <p>Delivery&emsp;<?php echo $totl_delivery; ?>&emsp;THB</p> -->

					<!-- end promotion id 32 >> 2 ชิ้น ฟรี ค่าส่ง -->
					<h3>Total&emsp;<?php echo number_format($sumTotal); ?> THB</h3>
				</ul>
				<div class="shopping-cart-header text-center">
					<button onclick="document.getElementById('modal-address').style.display='block'
						document.getElementById('shopping-cart').style.display='none'" class="button-conferm ">ยืนยัน</button>
				</div>
				<!--end shopping-cart-header -->
			</div>
			<!--end shopping-cart -->
			<?php endif ?>

		</div>
	</nav>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?php foreach ($slide_list as $slide_detail) : ?>
			<div class="item active">
				<div class="slide-box-img">
					<img src="<?=base_url('assets/images/banner/'.$slide_detail['img_cover']);?>"	alt="<?=$slide_detail['name']; ?>" class="img-responsive">
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>

	<div id="content" class="section wb">
		<div class="container">
			<div class="row padding-bottom-30">
				<div class="profile">

					<div class="col-lg-12 text-center padding-bottom-15">
						<div class="profile-logo">
							<img src="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" class="">
						</div>
					</div>

					<div class="col-lg-12 text-center">
						<h2><?=$name_sale[0]['name']; ?></h2>
					</div>

					<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p><?=$dsc_detail_s[0]['dsc']; ?></p>
					</div>
				</div>

				<div class="col-lg-12 padding-bottom-15 margin-top">
					<?php if(@$ck_vdo == TRUE) : ?>
						<h4><?=$yl[0]['name_y']; ?></h4>
						<?php else : ?>
						<h4><?=$yl[0]['name_y']; ?></h4>
					<?php endif;
            @$ck_vdo = $yl[0]['link_y'];
            if(@$ck_vdo == TRUE){
              function getYoutubeEmbedUrl($url){
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
                                                                   
                if (preg_match($longUrlRegex, $url, $matches)) {
                  $youtube_id = $matches[count($matches) - 1];
                }                                    
                if (preg_match($shortUrlRegex, $url, $matches)) {
                  $youtube_id = $matches[count($matches) - 1];
                }
                return 'https://www.youtube.com/embed/' . $youtube_id ;
							}
						} 
					?>
					<iframe class="video-width" width="100%"
						src="<?php echo getYoutubeEmbedUrl($yl[0]['link_y']); ?>?&autoplay=1&loop=1&rel=0&controls=1&mute=0"
						frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen>
					</iframe>
				</div>
			</div><!-- end row -->
		</div>
	</div><!-- end section -->


	<div id="content-menu" class="section wb">
		<div class="container">
			<div class="container-fluid padding-lr-15">
				<div class="row text-center padding-bottom-15">
					<div class="col-lg-12">
						<div class="menu">
							<h1>สั่งซื้อสินค้า</h1>
						</div>
					</div>
				</div>
				<div class="row">

					<?php foreach ($product_list as $product_detail) : ?>
					<div class="col-lg-4 col-sm-4 col-6 product-detail padding-bottom-30 text-center wrp-header">
						<div class="post-media wow fadeIn ">
							<div class="content-product">
								<div class="product-box-img">
									<img src="<?=base_url('./assets/images/menu/'.$product_detail['img_cover']);?>"
										class="img-responsive">
								</div>
							</div>
						</div>
						<div class="service-dit">
							<div class="magin-20">
								<h1><?=$product_detail['name']; ?></h1>
								<h1><?=$product_detail['weight'];?> <?=$product_detail['unit_id'];?></h1>
							</div>
							<h1><?=number_format($product_detail['price']);?>.-</h1>
							<button type="button" class="button-add"
								onclick="showProduct(<?=$product_detail['id']; ?>)">Add +</button>
						</div>
					</div>
					<!-- end service -->
					<?php endforeach ?>

				</div>
			</div>

		</div>

		<div class="col-md-12 margin-top-30 margin-boton-30">
			<div class="d-flex justify-content-end">
				<i id="back-to-top" class="fa fa-arrow-up p-3" aria-hidden="true" style="background-color: #5faee3;border-radius: 50%;color: #ffffff;"></i>
			</div>
		</div>
	</div>
	<!-- /////////////////////// ชำระเงิน ///////////////////////////////// -->
	<div id="popup1" class="popup">

		<div class="containerss">
			<a href="#" class="close text-center">&times;</a>
			<h2>เช็คสถานะการชำระเงิน</h2>

			<form class="text-center" id="checkout-form">

				<div class="form-inline float-right ">
					<div class="form-group padding-bottom-15">
						<label for="name">ชื่อลูกค้า &ensp;</label>
						<input type="text" class="form-control" id="ffname" name="ffname" placeholder="*" required>
					</div>
				</div>
				<div class="form-inline float-right ">
					<div class="form-group padding-bottom-15">
						<label for="tel">เบอร์โทร &ensp;</label>
						<input type="text" class="form-control" id="ftel" name="ftel" placeholder="*"
							onKeyUp="if(this.value*1!=this.value) this.value='' ;" pattern="[0-9]{10}" maxlength="10"
							required>
					</div>
				</div>

				<div class="form-inline text-center " id="float-right-auto">
					<div class="form-group padding-bottom-15">
						<button type="button" class="button-sub" onclick="chMoneys()">ถัดไป</button>

					</div>
				</div>

				<!-- <label for="text_note"></label> -->
			</form>

		</div>
		<p class="text-popup">หมายเหตุ &ensp; : &ensp;
		<br>หากออเดอร์ที่ท่านต้องการชำระเงินนั้นเกิน 24 ชม. ของวันที่ท่านได้ทำการสั่งซื้อ ออเดอร์จะถูกลบออกจากระบบ
			<br>**ท่านต้องทำการสั่งซื้อใหม่อีกครั้ง**</p>
	</div>
	<a href="#" class="close-popup"></a>

	<!-- <div id="popup1" class="popup">
			<div class="containerss">
				<a href="#" class="close text-center">&times;</a>
				<h2>แจ้งชำระเงิน</h2>
				<form class="text-center" id="checkout-form"  method="POST" enctype="multipart/form-data">

					<div class="form-inline float-right">
						<div class="form-group padding-bottom-15">
							<label for="name">ชื่อ &ensp;</label>
							<input type="text" class="form-control" id="names" name="names" placeholder="*" required>
						</div>
					</div>
					<div class="form-inline float-right">
						<div class="form-group padding-bottom-15">
							<label for="tel">เบอร์โทร &ensp;</label>
							<input type="text" class="form-control" id="ptel" name="ptel" placeholder="*" required>
						</div>
					</div>

					<div class="form-inline text-center " id="float-right-auto">
						<div class="form-group padding-bottom-15">
							<a class="button-sub" name="submitnotp" href="payment.php?id=<?php echo $order_back[0]['is_timestamp']; ?>">ถัดไป</a>
						</div>
					</div>

				</form>
			</div>
		</div>
		<a href="#" class="close-popup"></a> -->

	<!-- /////////////////////// modal1 | ชำระเงิน ///////////////////////////////// -->
	<div id="modal1" class="w3-modal">
		<div class="w3-modal-content text-center">
			<div class="table-non-bor">
				<a class="btn-close-x-product" onclick="document.getElementById('modal1').style.display='none'">X</a>
				<table class="table content-popup" id="pdesc">
				
				</table>
				<div class=" content-popup">
					<form class="text-center add-cart-form" method="GET">
						<input type="hidden" id="product_id" name="product_id">
						<div class="text-center quantity padding-bottom-10">
							<div class="num-block skin-7">
								<div class="num-in">
									<span class="minus dis">-</span>
									<input type="text" class="in-num" id="qty" name="qty" value="1" readonly="">
									<span class="plus">+</span>
								</div>
							</div>
						</div>
						<div class="form-inline">
							<div class="form-group padding-bottom-15">
								<label for="text_note">หมายเหตุ &ensp;</label>
								<input type="text" class="form-control" id="text_note" name="textNote">
							</div>
						</div>
						<button class="button-submit" type="button" onclick="addCart()">เพิ่ม</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /////////////////////// modal ///////////////////////////////// -->

	<div id="modal-address" class="w3-modal">
		<div class="w3-modal-content text-center">
			<a class="btn-close-x" onclick="document.getElementById('modal-address').style.display='none'">X</a>
			<div class="profile-logo mr-t-15">
				<img src="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" class="logo-popup">
			</div>
			<!-- test -->
			<form class="text-center" id="checkout-form" method="POST" enctype="multipart/form-data">
				<div class="content">
					<!-- <div class="form-group row"> -->
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">ชื่อ &ensp;</label> -->
						<div class="col-12">
							<input type="text" class="form-control w-100" id="fname" name="fname" placeholder="ชื่อ" required>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">เบอร์โทร &ensp;</label> -->
						<div class="col-12">
							<input type="text" class="form-control w-100" id="tel" name="tel" placeholder="เบอร์โทร" maxlength="10" required>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">ไอดี ไลน์ &ensp;</label> -->
						<div class="col-12">
							<input type="text" class="form-control w-100" id="lineid" name="lineid" placeholder="ไอดี ไลน์" >
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">ที่อยู่ &ensp;</label> -->
						<div class="col-12">
							<textarea rows="2" type="text" class="form-control w-100" id="address" name="address" placeholder="ที่อยู่จัดส่ง" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">จังหวัด &ensp;</label> -->
						<div class="col-12">
							<select id="inputProvince" name="inputProvince" class="form-control w-100" required>
                                <option value="">กรุณาเลือกจังหวัด</option>
                                <?php
								// $val_pro['province_id']
                                    foreach($provinces as $val_pro) : ?>
                                        <option name="inputProvince" value="<?=$val_pro['province_th']?>" ><?=$val_pro['province_th']?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="validation"></div>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">อำเภอ / เขต</label> -->
						<div class="col-12">
							<select id="inputDistrict" name="inputDistrict" class="form-control w-100" required>
                                            
							</select>
							<div class="validation"></div>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">ตำบล / แขวง</label> -->
						<div class="col-12">
							<select id="inputTumbon" name="inputTumbon" class="form-control w-100" required>
                                            
							</select>
							<div class="validation"></div>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="fname" class="col-4 col-form-label text-right">รหัสไปรษณีย์ &ensp;</label> -->
						<div class="col-12">
							<input type="text" class="form-control w-100" name="pos" id="pos" placeholder="รหัสไปรษณีย์" disabled required />
                            <div class="validation"></div>
						</div>
					</div>

  
					<div class="form-group">
						<div class="col-12">
							<button type="button" onclick="checkOut()" name="submitgq" class="button-submit">ถัดไป</button>
						</div>
					</div>
				</div>
			</form>
			<!-- end -->
		</div>
	</div>
	<!-- /////////////////////// modal ///////////////////////////////// -->

	<div class="bottom-footer text-center">
		<div class="container">
    <p>Copyright © 2021 All Rights Reserved.</p>
		</div>
	</div>

	<!-- Close Time -->
	<?php 
	$Current = Date('N');
	// 1 = Monday
	// 2 = Tuesday
	// 3 = Wednesday
	// 4 = Thursday
	// 5 = Friday
	// 6 = Saturday
	// 7 = Sunday
?>
	<?php if ($logo_list[0]['is_open'] == '0') : ?>
	<div id="id01" class="w3-popup">
		<div class="w3-popup-content">
			<div class="w3-container">
				<div class="close-time">
					<h1>Closed</h1>
					<h2>ร้านปิดชั่วคราว</h2>
				</div>
			</div>
		</div>
	</div>
	<?php endif ?>


	<script src="<?=base_url('./assets/js/all.js');?>"></script>
	<!-- Camera Slider -->
	<script src="<?=base_url('./assets/js/jquery.easing.1.3.js');?>"></script>
	<script src="<?=base_url('./assets/js/parallaxie.js');?>"></script>
	<script src="<?=base_url('./assets/js/headline.js');?>"></script>
	<script src="<?=base_url('./assets/js/jquery.appear.min.js');?>"></script>
	<script src="<?=base_url('./assets/js/skill.bars.jquery.js');?>"></script>
	<!-- Contact form JavaScript -->
	<script src="<?=base_url('./assets/js/jqBootstrapValidation.js');?>"></script>
	<script src="<?=base_url('./assets/js/contact_me.js');?>"></script>
	<!-- ALL PLUGINS -->
	<script src="<?=base_url('./assets/js/jquery.fatNav.min.js');?>"></script>
	<script src="<?=base_url('./assets/js/main.js');?>"></script>
	<script src="<?=base_url('./assets/js/custom.js');?>"></script>
	<!-- partial -->
	<script src="<?=base_url('./assets/js/script.js');?>"></script>
	<script src="<?=base_url('./assets/js/script-cart.js');?>"></script>

	<script src="<?=base_url('./assets/js/jquery.mask.min.js');?>"></script>
	<script>
		// $(window).scroll(function () {
		// 	if ($(window).scrollTop() + $(window).height() > $(document).height() - 300) {
		// 		$('#signup').addClass('show')
		// 	} else {
		// 		$('#signup').removeClass('show')
		// 	}
		// });

		function showProduct(pid) {
			$('#product_id').val(pid);
			document.getElementById('modal1').style.display = 'block';

			$.ajax({
				type: 'POST',
				url: '<?=base_url("Product/showProduct"); ?>',
				data: {
					pid: $('#product_id').val(),
					action: 'queryProduct',
          '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'
				},
				success: function (response) {
					var obj = JSON.parse(response);

					$("#pdesc").empty();

					var data = obj.data;
					for (i = 0; i < data.length; i++) {
						var newRowContent = "<thead><tr><th><div class=\"popup-img\"><img src=assets/images/menu/" +
							data[i].img_cover +
							" class=\"img-responsive\"></div></th></tr></thead><tbody><tr><td><h2>" + data[i]
							.name;

						$("#pdesc").append(newRowContent);
					}
				}
			});
		}

		function addCart() {
			var pid = $('#product_id').val();
			var qty = $('#qty').val();
			var textnote = $('#text_note').val();

			console.log(pid + ' : ' + qty + ' : ' + textnote);
			$.ajax({
				type: 'post',
				url: '<?=base_url("Cart/addToCart"); ?>',
				data: {
					pid: pid,
					qty: qty,
					textnote: textnote,
					action: 'addCart',
          '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'
				},
				success: function (response) {
					var obj = JSON.parse(response);
					if (obj.result) {
						// console.log(obj.sql);
						location.reload();
					}
				}
			});
		}

		function deleteCart(did) {
			var itemID = did;
			console.log(itemID);
			$.ajax({
				type: 'post',
				url: '<?=base_url("Cart/delCart"); ?>',
				data: {
					del: itemID,
					action: 'delCart',
          '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'
				},
				success: function (response) {
					var obj = JSON.parse(response);
					if (obj.result) {
						// console.log(obj.sql);
						location.reload();
					}
				}
			});
		}

		function checkOut() {
	
			const fname = $('#fname').val();
			const tel = $('#tel').val();
			const lineid = $('#lineid').val();
			const alladdress = $('#address').val();
			const prov = $('#inputProvince').val();
			const aumphur = $('#inputDistrict').val();
			const tumbon = $('#inputTumbon').val();
			const postalcode = $('#pos').val();

			console.log(fname + ' : ' + tel + ' : ' + lineid + ' : ' + alladdress);
			if ((fname == '') || (tel == '') || (lineid == '') || (alladdress == '')) {
				alert('กรุณากรอกข้อมูลให้ครบถ้วน');
			} else {
				$.ajax({
					type: 'POST',
					url: '<?=base_url("Cart/checkOut"); ?>',
					data: {
						fname: fname,
						tel: tel,
						lineid: lineid,
						alladdress: alladdress,
						changwat: prov,
						aumphur: aumphur,
						tumbon: tumbon,
						postalcode: postalcode,
						action: 'checkOut',
						'<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'
					},
					success: function (response) {
						var obj = JSON.parse(response);
						console.log(obj);
						if (obj.result) {
							window.location.href = '<?=base_url('payment/summary/?id=');?>' + obj.order_id;
						}
					}
				});
			}
		}

    // ตรวจสอบการชำระเงิน
		function chMoneys() {
			var fname = $('#ffname').val();
			var tel = $('#ftel').val();

			console.log(fname + ' : ' + tel);
			if ((fname == '') || (tel == '')) {
				alert('กรุณากรอกข้อมูลให้ครบถ้วน');
			} else {
				$.ajax({
					type: 'POST',
					url: '<?=base_url("payment/check_payment"); ?>',
					data: {
						fname: fname,
						tel: tel,
						action: 'checkMoneys',
            '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash();?>'
					},
					dataType: 'JSON',
					success: function (response) {
						if (response != 'false') {
							console.log(response[0].customer);
							var customer_name = response[0].customer;
							var tell = response[0].order_tel;
					
              window.location.href = '<?=base_url('payment/history/?id=');?>' + tell + '&name=' + customer_name;

						} else {
							alert('รายการสั่งซื้อของท่านเกินเวลาที่กำหนด\n**กรุณาทำการสั่งซื้อใหม่อีกครั้ง**');
						}
					}
				});
			}
		}
	</script>

	<script>
		$(document).ready(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 50) {
					$('#back-to-top').fadeIn();
				} else {
					$('#back-to-top').fadeOut();
				}
			});
			// scroll body to 0px on click
			$('#back-to-top').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 400);
				return false;
			});
			// 
			// inputProvince to print Aumphur
			$("#inputDistrict").html('<option value="">-- กรุณาเลือก เขต/อำเภอ --</option>');
			$("#inputProvince").on('change', function(){
				const proId = $("#inputProvince").val();
				$("#inputTumbon").html('<option value="">-- แขวง/ตำบล --</option>');
				$.ajax({
					type 	: 'POST',
					url 	: '<?=base_url("province/getAumphur"); ?>',
					data 	: {proid:proId, action:'changeProv', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
					success: function(data) {
						$("#inputDistrict").html(data);   	
					}
				});
			});
			// 
			// get val Aumphur val id to print Tumbon
			$("#inputTumbon").html('<option value="">-- แขวง/ตำบล --</option>');
			$("#inputDistrict").on('change', function(){
				const districtId = $("#inputDistrict").val();
				$.ajax({
					type 	: 'POST',
					url 	: '<?=base_url("province/getTumbon"); ?>',
					data 	: {aumphurId:districtId, action:'changeAumphur', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
					success: function(data) {
						$("#inputTumbon").html(data);   	
					}
				});
			});
			// // get val Tumbon val id to print postcode
			$("#inputTumbon").on('change', function(){
				const tumbon = $("#inputTumbon").val();
				$.ajax({
					type 	: 'POST',
					url 	: '<?=base_url("province/getPostcode"); ?>',
					data 	: {tumbon:tumbon, action:'changeTumbon', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
					success: function(data) {
						$("#pos").val(data);   	
					}
				});
			});
		});


		$(document).ready(function () {
			$('#tel').mask('9999999999');
		});

	</script>
</body>
</html>