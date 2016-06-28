// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
// jQuery(document).foundation();



jQuery(document).ready(function($) {

    $('.accordion li').attr('data-accordion-item',0);
    $('.accordion .content').attr('data-tab-content',0);
    $('.accordion').attr('data-allow-all-closed','true');
	// Initialize Foundation
    $(document).foundation();

    $('.home-slider').slick({
    	prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    	nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    	adaptiveHeight: true,
    	lazyLoad: 'ondemand',
    	autoplay: true,
  		autoplaySpeed: 5000,
  		dots: true,
  		arrows: false,
    });
    $('.testimonials-slider:not(.sidebar-testimonials)').slick({
    	prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    	nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        autoplay: true,
        autoplaySpeed: 8000,
    });
    $('.sidebar-testimonials').slick({
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        arrows: false,
    });
    $('.product-slider').slick({
    	prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    	nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		speed: 300,
		centerPadding: '100px',
		slidesToShow: 3,
		centerMode: true,
		variableWidth: true
    });

    $('.product-link').scroll(function() { //.box is the class of the div
		$('.product-slider').slick("slickNext");
	});
    
});