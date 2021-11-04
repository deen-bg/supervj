<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap admin template">
	<meta name="author" content="">

	<title>Contact | General S </title>
	
    <!--  -->
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/admin/assets/images/apple-touch-icon.png');?>">
	<link rel="shortcut icon" href="<?php echo base_url('./assets/images/logo/logo.png');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/flag-icon-css/flag-icon.css');?>">

    <!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/bootstrap.css');?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/bootstrap-extend.css');?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/site.css');?>">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/animsition/animsition.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/asscrollable/asScrollable.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/switchery/switchery.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/intro-js/introjs.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/slidepanel/slidePanel.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/v2.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/bootstrap-table/bootstrap-table.css?v4.0.2');?>">

	<!-- Fonts -->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/fonts/font-awesome/font-awesome.min.css');?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
  	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/fonts/web-icons/web-icons.min.css');?>">
  	
	<!--[if lt IE 9]>
	<script src="vendor/html5shiv/html5shiv.min.js"></script>
	<![endif]-->

	<!--[if lt IE 10]>
	<script src="vendor/media-match/media.match.min.js"></script>
	<script src="vendor/respond/respond.min.js"></script>
	<![endif]-->

	<!-- Scripts -->
	<script src="<?php echo base_url('assets/admin/vendor/breakpoints/breakpoints.js');?>"></script>
	<script>
		Breakpoints();
	</script> 
</head>
<body class="animsition dashboard">
    <!-- menu -->
	<?php $this->load->view('admin/menu');?>
	<!-- end -->
    <!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">
	      	<!-- Panel Other -->
	      	<div class="panel">
		        <div class="panel-heading">
		          	<h3 class="panel-title">Contact</h3>
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
			                    						<th style="" data-field="name">
			                    							<div class="th-inner ">Title</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="code">
			                    							<div class="th-inner ">Email</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="">
			                    							<div class="th-inner ">Message</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="">
			                    							<div class="th-inner ">Created Date</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($contact_details)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													foreach($contact_details as $contact_val) : 
													?>
			                  						<tr> 
			                  							<td class=""><?=$i+1; ?></td> 
			                  							<td style=""><?=$contact_val['title']; ?></td>
			                  							<td style=""><?=$contact_val['c_email']; ?></td>
			                  							<td style=""><?=$contact_val['c_message']; ?></td>
														<td style=""><?=$contact_val['create_date']; ?></td>
			                  						</tr>
			                  						<?php
			                  							$i++;
			                  						endforeach; 
			                  						?>
			                  					</tbody>
			                  					<?php endif; ?>
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
	<?php $this->load->view('admin/footer'); ?>
    <!-- script -->
	<?php
		$this->load->view('admin/script-js');
	?>
        <script src="<?php echo base_url('assets/admin/vendor/bootstrap-table/bootstrap-table.js?v4.0.2');?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js?v4.0.2');?>"></script>
<script src="<?php echo base_url('assets/admin/assets/js/tables/bootstrap.js?v4.0.2');?>"></script>
<script type="text/javascript">
$('#modalSuccess').modal('show');
$('#modalError').modal('show');
	function sChange(sid, status)
    {
    	$('#service_id').val(sid);
    	$('#sStatus').val(status)
    	$('#modalChange').modal('show');
    }

    function changeSt()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: '',
		  	data 	: {sid:$('#service_id').val(), st:$('#sStatus').val(), action:'changeStse','<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
		  	success: function(data) {
		        	if (data == 'true') {
		        		location.reload();
		        	} else {
		        		console.log(data);
		        	}        	
		        }
		});
	}

	function delS(sid)
    {
        console.log(sid);
    	$('#s_id').val(sid);
    	$('#modaldelete').modal('show');
    }

     function deleteService()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: '<?=base_url("Admin/distroyService"); ?>',
		  	data 	: {sid:$('#s_id').val(), action:'delService','<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
		  	success: function(data) {
		        	if (data == 'true') {
		        		location.reload();
		        	} else {
		        		console.log(data);
		        	}        	
		        }
		});
	}

	</script>
</body>
</html>
