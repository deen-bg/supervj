$(document).ready(function() {
	
	// enable fileuploader plugin
	$('input[name="portfolioImg"]').fileuploader({
		// limit:1
	});

	$('input[name="promotionImg"]').fileuploader({
		limit:1
	});

	$('input[name="articleImg"]').fileuploader({
		limit:1
	});

	$('input[name="productImg"]').fileuploader({
		// limit:1
	});
	
});