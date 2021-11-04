<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>History Order | Salepage </title>

	<link rel="shortcut icon" href="<?=base_url('./assets/images/logo/d7c90b3a35d01b317f81cff953169702.png');?>">
	<link href="<?=base_url('./assets/images/logo/d7c90b3a35d01b317f81cff953169702.png');?>" rel="apple-touch-icon">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap.css');?>" >
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap-extend.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/site.css');?>">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/animsition/animsition.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/asscrollable/asScrollable.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/switchery/switchery.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/intro-js/introjs.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/slidepanel/slidePanel.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/flag-icon-css/flag-icon.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/v2.css');?>">

	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/bootstrap-table/bootstrap-table.css?v4.0.2');?>">

	<!-- Fonts -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/fonts/web-icons/web-icons.min.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/fonts/font-awesome/font-awesome.min.css');?>">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

	<!-- Scripts -->
	<script src="<?=base_url('./assets/admin/vendor/breakpoints/breakpoints.js');?>"></script>
	<script>
		Breakpoints();
	</script>

<style>
	@media print {
		.mytable
{
border-collapse:collapse;
border-color:#000000; 
border-style:solid; 
border-width:2px;
}

.mytable td
{
border-color:#cccccc; /*grey*/
border-style:solid; 
border-width:1px;
}
}
</style>
</head>
<body class="">
	<!-- menu -->
	<?php $this->load->view('admin/menu'); ?>
	<!-- end -->
    	<!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">
			<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-lg-7">		
					<!-- Panel Static Labels -->
		          	<div class="panel">
			            <div class="panel-heading">
						  <div class="row">
							  <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								  <h1 class="panel-title">Order Details</h1>
								</div>
							  <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
							  	<div class="d-flex justify-content-end">
								  <h1 class="panel-title">
							  <?php //if($order_history[0]['slip'] !='' && $order_history[0]['is_check'] =='1') : ?>
								<!-- <button type="button" class="btn btn-primary" onclick="printInfo(this)"><i class="fa fa-print" aria-hidden="true"></i> Print</button> -->
								<?php //endif; ?>
							</h1>

								  </div>
							  </div>
						  </div>
							
						  

			            </div>
			            <div class="panel-body container-fluid">
						<h6>Order NO: <?=$order_history[0]['order_no'];?></h6>
							<table class="table table-striped">
								<thead>
								<tr>
									<th>จำนวน</th>
									<th>รายการ</th>
									<th>ราคา</th>
									<th>รวม</th>	
								</tr>
								</thead>
								<tbody>
									<?php 
										$sub_total =0;
										$grand_total=0;
										foreach($order_i as $val_item) : 
											$sub_total +=$val_item['total'];
										?>
											<tr>
												<td><?=$val_item['qty'];?>x</td>
												<td><?=$val_item['product_name'];?> <br> 
												<td><?=$val_item['subtotal'];?></td>
												<td><?=number_format($val_item['total'],2); ?>.-</td>
											</tr>
									<?php endforeach; 
										$grand_total =$sub_total + $order_history[0]['order_delivery'];
									
									?>
									<tr >
										<td class="padding-top-30 text-right" colspan="4">
										<p>รวม <?=number_format($sub_total);?> บาท</p>
									</tr>
									<tr >
										<td class="padding-top-30 text-right" colspan="4">
										<p>ค่าจัดส่ง <?=number_format($order_history[0]['order_delivery'],2);?> บาท</p>
									</tr>
									<tr >
										<td class="padding-top-30 text-right" colspan="4">
										<h3>รวมทั้งหมด <?=number_format($grand_total,2); ?> บาท</h3></td>
									</tr>
								</tbody>
							</table>
						</div>
					  </div>
		          	<!-- End Panel Static Labels -->			
				</div>

				<div class="col-lg-5">		
					<div class="panel">
						<div class="row">
							<div class="col-lg-12">
								<!-- Panel Static Labels -->
									<div class="panel-heading">
										<h1 class="panel-title font-weight-bold">ข้อมูลลูกค้า :</h1>
									</div>
									<div class="panel-body">
										<h4> <strong>ชื่อลูกค้า :</strong>  <?=$order_history[0]['customer'];?></h4>
										<h4><strong>เบอร์ติดต่อ :</strong>  <?=$order_history[0]['order_tel'];?></h4>
										<h4><strong>ที่อยู่จัดส่ง :</strong> <?=$order_history[0]['order_address'];?>
                                        <h4><strong>แขวง/ตำบล :</strong> <?=$order_history[0]['tambon']; ?></h4>
										<h4> <strong>เขต/อำเภอ :</strong> <?=$order_history[0]['aumphur']; ?></h4>
										<h4><strong>จังหวัด :</strong> <?=$order_history[0]['province']; ?></h4>
										<h4><strong>รหัสไปรษณีย์ :</strong> <?=$order_history[0]['zipcode']; ?></h4>
											
											
										<h4><strong>วันที่ชำระเงิน :</strong>  <?php if($order_history[0]['update_date'] !=''){ echo $order_history[0]['update_date'];}else{echo '-';}?></h4>
										<?php //if ($order_detail[0]['delivery_type'] == '0') : ?>
											<!-- <h4><strong>การจัดส่ง :</strong> J&T</h4> -->
										<?php //else : ?>
											<!-- <h4><strong>การจัดส่ง :</strong> ชำระค่าจัดส่งปลายทาง</h4> -->
										<?php //endif ?>
										<?php if($order_history[0]['Days'] >=1 && $order_history[0]['slip'] =='') : 
											echo '<h4 ><strong>สถานะ:</strong> <b class="text-danger">ยกเลิกอัตโนมัติ</b></h4>'; 
											else : ?> 
											<h4>หลักฐานการโอนเงิน :</h4>		
										<?php if ($order_history[0]['slip'] !='' && $order_history[0]['is_check'] == '0') : ?>	
											<div class="img-slip">
												<a href="<?=base_url('./assets/images/slip/'.$order_history[0]['slip']);?>" target="_blank">
													<img src="<?=base_url('./assets/images/slip/'.$order_history[0]['slip']);?>" class="img-res img-fluid" style="width: 40%;" alt="<?=$order_history[0]['slip'];?>" >
												</a>
											</div>
											<h4 ><strong>สถานะ:</strong> <b class="text-success">ชำระเงินเรียบร้อยแล้ว</b></h4>
										<?php elseif($order_history[0]['slip'] !='' && $order_history[0]['is_check'] =='1') : ?>
											<div class="img-slip">
												<a href="<?=base_url('./assets/images/slip/'.$order_history[0]['slip']);?>" target="_blank">
													<img src="<?=base_url('./assets/images/slip/'.$order_history[0]['slip']);?>" class="img-res img-fluid" style="width: 40%;" alt="<?=$order_history[0]['slip'];?>" >
												</a>
											</div>
												<h4><strong>สถานะ:</strong> <b class="text-success">Complete</b></h4>
										<?php else : ?>
											
												<h4><strong>สถานะ:</strong> ยังไม่ชำระเงิน</h4>
											
										<?php endif ?>

										<?php endif; ?>

										<div class="row">
											<br>
									<div class="col-12 col-lg-12 col-xl-12">
									<?php if ($order_history[0]['slip'] !='' && $order_history[0]['is_check'] == '0') : ?>
										<form action="<?=base_url('Admin/payment_confirm');?>" method="post" enctype="multipart/form-data">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
										<input type="hidden" name="is_check" id="is_check" value="1">
										<input type="hidden" name="order_id" id="order_id" value="<?=$order_history[0]['id'];?>">
										<div class="d-flex justify-content-end">
											<button type="submit" class="btn btn-success">ยืนยัน</button>
										</div>
										</form>
									<?php elseif($order_history[0]['slip'] !='' && $order_history[0]['is_check'] =='1') : ?>
										<div class="d-flex justify-content-end">
											<button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" onclick="window.location.href = '<?=base_url('Admin/order');?>';"><span><i class="icon wb-close" aria-hidden="true"></i> ปิด</span>
						            		</button>
										</div>
									<?php else : ?>
										<div class="d-flex justify-content-end">
											<button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" onclick="window.location.href = '<?=base_url('Admin/order');?>';"><span><i class="icon wb-close" aria-hidden="true"></i> ปิด</span>
						            		</button>
										</div>
									<?php endif ?>
									</div>
								</div>		
									</div>
										
									</div>
								<!-- End Panel Static Labels -->		
							</div>	
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page -->
	
	<!-- windows print -->
	<div id="order-to-print" style="display: none;">
	<table class="mytable" style="width:100%">
    <tr>
        <td>Content</td>
        <td>Content</td>
        <td>Content</td>
    </tr>
     <tr>
        <td>Content</td>
        <td>Content</td>
        <td>Content</td>
    </tr>
     <tr>
        <td>Content</td>
        <td>Content</td>
        <td>Content</td>
    </tr>
</table>
	</div>
	
    
    <!-- footer -->

	<?php
		$this->load->view('admin/footer');
	?>

	<!-- Core-->
	<script src="<?=base_url('./assets/admin/vendor/babel-external-helpers/babel-external-helpers.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/jquery/jquery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/popper-js/umd/popper.min.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/bootstrap/bootstrap.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/animsition/animsition.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/mousewheel/jquery.mousewheel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/asscrollbar/jquery-asScrollbar.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/asscrollable/jquery-asScrollable.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/ashoverscroll/jquery-asHoverScroll.js');?>"></script>

	<!-- Plugins -->
	<script src="<?=base_url('./assets/admin/vendor/switchery/switchery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/intro-js/intro.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/screenfull/screenfull.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/slidepanel/jquery-slidePanel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/skycons/skycons.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/aspieprogress/jquery-asPieProgress.min.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/matchheight/jquery.matchHeight-min.js');?>"></script>

	<script src="<?=base_url('./assets/admin/vendor/bootstrap-table/bootstrap-table.js?v4.0.2');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js?v4.0.2');?>"></script>

	<!-- Scripts -->
	<script src="<?=base_url('./assets/admin/assets/js/Component.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Base.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Config.js');?>"></script>

	<script src="<?=base_url('./assets/admin/assets/js/Section/Menubar.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Section/GridMenu.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Section/Sidebar.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Section/PageAside.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/menu.js');?>"></script>

	<script src="<?=base_url('./assets/admin/assets/js/config/colors.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/config/tour.js');?>"></script>

	<!-- Page -->
	<script src="<?=base_url('./assets/admin/assets/js/Site.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/asscrollable.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/slidepanel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/switchery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/matchheight.js');?>"></script>

	<script src="<?=base_url('./assets/admin/assets/js/v1.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/tables/bootstrap.js?v4.0.2');?>"></script>


<script>

function ShowInput(){
index = document.getElementById('promotion').value;
if(index == '1'){
    document.getElementById('priceProduct').style.display='';
} else {
    document.getElementById('priceProduct').style.display='none';
}
}

// windows print
function printInfo() {
	var prtContent = document.getElementById("order-to-print");
	var css = '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;'
        '}' +
        '</style>'
var WinPrint = window.open('', '', 'left=0,top=0,width=900,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
