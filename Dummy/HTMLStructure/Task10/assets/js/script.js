/*
	Author: Shaikh Mehboob Siraj
	Version: 1.0
*/

/* Featured */

 $('.slider-for').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	focusOnSelect: true,
	arrows: true,
	prevArrow: '<img class="slick-prev" src="assets/images/icons/left-arrow-angle.png">',
	nextArrow: '<img class="slick-next" src="assets/images/icons/right-arrow-angle.png">',
	autoplay: true,
	responsive: [
	    {
	      breakpoint: 850,
	      settings: {
	      	arrows: false,
	        slidesToShow: 3,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	      	arrows: false,
	        slidesToShow: 2,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 400,
	      settings: {
	      	arrows: false,
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
 });

 /* Specials */

 $('.slider-for-specials').slick({
	infinite: true,
	slidesToShow: 4,
	responsive: [
	    {
	      breakpoint: 1500,
	      settings: {
			infinite: false,
			initialSlide: 0,
	        slidesToShow: 4
	      }
	    },
	    {
	      breakpoint: 850,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        focusOnSelect: true,
	        autoplay: true
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        focusOnSelect: true,
	        autoplay: true
	      }
	    },
	    {
	      breakpoint: 400,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        focusOnSelect: true,
	        autoplay: true
	      }
	    }
	  ]
 });

 /* Client */

 $('.slider-for-client').slick({
	infinite: true,
	slidesToShow: 8,
	slidesToScroll: 1,
	focusOnSelect: true,
	autoplay: true,
	responsive: [
	    {
	      breakpoint: 850,
	      settings: {
	      	arrows: false,
	        slidesToShow: 5,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	      	arrows: false,
	        slidesToShow: 4,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 400,
	      settings: {
	      	arrows: false,
	        slidesToShow: 3,
	        slidesToScroll: 1
	      }
	    }
	  ]
 });

 $(function(){
  $('.hamburger').on('click',function(){
  	// console.log($('.hamburger > i').hasClass('fa-bars'));
  	if($('.hamburger > i').hasClass('fa-bars')){
	  	$('.hamburger > i').removeClass('fa-bars');
	    $('.hamburger > i').addClass('fa-times');
	  	$( ".main-nav" ).slideDown("slow", function() {
		    // Animation complete.
		  });
  	}else if($('.hamburger > i').hasClass('fa-times')){
	  	$('.hamburger > i').removeClass('fa-times');
	    $('.hamburger > i').addClass('fa-bars');
	  	$( ".main-nav" ).slideUp("slow", function() {
		    // Animation complete.
		  });
  	}
  });

  $(window).resize(function() {
  	var hamburgerDisplay = $('.hamburger').css(['display'])['display'];

  	if(hamburgerDisplay == 'block'){
	  	if($('.hamburger > i').hasClass('fa-bars')){
		   	$( ".main-nav" ).css('display','none');
	  	}else if($('.hamburger > i').hasClass('fa-times')){
		   	$( ".main-nav" ).css('display','block');
	  	}
	  }else {
	   	$( ".main-nav" ).css('display','inline-block');
	  }
	});


});
