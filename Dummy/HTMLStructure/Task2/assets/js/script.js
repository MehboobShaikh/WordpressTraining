$(function(){
  // $('body').hide();
  // $('body').slideDown(1000);
  $("a").on('click', function(event) {
    	// console.log(event.target.alt);
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
  

  $(window).resize(function() {
<<<<<<< HEAD
    var chkDisplay = $('nav > a').css(['display']);
    // console.log(chkDisplay);
    var className = $('nav > ul')[0].className;
    if(chkDisplay['display'] == 'block' && className == 'menu-pages'){
      $('nav > ul').css('display','none');
    }else{
      $('nav > ul').css('display','block');
    }
  });


=======
    var menu = document.getElementById('menu-pages');
    if($(window).width() > 700){
      $('ul.menu-pages').css('display','block');
      menu.className = 'menu-pages';
    }else if( ($(window).width() <= 700 ) && menu.className == 'menu-pages' ){
      $('ul.menu-pages').css('display','none');
      console.log("Hi SMS"+ menu.className);
      menu.className = 'menu-pages';
    }
  });
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
>>>>>>> 4bf44c50f67e528b1ba9a09bb904dacb6d6e37d6
});