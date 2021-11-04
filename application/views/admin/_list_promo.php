<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap admin template">
	<meta name="author" content="">

	<title>Promotion | Lenista Clinic </title>
    <link rel="shortcut icon" href="<?=base_url('./assets/img/core-img/logo.png');?>">

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

	<!--[if lt IE 9]>
	<script src="vendor/html5shiv/html5shiv.min.js"></script>
	<![endif]-->

	<!--[if lt IE 10]>
	<script src="vendor/media-match/media.match.min.js"></script>
	<script src="vendor/respond/respond.min.js"></script>
	<![endif]-->

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
		          	<h3 class="panel-title">โปรโมชั่น</h3>
		        </div>
		        <div class="panel-body">
		          	<div class="row row-lg">
			            <div class="col-md-12">
			              	<!-- Example Toolbar -->
			              	<div class="example-wrap">			                  
			                  	<div class="bootstrap-table">
			                  		<div class="fixed-table-toolbar">
			                  			<div class="bs-bars pull-left">
			                  				<div class="btn-group hidden-sm-down" id="exampleToolbar" role="group">
							                    <button type="button" class="btn btn-success btn-outline btn-sm" onclick="window.location.href = '<?=base_url('Admin/promotionForm');?>';">
							                      	<i class="icon wb-plus" aria-hidden="true"></i> เพิ่ม
							                    </button>
			                  				</div>
			                  			</div>
			                  		</div>
			                  		<div class="" style="padding-bottom: 0px;">
			                  			<div class="fixed-table-body">
			                  				<table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover" data-pagination="true" data-search="true" style="margin-top: 0px;">
			                    				<thead style="">
			                    					<tr>
			                    						<th style="" data-field="id" data-align="center">
			                    							<div class="th-inner ">#</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="name" data-toggle="tooltip" data-placement="top" title="Promotion Name">
			                    							<div class="th-inner ">ชื่อ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Special" data-align="center" data-toggle="tooltip" data-placement="top" title="Special Promotion">
			                    							<div class="th-inner ">โปรโมชั่นพิเศษ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<!-- <th style="" data-field="code">
			                    							<div class="th-inner ">Category</div>
			                    							<div class="fht-cell"></div>
			                    						</th> -->
														<th style="" data-field="recommend" data-align="center" data-toggle="tooltip" data-placement="top" title="Hilight">
			                    							<div class="th-inner ">ไฮไลท์</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="">
			                    							<div class="th-inner ">วันที่อัพเดท</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="edit" data-align="center" data-width="120px">
			                    							<div class="th-inner "></div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($promotion_lits)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													foreach($promotion_lits as $promotion_dsc) : 
													?>
			                  						<tr> 
			                  							<td class=""><?=$i+1; ?></td> 
			                  							<td style=""><?=$promotion_dsc['name']; ?></td>
														<td align="center">
														  <?php if ($promotion_dsc['is_special'] == '1') : ?>
			                  									<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="specialChange(<?=$promotion_dsc['id']; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
			                  								<?php else : ?>
			                  									<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="specialChange(<?=$promotion_dsc['id']; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  								<?php endif; ?>
														</td>
			                  							<!-- <td style="">
															<?php //if ($promotion_dsc['type'] == '1') : ?>
																Promotion
															<?php //elseif ($promotion_dsc['type'] == '2') : ?>
																News & Event
															<?php //else : ?>
																Teedy Talk
															<?php //endif ?>
														</td> -->
                                                        <td style="">
			                  								<?php if ($promotion_dsc['is_hilight'] == '1') : ?>
			                  									<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="sChange(<?=$promotion_dsc['id']; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
			                  								<?php else : ?>
			                  									<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="sChange(<?=$promotion_dsc['id']; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  								<?php endif; ?>
			                  							</td> 
			                  							<td style=""><?=date("d/m/Y H:i:s", strtotime($promotion_dsc['update_date'])); ?></td>
			                  							<td>
			                  								<button type="button" class="btn btn-round btn-warning btn-sm" onclick="window.location.href = '<?=base_url('Admin/promotionEdit/'.$promotion_dsc['id']);?>';" data-toggle="tooltip" data-placement="top" title="แก้ไข"><i class="icon wb-pencil" aria-hidden="true"></i></button>
			                  								<button type="button" class="btn btn-round btn-danger btn-sm" onclick="delS(<?=$promotion_dsc['id']; ?>, <?=$promotion_dsc['is_active']; ?>)" data-toggle="tooltip" data-placement="top" title="ลบ"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  							</td> 
			                  						</tr>
			                  						<?php
			                  							$i++;
			                  						endforeach; 
			                  						?>
			                  					</tbody>
			                  					<?php endif; /* if(!empty($service_list)) : */ ?>
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

	<div class="modal fade bs-example-modal-sm" id="modalChange" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะหรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="promotion_id" name="promotion_id">
					<input type="hidden" id="sStatus" name="sStatus">
					<button type="button" class="btn btn-success" onclick="changeSt()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" id="modaldelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Delete</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบสิ่งนี้หรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="s_id" name="s_id">
					<input type="hidden" id="s_status" name="s_status">
					<!--  -->
					<button type="button" class="btn btn-success" onclick="deletePromotion()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modals -->
	<!-- modalSpecialChange -->
	<!-- modal Special -->
	<div class="modal fade bs-example-modal-sm" id="modalSpecialChange" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะหรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="promo_id" name="promo_id">
					<input type="hidden" id="stSpecial" name="stSpecial">
					<button type="button" class="btn btn-success" onclick="changeSpecial()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!-- end -->
	
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

	function sChange(sid, status)
    {
    	$('#promotion_id').val(sid);
    	$('#sStatus').val(status)
    	$('#modalChange').modal('show');
    }

    function changeSt()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: '<?=base_url("Admin/changeStPromo"); ?>',
		  	data 	: {sid:$('#promotion_id').val(), st:$('#sStatus').val(), action:'changeStPm', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
		  	success: function(data) {
				if (data == 'true') {
					alert("Status Changed click ok to refresh  page");
    				location.reload();
		        } else {
		        	alert("Not Found click ok to refresh  page");
    				location.reload();
		        }        	
		        }
		});
	}

	// 
	function specialChange(sid, status)
    {
    	$('#promo_id').val(sid);
    	$('#stSpecial').val(status)
    	$('#modalSpecialChange').modal('show');
    }

	// 
	function changeSpecial()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: '<?=base_url("Admin/changeProSpecial"); ?>',
		  	data 	: {sid:$('#promo_id').val(), st:$('#stSpecial').val(), action:'changeStPm', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
		  	success: function(data) {
				if (data == 'true') {
					alert("Status Changed click ok to refresh  page");
    				location.reload();
		        } else {
		        	alert("Not Found click ok to refresh  page");
    				location.reload();
		        }        	
		    }
		});
	}


	function delS(sid, sts)
    {
    	$('#s_id').val(sid);
		$('#s_status').val(sts);
    	$('#modaldelete').modal('show');
    }

     function deletePromotion()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: '<?=base_url("Admin/distroyPromotion"); ?>',
		  	data 	: {sid:$('#s_id').val(),sts:$('#s_status').val(), action:'delPromotion', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
		  	success: function(data) {

				if (data == 'true') {
					alert("Deleted click ok to refresh  page");
    				location.reload();
		        } else {
		        	alert("Not Found click ok to refresh  page");
    				location.reload();
		        }         	
		    }
		});
	}

	</script>
</body>
</html>
