function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function (e) {
      $('.file-upload-image').attr('src', e.target.result);
      $('.image-upload-wrap').show();
      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  }  else {
    $('.image-upload-wrap').hide();
  }
}

function removeUpload(){
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.image-upload-wrap').hide();
}

// $('.owl-services').owlCarousel({
//     loop:false,
//      margin:30,
//      dots:false,
//      nav: true,
//      responsiveClass:true,
//      navText: [
//         "<i class='fa fa-angle-left effect-1'></i>",
//         "<i class='fa fa-angle-right effect-1'></i>"
//      ],
//      responsive:{
//          0:{
//              nav: true,
//              items:1
//          },
//          600:{
//              items:2,
//              nav: true,
//              arrows: true,
//          },
//          1000:{
//              items:3
//          }
//      }
//  })



/////////////////// product +/-
$(document).ready(function() {
    $('.num-in span').click(function () {
        var $input = $(this).parents('.num-block').find('input.in-num');
      if($(this).hasClass('minus')) {
        var count = parseFloat($input.val()) - 1;
        count = count < 1 ? 1 : count;
        if (count < 2) {
          $(this).addClass('dis');
        }
        else {
          $(this).removeClass('dis');
        }
        $input.val(count);
      }
      else {
        var count = parseFloat($input.val()) + 1
        $input.val(count);
        if (count > 1) {
          $(this).parents('.num-block').find(('.minus')).removeClass('dis');
        }
      }
      
      $input.change();
      return false;
    });
    
  });
  // product +/-