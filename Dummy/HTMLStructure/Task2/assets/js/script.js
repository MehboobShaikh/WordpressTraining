$(window).on('load',function() {
  // console.log($(window.location.hash).offset().top);
  window.scroll($(window.location.hash).offset().top);
  // console.log("SMS");
  // Handler for .load() called.
});

$(function(){
  // $('body').hide();
  // $('body').slideDown(1000);
  $("a").on('click', function(event) {
    	// console.log(event.target.alt);
      // event.preventDefault();
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: ($(hash).offset().top - 74)
      }, 600);
      window.location.hash = hash;
      // return false;
    } 
  });

  $(window).scroll(function(e) {
    // var scrollEmergency = $('ul.emergency').offset().top;
    // var emergencySection = document.getElementById('emergency');
    
    var scrollBanner = $('.banner').offset().top;
    // var serviceSection = document.getElementById('services');

    if(window.pageYOffset >= scrollBanner + 50){
      // serviceSection.className = 'service transition-service';
      $("#services").fadeTo(1200,1);
    }

    var scrollService = $('.service').offset().top;
    // var emergencySection = document.getElementById('emergency');
    if(window.pageYOffset >= scrollService + 50){
      // emergencySection.className = 'emergency transition-emergency';
      $("#emergency").fadeTo(1200,1);
    }

    
    var scrollEmergency = $('#emergency').offset().top;
    // var articlesSection = document.getElementById('articles');
    if(window.pageYOffset >= (scrollEmergency - 100)){
      // emergencySection.className = 'emergency transition-emergency';
      $("#articles").fadeTo(1200,1);
    }

    
    var scrollArticles = $('#articles').offset().top;
    if(window.pageYOffset >= (scrollArticles + 50)){
      $(".doctors").fadeTo(1200,1);
    }
  });

  /* Hamburger Script */
/*
  $(window).resize(function() {
    var menu = document.getElementById('menu-pages');
    if($(window).width() > 700){
      $('ul.menu-pages').css('display','block');
      menu.className = 'menu-pages';
    }else if( ($(window).width() <= 700 ) && menu.className == 'menu-pages' ){
      $('ul.menu-pages').css('display','none');
      // console.log("Hi SMS"+ menu.className);
      menu.className = 'menu-pages';
    }
  });*/
      $('nav > a').on('click',function() {
        var menu = document.getElementById('menu-pages');
        if(menu.className == 'menu-pages'){
          menu.className += ' responsive-menu';
          $('ul.responsive-menu').slideDown(600);
        } else {
          $('ul.responsive-menu').slideUp(500,function(){
            menu.className = 'menu-pages';
          });
        }

        $('.responsive-menu > li').on('click',function() {
          var menu = document.getElementById('menu-pages');
          $('ul.responsive-menu').slideUp(100,function(){
            menu.className = 'menu-pages';
          });
        });
      });
  

/*  $(window).resize(function() {
    var chkDisplay = $('nav > a').css(['display']);
    // console.log(chkDisplay);
    var className = $('nav > ul')[0].className;
    if(chkDisplay['display'] == 'block' && className == 'menu-pages'){
      $('nav > ul').css('display','none');
    }else{
      $('nav > ul').css('display','block');
    }
  });*/

  $(window).resize(function() {
    var chkDisplay = $('nav > a').css(['display']);
    // console.log(chkDisplay);
    var className = $('nav.primary-nav ul')[0].className;
    if(chkDisplay['display'] == 'block' && className == 'menu-pages'){
      $('nav.primary-nav ul').css('display','none');
    }else if(chkDisplay['display'] == 'none' && $('nav.primary-nav ul').hasClass('responsive-menu')){
      $('nav.primary-nav ul').removeClass("responsive-menu"); 
      $('nav.primary-nav ul').css('display','block');
    }else{
      $('nav.primary-nav ul').css('display','block');
    }
  });


});