<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>Salepage | ปลากะพง</title>
<meta name="keywords" content="Salepage, ปลากะพง">
<meta name="description" content="Salepage ปลากะพง">
<meta name="author" content="">
<meta property="og:title" content="Is Am Ice" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>" />
<meta property="og:url" content="https://example.com" /> 

<link href="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>" rel="icon">
<link href="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>" rel="apple-touch-icon">

<link rel="shortcut icon" href="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>"> 
<link rel="stylesheet" href="<?=base_url('./assets/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/style-runa.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/responsive.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/carousel.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/custom.css');?>">

<script src="<?=base_url('./assets/js/modernizr.js');?>"></script> <!-- Modernizr -->
<script src="<?=base_url('./assets/js/jquery.min.js');?>"></script>
<script src="<?=base_url('./assets/js/bootstrap.min.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('./assets/css/w3.css');?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body id="page-top" class="politics_version">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="navbar-icon">
			<div class="social-icon">
				<a href="#" target="_blank">
					<img src="<?=base_url('./assets/images/icon/icon_fb.png');?>" class="icon-width">
				</a>
				<a href="#" target="_blank">
					<img src="<?=base_url('./assets/images/icon/icon_line.png');?>" class="icon-width">
				</a>
				<a href="#" target="_blank">
					<img src="<?=base_url('./assets/images/icon/icon_tel.png');?>" class="icon-width">
				</a>
			</div>

			<div align="right">
				<div class="">
					<button onclick="location.href='<?=base_url('home');?>';" class="mass">กลับสู่หน้าหลัก</button>
				</div>
			</div>
		</div>
	</nav>

	<div class="payment">
		<div class="container">
			<div class="row text-center">
				<div class="col text-center">
					<div class="customers box-payment">
						<div class="profile-logo mr-t-15">
							<img src="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" class="logo-popup">
						</div>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="rows">
								<div class="col-md-12 col-xs-12 col-sm-12 text-center">
									<h4><strong>รายการสรุปคำสั่งซื้อ</strong></h4>
								</div>
							</div>
							<div class="rows">
								<div class="col-md-12 col-xs-12 col-sm-12 text-center">
									<h4><?=$order_detail[0]['order_no']; ?></h4>
									<h6 class="text-dark"><?=date("d-m-Y ", strtotime($order_detail[0]['create_date']));?> / <?=$order_detail[0]['create_time']?> น. </h6>
								</div>
							</div>
						</div>
						<hr>
						<div class="col-md-12 col-xs-12 col-sm-12 text-left">
							<h4><strong>ผู้รับ</strong></h4>
							<h4><strong>ชื่อ : </strong><?=$order_detail[0]['customer']; ?></h4>
							<h4><strong>เบอร์ไทรศัพท์ : </strong><?=$order_detail[0]['order_tel']; ?></h4>
							<h4><strong>ไอดี ไลน์ : </strong><?=$order_detail[0]['order_line']; ?></h4>
							<h4><strong>ที่อยู่จัดส่ง : </strong><?=$order_detail[0]['order_address']; ?>
							</h4>
							<h4><strong>ตำบล/แขวง : </strong><?=$order_detail[0]['tambon']; ?></h4>
							<h4><strong>อำเภอ/เขต : </strong><?=$order_detail[0]['aumphur']; ?></h4>
							<h4><strong>จังหวัด : </strong><?=$order_detail[0]['province']; ?></h4>
							<h4><strong>รหัสไปรษณีย์ : </strong><?=$order_detail[0]['zipcode']; ?></h4>
							<!-- <?php if ($order_detail[0]['delivery_type'] == '2') : ?>
							<h4><strong>การจัดส่ง : </strong><?=$order_detail[0]['delivery_note']; ?></h4>
							<?php else : ?>
							<h4><strong>การจัดส่ง : </strong>จัดส่งเลย</h4>
							<?php endif ?> -->
						</div>
						<hr>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="rows">
								<div class="col-md-6 col-xs-6 col-sm-6 text-left">
									<h4><strong>สินค้า</strong></h4>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6 text-right">
									<h4><strong>ราคา</strong></h4>
								</div>
							</div>
						</div>
						<hr>
						<?php foreach ($order_i as $order_i_detail) : ?>
						<div class="col-md-12">
							<div class="rows">
								<div class="col-md-10 col-xs-6 col-sm-6 text-left">
									<h6><?=$order_i_detail['product_name'].' x'.$order_i_detail['qty']; ?></h6>
									<h6><strong>หมายเหตุ :</strong><?=$order_i_detail['text_note']; ?></h6>
								</div>
								<div class="col-md-2 col-xs-2 col-sm-2 text-right">
									<h6><?=$order_i_detail['subtotal']; ?></h6>
								</div>
							</div>
						</div>
						<?php endforeach ?>
						<hr>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="rows">
								<div class="col-md-6 col-xs-6 col-sm-6 text-left ">
									<h4><strong>ค่าส่ง</strong></h4>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6 text-right">
									<h4><strong>฿<?=number_format($order_detail[0]['order_delivery'], 2); ?></strong>
									</h4>
								</div>
							</div>
							<div class="rows">
								<div class="col-md-6 col-xs-6 col-sm-6 text-left ">
									<h4><strong>ยอดรวม</strong></h4>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6 text-right">
									<h4><strong>฿<?=number_format($order_detail[0]['order_total'], 2); ?></strong>
									</h4>
								</div>
							</div>
						</div>
						<hr>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="rows">
								<div class="col-md-12 col-xs-12 col-sm-12 text-center ">
									<h4><strong>โอนเงินเข้าบัญชี</strong></h4>
									<img src="<?=base_url('./assets/images/kb.png');?>" class="promt-img">
									<h3>ธ.กสิกรไทย ( สาขา xxx )</h3>
									<h3> บจก. xxx</h3>
									<h3>เลขบัญชี <div id="bookbank">123-4-12345-6</div>
									</h3>
									<button id="copy" class="copy-button">กด 1 ครั้ง เพื่อคัดลอกเลขบัญชี</button>
									<h5>หลังจากนั้นกดปุ่มด้านล่างเพื่อส่งหลักฐานการชำระเงิน</h5>
									<form action="<?=base_url('payment/payment_add');?>" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
										<div class="file-upload">
											<button class="btn btn-secondary" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i	class="fa fa-file-image-o" aria-hidden="true"></i>&ensp;อัพโหลดสลิปโอนเงินที่นี่</button>
											<input class="file-upload-input" type="file" id="slipImg" name="slipImg" required onchange="readURL(this);" accept="image/*" />
											<div class="image-upload-wrap" style="display:none">
												<div class="image-title-wrap">
													<button type="button" onclick="removeUpload()" class="remove-image">X</button>
												</div>
												<img class="file-upload-image img-responsive" src="#" alt="your image" />
											</div>
										</div>
										<input type="hidden" name="order_id" value="<?=$order_detail[0]['id']; ?>">
										<input type="hidden" name="timestamp" id="timestamp" value="<?=$timestamp;?>">
										<button id="subb" type="submit" class="btn btn-send btn-success">Send</button>
									</form>
								</div>
							</div>
							<p style="color: red;">
							<br>
							<br>ชำระเงินค่าสินค้าภายใน 24 ชม. เท่านั้น
							<br>**หากเลยกำหนดชำระคำสั่งซื้อจะถูกยกเลิกอัตโนมัติ**</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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

	<!-- <?php if ($Current == 1) : ?>
<div id="id01" class="w3-popup">
  <div class="w3-popup-content">
    <div class="w3-container">
		<div class="close-time">
			<h1>ขออภัย !!!</h1>
			<h2>ร้านหยุดทำการ</h2>
		</div>
    </div>
  </div>
</div>
<?php elseif ($logo_list[0]['is_open'] == '0') : ?>
<div id="id01" class="w3-popup">
  <div class="w3-popup-content">
    <div class="w3-container">
		<div class="close-time">
			<h1>ขออภัย !!!</h1>
			<h2>ร้านปิดชั่วคราว</h2>
		</div>
    </div>
  </div>
</div>
<?php endif ?> -->


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
		function copyToClipboard(element) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($(element).text()).select();
			document.execCommand("copy");
			$temp.remove();
		}
		var btnText = document.getElementById("copy");

		$('#copy').on('click', function () {
			btnText.innerHTML = "คัดลอกเลขบัญชีแล้ว";
			copyToClipboard('#bookbank');
			$(".copy-button").css('color', '#009e08').css('border-color', '#009e08').css('background-color',
				'transparent');
		});

		$(document).ready(function () {
			$("#subb").click(function () {
				document.getElementById('modal-complete').style.display = 'block';
				setTimeout(function () {
					window.location.href = 'home'
				}, 3000);
			});
		});
	</script>
	<script>
		$(window).scroll(function () {
			if ($(window).scrollTop() + $(window).height() > $(document).height() - 150) {
				$('#signup').addClass('show')
			} else {
				$('#signup').removeClass('show')
			}
		});
	</script>
</body>
</html>