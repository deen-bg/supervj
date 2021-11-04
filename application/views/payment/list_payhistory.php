<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title>Salepage | ปลากะพง</title>
<meta name="keywords" content="Salepage, ปลากะพง">
<meta name="description" content="Salepage ปลากะพง">
<meta name="author" content="">
<meta property="og:title" content="Is Am Ice" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>" />
<meta property="og:url" content="https://example.com" /> 

<!-- Site Icons -->
<!-- Favicons -->
<link href="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>" rel="icon">
<link href="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>" rel="apple-touch-icon">

<!-- Site Icons -->
<link rel="shortcut icon" href="<?=base_url('./assets/images/logo/Asset_17_4x_3.png');?>"> 

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?=base_url('./assets/css/bootstrap.min.css');?>">
<!-- Site CSS -->
<link rel="stylesheet" href="<?=base_url('./assets/css/style-runa.css');?>">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?=base_url('./assets/css/responsive.css');?>">
<link rel="stylesheet" href="<?=base_url('./assets/css/carousel.css');?>">
<!-- Custom CSS -->
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
            <?php 
                $i = 0;
                foreach($order_detail as $sumq_detail) : 
                    $is_check = $sumq_detail['is_check']; //$b
                    $is_slip = $sumq_detail['slip']; // $a
                    $is_days = $sumq_detail['Days'];

                    $received = "<b class='text-success'>รับชำระเงินเรียบร้อย</b>"; //$bb
                    $waiting = "รอการตรวจสอบ"; // $bbbb
                    $not_paid = "ยังไม่ได้ชำระเงิน"; // $bbb
                    $canceled = "<b class='text-danger'>ยกเลิกอัตโนมัติ</b>"; 
                    ?>
                    <div class="row text-center">   
                        <div class="col text-center"> 
                            <div class="customers box-payment">
                                <div class="profile-logo mr-t-15">
                                    <img src="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" class="logo-popup">
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="rows">
                                        <div class="col-md-12 col-xs-12 col-sm-12 text-center">
                                            <h4><strong><?=$sumq_detail['order_no'];?></strong></h4>
                                            <h6 class="text-dark"><?=date("d-m-Y ", strtotime($sumq_detail['create_date']));?> / <?=$sumq_detail['create_time']?> น. </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="rows">
                                        <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                            <!-- <h4><strong>วันที่ :</strong></h4> -->
                                            <h4><strong>สถานะ</strong></h4>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                            <!-- <h4><?php //echo date("d/m/Y", strtotime( $sumq_detail['create_date'] )); ?></h4> -->
                                            <h4>
                                                <?php 
                                                    if($is_days >= 1 && $is_check == 0) : 
                                                        echo $canceled;
                                                    else : 
                                                        if ($is_check == 1) : 
                                                            echo $received;
                                                        elseif($is_slip != '') : 
                                                            echo $waiting;
                                                        else :
                                                            echo $not_paid;
                                                        endif; 
                                                    endif; 
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 col-xs-12 col-sm-12 text-left">
                                    <h4><strong>ชื่อ :</strong> <?=$sumq_detail['customer']; ?></h4>
                                    <h4><strong>เบอร์โทรศัพท์ :</strong> <?=$sumq_detail['order_tel']; ?></h4>
                                    <h4><strong>จำนวนสินค้า : </strong> <?=$sumq_detail['p_qty']; ?></h4>
                                    <!-- <hr> -->
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class="rows">
                                            <!-- test -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">สินค้า</th>
                                                        <th scope="col" style="text-align:end;">ราคา</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        foreach ($order_i as $order_i_detail) : ?>
                                                            <tr>
                                                                <td>
                                                                    <h6><?=$order_i_detail['product_name'].' x'.$order_i_detail['qty'];?></h6>
                                                                </td>
                                                                <td style="text-align:end;">
                                                                    <h6><?=$order_i_detail['subtotal']; ?></h6>
                                                                </td>
                                                            </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                            <!-- end -->
                                        </div>
                                    </div>
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
                                            <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                <h4><strong>ยอดรวม </strong></h4>
                                            </div>
                                            <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                                <h4><strong>฿<?=number_format($sumq_detail['order_total'],2);?></strong></h4>
                                            </div>
                                        </div>
                                    </div>
                                <hr>
                                <div class="col-md-12 col-xs-12 col-sm-12 text-center data">
                                    <h4>
                                        <?php 
                                            if($is_days >= 1 && $is_check == 0) : ?>
                                                <button type="button" class="button-show" onclick="window.location.href = '<?=base_url('home');?>';">สั่งซื้อใหม่</button>
                                            <?php else : 
                                                if ($is_check == 1) : ?>
                                                    <td class="th-inner"><?php echo "กำลังจัดส่ง"; ?></td>
                                                    <br><br>
                                                    <button type="button" href="#" class="btnbtn-outline-secondary btn-sm text-white" style="background-color: #3498db;border-radius: 30px;border-color: #ffffff;">เช็คเลขพัสดุ</button>
                                                    <br>
                                                    <br>
                                                    <p class="text-dark">*** ขอบคุณที่ใช้บริการ ***</p>
                                                <?php elseif($is_slip != '') : ?>
                                                    <td class="th-inner"><?php echo "ท่านได้ทำการอัพโหลดสลิปเรียบร้อย"; ?></td>
                                                <?php else : ?>
                                                    <button type="button" class="button-show" onclick="window.location.href = '<?=base_url('payment/summary/?id='.$sumq_detail['is_timestamp']);?>';">แจ้งชำระเงิน</button>
                                                    <br>
                                                    <br>
                                                    <p>ชำระเงินค่าสินค้าภายใน 24 ชม. เท่านั้น
                                                    <br>**หากเลยกำหนดชำระคำสั่งซื้อจะถูกยกเลิกอัตโนมัติ**</p>
                                                <?php endif; ?>
                                        <?php endif; ?>
                                    </h4>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
                endforeach; 
            ?>
        </div>
    </div>

    <div class="bottom-footer text-center">
        <div class="container">
        <p>Copyright © 2021 All Rights Reserved.</p>
        </div>
    </div>

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

</body>
</html>