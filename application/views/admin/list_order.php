<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Orders | Salepage </title>

	<link href="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" rel="icon">
	<link href="<?=base_url('./assets/images/logo/'.$logo_list[0]['img_cover']);?>" rel="apple-touch-icon">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap.css');?>">
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
</head>

<body class="">
	<!-- menu -->
	<?php $this->load->view('admin/menu'); ?>
	<!-- end -->
	<!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">

	      	<!-- Panel Other -->
	      	<div class="panel">
		        <div class="panel-heading">
		          	<h3 class="panel-title">All Order</h3>
		        </div>
		        <div class="panel-body">
		          	<div class="row row-lg">
			            <div class="col-md-12">
			              	<!-- Example Toolbar -->
			              	<div class="example-wrap">			                  
			                  	<div class="bootstrap-table">
			                  		<div class="fixed-table-toolbar">
									  <span class="badge badge-light">
									  <p>Status Payment: ชำระเงินค่าสินค้าภายใน 24 ชม.
                                    <br>**หากเกินเวลาที่กำหนดคำสั่งซื้อจะถูกยกเลิกอัตโนมัติ**</p>
									  </span>
									  
			                  			<div class="bs-bars pull-left">
			                
			                  			</div>
			                  		</div>
			                  		<div class="" style="padding-bottom: 0px;">
									  <?php

									  ?>
			                  			<div class="fixed-table-body">
                                          <table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover" data-pagination="true" data-search="true" style="margin-top: 0px;">
			                    				<thead style="">
			                    					<tr>
			                    						<th style="" data-field="id" data-align="center">
			                    							<div class="th-inner ">#</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Update date" data-align="center">
			                    							<div class="th-inner ">Date</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Time" data-align="center">
			                    							<div class="th-inner ">Time</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="order" data-align="center">
			                    							<div class="th-inner ">Order NO.</div>
			                    							<div class="fht-cell"></div>
														</th>
														<th style="" data-field="name" data-align="center">
			                    							<div class="th-inner ">Name</div>
			                    							<div class="fht-cell"></div>
														</th>
														<th style="" data-field="tel" data-align="center">
			                    							<div class="th-inner ">Tel.</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Total" data-align="right">
			                    							<div class="th-inner ">Total</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														
			                    						<th style="" data-field="Status" data-align="center">
			                    							<div class="th-inner ">Status Order</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Payment" data-align="center">
			                    							<div class="th-inner ">Status Payment</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="edit" data-align="center" data-width="120px">
			                    							<div class="th-inner ">Detail</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($orders)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													foreach($orders as $order_detail) : 
														$is_check = $order_detail['is_check'];
														$is_slip = $order_detail['slip'];

														$received = "ชำระเงินเรียบร้อย";
														$waiting = "รอการตรวจสอบ";
														$not_paid = "รอชำระเงิน";

														if($order_detail['slip'] !='' && $order_detail['is_check'] ==1) : ?>
															<tr class="text-success">
														<?php else : ?>
															<tr >
														<?php endif; ?>
			                  						 
			                  							<td class=""><?=$i+1; ?></td> 
														  <td style="">
															<?php
																if($order_detail['create_date'] !='') : ?>
																	<?=date("d/m/Y ", strtotime($order_detail['create_date'])); ?>
															<?php else : ?>
																	<p> '' </p>
															<?php endif; ?>
															
														</td>
														<td style=""><?=$order_detail['create_time']; ?></td>
														<td style=""><?=$order_detail['order_no']; ?></td>
														<td style=""><?=$order_detail['customer']; ?></td>
														<td style=""><?=$order_detail['order_tel']; ?></td>
														<td style=""><?=number_format($order_detail['order_total'],2); ?></td>
														
						                                <td style="">
															<?php 
																if(($order_detail['slip'] =='' && $order_detail['is_check'] == 0) || ($order_detail['slip'] !='' &&  $order_detail['is_check'] == 0)) :
																	echo 'รอการตรวจสอบ';
																elseif($order_detail['slip'] !='' && $order_detail['is_check'] ==1) :
																	echo '<b class="text-success">Complete</b>';
																  ?>
															<?php endif; ?>
						                                </td> 
			                  							<td style="">
															<?php 
																if($order_detail['Days'] >=1 && $order_detail['slip'] =='') :
																	echo '<b class="text-danger">ยกเลิกอัตโนมัติ</b>';
																else : 
																	if ($order_detail['slip'] !='') : 
																		echo '<b class="text-success">ชำระเงินแล้ว</b>';
																	elseif($order_detail['slip'] =='') :  
																		echo 'รอชำระเงิน';
																	?>
																	<?php endif; ?>
																<?php endif; ?>
														</td>
			                  							<td>
			                  								<button type="button" class="btn btn-round btn-warning btn-sm" onclick="window.location.href = '<?=base_url('Admin/history_detail/'.$order_detail['id']);?>';"><i class="icon wb-order" aria-hidden="true"></i></button>
			                  							</td>
			                  						</tr>
			                  						<?php
			                  							$i++;
			                  						endforeach; 
			                  						?>
			                  					</tbody>
			                  					<?php endif;  ?>
			                  				</table>
			                  			</div>
			                  			<div class="fixed-table-pagination" style="display: none;"></div>
			                  		</div>
				                  	<div class="clearfix"></div>
				                </div>
			              	</div>
			              	<!-- End Example Toolbar -->
			            </div>	         
		          	</div>
		        </div>
	      </div>
	      <!-- End Panel Other -->
    </div>
	</div>
	<!-- End Page -->
	<!-- footer -->
	<?php
		$this->load->view('admin/footer');
	?>

	<!-- /modals -->

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

	<script type="text/javascript">
	$(document).ready(function() {
		// bind change event handler
		$('#p_status').change(function() {
			// update disabled property
			$("#conf_st").prop('disabled', this.value == '');
			// trigger change event to set initial value
		}).change();
	});

	</script>
</body>
</html>
