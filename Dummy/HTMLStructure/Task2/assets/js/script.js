$(document).ready(function(){
  $("a").on('click', function(event) {
    	console.log(event.target.alt);
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html').animate({
        scrollTop: $(hash).offset().top
      }, 600,function(){
        window.location.hash = hash;
      });
    } 
  });

  $(window).scroll(function(e) {
    var scrollBanner = $('.banner').offset().top;
    var serviceSection = document.getElementById('services');
    // var scrollEmergency = $('ul.emergency').offset().top;
    if((window.pageYOffset >= scrollBanner + 50)){
      serviceSection.className = 'service transition-service';
      // $("#services").slideDown();
    }

    var scrollService = $('.service').offset().top;
    var emergencySection = document.getElementById('emergency');
    if((window.pageYOffset >= scrollService + 100)){
      emergencySection.className = 'emergency transition-emergency';
    }
  });

  /* Hamburger Script */

  $('nav > a').on('click',function() {
  	var menu = document.getElementById('menu-pages');
  	if(menu.className == 'menu-pages'){
  		menu.className += ' responsive-menu';
  	} else {
  		menu.className = 'menu-pages';
  	}

	  $('.responsive-menu > li').on('click',function() {
	  	var menu = document.getElementById('menu-pages');
	  	menu.className = 'menu-pages';
	  });
  	
  });
});