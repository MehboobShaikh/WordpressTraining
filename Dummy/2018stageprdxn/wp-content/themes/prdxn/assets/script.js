(function($){

  var scroll_count = 0,
  $developers_count = $('#developers_count').val(),
  $testers_count = $('#testers_count').val(),
  $project_manager_count = $('#project_manager_count').val(),
  $designers_count = $('#designers_count').val(),
  $copy_writers_count = $('#copy_writers_count').val(),
  $social_admins_count = $('#social_admins_count').val();

 /**
      * @Counter functionality
      *
      * @return
      */
      jQuery.fn.extend({
        animateCount : function (from, to, time) {
          var steps = 1,
          self = this,
          counter;
          if (from - to > 0) {
            steps = -1;
          };
          from -= steps;
          function step() {
            self.text(from += steps);
            if ((steps < 0 && to >= from) || (steps > 0 && from >= to)) {
              clearInterval(counter);
            };
          };
          counter = setInterval(step, time || 90);
        }
      });

  // Document ready event
  $(document).ready(function () {

    var header_imgs,
    nav_color,
    page = 4,
    loading = true,
    $content = $('.workpage_ajax-posts');
    $('.people_count').text("0");

    /*
    * filter functionality in service page
    */
    $('.form-control').on('change',function() {
      $('.btn-search').click();
    });

    // for scrollpane

    $(function()
    {
      $('.scroll-pane').jScrollPane();
    });

    // for video

    var windowHeight = $(window).height();
    $('.bgvideo').height(windowHeight);

    // adding class here for touch event
    $('.apply_here').on('click', function() {
      $('.apply_here').addClass('apply_here-open');
    });

  // adding class here for touch event
  $('body').on('click','.app-submit', function() {
    $('.app-submit').addClass('app-submit-open');
  });


    // home page scroll button
    $('.home_hero-seebelow').on('click',function() {
      $('html, body').animate({
        scrollTop: ($('.home_content').offset().top) - 72
      }, 1000);
    });
 // form validation
 var validate = function(id,regx,message,parentremove) {
  var name = $(id).val();
  if(name != "") {
    var reg = regx;
    if(!(reg.test(name))) {
      $(id).parent().append('<p>'+message+'</p>');
    } else {
      $(parentremove).remove();
    }
  }
}

var validate_empty = function(id,message,parentremove) {
  var identify = $(id).val();
  if(identify == "") {
    $(id).parent().append('<p>'+message+'</p>');
  }
}

$('.app-submit').click(function(){

  $('.app-submit').addClass('app-submit-open');
  validate_empty('#jobapp_email','Please enter your email address','#jobapp_email~p');

  $('#jobapp_email').on('focusin',function() {
    $('#jobapp_email~p').remove();
  });
});

    //Name Validation
    $('#jobapp_name').on('focusout',function() {
      console.log('text');
      validate('#jobapp_name',/^[a-zA-Z|'"\/\\\[\]. -]{1,50}$/,'Please enter valid name','#jobapp_name~p');
      validate_empty('#jobapp_name','Please enter your name','#jobapp_name~p');

    });

    $('#jobapp_name').on('focusin',function() {
      $('#jobapp_name~p').remove();
    });

    // Residence Validation
    var select = $('#jobapp_residence').children('select');
    select.addClass('residence_dropdown');
    $('.residence_dropdown').on('focusout',function() {
      validate('.residence_dropdown',/[^Select]+/,'Please select an option from dropdown','.residence_dropdown~p');
    });

    $('.residence_dropdown').on('focusin',function() {
      $('.residence_dropdown~p').remove();
    });

     // Qualification Validation
     var select = $('#jobapp_qualification').children('select');
     select.addClass('qual_dropdown');
     $('.qual_dropdown').on('focusout',function() {
      validate('.qual_dropdown',/[^Select]/,'Please select an option from dropdown','.qual_dropdown~p');
    });

     $('#jobapp_qualification').on('focusin',function() {
      $('.qual_dropdown~p').remove();
    });


    // Email validation
    $('#jobapp_email').on('focusout',function() {
      validate('#jobapp_email',/^[\w._~`!@#$%^&()\-=\+\\|{}{\[\]'";:/.,]+@[\w]+\.[a-z.]{2,3}$$/,'Please enter a valid email address','#jobapp_email~p');
      validate_empty('#jobapp_email','Please enter your email address','#jobapp_email~p');
    });

    $('#jobapp_email').on('focusin',function() {
      $('#jobapp_email~p').remove();
    });


    // Phone number validation
    $('#jobapp_phone_number').on('focusout',function() {
      validate('#jobapp_phone_number',/^[0-9|()\-+]{3,50}$/,'Please enter valid Phone Number','#jobapp_phone_number~p');
      validate_empty('#jobapp_phone_number','Please enter your Phone Number','#jobapp_phone_number~p')
    });

    $('#jobapp_phone_number').on('focusin',function() {
      $('#jobapp_phone_number~p').remove();
    });

    // Date validation

    $('#jobapp_qualification_passing_date').on('focusout',function() {
      var job_date = new Date("DD/MM/YYYY");
      validate('#jobapp_qualification_passing_date',/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/,'Please enter valid date','#jobapp_qualification_passing_date~p');
    });

    $('#jobapp_qualification_passing_date').on('focusin',function() {
      $('#jobapp_qualification_passing_date~p').remove();
      $(this).datepicker();
    });

    // Resume Link
    $('#jobapp_resume_link').on('focusout',function() {
      validate('#jobapp_resume_link',/(http:\/\/)?([a-zA-Z0-9\-.]+\.[a-zA-Z0-9\-]+([\/]([a-zA-Z0-9_\/\-.?&%=+])*)*)$/,'Please enter valid Phone Number','#jobapp_resume_link~p');
      validate_empty('#jobapp_resume_link','Please enter your Phone Number','#jobapp_resume_link~p')
    });

    $('#jobapp_resume_link').on('focusin',function() {
      $('#jobapp_resume_link~p').remove();
    });

    /*
    navigation hamburger
    */
    $('.header_hamburger').on('click', function() {
      $('#menu-primary-menu').removeClass('menu_close');
      $('.header_navigation-primary').toggleClass('open_nav');
      $('.header_navigation-currentmenu').toggleClass('open_current_nav');
      $('#menu-primary-menu').toggleClass('menu_open');
      $('#header_navigation-toggle').css('margin-right','14px');
      $('#header_navigation-toggle span span').css('background-color', nav_color);
      $("html").css({"overflow-y": "hidden"});

      if(!$('.header_navigation-primary').hasClass('open_nav')) {
        $('#header_navigation-toggle').css('margin','0');
        $('header h1 img').attr('src', header_imgs);
        $('#header_navigation-toggle span span').css('background-color', nav_color);
        $('#menu-primary-menu').addClass('menu_close');
        $("html").css({"overflow-y": "scroll"});
        setTimeout(function(){
          $('#menu-primary-menu').removeClass('menu_close');
        },300);
      }
      else {
        setTimeout(function(){
          header_imgs = $('header h1 img').attr('src');
          nav_color = $('#header_navigation-toggle span span').css('background-color');
          $('header h1 img').attr('src', footer_img);
          $('#header_navigation-toggle span span').css('background-color', '#fff');
        },300);
      }
      $('.header_hamburger').toggleClass('open_hamburger');
    });

  // Facebook Link
  url='https://graph.facebook.com/v2.8/1029871623805596/posts?fields=description,full_picture,permalink_url,link,name&access_token=EAAFgsrqgYXUBAGKm3zmAk3Ch7ZA6WilnRwsFHog8Knh3yNVyXNHbYfBr9arFUphaj4ce7RNYUgxzRLS7L83hvqs6zQWYJoR96gipuvBMfTSnyn05HngJFlP4S47NJjMs7Dot6tyhLqHbHHZB2Ei1xOxJUeoYkZD&expires=5183999&fields=full_picture,permalink_url,description,name,link';
  $.ajax({
    url: url,
    type: 'GET',
    success: function( response ) {
     $('.home_facebook-feedblock').append( '<a href="'+response.data[0].permalink_url+'" class="scroll-pane" target="_blank"><span class="fb-logo"></span><div class="custom-scroll mCustomScrollbar _mCS_1 mCS_no_scrollbar"><span>'+response.data[0].name+'</span><p>'+response.data[0].description+'</p></div>'+response.data[0].link+'</a>' );
     error_fb(response.data[0].full_picture,response.data[0].description,response.data[0].name);
   },
   error: function(response) {

   }
 });

  var error_fb = function(pic,des,title) {
    if(pic == undefined) {
      $('.mCS_no_scrollbar img').remove();
    }
    if(title == undefined) {
      $('.mCS_no_scrollbar span').remove();
    }
    if(des == undefined) {
      $('.mCS_no_scrollbar p').remove();
    }
  }

    /**
      * @desc Scroll to id functionality on service page
      *
      * @return
      */
      $(document).on('click','.servicemenu', function(e) {
        e.preventDefault();
        var target = "#" + this.getAttribute('data-target');
        $('html, body').animate({
          scrollTop: ($(target).offset().top) - 72
        }, 1000);
      });

      // objectiveBlockHeight();

    /**
      * @desc Ajax function for load more functionality on work page
      *
      * @return undefine
      */
      var loadpost = function() {
        $.ajax ({
          type : 'GET',
          data : { numPosts : 6, pageNumber : page },
          datatype : 'html',
          url : 'http://localhost/prdxn/work',
          success : function(data){
            $data = $(data);
          // $data.hide();
          $loadposts = $data.find('.flex');
          console.log($loadposts);
          if(!$loadposts[5]) {
            $('.Workpage_loadmore-cta').hide();
            $content.append($loadposts);
            $data.fadeIn(1000);
            objectiveBlockHeight();
          } else {
            $content.append($loadposts);
            $data.fadeIn(1000);
            objectiveBlockHeight();
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          alert(jqXHR + "::" + textStatus + "::" + errorThrown);
        }
      });
      };

    /**
      * @desc On click event to call Ajax function for load more functionality on work page
      *
      * @return
      */

      $('.Workpage_loadmore-cta').on('click', function(){
        loading = true;
        page++;
        loadpost();
      });
    });


 /**
      * @desc Same height for all blocks for work page posts
      *
      * @return
      */
      // function objectiveBlockHeight() {
      //   var i;
      //   $('.workpage_content').each(function() {
      //     i = $(this).children('.flex').first().height();
      //     j = $(this).children('.flex').first().width();
      //     p = i-j;
      //     $(this).children('.flex').each(function() {
      //       if($(this).height() > i) {
      //         i = $(this).height();
      //       }
      //     });
      //     $(this).children('.flex').height(i-p);
      //   });
      // }

      // $(window).on('resize',function() {
      //   objectiveBlockHeight();
      // });

      var footer_img = $('footer img').attr('src'),
      header_img = $('header img').attr('src');
      if ($('body').hasClass('home')) {
        $('header h1 img').attr('src', footer_img);
      }
      $('.page-template-home #header_navigation-toggle span span').css('background-color', '#fff');
  /**
    * @desc Event for scroll on window
    *
    * @return
    */
    $(window).scroll(function() {
      if(scroll_count == 0) {
        if($(window).scrollTop() > 0) {
          $('.social_admins').animateCount(1,$social_admins_count);
          $('.copy_writers').animateCount(1,$copy_writers_count);
          $('.designers').animateCount(1,$designers_count);
          $('.project_manager').animateCount(1,$project_manager_count);
          $('.testers').animateCount(1,$testers_count);
          $('.developers').animateCount(1,$developers_count);
          scroll_count++;
        }
      }

      if ($(window).scrollTop() >= 100) {
        if ($('body').hasClass('home')) {
          $('header').addClass('scroll');
          $('header h1 img').attr('src', header_img);
          $('#header_navigation-toggle span span').css('background-color', '#58595b');
        }
      }
      else {
        if ($('body').hasClass('home')) {
          $('header').removeClass('scroll');
          $('header h1 img').attr('src', footer_img);
          $('#header_navigation-toggle span span').css('background-color', '#fff');
        }
      }

      if ($('body').hasClass('page-template-services')) {
        var header_height = $('.services-list').height()+$('header').height(),
        app = $('#appswebandmobile').offset().top-header_height,
        develop = $('#development038testingsupport').offset().top-header_height,
        e_commerce = $('#e-commerce').offset().top-header_height,
        digital = $('#digitalmarketing').offset().top-header_height,
        market = $('#contentmarketing').offset().top-header_height,
        banner_img = $('main .services-hero img').height(),
        header = $('header').height();

      // sticky header on service page
      if ($(window).scrollTop() >= banner_img-header) {
        $('.services-list').addClass('sticky');
        $('#appswebandmobile').css('padding-top','122px');
      }
      else {
        $('.services-list').removeClass('sticky');
        $('#appswebandmobile').css('padding-top','59px');
      }

      if($(window).scrollTop() >= market) {;
        $('.appswebandmobile').removeClass('open_header');
        $('.development038testingsupport').removeClass('open_header');
        $('.e-commerce').removeClass('open_header');
        $('.digitalmarketing').removeClass('open_header');
        $('.contentmarketing').addClass('open_header');
      }
      else if($(window).scrollTop() >= digital) {
        $('.appswebandmobile').removeClass('open_header');
        $('.development038testingsupport').removeClass('open_header');
        $('.e-commerce').removeClass('open_header');
        $('.digitalmarketing').addClass('open_header');
        $('.contentmarketing').removeClass('open_header');
      }
      else if($(window).scrollTop() >= e_commerce) {
        $('.appswebandmobile').removeClass('open_header');
        $('.development038testingsupport').removeClass('open_header');
        $('.e-commerce').addClass('open_header');
        $('.digitalmarketing').removeClass('open_header');
        $('.contentmarketing').removeClass('open_header');
      }
      else if($(window).scrollTop() >= develop) {
        $('.appswebandmobile').removeClass('open_header');
        $('.development038testingsupport').addClass('open_header');
        $('.e-commerce').removeClass('open_header');
        $('.digitalmarketing').removeClass('open_header');
        $('.contentmarketing').removeClass('open_header');
      }
      else if($(window).scrollTop() >= app) {
        $('.appswebandmobile').addClass('open_header');
        $('.development038testingsupport').removeClass('open_header');
        $('.e-commerce').removeClass('open_header');
        $('.digitalmarketing').removeClass('open_header');
        $('.contentmarketing').removeClass('open_header');
      }
      else {
        $('.appswebandmobile').removeClass('open_header');
        $('.development038testingsupport').removeClass('open_header');
        $('.e-commerce').removeClass('open_header');
        $('.digitalmarketing').removeClass('open_header');
        $('.contentmarketing').removeClass('open_header');
      }
    }
  });

  // On load event
  $(window).load(function() {
   if(scroll_count == 0) {
    $('.social_admins').animateCount(1,$social_admins_count);
    $('.copy_writers').animateCount(1,$copy_writers_count);
    $('.designers').animateCount(1,$designers_count);
    $('.project_manager').animateCount(1,$project_manager_count);
    $('.testers').animateCount(1,$testers_count);
    $('.developers').animateCount(1,$developers_count);
  }
  scroll_count++;

    /**
      * @desc Slider functionality
      *
      * @return
      */
      $('.flexslider').flexslider({
        animation: "slide"
      });
      $('.home_testimonial-slider').flexslider({
        animation: "slide"
      });

      /*
     * Work Detail Navigation Slider
     */

     if($(window).width() > 1024) {
      $('.work_detail--navslider').addClass('navslider_flex');
      $('.navslider_flex').flexslider({
        animation: "fade"
      });
    }
    else if($(window).width() <= 1024) {
      // Remove Slider
      $('.work_detail--navslider').removeClass('navslider_flex');
     // Accordion Funcitonality
     $('.work_detail_navslider--services-list').click(function() {
      $(this).siblings().children('ul').slideUp();
      $(this).children('ul').slideToggle();
      $(this).children('h2').toggleClass('accor_arrow');
    });
   }

   // for detecting touch event and make hover if it detects
   if (!( 'ontouchstart' in document.documentElement)) {
    $( 'body' ).addClass( 'no-touch' );
  }
  if (!$( 'body' ).hasClass( 'no-touch' )) {
    $( 'body' ).addClass('touch');
  }

   /**
      * @desc Video Background on home page
      *
      * @return
      */
      if ($("body").hasClass('home')) {
        var winHeight = $(window).height(),
        $mp4 = $(".hero_video_mp4").val(),
        $ogg = $(".hero_video_ogg").val(),
        $webm = $(".hero_video_webm").val();
        var BV = new $.BigVideo({useFlashForFirefox:false, container: $('.bgvideo')});
        BV.init();
        BV.show([
          { type: 'video/mp4',  src: $mp4 },
          { type: 'video/webm', src: $webm },
          { type: 'video/ogg',  src: $ogg },
          ], { ambient: true });

        BV.getPlayer().on('durationchange',function(){
          $('#big-video-wrap').fadeIn();
        });
      }

    /**
      * @desc loader functionality on work page
      *
      * @return
      */
      $('.loader').fadeOut('slow');

      $('.workpage_ajax-posts').show();

    /**
      * @desc Instagram Fetch on people page
      *
      * @return
      */

      if($('body').hasClass('page-template-people')) {
        var userFeed = new Instafeed({
          get: 'user',
          userId: '2141450196',
          accessToken: '2141450196.1677ed0.c4dd4f9708d7499fb15f71622754f56e',
          resolution: 'standard_resolution',
          limit: 14,
          template: '<div class="instagram-feed" data-count=""><a target="_blank" class="animation" href="{{link}}"><div class="insta-bg" style="background: url({{image}}) no-repeat center center; background-size: cover; width: 100%; height: 100%;"></div><span class="caption-overlay"><span class="insta-text">{{caption}}</span><span class="insta-img"></span></span></a></div>',
          after: function() {
            $('.instagram-feed').each(function(index, item) {
              $(item).attr('data-count', index + 1);
            });
          }
        });
        userFeed.run();
      }
    });

  $(window).resize(function() {
    if(!$('body').hasClass('android')) {
      var windowHeight = $(window).height();
      $('.bgvideo').height(windowHeight);
    }
  });
})(jQuery);





