/* Featured */

 $('.slider-for').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	focusOnSelect: true,
	arrows: true,
	prevArrow: '<img class="slick-prev" src="assets/images/icons/left-arrow-angle.png">',
	nextArrow: '<img class="slick-next" src="assets/images/icons/right-arrow-angle.png">',
	asNavFor: '.slider-nav',
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
	slidesToScroll: 1,
	focusOnSelect: true,
	arrows: false,
	prevArrow: '<img class="slick-prev" src="assets/images/icons/left-arrow-angle.png">',
	nextArrow: '<img class="slick-next" src="assets/images/icons/right-arrow-angle.png">',
	asNavFor: '.slider-specials-nav',
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


/* Media Query */

// function myFunction(x) {
//     if (x.matches) {
//     	console.log( $(slick.$slides[currentSlide]).data('index'));
//     } else {
//     	console.log( $(slick.$slides[currentSlide]).data('index'));
//     }
// }

// var x = window.matchMedia("(max-width: 700px)")
// myFunction(x) // Call listener function at run time
// x.addListener(myFunction) // Attach listener function on state changes