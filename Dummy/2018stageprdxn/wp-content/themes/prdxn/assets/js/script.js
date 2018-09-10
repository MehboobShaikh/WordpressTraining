(function($) {

  //Career page script for select box
  $('#jobapp_residence_other').hide();
  $('#jobapp_qualification_other').hide();
  /* Residence Select Box*/
  $('#jobapp_residence').on('change', function() {
    var checkResidence = $('#jobapp_residence option:selected').val();
    if(checkResidence === " Other" || checkResidence === " Others" ) {  
        $('#jobapp_residence_other').show();
        $('#jobapp_residence_other').prop('disabled', false);
    }
    else {
        $('#jobapp_residence_other').hide();
        $('#jobapp_residence_other').prop('disabled', true);
    }    
  });
  /* Qualification Selsct Box*/
  $('#jobapp_qualification').on('change', function() {
    var checkQualification = $('#jobapp_qualification option:selected').val();
    if(checkQualification == " Other" || checkQualification == " Others"){  
        $('#jobapp_qualification_other').show();
        $('#jobapp_qualification_other').prop('disabled', false);
}
    else{
        $('#jobapp_qualification_other').hide();
        $('#jobapp_qualification_other').prop('disabled', true);
    }    
  });
 


  // min-height of Careers page if no opening.
  if($(window).width() > 1024) {
    var window_height = $(window).height(),
    footer_height = $('#footer').height();
    $('.page-template-careers main').css('min-height', (window_height - footer_height));
  }

// height of service page navigation
var servicelist = $('.services-list'),
htnav  = servicelist.height(),
scroll_count = 0,
$developers_count = $('#developers_count').val(),
$testers_count = $('#testers_count').val(),
$project_manager_count = $('#project_manager_count').val(),
$designers_count = $('#designers_count').val(),
$copy_writers_count = $('#copy_writers_count').val(),
$social_admins_count = $('#social_admins_count').val(),
feedblocks = $('.home_content .home_facebook-feedblock'),
casetestimonials = $('.casestudydetail_solution-below-section > .casestudydetail_testimonial-leftimg'),
casestudy_testimonial = $('.casestudydetail_solution-below-section > .casestudydetail_testimonial'),
header_navigation = $('#header_navigation-toggle span span'),
header_navigation_primary = $('.header_navigation-primary'),
home_facebook_feedblock = $('.home_content .home_facebook-feedblock > a'),
scrollPaneApi;

//For Keeping the header sticky when click on CreativeThinking
$('.creativethinking').on('click',function(){
  servicelist.removeClass('sticky');
  $('#creativethinking').css('padding-top',0);
});


if($('body').hasClass('home')) {
  var $avlBlockF = ($('.home_content .work-block')) ? $('.home_content .work-block'): $('.home_content .casestudy-block');
  function setBlockF() {
    var FblockHeight = $avlBlockF.outerHeight();

    if (feedblocks.outerHeight() < FblockHeight) {
      feedblocks.css('height', FblockHeight);
      home_facebook_feedblock.css('height', FblockHeight);
    }
    else if (feedblocks.outerHeight() > FblockHeight) {
      feedblocks.css('height', FblockHeight);
      home_facebook_feedblock.css('height', FblockHeight);
    }
    $('#mCSB_1_scrollbar_vertical').click(function(event) {
      event.preventDefault();
    });
  }
}

function setSolutionBlockHeight() {
  var solutionImgHeight = casetestimonials.outerHeight(),
  casestudydetail_testimonial = casestudy_testimonial;

  casestudydetail_testimonial.css('height', solutionImgHeight);
}

/**
  * @Counter functionality
  *
  * @return
  */
  jQuery.fn.extend({
    animateCount: function (from, to, time) {
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


  var footerHeight = function () {
   setTimeout(function() {
    var  windowHeight = $(window).height(),
    containerHeight = $('main').height() + $('footer').height();

    if($(window).width() > 1225) {
      if (windowHeight > containerHeight) {
        $('#footer').addClass('move-down');
      }
      else { $('#footer').removeClass('move-down'); }
    }
    else { $('#footer').removeClass('move-down'); }
  },400);
 };

  // Document ready event
  $(document).ready(function () {
    var  windowHeight = $(window).height(),
    containerHeight = $('main').height();
    if(windowHeight < 525) {
      $('.header_navigation-primary li a').addClass('small_font');
    }
    else {
      $('.header_navigation-primary li a').removeClass('small_font');
    }

    $('.loaders').css('display','block');

    var header_imgs,
    nav_color,
    page = 3,
    loading = true,
    $content = $('.workpage_ajax-posts');
    $('.people_count').text('0');

     if($(window).width() <= 1024) {
      $('.hidework').hide();
      $('.showwork').show();
    }
    else {
      $('.hidework').show();
      $('.showwork').hide();
   }


   if($('body').hasClass('single-jobpost')){
    $('#jobapp_qualification_passing_date').datepicker({ maxDate: 0 });
  }

    /*
    * filter functionality in service page
    */
    $('.form-control').on('change',function() {
      $('.btn-search').click();
    });


    if ($('body').hasClass('home')) {
      header_navigation.removeClass('newcolor');
      header_navigation.addClass('oldcolor');
    }

    $('.select-styled').on('click',function(e){
      e.preventDefault();
      $('.select .form-control').click();

    });

    // People page counter
    var numItems = $('.people_page .people_counter-section').length;

    for(var i = 1;numItems>=i;i++) {
      var peopleCount = jQuery('.people_page #count-'+i).val();
      jQuery('.people_page .people-count-'+i).animateCount(1,peopleCount);
    }

    // Append calendar icon in careers page
    if ($('body').hasClass('single-jobpost')) {
      $('<span class="calendar"><span class="fa fa-calendar"></span></span>').insertAfter('.form-group .form-control.sjb-datepicker');
      $('#jobapp_qualification_passing_date').attr('placeholder', 'MM/DD/YYYY');

      // Trigger focus on calendar click
      $('.form-group .calendar').on('click', function() {
        $(this).parent().siblings('label').trigger('click');
      });
    }

    if($('body').hasClass('single-jobpost')){
      $("a[title='Careers']").parent().addClass('current-menu-item');
    }

    if($('body').hasClass('post-type-archive-work') || $('body').hasClass('single-work') || $('body').hasClass('single-case_study')){
      $("a[title='Work']").parent().addClass('current-menu-item');
    }


      // -----------function for facebook resize height----------------------------

      if($('body').hasClass('home')) {
        setBlockF();
      }

    // Customize select list
    $('#sjb-application-form select').each(function() {
      var $this = $(this),
      numberOfOptions = $(this).children('option').length,
      $styledSelect = $this.next('div.select-styled');

      $this.addClass('select-hidden');
      $this.wrap('<div class="select"></div>');
      $this.after('<div class="select-styled"></div>');

      $styledSelect.text($this.children('option').eq(0).text());

      var $list = $('<ul />', {
        'class': 'select-options'
      }).insertAfter($styledSelect);

      for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
          text: $this.children('option').eq(i).text(),
          rel: $this.children('option').eq(i).val()
        }).appendTo($list);
      }

      var $listItems = $list.children('li');

      $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').each(function() {
          $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
      });

      $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
      });

      $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
      });
    });

    // for video

    var windowHeight = $(window).height();
    $('.bgvideo').height(windowHeight);

  // adding class here for touch event
  // $('body').on('click','.app-submit', function() {
  //   $('.app-submit').addClass('app-submit-open');
  // });


    // home page scroll button
    $('.home_hero-seebelow').on('click',function() {
      $('html, body').animate({
        scrollTop: ($('.home_content').offset().top) - 71
      }, 1000);
    });

 // form validation
 var validate = function(id,regx,message,parentremove) {
  var name = $(id).val();
  console.log("validate called: "+name);
  if(name != "") {
    var reg = regx;
    if(!(reg.test(name))) {
      $(id).siblings('p').remove();
      $(id).parent().append('<p class="error">'+message+'</p>');
      $(id).val("");
      return false;
    } else {
      $(parentremove).remove();
      return true;
    }
  }
}

var validate_empty = function(id,message,parentremove) {
  var identify = $(id).val();
  console.log("validate_empty called: "+identify);
  if(identify == "") {
    $(id).siblings('p').remove();
    $(id).parent().append('<p class="error">'+message+'</p>');
    return false;
  }
  return true;
}


function addLoader(domEle,ButtonEle){
  $(domEle).append('<span class="loadSub">Submitting<img src="http://prdxnstaging2.com/prdxn/wp-content/uploads/2017/05/loader.gif"></span>');
  $(ButtonEle).css("style","display:none;");
}


// code for validation on form on carrer page

$('body').on('click','.app-submit',function(event) {
  $(this).addClass('app-submit-open');

  var jobapp_name = $('#jobapp_name').val();
      jobapp_phone_number = $('#jobapp_phone_number').val(),
      jobapp_resume_link = $('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__').val(),
      jobapp_portfolio_link = $('#jobapp_portfolio_link').val(),
      jobapp_certification = $('#jobapp_certification').val(),
      jobapp_residence = $('#jobapp_residence option:selected').val(),
      jobapp_qualification = $('#jobapp_qualification option:selected').val();

      jobapp_resume_link = $.trim(jobapp_resume_link);
      jobapp_portfolio_link = $.trim(jobapp_portfolio_link);

      // if(jobapp_residence === 'Select' ){
      //   console.log('residence error');
      //   event.preventDefault();
      // }

      if(jobapp_name && !validate('#jobapp_name',/^[A-za-z'\. -]{2,70}$/,'Please enter a valid name','#jobapp_email~p')) {
        // $('#jobapp_name').find('span.error').remove();
        event.preventDefault();
      } 
      if(jobapp_phone_number && !validate('#jobapp_phone_number',/^[{0-9} +()-]{6,15}$/,'Please enter a valid phone number','#jobapp_phone_number~p')) {
        event.preventDefault();
      }
      if(jobapp_resume_link && !validate('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__',/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[A-Za-z0-9_-]+\.+[A-Za-z0-9.\/%&=\?_:;-]|[,]+$/,'Please enter a valid resume link','#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__~p')) {
        event.preventDefault(); 
      }
      if(jobapp_portfolio_link && !validate('#jobapp_portfolio_link',/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[A-Za-z0-9_-]+\.+[A-Za-z0-9.\/%&=\?_:;-]+$/,'Please enter a valid portfolio link','#jobapp_portfolio_link~p')) {
        event.preventDefault();
      }
      if(jobapp_certification && !validate('#jobapp_certification',/^[0-9A-Za-z#\-, \.]{2,100}$/,'Please enter a valid certification','#jobapp_certification~p')) {
        event.preventDefault();
      }
      if ( grecaptcha.getResponse() == "" ) {
       $('.g-recaptcha').find('span.error').remove();
       $('.g-recaptcha').append('<span id="recaptcha-error" class="error" style="color: red">Please complete recaptcha verifications.</span>');
        event.preventDefault();
      }
});

$('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__').attr('placeholder','https://hub.gitbox.co/xyz, https://www.linkedin.com/xyz');

// File Upload Default Message
$('#applicant-resume').siblings('label').append('<span class="file-ext" >( PDF files only. )<p>*</p></span>');


$('#jobapp_email').siblings('label').append('<p>*</p>');
$('#jobapp_phone_number').siblings('label').append('<p>*</p>');
$('#jobapp_residence').siblings('label').append('<p>*</p>');
$('#jobapp_qualification').siblings('label').append('<p>*</p>');

$('#jobapp_residence').prop('required',true);

// $('#applicant-resume').removeAttr('required');  

    // Email validation
    $('#jobapp_email').on('focusout',function() {
      validate('#jobapp_email',/^[\w._~`!@#$%^&()\-=\+\\|{}{\[\]'";:/.,]+@[\w]+\.[a-z.]{2,3}$/,'Please enter a valid email address','#jobapp_email~p');
      validate_empty('#jobapp_email','Please enter your email address','#jobapp_email~p');
    });

    $('#jobapp_email').on('focusin',function() {
      $('#jobapp_email~p').remove();
    });

     // Phone validation
     $('#jobapp_phone_number').on('focusout',function() {
      validate('#jobapp_phone_number',/^[{0-9} +()-]{6,15}$/,'Please enter a valid phone number','#jobapp_phone_number~p');
      validate_empty('#jobapp_phone_number','Please enter your phone number ','#jobapp_phone_number~p');
    });


     $('#jobapp_phone_number').on('focusin',function() {
      $('#jobapp_phone_number~p').remove();
    });

     //Name validation
     $('#jobapp_name').on('focusout',function() {
      validate('#jobapp_name',/^[A-za-z'\. -]{2,70}$/,'Please enter a valid name','#jobapp_email~p');
      validate_empty('#jobapp_name','Please enter your name','#jobapp_name~p');
    });

    $('#jobapp_name').on('focusin',function() {
      $('#jobapp_name~p').remove();
    });

    //Resume link validation
    $('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__').on('focusout',function() {
      validate('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__',/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[A-Za-z0-9_-]+\.+[A-Za-z0-9.\/%&=\?_:;-]|[,]+$/,'Please enter a valid resume link','#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__~p');
    });

    $('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__').on('focusin',function() {
      $('#jobapp_relevant_urls__e_g__linkedin__github__behance__stackoverflow__etc__~p').remove();
    });

    //Portfolio link validation
    $('#jobapp_portfolio_link').on('focusout',function() {
      validate('#jobapp_portfolio_link',/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[A-Za-z0-9_-]+\.+[A-Za-z0-9.\/%&=\?_:;-]+$/,'Please enter a valid portfolio link','#jobapp_portfolio_link~p');
    });

    $('#jobapp_portfolio_link').on('focusin',function() {
      $('#jobapp_portfolio_link~p').remove();
    });

    //Portfolio link validation
    $('#jobapp_certification').on('focusout',function() {
      validate('#jobapp_certification',/^[0-9A-Za-z#\-, \.]{2,100}$/,'Please enter a valid certification','#jobapp_certification~p');
    });

    $('#jobapp_certification').on('focusin',function() {
      $('#jobapp_certification~p').remove();
    });



    /*
    navigation hamburger
    */
    $('.open_nav').height($(window).height());
    if($(window).width()<=768) {
      $('header .menu-primary-menu-container').height($(window).height());
    }
    else {
      $('header .menu-primary-menu-container').height(650);
    }

    var isHomePage = $('body').hasClass('home');
    var currentHostName = $('header>h1>a>img').attr('src') ? $('header>h1>a>img').attr('src') : '';
    currentHostName = currentHostName.split('wp-content')[0];    
    var blackLogoNav = currentHostName+'wp-content/uploads/2016/10/small_prdxn_black.png';
    var whiteLogoNav = currentHostName+'wp-content/uploads/2017/01/small_prdxn_white.png';
    var $imageLogoSelector = $('.logo_container > h1 > a > img');

    $('#header_navigation-toggle').on('click', function() {
      setTimeout(function() {
        if($(window).width() >= 1024) {
          $('.header_navigation-primary')
        .jScrollPane({autoReinitialise: false})
        .bind(
          'mousewheel',
          function(e) {
            e.preventDefault();
          }
          );
        scrollPaneApi = $('.header_navigation-primary').data('jsp');
        } else {
          $('.header_navigation-primary')
          .jScrollPane({autoReinitialise: true})
          .bind(
            'mousewheel',
            function(e) {
              e.preventDefault();
            }
            );
          scrollPaneApi = $('.header_navigation-primary').data('jsp');
        }
        
      },300);


      if(header_navigation_primary.hasClass('open_nav')) {
       $('#menu-primary-menu').addClass('menu_close');
       
       setTimeout(function(){
         $('#menu-primary-menu').removeClass('menu_close');
         $("html").removeClass('html_open');
         $('#header_navigation-toggle').css('position','static');
         $('.header_navigation-currentmenu').removeClass('open_current_nav');
         $('.singlework--backbutton').removeClass('open_current_nav');
         $('#menu-primary-menu').removeClass('menu_open');
         header_navigation_primary.removeClass('open_nav');
         $('.header_hamburger').removeClass('open_hamburger');
         if (!isHomePage && currentHostName) {
          $imageLogoSelector.attr('src', blackLogoNav);
        }
         $('header h1 img').attr('src', header_imgs);
         $('#header_navigation-toggle').removeClass('closeham');
         $('.logo_container').removeClass('bgblack');
       },350);
       header_navigation.css('background-color', nav_color);
       $('body').css('height', 'auto');

       // $('#menu-primary-menu').removeClass('menu_close');
     }
     else {
       $("html").addClass('html_open');
       $('#header_navigation-toggle').css('position','fixed');
       header_imgs = $('header h1 img').attr('src');
       nav_color = header_navigation.css('background-color');
       $('header h1 img').attr('src', footer_img);
       $('#menu-primary-menu').removeClass('menu_close');
       header_navigation_primary.addClass('open_nav');
       $('.header_navigation-currentmenu').addClass('open_current_nav');
       $('.singlework--backbutton').addClass('open_current_nav');
       $('#menu-primary-menu').addClass('menu_open');
       header_navigation.css('background-color', '#fff');
       $('.logo_container').addClass('bgblack');
       $('#header_navigation-toggle').addClass('closeham');

       $('body').height($(window).height() + 5);
       $('body').css('overflow', 'hidden');
       if (!isHomePage && currentHostName) {
        $imageLogoSelector.attr('src', whiteLogoNav);
        }
     }
       // header_navigation.css('background-color', nav_color);
       // $("html").css({"overflow-y": "hidden"});
       $('.header_hamburger').addClass('open_hamburger');
     });



    if($('body').hasClass('home')) {
      // Facebook Link
      var url='https://graph.facebook.com/v2.8/348172701889583/posts?fields=attachments,description,full_picture,permalink_url,link,name&access_token=EAAFgsrqgYXUBAGKm3zmAk3Ch7ZA6WilnRwsFHog8Knh3yNVyXNHbYfBr9arFUphaj4ce7RNYUgxzRLS7L83hvqs6zQWYJoR96gipuvBMfTSnyn05HngJFlP4S47NJjMs7Dot6tyhLqHbHHZB2Ei1xOxJUeoYkZD&expires=5183999&fields=attachments,full_picture,permalink_url,description,name,link';
      // url='https://graph.facebook.com/v2.8/1029871623805596/posts?fields=description,full_picture,permalink_url,link,name&access_token=EAAFgsrqgYXUBAGKm3zmAk3Ch7ZA6WilnRwsFHog8Knh3yNVyXNHbYfBr9arFUphaj4ce7RNYUgxzRLS7L83hvqs6zQWYJoR96gipuvBMfTSnyn05HngJFlP4S47NJjMs7Dot6tyhLqHbHHZB2Ei1xOxJUeoYkZD&expires=5183999&fields=full_picture,permalink_url,description,name,link';
      $.ajax({
        url: url,
        type: 'GET',
        success: function( response ) {
          var imageStructure = "",
          titleStructure = "",
          fbimage ="",
          fbname = "",
          fbdescription ="";


          if(response.data[0].full_picture) {
            imageStructure = response.data[0].full_picture;
          } else {
            imageStructure = response.data[0].attachments.data[0].media.image.src;
          }

          if(response.data[0].name) {
            titleStructure = response.data[0].name;
          } else {
            titleStructure = response.data[0].attachments.data[0].title;
          }

          if(imageStructure) {
            fbimage = '<img src="'+imageStructure+'"/>'
          }

          if(titleStructure){
            fbname = '<span>'+titleStructure+'</span>';
          }

          if(response.data[0].description){
            fbdescription ='<p>'+response.data[0].description+'</p>';
          }

          $('.home_facebook-feedblock').append( '<a href="'+response.data[0].permalink_url+'" target="_blank"><span class="fb-logo"></span><div class="custom-scroll scroll-pane mCustomScrollbar _mCS_1 mCS_no_scrollbar">'
            +fbimage+'<p>'+fbname+'</p>'+fbdescription+'</div></a>' );

          if($('.mCustomScrollbar').length > 0) {
            $('.mCustomScrollbar').mCustomScrollbar({
             theme:'inset',
             advanced:{ updateOnContentResize: true }
           });
          }
          setBlockF();
          error_fb(response.data[0].full_picture,response.data[0].description,response.data[0].name);
        },
        error: function(response) {
        }
      });
    }

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
      // var scrollWidth = $(this).width();
      servicelist.children('ul').scrollLeft($(this).offset().left);
      var target = '#' + (this).getAttribute('data-target'),
      hthdr = $('header').outerHeight(),
      htmain = hthdr + $('.services-list').outerHeight() - 1;

      $('html, body').animate({
        scrollTop: ($(target).offset().top) - htmain +2
      }, 1000);
    });

     objectiveBlockHeight();

   //  function maxHeight(element) {
   //   var max = 0;
   //   var element_height = 0;
   //   element.each(function (index) {
   //     element_height = $(this).outerHeight();
   //     max = element_height > max ? element_height : max;
   //   });
     
   //   element.css('min-height', max);
   // }

   //  maxHeight($('.workpage_content .flex'));

    /**
      * @desc Ajax function for load more functionality on work page
      *
      * @return undefine
      */
      var loadpost = function() {
        var totalCount = $('.totalcount').text();
        var siteurl = $('.siteurl').data('url');
        siteurl = "http://prdxnstaging2.com/2018stageprdxn/works/";
        $.ajax ({
          type: 'GET',
          data: { numPosts: 6, pageNumber: page },
          datatype: 'html',
          url: siteurl,
          beforeSend: function(msg) {
            $(".Workpage_loadmore-cta").hide();
            $(".workpage-loader").show();  },
          success: function(data) {
            $data = $(data);
          // $data.hide();
          $loadposts = $data.find('.flex');
          $loadposts.hide();
          if(!$loadposts[5]) {

            $content.append($loadposts);
            setTimeout(function () {$loadposts.fadeIn(1000);},200);
            objectiveBlockHeight();
          } else {
            $content.append($loadposts);
             setTimeout(function () {
             $loadposts.fadeIn(1000);
             // maxHeight($('.workpage_content .flex'));
             },200);           objectiveBlockHeight();
           }
           var currentCount = $('.flex').size();
           console.log(currentCount);
           console.log(totalCount);
           if(currentCount == totalCount) {
            setTimeout(function () {
              $('.work-loader').remove();
              $('.Workpage_loadmore-cta').hide();
              $('.workpage-loader').hide();
            },1000);
          } else {
            setTimeout(function () {$('.work-loader').remove();
              $('.Workpage_loadmore-cta').fadeIn('fast');
              $('.workpage-loader').hide();
            },1000);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert(jqXHR + '::' + textStatus + '::' + errorThrown);
        }
      });
      // if(totalCount == 47) {
      //   $('.Workpage_loadmore-cta').on('click', function() {
      //     loading = false;
      //     $('.Workpage_loadmore-cta').hide();
      //     console.log("Last slide");
      //   });
      //   // $('.Workpage_loadmore-cta').hide();
      //   // console.log("Last slide");
      // }
      };
    /**
      * @desc On click event to call Ajax function for load more functionality on work page
      *
      * @return
      */

      $('.Workpage_loadmore-cta').on('click', function() {
        loading = true;
        page++;
        loadpost();
      });

      // // var last = $content;
      // if(totalCount == 47) {
      //   $('.Workpage_loadmore-cta').on('click', function() {
      //     loading = false;
      //     $('.Workpage_loadmore-cta').hide();
      //     console.log("Last slide");
      //   });
      //   // $('.Workpage_loadmore-cta').hide();
      //   // console.log("Last slide");
      // }


    });


 /**
      * @desc Same height for all blocks for work page posts
      *
      * @return
      */
      function objectiveBlockHeight() {
        var i,j,p;
        $('.workpage_content').each(function() {
          i = $(this).children('.flex').first().height();
          j = $(this).children('.flex').first().width();
          p = i-j;
          $(this).children('.flex').each(function() {
            if($(this).height() > i) {
              i = $(this).height();
            }
          });
          $(this).children('.flex').height(i-p);
        });
      }

      $(window).on('resize',function() {
        objectiveBlockHeight();
        var windowHeight = $(window).height(),
        containerHeight = $('main').height();
        $headerMenu = $('.header_navigation-primary');

        if($headerMenu.hasClass('open_nav')){
          if(windowHeight < 525) {
            $headerMenu.find('li a').addClass('small_font');
          }
          else {
            $headerMenu.find('li a').removeClass('small_font');
          }
        }

        if($(window).width() > 1225) {
          if (windowHeight > containerHeight) {
            $('#footer').addClass('move-down');
          }
          else { $('#footer').removeClass('move-down'); }
        }
        else { $('#footer').removeClass('move-down'); }
        $('.open_nav').height($(window).height());
        if($(window).width()<=768) {
          $('header .menu-primary-menu-container').height($(window).height());
        }
        else {
          $('header .menu-primary-menu-container').height(650);
        }
        setTimeout(function() {
          if($('.header_navigation-primary').hasClass('open_nav')) {
            scrollPaneApi.reinitialise();
//            $('.header_navigation-primary')
//            .jScrollPane({autoReinitialise: true})
//            .bind(
//              'mousewheel',
//              function(e) {
//                e.preventDefault();
//              }
//              );
}

},300);
      });

      var footer_img = $('footer img').attr('src'),
      header_img = $('header img').attr('src');
      if ($('body').hasClass('home')) {
        $('header h1 img').attr('src', footer_img);
      }
      $('.page-template-home #header_navigation-toggle span span').addClass('');
  /**
    * @desc Event for scroll on window
    *
    * @return
    */
    $(window).scroll(function() {
      var $window = $(window),
      $servicesSticky = $('.sticky ul'),
      $header = $('header');


     // Services nav functionalities for desktop and responsive
     var off = 0,
     leftSpace = 0,
     windowTop;

     if (servicelist.hasClass('sticky')) {
      windowTop = $(this).scrollTop() + ($('.sticky ul').outerHeight() + $('header').outerHeight());
      $('.servicearea').each(function(index, el) {
        el = $(el);
        if (el) {
            //console.log(el);
            var elTopPos = el.offset().top,
            elHeight = el.outerHeight();

            if (windowTop >= elTopPos && windowTop < (elTopPos + elHeight)) {
              if (!$('.sticky a[href="#' + el.prop('id') + '"]').hasClass('open_header')) {

                $activeBlock = el;

                // if ($('.sticky a').hasClass('open_header')) {
                  $('.sticky a').removeClass('open_header');
                // }
                $('.sticky a[href="#' + el.prop('id') + '"]').addClass('open_header');

                var offset = $('.services-list a.open_header').parent('li').offset().left;
                off = offset + off;

                if ($('.sticky a[href="#' + el.prop('id') + '"]').hasClass('open_header')) {
                  var space = 0;
                  $('.sticky a[href="#' + el.prop('id') + '"].open_header').parent('li').prevAll().each(function() {
                    space = space + $(this).outerWidth();
                  });
                  var newoff = leftSpace + space;
                }

                $('.services-list ul').animate({
                  scrollLeft: newoff
                }, 1000, function() {
                  // leftSpace = 0;
                });
                return false;
              }
            }
          }
        });
    }

    if(scroll_count == 0) {
      if($(window).scrollTop() > 0) {
          // $('.social_admins').animateCount(1,$social_admins_count);
          // $('.copy_writers').animateCount(1,$copy_writers_count);
          // $('.designers').animateCount(1,$designers_count);
          // $('.project_manager').animateCount(1,$project_manager_count);
          // $('.testers').animateCount(1,$testers_count);
          // $('.developers').animateCount(1,$developers_count);
          scroll_count++;
        }
      }

      if ($(window).scrollTop() >= 100) {
       if ($('body').hasClass('home')) {
         $('header .logo_container').addClass('scroll');
         $('header h1 img').attr('src', header_img);
         if(!header_navigation_primary.hasClass('open_nav')) {
           header_navigation.css('background-color', '#58595b');
         }
       }
     }
     else {
       if ($('body').hasClass('home')) {
         $('header .logo_container').removeClass('scroll');
         $('header h1 img').attr('src', footer_img);
         header_navigation.css('background-color', '#fff');
       }
     }


     if ($('body').hasClass('page-template-services')) {
      var header_height = servicelist.height()+$('header').outerHeight(),
      creativethinking = $('#creativethinking').offset().top-header_height,
      solutionarch = $('#solutionarchitecture').offset().top-header_height,
      development = $('#development').offset().top-header_height,
      qualityassurancetesting = $('#qualityassurancetesting').offset().top-header_height,
      projectmanagement = $('#projectmanagement').offset().top-header_height,
      banner_img = $('main .services-hero img').outerHeight(),
      toolstechnology = $('#tools-technology').offset().top-header_height,
      header = $('header').outerHeight();

      // sticky header on service page

      if ($(window).scrollTop() >= banner_img-header) {
        servicelist.addClass('sticky');
        $('#creativethinking').css('padding-top',-v+'px');
      }
      else {
        servicelist.removeClass('sticky');
        $('#creativethinking').css('padding-top',0);
      }

      if($(window).scrollTop() >= toolstechnology) {
        $('.solutionarchitecture').removeClass('open_header');
        $('.projectmanagement').removeClass('open_header');
        $('.development').removeClass('open_header');
        $('.creativethinking').removeClass('open_header');
        $('.qualityassurancetesting').removeClass('open_header');
        $('.toolstechnology').addClass('open_header');
      }
        else if($(window).scrollTop() >= projectmanagement) {
        $('.solutionarchitecture').removeClass('open_header');
        $('.projectmanagement').addClass('open_header');
        $('.development').removeClass('open_header');
        $('.creativethinking').removeClass('open_header');
        $('.qualityassurancetesting').removeClass('open_header');
        $('.toolstechnology').removeClass('open_header');

      }
      else if($(window).scrollTop() >= qualityassurancetesting) {
        $('.solutionarchitecture').removeClass('open_header');
        $('.projectmanagement').removeClass('open_header');
        $('.development').removeClass('open_header');
        $('.creativethinking').removeClass('open_header');
        $('.qualityassurancetesting').addClass('open_header');
        $('.contentmarketing').removeClass('open_header');
      }
      else if($(window).scrollTop() >= development) {
        $('.solutionarchitecture').removeClass('open_header');
        $('.projectmanagement').removeClass('open_header');
        $('.development').addClass('open_header');
        $('.creativethinking').removeClass('open_header');
        $('.qualityassurancetesting').removeClass('open_header');
        $('.toolstechnology').removeClass('open_header');
      }
      else if($(window).scrollTop() >= solutionarch) {
        $('.solutionarchitecture').addClass('open_header');
        $('.projectmanagement').removeClass('open_header');
        $('.development').removeClass('open_header');
        $('.creativethinking').removeClass('open_header');
        $('.qualityassurancetesting').removeClass('open_header');
        $('.toolstechnology').removeClass('open_header');
      }
      else if($(window).scrollTop() >= creativethinking) {
        $('.solutionarchitecture').removeClass('open_header');
        $('.projectmanagement').removeClass('open_header');
        $('.development').removeClass('open_header');
        $('.creativethinking').addClass('open_header');
        $('.qualityassurancetesting').removeClass('open_header');
        $('.toolstechnology').removeClass('open_header');
        // servicelist.addClass('sticky');
      }
      else {
        $('.solutionarchitecture').removeClass('open_header');
        $('.projectmanagement').removeClass('open_header');
        $('.development').removeClass('open_header');
        $('.qualityassurancetesting').removeClass('open_header');
        $('.toolstechnology').removeClass('open_header');
      }
    }
  });

  // On load event
  $(window).load(function() {

    if (('ontouchstart' in document.documentElement)) {
      $( 'body' ).attr( 'id','touch' );
    }

    // setting block of SolutionBlock on case-study detail page
    function setSolutionBlockHeight() {
      var solutionImgHeight = casetestimonials.outerHeight(),
      casestudydetail_testimonial = casestudy_testimonial;

      casestudydetail_testimonial.css('height', solutionImgHeight);

    }

    setSolutionBlockHeight();

    if(scroll_count == 0) {
    // $('.social_admins').animateCount(1,$social_admins_count);
    // $('.copy_writers').animateCount(1,$copy_writers_count);
    // $('.designers').animateCount(1,$designers_count);
    // $('.project_manager').animateCount(1,$project_manager_count);
    // $('.testers').animateCount(1,$testers_count);
    // $('.developers').animateCount(1,$developers_count);
  }
  scroll_count++;

    // $('.home_facebook-feedblock a').jScrollPane();

    /**
      * @desc Slider functionality
      *
      * @return
      */
      if($(window).width() > 767) {
        $('.flexslider').flexslider({
          animation: 'slide',
          smoothHeight: false
        });
      }
      $('.home_testimonial-slider').flexslider({
        animation: 'slide'
      });

      /*
     * Work Detail Navigation Slider
     */

     $('.hidework').addClass('navslider_flex');
     $('.navslider_flex').flexslider({
      animation: 'fade',
      slideshowSpeed: 5000,
      pauseOnHover: true
    });

     // Accordion Funcitonality
     $('.showwork .work_detail_navslider--services-list').click(function() {
      $(this).siblings().children('ul').slideUp();
      $(this).children('ul').slideToggle();
      $(this).siblings().children('h2').removeClass('accor_arrow');
      $(this).children('h2').toggleClass('accor_arrow');
    });


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
      if ($('body').hasClass('home')) {
        var winHeight = $(window).height(),
        $mp4 = $('.hero_video_mp4').val(),
        $ogg = $('.hero_video_ogg').val(),
        $webm = $('.hero_video_webm').val(),
        BV = new $.BigVideo({useFlashForFirefox:false, container: $('.bgvideo')});
        BV.init();
        BV.show([
          { type: 'video/mp4',  src: $mp4 },
          { type: 'video/webm', src: $webm },
          { type: 'video/ogg',  src: $ogg },
          ], { ambient: true });

        BV.getPlayer().on('durationchange',function(){
          $('#big-video-wrap').fadeIn();
        // BV.getPlayer().play();
        $('.loaders').hide();
      });
      }

    /**
      * @desc loader functionality on work page
      *
      * @return
      */
      footerHeight();
      setTimeout(function(){
        $('.loader').fadeOut('fast');
       },1000)

      // $('.loader').fadeOut('slow');


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

            var instatext = $(this).text();
            $('.insta-text').each(function(){
              instatext = $(this).text();
              if(instatext.length > 140) {
                $(this).text(instatext.substring(0,140) + '...');
              }
              if($(window).width() <= 1024){
                if(instatext.length > 40) {
                  $(this).text(instatext.substring(0,40) + '...');
                }
              }
              if($(window).width() <= 767){
                if(instatext.length > 20) {
                  $(this).text(instatext.substring(0,20) + '...');
                }
              }
            });
          }
        });
        userFeed.run();

      }

      setTimeout(function(){

        if($('body').hasClass('page-template-services')) {
          var pathname = window.location.href;
          var value = pathname.substring(pathname.lastIndexOf('/') + 1),
          counter = 0,
          hrefvalues = '';
          $('.servicemenu').each(function() {
            var hrefvalue =  $(this).attr('href');
            if(hrefvalue == value){
              $(this).addClass('open_header');
        // $(this).trigger('click');
        hrefvalues=hrefvalue;
        counter++;
      }
    });

          $('.servicearea').each(function(){

           if(hrefvalues == '#'+$(this).attr('id')){

            var header_height = $(this).offset().top-servicelist.height() - 7;


            $('html, body').animate({
              scrollTop: header_height
            }, 100);
          }
        });

        }
      },300);
    });

$(window).resize(function() {
  if(!$('body').hasClass('android')) {
    var windowHeight = $(window).height();
    $('.bgvideo').height(windowHeight);
  }
  if($('body').hasClass('home')) {
    setBlockF();
  }
    // setSolutionBlockHeight();
    setSolutionBlockHeight();

    footerHeight();

   if($(window).width() <= 1024) {
      $('.hidework').hide();
      $('.showwork').show();
    }
    else {
     $('.hidework').show();
     $('.showwork').hide();
   }
 });


/*
* Simple Job Board placeholder remove
*/

  // $('.sjb-phone-number').on('focusout',function() {
  //   $('.sjb-phone-number').removeAttr('placeholder');
  //   $('.sjb-invalid-phone').remove();
  // });
// $(window).on('load',function(){
//   $('.sjb-phone-number').removeAttr('placeholder');
//   $('.sjb-invalid-phone').remove();

    // if($(window).width() < 1025) {
    //     $('.flag-container').click(function(){
    //       $('.country-list').toggleClass('hide');
    //     });

    //     $('.country-list li').click(function(){
    //       $(this).addClass('active');
    //       $(this).siblings().removeClass('active');
    //       var flag = $(this).children('.flag-box').children().attr('class');
    //       console.log(flag);
    //       $('.selected-flag div:first-child').attr('class',flag);
    //     });
    //   }

// });

//height of work navigation
setTimeout(function(){
  $(window).on('resize', function(){
    var m = $('header').innerHeight();
    $('.singlework--backbutton').css('height',m);
  }).resize();
},4000);




$(".logo").slick({
       dots: true,
       infinite: true,
       slidesToShow: 4,
       autoplay: true,
       autoplaySpeed: 5000,
       slidesToScroll: 4,
      responsive: [
    {
      breakpoint: 1061,
      settings: {
        dots: true,
        infinite: true,
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToScroll: 3,
      }
    } ,
    {
      breakpoint: 768,
      settings: {
        dots: true,
        infinite: true,
        slidesToShow: 2,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 533,
      settings: {
        dots: true,
        arrows: true,
       infinite: true,
       slidesToShow: 1,
       autoplay: true,
        autoplaySpeed: 5000,
       slidesToScroll: 1,
      }
    }
  ]

 });


})(jQuery);