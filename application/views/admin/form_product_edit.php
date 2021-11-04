<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Edit Product | Salepage </title>
	<link rel="shortcut icon" href="<?=base_url('./assets/images/logo/d7c90b3a35d01b317f81cff953169702.png');?>">
	<link href="<?=base_url('./assets/images/logo/d7c90b3a35d01b317f81cff953169702.png');?>" rel="apple-touch-icon">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap.css');?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url('./assets/admin/vendor/summernote/summernote-bs4.css');?>">
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

    <!-- Upload -->
	<link href="<?=base_url('./assets/admin/vendor/upload/css/jquery.fileuploader.css');?>" media="all" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/dropify/dropify.css');?>">

    <!-- Fonts -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/fonts/web-icons/web-icons.min.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/fonts/font-awesome/font-awesome.min.css');?>">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


    <!-- Scripts -->
	<script src="<?=base_url('./assets/admin/vendor/breakpoints/breakpoints.js');?>"></script>
	<script>
		Breakpoints();
	</script>

<style>
optgroup{
	font-weight: 700;
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
				<div class="col-xxl-12 col-lg-12">		
					<!-- Panel Static Labels -->
		          	<div class="panel">
			            <div class="panel-heading">
			              <h3 class="panel-title">Edit Product</h3>
			            </div>
			            <div class="panel-body container-fluid">
			              	<form action="<?=base_url('Admin/updateProduct');?>" id="productEdit" name="productEdit" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                    value="<?=$this->security->get_csrf_hash();?>" >
                                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name</label>
				                  	<input type="text" class="form-control" id="name" name="name" value="<?=$menu_descs[0]['name'];?>" placeholder="Name" required>
				                </div>
                                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="price">Price</label>
				                  	<input type="text" class="form-control" id="price" name="price" value="<?=$menu_descs[0]['price'];?>" placeholder="เช่น 1200" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Weight (<?=$units[0]['unit_name'];?>)</label>
				                  	<input type="text" class="form-control" id="weight" name="weight" value="<?=$menu_descs[0]['weight'];?>" placeholder="Weight" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
				                </div>
				                  	<input type="hidden" class="form-control" id="unit" name="unit" value="<?=$units[0]['unit_name']; ?>" placeholder="unit" required>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
                                      <div id="width"></div> 
			                      	<input type="file" id="covImg" name="covImg" data-plugin="dropify" data-default-file="<?=base_url('./assets/images/menu/'.$menu_descs[0]['img_cover']);?>" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG"/>
									<p class="help-block"><i>
										รองรับไฟล์ภาพ <br>
										ขนาดภาพแนะนำ 1200x1200px<br>
										ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น<br>
										ไฟล์นามสกุล .png .jpg .jpeg</i>
									</p>
				                </div>
								<!-- <div class="form-group form-material form-material-file" data-plugin="formMaterial">
									<label class="form-control-label" for="image">Allbum</label>
									<span class="badge badge-pill badge-warning">ชื่อไฟล์เป็นภาษาอังกฤษหรือตัวเลขเท่านั้น!</span>
				                  	<?php
										//echo $FileUploader;
									?>
									<p class="help-block"><i>ขนาดไฟล์ที่แนะนำ 1200x1200px</i></p>
				                </div> -->
                                  <div class="text-right">
                                  <input type="hidden" name="product_id" value="<?=$menu_descs[0]['id']; ?>">
						            <button type="submit" class="btn btn-animate btn-animate-side btn-success" id="btn_submit">
						              	<span><i class="icon wb-check" aria-hidden="true"></i> Save</span>
						            </button>
						            <button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" onclick="window.location.href = '<?=base_url('Admin/product');?>';">
						              	<span><i class="icon wb-close" aria-hidden="true"></i> Close</span>
						            </button>
          						</div>
			              	</form>
			            </div>
		          	</div>
		          	<!-- End Panel Static Labels -->			
				</div>
			</div>
		</div>
	</div>
	<!-- End Page -->
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
    <script type="text/javascript" src="<?=base_url('./assets/admin/vendor/summernote/summernote-bs4.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/switchery/switchery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/intro-js/intro.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/screenfull/screenfull.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/slidepanel/jquery-slidePanel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/skycons/skycons.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/aspieprogress/jquery-asPieProgress.min.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/matchheight/jquery.matchHeight-min.js');?>"></script>

	<script type="text/javascript">
        var uploadUrl = '<?=base_url('File_upload/upfile/');?>';
    </script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#description').summernote({ 
				height				: 150
				,callbacks: {
					onImageUpload: function(files) {
						url = $(this).data('upload'); //path is defined as data attribute for  textarea
						// call function by pass 3 param
						sendFile(files[0], url, $(this));
					}
					,onMediaDelete : function($target, editor, $editable) {
						deleteFile($target[0].src); // img 

						// remove element in editor 
						$target.remove();
					}
				}
			});
	});
	function sendFile(file, url, $editor)
		{
			var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
			var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

			data = new FormData();
			data.append("file", file);
			data.append(csrfName, csrfHash);

			$.ajax({
				data		: data,
				type		: 'post',
				dataType	: 'json',
				xhr		: function(){
					var myXhr = $.ajaxSettings.xhr();
					
					if(myXhr.upload)
						myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
					
					return myXhr;
				},
				url		: uploadUrl + '?action=upload_image&path=product',
				cache		: false,
				contentType: false,
				processData: false,
				success	: function(dataPresponse){
					
					if(dataPresponse.success == '1')
					{
						$editor.summernote('insertImage', dataPresponse.image_url);
					}
					else
					{
						alert(dataPresponse.message);
					}
				}
			});
		}

		function progressHandlingFunction(e)
		{
			if(e.lengthComputable)
			{
				$('progress').attr({value:e.loaded, max:e.total});
				// reset progress on complete
				if (e.loaded == e.total) {
					$('progress').attr('value','0.0');
				}
			}
		}

		function deleteFile(fileUrl, url)
		{
			var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
			var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

			data = new FormData();
			data.append("file_url", fileUrl);
			data.append(csrfName, csrfHash);

			$.ajax({
				data		: data,
				type		: 'post',
				url			: uploadUrl + '?action=delete_image&path=product',
				cache		: false,
				contentType: false,
				processData: false,
				success	: function(url){
					
				}
			});
		} 
        // validate main image size
		// $(document).ready(function(){
		// 	// $('#btn_submit').prop('disabled', true);
		// 	var _URL = window.URL || window.webkitURL;

		// 	$('#covImg').change(function () {
		// 		var file = $(this)[0].files[0];

		// 		img = new Image();
		// 		var imgwidth = 0;
		// 		var imgheight = 0;
		// 		var maxwidth = 1200;
		// 		var maxheight = 1200;

		// 		img.src = _URL.createObjectURL(file);
		// 		img.onload = function() {
		// 			imgwidth = this.width;
		// 			imgheight = this.height;
					
		// 			if(imgwidth == maxwidth && imgheight == maxheight){
		// 				$("#width").html("<label class='form-control-label' for='width' stlye='color:green;'>width: "+imgwidth+"X"+imgheight+ " <i class='fa fa-check-circle' aria-hidden='true' style='color:green'></i></label>");
		// 				$('#btn_submit').prop('disabled', false);
		// 			}else{
		// 				$("#width").html("<label class='form-control-label' for='width' style='color:red'>Image size must be "+maxwidth+"X"+maxheight+ " <i class='fa fa-times-circle' aria-hidden='true' style='color:red'></i></label>");
		// 				$('#btn_submit').prop('disabled', true);
		// 				$("#covImg").val(null);
		// 				return false;
		// 			}
		// 		};
		// 		img.onerror = function() {
		// 			$("#response").text("not a valid file: " + file.type);
		// 		}
		// 	});
		// });
	</script>
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

    <!-- Upload -->
	<script src="<?=base_url('./assets/admin/vendor/upload/js/jquery.fileuploader.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('./assets/admin/vendor/upload/js/custom.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('./assets/admin/vendor/dropify/dropify.min.js');?>"></script>
</body>
</html>

